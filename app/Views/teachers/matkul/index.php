<?=
$this->extend('templates/teachers/templates');
$this->section('content');
?>
<main class="mt-3">
    <div class="container">
        <div class="row">

            <?= $this->include('templates/teachers/breadcrumb'); ?>

            <div class="col-md-12">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-matkul">
                            <h6><?= $matkul['nama_matkul'] ?></h6>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <a class="btn btn-primary" href="<?= base_url('/teacher/matakuliah/' . $matkul['slug'] . '/add') ?>">Tambah Tugas</a>
                    </div>

                    <?php
                    $i = 1;
                    $a = 1;
                    $t = 1;
                    $u = 1;
                    ?>
                    <?php foreach ($tugas as $data) : ?>
                        <div class="col-12">
                            <div class="matkul">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="nama-pelajaran">
                                            <h5>Pertemuan <?= $i++ ?>: <?= $data['nama_materi'] ?></h5>
                                        </div>
                                    </div>
                                    <?php if ($data['file'] !== null) : ?>
                                        <div class="mb-3 mt-3 col-12">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <a style="text-decoration: none;" href="<?= base_url('/assets/content/documents/' . $data['file']) ?>" download="">
                                                        <div class="files d-flex justify-content-start">
                                                            <div class="img me-3" style="width: 20px;">
                                                                <img style="width: 100%;" src="<?= base_url('assets/image/file.png') ?>" alt="">
                                                            </div>
                                                            <?= $data['file'] ?>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;  ?>
                                    <div class="col-12">
                                        <div class="matkul-information">
                                            <p><?= $data['deskripsi'] ?></p>
                                        </div>
                                    </div>
                                    <?php if ($data['absen'] !== null) : ?>
                                        <div class="col-10">
                                            <a style="text-decoration: none;" href="<?= base_url('/teacher/matakuliah/' . $matkul['slug'] . '/presensi/' . $a++) ?>" class="matkul-attendance">
                                                <i class="fas fa-user-friends"></i>
                                                Attendance
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <div class="matkul-check-list d-flex">
                                                <div class="form-check ms-auto">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;  ?>
                                    <?php if ($data['pengumpulan'] !== null) : ?>
                                        <div class="col-10">
                                            <a style="text-decoration: none;" class="matkul-form" href="<?= base_url('/teacher/matakuliah/tugas/' . $matkul['slug']) ?>/">
                                                <i class="fas fa-file-alt"></i>
                                                Tugas
                                            </a>
                                        </div>
                                        <div class="col-2">
                                            <div class="matkul-check-list d-flex">
                                                <div class="form-check ms-auto">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;  ?>
                                    <?php if ($data['ujian'] !== null) : ?>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <a href="<?= $data['link'] ?>" class="matkul-form" target="_blank">
                                                        <i class="fas fa-file-alt"></i>
                                                        <?= $data['link'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;  ?>
                                    <div class="col-12 mt-2">
                                        <div class="d-flex">
                                            <div class="ms-auto">
                                                <a href="<?= base_url('/teacher/matakuliah/' . $data['id_tugas'] . '/edit/tugas/' . $matkul['slug']) ?>" class="btn btn-warning">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>