<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php if (!empty($this->uri->segment(4))) { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('spv/dashboard/index/' . $this->uri->segment(4)); ?>">Home</a></li>
            <?php } else { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('spv/dashboard'); ?>">Home</a></li>
            <?php } ?>
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
                <thead>
                  <tr class="text-uppercase">
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
                      </td>
                      <td>
                        <?php if (!empty($this->uri->segment(4))) { ?>
                          <?php if ($row['status'] == 1) { ?>
                            <a href="<?= base_url('report/news_bundling/' . $row['id_news']) ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i></a>
                          <?php } ?>
                          <a href="<?= base_url('spv/reports/nb_detail_news/' . $this->uri->segment(4) . '/' . $row['id_news']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="#" data-toggle="modal" data-target="#edit<?= $row['id_news'] ?>" class="btn btn-sm btn-success" title="ubah status"><i class="fas fa-pen"></i></a>
                        <?php } else { ?>
                          <?php if ($row['status'] == 1) { ?>
                            <a href="<?= base_url('report/news_bundling/' . $row['id_news']) ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i></a>
                          <?php } ?>
                          <a href="<?= base_url('spv/reports/nb_detail/' . $row['id_news']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                          <a href="#" data-toggle="modal" data-target="#edit<?= $row['id_news'] ?>" class="btn btn-sm btn-success" title="ubah status"><i class="fas fa-pen"></i></a>
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

<?php foreach ($news as $row) : ?>
  <div class="modal fade" id="edit<?= $row['id_news'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('spv/reports/edit_status') ?>" method="post">
          <div class="modal-body">
            <?php if (!empty($this->uri->segment(4))) { ?>
              <input type="hidden" value="<?= $this->uri->segment(4) ?>" name="id">
            <?php } ?>
            <input type="hidden" name="id_news" value="<?= $row['id_news'] ?>">
            <div class="form-group">
              <label>Status</label>
              <select name="status" class="form-control" required>
                <option value="" selected disabled>-- select --</option>
                <?php if ($row['status'] == 0) { ?>
                  <option value="0" selected>Pending</option>
                  <option value="1">confirmation</option>
                <?php } else { ?>
                  <option value="0">Pending</option>
                  <option value="1" selected>Confirmation</option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>