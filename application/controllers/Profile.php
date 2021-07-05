<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $data = [
            'judul'     => 'Profile',
            'nama_menu' => 'profile',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];
        $this->load->view('templates/header', $data);
        if ($this->session->userdata('department_id') == 1 || $this->session->userdata('department_id') == 2) {
            $this->load->view('templates/tech_sidebar');
        } elseif ($this->session->userdata('department_id') == 3) {
            $this->load->view('templates/admin_store_sidebar');
        } elseif ($this->session->userdata('department_id') == 4) {
            $this->load->view('templates/admin_op_sidebar');
        } elseif ($this->session->userdata('department_id') == 5) {
            $this->load->view('templates/client_sidebar');
        } elseif ($this->session->userdata('department_id') == 6) {
            $this->load->view('templates/spv_sidebar');
        }
        $this->load->view('templates/navbar');
        $this->load->view('profile/index');
        $this->load->view('templates/footer');
    }
    public function edit_profile()
    {
        $data = [
            'judul'     => 'Edit Profile',
            'nama_menu' => 'profile',
            'user'      => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array()
        ];

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password1', 'trim|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            if ($this->session->userdata('department_id') == 1 || $this->session->userdata('department_id') == 2) {
                $this->load->view('templates/tech_sidebar');
            } elseif ($this->session->userdata('department_id') == 3) {
                $this->load->view('templates/admin_store_sidebar');
            } elseif ($this->session->userdata('department_id') == 4) {
                $this->load->view('templates/admin_op_sidebar');
            } elseif ($this->session->userdata('department_id') == 5) {
                $this->load->view('templates/client_sidebar');
            } elseif ($this->session->userdata('department_id') == 6) {
                $this->load->view('templates/spv_sidebar');
            }
            $this->load->view('templates/navbar');
            $this->load->view('profile/edit_profile');
            $this->load->view('templates/footer');
        } else {
            $id_user          = $this->input->post('id_user');
            $fullname         = $this->input->post('fullname');
            $username         = $this->input->post('username');
            $email            = $this->input->post('email');
            $no_telp          = $this->input->post('phone');
            $password         = $this->input->post('password1');

            $image = $_FILES['image'];
            if ($image = '') {
            } else {
                $config['allowed_types']    = 'jpg|PNG|png|jpeg|JPG|JPEG';
                $config['max_size']         = '2048';
                $config['upload_path']      = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_gambar         = $data['user']['image'];
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
                    $this->db->where('id_user', $id_user);
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Transaksi berhasil diubah</div>');
                    redirect('profile');
                }
            }
            $this->db->set('fullname', $fullname);
            $this->db->set('username', $username);
            $this->db->set('email', $email);
            $this->db->set('no_telp', $no_telp);
            if (!empty($password)) {
                $this->db->set('password', password_hash($password, PASSWORD_DEFAULT));
            }
            $this->db->where('id_user', $id_user);
            $this->db->update('user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User Berhasil diubah</div>');
            redirect('profile');
        }
    }
}
