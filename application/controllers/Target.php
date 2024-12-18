<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Target extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	public function index()
	{
        $tahun = $this->input->get('tahun', true) ?: date('Y')-1;
        $data['tahun'] = $tahun;
		$this->template->display('target/v_list.php', 'header.php', $data);
	}

    public function ajaxDataTarget()
    {
        $post = $this->input->post();
        $rows = $this->getDataTarget($post);
        $data = [];
        $recordsFiltered = 0;

        foreach ($rows as $key => $field) {
            $recordsFiltered++;
            $row = [];

            $edit = '<a href="'.base_url().'Target/viewForm?id='.$field['ID'].'" class="btn btn-primary btn-floating" title="Button Edit"><i class="fa fa-pencil"></i></a>';
            
            $row[] = $field['TAHUN'];
            $row[] = $field['PERIODE'];
            $row[] = $field['TIPE'];
            if($field['TIPE'] != 'MTBF' && $field['TIPE'] != 'FREKUENSI PERBAIKAN'){
                $row[] = round($field['TARGET'] * 100, 2) . '%';
            }else {
                $row[] = $field['TARGET'];
            }
            $row[] = '<center>'. $edit .'</center>';
            $data[] = $row;
        }
        $recordsTotal = $this->getDataTarget($post, 'count');

        $output = [
            "draw" => $post['draw'],
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsTotal,
            "data" => $data,
        ];
        echo json_encode($output);
        exit;
    }

    public function getDataTarget($post, $type = "get")
    {
        $column_order = ['TAHUN', 'PERIODE', 'TIPE', 'TARGET'];
        $order = 'ASC';
        $this->db->select('A.*');
        $this->db->from('M_TARGETS A');

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
            $this->db->order_by("A.TIPE ASC");
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
        $data['data'] = $this->db->query("SELECT * FROM M_TARGETS WHERE ID='$id'")->row();
        if(!empty($id)){
            $data['title'] = 'Edit Data Target'; 
        }else {
            $data['title'] = 'Add Data Target'; 
        }
        $this->template->display('target/v_form.php', 'header.php', $data);
    }

    public function actAddData(){
        // var_dump($this->input->post());die;
        $input = $this->input->post();
        $tahun = $input['tahun'];
        $periode = $input['periode'];
        $tipe = $input['tipe'];
        if($tipe != 'MTBF' && $tipe != 'FREKUENSI PERBAIKAN'){
            $target = $input['target'] / 100;
        }else {
            $target = $input['target'];
        }
        $data = $this->db->query("SELECT * FROM M_TARGETS WHERE TAHUN='$tahun' AND PERIODE='$periode' AND TIPE='$tipe'")->result();
        if(!empty($data)){
            $this->session->set_flashdata('failed', "Data gagal ditambahkan, anda sudah input data tersebut!");
            redirect('/Target');
        }

        $this->db->query("INSERT INTO M_TARGETS (TAHUN, PERIODE, TIPE, TARGET) VALUES('$tahun', '$periode', '$tipe', '$target')");

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data berhasil ditambahkan!");
            redirect('/Target');
       } else {
            $this->session->set_flashdata('failed', "Data gagal ditambahkan, silahkan hubungi administrator!");
            redirect('/Target');

       }

    }

    public function actEditData(){
        // var_dump($this->input->post());
        $input = $this->input->post();
        $id = $input['id'];
        $data = $this->db->query("SELECT * FROM M_TARGETS WHERE ID='$id'")->result();
        
        if(empty($data)){
            $this->session->set_flashdata('failed', "Data gagal ditambahkan, data tidak ada!");
            redirect('/Target');
        }
        if($data[0]->TIPE != 'MTBF' && $data[0]->TIPE != 'FREKUENSI PERBAIKAN'){
            $target = $input['target'] / 100;
        }else {
            $target = $input['target'];
        }
        $this->db->query("UPDATE M_TARGETS SET TARGET='$target' WHERE ID='$id'");

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data berhasil ditambahkan!");
            redirect('/Target');
       } else {
            $this->session->set_flashdata('failed', "Data gagal ditambahkan, silahkan hubungi administrator!");
            redirect('/Target');
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
    
}
