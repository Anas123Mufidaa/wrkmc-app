<?php

namespace App\Controllers\Sda;

use App\Controllers\BaseController;

class PenilaianKinerja extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Penilaian Kinerja Sumber Daya Air',
        ];
        return view('sda/penilaian-kinerja',$data);
    } 
}
