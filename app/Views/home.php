<!-- ini adalah view yang extend dengan layout default -->
<!-- sehingga akan ditampilkan didalam halaman layout -->

<?= $this->extend('layout/default') ?>

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
