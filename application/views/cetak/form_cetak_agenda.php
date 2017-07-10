<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cetak Agenda<small><?php echo $title; ?></small></h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('simak'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cetak Agenda</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Waktu Agenda</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="<?php echo site_url('cetak/cetak_agenda'); ?>" method="post" target="blank">
                        <div class="box-body">
                            <input type="hidden" name="tipe" value="<?php echo $this->uri->segment(2); ?>">
                            <div class="form-group">
                                <label>Dari Tanggal:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="tgl_start" class="form-control pull-right" id="datepicker" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Sampai Tanggal:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="tgl_end" class="form-control pull-right" id="datepicker_end" required>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-print"></i><span class="hidden-xs"> Cetak</span>
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