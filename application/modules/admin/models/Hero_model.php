<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('hero');
        if($id)
        {
            $this->db->where('id', $id);
        }
        return $this->db->get();
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'title' => htmlspecialchars($data['title']),
            'description' => htmlspecialchars($data['description']),
            'updated_at' => date('Y-m-d H:i:s'),
        );

        if($data['banner'] != null)
        {
            $params['banner'] = $data['banner'];
        }
        
        $this->db->where('id', $data['id']);
        $this->db->update('hero', $params);
    }
}
?>