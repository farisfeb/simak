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
            <section class="invoice col-xs-6">
                <!-- Table row -->
                <div class="row">
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-bordered" style="width: 100%;">
                            <thead>
                                <?php $q_instansi = $this->simak_model->get_instansi(); ?>
                                <tr class="box box-widget widget-user-2 widget-user-header">
                                    <th colspan="2" class="widget-user-image">
                                        <img src="<?php echo base_url(); ?>upload/<?php echo $q_instansi->logo; ?>" alt="Gambar Instansi">
                            <h3 class="widget-user-username"><?php echo $q_instansi->nama; ?></h3>
                            <h5 class="widget-user-desc"><?php echo $q_instansi->alamat; ?></h5>
                            </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-center"><b>LEMBAR DISPOSISI</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2">No. Surat: <?php echo $datpil1->no_surat; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%">Tgl. Surat: <?php echo tgl_jam_sql($datpil1->tgl_surat); ?></td>
                                    <td>Sifat: <?php
                                        if (!empty($datpil2)) {
                                            foreach ($datpil2 as $dp) {
                                                echo $dp->sifat;
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Diterima Tanggal: <?php echo tgl_jam_sql($datpil1->tgl_diterima); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">No. Agenda: <?php echo $datpil1->no_agenda; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Dari: <?php echo $datpil1->dari; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Perihal: <?php echo limit_word($datpil1->isi_ringkas, 110, 0); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Isi Disposisi: <?php
                                        if (!empty($datpil2)) {
                                            foreach ($datpil2 as $dp) {
                                                echo $dp->isi_disposisi;
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Batas Waktu: <?php
                                        if (!empty($datpil2)) {
                                            foreach ($datpil2 as $dp) {
                                                echo $dp->batas_waktu;
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Diteruskan kepada: 
                                        <?php
                                        if (!empty($datpil2)) {
                                            foreach ($datpil2 as $dp) {
                                                echo $dp->kepada;
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
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