<?= $this->extend('layout/default') ?>

<!-- titile view home.php -->
<?= $this->section('content') ?>
<title>Update Gawe &mdash; yukNikah</title>
<?= $this->endSection()?>

<!-- konten view get.php -->
<?= $this->section('content') ?>
<section class="section">
    <!-- section header -->
    <div class="section-header">
        <!-- button back -->
        <div class="section-header-back">
            <a href="<?=site_url('gawe')?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Update Gawe</h1>
    </div>

    <div class="section-body">
        <!-- card -->
        <div class="card">
            <!-- card header -->
            <div class="card-header">
                <h4>Edit Gawe / Acara</h4>
            </div>
            <!-- card body yg didalamnya ada form input-->
            <div class="card-body col-md-6">
                <!-- action-nya diarahkan ke url 'gawe/id-nya(id_gawe yg sesuai dgn link-nya)' -->
                <form action="<?=site_url('gawe/'.$gawe->id_gawe)?>" method="post" autocomplete="off">
                    <!-- tambahkan csrf_field agar form ini bisa diisi -->
                    <?= csrf_field() ?>
                    <!-- http method spoofing untuk update data, kemudian buat routes untuk proses update datanya agar tersimpan -->
                    <!-- setiap inputan harus diberikan name -->
                    <input type="hidden" name="_method" value="PUT">
                    <div class="from-group">
                        <label>Nama Gawe / Acara *</label>
                        <!-- name input sebaiknya disamakan dengan nama field tabel didatabase -->
                        <!-- input text akan memiliki value yg sudah terisi didalam inputannya sesuai dengan $id: name_gawe -->
                        <input type="text" name="name_gawe" value="<?=$gawe->name_gawe?>" class="form-control" required>
                    </div>
                    <div class="from-group">
                        <br>
                        <label>Tanggal Acara *</label>
                        <!-- input text akan memiliki value yg sudah terisi didalam inputannya sesuai dengan $id: date_gawe -->
                        <input type="date" name="date_gawe" value="<?=$gawe->date_gawe?>" class="form-control" required>
                    </div>
                    <div class="from-group">
                        <br>
                        <label>Info</label>
                        <!-- text area akan memiliki isi sesuai dengan $id: info_gawe -->
                        <textarea name="info_gawe" class="form-control"><?=$gawe->info_gawe?></textarea>
                    </div>
                    <div>
                        <br>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Save</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
<?= $this->endSection()?>