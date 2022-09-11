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
                            <h6>pengumpulan tugas <?= $matkul['nama_matkul'] ?></h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="submission">
                            <h5>Status Pengumpulan Murid</h5>
                        </div>

                        <div class="table-submission mt-4" style="overflow: auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($pengumpulan as $data) : ?>
                                        <tr>
                                            <th><?= $i++ ?></th>
                                            <td><?= $data['nama_siswa'] ?></td>
                                            <td class="text-center">1</td>
                                            <td class="text-center"><a href="<?= base_url('assets/content/documents/' . $data['tugas']) ?>" class="btn btn-primary" download="">Download</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>