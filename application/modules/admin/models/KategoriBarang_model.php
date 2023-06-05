<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriBarang_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('kategori_barang');
        if($id)
        {
            $this->db->where('id_kategori', $id);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama' => htmlspecialchars($data['nama']),
            'description' => htmlspecialchars($data['description']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('kategori_barang', $params);
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama' => htmlspecialchars($data['nama']),
            'description' => htmlspecialchars($data['description']),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_kategori', $data['id']);
        $this->db->update('kategori_barang', $params);
    }

    public function checkDel($data)
    {
        $this->db->from('barang');
        $this->db->where('id_kategori', $data['id']);
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function del($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_kategori', $data['id']);
        $this->db->update('kategori_barang', $params);
    }
}
?>