<?=
$this->extend('templates/users/templates');
$this->section('content');
?>
<main class="mt-3">
    <div class="container">
        <div class="row">

            <?= $this->include('templates/users/breadcrumb'); ?>

            <div class="col-md-9 col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-matkul">
                            <h6><?= $matkul['nama_matkul'] ?></h6>
                        </div>
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
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <div class="col-md-3 col-12">

                <div class="col-12">
                    <div class="nama-nav">
                        <h6>calendar</h6>
                    </div>
                </div>

                <div class="calendar">
                    <div class="month">
                        <i class="fas fa-angle-left prev"></i>
                        <div class="date">
                            <h6></h6>
                        </div>
                        <i class="fas fa-angle-right next"></i>
                    </div>
                    <div class="weekdays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="days"></div>
                </div>
            </div>
        </div>
    </div>
</main>
<?=
$this->endSection();

// JS
$this->section('js');
?>

<script src="<?= base_url() ?>/assets/js/calender.js"></script>

<?= $this->endSection(); ?>