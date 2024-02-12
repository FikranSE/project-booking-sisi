<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>
<main class="main-content">
  <ul class="box-info">
    <li>
      <i class="fa-solid fa-door-open" style="color: #ffffff;"></i>
      <span class="text">
        <h3 style="text-align: center;">0</h3>
        <p style="text-align: center;">Total Booking Ruangan</p>
      </span>
    </li>
    <li style="background: #BEBFC0;">
      <i class="fa-solid fa-car"></i>
      <span class="text">
        <h3 style="text-align: center;">0</h3>
        <p style="text-align: center;">Total Booking Driver</p>
      </span>
    </li>
    <li style="background: #F06823;">
      <i class="fa-regular fa-file" style="color: #ffffff;"></i>
      <span class="text">
        <h3 style="text-align: center;">0</h3>
        <p style="text-align: center;">Total Aktivitas Booking</p>
      </span>
    </li>
  </ul>
  <div class="halo" style="margin-top: 3%;">
    <h2> Booking Baru Baru Ini </h2>
  </div>
  <form class="styled-box-6">
    <div class="table-responsive">
      <table role="table" aria-busy="false" aria-colcount="6"
        class="table b-table table-striped table-hover table-borderless border b-table-fixed b-table-stacked-sm custom-table"
        id="__BVID__56">
        <thead class="thead-blue">
          <thead class="thead-blue">
            <tr>
              <th style="text-align: center;">No.</th>
              <th style="text-align: center;">Tanggal</th>
              <th style="text-align: center;">Jenis</th>
              <th style="text-align: center;">Kode Booking</th>
              <th style="text-align: center;">PIC</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>

        </thead>
        <tbody>
          <tr>
            <td style="text-align: center;">1</td>
            <td class="small-text" style="text-align: center;">15 Januari 2024</td>
            <td class="small-text" style="text-align: center;">Meeting Room 2</td>
            <td class="small-text" style="text-align: center;">09.00</td>
            <td class="small-text" style="text-align: center;">Husna Afiqah Y</td>
            <td class="small-text" style="text-align: center;">
              <i class="fa-solid fa-eye m-0" onclick="window.location.href='detail_booking_request'"></i>
            </td>

          </tr>
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