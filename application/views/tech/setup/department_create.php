<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <div class="dropdown">
            <a href="<?= base_url('tech/setup/department'); ?>" class="btn btn-info text-light"> <i class="fas fa-undo-alt"></i> LIST DEPARTMENT</a>
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('tech/setup/department'); ?>">department</a></li>
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
                    <label>department Code *</label>
                    <input type="text" class="form-control" id="kd_department" name="kd_department" value="<?= set_value('kd_department'); ?>">
                    <?= form_error('kd_department', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>department Name *</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name'); ?>">
                    <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
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