<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superiority extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Superiority_model', 'superiority');
    }
    public function index()
    {
        $data['title'] = 'Data Superiority | MK TRANS';
        $data['judul'] = 'Data Superiority';
        $data['data'] = $this->superiority->getData();
        $this->template->load('templateAdmin', 'superiority/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('title', 'Title Superiority', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Data Superiority | MK TRANS';
            $data['judul'] = 'Add Data Superiority';
            $this->template->load('templateAdmin', 'superiority/add', $data);
        } else {
            $data = $this->input->post(null, true);
            $this->superiority->add($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                redirect('superiority');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                redirect('superiority');
            }
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Title Superiority', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->superiority->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Data Superiority | MK TRANS';
                $data['judul'] = 'Update Data Superiority';
                $data['data'] = $query->row();
                $this->template->load('templateAdmin', 'superiority/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('superiority');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->superiority->update($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('superiority');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('superiority');
            }
        }
    }

    public function del()
    {
        $data = $this->input->post(null, true);
        $this->superiority->del($data);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menhapus Data');
            redirect('superiority');
        }else{
            $this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
            redirect('superiority');
        }
    }
}
?>