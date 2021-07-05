<?php defined('BASEPATH') or exit('No direct script access allowed');

class Client_model extends CI_Model
{
  // CREATE
  public function add($data)
  {
    $this->db->insert('client', $data);
  }
  // READ
  public function get($id = null)
  {
    if ($id != null) {
      return $this->db->get_where('client', ['id_client' => $id]);
    }
    return $this->db->get('client');
  }
  // UPDATE
  public function edit()
  {
    $this->db->update('client');
  }
  // DELETE
  public function delete($id)
  {
    $this->db->where('id_client', $id);
    $this->db->delete('client');
  }
  // AUTO COMPLETE 
  function cari($name)
  {
    $this->db->like('stock_allocation_name', $name);
    $this->db->order_by('stock_allocation_name', 'ASC');
    $this->db->limit(10);
    return $this->db->get('stock_allocation')->result();
  }
}
