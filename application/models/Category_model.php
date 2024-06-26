<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function getCategory()
    {
        $query = "SELECT *
                    FROM category
                    ";
        return $this->db->query($query)->result_array();
    }
    public function getNamakategori()
    {
        $query = "SELECT *
                    FROM category ORDER BY nama_kategori ASC
                    ";
        return $this->db->query($query)->result_array();
    }

    public function hapus($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('category');
    }

    function updateKategori($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('category', $data);
    }

}