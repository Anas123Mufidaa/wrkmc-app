<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelBencana;
use App\Models\ModelSda;
use App\Models\ModelPenilaianKinerja;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $modelAuth;
    protected $modelBencana;
    protected $modelPenilaian;
    public function __construct() {
        $this->modelAuth = new ModelAuth();
        $this->modelBencana = new ModelBencana();
        $this->modelSda = new ModelSda();
        $this->modelPenilaian = new ModelPenilaianKinerja();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'data_user' => $this->modelAuth->dataUser(),
            'user' => $this->modelAuth->countUser(),
            'bencana' => $this->modelBencana->countBencana(),
            'sda' => $this->modelSda->countSda(),
            'penilaian' => $this->modelPenilaian->countNilaiKinerja(),
        ];
        return view('dashboard',$data);
    } 
}
