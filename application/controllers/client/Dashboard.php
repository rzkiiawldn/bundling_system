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

  public function index()
  {
    $client = $this->db->get_where('client', ['user_id' => $this->session->userdata('id_user')])->row_array();
    $id_client = $client['id_client'];
    $data = [
      'judul'     => 'PT BINTANG DAGANG INTERNASIONAL - HAISTARR',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_nonbundling' => $this->db->get_where('item_nonbundling', ['id_client' => $id_client])->num_rows(),
      'item_bundling' => $this->db->get_where('item_bundling', ['id_client' => $id_client])->num_rows(),
      'request_finish' => $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status WHERE status.status = 'process' OR status.status = 'request' AND request_bundling.id_client = $id_client ")->num_rows(),
      'request_process' => $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status WHERE status.status = 'finish' OR status.status = 'success' AND request_bundling.id_client = $id_client ")->num_rows(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/client_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('client/index');
    $this->load->view('templates/footer');
  }
}
