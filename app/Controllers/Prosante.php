<?php

namespace App\Controllers;

use App\Models\PatientModel;
use App\Models\ProsanteModel;
use App\Controllers\BaseController;

class Prosante extends BaseController
{

    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function index()
    {
        //

        if (isset(session('Prosante')['id'])) {
            return view('Backend/Prosante/index');
        } else {
            return redirect()->to(base_url('/Prosante/login'));
        }
    }


    // page d'inscrition
    public function register()
    {
        //


        $rules = [
            'nom' => 'required|min_length[3]|max_length[20]',
            'prenom' => 'required|min_length[3]|max_length[20]',
            'service' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[prosantes.email]',
            'mdp' => 'required|min_length[8]|max_length[255]',
            'mdp_c' => 'required|matches[mdp]',
        ];

        $messages = [
            'nom' => [
                'required' => 'Le champ nom est requis.',
                'min_length' => 'Le nom doit avoir au moins 3 caractères.',
                'max_length' => 'Le nom ne peut pas dépasser 20 caractères.'
            ],
            'prenom' => [
                'required' => 'Le champ prenom est requis.',
                'min_length' => 'Le prenom doit avoir au moins 3 caractères.',
                'max_length' => 'Le prenom ne peut pas dépasser 20 caractères.'
            ],
            'service' => [
                'required' => 'Le champ prenom est requis.',
                'min_length' => 'Le prenom doit avoir au moins 3 caractères.',
                'max_length' => 'Le prenom ne peut pas dépasser 20 caractères.'
            ],

            'email' => [
                'required' => 'Le champ email est requis et doit être valide.',
            ],

            'mdp' => [
                'required' => 'Le champ password est requis.',
                'min_length' => 'Le password doit avoir au moins 8 caractères.',
                'max_length' => 'Le password ne peut pas dépasser 20 caractères.'
            ],

            'mdp_c' => [
                'required' => 'Le champ confirm_password est requis.',
                'min_length' => 'Le confirm_password doit avoir au moins 8 caractères.',
                'max_length' => 'Le confirm_password ne peut pas dépasser 20 caractères.'
            ],

        ];


        if ($this->request->is('post')) {


            if (!$this->validate($rules, $messages)) {
                return view('Backend/Prosante/register', ['validation' => $this->validator]);
            } else {
                $prosante = new ProsanteModel();
                $data = [
                    'nom' => $this->request->getVar('nom'),
                    'prenom' => $this->request->getVar('prenom'),
                    'service' => $this->request->getVar('service'),
                    'email' => $this->request->getVar('email'),
                    'mdp' => password_hash($this->request->getVar('mdp'), PASSWORD_BCRYPT),
                ];
            }



            $query = $prosante->insert($data);

            if (!$query) {
                return redirect()->back('/Prosante/register')->with("fail", "quelque chose s'est mal pasesée");
                # code...
            } else {

                return redirect()->to(base_url('/Prosante/register'))->with("success", "Votre compte a bien été crée pour l'activer verifier votre boite de messagerie !");
            }
        } else {
            return view('Backend/Prosante/register');
        }
    }

    public function register_prosante($key)
    {


        if (isset(session('Prosante')['id'])) {

         

                $patient = new PatientModel();
               $data = [
                    'groupe_sanguin' => $this->request->getVar('groupe_sanguin'),
                    'taille' => $this->request->getVar('taille'),
                    'poids' => $this->request->getVar('poids'),
                    'allergie' => $this->request->getVar('allergie'),
                    'note' => $this->request->getVar('note'),

                ];



                $data['patient'] = $patient->where('id', $key)->first();

              if ($this->request->is('post')) {

                     $patient->update($key, $data);
            }





                return view('Backend/Prosante/register-prosante', $data);
            } else {
                return redirect()->to(base_url('/Prosante/login'));
            }
       
    }



    // page de connexion
    public function login()
    {


        $ProsanteModel = new ProsanteModel();

        $email =  $this->request->getVar('email');
        $mdp = $this->request->getVar('mdp');

        if ($this->request->is('post')) {


            $prosante = $ProsanteModel->where('email', $email)->first();


            if ($prosante) {
                if (password_verify($mdp, $prosante['mdp'])) {

                    session()->set('Prosante', $prosante);

                    return redirect()->to(base_url('/Prosante'));
                } else {
                    echo "Mot de passe incorrect";

                    /* return redirect()->to(base_url('/Prosante/login')); */
                }
            } else {

                echo "Cet email n\'existe pas";

                /* return redirect()->to(base_url('/Prosante/login')); */
            }
        } else {
            return view('Backend/Prosante/login');
        }
    }


    public function profile()
    {
        return view('Frontend/Prosante/page-profile');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/Prosante/login'));
    }



}
