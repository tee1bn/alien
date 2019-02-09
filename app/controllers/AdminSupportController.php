<?php


/**



*/
class AdminSupportController extends controller
{



	public function __construct(){
		$this->middleware('administrator')->mustbe_loggedin();

	}
	
	public function closeTicket($ticket_id){

	echo 	SupportTicket::find($ticket_id)->update(['status'=> 1]);

 		$this->redirect()->to($this->domain.'/admin-support/viewSupportTicket/'.$ticket_id)->go();



	}


	public function createTicketMessage($ticket_id){

		if (Input::exists()) {
			


	$this->validator()->check(Input::all() , array(

	'message' =>[

								'required'=> true,
								'max'=> 2000,
								'unique'=> 'TicketMessage',
						],
		));

 if($this->validator->passed()){

 echo	$message  =  SupportTicket::find($ticket_id)->messages()->create([
 				'message' => trim(Input::get('message')) , 				
 				'admin_id' => $this->admin()->id, 				
 				]);

 		$this->redirect()->to($this->domain.'/admin-support/viewSupportTicket/'.$ticket_id)->go();

 }else{

 	Session::putFlash('Info', "Please try again, Message not sent ");

 }

		
		


	
		}



 		$this->redirect()->to($this->domain.'/admin-support/viewSupportTicket/'.$ticket_id)->go();



	}
	
	public function viewSupportTicket($ticket_id){

		$support_ticket_messages = SupportTicket::find($ticket_id)->messages; 
		$support_ticket 		 = SupportTicket::find($ticket_id); 

		$this->view('admin/support-ticket-messages', [
					'support_ticket_messages'	=> $support_ticket_messages ,
					'support_ticket'			=> $support_ticket 
									]);  

	}
	





	public function index()

	{

		$support_tickets = SupportTicket::all();
			$this->view('admin/support', ['support_tickets' => $support_tickets]);  
	}







}























?>