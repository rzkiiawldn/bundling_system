<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-6">
          <?php if (!empty($this->uri->segment(5))) { ?>
            <a href="<?= base_url('admin_op/reports/report_request_bundling/' . $this->uri->segment(4)); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } else { ?>
            <a href="<?= base_url('admin_op/reports/report_request_bundling'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
          <?php } ?>
        </div>
        <div class="col-6">
          <ol class="breadcrumb float-sm-right">
            <?php if (!empty($this->uri->segment(5))) { ?>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_op/dashboard/index/' . $this->uri->segment(4)); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin_op/reports/report_request_bundling/' . $this->uri->segment(4)); ?>">List</a></li>
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
              <div class="col-sm-4 invoice-col">
                From
                <address>
                  <strong>?</strong><br>
                  Phone: +62<br>
                  Email: email
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong><?= $request_bundling['id_client']; ?></strong><br>
                  Lokasi<br>
                  Phone: +62<br>
                  Email: email
                </address>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row mb-5">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Code</th>
                      <th>Marketplcae</th>
                      <th>Quantity</th>
                      <th>Weight</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $bundling_detail = $this->db->get_where('item_bundling_detail', ['id_item_bundling' => $request_bundling['id_item_bundling']])->result_array() ?>
                    <?php foreach ($bundling_detail as $row) : ?>
                      <tr>
                        <td><?= $row['id_item_bundling']; ?></td>
                        <td><?= $row['id_item_nonbundling']; ?></td>
                        <td><?= $row['item_qty']; ?></td>
                        <td>?</td>
                        <td>?</td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

            <!-- this row will not appear when printing -->
            <div class="row no-print" style="margin-top: 150px;">
              <div class="col-12">
                <p>* INI ADALAH CETAKAN KOMPUTER, TANDA TANGAN TIDAK DIPERLUKAN</p>
                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>