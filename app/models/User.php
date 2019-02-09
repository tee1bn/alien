<?php


use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent 
{
	
	protected $fillable = [ 
				'username',	
				'firstname',
				'lastname',
				'email',
				'email_verification',
				'phone',
				'profile_pix',
				'resized_profile_pix',
				'password',
				'i_am' ,
				'birthday'	,
				'city',
				'lastseen_at',
				'lastlogin_ip',
	 			'blocked_on'	

	 ];
	
	protected $table = 'users';
  	protected $dates = [
        'created_at',
        'updated_at',
        'lastseen_at'
    ];
    protected $hidden = ['password'];




/**
 * [send_message send this $message to the user whose is is supplied as]
 * @param  [type] $receiver_id [description]
 * @param  [type] $message     [description]
 * @return [type]              [description]
 */
public function send_message($receiver_id, $message )
{
 return   Chat::create([ 

                'sender_id'   => $this->id,
                'receiver_id' => $receiver_id,
                'message'     => $message,
                ]);
}





public function mark_chat_as_seen_from($sender_id)
{
   return Chat::mark_unseen_chats_between($sender_id, $this->id);
}

    /**
     * returns all the conversations betweeen this user and 
     * the other user whose user_id is supplied
     * @param  [int] $user_id [description]
     * @return [Query builder]          [description]
     */
    public function conversations_with($user_id)
    {
    	return Chat::chats_between($this->id ,$user_id);
    }



    /**
     * [refined_users_contacted_by return all necessary info about
     * about all recently contacted user by this ]
     * @return [array] [description]
     */
    public function refined_users_contacted()
    {
		return	Chat::refined_users_contacted_by($this->id);
    }



    /**
     * [uploaded_videos returns this users records of uploaded videos]
     * @return [Eloquent relationship] [description]
     */
    
    public function uploaded_videos()
    {
    	return $this->hasMany('UsersFiles', 'user_id')->where('type', 2);
    }

    /**
     * [uploaded_photos returns this users records of uploaded photos]
     * @return [Eloquent relationship] [description]
     */
    public function uploaded_photos()
    {
    	return $this->hasMany('UsersFiles', 'user_id')->where('type', 1);
    }


    public function posts()
    {
    	return UsersPosts::where('user_id', $this->id);
    	// return $this->hasMany('UsersPosts', 'user_id');
    }


    /**
     * tells whether this user is online or not
     * @return boolean [true if oonline and false if not online]
     */
    public function is_online()
    {
    	$ten_minutes_ago = time()  - (10 * 60);
 		$lastseen_at = strtotime($this->lastseen_at);
 
    	return (!($lastseen_at < $ten_minutes_ago));
        }


    /**
     * fetches the user posts of self and friends and friends of direct friends 
     * @return [type] [description]
     */
    public function posts_feeds_from_friends($attempt=1)
    {

 	$from_users   = $this->friends_of_friends();
 	$from_users[] = $this->id;
    $users_posts_from_friends = UsersPosts::whereIn('user_id', $from_users);

    	if ($attempt==1) {
    		return $users_posts_from_friends;
    				// ->whereDate('created_at', '=', $this->lastseen_at);

    	}else{

    		return $users_posts_from_friends;
    		// echo "doinighu jg vg hjhn";
    	}
    }








    /**
     * [friends_of_friends fetches the friends of a user including the 
     * friends of direct friends]
     * @return [array] [description]
     */
   public function friends_of_friends()
   {	

   		$friends_id = $this->friends_lists();

   		foreach ($friends_id as $friend_id) {

   			$friends_of_friends[$friend_id] = self::find($friend_id)->friends_lists();
   		}

	
   		$friends_ = array_keys($friends_of_friends);

   		// print_r($friends_of_friends);
   		foreach ($friends_of_friends as $friends_of_friend) {
   			foreach ($friends_of_friend as $friend_id) {

   				if ((! in_array($friend_id, $friends_)) && ($friend_id != $this->id)) {
   					$friends_[] = $friend_id;
   				}

   			}
   		}
   		return ($friends_);
   }


   /**
    * [friend_with tells whether is friend with the user whose id is supplied]
    * @param  [type] $user_id 
    * @return [boolean]       true if yess, false if not
    */
   public function friend_with($user_id)
   {
   	return in_array($user_id, $this->friends_lists());
   }




   /**
    * [no_of_friends tells this users number of friends]
    * @return [int] [description]
    */
   public function no_of_friends()
   {
   	return count($this->friends_lists());
   }


	/**
	 * [friends_lists fetches the ids of this user friends]
	 * @return [array]
	 */
	public function friends_lists()
	{

	foreach ($this->friends_requests_lists()->get() as $request) {

	    		if ($this->id == $request->request_to) {
	    			  $friends_lists[] = $request->request_from;
	    		}else{
	    			  $friends_lists[] = $request->request_to;
	    		}

	    	}

	return ($friends_lists);

	}





    /**
     * returns the friend request list of a user
     * @param   $approved boolean [true for approved request while false for all request]
     * @return [eloquent query builder]
     */
    public function friends_requests_lists($approved=true)
    {
    return	$friend_requests = UserFriendsRequests::for_user($this->id , $approved);
    	
    }











    /**
     * [has_completed_personal_profile returns true on completed peprsonal profile
     * and false on not completed peprsonal profile
     * @return boolean [description]
     */
   public function has_completed_personal_profile()
    {
    		return ! $this->has_uncompleted_personal_profile();
    } 


    /**
     * [has_completed_preference_profile returns true on completed preference profile
     * and false on not completed preference profile
     * @return boolean [description]
     */
   public function has_completed_preference_profile()
    {
    		return ! $this->has_uncompleted_preference_profile();
    } 




    /**
     * [has_completed_preference_profile description]
     * @return boolean true if preference profile is not complete else false
     */
   public  function has_uncompleted_preference_profile(){

			$unfilled_fields = $this->uncompleted_preferences();

			if(is_array($unfilled_fields)){
				return boolval(count($unfilled_fields) )  ;
			}
			elseif ($unfilled_fields == 'no row') {
				return true ;	
			}else{
				return false;
			}
		}




    	  /**
     * this returns the remaining unfilled fields for user to have a completed 
     * preference profile
     * @return [array] containing unfilled fields
     * when row exists and string "no row" when a user has no record 
     * for filling his profile detail
     */
	public function uncompleted_preferences()
	{


			$preferences =	$this->preferences();
			if($preferences ==null ) 
			{return 'no row';}
		

			$preferences_array  = $preferences->toArray();
			$field_names_in_db  =  array_keys($preferences_array);

			$non_required_preference_fields_array = UserPreferences::$non_required_preference_fields;
		
					/**
					 * loop through the fields of the UserPreferences table
					 */
					
				$unfilled_fields = [];	
				foreach ($field_names_in_db as $field) {
						if (in_array($field, $non_required_preference_fields_array)) {
							continue;
						}

					/**
					 * [$value description] holds the actual value of the field in db
					 * @var [type]
					 */
				  $value =	$preferences_array[$field];

					if (($value == null) || ($value == '') ) {
							$unfilled_fields[] = $field;
					}



				}
						
				return ($unfilled_fields);


							

		

	}
	





















































    /**
     * [has_completed_personal_profile description]
     * @return boolean true if personal profile is not complete else false
     */
   public function has_uncompleted_personal_profile(){
		
			$unfilled_fields = $this->uncompleted_personal_attributes();

			if(is_array($unfilled_fields)){
				return boolval(count($unfilled_fields) )  ;
			}
			elseif ($unfilled_fields == 'no row') {
				return true ;	
			}else{
					return	false;
			}

    }


    /**
     * this returns the remaining unfilled fields for user to have a completed 
     * personal profile
     * @return [array] containing unfilled fields
     * when row exists and string "no row" when a user has no record 
     * for filling his profile detail
     */
	public function uncompleted_personal_attributes()
	{


			$personal_attributes =	$this->personal_attributes();

			if($personal_attributes ==null ) 
			{return 'no row';}
		
				$personal_attributes_array = $personal_attributes->toArray();
				$field_names_in_db  =  array_keys($personal_attributes_array);

				$non_required_personal_fields_array = UserPreferences::$non_required_personal_fields;
		
					/**
					 * loop through the fields of the UserPreferences table
					 */
					$unfilled_fields = [];
				foreach ($field_names_in_db as $field) {
						if (in_array($field, $non_required_personal_fields_array)) {
							continue;
						}

					/**
					 * [$value description] holds the actual value of the field in db
					 * @var [type]
					 */
				  $value =	$personal_attributes_array[$field];

					if (($value == null) || ($value == '') ) {
							$unfilled_fields[] = $field;
					}



				}
						
				return ($unfilled_fields);


							

		

	}






/**
 * [personal_attributes return this user personal attributes]
 * @return [Eloqent object instance] 
 */
public function personal_attributes()
		{
			$personal_attributes =	UserPreferences::where('info_for', 1 )
								   ->where('user_id', $this->id)
								   	->first();

		return $personal_attributes;

		}		


    /**
     * this returns true or false based on whether user has defined preference
     * for certain characteristics
     * @param  string  $attribute [determines which attribute to check on]
     * @return preference if there is preference and false if there isnt 
     */
    public function has_preference_on($attribute='')
    {
    	/**
    	 * $doesnot_have_preference stores the boolean for "not have preference concoditions
    	 * @var [boolean]
    	 */
    	
    	$preference = $this->preferences()->$attribute;
    	$doesnot_have_preference =  ($preference === null ) ||
    								($preference === '' ) ;



    	if ($doesnot_have_preference) {
    		return false;
    	}else{
    		return $preference;
    	}
    }





    /**
     * this return this user row of preference for other users
     * @param  string $attribute [description]
     * @return eloquent object for @ $attribute=all, and array for $attribute is non default
     */
	public function preferences($attribute='all')
	{
	$preferences =	UserPreferences::where('info_for', 0 )->where('user_id', $this->id)->first();
		switch ($attribute) {
			case 'all':
				return $preferences ;
				break;

				case 'marital_status':
				echo "marital_status";
				break;
				case 'hair_color':
		return	UserPreferencesHairColor::selected_preference($preferences->hair_color);
				break;
			case 'body_shape':
		return	UserPreferencesBodyShape::selected_preference($preferences->body_shape);
				break;
				case 'height':
		return	UserPreferencesHeight::selected_preference($preferences->height);
				break;
			case 'ethnicity':
		return	UserPreferencesEthnicity::selected_preference($preferences->ethnicity);
				break;
				case 'religion':
		return	UserPreferencesReligion::selected_preference($preferences->religion);
				break;
				case 'education_level':
		return	UserPreferencesEducationLevel::selected_preference($preferences->education_level);
				break;
				case 'profession':
		return	UserPreferencesProfession::selected_preference($preferences->profession);
				break;
				case 'income_level':
		return	UserPreferencesIncomeLevel::selected_preference($preferences->income_level);
				break;
				case 'smoke_status':


		return	$preferences->smoke_status;
				break;
			
			default:
				# code...
				break;
		}
	}


    /**
     * is_blocked() tells whether a user is blocked or not
     * @return boolean true when blocked and false ff otherwise
     */
	public function is_blocked()
	{
	return	boolval($this->blocked_on);
	}



	/**
	 * [getFirstNameAttribute eloquent accessor for firstname column]
	 * @param  [type] $value [description]
	 * @return [string]        [description]
	 */
	public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

/**
	 * [getFirstNameAttribute eloquent accessor for firstname column]
	 * @param  [type] $value [description]
	 * @return [string]        [description]
	 */
	public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }


	/**
	 * eloquent mutators for password hashing
	 * hashes user password on insert or update
	 *@return 
	 */
	 public function setPasswordAttribute($value)
	    {
	        $this->attributes['password'] = password_hash($value, PASSWORD_DEFAULT);
	    }




}

















?>