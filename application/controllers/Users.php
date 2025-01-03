<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	public function index()
	{
        
		$this->template->display('users/v_list.php', 'header.php', "");
	}

    public function ajaxDataUsers()
    {
        $post = $this->input->post();
        $rows = $this->getDataUsers($post);
        $data = [];
        $recordsFiltered = 0;

        foreach ($rows as $key => $field) {
            $recordsFiltered++;
            $row = [];

            $edit = '<a href="'.base_url().'Users/viewForm?id='.$field['USERS_ID'].'" class="btn btn-primary btn-floating" title="Button Edit"><i class="fa fa-pencil"></i></a>';
            $delete = '<a href="#" onclick=deleteData(\'actDeleteData?id='.$field['USERS_ID'].'\') class="btn btn-danger btn-floating" title="Button Delete"><i class="fa fa-trash"></i></button>';

            $row[] = $field['NAME'];
            $row[] = $field['EMAIL'];
            $row[] = $field['STATUS'];
            $row[] = '<center>'. $edit . $delete .'</center>';
            $data[] = $row;
        }
        $recordsTotal = $this->getDataUsers($post, 'count');

        $output = [
            "draw" => $post['draw'],
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsTotal,
            "data" => $data,
        ];
        echo json_encode($output);
        exit;
    }

    public function getDataUsers($post, $type = "get")
    {
        $column_order = ['NAME', 'EMAIL', 'PASSWORD', 'STATUS', 'PROFILE_PICTURE'];
        $order = 'ASC';
        $this->db->select('A.*');
        $this->db->from('USERS A');

        if (!empty($post['search']['value'])) {
            $this->db->group_start();
            foreach ($column_order as $data) {
                $this->db->or_like('UPPER(' . $data . ')', strtoupper($post['search']['value']));
            }
            $this->db->group_end();
        }

        if (isset($post['order'])) {
            if ($post['order']['0']['dir'] == "desc") {
                $order = 'DESC';
            }
            $this->db->order_by($column_order[$post['order']['0']['column']], $order);
        } else {
            $this->db->order_by("A.NAME ASC");
        }

        if ($type == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if ($post['length'] != -1) {
                $this->db->limit($post['length']);
                $this->db->offset($post['start']);
            }
            $query = $this->db->get();
            $result = $query->result_array();
        }

        return $result;

    }

    public function viewForm() {
        $id = $this->input->get('id', true);
        $data['data'] = $this->db->query("SELECT * FROM USERS WHERE USERS_ID='$id'")->row();
        if(!empty($id)){
            $data['title'] = 'Edit Data '; 
        }else {
            $data['title'] = 'Add Data '; 
        }
        $this->template->display('users/v_form.php', 'header.php', $data);
    }

    public function actAddData(){
        // var_dump($this->input->post());die;
        $input = $this->input->post();
        $nama = $input['nama'];
        $email = $input['email'];
        $password = md5($input['password']);
        $status = $input['status'];
        
        $this->db->query("INSERT INTO USERS (NAME, EMAIL, PASSWORD, STATUS) VALUES('$nama', '$email', '$password', '$status')");

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data berhasil ditambahkan!");
            redirect('/Users');
       } else {
            $this->session->set_flashdata('failed', "Data gagal ditambahkan, silahkan hubungi administrator!");
            redirect('/Users');
       }

    }

    public function actEditData(){
        // var_dump($this->input->post());
        $input = $this->input->post();
        $nama = $input['nama'];
        $email = $input['email'];
        $status = $input['status'];
        $id = $input['id'];
        $data  =  $this->db->query("SELECT PASSWORD FROM USERS WHERE PASSWORD='".$input['password']."'")->result();
        if(!empty($data)){
            $password = $input['password'];
        }else {
            $password = md5($input['password']);
        }
        
        $this->db->query("UPDATE USERS SET NAME='$nama', EMAIL='$email', PASSWORD='$password', STATUS='$status' WHERE USERS_ID='$id'");

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data berhasil ditambahkan!");
            redirect('/Users');
       } else {
            $this->session->set_flashdata('failed', "Data gagal ditambahkan, silahkan hubungi administrator!");
            redirect('/Users');
       }

    }

    public function actDeleteData() {
        $id = $this->input->get('id', true);
        $this->db->query("DELETE FROM USERS WHERE USERS_ID = '$id'");

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data berhasil dihapus!");
            redirect('/Users');
       } else {
            $this->session->set_flashdata('failed', "Data gagal diphaus, silahkan hubungi administrator!");
            redirect('/Users');
       }
    }

    public function myProfile() {
        $id = $this->session->userdata('user_id');
        $data['data'] = $this->db->query("SELECT * FROM USERS WHERE USERS_ID='$id'")->row();
        $data['title'] = 'Edit Data '; 
        $this->template->display('users/v_profile.php', 'header.php', $data);
    }

    public function actEditProfile() {
        $input = $this->input->post();
        $id = $this->session->userdata('user_id');
        $fullpath = '';
        if(!empty($_FILES['profile_picture']['name'])){
            $file = $_FILES['profile_picture'];
            $source = $file['tmp_name'];
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            $fullpath = 'files_upload/profile_pic_'.$id.'.'.$ext;
            move_uploaded_file($source, $fullpath);
        }

        $nama = $input['nama'];
        $data  =  $this->db->query("SELECT PASSWORD FROM USERS WHERE PASSWORD='".$input['password']."'")->result();
        if(!empty($data)){
            $password = $input['password'];
        }else {
            $password = md5($input['password']);
        }
        
        $this->db->query("UPDATE USERS SET NAME='$nama',PASSWORD='$password', PROFILE_PICTURE='$fullpath' WHERE USERS_ID='$id'");

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data berhasil ditambahkan!");
            redirect('/Users/myProfile');
       } else {
            $this->session->set_flashdata('failed', "Data gagal ditambahkan, silahkan hubungi administrator!");
            redirect('/Users/myProfile');
       }
    }
    
}
