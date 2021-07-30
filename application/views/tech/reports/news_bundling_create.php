<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('tech/reports/news_bundling_report/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
            <a href="<?= base_url('tech/reports/news_bundling_report/' . $this->uri->segment(4)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('tech/reports/news_bundling_report'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
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
                  <div class="col-12">
                    <h4>CLIENT</h4>
                    <hr>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Name *</label>
                    <input type="text" class="form-control" id="nama_pihak1" name="nama_pihak1" value="<?= set_value('nama_pihak1'); ?>">
                    <?= form_error('nama_pihak1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Position *</label>
                    <input type="text" class="form-control" id="posisi_pihak1" name="posisi_pihak1" value="<?= set_value('posisi_pihak1'); ?>">
                    <?= form_error('posisi_pihak1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Plat Code *</label>
                    <input type="text" class="form-control" id="plat_code" name="plat_code" value="<?= set_value('plat_code'); ?>">
                    <?= form_error('plat_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Department *</label>
                    <input type="text" class="form-control" id="dept_pihak1" name="dept_pihak1" value="<?= set_value('dept_pihak1'); ?>">
                    <?= form_error('dept_pihak1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12">
                    <h4>ADMIN OPERATION</h4>
                    <hr>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Name *</label>
                    <input type="text" class="form-control" id="nama_pihak2" name="nama_pihak2" value="<?= set_value('nama_pihak2'); ?>">
                    <?= form_error('nama_pihak2', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Position *</label>
                    <input type="text" class="form-control" id="posisi_pihak2" name="posisi_pihak2" value="<?= set_value('posisi_pihak2'); ?>">
                    <?= form_error('posisi_pihak2', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Department *</label>
                    <input type="text" class="form-control" id="dept_pihak2" name="dept_pihak2" value="<?= set_value('dept_pihak2'); ?>">
                    <?= form_error('dept_pihak2', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Location *</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= set_value('lokasi'); ?>">
                    <?= form_error('lokasi', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>

                  <?php if (!empty($this->uri->segment(5))) { ?>
                    <input type="hidden" name="id_client" value="<?= $id_client ?>">
                  <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
                    <?php $client = $this->db->get_where('client', ['id_location' => $this->uri->segment(4)])->result_array(); ?>

                    <!-- <div class="form-group col-md-4"> -->
                    <!-- <label>location *</label> -->
                    <?php foreach ($location as $row) : ?>
                      <?php if ($this->uri->segment(4) == $row['id_location']) { ?>
                        <input type="hidden" class="form-control" value="<?= $row['location_name']; ?>" readonly>
                      <?php } ?>
                    <?php endforeach; ?>
                    <!-- </select>
                    </div> -->
                    <div class="form-group col-md-4">
                      <label>client *</label>
                      <select name="id_client" id="id_client" class="form-control" required>
                        <option value="" selected disabled>-- pilih --</option>
                        <?php foreach ($client as $row) : ?>
                          <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  <?php } else { ?>
                    <?php $client = $this->db->get('client')->result_array(); ?>
                    <div class="form-group col-md-4">
                      <label>client *</label>
                      <select name="id_client" id="id_client" class="form-control" required>
                        <option value="" selected disabled>-- pilih --</option>
                        <?php foreach ($client as $row) : ?>
                          <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  <?php } ?>


                  <div class="form-group col-md-4">
                    <label>Date Arrived *</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= set_value('tanggal'); ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>

                  <!-- <div class="form-group col-md-4">
                    <label>Request Bundling Code *</label>
                    <select name="id_barang" id="id_barang" class="form-control">
                      <option value="" selected disabled>-- select --</option>
                      <?php foreach ($request as $row) : ?>
                        <option value="<?= $row['id_request_bundling']; ?>"><?= $row['request_bundling_code']; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('id_barang', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div> -->

                  <div class="form-group col-md-4">
                    <label>UoM *</label>
                    <select name="uom" id="uom" class="form-control">
                      <option value="" selected disabled>-- select --</option>
                      <option value="Pack">Pack</option>
                      <option value="Karton">Karton</option>
                      <option value="Pcs">Pcs</option>
                    </select>
                    <?= form_error('uom', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Remaks *</label>
                    <input type="text" class="form-control" id="remaks" name="remaks" value="<?= set_value('remaks'); ?>">
                    <?= form_error('remaks', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <button type="submit" class="btn btn-info float-right">CREATE</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

<script>
  function Barcode() {
    var p = document.getElementById("request_bundling_code").value;
    document.getElementById("request_bundling_barcode").value = p;
  }
</script>