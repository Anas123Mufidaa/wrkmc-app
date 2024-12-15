<?php

namespace App\Controllers\Profile;

use App\Models\ModelAuth;
use App\Controllers\BaseController;

class User extends BaseController
{
    protected $modelAuth;
    public function __construct() {
        $this->modelAuth = new ModelAuth();
    }
    public function index()
    {
        if (session()->get('id_user') != 1) {

            return view('blank-page');

        }else {
            $data = [
                'title' => 'User',
                'data_user' => $this->modelAuth->findAll(),
            ];
            
            return view('profile/user',$data);
        }
    }
    public function save(){
        try {
           $validation = \Config\Services::validation();

           $rules = [
               'nama_user' => [
                   'label' => 'Nama user',
                   'rules' => 'required',
                   'errors' => [
                       'required' => '{field} harus diisi dulu',
                   ]
               ],               
               'username' => [
                   'label' => 'Username',
                   'rules' => 'required|is_unique[user.username]|min_length[3]|max_length[50]',
                   'errors' => [
                       'required' => '{field} harus diisi dulu',
                       'is_unique' => '{field} sudah ada',
                       'is_unique' => '{field} sudah ada',
                       'min_length' => '{field} minimal 3 huruf',
                       'max_length' => '{field} maksimal 5 huruf',
                   ]
               ],
           ];

           $validation->setRules($rules);

           if (!$validation->withRequest($this->request)->run()) {
                session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                return redirect()->to(base_url('profile/user'));
           }
           
           $nama_user = $this->request->getPost('nama_user');
           $username  = $this->request->getPost('username');
           $password  = $this->request->getPost('password');
           $foto_user = $this->request->getFile('foto_user');

           if ($foto_user->getError() == 4) {
               $namaFoto = 'foto_default.jpg';
           } else {
               // pindahkan file ke folder
               $foto_user->move('backEnd_template/assets/foto_user/');
               //ambil nama foto
               $namaFoto = $foto_user->getName();
           }
           // proses insert data 
           $insert = $this->modelAuth->insert([
               'nama_user'  => $nama_user,
               'username'   => $username,
               'password'   => sha1($password),
               'foto_user'  => $namaFoto
           ]);
           
          if (!$insert) {
                session()->setFlashdata('failed', 'Data Gagal ditambahkan');
                return redirect()->to(base_url('profile/user'));
          } 
          else if ($insert) {
                session()->setFlashdata('success', 'Data berhasil ditambahkan');
                return redirect()->to(base_url('profile/user'));
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
           $password_lama = $this->request->getPost('password_lama');
           $password_baru = $this->request->getPost('password_baru');

           $update = $this->modelAuth->adminUbahPassword($id, $password_lama, $password_baru);

           if (!$update) {
                session()->setFlashdata('failed', 'Data gagal diubah');
                return redirect()->to(base_url('profile/user'));
           } 
           else if ($update) {
                session()->setFlashdata('success', 'Data berhasil di ubah');
                return redirect()->to(base_url('profile/user'));
           } 
    
       } catch (\Exception $e) {
            exit($e->getMessage());
       }
   }
   public function delete($id) {
       try {
           $delete = $this->modelAuth->delete($id);
           
           if (!$delete) {
                session()->setFlashdata('failed', 'Data Gagal Di hapus');
                return redirect()->to(base_url('profile/user'));
           }
           else if ($delete) {
                session()->setFlashdata('delete-success', 'Data Berhasil Di hapus');
               return redirect()->to(base_url('profile/user'));
           }

       } catch (\Exception $e) {
           exit($e->getMessage());
       }
   }
}
