<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenilaianKinerja;
use App\Models\ModelBencana;
use App\Models\ModelSda;

class Home extends BaseController
{
    protected $modelPenilaian;
    protected $modelBencana;
    public function __construct() {
        $this->modelPenilaian = new ModelPenilaianKinerja();
        $this->modelSda = new ModelSda();
        $this->modelBencana = new ModelBencana();
    }
    public function index()
    {
            // Tahun awal dan akhir
            $tahun_akhir = date('Y'); // Tahun saat ini
            $tahun_awal  = $tahun_akhir - 5;
            $tahun_range = range($tahun_awal, $tahun_akhir);

            $query = $this->modelPenilaian
                ->select("sda.jenis_sda, YEAR(penilaian_sda.tanggal_penilaian) AS tahun, AVG(penilaian_sda.nilai_kinerja) AS rata_rata_nilai")
                ->join("sda", "sda.id_sda = penilaian_sda.id_sda")
                ->groupBy("sda.jenis_sda, YEAR(penilaian_sda.tanggal_penilaian)")
                ->orderBy("tahun", "ASC")
                ->get()
                ->getResultArray();

            // data untuk grafik
            $data = [];
            foreach ($query as $row) {
                $jenis = $row['jenis_sda'];
                $tahun = $row['tahun'];
                $rata_rata_nilai = round($row['rata_rata_nilai'], 2); // Pembulatkan rata-rata

                if (!isset($data[$jenis])) {
                    $data[$jenis] = array_fill_keys($tahun_range, 0); // Default 0 untuk tahun yang tidak memiliki data
                }

                $data[$jenis][$tahun] = $rata_rata_nilai;
            }


          // Grafik bencana
            $dataBencana = $this->modelBencana
            ->select("MONTH(tanggal_kejadian) AS bulan, COUNT(*) AS jumlah")
            ->where("YEAR(tanggal_kejadian)", date('Y'))
            ->groupBy("MONTH(tanggal_kejadian)")
            ->orderBy("bulan")
            ->findAll();

            // Format data untuk grafik bencana
            $bulan = array_fill(0, 12, 0); // Inisialisasi jumlah bencana untuk 12 bulan
            foreach ($dataBencana as $bencana) {
                $bulan[(int)$bencana['bulan'] - 1] = (int)$bencana['jumlah'];
            }

        return view('home', ['data' => $data,'tahun_range' => $tahun_range,'grafik_bencana' => $bulan]);
    } 
}
