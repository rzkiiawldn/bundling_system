<?php

class Reports extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function report_request_bundling()
  {
    $user       = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_user    = $user['id_user'];
    $client     = $this->db->get_where('client', ['user_id' => $id_user])->row_array();
    $id_client  = $client['id_client'];
    $data = [
      'nama_menu'         => 'report',
      'judul'             => 'Report Request Bundling',
      'user'              => $user,
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = $id_client AND report = 1")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/reports/request_bundling');
    $this->load->view('templates/footer');
  }
  public function detail_request($id)
  {
    $data = [
      'judul'       => 'Report Request Bundling',
      'nama_menu'   => 'reports',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'        => $this->db->query("SELECT request_bundling.created_by AS created, request_bundling.*, item_bundling.*, status.*, client.*, stock_allocation.*, location.*, user.*  FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation JOIN location ON client.id_location = location.id_location JOIN user ON client.user_id = user.id_user WHERE id_request_bundling = $id")->row_array(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/reports/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  // NEWS BUNDLING REPORTS
  public function news_bundling_report()
  {
    $user     = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_user  = $user['id_user'];
    $client   = $this->db->get_where('client', ['user_id' => $id_user])->row_array();
    $id_client = $client['id_client'];
    $data = [
      'judul'     => 'News Bundling Report',
      'nama_menu' => 'reports',
      'user'      => $user,
      'news'      => $this->db->query(" SELECT * FROM news WHERE news.id_client = $id_client")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/reports/news_bundling_report');
    $this->load->view('templates/footer');
  }

  public function detail_news($id)
  {
    $data = [
      'judul'       => 'News Bundling Report Detail',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news'        => $this->db->query("SELECT news.id_news AS news_id, news.*, news_detail.*, request_bundling.*, client.* FROM news LEFT JOIN news_detail ON news.id_news = news_detail.id_news LEFT JOIN request_bundling ON news_detail.id_request_bundling = request_bundling.id_request_bundling LEFT JOIN client ON news.id_client = client.id_client WHERE news.id_news = $id")->row_array(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/reports/news_bundling_detail');
    $this->load->view('templates/footer');
  }
}
