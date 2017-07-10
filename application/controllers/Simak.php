<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Simak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper(array('url', 'html', 'MY_helper'));
        $this->load->model('simak_model');
    }

    public function index() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }
        $this->session->set_flashdata('welcome_message', message_box('Selamat Datang <b>' . $this->session->user_nama . '</b>'));
        $this->load->model('surat_model');
        $data = array(
            'title' => 'Home',
            'page' => 'simak/home',
            'total_surat_masuk' => $this->surat_model->get_total_row_surat_masuk(),
            'total_surat_keluar' => $this->surat_model->get_total_row_surat_keluar(),
            'total_disposisi' => $this->surat_model->counter_row_surat_disposisi()
        );
        $this->load->view('simak/header', $data);
    }

    public function login() {
        if ($this->session->user_valid == TRUE) {
            redirect("simak");
        }
        $data['title'] = "Login";
        $this->load->view('simak/login', $data);
    }

    public function do_login() {
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = md5($this->security->xss_clean($this->input->post('password')));
        $userdata = $this->simak_model->get_userdata($username, $password);
        
        $j_cek = $userdata->num_rows();
        $d_cek = $userdata->row();
        if ($j_cek == 1) {
            $data = array(
                'user_id' => $d_cek->id,
                'user_username' => $d_cek->username,
                'user_nama' => $d_cek->nama,
                'user_level' => $d_cek->level,
                'user_valid' => TRUE
            );
            $this->session->set_userdata($data);
            redirect('simak');
        } else {
            $this->session->set_flashdata('message', message_box('Username or password is not valid', 'danger'));
            redirect('simak/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('simak/login');
    }

    public function edit_instansi() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        //ambil variabel URL segmen ketiga
        $go_to = $this->uri->segment(3);

        //ambil variabel postingan
        $id_post = addslashes($this->input->post('id_post'));
        $nama = addslashes($this->input->post('nama'));
        $alamat = addslashes($this->input->post('alamat'));
        $kepala = addslashes($this->input->post('kepala'));
        $nip_kepala = addslashes($this->input->post('nip_kepala'));

        //upload config 
        $config['upload_path'] = './upload';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['overwrite'] = TRUE;
        $config['max_size'] = '10000';
        $config['max_width'] = '10000';
        $config['max_height'] = '10000';
        $this->load->library('upload', $config);

        if ($go_to == "act_edit") {
            if ($this->upload->do_upload('logo')) {
                $upload_data = $this->upload->data('file_name');
                $this->simak_model->update_instansi_logo($nama, $alamat, $kepala, $nip_kepala, $upload_data, $id_post);
            } else {
                $this->simak_model->update_instansi($nama, $alamat, $kepala, $nip_kepala, $id_post);
            }
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui'));
            redirect('simak/edit_instansi');
        } else {
            $data['data'] = $this->simak_model->get_instansi();
            $data['page'] = "simak/form_instansi";
        }
        $data['title'] = "Setting Instansi";
        $this->load->view('simak/header', $data);
    }

    public function manage_user() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        /* pagination */
        $total_row = $this->simak_model->get_user();
        $per_page = 10;
        $awal = $this->uri->segment(4, 0);
        $akhir = $per_page;
        $data['pagi'] = _page($total_row, $per_page, 4, site_url('simak/manage_user/page'));

        //ambil variabel URL
        $go_to = $this->uri->segment(3);
        $id_url = $this->uri->segment(4);

        //ambil variabel Postingan
        $id_post = addslashes($this->input->post('id_post'));
        $username = addslashes($this->input->post('username'));
        $password = md5(addslashes($this->input->post('password')));
        $nama = addslashes($this->input->post('nama'));
        $nip = addslashes($this->input->post('nip'));
        $level = addslashes($this->input->post('level'));
        $cari = addslashes($this->input->post('q'));

        if ($go_to == "del") {
            $this->simak_model->delete_user($id_url);
            $this->session->set_flashdata('message', message_box('Data telah dihapus'));
            redirect('simak/manage_user');
        } else if ($go_to == "cari") {
            $data['data'] = $this->simak_model->cari_user($cari);
            $data['page'] = "simak/list_manage_user";
        } else if ($go_to == "add") {
            $data['datpil'] = $this->simak_model->get_user_with_id($id_url);
            $data['page'] = "simak/form_manage_user";
        } else if ($go_to == "edit") {
            $data['datpil'] = $this->simak_model->get_user_with_id($id_url);
            $data['page'] = "simak/form_manage_user";
        } else if ($go_to == "act_add") {
            $this->simak_model->insert_user($username, $password, $nama, $nip, $level);
            $this->session->set_flashdata('message', message_box('Data telah ditambah'));
            redirect('simak/manage_user');
        } else if ($go_to == "act_edit") {
            if ($password == md5("-")) {
                $this->simak_model->update_user($username, $nama, $nip, $level, $id_post);
            } else {
                $this->simak_model->update_user_with_password($username, $password, $nama, $nip, $level, $id_post);
            }
            $this->session->set_flashdata('message', message_box('Data telah diperbaharui'));
            redirect('simak/manage_user');
        } else {
            $data['data'] = $this->simak_model->get_user_with_limit($awal, $akhir);
            $data['page'] = "simak/list_manage_user";
        }
        $data['title'] = "Manage User";
        $this->load->view('simak/header', $data);
    }

    public function change_password() {
        if ($this->session->user_valid == FALSE && $this->session->user_id == "") {
            redirect("simak/login");
        }

        //ambil variabel URL
        $go_to = $this->uri->segment(3);
        $id_url = $this->session->user_id;

        //variabel post
        $p1 = md5($this->input->post('p1'));
        $p2 = md5($this->input->post('p2'));
        $p3 = md5($this->input->post('p3'));

        if ($go_to == "simpan") {
            $cek_password_lama = $this->simak_model->get_password($id_url);
            if ($cek_password_lama->password != $p1) {
                $this->session->set_flashdata('message', message_box('Password lama tidak sama', 'danger'));
                redirect('simak/change_password');
            } else if ($p2 != $p3) {
                $this->session->set_flashdata('message', message_box('Password baru 1 dan 2 tidak cocok', 'danger'));
                redirect('simak/change_password');
            } else {
                $this->simak_model->change_password($p3);
                $this->session->set_flashdata('message', message_box('Password berhasil diperbaharui'));
                redirect('simak/change_password');
            }
        } else {
            $data['page'] = "simak/change_password";
        }
        $data['title'] = "Ganti Password";
        $this->load->view('simak/header', $data);
    }

}
