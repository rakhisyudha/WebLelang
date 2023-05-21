<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelkita extends CI_Model
{
    private $view = 'pemenang_lelang';
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->view, ["nik" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function getall_pemenangLelang()
    {
        $query = $this->db->get_where($this->view);
        return $query->result();
    }
    public function getall_pemenangLelangdash()
    {
        $query = $this->db->get_where($this->view, array('status' => 'Unconfirmed'));
        return $query->result();
    }
    public function get_pemenang($id_masyarakat)
    {
        $this->db->order_by('tgl_akhir', 'desc');
        $query = $this->db->get_where($this->view, array('id_masyarakat' => $id_masyarakat));
        return $query->result();
    }
}