<?=
$this->extend('templates/users/templates');
$this->section('content');
?>

<main class="mt-3">
    <div class="container">
        <div class="row">

            <?= $this->include('templates/users/breadcrumb'); ?>

            <!-- CONTENT -->
            <div class="col-md-12 mt-4">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-nav">
                            <h6>Tambah Tugas</h6>
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
                            <form action="" method="post">
                                <!-- <div class="mb-3">
                                    <label class="form-label">Pertemuan</label>
                                    <select class="form-select" aria-label="Default select example" name="class">
                                        <option selected disabled>Pertemuan</option>
                                        <option value="10">1</option>
                                        <option value="11">2</option>
                                        <option value="12">3</option>
                                        <option value="12">4</option>
                                        <option value="12">5</option>
                                        <option value="12">6</option>
                                        <option value="12">7</option>
                                        <option value="12">8</option>
                                        <option value="12">9</option>
                                        <option value="12">10</option>
                                        <option value="12">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div> -->
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
                                        <input class="form-check-input" style="cursor: pointer;" type="checkbox" value="1" name="tugas" id="tugas">
                                        <label class="form-check-label" for="tugas" style="cursor: pointer;">
                                            Pengumpulan Tugas
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" style="cursor: pointer;" type="checkbox" value="1" name="uas" id="uas">
                                        <label class="form-check-label" for="uas" style="cursor: pointer;">
                                            UAS/UTS
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
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