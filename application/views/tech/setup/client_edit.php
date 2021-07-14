<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <div class="dropdown">
            <a href="<?= base_url('tech/setup/client'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> LIST CLIENT</a>
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('tech/setup/client'); ?>">client</a></li>
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
            <div class="card-header">
              <h3 class="card-title"><?= $judul; ?></h3>
            </div>
            <form method="post" action="" enctype="multipart/form-data">
              <div class="card-body text-uppercase">
                <div class="row">
                  <input type="hidden" class="form-control" id="id_client" name="id_client" value="<?= $client['id_client']; ?>">
                  <div class="form-group col-md-6">
                    <label>user *</label>
                    <select name="user_id" id="user_id" class="form-control">
                      <option value="" selected disabled>-- select --</option>
                      <?php foreach ($data_user as $row) : ?>
                        <?php if ($row['id_user'] == $client['user_id']) { ?>
                          <option value="<?= $row['id_user'] ?>" selected><?= $row['fullname']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $row['id_user'] ?>"><?= $row['fullname']; ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('user_id', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>client Code *</label>
                    <input type="text" class="form-control" id="client_code" name="client_code" value="<?= $client['client_code']; ?>">
                    <?= form_error('client_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>client Name *</label>
                    <input type="text" class="form-control" id="client_name" name="client_name" value="<?= $client['client_name']; ?>">
                    <?= form_error('client_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>stock allocation *</label>
                    <select name="id_stock_allocation" class="form-control select2bs4" required style="width: 100%;">
                      <option value="" selected disabled></option>
                      <?php foreach ($stock_allocation as $stock) : ?>
                        <?php if ($stock['id_stock_allocation'] == $client['id_stock_allocation']) { ?>
                          <option value="<?= $stock['id_stock_allocation'] ?>" selected><?= $stock['stock_allocation_name']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $stock['id_stock_allocation'] ?>"><?= $stock['stock_allocation_name']; ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" class="form-control" id="id_stock_allocation" name="id_stock_allocation" value="<?= $client['id_stock_allocation']; ?>"> -->
                    <?= form_error('id_stock_allocation', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>location *</label>
                    <select name="id_location" class="form-control select2bs4" required style="width: 100%;">
                      <option value="" selected disabled></option>
                      <?php foreach ($location as $loc) : ?>
                        <?php if ($loc['id_location'] == $client['id_location']) { ?>
                          <option value="<?= $loc['id_location'] ?>" selected><?= $loc['location_name']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $loc['id_location'] ?>"><?= $loc['location_name']; ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" class="form-control" id="id_location" name="id_location" value="<?= $client['id_location']; ?>"> -->
                    <?= form_error('id_location', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Active</label>
                    <select name="active" id="active" class="form-control">
                      <?php foreach ($select as $row) : ?>
                        <?php if ($row == $client['active']) { ?>
                          <option value="<?= $row ?>" selected><?= $row; ?></option>
                        <?php } else { ?>
                          <option value="<?= $row ?>"><?= $row; ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-info">EDIT</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>