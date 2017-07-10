<?php
$mode = $this->uri->segment(3);

if ($mode == "edit" || $mode == "act_edit") {
    $act = "act_edt";
    $id_post = $datpil->id;
    $kode = $datpil->kode;
    $divisi = $datpil->divisi;
    $nama = $datpil->nama;
    $uraian = $datpil->uraian;
} else {
    $act = "act_add";
    $id_post = "";
    $kode = "";
    $divisi = "";
    $nama = "";
    $uraian = "";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Klasifikasi Surat</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('simak'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Klasifikasi Surat</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Klasifikasi Surat</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"action="<?php echo site_url('surat/klas_surat'); ?>/<?php echo $act; ?>" method="post">
                        <div class="box-body">
                            <div class="col-md-6">
                                <input type="hidden" name="id_post" value="<?php echo $id_post; ?>">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-superscript"></i></span>
                                    <input type="text" class="form-control" name="kode" placeholder="Kode Surat" 
                                           value="<?php echo $kode; ?>" autofocus required>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                    <input type="text" class="form-control" name="divisi" placeholder="Divisi Kerja"
                                           value="<?php echo $divisi; ?>" required>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama"
                                           value="<?php echo $nama; ?>" required>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Uraian</label>
                                    <textarea name="uraian" class="form-control" rows="4" required><?php echo $uraian; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">
                                <i class="fa fa-save"></i><span class="hidden-xs"> Simpan</span></button>
                            <a href="<?php echo site_url('surat/klas_surat') ?>" class="btn btn-danger btn-flat">
                                <i class="fa fa-undo"></i><span class="hidden-xs"> Kembali</span></a>
                            <button type="reset" class="btn btn-default btn-flat pull-right">
                                <i class="fa fa-eraser"></i><span class="hidden-xs"> Clear</span></button>
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