<?php

namespace App\Controllers;

use App\Models\HopitalModel;
use App\Controllers\BaseController;

class Hopital extends BaseController
{
    public function __construct()
    {

        // return view('Backend/Hopital/login');

        // if (isset(session('patient')['id'])) {
        //     return view('/Hopital/index');
        // } else {
        //     return redirect()->to(base_url('/Hopital/login'));
        // }
        //
    }
    

    public function login()
    {
        return view('Backend/Hopital/login');
    }


    public function register()
    {
        return view('Backend/Hopital/register');
    }

    # Fonction de connexion au dashboard patient --------------

    public function loginHopital()
    {

        //
        $hopital = new HopitalModel();

        $email =  $this->request->getVar('email');
        $mdp = $this->request->getVar('password');

        $user = $hopital->where('email', $email)->first();

        if ($user) {
            if (password_verify($mdp, $user['mdp'])) {

                session()->set('hopital', $user);

                return redirect()->to(base_url('/Hopital/dash'));
            } else {
                echo "Mot de passe incorrect";

                return redirect()->to(base_url('/Hopital/login'));
            }
        } else {


        
        }
    }

    # ------------ Session du dashboard patient -------------------

    public function dash()
    {
         if(isset(session('hopital')['id']))
        {
            $hopital = new HopitalModel();
            $data['hopital'] = $hopital->findAll();
           return view('Backend/Hopital/index', $data);
        }
        else{
            return redirect()->to(base_url('/Hopital'));
        }
    }

# ----- Enregistrement des informations du patient dans la base de données--------------

    public function saveHopital()
    {
        $rules = [
            'nom' => 'required|min_length[3]|max_length[20]',
            'prenom' => 'required|min_length[3]|max_length[20]',
            'service' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[hopitals.email]',
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
    
        if (!$this->validate($rules, $messages)) {
            return view('Backend/Hopital/register', ['validation' => $this->validator]);
        }
        else {
            $hopital = new HopitalModel();
            $token = bin2hex(random_bytes(20));
            $data = [
                'nom' => $this->request->getVar('nom'),
                'prenom' => $this->request->getVar('prenom'),
                'service' => $this->request->getVar('service'),
                'email' => $this->request->getVar('email'),
                'mdp' => password_hash($this->request->getVar('mdp'), PASSWORD_BCRYPT),
                'lien' => $token,
                ];
        }

        $message = "Merci de votre inscription. Activer votre compte".anchor(uri:'/Hopital/activate/'.$data['lien'], title:' Activer maintenant', attributes:'');
        
        $query = $hopital->insert($data);
        
        if (!$query) {
            return redirect()->back('/Hopital/register')->with("fail", "quelque chose s'est mal pasesée");
        }else{
            $to = $this->request->getVar('email');
            $email = \Config\Services::email();
            $email->setTo($to);
            $email->setFrom('pli.dago@uvci.edu.ci');  
            $email->setSubject('Confirmation inscription');
            $email->setMessage($message);  
            $email->send();
            $data = $email->printDebugger(['headers']);
                print_r($data); 
            }
            //$this->sendConfirmationEmail($data['email']);
            return redirect()->to(base_url('/Hopital/register'))->with("success", "Votre compte a été crée avec succés");
    }


    public function activate($token)
    {
        $hopital = new HopitalModel();
        $verifToken = $hopital->where('lien', $token)->findAll();
        if (count($verifToken) > 0) {
            $data['status'] = 1;
            $activateHopital = $hopital->update($verifToken[0]['id'], $data);
            if ($activateHopital) {
                return redirect()->to('/Hopital')->with('success','Votre compte a été activé, vous pouvez maintenant vous connecter.');
            }
        }
        else{
            echo 'Not found';
        }
    }

    
    public function profile()
    {
        if(isset(session('hopital')['id']))
        {
            return view('/Hopital/page-profile');
        }else{
            return redirect()->to(base_url('/Hopital'));
        }
    }


    public function logout(){
        if(isset(session('hopital')['id']))
        {
            session()->destroy();
            return redirect()->to(base_url('/Hopital'));
        }
        else{
            return redirect()->to(base_url('/Hopital'));
        }

    }
}
