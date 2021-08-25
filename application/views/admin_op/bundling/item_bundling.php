<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (empty($this->uri->segment(5))) { ?>
            <?php if ($user['department_id'] == 1 || $user['department_id'] == 2 || $user['department_id'] == 3) { ?>
              <a href="<?= base_url('admin_op/bundling/item_bundling/create_item/'); ?>" class="btn btn-info text-light"> <i class="fas fa-undo-alt"></i> CREATE</a>
            <?php } ?>
          <?php } else { ?>
            <a href="<?= base_url('admin_op/bundling/item_bundling/create_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="fas fa-undo-alt"></i> CREATE</a>
          <?php } ?>
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
                    <th>BUNDLING CODE</th>
                    <th>BUNDLING NAME</th>
                    <th>BARCODE</th>
                    <th>Qty</th>
                    <th width="15%">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($item_bundling as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['item_bundling_code']; ?></td>
                      <td><?= $row['item_bundling_name']; ?></td>
                      <td><?= $row['item_bundling_code']; ?></td>
                      <td><?= $row['qty']; ?></td>
                      <td>
                        <?php if (!empty($this->uri->segment(4))) { ?>
                          <a href="<?= base_url('admin_op/bundling/ib_detaill/' . $this->uri->segment(4)  . '/' . $row['id_item_bundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                        <?php } else { ?>
                          <a href="<?= base_url('admin_op/bundling/ib_detail/' .  $row['id_item_bundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
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