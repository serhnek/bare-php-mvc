<?php

namespace Controller;

use Dto\FormDto;
use Model\FormModel;
use View\FormView;

class FormController extends AbstractController
{
    protected ?FormDto $dto = null;

    public function dispatch()
    {
        $this->handleForm();
        (new FormView())->render($this->dto);
    }

    protected function handleForm()
    {
        if (
            !isset($this->requestData['submit']) ||
            !isset($this->requestData['textarea']) ||
            !\Helper\CSRF::checkToken($this->requestData['token'])
        ) {
            return;
        }

        // trim and sanitize the string
        $value = filter_var(trim($this->requestData['textarea']), FILTER_SANITIZE_STRING);
        if ($value === false || $value === '') {
            return;
        }

        $this->dto = new FormDto($value);

        $this->insertModel();

        $this->notifyForChanges();
    }

    protected function insertModel()
    {
        $model = new FormModel(\Helper\PdoFactory::create());
        // insert the data into the database
        $id = $model->insert($this->dto);
        // select the data from the database
        $this->dto = $model->select($id);
    }

    protected function notifyForChanges()
    {
        $email = new \Service\EmailService(EMAIL_ADDRESS, EMAIL_ADDRESS, $this->dto->textArea);
        $email->send();

        $sms = new \Service\SmsService(SMS_ADDRESS, SMS_MESSAGE . $this->dto->textArea);
        $sms->send();
        var_dump($this->dto->textArea);
    }
}
