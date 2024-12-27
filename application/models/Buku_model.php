<?php

class Buku_model extends CI_Model
{
    public function getAllBuku()
    {
        return $this->db->get('buku')->result_array();
    }

    public function createBuku()
    {
        $data = [
            'judul' => $this->input->post('judul', true),
            'penulis' => $this->input->post('penulis', true),
            'penerbit' => $this->input->post('penerbit', true),
            'tahun_terbit' => $this->input->post('tahun_terbit', true)
        ];
        $this->db->insert('buku', $data);
    }
    
    public function deleteBuku($id)
    {
        $this->db->where('id', $id); 
        $this->db->delete('buku');
    }

    public function searchBuku()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('judul', $keyword);
        $this->db->or_like('penulis', $keyword);
        $this->db->or_like('penerbit', $keyword);
        return $this->db->get('buku')->result_array();
    }

}