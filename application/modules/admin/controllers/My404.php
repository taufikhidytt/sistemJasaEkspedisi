<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends MX_Controller
{
    public function index()
    {
        $this->load->view('notfound');
    }

}
?>