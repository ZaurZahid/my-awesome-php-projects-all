<?php

function send_email($email,$name,$subject,$message){

    $mail = new PHPMailer(true);
  
    try {
      //Server settings
      //$mail->SMTPDebug = 2;                                      
      $mail->isSMTP();                                            
      $mail->Host       = setting('smtp_host'); 
      $mail->SMTPAuth   = true; 
      $mail->Username   = setting('smtp_email');                  
      $mail->Password   = setting('smtp_password');                                
      $mail->SMTPSecure = setting('smtp_secure');                                   
      $mail->Port       = setting('smtp_port');                                 
      $mail->CharSet    = 'UTF-8 ';  
      //Recipients
      $mail->setFrom(setting('smtp_send_email'), setting('smtp_send_name'));
      $mail->addAddress($email , $name);   
  
      // Content
      $mail->isHTML(true);                                 
      $mail->Subject = $subject;
      $mail->Body    = $message; 
      $mail->send();
      return true ;
      //echo 'Message has been sent';
  } catch (Exception $e) {
      return false;
      //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

?>