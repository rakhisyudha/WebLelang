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
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run() == false) {
            $data['tittle'] = "Login Page";
            $this->load->view('auth/templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/templates/auth_footer');
        } else {
            //validasi success
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('masyarakat', ['email' => $email])->row_array();
        //jika usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['status'] == 1) {
                //cek password
                if($this->mymodel->login($email, $password)) {
                    $data = [
                        'email' => $user['email']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['status'] == "1") {
                        $this->session->set_flashdata('messages', '<div class="alert alert-danger" role="alert">
                        Login Successfull!</div>');
                        redirect('page');
                    } else {
                        show_404();
                        } 
                } else {
                    $this->session->set_flashdata('messages', '<div class="alert alert-danger" role="alert">
                    Wrong Password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('messages', '<div class="alert alert-danger" role="alert">
                This Email is Blocked!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('messages', '<div class="alert alert-danger" role="alert">
            Email is not registered!
          </div>');
          redirect('auth');
        }
    }
    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|is_unique[masyarakat.username]', [
            'is_unique' => 'this username is already registered!'
        ]);
        $this->form_validation->set_rules('nik', 'Nik', 'required|trim|is_unique[masyarakat.nik]',
        [
            'is_unique' => 'this nik is already taken'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[masyarakat.email]',
        [
            'is_unique' => 'this email is already taken'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Registration';
            $this->load->view('auth/templates/auth_reg_header', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('auth/templates/auth_reg_footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'jk' => htmlspecialchars($this->input->post('jk', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'tgl_join' => date('Y-m-d H:i:s'),
                'status' => 1
            ];
            $this->db->insert('masyarakat', $data); 
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Akun successfully made!
          </div>');
            redirect('Auth');
        }
    }
    public function logout()
    {
        $this->load->model('mymodel');
        $this->mymodel->logout();
        redirect('page');
    }
}
