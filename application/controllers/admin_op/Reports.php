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

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = $id1  AND report = 1")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE report = 1")->result_array();
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
      'request_bundling'        => $this->db->query("SELECT * FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN user ON request_bundling.id_user = user.id_user LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation WHERE id_request_bundling = $id")->row_array(),
      'request_bundling_total'  => $this->db->query("SELECT * FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN user ON request_bundling.id_user = user.id_user LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation WHERE id_request_bundling = $id")->num_rows(),
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
      'request_bundling'        => $this->db->query("SELECT * FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN user ON request_bundling.id_user = user.id_user LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation WHERE id_request_bundling = $id")->row_array(),
      'request_bundling_total'  => $this->db->query("SELECT * FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN user ON request_bundling.id_user = user.id_user LEFT JOIN client ON request_bundling.id_client = client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation WHERE id_request_bundling = $id")->num_rows(),
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
    $id2 = $this->input->post('id2');
    $id_request_bundling = $this->input->post('id_request_bundling');
    $this->db->set('report', 1);
    $this->db->where('id_request_bundling', $id_request_bundling);
    $this->db->update('request_bundling');

    if (!empty($id1)) {
      redirect('admin_op/reports/report_request_bundling/' . $id1 . '/' . $id2);
    } else {
      redirect('admin_op/reports/report_request_bundling');
    }
  }

  // NEWS BUNDLING REPORT

  public function news_bundling_report($id_client = null)
  {
    $id1 =  $id_client;

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM news WHERE id_client = $id1")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM news")->result_array();
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

  public function nb_create($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'         => 'News Bundling Report',
      'nama_menu'     => 'reports',
      'id_location'   => $id1,
      'id_client'     => $id2,
      'client'        => $this->db->get('client')->result_array(),
      'location'        => $this->db->get('location')->result_array(),
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
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
      $this->load->view('templates/admin_op_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('admin_op/reports/news_bundling_create');
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
        'id_location'       => htmlspecialchars($this->input->post('id_location')),
        'created_by'        => $data['user']['fullname'],
      ];
      $this->db->insert('news', $data);

      if (!empty($this->uri->segment(5))) {
        redirect('admin_op/reports/news_bundling_report/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
      } else {
        redirect('admin_op/reports/news_bundling_report');
      }
    }
  }
}
