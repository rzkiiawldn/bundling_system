<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('tech/reports/nb_create/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> CREATE</a>
          <?php } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) { ?>
            <a href="<?= base_url('tech/reports/nb_create/' . $this->uri->segment(4)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> CREATE</a>
          <?php } else { ?>
            <a href="<?= base_url('tech/reports/nb_create'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> CREATE</a>
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
                    <th>Tanggal</th>
                    <th>Pihak 1</th>
                    <th>Pihak 2</th>
                    <th>Barang</th>
                    <th>Status</th>
                    <th width="15%">ACTION</th>
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
                      <td><?= $row['id_barang']; ?></td>
                      <td>
                        <?php if ($row['status'] == 0) { ?>
                          <span class="badge badge-sm badge-warning">Pending</span>
                        <?php } else { ?>
                          <span class="badge badge-sm badge-success">Diterima</span>
                        <?php } ?>
                      <td>
                        <?php if (!empty($this->uri->segment(5))) { ?>
                          <a href="<?= base_url('tech/reports/news_bundling_report/detail_news/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $row['id_news']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="<?= base_url('tech/reports/news_bundling_report/edit_news/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $row['id_news']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                          <a href="<?= base_url('tech/reports/news_bundling_report/delete_news/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $row['id_news']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
                        <?php } elseif (empty($this->uri->segment(4)) and !empty($this->uri->segment(4))) { ?>
                          <a href="<?= base_url('tech/reports/news_bundling_report/detail_news/' . $this->uri->segment(4) . '/' . $row['id_news']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="<?= base_url('tech/reports/news_bundling_report/edit_news/' . $this->uri->segment(4) . '/' . $row['id_news']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                          <a href="<?= base_url('tech/reports/news_bundling_report/delete_news/' . $this->uri->segment(4) . '/' . $row['id_news']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
                        <?php } else { ?>
                          <a href="<?= base_url('tech/reports/news_bundling_report/detail/' . $row['id_news']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="<?= base_url('tech/reports/news_bundling_report/edit/' . $row['id_news']); ?>" class="btn btn-sm btn-success" title="edit"><i class="fas fa-pen"></i></a>
                          <a href="<?= base_url('tech/reports/news_bundling_report/delete/' . $row['id_news']); ?>" onclick="return confirm('Apakah Anda Yakin ?')" class="btn btn-sm btn-danger" title="hapus"><i class="fas fa-trash"></i></a>
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