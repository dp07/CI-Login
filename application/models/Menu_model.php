<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends  CI_model
{
    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function editMenu($id)
    {
        $data = [
            'id' => $this->input->post('id'),
            'menu' => $this->input->post('editmenu')
        ];

        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
    }

    public function deleteMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function getSubMenu()
    {
        // join table user_menu and user_sub_menu
        $query = " SELECT user_sub_menu.*, user_menu.menu FROM user_sub_menu JOIN user_menu ON user_sub_menu.menu_id = user_menu.id";

        return $this->db->query($query)->result_array();
    }
}
