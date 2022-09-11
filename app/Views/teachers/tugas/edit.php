<?=
$this->extend('templates/teachers/templates');
$this->section('content');
?>

<main class="mt-3">
    <div class="container">
        <div class="row">

            <?= $this->include('templates/teachers/breadcrumb'); ?>

            <!-- CONTENT -->
            <div class="col-md-12 mt-4">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-nav">
                            <h6>Edit Tugas</h6>
                        </div>
                    </div>

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

                    <div class="col-12">
                        <div class="bg-white p-3 rounded">
                            <form action="<?= base_url('/teacher/matakuliah/' . $tugas[0]['id_tugas'] . '/edit/tugas/' . $tugas[0]['slug']) ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <label class="form-label">Nama Materi</label>
                                    <input type="text" class="form-control <?= (isset($validation)) ? ($validation->hasError('name')) ? 'is-invalid' : null : null ?>" name="name" placeholder="Nama Materi" value="<?= $tugas[0]['nama_materi'] ?>" required>
                                    <div class="invalid-feedback">
                                        <?= (isset($validation)) ? ($validation->getError('name')) : null ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi Materi</label>
                                    <textarea class="form-control <?= (isset($validation)) ? ($validation->hasError('desc')) ? 'is-invalid' : null : null ?>" name="desc" rows="3" required><?= $tugas[0]['deskripsi'] ?></textarea>
                                    <div class="invalid-feedback">
                                        <?= (isset($validation)) ? ($validation->getError('desc')) : null ?>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" style="cursor: pointer;" type="checkbox" value="1" name="absen" id="absen" <?= $tugas[0]['absen'] == null ? null : 'checked' ?>>
                                        <label class="form-check-label" for="absen" style="cursor: pointer;">
                                            Absen
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" style="cursor: pointer;" type="checkbox" value="1" name="tugas" id="tugas" <?= $tugas[0]['pengumpulan'] == null ? null : 'checked' ?>>
                                        <label class="form-check-label" for="tugas" style="cursor: pointer;">
                                            Pengumpulan Tugas
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" style="cursor: pointer;" type="checkbox" value="1" name="uas" id="uas" <?= $tugas[0]['ujian'] == null ? null : 'checked' ?>>
                                        <label class="form-check-label" for="uas" style="cursor: pointer;">
                                            Ujian
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3" id="linkUjian">
                                    <label class="form-label">Link Ujian</label>
                                    <input type="text" class="form-control <?= (isset($validation)) ? ($validation->hasError('link')) ? 'is-invalid' : null : null ?>" name="link" placeholder="ex: https://....." value="<?= $tugas[0]['link'] ?>">
                                    <div class="invalid-feedback">
                                        <?= (isset($validation)) ? ($validation->getError('link')) : null ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Materi</label>
                                    <input class="form-control <?= (isset($validation)) ? ($validation->hasError('file')) ? 'is-invalid' : null : null ?>" type="file" id="formFile" name="file" value="<?= $tugas[0]['file'] ?>">
                                    <div class="invalid-feedback">
                                        <?= (isset($validation)) ? ($validation->getError('file')) : null ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="button" c onclick="history.back()" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
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
</main>

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