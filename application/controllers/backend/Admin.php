<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $data['title'] = "Dashboard";
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Admin') {
            show_404();
        }
        $data['tittle'] = 'Dashboard';
        $data["berlangsung"] = $this->modelaja->getAll();
        $data["pemenang"] = $this->modelkita->getall_pemenangLelangdash();
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('backend/admin/index', $data);
    }

	public function user()
    {
        $data['title'] = "List User";
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role == 'Admin') {
            $data['User'] = $this->modelus->get_all();
        } else {
            $data['User'] = $this->modelus->get_by_user($data['activeUser']->username)->result();;
        }
        $data['tittle'] = 'List Data User';
        $this->load->view('backend/admin/user', $data);
    }
    public function auser()
    {
        $data['title'] = "Tambah User";
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Admin') {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $username = $this->input->post('username');
            $is_exists = $this->modelus->get_by_user($username)->row();
            if ($is_exists) {
                $this->session->set_flashdata('message', 'Username already registered!');
            } else {
                $users = [
                    'username'  => $this->input->post('username'),
                    'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'nip'       => $this->input->post('nip'),
                    'nama'      => $this->input->post('nama'),
                    'role'     => $this->input->post('role'),
                    'status' => '1'
                ];
                $saved = $this->modelus->insert($users);
                if ($saved) {
                    $this->session->set_flashdata('message', 'Data saved successfully!');
                    return redirect('backend/admin/user');
                }
            }
        }
        $this->load->view('backend/user/auser', $data);
    }

    public function masyarakat()
    {
        $data['title'] = "List Masyarakat";
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Admin') {
            show_404();
        }
        $data['tittle'] = 'List Data Masyarakat';
        $data['masyarakat'] = $this->mymodel->get_all();
        $this->load->view('backend/admin/masyarakat', $data);
    }
    public function change($id_user = null)
    {
        $data['title'] = "Ganti Password";
        $data['activeUser'] = $this->modelsaya->current_user();
        $data['user'] = $this->modelus->get_by_id($id_user);
        if (@$data['activeUser']->role <> 'Admin' && $data['activeUser']->username <> $data['user']->username) {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $current = $this->input->post('current');
            $verify = $this->modelus->verify($data['user']->username, $current);
            if (!$verify) {
                $this->session->set_flashdata('message', 'Current password is Wrong!');
            } else {
                $user = [
                    'id'   => $id_user,
                    'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                ];
                $update = $this->modelus->update($user);
                if ($update) {
                    $this->session->set_flashdata('message', 'Password Changed Successfully!');
                    if ($data['activeUser']->username == $data['user']->username) {
                        $this->modelsaya->logout();
                        redirect('backend');
                    }
                    redirect('backend/admin/user');
                } else {
                    $this->session->set_flashdata('message', 'Password Failed to Change!');
                }
            }
        }
        $this->load->view('backend/user/change_password', $data);
    }
    
    public function edit($id_user = null)
    {
        $data['title'] = "Edit User";
        $data['activeUser'] = $this->modelsaya->current_user();
        $data['user'] = $this->modelus->get_by_id($id_user);
        if (@$data['activeUser']->role <> 'Admin' && $data['activeUser']->username <> $data['user']->username) {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $user = [
                'id'   => $id_user,
                'nip'       => $this->input->post('nip'),
                'nama'      => $this->input->post('nama'),
                'role'     => $this->input->post('role')
            ];
            $update = $this->modelus->update($user);
            if ($update) {
                $this->session->set_flashdata('message', 'Data berhasil diubah!');
                redirect('backend/admin/user');
            } else {
                $this->session->set_flashdata('message', 'Data gagal diubah!');
            }
        }
        $this->load->view('backend/user/edit_user', $data);
    }
    public function block_mas($id_masyarakat = null)
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Admin') {
            show_404();
        }
        $data['masyarakat'] = $this->mymodel->get_by_id($id_masyarakat);
        if (!$data['masyarakat'] || !$id_masyarakat) {
            show_404();
        }
        $masyarakat = [
            'id_masyarakat' => $id_masyarakat,
            'update_by' => $data['activeUser']->id,
            'update_date' => date('Y-m-d H:i:s'),
            'status' => 0
        ];
        $update = $this->mymodel->update($masyarakat);
        if ($update) {
            $this->session->set_flashdata('message', 'Data is Blocked Successfully!');
        } else {
            $this->session->set_flashdata('message', 'Data is Failed to block!');
        }
        redirect('backend/admin/masyarakat');
    }
    public function unblock_mas($id_masyarakat = null)
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Admin') {
            show_404();
        }
        $data['masyarakat'] = $this->mymodel->get_by_id($id_masyarakat);
        if (!$data['masyarakat'] || !$id_masyarakat) {
            show_404();
        }
        $masyarakat = [
            'id_masyarakat' => $id_masyarakat,
            'update_by' => $data['activeUser']->id,
            'update_date' => date('Y-m-d H:i:s'),
            'status' => 1
        ];
        $update = $this->mymodel->update($masyarakat);
        if ($update) {
            $this->session->set_flashdata('message', 'Data is UnBlocked!');
        } else {
            $this->session->set_flashdata('message', 'Data is Failed to unblock!');
        }
        redirect('backend/admin/masyarakat');
    }
    public function block($id_user = null)
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Admin') {
            show_404();
        }
        $data['user'] = $this->modelus->get_by_id($id_user);
        if (!$data['user'] || !$id_user) {
            show_404();
        }
        $user = [
            'id' => $id_user,
            'status' => 0
        ];
        $update = $this->modelus->update($user);
        if ($update) {
            $this->session->set_flashdata('message', 'Data is Blocked Successfully!');
        } else {
            $this->session->set_flashdata('message', 'Data is Failed to Block!');
        }
        redirect('backend/admin/user');
    }
    public function unblock($id_user = null)
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Admin') {
            show_404();
        }
        $data['user'] = $this->modelus->get_by_id($id_user);
        if (!$data['user'] || !$id_user) {
            show_404();
        }
        $user = [
            'id' => $id_user,
            'status' => 1
        ];
        $update = $this->modelus->update($user);
        if ($update) {
            $this->session->set_flashdata('message', 'Data is UnBlocked!');
        } else {
            $this->session->set_flashdata('message', 'Data is Failed to UnBlock!');
        }
        redirect('backend/admin/user');
    }
}
