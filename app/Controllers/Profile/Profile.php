<?php

namespace App\Controllers\Profile;
use App\Controllers\BaseController;
use App\Models\ModelAuth;
class Profile extends BaseController
{
    protected $modelAuth;
    public function __construct() {
        $this->modelAuth = new ModelAuth();
    }
    public function index()
    {
        $data = [
            'title' => 'Account',
            'data_user' => $this->modelAuth->dataUser(),
        ];
        return view('profile/profile',$data);
    }
    public function updateProfile($id){
        try {
            $validation = \Config\Services::validation();
 
            $rules = [
                'nama_user' => [
                    'label' => 'Nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi dulu',
                    ]
                ],                  
                'foto_user' => [
                    'label' => 'Foto User',
                    'rules' => [
                        'mime_in[foto_user,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[foto_user,5096]',   
                    ],
                    'errors' => [
                        'mime_in' => '{field} harus berupa image/jpg,image/jpeg,image/gif,image/png',
                        'max_size' => '{field} Maksimal 5 mb',
                    ]
                ],
            ];
 
            $validation->setRules($rules);
 
            if (!$validation->withRequest($this->request)->run()) {
                 session()->setFlashdata('errorProfile', \Config\Services::validation()->listErrors());
                 return redirect()->to(base_url('profile'));
            }
             
            if (!$id) {
                throw new Exception("id tidak ditemukan");
            }
             
            $foto_user = $this->request->getFile('foto_user');
            $nama_user = $this->request->getPost('nama_user');

            // cek gambar, apakah tetap gambar lama
            if ($foto_user->getError() == 4) {
                $foto = $this->request->getVar('fotoUser_lama');
            } else {
                $foto = $foto_user->getName();
                //pindahkan gambar
                $foto_user->move('backEnd_template/assets/foto_user/', $foto);
                 
                $user = $this->modelAuth->find($id);

                if ($user['foto_user'] != 'foto_default.jpg') {
                    //hapus gambar lama digantii gambar baru
                    unlink('backEnd_template/assets/foto_user/' . $this->request->getVar('fotoUser_lama'));
                }
            }

            $update = $this->modelAuth->update($id,[
                'nama_user' => $nama_user,
                'foto_user' => $foto,
             ]
            );

            if ($update) {
                session()->setFlashdata('success', 'Profile Berhasil Di Update');
                return redirect()->to(base_url('profile'));
            }    
            else {
                session()->setFlashdata('failed', 'Profile Gagal Di Update');
                return redirect()->to(base_url('profile'));
            } 
            
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }
    public function updatePassword(){
        try {
            $validation = \Config\Services::validation();
 
            $rules = [
                'password_lama' => [
                    'label' => 'Password Lama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi dulu',
                    ]
                ],                  
                'password_baru' => [
                    'label' => 'Password Baru',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi dulu',
                    ]
                ],                
                'confirm_password' => [
                    'label' => 'Kofirmasi Password ',
                    'rules' => 'required|matches[password_baru]',
                    'errors' => [
                        'required' => '{field} harus diisi dulu',
                        'matches' => '{field} Anda Salah',
                    ]
                ]
            ];
 
            $validation->setRules($rules);
 
            if (!$validation->withRequest($this->request)->run()) {
                 session()->setFlashdata('error', \Config\Services::validation()->listErrors());
                 return redirect()->to(base_url('profile'));
            }
            

            $id_user = $this->request->getPost('id_user');
            $password_lama = $this->request->getPost('password_lama');
            $password_baru = $this->request->getPost('password_baru');

            $update = $this->modelAuth->ubahPassword($id_user, $password_lama, $password_baru);
            if ($update) {
                session()->setFlashdata('success', 'Password Berhasil Di Update');
                return redirect()->to(base_url('profile'));
            }    
            else {
                session()->setFlashdata('failed', 'Password Gagal Di Update');
                return redirect()->to(base_url('profile'));
            } 
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }
}
