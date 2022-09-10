<?=
$this->extend('templates/users/templates');
$this->section('content');
?>
<main class="mt-3">
    <div class="container">
        <div class="row">

            <?= $this->include('templates/users/breadcrumb'); ?>

            <?= $this->include('templates/users/navigation'); ?>

            <div class="col-md-9 col-9">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-matkul">
                            <h6>Metodologi Penelitian</h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="matkul">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="nama-pelajaran">
                                        <h5>Pertemuan 2: Penyelesaian Bab 1</h5>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="matkul-information">
                                        <p>Kegiatan perkuliahan pada hari ini, Selasa, tanggal 22 Maret 2022, adalah melaksanakan Ujian Tengah Semester (UTS). Kegiatan perkuliahan akan dilaksanakan secara daring penuh (full online).</p>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="materi-video">
                                        <iframe src="https://www.youtube.com/embed/WcMsSyQ9f7I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="matkul-check-list d-flex">
                                        <div class="form-check ms-auto">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="matkul-attendance" onclick="location.href='<?= base_url() ?>/presensi'">
                                        <i class="fas fa-user-friends"></i>
                                        Attendance
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="matkul-check-list d-flex">
                                        <div class="form-check ms-auto">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="matkul-form" onclick="location.href='<?= base_url() ?>/tugas'">
                                        <i class="fas fa-file-alt"></i>
                                        Tugas
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="matkul-check-list d-flex">
                                        <div class="form-check ms-auto">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="matkul">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="nama-pelajaran">
                                        <h5>Pertemuan 4: Penyelesaian Bab 2</h5>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="matkul-information">
                                        <p>Kegiatan perkuliahan pada hari ini, Selasa, tanggal 22 Maret 2022, adalah melaksanakan Ujian Tengah Semester (UTS). Kegiatan perkuliahan akan dilaksanakan secara daring penuh (full online).</p>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="matkul-attendance" onclick="location.href='<?= base_url() ?>/presensi'">
                                        <i class="fas fa-user-friends"></i>
                                        Attendance
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="matkul-check-list d-flex">
                                        <div class="form-check ms-auto">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="matkul-form" onclick="location.href='<?= base_url() ?>/tugas'">
                                        <i class="fas fa-file-alt"></i>
                                        Tugas
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="matkul-check-list d-flex">
                                        <div class="form-check ms-auto">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="matkul">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="nama-pelajaran">
                                        <h5>Pertemuan 6: Penyelesaian Bab 3</h5>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="matkul-information">
                                        <p>Kegiatan perkuliahan pada hari ini, Selasa, tanggal 22 Maret 2022, adalah melaksanakan Ujian Tengah Semester (UTS). Kegiatan perkuliahan akan dilaksanakan secara daring penuh (full online).</p>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="matkul-attendance" onclick="location.href='<?= base_url() ?>/presensi'">
                                        <i class="fas fa-user-friends"></i>
                                        Attendance
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="matkul-check-list d-flex">
                                        <div class="form-check ms-auto">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="matkul-form">
                                        <i class="fas fa-file-alt"></i>
                                        UTS
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="matkul-check-list d-flex">
                                        <div class="form-check ms-auto">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
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
<?= $this->endSection(); ?>