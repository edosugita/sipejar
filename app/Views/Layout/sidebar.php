<!-- Side Nav START -->
<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item">
                <a href="<?= base_url('/admin/dashboard') ?>">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-idcard"></i>
                    </span>
                    <span class="title">Data</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= base_url('/admin/master') ?>">
                            <span class="title">Data Admin</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/admin/siswa') ?>">
                            <span class="title">Data Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/admin/guru') ?>">
                            <span class="title">Data Guru</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/admin/kelas') ?>">
                            <span class="title">Data Kelas</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-question-circle"></i>
                    </span>
                    <span class="title">Edit Help</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= base_url('/admin/help/user') ?>">
                            <span class="title">User</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('/admin/help/teacher') ?>">
                            <span class="title">Teacher</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Side Nav END -->