<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url('assets/adminlte/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Bundling System</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url('profile') ?>" class="d-block"><b><?= $user['fullname']; ?></b></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column text-uppercase" data-widget="treeview" role="menu" data-accordion="false">

        <!-- CLIENT -->
        <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'menu-open' : null; ?>">
          <a href="<?= base_url('client/dashboard'); ?>" class="nav-link">
            <i class="nav-icon  fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <!-- MASTER DATA -->
        <li class="nav-item <?= $this->uri->segment(2) == 'master_data' ? 'menu-open' : null; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
              MASTER DATA
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('client/master_data/item'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- BUNDLING -->
        <li class="nav-item <?= $this->uri->segment(2) == 'bundling' ? 'menu-open' : null; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
              BUNDLING
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('client/bundling/item_bundling'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Item Bundling</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('client/bundling/request_bundling'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Request Bundling</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- REPORTS -->
        <li class="nav-item <?= $this->uri->segment(2) == 'reports' ? 'menu-open' : null; ?>">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
              REPORTS
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('client/reports/report_request_bundling'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Request Bundling</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('client/reports/news_bundling_report'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>News Bundling Report</p>
              </a>
            </li>
          </ul>
        </li>
        <!-- AKHIR CLIENT -->
      </ul>
    </nav>
    <br>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>