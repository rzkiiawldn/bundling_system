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
    $id1 =  $id_client;
    $id_location = $this->session->userdata('id_location');

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM item_bundling AS inb JOIN client ON inb.id_client = client.id_client WHERE inb.id_client = $id1 AND client.id_location = $id_location")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM item_bundling AS inb JOIN client ON inb.id_client = client.id_client WHERE client.id_location = $id_location")->result_array();
    }

    $data = [
      'judul'             => 'Item Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'            => $this->db->get('client')->result_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_bundling'     => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/bundling/item_bundling');
    $this->load->view('templates/footer');
  }

  public function detail($id_item_bundling)
  {
    $data = [
      'judul'           => 'Detail Item Bundling',
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_bundling'   => $this->db->query("SELECT * FROM item_bundling WHERE item_bundling.id_item_bundling = $id_item_bundling ")->row_array(),
      'item_bundling_detail' => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $id_item_bundling ")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/bundling/item_bundling_detail');
    $this->load->view('templates/footer');
  }


  public function detail_bundling($id_client = null,  $id_item_bundling)
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
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/bundling/item_bundling_detail');
    $this->load->view('templates/footer');
  }
}
