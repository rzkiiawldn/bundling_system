<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('admin_op/reports/news_bundling_report/' . $this->uri->segment(4)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('admin_op/reports/news_bundling_report'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } ?>
        </div>
        <div class="col-6">
          <ol class="breadcrumb float-sm-right">
            <?php if (!empty($this->uri->segment(5))) { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_op/dashboard/index/' . $this->uri->segment(4)); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_op/reports/news_bundling_report/' . $this->uri->segment(4)); ?>">List</a></li>
            <?php } else { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_op/dashboard'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_op/dashboard'); ?>">List</a></li>
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
        <div class="col-12">


          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-6">
                <h5>Pihak Pertama</h5>
                <table style="margin-top: 20px;">
                  <tr>
                    <td width="30px">1.</td>
                    <td width="150px">Nama</td>
                    <td>: <?= $news['nama_pihak1']; ?></td>
                  </tr>
                  <tr>
                    <td width="30px"></td>
                    <td width="150px">Posisi</td>
                    <td>: <?= $news['posisi_pihak1']; ?></td>
                  </tr>
                  <tr>
                    <td width="30px"></td>
                    <td width="150px">Dept</td>
                    <td>: <?= $news['dept_pihak1']; ?></td>
                  </tr>
                  <tr>
                    <td width="30px"></td>
                    <td width="150px">Lokasi</td>
                    <td>: <?= $news['lokasi']; ?></td>
                  </tr>
                </table>
              </div>
              <div class="col-6">
                <h5>Pihak Kedua</h5>
                <table style="margin-top: 20px;">
                  <tr>
                    <td width="30px">2.</td>
                    <td width="150px">Nama</td>
                    <td>: <?= $news['nama_pihak2']; ?></td>
                  </tr>
                  <tr>
                    <td width="30px"></td>
                    <td width="150px">Posisi</td>
                    <td>: <?= $news['posisi_pihak2']; ?></td>
                  </tr>
                  <tr>
                    <td width="30px"></td>
                    <td width="150px">Dept</td>
                    <td>: <?= $news['dept_pihak2']; ?></td>
                  </tr>
                  <tr>
                    <td width="30px"></td>
                    <td width="150px">Plat Code</td>
                    <td>: <?= $news['plat_code']; ?></td>
                  </tr>
                </table>
              </div>
              <!-- <div class="col-sm-6 invoice-col">
                <h5>Pihak Pertama</h5>
                <table class="table table-hover">
                  <tr>
                    <th width="120px">Nama</th>
                    <td>: <?= $news['nama_pihak1']; ?></td>
                  </tr>
                  <tr>
                    <th>Posisi</th>
                    <td>: <?= $news['posisi_pihak1']; ?></td>
                  </tr>
                  <tr>
                    <th>Dept</th>
                    <td>: <?= $news['dept_pihak1']; ?></td>
                  </tr>
                  <tr>
                    <th>Lokasi</th>
                    <td>: <?= $news['lokasi']; ?></td>
                  </tr>
                </table>
              </div>
              <div class="col-sm-6 invoice-col">
                <h5>Pihak Kedua</h5>
                <table class="table table-hover">
                  <tr>
                    <th width="120px">Nama</th>
                    <td>: <?= $news['nama_pihak2']; ?></td>
                  </tr>
                  <tr>
                    <th>Posisi</th>
                    <td>: <?= $news['posisi_pihak2']; ?></td>
                  </tr>
                  <tr>
                    <th>Dept</th>
                    <td>: <?= $news['dept_pihak2']; ?></td>
                  </tr>
                  <tr>
                    <th>Plat Code</th>
                    <td>: <?= $news['plat_code']; ?></td>
                  </tr>
                </table>
              </div> -->
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <br>
            <div class="row">
              <div class="col-12 table-responsive">
                <h5>Barang</h5>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Client</th>
                      <th>Qty</th>
                      <th>UoM</th>
                      <th>Remaks</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $news_detail = $this->db->get_where('request_bundling', ['id_request_bundling' => $news['id_barang']])->row_array() ?>
                    <?php $id_item = $news_detail['id_item_bundling']; ?>
                    <?php $bundling_detail = $this->db->query(" SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN client ON ib.id_client = client.id_client WHERE ibd.id_item_bundling = $id_item ")->result_array() ?>
                    <?php $no = 1;
                    foreach ($bundling_detail as $row) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['client_name']; ?></td>
                        <td><?= $row['item_qty']; ?></td>
                        <td>Pcs</td>
                        <td>DI TERIMA SECARA PCS</td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row  mb-5 mt-3">
              <div class="col-12">
                <h5>Status : </h5>
                <?php if ($news['status'] == 0) { ?>
                  <p style="color: yellow;">Pending</p>
                <?php } else { ?>
                  <p style="color: green;">Approved</p>
                <?php } ?>
              </div>
            </div>

            <!-- this row will not appear when printing -->
            <?php if ($news['status'] == 1) { ?>
              <div class="row no-print" style="margin-top: 150px;">
                <div class="col-12">
                  <p>* INI ADALAH CETAKAN KOMPUTER, TANDA TANGAN TIDAK DIPERLUKAN</p>
                  <a href="<?= base_url('report/news_bundling/' . $news['id_news']) ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>