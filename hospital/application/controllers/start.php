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
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('index');
        if ($this->valida()) {
            $tabela = 'hospital';
            $dadosform = elements(array('login', 'senha', 'id'), $this->input->post());
            $dadosbd = $this->user_model->get_all($tabela);
            foreach ($dadosbd->result() as $linha) {
                $senha = $linha->senha;
                $senha = $this->encrypt->decode($senha);
                if ($linha->login == $dadosform['login'] and $dadosform['senha'] == $senha) {
                    $this->session->id = $linha->cnpj;
                    $this->session->autorizacao = true;
                    $this->session->nome = $linha->nome;

                    redirect('hospital/');
                }
            }
        } else {
            echo validation_errors();
        }
    }

    public function view_cad_admin() {
        $this->load->view('cadastro_admin');
    }

    public function cadastro() {
        $this->load->view('cadastro_admin');
        $verifica = false;
        $tabela = 'hospital';
        if ($this->valida_cad()) {

            $hospital = elements(array('cnpj', 'nome', 'login', 'senha'), $this->input->post());
            $senha = $this->encrypt->encode($hospital['senha']);
            $hospital['senha'] = $senha;
            $dadosbd = $this->user_model->get_all($tabela);
            foreach ($dadosbd->result() as $linha) {
                if ($linha->cnpj == $hospital['cnpj'] or $linha->login == $hospital['login']) {
                    $verifica = true;
                }
            }
            if ($verifica) {
                echo 'Login ja cadastrado';
            } else {
             $endereco = elements(array('rua', 'numero', 'cidade', 'bairro', 'estado', 'telefone'), $this->input->post());
                $endereco['FK_hospital_cnpj'] = $hospital['cnpj'];
                $this->user_model->inserir($tabela, $hospital);
                $tabela = 'endereco';
                $this->user_model->inserir($tabela, $endereco);
                $this->load->view('cad_sucess');
            }
        } else {
            echo validation_errors();
        }
    }

    public function delete_hospital() {
        $tabela = 'hospital';
        $cnpj = $_POST['cnpj'];
        $this->user_model->apaga_hospital($tabela, $cnpj);
        redirect('start/');
    }

    public function edicao() {
        $tabela = 'hospital';
        $query = $this->user_model->get_hospital($tabela, $this->session->id);
        foreach ($query->result() as $linha) {
            $dados = array(
                'cnpj' => $linha->cnpj,
                'nome' => $linha->nome,
                'login' => $linha->login,
                'senha' => $linha->senha
            );
        }
        $senha = $this->encrypt->decode($dados['senha']);
        $dados['senha'] = $senha;
        $this->load->view('editar_cad', $dados);
        if (isset($_POST['edicao']) and $this->Valida_edit()) {
            $tabela = 'hospital';
            $dadosform = elements(array('nome', 'login', 'senha'), $this->input->post());
            $senha = $this->encrypt->encode($dadosform['senha']);
            $dadosform['senha'] = $senha;
            $this->user_model->update_hospital($tabela, $dadosform, $dados['cnpj']);
            $this->session->nome = $dadosform['nome'];
            redirect('hospital/');
        } else {
            echo validation_errors();
        }
    }

    public function endereco() {
        $tabela = 'endereco';
        $query = $this->user_model->get_endereco($tabela, $this->session->id);
        foreach ($query->result() as $linha) {
            $dados = array('rua' => $linha->rua, 'numero' => $linha->numero, 'cidade' => $linha->cidade, 'bairro' => $linha->bairro, 'estado' => $linha->estado, 'telefone' => $linha->telefone
            );
        }
        $this->load->view('editar_endereco', $dados);

        if (isset($_POST['edicao']) and $this->valida_endereco()) {
            $tabela = 'endereco';
            $dadosform = elements(array('rua', 'numero', 'cidade', 'bairro', 'estado', 'telefone'), $this->input->post());
            $dadosform['FK_hospital_cnpj'] = $this->session->id;
            $this->user_model->update_endereco($tabela, $dadosform, $this->session->id);
            $this->load->view('up_sucess');
        } else {
            echo validation_errors();
        }
    }

    public function volta() {
        redirect('start/');
    }

    public function valida() {
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        return $this->form_validation->run();
    }

    public function valida_cad() {
        $this->form_validation->set_rules('cnpj', 'Cnpj', 'required');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('rua', 'Rua', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        return $this->form_validation->run();
    }

    public function valida_edit() {

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('login', 'Login', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        return $this->form_validation->run();
    }

    public function valida_endereco() {
        $this->form_validation->set_rules('rua', 'Rua', 'required');
        $this->form_validation->set_rules('numero', 'Numero', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('telefone', 'Telefone', 'required');
        return $this->form_validation->run();
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect('start/');
    }

}
