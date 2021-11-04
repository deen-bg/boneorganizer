
<body>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left"  >
  </section><!-- End Hero -->
  <main id="main">
    <section class="pt-5 pb-1" id="background-about"  style="background-image: url(./assets/img/abouts/bgabout1.png) ; background-color: #1f1e1e;">
      <div class="container">
        <div class="row">
          <div data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5 ">
              <h3 id="service-4" style="margin-top: 0px;" >เกี่ยวกับเรา</h3>
            </div>
          </div>
        </div>
        <div data-aos="fade-up"data-aos-duration="1000">
          <div class="row ">
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-05 ml-3 mr-3 mb-5">
              <img src="<?=base_url('./assets/images/about/cover/'.$aboutus[0]['id'].'/'.$aboutus[0]['img_cover']);?>" id="about-product-banner" class="img-fluid ">     
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6  mb-5 ">
              <p  id="aboutus-1" > WELOCOME TO <br> B ONE ORGANIZER COMPANY LIMITED</p>
              <div style="font-size: 25px;color: aliceblue;">
                <p  id="aboutus-3"><?=$aboutus[0]['dsc'];?></p>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <section id="services"style="padding-top: 0px;padding-bottom: 0px;">
      <div class="container-fluid" id="service">
        <div class="row">
          <div data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3 mt-5 ">
              <h3 id="service" style="margin-top: 0px;" >บริการของเรา</h3>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5 ml-3 mr-3 ">
              <p id="service6" style="color:#252122"; >บี วัน มีบริการ อันได้แก่ ด้านจดทะเบียนต่างๆ  ด้านบัญชีภาษีอากร  ด้านการประสานงานเสมือนเราเป็นเลขานุการของผู้ประกอบการ<br> ด้านวางระบบบริหารจัดการและการควบคุมภายใน  บี วันฯ เน้นเทคโนโลยีเข้ามาช่วยในการจัดทำบัญชีเป็นระบบบัญชีออนไลน์แบบคลาวด์ <br>  รวมถึงด้านบริการออกแบบ ทำเว็บไซต์ ทุกธุรกิจ จดโดเมน เพื่อรองรับการทำทางการโฆษณา
                การตลาดทางออนไลน์</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="accountingServices" class="p-0">
      <div class="container">
        <div class="row">
          <div data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5 ">
              <h3 id="service" style="margin-top: 0px;" >บริการงานบัญชีครบวงจร</h3>
            </div>
          </div>
        </div>
        <div data-aos="fade-up"data-aos-duration="1000">
          <div class="row mb-3" align="center">
            <?php foreach($service1 as $val1) : 
              $b64 = base64_encode($val1['id']);
              $url = strtr($b64, '+/', '-_');
              $encodedID = rtrim($url, '=');
              ?>
              <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 p-2">
                <div class="justify-content-center">
                  <a href="<?=base_url('service-details/'.$encodedID.'/?name='.$val1['name']);?>">
                    <!-- test -->
                    <div class="gallery">
                      <div class="gallery-image">
                        <img src="<?=base_url('assets/images/core-img/bg-acc.png');?>" alt="<?=$val1['name'];?>" style=" border-radius:20px;width: 100%;" />
                        <div class="gallery-text">
                          <h3>
                            <?php 
                              if($val1['caption'] !='') : 
                                echo $val1['caption'];
                              else : 
                                echo $val1['name'];
                              endif;
                            ?>
                          </h3>
                        </div>    
                      </div>  
                    </div>
                    <!-- end -->
                      <!-- <h3 class="text-dark" id="accountingServices1" style="margin-top: 0px;" ><?//=$val1['name'];?></h3> -->
                    </a>
                  </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
    <section id="registered" class="p-0">
      <div class="container">
        <div class="row">
          <div data-aos="fade-up"data-aos-duration="1000">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5 ">
              <h3 class="mt-3" id="service" style="margin-top: 0px;" >บริการจดทะเบียน</h3>
            </div>
          </div>
        </div>
        <div data-aos="fade-up"data-aos-duration="1000">
          <div class="row mb-3" align="center">
            <?php foreach($service2 as $val2) : 
              $b642 = base64_encode($val2['id']);
              $url2 = strtr($b642, '+/', '-_');
              $encodedID2 = rtrim($url2, '=');
              ?>
              <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 p-2">
                <div class="justify-content-center">
                  <a href="<?=base_url('service-details/'.$encodedID2.'/?name='.$val2['name']);?>">
                    <!-- test -->
                    <div class="gallery">
                      <div class="gallery-image">
                        <img src="<?=base_url('assets/images/core-img/bg-register.png');?>" alt="<?=$val2['name'];?>" style=" border-radius:20px;width: 100%;" />
                        <div class="gallery-text">
                          <h3>
                            <?php 
                              if($val2['caption'] !='') : 
                                echo $val2['caption'];
                              else : 
                                echo $val2['name'];
                              endif;
                            ?>
                          </h3>
                        </div>    
                      </div>  
                    </div>
                    <!-- end -->
                    <!-- <h3 class="text-dark" id="accountingServices1" style="margin-top: 0px;" ><?//=$val2['name'];?></h3> -->
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
    <section id="contact" class="pt-3" style="background-color: #10152c;">
      <div class="container wow fadeInUp">
      <form action="<?=base_url('contact/send');?>" method="post">
              <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" >
        <div data-aos="fade-up">  
          <h1  class="text-center mb-5 mt-5" id="contactus">CONTACT US</h1>
          <div class="row ">
            <div class="col-12 col-sm-12 col-lg-6 col-md-6 col-xl-6  wow fadeInUp ">
              <h3  id="contact1">ที่อยู่ติดต่อ</h3>
              <ul id="footer-11">
                <a href="#" target="_blank">
                  <h4  id="footer-1" style=" color: white;" ><img src="<?=base_url('assets/img/contact/iconb1-07.png');?>" style="width: 7%; "> &nbsp;&nbsp;&nbsp; <?=$contactus[0]['c_add'];?></h4>
                </a>
                <a href="tel:0659199047" target="_blank">
                  <h4 id="footer-1"style=" color: white;"  >
                    <img src="<?=base_url('assets/img/contact/iconb1-01.png');?>" style="width: 7%; ">&nbsp;&nbsp;&nbsp; <?=$contactus[0]['c_tel'];?></h4>
                </a>
                <a href="#" target="_blank">
                  <h4  id="footer-1" style=" color: white;"><img src="<?=base_url('assets/img/contact/iconb1-02.png');?>" style="width: 7%;  ">&nbsp;&nbsp;&nbsp; <?=$contactus[0]['c_line_id'];?></h4>
                </a>
                <a href="#" target="_blank">
                  <h4  id="footer-1"style=" color: white;"><img src="<?=base_url('assets/img/contact/iconb1-03.png');?>" style="width: 7%;">&nbsp;&nbsp;&nbsp; <?=$contactus[0]['c_fb'];?></h4>
                </a>
                <a href="#" target="_blank">
                  <h4  id="footer-1"style=" color: white;"><img src="<?=base_url('assets/img/contact/iconb1-04.png');?>" style="width: 7%; ">&nbsp;&nbsp;&nbsp; <?=$contactus[0]['c_mail'];?></h4>
                </a>
              </ul>
            </div>
              <div class="col-12 col-sm-12 col-lg-6 col-md-6 col-xl-6 mb-2 wow fadeInUp ">
                <h3  id="contact1">Send Message</h3>
                <div class="form-floating mb-3">
                  <input type="text" name="fullname" class="form-control" id="floatingInput" placeholder="Name" style=" border-radius:20px; width:100%;" required >
                  <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" name="email" class="form-control" id="floatingPassword" placeholder="name@example.com" style=" border-radius:20px; width:100%;" required>
                <label for="floatingPassword">Email</label>
              </div>
              <div class="form-floating mb-3">
                <input type="tel" name="tel" class="form-control" id="floatingPassword" placeholder="Tel" style=" border-radius:20px; width:100%;" required>
                <label for="floatingPassword">Tel</label>
              </div>
              <textarea class="form-control" rows="10" placeholder="MESSAGE" name="message" style=" border-radius:20px; width:100%;" required></textarea>
              <div align="center">
                <button type="submit" style="border-radius:10px;width: 40%;color: alicebl; " class="btn btn-warning mt-3">Send Message</button>
              </div>
            
          </div>
        </div>
        </form>
      </div>
    </section>
    <section style="padding-top: 0px;padding-bottom: 0px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="branch-p wow fadeInUp">
              <div class="bra-img wow fadeInUp">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248018.4641294495!2d100.34911664678208!3d13.761467681428861!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2961055cfdc93%3A0xabc86581323c4d47!2z4LiW4LiZ4LiZIOC4nuC4uOC4l-C4mOC4oeC4k-C4keC4peC4quC4suC4oiDguZMg4LmB4LiC4Lin4LiHIOC4q-C4meC4reC4h-C4hOC5ieC4suC4h-C4nuC4peC4uSDguYDguILguJXguKvguJnguK3guIfguYHguILguKEg4LiB4Lij4Li44LiH4LmA4LiX4Lie4Lih4Lir4Liy4LiZ4LiE4LijIDEwMTYw!5e0!3m2!1sth!2sth!4v1634638339399!5m2!1sth!2sth" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

   
   