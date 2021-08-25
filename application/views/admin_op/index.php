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

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $status_process; ?></h3>
              <p>Requst Bundling (Process)</p>
            </div>
            <div class="icon">
              <i class="ion ion-compass"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $status_finish; ?></h3>
              <p>Requst Bundling (Finish)</p>
            </div>
            <div class="icon">
              <i class="ion ion-checkmark"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $news; ?></h3>
              <p>News Bundling Report</p>
            </div>
            <div class="icon">
              <i class="ion ion-document-text"></i>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $report_request; ?></h3>
              <p>Report Request Bundling</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>