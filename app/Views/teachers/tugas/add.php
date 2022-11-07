<?=
$this->extend('Layout/Teacher/templates');
$this->section('content');
?>

<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Tambah Tugas</h5>
                    </div>
                    <hr>
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
                    <?php if (isset($validation)) : ?>
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show">
                                <b>Gagal&nbsp;</b>menambah data, mohon mengisi form dengan benar!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="m-t-10">
                        <form action="<?= base_url('/teacher/matakuliah/' . $matkul['slug'] . '/add') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <div class="mb-3">
                                <label class="form-label">Nama Materi</label>
                                <input type="text" class="form-control <?= (isset($validation)) ? ($validation->hasError('name')) ? 'is-invalid' : null : null ?>" name="name" placeholder="Nama Materi" value="<?= set_value('name') ?>" required>
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? ($validation->getError('name')) : null ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Materi</label>
                                <textarea class="form-control <?= (isset($validation)) ? ($validation->hasError('desc')) ? 'is-invalid' : null : null ?>" name="desc" rows="3" required><?= set_value('desc') ?></textarea>
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? ($validation->getError('desc')) : null ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" style="cursor: pointer;" type="checkbox" value="1" name="absen" id="absen">
                                    <label class="form-check-label" for="absen" style="cursor: pointer;">
                                        Absen
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" style="cursor: pointer;" type="checkbox" value="1" name="diskusi" id="diskusi">
                                    <label class="form-check-label" for="diskusi" style="cursor: pointer;">
                                        Diskusi
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" style="cursor: pointer;" type="checkbox" value="1" name="tugas" id="tugas">
                                    <label class="form-check-label" for="tugas" style="cursor: pointer;">
                                        Pengumpulan Tugas
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" style="cursor: pointer;" type="checkbox" value="1" name="uas" id="uas" onclick="ujianButton()">
                                    <label class="form-check-label" for="uas" style="cursor: pointer;">
                                        Ujian
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3 d-none" id="linkUjian">
                                <label class="form-label">Link Ujian</label>
                                <input type="text" class="form-control <?= (isset($validation)) ? ($validation->hasError('link')) ? 'is-invalid' : null : null ?>" name="link" placeholder="ex: https://....." value="<?= set_value('link') ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? ($validation->getError('link')) : null ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Materi</label>
                                <input class="form-control <?= (isset($validation)) ? ($validation->hasError('file')) ? 'is-invalid' : null : null ?>" type="file" id="formFile" name="file" value="<?= set_value('file') ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? ($validation->getError('file')) : null ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-end p-h-30">
                                    <div class="row">
                                        <button type="button" class="btn m-r-10 btn-hover-santri" style="border: 1px solid #049F67; color: #049F67;" onclick="history.go(-1);">Cancel</button>
                                        <button type="submit" class="btn btn-santri btn-hover-santri">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>

<script>
    function ujianButton() {
        const check = document.getElementById("uas").checked;
        const inputLink = document.getElementById("linkUjian");
        if (check == true) {
            inputLink.classList.add('d-block');
            inputLink.classList.remove('d-none');
        } else {
            inputLink.classList.add('d-none');
            inputLink.classList.remove('d-block');
        }
    }
</script>

<?= $this->endSection(); ?>