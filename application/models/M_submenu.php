<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_submenu extends CI_Model
{

    public function getSubmenu()
    {
        $query = "SELECT `user_submenu`.*, `user_menu`.`menu` FROM `user_submenu` JOIN `user_menu` ON `user_submenu`.`user_menu_id` = `user_menu`.`user_menu_id`";

        return $this->db->query($query)->result_array();
    }
    public function getSubmenuById($id)
    {
        $this->db->select('user_submenu.*, user_menu.menu');
        $this->db->from('user_submenu');
        $this->db->join('user_menu', 'user_submenu.user_menu_id = user_menu.user_menu_id');
        $this->db->where('user_submenu.user_submenu_id', $id);

        return $this->db->get()->row_array();
    }

    public function updateSubmenu($id, $submenuData)
    {
        $this->db->where('user_submenu_id', $id);
        $this->db->update('user_submenu', $submenuData);
    }

    public function delete($id)
    {
        $this->db->where('user_submenu_id', $id);
        $this->db->delete('user_submenu');
    }
}
