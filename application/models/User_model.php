<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends  CI_model
{
    public function editProfile($image)
    {

        $name = $this->input->post('name');
        $email = $this->input->post('email');

        // check image
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['upload_path'] = './asset/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $image;

                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'asset/img/profile/' . $old_image);
                }

                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('name', $name);
        $this->db->where('email', $email);
        $this->db->update('user');
    }
}
