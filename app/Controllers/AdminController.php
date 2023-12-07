<?php


namespace App\Controllers;

use App\Models\UserModel;

use App\Controllers\BaseController;
use CodeIgniter\Validation\StrictRules\Rules;

class AdminController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }
   

    public function index()
    {
        return view('Backend/Admin/index');
    }

    // public function login()
    // {
    //     return view('Backend/Admin/login');
    // }

    // public function register()
    // {
    //     return view('Backend/Admin/register');
    // }
    //--------------------------------------------------------------------
#   Enregistrer un utilisateur
    public function storeUser()
    {
        // $validated = $this->validate([
        //     'name' => [
        //         'rules'  => 'required|min_length[3]|max_length[255]',
        //         'errors' => [
        //             'required' => '{field} est obligatoire.',
        //             'min_length'=> '{field} doit contenir au moins 3 caractères.',
        //             'max_length'=> '{field} ne peut pas dépasser les 255 caractères.'
        //         ]
        //     ],
        //     'email' => [
        //         'rules'  => 'required|is_unique[users.email]|valid_email',
        //         'errors' => [
        //             'required' => '{field} est obligatoire.',
        //             'is_unique'=> '{field} existe déjà dans la base de données.',
        //             'valid_email'=> '{field} n\'est pas une adresse email valide.'
        //         ]
        //     ],
        //     'password' => [
        //         'rules'  => 'required|min_length[8]|max_length[255]',
        //         'errors' => [
        //             'required' => '{field} est obligatoire.',
        //             'min_length'=> '{field} doit contenir au moins 8 caractères.',
        //             'max_length'=> '{field} ne peut pas dépasser les 255 caractères.'
        //         ]
        //     ],
        //     'confirm-password' => [
        //         'rules'  => 'matches[password]',
        //         'errors' => [
        //             'matches' => '{field} ne correspond pas à votre mot de passe.'
        //         ]
        //     ]
        // ]);

        // if (!$validated) {
        //     session()->setFlashdata('error', $this->validator->listErrors());
        //     return view('Backend/Admin/register');

        //     } else {
        //         //Enregistrement d'un utilisateur
        //         $userModel = new UserModel();
        //         $data = [
        //             'name'     => $this->request->getVar('name'),
        //             'email'    => $this->request->getVar('email'),
        //             'mdp' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
        //             // 'role'     => $this->request->getVar('role'),
        //         ];
        //         $userModel->save($data);
        //         session()->setFlashdata('success','Utilisateur enregistré avec succès!');
        //         return redirect()->to('/Admin/login');
        //     }
        
    }
}