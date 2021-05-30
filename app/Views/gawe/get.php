<?= $this->extend('layout/default') ?>

<!-- titile view home.php -->
<?= $this->section('content') ?>
<title>Data Gawe &mdash; yukNikah</title>
<?= $this->endSection()?>

<!-- konten view get.php -->
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Gawe</h1>
        <!-- button tambah data yg diarahkan ke url gawe/add. url ini akan diroute ke controller gawe, function create -->
        <div class="section-header-button">
            <a href="<?=site_url('gawe/add')?>" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <!-- kondisi yg akan menampilkan sessions flash message, ketika ada session flash message success -->
    <!-- session flashdata bersifat sekali, ketika sudah tampil akan dihapus -->
    <?php if(session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <!-- button x yg berada di kanan untuk menghilangkan alert -->
            <button class="close" data-dismiss="alert">x</button>
            <b>Success !</b>
            <!-- pesan flash message -->
            <?=session()->getFlashdata('success') ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- kondisi ketika mendapatkan session flash message error -->
    <!-- konidisi ini muncul karena dalam web ini sudah diaktifkan csrf, sehingga inputan hanya boleh diinput melalui halaman webnya, -->
    <!-- sehingga kita tidak bisa menginputkan data dari postman/terminal/console -->
    <?php if(session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <!-- button x yg berada di kanan untuk menghilangkan alert -->
            <button class="close" data-dismiss="alert">x</button>
            <b>Error !</b>
            <!-- pesan flash message disini isinya otomatis dari fitur csrf-->
            <?=session()->getFlashdata('error') ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="section-body">
        <!-- card -->
        <div class="card">
            <!-- card header -->
            <div class="card-header">
                <h4>Data Gawe / Acara</h4>
            </div>
            <!-- card body yg didalamnya ada tabel -->
            <div class="card-body table-responsive">
                <!-- tabel -->
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Nama Gawe</th>
                            <th>Tanggal Gawe</th>
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                        <!-- php untuk looping data tabel dari database -->
                        <?php foreach ($gawe as $key => $value) : ?>
                        <tr>
                            <td><?= $key +1; ?></td>
                            <td><?= $value->name_gawe; ?></td>
                            <!-- format tanggal dgn function date -->
                            <td><?=date('d/m/Y', strtotime($value->date_gawe))?></td>
                            <td><?= $value->info_gawe; ?></td>
                            <td class="text-center" style="width:15%">
                                <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <!-- akhir php -->
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>