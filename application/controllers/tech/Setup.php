<?php

class Setup extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    belum_login();
    date_default_timezone_set('Asia/Jakarta');
    $this->load->model("M_user");
  }

  public function user()
  {
    $id_user = $this->session->userdata('id_user');
    $data = [

      'nama_menu' => 'setup',
      'judul'     => 'Users',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'data_user' => $this->M_user->getAll($id_user)
    ];

    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/setup/user');
    $this->load->view('templates/footer');
  }

  public function create_user()
  {
    $data = [
      'judul'         => 'Create User',
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'department'    => $this->db->get('department')->result_array()
    ];

    $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
    $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
    $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');
    $this->form_validation->set_rules('department_id', 'Department_id', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('templates/tech_sidebar');
      $this->load->view('tech/setup/user_create');
      $this->load->view('templates/footer');
    } else {
      $image = $_FILES['image'];
      if ($image = '') {
      } else {
        $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
        $config['max_size']         = '2048';
        $config['upload_path']      = './assets/img/profile/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
          $image   = $this->upload->data('file_name');
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Image</div>');
          redirect('tech/setup/user');
        }
      }
      $data = [
        'fullname'          => $this->input->post('fullname'),
        'username'          => $this->input->post('username'),
        'email'             => $this->input->post('email'),
        'no_telp'           => $this->input->post('phone'),
        'password'          => $this->input->post('password1'),
        'image'             => $image,
        'department_id'     => $this->input->post('department_id'),
        'created_date'      => date('Y-m-d'),
        'created_by'        => $this->session->userdata('fullname')
      ];
      $this->db->insert('user', $data);
      redirect('tech/setup/user');
    }
  }

  public function edit_user($id_user)
  {
    $data = [

      'nama_menu' => 'setup',
      'judul'         => 'Edit User',
      'user'          => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'data_user'     => $this->db->get_where('user', ['id_user' => $id_user])->row_array(),
      'department'    => $this->db->get('department')->result_array()
    ];

    $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
    $this->form_validation->set_rules('password1', 'Password1', 'trim|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password2', 'trim|matches[password1]');
    $this->form_validation->set_rules('department_id', 'Department_id', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar');
      $this->load->view('templates/tech_sidebar');
      $this->load->view('tech/setup/user_edit');
      $this->load->view('templates/footer');
    } else {
      $id_user          = $this->input->post('id_user');
      $fullname         = $this->input->post('fullname');
      $username         = $this->input->post('username');
      $email            = $this->input->post('email');
      $no_telp          = $this->input->post('phone');
      $password         = $this->input->post('password1');
      $department_id    = $this->input->post('department_id');

      $image = $_FILES['image']['name'];
      if ($image = '') {
      } else {
        $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
        $config['max_size']         = '2048';
        $config['upload_path']      = './assets/img/profile/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
          $old_gambar         = $data['data_user']['image'];
          if ($old_gambar     != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_gambar);
          }
          $image   = $this->upload->data('file_name');
          $this->db->set('image', $image);
        } else {
          $this->db->set('fullname', $fullname);
          $this->db->set('username', $username);
          $this->db->set('email', $email);
          $this->db->set('no_telp', $no_telp);
          if (!empty($password)) {
            $this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
          }
          $this->db->set('department_id', $department_id);
          $this->db->where('id_user', $id_user);
          $this->db->update('user');

          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Transaksi berhasil diubah</div>');
          redirect('tech/setup/edit_user/' . $id_user);
        }
      }

      $this->db->set('fullname', $fullname);
      $this->db->set('username', $username);
      $this->db->set('email', $email);
      $this->db->set('no_telp', $no_telp);
      if (!empty($password)) {
        $this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
      }
      $this->db->set('department_id', $department_id);
      $this->db->where('id_user', $id_user);
      $this->db->update('user');
      redirect('tech/setup/user');
    }
  }

  public function delete_user($id_user)
  {
    $this->db->where('id_user', $id_user);
    $this->db->delete('user');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil Dihapus</div>');
    redirect('tech/setup/user');
  }

  public function location()
  {
    $data = [
      'judul'     => 'Location',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'location'  => $this->location_model->get()->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/setup/location');
    $this->load->view('templates/footer');
  }

  public function create_location()
  {
    $data = [
      'judul'     => 'Create Location',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'location'  => $this->location_model->get()->result_array()
    ];
    $this->form_validation->set_rules('location_code', 'Location Code', 'required|trim');
    $this->form_validation->set_rules('location_name', 'Location name', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('province', 'Province', 'required|trim');
    $this->form_validation->set_rules('country', 'Country', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/setup/location_create');
      $this->load->view('templates/footer');
    } else {

      $data_location = [
        'location_code'   => $this->input->post('location_code'),
        'location_name'   => $this->input->post('location_name'),
        'address'         => $this->input->post('address'),
        'province'        => $this->input->post('province'),
        'country'         => $this->input->post('country'),
        'created_date'    => date('Y-m-d'),
        'created_by'      => $data['user']['fullname'],
      ];
      $this->location_model->add($data_location);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">location Berhasil ditambah</div>');
      redirect('tech/setup/location');
    }
  }

  public function edit_location($id_location)
  {
    $data = [
      'judul'     => 'Edit Location',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'location'  => $this->location_model->get($id_location)->row_array()
    ];
    $this->form_validation->set_rules('location_code', 'Location Code', 'required|trim');
    $this->form_validation->set_rules('location_name', 'Location name', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');
    $this->form_validation->set_rules('province', 'Province', 'required|trim');
    $this->form_validation->set_rules('country', 'Country', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/setup/location_edit');
      $this->load->view('templates/footer');
    } else {
      $id_location        = $this->input->post('id_location');
      $location_code      = $this->input->post('location_code');
      $location_name      = $this->input->post('location_name');
      $address            = $this->input->post('address');
      $province           = $this->input->post('province');
      $country            = $this->input->post('country');

      $this->db->set('location_code', $location_code);
      $this->db->set('location_name', $location_name);
      $this->db->set('address', $address);
      $this->db->set('province', $province);
      $this->db->set('country', $country);
      $this->db->where('id_location', $id_location);
      $this->location_model->edit();

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">location Berhasil diubah</div>');
      redirect('tech/setup/location');
    }
  }

  public function delete_location($id_location)
  {
    $this->location_model->delete($id_location);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">location Berhasil Didelete</div>');
    redirect('tech/setup/location');
  }

  public function client()
  {
    $data = [
      'judul'     => 'Client',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'    => $this->db->query("SELECT user.id_user, user.fullname, stock_allocation.id_stock_allocation, stock_allocation.stock_allocation_name, client.* FROM client JOIN user ON client.user_id = user.id_user JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation")->result_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/setup/client');
    $this->load->view('templates/footer');
  }

  public function detail_client($id_client)
  {
    $data = [
      'judul'     => 'Client',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'    => $this->db->query("SELECT user.id_user, user.fullname, stock_allocation.id_stock_allocation, stock_allocation.stock_allocation_name, client.* FROM client JOIN user ON client.user_id = user.id_user JOIN stock_allocation ON client.id_stock_allocation = stock_allocation.id_stock_allocation WHERE id_client = $id_client")->row_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/setup/client/detail');
    $this->load->view('templates/footer');
  }

  public function create_client()
  {
    $data = [
      'judul'     => 'Create client',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'    => $this->client_model->get()->result_array(),
      'data_user' => $this->db->get_where('user', ['department_id' => '5'])->result_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array(),
      'location'  => $this->db->get('location')->result_array(),
      'select'    => ['Yes', 'No']
    ];
    $this->form_validation->set_rules('user_id', 'User', 'required|trim|is_unique[client.user_id]');
    $this->form_validation->set_rules('client_code', 'client code', 'required|trim');
    $this->form_validation->set_rules('client_name', 'client name', 'required|trim');
    $this->form_validation->set_rules('id_stock_allocation', 'id stock allocation', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/setup/client_create');
      $this->load->view('templates/footer');
    } else {

      $data_client = [
        'user_id'             => $this->input->post('user_id'),
        'client_code'         => $this->input->post('client_code'),
        'client_name'         => $this->input->post('client_name'),
        'id_stock_allocation' => $this->input->post('id_stock_allocation'),
        'created_date'        => date('Y-m-d'),
        'active'              => $this->input->post('active'),
        'id_location'              => $this->input->post('id_location'),
      ];
      $this->client_model->add($data_client);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">client Berhasil ditambah</div>');
      redirect('tech/setup/client');
    }
  }

  public function edit_client($id_client)
  {
    $data = [
      'judul'     => 'Edit client',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'client'    => $this->client_model->get($id_client)->row_array(),
      'data_user' => $this->db->get_where('user', ['department_id' => 5])->result_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array(),
      'location'  => $this->db->get('location')->result_array(),
      'select'    => ['Yes', 'No']
    ];
    $this->form_validation->set_rules('client_code', 'client Code', 'required|trim');
    $this->form_validation->set_rules('client_name', 'client name', 'required|trim');
    $this->form_validation->set_rules('user_id', 'user', 'required|trim');
    $this->form_validation->set_rules('id_stock_allocation', 'id stock allocation', 'required|trim');
    $this->form_validation->set_rules('id_location', 'id location', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/setup/client_edit');
      $this->load->view('templates/footer');
    } else {
      $id_client            = $this->input->post('id_client');
      $user_id              = $this->input->post('user_id');
      $client_code          = $this->input->post('client_code');
      $client_name          = $this->input->post('client_name');
      $id_stock_allocation  = $this->input->post('id_stock_allocation');
      $active               = $this->input->post('active');
      $id_location               = $this->input->post('id_location');

      $this->db->set('user_id', $user_id);
      $this->db->set('client_code', $client_code);
      $this->db->set('client_name', $client_name);
      $this->db->set('id_stock_allocation', $id_stock_allocation);
      $this->db->set('active', $active);
      $this->db->set('id_location', $id_location);
      $this->db->where('id_client', $id_client);
      $this->client_model->edit();

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">client Berhasil diubah</div>');
      redirect('tech/setup/client');
    }
  }

  public function delete_client($id_client)
  {
    $this->client_model->delete($id_client);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">client Berhasil Didelete</div>');
    redirect('tech/setup/client');
  }

  public function status()
  {
    $data = [

      'nama_menu'   => 'setup',
      'judul'       => 'status',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'status'      => $this->db->get('status')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/setup/status');
    $this->load->view('templates/footer');
  }

  public function create_status()
  {
    $data = [

      'nama_menu' => 'setup',
      'judul'       => 'Create status',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'status'      => $this->db->get('status')->result_array()
    ];
    $this->form_validation->set_rules('status', 'status', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/setup/status_create');
      $this->load->view('templates/footer');
    } else {

      $data_status = [
        'status'     => $this->input->post('status'),
      ];
      $this->db->insert('status', $data_status);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">status Berhasil ditambah</div>');
      redirect('tech/setup/status');
    }
  }

  public function edit_status($id_status)
  {
    $data = [

      'nama_menu' => 'setup',
      'judul'       => 'Edit status',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'status'      => $this->db->get_where('status', ['id_status' => $id_status])->row_array()
    ];
    $this->form_validation->set_rules('status', 'status name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/setup/status_edit');
      $this->load->view('templates/footer');
    } else {
      $id_status     = $this->input->post('id_status');
      $status        = $this->input->post('status');

      $this->db->set('status', $status);
      $this->db->where('id_status', $id_status);
      $this->db->update('status');

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">status Berhasil diubah</div>');
      redirect('tech/setup/status');
    }
  }

  public function delete_status($id_status)
  {
    $this->db->where('id_status', $id_status);
    $this->db->delete('status');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">status Berhasil Didelete</div>');
    redirect('tech/setup/status');
  }

  public function department()
  {
    $data = [
      'judul'       => 'Department',
      'nama_menu'   => 'setup',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'department'  => $this->db->get('department')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/setup/department');
    $this->load->view('templates/footer');
  }

  public function create_department()
  {
    $data = [
      'judul'       => 'Create Department',
      'nama_menu'   => 'setup',
      'user'        => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'department'  => $this->db->get('department')->result_array()
    ];
    $this->form_validation->set_rules('kd_department', 'department Code', 'required|trim');
    $this->form_validation->set_rules('name', 'Name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/setup/department_create');
      $this->load->view('templates/footer');
    } else {

      $data_department = [
        'kd_department'     => $this->input->post('kd_department'),
        'name'              => $this->input->post('name'),
        'created_date'      => date('Y-m-d'),
        'created_by'        => $data['user']['fullname'],
      ];
      $this->db->insert('department', $data_department);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">department Berhasil ditambah</div>');
      redirect('tech/setup/department');
    }
  }

  public function edit_department($department_id)
  {
    $data = [
      'judul'     => 'Edit Department',
      'nama_menu' => 'setup',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'department'  => $this->db->get_where('department', ['department_id' => $department_id])->row_array()
    ];
    $this->form_validation->set_rules('kd_department', 'department Code', 'required|trim');
    $this->form_validation->set_rules('name', 'department name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/setup/department_edit');
      $this->load->view('templates/footer');
    } else {
      $department_id        = $this->input->post('department_id');
      $name                 = $this->input->post('name');
      $kd_department        = $this->input->post('kd_department');

      $this->db->set('name', $name);
      $this->db->set('kd_department', $kd_department);
      $this->db->where('department_id', $department_id);
      $this->db->update('department');

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">department Berhasil diubah</div>');
      redirect('tech/setup/department');
    }
  }

  public function delete_department($department_id)
  {
    $this->db->where('department_id', $department_id);
    $this->db->delete('department');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">department Berhasil Didelete</div>');
    redirect('tech/setup/department');
  }

  public function stock_allocation()
  {
    $data = [

      'nama_menu'         => 'setup',
      'judul'             => 'stock allocation',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/setup/stock_allocation');
    $this->load->view('templates/footer');
  }

  public function create_stock_allocation()
  {
    $data = [

      'nama_menu' => 'setup',
      'judul'             => 'Create stock allocation',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'stock_allocation'  => $this->db->get('stock_allocation')->result_array()
    ];
    $this->form_validation->set_rules('stock_allocation_code', 'stock_allocation Code', 'required|trim');
    $this->form_validation->set_rules('stock_allocation_name', 'stock_allocation_name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/setup/stock_allocation_create');
      $this->load->view('templates/footer');
    } else {

      $data_stock_allocation = [
        'stock_allocation_code'     => $this->input->post('stock_allocation_code'),
        'stock_allocation_name'     => $this->input->post('stock_allocation_name'),
      ];
      $this->db->insert('stock_allocation', $data_stock_allocation);
      $this->session->set_flashdata('message8', 'dataloc');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">stock_allocation Berhasil ditambah</div>');
      redirect('tech/setup/stock_allocation');
    }
  }

  public function edit_stock_allocation($id_stock_allocation)
  {
    $data = [

      'nama_menu' => 'setup',
      'judul'             => 'Edit stock allocation',
      'user'              => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'stock_allocation'  => $this->db->get_where('stock_allocation', ['id_stock_allocation' => $id_stock_allocation])->row_array()
    ];
    $this->form_validation->set_rules('stock_allocation_code', 'stock_allocation Code', 'required|trim');
    $this->form_validation->set_rules('stock_allocation_name', 'stock_allocation name', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/tech_sidebar');
      $this->load->view('templates/navbar');
      $this->load->view('tech/setup/stock_allocation_edit');
      $this->load->view('templates/footer');
    } else {
      $id_stock_allocation         = $this->input->post('id_stock_allocation');
      $stock_allocation_code        = $this->input->post('stock_allocation_code');
      $stock_allocation_name        = $this->input->post('stock_allocation_name');

      $this->db->set('stock_allocation_code', $stock_allocation_code);
      $this->db->set('stock_allocation_name', $stock_allocation_name);
      $this->db->where('id_stock_allocation', $id_stock_allocation);
      $this->db->update('stock_allocation');

      $this->session->set_flashdata('message2', 'wrongusername');
      // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">stock_allocation Berhasil diubah</div>');
      redirect('tech/setup/stock_allocation');
    }
  }

  public function delete_stock_allocation($id_stock_allocation)
  {
    $this->db->where('id_stock_allocation', $id_stock_allocation);
    $this->db->delete('stock_allocation');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">stock_allocation Berhasil Didelete</div>');
    redirect('tech/setup/stock_allocation');
  }

  public function admin_ops()
  {
    $data = [
      'judul'     => 'Admin Operation',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'admin'     => $this->db->query("SELECT * FROM user JOIN location ON user.id_location = location.id_location WHERE department_id = 4 AND user.id_location != ''")->result_array(),
      'location'  => $this->db->get('location')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/setup/admin_ops');
    $this->load->view('templates/footer');
  }

  public function add_admin()
  {
    $this->db->set('id_location', $this->input->post('id_location'));
    $this->db->where('id_user', $this->input->post('id_user'));
    $this->db->update('user');
    redirect('tech/setup/admin_ops');
  }

  public function edit_admin()
  {
    $this->db->set('id_location', $this->input->post('id_location'));
    $this->db->where('id_user', $this->input->post('id_user'));
    $this->db->update('user');
    redirect('tech/setup/admin_ops');
  }

  public function spv()
  {
    $data = [
      'judul'     => 'Supervisior',
      'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'spv'       => $this->db->query("SELECT * FROM user JOIN location ON user.id_location = location.id_location WHERE department_id = 6 AND user.id_location != ''")->result_array(),
      'location'  => $this->db->get('location')->result_array()
    ];
    $this->load->view('templates/header', $data);
    $this->load->view('templates/tech_sidebar');
    $this->load->view('templates/navbar');
    $this->load->view('tech/setup/spv');
    $this->load->view('templates/footer');
  }

  public function add_spv()
  {
    $this->db->set('id_location', $this->input->post('id_location'));
    $this->db->where('id_user', $this->input->post('id_user'));
    $this->db->update('user');
    redirect('tech/setup/spv');
  }

  public function edit_spv()
  {
    $this->db->set('id_location', $this->input->post('id_location'));
    $this->db->where('id_user', $this->input->post('id_user'));
    $this->db->update('user');
    redirect('tech/setup/spv');
  }
}
