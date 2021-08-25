<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_request extends CI_Model
{
    private $_table = "request_bundling";

    public function autocode()
    {
        $q = $this->db->query("SELECT RIGHT(REQUEST_BUNDLING_BARCODE,4) AS request_code
                                FROM request_bundling
                                ");

        $code = "";

        if ($q->num_rows()>0) 
        {
            foreach ($q->result() as $que) 
            {
                $tmp = ((int)$que->request_code)+1;
                $code = sprintf("%04s", $tmp);
            }
        }
        else 
        {
            $code = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return "REQ" . date('dmy').$code;
    }
}