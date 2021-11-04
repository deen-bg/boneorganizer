<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends CI_Model {

    // for admin
    public function fetchAll(){

        $this->db->select('
            id,
            caption,
            name,
            dsc,
            img_cover,
            create_date,
            update_date,
            is_active,
            is_recommend
        ');
        $this->db->from('tbl_service');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fetchType1()
    {
        $this->db->select('
            id,
            name,
            caption,
            type_id,
            dsc,
            img_cover,
            create_date,
            update_date,
            is_active,
            is_recommend
        ');
        $this->db->from('tbl_service');
        $this->db->where('type_id', '1');
        $this->db->where('is_active', '1');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function fetchType2()
    {
        $this->db->select('
            id,
            name,
            caption,
            type_id,
            dsc,
            img_cover,
            create_date,
            update_date,
            is_active,
            is_recommend
        ');
        $this->db->from('tbl_service');
        $this->db->where('type_id', '2');
        $this->db->where('is_active', '1');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();

    }
    public function fetchActiveAll(){

        $this->db->select('
            id,
            name,
            dsc,
            img_cover,
            create_date,
            update_date,
            is_active,
            is_recommend
        ');
        $this->db->from('tbl_service');
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getDetails($id)
    {
        $this->db->select('
            id,
            name,
            caption,
            dsc,
            img_cover,
            create_date,
            update_date,
            is_active,
            is_recommend
        ');
        $this->db->from('tbl_service');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getImages($id)
    {
        $this->db->select('
            simg_id,
            service_id,
            img_name,
            title,
            order_id,
            is_active,
            create_date
        ');
        $this->db->from('tbl_service_img');
        $this->db->where('service_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function create($name,$descs,$s_type)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
    
        $data = array(
            'name'          => $name,
            'type_id'       => $s_type,
            'dsc'           => $descs,
            'create_date'   => $cur_date,
            'update_date'   => $cur_date,
            'is_active'     => '1',
            'is_recommend'  => '1'
        );
        $this->db->insert('tbl_service', $data);
        $insert_id = $this->db->insert_id();
        $result =$this->db->affected_rows();
        if ($result > 0) {
            return $insert_id;
        } else {
            return FALSE;
        }
    }
    // update image Cover
    public function updatefileUpload($dataArr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d");

        $data = array(
            'img_cover' => $dataArr['image_cover'],
            'update_date' => $cur_date
        );
        $this->db->where('id', $dataArr['service_id']);
        $this->db->update('tbl_service', $data);
        return $this->db->affected_rows();
    }

    public function getDesc($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_service');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function update($arr)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d");
        // type_id
       
        if($arr['image_cover'] !=''){
            $data = array(
                'name'          => $arr['name'],
                'caption'       => $arr['rw_caption'],
                'type_id'       => $arr['type_id'],
                'dsc'           => $arr['desc'],
                'img_cover'     => $arr['image_cover'],
                'update_date'   => $cur_date
            );
        } else {
            $data = array(
                'name'          => $arr['name'],
                'caption'       => $arr['rw_caption'],
                'type_id'       => $arr['type_id'],
                'dsc'           => $arr['desc'],
                'update_date'   => $cur_date
            );
        }

        $this->db->where('id', $arr['service_id']);
        $this->db->update('tbl_service', $data);
        return $this->db->affected_rows();
    }
    public function distroy($id, $st)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        $data = array(
            'is_active'     => $st,
            'update_date'   => $cur_date
        );

        $this->db->where('id', $id);
        $this->db->update('tbl_service', $data);
        return $this->db->affected_rows();
    }
    public function getImg($service_id)
    {
        $this->db->select('
            simg_id,
            service_id,
            img_name,
            title,
            order_id,
            is_active,
            create_date
        ');
        $this->db->from('tbl_service_img');
        $this->db->where('service_id', $service_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_title($id,$title)
    {
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
        
        $data = array(
            'title'         => $title,
            'create_date'   => $cur_date
        );
        $this->db->where('simg_id', $id);
        $this->db->update('tbl_service_img', $data);
        return $this->db->affected_rows();
    }
    public function insertImg($dataArr2,$serv_id)
    {
        $i = 1;
        date_default_timezone_set("Asia/Bangkok");
        $cur_date = date("Y-m-d H:i:s");
 
        foreach($dataArr2 as $val) {
            $dataToSave = array(
                'service_id'    => $serv_id,
                'img_name'      => $val['image_cover'],
                'order_id'      => $i,
                'is_active'     => '1',
                'create_date'   => $cur_date
            );
            $this->db->insert('tbl_service_img', $dataToSave);
            $i++;
        }
        return $this->db->affected_rows() > 0;
    }

    public function distroy_image($id)
    {
            
        $this->db->select('
            simg_id,
            service_id,
            img_name,
            is_active
        ');
        $this->db->from('tbl_service_img');
        $this->db->where('simg_id', $id);
        $query = $this->db->get();
        $num = $query->num_rows();
        if($num > 0){
            $result = $query->result_array(); 
            
            $serv_id = $result[0]['service_id'];

            $path ='assets/images/service/'.$serv_id.'/';
            
            // delete & unlink before upload    
            $this->db->where('simg_id', $id);
            $this->db->delete('tbl_service_img');

            $remove_img = unlink($path . $result[0]['img_name']);
             
            return $remove_img;
            
        } else{
            return FALSE;
        }
    }
}

?>