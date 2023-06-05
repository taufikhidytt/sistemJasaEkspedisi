<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
    }

    public function index()
    {
        sudah_login();
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => '{field} Tidak Boleh Kosong',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => '{field} Tidak Boleh Kosong',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Sign In | MK TRANS";
            $data['judul'] = 'Sign In';
            $this->load->view('auth/login', $data);
        } else {
            $data = $this->input->post(null, true);
            $query = $this->auth->cek_data($data);
            if($query->num_rows() > 0)
            {
                $data = $query->row();
                if($data->status == 'inactive'){
                    $this->session->set_flashdata('warning', 'Status Akun Anda Masih Inactive, Silahkan Hubungi Admin Untuk Aktifkan Akun Anda');
                    redirect('auth');
                }else{
                    $session = [
                        'id_users'  => $data->id_users,
                    ];
                    $this->session->set_userdata($session);
                    $this->session->set_flashdata('success', 'Selamat Datang '.$data->nama.'!!');
                    redirect('dashboard');
                }
            }else{
                $this->session->set_flashdata('warning', 'Username Atau Password Anda Salah!!');
                redirect('auth');
            }
        }
        
    }

    public function logout()
    {
        $session = [
            'id_users',
        ];
        $this->session->unset_userdata($session);
        $this->session->set_flashdata('success', 'Selamat! Anda Berhasil Logout!');
        redirect('auth');
    }
}
?>