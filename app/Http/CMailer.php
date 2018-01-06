<?php

namespace app\CustomClasses;
use PHPMailer;

class CMailer
{
    protected static $host= "send.one.com";
    protected static $port= 465;
    protected static $encryption= 'ssl';
    protected static $username= "sales@sidsdiy.com";
    protected static $password= 'sids123';
    protected static $from= 'sales@sidsdiy.com';
    /**
     * Sending email by PHPMailer
     *
     * @param  string  $fromName
     * @param  string  $to
     * @param  string  $subject
     * @param  string  $message
     * @return TRUE
     */
    public static function send($fromName, $to, $subject, $message){
        $mail= new PHPMailer();
                $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
                $mail->SMTPDebug = 0;

        //Ask for HTML-friendly debug output
                $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
                $mail->Host = self::$host;

        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
                $mail->Port = self::$port;

        //Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = self::$encryption;

        //Whether to use SMTP authentication
                $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
                $mail->Username =self::$username;

        //Password to use for SMTP authentication
                $mail->Password = self::$password;


        //Set who the message is to be sent from: this is sender email
                $mail->setFrom(self::$from, $fromName);

        //Set who the message is to be sent to
                $mail->addAddress($to, 'Ackosoft Ltd');


        //Set the subject line
                $mail->Subject =$subject;
                $mail->msgHTML($message);

                if (!$mail->send()) {
                   // return $mail;
                    return false;
                } else {
                    return true;
                }
    }
}