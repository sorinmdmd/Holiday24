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

        $this->mail->setFrom('iksy2@gmx.de', 'Holiday24');
    }

    public function sendVerificationEmail($toEmail, $verificationCode)
    {
        try {
            $this->mail->clearAllRecipients();
            $this->mail->addAddress($toEmail);
            $this->mail->Subject = 'Verify Your Account';
            $this->mail->Body = "Your verification code is: {$verificationCode}";

            if (!$this->mail->send()) {
                echo "Hier";
                return false;
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function sendBookingConfirmation($toEmail, $travelbundles, $booked_slots, $book_bundle_id)
    {
        try {
            $this->mail->clearAllRecipients();
            $this->mail->addAddress($toEmail);
            $this->mail->Subject = "Your booking confirmation";

            $bookedTravelBundle = null;
            foreach ($travelbundles as $bundle) {
                if (isset($bundle['id']) && $bundle['id'] == $book_bundle_id) {
                    $bookedTravelBundle = $bundle;
                    break;
                }
            }

            if ($bookedTravelBundle && !empty($booked_slots)) {
                $numTravelers = is_array($booked_slots) && isset($booked_slots[0]['booked_slots']) ? $booked_slots[0]['booked_slots'] : (is_int($booked_slots) ? $booked_slots : 'some');
                $country = $bookedTravelBundle['country'] ?? 'unknown country';
                $city = $bookedTravelBundle['city'] ?? 'unknown city';
                $formattedBody = "Dear customer,\n\n";
                $formattedBody .= "Your booking for {$numTravelers} person(s) to {$country}, {$city} has been confirmed.\n\n";
                $formattedBody .= "Thank you for your booking!\n\n";
                $formattedBody .= "Sincerely,\nYour Travel Team";
                $this->mail->Body = $formattedBody;
            } else {
                $this->mail->Body = "Your booking has been confirmed."; // Fallback message
            }

            if (!$this->mail->send()) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            error_log("Error sending booking confirmation email: " . $e->getMessage());
            return false;
        }
    }
    public function sendCancelConfirmation($toEmail)
    {
        try {
            $this->mail->clearAllRecipients();
            $this->mail->addAddress($toEmail);
            $this->mail->Subject = 'Your booking has been cancelled';
            $this->mail->Body = "Your trip has been cancelled";

            if (!$this->mail->send()) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
