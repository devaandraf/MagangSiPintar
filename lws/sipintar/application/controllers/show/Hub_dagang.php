<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hub_dagang extends CI_Controller {

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
    public function index() {
        $this->load->model('M_data');
        $data['negara'] = $this->M_data->getNegara();
        $data['neraca'] = $this->M_data->getNeraca();
        $this->load->view('hub_dagang', $data);
    }

    public function getNeracaNegara() {

        $this->load->model('M_data');

        $negara = $this->input->post('negara');
        $data = $this->M_data->getNeracaNegara($negara);

        echo json_encode($data);
    }

    public function getNerEkspor() {

        $this->load->model('M_data');
        $getdate =  $this->M_data->getTahunPusdatin();
        
        foreach ($getdate as $key => $value){
            $datenow =  $value->tahun;
        }
        
        
        $negara = $this->input->post('negara');
        $dataq = $this->M_data->getNerEkspor($negara,$datenow);

        
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
              $row['pertumbuhan'] = round(($datab-$datac)/$datac*100,2);
              }
              $data[] = $row;
              
            
            }
              $output = array(
                "data" => $data,
              );
        echo json_encode($data);
    }

    public function getNerImpor() {

        $this->load->model('M_data');
        $getdate =  $this->M_data->getTahunPusdatin();
        
        foreach ($getdate as $key => $value){
            $datenow =  $value->tahun;
        }
        $negara = $this->input->post('negara');
//        $data = $this->M_data->getNerImpor($negara);
        
        
        
        $dataq = $this->M_data->getNerImpor($negara,$datenow);
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
              $row['pertumbuhan'] = round(($datab-$datac)/$datac*100,2);
              }
              $data[] = $row;
              
            
            }
              $output = array(
                "data" => $data,
              );
              
         
//             foreach($dataq as $value){
//                    $row = array();
//                    $row['tahun'] =$value->tahun;
//                    $row['nilai'] = $value->nilai;
////                    $row['nilaiI'] = $databc;
//                    $row['share'] = $value->share;
//
//                    $data[] = $row;
//                }
//                  $output = array(
//            "data" => $data,
//            );
//                
           
        echo json_encode($data);
    }
    
    
    public function getHubKomoEkspor() {

        $this->load->model('M_data');

        $negara = $this->input->post('negara');
        $data = $this->M_data->getHubKomoEkspor($negara);

        echo json_encode($data);
    }
    
    public function getHubKomoImpor() {

        $this->load->model('M_data');

        $negara = $this->input->post('negara');
        $data = $this->M_data->getHubKomoImpor($negara);

        echo json_encode($data);
    }

}
