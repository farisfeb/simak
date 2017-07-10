<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper(array('url', 'html', 'MY_helper'));
        $this->load->model(array('simak_model', 'cetak_model'));
    }

    public function cetak_agenda_masuk() {
        $data['page'] = "cetak/form_cetak_agenda";
        $data['title'] = "Cetak Agenda Surat Masuk";
        $this->load->view('simak/header', $data);
    }

    public function cetak_agenda_keluar() {
        $data['page'] = "cetak/form_cetak_agenda";
        $data['title'] = "Cetak Agenda Surat Keluar";
        $this->load->view('simak/header', $data);
    }

    public function cetak_agenda() {
        $jenis_surat = $this->input->post('tipe');
        $tgl_start = $this->input->post('tgl_start');
        $tgl_end = $this->input->post('tgl_end');

        $data['tgl_start'] = $tgl_start;
        $data['tgl_end'] = $tgl_end;

        if ($jenis_surat == "cetak_agenda_masuk") {
            $data['data'] = $this->cetak_model->cetak_agenda_surat_masuk($tgl_start, $tgl_end);
            $data['title'] = "Cetak Agenda Surat Masuk";
            $this->load->view('cetak/cetak_agenda_masuk', $data);
        } else {
            $data['data'] = $this->cetak_model->cetak_agenda_surat_keluar($tgl_start, $tgl_end);
            $data['title'] = "Cetak Agenda Surat Keluar";
            $this->load->view('cetak/cetak_agenda_keluar', $data);
        }
    }

    public function cetak_disposisi() {
        $id_url = $this->uri->segment(3);
        $this->load->model('surat_model');
        $data['datpil1'] = $this->surat_model->select_surat_masuk_id($id_url);
        $data['datpil2'] = $this->cetak_model->get_disposisi_cetak($id_url);
        $data['title'] = "Cetak Disposisi";
        $this->load->view('cetak/cetak_disposisi', $data);
    }

}