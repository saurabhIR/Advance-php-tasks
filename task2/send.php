<?php
/**
 * @file
 * Contains the EmailSender class.
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
 * Defines a class for sending emails.
 */
class EmailSender {

	/**
	 * The PHPMailer instance.
	 *
	 * @var PHPMailer
	 */
	protected $mail;

	/**
	 * Constructs an EmailSender object.
	 *
	 * @throws Exception
	 *   If the PHPMailer instance cannot be created.
	 */
	public function __construct() {
		// Load Composer's autoloader.
		require 'vendor/autoload.php';

		// Create an instance; passing `true` enables exceptions.
		$this->mail = new PHPMailer(true);

		// Set server settings.
		$this->mail->isSMTP();
		$this->mail->Host = 'smtp.gmail.com';
		$this->mail->SMTPAuth = true;
		$this->mail->Username = 'your_email@innoraft.com';
		$this->mail->Password = 'your_password';
		$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
		$this->mail->Port = 465;
	}

	/**
	 * Sends an email.
	 *
	 * @param string $to
	 *   The email address of the recipient.
	 * @param string $subject
	 *   The subject of the email.
	 * @param string $body
	 *   The HTML message body of the email.
	 *
	 * @throws Exception
	 *   If the email could not be sent.
	 */
	public function sendEmail($to, $subject, $body) {
		try {
			// Set recipients and content.
			$this->mail->setFrom('saurabh.kumawat@innoraft.com');
			$this->mail->addAddress($to);
			$this->mail->isHTML(true);
			$this->mail->Subject = $subject;
			$this->mail->Body = $body;

			// Send the email.
			$this->mail->send();
			echo 'Message has been sent';
		}
		catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
		}
	}
}
$newmail= new EmailSender();
$to = $_POST["email"];
$subject = 'Here is the subject';
$body = 'This is the HTML message body <b>in bold!</b>';
if (isset($to)){
	$newmail->sendEmail($to,$subject,$body);
}
?>
