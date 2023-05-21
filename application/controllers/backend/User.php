<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Petugas') {
            show_404();
        }
        $data['activeUser'] 	= $this->modelsaya->current_user();
        $data['title'] = 'Dashboard';
        $data["berlangsung"] = $this->modelaja->getAll();
        $data["pemenang"] = $this->modelkita->getall_pemenangLelangdash();
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('backend/user/index', $data);
    }
    public function rbarang()
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Petugas') {
            show_404();
        }
        $data['title'] = 'Data Barang';
        $data["barang"] = $this->modelsiapa->getAllView();
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('backend/user/rbarang', $data);
    }
    public function klelang($id = null)
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Petugas') {
            show_404();
        }
        $barangedit = $this->modelsiapa;
        $getId["barang"] = $barangedit->getById($id);
        $data['title'] = 'Data Lelang';
        $data["lelang"] = $this->modelapa->getAllView();
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $kamu = array_merge($getId, $data);
        $this->load->view('backend/user/klelang', $kamu);
    }
    public function edit_lelang($id_lelang = null)
    {
        $data['title'] = "Edit Lelang";
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Petugas') {
            show_404();
        }
        $data['lelang'] = $this->modelapa->get_by_id($id_lelang)->row();
        if (!$data['lelang'] || !$id_lelang) {
            show_404();
        }
        $data['barang'] = $this->modelsiapa->get_by_id($data['lelang']->id_barang)->row();
        if ($this->input->method() === 'post') {
            $lelang = [
                'id_lelang' => $id_lelang,
                'tgl_mulai' => $this->input->post('tgl_mulai'),
                'tgl_akhir' => $this->input->post('tgl_akhir')
            ];
            $update = $this->modelapa->update($lelang);
            if ($update) {
                $this->session->set_flashdata('message', 'Data successfully modified!');
                redirect('backend/user/klelang');
            } else {
                $this->session->set_flashdata('message', 'Data failed to change!');
            }
        }
        $this->load->view('backend/user/edit_lelang', $data);
    }
    public function add_barang()
    {
        $data['title'] = "Tambah Barang";
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Petugas') {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $ori_name                       = $_FILES["gambar"]["name"];
            $file_name                      = uniqid('', true);
            $config['upload_path']          = './assets/img/barang';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name']            = str_replace('.', '', $file_name);
            $config['overwrite']            = true;
            $config['max_size']             = 10240;
            $config['max_width']            = 13000;
            $config['max_height']           = 13000;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar')) {
                $data['error'] = $this->upload->display_errors();
                $error = preg_replace('/[^a-zA-Z0-9-_\.]/', ' ', strip_tags($data['error']));
                $this->session->set_flashdata('message', $error);
            } else {
                $barang = [
                    'nama_barang' => $this->input->post('nama_barang'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'harga_awal' => $this->input->post('harga_awal')
                ];
                $saved = $this->modelsiapa->insert($barang);
                if ($saved) {
                    $uploaded_data = $this->upload->data();
                    $gambar = [
                        'id_barang' => $saved,
                        'gambar' => $uploaded_data['file_name'],
                        'nama_gambar' => $ori_name,
                        'utama' => 1,
                        'urutan' => 0
                    ];
                    $savedGambar = $this->modelkenapa->insert($gambar);
                    if ($savedGambar) {
                        $this->session->set_flashdata('message', 'Data saved successfully!');
                        return redirect('backend/user/rbarang');
                    } else {
                        $this->session->set_flashdata('message', 'Data failed to change!');
                    }
                }
            }
        }
        $this->load->view('backend/user/abarang', $data);
    }
    public function edit_barang($id_barang = null)
    {
        $data['title'] = "Edit Barang";
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Petugas') {
            show_404();
        }
        $data['barang'] = $this->modelsiapa->get_by_id($id_barang)->row();
        $data['gambar'] = $this->modelkenapa->get_utama_idBarang($id_barang)->row();
        if (!$data['barang'] || !$id_barang) {
            show_404();
        }
        if ($this->input->method() === 'post') {
            $oriImg = $data['barang']->gambar;
            $newImg = $_FILES['gambar']['name'];
            if (!empty($newImg)) {
                $file_name                   = uniqid('', true);
                $config['upload_path']          = './assets/img/barang';
                $config['allowed_types']     = 'jpg|png|jpeg';
                $config['file_name']         = str_replace('.', '', $file_name);
                $config['overwrite']         = true;
                $config['max_size']          = 10240;
                $config['max_width']         = 13000;
                $config['max_height']        = 13000;
                $this->load->library('upload');
                $this->upload->initialize($config);
                $uploaded = $this->upload->do_upload('gambar');
                if (!$uploaded) {
                    $data['error'] = $this->upload->display_errors();
                    $error = preg_replace('/[^a-zA-Z0-9-_\.]/', ' ', strip_tags($data['error']));
                    $this->session->set_flashdata('message', $error);
                } else {
                    $ori_file_name      = substr($oriImg, 0, strpos($oriImg, "."));
                    array_map('unlink', glob(FCPATH . "/assets/img/barang/$ori_file_name.*"));
                }
            }
            $barang = [
                'id_barang' => $id_barang,
                'nama_barang' => $this->input->post('nama_barang'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga_awal' => $this->input->post('harga_awal')
            ];
            $updated = $this->modelsiapa->update($barang);
            if ($updated && !empty($newImg)) {
                $uploaded_data = $this->upload->data();
                $gambar = [
                    'id_gambar' => $data['gambar']->id_gambar,
                    'id_barang' => $id_barang,
                    'gambar' => $uploaded_data['file_name'],
                    'nama_gambar' => $newImg,
                    'utama' => 1
                ];
                $updateGambar = $this->modelkenapa->update($gambar);
                if (!$updateGambar) {
                    $this->session->set_flashdata('message', 'Image failed to change!');
                }
            }
            if ($updated) {
                $this->session->set_flashdata('message', 'Data successfully modified!');
                redirect('backend/user/rbarang');
            } else {
                $this->session->set_flashdata('message', 'Data failed to change!');
            }
        }
        $this->load->view('backend/user/edit_barang', $data);
    }
    public function hapus_barang($id_barang)
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Petugas') {
            show_404();
        }
        if (!$id_barang) {
            show_404();
        }
        $data['gambar']    = $this->modelkenapa->get_by_idBarang($id_barang);
        $deletedGambar     = $this->modelkenapa->deleteByBarang($id_barang);
        $deleted           = $this->modelsiapa->delete($id_barang);
        if ($deleted && $deletedGambar) {
            foreach ($data['gambar'] as $gambar) {
                $img_name       = $gambar->gambar;
                $file_name      = substr($img_name, 0, strpos($img_name, "."));
                array_map('unlink', glob(FCPATH . "/assets/img/barang/$file_name.*"));
            }
            $this->session->set_flashdata('message', 'Data berhasil dihapus!');
            redirect('backend/user/rbarang');
        } else {
            $this->session->set_flashdata('message', 'Data gagal dihapus!');
        }
    }
    public function confirm($id_lelang = null)
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Petugas') {
            show_404();
        }
        $data['lelang'] = $this->modelapa->get_by_id($id_lelang)->row();
        if (!$data['lelang'] || !$id_lelang) {
            show_404();
        }
        $lelang = [
            'id_lelang' => $id_lelang,
            'status' => 'confirmed'
        ];
        $update = $this->modelapa->update($lelang);
        if ($update) {
            $this->session->set_flashdata('message', 'Data has successfully been confirmed!');
        } else {
            $this->session->set_flashdata('message', 'Data failed to confirm!');
        }
        redirect('backend/user');
    }
    public function rlelang()
    {
        $data['title'] = 'Riwayat Pelelang';
        $data["penawaran"] = $this->modelaku->get_all();
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('backend/user/rlelang', $data);
    }
    public function gambar($id = null)
    {
        $barangedit = $this->modelsiapa;
        $getId["barang"] = $barangedit->getById($id);
        $data['title'] = 'Gambar Barang';
        $data["gambar"] = $this->modelkenapa->getAll();
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/user_sidebar', $data);
        $this->load->view('backend/templates/topbar', $data);
        $kamu = array_merge($getId, $data);
        $this->load->view('backend/user/gambar', $kamu);
        $this->load->view('backend/templates/footer');
    }
    public function hapus_gambar($id_gambar = null)
    {
        $data['gambar'] = $this->modelkenapa->get_by_id($id_gambar)->row();
        $id_barang = $data['gambar']->id_barang;
        $oriImg = $data['gambar']->gambar;
        $ori_file_name      = substr($oriImg, 0, strpos($oriImg, ".")); 
        array_map('unlink', glob(FCPATH . "./assets/img/barang/$ori_file_name.*"));
        $id = $this->uri->segment(4);
        $hapus = $this->modelkenapa->hapus_gambar($id);
        $this->session->set_flashdata('gagal', '<div class="alert alert-success" role="alert">
        Image Has Been Deleted!
          </div>');
        redirect('backend/user/gambar/'. $id_barang);
    }
    public function add_gambar($id = null)
    {
        $data['title'] = "Tambah Gambar";
        $data['barang'] = $this->modelsiapa->getByGambar($id)->row(); //ambil data barang berdasarkan id
        $data['gambar'] = $this->modelkenapa->getById($id); //ambil data gambar berdasarkan id barang
        $ori_name       = $_FILES["gambar"]["name"]; //nama asli gambar yang di upload
        $file_name      = uniqid('', true); //nama random dari system
        $config['upload_path']          = './assets/img/barang';
        $config['overwrite']            = true;
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['file_name']            = str_replace('.', '', $file_name);
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('gambar')) { //upload yg ada di dalam field gambar (ui)
            //jika tidak berhasil upload
            $data['error'] = $this->upload->display_errors(); //masukan error ke parameter
            $error = preg_replace('/[^a-zA-Z0-9-_\.]/', ' ', strip_tags($data['error'])); //jika ada karakter spesial di error yg keluar maka di ubah jadi spasi
        } else {
        $uploaded_data = $this->upload->data();
           //memasukan ke array
           $data = array(
               'id_barang' => $id,
               'nama_gambar' => $ori_name,
               'gambar' => $uploaded_data['file_name'],
               'utama' => 0
        ); }
            //tambahkan barang ke database
            $this->modelkenapa->add_gambar($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">
                Image Has been added!
              </div>');
            redirect('backend/user/gambar/'.$id);
    }
    public function alelang($id = null)
    {
        $data['title'] = "Tambah Lelang";
        $data['activeUser'] = $this->modelsaya->current_user();
        $barangedit = $this->modelsiapa;
        $getId["barang"] = $barangedit->get_pepet($id);
        $data['title'] = 'Tambah Lelang';
        $data["lelang"] = $this->modelapa->getAll();
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $kamu = array_merge($getId, $data);
        $this->load->view('backend/user/alelang', $kamu);
    }
    public function add_lelang()
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        $lelang = [
            'id_barang' => htmlspecialchars($this->input->post('id_barang', true)),
            'tgl_mulai' => htmlspecialchars($this->input->post('tgl_mulai', true)),
            'tgl_akhir' => htmlspecialchars($this->input->post('tgl_akhir', true)),
            'status' => "Open",
            'created_by' => $data['activeUser']->id
        ];
        $this->modelapa->add_lelang($lelang);
        $this->session->set_flashdata('message', 'Auction Data Added!');
        redirect('backend/user/klelang');
    }
    public function cancel($id_lelang = null)
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Petugas') {
            show_404();
        }
        $data['lelang'] = $this->modelapa->get_by_id($id_lelang)->row();
        if (!$data['lelang'] || !$id_lelang) {
            show_404();
        }
        $lelang = [
            'id_lelang' => $id_lelang,
            'status' => 'cancel'
        ];
        $update = $this->modelapa->update($lelang);
        if ($update) {
            $barang = [
                'id_barang' => $data['lelang']->id_barang,
                'status' => 'New'
            ];
            $updt = $this->modelsiapa->update($barang);
            if ($updt) {
                $this->session->set_flashdata('mang_eak', '<div class="alert alert-danger" role="alert">
                Auction Data Has Been Canceled!
          </div>');
            }
        } else {
            $this->session->set_flashdata('mang_eak', '<div class="alert alert-danger" role="alert">
            Auction Data Failed to Cancel!
          </div>');
        }
        redirect('backend/user/klelang');
    }
    public function close($id_lelang = null)
    {
        $data['activeUser'] = $this->modelsaya->current_user();
        if (@$data['activeUser']->role <> 'Petugas') {
            show_404();
        }
        $data['lelang'] = $this->modelapa->get_by_id($id_lelang)->row();
        if (!$data['lelang'] || !$id_lelang) {
            show_404();
        }
        $data['penawaran'] = $this->modelaku->get_by_lelang($id_lelang)->row();
        $lelang = [
            'id_lelang' => $id_lelang,
            'id_masyarakat' => $data['penawaran']->id_masyarakat,
            'harga_akhir' => $data['penawaran']->harga_penawaran,
            'status' => 'closed'
        ];
        $update = $this->modelapa->update($lelang);
        if ($update) {
            $barang = [
                'id_barang' => $data['lelang']->id_barang,
                'status' => 'sold'
            ];
            $updt = $this->modelsiapa->update($barang);
            if ($updt) {
                $this->session->set_flashdata('message', 'Data berhasil diclosed!');
            }
        } else {
            $this->session->set_flashdata('message', 'Data gagal diclosed!');
        }
        redirect('backend/user/klelang');
    }
    public function plelang()
    {
        $data['title'] = 'Data Pemenang Lelang';
        $data["pemenang_lelang"] = $this->modelkita->getall_pemenangLelang();
        $data['user'] = $this->db->get_where('user', ['username' => 
        $this->session->userdata('username')])->row_array();
        $this->load->view('backend/user/plelang', $data);
    }
}