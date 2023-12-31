<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TestEmail extends BaseController
{
    public function index()
    {
        $email = \Config\Services::email();

        $email->setFrom('your@example.com', 'Your Name');
        $email->setTo('someone@example.com');
        $email->setCC('another@another-example.com');
        $email->setBCC('them@their-example.com');

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class.');

        $email->send();
    }
}
