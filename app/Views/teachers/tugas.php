<?=
$this->extend('templates/users/templates');
$this->section('content');
?>
<main class="mt-3">
    <div class="container">
        <div class="row">

            <?= $this->include('templates/users/breadcrumb'); ?>

            <?= $this->include('templates/users/navigation'); ?>

            <div class="col-md-9 col-7">
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
                                        <th scope="col" colspan="2">Nama</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Review</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <div class="img-profile">
                                                <img src="https://icatcare.org/app/uploads/2018/07/Thinking-of-getting-a-cat.png" alt="">
                                            </div>
                                        </td>
                                        <td>Edo Sugita Ibrahim</td>
                                        <td class="text-center">1</td>
                                        <td class="text-center"><a href="#" class="btn btn-primary">Review</a></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>
                                            <div class="img-profile">
                                                <img src="https://icatcare.org/app/uploads/2018/07/Thinking-of-getting-a-cat.png" alt="">
                                            </div>
                                        </td>
                                        <td>Test</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center"></td>
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