<?php

namespace App\Traits;

trait MAIL
{
    public static function resetPasswordEmail($mail_body, $email) {
        try {
            require base_path("vendor/autoload.php");

            $mail = new \PHPMailer\PHPMailer\PHPMailer();
            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = config('mail.host');
            $mail->SMTPAuth = true;
            $mail->Username = config('mail.username');
            $mail->Password = config('mail.password');
            $mail->SMTPSecure = config('mail.encryption');
            $mail->Port = config('mail.port');
            $mail->setFrom('admin@multikart.com', 'Multikart');
            $mail->addAddress($email);
            $mail->isHTML(true);

            $mail->Subject = 'Password Reset Request for Multikart';
            $mail->Body    = $mail_body;

            if(!$mail->Send()){
                return 0;
            }else{
                return 1;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function OrderPlaceEmail($mail_body,$user) {
        try {
            require base_path("vendor/autoload.php");

            $mail = new \PHPMailer\PHPMailer\PHPMailer();
            // $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = config('mail.host');
            $mail->SMTPAuth = true;
            $mail->Username = config('mail.username');
            $mail->Password = config('mail.password');
            $mail->SMTPSecure = config('mail.encryption');
            $mail->Port = config('mail.port');
            $mail->setFrom('admin@multikart.com', 'Multikart');
            $mail->addAddress($user->email);
            $mail->isHTML(true);

            $mail->Subject = 'Order Place Successfully';
            $mail->Body    = $mail_body;

            if(!$mail->Send()){
                return 0;
            }else{
                return 1;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function EmailVerification($mail_body,$email) {
        try {
            require base_path("vendor/autoload.php");

            $mail = new \PHPMailer\PHPMailer\PHPMailer();
            // $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = config('mail.host');
            $mail->SMTPAuth = true;
            $mail->Username = config('mail.username');
            $mail->Password = config('mail.password');
            $mail->SMTPSecure = config('mail.encryption');
            $mail->Port = config('mail.port');
            $mail->setFrom('admin@multikart.com', 'Multikart');
            $mail->addAddress($email);
            $mail->isHTML(true);

            $mail->Subject = 'Multikart | Verify you email address';
            $mail->Body    = $mail_body;

            if(!$mail->Send()){
                return 0;
            }else{
                return 1;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
