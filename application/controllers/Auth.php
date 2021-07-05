<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('profile');
        }
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Bundling System';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth_footer', $data);
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            if ($password == $user['password'])
            // if (password_verify($password, $user['password'])) 
            {
                $data = [
                    'id_user'       => $user['id_user'],
                    'fullname'      => $user['fullname'],
                    'email'         => $user['email'],
                    'phone'         => $user['phone'],
                    'username'      => $user['username'],
                    'image'         => $user['image'],
                    'department_id' => $user['department_id']
                ];

                $this->session->set_userdata($data);

                if ($user['department_id'] == 3) {
                    redirect('admin_store/dashboard');
                } elseif ($user['department_id'] == 4) {
                    redirect('admin_op/dashboard');
                } elseif ($user['department_id'] == 5) {
                    redirect('client/dashboard');
                } elseif ($user['department_id'] == 6) {
                    redirect('spv/dashboard');
                } else {
                    redirect('tech/dashboard');
                }
            } else {
                $this->session->set_flashdata('message2', 'wrongpassword');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message3', 'wrongusername');
            redirect('auth');
        }
    }

    public function blocked()
    {
        $data['judul']  = 'Akses dilarang';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/auth_footer');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('department_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Anda berhasil keluar</div>');
        $this->session->set_flashdata('message4', 'flash-logout');
        redirect('auth');
    }
}
