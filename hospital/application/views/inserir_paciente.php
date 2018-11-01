<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Novo Paciente</title>
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
                <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/Mascara.js"></script> 

    </head>
      <header class="active">
        <nav  class="grey darken-4">

            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="brand-logo-sm center btn btn-dark grey darken-4 btn-hover" href="<?php echo base_url(); ?>Hospital/"  <span class="sr-only">Voltar</span></a>
                </li> 
            </ul>
        </nav>
    </header>

    <body class="body info ">
        <div class="card-body container-fluid">
                <div class="form-group">
                    <form class=" form-control" name="paciente" method="POST">
                        <h4 class="title black-text">Novo Paciente</h4>
                        <label class="label black-text" for="cpf">CPF</label>
                        <input placeholder="CPF" class="form-control" id="cpf" type="text" value="" name="cpf" maxlength="14" onKeyPress="MascaraCPF(paciente.cpf);" <!-onBlur="ValidarCPF(paciente.cpf);"->>
                        <br>
                      <label class="label black-text" for="nome">Nome</label>
                        <input class="form-control" placeholder="Nome" id="nome" type="text" value="" name="nome" placeholder="NOME"  ><br>
                         <label class="label black-text" for="sexo">Sexo</label>
                        <select id="sexo" class="form-control" name="sexo">
                            <option value="F" selected>FEMININO</option>
                            <option value="M">MASCULINO</option>
                        </select><br><br>
                         <label class="label black-text" for="idade">Idade</label>
                        <input class="form-control" placeholder="Idade" id="idade" type="number" value="" name="idade" placeholder="idade"  min="0" max="120"><br><br>
                        <input class="btn btn-group-toggle light-blue darken-4 btn-dark btn-hover" type="submit" value="Salvar" name="enviar"><br>
                    </form>
                </div>
            
            <br>
        </div>  
        <div class="container container-fluid alert-danger wy-alert-danger">
            <center>
                <footer class="card-footer footer"> 
                    <?php echo form_open_multipart('start/sair/');
                    ?>
                    <input class="btn btn-group-toggle btn-dark btn-hover red darken-1" type="submit" value="Logout" name="cad"><br>
                    </form>
                </footer>
            </center>
        </div>
    </body>
</html>