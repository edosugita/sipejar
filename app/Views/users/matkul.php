<?=
$this->extend('Layout/User/templates');
$this->section('content');
?>

<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5><?= $matkul['nama_matkul'] ?></h5>
                    </div>
                    <hr>
                    <?php if (!empty(session()->getFlashdata('success'))) : ?>
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible fade show">
                                <?= session()->getFlashdata('success'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show">
                                <?= session()->getFlashdata('fail'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty(session()->getFlashdata('modalSuccess'))) : ?>
                        <div class="modal fade" id="infaq-santri">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 12px; overflow:hidden;">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            <span class="sr-only"></span>
                                        </div>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="<?= base_url('/assets/img/success-image.svg') ?>" class="mb-5">
                                        <h5>Data berhasil di proses</h5>
                                        <p><?= session()->getFlashdata('modalSuccess') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="m-t-10">
                        <div class="row">
                            <!-- ALERT START -->
                            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                                <div class="col-12">
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <?= session()->getFlashdata('fail'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                <div class="col-12">
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <?= session()->getFlashdata('success'); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- CONTENT -->
                            <div class="col-md-9 col-12">
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
                                                    <div class="col-10 mt-3">
                                                        <a style="text-decoration: none;" href="<?= base_url('/pelajaran/' . $data['id_tugas'] . '/presensi/' . $matkul['slug']) ?>" class="matkul-attendance">
                                                            <i class="fas fa-user-friends"></i>
                                                            Attendance
                                                        </a>
                                                    </div>
                                                    <div class="col-2 d-flex justify-content-end">
                                                        <div class="matkul-check-list d-flex">
                                                            <div class="form-check ms-auto">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif;  ?>
                                                <?php if ($data['diskusi'] !== null) : ?>
                                                    <div class="col-10 mt-3">
                                                        <a style="text-decoration: none;" class="matkul-form" href="<?= base_url('/pelajaran/diskusi/' . $data['id_tugas']) ?>/">
                                                            <i class="fas fa-comments"></i>
                                                            Diskusi
                                                        </a>
                                                    </div>
                                                    <div class="col-2 d-flex justify-content-end">
                                                        <div class="matkul-check-list d-flex">
                                                            <div class="form-check ms-auto">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif;  ?>
                                                <?php if ($data['pengumpulan'] !== null) : ?>
                                                    <div class="col-10 mt-3">
                                                        <a style="text-decoration: none;" class="matkul-form" href="<?= base_url('/pelajaran/tugas/' . $data['id_tugas'] . '/' . $matkul['slug']) ?>/">
                                                            <i class="fas fa-file-alt"></i>
                                                            Tugas
                                                        </a>
                                                    </div>
                                                    <div class="col-2 d-flex justify-content-end">
                                                        <div class="matkul-check-list d-flex">
                                                            <div class="form-check ms-auto">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif;  ?>
                                                <?php if ($data['ujian'] !== null) : ?>
                                                    <div class="col-12 mt-3">
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
                            <!-- RIGHT BAR -->
                            <div class="col-md-3 col-12">

                                <div class="online-users">

                                    <div class="nama-nav">
                                        <h5>Online Users</h5>
                                    </div>

                                    <div class="users">
                                        <div class="online mb-3">1 online users</div>
                                        <div>
                                            <div class="user-info">
                                                <div class="user-list-info d-flex">
                                                    <div style="background-color: green; width: 18px; height: 18px; border-radius: 50%; margin-right: 10px"></div>
                                                    <h6><?= session()->get('name') ?></h6>
                                                </div>
                                                <i class="uil uil-comment"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection();
$this->section('js');
?>

<script src="<?= base_url() ?>/assets/js/calender.js"></script>

<?= $this->endSection(); ?>