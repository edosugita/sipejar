<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/teacher') ?>">SAE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="<?= base_url('/teacher/perpus') ?>" class="nav-link nav-name">Perpustakaan</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-name disabled"><?= session()->get('name') ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="img-profile" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if ($guru['picture'] == null) : ?>
                                <img src="<?= base_url('assets/content/images/user.png') ?>" alt="">
                            <?php else : ?>
                                <img src="<?= base_url('assets/content/images/' . $guru['picture']) ?>" alt="">
                            <?php endif; ?>
                        </div>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('/teacher/setting') ?>">Setting</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/logout') ?>">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>