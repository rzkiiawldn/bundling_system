<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(6))) { ?>
            <a href="<?= base_url('tech/bundling/request_bundling/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else if (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('tech/bundling/request_bundling/' . $this->uri->segment(4)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('tech/bundling/request_bundling'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } ?>
        </div>
        <div class="col-sm-6">

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
            <form method="post" action="">
              <div class="card-body">
                <div class="row">
                  <input type="hidden" class="form-control" id="id_request_bundling" name="id_request_bundling" value="<?= $request_bundling['id_request_bundling']; ?>">
                  <div class="form-group col-md-6">
                    <label>Request Bundling Code *</label>
                    <input type="text" readonly class="form-control" id="request_bundling_code" name="request_bundling_code" value="<?= $request_bundling['request_bundling_code']; ?>">
                    <?= form_error('request_bundling_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Barcode *</label>
                    <input type="text" readonly class="form-control" id="request_bundling_barcode" name="request_bundling_barcode" value="<?= $request_bundling['request_bundling_barcode']; ?>">
                    <?= form_error('request_bundling_barcode', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Bundling Type *</label>
                    <input type="text" readonly class="form-control" id="bundling_type" name="bundling_type" value="<?= $request_bundling['bundling_type']; ?>">
                    <?= form_error('bundling_type', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Item Bundling *</label>
                    <input type="text" readonly class="form-control" id="id_item_bundling" name="id_item_bundling" value="<?= $request_bundling['id_item_bundling']; ?>">

                    <!-- <select name="id_item_bundling" id="id_item_bundling" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($item_bundling as $item) : ?>
                        <?php if ($item['id_item_bundling'] == $request_bundling['id_item_bundling']) { ?>
                          <option selected value="<?= $item['id_item_bundling'] ?>"><?= $item['item_bundling_name']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $item['id_item_bundling'] ?>"><?= $item['item_bundling_name']; ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select> -->
                    <?= form_error('id_item_bundling', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Packing Type *</label>
                    <input type="text" readonly class="form-control" id="packing_type" name="packing_type" value="<?= $request_bundling['packing_type']; ?>">

                    <!-- <select name="packing_type" id="packing_type" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($packing_type as $item) : ?>
                        <?php if ($item['packing_type'] == $request_bundling['packing_type']) { ?>
                          <option selected value="<?= $item['packing_type'] ?>"><?= $item['packing_type_name']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $item['packing_type'] ?>"><?= $item['packing_type_name']; ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select> -->
                    <?= form_error('packing_type', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Request Quantity *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" id="request_quantity" name="request_quantity" value="<?= $request_bundling['request_quantity']; ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Pcs</span>
                      </div>
                    </div>
                    <?= form_error('request_quantity', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Status *</label>
                    <select name="id_status" id="id_status" class="form-control">
                      <option value="" selected disabled>-- pilih --</option>
                      <?php foreach ($status as $item) : ?>
                        <?php if ($item['id_status'] == $request_bundling['id_status']) { ?>
                          <option selected value="<?= $item['id_status'] ?>"><?= $item['status']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $item['id_status'] ?>"><?= $item['status']; ?></option>
                        <?php } ?>
                      <?php endforeach ?>
                    </select>
                    <?= form_error('id_status', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div><?php if (!empty($this->uri->segment(6))) { ?>
                </div>
              <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
                <?php $client = $this->db->get_where('client', ['id_location' => $this->uri->segment('4')])->result_array() ?>
              </div>
              <div class="row">
                <div class="form-group col-md-6">
                  <label>location *</label>
                  <?php foreach ($location as $row) : ?>
                    <?php if ($this->uri->segment(4) == $row['id_location']) { ?>
                      <input type="text" class="form-control" value="<?= $row['location_name']; ?>" readonly>
                    <?php } ?>
                  <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label>client *</label>
                  <select name="id_client" id="id_client" class="form-control" required>
                    <option value="" selected disabled>-- pilih --</option>
                    <?php foreach ($client as $row) : ?>
                      <?php if ($row['id_client'] == $request_bundling['id_client']) { ?>
                        <option value="<?= $row['id_client'] ?>" selected><?= $row['client_name']; ?></option>
                      <?php } else { ?>
                        <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                      <?php } ?>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
            <?php } else { ?>

              <?php $client = $this->db->get('client')->result_array() ?>
              <div class="form-group col-md-6">
                <label>client *</label>
                <select name="id_client" id="id_client" class="form-control" required>
                  <option value="" selected disabled>-- pilih --</option>
                  <?php foreach ($client as $row) : ?>
                    <?php if ($row['id_client'] == $request_bundling['id_client']) { ?>
                      <option value="<?= $row['id_client'] ?>" selected><?= $row['client_name']; ?></option>
                    <?php } else { ?>
                      <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                    <?php } ?>
                  <?php endforeach; ?>
                </select>
              </div>
          </div>
        <?php } ?>
        <button type="submit" class="btn btn-info float-right">EDIT</button>
        </div>
        </form>
      </div>
    </div>
</div>
</section>
</div>