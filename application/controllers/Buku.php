<?php

class Buku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data = [
            'title' => 'Daftar Buku'];
        $data['buku'] = $this->Buku_model->getAllBuku(1);

        if ($this->input->post('keyword')) {
            $data['buku'] = $this->Buku_model->searchBuku();
        }
        $this->load->view('layouts/app', $data);
        $this->load->view('buku/index'); 
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Buku'];

        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[buku.judul]');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layouts/app', $data);
            $this->load->view('buku/create');
        } else {
            $this->Buku_model->createBuku();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('buku');
        }
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Data Buku',
            'buku' => $this->Buku_model->getBukuById($id)
        ];
        $this->load->view('layouts/app', $data);
        $this->load->view('buku/detail', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Buku',
            'buku' => $this->Buku_model->getBukuById($id)
        ];

        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[buku.judul]');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
        $this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layouts/app', $data);
            $this->load->view('buku/edit', $data);
        } else {
            $this->Buku_model->editBuku();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect('buku');
        }
    }

    public function delete($id)
    {
        $this->Buku_model->deleteBuku($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('buku');
    }
}