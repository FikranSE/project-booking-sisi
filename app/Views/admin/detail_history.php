<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>
<main class="main-content">
  <div style="margin-left: 35px;">
    <h2>Detail Booking </h2>
    <form class="styled-box-6">
      <div class="card-body">
        <div class="form-group row">
          <div class="col-sm-6 mb-3">
            <label for="PIC" style="color: #281362; font-weight: 600;">PIC</label>
            <input type="text" class="form-control" id="pic" name="pic" style="width: 80%; border-radius: 10px;"
              readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="Section" style="color: #281362; font-weight: 600;">Section</label>
            <input type="text" class="form-control" id="section" name="section" style="width: 80%; border-radius: 10px;"
              readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="Agenda" style="color: #281362; font-weight: 600;">Agenda</label>
            <input type="text" class="form-control" id="agenda" name="agenda" style="width: 80%; border-radius: 10px;"
              readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="Tanggal" style="color: #281362; font-weight: 600;">Tanggal</label>
            <input type="text" class="form-control" id="tanggal" name="tanggal" style="width: 80%; border-radius: 10px;"
              readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="JamMulai" style="color: #281362; font-weight: 600;">Jam Mulai</label>
            <input type="text" class="form-control" id="JamMulai" name="JamMulai"
              style="width: 80%; border-radius: 10px;" readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="JamSelesai" style="color: #281362; font-weight: 600;">Jam Selesai</label>
            <input type="text" class="form-control" id="jamSelesai" name="jamSelesai"
              style="width: 80%; border-radius: 10px;" readonly>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="Keterangan" style="color: #281362; font-weight: 600;">Keterangan</label>
            <textarea type="text" class="form-control" id="keterangan" name="keterangan"
              style="width: 80%; border-radius: 10px; height: 100px;" readonly></textarea>
          </div>
          <div class="col-sm-6 mb-3">
            <label for="meetRoom" style="color: #281362; font-weight: 600;">Meeting Room</label>
            <input class="form-control" id="meetRoom" name="meetRoom" style="width: 80%; border-radius: 10px;" readonly>
          </div>
        </div>
      </div>
    </form>
  </div>
</main>
<?= $this->endSection(); ?>