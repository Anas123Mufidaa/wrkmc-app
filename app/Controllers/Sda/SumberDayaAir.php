<?php

namespace App\Controllers\Sda;

use App\Controllers\BaseController;
use App\Models\ModelSda;
use App\Models\ModelAuth;

class SumberDayaAir extends BaseController
{
    protected $modelSda;
    public function __construct() {
        $this->modelSda = new ModelSda();
    }
    public function index()
    {
        $data = [
            'title' => 'Sumber Daya Air',
            'data_sda' => $this->modelSda->getAllData(),
        ];
        return view('sda/sumber-daya-air',$data);
    }    
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Sumber Daya Air',
            'detail_sda' => $this->modelSda->getDetailData($id),
        ];
        return view('sda/sumber-daya-air-detail' , $data);
    }
    public function save(){
        try {
           $validation = \Config\Services::validation();

           $rules = [
               'nama_sda' => [
                   'label' => 'Nama SDA',
                   'rules' => 'required',
                   'errors' => [
                       'required' => '{field} harus diisi dulu',
                   ]
               ],               
               'jenis_sda' => [
                   'label' => 'Jenis SDA',
                   'rules' => 'required',
                   'errors' => [
                       'required' => '{field} harus diisi dulu',
                   ]
               ],               
               'alamat' => [
                   'label' => 'Alamat',
                   'rules' => 'required',
                   'errors' => [
                       'required' => '{field} harus diisi dulu',
                   ]
               ],
               'deskripsi_sda' => [
                   'label' => 'Deskripsi SDA',
                   'rules' => 'required',
                   'errors' => [
                       'required' => '{field} harus diisi dulu',
                   ]
               ],
           ];

           $validation->setRules($rules);

           if (!$validation->withRequest($this->request)->run()) {
                session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                return redirect()->to(base_url('sda'));
           }

           $nama_sda = $this->request->getPost('nama_sda');
           $jenis_sda = $this->request->getPost('jenis_sda');
           $alamat = $this->request->getPost('alamat');
           $deskripsi_sda = $this->request->getPost('deskripsi_sda');
           $gambar_sda = $this->request->getFile('gambar_sda');
            
           if ($gambar_sda->getError() == 4) {
                $foto_sda = 'foto_default_sda.jpeg';
           } else {
                // pindahkan file ke folder
                $gambar_sda->move('backEnd_template/assets/gambar_sda/');
                //ambil nama foto
                $foto_sda = $gambar_sda->getName();
            }
           // proses insert data 
           $insert = $this->modelSda->insert([
               'nama_sda'     => $nama_sda,
               'jenis_sda'    => $jenis_sda,
               'user_created' => session()->get('id_user'),
               'user_updated' => session()->get('id_user'),
               'alamat'       => $alamat,
               'gambar_sda'   => $foto_sda,
               'deskripsi_sda'=> $deskripsi_sda
           ]);
           
          if (!$insert) {
                session()->setFlashdata('failed', 'Data Gagal ditambahkan');
                return redirect()->to(base_url('sda'));
          } 
          else if ($insert) {
                session()->setFlashdata('success', 'Data berhasil ditambahkan');
                return redirect()->to(base_url('sda'));
          } 

       } catch (\Exception $e) {
            exit($e->getMessage());
       }

       echo json_encode($response);
       exit();
   }
   public function updateBy($id) {

       try { 
           if (!$id) {
               throw new Exception("id tidak ditemukan");
           }
           $nama_sda = $this->request->getPost('nama_sda');
           $jenis_sda = $this->request->getPost('jenis_sda');
           $alamat = $this->request->getPost('alamat');
           $deskripsi_sda = $this->request->getPost('deskripsi_sda');
           $user_created = $this->request->getPost('user_created');
           $gambar_sda = $this->request->getFile('gambar_sda');

            // cek gambar, apakah tetap gambar lama
            if ($gambar_sda->getError() == 4) {
                $foto_sda = $this->request->getVar('gambar_sda_lama');
            } else {
                $foto_sda = $gambar_sda->getName();
                //pindahkan gambar
                $gambar_sda->move('backEnd_template/assets/gambar_sda/', $foto_sda);
                    
                $sda = $this->modelSda->find($id);

                if ($sda['gambar_sda'] != 'foto_default_sda.jpeg') {
                    //hapus gambar lama digantii gambar baru
                    unlink('backEnd_template/assets/gambar_sda/' . $this->request->getVar('gambar_sda_lama'));
                }
            }
          
           $update = $this->modelSda->update($id,[
                'nama_sda'     => $nama_sda,
                'jenis_sda'    => $jenis_sda,
                'user_created' => $user_created,
                'user_updated' => session()->get('id_user'),
                'alamat'       => $alamat,
                'gambar_sda'   => $foto_sda,
                'deskripsi_sda'=> $deskripsi_sda
            ]
           );

           if (!$update) {
                session()->setFlashdata('failed', 'Data gagal diubah');
                return redirect()->to(base_url('sda'));
           } 
           else if ($update) {
                session()->setFlashdata('success', 'Data berhasil di ubah');
                return redirect()->to(base_url('sda'));
           } 
    
       } catch (\Exception $e) {
            exit($e->getMessage());
       }
   }
   public function delete($id) {
        try {
            $delete = $this->modelSda->delete($id);
            
            if (!$delete) {
                session()->setFlashdata('failed', 'Data Gagal Di hapus');
                return redirect()->to(base_url('sda'));
            }
            else if ($delete) {
                session()->setFlashdata('delete-success', 'Data Berhasil Di hapus');
                return redirect()->to(base_url('sda'));
            }

        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }
}
