<?php $this->extend('admin/layouts/app'); ?>

<?php $this->section('pageStyles'); ?>
<style>
  .pagination {
    margin: 0;
  }
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<section class="content-header">
  <h1>Products <small>Manage product list</small></h1>
</section>

<section class="content">
  <?= $this->include('admin/partials/alerts') ?>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Product List</h3>
      <div class="box-tools pull-right">
        <a href="<?= base_url('admin/products/create') ?>" class="btn btn-primary btn-sm">Add Product</a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Thumbnail</th>
            <th>Name</th>
            <th>Category</th>
            <th>Subcategory</th>
            <th>Type</th>
            <th>Gallery</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($products === []) : ?>
            <tr><td colspan="9" class="text-center">No products found.</td></tr>
          <?php endif; ?>
          <?php foreach ($products as $index => $product) : ?>
            <tr>
              <td><?= (($currentPage - 1) * $perPage) + $index + 1 ?></td>
              <td><?php if (! empty($product['thumbnail'])) : ?><img src="<?= base_url($product['thumbnail']) ?>" alt="<?= esc($product['name']) ?>" style="width:60px;height:60px;object-fit:cover;"><?php endif; ?></td>
              <td><strong><?= esc($product['name']) ?></strong><br><small><?= esc($product['slug']) ?></small></td>
              <td><?= esc($product['category_name']) ?></td>
              <td><?= esc($product['subcategory_name'] ?? '-') ?></td>
              <td><?= esc($product['type'] ?: '-') ?></td>
              <td><?= isset($productGalleryMap[$product['id']]) ? count($productGalleryMap[$product['id']]) . ' image(s)' : '0 image' ?></td>
              <td><span class="label <?= $product['status'] === 'active' ? 'label-success' : 'label-default' ?>"><?= esc(ucfirst($product['status'])) ?></span></td>
              <td>
                <a href="<?= base_url('admin/products/edit/' . $product['id']) ?>" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                <form action="<?= base_url('admin/products/delete/' . $product['id']) ?>" method="post" style="display:inline;" class="delete-form">
                  <?= csrf_field() ?>
                  <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php if (isset($pager)) : ?>
      <div class="box-footer clearfix">
        <div class="pull-right">
          <?= $pager->links('products', 'default_full') ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php $this->section('pageScripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.delete-form').forEach(function (form) {
    form.addEventListener('submit', function (event) {
      event.preventDefault();
      Swal.fire({
        title: 'Delete product?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it'
      }).then(function (result) {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
});
</script>
<?php $this->endSection(); ?>
<?php $this->endSection(); ?>
