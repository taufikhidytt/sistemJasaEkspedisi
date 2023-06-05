<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TermsAndConditions extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('TermsAndConditions_model', 'terms');
    }
    public function index()
    {
        $data['title'] = 'Data Terms And Conditions | MK TRANS';
        $data['judul'] = 'Data Terms And Conditions';
        $data['data'] = $this->terms->getData();
        $this->template->load('templateAdmin', 'termsAndConditions/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('title', 'Title terms and conditions', 'required');
        $this->form_validation->set_rules('description', 'Description terms and conditions', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Data Terms And Conditions | MK TRANS';
            $data['judul'] = 'Add Data Terms And Conditions';
            $this->template->load('templateAdmin', 'termsAndConditions/add', $data);
        } else {
            $data = $this->input->post(null, true);
            $this->terms->add($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                redirect('termsAndConditions');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                redirect('termsAndConditions');
            }
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Title terms and conditions', 'required');
        $this->form_validation->set_rules('description', 'Description terms and conditions', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->terms->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Data Terms And Conditions | MK TRANS';
                $data['judul'] = 'Update Data Terms And Conditions';
                $data['data'] = $query->row();
                $this->template->load('templateAdmin', 'termsAndConditions/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('termsAndConditions');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->terms->update($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('termsAndConditions');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('termsAndConditions');
            }
        }
    }

    public function del()
    {
        $data = $this->input->post(null, true);
        $this->terms->del($data);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menhapus Data');
            redirect('termsAndConditions');
        }else{
            $this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
            redirect('termsAndConditions');
        }
    }
}
?>