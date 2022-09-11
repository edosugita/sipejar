<?= $this->extend('auth/template/index'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="card-form">
        <div class="col-lg-5 col-md-5 col-sm-12">
            <!-- ALERT START -->
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $validation->getError('email') ?></br>
                        <?= $validation->getError('password') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('fail'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            <?php endif; ?>
            <!-- ALERT STOP -->
            <div class="login-form">
                <form action="<?= base_url('/login') ?>" method="post">
                    <h5 class="h5-login">Login Student</h5>
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control <?= (isset($validation)) ? ($validation->hasError('email')) ? 'is-invalid' : null : null ?>" placeholder=" example@gmail.com" name="email" value="<?= set_value('email') ?>">
                        <div class="invalid-feedback">
                            <?= (isset($validation)) ? ($validation->getError('email')) : null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control <?= (isset($validation)) ? ($validation->hasError('password')) ? 'is-invalid' : null : null ?>" placeholder="password" name="password" value="<?= set_value('password') ?>">
                        <div class="invalid-feedback">
                            <?= (isset($validation)) ? ($validation->getError('password')) : null ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>