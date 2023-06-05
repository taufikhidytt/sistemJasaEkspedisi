<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visi extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Visi_model', 'visi');
    }
    public function index()
    {
        $data['title'] = 'Data Visi | MK TRANS';
        $data['judul'] = 'Data Visi MK TRANS';
        $data['data'] = $this->visi->getData();
        $this->template->load('templateAdmin', 'visi/index', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('visi', 'Visi', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->visi->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Visi | MK TRANS';
                $data['judul'] = 'Update Visi MK TRANS';
                $data['data'] = $query->row();
                $this->template->load('templateAdmin', 'visi/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('visi');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->visi->update($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('visi');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('visi');
            }
        }
    }
}
?>