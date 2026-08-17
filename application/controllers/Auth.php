<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('buku');
        }
        $this->load->view('auth/login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->login($username, $password);

        if ($user) {
            $session_data = [
                'id'        => $user->id,
                'username'  => $user->username,
                'nama'      => $user->nama,
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($session_data);
            redirect('buku');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
