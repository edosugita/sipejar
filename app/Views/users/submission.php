<?=
$this->extend('templates/users/templates');
$this->section('content');
?>
<main class="mt-3">
    <div class="container">
        <div class="row">

            <?= $this->include('templates/users/breadcrumb'); ?>

            <?= $this->include('templates/users/navigation'); ?>

            <div class="col-md-9 col-7">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-matkul">
                            <h6>pengumpulan tugas</h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="submission">
                            <p>Silahkan mengumpulkan proposal penelitian skripsi yang terdiri dari Bab 1 - 3.</p>
                            <div class="files">
                                <div class="img-file">
                                    <img src="<?= base_url() ?>/assets/image/doc.png" alt="">
                                    <a href="<?= base_url() ?>/assets/doc/proposal_metpen.docx" download="proposal_metpen.docx">proposal_metpen.docx</a>
                                </div>
                                <span>13 April 2022, 8:20 AM</span>
                            </div>

                            <div class="row mt-5">
                                <div class="col-3">
                                    <span>File Submissions:</span>
                                </div>
                                <div class="col-9">
                                    <p class="text-end">Maximum file size: 24MB, maximum number of files: 20</p>
                                    <div class="wrapper">
                                        <form action="#">
                                            <input class="file-input" type="file" name="file" hidden>
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Browse File to Upload</p>
                                        </form>
                                        <section class="progress-area"></section>
                                        <section class="uploaded-area"></section>
                                    </div>

                                    <div class="col-12 mb-5 mt-3">
                                        <div class="button-group-submit">
                                            <input class="btn btn-primary btn-submission" type="button" value="Save changes">
                                            <input class="btn btn-secondary btn-submission" type="button" value="Cancel" onclick="location.href='<?= base_url() ?>/tugas'">
                                        </div>
                                    </div>
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