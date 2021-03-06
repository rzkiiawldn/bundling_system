<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('tech/master_data/item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
            <a href="<?= base_url('tech/master_data/item/' . $this->uri->segment(4)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('tech/master_data/item'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } ?>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php if (!empty($this->uri->segment(5))) { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('tech/master_data/item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>">Item</a></li>
            <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard/index/' . $this->uri->segment(4)); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('tech/master_data/item/' . $this->uri->segment(4)); ?>">Item</a></li>
            <?php } else { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard/index/'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('tech/master_data/item/'); ?>">Item</a></li>
            <?php } ?>
            <li class="breadcrumb-item active"><?= $judul; ?></li>
          </ol>
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
                    <label>Item Nonbundling Code *</label>
                    <input type="text" class="form-control" id="item_nonbundling_code" onchange="Barcode()" name="item_nonbundling_code" value="<?= set_value('item_nonbundling_code'); ?>">
                    <?= form_error('item_nonbundling_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Item Nonbundling Name *</label>
                    <input type="text" class="form-control" id="item_nonbundling_name" name="item_nonbundling_name" value="<?= set_value('item_nonbundling_name'); ?>">
                    <?= form_error('item_nonbundling_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>barcode *</label>
                    <input type="text" class="form-control" id="item_nonbundling_barcode" name="item_nonbundling_barcode" readonly required value="<?= set_value('item_nonbundling_barcode'); ?>">
                    <?= form_error('item_nonbundling_barcode', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Manage By *</label>
                    <select name="manage_by" id="manage_by" class="form-control">
                      <option value="" disabled selected>-- select --</option>
                      <?php foreach ($manage_by as $manage) { ?>
                        <option value="<?= $manage ?>"><?= $manage; ?></option>
                      <?php } ?>
                    </select>
                    <?= form_error('manage_by', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>description *</label>
                    <input type="text" class="form-control" id="description" name="description" value="<?= set_value('description'); ?>">
                    <?= form_error('description', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>brand *</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="<?= set_value('brand'); ?>">
                    <?= form_error('brand', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>model *</label>
                    <input type="text" class="form-control" id="model" name="model" value="<?= set_value('model'); ?>">
                    <?= form_error('model', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>category *</label>
                    <input type="text" class="form-control" id="category" name="category" value="<?= set_value('category'); ?>">
                    <?= form_error('category', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>minimum stock *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" name="minimum_stock" value="<?= set_value('minimum_stock'); ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Pcs</span>
                      </div>
                    </div>
                    <?= form_error('minimum_stock', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>publish price *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" name="publish_price" value="<?= set_value('publish_price'); ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">IDR</span>
                      </div>
                    </div>
                    <?= form_error('publish_price', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>addtional expired *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" name="additional_expired" aria-describedby="basic-addon1" value="<?= set_value('additional_expired'); ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">days</span>
                      </div>
                    </div>
                    <?= form_error('additional_expired', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>size *</label>
                    <select name="size" id="size" class="form-control">
                      <option value="" selected disabled>-- size --</option>
                      <?php foreach ($size as $row) : ?>
                        <option value="<?= $row ?>"><?= $row; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('size', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-3">
                    <label>length *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" id="length" onchange="Dimension()" name="length" value="<?= set_value('length'); ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">cm</span>
                      </div>
                    </div>
                    <?= form_error('length', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-3">
                    <label>width *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" id="width" onchange="Dimension()" name="width" value="<?= set_value('width'); ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">cm</span>
                      </div>
                    </div>
                    <?= form_error('width', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-3">
                    <label>height *</label>
                    <div class="input-group mb-3">
                      <input type="number" min="1" class="form-control" aria-describedby="basic-addon1" id="height" onchange="Dimension()" name="height" value="<?= set_value('height'); ?>">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">cm</span>
                      </div>
                    </div>
                    <?= form_error('height', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-3">
                    <label>weight *</label>
                    <div class="input-group mb-3">
                      <input type="number" step=".01" class="form-control" aria-describedby="basic-addon1" name="weight" value="<?= set_value('weight'); ?>" step>
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">cm</span>
                      </div>
                    </div>
                    <?= form_error('weight', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12">
                    <label>dimension *</label>
                    <input type="text" class="form-control" id="dimension" name="dimension" readonly>
                    <?= form_error('dimension', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <label>is_fragile *</label>
                    <select name="is_fragile" id="is_fragile" class="form-control">
                      <option value="" selected disabled>-- select --</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    <?= form_error('is_fragile', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>active *</label>
                    <select name="active" id="active" class="form-control">
                      <option value="" selected disabled>-- select --</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    <?= form_error('active', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>cool_storage *</label>
                    <select name="cool_storage" id="cool_storage" class="form-control">
                      <option value="" selected disabled>-- select --</option>
                      <option value="Yes">Yes</option>
                      <option value="No">No</option>
                    </select>
                    <?= form_error('cool_storage', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <?php if (!empty($this->uri->segment(5))) { ?>
                  <input type="hidden" name="id_client" value="<?= $id_client ?>">
                <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
                  <?php $client = $this->db->get_where('client', ['id_location' => $this->uri->segment(4)])->result_array() ?>
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
                        <option value="" selected disabled>-- select --</option>
                        <?php foreach ($client as $row) : ?>
                          <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                <?php } else { ?>

                  <?php $client = $this->db->get('client')->result_array() ?>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>client *</label>
                      <select name="id_client" id="id_client" class="form-control" required>
                        <option value="" selected disabled>-- select --</option>
                        <?php foreach ($client as $row) : ?>
                          <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                <?php } ?>
                <button type="submit" class="btn btn-info float-right">CREATE</button>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<script>
  function Dimension() {
    var p = document.getElementById("length").value;
    var l = document.getElementById("width").value;
    var t = document.getElementById("height").value;
    document.getElementById("dimension").value = (p * l * t) / 1000000;
  }

  function Barcode() {
    var p = document.getElementById("item_nonbundling_code").value;
    document.getElementById("item_nonbundling_barcode").value = p;
  }
</script>