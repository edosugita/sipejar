<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/teacher') ?>">SIPEJAR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <?php if (session()->get('loggedSiswa') == 1) : ?>
                        <li class="nav-item">
                            <a href="" class="nav-link nav-name disabled"><?= session()->get('name') ?></a>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="img-profile" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="<?= base_url('assets/content/images/user.png') ?>" alt="">
                            </div>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('setting') ?>">Setting</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/logout') ?>">Logout</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>" class="nav-link nav-name">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>