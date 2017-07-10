<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //cetak agenda
    public function cetak_agenda_surat_masuk($tgl_start, $tgl_end) {
        $this->db->where('tgl_diterima >=', $tgl_start);
        $this->db->where('tgl_diterima <=', $tgl_end);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('surat_masuk');
        return $query->result();
    }

    public function cetak_agenda_surat_keluar($tgl_start, $tgl_end) {
        $this->db->where('tgl_catat >=', $tgl_start);
        $this->db->where('tgl_catat <=', $tgl_end);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('surat_keluar');
        return $query->result();
    }

    //disposisi_cetak
    public function get_disposisi_cetak($id_url) {
        $this->db->select('kepada, isi_disposisi, sifat, batas_waktu');
        $this->db->where('id_surat', $id_url);
        $query = $this->db->get('disposisi');
        return $query->result();
    }

}
