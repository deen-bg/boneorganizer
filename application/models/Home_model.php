<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    // query all slide
    public function getAll(){

        $this->db->select('*');
        $this->db->from('tbl_slide');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();

        if($query->num_rows() > 0){
            $result = $query->result_array();
            return $result;

        } else {
            return false;
        }
    }

}


?>