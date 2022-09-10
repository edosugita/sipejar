<?=
$this->extend('templates/users/templates');
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

            <!-- CONTENT -->
            <form action="<?= base_url('/teacher/setting') ?>" method="post" enctype="multipart/form-data">
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
                                    <label for="file" id="uploadButton"><i class="uil uil-camera"></i></label>
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
                                <label>Bacground</label><br>
                                <div class="preview mt-3 mb-3">
                                    <img class="img-preview" alt="">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="form-control <?= (isset($validation)) ? ($validation->hasError('gambar')) ? 'is-invalid' : null : null ?>" id="gambar" name="gambar" onchange="previewBg()" value="<?= set_value('gambar') ?>">
                                    <div class="invalid-feedback">
                                        <?= (isset($validation)) ? ($validation->getError('gambar')) : null ?>
                                    </div>
                                    <label class="custom-file-label" for="gambar" hidden>Pilih Gambar</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

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