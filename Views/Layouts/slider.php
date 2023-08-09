<section class="slider_section ">
   <div class="slider_bg_box">
        <img src="/public/images/slider-bg.jpg" alt="">
   </div>
   <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
            <?php foreach ($banner as $item):
               if ($item['id'] == 1) {
                  $active = "active";
               } else {
                  $active = "";
               }
               ?>
            <div class="carousel-item <?php echo $active ?>">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-7 col-lg-6 ">
                            <div class="detail-box">
                                <h1>
                                    <span>
                                        <?php echo $item['title']  ?>
                                    </span>
                                    <br>
                                    <?php echo $item['detail']  ?>
                                </h1>
                                <p>
                                    <?php echo $item['description']  ?>
                                </p>
                                <div class="btn-box">
                                    <a href="" class="btn1">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
               <?php endforeach; ?>
        </div>
         <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
               <span class="sr-only">Next</span>
         </a>
      <div class="container">
         <ol class="carousel-indicators">
               <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
               <li data-target="#customCarousel1" data-slide-to="1"></li>
               <li data-target="#customCarousel1" data-slide-to="2"></li>
         </ol>
      </div>
</section>