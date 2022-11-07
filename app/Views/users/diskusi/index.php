<?=
$this->extend('Layout/User/templates');
$this->section('content');
?>

<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Kalau impianmu tak bisa membuatmu takut, mungkin karena impianmu tak cukup besar.</h1>
                            <p class="lead">- Muhammad Ali</p>
                        </div>
                    </div>

                    <section class="lp-mobile-view">
                        <div class="container">
                            <h4>Kalau impianmu tak bisa membuatmu takut, mungkin karena impianmu tak cukup besar.</h4>
                            <p>- Muhammad Ali</p>
                        </div>
                    </section>

                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Diskusi Materi <?= $tugas['nama_materi'] ?></h5>
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
                        <div class="content-info-jurnal">
                            <div class="row">

                                <?php foreach ($diskusi as $data) : ?>
                                    <div class="col-12">
                                        <div class="p-4" style="border: 1px solid #ebebeb; border-radius: 5px;">
                                            <div class="row ">
                                                <div class="col-12 col-md-6">
                                                    <?= $data['nama'] ?>
                                                </div>
                                                <div class="col-12 col-md-6 d-flex justify-content-end">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>