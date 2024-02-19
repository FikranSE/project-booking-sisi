<?= $this->extend('admin/templet/layout'); ?>

<?= $this->section('content'); ?>
<main class="main-content">
    <div style="margin-left: 35px;">
        <h2>Detail Monitoring Driver</h2>
        <form class="styled-box-6 p-3" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3">
                            <label for="PIC" style="color: #281362; font-weight: 600;">PIC</label>
                            <input type="text" class="form-control" id="pic" name="pic" style="width: 80%; border-radius: 10px;" readonly value="<?= $picName ?? 'Unknown'; ?>">
                        </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Section" style="color: #281362; font-weight: 600;">Section</label>
                        <input type="text" class="form-control" id="section" name="section" style="width: 80%; border-radius: 10px;" readonly value="<?= $bookingDetail['section'] ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Agenda" style="color: #281362; font-weight: 600;">Agenda</label>
                        <input type="text" class="form-control" id="agenda" name="agenda" style="width: 80%; border-radius: 10px;" readonly value="<?= $bookingDetail['agenda'] ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Tanggal" style="color: #281362; font-weight: 600;">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" style="width: 80%; border-radius: 10px;" readonly value="<?= $bookingDetail['tanggal'] ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="JamMulai" style="color: #281362; font-weight: 600;">Jam Mulai</label>
                        <input type="text" class="form-control" id="JamMulai" name="jam_mulai" style="width: 80%; border-radius: 10px;" readonly value="<?= $bookingDetail['jam_mulai'] ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="JamSelesai" style="color: #281362; font-weight: 600;">Jam Selesai</label>
                        <input type="text" class="form-control" id="jamSelesai" name="jam_selesai" style="width: 80%; border-radius: 10px;" readonly value="<?= $bookingDetail['jam_selesai'] ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Driver" style="color: #281362; font-weight: 600;">Driver</label>
                        <input type="text" class="form-control" id="driver" name="id_driver" style="width: 80%; border-radius: 10px;" readonly value="<?= $bookingDetail['id_driver'] ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Destinasi" style="color: #281362; font-weight: 600;">Destinasi</label>
                        <input type="text" class="form-control" id="destinasi" name="destinasi" style="width: 80%; border-radius: 10px;" readonly value="<?= $bookingDetail['destinasi'] ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Keterangan" style="color: #281362; font-weight: 600;">Keterangan</label>
                        <textarea type="text" class="form-control" id="keterangan" name="keterangan" style="width: 80%; border-radius: 10px; height: 100px;"><?= $bookingDetail['keterangan'] ?></textarea>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Status" style="color: #281362; font-weight: 600;">Status</label>
                        <input type="text" class="form-control" id="status" name="status" style="width: 80%; border-radius: 10px;" readonly value="<?= $bookingDetail['status'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <a class="btn btn-secondary" href="mondriver" style="color: #ffffff;width: 100px; margin-right: 0px; border-radius: 20px;">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?= $this->endSection(); ?>