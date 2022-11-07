<?=
$this->extend('Layout/User/templates');
$this->section('content');
?>

<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Presensi</h5>
                    </div>
                    <hr>
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

                            <!-- CONTENT -->
                            <div class="col-md-9 col-12">
                                <div class="col-12 mt-4 mb-4">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Description</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Point</th>
                                                <th scope="col" class="text-center">Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($absenaa == 1) : ?>
                                                <tr>
                                                    <td>Regular class session</td>
                                                    <?php if ($absen[0]['status'] == 2) : ?>
                                                        <td class="text-center">Hadir</td>
                                                    <?php elseif ($absen[0]['status'] == 1) : ?>
                                                        <td class="text-center">Izin</td>
                                                    <?php elseif ($absen[0]['status'] == 0) : ?>
                                                        <td class="text-center">Tanpa Keterangan</td>
                                                    <?php endif ?>
                                                    <td class="text-center"><?= $absen[0]['status'] ?>/2</td>
                                                    <td class="text-center">
                                                    </td>
                                                </tr>
                                            <?php elseif ($absenaa == 0) : ?>
                                                <tr>
                                                    <td>Regular class session</td>
                                                    <td class="text-center">?</td>
                                                    <td class="text-center">?/2</td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-santri btn-hover-santri" data-toggle="modal" data-target="#exampleModalCenter">
                                                            Submit
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-12 mt-4 mb-4">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="text-end" style="width:25%;">Taken sessions:</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end" style="width:25%;">Points over taken sessions:</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td class="text-end" style="width:25%;">Percentage over taken sessions:</td>
                                                <td>0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- RIGHT BAR -->
                            <div class="col-md-3 col-12">

                                <div class="online-users">

                                    <div class="nama-nav">
                                        <h5>Online Users</h5>
                                    </div>

                                    <div class="users">
                                        <div class="online mb-3">1 online users</div>
                                        <div>
                                            <div class="user-info">
                                                <div class="user-list-info d-flex">
                                                    <div style="background-color: green; width: 18px; height: 18px; border-radius: 50%; margin-right: 10px"></div>
                                                    <h6><?= session()->get('name') ?></h6>
                                                </div>
                                                <i class="uil uil-comment"></i>
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
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Absen</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <form action="" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="absensi" value="2" id="hadir">
                        <label class="form-check-label" for="hadir">
                            Hadir
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="absensi" value="1" id="izin">
                        <label class="form-check-label" for="izin">
                            Izin
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="absensi" value="0" id="alpha">
                        <label class="form-check-label" for="alpha">
                            Alpha
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-hover-santri" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-santri btn-hover-santri">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection();
// JS
$this->section('js');
?>

<script src="<?= base_url() ?>/assets/js/script.js"></script>

<?= $this->endSection(); ?>