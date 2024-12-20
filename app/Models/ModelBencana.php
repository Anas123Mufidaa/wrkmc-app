<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBencana extends Model
{
    protected $table            = 'bencana';
    protected $primaryKey       = 'id_bencana';
    protected $allowedFields    = ['user_created','jenis_kejadian','hari_kejadian','tanggal_kejadian'
                                   ,'waktu_kejadian','penyebab_kronologis','curahHujan_PosAir','dampak_bencana','lama_bahaya','tindakan','kondisi','usulan','tebusan'];
    // Dates
    protected $useTimestamps = true;


    public function getAllData()
    {
        return $this->select('bencana.*, 
                              user_created.nama_user AS created_by')
                    ->join('user AS user_created', 'user_created.id_user = bencana.user_created', 'LEFT')
                    ->findAll();
    }

    public function countBencana(){
        return $this->db->table('bencana')->select('COUNT(*) as total_bencana')
               ->get()->getRowArray();
    }
}
