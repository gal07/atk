<!-- Footer block Start  -->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="newslatter">

                    <h2 class="tf">Untuk Berlangganan Tentang Produk Toko Reegie</h2>
                    <p>Silakan cantumkan email kamu dikolom email dan klik tombol Berlangganan</p>
                    <div class="input-group">
                        <form action="<?= base_url(); ?>Toko/create" method="POST">
                            <input class="form-control" type="email" name="email" autocomplete="off" placeholder="Masukan Email......">
                            <button type="submit" class="btn btn-large btn-primary">Berlangganan</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="about">
                    <div class="">
                        <img src="<?= base_url(); ?>assets/frontend/images/logo.png" alt="">
                    </div>

                </div>
            </div>

            <div class="col-md-9">
                <div class="contact">
                    <h4>Contact Us</h4>
                    <ul class="toggle-footer">
                        <li> <i class="fa fa-map-marker"></i>
                            <div class="address-info">Warehouse & Offices 12345 Street name,California, USA </div>
                        </li>
                        <li> <i class="fa fa-mobile"></i>
                            <div class="call-info">+91 987-654-321<br>
                                <span>+0987-654-321</span> </div>
                        </li>
                        <li> <i class="fa fa-envelope"></i>
                            <div class="email-info"> <a href="#">support@lionode.com</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="social-link">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copy-right">
                        <p> All Rights Reserved. Copyright 2017 Powered by lionode.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-offer">
            <h2>Deals of the Day: Unbox Latest Offers & Deals Every Single Day at Store.</h2>
        </div>
    </div>
</footer>
<!-- Footer block End  -->

</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?= base_url(); ?>assets/frontend/js/jQuery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= base_url(); ?>assets/frontend/Bootstrap/js/bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/frontend/js/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/frontend/js/globle.js"></script>
</body>

</html>