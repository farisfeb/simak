<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Disposisi Surat</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('simak'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Disposisi Surat</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        echo $this->session->flashdata("judul_surat");
        echo $this->session->flashdata("message");
        ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-3">
                                <a class="btn btn-primary btn-sm btn-flat" href="<?php echo site_url('surat/surat_disposisi'); ?>/<?php echo $this->uri->segment(3) ?>/add">
                                    <i class="fa fa-plus"></i><span class="hidden-xs"> Tambah Data</span></a></li>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" style="width: 100%;">
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 25%;">Tujuan Disposisi</th>
                                <th style="width: 40%;">Isi Disposisi</th>
                                <th style="width: 20%;">Sifat, Batas Waktu</th>
                                <th style="width: 10%;">Aksi</th>
                            </tr>
                            <?php
                            if (empty($data)) {
                                echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                            } else {
                                $no = ($this->uri->segment(4) + 1);
                                foreach ($data as $b) {
                                    ?>
                                    <tr>
                                        <td ><?php echo $b->id; ?></td>
                                        <td ><?php echo limit_word($b->kepada, 50, 0); ?></td>
                                        <td><?php echo limit_word($b->isi_disposisi, 50, 0); ?></td>
                                        <td><?php echo $b->sifat . "<br><i>Batas waktu s.d. " . tgl_jam_sql($b->batas_waktu) . "</i>" ?></td>
                                        <td>
                                            <div>
                                                <a href="<?php echo site_url('surat/surat_disposisi'); ?>/<?php echo $this->uri->segment(3); ?>/edit/<?php echo $b->id; ?>"
                                                   data-toggle="tooltip" class="btn btn-success btn-sm" title="Edit Data"><i class="fa fa-pencil"> </i></a>
                                                <a href="<?php echo site_url('surat/surat_disposisi'); ?>/<?php echo $this->uri->segment(3); ?>/del/<?php echo $b->id; ?>"
                                                   data-toggle="tooltip" class="btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-remove"> </i></a>
                                            </div>	
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