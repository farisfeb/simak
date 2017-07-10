<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIMAK | <?php echo $title; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <?php
        //Favicon
        echo link_tag('assets/simak/favicon.ico', 'shortcut icon', 'image/ico');
        //Bootstrap 3.3.7
        echo link_tag('assets/bootstrap/css/bootstrap.css');
        //Font Awesome
        echo link_tag('assets/font-awesome/css/font-awesome.css');
        //AdminLTE Theme style
        echo link_tag('assets/simak/css/AdminLTE.css');
        ?>
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <div class="row text-bold" style="color: green;">
                    <div class="col-xs-5 text-right">
                        <p>SIMAK</p>
                    </div>
                    <div class="col-xs-7 text-left">
                        <p style="font-size: medium">SISTEM INFORMASI SURAT MASUK DAN KELUAR</p>
                    </div>
                </div>
            </div>
            <!-- /.login-logo -->

            <!--logo kementerian-->
            <div class="login-box-body box box-solid box-success">
                <div style="padding-bottom: 10px;">
                    <?php
                    $q_instansi = $this->simak_model->get_instansi();
                    ?>
                    <div><img src="<?php echo base_url(); ?>upload/<?php echo $q_instansi->logo; ?>" class="img-thumbnail " style="display: inline; float: left; margin-right: 15px; width: 70px; height: 70px"></div>
                    <div style="color: green; font-size: 20px;"><?php echo $q_instansi->nama; ?></div>
                    <div style=" font-size: 10px;"><?php echo $q_instansi->alamat; ?></div>
                </div>
            </div>

            <div class="login-box-body box box-solid box-success">
                <p class="login-box-msg">Log in to start your session</p>
                <form action="<?php echo site_url('simak/do_login'); ?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <?php echo $this->session->flashdata("message"); ?>
                    <div class="row">
                        <div class="col-xs-7">
                        </div>
                        <div class="col-xs-5">
                            <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-unlock"></i> Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!--jQuery 2.2.3--> 
        <script src="<?php echo base_url(); ?>assets/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    </body>
</html>