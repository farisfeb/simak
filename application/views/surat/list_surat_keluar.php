<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Surat Keluar</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('simak'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Surat Keluar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata("message"); ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-6">
                                <a class="btn btn-primary btn-sm btn-flat" href="<?php echo site_url('surat/surat_keluar/add'); ?>"><i class="fa fa-plus"></i>
                                    <span class="hidden-xs"> Tambah Data</span></a></li>
                            </div>
                            <div class="box-tools col-xs-6">
                                <form method="post" action="<?php echo site_url('surat/surat_keluar/cari'); ?>">
                                    <div class="input-group input-group-sm" style="width: 100%;">
                                        <input type="text"  style="width: 35%;" id="datepicker" name="t" class="form-control" placeholder="Tgl">
                                        <input type="text"  style="width: 65%;" name="q" class="form-control pull-right" placeholder="Kata kunci">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" style="width: 100%;">
                            <tr>
                                <th style="width: 4%;">No.</th>
                                <th style="width: 30%;">Isi Ringkas, File</th>
                                <th style="width: 6%;">Kode</th>
                                <th style="width: 25%;">Asal Surat</th>
                                <th style="width: 20%;">Nomor, Tgl. Surat</th>
                                <th style="width: 15%;">Aksi</th>
                            </tr>
                            <?php
                            if (empty($data)) {
                                echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                            } else {
                                $no = ($this->uri->segment(4) + 1);
                                foreach ($data as $b) {
                                    ?>
                                    <tr>
                                        <td ><?php echo $b->no_agenda; ?></td>
                                        <td ><?php echo limit_word($b->isi_ringkas, 50, 0) . "<br><b>File : </b><i><a href='" . base_URL() . "upload/surat_keluar/" . $b->file . "' target='_blank'>" . limit_word($b->file, 50, 1) . "</a>"; ?></td>
                                        <td><?php echo $b->kode; ?></td>
                                        <td><?php echo limit_word($b->tujuan, 50, 0); ?></td>
                                        <td ><?php echo $b->no_surat . "<br><i>" . tgl_jam_sql($b->tgl_surat) . "</i>"; ?></td>
                                        <td>
                                            <?php
                                            if ($b->pengolah == $this->session->user_id) {
                                                ?>
                                                <div>
                                                    <a href="<?php echo site_url('surat/surat_keluar/edit'); ?>/<?php echo $b->id ?>"
                                                       data-toggle="tooltip" class="btn btn-success btn-sm" title="Edit Data"><i class="fa fa-pencil"> </i></a>
                                                    <a href="<?php echo site_url('surat/surat_keluar/del'); ?>/<?php echo $b->id ?>"
                                                       data-toggle="tooltip" class="btn btn-danger btn-sm" title="Hapus Data" onclick="return confirm('Anda Yakin..?')"><i class="fa fa-remove"></i></a>			
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
<script type="text/javascript">
    $('#datepicker').datepicker({
        format: 'yy-mm-dd',
        autoclose: true
    });
</script>