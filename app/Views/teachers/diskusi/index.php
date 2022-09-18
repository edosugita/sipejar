<?=
$this->extend('templates/users/templates');
$this->section('content');
?>

<main class="mt-3">
    <div class="container">
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
            <!-- ALERT END -->

            <!-- CONTENT -->
            <div class="col-md-9 col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-nav">
                            <h6>Diskusi Materi <?= $tugas['nama_materi'] ?></h6>
                        </div>
                    </div>

                    <?php if (session()->get('role') == 'guru') : ?>
                        <div class="col-12 mt-3 mb-3">
                            <a href="<?= base_url('/teacher/matakuliah/diskusi/' . $tugas['id_tugas'] . '/add') ?>" class="btn btn-primary">Tambah Diskusi</a>
                        </div>
                    <?php endif; ?>

                    <?php foreach ($diskusi as $data) : ?>
                        <div class="col-12">
                            <div class="p-4" style="border: 1px solid #dbdbdb; border-radius: 5px;">
                                <div class="row ">
                                    <div class="col-12 col-md-6">
                                        <?= $data['nama'] ?>
                                    </div>
                                    <div class="col-12 col-md-6 text-end">
                                        <?= date('j F Y', strtotime($data['created_at'])) ?>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <?= $data['topik'] ?>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="<?= base_url('/diskusi/view/' . $data['id']) ?>" class="btn btn-primary">Diskusi</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- RIGHT BAR -->
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