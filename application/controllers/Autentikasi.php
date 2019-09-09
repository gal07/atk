<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Autentikasi extends CI_Controller
{


    public function alurlogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // user available
        if ($user) {

            // user active
            if ($user['aktif'] == 1) {

                // check password 
                if ($user['password'] == $password) {

                    $data = [
                        'username' => $user['username'],
                        'role' => $user['role']
                    ];

                    $this->session->set_userdata($data);

                    if ($user['role'] == 1) {
                        $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible" role="alert">
						
						<strong>Well done!</strong> Welcome back.
					</div>');
                        redirect('admin/dasbor');
                    }
                } else {
                    $this->session->set_flashdata('message', '  <div class="alert alert-danger alert-dismissible" role="alert"> 
						
						<strong>Oh No!</strong> Your password is not correct. 
					</div>');
                    redirect('toko');
                }
            } else {
                $this->session->set_flashdata('message', '  <div class="alert alert-danger alert-dismissible" role="alert"> 
				
				<strong>Oh No!</strong> Your account is not active. 
			</div>');
                redirect('toko');
            }
        } else {
            $this->session->set_flashdata('message', '  <div class="alert alert-danger alert-dismissible" role="alert"> 
			
			<strong>Oh No!</strong> Your account is not registered. 
		</div>');
            redirect('toko');
        }
    }

    public function alurlogout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible" role="alert"> 
			
        <strong>Success!</strong> You has been logged out. 
    </div>');
        redirect('toko');
    }
}
