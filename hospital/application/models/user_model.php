<?php

class User_model extends CI_Model {

    public function inserir($tabela, $dados) {
        return $this->db->insert($tabela, $dados);
    }

    public function get_all($tabela) {
        return $this->db->get($tabela);
    }

    public function get_one_paciente($tabela, $id) {
        $this->db->where('cpf', $id);
        return $this->db->get($tabela);
    }

    public function get_pacientes($tabela, $id) {
        $this->db->where('FK_hospital_cnpj', $id);
        return $this->db->get($tabela);
    }

    public function get_hospital($tabela, $id) {
        $this->db->where('cnpj', $id);
        return $this->db->get($tabela);
    }

    public function get_endereco($tabela, $cnpj) {
        $this->db->where('FK_hospital_cnpj', $cnpj);
        return $this->db->get($tabela);
    }

    public function update_paciente($tabela, $dados, $cpf) {
        $this->db->where('cpf', $cpf);
        $update = $this->db->update($tabela, $dados);

        return $update;
    }

    public function update_hospital($tabela, $dados, $cnpj) {
        $this->db->where('cnpj', $cnpj);
        $update = $this->db->update($tabela, $dados);

        return $update;
    }

    public function update_endereco($tabela, $dados, $cnpj) {
        $this->db->where('FK_hospital_cnpj', $cnpj);
        $update = $this->db->update($tabela, $dados);

        return $update;
    }

    public function delete($tabela, $id) {
        return $this->db->delete($tabela, array('cpf' => $id));
    }

    public function apaga_hospital($tabela, $id) {
        return $this->db->delete($tabela, array('cnpj' => $id));
    }

}
