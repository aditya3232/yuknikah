<?php

namespace App\Controllers;

class Auth extends BaseController
{
//ini cara meridirect controller auth ke login dari controller
//   public function index()
//   {
//     return redirect()->to(site_url('login'));
//   }
  public function login(){
    // kondisi jika ada session id_user maka akan di direct ke halaman home, tidak bisa buka halaman login
    if(session('id_user')){
      return redirect()->to(site_url('home'));
    }
    return view('auth/login');
  }

  public function loginProcess(){

    // menampung inputan post login
    $post = $this->request->getPost();
    
    // perintah query yg memuat tabel users dari database, kemudian mencari field email_user, yg sama dengan post[email] =>
    $query = $this->db->table('users')->getWhere(['email_user' => $post['email']]);
    // variabel user akan mengambil baris query diatas
    $user = $query->getRow();
    // jika email yg dimasukkan ditemukan pada tabel maka akan mengecek password
    // jika salah maka akan kembali ke halaman login dan ada pesar error
    if($user){
        // jika password_verify-nya benar, maka akan menset session untuk setiap 'id_user' yg sama dengan id_user didalam tabel
        // setelah itu diarahkan ke view home
        // jika salah akan kembali ke halaman login dan ada pesan error
        if(password_verify($post['password'], $user->password_user)){
            $params = ['id_user' => $user->id_user];
            session()->set($params);
            return redirect()->to(site_url('home'));
        }else{
            return redirect()->back()->with('error', 'Password salah!');
        }
    }else{
        return redirect()->back()->with('error', 'Email tidak ditemukan!');
    }

  }

  public function logout(){
    // fungsi untuk menghilangkan session id_user
    session()->remove('id_user');
    // kemudian arahkan ke halaman login
    return redirect()->to(site_url('login'));
  }
}