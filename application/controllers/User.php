<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['name'];

        $data['title'] = 'My Profile';
        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer_user');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['name'];

        $data['title'] = 'Edit Profile';
        $this->load->view('templates/header_user', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('user/editprofile', $data);
        $this->load->view('templates/footer_user');
    }
}
