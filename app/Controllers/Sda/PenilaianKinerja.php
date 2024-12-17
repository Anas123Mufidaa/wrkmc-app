<?php

namespace App\Controllers\Sda;

use App\Controllers\BaseController;
use App\Models\ModelPenilaianKinerja;
use App\Models\ModelSda;

class PenilaianKinerja extends BaseController
{
    protected $modelPenilaian;
    protected $modelSda;
    public function __construct() {
        $this->modelPenilaian = new ModelPenilaianKinerja();
        $this->modelSda = new ModelSda();
    }
    public function index()
    {
        $data = [
            'title' => 'Penilaian Kinerja Sumber Daya Air',
            'data_penilaian' => $this->modelPenilaian->getAllData(),
            'sda' => $this->modelSda->findAll(),
        ];
        return view('sda/penilaian-kinerja',$data);
    } 
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Penilaian Kinerja',
            'detail_penilaian' => $this->modelPenilaian->getDetailData($id),
        ];
        return view('sda/penilaian-kinerja-detail' , $data);
    }
    public function save(){
        try {
           $validation = \Config\Services::validation();

           $rules = [
               'id_sda' => [
                   'label' => 'Nama SDA',
                   'rules' => 'required',
                   'errors' => [
                       'required' => '{field} harus diisi dulu',
                   ]
               ],
           ];

           $validation->setRules($rules);

           if (!$validation->withRequest($this->request)->run()) {
                session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                return redirect()->to(base_url('sda/penilaian-kinerja'));
           }

           $id_sda = $this->request->getPost('id_sda');
           $tanggal_penilaian = $this->request->getPost('tanggal_penilaian');
           $nilai_kinerja = $this->request->getPost('nilai_kinerja');
           $catatan_penilaian = $this->request->getPost('catatan_penilaian');
            
           // proses insert data 
           $insert = $this->modelPenilaian->insert([
               'id_sda'           => $id_sda,
               'tanggal_penilaian'=> $tanggal_penilaian,
               'user_created'     => session()->get('id_user'),
               'user_updated'     => session()->get('id_user'),
               'nilai_kinerja'    => $nilai_kinerja,
               'catatan_penilaian'=> $catatan_penilaian
           ]);
           
          if (!$insert) {
                session()->setFlashdata('failed', 'Data Gagal ditambahkan');
                return redirect()->to(base_url('sda/penilaian-kinerja'));
          } 
          else if ($insert) {
                session()->setFlashdata('success', 'Data berhasil ditambahkan');
                return redirect()->to(base_url('sda/penilaian-kinerja'));
          } 

       } catch (\Exception $e) {
            exit($e->getMessage());
       }
   }
   public function updateBy($id) {

        try { 
            if (!$id) {
                throw new Exception("id tidak ditemukan");
            }
            $id_sda = $this->request->getPost('id_sda');
            $tanggal_penilaian = $this->request->getPost('tanggal_penilaian');
            $nilai_kinerja = $this->request->getPost('nilai_kinerja');
            $catatan_penilaian = $this->request->getPost('catatan_penilaian');
            $user_created = $this->request->getPost('user_created');
        
            $update = $this->modelPenilaian->update($id,[
                'id_sda'           => $id_sda,
                'tanggal_penilaian'=> $tanggal_penilaian,
                'user_created'    => $user_created,
                'user_updated'    => session()->get('id_user'),
                'nilai_kinerja'    => $nilai_kinerja,
                'catatan_penilaian'=> $catatan_penilaian
            ]
            );

            if (!$update) {
                session()->setFlashdata('failed', 'Data gagal diubah');
                return redirect()->to(base_url('sda/penilaian-kinerja'));
            } 
            else if ($update) {
                session()->setFlashdata('success', 'Data berhasil di ubah');
                return redirect()->to(base_url('sda/penilaian-kinerja'));
            } 
    
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
   }
   public function delete($id) {
    try {
        $delete = $this->modelPenilaian->delete($id);
        
        if (!$delete) {
            session()->setFlashdata('failed', 'Data Gagal Di hapus');
            return redirect()->to(base_url('sda/penilaian-kinerja'));
        }
        else if ($delete) {
            session()->setFlashdata('delete-success', 'Data Berhasil Di hapus');
            return redirect()->to(base_url('sda/penilaian-kinerja'));
        }

        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }
}
