<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller 
{
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus diisi!!!',
            'valid_email' => 'Email Tidak Benar'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'password Harus diisi!!!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'SL - LOGIN';
            $data['user'] = '';
            $this->load->view('templates/aute_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/aute_footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();
        
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        redirect('dashboard');
                    } else {
                        if ($user['image'] == 'default.jpg') {
                            $this->session->set_flashdata('message', 
                            '<div class="alert alert-info alert-message" role="alert">Silahkan Ubah Profile Anda untuk Ubah Photo Profil</div>');
                        }
                        redirect('user');
                    }
                }    else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">User not activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-message" role="alert">Email not registered!</div>');
            redirect('auth');
        }
    } 
    public function regis()
    {
        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Nama Belum diis!!'
        ]);
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[user.email]', [
            'valid_email' => 'Email already registered!',
            'required' => 'Email Belum diisi!',
            'is_unique' => 'Email Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password to short'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false) {
            $data['title'] = 'SL - REGISTRATION';
            $this->load->view('templates/aute_header', $data);
            $this->load->view('auth/regis');
            $this->load->view('templates/aute_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->ModelUser->simpanData($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" 
            role="alert">Congrtulations! your account has been created. please activate</div>');

            redirect('auth');
        }
    }   
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-message" 
            role="alert">Your account has been logout !</div>');
        redirect('auth');
    }
}