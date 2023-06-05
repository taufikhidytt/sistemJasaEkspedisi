<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('about');
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
            'description' => htmlspecialchars($data['description']),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $data['id']);
        $this->db->update('about', $params);
    }
}
?>