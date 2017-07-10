<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Klasifikasi Surat<small>Peraturan Menteri Agama Nomor 44 Tahun 2010</small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('simak'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Klasifikasi Surat</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata("message"); ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <a class="btn btn-primary btn-sm btn-flat" href="<?php echo site_url('surat/klas_surat/add'); ?>"><i class="fa fa-plus"></i><span class="hidden-xs"> Tambah Data</span></a></li>
                        <div class="box-tools">
                            <form class="input-group input-group-sm" method="post" action="<?php echo site_url('surat/klas_surat/cari'); ?>">
                                <input type="text" name="q" class="form-control pull-right" placeholder="Kata kunci">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" style="width: 100%;">
                            <tr>
                                <th style="width: 10%;">Kode</th>
                                <th style="width: 20%;">Nama</th>
                                <th style="width: 60%;">Bobot</th>
                                <th style="width: 10%;">Aksi</th>
                            </tr>
                            <?php
                            if (empty($data)) {
                                echo "<tr><td colspan='4'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                            } else {
                                $no = ($this->uri->segment(4) + 1);
                                foreach ($data as $b) {
                                    ?>
                                    <tr>
                                        <td ><?php echo $b->kode; ?></td>
                                        <td ><?php echo limit_word($b->nama, 50, 0); ?></td>
                                        <td><?php echo limit_word($b->uraian, 200, 0); ?></td>
                                        <td>
                                            <?php
                                            if ($this->session->user_level == "Admin") {
                                                ?>
                                                <div>
                                                    <a href="<?php echo site_url('surat/klas_surat/edit'); ?>/<?php echo $b->id ?>"
                                                       data-toggle="tooltip" class="btn btn-success btn-sm" title="Edit Data"><i class="fa fa-pencil"> </i></a>
                                                    <a href="<?php echo site_url('surat/klas_surat/del'); ?>/<?php echo $b->id ?>"
                                                       data-toggle="tooltip" class="btn btn-danger btn-sm" title="Delete Data" onclick="return confirm('Anda Yakin..?')"><i class="fa fa-remove"> </i></a>
                                                </div>	
                                                <?php
                                            } else {
                                                ?>
                                                <div class="label label-danger">No Action</div>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer box-tools clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <?php echo $pagi; ?>
                        </ul>
                    </div>
                </div> 
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->