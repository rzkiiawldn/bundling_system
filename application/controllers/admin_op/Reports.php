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

  public function report_request_bundling($id_client = null)
  {
    $id1 =  $id_client;
    $id_location = $this->session->userdata('id_location');

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = $id1  AND report = 1")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN client ON rb.id_client = client.id_client JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE report = 1 AND client.id_location = $id_location")->result_array();
    }
    $data = [
      'judul'     => 'Report Request Bundling',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/reports/request_bundling');
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
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/reports/request_bundling_detail');
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
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/reports/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function rb_create()
  {
    $id1 = $this->input->post('id1');
    $id_request_bundling = $this->input->post('id_request_bundling');
    $this->db->set('report', 1);
    $this->db->set('created_by', $this->session->userdata('fullname'));
    $this->db->where('id_request_bundling', $id_request_bundling);
    $this->db->update('request_bundling');

    if (!empty($id1)) {
      redirect('admin_op/reports/report_request_bundling/' . $id1);
    } else {
      redirect('admin_op/reports/report_request_bundling');
    }
  }

  // NEWS BUNDLING REPORT

  public function news_bundling_report($id_client = null)
  {
    $id1 =  $id_client;
    $id_location = $this->session->userdata('id_location');

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM news WHERE news.id_client = $id1")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE client.id_location = $id_location")->result_array();
    }
    $data = [
      'judul'     => 'News Bundling Report',
      'nama_menu' => 'reports',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'      => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/reports/news_bundling_report');
    $this->load->view('templates/footer');
  }

  public function nb_detail($id)
  {
    $data = [
      'judul'       => 'News Bundling Report Detail',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'        => $this->db->query("SELECT news.id_news AS news_id, news.*, news_detail.*, request_bundling.*, client.* FROM news LEFT JOIN news_detail ON news.id_news = news_detail.id_news LEFT JOIN request_bundling ON news_detail.id_request_bundling = request_bundling.id_request_bundling LEFT JOIN client ON news.id_client = client.id_client WHERE news.id_news = $id")->row_array(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/reports/news_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function nb_detaill($id_client = null, $id)
  {
    $id1 =  $id_client;
    $data = [
      'judul'       => 'News Bundling Report Detail',
      'id_client' => $id1,
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'        => $this->db->query("SELECT news.id_news AS news_id, news.*, news_detail.*, request_bundling.*, client.* FROM news LEFT JOIN news_detail ON news.id_news = news_detail.id_news LEFT JOIN request_bundling ON news_detail.id_request_bundling = request_bundling.id_request_bundling LEFT JOIN client ON news.id_client = client.id_client WHERE news.id_news = $id")->row_array(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/reports/news_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function nb_create($id_client = null)
  {
    $id2 = $id_client;
    $data = [
      'judul'         => 'News Bundling Report',
      'nama_menu'     => 'reports',
      'id_client'     => $id2,
      'client'        => $this->db->get_where('client', ['id_location' => $this->session->userdata('id_location')])->result_array(),
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->get('request_bundling')->result_array(),
      'request'       => $this->db->get('request_bundling')->result_array()
    ];

    $this->form_validation->set_rules('nama_pihak1', 'nama_pihak1', 'required|trim');
    $this->form_validation->set_rules('nama_pihak2', 'nama_pihak2', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak1', 'posisi_pihak1', 'required|trim');
    $this->form_validation->set_rules('posisi_pihak2', 'posisi_pihak2', 'required|trim');
    $this->form_validation->set_rules('dept_pihak1', 'dept_pihak1', 'required|trim');
    $this->form_validation->set_rules('dept_pihak2', 'dept_pihak2', 'required|trim');
    $this->form_validation->set_rules('lokasi', 'lokasi', 'required|trim');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
    $this->form_validation->set_rules('uom', 'uom', 'required|trim');
    $this->form_validation->set_rules('remaks', 'remaks', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/admin_op_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('admin_op/reports/news_bundling_create');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'nama_pihak1'       => htmlspecialchars($this->input->post('nama_pihak1')),
        'posisi_pihak1'     => htmlspecialchars($this->input->post('posisi_pihak1')),
        'dept_pihak1'       => htmlspecialchars($this->input->post('dept_pihak1')),
        'plat_code'         => htmlspecialchars($this->input->post('plat_code')),
        'nama_pihak2'       => htmlspecialchars($this->input->post('nama_pihak2')),
        'posisi_pihak2'     => htmlspecialchars($this->input->post('posisi_pihak2')),
        'dept_pihak2'       => htmlspecialchars($this->input->post('dept_pihak2')),
        'lokasi'            => htmlspecialchars($this->input->post('lokasi')),
        'uom'               => htmlspecialchars($this->input->post('uom')),
        'remaks'            => htmlspecialchars($this->input->post('remaks')),
        'tanggal'           => htmlspecialchars($this->input->post('tanggal')),
        'status'            => 0,
        'id_client'         => htmlspecialchars($this->input->post('id_client')),
        'created_by'        => $data['user']['fullname'],
        'created_date'      => date('Y-m-d')
      ];
      $this->db->insert('news', $data);

      if (!empty($this->uri->segment(4))) {
        $id_news = $this->db->insert_id();
        redirect('admin_op/reports/nb_create_detaill/' . $this->uri->segment(4) . '/' . $id_news);
      } else {
        $id_news = $this->db->insert_id();
        redirect('admin_op/reports/nb_create_detail/' . $id_news);
      }
    }
  }

  public function nb_create_detail($id_news)
  {
    $data = [
      'judul'             => 'News Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->get('request_bundling')->result_array(),
      'news'              => $this->db->query("SELECT * FROM news WHERE news.id_news = $id_news")->row(),
      'news_detail'       => $this->db->query("SELECT * FROM news_detail AS nd JOIN news AS n ON nd.id_news = n.id_news JOIN request_bundling AS rb ON nd.id_request_bundling = rb.id_request_bundling  WHERE nd.id_news = $id_news")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/reports/nb_create_detail');
    $this->load->view('templates/footer');
  }

  // JIKA HANYA ADA LOKASI
  public function nb_create_detaill($id_location = null,  $id_news)
  {
    $id1 = $id_location;
    $data = [
      'judul'             => 'News Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->get('request_bundling')->result_array(),
      'id_location'       => $id1,
      'news'              => $this->db->query("SELECT * FROM news WHERE news.id_news = $id_news")->row(),
      'news_detail'       => $this->db->query("SELECT * FROM news_detail AS nd JOIN news AS n ON nd.id_news = n.id_news JOIN request_bundling AS rb ON nd.id_request_bundling = rb.id_request_bundling  WHERE nd.id_news = $id_news")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/reports/nb_create_detail');
    $this->load->view('templates/footer');
  }

  public function add_edit_item($id_location = null, $id_client = null)
  {
    $id_news              = $this->input->post('id_news');
    $id_request_bundling  = $this->input->post('id_request_bundling');

    $cek = $this->db->query("SELECT * FROM news_detail WHERE news_detail.id_news = $id_news AND id_request_bundling = $id_request_bundling");

    if ($cek->num_rows() > 0) {
      // echo "<script> 
      // alert('item tidak boleh sama, silahkan pilih item lainnya');
      // </script>";

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">item tidak boleh sama, silahkan pilih item lainnya</div>');
      if (!empty($this->uri->segment(4))) {
        redirect('admin_op/reports/nb_editt/' . $this->uri->segment(4) . '/' . $id_news);
      } else {
        redirect('admin_op/reports/nb_edit/' . $id_news);
      }
    } else {
      $data = [
        'id_news'               => $id_news,
        'id_request_bundling'   => $id_request_bundling,
      ];

      $this->db->insert('news_detail', $data);

      if (!empty($this->uri->segment(4))) {
        redirect('admin_op/reports/nb_editt/' . $this->uri->segment(4) . '/' . $id_news);
      } else {
        redirect('admin_op/reports/nb_edit/' . $id_news);
      }
    }
  }

  public function add_item($id_location = null, $id_client = null)
  {
    $id_news              = $this->input->post('id_news');
    $id_request_bundling  = $this->input->post('id_request_bundling');

    $cek = $this->db->query("SELECT * FROM news_detail WHERE news_detail.id_news = $id_news AND id_request_bundling = $id_request_bundling");

    if ($cek->num_rows() > 0) {
      // echo "<script> 
      // alert('item tidak boleh sama, silahkan pilih item lainnya');
      // </script>";

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">item tidak boleh sama, silahkan pilih item lainnya</div>');
      if (!empty($this->uri->segment(4))) {
        redirect('admin_op/reports/nb_create_detaill/' . $this->uri->segment(4) . '/' . $id_news);
      } else {
        redirect('admin_op/reports/nb_create_detail/' . $id_news);
      }
    } else {
      $data = [
        'id_news'               => $id_news,
        'id_request_bundling'   => $id_request_bundling,
      ];

      $this->db->insert('news_detail', $data);

      if (!empty($this->uri->segment(4))) {
        redirect('admin_op/reports/nb_create_detaill/' . $this->uri->segment(4) . '/' . $id_news);
      } else {
        redirect('admin_op/reports/nb_create_detail/' . $id_news);
      }
    }
  }

  // UTK EDIT
  public function delete_item_satuan($id_location = null, $id_client = null)
  {
    $id_news                  = $this->input->post('id_news');
    $id_news_detail           = $this->input->post('id_news_detail');
    $this->db->where('id_news_detail', $id_news_detail);
    $this->db->delete('news_detail');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">request berhasil dihapus</div>');

    if (!empty($this->uri->segment(5))) {
      redirect('admin_op/reports/nb_editt/' . $this->uri->segment(4) . '/' . $id_news);
    } else {
      redirect('admin_op/reports/nb_edit/' . $id_news);
    }
  }

  // UTK ADD
  public function delete_item_satuann($id_location = null, $id_client = null)
  {
    $id_news                  = $this->input->post('id_news');
    $id_news_detail           = $this->input->post('id_news_detail');
    $this->db->where('id_news_detail', $id_news_detail);
    $this->db->delete('news_detail');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">request berhasil dihapus</div>');

    if (!empty($this->uri->segment(5))) {
      redirect('admin_op/reports/nb_create_detaill/' . $this->uri->segment(4) . '/' . $id_news);
    } else {
      redirect('admin_op/reports/nb_create_detail/' . $id_news);
    }
  }

  public function nb_edit($id_news)
  {
    $data = [
      'judul'         => 'Edit News Bundling',
      'location'      => $this->db->get('location')->result_array(),
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request'       => $this->db->get('request_bundling')->result_array(),
      'news'          => $this->db->query("SELECT news.id_news AS news_id, news.*, news_detail.*, request_bundling.*, client.* FROM news LEFT JOIN news_detail ON news.id_news = news_detail.id_news LEFT JOIN request_bundling ON news_detail.id_request_bundling = request_bundling.id_request_bundling JOIN client ON news.id_client = client.id_client WHERE news.id_news = $id_news ")->row_array(), 'news_detail'   => $this->db->query("SELECT * FROM news_detail AS nd JOIN news AS n ON nd.id_news = n.id_news JOIN request_bundling AS rb ON nd.id_request_bundling = rb.id_request_bundling  WHERE nd.id_news = $id_news")->result_array()
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
      $this->load->view('templates/admin_op_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('admin_op/reports/news_bundling_edit');
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

      redirect('admin_op/reports/news_bundling_report');
    }
  }

  // JIKA ADA LOKASI DAN  TIDAK ADA CLIENT
  public function nb_editt($id_client = null, $id_news)
  {
    $id1 = $id_client;
    $data = [
      'judul'         => 'Edit News Bundling',
      'location'      => $this->db->get('location')->result_array(),
      'id_client'     => $id1,
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request'       => $this->db->get('request_bundling')->result_array(),
      'news'          => $this->db->query("SELECT news.id_news AS news_id, news.*, news_detail.*, request_bundling.*, client.* FROM news LEFT JOIN news_detail ON news.id_news = news_detail.id_news LEFT JOIN request_bundling ON news_detail.id_request_bundling = request_bundling.id_request_bundling JOIN client ON news.id_client = client.id_client WHERE news.id_news = $id_news ")->row_array(), 'news_detail'   => $this->db->query("SELECT * FROM news_detail AS nd JOIN news AS n ON nd.id_news = n.id_news JOIN request_bundling AS rb ON nd.id_request_bundling = rb.id_request_bundling  WHERE nd.id_news = $id_news")->result_array()
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
      $this->load->view('templates/admin_op_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('admin_op/reports/news_bundling_edit');
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

      redirect('admin_op/reports/news_bundling_report/' . $this->uri->segment(4));
    }
  }

  public function nb_delete($id_news)
  {
    $this->db->where('id_news', $id_news);
    $this->db->delete('news');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('admin_op/reports/news_bundling_report');
  }

  // JIKA HANYA ADA LOKASI
  public function nb_deletee($id_location = null, $id_news)
  {
    $this->db->where('id_news', $id_news);
    $this->db->delete('news');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('admin_op/reports/news_bundling_report/' . $this->uri->segment(4));
  }

  public function summary_reports($id_client = null)
  {
    $id2 = $id_client;
    $data = [
      'judul'         => 'REPORTING INFORMATION',
      'id_client'     => $id2,
      'location'      => $this->db->get('location')->result_array(),
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/reports/summary_reports');
    $this->load->view('templates/footer');
  }
}
