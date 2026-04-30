<?php $this->extend('admin/layouts/app'); ?>

<?php $this->section('content'); ?>
<section class="content-header">
  <h1><?= esc($pageTitle) ?></h1>
</section>

<section class="content">
  <?= $this->include('admin/partials/alerts') ?>
  <div class="row">
    <div class="col-md-8">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= esc($pageTitle) ?></h3>
        </div>
        <form action="<?= esc($action) ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="box-body">
            <div class="form-group">
              <label>Category Name</label>
              <input type="text" name="name" class="form-control" value="<?= esc(old('name', $category['name'] ?? '')) ?>" placeholder="Enter category name">
            </div>
            <div class="form-group">
              <label>Description</label>
              <textarea name="description" class="form-control" rows="4" placeholder="Enter category description"><?= esc(old('description', $category['description'] ?? '')) ?></textarea>
            </div>
            <div class="form-group">
              <label>Thumbnail Image</label>
              <input type="file" name="thumbnail" class="form-control" accept="image/*">
              <?php if (! empty($category['thumbnail'])) : ?>
                <p style="margin-top:10px;"><img src="<?= base_url($category['thumbnail']) ?>" alt="" style="width:90px;height:90px;object-fit:cover;"></p>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Catalogue PDF</label>
              <input type="file" name="catalogue_file" class="form-control" accept="application/pdf,.pdf">
              <?php if (! empty($category['catalogue_file'])) : ?>
                <p style="margin-top:10px;"><a href="<?= base_url($category['catalogue_file']) ?>" target="_blank" rel="noopener">View current catalogue</a></p>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control">
                <?php $statusValue = old('status', $category['status'] ?? 'active'); ?>
                <option value="active" <?= $statusValue === 'active' ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= $statusValue === 'inactive' ? 'selected' : '' ?>>Inactive</option>
              </select>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?= base_url('admin/categories') ?>" class="btn btn-default">Back to List</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php $this->endSection(); ?>
