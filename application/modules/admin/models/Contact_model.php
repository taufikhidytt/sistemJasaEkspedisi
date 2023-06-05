<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('contact');
        if($id)
        {
            $this->db->where('id', $id);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'name' => htmlspecialchars($data['name']),
            'jenis_contact' => htmlspecialchars($data['jenis_contact']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('contact', $params);
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'name' => htmlspecialchars($data['name']),
            'jenis_contact' => htmlspecialchars($data['jenis_contact']),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $data['id']);
        $this->db->update('contact', $params);
    }

    public function del($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $data['id']);
        $this->db->update('contact', $params);
    }
}
?>