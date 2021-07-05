<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    private $_table = "user";

    public function getAll($id_user)
    {
        return $this->db->query("SELECT * FROM user JOIN department ON user.department_id = department.department_id WHERE user.id_user != '$id_user' ORDER BY user.department_id ASC")->result_array();
    }
}
