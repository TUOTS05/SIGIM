<?php

namespace App\Controllers;

use App\Models\Alert_notifModel;

class Alert_notif extends BaseController
{
    // ACCUEIL KOUAME
    public function index()
    {
        return view('Frontend/Accueil/index');
      
    }


    public function save(){
        $alert_notif = new Alert_notifModel();

        $data = [
            'id_exp' => 64,
            'id_dest' => $this->request->getVar('id_dest'),
            'message' => $this->request->getVar('message'),
            ];

            $query = $alert_notif->insert($data);
    }


    public function view_my_notif(){
        $alert_notif = new Alert_notifModel();

        $data['alert_notif'] = $alert_notif->findAll();

        return view('Backend/Prosante/check_notifications',$data);
      
    }

    // FIN ACCUEIL
}
