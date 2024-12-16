<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenilaianKinerja extends Model
{
    protected $table            = 'penilaian_sda';
    protected $primaryKey       = 'id_penilaian';
    protected $allowedFields    = ['user_created','user_updated','id_sda','tanggal_penilaian','nilai_kinerja','catatan_penilaiain'];
    // Dates
    protected $useTimestamps = true;
}
