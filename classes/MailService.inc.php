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
        $this->mail->Host = 'mail.gmx.net';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'iksy2@gmx.de';
        $this->mail->Password = 'PN7OXZINVNCGZLFCPW6S';
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port = 587;

        $this->mail->setFrom('iksy2@gmx.de', 'localhost');
    }

    public function sendVerificationEmail($toEmail, $verificationCode)
    {
        try {
            $this->mail->clearAllRecipients();
            $this->mail->addAddress($toEmail);
            $this->mail->Subject = 'Verify Your Account';
            $this->mail->Body = "Your verification code is: <b>$verificationCode</b>";

            if (!$this->mail->send()) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
