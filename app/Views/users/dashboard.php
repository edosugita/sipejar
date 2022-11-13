<?=
$this->extend('Layout/User/templates');
$this->section('content');
?>

<div class="main-content">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Barangsiapa tidak mau merasakan pahitnya belajar, ia akan merasakan hinanya kebodohan sepanjang hidupnya.</h1>
                            <p class="lead">- Imam Syafi’i</p>
                        </div>
                    </div>

                    <section class="lp-mobile-view">
                        <div class="container">
                            <h4>Barangsiapa tidak mau merasakan pahitnya belajar, ia akan merasakan hinanya kebodohan sepanjang hidupnya.</h4>
                            <p>- Imam Syafi’i</p>
                        </div>
                    </section>

                    <div class="d-flex justify-content-between align-items-center">
                        <h5>My Class</h5>
                    </div>
                    <hr>
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
                    <?php if (!empty(session()->getFlashdata('modalSuccess'))) : ?>
                        <div class="modal fade" id="infaq-santri">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 12px; overflow:hidden;">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                            <span class="sr-only"></span>
                                        </div>
                                    </div>
                                    <div class="modal-body text-center">
                                        <img src="<?= base_url('/assets/img/success-image.svg') ?>" class="mb-5">
                                        <h5>Data berhasil di proses</h5>
                                        <p><?= session()->getFlashdata('modalSuccess') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="m-t-10">
                        <div class="row">
                            <div class="col-md-9 col-12">
                                <div class="row">

                                    <?php foreach ($kelas as $display) : ?>
                                        <div class="col-lg-3 col-md-6" onclick="location.href='<?= base_url('/pelajaran/' . $display['slug']) ?>'" style="cursor: pointer;">
                                            <div class="card-jurnal">
                                                <div class="image-jurnal">
                                                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNTYiIGhlaWdodD0iMTgwIj48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJyZ2IoMTYyLCAxNTUsIDI1NCkiIC8+PHJlY3QgeD0iLTE2LjUiIHk9Ii0xNi41IiB3aWR0aD0iMzMiIGhlaWdodD0iMzMiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLW9wYWNpdHk9IjAuMDIiIGZpbGw9IiNkZGQiIGZpbGwtb3BhY2l0eT0iMC4xMjQiIHN0cm9rZS13aWR0aD0iMSIgLz48cmVjdCB4PSIxMzkuNjU3Njc2NjQ5NzciIHk9Ii0xNi41IiB3aWR0aD0iMzMiIGhlaWdodD0iMzMiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLW9wYWNpdHk9IjAuMDIiIGZpbGw9IiNkZGQiIGZpbGwtb3BhY2l0eT0iMC4xMjQiIHN0cm9rZS13aWR0aD0iMSIgLz48cmVjdCB4PSItMTYuNSIgeT0iMTYzLjgxNTM1MzI5OTU1IiB3aWR0aD0iMzMiIGhlaWdodD0iMzMiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLW9wYWNpdHk9IjAuMDIiIGZpbGw9IiNkZGQiIGZpbGwtb3BhY2l0eT0iMC4xMjQiIHN0cm9rZS13aWR0aD0iMSIgLz48cmVjdCB4PSIxMzkuNjU3Njc2NjQ5NzciIHk9IjE2My44MTUzNTMyOTk1NSIgd2lkdGg9IjMzIiBoZWlnaHQ9IjMzIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiBmaWxsLW9wYWNpdHk9IjAuMTI0IiBzdHJva2Utd2lkdGg9IjEiIC8+PHJlY3QgeD0iNjEuNTc4ODM4MzI0ODg2IiB5PSIyOC41Nzg4MzgzMjQ4ODYiIHdpZHRoPSIzMyIgaGVpZ2h0PSIzMyIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utb3BhY2l0eT0iMC4wMiIgZmlsbD0iI2RkZCIgZmlsbC1vcGFjaXR5PSIwLjA1NDY2NjY2NjY2NjY2NyIgc3Ryb2tlLXdpZHRoPSIxIiAvPjxyZWN0IHg9Ii0xNi41IiB5PSI3My42NTc2NzY2NDk3NzMiIHdpZHRoPSIzMyIgaGVpZ2h0PSIzMyIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utb3BhY2l0eT0iMC4wMiIgZmlsbD0iI2RkZCIgZmlsbC1vcGFjaXR5PSIwLjEyNCIgc3Ryb2tlLXdpZHRoPSIxIiAvPjxyZWN0IHg9IjEzOS42NTc2NzY2NDk3NyIgeT0iNzMuNjU3Njc2NjQ5NzczIiB3aWR0aD0iMzMiIGhlaWdodD0iMzMiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLW9wYWNpdHk9IjAuMDIiIGZpbGw9IiNkZGQiIGZpbGwtb3BhY2l0eT0iMC4xMjQiIHN0cm9rZS13aWR0aD0iMSIgLz48cmVjdCB4PSI2MS41Nzg4MzgzMjQ4ODYiIHk9IjExOC43MzY1MTQ5NzQ2NiIgd2lkdGg9IjMzIiBoZWlnaHQ9IjMzIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiBmaWxsLW9wYWNpdHk9IjAuMDM3MzMzMzMzMzMzMzMzIiBzdHJva2Utd2lkdGg9IjEiIC8+PHBvbHlsaW5lIHBvaW50cz0iMCwgMCwgMjguNTc4ODM4MzI0ODg2LCAxNi41LCAwLCAzMywgMCwgMCIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utb3BhY2l0eT0iMC4wMiIgZmlsbD0iI2RkZCIgZmlsbC1vcGFjaXR5PSIwLjE0MTMzMzMzMzMzMzMzIiBzdHJva2Utd2lkdGg9IjEiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE2LjUsIC0xNi41KSByb3RhdGUoMCwgMTYuNSwgMTQuMjg5NDE5MTYyNDQzKSIgLz48cG9seWxpbmUgcG9pbnRzPSIwLCAwLCAyOC41Nzg4MzgzMjQ4ODYsIDE2LjUsIDAsIDMzLCAwLCAwIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiBmaWxsLW9wYWNpdHk9IjAuMTQxMzMzMzMzMzMzMzMiIHN0cm9rZS13aWR0aD0iMSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTYuNSwgMTk2LjgxNTM1MzI5OTU1KSByb3RhdGUoMCwgMTYuNSwgMTQuMjg5NDE5MTYyNDQzKSBzY2FsZSgxLCAtMSkiIC8+PHBvbHlsaW5lIHBvaW50cz0iMCwgMCwgMjguNTc4ODM4MzI0ODg2LCAxNi41LCAwLCAzMywgMCwgMCIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utb3BhY2l0eT0iMC4wMiIgZmlsbD0iIzIyMiIgZmlsbC1vcGFjaXR5PSIwLjA4MDY2NjY2NjY2NjY2NyIgc3Ryb2tlLXdpZHRoPSIxIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxMzkuNjU3Njc2NjQ5NzcsIC0xNi41KSByb3RhdGUoMCwgMTYuNSwgMTQuMjg5NDE5MTYyNDQzKSBzY2FsZSgtMSwgMSkiIC8+PHBvbHlsaW5lIHBvaW50cz0iMCwgMCwgMjguNTc4ODM4MzI0ODg2LCAxNi41LCAwLCAzMywgMCwgMCIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utb3BhY2l0eT0iMC4wMiIgZmlsbD0iIzIyMiIgZmlsbC1vcGFjaXR5PSIwLjA4MDY2NjY2NjY2NjY2NyIgc3Ryb2tlLXdpZHRoPSIxIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxMzkuNjU3Njc2NjQ5NzcsIDE5Ni44MTUzNTMyOTk1NSkgcm90YXRlKDAsIDE2LjUsIDE0LjI4OTQxOTE2MjQ0Mykgc2NhbGUoLTEsIC0xKSIgLz48cG9seWxpbmUgcG9pbnRzPSIwLCAwLCAyOC41Nzg4MzgzMjQ4ODYsIDE2LjUsIDAsIDMzLCAwLCAwIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjMjIyIiBmaWxsLW9wYWNpdHk9IjAuMTUiIHN0cm9rZS13aWR0aD0iMSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoOTQuNTc4ODM4MzI0ODg2LCAyOC41Nzg4MzgzMjQ4ODYpIiAvPjxwb2x5bGluZSBwb2ludHM9IjAsIDAsIDI4LjU3ODgzODMyNDg4NiwgMTYuNSwgMCwgMzMsIDAsIDAiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLW9wYWNpdHk9IjAuMDIiIGZpbGw9IiMyMjIiIGZpbGwtb3BhY2l0eT0iMC4wNjMzMzMzMzMzMzMzMzMiIHN0cm9rZS13aWR0aD0iMSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNjEuNTc4ODM4MzI0ODg2LCAyOC41Nzg4MzgzMjQ4ODYpIHNjYWxlKC0xLCAxKSIgLz48cG9seWxpbmUgcG9pbnRzPSIwLCAwLCAyOC41Nzg4MzgzMjQ4ODYsIDE2LjUsIDAsIDMzLCAwLCAwIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjMjIyIiBmaWxsLW9wYWNpdHk9IjAuMTMyNjY2NjY2NjY2NjciIHN0cm9rZS13aWR0aD0iMSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoOTQuNTc4ODM4MzI0ODg2LCAxNTEuNzM2NTE0OTc0NjYpIHNjYWxlKDEsIC0xKSIgLz48cG9seWxpbmUgcG9pbnRzPSIwLCAwLCAyOC41Nzg4MzgzMjQ4ODYsIDE2LjUsIDAsIDMzLCAwLCAwIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiBmaWxsLW9wYWNpdHk9IjAuMTI0IiBzdHJva2Utd2lkdGg9IjEiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDYxLjU3ODgzODMyNDg4NiwgMTUxLjczNjUxNDk3NDY2KSBzY2FsZSgtMSwgLTEpIiAvPjxwb2x5bGluZSBwb2ludHM9IjAsIDAsIDI4LjU3ODgzODMyNDg4NiwgMTYuNSwgMCwgMzMsIDAsIDAiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLW9wYWNpdHk9IjAuMDIiIGZpbGw9IiMyMjIiIGZpbGwtb3BhY2l0eT0iMC4wODA2NjY2NjY2NjY2NjciIHN0cm9rZS13aWR0aD0iMSIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMTYuNSwgNzMuNjU3Njc2NjQ5NzczKSIgLz48cG9seWxpbmUgcG9pbnRzPSIwLCAwLCAyOC41Nzg4MzgzMjQ4ODYsIDE2LjUsIDAsIDMzLCAwLCAwIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiBmaWxsLW9wYWNpdHk9IjAuMTI0IiBzdHJva2Utd2lkdGg9IjEiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDEzOS42NTc2NzY2NDk3NywgNzMuNjU3Njc2NjQ5NzczKSBzY2FsZSgtMSwgMSkiIC8+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjMzIiBoZWlnaHQ9IjMzIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiBmaWxsLW9wYWNpdHk9IjAuMDg5MzMzMzMzMzMzMzMzIiBzdHJva2Utd2lkdGg9IjEiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE2LjUsIDE2LjUpIHJvdGF0ZSgtMzAsIDAsIDApIiAvPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIzMyIgaGVpZ2h0PSIzMyIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utb3BhY2l0eT0iMC4wMiIgZmlsbD0iI2RkZCIgZmlsbC1vcGFjaXR5PSIwLjAzNzMzMzMzMzMzMzMzMyIgc3Ryb2tlLXdpZHRoPSIxIiB0cmFuc2Zvcm09InNjYWxlKC0xLCAxKSB0cmFuc2xhdGUoLTEzOS42NTc2NzY2NDk3NywgMTYuNSkgcm90YXRlKC0zMCwgMCwgMCkiIC8+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjMzIiBoZWlnaHQ9IjMzIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjMjIyIiBmaWxsLW9wYWNpdHk9IjAuMDI4NjY2NjY2NjY2NjY3IiBzdHJva2Utd2lkdGg9IjEiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDE2LjUsIDQwLjY1NzY3NjY0OTc3Mykgcm90YXRlKDMwLCAwLCAzMykiIC8+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjMzIiBoZWlnaHQ9IjMzIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiBmaWxsLW9wYWNpdHk9IjAuMTQxMzMzMzMzMzMzMzMiIHN0cm9rZS13aWR0aD0iMSIgdHJhbnNmb3JtPSJzY2FsZSgtMSwgMSkgdHJhbnNsYXRlKC0xMzkuNjU3Njc2NjQ5NzcsIDQwLjY1NzY3NjY0OTc3Mykgcm90YXRlKDMwLCAwLCAzMykiIC8+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjMzIiBoZWlnaHQ9IjMzIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiBmaWxsLW9wYWNpdHk9IjAuMDIiIHN0cm9rZS13aWR0aD0iMSIgdHJhbnNmb3JtPSJzY2FsZSgxLCAtMSkgdHJhbnNsYXRlKDE2LjUsIC0xMzkuNjU3Njc2NjQ5NzcpIHJvdGF0ZSgzMCwgMCwgMzMpIiAvPjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIzMyIgaGVpZ2h0PSIzMyIgc3Ryb2tlPSIjMDAwIiBzdHJva2Utb3BhY2l0eT0iMC4wMiIgZmlsbD0iIzIyMiIgZmlsbC1vcGFjaXR5PSIwLjE1IiBzdHJva2Utd2lkdGg9IjEiIHRyYW5zZm9ybT0ic2NhbGUoLTEsIC0xKSB0cmFuc2xhdGUoLTEzOS42NTc2NzY2NDk3NywgLTEzOS42NTc2NzY2NDk3Nykgcm90YXRlKDMwLCAwLCAzMykiIC8+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjMzIiBoZWlnaHQ9IjMzIiBzdHJva2U9IiMwMDAiIHN0cm9rZS1vcGFjaXR5PSIwLjAyIiBmaWxsPSIjMjIyIiBmaWxsLW9wYWNpdHk9IjAuMDYzMzMzMzMzMzMzMzMzIiBzdHJva2Utd2lkdGg9IjEiIHRyYW5zZm9ybT0ic2NhbGUoMSwgLTEpIHRyYW5zbGF0ZSgxNi41LCAtMTYzLjgxNTM1MzI5OTU1KSByb3RhdGUoLTMwLCAwLCAwKSIgLz48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMzMiIGhlaWdodD0iMzMiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLW9wYWNpdHk9IjAuMDIiIGZpbGw9IiMyMjIiIGZpbGwtb3BhY2l0eT0iMC4xNSIgc3Ryb2tlLXdpZHRoPSIxIiB0cmFuc2Zvcm09InNjYWxlKC0xLCAtMSkgdHJhbnNsYXRlKC0xMzkuNjU3Njc2NjQ5NzcsIC0xNjMuODE1MzUzMjk5NTUpIHJvdGF0ZSgtMzAsIDAsIDApIiAvPjwvc3ZnPg==" alt="">
                                                </div>
                                                <div class="text-jurnal">
                                                    <div class="judul-jurnal">
                                                        <h4>Kelas <?= $display['kelas']; ?> - <?= $display['jurusan']; ?> <?= $display['offering']; ?></h4>
                                                    </div>
                                                    <div class="isi-jurnal">
                                                        <?= $display['nama_matkul'] ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>
                            </div>
                            <!-- RIGHT BAR -->
                            <div class="col-md-3 col-12">

                                <div class="online-users">

                                    <div class="nama-nav">
                                        <h5>Online Users</h5>
                                    </div>

                                    <div class="users">
                                        <div class="online mb-3">1 online users</div>
                                        <div>
                                            <div class="user-info">
                                                <div class="user-list-info d-flex">
                                                    <div style="background-color: green; width: 18px; height: 18px; border-radius: 50%; margin-right: 10px"></div>
                                                    <h6><?= session()->get('name') ?></h6>
                                                </div>
                                                <i class="uil uil-comment"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection();
$this->section('js');
?>

<script src="<?= base_url() ?>/assets/js/calender.js"></script>

<?= $this->endSection(); ?>