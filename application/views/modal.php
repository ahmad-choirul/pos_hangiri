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
								src="assets/images/promo2.png"
								alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100"
								src="assets/images/promo.png"
								alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100"
								src="assets/images/promo3.png"
								alt="Third slide">
							</div>
							
						<!-- 		<img class="d-block w-100"
								src="assets/images/menu3.png"
								alt="Third slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100"
								src="assets/images/menu4.png"
								alt="Third slide">
							</div> -->
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

                  <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                     
                     <div class="card">

                         
                        <div class="card-header" style="background-color: #ffcc00; color: black;" role="tab">



                           <button type="button" class="btn btn-sm btn-secondary pull-right" style="color: white;" data-dismiss="modal">X</button>

                       </div>

                       <?php if ($this->input->get('kode')!=''): ?>
                          <?php if ($this->input->get('kode')=='gagal'): ?>
                             maaf anda gagal mendapatkan kode promo
                             <?php elseif($this->input->get('kode')=='instagram'): ?>
                                Maaf Instagram anda sudah terdaftar di Promo
                                <?php else: ?>
                                    <div style="background-color: #00b5d9;color: white;text-align: center; font-size: 15px;">
                                     Yeay Kamu dapat voucher promo !! <br>
                                 </div>
                                 <div>

                                     <br>
                                     <ol>Cara Claim Voucher : 
                                        <li>Reservasi ke CS Babeq di 0822-5708-9500 max H-1 sebelum order</li>
                                        <li>Datang ke kedai Babe-Q di Jl. Wijaya Kusuma No.50 Pagah Kec. Patrang (Depan Stasiun Jember) </li>
                                        <li>Pilih menu favoritmu dengan min belanja 50K</li>
                                        <li>Tunjukkan kode voucher kamu pada kasir kami </li>
                                        <li>Jangan lupa juga tunjukkan bahwa kamu memang sudah follow kami di instagram</li>
                                        <li>Selamat kamu dapat diskon 30% dan Jangan lupa pilih 1 menu gratis </li>
                                    </ol>
                                </div>



                                <br>
                                <div class="card-body" style="background-color: #ffc003;font-size: 40px;text-align: center;">
                                 <b style="color:white;"><?php echo $this->input->get('kode') ?></b>
                             </div>

                         <?php endif ?>
                         <?php else: ?>
                            <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                            data-parent="#accordionEx">
                            <div class="card-body" style="background-color: #ffc003;font-size: 40px;text-align: center;">
                                <b style="color:white;">Selamat Hari Anak </b>
                            </div>
                            <div class="card-body">

                             <ol><b style="color: #101112;">Cara dapetin promo nya gampang banget !!!!</b> 
                                <li > Pastikan kamu sudah follow ig kami di @babeq_official</li>
                                <li> Komen dan Tag 2 temen kamu di postingan promo ini </li>
                                <li> Jadikan story dan tag @babeq_official </li>
                                <li> Bagi 100 orang yang beruntung dan sudah mengikuti rule akan mendapatkan voucher melalui DM instagram</li>
                            </ol>
                        </div>
                        <div class="container">
                           <form action="//www.babe-q.com/promo/promositambahweb" method="POST">
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
</div>
<?php endif ?>

</div>
<div class="card">

  <!-- Card header -->
  <div class="card-header" role="tab" id="headingTwo2">
      <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
      aria-expanded="false" aria-controls="collapseTwo2">
      <h5 class="mb-0">
          Pastikan kamu sudah follow ig kami di @babeq_official
      </h5>
  </a>
</div>


<div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
data-parent="#accordionEx">
<div class="card-body">

</div>
</div>

</div>
<div class="card">


   <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
   data-parent="#accordionEx">
   <div class="card-body">

   </div>
</div>

</div>


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