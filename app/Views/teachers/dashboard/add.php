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

            <?= $this->include('templates/teachers/breadcrumb'); ?>

            <!-- CONTENT -->
            <div class="col-12 mt-4">
                <div class="col-12">
                    <div class="nama-nav">
                        <h6>Add New Class</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="background-color: #FFFFFF; border-radius: 10px;">
                <form action="<?= base_url() ?>/teacher/add/matkul" method="post">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Class Name</label>
                            <input type="text" class="form-control <?= (isset($validation)) ? ($validation->hasError('name')) ? 'is-invalid' : null : null ?>" name="name" placeholder="Type your class name" value="<?= set_value('name') ?>" required>
                            <div class="invalid-feedback">
                                <?= (isset($validation)) ? ($validation->getError('name')) : null ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Class</label>
                            <select class="form-select" aria-label="Default select example" name="class">
                                <option value="10">X</option>
                                <option value="11">XI</option>
                                <option value="12">XII</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Departemen</label>
                            <input type="text" class="form-control <?= (isset($validation)) ? ($validation->hasError('departement')) ? 'is-invalid' : null : null ?>" name="departement" placeholder="ex: TKJ" value="<?= set_value('departement') ?>" required>
                            <div class="invalid-feedback">
                                <?= (isset($validation)) ? ($validation->getError('departement')) : null ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Offering</label>
                            <select class="form-select" aria-label="Default select example" name="offering" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="history.back()">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</main>

<?= $this->endSection(); ?>