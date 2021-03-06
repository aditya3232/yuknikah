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
        $data['gawe']   = $query->getResult();  //simpan query kedalam variabel 'gawe'. getResult() akan mereturn semua baris

        // menampilkan view
        return view('gawe/get', $data); 
    }

    public function create(){
        return view('gawe/add');
    }

    public function store(){
        // cara 1: name input sama
        // getPost akan mengambil method post yg berisi $data array asosoatif ["nama field" => "isinya"]
        // maka dari itu name inputan di add.php lebih baik disamakan dgn nama field tabel dalam database 
        // sehingga tidak perlu inisialisasi
        $data = $this->request->getPost(); //ini fungsinya untuk menampung inputan

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

    public function edit($id = null){
        // parameter $id menampung id_gawe dari routes 'Gawe::edit/$1'
        if($id != null){
            // kondisi jika $id tidak sama dengan null, 
            // maka cek apakah $id dari link sama dengan field id_gawe,
            // jika $id = id_gawe (($query->resultID->num_rows > 0)) num_rows >0 berarti datanya ada,
            // maka lanjut ke halaman edit, 
            // jika tidak pagenotfound,
            $query = $this->db->table('gawe')->getWhere(['id_gawe' => $id]); // ini adalah query yg memuat tabel gawe dan mencari field 'id_gawe' => $id
            if($query->resultID->num_rows > 0){
                $data['gawe'] = $query->getRow(); //simpan query kedalam variabel 'gawe'. getRow() akan mereturn 1 baris
                return view('gawe/edit', $data);
            } else{
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else{
            // kondisi jika $id tidak sama dengan null,
            // maka pagenotfound
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id){
        $data = $this->request->getPost(); // mengambil data dari form
        unset($data['_method']);//nama method PUT berbeda, jadi http method spoofing ny g terdeteksi,solusinya unset bagian _method

        // kalau pakai nama spesifik tidak perlu unset($data['_method']);
        // $data = [
        //     'name_gawe' => $this->request->getVar('nama_spesifiknya')
        //     'date_gawe' => $this->request->getVar('nama_spesifiknya')
        //     'info_gawe' => $this->request->getVar('nama_spesifiknya')
        // ]

        $this->db->table('gawe')->where(['id_gawe' => $id])->update($data); //update data dari form, dan masukkan ke id_gawe yg sesuai
        return redirect()->to(site_url('gawe'))->with('success', 'Data berhasil diupdate'); // kemduian return flashData

    }

    public function destroy($id){
        $this->db->table('gawe')->where(['id_gawe' => $id])->delete(); 
        return redirect()->to(site_url('gawe'))->with('success', 'Data berhasil dihapus');
    }
}