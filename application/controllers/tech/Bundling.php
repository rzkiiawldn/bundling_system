<?php

class Bundling extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  // ITEM BUNDLING

  public function item_bundling($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;

    if ($id1 != null and empty($id2)) {
      $item = $this->db->query("SELECT * FROM item_bundling WHERE id_location = $id1")->result_array();
    } elseif ($id2 != null) {
      $item = $this->db->query("SELECT * FROM item_bundling WHERE id_client = $id2 AND id_location = $id1")->result_array();
    } else {
      $item = $this->db->get('item_bundling')->result_array();
    }

    $data = [
      'judul'             => 'Item Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_bundling'     => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/item_bundling');
    $this->load->view('templates/footer');
  }

  // JIKA TIDAK ADA LOKASI DAN CLIENT

  public function ib_detail($id_item_bundling)
  {
    $data = [
      'judul'           => 'Detail Item Bundling',
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_bundling'   => $this->db->query("SELECT * FROM item_bundling WHERE item_bundling.id_item_bundling = $id_item_bundling ")->row_array(),
      'item_bundling_detail' => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $id_item_bundling ")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/item_bundling_detail');
    $this->load->view('templates/footer');
  }

  // JIKA ADA LOKASI DAN CLIENT

  public function ib_detailll($id_location = null, $id_client = null,  $id_item_bundling)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'           => 'Detail Item Bundling',
      'id_location'     => $id1,
      'id_client'       => $id2,
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_bundling'   => $this->db->query("SELECT * FROM item_bundling WHERE item_bundling.id_item_bundling = $id_item_bundling ")->row_array(),
      'item_bundling_detail' => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $id_item_bundling ")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/item_bundling_detail');
    $this->load->view('templates/footer');
  }

  // JIKA HANYA ADA LOKASI

  public function ib_detaill($id_location = null,  $id_item_bundling)
  {
    $id1 = $id_location;
    $data = [
      'judul'           => 'Detail Item Bundling',
      'id_location'     => $id1,
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_bundling'   => $this->db->query("SELECT * FROM item_bundling WHERE item_bundling.id_item_bundling = $id_item_bundling ")->row_array(),
      'item_bundling_detail' => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $id_item_bundling ")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/item_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function ib_create($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'             => 'Create Item Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'id_location'       => $id1,
      'id_client'         => $id2,
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'select'            => ['Yes', 'No']
    ];
    $this->form_validation->set_rules('item_bundling_code', 'item_bundling_code', 'required|trim');
    $this->form_validation->set_rules('item_bundling_name', 'item_bundling_name', 'required|trim');
    $this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/bundling/item_bundling_create');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'item_bundling_code'       => htmlspecialchars($this->input->post('item_bundling_code')),
        'item_bundling_name'       => htmlspecialchars($this->input->post('item_bundling_name')),
        'item_bundling_barcode'    => htmlspecialchars($this->input->post('item_bundling_barcode')),
        'manage_by'                => htmlspecialchars($this->input->post('manage_by')),
        'qty'                      => 0,
        'total_price'              => 0,
        'id_client'                => htmlspecialchars($this->input->post('id_client')),
        'id_location'              => htmlspecialchars($this->input->post('id_location')),
        'created_date'             => date('Y-m-d'),
        'created_by'               => $this->session->userdata('fullname'),
      ];
      $this->db->insert('item_bundling', $data);

      if (!empty($this->uri->segment(5))) {
        $id_item_bundling = $this->db->insert_id();
        redirect('tech/bundling/detail_information/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) {
        $id_item_bundling = $this->db->insert_id();
        redirect('tech/bundling/detail_informationnn/' . $this->uri->segment(4) . '/' . $id_item_bundling);
      } else {
        $id_item_bundling = $this->db->insert_id();
        redirect('tech/bundling/detail_informationn/' . $id_item_bundling);
      }
    }
  }

  // JIKA TIDAK ADA LOKASI DAN CLINET
  public function detail_informationn($id_item_bundling)
  {
    $data = [
      'judul'             => 'Detail Information',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'item_bundling'     => $this->db->query("SELECT * FROM item_bundling WHERE id_item_bundling = $id_item_bundling")->row(),
      'item_bundling_detail'     => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS id ON ibd.id_item_bundling = id.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling  WHERE ibd.id_item_bundling = $id_item_bundling")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/item_bundling_detail_information');
    $this->load->view('templates/footer');
  }

  // JIKA HANYA ADA LOKASI
  public function detail_informationnn($id_location = null,  $id_item_bundling)
  {
    $id1 = $id_location;
    $data = [
      'judul'             => 'Detail Information',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'id_client'         => $id1,
      'item_bundling'     => $this->db->query("SELECT * FROM item_bundling WHERE id_item_bundling = $id_item_bundling")->row(),
      'item_bundling_detail'     => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS id ON ibd.id_item_bundling = id.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling  WHERE ibd.id_item_bundling = $id_item_bundling")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/item_bundling_detail_information');
    $this->load->view('templates/footer');
  }

  // JIKA ADA LOKASI DAN CLIENT
  public function detail_information($id_location = null, $id_client = null,  $id_item_bundling)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'             => 'Detail Information',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'id_client'         => $id1,
      'id_location'       => $id2,
      'item_bundling'     => $this->db->query("SELECT * FROM item_bundling WHERE id_item_bundling = $id_item_bundling")->row(),
      'item_bundling_detail'     => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS id ON ibd.id_item_bundling = id.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling  WHERE ibd.id_item_bundling = $id_item_bundling")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/item_bundling_detail_information');
    $this->load->view('templates/footer');
  }

  public function add_item($id_location = null, $id_client = null)
  {
    $id_item_bundling        = $this->input->post('id_item_bundling');
    $id_item_nonbundling     = $this->input->post('id_item_nonbundling');
    $item_qty                = $this->input->post('item_qty');

    $cek = $this->db->query("SELECT * FROM item_bundling_detail WHERE id_item_bundling = $id_item_bundling AND id_item_nonbundling = $id_item_nonbundling");

    if ($cek->num_rows() > 0) {
      // echo "<script> 
      // alert('item tidak boleh sama, silahkan pilih item lainnya');
      // </script>";

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">item tidak boleh sama, silahkan pilih item lainnya</div>');
      if (!empty($this->uri->segment(5))) {
        redirect('tech/bundling/detail_information/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) {
        redirect('tech/bundling/detail_informationnn/' . $this->uri->segment(4) . '/' . $id_item_bundling);
      } else {
        redirect('tech/bundling/detail_informationn/' . $id_item_bundling);
      }
    } else {

      // mengambil satu baris data item non bundling
      $item_nonbundling = $this->db->get_where("item_nonbundling", ['id_item_nonbundling' => $id_item_nonbundling])->row();

      $price = $item_qty * $item_nonbundling->publish_price;
      // mengambil satu baris data item bundling
      $item_bundling    = $this->db->get_where("item_bundling", ['id_item_bundling' => $id_item_bundling])->row();

      $data = [
        'id_item_bundling'      => $id_item_bundling,
        'id_item_nonbundling'   => $id_item_nonbundling,
        'item_qty'              => $item_qty,
        'price'                 => $price
      ];

      $this->db->insert('item_bundling_detail', $data);

      $qty = $item_bundling->qty + $item_qty;
      $total_price = $item_bundling->total_price + $price;
      // update tabel item bundling
      $this->db->set('qty', $qty);
      $this->db->set('total_price', $total_price);
      $this->db->where('id_item_bundling', $id_item_bundling);
      $this->db->update('item_bundling');

      if (!empty($this->uri->segment(5))) {
        redirect('tech/bundling/detail_information/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) {
        redirect('tech/bundling/detail_informationnn/' . $this->uri->segment(4) . '/' . $id_item_bundling);
      } else {
        redirect('tech/bundling/detail_informationn/' . $id_item_bundling);
      }
    }
  }

  public function add_edit_item($id_location = null, $id_client = null)
  {
    $id_item_bundling        = $this->input->post('id_item_bundling');
    $id_item_nonbundling     = $this->input->post('id_item_nonbundling');
    $item_qty                = $this->input->post('item_qty');

    $cek = $this->db->query("SELECT * FROM item_bundling_detail WHERE id_item_bundling = $id_item_bundling AND id_item_nonbundling = $id_item_nonbundling");

    if ($cek->num_rows() > 0) {
      // echo "<script> 
      // alert('item tidak boleh sama, silahkan pilih item lainnya');
      // </script>";

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">item tidak boleh sama, silahkan pilih item lainnya</div>');
      if (!empty($this->uri->segment(5))) {
        redirect('tech/bundling/ib_edittt/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) {
        redirect('tech/bundling/ib_editt/' . $this->uri->segment(4) . '/' . $id_item_bundling);
      } else {
        redirect('tech/bundling/ib_edit/' . $id_item_bundling);
      }
    } else {

      // mengambil satu baris data item non bundling
      $item_nonbundling = $this->db->get_where("item_nonbundling", ['id_item_nonbundling' => $id_item_nonbundling])->row();

      $price = $item_qty * $item_nonbundling->publish_price;
      // mengambil satu baris data item bundling
      $item_bundling    = $this->db->get_where("item_bundling", ['id_item_bundling' => $id_item_bundling])->row();

      $data = [
        'id_item_bundling'      => $id_item_bundling,
        'id_item_nonbundling'   => $id_item_nonbundling,
        'item_qty'              => $item_qty,
        'price'                 => $price
      ];

      $this->db->insert('item_bundling_detail', $data);

      $qty = $item_bundling->qty + $item_qty;
      $total_price = $item_bundling->total_price + $price;
      // update tabel item bundling
      $this->db->set('qty', $qty);
      $this->db->set('total_price', $total_price);
      $this->db->where('id_item_bundling', $id_item_bundling);
      $this->db->update('item_bundling');

      if (!empty($this->uri->segment(5))) {
        redirect('tech/bundling/ib_edittt/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
      } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) {
        redirect('tech/bundling/ib_editt/' . $this->uri->segment(4) . '/' . $id_item_bundling);
      } else {
        redirect('tech/bundling/ib_edit/' . $id_item_bundling);
      }
    }
  }

  // JIKA TIDAK ADA LOKASI DAN CLINET
  public function ib_edit($id_item_bundling)
  {
    $data = [
      'judul'             => 'Edit Item Bundling',
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'item_bundling'     => $this->db->get_where('item_bundling', ['id_item_bundling' => $id_item_bundling])->row_array(),
      'item_bundling_detail'     => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS id ON ibd.id_item_bundling = id.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling  WHERE ibd.id_item_bundling = $id_item_bundling")->result_array()
    ];
    $this->form_validation->set_rules('item_bundling_code', 'item_bundling_code', 'required|trim');
    $this->form_validation->set_rules('item_bundling_name', 'item_bundling_name', 'required|trim');
    $this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/bundling/item_bundling_edit');
      $this->load->view('templates/footer');
    } else {
      $id_item_bundling            = htmlspecialchars($this->input->post('id_item_bundling'));
      $item_bundling_code          = htmlspecialchars($this->input->post('item_bundling_code'));
      $item_bundling_name          = htmlspecialchars($this->input->post('item_bundling_name'));
      $item_bundling_barcode       = htmlspecialchars($this->input->post('item_bundling_barcode'));
      $manage_by                   = htmlspecialchars($this->input->post('manage_by'));
      $id_location                 = htmlspecialchars($this->input->post('id_location'));
      $id_client                   = htmlspecialchars($this->input->post('id_client'));

      $this->db->set('item_bundling_code', $item_bundling_code);
      $this->db->set('item_bundling_name', $item_bundling_name);
      $this->db->set('item_bundling_barcode', $item_bundling_barcode);
      $this->db->set('manage_by', $manage_by);
      $this->db->set('id_location', $id_location);
      $this->db->set('id_client', $id_client);
      $this->db->where('id_item_bundling', $id_item_bundling);
      $this->db->update('item_bundling');
      redirect('tech/bundling/ib_edit/' . $id_item_bundling);
    }
  }

  // JIKA HANYA ADA LOKASI
  public function ib_editt($id_location = null,  $id_item_bundling)
  {
    $id1 = $id_location;
    $data = [
      'judul'             => 'Edit Item Bundling',
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'item_bundling'     => $this->db->get_where('item_bundling', ['id_item_bundling' => $id_item_bundling])->row_array(),
      'id_client'         => $id1,
      'item_bundling_detail'     => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS id ON ibd.id_item_bundling = id.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling  WHERE ibd.id_item_bundling = $id_item_bundling")->result_array()
    ];
    $this->form_validation->set_rules('item_bundling_code', 'item_bundling_code', 'required|trim');
    $this->form_validation->set_rules('item_bundling_name', 'item_bundling_name', 'required|trim');
    $this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/bundling/item_bundling_edit');
      $this->load->view('templates/footer');
    } else {
      $id_item_bundling            = htmlspecialchars($this->input->post('id_item_bundling'));
      $item_bundling_code          = htmlspecialchars($this->input->post('item_bundling_code'));
      $item_bundling_name          = htmlspecialchars($this->input->post('item_bundling_name'));
      $item_bundling_barcode       = htmlspecialchars($this->input->post('item_bundling_barcode'));
      $manage_by                   = htmlspecialchars($this->input->post('manage_by'));
      $id_location                 = htmlspecialchars($this->input->post('id_location'));
      $id_client                   = htmlspecialchars($this->input->post('id_client'));

      $this->db->set('item_bundling_code', $item_bundling_code);
      $this->db->set('item_bundling_name', $item_bundling_name);
      $this->db->set('item_bundling_barcode', $item_bundling_barcode);
      $this->db->set('manage_by', $manage_by);
      $this->db->set('id_location', $id_location);
      $this->db->set('id_client', $id_client);
      $this->db->where('id_item_bundling', $id_item_bundling);
      $this->db->update('item_bundling');
      redirect('tech/bundling/ib_editt/' . $this->uri->segment(4) . '/' . $id_item_bundling);
    }
  }

  // JIKA ADA LOKASI DAN CLIENT
  public function ib_edittt($id_location = null, $id_client = null,  $id_item_bundling)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'             => 'Edit Item Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_nonbundling'  => $this->db->get('item_nonbundling')->result_array(),
      'item_bundling'     => $this->db->get_where('item_bundling', ['id_item_bundling' => $id_item_bundling])->row_array(),
      'id_client'         => $id1,
      'id_location'       => $id2,
      'item_bundling_detail'     => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS id ON ibd.id_item_bundling = id.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling  WHERE ibd.id_item_bundling = $id_item_bundling")->result_array()
    ];
    $this->form_validation->set_rules('item_bundling_code', 'item_bundling_code', 'required|trim');
    $this->form_validation->set_rules('item_bundling_name', 'item_bundling_name', 'required|trim');
    $this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/bundling/item_bundling_edit');
      $this->load->view('templates/footer');
    } else {
      $id_item_bundling            = htmlspecialchars($this->input->post('id_item_bundling'));
      $item_bundling_code          = htmlspecialchars($this->input->post('item_bundling_code'));
      $item_bundling_name          = htmlspecialchars($this->input->post('item_bundling_name'));
      $item_bundling_barcode       = htmlspecialchars($this->input->post('item_bundling_barcode'));
      $manage_by                   = htmlspecialchars($this->input->post('manage_by'));

      $this->db->set('item_bundling_code', $item_bundling_code);
      $this->db->set('item_bundling_name', $item_bundling_name);
      $this->db->set('item_bundling_barcode', $item_bundling_barcode);
      $this->db->set('manage_by', $manage_by);
      $this->db->where('id_item_bundling', $id_item_bundling);
      $this->db->update('item_bundling');
      redirect('tech/bundling/ib_edittt/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
    }
  }


  // JIKA TIDAK ADA LOKASI DAN CLIENT

  public function ib_delete($id_item_bundling)
  {
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling');

    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling_detail');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');

    redirect('tech/bundling/item_bundling');
  }

  // JIKA TIDAK ADA LOKASI DAN CLIENT

  public function ib_deletee($id_location = null, $id_item_bundling)
  {
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling');

    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling_detail');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');

    redirect('tech/bundling/item_bundling/' . $this->uri->segment(4));
  }

  // JIKA TIDAK ADA LOKASI DAN CLIENT

  public function ib_deleteee($id_location = null, $id_client = null, $id_item_bundling)
  {
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling');

    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->delete('item_bundling_detail');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('tech/bundling/item_bundling/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
  }

  // UTK EDIT
  public function delete_item_satuan($id_location = null, $id_client = null)
  {
    $id_item_bundling         = $this->input->post('id_item_bundling');
    $id_item_bundling_detail  = $this->input->post('id_item_bundling_detail');
    $item_qty                 = $this->input->post('item_qty');
    $price                    = $this->input->post('price');
    $this->db->where('id_item_bundling_detail', $id_item_bundling_detail);
    $this->db->delete('item_bundling_detail');


    $item_bundling = $this->db->query("SELECT * FROM item_bundling WHERE id_item_bundling = $id_item_bundling")->row();
    $this->db->set('qty', $item_bundling->qty - $item_qty);
    $this->db->set('total_price', $item_bundling->total_price - $price);
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->update('item_bundling');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');

    if (!empty($this->uri->segment(6))) {
      redirect('tech/bundling/ib_edittt/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
    } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) {
      redirect('tech/bundling/ib_editt/' . $this->uri->segment(4) . '/' . $id_item_bundling);
    } else {
      redirect('tech/bundling/ib_edit/' . $id_item_bundling);
    }
  }

  // UTK ADD
  public function delete_item_satuann($id_location = null, $id_client = null)
  {
    $id_item_bundling         = $this->input->post('id_item_bundling');
    $id_item_bundling_detail  = $this->input->post('id_item_bundling_detail');
    $item_qty                 = $this->input->post('item_qty');
    $price                    = $this->input->post('price');
    $this->db->where('id_item_bundling_detail', $id_item_bundling_detail);
    $this->db->delete('item_bundling_detail');


    $item_bundling = $this->db->query("SELECT * FROM item_bundling WHERE id_item_bundling = $id_item_bundling")->row();
    $this->db->set('qty', $item_bundling->qty - $item_qty);
    $this->db->set('total_price', $item_bundling->total_price - $price);
    $this->db->where('id_item_bundling', $id_item_bundling);
    $this->db->update('item_bundling');

    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');

    if (!empty($this->uri->segment(6))) {
      redirect('tech/bundling/detail_information/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $id_item_bundling);
    } elseif (empty($this->uri->segment(6)) and !empty($this->uri->segment(5))) {
      redirect('tech/bundling/detail_informationnn/' . $this->uri->segment(4) . '/' . $id_item_bundling);
    } else {
      redirect('tech/bundling/detail_informationn/' . $id_item_bundling);
    }
  }



  // REQUEST BUNDLING

  public function request_bundling($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;

    if ($id1 != null and empty($id2)) {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE rb.id_location = $id1")->result_array();
    } elseif ($id2 != null) {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE rb.id_client = $id2 AND rb.id_location = $id1")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status")->result_array();
    }

    $user    = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data = [
      'judul'             => 'Request Bundling',
      'user'              => $user,
      'request_bundling'  => $item,
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/request_bundling');
    $this->load->view('templates/footer');
  }

  // JIKA TIDA ADA LOKASI DAN CLIENT
  public function rb_detail($id_request_bundling)
  {
    $data = [
      'judul'             => 'Detail Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE id_request_bundling = $id_request_bundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  // JIKA HANYA ADA LOKASI 
  public function rb_detaill($id_location = null, $id_request_bundling)
  {
    $id1 = $id_location;
    $data = [
      'judul'             => 'Detail Request Bundling',
      'nama_menu'         => 'bundling',
      'id_location'       => $id1,
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE id_request_bundling = $id_request_bundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  // JIKA ADA LOKASI DAN CLIENT
  public function rb_detailll($id_location = null, $id_client = null, $id_request_bundling)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'             => 'Detail Request Bundling',
      'nama_menu'         => 'bundling',
      'id_client'         => $id2,
      'id_location'       => $id1,
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE id_request_bundling = $id_request_bundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/bundling/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function rb_create($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'             => 'Create Request Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => ['PLASTIC', 'BOX', 'BUBBLE WRAP', 'TOTEBAG', "WRAPPING"],
      'status'            => $this->db->get('status')->result_array(),
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
      'id_location'       => $id1,
      'id_client'         => $id2,
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
    ];
    $this->form_validation->set_rules('request_bundling_code', 'request_bundling_code', 'required|trim');
    $this->form_validation->set_rules('bundling_type', 'bundling_type', 'required|trim');
    $this->form_validation->set_rules('id_item_bundling', 'id item bundling', 'required|trim');
    $this->form_validation->set_rules('request_quantity', 'request_quantity', 'required|trim');
    $this->form_validation->set_rules('packing_type', 'packing_type', 'required|trim');
    $this->form_validation->set_rules('id_status', 'id_status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/bundling/request_bundling_create');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'request_bundling_barcode'    => htmlspecialchars($this->input->post('request_bundling_barcode')),
        'request_bundling_code'       => htmlspecialchars($this->input->post('request_bundling_code')),
        'bundling_type'               => htmlspecialchars($this->input->post('bundling_type')),
        'id_item_bundling'            => htmlspecialchars($this->input->post('id_item_bundling')),
        'request_quantity'            => htmlspecialchars($this->input->post('request_quantity')),
        'packing_type'                => $this->input->post('packing_type'),
        'id_status'                   => $this->input->post('id_status'),
        'id_user'                     => $data['user']['fullname'],
        'id_client'                   => $this->input->post('id_client'),
        'id_location'                 => $this->input->post('id_location'),
      ];
      $this->db->insert('request_bundling', $data);

      if (!empty($this->uri->segment(5))) {
        redirect('tech/bundling/request_bundling/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
      } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) {
        redirect('tech/bundling/request_bundling/' . $this->uri->segment(4));
      } else {
        redirect('tech/bundling/request_bundling');
      }
    }
  }

  // JIKA TIDAK ADA LOKASI DAN CLIENT
  public function rb_edit($id_request_bundling)
  {
    $data = [
      'judul'             => 'Edit Request Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => ['PLASTIC', 'BOX', 'BUBBLE WRAP', 'TOTEBAG', "WRAPPING"],
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
      'status'            => $this->db->get('status')->result_array(),
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'request_bundling'  => $this->db->get_where('request_bundling', ['id_request_bundling' => $id_request_bundling])->row_array(),
    ];
    $this->form_validation->set_rules('request_bundling_code', 'request_bundling_code', 'required|trim');
    $this->form_validation->set_rules('bundling_type', 'bundling_type', 'required|trim');
    $this->form_validation->set_rules('request_quantity', 'request_quantity', 'required|trim');
    $this->form_validation->set_rules('id_item_bundling', 'id item bundling', 'required|trim');
    $this->form_validation->set_rules('packing_type', 'packing_type', 'required|trim');
    $this->form_validation->set_rules('id_status', 'id_status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/bundling/request_bundling_edit');
      $this->load->view('templates/footer');
    } else {
      $id_request_bundling        = htmlspecialchars($this->input->post('id_request_bundling'));
      $request_bundling_code      = htmlspecialchars($this->input->post('request_bundling_code'));
      $request_bundling_barcode   = htmlspecialchars($this->input->post('request_bundling_barcode'));
      $bundling_type              = htmlspecialchars($this->input->post('bundling_type'));
      $id_item_bundling           = htmlspecialchars($this->input->post('id_item_bundling'));
      $request_quantity           = htmlspecialchars($this->input->post('request_quantity'));
      $packing_type               = htmlspecialchars($this->input->post('packing_type'));
      $id_status                  = htmlspecialchars($this->input->post('id_status'));
      $id_location                = htmlspecialchars($this->input->post('id_location'));
      $id_client                  = htmlspecialchars($this->input->post('id_client'));

      $this->db->set('request_bundling_barcode', $request_bundling_barcode);
      $this->db->set('request_bundling_code', $request_bundling_code);
      $this->db->set('bundling_type', $bundling_type);
      $this->db->set('id_item_bundling', $id_item_bundling);
      $this->db->set('request_quantity', $request_quantity);
      $this->db->set('packing_type', $packing_type);
      $this->db->set('id_status', $id_status);
      $this->db->set('id_location', $id_location);
      $this->db->set('id_client', $id_client);
      $this->db->where('id_request_bundling', $id_request_bundling);
      $this->db->update('request_bundling');

      redirect('tech/bundling/request_bundling');
    }
  }

  // JIKA HANYA ADA LOKASI
  public function rb_editt($id_location = null, $id_request_bundling)
  {
    $id1 = $id_location;
    $data = [
      'judul'             => 'Edit Request Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => ['PLASTIC', 'BOX', 'BUBBLE WRAP', 'TOTEBAG', "WRAPPING"],
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
      'status'            => $this->db->get('status')->result_array(),
      'client'            => $this->db->get('client')->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'id_location'       => $id1,
      'request_bundling'  => $this->db->get_where('request_bundling', ['id_request_bundling' => $id_request_bundling])->row_array(),
    ];
    $this->form_validation->set_rules('request_bundling_code', 'request_bundling_code', 'required|trim');
    $this->form_validation->set_rules('bundling_type', 'bundling_type', 'required|trim');
    $this->form_validation->set_rules('request_quantity', 'request_quantity', 'required|trim');
    $this->form_validation->set_rules('id_item_bundling', 'id item bundling', 'required|trim');
    $this->form_validation->set_rules('packing_type', 'packing_type', 'required|trim');
    $this->form_validation->set_rules('id_status', 'id_status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/bundling/request_bundling_edit');
      $this->load->view('templates/footer');
    } else {
      $id_request_bundling        = htmlspecialchars($this->input->post('id_request_bundling'));
      $request_bundling_code      = htmlspecialchars($this->input->post('request_bundling_code'));
      $request_bundling_barcode   = htmlspecialchars($this->input->post('request_bundling_barcode'));
      $bundling_type              = htmlspecialchars($this->input->post('bundling_type'));
      $id_item_bundling           = htmlspecialchars($this->input->post('id_item_bundling'));
      $request_quantity           = htmlspecialchars($this->input->post('request_quantity'));
      $packing_type               = htmlspecialchars($this->input->post('packing_type'));
      $id_status                  = htmlspecialchars($this->input->post('id_status'));
      $id_location                = htmlspecialchars($this->input->post('id_location'));
      $id_client                  = htmlspecialchars($this->input->post('id_client'));

      $this->db->set('request_bundling_barcode', $request_bundling_barcode);
      $this->db->set('request_bundling_code', $request_bundling_code);
      $this->db->set('bundling_type', $bundling_type);
      $this->db->set('id_item_bundling', $id_item_bundling);
      $this->db->set('request_quantity', $request_quantity);
      $this->db->set('packing_type', $packing_type);
      $this->db->set('id_status', $id_status);
      $this->db->set('id_location', $id_location);
      $this->db->set('id_client', $id_client);
      $this->db->where('id_request_bundling', $id_request_bundling);
      $this->db->update('request_bundling');

      redirect('tech/bundling/request_bundling/' . $this->uri->segment(4));
    }
  }

  // JIKA ADA LOKASI DAN CLIENT
  public function rb_edittt($id_location = null, $id_client = null, $id_request_bundling)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'             => 'Edit Request Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => ['PLASTIC', 'BOX', 'BUBBLE WRAP', 'TOTEBAG', "WRAPPING"],
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
      'status'            => $this->db->get('status')->result_array(),
      'id_location'       => $id1,
      'id_client'         => $id2,
      'request_bundling'  => $this->db->get_where('request_bundling', ['id_request_bundling' => $id_request_bundling])->row_array(),
    ];
    $this->form_validation->set_rules('request_bundling_code', 'request_bundling_code', 'required|trim');
    $this->form_validation->set_rules('bundling_type', 'bundling_type', 'required|trim');
    $this->form_validation->set_rules('request_quantity', 'request_quantity', 'required|trim');
    $this->form_validation->set_rules('id_item_bundling', 'id item bundling', 'required|trim');
    $this->form_validation->set_rules('packing_type', 'packing_type', 'required|trim');
    $this->form_validation->set_rules('id_status', 'id_status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/bundling/request_bundling_edit');
      $this->load->view('templates/footer');
    } else {
      $id_request_bundling        = htmlspecialchars($this->input->post('id_request_bundling'));
      $request_bundling_code      = htmlspecialchars($this->input->post('request_bundling_code'));
      $request_bundling_barcode   = htmlspecialchars($this->input->post('request_bundling_barcode'));
      $bundling_type              = htmlspecialchars($this->input->post('bundling_type'));
      $id_item_bundling           = htmlspecialchars($this->input->post('id_item_bundling'));
      $request_quantity           = htmlspecialchars($this->input->post('request_quantity'));
      $packing_type               = htmlspecialchars($this->input->post('packing_type'));
      $id_status                  = htmlspecialchars($this->input->post('id_status'));

      $this->db->set('request_bundling_barcode', $request_bundling_barcode);
      $this->db->set('request_bundling_code', $request_bundling_code);
      $this->db->set('bundling_type', $bundling_type);
      $this->db->set('id_item_bundling', $id_item_bundling);
      $this->db->set('request_quantity', $request_quantity);
      $this->db->set('packing_type', $packing_type);
      $this->db->set('id_status', $id_status);
      $this->db->where('id_request_bundling', $id_request_bundling);
      $this->db->update('request_bundling');

      redirect('tech/bundling/request_bundling/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    }
  }

  // JIKA TIDAK ADA LOKASI DAN CLIENT
  public function rb_delete($id_request_bundling)
  {
    $this->db->where('id_request_bundling', $id_request_bundling);
    $this->db->delete('request_bundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('tech/bundling/request_bundling');
  }

  // JIKA HANYA ADA LOKASI
  public function rb_deletee($id_location = null, $id_request_bundling)
  {
    $this->db->where('id_request_bundling', $id_request_bundling);
    $this->db->delete('request_bundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('tech/bundling/request_bundling/' . $this->uri->segment(4));
  }

  // JIKA ADA LOKASI DAN CLIENT
  public function rb_deleteee($id_location = null, $id_client = null, $id_request_bundling)
  {
    $this->db->where('id_request_bundling', $id_request_bundling);
    $this->db->delete('request_bundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('tech/bundling/request_bundling/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
  }
}
