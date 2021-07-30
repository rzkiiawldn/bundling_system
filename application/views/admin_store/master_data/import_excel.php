<div class="content-wrapper">
  <div class="container mt-3">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Upload File*
          </div>
          <form method="POST" action="<?= base_url('admin_store/master_data/import_excel') ?>" enctype="multipart/form-data">
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
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <div class="form-group mb-0">
                <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button>
                <a href="<?= base_url('admin_store/master_data/item') ?>" class="btn btn-danger"><i class="fas fa-undo-alt mr-2"></i>Back</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>