<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        not_admin();
        $this->load->model('Users_model', 'users');
    }
    public function index()
    {
        $data['title'] = 'Data Users | MK TRANS';
        $data['judul'] = 'Data Users';
        $data['data'] = $this->users->getData();
        $this->template->load('templateAdmin', 'users/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]');
        $this->form_validation->set_rules('password2', 'Konfirmasi password', 'required|matches[password]');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai, Silahkan cari username baru');
        $this->form_validation->set_message('min_length', '{field} minimal 7 karakter');
        $this->form_validation->set_message('matches', '{field} wajib sama dengan password');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Data Users | MK TRANS';
            $data['judul'] = 'Add Data Users';
            $this->template->load('templateAdmin', 'users/add', $data);
        } else {
            $data = $this->input->post(null, true);
            if($_FILES)
            {
                date_default_timezone_set("Asia/Jakarta");
                $config['upload_path']      = './assets/upload/users/';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '2200';
                $config['file_name']        = 'usersPhoto-'.date('Y-m-d,H-i-s');
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if($_FILES['image']['name'])
                {
                    if($this->upload->do_upload('image'))
                    {
                        $data['image'] = $this->upload->data('file_name');
                        $this->users->add($data);
                        if($this->db->affected_rows() > 0){
                            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Users Baru');
                            redirect('users');
                        }else{
                            $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Users Baru');
                            redirect('users');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Photo Gagal Di Upload, Pastikan Format Dan Size Yang Di Upload Benar');
                        redirect('users');
                    }
                }else{
                    $this->session->set_flashdata('warning', 'Anda Belum Mengupload Photo Users');
                    redirect('users');

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
        // untuk fungsi validation callback HMVC
		$this->form_validation->CI =& $this;

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if($this->input->post('password'))
        {
            $this->form_validation->set_rules('password', 'Password', 'min_length[7]');
            $this->form_validation->set_rules('password2', 'Konfirmasi password', 'required|matches[password]');
        }

        if($this->input->post('password2'))
        {
            $this->form_validation->set_rules('password2', 'Konfirmasi password', 'matches[password]');
        }

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('min_length', '{field} minimal 7 karakter');
        $this->form_validation->set_message('matches', '{field} wajib sama dengan password');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->users->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Data Users | MK TRANS';
                $data['judul'] = 'Update Data Users';
                $data['data'] = $query->row();
                $this->template->load('templateAdmin', 'users/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('barang');
            }
        } else {
            $data = $this->input->post(null, true);
            if($_FILES)
            {
                date_default_timezone_set("Asia/Jakarta");
                $config['upload_path']      = './assets/upload/users/';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '2200';
                $config['file_name']        = 'usersPhoto-'.date('Y-m-d,H-i-s');
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if($_FILES['image']['name'])
                {
                    if($this->upload->do_upload('image'))
                    {
                        $data['image'] = $this->upload->data('file_name');
                        $this->users->update($data);
                        if($this->db->affected_rows() > 0){
                            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                            redirect('users');
                        }else{
                            $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                            redirect('users');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Photo Gagal Di Upload, Pastikan Format Dan Size Yang Di Upload Benar');
                        redirect('users');
                    }
                }else{
                    $data['image'] = null;
                    $this->users->update($data);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                        redirect('users');
                    }else{
                        $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                        redirect('users');
                    }
                }
            }
        }
    }

    function username_check()
	{
		$pos = $this->input->post(null, true);
		$query = $this->db->query("SELECT * FROM USERS WHERE username = '$pos[username]' AND id_users != '$pos[id]'");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('username_check', '{field} sudah ada, silahkan cari username lain');
			return false;
		}else{
			return true;
		}
	}

    public function del()
    {
        $data = $this->input->post(null, true);
        $this->users->del($data);
        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menghapus Data');
            redirect('users');
        }else{
            $this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
            redirect('users');
        }
    }
}
?>