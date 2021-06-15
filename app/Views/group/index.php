<?= $this->extend('layout/default') ?>

<!-- titile view home.php -->
<?= $this->section('content') ?>
<title>Data Groups &mdash; yukNikah</title>
<?= $this->endSection()?>

<!-- konten view get.php -->
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Groups</h1>
        <!-- button tambah data yg diarahkan ke url groups/add. url ini akan diroute ke controller groups, function create -->
        <div class="section-header-button">
            <a href="<?=site_url('groups/add')?>" class="btn btn-primary">Add New</a>
        </div>
    </div>

    <!-- kondisi yg akan menampilkan sessions flashData success-->
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

    <!-- kondisi ketika mendapatkan session flashData error -->
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
                <h4>Data Group Kontak</h4>
            </div>
            <!-- card body yg didalamnya ada tabel -->
            <div class="card-body table-responsive">
                <!-- tabel -->
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Nama Group</th>
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                        <!-- php untuk looping data tabel dari database -->

                        <!-- akhir php -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>