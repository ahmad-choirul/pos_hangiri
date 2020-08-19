<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Page Title -->
  <title>Babe'Q - Asian Fushion Food</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/images/logo/faviconn.png" type="image/x-icon">

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
  <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
  <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
  <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script rel="stylesheet" href="assets/js/vendor/bootstrap-4.1.3.js"></script>


</head>
<body>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
     <div>
       <button type="button" class="btn btn-sm btn-danger pull-right" style="color: white;" data-dismiss="modal">X</button>

     </div>
     <div class="modal-body">

      <div class="row">

        <div class="col-lg-5">
          <!--Carousel Wrapper-->
          <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
          data-ride="carousel">
          <!--Slides-->
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block w-100"
              src="assets/images/disc.png"
              alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100"
              src="assets/images/menu1.png"
              alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100"
              src="assets/images/menu2.png"
              alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100"
              src="assets/images/menu3.png"
              alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100"
              src="assets/images/menu4.png"
              alt="Third slide">
            </div>
          </div>
          <!--/.Slides-->
          <!--Controls-->
          <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <!--/.Controls-->
          <ol class="carousel-indicators">
            <li data-target="#carousel-thumb" data-slide-to="0" class="active">
              <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(23).jpg" width="60">
            </li>
            <li data-target="#carousel-thumb" data-slide-to="1">
              <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(24).jpg" width="60">
            </li>
            <li data-target="#carousel-thumb" data-slide-to="2">
              <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/img%20(25).jpg" width="60">
            </li>
          </ol>
        </div>
        <!--/.Carousel Wrapper-->
      </div>
      <div class="col-lg-7">
       <!--      <h2 class="h2-responsive product-name">
              <strong>Product Name</strong>
            </h2>
            <h4 class="h4-responsive">
              <span class="green-text">
                <strong>$49</strong>
              </span>
              <span class="grey-text">
                <small>
                  <s>$89</s>
                </small>
              </span>
            </h4> -->

            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
             <!--    <div class="card-header" style="background-color: #ffcc00; color: black;" role="tab">



                 <button type="button" class="btn btn-sm btn-secondary pull-right" style="color: white;" data-dismiss="modal">X</button>

               </div> -->

               <!-- Card body -->
          <!--      <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
               data-parent="#accordionEx">
               <div class="card-body">
                <b style="color: #101112;">Daftar dan dapatkan diskon tanpa minimal order</b> <br>
                Ketentuan utama : <br>
                - Pastikan kamu sudah follow ig kami di @babeq_official <br>
                - Isi form voucher dibawah ini <br>
                - Promo berlaku mulai 00-00-0000 s/d 00-00-0000
              </div>
              <div class="container">
                <form action="//www.office.babe-q.com/api/promositambahweb" method="POST">
                  <div class="panel-body">
                    <div class="form-group mt-lg nama">
                      <label class="col-sm-6 control-label">Nama<span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control" required/>
                      </div>
                    </div> 
                    <div class="form-group mt-lg instagram">
                      <label class="col-sm-6 control-label">Instagram<span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="instagram" class="form-control" required/>
                      </div>
                    </div> 
                    <div class="form-group mt-lg tanggal_lahir">
                      <label class="col-sm-6 control-label">Tanggal Lahir<span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="date" name="tanggal_lahir" class="form-control" required/>
                      </div>
                    </div> 
                    <div class="form-group mt-lg hp">
                      <label class="col-sm-6 control-label">hp<span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="hp" class="form-control" required/>
                      </div>
                    </div> 
                  </div>
                  <footer class="panel-footer">
                    <div class="row">
                      <div class="col-md-12 text-right">
                        <button class="btn btn-primary modal-confirm" type="submit" id="submitform">Submit</button>
                        <button class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </footer>
                </form>
              </div>
            </div> -->

          </div>
          <!-- Accordion card -->

          <!-- Accordion card -->
          <div class="card">

            <!-- Card header -->
               <!--  <div class="card-header" role="tab" id="headingTwo2">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                    aria-expanded="false" aria-controls="collapseTwo2">
                    <h5 class="mb-0">
                      Pastikan kamu sudah follow ig kami di @babeq_official
                    </h5>
                  </a>
                </div>
              -->
              <!-- Card body -->
              <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
              data-parent="#accordionEx">
              <div class="card-body">

              </div>
            </div>

          </div>
          <!-- Accordion card -->

          <!-- Accordion card -->
          <div class="card">

            <!-- Card header -->


            <!-- Card body -->
            <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
            data-parent="#accordionEx">
            <div class="card-body">

            </div>
          </div>

        </div>
        <!-- Accordion card -->

      </div>
      <!-- Accordion wrapper -->


      <!-- Add to Cart -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
                   <!--  <div class="form-control">
                        <input type="text" class="form-group" placeholder="nama anda" name="nama"> <br>
                         <input type="text" class="form-group" placeholder="nama instagram" name="instagram"><br>
                         <input type="text" class="form-group" placeholder="umur anda" name="umur">
                       </div> -->
                     </div>

                   </div>
                   <div class="text-center">
                     <!--   <button type="button" class="btn btn-primary  " data-dismiss="modal">Daftar</button> -->
                     <!--   <button type="button" class="btn btn-warning pull-right " data-dismiss="modal">Close</button> -->

                   </div>
                 </div>
                 <!-- /.Add to Cart -->
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- Preloader Starts -->
     <div class="preloader">
      <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <header class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-2">
            <div class="logo-area">
              <a href="index.html"><img src="assets/images/logo/logo21.png" alt="logo"></a>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="custom-navbar">
              <span></span>
              <span></span>
              <span></span>
            </div>  
            <div class="main-menu">
              <ul>
                <li class="active"><a href="index.html">home</a></li>
                          <!--   <li><a href="about.html">about</a></li>
                            <li><a href="menu.html">menu</a></li>
                            <li><a href="#">blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-home.html">Blog Home</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                              </li> -->
                              <!--  <li><a href="contact-us.html">contact</a></li> -->
                              <!--   <li><a href="elements.html">Elements</a></li> -->
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </header>
                  <!-- Header Area End -->

                  <!-- Banner Area Starts -->
                  <section class="banner-area text-center">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12">
                          <h6></h6>
                          <h1>Discover the flavors <span class="prime-color">of</span><br>  
                            <span class="style-change">Asian <span class="prime-color">fushion</span> food</span></h1>
                          </div>
                        </div>
                      </div>
                    </section>
                    <!-- Banner Area End -->

                    <!-- Welcome Area Starts -->
                    <section class="welcome-area section-padding2">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-6 align-self-center">
                            <div class="welcome-img">
                              <img src="assets/images/welcome.png" class="img-fluid" alt="">
                            </div>
                          </div>
                          <div class="col-md-6 align-self-center">
                            <div class="welcome-text mt-5 mt-md-0">
                              <h3><span class="style-change">Selamat Datang di </span> <br>Babe'Q</h3>
                              <p class="pt-3">Restoran yang menyajikan aneka menu barbeque, sushi dan suki yang merupakan perpaduan rasa yang ada di Asia. Rasa yang dapat memanjakan lidah anda.</p>


                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <!-- Welcome Area End -->

                    <!-- Food Area starts -->
                    <section class="food-area section-padding">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-5">
                            <div class="section-top">
                              <h3><span class="style-change">Kami menyajikan</span> <br>makanan lezat </h3>
                              <p class="pt-3">They're fill divide i their yielding our after have him fish on there for greater man moveth, moved Won't together isn't for fly divide mids fish firmament on net.</p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 col-sm-6">
                            <div class="single-food">
                              <div class="food-img">
                                <img src="assets/images/foodie/SHABU BEEF.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="food-content">
                                <div class="d-flex justify-content-between">
                                  <h5>Shabu Beef</h5>
                                  <span class="style-change">Rp. 40.000</span>
                                </div>
                                <p class="pt-3">Sawi putih,enoki,wortel,pekcoy,daun bawang,beef,cabe dan kaldu</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <div class="single-food mt-5 mt-sm-0">
                              <div class="food-img">
                                <img src="assets/images/food2.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="food-content">
                                <div class="d-flex justify-content-between">
                                  <h5>chicken burger</h5>
                                  <span class="style-change">$9.50</span>
                                </div>
                                <p class="pt-3">Face together given moveth divided form Of Seasons that fruitful.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <div class="single-food mt-5 mt-md-0">
                              <div class="food-img">
                                <img src="assets/images/food3.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="food-content">
                                <div class="d-flex justify-content-between">
                                  <h5>topu lasange</h5>
                                  <span class="style-change">$12.50</span>
                                </div>
                                <p class="pt-3">Face together given moveth divided form Of Seasons that fruitful.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <div class="single-food mt-5">
                              <div class="food-img">
                                <img src="assets/images/food4.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="food-content">
                                <div class="d-flex justify-content-between">
                                  <h5>pepper potatoas</h5>
                                  <span class="style-change">$14.50</span>
                                </div>
                                <p class="pt-3">Face together given moveth divided form Of Seasons that fruitful.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <div class="single-food mt-5">
                              <div class="food-img">
                                <img src="assets/images/food5.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="food-content">
                                <div class="d-flex justify-content-between">
                                  <h5>bean salad</h5>
                                  <span class="style-change">$8.50</span>
                                </div>
                                <p class="pt-3">Face together given moveth divided form Of Seasons that fruitful.</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6">
                            <div class="single-food mt-5">
                              <div class="food-img">
                                <img src="assets/images/food6.jpg" class="img-fluid" alt="">
                              </div>
                              <div class="food-content">
                                <div class="d-flex justify-content-between">
                                  <h5>beatball hoagie</h5>
                                  <span class="style-change">$11.50</span>
                                </div>
                                <p class="pt-3">Face together given moveth divided form Of Seasons that fruitful.</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                    <!-- Food Area End -->

                    <!-- Reservation Area Starts -->
                    <div class="reservation-area section-padding text-center">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-12">
                            <h2>Natural ingredients and testy food</h2>
                            <h4 class="mt-4">some trendy and popular courses offerd</h4>
                            <a href="" class="template-btn template-btn2 mt-4">reservation</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Reservation Area End -->

                    <!-- Deshes Area Starts -->
                    <div class="deshes-area section-padding">
                      <div class="container">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="section-top2 text-center">
                              <h3>Our <span>special</span> deshes</h3>
                              <p><i>Beast kind form divide night above let moveth bearing darkness.</i></p>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-5 col-md-6 align-self-center">
                            <h1>01.</h1>
                            <div class="deshes-text">
                              <h3><span>Garlic</span><br> green beans</h3>
                              <p class="pt-3">Be. Seed saying our signs beginning face give spirit own beast darkness morning moveth green multiply she'd kind saying one shall, two which darkness have day image god their night. his subdue so you rule can.</p>
                              <span class="style-change">$12.00</span>
                              <a href="#" class="template-btn3 mt-3">book a table <span><i class="fa fa-long-arrow-right"></i></span></a>
                            </div>
                          </div>
                          <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0">
                            <img src="assets/images/deshes1.png" alt="" class="img-fluid">
                          </div>
                        </div>
                        <div class="row mt-5">
                          <div class="col-lg-5 col-md-6 align-self-center order-2 order-md-1 mt-4 mt-md-0">
                            <img src="assets/images/deshes2.png" alt="" class="img-fluid">
                          </div>
                          <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center order-1 order-md-2">
                            <h1>02.</h1>
                            <div class="deshes-text">
                              <h3><span>Lemon</span><br> rosemary chicken</h3>
                              <p class="pt-3">Be. Seed saying our signs beginning face give spirit own beast darkness morning moveth green multiply she'd kind saying one shall, two which darkness have day image god their night. his subdue so you rule can.</p>
                              <span class="style-change">$12.00</span>
                              <a href="#" class="template-btn3 mt-3">book a table <span><i class="fa fa-long-arrow-right"></i></span></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Deshes Area End -->

                    <!-- Testimonial Area Starts -->
   <!--  <section class="testimonial-area section-padding4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Customer <span>says</span></h3>
                        <p><i>Beast kind form divide night above let moveth bearing darkness.</i></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-slider owl-carousel">
                        <div class="single-slide d-sm-flex">
                            <div class="customer-img mr-4 mb-4 mb-sm-0">
                                <img src="assets/images/customer1.png" alt="">
                            </div>
                            <div class="customer-text">
                                <h5>adame nesane</h5>
                                <span><i>Chief Customer</i></span>
                                <p class="pt-3">You're had. Subdue grass Meat us winged years you'll doesn't. fruit two also won one yielding creepeth third give may never lie alternet food.</p>
                            </div>
                        </div>
                        <div class="single-slide d-sm-flex">
                            <div class="customer-img mr-4 mb-4 mb-sm-0">
                                <img src="assets/images/customer2.png" alt="">
                            </div>
                            <div class="customer-text">
                                <h5>adam nahan</h5>
                                <span><i>Chief Customer</i></span>
                                <p class="pt-3">You're had. Subdue grass Meat us winged years you'll doesn't. fruit two also won one yielding creepeth third give may never lie alternet food.</p>
                            </div>
                        </div>
                        <div class="single-slide d-sm-flex">
                            <div class="customer-img mr-4 mb-4 mb-sm-0">
                                <img src="assets/images/customer1.png" alt="">
                            </div>
                            <div class="customer-text">
                                <h5>adame nesane</h5>
                                <span><i>Chief Customer</i></span>
                                <p class="pt-3">You're had. Subdue grass Meat us winged years you'll doesn't. fruit two also won one yielding creepeth third give may never lie alternet food.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="update-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Our <span>food</span> update</h3>
                        <p><i>Beast kind form divide night above let moveth bearing darkness.</i></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="single-food">
                        <div class="food-img">
                            <img src="assets/images/update1.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="food-content">
                            <div class="post-admin d-lg-flex mb-3">
                                <span class="mr-5 d-block mb-2 mb-lg-0"><i class="fa fa-user-o mr-2"></i>Admin</span>
                                <span><i class="fa fa-calendar-o mr-2"></i>18/09/2018</span>
                            </div>
                            <h5>no finer food can be found</h5>
                            <p>nancy boy off his nut so I said chimney pot be James Bond aking cakes he.</p>
                            <a href="#" class="template-btn3 mt-2">read more <span><i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-food my-5 my-md-0">
                        <div class="food-img">
                            <img src="assets/images/update2.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="food-content">
                            <div class="post-admin d-lg-flex mb-3">
                                <span class="mr-5 d-block mb-2 mb-lg-0"><i class="fa fa-user-o mr-2"></i>Admin</span>
                                <span><i class="fa fa-calendar-o mr-2"></i>20/09/2018</span>
                            </div>
                            <h5>things go better with food</h5>
                            <p>nancy boy off his nut so I said chimney pot be James Bond aking cakes he.</p>
                            <a href="#" class="template-btn3 mt-2">read more <span><i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-food">
                        <div class="food-img">
                            <img src="assets/images/update3.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="food-content">
                            <div class="post-admin d-lg-flex mb-3">
                                <span class="mr-5 d-block mb-2 mb-lg-0"><i class="fa fa-user-o mr-2"></i>Admin</span>
                                <span><i class="fa fa-calendar-o mr-2"></i>22/09/2018</span>
                            </div>
                            <h5>food head above the rest</h5>
                            <p>nancy boy off his nut so I said chimney pot be James Bond aking cakes he.</p>
                            <a href="#" class="template-btn3 mt-2">read more <span><i class="fa fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section> -->
      <!-- Update Area End -->

      <!-- Table Area Starts -->
