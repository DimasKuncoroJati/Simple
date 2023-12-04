<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->helper(['url_helper', 'form']);
		$this->load->library(['form_validation', 'session']);
	}

	/*public function index($page = 'home_view')
	{
		if(! file_exists(APPPATH.'views/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = 'Beranda';
		$data['jembut'] = 'LOL';

		$this->load->view($page, $data);
	}

	public function about($page = 'about')
	{
		if(! file_exists(APPPATH.'views/'.$page.'.php'))
		{
			show_404();
		}

		$data['title'] = 'About';

		$this->load->view($page, $data);
	}*/

	//produk//

	public function lihatdata()
	{
		$data['database'] = $this->produk_model->get_all_data();

		$data['title'] = "Test tampil Database";

		$this->load->view('templates/header', $data);
		$this->load->view('tampildata', $data);
		$this->load->view('templates/footer');
	}

	public function formtambah()
	{
		$data['title'] = "Tambah Data | Test tampil Database";

		$this->load->view('templates/header', $data);
		$this->load->view('formtambah');
		$this->load->view('templates/footer');
	}

	public function tambahproduk()
	{
		$this->form_validation->set_message('is_unique', '{field} sudah terpakai');

		$this->form_validation->set_rules('kdproduk', 'Kode produk', ['required', 'is_unique[produk.kdproduk]']);

		$this->validasi();

		if ($this->form_validation->run() === FALSE) {
			$this->formtambah();
		} else {
			$this->produk_model->tambah_produk();
			$this->session->set_flashdata('input_sukses', 'Data produk berhasil di input');
			redirect(current_url());
		}
	}

	public function hapusdata($id)
	{
		$this->produk_model->hapus_produk($id);
		$this->session->set_flashdata('hapus_sukses', 'Data produk berhasil di hapus');
		redirect('/home/lihatdata');
	}

	public function formedit($id)
	{
		$data['title'] = 'Edit Data | Test tampil Database';

		$data['db'] = $this->produk_model->edit_produk($id);

		$this->load->view('templates/header', $data);
		$this->load->view('formedit', $data);
		$this->load->view('templates/footer');
	}

	public function updateproduk($id)
	{
		$this->validasi();

		if ($this->form_validation->run() === FALSE) {
			$this->formedit($id);
		} else {
			$this->produk_model->update_produk();
			$this->session->set_flashdata('update_sukses', 'Data produk berhasil diperbaharui');
			redirect('/home/lihatdata');
		}
	}

	public function validasi()
	{
		$this->form_validation->set_message('required', '{field} tidak boleh kosong');

		$config = [
			[
				'field' => 'nama_produk',
				'label' => 'nama_produk',
				'rules' => 'required'
			],
			[
				'field' => 'harga',
				'label' => 'harga',
				'rules' => 'required|numeric'
			],
			[
				'field' => 'kategori_id',
				'label' => 'kategori_id',
				'rules' => 'required'
			],
			[
				'field' => 'status_id',
				'label' => 'status_id',
				'rules' => 'required'
			]
		];

		$this->form_validation->set_rules($config);
	}
}
