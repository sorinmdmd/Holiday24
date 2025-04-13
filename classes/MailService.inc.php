<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'vendor/autoload.php';

class MailService
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host       = 'smtp.mail.yahoo.com';
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = 'verifyiksy2@yahoo.com';
        $this->mail->Password   = 'RFVwu$%aSGwd6wK';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 587;

        $this->mail->setFrom('verifyiksy2@yahoo.com', 'Iksy2');
    }

    public function sendVerificationEmail($toEmail, $verificationCode)
{
    try {
        $this->mail->clearAllRecipients();
        $this->mail->addAddress($toEmail);
        $this->mail->isHTML(true);
        $this->mail->Subject = 'Verify Your Account';
        $this->mail->Body    = "Your verification code is: <b>$verificationCode</b>";
        $this->mail->send();
        return true;
    } catch (Exception $e) {
        error_log("Mailer Error: " . $this->mail->ErrorInfo); // logs to PHP error log
        echo "Mailer Error: " . $this->mail->ErrorInfo; // TEMPORARY: shows on page
        return false;
    }
}
}
