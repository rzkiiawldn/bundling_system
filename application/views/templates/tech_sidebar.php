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
        $client = $this->db->get('client')->result_array();
        $location = $this->db->get('location')->result_array() ?>
        <?php if ($this->session->userdata('department_id') == 1 or $this->session->userdata('department_id') == 2 or $this->session->userdata('department_id') == 3) : ?>

          <!-- ADMIN STORE DAN TECH MEMFILTER CLIENT DAN LOCATION -->
          <div class="form-group">
            <select class="form-control select2bs4" onchange="location = this.options[this.selectedIndex].value;">
              <option value="" selected disabled>--location--</option>
              <?php foreach ($location as $row) : ?>
                <?php if ($row['id_location'] == $this->uri->segment(4)) { ?>
                  <option value="<?= base_url('tech/dashboard/index/' . $row['id_location']) ?>" selected><?= $row['location_name']; ?></option>
                <?php } else { ?>
                  <option value="<?= base_url('tech/dashboard/index/' . $row['id_location']) ?>"><?= $row['location_name']; ?></option>
                <?php } ?>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control select2bs4" onchange="location = this.options[this.selectedIndex].value;">
              <option value="" selected disabled>--client--</option>
              <?php if (!empty($this->uri->segment(4))) { ?>
                <?php $client = $this->db->get_where('client', ['id_location' => $this->uri->segment(4)])->result_array() ?>
                <?php foreach ($client as $row) : ?>
                  <?php if ($row['id_client'] == $this->uri->segment(5)) { ?>
                    <option value="<?= base_url('tech/dashboard/index/' . $this->uri->segment(4) . '/' . $row['id_client']) ?>" selected><?= $row['client_name']; ?></option>
                  <?php } else { ?>
                    <option value="<?= base_url('tech/dashboard/index/' . $this->uri->segment(4) . '/' . $row['id_client']) ?>"><?= $row['client_name']; ?></option>
                  <?php } ?>
                <?php endforeach; ?>
              <?php } ?>
            </select>
          </div>
        <?php endif; ?>

        <!-- JIKA CLIENT TIDAK ADA MAKA TAMPILKAN INI -->
        <!-- SEBELUMNYA CEK DULU, URI 4 SESUAI ATAU TIDAK DENGAN LOCATION -->
        <?php if (empty($this->uri->segment(5))) { ?>

          <!-- JIKA ADA URI 4 MAKA LAKUKAN INI -->
          <?php if (!empty($this->uri->segment(4))) { ?>
            <!-- KITA CEK DULU, URI 4 nya SAMA ATAU TIDAK DENGAN YANG ADA DI TABEL LOKASI -->
            <?php $uri4 = $this->db->get_where('location', ['id_location' => $this->uri->segment(4)])->row() ?>
            <!-- JIKA ADA MAKA LAKUKAN INI -->
            <?php if (!empty($uri4)) { ?>
              <?php $id = $uri4->id_location; ?>
              <!-- JIKA TIDAK ADA MAKA KOSONG -->
            <?php } else { ?>
              <?php $id = null ?>
            <?php } ?>
          <?php } else { ?>
            <?php $id = null ?>
          <?php } ?>


          <!-- TECH & HOD TECH -->
          <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'menu-open' : null; ?>">
            <a href="<?= base_url('tech/dashboard/index/' . $id); ?>" class="nav-link <?= strtolower($judul) == $this->uri->segment(1) ? null : null; ?>">
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
                <a href="<?= base_url('tech/master_data/item/' . $id); ?>" class="nav-link">
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
                <a href="<?= base_url('tech/bundling/item_bundling/' . $id); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Bundling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/bundling/request_bundling/' . $id); ?>" class="nav-link">
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
                <a href="<?= base_url('tech/reports/report_request_bundling/' . $id); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Bundling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/reports/news_bundling_report/' . $id); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Bundling Report</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- REPORTS -->
          <li class="nav-item <?= $this->uri->segment(2) == 'setup' ? 'menu-open' : null; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                SETUP
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/user'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/location'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/client'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/admin_ops'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Operation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/spv'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supervisior</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/status'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/department'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/stock_allocation'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Allocation</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- JIKA ADA CLIENT MAKA TAMPIL INI -->
        <?php } else { ?>
          <!-- TECH & HOD TECH -->
          <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'menu-open' : null; ?>">
            <a href="<?= base_url('tech/dashboard/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="nav-link <?= strtolower($judul) == $this->uri->segment(1) ? null : null; ?>">
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
                <a href="<?= base_url('tech/master_data/item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="nav-link">
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
                <a href="<?= base_url('tech/bundling/item_bundling/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Item Bundling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/bundling/request_bundling/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="nav-link">
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
                <a href="<?= base_url('tech/reports/report_request_bundling/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Request Bundling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/reports/news_bundling_report/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>News Bundling Report</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- SETUP -->
          <li class="nav-item <?= $this->uri->segment(2) == 'setup' ? 'menu-open' : null; ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                SETUP
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/user'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/location'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Location</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/client'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/admin_ops'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin Operation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/spv'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supervisior</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/status'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/department'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('tech/setup/stock_allocation'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Allocation</p>
                </a>
              </li>
            </ul>
          </li>
        <?php } ?>
      </ul>
    </nav>
    <br>
  </div>
</aside>