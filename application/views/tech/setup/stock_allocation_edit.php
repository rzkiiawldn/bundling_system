<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <div class="dropdown">
            <a href="<?= base_url('tech/setup/stock_allocation'); ?>" class="btn btn-info text-light"> <i class="fas fa-undo-alt"></i> LIST STOCK</a>
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('tech/setup/stock_allocation'); ?>">stock allocation</a></li>
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
                  <input type="hidden" class="form-control" id="id_stock_allocation" name="id_stock_allocation" value="<?= $stock_allocation['id_stock_allocation']; ?>">
                  <div class="form-group col-md-6">
                    <label>stock allocation Code *</label>
                    <input type="text" class="form-control" id="stock_allocation_code" name="stock_allocation_code" value="<?= $stock_allocation['stock_allocation_code']; ?>">
                    <?= form_error('stock_allocation_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>stock allocation Name *</label>
                    <input type="text" class="form-control" id="stock_allocation_name" name="stock_allocation_name" value="<?= $stock_allocation['stock_allocation_name']; ?>">
                    <?= form_error('stock_allocation_name', '<small class="text-danger pl-2">', '</small>'); ?>
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