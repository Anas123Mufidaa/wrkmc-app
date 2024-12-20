<?php

namespace App\Controllers\Bencana;

use App\Controllers\BaseController;
use App\Models\ModelBencana;
use App\Models\ModelAuth;

class Bencana extends BaseController
{
    protected $modelBencana;
    public function __construct() {
        $this->modelBencana = new ModelBencana();
    }
    public function index()
    {
        $data = [
            'title' => 'Data Bencana',
            'data_bencana' => $this->modelBencana->findAll(),
        ];
        return view('bencana/bencana',$data);
    }
    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Bencana',
            'detail_bencana' => $this->modelBencana->getDetailDataBencana($id),
        ];
        return view('bencana/bencana-detail' , $data);
    }     
    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Bencana',
        ];
        return view('bencana/bencana-create',$data);
    }    
    public function save(){
        try {
           $validation = \Config\Services::validation();

           $rules = [
               'jenis_kejadian' => [
                   'label' => 'Jenis Kejadian',
                   'rules' => 'required',
                   'errors' => [
                       'required' => '{field} harus diisi dulu',
                   ]
               ],
           ];

           $validation->setRules($rules);

           if (!$validation->withRequest($this->request)->run()) {
                session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                return redirect()->to(base_url('bencana/create'));
           }

           $jenis_kejadian = $this->request->getPost('jenis_kejadian');
           $hari_kejadian = $this->request->getPost('hari_kejadian');
           $tanggal_kejadian = $this->request->getPost('tanggal_kejadian');
           $waktu_kejadian = $this->request->getPost('waktu_kejadian');
           $tempat_kejadian = $this->request->getPost('tempat_kejadian');
           $penyebab_kronologis = $this->request->getPost('penyebab_kronologis');
           $curahHujan_PosAir = $this->request->getPost('curahHujan_PosAir');
           $dampak_bencana = $this->request->getPost('dampak_bencana');
           $lama_bahaya = $this->request->getPost('lama_bahaya');
           $tindakan = $this->request->getPost('tindakan');
           $kondisi = $this->request->getPost('kondisi');
           $usulan = $this->request->getPost('usulan');
           $tebusan = $this->request->getPost('tebusan');
            
           // proses insert data 
           $insert = $this->modelBencana->insert([
               'user_created'    => session()->get('id_user'),
               'jenis_kejadian'  => $jenis_kejadian,
               'hari_kejadian'   => $hari_kejadian,
               'tanggal_kejadian' => $tanggal_kejadian,
               'waktu_kejadian'   => $waktu_kejadian,
               'tempat_kejadian'   => $tempat_kejadian,
               'penyebab_kronologis' => $penyebab_kronologis,
               'curahHujan_PosAir'=> $curahHujan_PosAir,
               'dampak_bencana'   => $dampak_bencana,
               'lama_bahaya'      => $lama_bahaya,
               'tindakan'         => $tindakan,
               'kondisi'          => $kondisi,
               'usulan'           => $usulan,
               'tebusan'          => $tebusan,
           ]);
           
          if (!$insert) {
                session()->setFlashdata('failed', 'Data Gagal ditambahkan');
                return redirect()->to(base_url('bencana'));
          } 
          else if ($insert) {
                session()->setFlashdata('success', 'Data berhasil ditambahkan');
                return redirect()->to(base_url('bencana'));
          } 

       } catch (\Exception $e) {
            exit($e->getMessage());
       }

       echo json_encode($response);
       exit();
   }
   public function edit($id)
   {
       $data = [
           'title' => 'Edit Data Bencana',
           'data_bencana' => $this->modelBencana->find($id),
       ];
       return view('bencana/bencana-edit' , $data);
   }
   public function updateBy($id) {

       try { 
           if (!$id) {
               throw new Exception("id tidak ditemukan");
           }
           $user_created = $this->request->getPost('user_created');
           $jenis_kejadian = $this->request->getPost('jenis_kejadian');
           $hari_kejadian = $this->request->getPost('hari_kejadian');
           $tanggal_kejadian = $this->request->getPost('tanggal_kejadian');
           $waktu_kejadian = $this->request->getPost('waktu_kejadian');
           $tempat_kejadian = $this->request->getPost('tempat_kejadian');
           $penyebab_kronologis = $this->request->getPost('penyebab_kronologis');
           $curahHujan_PosAir = $this->request->getPost('curahHujan_PosAir');
           $dampak_bencana = $this->request->getPost('dampak_bencana');
           $lama_bahaya = $this->request->getPost('lama_bahaya');
           $tindakan = $this->request->getPost('tindakan');
           $kondisi = $this->request->getPost('kondisi');
           $usulan = $this->request->getPost('usulan');
           $tebusan = $this->request->getPost('tebusan');
          
           $update = $this->modelBencana->update($id,[
                'user_created'    => $user_created,
                'jenis_kejadian'  => $jenis_kejadian,
                'hari_kejadian'   => $hari_kejadian,
                'tanggal_kejadian' => $tanggal_kejadian,
                'waktu_kejadian'   => $waktu_kejadian,
                'tempat_kejadian'   => $tempat_kejadian,
                'penyebab_kronologis' => $penyebab_kronologis,
                'curahHujan_PosAir'=> $curahHujan_PosAir,
                'dampak_bencana'   => $dampak_bencana,
                'lama_bahaya'      => $lama_bahaya,
                'tindakan'         => $tindakan,
                'kondisi'          => $kondisi,
                'usulan'           => $usulan,
                'tebusan'          => $tebusan,
            ]
           );

           if (!$update) {
                session()->setFlashdata('failed', 'Data gagal diubah');
                return redirect()->to(base_url('bencana'));
           } 
           else if ($update) {
                session()->setFlashdata('success', 'Data berhasil di ubah');
                return redirect()->to(base_url('bencana'));
           } 
    
       } catch (\Exception $e) {
            exit($e->getMessage());
       }
   }
   public function delete($id) {
        try {
            $delete = $this->modelBencana->delete($id);
            
            if (!$delete) {
                session()->setFlashdata('failed', 'Data Gagal Di hapus');
                return redirect()->to(base_url('bencana'));
            }
            else if ($delete) {
                session()->setFlashdata('delete-success', 'Data Berhasil Di hapus');
                return redirect()->to(base_url('bencana'));
            }

        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }
}
