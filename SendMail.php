<?php
header ('Content-type: text/html; charset=utf-8'); 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once './mailer/src/Exception.php';
require_once './mailer/src/PHPMailer.php';
require_once './mailer/src/SMTP.php';

class SendMail{
	private static $emailFrom = "no-reply@example.com";
	private static $emailFromName = "BLOG";
	private static $emailToName = "BLOG";
	private static $emailTo = "mymail@example.com";

	public static function send($msg){
		$mail = new PHPMailer;
		$mail->isSMTP(); 
		$mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
		$mail->Host = "host.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
		$smtpUsername = 'no-reply@host.com';
		$smtpPassword = '123456';
		$mail->Port = 465; // TLS only
		$mail->SMTPSecure = 'ssl'; // ssl is depracated
		$mail->SMTPAuth = true;
		$mail->Username = $smtpUsername;
		$mail->CharSet  = 'UTF-8';
		$mail->Password = $smtpPassword;
		$mail->setFrom(self::$emailFrom, self::$emailFromName);
		$mail->addAddress(self::$emailTo,self:: $emailToName);

		$mail->Subject = 'Nuevo comentario requiere validación';
		$mail->msgHTML($msg); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
		$mail->AltBody = '';
		// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
		$mail->send();
	}

}
/**/
?>