<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->library('session');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edição de Conta</title>      
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
    <header class="active">
        <nav  class="grey darken-4">

            <ul class="navbar-nav  ">
                <li class="nav-item active">
                    <a class="brand-logo-sm center btn btn-dark grey darken-4 btn-hover" href="<?php echo base_url(); ?>hospital/">Voltar <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            </div>
        </nav>
        <br>
    </header>
    <body class="body info ">
        <div class="card-body container-fluid">
            <div class="form-group">
                <form class="form-control" name="update_conta" method="POST">
                    <h4 class="title black-text">Editar Cadastro</b></h4>
                    <label class="label black-text" for="cnpj">Cnpj</label>
                    <input class="form-control" placeholder="Cnpj" id="cnpj" type="text" value="<?php echo $cnpj; ?>" name="cnpj" readonly ><br>        
                    <label class="label black-text" for="nome">Nome</label>
                    <input class="form-control" id="nome" placeholder="Nome" type="text" value="<?php echo $nome; ?>"  name="nome"><br>
                    <label class="label black-text" for="login">Login</label>
                    <input class="form-control" id="login" type="text" placeholder="Login" value="<?php echo $login; ?>" name="login" ><br>
                    <label class="label black-text" for="senha">Senha</label>
                    <input class="form-control" id="senha" placeholder="Senha" type="password" value="<?php echo $senha; ?>" name="senha"><br>
                    <br>
                    <input class="btn btn-group-toggle light-blue darken-4 btn-dark btn-hover" type="submit" value="Salvar" name="edicao"><br>
                </form>

                <br>
            </div>
        </center>
        <div class="active footer">
            <?php echo form_open_multipart('start/endereco/');
            ?>
            <input class="btn btn-group-toggle  blue darken-4 btn-dark btn-hover" type="submit" value="Alterar Endereco" name="cad">
            </form>
            <br>
            <?php echo form_open_multipart('start/delete_hospital/');
            ?>
            <input type="hidden" name="cnpj" value="<?php echo $this->session->id; ?>">
            <input class="btn btn-group-toggle  red btn-dark btn-hover " type="submit" value="Deletar Conta" name="cad"><br>
            </form>
            <br><br>
        </div>

</body>



</html>