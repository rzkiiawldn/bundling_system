<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php if (!empty($this->uri->segment(4))) { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_op/dashboard/index/' . $this->uri->segment(4)); ?>">Home</a></li>
            <?php } else { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_op/dashboard'); ?>">Home</a></li>
            <?php } ?>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info shadow">
            <div class="card-header border-transparent">
              <h3 class="card-title"> <i class="fas fa-user mr-2"></i></i> <b> <?= $judul; ?> </b> </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th width="5%">NO</th>
                    <th>CODE</th>
                    <th>BUNDLING TYPE</th>
                    <th>ITEM BUNDLING</th>
                    <th>Qty</th>
                    <th>PACKING TYPE</th>
                    <th>STATUS</th>
                    <th width="17%">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($request_bundling as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['request_bundling_code']; ?></td>
                      <td><?= $row['bundling_type']; ?></td>
                      <td><?= $row['item_bundling_name']; ?></td>
                      <td><?= $row['request_quantity']; ?></td>
                      <td><?= $row['packing_type']; ?></td>
                      <td>
                        <?php if ($row['status'] == 'process' || $row['status'] == 'request') { ?>
                          <span class="badge badge-warning"><?= $row['status']; ?></span>
                        <?php } elseif ($row['status'] == 'finish' || $row['status'] == 'success') { ?>
                          <span class="badge badge-success"><?= $row['status']; ?></span>
                        <?php } else { ?>
                          <span class="badge badge-danger"><?= $row['status']; ?></span>
                        <?php }  ?>
                      </td>
                      <td>
                        <?php if (!empty($this->uri->segment(4))) { ?>
                          <!-- <?php if ($row['photo'] == '') { ?>
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#uploadBukti<?= $row['id_request_bundling'] ?>">Upload</button>
                          <?php } else { ?>
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#lihatBukti<?= $row['id_request_bundling'] ?>">Upload</button>
                          <?php } ?> -->
                          <a href="<?= base_url('admin_op/bundling/rb_detaill/' . $this->uri->segment(4) . '/' . $row['id_request_bundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="<?= base_url('admin_op/bundling/rb_editt/' . $this->uri->segment(4) . '/' . $row['id_request_bundling']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                        <?php } else { ?>
                          <!-- <?php if ($row['photo'] == '') { ?>
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#uploadBukti<?= $row['id_request_bundling'] ?>">Upload</button>
                          <?php } else { ?>
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#lihatBukti<?= $row['id_request_bundling'] ?>">Upload</button>
                          <?php } ?> -->
                          <a href="<?= base_url('admin_op/bundling/rb_detail/' . $row['id_request_bundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="<?= base_url('admin_op/bundling/rb_edit/'  . $row['id_request_bundling']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php foreach ($request_bundling as $row) { ?>
  <div class="modal fade" id="uploadBukti<?= $row['id_request_bundling'] ?>" tabindex="-1" role="dialog" aria-labelledby="uploadBuktiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="uploadBuktiLabel">Upload </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('admin_op/bundling/upload_photo/' . $row['id_request_bundling']) ?>" method="post" enctype="multipart/form-data">
          <div class=" modal-body">
            <div class="form-group">
              <label for="photo">Upload Photo</label>
              <input type="hidden" name="id_request_bundling" value="<?= $row['id_request_bundling'] ?>">
              <input type="file" class="form-control" required name="photo" id="photo">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="upload">Upload</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>

<!-- LIHAT BUKTI -->
<?php foreach ($request_bundling as $row) { ?>
  <div class="modal fade" id="lihatBukti<?= $row['id_request_bundling'] ?>" tabindex="-1" role="dialog" aria-labelledby="lihatBuktiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="lihatBuktiLabel">Photo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('admin_op/bundling/upload_photo/' . $row['id_request_bundling']) ?>" method="post" enctype="multipart/form-data">
          <div class=" modal-body">
            <div class="form-group">
              <img src="<?= base_url('assets/img/photo/' . $row['photo']) ?>" class="img img-fluid" alt="">
            </div>
            <p>
              <button class="btn btn-success btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Edit Photo
              </button>
            </p>
            <div class="collapse" id="collapseExample">
              <div class="card card-body">
                <div class="form-group">
                  <label for="photo">Edit Photo</label>
                  <input type="hidden" name="id_request_bundling" value="<?= $row['id_request_bundling'] ?>">
                  <input type="file" class="form-control" required name="photo" id="photo">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>