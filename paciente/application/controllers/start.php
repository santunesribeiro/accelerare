<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('parser');
        $this->load->helper('url');
        $this->load->helper('array');
        $this->load->model('user_model');
        $this->load->library('table');
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->library('googlemaps');
    }

    public function index() {
        $this->googlemaps->initialize();
        $tabela = 'hospital';
        $hospital = $this->user_model->get_all($tabela);
        foreach ($hospital->result() as $linha) {
            $cnpj = $linha->cnpj;
            $nome = $linha->nome;
            $tabEndereco = "endereco";
            $endereco = $this->user_model->get_endereco($tabEndereco, $cnpj);
            foreach ($endereco->result() as $end) {
                $rua = $end->rua;
                $numero = $end->numero;
                $cidade = $end->cidade;
                $bairro = $end->bairro;
                $paciente = $this->user_model->get_pacientes("paciente", $cnpj);
                $count = 0;
                foreach ($paciente->result() as $p) {
                    $count = $count + 1;
                }
                $marker['position'] = $rua . " " . $numero . " " . $cidade;
                $marker['infowindow_content'] = "hospital: " . $nome . "." .
                        "<br>" . $rua . "," . " " . $numero . " - " . $bairro . "<br>" . $cidade . "." . "<br>" .
                        "Fila de espera: " . $count . " Paciente(s).";
                $marker['animation'] = "DROP";
                $marker['flat'] = true;
                if ($count <= 2) {
                    //green
                   $marker['icon'] = "http://individual.icons-land.com/IconsPreview/MapMarkers/PNG/Centered/64x64/MapMarker_Marker_Outside_Green.png";
                }elseif ($count >= 3 and $count < 8) {
                    //yellow
                   $marker['icon'] = "http://individual.icons-land.com/IconsPreview/MapMarkers/PNG/Centered/64x64/MapMarker_Marker_Outside_Yellow.png";
                }elseif ($count >= 8) {
                      //red
                   $marker['icon'] = "http://individual.icons-land.com/IconsPreview/MapMarkers/PNG/Centered/64x64/MapMarker_Marker_Outside_Red.png";
                }
                
                $this->googlemaps->add_marker($marker);
                $count = 0;
            }
        }
        $data['map'] = $this->googlemaps->create_map();
        $this->load->view('index', $data);
    }

}
