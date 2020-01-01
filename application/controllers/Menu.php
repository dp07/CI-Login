<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query menu
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Menu Management';
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer_user');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added!</div>');
            redirect('menu');
        }
    }

    public function edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        // dapatkan menu berdasarkan id
        $data['menu'] = $this->Menu_model->getMenuById($id);

        // rule form validation
        $this->form_validation->set_rules('editmenu', 'Menu', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Menu Management';
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer_user');
        } else {
            $this->Menu_model->editMenu($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Updated!</div>');
            redirect('menu');
        }
    }

    public function delete($id)
    {
        $this->Menu_model->deleteMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Have Been Deleted!</div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // query sub menu
        $data['submenu'] = $this->Menu_model->getSubMenu();

        // query menu
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('submenu', 'Submenu Title', 'required|trim');
        $this->form_validation->set_rules('submenu', 'Submenu Title', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Submenu Management';
            $this->load->view('templates/header_user', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer_user');
        } else {
            echo 'OK';
        }
    }
}
