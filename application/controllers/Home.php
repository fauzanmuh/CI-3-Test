<?php

class Home extends CI_Controller
{
    public function index($name = '')
    {
        $title = [
            'title' => 'Halaman Home'];
        $data = ['name' => $name];
        $this->load->view('layouts/app', $title);
        $this->load->view('pages/home', $data);
    }

    public function about()
    {
        $this->load->view('pages/about');
    }

    public function contact()
    {
        $this->load->view('pages/contact');
    }
}