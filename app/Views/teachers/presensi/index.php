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
                            <h6>Absensi</h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="bg-white p-3 rounded">
                            <div class="d-flex justify-content-between">
                                <h6>Jumlah Siswa : 200</h6>
                                <h6>Hadir</h6>
                            </div>
                            <hr>
                            <div class="user-ed d-flex align-items-end justify-content-between mb-3">
                                <div class="d-flex align-items-end">
                                    <div class="rounded-circle bg-white me-3" style="width: 50px; height: 50px; overflow: hidden;">
                                        <img style="width: 100%;" src="<?= base_url('assets/content/images/user.png') ?>" alt="">
                                    </div>
                                    <p>eeeee</p>
                                </div>
                                <p>0/1</p>
                            </div>
                            <hr>
                            <div class="user-ed d-flex align-items-end justify-content-between mb-3">
                                <div class="d-flex align-items-end">
                                    <div class="rounded-circle bg-white me-3" style="width: 50px; height: 50px; overflow: hidden;">
                                        <img style="width: 100%;" src="<?= base_url('assets/content/images/user.png') ?>" alt="">
                                    </div>
                                    <p>eeeee</p>
                                </div>
                                <p>0/1</p>
                            </div>
                            <hr>
                            <div class="user-ed d-flex align-items-end justify-content-between mb-3">
                                <div class="d-flex align-items-end">
                                    <div class="rounded-circle bg-white me-3" style="width: 50px; height: 50px; overflow: hidden;">
                                        <img style="width: 100%;" src="<?= base_url('assets/content/images/user.png') ?>" alt="">
                                    </div>
                                    <p>eeeee</p>
                                </div>
                                <p>0/1</p>
                            </div>
                            <hr>
                            <div class="user-ed d-flex align-items-end justify-content-between mb-3">
                                <div class="d-flex align-items-end">
                                    <div class="rounded-circle bg-white me-3" style="width: 50px; height: 50px; overflow: hidden;">
                                        <img style="width: 100%;" src="<?= base_url('assets/content/images/user.png') ?>" alt="">
                                    </div>
                                    <p>eeeee</p>
                                </div>
                                <p>0/1</p>
                            </div>
                            <hr>
                            <div class="user-ed d-flex align-items-end justify-content-between mb-3">
                                <div class="d-flex align-items-end">
                                    <div class="rounded-circle bg-white me-3" style="width: 50px; height: 50px; overflow: hidden;">
                                        <img style="width: 100%;" src="<?= base_url('assets/content/images/user.png') ?>" alt="">
                                    </div>
                                    <p>eeeee</p>
                                </div>
                                <p>0/1</p>
                            </div>
                            <hr>
                            <div class="user-ed d-flex align-items-end justify-content-between mb-3">
                                <div class="d-flex align-items-end">
                                    <div class="rounded-circle bg-white me-3" style="width: 50px; height: 50px; overflow: hidden;">
                                        <img style="width: 100%;" src="<?= base_url('assets/content/images/user.png') ?>" alt="">
                                    </div>
                                    <p>eeeee</p>
                                </div>
                                <p>0/1</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>