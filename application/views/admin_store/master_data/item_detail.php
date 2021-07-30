<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(6))) { ?>
            <a href="<?= base_url('admin_store/master_data/item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="fas fa-undo-alt"></i> BACK</a>
          <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('admin_store/master_data/item/' . $this->uri->segment(4)); ?>" class="btn btn-info text-light"> <i class="fas fa-undo-alt"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('admin_store/master_data/item'); ?>" class="btn btn-info text-light"> <i class="fas fa-undo-alt"></i> BACK</a>
          <?php } ?>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php if (!empty($this->uri->segment(6))) { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_store/dashboard/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_store/master_data/item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>">Item</a></li>
            <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_store/dashboard/index/' . $this->uri->segment(4)); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_store/master_data/item/' . $this->uri->segment(4)); ?>">Item</a></li>
            <?php } else { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_store/dashboard/index'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_store/master_data/item'); ?>">Item</a></li>
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
            <div class="card-body">
              <div class="row text-uppercase" style="font-size: 14px;">
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Item Code</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['item_nonbundling_code']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Item Name</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['item_nonbundling_name']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Barcode</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['item_nonbundling_code']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Active</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['active']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Stock</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['minimum_stock']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">public price</label>
                    <p class="mb-0 pb-0"><?= number_format($item_nonbundling['publish_price']); ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Model</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['model']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Brand</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['brand']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Category</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['category']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Description</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['description']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Length, width, height, weight</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['length']; ?>, <?= $item_nonbundling['width']; ?>, <?= $item_nonbundling['height']; ?>, <?= $item_nonbundling['weight']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Size</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['size']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Dimension</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['dimension']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">additional expired</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['additional_expired']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Is Fragile</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['is_fragile']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Cool Storage</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['cool_storage']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">Manage By</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['manage_by']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">created By</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['created_by']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                  <div class="form-group">
                    <label class="pt-0 mt-0">created Date</label>
                    <p class="mb-0 pb-0"><?= $item_nonbundling['created_date']; ?></p>
                    <hr class="mt-0 pt-0">
                  </div>
                </div>
              </div>
              <?php if (!empty($this->uri->segment(6))) { ?>
                <a href="<?= base_url('admin_store/master_data/item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info float-right">Back</a>
              <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
                <a href="<?= base_url('admin_store/master_data/item/' . $this->uri->segment(4)); ?>" class="btn btn-info float-right">Back</a>
              <?php } else { ?>
                <a href="<?= base_url('admin_store/master_data/item/'); ?>" class="btn btn-info float-right">Back</a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>