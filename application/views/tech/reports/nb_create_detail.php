<div class="content-wrapper">
  <section class="content mt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-info shadow">
            <div class="card-header">
              <h3 class="card-title"><?= $judul; ?></h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <?= $this->session->flashdata('pesan'); ?>
                </div>
              </div>
              <?php if (!empty($this->uri->segment(6))) { ?>
                <form action="<?= base_url('tech/reports/add_item/' . $this->uri->segment(5) . '/' . $this->uri->segment(6)); ?>" method="post">
                <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
                  <form action="<?= base_url('tech/reports/add_item/' . $this->uri->segment(5)); ?>" method="post">
                  <?php } else { ?>
                    <form method="post" action="<?= base_url('tech/reports/add_item') ?>">
                    <?php } ?>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Request_bundling_code *</label>
                        <select name="id_request_bundling" id="id_request_bundling" class="form-control select2bs4" required>
                          <option value="" selected disabled></option>
                          <?php foreach ($request_bundling as $item) : ?>
                            <option value="<?= $item['id_request_bundling'] ?>"><?= $item['request_bundling_code']; ?></option>
                          <?php endforeach; ?>
                        </select>
                        <?= form_error('id_request_bundling', '<small class="text-danger pl-2">', '</small>'); ?>
                      </div>
                      <input type="hidden" class="form-control" id="id_news" name="id_news" value="<?= $news->id_news; ?>">
                    </div>
                    <button type="submit" class="btn btn-info float-right">ADD</button>
                    </form>

                    <div class="pt-5 mt-5">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th width="5%">NO</th>
                            <th>REQUEST BUNDLING CODE</th>
                            <th>QTY</th>
                            <th width="15%">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1;
                          foreach ($news_detail as $row) : ?>
                            <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $row['request_bundling_code']; ?></td>
                              <td><?= $row['request_quantity']; ?></td>
                              <td>
                                <?php if (!empty($this->uri->segment(6))) { ?>
                                  <form action="<?= base_url('tech/reports/delete_item_satuann/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $row['id_news_detail']); ?>" method="post">
                                    <input type="hidden" name="id_news_detail" value="<?= $row['id_news_detail'] ?>">
                                    <input type="hidden" name="id_news" value="<?= $row['id_news'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i></button>
                                  </form>
                                <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
                                  <form action="<?= base_url('tech/reports/delete_item_satuann/' . $this->uri->segment(4) . '/' . $row['id_news_detail']); ?>" method="post">
                                    <input type="hidden" name="id_news_detail" value="<?= $row['id_news_detail'] ?>">
                                    <input type="hidden" name="id_news" value="<?= $row['id_news'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i></button>
                                  </form>
                                <?php } else { ?>
                                  <form action="<?= base_url('tech/reports/delete_item_satuann/' . $row['id_news_detail']); ?>" method="post">
                                    <input type="hidden" name="id_news_detail" value="<?= $row['id_news_detail'] ?>">
                                    <input type="hidden" name="id_news" value="<?= $row['id_news'] ?>">
                                    <button type="submit" class="btn btn-sm btn-danger" title="hapus" onclick="return confirm('Delete ?')"><i class="fas fa-trash"></i></button>
                                  </form>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                    <?php if (!empty($this->uri->segment(6))) { ?>
                      <a href="<?= base_url('tech/reports/news_bundling_report/' . $this->uri->segment(4) . '/' . $this->uri->segment(5)); ?>" class="btn btn-danger float-right mt-3">Finish</a>
                    <?php } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) { ?>
                      <a href="<?= base_url('tech/reports/news_bundling_report/' . $this->uri->segment(4)); ?>" class="btn btn-danger float-right mt-3">Finish</a>
                    <?php } else { ?>
                      <a href="<?= base_url('tech/reports/news_bundling_report') ?>" class="btn btn-danger float-right mt-3">Finish</a>
                    <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>