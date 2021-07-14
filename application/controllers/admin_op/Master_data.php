<?php

class Master_data extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function item($id_client = null)
  {
    $id1 =  $id_client;
    $id_location = $this->session->userdata('id_location');

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM item_nonbundling AS inb JOIN client ON inb.id_client = client.id_client WHERE inb.id_client = $id1 AND client.id_location = $id_location")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM item_nonbundling AS inb JOIN client ON inb.id_client = client.id_client WHERE client.id_location = $id_location")->result_array();
    }

    $data = [
      'judul'             => 'Item',
      'nama_menu'         => 'master data',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'item_nonbundling'  => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/master_data/item');
    $this->load->view('templates/footer');
  }

  // JIKA TIDAK ADA CLIENT
  public function detail($id_item_nonbundling)
  {
    $data = [
      'judul'       => 'Detail Item',
      'nama_menu'   => 'master data',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_nonbundling'  => $this->db->query("SELECT * FROM item_nonbundling WHERE id_item_nonbundling = $id_item_nonbundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/master_data/item_detail');
    $this->load->view('templates/footer');
  }

  // JIKA ADA CLIENT
  public function detail_item($id_client = null, $id_item_nonbundling)
  {
    $id1 = $id_client;
    $data = [
      'judul'       => 'Detail Item',
      'nama_menu'   => 'master data',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'id_client'   => $id1,
      'item_nonbundling'  => $this->db->query("SELECT * FROM item_nonbundling WHERE id_item_nonbundling = $id_item_nonbundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/master_data/item_detail');
    $this->load->view('templates/footer');
  }
}
