<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
	}

    public function send(){
        $this->security->get_csrf_token_name(); 
        $this->security->get_csrf_hash(); 

		$fullname =$this->security->xss_clean($this->input->post('fullname', TRUE));
		$tel =$this->security->xss_clean($this->input->post('tel', TRUE));
		$recived =$this->security->xss_clean($this->input->post('email', TRUE));
		$message =$this->security->xss_clean($this->input->post('message', TRUE));
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
			redirect('home', 'refresh');
		}
		else
		{ 
		    require_once APPPATH.'third_party/phpmailer/class.phpmailer.php';
			$mail = new PHPMailer();

			$mail->CharSet 		= "utf-8";
			$mail->IsSMTP();
			$mail->SMTPDebug 	= 1;
			$mail->SMTPAuth 	= true;
			$mail->Host 		= "mail.boneorganizer.com"; 
			$mail->Port 		= 587; 
			$mail->Username 	= "info@boneorganizer.com";
			$mail->Password 	= "1aS5FQghiq";

			$mail->SetFrom("info@boneorganizer.com", "boneorganizer.com");
			$mail->Subject = 'ข้อความติดต่อจากหน้าเว็บไซต์';

			$msg = 'ผู้ติดต่อ : ' .$fullname. '<br />';
            $msg .= 'เบอร์โทรศัพท์ : ' .$tel. '<br />';
            $msg .= 'อีเมล : ' .$recived. '<br />';
            $msg .= 'ข้อความ : ' .$message. '<br />';

			$mail->MsgHTML($msg);
            $mail->AddAddress($recived);
            $mail->addBCC('boneorganizer.acc@gmail.com', 'ข้อความติดต่อจากหน้าเว็บไซต์');

			if(!$mail->Send()) {
				echo "<script>
					alert('ส่งขอบความไม่สำเร็จ กรุณาลองอีกครั้ง ขอบคุณค่ะ');
					window.location.href='".base_url("home")."';
				</script>";
			} else {
				$message = 'send';
				echo "<script>
					alert('ระบบได้ทำการส่งอีเมล์เรียบร้อยแล้ว เจ้าหน้าที่จะติดต่อคุณโดยเร็วที่สุด ขอบคุณค่ะ');
                    window.location.href='".base_url("home")."';
				</script>";
			}
        }
	}
}
