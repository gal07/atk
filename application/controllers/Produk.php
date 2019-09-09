<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{


    public function index()
    {
        redirect('produk/grid');
    }

    public function list($front = 'produklist')
    {
        if (!file_exists(APPPATH . 'views/front/' . $front . '.php')) {
            show_404();
        } else {

            $data['title'] = 'TOKO REGGIE';
            $data['data'] = $this->produk_model->getActive();

            $this->load->view('front/template/header', $data);
            $this->load->view('front/template/menu');
            $this->load->view('front/' . $front);
            $this->load->view('front/template/footer');
        }
    }

    public function grid($front = 'produkgrid')
    {
        if (!file_exists(APPPATH . 'views/front/' . $front . '.php')) {
            show_404();
        } else {

            $data['title'] = 'TOKO REGGIE';
            $data['data'] = $this->produk_model->getActive();

            $this->load->view('front/template/header', $data);
            $this->load->view('front/template/menu');
            $this->load->view('front/' . $front);
            $this->load->view('front/template/footer');
        }
    }
}
