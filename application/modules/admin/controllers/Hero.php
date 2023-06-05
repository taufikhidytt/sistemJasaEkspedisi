<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Hero_model', 'hero');
    }

    public function index()
    {
        $data['title'] = 'Data Hero | MK TRANS';
        $data['judul'] = 'Data Hero';
        $data['data'] = $this->hero->getData();
        $this->template->load('templateAdmin', 'hero/index', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Title hero', 'required|max_length[100]');
        $this->form_validation->set_rules('description', 'Description hero', 'required|max_length[100]');
        
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('max_length', '{field} maksimal 100 karakter');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->hero->getData($id);
            if($query->num_rows() > 0)
            {
                $data['title'] = 'Update Hero | MK TRANS';
                $data['judul'] = 'Update Hero';
                $data['data'] = $query->row();
                $this->template->load('templateAdmin', 'hero/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Tidak Ada, Silahkan cari Data Yang Tersedia');
                redirect('hero');
            }
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data = $this->input->post(null, true);

            if($_FILES)
            {
                $config['upload_path']      = './assets/upload/banner/';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = 2200;
                $config['file_name']	    = 'bannerPhoto-'.date('Y-m-d,H-i-s');
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if($_FILES['banner']['name'] != null){
					if($this->upload->do_upload('banner')){
                        $data['banner'] = $this->upload->data('file_name');
						$this->hero->update($data);
						if($this->db->affected_rows() > 0){
							$this->session->set_flashdata('success', 'Selamat, Data Berhasil Di Update');
							redirect('hero');
						}else{
							$this->session->set_flashdata('error', 'Data Gagal Di Update');
							redirect('hero');
						}
					}else{
						// $error = $this->upload->display_errors();
						// $this->session->set_flashdata('error', $error);
                        $this->session->set_flashdata('error', 'Data Gagal Di Update, Pastikan Format Dan Size Yang Di Upload Benar');
						redirect('hero/update/'.$data['id']);
					}
				}else{
					$data['banner'] = null;
					$this->hero->update($data);
					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('success', 'Selamat, Data Berhasil Di Update');
						redirect('hero');
					}else{
						$this->session->set_flashdata('error', 'Data Gagal Di Update');
						redirect('hero');
					}
				}
            }
        }
        
    }
}
?>