<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administracao de Pacientes</title>
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-grid.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-reboot.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>bootstrap/css/style.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>bootstrap/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.js"></script>
        <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.bundle.js"></script>
         <script src="<?php echo base_url(); ?>bootstrap/m/js/materialize.js"></script>
        <link href="<?php echo base_url(); ?>bootstrap/m/css/materialize.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <header class="active ">
        <nav  class="grey darken-4">
            <ul class="navbar-nav grey darken-4 ">
                <li class="nav-item active grey darken-4">
                    <a class="brand-logo-sm center btn btn-dark grey darken-4 btn-hover" href="<?php echo base_url(); ?>start/edicao/">Bem vindo: &nbsp;&nbsp;&nbsp; <?php echo strtoupper($this->session->nome); ?> <span class="sr-only">(current)</span></a>
                </li> 
            </ul>
        </nav>
    </header>
    <body class="body info">
        <div class="card-body ">
            <a class=" btn btn-group-toggle btn-dark  light-blue darken-4 btn-hover  " href="<?php echo base_url(); ?>hospital/inserir_paciente/">   Novo Paciente<span class="sr-only">(current)</span></a>
            <center >
                <br>
                <?php
                $id_teste = -1;
                $tabela = 'paciente';
                $paciente = $this->user_model->get_pacientes($tabela, $this->session->id);
                foreach ($paciente->result() as $linha) {
                    $id_teste = $linha->FK_hospital_cnpj;
                    $this->table->set_heading('NOME', 'CPF', 'SEXO', 'IDADE');
                    $sexo;
                    if ($linha->sexo == "M") {
                        $sexo = "Masculino";
                    } else {
                        $sexo = "Feminino";
                    }
                    $this->table->add_row($linha->nome, $linha->cpf, $sexo, $linha->idade, anchor("hospital/atualizar/" . $linha->cpf, '<input class=" btn btn-group-toggle btn-dark light-blue darken-1 btn-hover btn-block " type="button" name="edit" value="EDITAR" >'), anchor("hospital/delete/" . $linha->cpf, '<input class="btn btn-group-toggle btn-block red darken-4 btn-dark btn-hover " type="button" name="delete" value="Apagar" >'));
                }
                $tmpl = array(
                    'table_open' => '<table id="pacientes" class="table  table-success table-hover table-bordered table-light  table-responsive-lg  table-striped  ">',
                    'thead_open' => '<thead class="thead-dark">',
                    'thead_close' => '</thead>',
                );
                if ($id_teste == -1) {
                    echo '<br>';
                    echo '<h4><b> Fila de Pacientes Vazia </h4></b>';
                } else {
                    $this->table->set_template($tmpl);
                    echo $this->table->generate();
                }
                ?>    
            </center>
        </div>
        <div class="active  ">
            <center>
                <footer class="card-footer footer   "> 
                    <?php
                    echo form_open_multipart('start/sair/');
                    ?>
                    <input class="btn btn-group-toggle btn-dark btn-hover red darken-1" type="submit" value="Logout" name="cad"><br>
                    </form>
                </footer>
            </center>
        </div>

    </body>

</html>