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
      $item_nonbundling = $this->db->query("SELECT * FROM item_nonbundling WHERE id_client = $id1 ")->num_rows();
      $item_bundling    = $this->db->query("SELECT * FROM item_bundling WHERE id_client = $id1 ")->num_rows();
      $request_bundling = $this->db->query("SELECT * FROM request_bundling WHERE id_client = $id1 ")->num_rows();
      $news             = $this->db->query("SELECT * FROM news WHERE id_client = $id1 ")->num_rows();
      $report_request   = $this->db->query("SELECT * FROM request_bundling WHERE id_client = $id1 AND report = 1 ")->num_rows();
      $status_process   = $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status WHERE status.status = 'process' OR status.status = 'request' AND id_client = $id1")->num_rows();
      $status_finish    = $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status WHERE status.status = 'finish' OR status.status = 'success' AND id_client = $id1")->num_rows();
    } else {
      $item_nonbundling = $this->db->query("SELECT * FROM item_nonbundling JOIN client ON item_nonbundling.id_client = client.id_client WHERE client.id_location = $id_location")->num_rows();
      $item_bundling    = $this->db->query("SELECT * FROM item_bundling JOIN client ON item_bundling.id_client = client.id_client WHERE client.id_location = $id_location")->num_rows();
      $request_bundling = $this->db->query("SELECT * FROM request_bundling JOIN client ON request_bundling.id_client = client.id_client WHERE client.id_location = $id_location")->num_rows();
      $report_request   = $this->db->query("SELECT * FROM request_bundling JOIN client ON request_bundling.id_client = client.id_client WHERE client.id_location = $id_location AND request_bundling.report = 1")->num_rows();
      $news             = $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE client.id_location = $id_location")->num_rows();
      $status_process   = $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status JOIN client ON request_bundling.id_client = client.id_client WHERE status.status = 'process' OR status.status = 'request' AND client.id_location = $id_location")->num_rows();
      $status_finish    = $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status JOIN client ON request_bundling.id_client = client.id_client WHERE status.status = 'finish' OR status.status = 'success' AND client.id_location = $id_location")->num_rows();
    }

    $data = [
      'judul'     => 'PT BINTANG DAGANG INTERNASIONAL - HAISTAR',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_nonbundling'  => $item_nonbundling,
      'item_bundling'     => $item_bundling,
      'request_bundling'  => $request_bundling,
      'report_request'    => $report_request,
      'news'              => $news,
      'status_process'    => $status_process,
      'status_finish'     => $status_finish,
      'status_request'    => $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status JOIN client ON request_bundling.id_client = client.id_client WHERE status.status = 'request' AND client.id_location = $id_location")->num_rows(),
      'status_cancel'     => $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status JOIN client ON request_bundling.id_client = client.id_client WHERE status.status = 'cancel' AND client.id_location = $id_location")->num_rows(),
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/index');
    $this->load->view('templates/footer');
  }
}
