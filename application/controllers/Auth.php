<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
        $data = [
            'title' => 'Login'];
        
        $this->load->view('layouts/app', $data);
        $this->load->view('auth/login');
    }
    
    public function register() {
        $data = [
            'title' => 'Registration'];

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]|valid_email', [
            'is_unique' => 'This email has already registered',
            'valid_email' => 'Invalid email format'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|min_length[5]|trim|matches[password2]', [
            'matches' => 'Password dont match',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|matches[password1]', [
            'matches' => 'Password dont match'
        ]);

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layouts/app', $data);
            $this->load->view('auth/register', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => date()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please login.</div>');
            redirect('auth');
        }
    }
}