<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;

class Patient extends BaseController
{
    public function index()
    {
       // return view('Frontend/Patient/login');

        if(isset(session('patient')['id']))
        {
            return view('/Patient/index');
        }
        else
        {
            return redirect()->to(base_url('/Patient/login'));
        }
        //
    }

    public function register()
    {
        //
        return view('Frontend/Patient/register');
    }

    // public function profile()
    // {
    //     //
    //     return view('Frontend/Patient/register');
    // }


    public function dash()
    {
        //
        $patients = new PatientModel();
        $data['patient'] = $patients->findAll();
        return view('Frontend/Patient/dash', $data);
    }

    public function savePatient()
    {
        //
        $patients = new PatientModel();
        $data = [
            'nom' => $this->request->getVar('nom'),
            'prenom' => $this->request->getVar('prenom'),
            'date_de_naissance' => $this->request->getVar('date'),
            'sexe' => $this->request->getVar('sexe'),
            'telephone' => $this->request->getVar('tel'),
            'email' => $this->request->getVar('email'),
            'mdp' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            ];
            
        $patients->insert($data);
        session()->setFlashData("success", "Votre compte a été crée avec succés");
        return redirect()->to(base_url('/Patient/login'));
    }

    public function login()
    {
        //
        $patients = new PatientModel();

        $email =  $this->request->getVar('email');
        $mdp = $this->request->getVar('password');
        $user = $patients->where('email',$email)->first();

    //          //Debugging statements
    // echo 'Email: ' . $email . '<br>';
    // echo 'Password: ' . $mdp . '<br>';
    // echo 'User: ' . print_r($user, true) . '<br>';

        if ($user) {
            if (password_verify($mdp, $user['mdp'])) {
                
                session()->set('patient', $user);

                return redirect()->to(base_url('/Patient/dash'));

                }
            else
            {
                echo "Mot de passe incorrect";

                return redirect()->to(base_url('/Patient/login'));

            }
        } 
        else 
        {
                 
            echo "Cet email n\'existe pas";

            return redirect()->to(base_url('/Patient/login'));
        }
    }

    public function profile()
    {
        return view('Frontend/Patient/page-profile');
    }


    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('/Patient/login'));
    }
    
}
