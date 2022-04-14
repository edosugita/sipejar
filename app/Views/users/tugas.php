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
                            <h6>pengumpulan proposal penelitian</h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="submission">
                            <p>Silahkan mengumpulkan proposal penelitian skripsi yang terdiri dari Bab 1 - 3.</p>
                            <h5>Submission status</h5>
                        </div>

                        <div class="table-submission mt-4" style="overflow: auto;">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <th style="width: 150px;">Submission status</th>
                                        <td>Submitted for grading</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Grading status</th>
                                        <td>Not graded</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Due date</th>
                                        <td>Tuesday, 19 April 2022, 11:59 PM</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Time remaining</th>
                                        <td>5 Days 6 hours</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Last modified</th>
                                        <td>Tuesday, 12 April 2022, 11:59 PM</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">File submissions</th>
                                        <td>
                                            <div class="files">
                                                <div class="img-file">
                                                    <img src="<?= base_url() ?>/assets/image/pdf.png" alt="">
                                                    <span>proposal_metpen.pdf</span>
                                                </div>
                                                <span>13 April 2022, 8:20 AM</span>
                                            </div>
                                            <div class="files">
                                                <div class="img-file">
                                                    <img src="<?= base_url() ?>/assets/image/doc.png" alt="">
                                                    <span>proposal_metpen.docx</span>
                                                </div>
                                                <span>13 April 2022, 8:20 AM</span>
                                            </div>
                                            <div class="files">
                                                <div class="img-file">
                                                    <img src="<?= base_url() ?>/assets/image/xls.png" alt="">
                                                    <span>proposal_metpen.xls</span>
                                                </div>
                                                <span>13 April 2022, 8:20 AM</span>
                                            </div>
                                            <div class="files">
                                                <div class="img-file">
                                                    <img src="<?= base_url() ?>/assets/image/ppt.png" alt="">
                                                    <span>proposal_metpen.ppt</span>
                                                </div>
                                                <span>13 April 2022, 8:20 AM</span>
                                            </div>
                                            <div class="files">
                                                <div class="img-file">
                                                    <img src="<?= base_url() ?>/assets/image/file.png" alt="">
                                                    <span>proposal_metpen.txt</span>
                                                </div>
                                                <span>13 April 2022, 8:20 AM</span>
                                            </div>
                                            <div class="files">
                                                <div class="img-file">
                                                    <img src="<?= base_url() ?>/assets/image/zip-file.png" alt="">
                                                    <span>proposal_metpen.zip</span>
                                                </div>
                                                <span>13 April 2022, 8:20 AM</span>
                                            </div>
                                            <div class="files">
                                                <div class="img-file">
                                                    <img src="<?= base_url() ?>/assets/image/sql.png" alt="">
                                                    <span>proposal_metpen.sql</span>
                                                </div>
                                                <span>13 April 2022, 8:20 AM</span>
                                            </div>
                                            <div class="files">
                                                <div class="img-file">
                                                    <img src="<?= base_url() ?>/assets/image/jpg.png" alt="">
                                                    <span>proposal_metpen.jpg</span>
                                                </div>
                                                <span>13 April 2022, 8:20 AM</span>
                                            </div>
                                            <div class="files">
                                                <div class="img-file">
                                                    <img src="<?= base_url() ?>/assets/image/png-format.png" alt="">
                                                    <span>proposal_metpen.png</span>
                                                </div>
                                                <span>13 April 2022, 8:20 AM</span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 150px;">Submission comments</th>
                                        <td>Comments(0)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 mb-5">
                        <div class="button-group">
                            <input class="btn btn-secondary btn-submission" type="button" value="Edit Submission" onclick="location.href='<?= base_url() ?>/pengumpulan'">
                            <input class="btn btn-secondary btn-submission" type="button" value="Remove Submission">
                        </div>
                        <p class="text-center">You can still make changes to your submission.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>