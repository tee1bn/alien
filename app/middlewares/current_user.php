<?php
@session_start();

// use Illuminate\Database\Eloquent\Model as Eloquent;

class current_user extends controller
{
	

	public function __construct(){

	}
	
	


public function mustbe_loggedin(){

if($this->auth()){

	return $this;
		
		}else{

		Redirect::to('');
		exit();
		}

}


public function must_have_complete_profile()
{

	//take user to fill info about themselve if they have completed preference profile
		if ($this->auth()->has_uncompleted_preference_profile()) {
			Redirect::to("tell-us-more/index/{$this->auth()->username}");
		}
		elseif ($this->auth()->has_uncompleted_personal_profile()){
			Redirect::to("tell-us-more/about_yourself/{$this->auth()->username}");
		}else if($this->auth()->has_completed_preference_profile() 
				&& $this->auth()->has_completed_personal_profile()  ){

			return $this;
		}

			

}





}


















?>