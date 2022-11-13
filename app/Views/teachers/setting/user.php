<?=
$this->extend('Layout/User/templates');
$this->section('content');
?>

<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
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
                        <!-- CONTENT -->
                        <form action="<?= base_url('/setting') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="gambarLama" value="<?= $guru['picture'] ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-white p-3 rounded">
                                        <h5>Edit Profile</h5>
                                        <hr>
                                        <?php if (isset($validation)) : ?>
                                            <div class="col-12">
                                                <div class="alert alert-danger alert-dismissible fade show">
                                                    <?= $validation->getError('sampul') ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="mb-3 d-flex justify-content-center">
                                            <div class="image__setting-up">
                                                <img src="<?= base_url('assets/content/images/' . $guru['picture']) ?>" alt="" id="photo">
                                                <input type="file" class="my_file <?= (isset($validation)) ? ($validation->hasError('sampul')) ? 'is-invalid' : null : null ?>" name="sampul" id="file" onchange="previewImg()">
                                                <label for="file" id="uploadButton"><i class="anticon anticon-camera"></i></label>
                                            </div>
                                            <?php if (isset($validation)) : ?>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('sampul') ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Nama</label>
                                            <input type="text" class="form-control <?= (isset($validation)) ? ($validation->hasError('name')) ? 'is-invalid' : null : null ?>" name="name" placeholder="Name" required value="<?= session()->get('name') ?>">
                                            <div class="invalid-feedback">
                                                <?= (isset($validation)) ? ($validation->getError('name')) : null ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email" disabled value="<?= session()->get('email') ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label>Password</label>
                                            <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password') ? set_value('password') : null ?>">
                                            <div class="invalid-feedback">
                                                <?= (isset($validation)) ? ($validation->getError('password')) : null ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" value="<?= set_value('cpassword') ? set_value('cpassword') : null ?>">
                                            <div class="invalid-feedback">
                                                <?= (isset($validation)) ? ($validation->getError('cpassword')) : null ?>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label>Background</label>
                                        </div>
                                        <div class="mb-3">
                                            <div class="radio">
                                                <input id="default" name="bg" type="radio" value="default.png" <?= session()->get('background') == 'default.png' ? 'checked' : 'null' ?>>
                                                <label for="default">Default</label>
                                                <div class="col-12">
                                                    <img src="<?= base_url('assets/image/Default.png') ?>" alt="" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="radio">
                                                <input id="brown" name="bg" type="radio" value="brown.png" <?= session()->get('background') == 'brown.png' ? 'checked' : 'null' ?>>
                                                <label for="brown">Brown</label>
                                                <div class="col-12">
                                                    <img src="<?= base_url('assets/image/Brown.png') ?>" alt="" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="radio">
                                                <input id="pink" name="bg" type="radio" value="pink.png" <?= session()->get('background') == 'pink.png' ? 'checked' : 'null' ?>>
                                                <label for="pink">Pink</label>
                                                <div class="col-12">
                                                    <img src="<?= base_url('assets/image/Pink.png') ?>" alt="" style="width: 100%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <div class="row d-flex justify-content-end">
                                                <button type="button" class="btn m-r-10 btn-hover-santri" style="border: 1px solid #049F67; color: #049F67;" onclick="history.go(-1);">Cancel</button>
                                                <button type="submit" class="btn btn-santri btn-hover-santri">Save</button>
                                            </div>
                                        </div>
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
</div>

<?= $this->endSection(); ?>
<?= $this->section('js') ?>
<script>
    function previewImg() {
        const sampul = document.getElementById('file')
        const sampulLabel = document.querySelector('.my_file')
        const imgPreview = document.querySelector('#photo')

        sampulLabel.textContent = sampul.files[0].name

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0])

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result
        }
    }

    function previewBg() {
        const sampul = document.querySelector('#gambar');
        const sampulLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        sampulLabel.textContent = sampul.files[0].name;

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(sampul.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>
<?= $this->endSection() ?>