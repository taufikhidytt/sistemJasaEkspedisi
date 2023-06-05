<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Misi extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Misi_model', 'misi');
    }
    public function index()
    {
        $data['title'] = 'Data Misi | MK TRANS';
        $data['judul'] = 'Data Misi MK TRANS';
        $data['data'] = $this->misi->getData();
        $this->template->load('templateAdmin', 'misi/index', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('misi', 'Misi', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->misi->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Misi | MK TRANS';
                $data['judul'] = 'Update Misi MK TRANS';
                $data['data'] = $query->row();
                $this->template->load('templateAdmin', 'misi/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('misi');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->misi->update($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('misi');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('misi');
            }
        }
    }
}
?>