<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        belum_login();
        $this->load->model('Superiority_model', 'superiority');
        $this->load->model('TermsAndConditions_model', 'termsAndConditions');
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Contact_model', 'contact');
    }

    public function index()
    {
        $data['title'] = 'Dashboard | MK TRANS';
        $data['judul'] = 'Dashboard MK TRANS';
        $data['superiority'] = $this->superiority->getData()->num_rows();
        $data['termsAndConditions'] = $this->termsAndConditions->getData()->num_rows();
        $data['barang'] = $this->barang->getData()->num_rows();
        $data['contact'] = $this->contact->getData()->num_rows();
        $this->template->load('templateAdmin', 'dashboard/index', $data);
    }
}
?>