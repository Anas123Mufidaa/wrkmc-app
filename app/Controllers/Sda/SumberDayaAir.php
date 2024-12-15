<?php

namespace App\Controllers\Sda;

use App\Controllers\BaseController;

class SumberDayaAir extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Data Sumber Daya Air',
        ];
        return view('sda/sumber-daya-air',$data);
    } 
}
