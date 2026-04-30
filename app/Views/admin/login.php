
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/font-awesome.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/AdminLTE.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('admin/assets/css/blue.css')?>">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
    body.login-page {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh; /* Takes full viewport height */
        margin: 0;
        overflow: hidden; /* Prevents unnecessary scrolling */
    }
    .login-box {
        margin-top: 0; /* Resets AdminLTE's default top margin */
    }
</style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>Admin</b>Panel</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>
    <form id="formAuthentication" method="post" action="<?= site_url('/admin/login') ?>">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="username" name="username" value="<?= esc(old('username')) ?>" placeholder="Enter your email or username">
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" aria-describedby="password">
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url('admin/assets/js/jquery.min.js')?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('admin/assets/js/bootstrap.min.js')?>"></script>
<!-- iCheck -->
<script src="<?= base_url('admin/assets/js/icheck.min.js')?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
