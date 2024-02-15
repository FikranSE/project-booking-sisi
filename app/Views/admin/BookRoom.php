<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>


<?php
$items_per_page = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_index = ($page - 1) * $items_per_page;
$total_pages = ceil(count($bookingRuangan) / $items_per_page);
?>

<main class="main-content">

  <div class="haloa">
    <h2> Booking Ruangan </h2>
    <div class="search-container">
      <i class="fas fa-search"></i>
      <input type="text" id="search" placeholder="Ketik kata kunci..." style="height: 10%; font-size:small;">
    </div>
  </div>
  <form class="styled-box-6">
    <div class="table-responsive">
      <table role="table" aria-busy="false" aria-colcount="6" class="table b-table table-striped table-hover table-borderless border b-table-fixed b-table-stacked-sm custom-table" id="__BVID__56">
        <thead class="thead-blue">
          <tr>
            <th style="text-align: center;">No.</th>
            <th style="text-align: center;">Kode Booking</th>
            <th style="text-align: center;">PIC</th>
            <th style="text-align: center;">Tanggal</th>
            <th style="text-align: center;">Jam</th>
            <th style="text-align: center;">Durasi</th>
            <th style="text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($bookingRuangan)) : ?>
            <?php $index = 1; ?>
            <?php foreach (array_slice($bookingRuangan, $start_index, $items_per_page) as $key => $BR) : ?> <tr>
                <td style="text-align: center;"><?php echo $start_index + $index; ?></td>
                <td class="small-text" style="text-align: center;"><?php echo $BR['id_booking_ruangan']; ?></td>
                <td class="small-text" style="text-align: center;"><?php echo $BR['nama']; ?></td>
                <td class="small-text" style="text-align: center;"><?php echo $BR['tanggal']; ?></td>
                <td class="small-text" style="text-align: center;">
                  <?php echo $BR['jam_mulai'] . ' - ' . $BR['jam_selesai']; ?></td>
                <td class="small-text" style="text-align: center;">
                  <?php echo calculateTotalJam($BR['jam_mulai'], $BR['jam_selesai']); ?></td>
                <td class="small-text">
                  <div class="icon-container">
                    <a href="<?= site_url('admin/detail_booking_room/' . $BR['id_booking_ruangan']); ?>">
                      <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="<?= site_url('admin/delete_booking/' . $BR['id_booking_ruangan']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus Data ini?')">
                      <i class="fa-solid fa-trash"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <?php $index++; ?>
            <?php endforeach; ?>
          <?php else : ?>
            <tr>
              <td colspan="6" style="text-align: center;">tidak ada request booking Room</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>

    </div>
    <div class="pagination-container">
      <div class="" id="">
        <ul class="pagination">
          <?php if ($page > 1) : ?>
            <li class="sebelumnya" id=""><a href="?page=<?= $page - 1 ?>" aria-controls="" data-dt-idx="0" tabindex="0" class="warna-hitam">Sebelumnya</a></li>
          <?php endif; ?>

          <?php
          $displayed_page = max(1, $page);
          ?>
          <li class="angka active"><a href="?page=<?= $displayed_page ?>" aria-controls="" data-dt-idx="<?= $displayed_page ?>" tabindex="0" style="color: #fff;"><?= $displayed_page ?></a></li>

          <?php if ($page < $total_pages) : ?>
            <li class="selanjutnya" id=""><a href="?page=<?= $page + 1 ?>" aria-controls="" data-dt-idx="8" tabindex="0" class="warna-hitam">Selanjutnya</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </form>
  </div>
</main>
<?= $this->endSection('content'); ?>


<?php
function calculateTotalJam($jamMulai, $jamSelesai)
{
  $timeStart = strtotime($jamMulai);
  $timeEnd = strtotime($jamSelesai);

  $hours = ($timeEnd - $timeStart) / 3600;

  return $hours;
}
?>