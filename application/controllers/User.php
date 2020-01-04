<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('User_model', 'user');
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

        // get image
        $image = $data['user']['image'];

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Edit Profile';
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/editprofile', $data);
            $this->load->view('templates/footer_user');
        } else {
            $this->user->editProfile($image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Profile have been Updated!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'Selamat datang ' . $data['user']['name'];

        $this->form_validation->set_rules('currentpassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newpassword', 'New Password', 'required|trim|min_length[8]|matches[confirmpassword]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|trim|min_length[8]|matches[newpassword]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer_user');
        } else {
            $currentPassword = $this->input->post('currentpassword');
            $newPassword = $this->input->post('newpassword');

            if (!password_verify($currentPassword, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($currentPassword == $newPassword) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Passworr cant be same!</div>');
                    redirect('user/changepassword');
                } else {
                    // get random password
                    $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Passworsd changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
