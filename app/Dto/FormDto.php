<?php

namespace Dto;

class FormDto
{
    public $textArea = '';

    public function __construct($textArea = '')
    {
        $this->textArea = $textArea;
    }
}