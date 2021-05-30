<?php

namespace App\Controllers;
// biasanya controller akan mengatur view-view didalam folder yang memiliki nama yang sama dengan controllernya 
class Gawe extends BaseController
{
    public function index()
    {
        // query builder
        // loading the query builder (memuat tabel dari database)
        // variabel $db adalah variabel koneksi database yg dapat digunakan untuk semua tabel didalam databse tsb
        // sehingga $db dapat diletakkan di BaseController
        $builder        = $this->db->table('gawe');
        // selecting data
        $query          = $builder->get();      // Produces: SELECT * FROM mytable
        $data['gawe']   = $query->getResult();  //simpan query kedalam variabel 'gawe'

        // menampilkan view
        return view('gawe/get', $data); 
    }

    public function create(){
        return view('gawe/add');
    }

    public function store(){
        // cara 1: name input sama
        // getPost akan mengambil method post yg berisi array asosoatif ["nama field" => "isinya"]
        // maka dari itu name inputan di add.php lebih baik disamakan dgn nama field tabel dalam database 
        // sehingga tidak perlu inisialisasi
        $data = $this->request->getPost();

        // cara 2:name input spesifik (inisilaisasi name inputnya)
        // $data = [
        //     'name_gawe' => $this->request->getVar('nama_spesifiknya')
        //     'date_gawe' => $this->request->getVar('nama_spesifiknya')
        //     'info_gawe' => $this->request->getVar('nama_spesifiknya')

        // ]

        // memuat tabel dari database kemudian insertkan data dari inputan"
        $this->db->table('gawe')->insert($data); 
        // memberikan kondisi jika data telah diinsert ke tabel (affectedRows ada atau tidak), maka akan menuju url/gawe, dan memberikan session flashData
        // with('nama variabel', 'pesan yg akan ditampilkan')
        // nanti flashData-nya akan ditampilkan di get.php
        if ($this->db->affectedRows() > 0){
            return redirect()->to(site_url('gawe'))->with('success', 'Data berhasil disimpan');
        }

    }
}