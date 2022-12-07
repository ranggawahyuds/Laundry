<?php
defined('BASEPATH') or exit('No direct script access allowed');

class order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        if ($this->session->userdata['role_id'] == '2'){
        $this->session->set_flashdata('message', 'Tambah data hanya untuk admin!');
        redirect('dashboard');
        }

        $data['title1'] = 'SL - ADMIN';
        $data['title'] = 'Order Data';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['order'] = $this->ModelOrder->getOrder()->result_array();

        $this->form_validation->set_rules('id_order', 'ID Order', 'required|min_length[8]|numeric', [
            'required' => 'ID Order tidak boleh kosong',
            'min_length' => 'ID Order terlalu pendek',
            'numeric' => 'ID Orde harus berupa angka'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email Wajib Diisi',
            'valid_email' => 'Email Tidak Benar'
        ]);
        $this->form_validation->set_rules('jenis', 'Email', 'required', [
            'required' => 'Jenis Laundry wajib di isi'
        ]);
        $this->form_validation->set_rules('total_order', 'Total Order', 'required|numeric', [
            'required' => 'Total Order harus diisi',
            'max_length' => 'Jumlah Order terlalu banyak',
            'numeric' => 'hanya boleh diisi angka'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('order/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('order/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_order' => $this->input->post('id_order', true),
                'email' => $this->input->post('email', true),
                'jenis' => $this->input->post('jenis', true),
                'total_order' => $this->input->post('total_order', true),
                'tgl_order' => $this->input->post('tgl_order', true),
                'tgl_selesai' => $this->input->post('tgl_selesai', true),
                'status_order' => $this->input->post('status_order', true)
            ];

            $this->ModelOrder->simpanOrder($data);
            redirect('order');
            }
    }
    public function ubahOrder()
    {
        $data['title1'] = 'SL - ADMIN';
        $data['title'] = 'Ubah Data Order';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['order'] = $this->ModelOrder->orderWhere(['id_order' => $this->uri->segment(3)])->result_array();

        $this->form_validation->set_rules('id_order', 'ID Order', 'required|min_length[8]|numeric', [
            'required' => 'ID Order tidak boleh kosong',
            'min_length' => 'ID Order terlalu pendek',
            'numeric' => 'ID Orde harus berupa angka'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email Wajib Diisi',
            'valid_email' => 'Email Tidak Benar'
        ]);
        $this->form_validation->set_rules('total_order', 'Total Order', 'required|numeric', [
            'required' => 'Total Order harus diisi',
            'max_length' => 'Jumlah Order terlalu banyak',
            'numeric' => 'hanya boleh diisi angka'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('order/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('order/ubah_order', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'email' => $this->input->post('email', true),
                'jenis' => $this->input->post('jenis', true),
                'total_order' => $this->input->post('total_order', true),
                'status_order' => $this->input->post('status_order', true)
            ];

            $this->ModelOrder->updateOrder($data, ['id_order' => $this->input->post('id_order')]);
            redirect('order');
        }
    }

    public function hapusOrder()
    {
        $where = ['id_order' => $this->uri->segment(3)];
        $this->ModelOrder->hapusOrder($where);
        redirect('order');
    }
}
/*public function hapusBuku()
{
    $where = ['id' => $this->uri->segment(3)];
    $this->ModelBuku->hapusBuku($where);
    redirect('buku');
}
}*/
