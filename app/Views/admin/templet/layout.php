<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>title</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('fontawesome/css/all.css'); ?>">

  <link rel="stylesheet" type="text/css" href="<?= base_url('css/style1.css'); ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
  <?= $this->include('admin/templet/navbar'); ?>
  <?= $this->include('admin/templet/sidebar'); ?>
  <?= $this->renderSection('content'); ?>

</body>
<script type="text/javascript">
  const activePage = window.location.pathname;
  const navLinks = document.querySelectorAll('.nav-link').
  forEach(link => {
    if (link.href.includes(`${activePage}`)) {
      link.classList.add('active');
    }
  })
  $(document).ready(function() {
    $('.sub-btn').click(function() {
      $(this).next('.sub-menu').slideToggle();
      $(this).find('.dropdown').toggleClass('rotate');
    });
  });
</script>

</html>