<?php

namespace App\Controllers\Monitoring;

use App\Controllers\BaseController;
use App\Models\ModelPenilaianKinerja;

class KinerjaSDA extends BaseController
{
    protected $modelPenilaian;
    public function __construct() {
        $this->modelPenilaian = new ModelPenilaianKinerja();
    }
    public function filter()
    {
        // Ambil data dari form POST
        $startYear = $this->request->getPost('startYear');
        $endYear = $this->request->getPost('endYear');

        // Jika form tidak diisi, gunakan default 5 tahun terakhir
        if (!$startYear || !$endYear) {
            $endYear = date('Y');
            $startYear = $endYear - 5;
        }

        // Validasi range tahun
        if ($startYear > $endYear) {
            return redirect()->to(base_url('monitoring/kinerja-sda'))->with('failed', 'Tahun mulai tidak boleh lebih besar dari tahun akhir.');
        }

        // Simpan filter ke dalam sesi
        session()->set('startYear', $startYear);
        session()->set('endYear', $endYear);

        return redirect()->to(base_url('monitoring/kinerja-sda'));
    }

    public function index()
    {
        // Ambil filter dari sesi jika ada , jika tidak maka startyear tahun sekarang dikurang 5 dan end year tahun sekarang
        $startYear = session()->get('startYear') ?? date('Y') - 5;
        $endYear = session()->get('endYear') ?? date('Y');

        // Buat range tahun berdasarkan filter
        $tahun_range = range($startYear, $endYear);

        // Query database dengan filter
        $query = $this->modelPenilaian
            ->select("sda.jenis_sda, YEAR(penilaian_sda.tanggal_penilaian) AS tahun, AVG(penilaian_sda.nilai_kinerja) AS rata_rata_nilai")
            ->join("sda", "sda.id_sda = penilaian_sda.id_sda")
            ->where("YEAR(penilaian_sda.tanggal_penilaian) >=", $startYear)
            ->where("YEAR(penilaian_sda.tanggal_penilaian) <=", $endYear)
            ->groupBy("sda.jenis_sda, YEAR(penilaian_sda.tanggal_penilaian)")
            ->orderBy("tahun", "ASC")
            ->get()
            ->getResultArray();

        // Format data untuk grafik
        $data = [];
        foreach ($query as $row) {
            $jenis = $row['jenis_sda'];
            $tahun = $row['tahun'];
            $rata_rata_nilai = round($row['rata_rata_nilai'], 2);

            if (!isset($data[$jenis])) {
                $data[$jenis] = array_fill_keys($tahun_range, 0);
            }

            $data[$jenis][$tahun] = $rata_rata_nilai;
        }

        $title = 'Monitoring Grafik Kinerja SDA';

        return view('monitoring/kinerja-sda', [
            'data' => $data,
            'tahun_range' => $tahun_range,
            'startYear' => $startYear,
            'endYear' => $endYear,
            'title' => $title
        ]);
    }

} 