<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital extends CI_Controller {

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
        $this->load->helper('date');
        $this->load->helper('pdf_helper');
        if ($this->session->autorizacao != true) {

            redirect('start/');
        }
    }

    public function index() {

        $this->load->view('index_hospital');
    }

    public function inserir_paciente() {
        $this->load->view('inserir_paciente');

        if ($this->Validar()) {
            $verifica = false;
            $tabela = 'paciente';
            $paciente = elements(array('cpf', 'nome', 'sexo', 'idade',), $this->input->post());
            $paciente['FK_hospital_cnpj'] = $this->session->id;
            $BD = $this->user_model->get_pacientes($tabela, $this->session->id);
            foreach ($BD->result() as $linha) {
                if ($linha->cpf == $paciente['cpf']) {
                    $verifica = true;
                }
            }
            if ($verifica) {
                echo 'Paciente ja Cadastrado';
            } else {

                $sql = $this->user_model->inserir($tabela, $paciente);
                redirect('hospital/');
            }
        } else {
            echo validation_errors();
        }
    }

    public function atualizar($cpf) {
        $tabela = 'paciente';
        $paciente = $this->user_model->get_one_paciente($tabela, $cpf);
        foreach ($paciente->result() as $linha) {
            $dados = array(
                'cpf' => $linha->cpf,
                'nome' => $linha->nome,
                'sexo' => $linha->sexo,
                'idade' => $linha->idade,
                'FK_hospital_cnpj' => $linha->FK_hospital_cnpj
            );
        }
        $this->load->view('editar_paciente', $dados);
        if ($this->ValidarEdicao()) {
            $dados = elements(array('cpf', 'nome', 'sexo', 'idade'), $this->input->post());
            $tabela = 'paciente';
            $this->user_model->update_paciente($tabela, $dados, $dados['cpf']);
            redirect('hospital/');
        } else {
            echo validation_errors();
        }
    }

    public function delete($cpf) {
        $tabela = 'paciente';
        $this->user_model->delete($tabela, $cpf);
        redirect('hospital/');
    }

    public function Validar() {
        $this->form_validation->set_rules('cpf', 'CPF', 'required');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('idade', 'Idade', 'required');
        return $this->form_validation->run();
    }

    public function ValidarEdicao() {
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('idade', 'Idade', 'required');
        return $this->form_validation->run();
    }

}
