<?php
$mode = $this->uri->segment(3);

if ($mode == "edit" || $mode == "act_edit") {
    $act = "act_edit";
    $id_post = $datpil->id;
    $username = $datpil->username;
    $password = "-";
    $nama = $datpil->nama;
    $nip = $datpil->nip;
    $level = $datpil->level;
} else {
    $act = "act_add";
    $id_post = "";
    $username = "";
    $password = "";
    $nama = "";
    $nip = "";
    $level = "";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Manage User</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('simak'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage User</li>
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
                        <h3 class="box-title">Data User</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"action="<?php echo site_url('simak/manage_user'); ?>/<?php echo $act; ?>" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="col-md-6">
                                <input type="hidden" name="id_post" value="<?php echo $id_post; ?>">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Username" 
                                           value="<?php echo $username; ?>" autofocus required>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Password baru"
                                           value="<?php echo $password; ?>" required >
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                    <input type="password" class="form-control" name="password2" placeholder="Ulangi Password baru"
                                           value="<?php echo $password; ?>" required>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="col-md-6">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" 
                                           value="<?php echo $nama; ?>" autofocus required>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>
                                    <input type="text" class="form-control" name="nip" placeholder="NIP"
                                           value="<?php echo $nip; ?>" required>
                                </div>
                                <?php if ($mode == "add") { ?>
                                    <div class="form-group input-group">
                                        <select name="level" class="form-control" required>
                                            <option value="">Pilih Level</option>
                                            <?php
                                            $l_sifat = array('Admin', 'User');
                                            for ($i = 0; $i < sizeof($l_sifat); $i++) {
                                                if ($l_sifat[$i] == $level) {
                                                    echo "<option selected value='" . $l_sifat[$i] . "'>" . $l_sifat[$i] . "</option>";
                                                } else {
                                                    echo "<option value='" . $l_sifat[$i] . "'>" . $l_sifat[$i] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php
                                } else {
                                    if ($this->session->userdata('user_level') == "Admin" && $datpil->level != "Admin") {
                                        ?>
                                        <div class="form-group input-group">
                                            <select name="level" class="form-control" required>
                                                <option value="">Pilih Level</option>
                                                <?php
                                                $l_sifat = array('Admin', 'User');
                                                for ($i = 0; $i < sizeof($l_sifat); $i++) {
                                                    if ($l_sifat[$i] == $level) {
                                                        echo "<option selected value='" . $l_sifat[$i] . "'>" . $l_sifat[$i] . "</option>";
                                                    } else {
                                                        echo "<option value='" . $l_sifat[$i] . "'>" . $l_sifat[$i] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btn-flat">
                                <i class="fa fa-save"></i><span class="hidden-xs"> Simpan</span>
                            </button>
                            <a href="<?php echo site_url('simak/manage_user') ?>" class="btn btn-danger btn-flat">
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