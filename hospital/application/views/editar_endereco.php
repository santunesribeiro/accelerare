<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Endereco</title>
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
                    <a class="brand-logo-sm center btn btn-dark grey darken-4 btn-hover" href="<?php echo base_url(); ?>/start/edicao/">Voltar <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            </div>
        </nav>
        <br>
    </header>
     <body class="body info ">
        <div class="card-body container-fluid">
                <div class="form-group">
                    <form class=" form-control" name="endereco" method="POST">
                  <h4 class="title black-text">Endereço</b></h4>
                <label class="label black-text" for="rua">Rua</label>
                <input class="form-control" placeholder="Rua" id="rua" type="text" value="<?php echo $rua; ?>" name="rua" ><br>
                 <label class="label black-text" for="numero">Numero</label>
                <input class="form-control" type="number"  placeholder="Numero" id="numero" value="<?php echo $numero; ?>" name="numero" ><br>
                 <label class="label black-text" for="bairro">Bairro</label>
                <input class="form-control" id="bairro" placeholder="Bairro" type="text" value="<?php echo $bairro; ?>" name="bairro"  ><br>
                  <label class="label black-text" for="cidade">Cidade</label>
                <input class="form-control" type="text" placeholder="Cidade" id="cidade" value="<?php echo $cidade; ?>" name="cidade"  ><br>
                <label class="label black-text" for="estado">Estado</label>
                <input class="form-control" type="text" placeholder="Estado" id="estado" value="<?php echo $estado; ?>" name="estado"  ><br>
                 <label class="label black-text" placeholder="Telefone" for="telefone">Telefone</label>
                <input class="form-control" type="text" id="telefone" value="<?php echo $telefone; ?>" name="telefone" onKeyPress="MascaraTelefone(endereco.telefone);" maxlength="14"  <!onBlur="ValidaTelefone(endereco.tel);" –> <br>
                <br>
                <input class="btn btn-group-toggle grey darken-4 btn-dark btn-hover" type="submit" value="Salvar" name="edicao"><br>
            </form>

        </div>

    </body>

</html>