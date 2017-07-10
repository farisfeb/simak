<?php
$mode = $this->uri->segment(4);

if ($mode == "edit" || $mode == "act_edit") {
    $act = "act_edit";
    $id_post = $datpil->id;
    $id_surat = $datpil->id_surat;
    $kepada = $datpil->kepada;
    $isi_disposisi = $datpil->isi_disposisi;
    $sifat = $datpil->sifat;
    $batas_waktu = $datpil->batas_waktu;
    $catatan = $datpil->catatan;
} else {
    $act = "act_add";
    $id_post = "";
    $id_surat = $this->uri->segment(3);
    $kepada = "";
    $isi_disposisi = "";
    $sifat = "";
    $batas_waktu = "";
    $catatan = "";
}
?>
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
        <?php echo $this->session->flashdata("judul_surat"); ?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Disposisi Surat</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo site_url('surat/surat_disposisi'); ?>/<?php echo $this->uri->segment(3) ?>/<?php echo $act; ?>" method="post">
                        <div class="col-md-6 box-body">
                            <input type="hidden" name="id_post" value="<?php echo $id_post; ?>">
                            <input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>">
                            <div class="form-group">
                                <label for="tujuanDisposisi">Tujuan Disposisi</label>
                                <input type="text" value="<?php echo $kepada; ?>" name="kepada"
                                       class="form-control" id="tujuanDisposisi" placeholder="Tujuan Disposisi" autofocus required>
                            </div>
                            <div class="form-group">
                                <label>Isi Disposisi</label>
                                <textarea name="isi_disposisi" class="form-control" rows="3" required><?php echo $isi_disposisi; ?></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="col-md-6 box-body">
                            <div class="form-group">
                                <label for="sifat">Sifat Surat</label>
                                <input type="text" value="<?php echo $sifat; ?>" name="sifat"
                                       class="form-control" id="sifat" placeholder="Sifat Surat" required>
                            </div>
                            <div class="form-group">
                                <label for="batasWaktu">Batas Waktu</label>
                                <input type="text" value="<?php echo $batas_waktu; ?>" name="batas_waktu"
                                       class="form-control" id="batasWaktu" placeholder="Batas Waktu" required>
                            </div>
                            <div class="form-group">
                                <label for="catatan">Catatan</label>
                                <input type="text" value="<?php echo $catatan; ?>" name="catatan"
                                       class="form-control" id="catatan" placeholder="Catatan">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">
                                <i class="fa fa-save"></i><span class="hidden-xs"> Simpan</span>
                            </button>
                            <a href="<?php echo site_url('surat/surat_disposisi'); ?>/<?php echo $this->uri->segment(3); ?>" class="btn btn-danger btn-flat">
                                <i class="fa fa-undo"></i><span class="hidden-xs"> Kembali</span></a>
                            <button type="reset" class="btn btn-default btn-flat pull-right">
                                <i class="fa fa-eraser"></i><span class="hidden-xs"> Clear</span>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!--col-->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    $('#batasWaktu').datepicker({
        format: 'yy-mm-dd',
        autoclose: true
    });
</script>