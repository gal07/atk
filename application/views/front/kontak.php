<!-- offer block Start  -->
<div id="offer">
    <div class="container">
        <div class="offer">
            <p>TELUSURI DAN HUBUNGI KAMI</p>
        </div>
    </div>
</div>
<!-- offer block end  --
<!-- bredcrumb and page title block start  -->
<div id="bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="page-title">
                    <h4>Kontak Kami</h4>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="bread-crumb">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- bredcrumb and page title block end  -->
<div id="contact-page-contain">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.325261068889!2d106.78088231425818!3d-6.220770662658058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6cd0000003d%3A0x1f5fa010fece9b0b!2sKampus%20Babastudio%20Permata%20Hijau!5e0!3m2!1sen!2sid!4v1567756157354!5m2!1sen!2sid" width="1820" height="450" frameborder="0" style="border:0;" allowfullscreen="">
                    </iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="contact-title">
                    <h2 class="tf">Kontak</h2>
                    <p class="text-center">Kirim Saran dan Kritik untuk Kemajuan Toko Reggie </p>
                </div>
            </div>
        </div>
        <div class="contact-submit">
            <form action="<?= base_url(); ?>Toko/pesan" method="POST">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap *" required>
                        </div>
                        <!-- /input-group -->

                        <div class="input-group">
                            <input type="text" class="form-control" name="subjek" placeholder="Subjek *" required>
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <!-- /input-group -->
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="E-mail *" required>
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <textarea class="form-control" name="pesan" id="textarea_message" placeholder="Isi Pesan *"></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-envelope-o"></i> Kirim </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="address">
                    <h2 class="tf"><i class="fa fa-map-marker"></i></h2>
                    <div class="address-info">Warehouse & Offices 12345 Street name, California, USA </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="complaint">
                    <h2 class="tf"><i class="fa fa-mobile"></i></h2>
                    <div class="call-info">+91 987-654-321<br>
                        <span>+0987-654-321</span> </div>
                </div>
            </div>

        </div>
    </div>
</div>