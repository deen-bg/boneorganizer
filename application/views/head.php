
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>B ONE ORGANIZER COMPANY LIMITED</title>
  

  <meta content="description" name="บริษัท บี วัน ออร์แกไนเซอร์ จำกัด บริการจดทะเบียน บริการวางระบบบัญชี วิเคราะห์งบการเงิน พร้อมทีมตรวจสอบบัญชีบริการด้านบัญชีภาษีอากร">
  <meta content="keywords" name="B ONE, บริการจดทะเบียน, วางระบบบัญชี, วิเคราะห์งบการเงิน |"> 

  <!-- Favicons -->
  <link rel="shortcut icon" type="image/ico" href="<?=base_url('./assets/img/logo/favicon.ico');?>">
  <link href="<?=base_url('assets/img/logo/B ONE.png');?>" rel="icon">
  <link href="<?=base_url('assets/img/logo/B ONE.png');?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/boxicons/css/boxicons.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/glightbox/css/glightbox.min.css');?>" rel="stylesheet">
  <link href="<?=base_url('assets/vendor/swiper/swiper-bundle.min.css');?>" rel="stylesheet">

  <link href="<?=base_url('assets/lib/aos/aos.css');?>" rel="stylesheet">
  <link href="<?=base_url('assets/lib/animate/animate.min.css');?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url('assets/css/style.css');?>" rel="stylesheet">

<style>
  body{
    overflow-x: hidden;
  }  
</style>
</head>
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container d-flex align-items-center">
    <div class="logo me-auto">
      <a href="<?=base_url('home');?>"><img src="<?=base_url('assets/img/logo/B ONE.png');?>" class="img-fluid" ></a>
    </div>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li>
          <a class="nav-link scrollto <?=($this->uri->segment(1)=='home') ? 'active' : ''; ?>" href="<?=base_url('home');?>">HOME</a>
        </li>
        <li>
          <a class="nav-link scrollto <?=($this->uri->segment(1)=='service' || $this->uri->segment(1)=='service-details') ? 'active' : ''; ?>" href="<?=base_url('service');?>">SERVICE</a>
        </li>
        <li>
          <a class="nav-link scrollto " href="#contact">CONTACT US</a>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
</header>