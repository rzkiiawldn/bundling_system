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
    $user        = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $id_location = $user['id_location'];

    if ($id1 != null) {
      $news_process = $this->db->query("SELECT * FROM news WHERE id_client = $id1 AND status = 0 ")->num_rows();
      $news_finish = $this->db->query("SELECT * FROM news WHERE id_client = $id1 AND status = 1 ")->num_rows();
    } else {
      $news_process = $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE client.id_location = $id_location AND status = 0")->num_rows();
      $news_finish = $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE client.id_location = $id_location AND status = 1")->num_rows();
    }

    $data = [
      'judul'     => 'dashboard',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'news_process'      => $news_process,
      'news_finish'       => $news_finish
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/spv_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('spv/index');
    $this->load->view('templates/footer');
  }
}
