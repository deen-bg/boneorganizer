
<body>
  <section class="mt-4" id="service-banner">
    <div class="container-fluid">
    <img src="<?=base_url('assets/img/banner/bannerservice.png');?>" style="width: 100%;">
    </div>
  </section>
  
     <section id="services"style="padding-top: 0px;padding-bottom: 0px;">
    <div class="container-fluid" id="service">
        <div class="row">
        <div data-aos="fade-up"data-aos-duration="1000">
          <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
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
            <h3 class="mt-3" id="service" style="margin-top: 0px;" >บริการงานบัญชีครบวงจร</h3>
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
            <h3 id="service" style="margin-top: 0px;" >บริการจดทะเบียน</h3>
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

 