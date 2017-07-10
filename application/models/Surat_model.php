<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //klas_surat
    public function get_total_row() {
        $query = $this->db->get('klasifikasi');
        return $query->num_rows();
    }

    public function cari_klas_surat($cari) {
        $this->db->like('nama', $cari);
        $this->db->or_like('uraian', $cari);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('klasifikasi');
        return $query->result();
    }

    public function get_data_id($id_url) {
        $this->db->where('id', $id_url);
        $query = $this->db->get('klasifikasi');
        return $query->row();
    }

    public function delete_klasifikasi_surat($id_url) {
        $this->db->where('id', $id_url);
        $this->db->delete('klasifikasi');
    }

    public function insert_data_klasifikasi($kode, $divisi, $nama, $uraian) {
        $data = array(
            'kode' => $kode,
            'divisi' => $divisi,
            'nama' => $nama,
            'uraian' => $uraian
        );
        $this->db->insert('klasifikasi', $data);
    }

    public function edit_data_klasifikasi($kode, $divisi, $nama, $uraian, $id_post) {
        $data = array(
            'kode' => $kode,
            'divisi' => $divisi,
            'nama' => $nama,
            'uraian' => $uraian
        );
        $this->db->where('id', $id_post);
        $this->db->update('klasifikasi', $data);
    }

    public function get_data_limit($awal, $akhir) {
        $this->db->limit($akhir, $awal);
        $query = $this->db->get('klasifikasi');
        return $query->result();
    }

    //surat_masuk
    public function get_total_row_surat_masuk() {
        $query = $this->db->get('surat_masuk');
        return $query->num_rows();
    }

    public function delete_surat_masuk($id_url) {
        $this->db->where('id', $id_url);
        $this->db->delete('surat_masuk');
    }

    public function cari_surat_masuk_tgl($tglcari) {
        $this->db->like('tgl_surat', $tglcari);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('surat_masuk');
        return $query->result();
    }

    public function cari_surat_masuk_key($cari) {
        $this->db->like('dari', $cari);
        $this->db->or_like('no_surat', $cari);
        $this->db->or_like('isi_ringkas', $cari);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('surat_masuk');
        return $query->result();
    }

    public function cari_surat_masuk_tgl_key($tglcari, $cari) {
        $this->db->like('tgl_surat', $tglcari);
        $this->db->like('dari', $cari);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('surat_masuk');
        return $query->result();
    }

    public function select_surat_masuk_id($id_url) {
        $this->db->where('id', $id_url);
        $query = $this->db->get('surat_masuk');
        return $query->row();
    }

    public function insert_surat_masuk_with_file($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket, $up_data) {
        $data = array(
            'kode' => $kode,
            'no_agenda' => $no_agenda,
            'indek_berkas' => $indek_berkas,
            'isi_ringkas' => $uraian,
            'dari' => $dari,
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat,
            'tgl_diterima' => now(),
            'keterangan' => $ket,
            'file' => $up_data,
            'pengolah' => $this->session->user_id
        );
        $this->db->insert('surat_masuk', $data);
    }

    public function insert_surat_masuk($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket) {
        $data = array(
            'kode' => $kode,
            'no_agenda' => $no_agenda,
            'indek_berkas' => $indek_berkas,
            'isi_ringkas' => $uraian,
            'dari' => $dari,
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat,
            'tgl_diterima' => now(),
            'keterangan' => $ket,
            'pengolah' => $this->session->user_id
        );
        $this->db->insert('surat_masuk', $data);
    }

    public function update_surat_masuk_with_file($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket, $up_data, $id_post) {
        $data = array(
            'kode' => $kode,
            'no_agenda' => $no_agenda,
            'indek_berkas' => $indek_berkas,
            'isi_ringkas' => $uraian,
            'dari' => $dari,
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat,
            'keterangan' => $ket,
            'file' => $up_data
        );
        $this->db->where('id', $id_post);
        $this->db->update('surat_masuk', $data);
    }

    public function update_surat_masuk($kode, $no_agenda, $indek_berkas, $uraian, $dari, $no_surat, $tgl_surat, $ket, $id_post) {
        $data = array(
            'kode' => $kode,
            'no_agenda' => $no_agenda,
            'indek_berkas' => $indek_berkas,
            'isi_ringkas' => $uraian,
            'dari' => $dari,
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat,
            'keterangan' => $ket
        );
        $this->db->where('id', $id_post);
        $this->db->update('surat_masuk', $data);
    }

    public function select_surat_masuk_limit($awal, $akhir) {
        $this->db->limit($akhir, $awal);
        $query = $this->db->get('surat_masuk');
        return $query->result();
    }

    //surat_keluar
    public function get_total_row_surat_keluar() {
        $query = $this->db->get('surat_keluar');
        return $query->num_rows();
    }

    public function delete_surat_keluar($id_url) {
        $this->db->where('id', $id_url);
        $this->db->delete('surat_keluar');
    }

    public function cari_surat_keluar_tgl($tglcari) {
        $this->db->like('tgl_surat', $tglcari);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('surat_keluar');
        return $query->result();
    }

    public function cari_surat_keluar_key($cari) {
        $this->db->like('dari', $cari);
        $this->db->or_like('no_surat', $cari);
        $this->db->or_like('isi_ringkas', $cari);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('surat_keluar');
        return $query->result();
    }

    public function cari_surat_keluar_tgl_key($tglcari, $cari) {
        $this->db->like('tgl_surat', $tglcari);
        $this->db->like('dari', $cari);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('surat_keluar');
        return $query->result();
    }

    public function select_surat_keluar_div() {
        $query = $this->db->get('divisi');
        return $query->result();
    }

    public function select_surat_keluar_id($id_url) {
        $this->db->where('id', $id_url);
        $query = $this->db->get('surat_keluar');
        return $query->row();
    }

    public function insert_surat_keluar_with_file($kode, $no_agenda, $uraian, $dari, $no_surat, $tgl_surat, $ket, $up_data) {
        $data = array(
            'kode' => $kode,
            'no_agenda' => $no_agenda,
            'isi_ringkas' => $uraian,
            'tujuan' => $dari,
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat,
            'tgl_catat' => now(),
            'keterangan' => $ket,
            'file' => $up_data,
            'pengolah' => $this->session->user_id
        );
        $this->db->insert('surat_keluar', $data);
    }

    public function insert_surat_keluar($kode, $no_agenda, $uraian, $dari, $no_surat, $tgl_surat, $ket) {
        $data = array(
            'kode' => $kode,
            'no_agenda' => $no_agenda,
            'isi_ringkas' => $uraian,
            'tujuan' => $dari,
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat,
            'tgl_catat' => now(),
            'keterangan' => $ket,
            'pengolah' => $this->session->user_id
        );
        $this->db->insert('surat_keluar', $data);
    }

    public function update_surat_keluar_with_file($no_agenda, $kode, $uraian, $dari, $no_surat, $tgl_surat, $ket, $up_data, $id_post) {
        $data = array(
            'no_agenda' => $no_agenda,
            'kode' => $kode,
            'isi_ringkas' => $uraian,
            'tujuan' => $dari,
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat,
            'keterangan' => $ket,
            'file' => $up_data
        );
        $this->db->where('id', $id_post);
        $this->db->update('surat_keluar', $data);
    }

    public function update_surat_keluar($no_agenda, $kode, $uraian, $dari, $no_surat, $tgl_surat, $ket, $id_post) {
        $data = array(
            'no_agenda' => $no_agenda,
            'kode' => $kode,
            'isi_ringkas' => $uraian,
            'tujuan' => $dari,
            'no_surat' => $no_surat,
            'tgl_surat' => $tgl_surat,
            'keterangan' => $ket
        );
        $this->db->where('id', $id_post);
        $this->db->update('surat_keluar', $data);
    }

    public function select_surat_keluar_limit($awal, $akhir) {
        $this->db->limit($akhir, $awal);
        $query = $this->db->get('surat_keluar');
        return $query->result();
    }

    //surat_disposisi
    public function get_total_row_surat_disposisi($id_url) {
        $this->db->where('id', $id_url);
        $query = $this->db->get('disposisi');
        return $query->num_rows();
    }

    public function counter_row_surat_disposisi() {
        return $this->db->count_all('disposisi');
    }

    public function get_isi_ringkas_surat_masuk($id_url) {
        $this->db->select('isi_ringkas');
        $this->db->where('id', $id_url);
        $query = $this->db->get('disposisi');
        return $query->row();
    }

    public function delete_disposisi($id_url) {
        $this->db->where('id', $id_url);
        $this->db->delete('disposisi');
    }

    public function get_disposisi_id($id_url) {
        $this->db->where('id', $id_url);
        $query = $this->db->get('disposisi');
        return $query->row();
    }

    public function insert_disposisi($id_surat, $kepada, $isi_disposisi, $sifat, $batas_waktu, $catatan) {
        $data = array(
            'id_surat' => $id_surat,
            'kepada' => $kepada,
            'isi_disposisi' => $isi_disposisi,
            'sifat' => $sifat,
            'batas_waktu' => $batas_waktu,
            'catatan' => $catatan
        );
        $this->db->insert('disposisi', $data);
    }

    public function update_disposisi($kepada, $isi_disposisi, $sifat, $batas_waktu, $catatan, $id_post) {
        $data = array(
            'kepada' => $kepada,
            'isi_disposisi' => $isi_disposisi,
            'sifat' => $sifat,
            'batas_waktu' => $batas_waktu,
            'catatan' => $catatan
        );
        $this->db->where('id', $id_post);
        $this->db->update('disposisi', $data);
    }

    public function get_disposisi_limit($id_url, $awal, $akhir) {
        $this->db->where('id_surat', $id_url);
        $this->db->limit($akhir, $awal);
        $query = $this->db->get('disposisi');
        return $query->result();
    }

    //get_klasifikasi
    public function get_klasifikasi($kode) {
        $this->db->select('id, kode, nama');
        $this->db->like('kode', $kode);
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('klasifikasi');
        return $query->result();
    }

    //get_instansi_lain
    public function get_surat_masuk_group($kode) {
        $this->db->select('dari');
        $this->db->like('dari', $kode, 'after');
        $this->db->group_by("dari");
        $this->db->limit(10);
        $query = $this->db->get('surat_masuk');
        return $query->result();
    }

    //kode surat
    public function get_klasifikasi_divisi($divisi) {
        $this->db->where('divisi', $divisi);
        $query = $this->db->get('klasifikasi');
        return $query->result();
    }
}
