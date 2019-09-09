<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
        </h1>
        <ol class="breadcrumb">
            <ol class="breadcrumb">
                <li><a href="<?= base_url('admin/dasbor'); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
                <li class="active"><?= $title; ?></li>
            </ol>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data <?= $title; ?></h3>
                        <h3 class="box-title">
                            <a href="<?= base_url('admin/banner'); ?>" type="button" class="btn btn-block btn-default btn-xs"><i class="fa fa-arrow-left"></i> Kembali Ke Data Produk</a>
                        </h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <form role="form" method="POST" action="<?= base_url('admin/banner/update'); ?>" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id_banner" name="id_banner" value="<?= $data['id_banner'], set_value('id_banner'); ?>">
                            <input type="hidden" name="old_banner" value="<?= $data['banner'] ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Banner Lama</label>
                                        <img src="<?php echo base_url('./assets/banner/') . $data['banner']; ?>" width="50px" ; height="50px" ; alt="Card image">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Banner Baru</label>
                                        <input type="file" class="form-control" id="banner" name="banner">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Posisi</label>
                                        <input type="text" class="form-control" id="posisi" name="posisi" value="<?= $data['posisi'], set_value('posisi'); ?>">
                                        <small class="text-danger"><?= form_error('posisi'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tag IMG ALT</label>
                                        <input type="text" class="form-control" id="alt" name="alt" value="<?= $data['alt'], set_value('alt'); ?>">
                                        <small class="text-danger"><?= form_error('alt'); ?></small>
                                    </div>
                                </div>

                            </div>


                            <button type="submit" class="btn btn-primary btn-xs">Simpan Perubahan</button>

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>