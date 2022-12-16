<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['title1'] = 'SL - USER';
        $data['title'] = 'My Profile';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }
    public function hapusUser()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelUser->hapusUser($where);
        redirect('dashboard/member');
    }
}