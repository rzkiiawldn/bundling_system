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

  public function index($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;

    if ($id2 != null) {
      $item_nonbundling = $this->db->query("SELECT * FROM item_nonbundling JOIN client ON item_nonbundling.id_client = client.id_client WHERE client.id_location = $id1 AND item_nonbundling.id_client = $id2 ")->num_rows();
      $item_bundling    = $this->db->query("SELECT * FROM item_bundling JOIN client ON item_bundling.id_client = client.id_client WHERE client.id_location = $id1 AND item_bundling.id_client = $id2 ")->num_rows();
      $request_bundling = $this->db->query("SELECT * FROM request_bundling JOIN client ON request_bundling.id_client = client.id_client WHERE client.id_location = $id1 AND request_bundling.id_client = $id2 ")->num_rows();
      $status_process   = $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status JOIN client ON request_bundling.id_client = client.id_client WHERE client.id_location = $id1 AND status.status = 'process' OR status.status = 'request' AND client.id_location = $id1 AND request_bundling.id_client = $id2")->num_rows();
      $status_finish    = $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status JOIN client ON request_bundling.id_client = client.id_client WHERE client.id_location = $id1 AND status.status = 'finish' OR status.status = 'success' AND client.id_location = $id1 AND request_bundling.id_client = $id2")->num_rows();
      $status_cancel    = $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status JOIN client ON request_bundling.id_client = client.id_client WHERE client.id_location = $id1 AND status.status = 'cancel' AND client.id_location = $id1 AND request_bundling.id_client = $id2")->num_rows();
    } elseif ($id1 != null and $id2 == null) {
      $item_nonbundling = $this->db->query("SELECT * FROM item_nonbundling JOIN client ON item_nonbundling.id_client = client.id_client WHERE client.id_location = $id1 ")->num_rows();
      $item_bundling    = $this->db->query("SELECT * FROM item_bundling JOIN client ON item_bundling.id_client = client.id_client WHERE client.id_location = $id1 ")->num_rows();
      $request_bundling = $this->db->query("SELECT * FROM request_bundling JOIN client ON request_bundling.id_client = client.id_client WHERE client.id_location = $id1 ")->num_rows();
      $status_process   = $this->db->query(" SELECT * FROM request_bundling JOIN client ON request_bundling.id_client = client.id_client JOIN status ON request_bundling.id_status = status.id_status WHERE status.status = 'process' OR status.status = 'request' AND client.id_location = $id1")->num_rows();
      $status_finish    = $this->db->query(" SELECT * FROM request_bundling JOIN client ON request_bundling.id_client = client.id_client JOIN status ON request_bundling.id_status = status.id_status WHERE status.status = 'finish' OR status.status = 'success' AND client.id_location = $id1")->num_rows();
      $status_cancel    = $this->db->query(" SELECT * FROM request_bundling JOIN client ON request_bundling.id_client = client.id_client JOIN status ON request_bundling.id_status = status.id_status WHERE status.status = 'cancel' AND client.id_location = $id1")->num_rows();
    } else {
      $item_nonbundling = $this->db->query("SELECT * FROM item_nonbundling")->num_rows();
      $item_bundling    = $this->db->query("SELECT * FROM item_bundling")->num_rows();
      $request_bundling = $this->db->query("SELECT * FROM request_bundling")->num_rows();
      $status_process   = $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status WHERE status.status = 'process' OR status.status = 'request'")->num_rows();
      $status_finish    = $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status WHERE status.status = 'finish' OR status.status = 'success'")->num_rows();
      $status_cancel    = $this->db->query(" SELECT * FROM request_bundling JOIN status ON request_bundling.id_status = status.id_status WHERE status.status = 'cancel'")->num_rows();
    }

    $data = [
      'judul'     => 'dashboard',
      'nama_menu' => 'dashboard',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_nonbundling'  => $item_nonbundling,
      'item_bundling'     => $item_bundling,
      'request_bundling'  => $request_bundling,
      'status_request'    => $status_process,
      'status_cancel'     => $status_cancel,
      'status_finish'     => $status_finish,
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar');
    $this->load->view('templates/admin_store_sidebar');
    $this->load->view('admin_store/index');
    $this->load->view('templates/footer');
  }
}
