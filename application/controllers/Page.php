<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		$data['activeUser'] = $this->mymodel->current_user(); //menampilkan data dari user login
		$data['title'] = "Lelang Online";
		$data["lelang"] = $this->modelapa->get_guguk();
		$this->load->view('page/template/header', $data);
		$this->load->view('page/template/topbar');
		$this->load->view('page/index', $data);
		$this->load->view('page/template/footer');
	}
	public function dbarang($id_lelang = null)
	{
        $data['title'] = "Detail Barang";
		{
            $data['activeUser'] = $this->mymodel->current_user();
            $data['lelang'] = $this->modelapa->berlangsung_by_id($id_lelang)->row();
            if (!$data['lelang'] || !$id_lelang) {
                show_404();
            }
            $data['penawaran'] = $this->modelaku->get_tawar_lelang($id_lelang);
            $data['gambar'] = $this->modelkenapa->get_by_idBarang($data['lelang']->id_barang);
            if ($this->input->method() === 'post') {
                $harga_penawaran = $this->input->post('harga_penawaran');
                if ($harga_penawaran <= $data['lelang']->harga_tertinggi || $harga_penawaran < $data['lelang']->harga_awal) {
                    $this->session->set_flashdata('message', 'Bid must be greater than the current starting or highest price!');
                } else {
                    $penawaran = [
                        'id_masyarakat'     => $data['activeUser']->id_masyarakat,
                        'id_lelang'         => $id_lelang,
                        'harga_penawaran'   => $harga_penawaran
                    ];
                    $update = $this->modelaku->insert($penawaran);
                    if ($update) {
                        $this->session->set_flashdata('message', 'The offer was successfully sent!');
                        return redirect($this->uri->uri_string());
                    } else {
                        $this->session->set_flashdata('message', 'Offer failed to send!');
                    }
                }
            }
            $this->load->view('page/dbarang', $data);
        }
	}
	public function edit()
    {
		$data['title'] = "Edit Profile";
        $data['activeUser'] = $this->mymodel->current_user();
        if (!$data['activeUser']) {
            show_404();
        }
        $data['masyarakat'] = $this->mymodel->get_by_id($data['activeUser']->id_masyarakat);
        if (!$data['masyarakat']) {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $masyarakat = [
                'id_masyarakat'  => $data['activeUser']->id_masyarakat,
                'nik'       => $this->input->post('nik'),
                'nama'      => $this->input->post('nama'),
                'jk'        => $this->input->post('jk'),
                'no_hp'     => $this->input->post('no_hp'),
                'alamat'    => $this->input->post('alamat')
            ];
            $update = $this->mymodel->update($masyarakat);
            if ($update) {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">
				Data Changed Successfully!
			  </div>');
                return redirect($this->uri->uri_string());
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data Modification Failed
			  </div>');
            }
        }
		$this->load->view('page/template/header', $data);
		$this->load->view('page/template/topbar');
		$this->load->view('page/edit_masyarakat', $data);
		$this->load->view('page/template/footer');
    }
	public function change()
    {
		$data['title'] = "Ubah Password";
        $data['activeUser'] = $this->mymodel->current_user();
        if (!$data['activeUser']) {
            show_404();
        }
        $data['masyarakat'] = $this->mymodel->get_by_id($data['activeUser']->id_masyarakat);
        if (!$data['masyarakat']) {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $current = $this->input->post('current');
            $verify = $this->mymodel->verify($data['activeUser']->email, $current);
            if (!$verify) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Current Password Salah!
			  </div>');
            } else {
                $masyarakat = [
                    'id_masyarakat'  => $data['activeUser']->id_masyarakat,
                    'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                ];
                $update = $this->mymodel->update($masyarakat);
                if ($update) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password Changed Successfully. Please Login Again
				  </div>');
                    $this->logout();
                    redirect();
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
					Password Changed Failed!
				  </div>');
                }
            }
        }
        $this->load->view('page/template/header', $data);
		$this->load->view('page/template/topbar');
		$this->load->view('page/change_password', $data);
		$this->load->view('page/template/footer');
    }
	public function penawaran($id = null) {
		$data['activeUser'] = $this->mymodel->current_user();
        if (!$data['activeUser']) {
            show_404();
        }
		$data['title'] = "Riwayat Penawaran";
        $data['penawaran'] = $this->modelaku->get_by_penawar($data['activeUser']->id_masyarakat);
		$this->load->view('page/template/header', $data);
		$this->load->view('page/template/topbar');
		$this->load->view('page/penawaran', $data);
		$this->load->view('page/template/footer');
	}
	public function lelang()
    {
        $data['activeUser'] = $this->mymodel->current_user();
		$data['title'] = "Pemenang";
        $data['pemenang'] = $this->modelkita->get_pemenang($data['activeUser']->id_masyarakat);
        $this->load->view('page/template/header', $data);
		$this->load->view('page/template/topbar');
		$this->load->view('page/pemenang_lelang', $data);
		$this->load->view('page/template/footer');
    }
	public function add_penawaran($id = null) {
		$data['activeUser'] = $this->mymodel->current_user(); //menampilkan data dari user login
		$lelang = $this->modelapa;
        $getId["lelang"] = $lelang->getById($id);
		if(@$data['activeUser']->id_masyarakat == null) 
		{ //jika masyarakat belum login
            $this->session->set_flashdata('sukses_b', '<div class="alert alert-danger" role="alert">
            Please Login First!
          </div>');
		  redirect('page/dbarang/'.$id);
        } 
		else 
		{
		$tambah = 
		[
			'id_masyarakat' => $data['activeUser']->id_masyarakat,
			'id_lelang' => $id,
			'tgl_penawaran' =>  date("Y-m-d h:i:s"),
			'harga_penawaran' => $this->input->post('harga_penawaran')
		];
		$this->modelaku->add_penawaran($tambah);
		$this->session->set_flashdata('asik', '<div class="alert alert-danger" role="alert">
		Successful Bidding!
          </div>');
		  redirect('page/dbarang/'.$id);
		}
	}
	public function delete_penawaran($id_penawaran = null)
    {
        $data['activeUser'] = $this->mymodel->current_user();
        if (!$data['activeUser']) {
            show_404();
        }
        $data['penawaran'] = $this->modelaku->get_by_id($id_penawaran)->row();
        if (!$data['penawaran'] || $data['penawaran']->id_masyarakat <> $data['activeUser']->id_masyarakat) {
            show_404();
        }
        $deleted = $this->modelaku->delete($id_penawaran);
        if ($deleted) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Offer has been removed!
          </div>');
            redirect('page/penawaran');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Offer failed to be remove!
          </div>');
        }
        $this->load->view('page/template/header', $data);
		$this->load->view('page/template/topbar');
		$this->load->view('page/penawaran', $data);
		$this->load->view('page/template/footer');
    }
	public function logout()
    {
        $this->mymodel->logout();
        redirect('auth');
    }
	public function cari()
    {
		$data['title'] = "Lelang Geming";
        $keyword = $this->input->post('cari');
        if (empty($keyword)) {
            redirect();
        }
        $data['activeUser'] = $this->mymodel->current_user();
        $data['lelang'] = $this->modelapa->search($keyword);
        if (!$data['lelang']) {
            return
			show_404();
        }
		$this->load->view('page/template/header', $data);
		$this->load->view('page/template/topbar');
        $this->load->view('page/index', $data);
		$this->load->view('page/template/footer');
    }
}
?>