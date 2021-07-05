<?php defined('BASEPATH') or exit('No direct script access allowed');

class Location_model extends CI_Model
{
  // CREATE
  public function add($data)
  {
    $this->db->insert('location', $data);
  }
  // READ
  public function get($id = null)
  {
    if ($id != null) {
      return $this->db->get_where('location', ['id_location' => $id]);
    }
    return $this->db->get('location');
  }
  // UPDATE
  public function edit()
  {
    $this->db->update('location');
  }
  // DELETE
  public function delete($id)
  {
    $this->db->where('id_location', $id);
    $this->db->delete('location');
  }
}
