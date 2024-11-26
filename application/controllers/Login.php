<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	public function index()
	{
		$this->load->view("login/v_login", "");
	}

    public function actValidated(){
        $input = $this->input->post();

        $email = $input['email'];
        $password = $input['password'];
        $data = $this->db->select("*")
        ->from("USERS")
        ->where("EMAIL", $email)
        ->where("password", md5($password))
        ->get()->result();

        if(!empty($data)){
            echo 'ada data';
            $this->session->set_flashdata('user_id', $data[0]->USERS_ID);
            $this->session->set_flashdata('name', $data[0]->NAME);
            $this->session->set_flashdata('email', $data[0]->EMAIL);
            $this->session->set_flashdata('status', $data[0]->STATUS);
            redirect('/Home');
        }else {
            $this->session->set_flashdata('failed', "Login gagal, user tidak ada!");
            redirect('/Login');
        }
    }

    public function actLogout() {
        $this->session->sess_destroy();
        redirect('/Login');
    }
}
