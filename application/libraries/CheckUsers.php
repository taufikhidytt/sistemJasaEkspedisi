<?php

class CheckUsers
{
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function users_login()
    {
        $this->ci->load->model('admin/Auth_model', 'auth');
        $id_users = $this->ci->session->userdata('id_users');
        $data = $this->ci->auth->get($id_users)->row();
        return $data;
    }
}
?>