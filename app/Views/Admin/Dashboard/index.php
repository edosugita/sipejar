<?=
$this->extend('Layout/templates');
$this->section('content');
?>

<div class="main-content">
    <div class="row">
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
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-blue">
                            <i class="anticon anticon-team"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0"><?= $siswa ?></h2>
                            <p class="m-b-0 text-muted">Data Siswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-user-add"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0"><?= $guru ?></h2>
                            <p class="m-b-0 text-muted">Data Guru</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>