<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ExportBPS extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     * 
     * author : enricochesa
     */
      public function __construct() {
            parent::__construct();
            $this->load->model(array('M_graph','M_data'));
        }
    public function NeracaPerdagangan($negara) {
        $datenow =  date("Y");

        if ($negara !== "default") {
            $data['datatable'] = json_decode(json_encode($this->M_data->getNeracaNegaraBps($negara)), true);
            $data['datanegara'] = $negara;
        } else {
            $data['datanegara'] = "";
        }

        $this->load->view('NewExportExcel/BPS/NeracaPerdagangan', $data);
    }

    public function PerkembanganTotalEksporNonMigas($negara) {
        $datenow =  date("Y");

        if ($negara !== "default") {
            
            $dataq = $this->M_data->getNerEksporBps($negara);        
            $jumlah = count($dataq);
            $jumlaha = $jumlah-1;
            $data = array();
            
                for ($i = $jumlaha; $i >= 0; $i--)
                {
                    $row = array();
                    $row['tahun'] = $dataq[$i]->tahun;
                    $row['nilai'] = $dataq[$i]->nilai;
                    $row['nilaiE'] = $dataq[$i]->nilaiE;
                    $row['share'] = $dataq[$i]->share;
                error_reporting(0);
                                $datac = $dataq[$i - 1]->nilaiE;
                                $datab = $dataq[$i]->nilaiE;
                if($datac != 0) {
                $row['pertumbuhan'] = number_format(($datab-$datac)/$datac*100,2,',', '.');
                }
                $data[] = $row;
                }

            $data['datatable'] = $data;
            $data['datanegara'] = $negara;

        } else {
            $data['datanegara'] = "";
        }
        
        
        $this->load->view('NewExportExcel/BPS/PerkembanganTotalEksporNonMigas', $data);
    }
    
    public function PerkembanganImporNonMigas($negara) {
        $datenow =  date("Y");

        if ($negara !== "default") {

        $dataq = $this->M_data->getNerImporBps($negara);
        $jumlah = count($dataq);
        $jumlaha = $jumlah-1;
        $data = array();
        
            for ($i = $jumlaha; $i >= 0; $i--)
            {
                $row = array();
                $row['tahun'] = $dataq[$i]->tahun;
                $row['nilai'] = $dataq[$i]->nilai;
                $row['nilaiI'] = $dataq[$i]->nilaiI;
                $row['share'] = $dataq[$i]->share;
               error_reporting(0);
                            $datac = $dataq[$i - 1]->nilaiI;
                            $datab = $dataq[$i]->nilaiI;
              if($datac != 0) {
              $row['pertumbuhan'] = number_format(($datab-$datac)/$datac*100,2,',', '.');
              }
              $data[] = $row;
            }

            $data['datatable'] = $data;
            $data['datanegara'] = $negara;
        } else {
            $data['datanegara'] = "";
        }
        

        $this->load->view('NewExportExcel/BPS/PerkembanganImporNonMigas', $data);
    }


}
