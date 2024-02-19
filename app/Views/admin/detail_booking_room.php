<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>

<main class="main-content">
    <div style="margin-left: 35px;">
        <h2>Detail Booking Room</h2>
        <form class="styled-box-6" method="post" action="/proses/<?= $bookingRuangan['id_booking_ruangan']; ?>">
            <div class="card-body">
                <?php if (session()->has('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3">
                        <label for="PIC" style="color: #281362; font-weight: 600;">PIC</label>
                        <input type="text" class="form-control" id="pic" name="pic" style="width: 80%; border-radius: 10px;" readonly value="<?= $picName ?? 'Unknown'; ?>">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Section" style="color: #281362; font-weight: 600;">Section</label>
                        <input type="text" class="form-control" id="section" name="section" style="width: 80%; border-radius: 10px;" value="<?= $bookingRuangan['section']; ?>" readonly>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Agenda" style="color: #281362; font-weight: 600;">Agenda</label>
                        <input type="text" class="form-control" id="agenda" name="agenda" style="width: 80%; border-radius: 10px;" value="<?= $bookingRuangan['agenda']; ?>" readonly>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Tanggal" style="color: #281362; font-weight: 600;">Tanggal</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal" style="width: 80%; border-radius: 10px;" value="<?= $bookingRuangan['tanggal']; ?>" readonly>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="JamMulai" style="color: #281362; font-weight: 600;">Jam Mulai</label>
                        <input type="text" class="form-control" id="JamMulai" name="jam_mulai" style="width: 80%; border-radius: 10px;" value="<?= $bookingRuangan['jam_mulai']; ?>" readonly>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="JamSelesai" style="color: #281362; font-weight: 600;">Jam Selesai</label>
                        <input type="text" class="form-control" id="jamSelesai" name="jam_selesai" style="width: 80%; border-radius: 10px;" value="<?= $bookingRuangan['jam_selesai']; ?>" readonly>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="Keterangan" style="color: #281362; font-weight: 600;">Keterangan</label>
                        <textarea type="text" class="form-control" id="keterangan" name="keterangan" style="width: 80%; border-radius: 10px; height: 100px;" readonly><?= $bookingRuangan['keterangan']; ?></textarea>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label for="meetRoom" style="color: #281362; font-weight: 600;">Meeting Room</label>
                        <select class="form-control" id="nama" name="nama" style="width: 80%; border-radius: 10px;">
                            <option value="" selected disabled>Pilih Ruangan</option>
                            <?php foreach ($room as $r) : ?>
                                <option value="<?= $r['id_ruangan']; ?>">
                                    <?= $r['nama_ruangan']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row justify-content-between text-right">
                    <div class="col-sm-6">
                        <!-- <button class="btn btn-outline-primary" style="color: #281362; box-shadow: 2px 2px 5px #888888; border-radius: 20px;">Batal</button> -->
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" name="reject" class="btn btn-danger" style="color: #ffffff;width: 100px; margin-right: 2%; border-radius: 20px;">Tolak</button>
                        <button type="submit" name="approve" class="btn btn-success" style="color: #ffffff;width: 100px; margin-right: 20%; border-radius: 20px;">Setujui</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
</main>
<?= $this->endSection(); ?>