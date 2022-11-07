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
                            <h6>Daftar Buku</h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row gap-3">
                            <?php foreach ($buku as $data) : ?>
                                <div class="col-md-3 p-4" style="background-color: #f5f5f5; border-radius: 10px;">
                                    <div class="cover" style="width: 100%; background-color: #025034; height: 170px; overflow: hidden; border-radius: 12px; ">
                                        <img style="width: 130%;" src="<?= base_url('/assets/content/images/' . $data['gambar']) ?>" alt="">
                                    </div>
                                    <div class="title text-center mt-3 w-100">
                                        <a style="text-decoration: none;" href="<?= base_url('/assets/content/documents/' . $data['file']) ?>" download=""><?= $data['nama_buku'] ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
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