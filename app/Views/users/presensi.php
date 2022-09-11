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

            <div class="col-md-9 col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-matkul">
                            <h6>presensi</h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid ">
                                <div class="collapse navbar-collapse nav-tabs">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link list nav-active" aria-current="page" href="#">This course</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list" href="#">All course</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>

                    <div class="col-12">
                        <div class="absensi" style="overflow: auto;">
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
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Submit
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
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
            </div>

            <div class="col-md-3 col-12">

                <div class="col-12">
                    <div class="nama-nav">
                        <h6>calendar</h6>
                    </div>
                </div>

                <div class="calendar">
                    <div class="month">
                        <i class="fas fa-angle-left prev"></i>
                        <div class="date">
                            <h6></h6>
                        </div>
                        <i class="fas fa-angle-right next"></i>
                    </div>
                    <div class="weekdays">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="days"></div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Absensi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="absensi" value="2" id="hadir">
                        <label class="form-check-label" for="hadir">
                            Hadir
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="absensi" value="1" id="izin">
                        <label class="form-check-label" for="izin">
                            Izin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="absensi" value="0" id="alpha">
                        <label class="form-check-label" for="alpha">
                            Alpha
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?=
$this->endSection();

// JS
$this->section('js');
?>

<script src="<?= base_url() ?>/assets/js/script.js"></script>

<?= $this->endSection();
// JS
$this->section('js');
?>

<script src="<?= base_url() ?>/assets/js/calender.js"></script>

<?= $this->endSection(); ?>