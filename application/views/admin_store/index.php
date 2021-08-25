<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $judul; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-lg-4 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $item_nonbundling; ?></h3>
              <p>Total Item Nonbundling</p>
            </div>
            <div class="icon">
              <i class="ion ion-archive"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-4 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $item_bundling; ?></h3>
              <p>Total Item Bundling</p>
            </div>
            <div class="icon">
              <i class="ion ion-filing"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-4 col-6">
          <div class="small-box bg-primary">
            <div class="inner">
              <h3><?= $request_bundling; ?></h3>
              <p>Total Request Bundling</p>
            </div>
            <div class="icon">
              <i class="ion ion-folder"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>


        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $status_request; ?></h3>
              <p>Request Bundling (Request)</p>
            </div>
            <div class="icon">
              <i class="ion ion-information-circled"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $status_cancel; ?></h3>
              <p>Request Bundling (Cancel)</p>
            </div>
            <div class="icon">
              <i class="ion ion-close-circled"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

      </div>
    </div>
  </section>
</div>