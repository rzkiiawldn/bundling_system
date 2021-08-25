<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2 mt-4">
        <div class="col-sm-6">
          <div class="dropdown">
            <a href="<?= base_url('tech/setup/user'); ?>" class="btn btn-info text-light"> <i class="fas fa-undo-alt"></i> LIST</a>
          </div>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('tech/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('tech/setup/user'); ?>">Users</a></li>
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
                    <label>FULLNAME *</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= set_value('fullname'); ?>">
                    <?= form_error('fullname', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>USERNAME *</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>">
                    <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>EMAIL *</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>PHONE *</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?= set_value('phone'); ?>">
                    <?= form_error('phone', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>PASSWORD *</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>RETYPE PASSWORD *</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>UPLOAD IMAGE *</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>DEPARTMENT *</label>
                    <select class="form-control" id="department_id" name="department_id" required>
                      <option selected="" disabled value="">Select Department</option>
                      <?php foreach ($department as $dept) : ?>
                        <option value="<?= $dept['department_id']; ?>"><?= $dept['name']; ?></option>
                      <?php endforeach; ?>
                    </select>
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