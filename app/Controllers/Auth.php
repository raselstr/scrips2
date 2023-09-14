<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        if(session('user_id')){
            return redirect()->to(site_url('home'));
        }
        return view('auth/login');
    }

    public function loginProses()
    {    
        $this->db = \Config\Database::connect();
        $post = $this->request->getPost();
        $query = $this->db->table('users')->getWhere(['user_email'=>$post['email']]);
        $user = $query->getRow();
        if($user){
            if(password_verify($post['password'], $user->user_password)) {
                $params = [
                    'user_id'=> $user->user_id,
                    'user_nama'=> $user->user_nama,
                    'user_active' => $user->user_active,
                ];
                session()->set($params);
                // dd(session()->user_nama);
                return redirect()->to(site_url('home'));
            } else {
                return redirect()->back()->with('error','Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error','Email tidak ditemukan');
        }
        
        
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }

}
