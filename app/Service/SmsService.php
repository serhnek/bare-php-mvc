<?php

namespace Service;

class SmsService extends AbstractService
{
    private string $to;
    private string $message;

    public function __construct(string $to, string $message)
    {
        $this->to = $to;
        $this->message = $message;
    }

    public function send()
    {
        // TODO: use message queue to send sms asynchronously
    }
}
