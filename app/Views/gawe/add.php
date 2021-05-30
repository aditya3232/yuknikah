<?= $this->extend('layout/default') ?>

<!-- titile view home.php -->
<?= $this->section('content') ?>
<title>Create Gawe &mdash; yukNikah</title>
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
        <h1>Create Gawe</h1>
    </div>

    <div class="section-body">
        <!-- card -->
        <div class="card">
            <!-- card header -->
            <div class="card-header">
                <h4>Buat Gawe / Acara</h4>
            </div>
            <!-- card body yg didalamnya ada form input-->
            <div class="card-body col-md-6">
                <!-- action-nya diarahkan ke url 'gawe' yang berisi method post -->
                <!-- kemudian atur routes url 'gawe' ke controller Gawe function store -->
                <form action="<?=site_url('gawe')?>" method="post" autocomplete="off">
                    <!-- tambahkan csrf_field agar form ini bisa diisi -->
                    <?= csrf_field() ?>
                    <div class="from-group">
                        <label>Nama Gawe / Acara *</label>
                        <!-- name input sebaiknya disamakan dengan nama field tabel didatabase -->
                        <input type="text" name="name_gawe" class="form-control" required autofocus>
                    </div>
                    <div class="from-group">
                        <br>
                        <label>Tanggal Acara *</label>
                        <!-- name input sebaiknya disamakan dengan nama field tabel didatabase -->
                        <input type="date" name="date_gawe" class="form-control" required>
                    </div>
                    <div class="from-group">
                        <br>
                        <label>Info</label>
                        <!-- name input sebaiknya disamakan dengan nama field tabel didatabase -->
                        <textarea name="info_gawe" class="form-control"></textarea>
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