<?=
$this->extend('templates/users/templates');
$this->section('content');
?>

<main class="mt-3">
    <div class="container">
        <div class="row">
            <?= $this->include('templates/users/breadcrumb'); ?>

            <!-- CONTENT -->
            <div class="col-md-9 col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-nav">
                            <h6>my courses</h6>
                        </div>
                    </div>

                    <?php foreach ($kelas as $data) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <a style="text-decoration: none;" href="<?= base_url('pelajaran/' . $data['slug']) ?>">
                                <div class="card">
                                    <div class="matkul-img"></div>
                                    <div class="card-body">
                                        <h5 class="card-title" style="text-transform: uppercase;"><?= $data['jurusan'] ?></h5>
                                        <p class="card-text"><?= $data['nama_matkul'] ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

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

                <!-- <div class="online-users">

                    <div class="nama-nav">
                        <h6>online users</h6>
                    </div>

                    <div class="users">
                        <div class="online">47 online users</div>
                        <div>
                            <div class="user-info">
                                <div class="user-list-info">
                                    <div class="user-img">
                                        <img src="https://icatcare.org/app/uploads/2018/07/Thinking-of-getting-a-cat.png" alt="">
                                    </div>
                                    <h6>Edo Sugita Ibrahim</h6>
                                </div>
                                <i class="uil uil-comment"></i>
                            </div>
                        </div>
                        <div>
                            <div class="user-info">
                                <div class="user-list-info">
                                    <div class="user-img">
                                        <img src="https://icatcare.org/app/uploads/2018/07/Thinking-of-getting-a-cat.png" alt="">
                                    </div>
                                    <h6>Edo Sugita Ibrahim</h6>
                                </div>
                                <i class="uil uil-comment"></i>
                            </div>
                        </div>
                        <div>
                            <div class="user-info">
                                <div class="user-list-info">
                                    <div class="user-img">
                                        <img src="https://icatcare.org/app/uploads/2018/07/Thinking-of-getting-a-cat.png" alt="">
                                    </div>
                                    <h6>Edo Sugita Ibrahim</h6>
                                </div>
                                <i class="uil uil-comment"></i>
                            </div>
                        </div>
                        <div>
                            <div class="user-info">
                                <div class="user-list-info">
                                    <div class="user-img">
                                        <img src="https://icatcare.org/app/uploads/2018/07/Thinking-of-getting-a-cat.png" alt="">
                                    </div>
                                    <h6>Edo Sugita Ibrahim</h6>
                                </div>
                                <i class="uil uil-comment"></i>
                            </div>
                        </div>
                        <div>
                            <div class="user-info">
                                <div class="user-list-info">
                                    <div class="user-img">
                                        <img src="https://icatcare.org/app/uploads/2018/07/Thinking-of-getting-a-cat.png" alt="">
                                    </div>
                                    <h6>Edo Sugita Ibrahim</h6>
                                </div>
                                <i class="uil uil-comment"></i>
                            </div>
                        </div>
                    </div>
                </div> -->
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