<?=
$this->extend('templates/users/templates');
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
                                <h6>Jumlah Siswa : 200</h6>
                            </div>
                            <hr>
                            <table class="table table-borderless table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <?php $i = 1 ?>
                                <tbody>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td>
                                            <p>eeeee333333333333333333333333</p>
                                        </td>
                                        <td>0/2</td>
                                        <td>
                                            <a href="#" class="btn btn-warning"><i class="fas fa-pen"></i> edit</a>
                                        </td>
                                    </tr>
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