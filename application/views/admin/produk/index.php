<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title; ?>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('admin/dasbor'); ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><?= $title; ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data <?= $title; ?></h3>
                        <h3 class="box-title">
                            <a href="" type="button" class="btn btn-block btn-primary btn-xs" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Tambah Produk</a>
                        </h3>

                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <?php if (validation_errors()) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4> <?= validation_errors(); ?></h4>
                            </div>
                        <?php endif; ?>

                        <?= $this->session->flashdata('message'); ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Unit</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($data != null) {
                                    $i = 1;
                                    foreach ($data as $value) :

                                        ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $value['nama']; ?></td>
                                            <td>
                                                <img src="<?php echo base_url('assets/produk/') . $value['foto']; ?>" alt="<?= $value['alt'] ?>" height="50px" ;>
                                            </td>
                                            <td><?= $value['unit']; ?></td>
                                            <td>Rp. <?= number_format($value['harga']); ?>,-</td>
                                            <td><?= $value['stok']; ?></td>
                                            <td>
                                                <?php if ($value['aktif'] == 1) : ?>
                                                    <form action="<?= base_url('admin/produk/enable'); ?>" method="post">
                                                        <input type="hidden" name="id_produk" value="<?= $value['id_produk']; ?>">
                                                        <input type="hidden" name="status" value="0">
                                                        <button type="submit" class="btn btn-success btn-xs">Aktif</button>
                                                    </form>

                                                <?php elseif ($value['aktif'] == 0) : ?>
                                                    <form action="<?= base_url('admin/produk/disable'); ?>" method="post">
                                                        <input type="hidden" name="id_produk" value="<?= $value['id_produk']; ?>">
                                                        <input type="hidden" name="status" value="1">
                                                        <button type="submit" class="btn btn-danger btn-xs">Tidak Aktif</button>
                                                    </form>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-warning btn-xs" href="<?= base_url('admin/produk/update?id=' . $value['id_produk'] . '') ?>"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger btn-xs" href="<?= base_url('admin/produk/delete?id=' . $value['id_produk'] . '&pict=' . $value['foto']) ?>"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    endforeach; ?>

                                <?php
                            } else { ?>
                                    <tr>
                                        <td colspan="8" class="text-center"><?php echo "Data Kosong" ?></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>

                                    </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
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
<!-- /.content-wrapper -->
<div class="modal modal-default fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Produk Baru</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?= base_url('admin/produk'); ?>" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Produk" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="">Foto Produk</label>
                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukan Foto" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="">Tag ALT</label>
                            <input type="text" class="form-control" id="alt" name="alt" placeholder="Masukan Tag ALT" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit" placeholder="Masukan Jenis Unit" autocomplete="off">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukan Harga" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Stok</label>
                                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukan Jumlah Stok" autocomplete="off">
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- /.box-body -->


                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark pull-left" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah Produk</button>
                    </div>

                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>