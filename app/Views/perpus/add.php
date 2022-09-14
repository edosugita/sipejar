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
                            <h6>Tambah Buku</h6>
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
                            <form action="<?= base_url('/teacher/perpus/add') ?>" method="post" enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <div class="mb-3">
                                    <label class="form-label">Nama Buku</label>
                                    <input type="text" class="form-control <?= (isset($validation)) ? ($validation->hasError('name')) ? 'is-invalid' : null : null ?>" name="name" placeholder="Nama Buku" value="<?= set_value('name') ?>" required>
                                    <div class="invalid-feedback">
                                        <?= (isset($validation)) ? ($validation->getError('name')) : null ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Pembuat</label>
                                    <input type="text" class="form-control <?= (isset($validation)) ? ($validation->hasError('pembuat')) ? 'is-invalid' : null : null ?>" name="pembuat" placeholder="Nama Pembuat" value="<?= set_value('pembuat') ?>" required>
                                    <div class="invalid-feedback">
                                        <?= (isset($validation)) ? ($validation->getError('pembuat')) : null ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tahun Buku</label>
                                    <input type="text" class="form-control <?= (isset($validation)) ? ($validation->hasError('tahun')) ? 'is-invalid' : null : null ?>" name="tahun" placeholder="Tahun" value="<?= set_value('tahun') ?>" required>
                                    <div class="invalid-feedback">
                                        <?= (isset($validation)) ? ($validation->getError('tahun')) : null ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Cover Buku</label><br>
                                    <div class="preview mt-3 mb-3">
                                        <img class="img-preview" alt="">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="form-control <?= (isset($validation)) ? ($validation->hasError('gambar')) ? 'is-invalid' : null : null ?>" id="gambar" name="gambar" onchange="previewImg()" value="<?= set_value('gambar') ?>">
                                        <div class="invalid-feedback">
                                            <?= (isset($validation)) ? ($validation->getError('gambar')) : null ?>
                                        </div>
                                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload File</label>
                                    <input class="form-control <?= (isset($validation)) ? ($validation->hasError('file')) ? 'is-invalid' : null : null ?>" type="file" id="formFile" name="file" value="<?= set_value('file') ?>">
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

<?=
$this->endSection();

// JS
$this->section('js');
?>

<script src="<?= base_url() ?>/assets/js/script.js"></script>

<?= $this->endSection(); ?>