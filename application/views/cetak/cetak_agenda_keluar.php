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
    <body onload="window.print();">
        <div class="wrapper">
            <!-- Main content -->
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-archive"></i> AGENDA SURAT KELUAR
                            <small class="pull-right">Dari <b><?php echo tgl_jam_sql($tgl_start); ?></b> sampai <b><?php echo tgl_jam_sql($tgl_end); ?></b></small>
                        </h2>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="width:3%;">No</th>
                                    <th style="width:7%;">Kode Kls</th>
                                    <th style="width:28%">Isi Ringkas</th>
                                    <th style="width:23%">Tujuan Surat</th>
                                    <th style="width:17%">Nomor Surat</th>
                                    <th style="width:7%">Tgl. Surat</th>
                                    <th style="width:9%">Pengolah</th>
                                    <th style="width:6%">Ket</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) {
                                    $no = 0;
                                    foreach ($data as $d) {
                                        $no++;
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $d->kode; ?></td>
                                            <td><?php echo $d->isi_ringkas; ?></td>
                                            <td><?php echo $d->tujuan; ?></td>
                                            <td><?php echo $d->no_surat; ?></td>
                                            <td><?php echo tgl_jam_sql($d->tgl_surat); ?></td>
                                            <td><?php echo gval("user", "id", "nama", $d->pengolah); ?></td>
                                            <td><?php echo $d->keterangan; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='8' style='text-align: center'>Tidak ada data</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
        <!-- ./wrapper -->
    </body>
</html>