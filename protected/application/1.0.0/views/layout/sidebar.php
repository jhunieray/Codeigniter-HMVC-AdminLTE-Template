<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?=base_url($_SESSION['admin']->image)?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?=$_SESSION['admin']->first_name.' '.$_SESSION['admin']->last_name?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <?= display_menu(0, $modules) ?>
  </section>
  <!-- /.sidebar -->
</aside>