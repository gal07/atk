<?php

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('forbidden');
        }
    }

    public function index($produk = 'index')
    {
        if (!file_exists(APPPATH . 'views/admin/produk/' . $produk . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

            $data['title'] = 'Produk Toko Reggie';
            $data['data'] = $this->produk_model->get();

            $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
            $this->form_validation->set_rules('alt', 'Tag ALT', 'required');
            $this->form_validation->set_rules('unit', 'Unit Produk', 'required');
            $this->form_validation->set_rules('harga', 'Harga Produk', 'required');
            $this->form_validation->set_rules('stok', 'Stok Produk', 'required');


            if ($this->form_validation->run() ==  false) {
                $this->load->view('back/templates/header', $data);
                $this->load->view('admin/produk/' . $produk);
                $this->load->view('back/templates/footer');
            } else {
                //upload image
                $config['upload_path'] = './assets/produk';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
                $config['max_size'] = '1024';
                date_default_timezone_set('Asia/Jakarta');
                $config['file_name']  = date('Ymdhis') . '.jpg';
                $config['detect_mime'] = TRUE;
                $this->load->library('upload', $config);

                if ($_FILES['foto']['size'] != 0) {

                    if (!file_exists($config['upload_path'])) {
                        mkdir($config['upload_path']);
                    }

                    if ($this->upload->do_upload('foto')) {
                        echo "<script> alert('oke'); </script>";
                    }
                }
                // data Store
                $data_foto = ($_FILES['foto']['size'] = 1) ? $config['file_name'] : '';

                $data = [
                    'id_produk' => rand(),
                    'foto' => $data_foto,
                    'nama' => $this->input->post('nama'),
                    'alt' => $this->input->post('alt'),
                    'unit' => $this->input->post('unit'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'aktif' => 1

                ];
                $save = $this->produk_model->save($data);
                if ($save) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil Menambahkan Produk!</h4>
                    
                  </div>');
                    redirect('admin/produk');
                } else {
                    // $this->session->set_flashdata('failed' , ' Created data Failed');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal Menambahkan Produk!</h4>
                    
                  </div>');
                    redirect(base_url('admin/produk'));
                }
            }
        }
    }

    public function update($produk = 'update')
    {

        if (!file_exists(APPPATH . 'views/admin/produk/' . $produk . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
            $data['data'] = $this->produk_model->get_spesific($this->input->get('id'));


            $this->form_validation->set_rules('nama', 'Nama Produk', 'required');
            $this->form_validation->set_rules('alt', 'Tag ALT', 'required');
            $this->form_validation->set_rules('unit', 'Unit Produk', 'required');
            $this->form_validation->set_rules('harga', 'Harga Produk', 'required');
            $this->form_validation->set_rules('stok', 'Stok Produk', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Ubah Produk Toko Reggie';
                $this->load->view('back/templates/header', $data);
                $this->load->view('admin/produk/' . $produk);
                $this->load->view('back/templates/footer');
            } else {

                /** If You Changes Photos */
                $name_files = date('Ymdhis') . '.jpg';

                if ($_FILES['foto']['size'] != 0) {

                    //upload image
                    $config['upload_path'] = './assets/produk';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
                    $config['max_size'] = '1024';
                    date_default_timezone_set('Asia/Jakarta');
                    $config['file_name']  = $name_files;
                    $config['detect_mime'] = TRUE;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload("foto")) {

                        /* If upload photo succcess */ } else {
                        /* If upload photo failed */ }
                } else {
                    /* if no changes photos */ }


                $data = [];


                if ($_FILES['foto']['size'] != 0) {

                    /** With Photos */
                    $data = array(
                        'nama' => $this->input->post('nama'),
                        'alt' => $this->input->post('alt'),
                        'unit' => $this->input->post('unit'),
                        'harga' => $this->input->post('harga'),
                        'stok' => $this->input->post('stok'),
                        'foto' => $name_files,
                        // 'updated_date' => time()
                    );
                    $MyPaths = './assets/produk/' . $this->input->post('old_foto');
                    unlink($MyPaths);
                } else {
                    /** Without Photos */
                    $data = array(
                        'nama' => $this->input->post('nama'),
                        'alt' => $this->input->post('alt'),
                        'unit' => $this->input->post('unit'),
                        'harga' => $this->input->post('harga'),
                        'stok' => $this->input->post('stok'),
                        // 'updated_date' => time()
                    );
                }



                $id = $this->input->post('id_produk');
                $update = $this->produk_model->update($data, $id);

                $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil Mengubah Produk!</h4>
                
              </div>');
                redirect(base_url('admin/produk'));
            }
        }
    }

    public function delete()
    {

        $id = $this->input->get('id');
        $delete = $this->produk_model->delete($id);
        $MyPaths = './assets/produk/' . $this->input->get('pict');
        unlink($MyPaths);
        $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil Menghapus Produk!</h4>
        
      </div>');
        redirect(base_url('admin/produk'));
    }


    public function enable()
    {
        $data = array(

            'aktif' => $this->input->post('status')
        );
        $id = $this->input->post('id_produk');
        $update = $this->produk_model->update($data, $id);


        $this->session->set_flashdata('message', '   <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil Tidak Mengaktifkan Produk!</h4>
        
      </div>');
        redirect(base_url('admin/produk'));
    }

    public function disable()
    {
        $data = array(

            'aktif' => 1,
        );
        $id = $this->input->post('id_produk');
        $update = $this->produk_model->update($data, $id);


        $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil Mengaktifkan Produk!</h4>
        
      </div>');
        redirect(base_url('admin/produk'));
    }
}
