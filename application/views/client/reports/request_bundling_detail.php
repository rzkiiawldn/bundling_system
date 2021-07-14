<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-6">
          <a href="<?= base_url('client/reports/report_request_bundling'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
        </div>
        <div class="col-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('client/dashboard'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('client/reports/report_request_bundling'); ?>">List</a></li>
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
                  <strong><?= $request_bundling['created']; ?></strong><br>
                  <!-- Phone: +62<br> -->
                  <?php $from = $this->db->get_where('user', ['fullname' => $request_bundling['created']])->row_array() ?>
                  Email: <?= $from['email']; ?>
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong><?= $request_bundling['client_name']; ?></strong><br>
                  <?= $request_bundling['location_name']; ?><br>
                  <!-- Phone: +62<br> -->
                  <?php $to = $this->db->get_where('user', ['fullname' => $request_bundling['created_by']])->row_array() ?>
                  Email: <?= $request_bundling['email']; ?>
                </address>
              </div>

              <div class="col-sm-4">
                <img src="<?= base_url('assets/logo.png') ?>" alt="" width="80%" style="margin-top: -40px;" class="float-right">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row my-4">
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
                    <?php $item = $request_bundling['id_item_bundling']; ?>
                    <?php $bundling = $this->db->query(" SELECT * FROM item_bundling WHERE id_item_bundling = $item ")->result_array() ?>
                    <?php $bundling_detail = $this->db->query(" SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $item ")->result_array() ?>
                    <?php foreach ($bundling as $row) : ?>
                      <tr>
                        <td>
                          <?= $row['item_bundling_name']; ?> <br> detail : <br>
                          <ul>
                            <?php foreach ($bundling_detail as $bd) : ?>
                              <li>
                                <?= $bd['item_nonbundling_name']; ?>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </td>
                        <td>

                          <ul style="margin-top: 45px;list-style-type: none;">
                            <?php foreach ($bundling_detail as $bd) : ?>
                              <li>
                                <?= $bd['item_nonbundling_code']; ?>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </td>

                        <td>

                          <ul style="margin-top: 45px;list-style-type: none;">
                            <?php foreach ($bundling_detail as $bd) : ?>
                              <li>
                                ?
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </td>

                        <td>

                          <ul style="margin-top: 45px;list-style-type: none;">
                            <?php foreach ($bundling_detail as $bd) : ?>
                              <li>
                                <?= $bd['item_qty']; ?>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </td>
                        <td>

                          <ul style="margin-top: 45px;list-style-type: none;">
                            <?php foreach ($bundling_detail as $bd) : ?>
                              <li>
                                <?= $bd['weight']; ?>
                              </li>
                            <?php endforeach; ?>
                          </ul>
                        </td>

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
                <a href="<?= base_url('report/request_bundling/' . $request_bundling['id_request_bundling']) ?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>