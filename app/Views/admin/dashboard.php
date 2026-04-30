<?php $this->extend('admin/layouts/app'); ?>

<?php $this->section('content'); ?>
<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>

<section class="content">
  <?= $this->include('admin/partials/alerts') ?>
  <div class="row">
    <div class="col-md-4">
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?= esc((string) ($categoryCount ?? 0)) ?></h3>
          <p>Categories</p>
        </div>
        <div class="icon"><i class="fa fa-folder"></i></div>
        <a href="<?= base_url('admin/categories') ?>" class="small-box-footer">Manage <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?= esc((string) ($subcategoryCount ?? 0)) ?></h3>
          <p>Subcategories</p>
        </div>
        <div class="icon"><i class="fa fa-sitemap"></i></div>
        <a href="<?= base_url('admin/subcategories') ?>" class="small-box-footer">Manage <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3><?= esc((string) ($productCount ?? 0)) ?></h3>
          <p>Products</p>
        </div>
        <div class="icon"><i class="fa fa-cubes"></i></div>
        <a href="<?= base_url('admin/products') ?>" class="small-box-footer">Manage <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</section>
<?php $this->endSection(); ?>
