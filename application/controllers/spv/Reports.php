<?php

class Reports extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function news_bundling_report($id_client = null)
  {
    $id1 =  $id_client;
    $id_location = $this->session->userdata('id_location');

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE news.id_client = $id1 AND client.id_location = $id_location")->result_array();
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
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/reports/news_bundling_report');
    $this->load->view('templates/footer');
  }

  public function create($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'     => 'News Bundling Report',
      'nama_menu' => 'reports',
      'id_location' => $id1,
      'id_client' => $id2,
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->get('request_bundling')->result_array()
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
      $this->load->view('templates/sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('reports/create_news_bundling');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'nama_pihak1'    => htmlspecialchars($this->input->post('nama_pihak1')),
        'posisi_pihak1'    => htmlspecialchars($this->input->post('posisi_pihak1')),
        'dept_pihak1'    => htmlspecialchars($this->input->post('dept_pihak1')),
        'nama_pihak2'    => htmlspecialchars($this->input->post('nama_pihak2')),
        'posisi_pihak2'    => htmlspecialchars($this->input->post('posisi_pihak2')),
        'dept_pihak2'    => htmlspecialchars($this->input->post('dept_pihak2')),
        'lokasi'    => htmlspecialchars($this->input->post('lokasi')),
        'id_barang'    => htmlspecialchars($this->input->post('id_barang')),
        'tanggal'    => htmlspecialchars($this->input->post('tanggal')),
        'status'    => 0,
        'id_client'    => htmlspecialchars($this->input->post('id_client')),
        'id_location'    => htmlspecialchars($this->input->post('id_location')),
        'created_by'    => $data['user']['fullname'],
      ];
      $this->db->insert('news', $data);

      if (!empty($this->uri->segment(5))) {
        redirect('reports/news_bundling_report/index/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
      } else {
        redirect('reports/news_bundling_report');
      }
    }
  }

  public function edit_status()
  {
    $id = $this->input->post('id');
    $this->db->set('status', $this->input->post('status'));
    $this->db->where('id_news', $this->input->post('id_news'));
    $this->db->update('news');

    if ($id != null) {
      redirect('spv/reports/news_bundling_report/' . $id);
    } else {
      redirect('spv/reports/news_bundling_report');
    }
  }

  public function nb_detail($id)
  {
    $data = [
      'judul'       => 'News Bundling Report Detail',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'        => $this->db->query("SELECT news.id_news AS news_id, news.*, news_detail.*, request_bundling.*, client.* FROM news LEFT JOIN news_detail ON news.id_news = news_detail.id_news LEFT JOIN request_bundling ON news_detail.id_request_bundling = request_bundling.id_request_bundling LEFT JOIN client ON news.id_client = client.id_client WHERE news.id_news = $id")->row_array(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/reports/news_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function nb_detail_news($id_client = null, $id)
  {
    $id1 =  $id_client;
    $data = [
      'judul'       => 'News Bundling Report Detail',
      'id_client' => $id1,
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'        => $this->db->query("SELECT news.id_news AS news_id, news.*, news_detail.*, request_bundling.*, client.* FROM news LEFT JOIN news_detail ON news.id_news = news_detail.id_news LEFT JOIN request_bundling ON news_detail.id_request_bundling = request_bundling.id_request_bundling LEFT JOIN client ON news.id_client = client.id_client WHERE news.id_news = $id")->row_array(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/reports/news_bundling_detail');
    $this->load->view('templates/footer');
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
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/reports/summary_reports');
    $this->load->view('templates/footer');
  }

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
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/reports/request_bundling');
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
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/reports/request_bundling_detail');
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
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/reports/request_bundling_detail');
    $this->load->view('templates/footer');
  }
}
