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
                        <h5>Diskusi</h5>
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
                    <div class="col-12">
                        <div class="p-4" style="border: 1px solid #ebebeb; border-radius: 5px;">
                            <div class="row ">
                                <div class="col-12 col-md-6">
                                    <?= $tugas['nama'] ?>
                                </div>
                                <div class="col-12 col-md-6 d-flex justify-content-end">
                                    <?= date('j F Y', strtotime($tugas['created_at'])) ?>
                                </div>
                                <div class="col-12 mt-4">
                                    <?= $tugas['topik'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <p><i class="fas fa-comments"></i> Comment :</p>
                    </div>
                    <div class="col-12">
                        <div class="p-4" style="border: 1px solid #ebebeb; border-radius: 5px;">
                            <form action="<?= base_url('/diskusi/view/' . $tugas['id']) ?>" method="post" onsubmit="mySubmit()">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control bg-white" value="<?= session()->get('name') ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Comment</label>
                                    <textarea name="diskusi" id="articelcontent" cols="1" rows="1" hidden></textarea>
                                    <div id="editor">
                                        <p>Hello World!</p>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end p-h-30">
                                            <div class="row">
                                                <button type="submit" class="btn btn-santri btn-hover-santri">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php foreach ($comment as $data) : ?>
                        <div class="col-12 mt-3">
                            <div class="p-4" style="border: 1px solid #ebebeb; border-radius: 5px;">
                                <div class="row ">
                                    <div class="col-12 col-md-6">
                                        <?= $data['nama'] ?>
                                    </div>
                                    <div class="col-12 col-md-6 d-flex justify-content-end">
                                        <?= date('j F Y', strtotime($data['created_at'])) ?>
                                    </div>
                                    <div class=" col-12 mt-4">
                                        <?= $data['topik'] ?>
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

<?= $this->endSection(); ?>

<?= $this->section('js') ?>
<script src="<?= base_url('assets/js/editor.js') ?>"></script>
<?= $this->endSection() ?>