<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function loginProses()
    {    
        $post = $this->request->getPost();
        $query = $this->db->table('users')->getWhere(['user_email'=>$post['email']]);
        $user = $query->getRow();
        if($user){
            if(password_verify($post['password'], $user->user_password)) {
                $params = ['user_id'=> $user->user_id];
                session()->set($params);

                return redirect()->to(site_url('home'));
            } else {
                return redirect()->back()->with('error','Password tidak sesuai');
            }
        } else {
            return redirect()->back()->with('error','Email tidak ditemukan');
        }
    }


}
