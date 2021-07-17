<?php

class Bundling extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function item_bundling($id_client = null)
  {
    $id1 = $id_client;
    $id_location = $this->session->userdata('id_location');

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM item_bundling AS inb JOIN client ON inb.id_client = client.id_client WHERE inb.id_client = $id1 AND client.id_location = $id_location")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM item_bundling AS inb JOIN client ON inb.id_client = client.id_client WHERE client.id_location = $id_location")->result_array();
    }

    $data = [
      'nama_menu'         => 'bundling',
      'judul'             => 'Item Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'        => $this->db->get_where('client', ['id_location' => $this->session->userdata('id_location')])->result_array(),
      'location'          => $this->db->get('location')->result_array(),
      'manage_by'         => ['Batch Inbound', 'Expired Date', 'Serial Number', 'Production Date'],
      'item_bundling'     => $item
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/item_bundling');
    $this->load->view('templates/footer');
  }

  // JIKA TIDAK ADA LOKASI DAN CLIENT

  public function ib_detail($id_item_bundling)
  {
    $data = [
      'nama_menu'       => 'bundling',
      'judul'           => 'Detail Item Bundling',
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_bundling'   => $this->db->query("SELECT * FROM item_bundling WHERE item_bundling.id_item_bundling = $id_item_bundling ")->row_array(),
      'item_bundling_detail' => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $id_item_bundling ")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/item_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function ib_detaill($id_client = null,  $id_item_bundling)
  {
    $id1 =  $id_client;
    $data = [
      'nama_menu'       => 'bundling',
      'judul'           => 'Detail Item Bundling',
      'id_client'       => $id1,
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'item_bundling'   => $this->db->query("SELECT * FROM item_bundling WHERE item_bundling.id_item_bundling = $id_item_bundling ")->row_array(),
      'item_bundling_detail' => $this->db->query("SELECT * FROM item_bundling_detail AS ibd JOIN item_bundling AS ib ON ibd.id_item_bundling = ib.id_item_bundling JOIN item_nonbundling AS inb ON ibd.id_item_nonbundling = inb.id_item_nonbundling WHERE ibd.id_item_bundling = $id_item_bundling ")->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/item_bundling_detail');
    $this->load->view('templates/footer');
  }


  // REQUEST BUNDLING


  public function request_bundling($id_client = null)
  {
    $id1 = $id_client;
    $id_location = $this->session->userdata('id_location');

    if ($id1 != null) {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status JOIN client ON rb.id_client = client.id_client WHERE rb.id_client = $id1 AND client.id_location = $id_location")->result_array();
    } else {
      $item = $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status JOIN client ON rb.id_client = client.id_client WHERE client.id_location = $id_location")->result_array();
    }

    $user    = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data = [
      'judul'             => 'Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $user,
      'request_bundling'  => $item,
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/request_bundling');
    $this->load->view('templates/footer');
  }

  public function rb_detail($id_request_bundling)
  {
    $data = [
      'judul'             => 'Detail Request Bundling',
      'nama_menu'         => 'bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE id_request_bundling = $id_request_bundling")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function rb_detaill($id_client = null,  $id_request_bundling)
  {
    $id1 =  $id_client;
    $data = [
      'judul'           => 'Detail Request Bundling',
      'id_client'       => $id1,
      'user'            => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'request_bundling'  => $this->db->query("SELECT * FROM request_bundling AS rb JOIN item_bundling AS ib ON rb.id_item_bundling = ib.id_item_bundling JOIN status ON rb.id_status = status.id_status WHERE id_request_bundling = $id_request_bundling AND rb.id_client = $id1")->row_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/admin_op_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('admin_op/bundling/request_bundling_detail');
    $this->load->view('templates/footer');
  }

  public function rb_edit($id_request_bundling)
  {
    $data = [
      'judul'             => 'Edit Request Bundling',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'packing_type'      => ['PLASTIC', 'BOX', 'BUBBLE WRAP', 'TOTEBAG', "WRAPPING"],
      'item_bundling'     => $this->db->get('item_bundling')->result_array(),
      'status'            => $this->db->get('status')->result_array(),
      'client'            => $this->db->get_where('client', ['id_location' => $this->session->userdata('id_location')])->result_array(),
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
      $this->load->view('templates/admin_op_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('admin_op/bundling/request_bundling_edit');
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
      $id_client                  = htmlspecialchars($this->input->post('id_client'));

      $photo = $_FILES['photo'];
      if ($photo = '') {
      } else {
        $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
        $config['max_size']         = '2048';
        $config['upload_path']      = './assets/img/photo/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('photo')) {
          $photo   = $this->upload->data('file_name');
          $this->db->set('photo', $photo);
        } else {
        }
      }

      $this->db->set('request_bundling_barcode', $request_bundling_barcode);
      $this->db->set('request_bundling_code', $request_bundling_code);
      $this->db->set('bundling_type', $bundling_type);
      $this->db->set('id_item_bundling', $id_item_bundling);
      $this->db->set('request_quantity', $request_quantity);
      $this->db->set('packing_type', $packing_type);
      $this->db->set('id_status', $id_status);
      $this->db->set('id_client', $id_client);
      $this->db->where('id_request_bundling', $id_request_bundling);
      $this->db->update('request_bundling');

      redirect('admin_op/bundling/request_bundling');
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
      'client'            => $this->db->get_where('client', ['id_location' => $this->session->userdata('id_location')])->result_array(),
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
      $this->load->view('templates/admin_op_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('admin_op/bundling/request_bundling_edit');
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

      $photo = $_FILES['photo'];
      if ($photo = '') {
      } else {
        $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
        $config['max_size']         = '2048';
        $config['upload_path']      = './assets/img/photo/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('photo')) {
          $photo   = $this->upload->data('file_name');
          $this->db->set('photo', $photo);
        } else {
        }
      }

      $this->db->set('request_bundling_barcode', $request_bundling_barcode);
      $this->db->set('request_bundling_code', $request_bundling_code);
      $this->db->set('bundling_type', $bundling_type);
      $this->db->set('id_item_bundling', $id_item_bundling);
      $this->db->set('request_quantity', $request_quantity);
      $this->db->set('packing_type', $packing_type);
      $this->db->set('id_status', $id_status);
      $this->db->where('id_request_bundling', $id_request_bundling);
      $this->db->update('request_bundling');

      redirect('admin_op/bundling/request_bundling/' . $this->uri->segment(4));
    }
  }

  public function upload_photo($id_request_bundling)
  {
    // Mengambil data user untuk menghapus gambar yang lama 
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $request_bundling = $this->db->get_where('request_bundling', ['id_request_bundling' => $id_request_bundling])->row_array();
    // end

    $photo = $_FILES['photo'];
    if ($photo = '') {
    } else {
      $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
      $config['max_size']         = '2048';
      $config['upload_path']      = './assets/img/photo/';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('photo')) {
        $old_gambar         = $request_bundling['photo'];
        if ($old_gambar     != 'default.jpg') {
          unlink(FCPATH . 'assets/img/photo/' . $old_gambar);
        }
        $photo   = $this->upload->data('file_name');
        $this->db->set('photo', $photo);
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Upload bukti gagal, silahkan cek file yang anda masukan</div>');
        redirect('admin_op/bundling/request_bundling');
      }
    }
    $this->db->where('id_request_bundling', $id_request_bundling);
    $this->db->update('request_bundling');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Upload bukti berhasil, pesanan segera diproses</div>');
    redirect('admin_op/bundling/request_bundling');
  }
}
