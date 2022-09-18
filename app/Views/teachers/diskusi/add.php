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
            <div class="col-md-9 col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-nav">
                            <h6>Tambah Diskusi</h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <form action="<?= base_url('/teacher/matakuliah/diskusi/' . $idTugas . '/add') ?>" method="post" onsubmit="mySubmit()">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control bg-white" value="<?= session()->get('name') ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Topik Diskusi</label>
                                <textarea name="diskusi" id="articelcontent" cols="1" rows="1" hidden></textarea>
                                <div id="editor">
                                    <p>Hello World!</p>
                                </div>
                            </div>


                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" c onclick="history.back()" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- RIGHT BAR -->
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

<?=
$this->endSection();

// JS
$this->section('js');
?>

<script src="<?= base_url() ?>/assets/js/calender.js"></script>

<?= $this->endSection(); ?>