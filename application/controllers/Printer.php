<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printer extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	public function index()
	{
        // var_dump($this->session->userdata());die;
        $tahun = $this->input->get('tahun', true) ?: date('Y')-1;
        $data['tahun'] = $tahun;

        $data['dataSummary'] = $this->db->query("
        SELECT SUM(PR_FPG) PR_FPG, SUM(PR_FPB) PR_FPB, SUM(PR_TK) PR_TK, AVG(TARGET_FPG) TARGET_FPG, AVG(TARGET_FPB) TARGET_FPB, AVG(TARGET_TP)TARGET_TP FROM ( 
        SELECT
        CASE WHEN A.TIPE='FREKUENSI PENGGUNA' THEN AVG(PENCAPAIAN) END PR_FPG,
        CASE WHEN A.TIPE='FREKUENSI PERBAIKAN'  THEN AVG(PENCAPAIAN) END PR_FPB,
        CASE WHEN A.TIPE='TINGKAT KEPUASAN'  THEN AVG(PENCAPAIAN) END PR_TK,
        CASE WHEN B.TIPE = 'FREKUENSI PENGGUNA' THEN B.TARGET END AS TARGET_FPG,
        CASE WHEN B.TIPE = 'FREKUENSI PERBAIKAN' THEN B.TARGET END AS TARGET_FPB,
        CASE WHEN B.TIPE = 'TINGKAT KEPUASAN' THEN B.TARGET END AS TARGET_TP
        FROM PRINTER_TABLE A JOIN M_TARGETS B ON A.TAHUN = B.TAHUN  AND A.TIPE = B.TIPE WHERE A.TAHUN like '%$tahun%' GROUP BY A.TIPE) PRINTER")->result();

        $dataGrafik = $this->db->query("SELECT BULAN, pt.TIPE, mt.TARGET,  AVG(PENCAPAIAN) PENCAPAIAN FROM PRINTER_TABLE pt JOIN M_TARGETS mt ON pt.TIPE = mt.TIPE  WHERE pt.TAHUN LIKE '%%' GROUP BY BULAN, TIPE ORDER BY BULAN")->result();
        $data['achievementFPG'] = $data['targetFPG'] = $data['achievementFPB'] = $data['targetFPB'] = $data['achievementTK'] = $data['targetTK'] = $data['bulan'] = array();

        foreach($dataGrafik as $v){
            if($v->TIPE == 'FREKUENSI PENGGUNA'){
                $data['achievementFPG'][] = round($v->PENCAPAIAN*100,2);
                $data['targetFPG'][] = round($v->TARGET*100,2);
                $data['bulan'][] = $v->BULAN;
            }else if($v->TIPE == 'FREKUENSI PERBAIKAN'){
                $data['achievementFPB'][] = round($v->PENCAPAIAN,2);
                $data['targetFPB'][] = round($v->TARGET,2);
            }else if($v->TIPE == 'TINGKAT KEPUASAN') {
                $data['achievementTK'][] = round($v->PENCAPAIAN*100,2);
                $data['targetTK'][] = round($v->TARGET*100,2);
            }
        }
    

		$this->template->display('printer/v_home.php', 'header.php', $data);
	}

    public function viewList() {
        $tahun = $this->input->get('tahun', true) ?: date('Y')-1;
        $data['tipe'] = $this->input->get('tipe', true);
        $data['tahun'] = $tahun;
        $this->template->display('printer/v_list.php', 'header.php', $data);
    }

    public function ajaxDataPrinter()
    {
        $post = $this->input->post();
        $rows = $this->getDataPrinter($post);
        $data = [];
        $recordsFiltered = 0;

        foreach ($rows as $key => $field) {
            $recordsFiltered++;
            $row = [];

            $edit = '<a href="'.base_url().'Printer/viewForm?tipe='.$field['TIPE'].'&id='.$field['ID'].'" class="btn btn-primary btn-floating" title="Button Edit"><i class="fa fa-pencil"></i></a>';
            $delete = '<a href="#" onclick=deleteData(\''.str_replace(" ", "_", 'actDeleteData?id='.$field['ID'].'&tipe='.$field['TIPE']).'\') class="btn btn-danger btn-floating" title="Button Delete"><i class="fa fa-trash"></i></button>';

            $row[] = $field['NAMA_PERANGKAT'];
            $row[] = $field['TAHUN'];
            $row[] = $field['BULAN'];
            $row[] = $field['TIPE'];
            if($post['tipe'] != 'FREKUENSI PERBAIKAN'){
                $row[] = round($field['PENCAPAIAN']*100,2) . '%';
            }else {
                $row[] = round($field['PENCAPAIAN'],2);
            }
            $row[] = '<center>'. $edit . $delete .'</center>';
            $data[] = $row;
        }
        $recordsTotal = $this->getDataPrinter($post, 'count');

        $output = [
            "draw" => $post['draw'],
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsTotal,
            "data" => $data,
        ];
        echo json_encode($output);
        exit;
    }

    public function getDataPrinter($post, $type = "get")
    {
        $column_order = ['NAMA_USER', 'NAMA_PERANGKAT', 'TAHUN', 'PERIODE', 'TIPE', 'PENCAPAIAN'];
        $order = 'ASC';
        $this->db->select('A.*');
        $this->db->from('PRINTER_TABLE A');
        $this->db->where('TIPE', $post['tipe']);
        $this->db->where('TAHUN', $post['tahun']);
        if(!empty($post['periode'])){
            $this->db->where('BULAN', $post['periode']);
        }

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
            $this->db->order_by("A.BULAN ASC");
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
        $data['tipe'] = $this->input->get('tipe', true);
        $data['data'] = $this->db->query("SELECT * FROM PRINTER_TABLE WHERE ID='$id'")->row();
        if(!empty($id)){
            $data['title'] = 'Edit Data ' . $data['tipe']; 
        }else {
            $data['title'] = 'Add Data ' . $data['tipe']; 
        }
        $this->template->display('printer/v_form.php', 'header.php', $data);
    }

    public function actAddData(){
        // var_dump($this->input->post());die;
        $input = $this->input->post();
        $tipe = $input['tipe'];
        $namaPerangkat = $input['nama_perangkat'];
        $tahun = $input['tahun'];
        $periode = $input['periode'];
        if($tipe == 'FREKUENSI PERBAIKAN'){
            $pencapaian = $input['pencapaian'];
        }else {
            $pencapaian = $input['pencapaian'] / 100;
        }

        $this->db->query("INSERT INTO PRINTER_TABLE(TAHUN, BULAN, NAMA_PERANGKAT, PENCAPAIAN, TIPE) VALUES ('$tahun','$periode','$namaPerangkat','$pencapaian','$tipe')");

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data berhasil ditambahkan!");
            redirect('/Printer/viewList?tipe='.$tipe);
       } else {
            $this->session->set_flashdata('failed', "Data gagal ditambahkan, silahkan hubungi administrator!");
            redirect('/Printer/viewList?tipe='.$tipe);
       }

    }

    public function actEditData(){
        // var_dump($this->input->post());die;
        $input = $this->input->post();
        $id = $input['id'];
        $tipe = $input['tipe'];
        $namaPerangkat = $input['nama_perangkat'];
        $tahun = $input['tahun'];
        $periode = $input['periode'];

        if($tipe == 'FREKUENSI PERBAIKAN'){
            $pencapaian = $input['pencapaian'];
        }else {
            $pencapaian = $input['pencapaian'] / 100;
        }


        $this->db->query("UPDATE PRINTER_TABLE SET TAHUN='$tahun', BULAN='$periode', NAMA_PERANGKAT='$namaPerangkat', PENCAPAIAN='$pencapaian' WHERE ID = '$id'");

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data berhasil diubah!");
            redirect('/Printer/viewList?tipe='.$tipe);
       } else {
            $this->session->set_flashdata('failed', "Data gagal diubah, silahkan hubungi administrator!");
            redirect('/Printer/viewList?tipe='.$tipe);
       }

    }

    public function actDeleteData() {
        $id = $this->input->get('id', true);
        $tipe = $this->input->get('tipe', true);
        $this->db->query("DELETE FROM PRINTER_TABLE WHERE ID = '$id'");

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', "Data berhasil dihapus!");
            redirect('/Printer/viewList?tipe='.$tipe);
       } else {
            $this->session->set_flashdata('failed', "Data gagal diphaus, silahkan hubungi administrator!");
            redirect('/Printer/viewList?tipe='.$tipe);
       }
    }
    
}
