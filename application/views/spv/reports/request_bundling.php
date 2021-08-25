<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('spv/dashboard'); ?>">Home</a></li>
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
                  <tr>
                    <th width="5%">NO</th>
                    <th>CODE</th>
                    <th>BUNDLING TYPE</th>
                    <th>ITEM BUNDLING</th>
                    <th>QTY</th>
                    <th>PACKING TYPE</th>
                    <th>STATUS</th>
                    <th width="10%">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($request_bundling as $row) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $row['request_bundling_code']; ?></td>
                      <td><?= $row['bundling_type']; ?></td>
                      <td><?= $row['item_bundling_name']; ?></td>
                      <td><?= $row['request_quantity']; ?></td>
                      <td><?= $row['packing_type']; ?></td>
                      <td>
                        <?php if ($row['status'] == 'process' || $row['status'] == 'request') { ?>
                          <span class="badge badge-warning"><?= $row['status']; ?></span>
                        <?php } elseif ($row['status'] == 'finish' || $row['status'] == 'success') { ?>
                          <span class="badge badge-success"><?= $row['status']; ?></span>
                        <?php } else { ?>
                          <span class="badge badge-danger"><?= $row['status']; ?></span>
                        <?php }  ?>
                      </td>
                      <td class="text-center">
                        <?php if (!empty($this->uri->segment(4))) { ?>
                          <a href="<?= base_url('report/request_bundling/' .  $row['id_request_bundling']); ?>" target="_blank" class="btn btn-sm btn-default" title="print"><i class="fas fa-print"></i></a>
                          <a href="<?= base_url('spv/reports/rb_detaill/' . $this->uri->segment(4) . '/' .  $row['id_request_bundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
                        <?php } else { ?>
                          <a href="<?= base_url('report/request_bundling/' . $row['id_request_bundling']); ?>" target="_blank" class="btn btn-sm btn-default" title="print"><i class="fas fa-print"></i></a>
                          <a href="<?= base_url('spv/reports/rb_detail/' . $row['id_request_bundling']); ?>" class="btn btn-sm btn-info" title="detail"><i class="fas fa-eye"></i></a>
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('spv/reports/rb_create') ?>" method="post">
        <div class="modal-body">
          <?php if (empty($this->uri->segment(4))) { ?>
            <div class="form-group">
              <label>Request Bundling Code</label>
              <select name="id_request_bundling" class="form-control select2bs4">
                <?php $id_location = $this->session->userdata('id_location'); ?>
                <?php $request = $this->db->query(" SELECT * FROM request_bundling JOIN client ON request_bundling.id_client = client.id_client WHERE client.id_location = $id_location")->result_array();
                foreach ($request as $row) : ?>
                  <option value="<?= $row['id_request_bundling'] ?>"><?= $row['request_bundling_code']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          <?php } else { ?>
            <div class="form-group">
              <?php if (!empty($this->uri->segment(4))) { ?>
                <input type="hidden" name="id1" value="<?= $this->uri->segment(4) ?>">
              <?php } ?>
              <label>Request Bundling Code</label>
              <select name="id_request_bundling" class="form-control select2bs4">
                <option value="" selected disabled>-- select --</option>
                <?php $request = $this->db->get_where('request_bundling', ['id_client' => $this->uri->segment(4)])->result_array();

                foreach ($request as $row) : ?>
                  <option value="<?= $row['id_request_bundling'] ?>"><?= $row['request_bundling_code']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          <?php } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>