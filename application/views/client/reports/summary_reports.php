<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-6">
          <a href="<?= base_url('client/reports/news_bundling_report'); ?>" class="btn btn-info text-light"> <i class="far fa-sticky-note mr-2"></i> BACK</a>
        </div>
        <div class="col-6">

        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info shadow">
            <div class="card-header">
              <h3 class="card-title"><?= $judul; ?></h3>
            </div>
            <form method="post" action="<?= base_url('report/summary') ?>">
              <div class="card-body">

                <div class="row">
                  <div class="form-group col-md-6">
                    <label>START DATE *</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="<?= set_value('start_date'); ?>">
                    <?= form_error('start_date', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>
                  <div class="form-group col-md-6">
                    <label>END DATE *</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="<?= set_value('end_date'); ?>">
                    <?= form_error('end_date', '<small class="text-danger pl-2">', '</small>'); ?>
                  </div>

                  <div class="form-group col-md-6">
                    <label>CLIENT *</label>
                    <?php $client = $this->db->get_where('client', ['user_id' => $user['id_user']])->row_array(); ?>
                    <input type="hidden" class="form-control" name="id_client" value="<?= $client['id_client'] ?>" readonly>
                    <input type="text" class="form-control" value="<?= $client['client_name'] ?>" readonly>
                  </div>
                  <div class="form-group col-md-6">
                    <br>
                    <div class="custom-control custom-checkbox custom-control-inline">
                      <input type="checkbox" class="custom-control-input" id="approved" name="approved" value="1">
                      <label class="custom-control-label" for="approved">APPROVED</label>
                    </div>

                    <div class="custom-control custom-checkbox custom-control-inline">
                      <input type="checkbox" class="custom-control-input" id="pending" name="pending" value="0">
                      <label class="custom-control-label" for="pending">PENDING</label>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-info float-left">DOWNLOAD</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>