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
        <?php echo $this->session->flashdata("message"); ?>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <a class="btn btn-primary btn-sm btn-flat " href="<?php echo site_url('simak/manage_user/add'); ?>"><i class="fa fa-user-plus"></i>
                            <span class="hidden-xs"> Tambah User</span></a></li>
                        <div class="box-tools">
                            <form class="input-group input-group-sm" method="post" action="<?php echo site_url('simak/manage_user/cari'); ?>">
                                <input type="text" name="q" class="form-control pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            if (empty($data)) {
                                echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                            } else {
                                $no = ($this->uri->segment(4) + 1);
                                foreach ($data as $b) {
                                    ?>
                                    <tr>
                                        <td><?php echo $b->username ?></td>
                                        <td><?php echo $b->nama ?></td>
                                        <td><?php echo $b->nip ?></td>
                                        <td><?php echo $b->level ?></td>
                                        <td>
                                            <a href="<?php echo site_url('simak/manage_user/edit'); ?>/<?php echo $b->id; ?>"
                                               class="btn btn-success btn-sm btn-flat" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                               <?php if ($b->level != 'Admin') { ?>
                                                <a href="<?php echo site_url('simak/manage_user/del'); ?>/<?php echo $b->id; ?>"
                                                   class="btn btn-danger btn-sm btn-flat" data-toggle="tooltip" title="Delete"
                                                   onclick="return confirm('Anda Yakin?')"><i class="fa fa-remove"></i></a>
                                            <?php } ?>				
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