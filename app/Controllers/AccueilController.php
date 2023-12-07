<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AccueilController extends BaseController
{
    public function index()
    {
        return view('Frontend/Accueil/index');
    }
}
