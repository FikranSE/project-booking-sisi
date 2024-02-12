<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>
<main class="main-content">
  <h2 style="margin-left: 35px;">Monitoring</h2>

  <div class="haloa" style="display: flex; justify-content: space-between; align-items: center;">
    <div style="display: flex; align-items: center;">

      <div class="search-container" style="margin-left: 10px;">
        <i class="fas fa-search"></i>
        <input type="text" id="search" placeholder="Ketik kata kunci..." style="height: 10%; font-size: small;">
      </div>
    </div>
  </div>

  <form class="styled-box-6">
    <div class="table-responsive">
      <table role="table" aria-busy="false" aria-colcount="6" class="table b-table table-striped table-hover table-borderless border b-table-fixed b-table-stacked-sm custom-table" id="__BVID__56">
        <thead class="thead-blue">
          <tr>
            <th style="text-align: center;">No.</th>
            <th style="text-align: center;">Tanggal</th>
            <th style="text-align: center;">Kode Booking</th>
            <th style="text-align: center;">PIC</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $counter = 1; ?>
          <?php foreach ($rekapData as $data) : ?>
            <tr>
              <td style="text-align: center;"><?= $counter++; ?></td>
              <td class="small-text"><?= $data['nama']; ?></td>
              <td class="small-text"><?= $data['kapasitas']; ?></td>
              <td class="small-text"><?= $data['fasilitas']; ?></td>
              <td class="small-text">
                <div class="icon-container" style="margin-left: 35%;">
                  <i class="fa-solid fa-pen-to-square" onclick="window.location.href='edit_ruangan'"></i>
                  <i class="fa-solid fa-trash"></i>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="pagination-container">
      <div class="" id="">
        <ul class="pagination">
          <li class="sebelumnya" id=""><a href="#" aria-controls="" data-dt-idx="0" tabindex="0">Sebelumnya</a></li>
          <li class="angka"><a href="#" aria-controls="" data-dt-idx="1" tabindex="0" style="color: #fff;">1</a></li>
          <li class="selanjutnya" id=""><a href="#" aria-controls="" data-dt-idx="8" tabindex="0">Selanjutnya</a></li>
        </ul>
      </div>
    </div>
    </div>
  </form>
  </div>
</main>
<?= $this->endSection(); ?>