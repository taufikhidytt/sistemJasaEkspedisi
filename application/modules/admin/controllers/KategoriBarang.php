<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriBarang extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('KategoriBarang_model', 'kategori');
    }
    public function index()
    {
        $data['title'] = 'Data Kategori Barang | MK TRANS';
        $data['judul'] = 'Data Kategori Barang';
        $data['data'] = $this->kategori->getData();
        $this->template->load('templateAdmin', 'kategoriBarang/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama kategori barang', 'required');
        $this->form_validation->set_rules('description', 'Description kategori barang', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Data Kategori Barang | MK TRANS';
            $data['judul'] = 'Add Data Kategori Barang';
            $this->template->load('templateAdmin', 'kategoriBarang/add', $data);
        } else {
            $data = $this->input->post(null, true);
            $this->kategori->add($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                redirect('kategoriBarang');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                redirect('kategoriBarang');
            }
        }
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama', 'Nama kategori barang', 'required');
        $this->form_validation->set_rules('description', 'Description kategori barang', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->kategori->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Data Kategori Barang | MK TRANS';
                $data['judul'] = 'Update Data Kategori Barang';
                $data['data'] = $query->row();
                $this->template->load('templateAdmin', 'kategoriBarang/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('kategoriBarang');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->kategori->update($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('kategoriBarang');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('kategoriBarang');
            }
        }
    }

    public function del()
    {
        $data = $this->input->post(null, true);
        $result = $this->kategori->checkDel($data);
        if($result->num_rows() > 0)
        {
            $this->session->set_flashdata('warning', 'Data Kategori Barang Masih Terpakai Di Barang, Data Kategori Bisa Di Hapus Jika Tidak Ada Barang Yang Memakai Kategori Tersebut');
            redirect('kategoriBarang');
        }else{
            $this->kategori->del($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menghapus Data');
                redirect('kategoriBarang');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
                redirect('kategoriBarang');
            }
        }
    }
}
?>