<?=
$this->extend('Layout/Auth/templates');
$this->section('content');
?>

<div class="app">
    <div class="auth-left">
        <div class="left-top">
            <h1>SAE</h1>
            <p>Student Activity & Education</p>
        </div>
        <div class="left-center">
            <div class="left-text">
                <h2>Sign in for teacher</h2>
                <p>Awali Semua dengan membaca Basmallah</p>
            </div>

            <!-- ALERT START -->
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
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show">
                        <?= $validation->getError('email') ?></br>
                        <?= $validation->getError('password') ?>
                    </div>
                </div>
            <?php endif; ?>
            <!-- ALERT STOP -->

            <div class="left-form">
                <form action="<?= base_url('/teacher/login') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label>Email</label>
                        <div class="input-affix m-b-10">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="email" class="form-control" placeholder="ex: master" name="email" value="<?= set_value('email') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-affix m-b-10">
                            <i class="prefix-icon anticon anticon-lock"></i>
                            <input type="password" id="form-pw" class="form-control" placeholder="password" name="password" value="<?= set_value('password') ?>">
                            <i class="suffix-icon far fa-eye-slash" id="icon-pw" style="cursor: pointer;"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-santri btn-hover-santri">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="left-bottom">
            <p>Copyright © <?= date('Y'); ?> <i>Student Activity & Education</i>.</p>
        </div>
    </div>
    <div class="auth-right-teacher">

    </div>
</div>

<?= $this->endSection(); ?>