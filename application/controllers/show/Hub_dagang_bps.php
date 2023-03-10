<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hub_dagang_bps extends CI_Controller {

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
        $this->load->model(array('M_data','M_graph'));
//        if (!$this->session->userdata('logged_in')) {
//            redirect('login');
//        }
    }
    public function index() {
        $this->load->model('M_data');
        $data['negara'] = $this->M_data->getNegaraBps();
        $data['neraca'] = $this->M_data->getNeracaBps();
        $data['analisa']= $this->M_data->getAnalisaBps();
        
        $datenow =  date("Y");
        
                $data['lastmonth'] = $this->M_graph->getBulanBPS($datenow);
                $data['lastmonthI'] = $this->M_graph->getBulanBPSI($datenow);
                // die(var_dump( $data['lastmonth']));
        
        $this->load->view('hub_dagang_bps', $data);
    }
    public function analisa() {
        $this->load->model('m_entri');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('date', 'date', 'required');
        if ($this->form_validation->run() === TRUE) {

            $insert = array(
                'negara'        => $this->input->post('negara'),
                'date'          => $this->input->post('date'),
                'subject'       => $this->input->post('subject'),
                'deskripsi'     => $this->input->post('desc'),
                'data'          => "ANALISA BPS",
                'created_at'    => date('Y-m-d H:i:s')
            );
            $this->m_entri->Analisa($insert);
            redirect('show/Hub_dagang_bps');
        } else {
            $this->load->model('M_data');
        $data['negara'] = $this->M_data->getNegaraBps();
        $data['neraca'] = $this->M_data->getNeracaBps();
        $this->load->view('hub_dagang_bps', $data);
        }
    }
    
    
    public function editAnalisa() {
        $this->load->model('M_data');
        $id = $this->input->post('idlogedit');
        $last_update = new DateTime();
        $update = array(
            'last_update' => $last_update->format('Y-m-d H:i:s'),
            'negara' => $this->input->post('negarague'),
            'date' => $this->input->post('dategue'),
            'subject' => $this->input->post('subjectgue'),
            'deskripsi' => $this->input->post('descgue')
        );
        $this->M_data->editAnalisa($id, $update);
        redirect('show/Hub_dagang_bps');
    }

    public function ajax_get_data($id) {
        $this->load->model('M_data');
        $result = $this->M_data->get_data_ajax($id);
        echo json_encode($result);
    }

    public function del_analisa() {
        $this->load->model('m_data');
        $id = $this->input->post('id');
        $this->m_data->del_analisa($id);
        redirect('show/hub_dagang_bps');
    }

    
    
    
    public function getSearchNegaraBps() {

        $this->load->model('M_data');

        $negara = $this->input->post('negara');
        $data = $this->M_data->getNeracaNegaraBps($negara);

        echo json_encode($data);
    }

    public function getNerEksporBps() {

        $this->load->model('M_data');

        $negara = $this->input->post('negara');
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
              $output = array(
                "data" => $data,
              );
        echo json_encode($data);
    }

    public function getNerImporBps() {

        $this->load->model('M_data');

        $negara = $this->input->post('negara');
//        $data = $this->M_data->getNerImpor($negara);
        
        
        
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
