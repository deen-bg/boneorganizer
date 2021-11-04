
<body>
     <section class="mt-5 " style="background-color: #ffffff;">
         <div class="container">
             <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                </div>
             </div>
         </div>
     </section>
     <section class="" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row">
                <div data-aos="fade-up"data-aos-duration="1000">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                        <div align="center">
                            <img src="<?=base_url('assets/images/service/cover/'.$s_descs[0]['id'].'/'.$s_descs[0]['img_cover']);?>" id="about-servive" class="img-fluid " align="center"> 
                        </div>      
                    </div>
                </div>
            </div>
        </div>
     </section>
     <section>
         <div class="container">
             <div class="row">
                <div data-aos="fade-up"data-aos-duration="1000">
                 <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-5">
                    <h3 id="service" style="margin-top: 0px;" ><?=$s_descs[0]['name'];?></h3>
                 </div>
                </div>
             </div>
             <div data-aos="fade-up"data-aos-duration="1000">
             <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <?=$s_descs[0]['dsc'];?>
                </div>
             </div>
            </div>
            <section>
                <div class="container">
                  <div data-aos="fade-up"data-aos-duration="1000">
                    <div class="row" align="center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                            <a href="https://line.me/ti/p/_-fl_4clWM" target="_blank">
                                <button type="button" class="btn btn-dark mb-3" id="button-detail">สนใจติดต่อ</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </section>
         </div>
    </section>
    <?php if($num_img > 0) : ?>
        <section style="padding-top: 0px;padding-bottom: 60px;" >
            <div class="container">
                <div class="row">
                    <?php foreach($s_images as $val_img) : ?>
                        <div data-aos="fade-up"data-aos-duration="1000">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                <img src="<?=base_url('./assets/images/service/'.$val_img['service_id'].'/'.$val_img['img_name']);?>" id="about-servive" class="img-fluid " alt="<?=$val_img['title'];?>">     
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <!-- banner -->
    <section style="padding-top: 0px;padding-bottom: 60px;" >
            <div class="container">
                <div class="row">
                        <div data-aos="fade-up"data-aos-duration="1000">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                <img src="<?=base_url('./assets/img/b1-01.png');?>" id="about-servive" class="img-fluid " alt="<?=$val_img['title'];?>">     
                            </div>
                        </div>
                </div>
            </div>
        </section>
