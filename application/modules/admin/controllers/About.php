<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('About_model', 'about');
    }
    public function index()
    {
        $data['title'] = 'Data About | MK TRANS';
        $data['judul'] = 'Data About MK TRANS';
        $data['data'] = $this->about->getData();
        $this->template->load('templateAdmin', 'about/index', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('description', 'Title Superiority', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->about->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update About | MK TRANS';
                $data['judul'] = 'Update About MK TRANS';
                $data['data'] = $query->row();
                $this->template->load('templateAdmin', 'about/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('about');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->about->update($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('about');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('about');
            }
        }
    }
}
?>