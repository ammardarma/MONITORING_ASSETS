<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PC extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	public function index()
	{
        // var_dump($this->session->userdata());die;
        $tahun = $this->input->get('tahun', true) ?: date('Y')-1;
        $data['tahun'] = $tahun;

        $data['class'] = $this;

        $data['dataUser'] = $this->db->query("
        SELECT SUM(USER_PC) USER_PC, SUM(USER_NB)USER_NB FROM (
        SELECT 
        CASE WHEN TIPE_PERANGKAT = 'PC' THEN COUNT(NAMA_USER) END USER_PC,
        CASE WHEN TIPE_PERANGKAT = 'NB' THEN COUNT(NAMA_USER) END USER_NB
        FROM PC_TABLE B WHERE TAHUN like '%$tahun%' GROUP BY TIPE_PERANGKAT) PC ")->result();

        $data['dataSelisih'] = $this->db->query("
        SELECT 
        SUM(CASE WHEN TIPE = 'AR' AND PERIODE = 1 THEN PENCAPAIAN - TARGET END)*100 AS SELISIH_AR_1,
        SUM(CASE WHEN TIPE = 'AR' AND PERIODE = 2 THEN PENCAPAIAN - TARGET END)*100 AS SELISIH_AR_2,
        SUM(CASE WHEN TIPE = 'KM' AND PERIODE = 1 THEN PENCAPAIAN - TARGET END)*100 AS SELISIH_KM_1,
        SUM(CASE WHEN TIPE = 'KM' AND PERIODE = 2 THEN PENCAPAIAN - TARGET END)*100 AS SELISIH_KM_2,
        SUM(CASE WHEN TIPE = 'MTBF' AND PERIODE = 1 THEN PENCAPAIAN - TARGET END) AS SELISIH_MTBF_1,
        SUM(CASE WHEN TIPE = 'MTBF' AND PERIODE = 2 THEN PENCAPAIAN - TARGET END) AS SELISIH_MTBF_2
        FROM (SELECT A.PERIODE, A.TIPE, CASE WHEN A.TIPE ='MTBF' AND A.PERIODE=1 THEN AVG(PENCAPAIAN) WHEN A.TIPE = 'MTBF' AND A.PERIODE=2 THEN AVG(PENCAPAIAN) ELSE AVG(PENCAPAIAN) END AS PENCAPAIAN, B.TARGET FROM PC_TABLE A JOIN M_TARGETS B ON A.TAHUN = B.TAHUN AND A.PERIODE = B.PERIODE AND A.TIPE = B.TIPE  WHERE A.TAHUN = '$tahun' AND TIPE_PERANGKAT='PC' GROUP BY A.TIPE, A.PERIODE ORDER BY TIPE) A")->result();

        $dataGrafik = $this->db->query("SELECT *
        FROM (SELECT A.PERIODE, A.TIPE, CASE WHEN A.TIPE ='MTBF' AND A.PERIODE=1 THEN AVG(PENCAPAIAN) WHEN A.TIPE = 'MTBF' AND A.PERIODE=2 THEN AVG(PENCAPAIAN) ELSE AVG(PENCAPAIAN) END AS PENCAPAIAN, B.TARGET FROM PC_TABLE A JOIN M_TARGETS B ON A.TAHUN = B.TAHUN AND A.PERIODE = B.PERIODE AND A.TIPE = B.TIPE  WHERE A.TAHUN = '$tahun' AND TIPE_PERANGKAT='PC' GROUP BY A.TIPE, A.PERIODE ORDER BY TIPE) A")->result();
        $data['achievementAR'] = $data['targetAR'] = $data['achievementKM'] = $data['targetKM'] = $data['achievementMTBF'] = $data['targetMTBF'] = array();

        foreach($dataGrafik as $v){
            if($v->TIPE == 'AR'){
                $data['achievementAR'][] = round($v->PENCAPAIAN*100,2);
                $data['targetAR'][] = round($v->TARGET*100,2);
            }else if($v->TIPE == 'KM'){
                $data['achievementKM'][] = round($v->PENCAPAIAN*100,2);
                $data['targetKM'][] = round($v->TARGET*100,2);
            }else if($v->TIPE == 'MTBF') {
                $data['achievementMTBF'][] = round($v->PENCAPAIAN,2);
                $data['targetMTBF'][] = round($v->TARGET,2);
            }
        }
    
		$this->template->display('pc/v_home.php', 'header.php', $data);
	}

    public function viewList() {
        $tahun = $this->input->get('tahun', true) ?: date('Y')-1;
        $data['tahun'] = $tahun;
        $this->template->display('pc/v_list.php', 'header.php', $data);
    }

    public function ajaxDataPC()
    {
        $post = $this->input->post();
        $rows = $this->getDataPC($post);
        $data = [];

        foreach ($rows as $key => $field) {
            $recordsFiltered++;
            $row = [];

            $edit = '<a href="#" onclick="editDataNamaPelatihan(\''.$field['KD_LATIH'].'\')" class="btn btn-primary btn-floating" title="Button Edit"><i class="fa fa-pencil"></i></a>';
            $delete = '<a href="#" onclick=deleteData(\'actDeleteNamaPelatihan?id='.$field['KD_LATIH'].'\') class="btn btn-danger btn-floating" title="Button Delete"><i class="fa fa-trash"></i></button>';

            $row[] = $field['NAMA_USER'];
            $row[] = $field['NAMA_PERANGKAT'];
            $row[] = $field['TAHUN'];
            $row[] = $field['PERIODE'];
            $row[] = $field['TIPE'];
            $row[] = round($field['PENCAPAIAN']*100,2) . '%';
            $row[] = '<center>'. $edit . $delete .'</center>';
            $data[] = $row;
        }
        $recordsTotal = $this->getDataPC($post, 'count');

        $output = [
            "draw" => $post['draw'],
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsTotal,
            "data" => $data,
        ];
        echo json_encode($output);
        exit;
    }

    public function getDataPC($post, $type = "get")
    {
        $column_order = ['NAMA_USER', 'NAMA_PERANGKAT', 'TAHUN', 'PERIODE', 'TIPE', 'PENCAPAIAN'];
        $order = 'ASC';
        $this->db->query("ALTER SESSION SET NLS_DATE_FORMAT = 'DD MON YYYY'");
        $this->db->select('A.*');
        $this->db->from('PC_TABLE A');

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
            $this->db->order_by("A.NAMA_USER DESC");
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
    
}
