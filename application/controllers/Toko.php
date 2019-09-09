<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller
{

	public function index($front = 'index')
	{
		if (!file_exists(APPPATH . 'views/front/' . $front . '.php')) {
			show_404();
		} else {

			$data['title'] = 'TOKO REGGIE';
			$this->load->view('front/template/header', $data);
			$this->load->view('front/template/menu');
			$this->load->view('front/' . $front);
			$this->load->view('front/template/footer');
		}
	}


	public function tentang($front = 'tentang')
	{
		if (!file_exists(APPPATH . 'views/front/' . $front . '.php')) {
			show_404();
		} else {

			$data['title'] = 'PRODUK TOKO REGGIE';
			$this->load->view('front/template/header', $data);
			$this->load->view('front/template/menu');
			$this->load->view('front/' . $front);
			$this->load->view('front/template/footer');
		}
	}

	public function kontak($front = 'kontak')
	{
		if (!file_exists(APPPATH . 'views/front/' . $front . '.php')) {
			show_404();
		} else {

			$data['title'] = 'KONTAK TOKO REGGIE';
			$this->load->view('front/template/header', $data);
			$this->load->view('front/template/menu');
			$this->load->view('front/' . $front);
			$this->load->view('front/template/footer');
		}
	}
	public function create()
	{
		$data = [

			'email' => $this->input->post('email')
		];
		$this->berlangganan_model->save($data);

		// $email = $this->input->post('email');

		// $this->berlangganan_model->save($email);
		redirect(base_url('toko/berlangganan'));
	}

	public function pesan()
	{
		$data = [
			'id_pesan' => rand(),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'subjek' => $this->input->post('subjek'),
			'pesan' => $this->input->post('pesan')
		];
		$this->pesan_model->save($data);

		// $email = $this->input->post('email');

		// $this->berlangganan_model->save($email);
		redirect(base_url('toko/terkirim'));
	}

	public function berlangganan($front = 'berlangganan')
	{
		if (!file_exists(APPPATH . 'views/front/' . $front . '.php')) {
			show_404();
		} else {

			$data['title'] = 'BERHASIL BERLANGGANAN';
			$this->load->view('front/template/header', $data);
			$this->load->view('front/template/menu');
			$this->load->view('front/' . $front);
			$this->load->view('front/template/footer');
		}
	}

	public function terkirim($front = 'terkirim')
	{
		if (!file_exists(APPPATH . 'views/front/' . $front . '.php')) {
			show_404();
		} else {

			$data['title'] = 'BERHASIL MENGIRIM PESAN';
			$this->load->view('front/template/header', $data);
			$this->load->view('front/template/menu');
			$this->load->view('front/' . $front);
			$this->load->view('front/template/footer');
		}
	}
}
