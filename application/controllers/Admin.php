<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation'); 
        $this->load->library('upload'); 
        $this->load->library('session');
        $this->load->model('Service_model'); 
        // $this->load->model('Personal_model'); 
        $this->load->model('About_model');
        // $this->load->model('Banner_model');
        $this->load->model('Type_model'); 
        $this->load->model('upload_product_model'); 

	}
    
	public function home(){
        if(!empty($this->session->userdata('user'))){
           
            $this->load->view('admin/home');
        }
        else{
            
            redirect('Login','refresh');
        }
    }
    public function service()
    {
        if(!empty($this->session->userdata('user'))){
            $data['servicies'] = $this->Service_model->fetchAll();
           
            $this->load->view('admin/list_service', $data);  
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function form_service()
    {
        if(!empty($this->session->userdata('user'))){
            
            $data['types'] = $this->Type_model->fetchActive(); 
            $this->load->view('admin/form_service',$data);
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function create_service()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name();
            $this->security->get_csrf_hash();
            $s_name = $this->security->xss_clean($this->input->post('name', TRUE));
            $s_type = $this->security->xss_clean($this->input->post('type', TRUE));
            // 
            $s_dsc = $this->input->post('description', FALSE);

            $service_id = $this->Service_model->create($s_name,$s_dsc,$s_type);
            if($service_id > 0){
                if(!empty($_FILES['covImg']['name'])){
                    $folderName = './assets/images/service/cover/'.$service_id.'/';
                    if(!is_dir($folderName))
                    {
                        mkdir($folderName,0777);
                        $config['upload_path'] = $folderName;
                    } else{
                        $config['upload_path'] = $folderName; 
                    }
                        
                    $config['file_name']        = $_FILES['covImg']['name'];
                    $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                    $config['file_ext_tolower'] = TRUE;
                    $config['overwrite']        = TRUE;
                    $config['max_size']         = '0'; 
                    $config['max_width']        = '0'; 
                    $config['max_height']       = '0'; 
                    $config['max_filename']     = '0';
                    $config['remove_spaces']    = TRUE; 
                    $config['detect_mime']      = TRUE; 
                    $config['encrypt_name']     = FALSE;
    
                    $this->upload->initialize($config); 
                    $this->upload->do_upload('covImg'); 
                        
                    $file_upload=$this->upload->data('file_name'); 
                    if($this->upload->display_errors()){ 
                        echo $this->upload->display_errors();  
                    }else{  
                        $image_type=$this->upload->data('image_type');
                        $file_size=$this->upload->data('file_size');
                        $file_path=$this->upload->data('file_path');
    
                        $dataArr = array(
                            'image_type'    =>  $image_type,
                            'file_size'     =>  $file_size,
                            'file_path'     =>  $file_path,
                            'image_cover'   =>  $file_upload,
                            'service_id'    =>  $service_id
                        );
                    }
                    $response = $this->Service_model->updatefileUpload($dataArr);
                    if($response > 0){
                        echo "<script>
                            alert('Success!');
                            window.location.href='".base_url("Admin/service")."';
                        </script>";
                    } else {
                        echo "<script>
                            alert('failed!');
                            window.location.href='".base_url("Admin/service")."';
                        </script>";
                    }
                }
            } else{
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/service")."';
                </script>";
            }  
        }
        else{
            redirect('Login','refresh');
        }

    }
    public function edit_service()
    {   
        if(!empty($this->session->userdata('user'))){
            $s_id = $this->uri->segment(3);
            // 
            $data['types'] = $this->Type_model->fetchActive(); 
            $data['serv_descs'] = $this->Service_model->getDesc($s_id); 
            $this->load->view('admin/form_service_edit', $data);
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function update_service()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $rw_name = $this->security->xss_clean($this->input->post('name', TRUE));
            $rw_caption = $this->security->xss_clean($this->input->post('caption', TRUE));
            // 
            $rw_type = $this->security->xss_clean($this->input->post('type', TRUE));
            // type
            $rw_dsc = $this->input->post('description', FALSE);
            $serv_id = $this->security->xss_clean($this->input->post('serv_id', TRUE));
            
            if(!empty($_FILES['covImg']['name'])){
                $folderName = './assets/images/service/cover/'.$serv_id.'/';
                if(!is_dir($folderName))
                {
                    mkdir($folderName,0777);
                    $config['upload_path'] = $folderName; 
                } else{
                    $config['upload_path'] = $folderName; 
                }
                    
                $config['file_name']        = $_FILES['covImg']['name'];
                $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                $config['file_ext_tolower'] = TRUE; 
                $config['overwrite']        = TRUE; 
                $config['max_size']         = '0';  
                $config['max_width']        = '0';  
                $config['max_height']       = '0'; 
                $config['max_filename']     = '0'; 
                $config['remove_spaces']    = TRUE; 
                $config['detect_mime']      = TRUE; 
                $config['encrypt_name']     = FALSE; 

                $this->upload->initialize($config);
                $this->upload->do_upload('covImg');
                    
                @$file_upload=$this->upload->data('file_name');
                if($this->upload->display_errors()){ 
                    echo $this->upload->display_errors();  
                }else{  
                    @$image_type=$this->upload->data('image_type');
                    @$file_size=$this->upload->data('file_size');
                    @$file_path=$this->upload->data('file_path');
                }
            } 
            $dataArr = array(
                'name'          => $rw_name,
                'rw_caption'    => $rw_caption,
                'type_id'       => $rw_type,
                'desc'          => $rw_dsc,
                'image_type'    =>  @$image_type,
                'file_size'     =>  @$file_size,
                'file_path'     =>  @$file_path,
                'image_cover'   =>  @$file_upload,
                'service_id'         => @$serv_id
            );  
            $response = $this->Service_model->update($dataArr);
            if($response > 0){
                echo "<script>
                    alert('Success!');
                    window.location.href='".base_url("Admin/service")."';
                </script>";
            } else {
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/edit_service/".$serv_id)."';
                </script>";
            }
        }
        else{
            redirect('Login','refresh');
        }

    }
    public function delService()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $s_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $s_action = $this->security->xss_clean($this->input->post('action', TRUE));
            $s_st = $this->security->xss_clean($this->input->post('st', TRUE));
            
            if($s_st =='1'){
                $st = '0';
            } else{
                $st = '1';
            }
    
            if(!empty($s_id) && $s_action =='delService'){
                $response = $this->Service_model->distroy($s_id,$st);
                
                if($response == 1){
                    echo 'true';
                } else {
                    echo 'false';
                }

            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
        
    }

    public function service_document()
    {
        if(!empty($this->session->userdata('user'))){
            $s_id = $this->uri->segment(3);
            $data['service_docs'] = $this->Service_model->getDesc($s_id); 
            $data['service_file'] = $this->Service_model->getImg($s_id); 

            $this->load->view('admin/service_doc', $data); 
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function form_service_upload()
    {
        if(!empty($this->session->userdata('user'))){

            $data['service_id'] = $this->uri->segment(3);

            $this->load->view('admin/form_service_upload',$data);
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function upload_serv_imges()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
    
            $serv_id = $this->security->xss_clean($this->input->post('service_id', TRUE));
            // 
            $dataimg = array(); 
            $countfiles = count(array_filter($_FILES['productImg']['name']));
            if($countfiles > 0){
                $folderName = './assets/images/service/'.$serv_id.'/';
                if(!is_dir($folderName))
                {
                    mkdir($folderName,0777);
                    $config['upload_path'] = $folderName; 
                } else{
                    $config['upload_path'] = $folderName;
                }
                for($i=0;$i<$countfiles;$i++){
                    if(!empty($_FILES['productImg']['name'][$i])){
                        $_FILES['file']['name'] = $_FILES['productImg']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['productImg']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['productImg']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['productImg']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['productImg']['size'][$i];
                        
                        $config['upload_path']      = $folderName;
                        $config['file_name']        = $_FILES['productImg']['name'][$i];
                        $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                        $config['file_ext_tolower'] = TRUE; 
                        $config['overwrite']        = TRUE; 
                        $config['max_size']         = '0'; 
                        $config['max_width']        = '0'; 
                        $config['max_height']       = '0'; 
                        $config['max_filename']     = '0'; 
                        $config['remove_spaces']    = TRUE; 
                        $config['detect_mime']      = TRUE;
                        $config['encrypt_name']     = FALSE; 
                            
                        $this->upload->initialize($config); 

                        if($this->upload->do_upload('file')){
                            $uploadData = $this->upload->data();
                            $filename1 = $uploadData['file_name'];
                                            
                            $dataArr2[] = array(
                                'image_cover'   => $filename1,
                            );
                        }
                    }
                }
                            
                $response = $this->Service_model->insertImg($dataArr2,$serv_id);

                if($response > 0){
                    echo "<script>
                        alert('Success!');
                        window.location.href='".base_url("Admin/service_document/".$serv_id)."';
                    </script>";
                } else {
                    echo "<script>
                        alert('failed!');
                        window.location.href='".base_url("Admin/form_service_upload/".$serv_id)."';
                    </script>";
                }
            } else {
                echo "<script>
                    alert('Please Upload Images');
                    window.location.href='".base_url("Admin/form_service_upload/".$serv_id)."';
                </script>";
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function addTitleServImg()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $simg_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            $title = $this->security->xss_clean($this->input->post('title', TRUE));
            
            if(!empty($simg_id) && $action =='addTitle'){
                $response = $this->Service_model->update_title($simg_id,$title);
                
                if($response == 1){
                    echo 'true';
                } else {
                    echo 'false';
                }

            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function distroyServImage()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $simg_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $action = $this->security->xss_clean($this->input->post('action', TRUE));
            
            if(!empty($simg_id) && $action =='distroy'){
                $response = $this->Service_model->distroy_image($simg_id);
                if($response > 0){
                    echo 'true';
                } else {
                    echo 'false';
                }
            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function aboutus()
    {
        if(!empty($this->session->userdata('user'))){
            $data['aboutusies'] = $this->About_model->fetchAll();
            $this->load->view('admin/list_about', $data);   
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function form_about()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->load->view('admin/form_about'); 
        }
        else{
            redirect('Login','refresh');
        }

    }
    public function create_about()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name();
            $this->security->get_csrf_hash();
            $s_name = $this->security->xss_clean($this->input->post('name', TRUE));
            $s_dsc = $this->input->post('description', FALSE);

            $ab_id = $this->About_model->create($s_name,$s_dsc);
            if($ab_id > 0){
                if(!empty($_FILES['covImg']['name'])){
                    $folderName = './assets/images/about/cover/'.$ab_id.'/';
                    if(!is_dir($folderName))
                    {
                        mkdir($folderName,0777);
                        $config['upload_path'] = $folderName;
                    } else{
                        $config['upload_path'] = $folderName; 
                    }
                        
                    $config['file_name']        = $_FILES['covImg']['name'];
                    $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                    $config['file_ext_tolower'] = TRUE;
                    $config['overwrite']        = TRUE;
                    $config['max_size']         = '0'; 
                    $config['max_width']        = '0'; 
                    $config['max_height']       = '0'; 
                    $config['max_filename']     = '0';
                    $config['remove_spaces']    = TRUE; 
                    $config['detect_mime']      = TRUE; 
                    $config['encrypt_name']     = FALSE;
    
                    $this->upload->initialize($config); 
                    $this->upload->do_upload('covImg'); 
                        
                    $file_upload=$this->upload->data('file_name'); 
                    if($this->upload->display_errors()){ 
                        echo $this->upload->display_errors();  
                    }else{  
                        $image_type=$this->upload->data('image_type');
                        $file_size=$this->upload->data('file_size');
                        $file_path=$this->upload->data('file_path');
    
                        $dataArr = array(
                            'image_type'    =>  $image_type,
                            'file_size'     =>  $file_size,
                            'file_path'     =>  $file_path,
                            'image_cover'   =>  $file_upload,
                            'about_id'      =>  $ab_id
                        );
                    }
                    $response = $this->About_model->updatefileUpload($dataArr);
                    if($response > 0){
                        echo "<script>
                            alert('Success!');
                            window.location.href='".base_url("Admin/aboutus")."';
                        </script>";
                    } else {
                        echo "<script>
                            alert('failed!');
                            window.location.href='".base_url("Admin/aboutus")."';
                        </script>";
                    }
                }
            } else{
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/aboutus")."';
                </script>";
            }  
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function edit_about()
    {
        if(!empty($this->session->userdata('user'))){
            $ab_id = $this->uri->segment(3);
            $data['about_dscs'] = $this->About_model->getDesc($ab_id); 
            $this->load->view('admin/form_about_edit', $data); //  
        }
        else{
            redirect('Login','refresh');
        }
    }
    public function update_about()
    {
        if(!empty($this->session->userdata('user'))){
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $ab_name = $this->security->xss_clean($this->input->post('name', TRUE));
            $ab_dsc = $this->input->post('description', FALSE);
            $ab_id = $this->security->xss_clean($this->input->post('about_id', TRUE));
            
            if(!empty($_FILES['covImg']['name'])){
                $folderName = './assets/images/about/cover/'.$ab_id.'/';
                if(!is_dir($folderName))
                {
                    mkdir($folderName,0777);
                    $config['upload_path'] = $folderName; 
                } else{
                    $config['upload_path'] = $folderName; 
                }
                    
                $config['file_name']        = $_FILES['covImg']['name'];
                $config['allowed_types']    = 'jpg|png|jpeg|JPG|PNG|JPEG'; 
                $config['file_ext_tolower'] = TRUE; 
                $config['overwrite']        = TRUE; 
                $config['max_size']         = '0';  
                $config['max_width']        = '0';  
                $config['max_height']       = '0'; 
                $config['max_filename']     = '0'; 
                $config['remove_spaces']    = TRUE; 
                $config['detect_mime']      = TRUE; 
                $config['encrypt_name']     = FALSE; 

                $this->upload->initialize($config);
                $this->upload->do_upload('covImg');
                    
                @$file_upload=$this->upload->data('file_name');
                if($this->upload->display_errors()){ 
                    echo $this->upload->display_errors();  
                }else{  
                    @$image_type=$this->upload->data('image_type');
                    @$file_size=$this->upload->data('file_size');
                    @$file_path=$this->upload->data('file_path');
                }
            } 
            $dataArr = array(
                'name'          => $ab_name,
                'desc'          => $ab_dsc,
                'image_type'    =>  @$image_type,
                'file_size'     =>  @$file_size,
                'file_path'     =>  @$file_path,
                'image_cover'   =>  @$file_upload,
                'about_id'      => @$ab_id
            );  
            $response = $this->About_model->update($dataArr);
            if($response > 0){
                echo "<script>
                    alert('Success!');
                    window.location.href='".base_url("Admin/aboutus")."';
                </script>";
            } else {
                echo "<script>
                    alert('failed!');
                    window.location.href='".base_url("Admin/edit_about/".$ab_id)."';
                </script>";
            }
        }
        else{
            redirect('Login','refresh');
        }

    }

    public function delAbout()
    {
        if(!empty($this->session->userdata('user'))){
            
            $this->security->get_csrf_token_name(); 
            $this->security->get_csrf_hash();
            $ab_id = $this->security->xss_clean($this->input->post('id', TRUE));
            $ab_action = $this->security->xss_clean($this->input->post('action', TRUE));
            $ab_st = $this->security->xss_clean($this->input->post('st', TRUE));
            
            if($ab_st =='1'){
                $st = '0';
            } else{
                $st = '1';
            }
    
            if(!empty($ab_id) && $ab_action =='delAbout'){
                $response = $this->About_model->distroy($ab_id,$st);
                
                if($response == 1){
                    echo 'true';
                } else {
                    echo 'false';
                }

            } else{
                echo 'false';
            }
        }
        else{
            redirect('Login','refresh');
        }
        
    }
    public function contact()
    {
        if(!empty($this->session->userdata('user'))){
           
            $data['contact_dscs'] = $this->About_model->fetchContactActive(); 
            $this->load->view('admin/form_contact_edit',$data); // 
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }
    public function update_contact()
    {
        $this->security->get_csrf_token_name(); // initial CSRF name
        $_token = $this->security->get_csrf_hash(); // get CSRF Token generate

        $c_add = $this->security->xss_clean($this->input->post('c_add', TRUE));
        $c_tel = $this->security->xss_clean($this->input->post('c_tel', TRUE));
        $c_line_id = $this->security->xss_clean($this->input->post('c_line_id', TRUE));
        $c_fb = $this->security->xss_clean($this->input->post('c_fb', TRUE));
        $c_mail = $this->security->xss_clean($this->input->post('c_mail', TRUE));
        $c_id = $this->security->xss_clean($this->input->post('c_id', TRUE));

        $data = array(
            'c_add'     => $c_add,
            'c_tel'     => $c_tel,
            'c_line_id' => $c_line_id,
            'c_fb'      => $c_fb,
            'c_mail'    => $c_mail,
            'c_id'      => $c_id
        );

        if(!empty($this->session->userdata('user')) && !empty($_token)){
           
            $res = $this->About_model->update_contact($data); 
            if($res > 0 ){
                echo "<script>
                        alert('บันทึกสำเร็จ!');
                        window.location.href='".base_url("Admin/contact")."';
                    </script>";
            } else{
                echo "<script>
                    alert('บันทึกไม่สำเร็จ!');
                    window.location.href='".base_url("Admin/contact")."';
                </script>";
            }
        }
        else{
            //If no session, redirect to login page
            redirect('Login','refresh');
        }
    }

    // public function userManual()
    // {
    //     if(!empty($this->session->userdata('user'))){
    //         $this->load->helper('download');
    //         $file = './assets/file/glovepfs.pdf';
    //         force_download($file, NULL);
    //     }
    //     else{
    //         redirect('Login','refresh');
    //     }
    // }
}

