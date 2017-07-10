<?php
$mode = $this->uri->segment(3);

if ($mode == "edit" || $mode == "act_edit") {
    $act = "act_edit";
    $id_post = $datpil->id;
    $no_agenda = $datpil->no_agenda;
    $kode = $datpil->kode;
    $dari = $datpil->tujuan;
    $no_surat = $datpil->no_surat;
    $tgl_surat = $datpil->tgl_surat;
    $uraian = $datpil->isi_ringkas;
    $ket = $datpil->keterangan;
} else {
    $act = "act_add";
    $id_post = "";
    $no_agenda = gli("surat_keluar", "no_agenda", 4);
    $kode = "";
    $dari = "";
    $no_surat = "";
    $tgl_surat = "";
    $uraian = "";
    $ket = "";
}
?>
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

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Surat Keluar</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo site_url('surat/surat_keluar'); ?>/<?php echo $act; ?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 box-body">
                            <input type="hidden" name="id_post" value="<?php echo $id_post; ?>">
                            <div class="form-group">
                                <label for="noAgenda">No. Agenda</label>
                                <input type="text" value="<?php echo $no_agenda; ?>" name="no_agenda"
                                       class="form-control" id="noAgenda" placeholder="No. Agenda" autofocus required>
                            </div>
                            <div class="form-group">
                                <label for="noSurat">Nomor Surat</label>
                                <input type="text" value="<?php echo $no_surat; ?>" name="no_surat"
                                       class="form-control" id="noSurat" placeholder="Nomor Surat" required>
                            </div>
                            <div class="form-group">
                                <label for="dari">Tujuan Surat</label>
                                <input type="text" value="<?php echo $dari; ?>" name="dari"
                                       class="form-control" id="dari" placeholder="Tujuan Surat" required>
                            </div>
                            <div class="form-group">
                                <label>Isi Ringkas</label>
                                <textarea name="uraian" class="form-control" rows="3" required><?php echo $uraian; ?></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="col-md-6 box-body">
                            <div class="form-group">
                                <label>Kode Klasifikasi</label>
                                <div class="row">
                                    <div class="col-md-7">
                                        <select name="kode" id="kode_surat" class="form-control">
                                            <option value="">Pilih Divisi</option>   
                                            <?php foreach ($data as $row) { ?>
                                                <option value="<?php echo $row->divisi ?>"><?php echo $row->divisi ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <select name="kode" id="kode" class="form-control">   
                                            <option value="">Pilih Kode</option>   
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tglSurat">Tanggal Surat</label>
                                <input type="text" value="<?php echo $tgl_surat; ?>" name="tgl_surat"
                                       class="form-control" id="datepicker" placeholder="Tanggal Surat" required>
                            </div>
                            <div class="form-group">
                                <label for="fileSurat">File Surat</label>
                                <input type="file" id="fileSurat" name="file_surat">
                                <p class="help-block">File harus berekstensi .pdf/ .jpg/.jpeg/.png</p>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" value="<?php echo $ket; ?>" name="ket"
                                       class="form-control" id="keterangan" placeholder="Keterangan">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">
                                <i class="fa fa-save"></i><span class="hidden-xs"> Simpan</span>
                            </button>
                            <a href="<?php echo site_url('surat/surat_keluar'); ?>" class="btn btn-danger btn-flat">
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