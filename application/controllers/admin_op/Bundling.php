<?php

class Bundling extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function item_bundling($id_client = null)
  {
    $id1 = $id_client;

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM item_bundling WHERE id_client = $id1")->result_array();
    } else {
      $item = $this->db->get('item_bundling')->result_array();
    }

    $data = [
      'nama_menu'         => 'bundling',
      'judul'             => 'Item Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_bundling'     => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/item_bundling');
    $this->load->view('templates/footer');
  }

  // JIKA TIDAK ADA LOKASI DAN CLIENT

  public function ib_detail($id_item_bundling)
  {
    $data = [
      'nama_menu'       => 'bundling',
      'judul'           => 'Detail Item Bundling',
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_bundling'   => $this->db->query("SELECT * FROM item_bundling WHERE item_bundling.id_item_bundling = $id_item_bundling ")->row_array(),
      'item_bundling_detail' => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $id_item_bundling ")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/item_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function ib_detaill($id_client = null,  $id_item_bundling)
  {
    $id1 =  $id_client;
    $data = [
      'nama_menu'       => 'bundling',
      'judul'           => 'Detail Item Bundling',
      'id_client'       => $id1,
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_bundling'   => $this->db->query("SELECT * FROM item_bundling WHERE item_bundling.id_item_bundling = $id_item_bundling ")->row_array(),
      'item_bundling_detail' => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $id_item_bundling ")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/item_bundling_detail');
    $this->load->view('templates/footer');
  }


  // REQUEST BUNDLING


  public function request_bundling($id_client = null)
  {
    $id1 = $id_client;

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = $id1")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status")->result_array();
    }

    $user    = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data = [
      'judul'             => 'Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $user,
      'request_bundling'  => $item,
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/request_bundling');
    $this->load->view('templates/footer');
  }

  public function rb_detail($id_request_bundling)
  {
    $data = [
      'judul'             => 'Detail Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE id_request_bundling = $id_request_bundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function rb_detaill($id_client = null,  $id_request_bundling)
  {
    $id1 =  $id_client;
    $data = [
      'judul'           => 'Detail Request Bundling',
      'id_client'       => $id1,
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE id_request_bundling = $id_request_bundling AND rb.id_client = $id1")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/request_bundling_detail');
    $this->load->view('templates/footer');
  }
}
