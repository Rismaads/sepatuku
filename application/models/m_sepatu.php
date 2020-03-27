<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sepatu extends CI_Model {
    public function tampil()
    {
        $tm_sepatu=$this->db
                      ->join('kategori','kategori.id_kategori=sepatu.id_kategori')
                      ->get('sepatu')
                      ->result();
        return $tm_sepatu;
    }
    public function data_kategori()
    {
        return $this->db->get('kategori')
                        ->result();
    }
    public function simpan_sepatu($file_cover)
    {
        if ($file_cover=="") {
             $object = array(
                'id_sepatu' => $this->input->post('id_sepatu'),
                'nama_sepatu' => $this->input->post('nama_sepatu'),
                'tahun' => $this->input->post('tahun'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),

                'stok' => $this->input->post('stok')
             );
        }else{
            $object = array(
                'id_sepatu' => $this->input->post('id_sepatu'),
                'nama_sepatu' => $this->input->post('nama_sepatu'),
                'tahun' => $this->input->post('tahun'),
                'id_kategori' => $this->input->post('id_kategori'),
                'harga' => $this->input->post('harga'),

                'stok' => $this->input->post('stok'),
                'foto' => $file_cover
             );
        }
        return $this->db->insert('sepatu', $object);
    }
    public function detail($a)
    {
        $tm_sepatu=$this->db
                      ->join('kategori', 'kategori.id_kategori=sepatu.id_kategori')
                      ->where('id_sepatu', $a)
                      ->get('sepatu')
                      ->row();
        return $tm_sepatu;
    }
    public function edit_sepatu()
    {
        $data = array(
                'id_sepatu' => $this->input->post('id_sepatu'),
                'nama_sepatu' => $this->input->post('nama_sepatu'),
                'tahun' => $this->input->post('tahun'),
                'id_kategori' => $this->input->post('id_kategori'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga')


            );

        return $this->db->where('id_sepatu', $this->input->post('id_sepatu_lama'))
                        ->update('sepatu', $data);
    }
    public function edit_sepatu_dengan_foto($file_cover)
    {
        $data = array(
                'id_sepatu' => $this->input->post('id_sepatu'),
                'nama_sepatu' => $this->input->post('nama_sepatu'),
                'tahun' => $this->input->post('tahun'),
                'id_kategori' => $this->input->post('id_kategori'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),

                'foto' => $file_cover

            );

        return $this->db->where('id_sepatu', $this->input->post('id_sepatu_lama'))
                        ->update('sepatu', $data);
    }
    public function hapus_sepatu($id_sepatu='')
    {
        return $this->db->where('id_sepatu', $id_sepatu)
                    ->delete('sepatu');
    }


}

/* End of file M_sepatu.php */
/* Location: ./application/models/M_sepatu.php */
