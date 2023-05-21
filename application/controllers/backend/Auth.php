<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == false) {
            $data['title'] = "Login Page";
            $this->load->view('backend/templates/auth_header', $data);
            $this->load->view('backend/auth/login');
        } else {
            //validasi success
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        //jika usernya ada
        if ($user) {
            
            //jika usernya aktif
            if ($user['status'] == 1) {
                //cek password
                if($this->modelsaya->login($username, $password)) {
                    $data = [
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role'] == "Admin") {
                        redirect('backend/admin');
                    } elseif ($user['role'] == "Petugas") {    
                         redirect('backend/user');
                    } else {
                        show_404();
                        } 
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Wrong Password!</div>');
                    redirect('backend');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                This Username is not activated!</div>');
                redirect('backend');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username is not registered!
          </div>');
          redirect('backend');
        }
    }
    public function registration()
    {
        $data['title'] = "Registrasi Admin";
        if ($this->input->method() === 'post') {
            $username = $this->input->post('username');
            $is_exists = $this->modelus->get_by_user($username)->row();
            if ($is_exists) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username Already Registered
              </div>');
            } else {
                $users = [
                    'username'  => $this->input->post('username'),
                    'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'nip'       => $this->input->post('nip'),
                    'nama'      => $this->input->post('nama'),
                    'role'     => 'Admin',
                    'status' => '1'
                ];
                $saved = $this->modelus->insert($users);
                if ($saved) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Data Saved Successfully
                  </div>');
                    return redirect('backend/auth');
                }
            }
        }
        $this->load->view('backend/templates/auth_header', $data);
        $this->load->view('backend/auth/registration', $data);
    }
    public function logout()
	{
		$this->load->model('modelsaya');
		$this->modelsaya->logout();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out!
          </div>');
		redirect('backend');
	}
}
