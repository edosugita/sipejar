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
                        <h5>Add New Class</h5>
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
                                    <select class="select2" name="class">
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
                                    <select class="select2" name="offering" required>
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