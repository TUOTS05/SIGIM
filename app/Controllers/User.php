<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        return view('Backend/Admin/login');
        if (isset(session('users')['id'])) {

            return view('/Admin/index');
            
        } else {

            return redirect()->to(base_url('/login'));
        }
    }

    public function register()
    {
        return view('Backend/Admin/register');
    }

    public function storeUser()
    {
        $users = new UserModel();

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = password_hash('password', PASSWORD_BCRYPT);

        $data = [
            'name' => $name,
            'email' => $email,
            'mdp' => $password
            ];

        $users->insert($data);

        return view('Backend/Admin/login');
    }

    public function login()
    {
        $users = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $users->where(['email'=>$email])->first();

    //     // Debugging statements
    // echo 'Email: ' . $email . '<br>';
    // echo 'Password: ' . $password . '<br>';
    // echo 'User: ' . print_r($user, true) . '<br>';
    
// echo 'Stored Hashed Password: ' . $user['mdp'] . '<br>';
// echo 'Generated Hashed Password: ' . password_hash($password, PASSWORD_BCRYPT) . '<br>';

        if ($user)
        {
            if (password_verify($password, $user['mdp']))
            {
                session()->set('users', $user);
                    return redirect()->to(base_url('/Admin'));
            }
            else
            {
                echo "Mot de passe incorrect";
            }
        }
        else
        {
            echo "Cet utilisateur n'existe pas";
        }
    }
                //--------------------------------------------------------------------
    public function logout(){
        session()->destroy();
            return redirect('/Admin');
    }
}