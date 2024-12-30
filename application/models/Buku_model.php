<?php

class Buku_model extends CI_Model
{
    public function getAllBuku($limit, $start)
    {
        return $this->db->get('buku', $limit, $start)->result_array();
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

    public function getBukuById($id)
    {
        return $this->db->get_where('buku', ['id' => $id])->row_array();
    }

    public function editBuku()
    {
        $data = [
            'judul' => $this->input->post('judul', true),
            'penulis' => $this->input->post('penulis', true),
            'penerbit' => $this->input->post('penerbit', true),
            'tahun_terbit' => $this->input->post('tahun_terbit', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('buku', $data);
    }
    
    public function deleteBuku($id)
    {
        $this->db->delete('buku', ['id' => $id]);
    }

    public function searchBuku()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('judul', $keyword);
        $this->db->or_like('penulis', $keyword);
        $this->db->or_like('penerbit', $keyword);
        $this->db->or_like('tahun_terbit', $keyword);
        return $this->db->get('buku')->result_array();
    }

    public function countAllBuku()
    {
        return $this->db->get('buku')->num_rows();
    }
}