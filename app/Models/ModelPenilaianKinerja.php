<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenilaianKinerja extends Model
{
    protected $table            = 'penilaian_sda';
    protected $primaryKey       = 'id_penilaian';
    protected $allowedFields    = ['user_created','user_updated','id_sda','tanggal_penilaian','nilai_kinerja','catatan_penilaian'];
    // Dates
    protected $useTimestamps = true;
    public function getAllData(){
        return $this->db->table('penilaian_sda')
                          ->join('sda','sda.id_sda=penilaian_sda.id_sda')
                          ->get()
                          ->getResultArray();                          
    }
    // public function getDetailData($id){
    //     return $this->db->table('penilaian_sda')
    //           ->join('sda','sda.id_sda=penilaian_sda.id_sda','LEFT')
    //           ->where('id_penilaian' , $id)
    //           ->get()->getRowArray();                          
    // }
}
