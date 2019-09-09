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
                                    <th>E-mail</th>
                                    <th>Subjek</th>
                                    <th>Pesan</th>
                                    <th>Tanggal</th>
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
                                            <td><?= $i; ?>.</td>
                                            <td><?= $value['nama']; ?></td>
                                            <td><?= $value['email']; ?></td>
                                            <td><?= $value['subjek']; ?></td>
                                            <td><?= $value['pesan']; ?></td>
                                            <td><?= $value['tanggal']; ?></td>
                                            <td><a class="btn btn-danger btn-xs" href="<?= base_url('admin/pesan/delete?id=' . $value['id_pesan'] . '') ?>"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        <?php
                                        $i++;
                                    endforeach; ?>

                                <?php
                            } else { ?>
                                    <tr>
                                        <td colspan="7" class="text-center"><?php echo "Pesan Kosong" ?></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>

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