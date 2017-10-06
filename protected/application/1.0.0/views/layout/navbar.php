<header class="main-header">
  <!-- Logo -->
  <a href="<?=site_url('admin')?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>LTE</span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <?php if(count($messages)>0): ?>
            <span class="label label-success"><?=count($messages)?></span>
            <?php endif;?>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have <?=count($messages)?> unread messages</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <?php 
                  //Unread Messages Only
                  foreach($messages as $message):
                    $user = $this->template_model->get_specific_column(array('first_name', 'last_name', 'image'), $message->user_id);
                ?>
                <li><!-- start message -->
                  <a href="<?=site_url('admin/messages/'.$message->thread_id)?>">
                    <div class="pull-left">
                      <img src="<?=base_url($user->image)?>" class="img-circle" alt="User Image">
                    </div>
                    <h4>
                      <?= $user->fname.$user->last_name ?>
                      <small><i class="fa fa-clock-o"></i> <?= $message->log_time ?></small>
                    </h4>
                    <p><?= substr($message->message, 0, 28).'...' ?></p>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
            </li>
            <li class="footer"><a href="<?=site_url('admin/messages')?>">See All Messages</a></li>
          </ul>
        </li>
        <!-- Notifications: style can be found in dropdown.less -->
        <li class="dropdown notifications-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <?php if(count($notifications)>0): ?>
            <span class="label label-warning"><?=count($notifications)?></span>
            <?php endif; ?>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have <?=count($notifications)?> notifications</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <?php 
                  //Latest Unread Notifications 
                  foreach($notifications as $notification):
                ?>
                <li>
                  <a href="<?=site_url('admin/notifications/'.$notification->id)?>">
                    <i class="fa <?=$notification->icon.' '.$notification->text_color?>"></i> <?=$notification->message?>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
            </li>
            <li class="footer"><a href="<?=site_url('admin/notifications')?>">View all</a></li>
          </ul>
        </li>
        <!-- Tasks: style can be found in dropdown.less -->
        <li class="dropdown tasks-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-flag-o"></i>
            <?php if(count($tasks)>0): ?>
            <span class="label label-danger"><?=count($tasks)?></span>
            <?php endif; ?>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have <?=count($tasks)?> tasks today</li>
            <li>
              <!-- inner menu: contains the actual data -->
              <ul class="menu">
                <?php 
                  //Latest Unread Notifications 
                  foreach($tasks as $task):
                ?>
                <li><!-- Task item -->
                  <a href="<?=site_url('admin/tasks/'.$task->id)?>">
                    <h3>
                      <?=$task->name?>
                      <small class="pull-right"><button class="btn btn-primary btn-xs"><i class="fa fa-check"></i></button></small>
                    </h3>
                  </a>
                </li>
                <?php endforeach; ?>
                <!-- end task item -->
              </ul>
            </li>
            <li class="footer">
              <a href="<?=site_url('admin/tasks')?>">View all tasks</a>
            </li>
          </ul>
        </li>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?=base_url($_SESSION['image'])?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?=$_SESSION['admin']->first_name.' '.$_SESSION['admin']->last_name?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?=base_url($_SESSION['image'])?>" class="img-circle" alt="User Image">

              <p>
                <?=$_SESSION['admin']->first_name.' '.$_SESSION['admin']->last_name?>
                <small><?=$_SESSION['admin']->designation?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?=site_url('admin/profile')?>" class="btn btn-info btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?=site_url('admin/logout')?>" class="btn btn-danger btn-flat">Log out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="<?=site_url()?>"><i class="fa fa-sign-out"></i></a>
        </li>
      </ul>
    </div>

  </nav>
</header>
  