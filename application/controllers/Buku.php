<?php

class Buku extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Buku';
        $this->load->view('layouts/app', $data);
        $this->load->view('buku/index');
    }
}