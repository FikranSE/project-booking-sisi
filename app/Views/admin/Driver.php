<?= $this->extend('admin/templet/layout'); ?>
<?= $this->section('content'); ?>

<?php
$items_per_page = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_index = ($page - 1) * $items_per_page;
$total_pages = ceil(count($driver) / $items_per_page);
?>

<main class="main-content">
  <h2 style="margin-left: 35px;">List Driver</h2>

  <div class="haloa" style="display: flex; justify-content: space-between; align-items: center;">
    <div style="display: flex; align-items: center;">

      <form id="searchForm" action="<?= base_url('admin/Driver'); ?>" method="get">
        <div class="search-container" style="margin-left: 10px;">
          <i class="fas fa-search"></i>
          <input type="search" id="search" name="keyword" placeholder="Ketik kata kunci..." style="height: 10%; font-size: small;" value="<?= $keyword ?>">
        </div>
      </form>
    </div>

    <div class="border-right" style="margin-right: 10%;">
      <a href="tambah_driver" class="btn-tambah-akun">
        <i class="fas fa-plus"></i> Add Driver
      </a>
    </div>
  </div>

  <form class="styled-box-6">
    <div class="table-responsive">
      <table role="table" aria-busy="false" aria-colcount="6" class="table b-table table-striped table-hover table-borderless border b-table-fixed b-table-stacked-sm custom-table" id="__BVID__56">
        <thead class="thead-blue">
          <tr>
            <th style="text-align: center;">No.</th>
            <th style="text-align: center;">Nama</th>
            <th style="text-align: center;">Telp</th>
            <th style="text-align: center;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $counter = 1; ?>

          <?php $counter = $start_index + 1; ?>
          <?php foreach (array_slice($driver, $start_index, $items_per_page) as $D) : ?>

            <tr>
              <td style="text-align: center;"><?= $counter++; ?></td>
              <td class="small-text"><?= $D['nama']; ?></td>
              <td class="small-text"><?= $D['telp']; ?></td>
              <td class="small-text">
                <div class="icon-container" style="margin-left: 35%;">
                  <a href="<?= site_url('admin/edit_driver/' . $D['id_driver']); ?>">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <a href="<?= site_url('admin/delete_driver/' . $D['id_driver']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus driver ini?')">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                </div>

              </td>
            </tr>
          <?php endforeach; ?>
      </table>
    </div>
    <div class="pagination-container">
      <div class="" id="">
        <ul class="pagination">
          <?php if ($page > 1) : ?>
            <li class="sebelumnya" id=""><a href="?page=<?= $page - 1 ?>" aria-controls="" data-dt-idx="0" tabindex="0" class="warna-hitam">Sebelumnya</a></li>
          <?php endif; ?>

          <?php
          // Menampilkan satu elemen paginasi dengan nomor halaman sesuai dengan variabel $page
          $displayed_page = max(1, $page); // pastikan tidak kurang dari 1
          ?>
          <li class="angka active"><a href="?page=<?= $displayed_page ?>" aria-controls="" data-dt-idx="<?= $displayed_page ?>" tabindex="0" style="color: #fff;"><?= $displayed_page ?></a></li>

          <?php if ($page < $total_pages) : ?>
            <li class="selanjutnya" id=""><a href="?page=<?= $page + 1 ?>" aria-controls="" data-dt-idx="8" tabindex="0" class="warna-hitam">Selanjutnya</a></li>
          <?php endif; ?>
        </ul>
      </div>
  </form>
  </div>
</main>
<?= $this->endSection(); ?>