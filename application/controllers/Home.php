<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('Template');
    }
	public function index()
	{
        // var_dump($this->session->userdata());die;
        if(empty($this->session->userdata('tahun'))){
            $this->session->set_userdata('tahun', date('Y'));
        }else if(!empty($this->input->get('tahun', true))){
            $this->session->set_userdata('tahun', $this->input->get('tahun', true));
        }
        $tahun = $this->session->userdata('tahun');
        $data['tahun'] = $tahun;
        $data['dataPC'] = $this->db->query("
        SELECT SUM(PC_AR)*100 PC_AR, SUM(PC_KM)*100 PC_KM, SUM(PC_MTBF) PC_MTBF, AVG(TARGET_AR)*100 TARGET_AR, AVG(TARGET_KM)*100 TARGET_KM, AVG(TARGET_MTBF) TARGET_MTBF FROM (
        SELECT
        CASE WHEN A.TIPE='AR' AND TIPE_PERANGKAT='PC' THEN AVG(PENCAPAIAN) END PC_AR,
        CASE WHEN A.TIPE='KM' AND TIPE_PERANGKAT='PC' THEN AVG(PENCAPAIAN) END PC_KM,
        CASE WHEN A.TIPE='MTBF' AND TIPE_PERANGKAT='PC' THEN AVG(PENCAPAIAN) END PC_MTBF,
        CASE WHEN B.TIPE = 'AR' THEN B.TARGET END AS TARGET_AR, 
        CASE WHEN B.TIPE = 'KM' THEN B.TARGET END AS TARGET_KM, 
        CASE WHEN B.TIPE = 'MTBF' THEN B.TARGET END AS TARGET_MTBF 
        FROM PC_TABLE A JOIN M_TARGETS B ON A.TIPE=B.TIPE AND A.TAHUN = B.TAHUN WHERE A.TAHUN like '%$tahun%' GROUP BY A.TIPE, TIPE_PERANGKAT) PC")->result();

        $data['dataNB'] = $this->db->query("
        SELECT SUM(NB_AR)*100 NB_AR, SUM(NB_KM)*100 NB_KM, SUM(NB_MTBF) NB_MTBF, AVG(TARGET_AR)*100 TARGET_AR, AVG(TARGET_KM)*100 TARGET_KM, AVG(TARGET_MTBF)TARGET_MTBF FROM (
        SELECT
        CASE WHEN A.TIPE='AR' AND TIPE_PERANGKAT='NB' THEN AVG(PENCAPAIAN) END NB_AR,
        CASE WHEN A.TIPE='KM' AND TIPE_PERANGKAT='NB' THEN AVG(PENCAPAIAN) END NB_KM,
        CASE WHEN A.TIPE='MTBF' AND TIPE_PERANGKAT='NB' THEN AVG(PENCAPAIAN) END NB_MTBF,
        CASE WHEN B.TIPE = 'AR' THEN B.TARGET END AS TARGET_AR, 
        CASE WHEN B.TIPE = 'KM' THEN B.TARGET END AS TARGET_KM, 
        CASE WHEN B.TIPE = 'MTBF' THEN B.TARGET END AS TARGET_MTBF 
        FROM PC_TABLE A JOIN M_TARGETS B ON A.TIPE=B.TIPE AND A.TAHUN = B.TAHUN WHERE A.TAHUN like '%$tahun%' GROUP BY A.TIPE, TIPE_PERANGKAT) NB")->result();

        $data['dataPrinter'] = $this->db->query("
        SELECT SUM(PR_FPG)*100 PR_FPG, SUM(PR_FPB) PR_FPB, SUM(PR_TK)*100 PR_TK, AVG(TARGET_FPG)*100 TARGET_FPG, AVG(TARGET_FPB) TARGET_FPB, AVG(TARGET_TK)*100 TARGET_TK FROM ( 
        SELECT
        CASE WHEN A.TIPE='FREKUENSI PENGGUNA' THEN AVG(PENCAPAIAN) END PR_FPG,
        CASE WHEN A.TIPE='FREKUENSI PERBAIKAN'  THEN AVG(PENCAPAIAN) END PR_FPB,
        CASE WHEN A.TIPE='TINGKAT KEPUASAN'  THEN AVG(PENCAPAIAN) END PR_TK,
        CASE WHEN B.TIPE = 'FREKUENSI PENGGUNA' THEN B.TARGET END AS TARGET_FPG,
        CASE WHEN B.TIPE = 'FREKUENSI PERBAIKAN' THEN B.TARGET END AS TARGET_FPB,
        CASE WHEN B.TIPE = 'TINGKAT KEPUASAN' THEN B.TARGET END AS TARGET_TK
        FROM PRINTER_TABLE A JOIN M_TARGETS B ON A.TAHUN = B.TAHUN  AND A.TIPE = B.TIPE WHERE A.TAHUN like '%$tahun%' GROUP BY A.TIPE) PRINTER")->result();

        

        $data['dataUser'] = $this->db->query("SELECT SUM(USER_PC) USER_PC, SUM(USER_NB)USER_NB FROM (
        SELECT 
        CASE WHEN TIPE_PERANGKAT = 'PC' THEN COUNT(DISTINCT NAMA_USER) END USER_PC,
        CASE WHEN TIPE_PERANGKAT = 'NB' THEN COUNT(DISTINCT NAMA_USER) END USER_NB
        FROM PC_TABLE B WHERE TAHUN like '%$tahun%' GROUP BY TIPE_PERANGKAT) PC ")->result();

        $data['myClass'] = $this;

		$this->template->display('home/v_home.php', 'header.php', $data);
	}

    public function formatText($target, $data) {
        $text = '';
        $persen = '%';
        if($target < 10){
            $persen = '';
        }

        if($target > $data){
            $text = "<div class='d-flex justify-content-center align-items-center'><span class='text-danger fa fa-arrow-down'></span>&nbsp;&nbsp;<h2 class='text text-danger fw-bold'>".round($data,2)."$persen</h2></div>";
        }else if($target == $data){
            $text = "<h2 class='text text-warning fw-bold'>".round($data,2)."$persen</h2>";
        }else if($target < $data){
            $text = "<div class='d-flex justify-content-center align-items-center'><span class='text-success fa fa-arrow-up'></span>&nbsp;&nbsp;<h2 class='text text-success fw-bold'>".round($data,2)."$persen</h2></div>";
        }

        return $text;
    }

    
}
