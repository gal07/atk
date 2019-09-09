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
                            <a href="<?= base_url('admin/produk'); ?>" type="button" class="btn btn-block btn-default btn-xs"><i class="fa fa-arrow-left"></i> Kembali Ke Data Produk</a>
                        </h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <form role="form" method="POST" action="<?= base_url('admin/produk/update'); ?>" enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id_produk" name="id_produk" value="<?= $data['id_produk'], set_value('id_produk'); ?>">
                            <input type="hidden" name="old_foto" value="<?= $data['foto'] ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Foto Lama</label>
                                        <img src="<?php echo base_url('./assets/produk/') . $data['foto']; ?>" width="50px" ; height="50px" ; alt="Card image">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Foto Baru</label>
                                        <input type="file" class="form-control" id="foto" name="foto">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Produk</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'], set_value('nama'); ?>">
                                        <small class="text-danger"><?= form_error('nama'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tag IMG ALT</label>
                                        <input type="text" class="form-control" id="alt" name="alt" value="<?= $data['alt'], set_value('alt'); ?>">
                                        <small class="text-danger"><?= form_error('alt'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Unit</label>
                                        <input type="text" class="form-control" id="unit" name="unit" value="<?= $data['unit'], set_value('unit'); ?>">
                                        <small class="text-danger"><?= form_error('unit'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['harga'], set_value('harga'); ?>">
                                        <small class="text-danger"><?= form_error('harga'); ?></small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Stok</label>
                                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $data['stok'], set_value('stok'); ?>">
                                        <small class="text-danger"><?= form_error('stok'); ?></small>
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