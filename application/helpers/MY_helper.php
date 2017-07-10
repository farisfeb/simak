<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// ambil database
function gli($tabel, $field_kunci, $pad) {
    $CI =& get_instance();
    $nama = $CI->db->query("SELECT max($field_kunci) AS last FROM $tabel")->row();
    $data = (intval($nama->last)) + 1;
    $last = str_pad($data, $pad, '0', STR_PAD_LEFT);
    return $last;
}

function gval($tabel, $field_kunci, $diambil, $where) {
    $CI =& get_instance();
    $nama = $CI->db->query("SELECT $diambil FROM $tabel WHERE $field_kunci = '$where'")->row();
    $data = empty($nama) ? "-" : $nama->$diambil;
    return $data;
}

//Merapikan tabel dengan membatasi karakter
function limit_word($word, $max_length, $cutword) {
    if (strlen($word) <= $max_length) {
        $new_word = $word;
    } else if ($cutword == 0) {
        $new_word = substr($word, 0, strrpos(substr($word, 0, $max_length), ' ')) . '...';
    } else if ($cutword == 1) {
        $new_word = substr($word, 0, $max_length) . '...';
    }
    return $new_word;
}

//Menampilkan flashdata
function message_box($msg, $status = 'success') {
    $response = '';
    $class = 'danger';
    if ($status == 'success') {
        $class = 'success';
    }
    if (!empty($msg)) {
        $response = '<div class="alert alert-' . $class . ' alert-dismissable no-margin"'
                . 'style="margin-bottom:15px!important;">'
                . '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                . $msg
                . '</div>';
    }
    return $response;
}

function tgl_jam_sql($tgl) {
    $pc_satu = explode(" ", $tgl);
    if (count($pc_satu) < 2) {
        $tgl1 = $pc_satu[0];
        $jam1 = "";
    } else {
        $jam1 = $pc_satu[1];
        $tgl1 = $pc_satu[0];
    }

    $pc_dua = explode("-", $tgl1);
    $tgl = $pc_dua[2];
    $bln = $pc_dua[1];
    $thn = $pc_dua[0];

    if ($bln == "01") {
        $bln_txt = "Jan";
    } else if ($bln == "02") {
        $bln_txt = "Feb";
    } else if ($bln == "03") {
        $bln_txt = "Mar";
    } else if ($bln == "04") {
        $bln_txt = "Apr";
    } else if ($bln == "05") {
        $bln_txt = "Mei";
    } else if ($bln == "06") {
        $bln_txt = "Jun";
    } else if ($bln == "07") {
        $bln_txt = "Jul";
    } else if ($bln == "08") {
        $bln_txt = "Ags";
    } else if ($bln == "09") {
        $bln_txt = "Sep";
    } else if ($bln == "10") {
        $bln_txt = "Okt";
    } else if ($bln == "11") {
        $bln_txt = "Nov";
    } else if ($bln == "12") {
        $bln_txt = "Des";
    } else {
        $bln_txt = "";
    }
    return $tgl . " " . $bln_txt . " " . $thn . "  " . $jam1;
}

//Pagination
function _page($total_row, $per_page, $uri_segment, $url) {
    $CI =& get_instance();
    $CI->load->library('pagination');
    $config['base_url'] = $url;
    $config['total_rows'] = $total_row;
    $config['uri_segment'] = $uri_segment;
    $config['per_page'] = $per_page;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active disabled"><a href="#" style="background: #e3e3e3"><b>';
    $config['cur_tag_close'] = '</b></a></li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';

    $CI->pagination->initialize($config);
    return $CI->pagination->create_links();
}
