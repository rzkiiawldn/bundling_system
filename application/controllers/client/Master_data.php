<?php

class Master_data extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function item()
  {
    $user     = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_user  = $user['id_user'];
    $client   = $this->db->get_where('client', ['user_id' => $id_user])->row_array();
    $id_client = $client['id_client'];
    $data = [
      'judul'             => 'Item',
      'nama_menu'         => 'master data',
      'user'              => $user,
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'location'          => $this->db->get('location')->result_array(),
      'item_nonbundling'  => $this->db->get_where('item_nonbundling', ['id_client' => $id_client])->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/master_data/item');
    $this->load->view('templates/footer');
  }

  public function detail($id_item_nonbundling)
  {
    $data = [
      'judul'       => 'Detail Item',
      'nama_menu'   => 'master data',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_nonbundling'  => $this->db->query("SELECT * FROM item_nonbundling WHERE id_item_nonbundling = $id_item_nonbundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/master_data/item_detail');
    $this->load->view('templates/footer');
  }
}
