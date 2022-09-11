<?=
$this->extend('templates/teachers/templates');
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
            <div class="col-md-12 mt-4">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-nav">
                            <h6>my class</h6>
                        </div>
                    </div>

                    <div class="md-12 mb-5">
                        <a class="btn btn-primary" href="<?= base_url('/teacher/add/matkul') ?>">
                            <i class="uil uil-plus" style="margin-right: 5px;"></i>
                            Add Class
                        </a>
                    </div>

                    <?php foreach ($class as $display) : ?>
                        <div class="col-lg-3 col-md-4 col-sm-12 mb-4">
                            <div class="card">
                                <div class="matkul-img"></div>
                                <div class="card-body">
                                    <h5 class="card-title" style="text-transform: uppercase;">Kelas <?= $display['kelas']; ?> - <?= $display['jurusan']; ?> <?= $display['offering']; ?></h5>
                                    <a style="text-transform: capitalize;" href="<?= base_url('/teacher/matakuliah/' . $display['slug']) ?>" class="card-text"><?= $display['nama_matkul'] ?></a>
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