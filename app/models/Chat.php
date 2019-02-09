<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class Chat  extends Eloquent 
{
	
	protected $fillable = [
								'sender_id',
								'receiver_id',
								'message',
								'attachment',
								'seen_at',
							];

	protected $table	= 'messaging';
	 protected $dates = [
	        'created_at',
	        'updated_at',
	        'seen_at'
	    ];


/**
 * [seen description] mark a chat as seen by the receiver
 * @return [boolean] [description]
 */
private function seen()
{
	return	$this->update(['seen_at' => date("Y-m-d H:i:s")]);
}


/**
 * [seen whether message is seen or not by the recipien user
 * @return [boolean] [description]
 */
private function is_seen()
{
	return	(bool)$this->seen_at ;
}




/**
 * [mark_unseen_chats_between mark all the unseen chats between the users whose 
 * ids is supplied with respect ot their positions of sender and receiver]
 * @param  [type] $sender_id   [description]
 * @param  [type] $receiver_id [description]
 * @return [type]              [description]
 */
public function mark_unseen_chats_between($sender_id, $receiver_id)
{

 $unseen_messages = self::unseen_messages($sender_id, $receiver_id)->get();
		foreach ($unseen_messages as $message) {
			$message->seen();
		}

}


/**
 * [refined_users_contacted_by return necessary info about all the conatacted user]
 * @param  [int] $user_id [description]
 * @return [array]          [description]
 */
public function refined_users_contacted_by($user_id)
{



	$users_contacted_by = self::users_contacted_by($user_id);


	foreach ($users_contacted_by  as $contacted_userid) {

		$opposite_user  = User::find($contacted_userid);
		$last_message   = self::chats_between($user_id, $contacted_userid)->latest()->first();
		$last_message_concise = substr($last_message->message, 0, 25).'...';
		$no_of_unseen_message = self::unseen_messages($contacted_userid , $user_id)->count();

		$recipient_seen_status = ($last_message->sender_id==$user_id)? $last_message->is_seen(): null;



	
		$refined_contacted_users[] = [
						'opposite_user' 			=> $opposite_user->toArray(),
						'opposite_user_lastseen_at' => $opposite_user->lastseen_at->diffForHumans() ,
						'last_message' 				=> $last_message,
						'last_message_seen_status' 	=> $recipient_seen_status,
						'last_message_concise' 		=> $last_message_concise,
						'no_of_unseen_message' 		=> $no_of_unseen_message,

							];
	
	}


	return collect( $refined_contacted_users);
	
}






/**
 * returns all conversations between the users whose id is supplied
 * [chats_between description]
 * @param  [type] $user_id1 [involved user user_id]
 * @param  [type] $user_id2 [involved user user_id]
 * @param  [type] $page     [description]
 * @return [type]           [description]
 */
public function chats_between($user_id1, $user_id2, $page=null)
{
	return self::whereRaw("(sender_id = '$user_id1' OR receiver_id = $user_id1)")
				->whereRaw("(sender_id = '$user_id2' OR receiver_id = $user_id2)")
				;
}





/**
 * [unseen_messages description]
 * @param  [type] $sender_id   [id of user who sent message]
 * @param  [type] $receiver_id [id of user who receive message]
 * @return [eloguent query builder]              [description]
 */
public function unseen_messages($sender_id,$receiver_id)
{
	return	self::where('sender_id',$sender_id)
		->where('receiver_id',$receiver_id)
		->where('seen_at',null);
}



/**
 * [seen_status whether the receiver has seen the message or not]
 * @return [boolean] [description]
 */
public function seen_status()
{
	return boolval($this->seen_at); 
}



/**
 * [users_contacted_by returns the ids of the contacted users by the user whos id is supplied
 * 
 * @param  [type] $user_id       [description]
 * @param  [type] $chat_position [the position of the user 
 * options 'sender',=> returns the ids of the contacted users i.e recipients
 *  'receiver'=> returns the ids of the users who  contacted the user_id 
 *  'default'  return all users
 * @return [type]                [description]
 */
public function users_contacted_by($user_id, $chat_position= null)
{

foreach (self::chats_for_user($user_id)->get() as $user_chat) {
			if ($user_chat->sender_id == $user_id) {
				$users_contacted[] = $user_chat->receiver_id ;
			}else{
				$users_who_contacted[] = $user_chat->sender_id ;	
			}
		}

		switch ($chat_position) {
			case 'sender':
			return array_unique($users_contacted);
				break;
			case 'receiver':
			return array_unique($users_who_contacted);
				break;
			
			default:
		return  array_unique(array_merge($users_contacted ,$users_who_contacted));
				break;
		}



}



/**
 * [chats_for_user returns the chats records for the user whose id is
 *  supplied users 
 * @param  [int] $user_id [description]
 * @return [type]          [description]
 */
public function chats_for_user($user_id)
{
	return self::whereRaw("(sender_id = '$user_id' OR receiver_id = $user_id)")->latest();
}



/**
 * return the sender of the message
 * @return [type] [description]
 */
public function sender()
{
	return	$this->belongsTo('User', 'sender_id');

}

/**
 * return the receiver of the  message
 * @return [type] [description]
 */
public function recipient()
{
	return	$this->belongsTo('User', 'receiver_id');

}


}





;?>