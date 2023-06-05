<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function getHero()
    {
        $this->db->from('hero');
        return $this->db->get();
    }

    public function getSuperiority()
    {
        $this->db->from('superiority');
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function getContactDescription()
    {
        $this->db->from('contact_description');
        return $this->db->get();
    }

    public function getContactAddress()
    {
        $this->db->from('contact');
        $this->db->where('deleted_at', null);
        $this->db->where('jenis_contact', 'address');
        return $this->db->get();
    }

    public function getContactEmail()
    {
        $this->db->from('contact');
        $this->db->where('deleted_at', null);
        $this->db->where('jenis_contact', 'email');
        return $this->db->get();
    }

    public function getContactPhone()
    {
        $this->db->from('contact');
        $this->db->where('deleted_at', null);
        $this->db->where('jenis_contact', 'phone');
        return $this->db->get();
    }

    public function getContactFacebook()
    {
        $this->db->from('contact');
        $this->db->where('deleted_at', null);
        $this->db->where('jenis_contact', 'facebook');
        return $this->db->get();
    }

    public function getContactInstagram()
    {
        $this->db->from('contact');
        $this->db->where('deleted_at', null);
        $this->db->where('jenis_contact', 'instagram');
        return $this->db->get();
    }

    public function getAbout()
    {
        $this->db->from('about');
        return $this->db->get();
    }

    public function getVisi()
    {
        $this->db->from('visi');
        return $this->db->get();
    }

    public function getMisi()
    {
        $this->db->from('misi');
        return $this->db->get();
    }

    public function getSyarat()
    {
        $this->db->from('terms_conditions');
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function getKategori()
    {
        $this->db->from('kategori_barang');
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }
    
    public function getBarang()
    {
        $this->db->from('barang');
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }
}
?>