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
                            <p><?= $tugas[0]['deskripsi'] ?></p>
                            <h5>Submission status</h5>
                        </div>

                        <div class="table-submission mt-4" style="overflow: auto;">
                            <table class="table table-striped table-hover">
                                <?php if ($countAll == 1) : ?>
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
                                            <th style="width: 150px;">Last modified</th>
                                            <td><?= $submission[0]['updated_at'] ?></td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">File submissions</th>
                                            <td>
                                                <div class="files">
                                                    <div class="img-file">
                                                        <img src="<?= base_url() ?>/assets/image/pdf.png" alt="">
                                                        <span><?= $submission[0]['tugas'] ?></span>
                                                    </div>
                                                    <span><?= $submission[0]['created_at'] ?></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Submission comments</th>
                                            <td>Comments(0)</td>
                                        </tr>
                                    </tbody>

                                <?php elseif ($countAll == 0) : ?>
                                    <tbody>
                                        <tr>
                                            <th style="width: 150px;">Submission status</th>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Grading status</th>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Last modified</th>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">File submissions</th>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 150px;">Submission comments</th>
                                            <td>Comments(0)</td>
                                        </tr>
                                    </tbody>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 mb-5">
                        <?php if ($countAll == 1) : ?>
                            <div class="button-group">
                                <a href="<?= base_url('/pelajaran/tugas/' . $tugas[0]['id_tugas'] . '/' . $tugas[0]['nama_matkul'] . '/remove') ?>" class="btn btn-secondary btn-submission">Remove</a>
                                <input class="btn btn-secondary btn-submission" type="button" value="Edit Submission" onclick="location.href='<?= base_url('/pelajaran/tugas/' . $tugas[0]['id_tugas'] . '/' . $tugas[0]['nama_matkul'] . '/edit') ?>'">
                            </div>
                            <p class="text-center">You can still make changes to your submission.</p>
                        <?php elseif ($countAll == 0) : ?>
                            <div class="button-group">
                                <input class="btn btn-secondary btn-submission" type="button" value="Add Submission" onclick="location.href='<?= base_url('/pelajaran/tugas/' . $tugas[0]['id_tugas'] . '/' . $tugas[0]['nama_matkul'] . '/add') ?>'">
                            </div>
                            <p class="text-center">You can still make changes to your submission.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>