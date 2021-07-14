<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="<?= base_url('client/bundling/request_bundling'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('client/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('client/bundling/request_bundling'); ?>">Item</a></li>
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
            <div class="card-body">
              <div class="row text-uppercase" style="font-size: 14px;">
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Request Bundling Code</label>
                    <p class="mb-0 pb-0"><?= $request_bundling['request_bundling_code']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Barcode</label>
                    <p class="mb-0 pb-0"><?= $request_bundling['request_bundling_barcode']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Bundling Type</label>
                    <p class="mb-0 pb-0"><?= $request_bundling['bundling_type']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Item Bundling</label>
                    <p class="mb-0 pb-0"><?= $request_bundling['item_bundling_name']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Request Qty</label>
                    <p class="mb-0 pb-0"><?= $request_bundling['request_quantity']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Packing Type</label>
                    <p class="mb-0 pb-0"><?= $request_bundling['packing_type']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Status</label>
                    <?php if ($request_bundling['status'] == 'request' || $request_bundling['status'] == 'process') { ?>
                      <p><span class="badge badge-warning"><?= $request_bundling['status']; ?></span></p>
                    <?php } elseif ($request_bundling['status'] == 'finish' || $request_bundling['status'] == 'success') { ?>
                      <p><span class="badge badge-success"><?= $request_bundling['status']; ?></span></p>
                    <?php } else { ?>
                      <p><span class="badge badge-danger"><?= $request_bundling['status']; ?></span></p>
                    <?php }  ?>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <?php if ($request_bundling['status'] == 'finish' || $request_bundling['status'] == 'success') { ?>
                  <div class="col-md-6 pt-0 mt-0">
                    <div class="form-group">
                      <label class="pt-0 mt-0">Photo</label>
                      <p class="mb-0 pb-0">
                        <img src="<?= base_url('assets/img/photo/' . $request_bundling['photo']) ?>" alt="" width="200px">
                      </p>
                      <hr class="mt-0 pt-0">
                    </div>
                  </div>
                <?php } ?>
              </div>
              <a href="<?= base_url('client/bundling/request_bundling'); ?>" class="btn btn-info float-right">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>