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
        <!-- MEMFILTER DATA CLIENT DAN LOCATION -->
        <?php
        $client = $this->db->get_where('client', ['id_location' => $this->session->userdata('id_location')])->result_array();
        $location = $this->db->get('location')->result_array() ?>

        <div class="form-group">
          <select class="form-control select2bs4" onchange="location = this.options[this.selectedIndex].value;">
            <option value="" selected disabled>--client--</option>
            <?php foreach ($client as $row) : ?>
              <?php if ($row['id_client'] == $this->uri->segment(4)) { ?>
                <option value="<?= base_url('spv/dashboard/index/' . $row['id_client']) ?>" selected><?= $row['client_name']; ?></option>
              <?php } else { ?>
                <option value="<?= base_url('spv/dashboard/index/' . $row['id_client']) ?>"><?= $row['client_name']; ?></option>
              <?php } ?>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- ============== MENAMPILKAN CLIENT =========================== -->

        <!-- JIKA CLIENT TIDAK ADA MAKA TAMPILKAN INI -->
        <!-- JIKA ADA URI 4 MAKA LAKUKAN INI -->
        <?php if (!empty($this->uri->segment(4))) { ?>
          <!-- KITA CEK DULU, URI 4 nya SAMA ATAU TIDAK DENGAN YANG ADA DI TABEL CLIENT -->
          <?php $uri4 = $this->db->get_where('client', ['id_client' => $this->uri->segment(4)])->row() ?>
          <!-- JIKA ADA MAKA LAKUKAN INI -->
          <?php if (!empty($uri4)) { ?>
            <?php $id = $uri4->id_client; ?>
            <!-- JIKA TIDAK ADA MAKA KOSONG -->
          <?php } else { ?>
            <?php $id = null ?>
          <?php } ?>
          <!-- SIDEBAR -->
          <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'menu-open' : null; ?>">
            <a href="<?= base_url('spv/dashboard/index/' . $id); ?>" class="nav-link">
              <i class="nav-icon  fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- BUNDLING -->
          <li class="nav-item <?= $this->uri->segment(2) == 'bundling' ? 'menu-open' : null; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                BUNDLING
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('spv/bundling/item_bundling/' . $id); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Bundling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('spv/bundling/request_bundling/' . $id); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Bundling</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- REPORTS -->
          <li class="nav-item <?= $this->uri->segment(2) == 'reports' ? 'menu-open' : null; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                REPORTS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('spv/reports/report_request_bundling/' . $id); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Bundling</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="<?= base_url('spv/reports/news_bundling_report/' . $id); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Bundling Report</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } else { ?>
          <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'menu-open' : null; ?>">
            <a href="<?= base_url('spv/dashboard'); ?>" class="nav-link">
              <i class="nav-icon  fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <!-- BUNDLING -->
          <li class="nav-item <?= $this->uri->segment(2) == 'bundling' ? 'menu-open' : null; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                BUNDLING
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('spv/bundling/item_bundling'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Bundling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('spv/bundling/request_bundling'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Bundling</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- REPORTS -->
          <li class="nav-item <?= $this->uri->segment(2) == 'reports' ? 'menu-open' : null; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                REPORTS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('spv/reports/report_request_bundling'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Bundling</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="<?= base_url('spv/reports/news_bundling_report'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Bundling Report</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </nav>
    <br>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>