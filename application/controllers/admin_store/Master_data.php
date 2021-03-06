<?php

class Master_data extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function item($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;

    if ($id1 != null and empty($id2)) {
      $item = $this->db->query("SELECT * FROM item_nonbundling AS inb JOIN client ON inb.id_client = client.id_client WHERE client.id_location = $id1")->result_array();
    } elseif ($id2 != null) {
      $item = $this->db->query("SELECT * FROM item_nonbundling AS inb JOIN client ON inb.id_client = client.id_client WHERE inb.id_client = $id2 AND client.id_location = $id1")->result_array();
    } else {
      $item = $this->db->get('item_nonbundling')->result_array();
    }

    $data = [
      'judul'             => 'Item',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_nonbundling'  => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_store_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_store/master_data/item');
    $this->load->view('templates/footer');
  }

  // JIKA TIDAK ADA LOKASI DAN CLIENT
  public function detail($id_item_nonbundling)
  {
    $data = [
      'judul'       => 'Detail Item',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_nonbundling'  => $this->db->query("SELECT * FROM item_nonbundling WHERE id_item_nonbundling = $id_item_nonbundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_store_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_store/master_data/item_detail');
    $this->load->view('templates/footer');
  }

  // JIKA HANYA ADA LOKASI
  public function detaill($id_location = null, $id_item_nonbundling)
  {
    $id1 = $id_location;
    $data = [
      'judul'       => 'Detail Item',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'id_location'   => $id1,
      'item_nonbundling'  => $this->db->query("SELECT * FROM item_nonbundling WHERE id_item_nonbundling = $id_item_nonbundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_store_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_store/master_data/item_detail');
    $this->load->view('templates/footer');
  }

  // JIKA ADA LOKASI DAN CLIENT
  public function detail_item($id_location = null, $id_client = null, $id_item_nonbundling)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'       => 'Detail Item',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'id_location' => $id1,
      'id_client'   => $id2,
      'item_nonbundling'  => $this->db->query("SELECT * FROM item_nonbundling WHERE id_item_nonbundling = $id_item_nonbundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_store_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_store/master_data/item_detail');
    $this->load->view('templates/footer');
  }

  public function create_item($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;

    $data = [
      'judul'       => 'Create Item',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'   => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'id_location' => $id1,
      'id_client'   => $id2,
      'location'    => $this->db->get('location')->result_array(),
      'select'      => ['Yes', 'No'],
      'size'        => ['S', 'M', 'L', 'XL', 'XXL'],
    ];
    $this->form_validation->set_rules('item_nonbundling_code', 'item_nonbundling_code', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_name', 'item_nonbundling_name', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_barcode', 'item_nonbundling_barcode', 'required|trim');
    $this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');
    $this->form_validation->set_rules('description', 'description', 'required|trim');
    $this->form_validation->set_rules('brand', 'brand', 'required|trim');
    $this->form_validation->set_rules('model', 'model', 'required|trim');
    $this->form_validation->set_rules('category', 'category', 'required|trim');
    $this->form_validation->set_rules('minimum_stock', 'minimum stock', 'required|trim');
    $this->form_validation->set_rules('publish_price', 'publish price', 'required|trim');


    $this->form_validation->set_rules('length', 'length', 'required|trim');
    $this->form_validation->set_rules('width', 'width', 'required|trim');
    $this->form_validation->set_rules('height', 'height', 'required|trim');
    $this->form_validation->set_rules('weight', 'weight', 'required|trim');
    $this->form_validation->set_rules('dimension', 'dimension', 'required|trim');
    $this->form_validation->set_rules('active', 'active', 'required|trim');
    $this->form_validation->set_rules('is_fragile', 'is_fragile', 'required|trim');
    $this->form_validation->set_rules('cool_storage', 'cool_storage', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/admin_store_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('admin_store/master_data/item_create');
      $this->load->view('templates/footer');
    } else {
      $data = [
        'item_nonbundling_code'       => htmlspecialchars($this->input->post('item_nonbundling_code')),
        'item_nonbundling_name'       => htmlspecialchars($this->input->post('item_nonbundling_name')),
        'item_nonbundling_barcode'    => htmlspecialchars($this->input->post('item_nonbundling_barcode')),
        'manage_by'                   => htmlspecialchars($this->input->post('manage_by')),
        'description'                 => $this->input->post('description'),
        'brand'                       => htmlspecialchars($this->input->post('brand')),
        'model'                       => htmlspecialchars($this->input->post('model')),
        'category'                    => htmlspecialchars($this->input->post('category')),
        'minimum_stock'               => htmlspecialchars($this->input->post('minimum_stock')),
        'publish_price'               => htmlspecialchars($this->input->post('publish_price')),
        'additional_expired'          => htmlspecialchars($this->input->post('additional_expired')),
        'size'                        => htmlspecialchars($this->input->post('size')),
        'length'                      => htmlspecialchars($this->input->post('length')),
        'width'                       => htmlspecialchars($this->input->post('width')),
        'height'                      => htmlspecialchars($this->input->post('height')),
        'weight'                      => htmlspecialchars($this->input->post('weight')),
        'dimension'                   => htmlspecialchars($this->input->post('dimension')),
        'is_fragile'                  => htmlspecialchars($this->input->post('is_fragile')),
        'active'                      => htmlspecialchars($this->input->post('active')),
        'cool_storage'                => htmlspecialchars($this->input->post('cool_storage')),
        'id_client'                   => htmlspecialchars($this->input->post('id_client')),
        'created_date'                => date('Y-m-d'),
        'created_by'                  => $this->session->userdata('fullname'),
      ];
      $this->db->insert('item_nonbundling', $data);

      if (!empty($this->uri->segment(5))) {
        redirect('admin_store/master_data/item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
      } elseif (empty($this->uri->segment(5)) and !empty($this->uri->segment(4))) {
        redirect('admin_store/master_data/item/' . $this->uri->segment(4));
      } else {
        redirect('admin_store/master_data/item');
      }
    }
  }


  // JIKA TIDAK ADA LOKASI DAN CLIENT

  public function edit($id_item_nonbundling)
  {
    $data = [
      'judul'             => 'Edit Item',
      'location'          => $this->db->get('location')->result_array(),
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_nonbundling'  => $this->db->get_where('item_nonbundling', ['id_item_nonbundling' => $id_item_nonbundling])->row_array(),
      'select'            => ['Yes', 'No'],
      'size'              => ['S', 'M', 'L', 'XL', 'XXL'],
    ];
    $this->form_validation->set_rules('item_nonbundling_code', 'item_nonbundling_code', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_name', 'item_nonbundling_name', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_barcode', 'item_nonbundling_barcode', 'required|trim');
    $this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');
    $this->form_validation->set_rules('description', 'description', 'required|trim');
    $this->form_validation->set_rules('brand', 'brand', 'required|trim');
    $this->form_validation->set_rules('model', 'model', 'required|trim');
    $this->form_validation->set_rules('category', 'category', 'required|trim');
    $this->form_validation->set_rules('minimum_stock', 'minimum stock', 'required|trim');
    $this->form_validation->set_rules('publish_price', 'publish price', 'required|trim');


    $this->form_validation->set_rules('length', 'length', 'required|trim');
    $this->form_validation->set_rules('width', 'width', 'required|trim');
    $this->form_validation->set_rules('height', 'height', 'required|trim');
    $this->form_validation->set_rules('weight', 'weight', 'required|trim');
    $this->form_validation->set_rules('dimension', 'dimension', 'required|trim');
    $this->form_validation->set_rules('active', 'active', 'required|trim');
    $this->form_validation->set_rules('is_fragile', 'is_fragile', 'required|trim');
    $this->form_validation->set_rules('cool_storage', 'cool_storage', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/admin_store_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('admin_store/master_data/item_edit');
      $this->load->view('templates/footer');
    } else {
      $id_item_nonbundling            = htmlspecialchars($this->input->post('id_item_nonbundling'));
      $item_nonbundling_code          = htmlspecialchars($this->input->post('item_nonbundling_code'));
      $item_nonbundling_name          = htmlspecialchars($this->input->post('item_nonbundling_name'));
      $item_nonbundling_barcode       = htmlspecialchars($this->input->post('item_nonbundling_barcode'));
      $manage_by                      = htmlspecialchars($this->input->post('manage_by'));
      $description                    = $this->input->post('description');
      $brand                          = htmlspecialchars($this->input->post('brand'));
      $model                          = htmlspecialchars($this->input->post('model'));
      $category                       = htmlspecialchars($this->input->post('category'));
      $minimum_stock                  = htmlspecialchars($this->input->post('minimum_stock'));
      $publish_price                  = htmlspecialchars($this->input->post('publish_price'));
      $additional_expired             = htmlspecialchars($this->input->post('additional_expired'));
      $size                           = htmlspecialchars($this->input->post('size'));
      $length                         = htmlspecialchars($this->input->post('length'));
      $width                          = htmlspecialchars($this->input->post('width'));
      $height                         = htmlspecialchars($this->input->post('height'));
      $weight                         = htmlspecialchars($this->input->post('weight'));
      $dimension                      = htmlspecialchars($this->input->post('dimension'));
      $is_fragile                     = htmlspecialchars($this->input->post('is_fragile'));
      $active                         = htmlspecialchars($this->input->post('active'));
      $cool_storage                   = htmlspecialchars($this->input->post('cool_storage'));
      $id_client                      = htmlspecialchars($this->input->post('id_client'));

      $this->db->set('item_nonbundling_code', $item_nonbundling_code);
      $this->db->set('item_nonbundling_name', $item_nonbundling_name);
      $this->db->set('item_nonbundling_barcode', $item_nonbundling_barcode);
      $this->db->set('manage_by', $manage_by);
      $this->db->set('description', $description);
      $this->db->set('brand', $brand);
      $this->db->set('model', $model);
      $this->db->set('category', $category);
      $this->db->set('minimum_stock', $minimum_stock);
      $this->db->set('publish_price', $publish_price);
      $this->db->set('additional_expired', $additional_expired);
      $this->db->set('size', $size);
      $this->db->set('length', $length);
      $this->db->set('width', $width);
      $this->db->set('height', $height);
      $this->db->set('weight', $weight);
      $this->db->set('dimension', $dimension);
      $this->db->set('is_fragile', $is_fragile);
      $this->db->set('active', $active);
      $this->db->set('cool_storage', $cool_storage);
      $this->db->set('id_client', $id_client);
      $this->db->where('id_item_nonbundling', $id_item_nonbundling);
      $this->db->update('item_nonbundling');

      redirect('admin_store/master_data/item');
    }
  }

  // JIKA ADA LOKASI DAN CLIENT
  public function edit_item($id_location = null, $id_client = null, $id_item_nonbundling)
  {
    $id1 = $id_location;
    $id2 = $id_client;
    $data = [
      'judul'             => 'Edit Item',
      'nama_menu'         => 'master data',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'id_location'       => $id1,
      'id_client'         => $id2,
      'item_nonbundling'  => $this->db->get_where('item_nonbundling', ['id_item_nonbundling' => $id_item_nonbundling])->row_array(),
      'select'            => ['Yes', 'No'],
      'size'              => ['S', 'M', 'L', 'XL', 'XXL'],
    ];
    $this->form_validation->set_rules('item_nonbundling_code', 'item_nonbundling_code', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_name', 'item_nonbundling_name', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_barcode', 'item_nonbundling_barcode', 'required|trim');
    $this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');
    $this->form_validation->set_rules('description', 'description', 'required|trim');
    $this->form_validation->set_rules('brand', 'brand', 'required|trim');
    $this->form_validation->set_rules('model', 'model', 'required|trim');
    $this->form_validation->set_rules('category', 'category', 'required|trim');
    $this->form_validation->set_rules('minimum_stock', 'minimum stock', 'required|trim');
    $this->form_validation->set_rules('publish_price', 'publish price', 'required|trim');

    $this->form_validation->set_rules('length', 'length', 'required|trim');
    $this->form_validation->set_rules('width', 'width', 'required|trim');
    $this->form_validation->set_rules('height', 'height', 'required|trim');
    $this->form_validation->set_rules('weight', 'weight', 'required|trim');
    $this->form_validation->set_rules('dimension', 'dimension', 'required|trim');
    $this->form_validation->set_rules('active', 'active', 'required|trim');
    $this->form_validation->set_rules('is_fragile', 'is_fragile', 'required|trim');
    $this->form_validation->set_rules('cool_storage', 'cool_storage', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/admin_store_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('admin_store/master_data/item_edit');
      $this->load->view('templates/footer');
    } else {
      $id_item_nonbundling            = htmlspecialchars($this->input->post('id_item_nonbundling'));
      $item_nonbundling_code          = htmlspecialchars($this->input->post('item_nonbundling_code'));
      $item_nonbundling_name          = htmlspecialchars($this->input->post('item_nonbundling_name'));
      $item_nonbundling_barcode       = htmlspecialchars($this->input->post('item_nonbundling_barcode'));
      $manage_by                      = htmlspecialchars($this->input->post('manage_by'));
      $description                    = $this->input->post('description');
      $brand                          = htmlspecialchars($this->input->post('brand'));
      $model                          = htmlspecialchars($this->input->post('model'));
      $category                       = htmlspecialchars($this->input->post('category'));
      $minimum_stock                  = htmlspecialchars($this->input->post('minimum_stock'));
      $publish_price                  = htmlspecialchars($this->input->post('publish_price'));
      $additional_expired             = htmlspecialchars($this->input->post('additional_expired'));
      $size                           = htmlspecialchars($this->input->post('size'));
      $length                         = htmlspecialchars($this->input->post('length'));
      $width                          = htmlspecialchars($this->input->post('width'));
      $height                         = htmlspecialchars($this->input->post('height'));
      $weight                         = htmlspecialchars($this->input->post('weight'));
      $dimension                      = htmlspecialchars($this->input->post('dimension'));
      $is_fragile                     = htmlspecialchars($this->input->post('is_fragile'));
      $active                         = htmlspecialchars($this->input->post('active'));
      $cool_storage                   = htmlspecialchars($this->input->post('cool_storage'));

      $this->db->set('item_nonbundling_code', $item_nonbundling_code);
      $this->db->set('item_nonbundling_name', $item_nonbundling_name);
      $this->db->set('item_nonbundling_barcode', $item_nonbundling_barcode);
      $this->db->set('manage_by', $manage_by);
      $this->db->set('description', $description);
      $this->db->set('brand', $brand);
      $this->db->set('model', $model);
      $this->db->set('category', $category);
      $this->db->set('minimum_stock', $minimum_stock);
      $this->db->set('publish_price', $publish_price);
      $this->db->set('additional_expired', $additional_expired);
      $this->db->set('size', $size);
      $this->db->set('length', $length);
      $this->db->set('width', $width);
      $this->db->set('height', $height);
      $this->db->set('weight', $weight);
      $this->db->set('dimension', $dimension);
      $this->db->set('is_fragile', $is_fragile);
      $this->db->set('active', $active);
      $this->db->set('cool_storage', $cool_storage);
      $this->db->where('id_item_nonbundling', $id_item_nonbundling);
      $this->db->update('item_nonbundling');

      redirect('admin_store/master_data/item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    }
  }
  // JIKA ADA LOKASI DAN  TIDAK ADA CLIENT
  public function editt($id_location = null, $id_item_nonbundling)
  {
    $id1 = $id_location;
    $data = [
      'judul'             => 'Edit Item',
      'location'          => $this->db->get('location')->result_array(),
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'id_location'       => $id1,
      'item_nonbundling'  => $this->db->get_where('item_nonbundling', ['id_item_nonbundling' => $id_item_nonbundling])->row_array(),
      'select'            => ['Yes', 'No'],
      'size'              => ['S', 'M', 'L', 'XL', 'XXL'],
    ];
    $this->form_validation->set_rules('item_nonbundling_code', 'item_nonbundling_code', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_name', 'item_nonbundling_name', 'required|trim');
    $this->form_validation->set_rules('item_nonbundling_barcode', 'item_nonbundling_barcode', 'required|trim');
    $this->form_validation->set_rules('manage_by', 'manage by', 'required|trim');
    $this->form_validation->set_rules('description', 'description', 'required|trim');
    $this->form_validation->set_rules('brand', 'brand', 'required|trim');
    $this->form_validation->set_rules('model', 'model', 'required|trim');
    $this->form_validation->set_rules('category', 'category', 'required|trim');
    $this->form_validation->set_rules('minimum_stock', 'minimum stock', 'required|trim');
    $this->form_validation->set_rules('publish_price', 'publish price', 'required|trim');


    $this->form_validation->set_rules('length', 'length', 'required|trim');
    $this->form_validation->set_rules('width', 'width', 'required|trim');
    $this->form_validation->set_rules('height', 'height', 'required|trim');
    $this->form_validation->set_rules('weight', 'weight', 'required|trim');
    $this->form_validation->set_rules('dimension', 'dimension', 'required|trim');
    $this->form_validation->set_rules('active', 'active', 'required|trim');
    $this->form_validation->set_rules('is_fragile', 'is_fragile', 'required|trim');
    $this->form_validation->set_rules('cool_storage', 'cool_storage', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/admin_store_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('admin_store/master_data/item_edit');
      $this->load->view('templates/footer');
    } else {
      $id_item_nonbundling            = htmlspecialchars($this->input->post('id_item_nonbundling'));
      $item_nonbundling_code          = htmlspecialchars($this->input->post('item_nonbundling_code'));
      $item_nonbundling_name          = htmlspecialchars($this->input->post('item_nonbundling_name'));
      $item_nonbundling_barcode       = htmlspecialchars($this->input->post('item_nonbundling_barcode'));
      $manage_by                      = htmlspecialchars($this->input->post('manage_by'));
      $description                    = $this->input->post('description');
      $brand                          = htmlspecialchars($this->input->post('brand'));
      $model                          = htmlspecialchars($this->input->post('model'));
      $category                       = htmlspecialchars($this->input->post('category'));
      $minimum_stock                  = htmlspecialchars($this->input->post('minimum_stock'));
      $publish_price                  = htmlspecialchars($this->input->post('publish_price'));
      $additional_expired             = htmlspecialchars($this->input->post('additional_expired'));
      $size                           = htmlspecialchars($this->input->post('size'));
      $length                         = htmlspecialchars($this->input->post('length'));
      $width                          = htmlspecialchars($this->input->post('width'));
      $height                         = htmlspecialchars($this->input->post('height'));
      $weight                         = htmlspecialchars($this->input->post('weight'));
      $dimension                      = htmlspecialchars($this->input->post('dimension'));
      $is_fragile                     = htmlspecialchars($this->input->post('is_fragile'));
      $active                         = htmlspecialchars($this->input->post('active'));
      $cool_storage                   = htmlspecialchars($this->input->post('cool_storage'));
      $id_client                      = htmlspecialchars($this->input->post('id_client'));

      $this->db->set('item_nonbundling_code', $item_nonbundling_code);
      $this->db->set('item_nonbundling_name', $item_nonbundling_name);
      $this->db->set('item_nonbundling_barcode', $item_nonbundling_barcode);
      $this->db->set('manage_by', $manage_by);
      $this->db->set('description', $description);
      $this->db->set('brand', $brand);
      $this->db->set('model', $model);
      $this->db->set('category', $category);
      $this->db->set('minimum_stock', $minimum_stock);
      $this->db->set('publish_price', $publish_price);
      $this->db->set('additional_expired', $additional_expired);
      $this->db->set('size', $size);
      $this->db->set('length', $length);
      $this->db->set('width', $width);
      $this->db->set('height', $height);
      $this->db->set('weight', $weight);
      $this->db->set('dimension', $dimension);
      $this->db->set('is_fragile', $is_fragile);
      $this->db->set('active', $active);
      $this->db->set('cool_storage', $cool_storage);
      $this->db->set('id_client', $id_client);
      $this->db->where('id_item_nonbundling', $id_item_nonbundling);
      $this->db->update('item_nonbundling');

      redirect('admin_store/master_data/item/' . $this->uri->segment(4));
    }
  }

  // JIKA TIDAK ADA LOKASI DAN CLIENT
  public function delete($id_item_nonbundling)
  {
    $this->db->where('id_item_nonbundling', $id_item_nonbundling);
    $this->db->delete('item_nonbundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('admin_store/master_data/item');
  }

  // JIKA HANYA ADA LOKASI
  public function deletee($id_location = null, $id_item_nonbundling)
  {
    $this->db->where('id_item_nonbundling', $id_item_nonbundling);
    $this->db->delete('item_nonbundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('admin_store/master_data/item/' . $this->uri->segment(4));
  }
  // JIKA ADA LOKASI DAN CLIENT
  public function delete_item($id_location = null, $id_client = null, $id_item_nonbundling)
  {
    $this->db->where('id_item_nonbundling', $id_item_nonbundling);
    $this->db->delete('item_nonbundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');

    redirect('admin_store/master_data/item/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
  }

  // IMPORT EXCEL

  public function excel($id_location = null, $id_client = null)
  {
    $id1 = $id_location;
    $id2 = $id_client;

    if ($id1 != null and empty($id2)) {
      $id_client = $this->db->query("SELECT * FROM client WHERE id_location = $id1")->result_array();
    } elseif ($id2 != null) {
      $id_client = $id2;
    } else {
      $id_client = $this->db->query("SELECT * FROM client")->result_array();
    }

    $data = [
      'judul' => 'Import Excel',
      'user'  => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'id_client' => $id_client,
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_store_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_store/master_data/import_excel');
    $this->load->view('templates/footer');
  }

  public function import_excel()
  {

    $uri4 = $this->input->post('uri4');
    $uri5 = $this->input->post('uri5');
    $id_client = $this->input->post('id_client');
    if (isset($_FILES["file"]["name"])) {
      // upload
      $file_tmp = $_FILES['file']['tmp_name'];
      $file_name = $_FILES['file']['name'];
      $file_size = $_FILES['file']['size'];
      $file_type = $_FILES['file']['type'];
      // move_uploaded_file($file_tmp,"uploads/".$file_name); // simpan filenya di folder uploads

      $object = PHPExcel_IOFactory::load($file_tmp);

      foreach ($object->getWorksheetIterator() as $worksheet) {

        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();

        for ($row = 2; $row <= $highestRow; $row++) {

          $item_nonbundling_code = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
          $item_nonbundling_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
          $item_nonbundling_barcode = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
          $manage_by = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
          $description = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
          $brand = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
          $model = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
          $category = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
          $minimum_stock = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
          $publish_price = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
          $additional_expired = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
          $size = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
          $length = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
          $width = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
          $height = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
          $weight = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
          $dimension = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
          $active = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
          $is_fragile = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
          $cool_storage = $worksheet->getCellByColumnAndRow(19, $row)->getValue();


          $data[] = array(
            'item_nonbundling_code'           => $item_nonbundling_code,
            'item_nonbundling_name'           => $item_nonbundling_name,
            'item_nonbundling_barcode'        => $item_nonbundling_barcode,
            'manage_by'                       => $manage_by,
            'description'                     => $description,
            'brand'                           => $brand,
            'model'                           => $model,
            'category'                        => $category,
            'minimum_stock'                   => $minimum_stock,
            'publish_price'                   => $publish_price,
            'additional_expired'              => $additional_expired,
            'size'                            => $size,
            'length'                          => $length,
            'width'                           => $width,
            'height'                          => $height,
            'weight'                          => $weight,
            'dimension'                       => ($length * $width * $height) / 1000000,
            'active'                          => $active,
            'is_fragile'                      => $is_fragile,
            'cool_storage'                    => $cool_storage,
            'id_client'                       => $id_client,
            'created_date'                    => date('Y-m-d'),
            'created_by'                      => $this->session->userdata('fullname'),
          );
        }
      }

      $this->db->insert_batch('item_nonbundling', $data);

      $message = array(
        'message' => '<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
      );

      $this->session->set_flashdata($message);
      if (!empty($uri5)) {
        redirect('admin_store/master_data/item/' . $uri4 . '/' . $uri5);
      } elseif (empty($uri5) and !empty($uri4)) {
        redirect('admin_store/master_data/item/' . $uri4);
      } else {
        redirect('admin_store/master_data/item');
      }
    } else {
      $message = array(
        'message' => '<div class="alert alert-danger">Import file gagal, coba lagi</div>',
      );

      $this->session->set_flashdata($message);


      if (!empty($uri5)) {
        redirect('admin_store/master_data/excel/' . $uri4 . '/' . $uri5);
      } elseif (empty($uri5) and !empty($uri4)) {
        redirect('admin_store/master_data/excel/' . $uri4);
      } else {
        redirect('admin_store/master_data/excel');
      }
    }
  }
}
