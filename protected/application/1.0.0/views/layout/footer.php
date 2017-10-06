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