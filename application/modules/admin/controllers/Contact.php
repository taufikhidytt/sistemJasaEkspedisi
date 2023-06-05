<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Contact_model', 'contact');
    }
    public function index()
    {
        $data['title'] = 'Data Contact | MK TRANS';
        $data['judul'] = 'Data Contact';
        $data['data'] = $this->contact->getData();
        $this->template->load('templateAdmin', 'contact/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('name', 'Name Contact', 'required');
        $this->form_validation->set_rules('jenis_contact', 'Jenis Contact', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Data Contact | MK TRANS';
            $data['judul'] = 'Add Data Contact';
            $this->template->load('templateAdmin', 'contact/add', $data);
        } else {
            $data = $this->input->post(null, true);
            $this->contact->add($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                redirect('contact');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                redirect('contact');
            }
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('name', 'Name Contact', 'required');
        $this->form_validation->set_rules('jenis_contact', 'Jenis Contact', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->contact->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Data Contact | MK TRANS';
                $data['judul'] = 'Update Data Contact';
                $data['data'] = $query->row();
                $this->template->load('templateAdmin', 'contact/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('contact');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->contact->update($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('contact');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('contact');
            }
        }
    }

    public function del()
    {
        $data = $this->input->post(null, true);
        $this->contact->del($data);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menhapus Data');
            redirect('contact');
        }else{
            $this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
            redirect('contact');
        }
    }
}
?>