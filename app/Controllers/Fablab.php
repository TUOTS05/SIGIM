<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FablabModel;

class Fablab extends BaseController
{

    public function __construct()
    {

        // return view('Backend/Fablab/login');

        // if (isset(session('patient')['id'])) {
        //     return view('/Fablab/index');
        // } else {
        //     return redirect()->to(base_url('/Fablab/login'));
        // }
        //
    }

    public function dash()
    {
        if (isset(session('fablab')['id'])) {
            $fablab = new FablabModel();
            $data['fablab'] = $fablab->findAll();
            return view('Backend/Fablab/index', $data);
        } else {
            return redirect()->to(base_url('/Fablab'));
        }
    }


    public function login()
    {
        //

        return view('Backend/Fablab/login');
    }




    public function register()
    {
        return view('Backend/Fablab/register');
    }

    # Fonction de connexion au dashboard patient --------------

    public function loginFablab()
    {

        //
        $fablab = new FablabModel();

        $email =  $this->request->getVar('email');
        $mdp = $this->request->getVar('password');

        $user = $fablab->where('email', $email)->first();

        if ($user) {
            if (password_verify($mdp, $user['mdp'])) {

                session()->set('fablab', $user);

                return redirect()->to(base_url('/Fablab/dash'));
            } else {
                echo "Mot de passe incorrect";

                return redirect()->to(base_url('/Fablab/login'));
            }
        } else {
        }
    }

    # ------------ Session du dashboard patient -------------------


    # ----- Enregistrement des informations du fablab dans la base de données--------------

    public function saveFablab()
    {


        $rules = [
            'nom' => 'required|min_length[3]|max_length[20]',
            'prenom' => 'required|min_length[3]|max_length[20]',
            'service' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|min_length[6]|max_length[100]|valid_email|is_unique[fablabs.email]',
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
            return view('Backend/Fablab/register', ['validation' => $this->validator]);
        } else {
            $fablab = new FablabModel();
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

        /*   $message = "Merci de votre inscription. Activer votre compte".anchor(uri:'/Fablab/activate/'.$data['lien'], title:' Activer maintenant', attributes:''); */


        $message = "<!DOCTYPE html>" .
            "<html lang='fr'>" .
            "<head>" .
            "<meta charset='UTF-8'>" .
            "<meta name='viewport' content='width=device-width, initial-scale=1.0'>" .
            "<title>Mail SIGIM</title>" .
            "</head>" .
            "<body style='background-color:white;font-family:verdana;width:100%;display:flex;justify-content:center;'>" .
            "<section style='border:2px solid #dbdbdb;text-align:center;display:flex;justify-content:center;max-width:400px;'>" .
            "<div>" .
            "<div class='header'>" .
            "<img src='../assets/images/sigim.png'>" .
            "</div>" .
            "<div class='body-section'>" .
            "<div class='title-section' style='font-size:26px;font-weight:bolder;margin:16px 0;text-transform:capitalize'>" . "felicitaion" . "</div>" .
            "<hr style='width: 50%;'>" .
            "<div class='body-section-content' style='padding:16px;font-style:justify'>" .
            "Suite à votre requete d'integrer la famille" . "<b>" . "<a href='https://www.youtube.com' style='text-transform: underline;'>" . "SIGIM" . "</a>" . "</b>" . "nous venons par ce mail vous informer que votre compte a bien été crée avec succes !! " . "<br>" .
            "Vos informations de connexion ce trouve ci-deçous :" .
            "<div style='font-weight:bold;'>" . "lien de connexion :" . "<span>" . "<a href='https://www.youtube.com'>" . "lien.com" . "</a>" . "</span>" . "</div>" .
            "<div style='font-weight:bold;'>" . "Email :" . "<span>" .$this->request->getVar('email'). "</span>" . "</div>" .
            "<div style='font-weight:bold;'>" . "Mot de passe :" . "<span>" . $this->request->getVar('mdp') ."</span>" . "</div>" .
            "</div>" .
            "</div>" .
            "<div class='footer' style='background-color:#004aad;height:40px;display:flex;justify-content:center;align-items:center'>" .
            "<div style='font-style:italic;color:white;font-size:smaller;font-weight:bold;'>" . "@ Tout droit reservé SIGIM" . "</div>" .
            "</div>" .
            "</div>" .
            "</section>" .
            "</body>" .
            "</html>";


        $query = $fablab->insert($data);

        if (!$query) {
            return redirect()->back('/Fablab/register')->with("fail", "quelque chose s'est mal pasesée");
        } else {
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
        return redirect()->to(base_url('/Fablab/register'))->with("success", "Votre compte a été crée avec succés");
    }


    public function activate($token)
    {
        $fablab = new FablabModel();
        $verifToken = $fablab->where('lien', $token)->findAll();
        if (count($verifToken) > 0) {
            $data['status'] = 1;
            $activateFablab = $fablab->update($verifToken[0]['id'], $data);
            if ($activateFablab) {
                return redirect()->to('/Fablab')->with('success', 'Votre compte a été activé, vous pouvez maintenant vous connecter.');
            }
        } else {
            echo 'Not found';
        }
    }


    public function profile()
    {
        if (isset(session('fablab')['id'])) {
            return view('/Fablab/page-profile');
        } else {
            return redirect()->to(base_url('/Fablab'));
        }
    }


    public function logout()
    {
        if (isset(session('fablab')['id'])) {
            session()->destroy();
            return redirect()->to(base_url('/Fablab'));
        } else {
            return redirect()->to(base_url('/Fablab'));
        }
    }
}
