<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Setting Instansi</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('simak'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Setting Instansi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata("message"); ?>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Instansi</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo site_url('simak/edit_instansi/act_edit'); ?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 box-body">
                            <input type="hidden" name="id_post" value="<?php echo $data->id; ?>">
                            <div class="form-group">
                                <label for="namaInstansi">Nama Instansi</label>
                                <input type="text" value="<?php echo $data->nama; ?>" name="nama"
                                       class="form-control" id="namaInstansi" placeholder="Nama Instansi" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat Instansi</label>
                                <textarea name="alamat" class="form-control" rows="3" required><?php echo $data->alamat; ?></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="col-md-6 box-body">
                            <div class="form-group">
                                <label for="namaKepala">Nama Kepala</label>
                                <input type="text" value="<?php echo $data->kepala; ?>" name="kepala"
                                       class="form-control" id="namaKepala" placeholder="Nama Kepala" required>
                            </div>
                            <div class="form-group">
                                <label for="nipKepala">NIP Kepala</label>
                                <input type="text" value="<?php echo $data->nip_kepala; ?>" name="nip_kepala"
                                       class="form-control" id="nipKepala" placeholder="Nama Kepala" required>
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo Instansi</label>
                                <input type="file" id="logo" name="logo">
                                <p class="help-block">Logo harus berekstensi .jpg/.jpeg/.png</p>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">
                                <i class="fa fa-save"></i><span class="hidden-xs"> Simpan</span>
                            </button>
                            <a href="<?php echo site_url('simak') ?>" class="btn btn-danger btn-flat">
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