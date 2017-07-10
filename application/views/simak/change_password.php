<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Ganti Password</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('simak'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Ganti Password</li>
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
                        <h3 class="box-title">Input Password</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"action="<?php echo site_url('simak/change_password/simpan') ?>" method="post">
                        <div class="box-body">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="username" placeholder="Username" 
                                       value="<?php echo $this->session->user_nama ?>" disabled>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" name="p1" placeholder="Password lama" autofocus required>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" name="p2" placeholder="Password baru" required>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" class="form-control" name="p3" placeholder="Ulangi password baru" required>
                            </div>
                            <div>
                                <?php echo $this->session->flashdata("message"); ?>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">Simpan</button>
                            <a href="<?php echo site_url('simak') ?>" class="btn btn-danger btn-flat"> Kembali</a>
                            <button type="reset" class="btn btn-default btn-flat pull-right">Clear</button>
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