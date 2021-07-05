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

    public function index($id_client = null, $id_location = null)
    {
        $id1 = $id_client;
        $id2 = $id_location;

        if ($id1 != null and empty($id2)) {
            $item = $this->db->query("SELECT * FROM item_nonbundling WHERE id_client = $id1")->result_array();
        } elseif ($id2 != null) {
            $item = $this->db->query("SELECT * FROM item_nonbundling WHERE id_client = $id1 AND id_location = $id2")->result_array();
        } else {
            $item = $this->db->get('item_nonbundling')->result_array();
        }

        $data = [
            'judul'     => 'dashboard',
            'nama_menu' => 'dashboard',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'item'      => $item
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/index');
        $this->load->view('templates/footer');
    }

    function get_sub_category()
    {
        $category_id = $this->input->post('id', TRUE);
        $data = $this->product_model->get_sub_category($category_id)->result();
        echo json_encode($data);
    }
}
