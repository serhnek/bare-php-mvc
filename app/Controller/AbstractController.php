<?php

namespace Controller;

abstract class AbstractController
{
    protected array $requestData;

    public function __construct($requestData = [])
    {
        $this->requestData = $requestData;
        session_start();
    }

    abstract public function dispatch();
}
