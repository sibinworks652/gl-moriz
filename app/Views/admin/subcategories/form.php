<?php $this->extend('admin/layouts/app'); ?>

<?php $this->section('content'); ?>
<section class="content-header">
  <h1><?= esc($pageTitle) ?></h1>
</section>

<section class="content">
  <?= $this->include('admin/partials/alerts') ?>
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= esc($pageTitle) ?></h3>
        </div>
        <form action="<?= esc($action) ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="box-body">
            <div class="form-group">
              <label>Category</label>
              <?php $categoryValue = (string) old('category_id', $subcategory['category_id'] ?? ''); ?>
              <select name="category_id" class="form-control">
                <option value="">Select category</option>
                <?php foreach ($categories as $category) : ?>
                  <option value="<?= $category['id'] ?>" <?= $categoryValue === (string) $category['id'] ? 'selected' : '' ?>><?= esc($category['name']) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Subcategory Name</label>
              <input type="text" name="name" class="form-control" value="<?= esc(old('name', $subcategory['name'] ?? '')) ?>" placeholder="Enter subcategory name">
            </div>
            <div class="form-group">
              <label>Thumbnail Image</label>
              <input type="file" name="thumbnail" class="form-control" accept="image/*">
              <?php if (! empty($subcategory['thumbnail'])) : ?>
                <p style="margin-top:10px;"><img src="<?= base_url($subcategory['thumbnail']) ?>" alt="" style="width:90px;height:90px;object-fit:cover;"></p>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Status</label>
              <?php $statusValue = old('status', $subcategory['status'] ?? 'active'); ?>
              <select name="status" class="form-control">
                <option value="active" <?= $statusValue === 'active' ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= $statusValue === 'inactive' ? 'selected' : '' ?>>Inactive</option>
              </select>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?= base_url('admin/subcategories') ?>" class="btn btn-default">Back to List</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php $this->endSection(); ?>
