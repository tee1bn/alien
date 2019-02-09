<?php

use PHPMailer\PHPMailer\PHPMailer;
/**
* 
*/
class Mailer extends PHPMailer
{
	
	function __construct()
	{

// $mail = new PHPMailer();                              // Passing `true` enables exceptions
try {
    //Server settings
    $this->SMTPDebug = 1;                                 // Enable verbose debug output
    $this->isSMTP();                                      // Set mailer to use SMTP
    $this->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
    $this->SMTPAuth = true;                               // Enable SMTP authentication
    $this->Username = '825799772eccdb' ;               // SMTP username
    $this->Password = '109e54723f779f';                           // SMTP password
    $this->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $this->Port = 2525;                                    // TCP port to connect to

    $this->setFrom('jaime@gmail.com', Config::project_name());


} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;


}


  	// $this->view('emails/email');






	}


/*For live production
public  function sendMail($to, $subject, $body){

     
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    if (
        mail($to, $subject, $body, $headers)
) {

        return true;
    }else{

        return false;
    }

}


*/




public function sendMail($to, $subject, $body, $reply='', $recipient_name=''){



    $this->isHTML(true);                                  // Set email format to HTML
    $this->AddAddress($to, ' ');
    $this->Subject = $subject;
    $this->Body    = $body;
    // $this->AltBody = 'This is the body in plain text for non-HTML mail clients';


	if ( $this->send()) {

		return true;
	}else{

		return false;
	}

}





}







