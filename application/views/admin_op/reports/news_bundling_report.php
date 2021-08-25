<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(4))) { ?>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More Action
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="<?= base_url('admin_op/reports/nb_create/' . $this->uri->segment(4)); ?>">CREATE</a>
                <a class="dropdown-item" href="<?= base_url('admin_op/reports/summary_reports/' . $this->uri->segment(4)); ?>">SUMMARY REPORTS</a>
              </div>
            </div>
          <?php } else { ?>
            <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                More Action
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="<?= base_url('admin_op/reports/nb_create'); ?>">CREATE</a>
                <a class="dropdown-item" href="<?= base_url('admin_op/reports/summary_reports'); ?>">SUMMARY REPORTS</a>
              </div>
            </div>
          <?php } ?>

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>">Home</a></li>
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
            <div class="card-header border-transparent">
              <h3 class="card-title"> <i class="fas fa-user mr-2"></i></i> <b> <?= $judul; ?> </b> </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead class="text-uppercase">
                  <tr>
                    <th width="5%">NO</th>
                    <th>Arrived Date</th>
                    <th>Client</th>
                    <th>Staff Operational</th>
                    <th>Status</th>
                    <th width="20%">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($news as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['tanggal']; ?></td>
                      <td><?= $row['nama_pihak1']; ?></td>
                      <td><?= $row['nama_pihak2']; ?></td>
                      <td>
                        <?php if ($row['status'] == 0) { ?>
                          <span class="badge badge-sm badge-warning">Pending</span>
                        <?php } else { ?>
                          <span class="badge badge-sm badge-success">Approved</span>
                        <?php } ?>
                      <td>
                        <?php if (!empty($this->uri->segment(4))) { ?>
                          <?php if ($row['status'] == 1) { ?>
                            <a href="<?= base_url('report/news_bundling/' . $row['id_news']) ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i></a>
                            <a href="<?= base_url('admin_op/reports/nb_detaill/' . $this->uri->segment(4) . '/' . $row['id_news']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                            <a href="<?= base_url('admin_op/reports/nb_deletee/' . $this->uri->segment(4) . '/' . $row['id_news']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
                          <?php } else { ?>
                            <a href="<?= base_url('admin_op/reports/nb_detaill/' . $this->uri->segment(4) . '/' . $row['id_news']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                            <a href="<?= base_url('admin_op/reports/nb_editt/' . $this->uri->segment(4) . '/' . $row['id_news']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('admin_op/reports/nb_deletee/' . $this->uri->segment(4) . '/' . $row['id_news']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
                          <?php } ?>
                        <?php } else { ?>
                          <?php if ($row['status'] == 1) { ?>
                            <a href="<?= base_url('report/news_bundling/' . $row['id_news']) ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i></a>
                            <a href="<?= base_url('admin_op/reports/nb_detail/' . $row['id_news']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                            <a href="<?= base_url('admin_op/reports/nb_delete/' . $row['id_news']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
                          <?php } else { ?>
                            <a href="<?= base_url('admin_op/reports/nb_detail/' . $row['id_news']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                            <a href="<?= base_url('admin_op/reports/nb_edit/' . $row['id_news']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                            <a href="<?= base_url('admin_op/reports/nb_delete/' . $row['id_news']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
                          <?php } ?>
                        <?php } ?>

                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>