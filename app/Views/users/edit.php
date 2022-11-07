<?=
$this->extend('templates/users/templates');
$this->section('content');
?>
<main class="mt-3">
    <div class="container">
        <div class="row">

            <?= $this->include('templates/users/breadcrumb'); ?>

            <div class="col-md-12">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-matkul">
                            <h6>pengumpulan tugas <?= $tugas[0]['nama_materi'] ?></h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="submission">
                            <div class="row">
                                <div class="col-3">
                                    <span>File Submissions:</span>
                                </div>
                                <div class="col-9">
                                    <form action="<?= base_url('pelajaran/tugas/' . $tugas[0]['id_tugas'] . '/' . $tugas[0]['nama_matkul'] . '/edit') ?>" method="post" enctype="multipart/form-data">
                                        <p class="text-end">Maximum file size: 2MB</p>
                                        <div class="wrapper">
                                            <div class="form">
                                                <input class="file-input" type="file" name="file" value="<?= $submission[0]['tugas'] ?>">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <p>Browse File to Upload</p>
                                            </div>
                                            <section class="progress-area"></section>
                                            <section class="uploaded-area"></section>
                                        </div>

                                        <div class="col-12 mb-5 mt-3">
                                            <div class="button-group-submit">
                                                <input class="btn btn-primary btn-submission" type="submit" value="Save changes">
                                                <input class="btn btn-secondary btn-submission" type="button" value="Cancel" onclick="history.back()">
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
    </div>
</main>

<?=
$this->endSection();

// JS
$this->section('js');
?>

<script src="<?= base_url() ?>/assets/js/script.js"></script>

<?= $this->endSection(); ?>