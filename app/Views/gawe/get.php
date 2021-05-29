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
    </div>

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
                            <td><?= $value->date_gawe; ?></td>
                            <td><?= $value->info_gawe; ?></td>
                            <td>
                                <div class="badge badge-success">Active</div>
                            </td>
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