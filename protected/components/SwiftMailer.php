<?php

/**
 * This component is for sending email from localhost with SMTP
 */
class SwiftMailer {

    /*
     * Gmail account username
     */
    public $username = 'libertydevdev@gmail.com';
    /*
     * Gmail account password
     */
    public $password = 'G&YU&H*(JK';
    /*
     * Protocol
     */
    public $protocol = 'ssl';
    /*
     * Host mail address
     */
    public $mailHost = 'smtp.gmail.com';
    /*
     * Mail port
     */
    public $mailPort = 465;
    /*
     * Send From Email and Description name
     */
    public $setFrom = array("devaccnarek@gmail.com" => "anyvue");

    public function __construct() {
        require_once dirname(__FILE__) . '/../extensions/swiftMailer/lib/swift_required.php';
    }
    /*
     * Params
     * $to
     * $subject
     * $messageText
     * $files is optional
     */
    public function sendEmail($to, $subject, $messageText, $files = array()) {        
        $transport = Swift_SmtpTransport::newInstance($this->mailHost, $this->mailPort, $this->protocol)
            ->setUsername($this->username)
            ->setPassword($this->password);

        //Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);

        if (!is_array($to))
            $to = array($to);

        //Create a message
        $message = Swift_Message::newInstance($subject)
            ->setFrom($this->setFrom)
            ->setTo($to)
            ->setBody($messageText, 'text/html');

        if (is_array($files) && count($files) > 0)
            foreach ($files as $file) {
                $message->attach(Swift_Attachment::fromPath($file));
            }

        return $mailer->send($message);
    }
}