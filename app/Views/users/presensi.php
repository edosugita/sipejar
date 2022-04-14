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
                            <h6>presensi</h6>
                        </div>
                    </div>

                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg">
                            <div class="container-fluid ">
                                <div class="collapse navbar-collapse nav-tabs">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link list nav-active" aria-current="page" href="#">This course</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list" href="#">All course</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>

                    <div class="col-12">
                        <div class="absensi" style="overflow: auto;">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Points</th>
                                        <th scope="col" class="text-center">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="datecol cell c0" style="width:1px;">
                                            <nobr>Tue 5 Apr 2022</nobr>
                                            <nobr>1PM - 2PM</nobr>
                                        </td>
                                        <td>Regular class session</td>
                                        <td class="text-center">?</td>
                                        <td class="text-center">?/2</td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td class="datecol cell c0" style="width:1px;">
                                            <nobr>Tue 5 Apr 2022</nobr>
                                            <nobr>1PM - 2PM</nobr>
                                        </td>
                                        <td>Regular class session</td>
                                        <td class="text-center">?</td>
                                        <td class="text-center">?/2</td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <td class="datecol cell c0" style="width:1px;">
                                            <nobr>Tue 5 Apr 2022</nobr>
                                            <nobr>1PM - 2PM</nobr>
                                        </td>
                                        <td>Regular class session</td>
                                        <td class="text-center">?</td>
                                        <td class="text-center">?/2</td>
                                        <td class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 mt-4 mb-4">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="text-end" style="width:25%;">Taken sessions:</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td class="text-end" style="width:25%;">Points over taken sessions:</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td class="text-end" style="width:25%;">Percentage over taken sessions:</td>
                                    <td>0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<?=
$this->endSection();

// JS
$this->section('js');
?>

<script src="<?= base_url() ?>/assets/js/script.js"></script>

<?= $this->endSection(); ?>