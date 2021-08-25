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
                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $data_user['id_user']; ?>">
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>FULLNAME *</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $data_user['fullname']; ?>">
                    <?= form_error('fullname', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>USERNAME *</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $data_user['username']; ?>">
                    <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label>EMAIL *</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $data_user['email']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>PHONE *</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?= $data_user['no_telp']; ?>">
                    <?= form_error('phone', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="image">IMAGE</label>
                      <div class="col-sm-12">
                        <div class="row">
                          <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/' . $data_user['image']); ?>" class="img-thumbnail" for="image">
                          </div>
                          <div class="col-sm-9">
                            <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input" id="image">
                              <label class="custom-file-label" for="custom-file">Choose file</label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <label class="col-form-label">DEPARTMENT *</label>
                    <select class="form-control" id="department_id" name="department_id" required>
                      <option selected="" disabled value="">Select Department</option>
                      <?php foreach ($department as $dept) : ?>
                        <?php if ($data_user['department_id'] == $dept['department_id']) { ?>
                          <option value="<?= $dept['department_id']; ?>" selected><?= $dept['name']; ?></option>
                        <?php } else {  ?>
                          <option value="<?= $dept['department_id']; ?>"><?= $dept['name']; ?></option>
                        <?php } ?>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <hr>
                <p style="font-size: 12px;color: red;">Kosongkan jika tidak diisi</p>
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
                <button type="submit" class="btn btn-info float-right">EDIT</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>