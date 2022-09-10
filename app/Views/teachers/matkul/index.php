<?=
$this->extend('templates/users/templates');
$this->section('content');
?>
<main class="mt-3">
    <div class="container">
        <div class="row">

            <?= $this->include('templates/users/breadcrumb'); ?>

            <?= $this->include('templates/users/navigation'); ?>

            <div class="col-md-9 col-9">
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
                                            <a style="text-decoration: none;" class="matkul-form" href="<?= base_url('/teacher/tugas/' . $t++) ?>">
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
                                        <div class="col-10">
                                            <div class="matkul-form" onclick="location.href='<?= base_url() ?>/teacher/ulangan/<?= $matkul['slug'] ?>'">
                                                <i class="fas fa-file-alt"></i>
                                                UAS/UTS
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="matkul-check-list d-flex">
                                                <div class="form-check ms-auto">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;  ?>
                                    <div class="col-12 mt-2">
                                        <div class="d-flex">
                                            <div class="ms-auto">
                                                <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#addClass">Edit</button>
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