<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?> | <?= $company['company_name'] ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/backend/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
    type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/backend/') ?>css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/backend/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/backend/') ?>css/select2.min.css" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
</head>

<body id="page-top">
  <?php if ($user['email'] == '') {
        redirect('auth/logout');
    } ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('dashboard') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-wifi"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Klaim Pengobatan</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?= $title == 'Dashboard'  ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>
      </li>

      <?php if ($this->session->userdata('role_id') == 1) { ?>
      <li class="nav-item <?= $title == 'Klaim'  ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('klaim') ?>">
          <i class="fas fa-fw fa-medkit"></i>
          <span>Klaim</span></a>
      </li>

      <li class="nav-item <?= $title == 'Karyawan'  ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('employee') ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Karyawan</span></a>
      </li>
      <?php } else if($this->session->userdata('role_id') == 4) { ?>
      <li class="nav-item <?= $title == 'Klaim'  ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('klaim/karyawan/' . $user['id']) ?>">
          <i class="fas fa-fw fa-medkit"></i>
          <span>Klaim</span></a>
      </li>
      <?php } else { ?>
        <li class="nav-item <?= $title == 'Klaim'  ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('klaim') ?>">
          <i class="fas fa-fw fa-medkit"></i>
          <span>Klaim</span></a>
      </li>
      <?php } ?>


      <?php if ($this->session->userdata('role_id') == 1) { ?>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item <?= $title == 'report'  ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('report') ?>">
          <i class="fas fa-fw fa-print"></i>
          <span>Laporan</span></a>
      </li>

      <li class="nav-item <?= $title == 'setting'  ? 'active' : '' ?>">
        <a class="nav-link" href="<?= site_url('setting') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Pengaturan</span></a>
      </li>
      <?php } ?>


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- <form class=" form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <h5>
              <?= $company['company_name'] ?>
            </h5>
          </form> -->
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                <img class="img-profile rounded-circle"
                  src="<?= base_url(''); ?>assets/images/profile/<?= $user['image']; ?>" alt="">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= site_url('user/profile') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Akun
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Bootstrap core JavaScript-->
        <script src="<?= base_url('assets/backend/') ?>vendor/jquery/jquery.min.js"></script>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?= $contents ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?= $company['company_name'] ?> <?= date('Y') ?>, Developed With &#10084;</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ?</h5>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= site_url('auth/logout') ?>">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/backend/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/backend/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/backend/') ?>js/sb-admin-2.min.js"></script>
  <!-- Page level plugins -->
  <script src="<?= base_url('assets/backend/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/backend/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/backend/') ?>js/demo/datatables-demo.js"></script>
  <script src="<?= base_url('assets/backend/') ?>js/select2.full.min.js"></script>



</body>

</html>