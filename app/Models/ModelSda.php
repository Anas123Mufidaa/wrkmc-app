<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSda extends Model
{
    protected $table            = 'sda';
    protected $primaryKey       = 'id_sda';
    protected $allowedFields    = ['user_created','user_updated','nama_sda','jenis_sda','alamat','gambar_sda','deskripsi_sda'];
    // Dates
    protected $useTimestamps = true;


    public function getAllData()
    {
        return $this->select('sda.*, 
                              user_created.nama_user AS created_by, 
                              user_updated.nama_user AS updated_by')
                    ->join('user AS user_created', 'user_created.id_user = sda.user_created', 'LEFT')
                    ->join('user AS user_updated', 'user_updated.id_user = sda.user_updated', 'LEFT')
                    ->findAll();
    }

    public function getDetailData($id){
        return$this->select('sda.*, 
                              user_created.nama_user AS created_by, 
                              user_updated.nama_user AS updated_by')
                    ->join('user AS user_created', 'user_created.id_user = sda.user_created', 'LEFT')
                    ->join('user AS user_updated', 'user_updated.id_user = sda.user_updated', 'LEFT')
                    ->find($id);                         
    }

    public function countSda(){
        return $this->db->table('sda')->select('COUNT(*) as total_sda')
               ->get()->getRowArray();
    }
}
