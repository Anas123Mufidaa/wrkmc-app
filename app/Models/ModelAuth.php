<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['nama_user','username','password','foto_user'];
    protected $useTimestamps    = true;
    
    public function Login($username, $password){
         return $this->db->table('user')
                ->where([
                    'username' => $username,
                    'password' => $password
                ])->get()->getRowArray();    
    }

    public function dataUser(){
        return $this->db->table('user')
              ->where('id_user' , session()->get('id_user'))
              ->get()->getRowArray();                          
    }

    public function ubahProfile($id_user , $data){
        $this->db->table('user')
            ->where($id_user)
            ->update($data);
    }

    public function ubahPassword($id_user, $password_lama, $password_baru){
        // Ambil data pengguna berdasarkan id_user
        $user = $this->find($id_user);

        // Verifikasi password lama
        if ($user && sha1($password_lama) === $user['password']) {
            // Update password baru
            $this->update($id_user, ['password' => sha1($password_baru)]);
            return true; // Password berhasil diperbarui
        }
        
        return false; // Password lama salah
    }    
    public function adminUbahPassword($id, $password_lama, $password_baru){
        // Ambil data pengguna berdasarkan id_user
        $user = $this->find($id);

        // Verifikasi password lama
        if ($user && $password_lama === $user['password']) {
            // Update password baru
            $this->update($id, ['password' => sha1($password_baru)]);
            return true; // Password berhasil diperbarui
        }
        
        return false; // Password lama salah
    }

    public function countUser(){
        return $this->db->table('user')->select('COUNT(*) as total_user')
               ->get()->getRowArray();
    }
        
}
