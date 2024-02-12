<section id="sidebar">
  <div class="profile-tab-nav border-right">
    <ul class="side-menu top menu">
      <li>
        <a class="nav-link" id="dashboard-tab" data-toggle="pill" href="<?= site_url('admin/dashboard_admin'); ?>"
          role="tab" aria-controls="dashboard" aria-selected="false" style="margin-top: 5%; ">
          <i class="fa-solid fa-chart-column" style="color: #ffffff;"></i>
          <span class="text">Dashboard</span>
        </a>
      </li>
      <li class="item">
        <a class="nav-link sub-btn" id="BookingRequest-tab" data-toggle="pill" role="tab"
          aria-controls="BookingRequests" aria-selected="false">
          <i class="fa-solid fa-bell" style="color: #ffffff;"></i>
          <span class="text">Booking Request</span>
          <i class="bi bi-chevron-right dropdown"></i>
        </a>
        <div class="sub-menu">
          <a class="nav-link" href="<?= site_url('admin/BookRoom'); ?>" class="sub-item">Booking Ruangan</a>
          <a class="nav-link" href="<?= site_url('admin/booking_driver'); ?>"  class="sub-item">Booking Driver</a>
        </div>
      </li>
      <li>
        <a class="nav-link" id="User-tab" data-toggle="pill" href="<?= site_url('admin/User'); ?>" role="tab"
          aria-controls="User" aria-selected="false">
          <i class="fa-solid fa-user" style="color: #ffffff;"></i>
          <span class="text">User</span>
        </a>
      </li>
      <li>
        <a class="nav-link" id="Driver-tab" data-toggle="pill" href="<?= site_url('admin/Driver'); ?>" role="tab"
          aria-controls="Driver" aria-selected="false">
          <i class="fa-solid fa-car" style="color: #ffffff;"></i>
          <span class="text">Driver</span>
        </a>
      </li>
      <li>
        <a class="nav-link" id="ruangan-tab" data-toggle="pill" href="<?= site_url('admin/ruangan'); ?>" role="tab"
          aria-controls="ruangan" aria-selected="false">
          <i class="fa-solid fa-door-open" style="color: #ffffff;"></i>
          <span class="text">Ruangan</span>
        </a>
      </li>
      <li class="item">
        <a class="nav-link sub-btn" id="History" data-toggle="pill" role="tab" aria-controls="History"
          aria-selected="false">
          <i class="fa-solid fa-book-open" style="color: #ffffff;"></i>
          <span class="text">Monitoring</span>
          <i class="bi bi-chevron-right dropdown"></i>
        </a>
        <div class="sub-menu">
          <a class="nav-link" href="<?= site_url('admin/monruangan'); ?>" class="sub-item">Monitoring Ruangan</a>
          <a class="nav-link" href="<?= site_url('admin/mondriver'); ?>" class="sub-item">Monitoring Driver</a>
        </div>
      </li>

    </ul>
    <ul class="side-menu">
      <li>
      <li>
        <a class="nav-link" id="logout-tab" data-toggle="pill" href="javascript:void(0)" role="tab"
          aria-controls="logout" aria-selected="false" onclick="logout()">
          <i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>
          <span class="text">Logout</span>
        </a>
      </li>
    </ul>
  </div>
</section>