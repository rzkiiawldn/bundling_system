<div class="content-wrapper">
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Upload File*
          </div>
          <form method="POST" action="<?= base_url('tech/master_data/import_excel') ?>" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <div class="col-md-12">
                      <label class="col-form-label text-md-left">Upload File</label>
                      <input type="file" class="form-control" name="file" accept=".xls, .csv" required>
                      <div class="mt-1">
                        <span class="text-danger">File yang harus diupload : .xls, csv dan data tidak boleh kosong</span>
                      </div>
                      <div class="mt-1">
                        <a href="<?= base_url('assets/excel/Upload_Item.xls') ?>" download="">Download Template xls</a>
                        <a href="<?= base_url('assets/excel/Upload_Item.csv') ?>" class="ml-5" download="">Download Template csv</a>
                      </div>
                      <?= form_error('file', '<div class="text-danger">', '</div>') ?>
                    </div>
                    <input type="hidden" name="uri4" value="<?= $this->uri->segment(4) ?>">
                    <input type="hidden" name="uri5" value="<?= $this->uri->segment(5) ?>">
                    <?php if (!empty($this->uri->segment(5))) { ?>
                      <input type="hidden" name="id_client" value="<?= $id_client ?>">
                    <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
                      <div class="col-12">
                        <label class="col-form-label text-md-left">Client</label>
                        <select name="id_client" id="id_client" class="form-control" required>
                          <option value="" selected disabled>-- pilih --</option>
                          <?php foreach ($id_client as $row) : ?>
                            <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    <?php } else { ?>
                      <div class="col-12">
                        <label class="col-form-label text-md-left">Client</label>
                        <select name="id_client" id="id_client" class="form-control">
                          <option value="" selected disabled>-- client --</option>
                          <?php foreach ($id_client as $row) : ?>
                            <option value="<?= $row['id_client'] ?>"><?= $row['client_name']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    <?php }  ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <div class="form-group mb-0">
                <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
                <?php if (!empty($this->uri->segment(5))) { ?>
                  <a href="<?= base_url('tech/master_data/item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-danger"><i class="fas fa-undo-alt mr-2"></i>Back</a>
                <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
                  <a href="<?= base_url('tech/master_data/item/' . $this->uri->segment(4)); ?>" class="btn btn-danger"><i class="fas fa-undo-alt mr-2"></i>Back</a>
                <?php } else { ?>
                  <a href="<?= base_url('tech/master_data/item') ?>" class="btn btn-danger"><i class="fas fa-undo-alt mr-2"></i>Back</a>
                <?php } ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>