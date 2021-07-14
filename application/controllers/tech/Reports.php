<?php

class Reports extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  // REPORT REQUEST BUNDLING

  public function report_request_bundling($id_location = null, $id_client = null)
  {
    $id1 =  $id_location;
    $id2 =  $id_client;

    if ($id1 != null and empty($id2)) {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status JOIN client ON rb.id_client = client.id_client WHERE client.id_location = $id1 AND rb.report = 1")->result_array();
    } elseif ($id2 != null) {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status JOIN client ON rb.id_client = client.id_client WHERE client.id_location = $id1 AND rb.id_client = $id2  AND report = 1")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE report = 1")->result_array();
    }

    $data = [
      'judul'     => 'Report Request Bundling',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/reports/request_bundling');
    $this->load->view('templates/footer');
  }

  public function rb_detail($id)
  {
    $data = [
      'judul'       => 'Report Request Bundling',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'        => $this->db->query("SELECT request_bundling.created_by AS created, request_bundling.*, item_bundling.*, status.*, client.*, stock_allocation.*, location.*, user.*  FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation JOIN location ON client.id_location = location.id_location JOIN user ON client.user_id = user.id_user WHERE id_request_bundling = $id")->row_array(),
      'request_bundling_total'  => $this->db->query("SELECT request_bundling.created_by AS created, request_bundling.*, item_bundling.*, status.*, client.*, stock_allocation.*, location.*, user.*  FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation JOIN location ON client.id_location = location.id_location JOIN user ON client.user_id = user.id_user WHERE id_request_bundling = $id")->num_rows(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/reports/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function rb_detaill($id_client = null, $id)
  {
    $id1 =  $id_client;
    $data = [
      'judul'       => 'Report Request Bundling',
      'id_client' => $id1,
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'        => $this->db->query("SELECT request_bundling.created_by AS created, request_bundling.*, item_bundling.*, status.*, client.*, stock_allocation.*, location.*, user.*  FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation JOIN location ON client.id_location = location.id_location JOIN user ON client.user_id = user.id_user WHERE id_request_bundling = $id")->row_array(),
      'request_bundling_total'  => $this->db->query("SELECT request_bundling.created_by AS created, request_bundling.*, item_bundling.*, status.*, client.*, stock_allocation.*, location.*, user.*  FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation JOIN location ON client.id_location = location.id_location JOIN user ON client.user_id = user.id_user WHERE id_request_bundling = $id")->num_rows(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/reports/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function rb_detailll($id_location = null, $id_client = null, $id)
  {
    $id1 =  $id_location;
    $id2 =  $id_client;
    $data = [
      'judul'       => 'Report Request Bundling',
      'id_location' => $id1,
      'id_client'   => $id2,
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'        => $this->db->query("SELECT request_bundling.created_by AS created, request_bundling.*, item_bundling.*, status.*, client.*, stock_allocation.*, location.*, user.*  FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation JOIN location ON client.id_location = location.id_location JOIN user ON client.user_id = user.id_user WHERE id_request_bundling = $id")->row_array(),
      'request_bundling_total'  => $this->db->query("SELECT request_bundling.created_by AS created, request_bundling.*, item_bundling.*, status.*, client.*, stock_allocation.*, location.*, user.*  FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation JOIN location ON client.id_location = location.id_location JOIN user ON client.user_id = user.id_user WHERE id_request_bundling = $id")->num_rows(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/reports/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function rb_create()
  {
    $id1 = $this->input->post('id1');
    $id2 = $this->input->post('id2');
    $id_request_bundling = $this->input->post('id_request_bundling');
    $this->db->set('report', 1);
    $this->db->where('id_request_bundling', $id_request_bundling);
    $this->db->update('request_bundling');

    if (!empty($id2)) {
      redirect('tech/reports/report_request_bundling/' . $id1 . '/' . $id2);
    } elseif (empty($id2) and !empty($id1)) {
      redirect('tech/reports/report_request_bundling/' . $id1);
    } else {
      redirect('tech/reports/report_request_bundling');
    }
  }

  // NEWS BUNDLING REPORT

  public function news_bundling_report($id_location = null, $id_client = null)
  {
    $id1 =  $id_location;
    $id2 =  $id_client;

    if ($id1 != null and empty($id2)) {
      $item = $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE client.id_location = $id1")->result_array();
    } elseif ($id2 != null) {
      $item = $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE client.id_location = $id1 AND news.id_client = $id2")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM news")->result_array();
    }
    $data = [
      'judul'     => 'News Bundling Report',
      'nama_menu' => 'reports',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'      => $item,
      'request'   => $this->db->get('request_bundling')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/reports/news_bundling_report');
    $this->load->view('templates/footer');
  }

  public function nb_create($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'         => 'News Bundling Report',
      'id_location'   => $id1,
      'id_client'     => $id2,
      'location'      => $this->db->get('location')->result_array(),
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request'   => $this->db->get('request_bundling')->result_array()
    ];

    $this->form_validation->set_rules('nama_pihak1', 'nama_pihak1', 'required|trim');
    $this->form_validation->set_rules('nama_pihak2', 'nama_pihak2', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak1', 'posisi_pihak1', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak2', 'posisi_pihak2', 'required|trim');
    $this->form_validation->set_rules('dept_pihak1', 'dept_pihak1', 'required|trim');
    $this->form_validation->set_rules('dept_pihak2', 'dept_pihak2', 'required|trim');
    $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
    $this->form_validation->set_rules('id_barang', 'id_barang', 'required|trim');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/reports/news_bundling_create');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'nama_pihak1'       => htmlspecialchars($this->input->post('nama_pihak1')),
        'posisi_pihak1'     => htmlspecialchars($this->input->post('posisi_pihak1')),
        'dept_pihak1'       => htmlspecialchars($this->input->post('dept_pihak1')),
        'nama_pihak2'       => htmlspecialchars($this->input->post('nama_pihak2')),
        'posisi_pihak2'     => htmlspecialchars($this->input->post('posisi_pihak2')),
        'dept_pihak2'       => htmlspecialchars($this->input->post('dept_pihak2')),
        'lokasi'            => htmlspecialchars($this->input->post('lokasi')),
        'id_barang'         => htmlspecialchars($this->input->post('id_barang')),
        'tanggal'           => htmlspecialchars($this->input->post('tanggal')),
        'status'            => 0,
        'id_client'         => htmlspecialchars($this->input->post('id_client')),
        'created_by'        => $data['user']['fullname'],
      ];
      $this->db->insert('news', $data);

      if (!empty($this->uri->segment(5))) {
        redirect('tech/reports/news_bundling_report/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
      } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) {
        redirect('tech/reports/news_bundling_report/' . $this->uri->segment(4));
      } else {
        redirect('tech/reports/news_bundling_report');
      }
    }
  }

  public function nb_edit($id_news)
  {
    $data = [
      'judul'         => 'Edit News Bundling',
      'location'      => $this->db->get('location')->result_array(),
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request'       => $this->db->get('request_bundling')->result_array(),
      'news'          => $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE id_news = $id_news ")->row_array()
    ];

    $this->form_validation->set_rules('nama_pihak1', 'nama_pihak1', 'required|trim');
    $this->form_validation->set_rules('nama_pihak2', 'nama_pihak2', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak1', 'posisi_pihak1', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak2', 'posisi_pihak2', 'required|trim');
    $this->form_validation->set_rules('dept_pihak1', 'dept_pihak1', 'required|trim');
    $this->form_validation->set_rules('dept_pihak2', 'dept_pihak2', 'required|trim');
    $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
    $this->form_validation->set_rules('id_barang', 'id_barang', 'required|trim');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/reports/news_bundling_edit');
      $this->load->view('templates/footer');
    } else {
      $id_news                          = htmlspecialchars($this->input->post('id_news'));
      $nama_pihak1                      = htmlspecialchars($this->input->post('nama_pihak1'));
      $posisi_pihak1                    = htmlspecialchars($this->input->post('posisi_pihak1'));
      $dept_pihak1                      = htmlspecialchars($this->input->post('dept_pihak1'));
      $plat_code                        = htmlspecialchars($this->input->post('plat_code'));
      $nama_pihak2                      = htmlspecialchars($this->input->post('nama_pihak2'));
      $posisi_pihak2                    = htmlspecialchars($this->input->post('posisi_pihak2'));
      $dept_pihak2                      = htmlspecialchars($this->input->post('dept_pihak2'));
      $lokasi                           = htmlspecialchars($this->input->post('lokasi'));
      $id_barang                        = htmlspecialchars($this->input->post('id_barang'));
      $tanggal                          = htmlspecialchars($this->input->post('tanggal'));
      $id_client                        = htmlspecialchars($this->input->post('id_client'));


      $this->db->set('nama_pihak1', $nama_pihak1);
      $this->db->set('posisi_pihak1', $posisi_pihak1);
      $this->db->set('dept_pihak1', $dept_pihak1);
      $this->db->set('plat_code', $plat_code);
      $this->db->set('nama_pihak2', $nama_pihak2);
      $this->db->set('posisi_pihak2', $posisi_pihak2);
      $this->db->set('dept_pihak2', $dept_pihak2);
      $this->db->set('lokasi', $lokasi);
      $this->db->set('id_barang', $id_barang);
      $this->db->set('tanggal', $tanggal);
      $this->db->set('id_client', $id_client);
      $this->db->where('id_news', $id_news);
      $this->db->update('news');

      redirect('tech/reports/news_bundling_report');
    }
  }

  // JIKA ADA LOKASI DAN CLIENT
  public function nb_edittt($id_location = null, $id_client = null, $id_news)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'         => 'Edit News Bundling',
      'id_location'   => $id1,
      'id_client'     => $id2,
      'location'      => $this->db->get('location')->result_array(),
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request'       => $this->db->get('request_bundling')->result_array(),
      'news'          => $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE id_news = $id_news ")->row_array()
    ];

    $this->form_validation->set_rules('nama_pihak1', 'nama_pihak1', 'required|trim');
    $this->form_validation->set_rules('nama_pihak2', 'nama_pihak2', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak1', 'posisi_pihak1', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak2', 'posisi_pihak2', 'required|trim');
    $this->form_validation->set_rules('dept_pihak1', 'dept_pihak1', 'required|trim');
    $this->form_validation->set_rules('dept_pihak2', 'dept_pihak2', 'required|trim');
    $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
    $this->form_validation->set_rules('id_barang', 'id_barang', 'required|trim');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/reports/news_bundling_edit');
      $this->load->view('templates/footer');
    } else {
      $id_news                          = htmlspecialchars($this->input->post('id_news'));
      $nama_pihak1                      = htmlspecialchars($this->input->post('nama_pihak1'));
      $posisi_pihak1                    = htmlspecialchars($this->input->post('posisi_pihak1'));
      $dept_pihak1                      = htmlspecialchars($this->input->post('dept_pihak1'));
      $plat_code                        = htmlspecialchars($this->input->post('plat_code'));
      $nama_pihak2                      = htmlspecialchars($this->input->post('nama_pihak2'));
      $posisi_pihak2                    = htmlspecialchars($this->input->post('posisi_pihak2'));
      $dept_pihak2                      = htmlspecialchars($this->input->post('dept_pihak2'));
      $lokasi                           = htmlspecialchars($this->input->post('lokasi'));
      $id_barang                        = htmlspecialchars($this->input->post('id_barang'));
      $tanggal                          = htmlspecialchars($this->input->post('tanggal'));
      $id_client                        = htmlspecialchars($this->input->post('id_client'));


      $this->db->set('nama_pihak1', $nama_pihak1);
      $this->db->set('posisi_pihak1', $posisi_pihak1);
      $this->db->set('dept_pihak1', $dept_pihak1);
      $this->db->set('plat_code', $plat_code);
      $this->db->set('nama_pihak2', $nama_pihak2);
      $this->db->set('posisi_pihak2', $posisi_pihak2);
      $this->db->set('dept_pihak2', $dept_pihak2);
      $this->db->set('lokasi', $lokasi);
      $this->db->set('id_barang', $id_barang);
      $this->db->set('tanggal', $tanggal);
      $this->db->set('id_client', $id_client);
      $this->db->where('id_news', $id_news);
      $this->db->update('news');

      redirect('tech/reports/news_bundling_report/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    }
  }
  // JIKA ADA LOKASI DAN  TIDAK ADA CLIENT
  public function nb_editt($id_location = null, $id_news)
  {
    $id1 = $id_location;
    $data = [
      'judul'         => 'Edit News Bundling',
      'location'      => $this->db->get('location')->result_array(),
      'id_location'   => $id1,
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request'       => $this->db->get('request_bundling')->result_array(),
      'news'          => $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE id_news = $id_news ")->row_array()
    ];

    $this->form_validation->set_rules('nama_pihak1', 'nama_pihak1', 'required|trim');
    $this->form_validation->set_rules('nama_pihak2', 'nama_pihak2', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak1', 'posisi_pihak1', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak2', 'posisi_pihak2', 'required|trim');
    $this->form_validation->set_rules('dept_pihak1', 'dept_pihak1', 'required|trim');
    $this->form_validation->set_rules('dept_pihak2', 'dept_pihak2', 'required|trim');
    $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
    $this->form_validation->set_rules('id_barang', 'id_barang', 'required|trim');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/reports/news_bundling_edit');
      $this->load->view('templates/footer');
    } else {
      $id_news                          = htmlspecialchars($this->input->post('id_news'));
      $nama_pihak1                      = htmlspecialchars($this->input->post('nama_pihak1'));
      $posisi_pihak1                    = htmlspecialchars($this->input->post('posisi_pihak1'));
      $dept_pihak1                      = htmlspecialchars($this->input->post('dept_pihak1'));
      $plat_code                        = htmlspecialchars($this->input->post('plat_code'));
      $nama_pihak2                      = htmlspecialchars($this->input->post('nama_pihak2'));
      $posisi_pihak2                    = htmlspecialchars($this->input->post('posisi_pihak2'));
      $dept_pihak2                      = htmlspecialchars($this->input->post('dept_pihak2'));
      $lokasi                           = htmlspecialchars($this->input->post('lokasi'));
      $id_barang                        = htmlspecialchars($this->input->post('id_barang'));
      $tanggal                          = htmlspecialchars($this->input->post('tanggal'));
      $id_client                        = htmlspecialchars($this->input->post('id_client'));


      $this->db->set('nama_pihak1', $nama_pihak1);
      $this->db->set('posisi_pihak1', $posisi_pihak1);
      $this->db->set('dept_pihak1', $dept_pihak1);
      $this->db->set('plat_code', $plat_code);
      $this->db->set('nama_pihak2', $nama_pihak2);
      $this->db->set('posisi_pihak2', $posisi_pihak2);
      $this->db->set('dept_pihak2', $dept_pihak2);
      $this->db->set('lokasi', $lokasi);
      $this->db->set('id_barang', $id_barang);
      $this->db->set('tanggal', $tanggal);
      $this->db->set('id_client', $id_client);
      $this->db->where('id_news', $id_news);
      $this->db->update('news');

      redirect('tech/reports/news_bundling_report/' . $this->uri->segment(4));
    }
  }

  // JIKA TIDAK ADA LOKASI DAN CLIENT
  public function nb_delete($id_news)
  {
    $this->db->where('id_news', $id_news);
    $this->db->delete('news');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('tech/reports/news_bundling_report');
  }

  // JIKA HANYA ADA LOKASI
  public function nb_deletee($id_location = null, $id_news)
  {
    $this->db->where('id_news', $id_news);
    $this->db->delete('news');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('tech/reports/news_bundling_report/' . $this->uri->segment(4));
  }
  // JIKA ADA LOKASI DAN CLIENT
  public function nb_deleteee($id_location = null, $id_client = null, $id_news)
  {
    $this->db->where('id_news', $id_news);
    $this->db->delete('news');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');

    redirect('tech/reports/news_bundling_report/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
  }

  public function nb_detail($id)
  {
    $data = [
      'judul'       => 'News Bundling Report Detail',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'        => $this->db->query("SELECT * FROM news LEFT JOIN request_bundling ON request_bundling.id_request_bundling = news.id_barang LEFT JOIN client ON news.id_client = client.id_client WHERE id_news = $id")->row_array(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/reports/news_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function nb_detaill($id_client = null, $id)
  {
    $id1 =  $id_client;
    $data = [
      'judul'       => 'News Bundling Report Detail',
      'id_client' => $id1,
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'        => $this->db->query("SELECT * FROM news LEFT JOIN request_bundling ON request_bundling.id_request_bundling = news.id_barang LEFT JOIN client ON news.id_client = client.id_client WHERE id_news = $id")->row_array(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/reports/news_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function nb_detailll($id_location = null, $id_client = null, $id)
  {
    $id2 =  $id_client;
    $id1 =  $id_location;
    $data = [
      'judul'       => 'News Bundling Report Detail',
      'id_client' => $id2,
      'id_location' => $id1,
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'        => $this->db->query("SELECT * FROM news LEFT JOIN request_bundling ON request_bundling.id_request_bundling = news.id_barang LEFT JOIN client ON news.id_client = client.id_client WHERE id_news = $id")->row_array(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/reports/news_bundling_detail');
    $this->load->view('templates/footer');
  }
}
