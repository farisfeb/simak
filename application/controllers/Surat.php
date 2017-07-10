<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper(array('url', 'html', 'date', 'MY_helper'));
        $this->load->model(array('simak_model', 'surat_model'));
    }

    public function klas_surat() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        /* pagination */
        $total_row = $this->surat_model->get_total_row();
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url('surat/klas_surat/page'));

        //ambil variabel URL
        $go_to = $this->uri->segment(3);
        $id_url = $this->uri->segment(4);

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $kode = addslashes($this->input->post('kode'));
        $divisi = addslashes($this->input->post('divisi'));
        $nama = addslashes($this->input->post('nama'));
        $uraian = addslashes($this->input->post('uraian'));
        $cari = addslashes($this->input->post('q'));

        if ($go_to == "del") {
            $this->surat_model->delete_klasifikasi_surat($id_url);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('surat/klas_surat');
        } else if ($go_to == "cari") {
            $data['data'] = $this->surat_model->cari_klas_surat($cari);
            $data['page'] = "surat/list_klas_surat";
        } else if ($go_to == "add") {
            $data['page'] = "surat/form_klas_surat";
        } else if ($go_to == "edit") {
            $data['datpil'] = $this->surat_model->get_data_id($id_url);
            $data['page'] = "surat/form_klas_surat";
        } else if ($go_to == "act_add") {
            $this->surat_model->insert_data_klasifikasi($kode, $divisi, $nama, $uraian);
            $this->session->set_flashdata('message', message_box('Data telah ditambah'));
            redirect('surat/klas_surat');
        } else if ($go_to == "act_edit") {
            $this->surat_model->edit_data_klasifikasi($kode, $divisi, $nama, $uraian, $id_post);
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui'));
            redirect('surat/klas_surat');
        } else {
            $data['data'] = $this->surat_model->get_data_limit($awal, $akhir);
            $data['page'] = "surat/list_klas_surat";
        }
        $data['title'] = "Klasifikasi Surat";
        $this->load->view('simak/header', $data);
    }

    public function surat_masuk() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        /* pagination */
        $total_row = $this->surat_model->get_total_row_surat_masuk();
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url('surat/surat_masuk/page'));

        //ambil variabel URL
        $mau_ke = $this->uri->segment(3);
        $id_url = $this->uri->segment(4);

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $no_agenda = addslashes($this->input->post('no_agenda'));
        $indek_berkas = $no_agenda;
        //$indek_berkas = addslashes($this->input->post('indek_berkas'));
        $kode = addslashes($this->input->post('kode'));
        $dari = addslashes($this->input->post('dari'));
        $no_surat = addslashes($this->input->post('no_surat'));
        $tgl_surat = addslashes($this->input->post('tgl_surat'));
        $uraian = addslashes($this->input->post('uraian'));
        $ket = addslashes($this->input->post('ket'));
        $tglcari = addslashes($this->input->post('t'));
        $cari = addslashes($this->input->post('q'));

        //upload config 
        $config['upload_path'] = './upload/surat_masuk';
        $config['allowed_types'] = 'jpg|png|jpeg|pdf|doc|docx';
        $config['max_size'] = '10000';
        $config['max_width'] = '10000';
        $config['max_height'] = '10000';
        $this->load->library('upload', $config);

        if ($mau_ke == "del") {
            $this->surat_model->delete_surat_masuk($id_url);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('surat/surat_masuk');
        } else if ($mau_ke == "cari") {
            if ($cari == "") {
                $data['data'] = $this->surat_model->cari_surat_masuk_tgl($tglcari);
                $data['page'] = "surat/list_surat_masuk";
            } else if ($tglcari == "") {
                $data['data'] = $this->surat_model->cari_surat_masuk_key($cari);
                $data['page'] = "surat/list_surat_masuk";
            } else {
                $data['data'] = $this->surat_model->cari_surat_masuk_tgl_key($tglcari, $cari);
                $data['page'] = "surat/list_surat_masuk";
            }
        } else if ($mau_ke == "add") {
            $data['page'] = "surat/form_surat_masuk";
        } else if ($mau_ke == "edit") {
            $data['datpil'] = $this->surat_model->select_surat_masuk_id($id_url);
            $data['page'] = "surat/form_surat_masuk";
        } else if ($mau_ke == "act_add") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->insert_surat_masuk_with_file($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket, $up_data);
            } else {
                $this->surat_model->insert_surat_masuk($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket);
            }
            $this->session->set_flashdata('message', message_box('Data telah ditambah. ' . $this->upload->display_errors()));
            redirect('surat/surat_masuk');
        } else if ($mau_ke == "act_edit") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data('file_name');
                $this->surat_model->update_surat_masuk_with_file($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket, $up_data, $id_post);
            } else {
                $this->surat_model->update_surat_masuk($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket, $id_post);
            }
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui. ' . $this->upload->display_errors()));
            redirect('surat/surat_masuk');
        } else {
            $data['data'] = $this->surat_model->select_surat_masuk_limit($awal, $akhir);
            $data['page'] = "surat/list_surat_masuk";
        }
        $data['title'] = "Surat Masuk";
        $this->load->view('simak/header', $data);
    }

    public function surat_keluar() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        /* pagination */
        $total_row = $this->surat_model->get_total_row_surat_keluar();
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url('surat/surat_keluar/page'));

        //ambil variabel URL
        $mau_ke = $this->uri->segment(3);
        $id_url = $this->uri->segment(4);

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $no_agenda = addslashes($this->input->post('no_agenda'));
        $kode = addslashes($this->input->post('kode'));
        $dari = addslashes($this->input->post('dari'));
        $no_surat = addslashes($this->input->post('no_surat'));
        $tgl_surat = addslashes($this->input->post('tgl_surat'));
        $uraian = addslashes($this->input->post('uraian'));
        $ket = addslashes($this->input->post('ket'));
        $tglcari = addslashes($this->input->post('t'));
        $cari = addslashes($this->input->post('q'));

        //upload config 
        $config['upload_path'] = './upload/surat_keluar';
        $config['allowed_types'] = 'jpg|png|pdf|jpeg|doc|docx';
        $config['max_size'] = '10000';
        $config['max_width'] = '10000';
        $config['max_height'] = '10000';
        $this->load->library('upload', $config);

        if ($mau_ke == "del") {
            $this->surat_model->delete_surat_keluar($id_url);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('surat/surat_keluar');
        } else if ($mau_ke == "cari") {
            if ($cari == "") {
                $data['data'] = $this->surat_model->cari_surat_keluar_tgl($tglcari);
                $data['page'] = "surat/list_surat_keluar";
            } else if ($tglcari == "") {
                $data['data'] = $this->surat_model->cari_surat_keluar_key($cari);
                $data['page'] = "surat/list_surat_keluar";
            } else {
                $data['data'] = $this->surat_model->cari_surat_keluar_tgl_key($tglcari, $cari);
                $data['page'] = "surat/list_surat_keluar";
            }
        } else if ($mau_ke == "add") {
            $data['data'] = $this->surat_model->select_surat_keluar_div();
            $data['page'] = "surat/form_surat_keluar";
        } else if ($mau_ke == "edit") {
            $data['data'] = $this->surat_model->select_surat_keluar_div();
            $data['datpil'] = $this->surat_model->select_surat_keluar_id($id_url);
            $data['page'] = "surat/form_surat_keluar";
        } else if ($mau_ke == "act_add") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data(file_name);
                $this->surat_model->insert_surat_keluar_with_file($kode, $no_agenda, $uraian, $dari, $no_surat, $tgl_surat, $ket, $up_data);
            } else {
                $this->surat_model->insert_surat_keluar($kode, $no_agenda, $uraian, $dari, $no_surat, $tgl_surat, $ket);
            }
            $this->session->set_flashdata('message', message_box('Data telah ditambah'));
            redirect('surat/surat_keluar');
        } else if ($mau_ke == "act_edit") {
            if ($this->upload->do_upload('file_surat')) {
                $up_data = $this->upload->data(file_name);
                $this->surat_model->update_surat_keluar_with_file($no_agenda, $kode, $uraian, $dari, $no_surat, $tgl_surat, $ket, $up_data, $id_post);
            } else {
                $this->surat_model->update_surat_keluar($no_agenda, $kode, $uraian, $dari, $no_surat, $tgl_surat, $ket, $id_post);
            }
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui' . $this->upload->display_errors()));
            redirect('surat/surat_keluar');
        } else {
            $data['data'] = $this->surat_model->select_surat_keluar_limit($awal, $akhir);
            $data['page'] = "surat/list_surat_keluar";
        }
        $data['title'] = "Surat Keluar";
        $this->load->view('simak/header', $data);
    }

    public function surat_disposisi() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        //ambil variabel URL
        $go_to = $this->uri->segment(4);
        $id_url1 = $this->uri->segment(3);
        $id_url2 = $this->uri->segment(5);

        // pagination //
        $total_row = $this->surat_model->get_total_row_surat_disposisi($id_url1);
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url("surat/surat_disposisi/" . $id_url1 . "/page"));

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $id_surat = addslashes($this->input->post('id_surat'));
        $kepada = addslashes($this->input->post('kepada'));
        $isi_disposisi = addslashes($this->input->post('isi_disposisi'));
        $sifat = addslashes($this->input->post('sifat'));
        $batas_waktu = addslashes($this->input->post('batas_waktu'));
        $catatan = addslashes($this->input->post('catatan'));
        //$cari = addslashes($this->input->post('q'));
        //judul surat
        $judul_surat = gval("surat_masuk", "id", "isi_ringkas", $id_url1);
        $this->session->set_flashdata('judul_surat', message_box('Perihal: ' . $judul_surat));

        if ($go_to == "del") {
            $this->surat_model->delete_disposisi($id_url2);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('surat/surat_disposisi/' . $id_url1);
        } else if ($go_to == "add") {
            $data['page'] = "surat/form_surat_disposisi";
        } else if ($go_to == "edit") {
            $data['datpil'] = $this->surat_model->get_disposisi_id($id_url2);
            $data['page'] = "surat/form_surat_disposisi";
        } else if ($go_to == "act_add") {
            $this->surat_model->insert_disposisi($id_surat, $kepada, $isi_disposisi, $sifat, $batas_waktu, $catatan);
            $this->session->set_flashdata('message', message_box('Data telah ditambah'));
            redirect('surat/surat_disposisi/' . $id_surat);
        } else if ($go_to == "act_edit") {
            $this->surat_model->update_disposisi($kepada, $isi_disposisi, $sifat, $batas_waktu, $catatan, $id_post);
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui'));
            redirect('surat/surat_disposisi/' . $id_surat);
        } else {
            $data['data'] = $this->surat_model->get_disposisi_limit($id_url1, $awal, $akhir);
            $data['page'] = "surat/list_surat_disposisi";
        }
        $data['title'] = "Disposisi Surat";
        $this->load->view('simak/header', $data);
    }

    public function get_instansi_lain() {
        $kode = $this->input->post('dari', TRUE);
        $data = $this->surat_model->get_surat_masuk_group($kode);
        $klasifikasi = array();
        foreach ($data as $d) {
            $klasifikasi[] = $d->dari;
        }
        echo json_encode($klasifikasi);
    }

    public function kode_surat() {
        $divisi = $this->input->post('divisi');
        $query = $this->surat_model->get_klasifikasi_divisi($divisi);
        $output = null;
        foreach ($query as $row) {
            $output .= "<option value='" . $row->kode . "'>" . $row->kode . "</option>";
        }
        echo $output;
    }
}
