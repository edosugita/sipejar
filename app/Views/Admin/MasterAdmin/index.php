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
                        <h5>Data Pengguna Admin</h5>
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
                    <div class="row m-b-30">
                        <div class="col-12 d-flex justify-content-end p-h-30">
                            <div class="row">
                                <a class="btn btn-santri btn-hover-santri" href="<?= base_url('/admin/master/add') ?>">Tambah Admin</a>
                            </div>
                        </div>
                    </div>
                    <div class="m-t-10">
                        <div class="table-responsive">
                            <table id="data-table" class="table table-hover table-borderless">
                                <thead style="background: #CDECE1;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dataAdmin as $data) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $data['nama'] ?></td>
                                            <td><?= $data['username'] ?></td>
                                            <td>
                                                <a class="btn btn-icon btn-hover btn-sm btn-rounded" href="<?= base_url('/admin/master/' . $data['id'] . '/view') ?>">
                                                    <i class="anticon anticon-eye" style="color: #336CFB;"></i>
                                                </a>
                                                <a class="btn btn-icon btn-hover btn-sm btn-rounded" href="<?= base_url('/admin/master/' . $data['id'] . '/edit') ?>">
                                                    <i class="anticon anticon-form" style="color: #049F67;"></i>
                                                </a>
                                                <button class="btn btn-icon btn-hover btn-sm btn-rounded btn-hapus-keg" style="cursor: pointer;" data-id="<?= $data['id'] ?>" data-judul="<?= $data['nama'] ?>">
                                                    <i class="anticon anticon-delete" style="color: #BF0603;"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DELETE KEGIATAN -->
<div class="modal fade" id="delete">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 12px; overflow:hidden;">
            <div class="modal-body text-center">
                <h5 class="judul-keg"></h5>
                <p>Apakah anda ingin menghapus data ini? Tolong konfirmasi jika anda ingin mengahapusnya</p>
            </div>
            <form action="<?= base_url('/admin/master/delete') ?>" method="post">
                <input type="text" class="idKegiatan" name="id" hidden>
                <div class="row" style="padding: 0 20px 20px 20px;">
                    <div class="col-6">
                        <button type="button" class="btn btn-hover-santri w-100" style="border: 1px solid #049F67; color: #049F67;" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-6">
                        <button type="submit" class="btn btn-santri btn-hover-santri" style="width: 100% !important;">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('js'); ?>
<script>
    // DELETE KEGIATAN
    $('.btn-hapus-keg').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const judul = $(this).data('judul');
        // Set data to Form Edit
        $('.judul-keg').html('Apakah anda ingin menghapus data <b>' + judul + '</b>?');
        $('.idKegiatan').val(id);
        // Call Modal Edit
        $('#delete').modal('show');
    });
</script>

<?= $this->endSection(); ?>