<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function cek_data($data)
    {
        $this->db->from('users');
        $this->db->where('username', $data['username']);
        $this->db->where('password', sha1($data['password']));
        $data = $this->db->get();
        return $data;
    }

    public function get($id = null)
    {
        $this->db->from('users');
        if($id)
        {
            $this->db->where('id_users', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('status', 'active');
        $data = $this->db->get();
        return $data;
    }
}

?>