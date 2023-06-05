<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Barang_model', 'barang');
    }
    public function index()
    {
        $data['title'] = 'Data Barang | MK TRANS';
        $data['judul'] = 'Data Barang';
        $data['data'] = $this->barang->getData();
        $this->template->load('templateAdmin', 'barang/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama barang', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori barang', 'required');
        $this->form_validation->set_rules('description', 'Description barang', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Data Barang | MK TRANS';
            $data['judul'] = 'Add Data Barang';
            $data['kategori'] = $this->barang->kategori();
            $this->template->load('templateAdmin', 'barang/add', $data);
        } else {
            $data = $this->input->post(null, true);
            if($_FILES)
            {
                date_default_timezone_set("Asia/Jakarta");
                $config['upload_path']      = './assets/upload/barang/';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '2200';
                $config['file_name']        = 'barangPhoto-'.date('Y-m-d,H-i-s');
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if($_FILES['image']['name'])
                {
                    if($this->upload->do_upload('image'))
                    {
                        $data['image'] = $this->upload->data('file_name');
                        $this->barang->add($data);
                        if($this->db->affected_rows() > 0){
                            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                            redirect('barang');
                        }else{
                            $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                            redirect('barang');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Photo Gagal Di Upload, Pastikan Format Dan Size Yang Di Upload Benar');
                        redirect('barang');
                    }
                }else{
                    $this->session->set_flashdata('warning', 'Anda Belum Mengupload Photo Barang');
                    redirect('barang');

                    // $data['image'] = null;
                    // $this->barang->add($data);
                    // if($this->db->affected_rows() > 0){
                    //     $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                    //     redirect('barang');
                    // }else{
                    //     $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                    //     redirect('barang');
                    // }
                    
                }
            }
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama', 'Nama barang', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori barang', 'required');
        $this->form_validation->set_rules('description', 'Description barang', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->barang->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Data Barang | MK TRANS';
                $data['judul'] = 'Update Data Barang';
                $data['data'] = $query->row();
                $data['kategori'] = $this->barang->kategori();
                $this->template->load('templateAdmin', 'barang/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('barang');
            }
        } else {
            $data = $this->input->post(null, true);
            // var_dump($data);
            // die();
            if($_FILES)
            {
                date_default_timezone_set("Asia/Jakarta");
                $config['upload_path']      = './assets/upload/barang/';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '2200';
                $config['file_name']        = 'barangPhoto-'.date('Y-m-d,H-i-s');
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if($_FILES['image']['name'])
                {
                    if($this->upload->do_upload('image'))
                    {
                        $data['image'] = $this->upload->data('file_name');
                        $this->barang->update($data);
                        if($this->db->affected_rows() > 0){
                            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                            redirect('barang');
                        }else{
                            $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                            redirect('barang');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Photo Gagal Di Upload, Pastikan Format Dan Size Yang Di Upload Benar');
                        redirect('barang');
                    }
                }else{
                    $data['image'] = null;
                    $this->barang->update($data);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                        redirect('barang');
                    }else{
                        $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                        redirect('barang');
                    }
                }
            }
        }
    }

    public function del()
    {
        $data = $this->input->post(null, true);
        $this->barang->del($data);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menghapus Data');
            redirect('barang');
        }else{
            $this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
            redirect('barang');
        }
    }
}
?>