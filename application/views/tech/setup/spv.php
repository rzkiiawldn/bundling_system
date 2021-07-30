<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus"></i>
                CREATE
              </button>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard'); ?>">Home</a></li>
                <li class="breadcrumb-item active"><?= $judul; ?></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->


          <div class="row">
            <div class="col-md-12">
              <div class="card card-info shadow">
                <div class="card-header border-transparent">
                  <h3 class="card-title"> <i class="fas fa-map mr-2"></i></i> <b> <?= $judul; ?> </b> </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead class="text-uppercase">
                      <tr>
                        <th width="5%">NO</th>
                        <th>USER</th>
                        <th>LOCATION</th>
                        <th width="15%">ACTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                      foreach ($spv as $row) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $row['fullname']; ?></td>
                          <td><?= $row['location_name']; ?></td>
                          <td>
                            <a href="#" data-toggle="modal" data-target="#edit<?= $row['id_user'] ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Location Supervisior</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('tech/setup/add_spv') ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label>User</label>
                <select name="id_user" class="form-control" required>
                  <?php $users = $this->db->get_where('user', ['department_id' => 6, 'id_location =' => null]); ?>
                  <?php if ($users->num_rows() < 1) { ?>
                    <option value="" selected disabled> empty </option>
                  <?php } else { ?>
                    <option value="" selected disabled>-- select --</option>
                    <?php foreach ($users->result_array() as $row) : ?>
                      <option value="<?= $row['id_user'] ?>"><?= $row['fullname']; ?></option>
                    <?php endforeach; ?>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Location</label>
                <select name="id_location" class="form-control" required>
                  <option value="" selected disabled>-- select --</option>
                  <?php foreach ($location as $row) : ?>
                    <option value="<?= $row['id_location'] ?>"><?= $row['location_name']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php foreach ($spv as $row) : ?>
      <div class="modal fade" id="edit<?= $row['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Location Supervisior</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?= base_url('tech/setup/edit_spv') ?>" method="post">
              <div class="modal-body">
                <input type="hidden" name="id_user" value="<?= $row['id_user'] ?>">
                <div class="form-group">
                  <label>Location</label>
                  <select name="id_location" class="form-control" required>
                    <option value="" selected disabled>-- select --</option>
                    <?php foreach ($location as $loc) : ?>
                      <?php if ($row['id_location'] == $loc['id_location']) { ?>
                        <option value="<?= $loc['id_location'] ?>" selected><?= $loc['location_name']; ?></option>
                      <?php } else { ?>
                        <option value="<?= $loc['id_location'] ?>"><?= $loc['location_name']; ?></option>
                      <?php } ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>