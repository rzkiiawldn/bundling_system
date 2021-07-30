<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function request_bundling($id_request_bundling)
    {
        $this->load->library('dompdf_gen');
        $data = [
            'judul'             => 'Request Bundling Report',
            'gambar'            => FCPATH . 'assets/logo.jpeg',
            'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'request_bundling'        => $this->db->query("SELECT request_bundling.created_by AS created, request_bundling.*, item_bundling.*, status.*, client.*, 
            stock_allocation.*, location.*, user.*  FROM request_bundling LEFT JOIN item_bundling ON request_bundling.id_item_bundling = 
            item_bundling.id_item_bundling LEFT JOIN status ON request_bundling.id_status = status.id_status LEFT JOIN client ON request_bundling.id_client = 
            client.id_client LEFT JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation JOIN location ON 
            client.id_location = location.id_location JOIN user ON client.user_id = user.id_user WHERE id_request_bundling = 
            $id_request_bundling")->row_array(),

        ];

        $this->load->view('print/request_bundling', $data);

        $paper_size         = 'A4';
        $orientation        = 'landscape';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        
    }

    public function news_bundling($id)
    {
        $this->load->library('dompdf_gen');
        $data = [
            'judul'             => 'News Bundling Report',
            'gambar'            => FCPATH . 'assets/logo.jpeg',
            'approved'            => FCPATH . 'assets/approved.png',
            'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
            'news'              =>  $this->db->query("SELECT * FROM news JOIN client ON news.id_client = client.id_client WHERE id_news = $id")->row_array()
        ];

        $this->load->view('print/news_bundling', $data);

        $paper_size         = 'A4';
        $orientation        = 'potrait';
        $html               = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        ob_end_clean();
        $this->dompdf->stream("laporan.pdf", array('Attachment' => 0));
        
    }
}
