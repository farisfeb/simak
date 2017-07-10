<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Simak_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    //login
    public function get_userdata($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        return $query;
    }

    //edit instansi
    public function update_instansi_logo($nama, $alamat, $kepala, $nip_kepala, $upload_data, $id_post) {
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'kepala' => $kepala,
            'nip_kepala' => $nip_kepala,
            'logo' => $upload_data
        );
        $this->db->where('id', $id_post);
        $this->db->update('instansi', $data);
    }

    public function update_instansi($nama, $alamat, $kepala, $nip_kepala, $id_post) {
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'kepala' => $kepala,
            'nip_kepala' => $nip_kepala
        );
        $this->db->where('id', $id_post);
        $this->db->update('instansi', $data);
    }

    public function get_instansi() {
        $this->db->where('id', 1);
        $this->db->limit(1);
        $query = $this->db->get('instansi');
        return $query->row();
    }

    //manage_user
    public function get_user() {
        $query = $this->db->get('user');
        return $query->num_rows();
    }

    public function get_user_with_id($id_url) {
        $this->db->where('id', $id_url);
        $query = $this->db->get('user');
        return $query->row();
    }

    public function delete_user($id_url) {
        $this->db->where('id', $id_url);
        $this->db->delete('user');
    }

    public function cari_user($cari) {
        $this->db->like('nama', $cari);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('user');
        return $query->result();
    }

    public function insert_user($username, $password, $nama, $nip, $level) {
        $data = array(
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'nip' => $nip,
            'level' => $level            
        );
        $this->db->insert('user', $data);
    }

    public function update_user($username, $nama, $nip, $level, $id_post) {
        $data = array(
            'username' => $username,
            'nama' => $nama,
            'nip' => $nip,
            'level' => $level
        );
        $this->db->where('id', $id_post);
        $this->db->update('user', $data);
    }

    public function update_user_with_password($username, $password, $nama, $nip, $level, $id_post) {
        $data = array(
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'nip' => $nip,
            'level' => $level
        );
        $this->db->where('id', $id_post);
        $this->db->update('user', $data);
    }

    public function get_user_with_limit($awal, $akhir) {
        $this->db->limit($akhir, $awal);
        $query = $this->db->get('user');
        return $query->result();
    }

    //change password
    public function get_password($id_url) {
        $this->db->select('password');
        $this->db->where('id', $id_url);
        $query = $this->db->get('user');
        return $query->row();
    }

    public function change_password($password) {
        $this->db->set('password', $password);
        $this->db->where('id', 1);
        $this->db->update('user');
    }

}
