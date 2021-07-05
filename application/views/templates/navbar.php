<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <span class="nav-link">
        <p><label id="hours"><?= date('H') ?></label>:<label id="minutes"><?= date('i') ?></label>:<label id="seconds"><?= date('s') ?></label></p>
      </span>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="<?= base_url(); ?>assets/img/profile/<?= $user['image'] ?>" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline"> <?= $user['fullname']; ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-info">
          <img src="<?= base_url(); ?>assets/img/profile/<?= $user['image'] ?>" class="img-circle elevation-2" alt="User Image">

          <p>
            <?= $user['fullname']; ?>
            <!-- <small>Member since <?= $user['created_date'] ?></small> -->
          </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <a href="<?= base_url('profile') ?>" class="btn btn-default btn-flat">Profile</a>
          <a href="#" data-toggle="modal" data-target="#logoutModal" class="btn btn-default btn-flat float-right">Sign out</a>
        </li>
      </ul>
    </li>
  </ul>


</nav>
<!-- /.navbar -->