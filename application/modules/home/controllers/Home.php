<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model', 'home');
    }
    public function index()
    {
        $data['title'] = 'Home | MK TRANS';
        $data['hero'] = $this->home->getHero()->row();
        $data['superiority'] = $this->home->getSuperiority();
        $data['contactDescription'] = $this->home->getContactDescription()->row();
        $data['contactAddress'] = $this->home->getContactAddress();
        $data['contactEmail'] = $this->home->getContactEmail();
        $data['contactPhone'] = $this->home->getContactPhone();
        $data['contactFacebook'] = $this->home->getContactFacebook();
        $data['contactInstagram'] = $this->home->getContactInstagram();
        $this->template->load('templateUsers', 'home', $data);
    }

    public function profileSingkat()
    {
        $data['title'] = 'Profile Singkat | MK TRANS';
        $data['about'] = $this->home->getAbout()->row();
        $data['visi'] = $this->home->getVisi()->row();
        $data['misi'] = $this->home->getMisi()->row();
        $data['kategori'] = $this->home->getKategori();
        $data['barang'] = $this->home->getBarang();
        $this->template->load('templateUsers', 'profileSingkat', $data);
    }

    public function syarat()
    {
        $data['title'] = 'Syarat Dan ketentuan | MK TRANS';
        $data['syarat'] = $this->home->getSyarat();
        $this->template->load('templateUsers', 'syarat', $data);
    }

    // public function resi()
    // {
    //     $this->form_validation->set_rules('no_resi', 'No Resi', 'required');
    //     $this->form_validation->set_message('required', '{field} Tidak Boleh Kosong');

    //     if ($this->form_validation->run() == FALSE) {
    //         $data['title'] = 'Cek Resi | MK TRANS';
    //         $this->template->load('templateUsers', 'resi', $data);
    //     } else {
    //         $data = $this->input->post(null, true);
    //         if($data['no_resi'] == 12345)
    //         {
    //             $this->session->set_flashdata('success', 'No Resi Di Temukan, Silahkan Cek Table Detail Resi Anda');
    //             redirect('resi');
    //         }else{
    //             $this->session->set_flashdata('warning', 'No Resi Tidak Di Temukan, Silahkan Cek Kembali No Resi Anda');
    //             redirect('resi');
    //         }
    //     }
    // }
}
?>