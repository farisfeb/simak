<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Home</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-home"></i> Home</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $this->session->flashdata("welcome_message"); ?>
        <!-- Stats box -->
        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo (int) $total_surat_masuk; ?></h3>
                        <p>Total Surat Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-mail"></i>
                    </div>
                    <a href="<?php echo site_url('surat/surat_masuk'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">
                    <div class="inner">
                        <h3><?php echo (int) $total_surat_keluar; ?></h3>
                        <p>Total Surat Keluar</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-mail"></i>
                    </div>
                    <a href="<?php echo site_url('surat/surat_keluar'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo (int) $total_disposisi; ?></h3>
                        <p>Total Disposisi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-checkbox"></i>
                    </div>
                    <p class="small-box-footer"><i class="fa"></i></p>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->