<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superiority_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('superiority');
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
            'title' => htmlspecialchars($data['title']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('superiority', $params);
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'title' => htmlspecialchars($data['title']),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $data['id']);
        $this->db->update('superiority', $params);
    }

    public function del($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id', $data['id']);
        $this->db->update('superiority', $params);
    }
}
?>