<?php

namespace App\Controllers\Monitoring;

use App\Controllers\BaseController;
use App\Models\ModelBencana;

class BencanaGrafik extends BaseController
{
    protected $modelBencana;
    public function __construct() {
        $this->modelBencana = new ModelBencana();
    }
    public function index()
    {
        $selectedYear = $this->request->getPost('tahun') ?? date('Y');

        // Query untuk mendapatkan data jumlah bencana per bulan berdasarkan tahun
        $dataBencana = $this->modelBencana
            ->select("MONTH(tanggal_kejadian) AS bulan, COUNT(*) AS jumlah")
            ->where("YEAR(tanggal_kejadian)", $selectedYear)
            ->groupBy("MONTH(tanggal_kejadian)")
            ->orderBy("bulan")
            ->findAll();
    
        // Format data untuk grafik bencana
        $grafik_bencana = array_fill(0, 12, 0); // Inisialisasi jumlah bencana untuk 12 bulan
        foreach ($dataBencana as $bencana) {
            $grafik_bencana[(int)$bencana['bulan'] - 1] = (int)$bencana['jumlah'];
        }

        $title = 'Monitoring Grafik Bencana';
    
        // Kirim data ke view
        return view('monitoring/grafik-bencana', [
            'grafik_bencana' => $grafik_bencana,
            'selectedYear' => $selectedYear, // Tahun yang dipilih untuk ditampilkan
            'title' => $title
        ]);
    }
} 