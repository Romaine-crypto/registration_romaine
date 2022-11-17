<?php
    require 'vendor/autoload.php';

    class SendEmail{
        public static function SendMail($to,$subject,$content){
            $key = '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';

            $email = new \SendGrid\Mail\Mail();
            $email->setFrom("romainebeckford9@gmail.com", "Romaine Beckford");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/plain", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response = $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo 'Email exception Caught : '. $e->getMessage() . "\n";
                return false;
            }
        }


    }

?>