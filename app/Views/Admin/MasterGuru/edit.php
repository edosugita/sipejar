<?=
$this->extend('Layout/templates');
$this->section('content');
?>

<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Edit Data Guru <?= $dataAdmin['name'] ?></h5>
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
                        <form action="<?= base_url('/admin/guru/' . $dataAdmin['id_guru'] . '/edit') ?>" method="post" onsubmit="return confirm('Anda yakin ingin merubah data ini?');">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control <?= (isset($validation)) ? ($validation->hasError('email')) ? 'is-invalid' : null : null ?>" placeholder="ex: Master" name="email" value="<?= $dataAdmin['email'] ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? ($validation->getError('email')) : null ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" id="data" oninput="tampil()" class="form-control  <?= (isset($validation)) ? ($validation->hasError('nama')) ? 'is-invalid' : null : null ?>" placeholder="ex: Master" name="name" value="<?= set_value('nama') ? set_value('nama') : $dataAdmin['name'] ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? ($validation->getError('nama')) : null ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ? set_value('password') : null ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? ($validation->getError('password')) : null ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" value="<?= set_value('cpassword') ? set_value('cpassword') : null ?>">
                                <div class="invalid-feedback">
                                    <?= (isset($validation)) ? ($validation->getError('cpassword')) : null ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end p-h-30">
                                    <div class="row">
                                        <button type="button" class="btn m-r-10 btn-hover-santri" style="border: 1px solid #049F67; color: #049F67;" onclick="history.go(-1);">Cancel</button>
                                        <button type="submit" class="btn btn-santri btn-hover-santri">Simpan</button>
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