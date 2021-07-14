<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('admin_op/reports/news_bundling_report/' . $this->uri->segment(4)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('admin_op/reports/news_bundling_report'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
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

                <input type="hidden" class="form-control" id="id_news" name="id_news" value="<?= $news['id_news']; ?>">
                <div class="row">
                  <div class="col-12">
                    <h4>Pihak Pertama</h4>
                    <hr>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Nama *</label>
                    <input type="text" class="form-control" id="nama_pihak1" name="nama_pihak1" value="<?= $news['nama_pihak1']; ?>">
                    <?= form_error('nama_pihak1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Posisi *</label>
                    <input type="text" class="form-control" id="posisi_pihak1" name="posisi_pihak1" value="<?= $news['posisi_pihak1']; ?>">
                    <?= form_error('posisi_pihak1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Dept *</label>
                    <input type="text" class="form-control" id="dept_pihak1" name="dept_pihak1" value="<?= $news['dept_pihak1']; ?>">
                    <?= form_error('dept_pihak1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12">
                    <h4>Pihak Kedua</h4>
                    <hr>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Nama *</label>
                    <input type="text" class="form-control" id="nama_pihak2" name="nama_pihak2" value="<?= $news['nama_pihak2']; ?>">
                    <?= form_error('nama_pihak2', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Posisi *</label>
                    <input type="text" class="form-control" id="posisi_pihak2" name="posisi_pihak2" value="<?= $news['posisi_pihak2']; ?>">
                    <?= form_error('posisi_pihak2', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Dept *</label>
                    <input type="text" class="form-control" id="dept_pihak2" name="dept_pihak2" value="<?= $news['dept_pihak2']; ?>">
                    <?= form_error('dept_pihak2', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Lokasi *</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $news['lokasi']; ?>">
                    <?= form_error('lokasi', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Code Bundling *</label>
                    <select name="id_barang" id="id_barang" class="form-control">
                      <option value="" selected disabled>-- select --</option>
                      <?php foreach ($request as $row) : ?>
                        <?php if ($row['id_request_bundling'] == $news['id_barang']) { ?>
                          <option value="<?= $row['id_request_bundling']; ?>" selected><?= $row['request_bundling_code']; ?></option>
                        <?php } else { ?>
                          <option value="<?= $row['id_request_bundling']; ?>"><?= $row['request_bundling_code']; ?></option>
                        <?php }  ?>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('id_barang', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Tanggal *</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $news['tanggal']; ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <?php if (!empty($this->uri->segment(5))) { ?>
                  <?php $client = $this->db->get_where('client', ['id_location' => $this->session->userdata('id_location')])->result_array(); ?>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>client *</label>
                      <select name="id_client" id="id_client" class="form-control" required>
                        <option value="" selected disabled>-- select --</option>
                        <?php foreach ($client as $row) : ?>
                          <?php if ($row['id_client'] == $news['id_client']) { ?>
                            <option value="<?= $row['id_client'] ?>" selected><?= $row['client_name']; ?></option>
                          <?php } else { ?>
                            <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                          <?php }  ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                <?php } else { ?>
                  <?php $client = $this->db->get('client')->result_array(); ?>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>client *</label>
                      <select name="id_client" id="id_client" class="form-control" required>
                        <option value="" selected disabled>-- select --</option>
                        <?php foreach ($client as $row) : ?>
                          <?php if ($row['id_client'] == $news['id_client']) { ?>
                            <option value="<?= $row['id_client'] ?>" selected><?= $row['client_name']; ?></option>
                          <?php } else { ?>
                            <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                          <?php }  ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                <?php } ?>
                <button type="submit" class="btn btn-info float-right">Update</button>
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