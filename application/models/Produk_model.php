<?php

class Produk_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_data()
	{
		$query = $this->db->get('produk');
		return $query->result();
	}

	public function tambah_produk()
	{
		$data = [
			'kdproduk' => $this->input->post('kdproduk'),
			'nama_produk' => $this->input->post('nama_produk'),
			'harga' => $this->input->post('harga'),
			'kategori_id' => $this->input->post('kategori_id'),
			'status_id' => $this->input->post('status_id'),
		];

		$this->db->insert('produk', $data);
	}

	public function edit_produk($id)
	{
		$query = $this->db->get_where('produk', ['kdproduk' => $id]);
		return $query->row();
	}

	public function update_produk()
	{
		$kondisi = ['kdproduk' => $this->input->post('kdproduk')];

		$data = [
			'nama_produk' => $this->input->post('nama_produk'),
			'harga' => $this->input->post('harga'),
			'kategori_id' => $this->input->post('kategori_id'),
			'status_id' => $this->input->post('status_id'),
		];

		$this->db->update('produk', $data, $kondisi);
	}

	public function hapus_produk($id)
	{
		$this->db->delete('produk', ['kdproduk' => $id]);
	}
}
