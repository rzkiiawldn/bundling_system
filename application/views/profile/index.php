<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="col mt-3">
        <div class="row mb-2">
          <div class="col-sm-6">
            <a href="<?= base_url('profile/edit_profile'); ?>" class="btn btn-info text-light"> <i class="fas fa-pen mr-2"></i> Edit Profile</a>
          </div>
        </div>
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username"><b><?= $user['fullname']; ?></b></h3>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="<?= base_url('assets/img/profile/' . $user['image']) ?>" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">EMAIL</h5>
                  <span><?= $user['email']; ?></span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <h5 class="description-header">USERNAME</h5>
                  <span><?= $user['username']; ?></span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-4">
                <div class="description-block">
                  <h5 class="description-header">PHONE</h5>
                  <span><?= $user['no_telp']; ?></span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.widget-user -->
      </div>
    </div>
  </section>
</div>