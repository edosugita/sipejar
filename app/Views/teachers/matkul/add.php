<div class="modal fade" id="addClass" tabindex="-1" aria-labelledby="addClassLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClassLabel">Tambah Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url() ?>/teacher" method="post">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Pertemuan</label>
                        <select class="form-select" aria-label="Default select example" name="class">
                            <option selected disabled>Pertemuan</option>
                            <option value="10">1</option>
                            <option value="11">2</option>
                            <option value="12">3</option>
                            <option value="12">4</option>
                            <option value="12">5</option>
                            <option value="12">6</option>
                            <option value="12">7</option>
                            <option value="12">8</option>
                            <option value="12">9</option>
                            <option value="12">10</option>
                            <option value="12">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Materi</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="name" placeholder="Type your materi" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Materi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Absen
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Pengumpulan Tugas
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                UAS/UTS
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Upload File</label>
                        <input class="form-control" type="file" id="formFileMultiple" multiple>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>