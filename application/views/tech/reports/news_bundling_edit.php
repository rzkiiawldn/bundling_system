<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(6))) { ?>
            <a href="<?= base_url('tech/reports/news_bundling_report/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
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
                  <div class="col">
                    <?= $this->session->flashdata('pesan'); ?>
                  </div>
                </div>
                <input type="hidden" class="form-control" id="id_news" name="id_news" value="<?= $news['id_news']; ?>">
                <div class="row">
                  <div class="col-12">
                    <h4>Staff Admin Operation</h4>
                    <hr>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Name *</label>
                    <input type="text" class="form-control" id="nama_pihak1" name="nama_pihak1" value="<?= $news['nama_pihak1']; ?>">
                    <?= form_error('nama_pihak1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Position *</label>
                    <input type="text" class="form-control" id="posisi_pihak1" name="posisi_pihak1" value="<?= $news['posisi_pihak1']; ?>">
                    <?= form_error('posisi_pihak1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Plat Code *</label>
                    <input type="text" class="form-control" id="plat_code" name="plat_code" value="<?= $news['plat_code']; ?>">
                    <?= form_error('plat_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Department *</label>
                    <input type="text" class="form-control" id="dept_pihak1" name="dept_pihak1" value="<?= $news['dept_pihak1']; ?>">
                    <?= form_error('dept_pihak1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-12">
                    <h4>Client</h4>
                    <hr>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Name *</label>
                    <input type="text" class="form-control" id="nama_pihak2" name="nama_pihak2" value="<?= $news['nama_pihak2']; ?>">
                    <?= form_error('nama_pihak2', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Position *</label>
                    <input type="text" class="form-control" id="posisi_pihak2" name="posisi_pihak2" value="<?= $news['posisi_pihak2']; ?>">
                    <?= form_error('posisi_pihak2', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Department *</label>
                    <input type="text" class="form-control" id="dept_pihak2" name="dept_pihak2" value="<?= $news['dept_pihak2']; ?>">
                    <?= form_error('dept_pihak2', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Location *</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $news['lokasi']; ?>">
                    <?= form_error('lokasi', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>

                  <?php if (!empty($this->uri->segment(6))) { ?>
                    <input type="hidden" name="id_client" value="<?= $id_client ?>">
                  <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
                    <?php $client = $this->db->get_where('client', ['id_location' => $this->uri->segment(4)])->result_array(); ?>
                    <!-- <div class="form-group col-md-4"> -->
                    <!-- <label>location *</label> -->
                    <?php foreach ($location as $row) : ?>
                      <?php if ($this->uri->segment(4) == $row['id_location']) { ?>
                        <input type="hidden" class="form-control" value="<?= $row['location_name']; ?>" readonly>
                      <?php } ?>
                    <?php endforeach; ?>
                    <!-- </select> -->
                    <!-- </div> -->
                    <div class="form-group col-md-4">
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
                  <?php } else { ?>
                    <?php $client = $this->db->get('client')->result_array(); ?>
                    <div class="form-group col-md-4">
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
                  <?php } ?>

                  <div class="form-group col-md-4">
                    <label>Tanggal *</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $news['tanggal']; ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>

                  <div class="form-group col-md-4">
                    <label>UoM *</label>
                    <select name="uom" id="uom" class="form-control">
                      <option value="" selected disabled>-- select --</option>
                      <?php if ($news['uom'] == 'Pack') { ?>
                        <option value="Pack" selected>Pack</option>
                        <option value="Karton">Karton</option>
                        <option value="Pcs">Pcs</option>
                      <?php } elseif ($news['uom'] == 'Karton') { ?>
                        <option value="Pack">Pack</option>
                        <option value="Karton" selected>Karton</option>
                        <option value="Pcs">Pcs</option>
                      <?php } else { ?>
                        <option value="Pack">Pack</option>
                        <option value="Karton">Karton</option>
                        <option value="Pcs" selected>Pcs</option>
                      <?php } ?>
                    </select>
                    <?= form_error('uom', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>

                  <div class="form-group col-md-4">
                    <label>Remaks *</label>
                    <input type="text" class="form-control" id="remaks" name="remaks" value="<?= $news['remaks']; ?>">
                    <?= form_error('remaks', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>

                <button type="submit" class="btn btn-info float-right">UPDATE</button>
            </form>
            <div style="margin-top:60px;"></div>
            <div class="alert alert-info pb-2 pt-2 mt-3" role="alert">
              Detail Barang
            </div>
            <?php if (!empty($this->uri->segment(6))) { ?>
              <form action="<?= base_url('tech/reports/add_edit_item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" method="post">
              <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
                <form action="<?= base_url('tech/reports/add_edit_item/' . $this->uri->segment(4)); ?>" method="post">
                <?php } else { ?>
                  <form method="post" action="<?= base_url('tech/reports/add_edit_item') ?>">
                  <?php } ?>
                  <div class="row mt-4">
                    <div class="form-group col-md-12">
                      <label>Request_bundling *</label>
                      <select name="id_request_bundling" id="id_request_bundling" class="form-control select2bs4" required style="width: 100%;">
                        <option value="" selected disabled></option>
                        <?php foreach ($request as $item) : ?>
                          <option value="<?= $item['id_request_bundling'] ?>"><?= $item['request_bundling_code']; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <?= form_error('id_request_bundling', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <input type="hidden" class="form-control" id="id_news" name="id_news" value="<?= $news['id_news']; ?>">
                  </div>
                  <button type="submit" class="btn btn-info float-right">ADD</button>
                  </form>
                  <div class="pt-5">
                    <table class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th width="5%">NO</th>
                          <th>REQUEST BUNDLING CODE</th>
                          <th>QTY</th>
                          <th width="15%">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        foreach ($news_detail as $row) : ?>
                          <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['request_bundling_code']; ?></td>
                            <td><?= $row['request_quantity']; ?></td>
                            <td>
                              <?php if (!empty($this->uri->segment(6))) { ?>
                                <form action="<?= base_url('tech/reports/delete_item_satuan/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $row['id_news_detail']); ?>" method="post">
                                  <input type="hidden" name="id_news_detail" value="<?= $row['id_news_detail'] ?>">
                                  <input type="hidden" name="id_news" value="<?= $row['id_news'] ?>">
                                  <button type="submit" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i></button>
                                </form>
                              <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
                                <form action="<?= base_url('tech/reports/delete_item_satuan/' . $this->uri->segment(4) . '/' . $row['id_news_detail']); ?>" method="post">
                                  <input type="hidden" name="id_news_detail" value="<?= $row['id_news_detail'] ?>">
                                  <input type="hidden" name="id_news" value="<?= $row['id_news'] ?>">
                                  <button type="submit" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i></button>
                                </form>
                              <?php } else { ?>
                                <form action="<?= base_url('tech/reports/delete_item_satuan/' . $row['id_news_detail']); ?>" method="post">
                                  <input type="hidden" name="id_news_detail" value="<?= $row['id_news_detail'] ?>">
                                  <input type="hidden" name="id_news" value="<?= $row['id_news'] ?>">
                                  <button type="submit" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i></button>
                                </form>
                              <?php } ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <?php if (!empty($this->uri->segment(6))) { ?>
                    <a href="<?= base_url('tech/reports/news_bundling_report/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-danger float-right mt-3">Finish</a>
                  <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
                    <a href="<?= base_url('tech/reports/news_bundling_report/' . $this->uri->segment(4)); ?>" class="btn btn-danger float-right mt-3">Finish</a>
                  <?php } else { ?>
                    <a href="<?= base_url('tech/reports/news_bundling_report') ?>" class="btn btn-danger float-right mt-3">Finish</a>
                  <?php } ?>
          </div>


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