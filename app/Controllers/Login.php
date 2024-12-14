<?php

namespace App\Controllers;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelAuth;
use App\Controllers\BaseController; 

class Login extends BaseController
{
    protected $modelAuth;
    public function __construct(){
        $this->modelAuth = new ModelAuth();
    }
    public function index()
    {
        $data = [
           'title' => 'Login',
        ];
        $cek_login = $this->isLoggedIn();
        if ($cek_login) {
            return redirect()->to(base_url('dashboard'));
        }
        return view('auth/login',$data);
    }
    public function cekLogin(){
    
        $validation = \Config\Services::validation();

        $rules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi dulu',
                ]
            ],                
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi dulu',
                ]
            ],
        ];

        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
             session()->setFlashdata('error', \Config\Services::validation()->listErrors());
             return redirect()->to(base_url('auth/login'));
        }

        $username = $this->request->getVar('username');
        $password = sha1($this->request->getVar('password'));
        
        $cek = $this->modelAuth->Login($username,$password);
        
        if ($cek) {
            session()->set('id_user', $cek['id_user']);
            session()->set('logged_in' , 1);
                                            
            session()->setFlashdata('success', 'Selamat Datang');
            return redirect()->to(base_url('dashboard'));
        } 
        else {
           session()->setFlashdata('failed', 'Username Atau Password Salah');
           return redirect()->to(base_url('auth/login'));
        } 
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));
    }
    
    private function isLoggedIn(): bool
    {
        if (session()->get('logged_in') === 1) {
            return true;
        }
        return false;
    }    
}
