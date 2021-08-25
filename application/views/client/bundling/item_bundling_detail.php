<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <a href="<?= base_url('client/bundling/item_bundling'); ?>" class="btn btn-info text-light"> <i class="fas fa-undo-alt"></i> BACK</a>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('client/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('client/bundling/item_bundling'); ?>">Item</a></li>
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
                    <label class="pt-0 mt-0">Item Code</label>
                    <p class="mb-0 pb-0"><?= $item_bundling['item_bundling_code']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Item Name</label>
                    <p class="mb-0 pb-0"><?= $item_bundling['item_bundling_name']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Barcode</label>
                    <p class="mb-0 pb-0"><?= $item_bundling['item_bundling_barcode']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Active</label>
                    <p class="mb-0 pb-0"><?= $item_bundling['active']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">public price</label>
                    <p class="mb-0 pb-0"><?= number_format($item_bundling['total_price']); ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Manage By</label>
                    <p class="mb-0 pb-0"><?= $item_bundling['manage_by']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">created By</label>
                    <p class="mb-0 pb-0"><?= $item_bundling['created_by']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">created date</label>
                    <p class="mb-0 pb-0"><?= $item_bundling['created_date']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <h5>Item Bundling Detail</h5>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <tr>
                        <th>No</th>
                        <th>Item Name</th>
                        <th>Item Code</th>
                        <th>Item Barcode</th>
                        <th>Qty</th>
                      </tr> <?php $no = 1;
                            foreach ($item_bundling_detail as $row) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $row['item_nonbundling_name']; ?></td>
                          <td><?= $row['item_nonbundling_code']; ?></td>
                          <td><?= $row['item_nonbundling_barcode']; ?></td>
                          <td><?= $row['item_qty']; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>
                  <a href="<?= base_url('client/bundling/item_bundling') ?>" class="btn btn-info float-right">Back</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>