<?php $this->extend('admin/layouts/app'); ?>

<?php $this->section('pageStyles'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css">
<style>
  .quill-editor {
    min-height: 220px;
    background: #fff;
  }
  .ql-toolbar.ql-snow,
  .ql-container.ql-snow {
    border-color: #d2d6de;
  }
</style>
<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<section class="content-header">
  <h1><?= esc($pageTitle) ?></h1>
</section>

<section class="content">
  <?= $this->include('admin/partials/alerts') ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?= esc($pageTitle) ?></h3>
        </div>
        <form action="<?= esc($action) ?>" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <div class="box-body">
            <?php $categoryValue = (string) old('category_id', $product['category_id'] ?? ''); ?>
            <?php $subcategoryValue = (string) old('subcategory_id', $product['subcategory_id'] ?? ''); ?>
            <?php $statusValue = old('status', $product['status'] ?? 'active'); ?>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Category</label>
                  <select name="category_id" id="category_id" class="form-control">
                    <option value="">Select category</option>
                    <?php foreach ($categories as $category) : ?>
                      <option value="<?= $category['id'] ?>" <?= $categoryValue === (string) $category['id'] ? 'selected' : '' ?>><?= esc($category['name']) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-1">
                <label>&nbsp;</label>
                <button type="button" id="toggle-category-quick-add" class="btn btn-default btn-block"><i class="fa fa-plus"></i></button>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Subcategory</label>
                  <select name="subcategory_id" id="subcategory_id" class="form-control" data-old-value="<?= esc($subcategoryValue) ?>">
                    <option value="">Select subcategory</option>
                  </select>
                </div>
              </div>
              <div class="col-md-1">
                <label>&nbsp;</label>
                <button type="button" id="toggle-subcategory-quick-add" class="btn btn-default btn-block"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div id="quick-category-box" class="well" style="display:none;">
              <div class="form-group">
                <label>New Category Name</label>
                <input type="text" id="quick_category_name" class="form-control" placeholder="Enter category name">
              </div>
              <button type="button" id="save-quick-category" class="btn btn-primary btn-sm">Save Category</button>
            </div>
            <div id="quick-subcategory-box" class="well" style="display:none;">
              <div class="form-group">
                <label>New Subcategory Name</label>
                <input type="text" id="quick_subcategory_name" class="form-control" placeholder="Enter subcategory name">
              </div>
              <button type="button" id="save-quick-subcategory" class="btn btn-primary btn-sm">Save Subcategory</button>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" name="name" id="product_name" class="form-control" value="<?= esc(old('name', $product['name'] ?? '')) ?>" placeholder="Enter product name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Slug</label>
                  <input type="text" name="slug" id="product_slug" class="form-control" value="<?= esc(old('slug', $product['slug'] ?? '')) ?>" placeholder="enter-product-slug">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Type</label>
                  <input type="text" name="type" class="form-control" value="<?= esc(old('type', $product['type'] ?? '')) ?>" placeholder="Example: machine, accessory">
                </div>
              </div>
            </div>
            <div class="row">
            <div class="col-md-6">
            <div class="form-group">
              <label>Product Information</label>
              <input type="hidden" name="product_information" id="product_information_input" value="<?= esc(old('product_information', $product['product_information'] ?? '')) ?>">
              <div id="product_information_editor" class="quill-editor"></div>
            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Features</label>
                <input type="hidden" name="features" id="features_input" value="<?= esc(old('features', $product['features'] ?? '')) ?>">
                <div id="features_editor" class="quill-editor"></div>
              </div>
            </div>
            <div class="col-md-4">         
              <div class="form-group">
                <label>Thumbnail</label>
                <input type="file" name="thumbnail" class="form-control" accept="image/*">
                <?php if (! empty($product['thumbnail'])) : ?>
                  <p style="margin-top:10px;"><img src="<?= base_url($product['thumbnail']) ?>" alt="" style="width:90px;height:90px;object-fit:cover;"></p>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <label>Image Gallery</label>
              <input type="file" name="gallery[]" class="form-control" accept="image/*" multiple>
              <p class="help-block">You can select multiple gallery images at once.</p>
            </div>
            
            <?php if ($gallery !== []) : ?>
              <div class="form-group">
                <label>Existing Gallery Images</label>
                <div class="row">
                  <?php foreach ($gallery as $image) : ?>
                    <div class="col-sm-3 text-center" style="margin-bottom:15px;">
                      <img src="<?= base_url($image['image']) ?>" alt="" style="width:100%;height:100px;object-fit:cover;border:1px solid #ddd;padding:4px;">
                      <div class="checkbox" style="margin-top:8px;">
                        <label>
                          <input type="checkbox" name="delete_gallery[]" value="<?= $image['id'] ?>"> Delete
                        </label>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php endif; ?>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="active" <?= $statusValue === 'active' ? 'selected' : '' ?>>Active</option>
                  <option value="inactive" <?= $statusValue === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
              </div>
            </div>
            </div>
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save Product</button>
            <a href="<?= base_url('admin/products') ?>" class="btn btn-default">Back to List</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php $this->section('pageScripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var productForm = document.querySelector('form[action="<?= esc($action) ?>"]');
  var categorySelect = document.getElementById('category_id');
  var subcategorySelect = document.getElementById('subcategory_id');
  var productNameInput = document.getElementById('product_name');
  var productSlugInput = document.getElementById('product_slug');
  var categoryBox = document.getElementById('quick-category-box');
  var subcategoryBox = document.getElementById('quick-subcategory-box');
  var categoryNameInput = document.getElementById('quick_category_name');
  var subcategoryNameInput = document.getElementById('quick_subcategory_name');
  var productInformationInput = document.getElementById('product_information_input');
  var featuresInput = document.getElementById('features_input');
  var slugEditedManually = productSlugInput.value.trim() !== '';

  function buildQuill(selector, initialHtml) {
    var editor = new Quill(selector, {
      theme: 'snow',
      placeholder: 'Start typing...',
      modules: {
        toolbar: [
          [{ header: [1, 2, 3, false] }],
          ['bold', 'italic', 'underline', 'strike'],
          [{ list: 'ordered' }, { list: 'bullet' }],
          [{ color: [] }, { background: [] }],
          [{ align: [] }],
          ['link', 'blockquote', 'code-block'],
          ['clean']
        ]
      }
    });

    if (initialHtml) {
      editor.root.innerHTML = initialHtml;
    }

    return editor;
  }

  var productInformationQuill = buildQuill('#product_information_editor', productInformationInput.value);
  var featuresQuill = buildQuill('#features_editor', featuresInput.value);

  function renderSubcategories(items, selectedValue) {
    subcategorySelect.innerHTML = '<option value="">Select subcategory</option>';
    items.forEach(function (item) {
      var option = document.createElement('option');
      option.value = item.id;
      option.textContent = item.name;
      if (String(selectedValue) === String(item.id)) {
        option.selected = true;
      }
      subcategorySelect.appendChild(option);
    });
  }

  function loadSubcategories(categoryId, selectedValue) {
    if (!categoryId) {
      renderSubcategories([], '');
      return;
    }

    fetch('<?= base_url('admin/categories') ?>/' + categoryId + '/subcategories')
      .then(function (response) { return response.json(); })
      .then(function (items) { renderSubcategories(items, selectedValue); })
      .catch(function () { renderSubcategories([], ''); });
  }

  function postForm(url, body) {
    return fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
      },
      body: body.toString()
    }).then(function (response) {
      return response.json().then(function (data) {
        if (!response.ok) {
          throw new Error(data.message || 'Request failed');
        }
        return data;
      });
    });
  }

  function slugify(value) {
    return value
      .toLowerCase()
      .trim()
      .replace(/[^a-z0-9]+/g, '-')
      .replace(/^-+|-+$/g, '');
  }

  document.getElementById('toggle-category-quick-add').addEventListener('click', function () {
    categoryBox.style.display = categoryBox.style.display === 'none' ? 'block' : 'none';
  });

  document.getElementById('toggle-subcategory-quick-add').addEventListener('click', function () {
    subcategoryBox.style.display = subcategoryBox.style.display === 'none' ? 'block' : 'none';
  });

  document.getElementById('save-quick-category').addEventListener('click', function () {
    var name = categoryNameInput.value.trim();
    if (!name) {
      alert('Enter category name.');
      return;
    }

    var body = new URLSearchParams();
    body.append('name', name);
    body.append('status', 'active');
    body.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

    postForm('<?= base_url('admin/categories/quick-store') ?>', body)
      .then(function (item) {
        var option = document.createElement('option');
        option.value = item.id;
        option.textContent = item.name;
        option.selected = true;
        categorySelect.appendChild(option);
        categoryNameInput.value = '';
        categoryBox.style.display = 'none';
        loadSubcategories(item.id, '');
      })
      .catch(function (error) {
        alert(error.message);
      });
  });

  document.getElementById('save-quick-subcategory').addEventListener('click', function () {
    var name = subcategoryNameInput.value.trim();
    if (!categorySelect.value) {
      alert('Select category first.');
      return;
    }
    if (!name) {
      alert('Enter subcategory name.');
      return;
    }

    var body = new URLSearchParams();
    body.append('category_id', categorySelect.value);
    body.append('name', name);
    body.append('status', 'active');
    body.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');

    postForm('<?= base_url('admin/subcategories/quick-store') ?>', body)
      .then(function (item) {
        loadSubcategories(categorySelect.value, item.id);
        subcategoryNameInput.value = '';
        subcategoryBox.style.display = 'none';
      })
      .catch(function (error) {
        alert(error.message);
      });
  });

  categorySelect.addEventListener('change', function () {
    loadSubcategories(this.value, '');
  });

  productNameInput.addEventListener('input', function () {
    if (!slugEditedManually) {
      productSlugInput.value = slugify(this.value);
    }
  });

  productSlugInput.addEventListener('input', function () {
    slugEditedManually = this.value.trim() !== '';
    this.value = slugify(this.value);
  });

  productForm.addEventListener('submit', function () {
    productInformationInput.value = productInformationQuill.root.innerHTML;
    featuresInput.value = featuresQuill.root.innerHTML;
  });

  loadSubcategories(categorySelect.value, subcategorySelect.getAttribute('data-old-value'));
});
</script>
<?php $this->endSection(); ?>
<?php $this->endSection(); ?>
