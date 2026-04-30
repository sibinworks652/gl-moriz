<?php if (session()->getFlashdata('success')) : ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?= esc(session()->getFlashdata('success')) ?>
  </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?= esc(session()->getFlashdata('error')) ?>
  </div>
<?php endif; ?>

<?php $errors = session()->getFlashdata('errors'); ?>
<?php if (is_array($errors) && $errors !== []) : ?>
  <div class="alert alert-danger">
    <?php foreach ($errors as $error) : ?>
      <div><?= esc($error) ?></div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
