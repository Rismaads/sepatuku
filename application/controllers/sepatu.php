<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sepatu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login')!=TRUE) {
			redirect('admin/login','refresh');
		}
		$this->load->model('m_sepatu','sepatu');
	}

	public function index()
	{
		$data['tampil_sepatu']=$this->sepatu->tampil();
		$data['kategori']=$this->sepatu->data_kategori();
		$data['konten']="v_sepatu";
		$data['judul']="Daftar sepatu";
		$this->load->view('template', $data);
	}
	public function toko()
	{
		$data['tampil_sepatu']=$this->sepatu->tampil();
		$data['kategori']=$this->sepatu->data_kategori();
		$data['konten']="toko";
		$data['judul']="Toko Sepatu";
		$this->load->view('template', $data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('nama_sepatu', 'nama_sepatu', 'trim|required');
		$this->form_validation->set_rules('tahun', 'tahun', 'trim|required');
		$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');

		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		if ($this->form_validation->run()==TRUE) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000';
			$config['max_width']  = '5000';
			$config['max_height']  = '5000';
			if ($_FILES['foto']['name']!="") {
				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('foto')) {
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
				}else {
					if ($this->sepatu->simpan_sepatu($this->upload->data('file_name'))) {
						$this->session->set_flashdata('pesan', 'Sukses menambah ');
					}else{
						$this->session->set_flashdata('pesan', 'Gagal menambah');
					}
					redirect('sepatu','refresh');
				}
			}else{
				if ($this->sepatu->simpan_sepatu('')) {
					$this->session->set_flashdata('pesan', 'Sukses menambah');
				}else{
					$this->session->set_flashdata('pesan', 'Gagal menambah');
				}
				redirect('sepatu','refresh');
			}

		}else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('sepatu','refresh');
		}
	}
	public function edit_sepatu($id)
	{
		$data=$this->sepatu->detail($id);
		echo json_encode($data);
	}
	public function sepatu_update()
	{
		if($this->input->post('edit')){
			if($_FILES['foto']['name']==""){
				if($this->sepatu->edit_sepatu()){
					$this->session->set_flashdata('pesan', 'Sukses update');
					redirect('sepatu');
				} else {
					$this->session->set_flashdata('pesan', 'Gagal update');
					redirect('sepatu');
				}
			} else {
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '20000';
				$config['max_width']  = '5024';
				$config['max_height']  = '5768';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('foto')){
					$this->session->set_flashdata('pesan', 'Gagal Upload');
					redirect('sepatu');
				}
				else{
					if($this->sepatu->edit_sepatu_dengan_foto($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan', 'Sukses update');
						redirect('sepatu');
					} else {
						$this->session->set_flashdata('pesan', 'Gagal update');
						redirect('sepatu');
					}
				}
			}

		}

	}
	public function hapus($id_sepatu='')
	{
		if ($this->sepatu->hapus_sepatu($id_sepatu)) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus sepatu');
			redirect('sepatu','refresh');
		}else{
			$this->session->set_flashdata('pesan', 'Gagal Hapus sepatu');
			redirect('sepatu','refresh');
		}
	}

}

/* End of file sepatu.php */
/* Location: ./application/controllers/sepatu.php */
