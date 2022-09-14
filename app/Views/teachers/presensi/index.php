<?=
$this->extend('templates/teachers/templates');
$this->section('content');
?>
<main class="mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary mb-4" onclick="history.back()"><i class="fas fa-arrow-left me-3"></i> Back</button>
            </div>
            <div class="col-md-12">
                <div class="row">

                    <div class="col-12">
                        <div class="nama-matkul">
                            <h6>Absensi</h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="bg-white p-3 rounded">
                            <div class="d-flex justify-content-between">
                                <h6>Jumlah Siswa : <?= $siswaCount[0]['id_kelas'] ?></h6>
                            </div>
                            <hr>
                            <table class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($siswa as $data) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td>
                                                <p><?= $data['nama_siswa'] ?></p>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="bg-white p-3 rounded">
                            <div class="d-flex justify-content-between">
                                <h6>Total Absen : <?= $absen[0]['id_absen'] ?> Siswa</h6>
                            </div>
                            <hr>
                            <table class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($namaAbsen as $data) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td>
                                                <p><?= $data['nama_siswa'] ?></p>
                                            </td>
                                            <?php if ($data['status'] == 1) : ?>
                                                <td>Telat</td>
                                            <?php elseif ($data['status'] == 2) : ?>
                                                <td>Hadir</td>
                                            <?php endif; ?>
                                            <td><?= $data['create'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>