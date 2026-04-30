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
  <h1>Categories <small>Manage product categories</small></h1>
</section>

<section class="content">
  <?= $this->include('admin/partials/alerts') ?>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Category List</h3>
      <div class="box-tools pull-right">
        <a href="<?= base_url('admin/categories/create') ?>" class="btn btn-primary btn-sm">Add Category</a>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Thumbnail</th>
            <th>Name</th>
            <th>Catalogue</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($categories === []) : ?>
            <tr><td colspan="7" class="text-center">No categories found.</td></tr>
          <?php endif; ?>
          <?php foreach ($categories as $index => $category) : ?>
            <tr>
              <td><?= (($currentPage - 1) * $perPage) + $index + 1 ?></td>
              <td><?php if (! empty($category['thumbnail'])) : ?><img src="<?= base_url($category['thumbnail']) ?>" alt="<?= esc($category['name']) ?>" style="width:60px;height:60px;object-fit:cover;"><?php endif; ?></td>
              <td><?= esc($category['name']) ?></td>
              <td>
                <?php if (! empty($category['catalogue_file'])) : ?>
                  <a href="<?= base_url($category['catalogue_file']) ?>" target="_blank" rel="noopener">PDF</a>
                <?php else : ?>
                  -
                <?php endif; ?>
              </td>
              <td><?= esc($category['slug']) ?></td>
              <td><span class="label <?= $category['status'] === 'active' ? 'label-success' : 'label-default' ?>"><?= esc(ucfirst($category['status'])) ?></span></td>
              <td>
                <a href="<?= base_url('admin/categories/edit/' . $category['id']) ?>" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                <form action="<?= base_url('admin/categories/delete/' . $category['id']) ?>" method="post" style="display:inline;" class="delete-form">
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
          <?= $pager->links('categories', 'default_full') ?>
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
        title: 'Delete category?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it',
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
