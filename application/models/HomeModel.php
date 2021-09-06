<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeModel extends CI_Model
{
    public function getProduct()
    {
        return $this->db->get("barang")->result_array();
    }
}
