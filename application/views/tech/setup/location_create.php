<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <div class="dropdown">
            <a href="<?= base_url('tech/setup/location'); ?>" class="btn btn-info text-light"> <i class="fas fa-undo-alt"></i> LIST LOCATION</a>
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('tech/setup/location'); ?>">Location</a></li>
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
                  <div class="form-group col-md-6">
                    <label>Location Code *</label>
                    <input type="text" class="form-control" id="location_code" name="location_code" value="<?= set_value('location_code'); ?>">
                    <?= form_error('location_code', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Location Name *</label>
                    <input type="text" class="form-control" id="location_name" name="location_name" value="<?= set_value('location_name'); ?>">
                    <?= form_error('location_name', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Address *</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address'); ?>">
                    <?= form_error('address', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Province *</label>
                    <input type="text" class="form-control" id="province" name="province" value="<?= set_value('province'); ?>">
                    <?= form_error('province', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Country *</label>
                    <input type="text" class="form-control" id="country" name="country" value="<?= set_value('country'); ?>">
                    <?= form_error('country', '<small class="text-danger pl-2">', '</small>'); ?>
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