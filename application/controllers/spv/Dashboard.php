<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    belum_login();
    $this->load->library('form_validation');
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index($id_client = null)
  {
    $id1 = $id_client;

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM item_nonbundling WHERE id_client = $id1")->result_array();
    } else {
      $item = $this->db->get('item_nonbundling')->result_array();
    }

    $data = [
      'judul'     => 'dashboard',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item'      => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('templates/index');
    $this->load->view('templates/footer');
  }
}
