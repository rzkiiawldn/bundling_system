<?php

class Bundling extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  // ITEM BUNDLING

  public function item_bundling()
  {
    $user     = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_user  = $user['id_user'];
    $client   = $this->db->get_where('client', ['user_id' => $id_user])->row_array();
    $id_client = $client['id_client'];
    $data = [
      'nama_menu'         => 'bundling',
      'judul'             => 'Item Bundling',
      'user'              => $user,
      'item_bundling'     => $this->db->get_where('item_bundling', ['id_client' => $id_client])->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/bundling/item_bundling');
    $this->load->view('templates/footer');
  }

  public function detail_bundling($id_item_bundling)
  {
    $data = [
      'nama_menu'       => 'bundling',
      'judul'           => 'Detail Item Bundling',
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_bundling'   => $this->db->query("SELECT * FROM item_bundling WHERE item_bundling.id_item_bundling = $id_item_bundling ")->row_array(),
      'item_bundling_detail' => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $id_item_bundling ")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/bundling/item_bundling_detail');
    $this->load->view('templates/footer');
  }

  // REQUEST BUNDLING

  public function request_bundling()
  {
    $user     = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_user  = $user['id_user'];
    $client   = $this->db->get_where('client', ['user_id' => $id_user])->row_array();
    $id_client = $client['id_client'];
    $data = [
      'nama_menu'         => 'bundling',
      'judul'             => 'Request Bundling',
      'user'              => $user,
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb LEFT JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling LEFT JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = '$id_client'")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/bundling/request_bundling');
    $this->load->view('templates/footer');
  }

  public function detail_request($id_request_bundling)
  {
    $data = [
      'judul'             => 'Detail Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE id_request_bundling = $id_request_bundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/bundling/request_bundling_detail');
    $this->load->view('templates/footer');
  }
}
