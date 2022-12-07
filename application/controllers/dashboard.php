<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data ['title1'] = 'SL - ADMIN';
        $data['title'] = 'Dasboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['order'] = $this->ModelOrder->getOrder()->result_array();
        $this->db->where('role_id', 2);
        $data['member'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('order/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function member()
    {
        $data ['title1'] = 'SL - ADMIN';
        $data['title'] = 'Dasboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 2);
        $data['member'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('order/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/anggota', $data);
        $this->load->view('templates/footer');
    }
    
}