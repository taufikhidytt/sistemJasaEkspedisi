<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactDescription extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('ContactDescription_model', 'contactDescription');
    }
    public function index()
    {
        $data['title'] = 'Data Contact Description | MK TRANS';
        $data['judul'] = 'Data Contact Description';
        $data['data'] = $this->contactDescription->getData();
        $this->template->load('templateAdmin', 'contactDescription/index', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('description', 'Title Superiority', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->contactDescription->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Data Contact Description | MK TRANS';
                $data['judul'] = 'Update Data Contact Description';
                $data['data'] = $query->row();
                $this->template->load('templateAdmin', 'contactDescription/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('contactDescription');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->contactDescription->update($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('contactDescription');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('contactDescription');
            }
        }
    }
}
?>