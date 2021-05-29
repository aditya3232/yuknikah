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
}