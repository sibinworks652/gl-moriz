<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Moriz | Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?= base_url('web/assets/images/home/fav.svg')?>" type="image/x-icon">

  <link rel="stylesheet" href="<?= base_url('admin/assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/ionicons.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/AdminLTE.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/_all-skins.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/morris.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/jquery-jvectormap.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/bootstrap-datepicker.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/daterangepicker.css') ?>">
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/bootstrap3-wysihtml5.min.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
  <?= $this->renderSection('pageStyles') ?>
  <style>
    .content-wrapper {
      min-height: 100vh !important;
    }
    .box .table td,
    .box .table th {
      vertical-align: middle !important;
    }
    .form-control{
      border-radius: 5px !important;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php
    $path = trim(parse_url(current_url(), PHP_URL_PATH) ?? '', '/');
    $isDashboard = $path === 'admin/dashboard';
    $isCategories = strpos($path, 'admin/categories') === 0;
    $isSubcategories = strpos($path, 'admin/subcategories') === 0;
    $isProducts = strpos($path, 'admin/products') === 0;
    $isProductCmsOpen = $isCategories || $isSubcategories || $isProducts;
  ?>
  <header class="main-header">
    <a href="<?= base_url('admin/dashboard') ?>" class="logo">
      <span class="logo-mini"><b>M</b>R</span>
      <span class="logo-lg"><b>Moriz</b> Admin</span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url('admin/assets/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= esc($adminName) ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?= base_url('admin/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url('admin/assets/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= esc($adminName) ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= $isDashboard ? 'active' : '' ?>">
          <a href="<?= base_url('admin/dashboard') ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview <?= $isProductCmsOpen ? 'active menu-open' : '' ?>">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Product CMS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu"<?= $isProductCmsOpen ? ' style="display:block;"' : '' ?>>
            <li class="<?= $isCategories ? 'active' : '' ?>"><a href="<?= base_url('admin/categories') ?>"><i class="fa fa-circle-o"></i> Categories</a></li>
            <li class="<?= $isSubcategories ? 'active' : '' ?>"><a href="<?= base_url('admin/subcategories') ?>"><i class="fa fa-circle-o"></i> Subcategories</a></li>
            <li class="<?= $isProducts ? 'active' : '' ?>"><a href="<?= base_url('admin/products') ?>"><i class="fa fa-circle-o"></i> Products</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
    <?= $this->renderSection('content') ?>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; <a target="_blank" href="https://glinfotech.net">GL Infotech</a>.</strong> All rights reserved.
  </footer>
</div>

<script src="<?= base_url('admin/assets/js/jquery.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/jquery-ui.min.js') ?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?= base_url('admin/assets/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/raphael.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/morris.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/jquery.sparkline.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/jquery-jvectormap-world-mill-en.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/jquery.knob.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/moment.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/daterangepicker.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/bootstrap-datepicker.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/jquery.slimscroll.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/fastclick.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/adminlte.min.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/dashboard.js') ?>"></script>
<script src="<?= base_url('admin/assets/js/demo.js') ?>"></script>
<?= $this->renderSection('pageScripts') ?>
</body>
</html>
