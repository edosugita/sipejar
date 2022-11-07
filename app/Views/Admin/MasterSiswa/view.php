<?=
$this->extend('Layout/templates');
$this->section('content');
?>

<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Data Admin <?= $dataAdmin['nama_siswa'] ?></h5>
                    </div>
                    <hr>
                    <div class="m-t-10">
                        <div class="form-group">
                            <label>NIS</label>
                            <p><?= $dataAdmin['NIS'] ?></p>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <p><?= $dataAdmin['email'] ?></p>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <p><?= $dataAdmin['nama_siswa'] ?></p>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end p-h-30">
                                <div class="row">
                                    <button type="button" class="btn btn-santri btn-hover-santri" onclick="history.back();">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>