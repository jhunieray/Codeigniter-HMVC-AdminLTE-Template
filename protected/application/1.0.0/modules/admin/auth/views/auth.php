<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('assets/bootstrap/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/themes/adminlte/dist/css/AdminLTE.min.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('assets/themes/adminlte/dist/css/skins/_all-skins.min.css')?>">

  <?php
    foreach ($css_files as $css):
      if (file_exists(WEB_ROOT.$css)):
  ?>
  <link rel="stylesheet" href="<?=base_url($css)?>">
  <?php
      elseif (filter_var($css, FILTER_VALIDATE_URL)):
  ?>
  <script src="<?=$css?>" type="text/javascript"></script>
  <?php
      endif;
    endforeach;
  ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue sidebar-mini">
  	<div class="wrapper">
		<div class="login-box">
		  <div class="login-logo">
		    <a href="<?= site_url('admin') ?>"><?=$this->config->item('site_title')?></a>
		  </div>
		  <!-- /.login-logo -->
		  <div class="login-box-body">
		    <p class="login-box-msg">Sign in to start your session</p>

		    <?= form_open('admin/login', array('role' => 'form', 'data-toggle' => 'validator'))) ?>
			    <?php
			        if(isset($err_msg)) {
			    ?>
			    <div class="form-group text-center">
			        <p class="label-error" style="color: RED;"><i class='fa fa-warning fa-fw'></i><?= $err_msg ?></p>
			    </div>
			    <?php } ?>
			    <div class="form-group <?=form_error('username', '<ul class="list-unstyled"><li>', '</li></ul>')?'has-error has-danger':''?>">
	              	<label for="username">Username</label>
	              	<input type="text" class="form-control" name="username" id="username" placeholder="E.g.: johndoe2018" value="<?=set_value('username')?>" required="" autofocus>
	              	<div class="help-block with-errors"><?=form_error('username', '<ul class="list-unstyled"><li>', '</li></ul>')?></div>
	            </div>
	            <div class="form-group <?=form_error('password', '<ul class="list-unstyled"><li>', '</li></ul>')?'has-error has-danger':''?>">
	                <label for="password">Password</label>
	                <input type="password" class="form-control" name="password" id="password" placeholder="E.g.: **********" value="<?=set_value('password')?>" required="">
	                <div class="help-block with-errors"><?=form_error('password', '<ul class="list-unstyled"><li>', '</li></ul>')?></div>
	            </div>
		      	<div class="row">
			        <div class="col-xs-8">
			          <div class="checkbox icheck">
			            <label>
			              <input type="checkbox"> &nbsp; Remember Me
			            </label>
			          </div>
			        </div>
			        <!-- /.col -->
			        <div class="col-xs-4">
			          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
			        </div>
			        <!-- /.col -->
		      	</div>
		    <?= form_close() ?>
		    <br>
		    <center>
		    <a href="<?= site_url('admin/forgot') ?>"><i class="fa fa-question-circle"></i> Forgot Password?</a><br>
		    </center>

		  </div>
		  <!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->
  	</div>
	<!-- ./wrapper -->

	<!-- jQuery 2.2.3 -->
	<script src="<?=base_url('assets/themes/adminlte/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	<!-- SlimScroll -->
	<script src="<?=base_url('assets/themes/adminlte/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
	<!-- FastClick -->
	<script src="<?=base_url('assets/themes/adminlte/plugins/fastclick/fastclick.js')?>"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url('assets/themes/adminlte/dist/js/app.min.js')?>"></script>

	<?php
		foreach ($js_files as $js):
			if (file_exists(WEB_ROOT.$js)):
	?>
	<script src="<?=base_url($js)?>" type="text/javascript"></script>
	<?php
			elseif (filter_var($js, FILTER_VALIDATE_URL)):
	?>
	<script src="<?=$js?>" type="text/javascript"></script>
	<?php
			endif;
		endforeach;
	?>
	
	</body>
</html>