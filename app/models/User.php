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




    public function billing_details()
    {
    	return $this->hasOne('UserBilling' , 'user_id');
    }


    public function shipping_details()
    {
    	return $this->hasOne('UserShipping' , 'user_id');
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











    public function orders()
    {
        return $this->hasMany('Orders','user_id');
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