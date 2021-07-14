<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('admin_store/bundling/item_bundling/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
            <a href="<?= base_url('admin_store/bundling/item_bundling/' . $this->uri->segment(4)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('admin_store/bundling/item_bundling'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } ?>
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
                  <div class="form-group col-md-6">
                    <label>Manage By *</label>
                    <select name="manage_by" id="manage_by" class="form-control">
                      <option value="" selected disabled>-- select --</option>
                      <?php foreach ($manage_by as $manage) : ?>
                        <option value="<?= $manage ?>"><?= $manage; ?></option>
                      <?php endforeach ?>
                    </select>
                    <?= form_error('manage_by', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>bundling code *</label>
                    <input type="text" class="form-control" id="item_bundling_code" onchange="Barcode()" name="item_bundling_code" value="<?= set_value('item_bundling_code'); ?>">
                    <?= form_error('item_bundling_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>barcode *</label>
                    <input type="text" class="form-control" id="item_bundling_barcode" name="item_bundling_barcode" readonly>
                    <?= form_error('item_bundling_barcode', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>bundling name *</label>
                    <input type="text" class="form-control" id="item_bundling_name" name="item_bundling_name" value="<?= set_value('item_bundling_name'); ?>">
                    <?= form_error('item_bundling_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <?php if (!empty($this->uri->segment(5))) { ?>
                    <input type="hidden" name="id_client" value="<?= $id_client ?>">
                  <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
                    <?php $client = $this->db->get_where('client', ['id_location' => $this->uri->segment(4)])->result_array(); ?>
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
                        <option value="" selected disabled>-- select --</option>
                        <?php foreach ($client as $row) : ?>
                          <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  <?php } else { ?>
                    <?php $client = $this->db->get('client')->result_array(); ?>
                    <div class="form-group col-md-6">
                      <label>client *</label>
                      <select name="id_client" id="id_client" class="form-control" required>
                        <option value="" selected disabled>-- select --</option>
                        <?php foreach ($client as $row) : ?>
                          <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  <?php } ?>
                </div>
                <button type="submit" class="btn btn-info">CREATE</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

<script>
  function Barcode() {
    var p = document.getElementById("item_bundling_code").value;
    document.getElementById("item_bundling_barcode").value = p;
  }
</script>