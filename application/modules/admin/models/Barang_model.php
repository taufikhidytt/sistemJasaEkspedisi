<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->select('barang.*, kategori_barang.nama as nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori = barang.id_kategori');
        if($id)
        {
            $this->db->where('barang.id_barang', $id);
        }
        $this->db->where('barang.deleted_at', null);
        return $this->db->get();
    }

    public function kategori($id = null)
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
            'id_kategori' => htmlspecialchars($data['kategori']),
            'nama' => htmlspecialchars($data['nama']),
            'description' => htmlspecialchars($data['description']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($data['image'] != null){
            $params['image'] = $data['image'];
        }
        $this->db->insert('barang', $params);
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama' => htmlspecialchars($data['nama']),
            'id_kategori' => htmlspecialchars($data['kategori']),
            'description' => htmlspecialchars($data['description']),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        if($data['image'] != null){
            $params['image'] = $data['image'];
        }
        $this->db->where('id_barang', $data['id']);
        $this->db->update('barang', $params);
    }

    public function del($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_barang', $data['id']);
        $this->db->update('barang', $params);
    }
}
?>