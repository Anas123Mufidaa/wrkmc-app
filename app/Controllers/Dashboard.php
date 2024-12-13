<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    protected $modelAuth;
    public function __construct() {
        $this->modelAuth = new ModelAuth();
    }
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'data_user' => $this->modelAuth->dataUser(),
        ];
        return view('dashboard',$data);
    } 
}
