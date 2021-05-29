<!-- ini adalah view yang extend dengan layout default -->
<!-- sehingga akan ditampilkan didalam halaman layout -->
<!-- judul juga akan ditampilkan -->

<?= $this->extend('layout/default') ?>

<!-- titile view home.php -->
<?= $this->section('content') ?>
<title>Home &mdash; yukNikah</title>
<?= $this->endSection()?>

<!-- konten view home.php -->
<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        Hello World!
    </div>
</section>
<?= $this->endSection()?>