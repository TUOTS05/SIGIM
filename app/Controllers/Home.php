<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Frontend/Accueil/index');
    }
    public function contact(): string
    {
        return view('Frontend/Accueil/contact');
    }
    public function apropo(): string
    {
        return view('Frontend/Accueil/apropos');
    }
}