<!--     <section class="table-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Book <span>your</span> table</h3>
                        <p><i>Beast kind form divide night above let moveth bearing darkness.</i></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="#">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            </div>
                            <input type="text" id="datepicker">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                            </div>
                            <input type="text" id="datepicker2">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-user-o"></i></span>
                            </div>
                            <input type="text">
                        </div>
                        <div class="table-btn text-center">
                            <a href="#" class="template-btn template-btn2 mt-4">book a table</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </section> -->
      <!-- Table Area End -->


      <!-- Footer Area Starts -->
      <footer class="footer-area">
        <div class="footer-widget section-padding">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="single-widget single-widget1">
                  <a href="index.html"><img src="assets/images/logo/logo21.png" alt=""></a>
                  <p class="mt-3">Which morning fourth great won't is to fly bearing man. Called unto shall seed, deep, herb set seed land divide after over first creeping. First creature set upon stars deep male gathered said she'd an image spirit our</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-widget single-widget2 my-5 my-md-0">
                  <h5 class="mb-4">Hubungi Kami di</h5>
                  <div class="d-flex">
                    <div class="into-icon">
                      <i class="fa fa-map-marker"></i>
                    </div>
                    <div class="info-text">
                      <p>Jl. Wijaya Kusuma No.50, Pagah, Jemberlor, Kec. Patrang, Kabupaten Jember, Jawa Timur 68118 </p>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="into-icon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <div class="info-text">
                      <p>(0331) </p>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="into-icon">
                      <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="info-text">
                      <p>babeq5758@gmail.com</p>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div class="into-icon">
                      <i class="fa fa-instagram"></i>
                    </div>
                    <div class="info-text">
                      <p>@...</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-widget single-widget3">
                  <h5 class="mb-4">Jam Buka</h5>
                  <p>Monday ...................... Closed</p>
                  <p>Tue-Fri .............. 10 am - 12 pm</p>
                  <p>Sat-Sun ............... 8 am - 11 pm</p>
                  <p>Holidays ............. 10 am - 12 pm</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-copyright">
          <div class="container">
            <div class="row">
              <div class="col-lg-7 col-md-6">
                <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This page is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib x Babe'Q</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                </div>
                   <!--  <div class="col-lg-5 col-md-6">
                        <div class="social-icons">
                            <ul>
                                <li class="no-margin">Follow Us</li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </footer>
              <!-- Footer Area End -->


              <!-- Javascript -->
              <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
              <script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
              <script src="assets/js/vendor/wow.min.js"></script>
              <script src="assets/js/vendor/owl-carousel.min.js"></script>
              <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
              <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
              <script src="assets/js/main.js"></script>
              <script type="text/javascript">
                $(function() {
                  $("#myModal").modal();
                });
              </script>
            </body>
            </html>
