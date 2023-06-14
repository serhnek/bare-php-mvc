<?php

namespace Service;

class EmailService extends AbstractService
{
    private $to;
    private $subject;
    private $message;
    private $headers;

    public function __construct($to, $subject, $message)
    {
        $this->to = $to;
        $this->subject = $subject;
        $this->message = $message;
        $this->headers = "From: test@example.com\r\n";
    }

    public function send()
    {
        // TODO: use message queue to send mail asynchronously
        //mail($this->to, $this->subject, $this->message, $this->headers);
    }
}
