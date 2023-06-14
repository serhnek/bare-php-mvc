<?php

namespace View;

use Dto\FormDto;

class FormView
{
    public function render(?FormDto $dto): string
    {
        // set template parameters
        $title = 'Test title';
        $header = 'Test header';
        $textarea = htmlspecialchars($dto->textArea ?? '', ENT_QUOTES); // prevent XSS
        $token = \Helper\CSRF::generateToken(); // prevent CSRF
        // render template
        return require('template/form.html');
    }
}
