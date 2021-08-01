<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More Action
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="<?= base_url('tech/master_data/create_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>">CREATE</a>
                <a class="dropdown-item" href="<?= base_url('tech/master_data/excel/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>">UPLOAD ITEM</a>
              </div>
            </div>
            <!-- <a href="" class="btn btn-info text-light"> <i class="fas fa-plus"></i> CREATE</a> -->
          <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More Action
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="<?= base_url('tech/master_data/create_item/' . $this->uri->segment(4)); ?>">CREATE</a>
                <a class="dropdown-item" href="<?= base_url('tech/master_data/excel/' . $this->uri->segment(4)); ?>">UPLOAD ITEM</a>
              </div>
            </div>
            <!-- <a href="" class="btn btn-info text-light"> <i class="fas fa-plus"></i> CREATE</a> -->
          <?php } else { ?>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More Action
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="<?= base_url('tech/master_data/create_item'); ?>">CREATE</a>
                <a class="dropdown-item" href="<?= base_url('tech/master_data/excel'); ?>">UPLOAD ITEM</a>
              </div>
            </div>
            <!-- <a href="" class="btn btn-info text-light"> <i class="fas fa-plus"></i> CREATE</a> -->
          <?php } ?>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php if (!empty($this->uri->segment(5))) { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>">Home</a></li>
            <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard/index/' . $this->uri->segment(4)); ?>">Home</a></li>
            <?php } else { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard'); ?>">Home</a></li>
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
                    <th>ITEM CODE</th>
                    <th>ITEM NAME</th>
                    <th>BARCODE</th>
                    <th>CATEGORY</th>
                    <th>Qty</th>
                    <th width="15%">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($item_nonbundling as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['item_nonbundling_code']; ?></td>
                      <td><?= $row['item_nonbundling_name']; ?></td>
                      <td><?= $row['item_nonbundling_barcode']; ?></td>
                      <td><?= $row['category']; ?></td>
                      <td><?= $row['minimum_stock']; ?></td>
                      <td>
                        <?php if (!empty($this->uri->segment(5))) { ?>
                          <a href="<?= base_url('tech/master_data/detail_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $row['id_item_nonbundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="<?= base_url('tech/master_data/edit_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $row['id_item_nonbundling']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                          <a href="<?= base_url('tech/master_data/delete_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $row['id_item_nonbundling']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
                        <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
                          <a href="<?= base_url('tech/master_data/detaill/' . $this->uri->segment(4) . '/' . $row['id_item_nonbundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="<?= base_url('tech/master_data/editt/' . $this->uri->segment(4) . '/' . $row['id_item_nonbundling']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                          <a href="<?= base_url('tech/master_data/deletee/' . $this->uri->segment(4) . '/' . $row['id_item_nonbundling']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
                        <?php } else { ?>
                          <a href="<?= base_url('tech/master_data/detail/' . $row['id_item_nonbundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="<?= base_url('tech/master_data/edit/' . $row['id_item_nonbundling']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                          <a href="<?= base_url('tech/master_data/delete/' . $row['id_item_nonbundling']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
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