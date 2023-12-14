<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PatientModel;

class Patient extends BaseController
{
    public function __construct()
    {

        // return view('Frontend/Patient/login');

        // if (isset(session('patient')['id'])) {
        //     return view('/Patient/index');
        // } else {
        //     return redirect()->to(base_url('/Patient/login'));
        // }
        //
    }
    

    public function login()
    {
        return view('Frontend/Patient/login');
    }


    public function register()
    {
        return view('Frontend/Patient/register');
    }

    # Fonction de connexion au dashboard patient --------------

    public function loginPatient()
    {

        //
        $patients = new PatientModel();

        $email =  $this->request->getVar('email');
        $mdp = $this->request->getVar('password');

        $user = $patients->where('email', $email)->first();

        if ($user) {
            if (password_verify($mdp, $user['mdp'])) {

                session()->set('patient', $user);

                return redirect()->to(base_url('/Patient/dash'));
            } else {
                echo "Mot de passe incorrect";

                return redirect()->to(base_url('/Patient/login'));
            }
        } else {


        
        }
    }

    # ------------ Session du dashboard patient -------------------

    public function dash()
    {
         if(isset(session('patient')['id']))
        {
            $patients = new PatientModel();
            $data['patient'] = $patients->findAll();
           return view('Frontend/Patient/dash', $data);
        }
        else{
            return redirect()->to(base_url('/Patient'));
        }
    }

# ----- Enregistrement des informations du patient dans la base de données--------------

    public function savePatient()
    {
        $rules = [
            'nom' => 'required|min_length[3]|max_length[20]',
            'prenom' => 'required|min_length[3]|max_length[20]',
            'date' => 'required',
            'sexe' => 'required',
            'tel' => 'required|max_length[10]',
            'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[patient.email]',
            'password' => 'required|min_length[8]|max_length[255]',
            'confirm_password' => 'required|matches[password]',
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

            'date' => [
                'required' => 'Le champ date est requis.',
             ],

            'sexe' => [
                'required' => 'Le champ sexe est requis.',
             ],
             
            'tel' => [
                'required' => 'Le champ tel est requis.',
                'min_length' => 'Le tel doit avoir au moins 8 caractères.',
                'max_length' => 'Le tel ne peut pas dépasser 10 caractères.'
             ],

            'email' => [
                'required' => 'Le champ email est requis et doit être valide.',
             ],

            'password' => [
                'required' => 'Le champ password est requis.',
                'min_length' => 'Le password doit avoir au moins 8 caractères.',
                'max_length' => 'Le password ne peut pas dépasser 20 caractères.'
             ],

            'confirm_password' => [
                'required' => 'Le champ confirm_password est requis.',
                'min_length' => 'Le confirm_password doit avoir au moins 8 caractères.',
                'max_length' => 'Le confirm_password ne peut pas dépasser 20 caractères.'
             ],
        ];
    
        if (!$this->validate($rules, $messages)) {
            return view('Frontend/Patient/register', ['validation' => $this->validator]);
        }
        else {
            $patients = new PatientModel();
            $token = bin2hex(random_bytes(20));
            $data = [
                'nom' => $this->request->getVar('nom'),
                'prenom' => $this->request->getVar('prenom'),
                'date_de_naissance' => $this->request->getVar('date'),
                'sexe' => $this->request->getVar('sexe'),
                'telephone' => $this->request->getVar('tel'),
                'email' => $this->request->getVar('email'),
                'mdp' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                'lien' => $token,
                ];
        }

        $message = "Merci de votre inscription. Activer votre compte".anchor(uri:'/Patient/activate/'.$data['lien'], title:' Activer maintenant', attributes:'');
        
        $query = $patients->insert($data);
        
        if (!$query) {
            return redirect()->back('/Patient/register')->with("fail", "quelque chose s'est mal pasesée");
        }else{
            $to = $this->request->getVar('email');
            $email = \Config\Services::email();
            $email->setTo($to);
            $email->setFrom('tcheregnimin.tuo@uvci.edu.ci');  
            $email->setSubject('Confirmation inscription');
            $email->setMessage($message);  
            $email->send();
            $data = $email->printDebugger(['headers']);
                print_r($data); 
            }
            //$this->sendConfirmationEmail($data['email']);
            return redirect()->to(base_url('/Patient/register'))->with("success", "Votre compte a été crée avec succés");
    }


    public function activate($token)
    {
        $patient = new PatientModel();
        $verifToken = $patient->where('lien', $token)->findAll();
        if (count($verifToken) > 0) {
            $data['status'] = 1;
            $activatePatient = $patient->update($verifToken[0]['id'], $data);
            if ($activatePatient) {
                return redirect()->to('/Patient')->with('success','Votre compte a été activé, vous pouvez maintenant vous connecter.');
            }
        }
        else{
            echo 'Not found';
        }
    }

    
    public function profile()
    {
        if(isset(session('patient')['id']))
        {
            return view('/Patient/page-profile');
        }else{
            return redirect()->to(base_url('/Patient'));
        }
    }


    public function logout(){
        if(isset(session('patient')['id']))
        {
            session()->destroy();
            return redirect()->to(base_url('/Patient'));
        }
        else{
            return redirect()->to(base_url('/Patient'));
        }

    }
}
