<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
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
        <script language="JavaScript" type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/Mascara.js"></script> 
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
            <div class="form-group form-control" id="area_adm">
                <?php echo form_open_multipart('start/cadastro','name="cadastro"');
                ?>
                <h4 class="title black-text">Dados Do Hospital</h4>
                <label class="label black-text" for="cnpj">CNPJ</label>
                <input class="form-control" id="cnpj" onKeyPress="MascaraCNPJ(cadastro.cnpj);" type="text" value="" name="cnpj" placeholder="CNPJ" maxlength="18"  <!– onBlur="ValidarCNPJ(cadastro.cnpj);" –><br>
                <label class="label black-text"  for="nome">Nome</label>
                <input class="form-control" type="text" id="nome" value="" name="nome" placeholder="Nome"><br>
                <label class="label black-text"  for="login">Login</label>
                <input class="form-control" type="text" id="login" value="" name="login" placeholder="Login" ><br>
                <label class="label black-text" for="senha">Senha</label>
                <input id="senha" class="form-control" type="password" value="" name="senha"  placeholder="Senha"><br>
                <br>
                <h4 class="title black-text">Endereço</h4>
                <label class="label black-text" for="rua">Rua</label>
                <input class="form-control" type="text" value="" name="rua" placeholder="Rua" id="rua"><br>
                <label class="label black-text" for="numero">Numero</label>
                <input class="form-control" type="number" value="" id="numero" placeholder="Numero" name="numero" ><br>
                <label class="label black-text" for="bairro">Bairro</label>
                <input class="form-control" type="text" id="bairro" value=""  placeholder="Bairro" name="bairro" ><br>
                <label class="label black-text" for="cidade">Cidade</label>
                <input class="form-control" id="cidade" type="text" value=""  placeholder="Cidade" name="cidade" ><br>
                <label class="label black-text" for="estado">Estado</label>
                <select id="estado" class="form-control" name="estado">
                    <option value="Acre" selected>Acre</option>
                    <option value="Alagoas">Alagoas</option>
                    <option value="Amapá">Amapá</option>
                    <option value="Amazonas">Amazonas</option>
                    <option value="Bahia">Bahia</option>
                    <option value="Ceará">Ceará</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Espírito Santo">Espírito Santo</option>
                    <option value="Goiás">Goiás</option>  
                    <option value="Maranhão">Maranhão</option> 
                    <option value="Mato Grosso">Mato Grosso</option> 
                    <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                    <option value="Minas Gerais">Minas Gerais</option>
                    <option value="Pará">Pará</option>
                    <option value="Paraíba">Paraíba</option>
                    <option value="Paraná">Paraná</option>
                    <option value="Pernambuco">Pernambuco</option>
                    <option value="Piauí">Piauí</option>
                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                    <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                    <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                    <option value="Rondônia">Rondônia</option>
                    <option value="Roraima">Roraima</option>
                    <option value="Santa Catarina"> Santa Catarina</option>
                    <option value="São Paulo">São Paulo</option>
                    <option value="Sergipe">Sergipe</option>
                    <option value="Tocantins">Tocantins</option>
                </select><br>
                <label class="label black-text" for="telefone">Telefone</label>
                <input class="form-control" id="telefone" placeholder="Telefone" type="text" value="" 
                       name="telefone" onKeyPress="MascaraTelefone(cadastro.telefone);" maxlength="14"  <!onBlur="ValidaTelefone(cadastro.tel);" –> <br>
                <br>
                <input class="btn  light-blue darken-4 btn-hover" type="submit" value="Salvar" name="edicao"><br>
                <br>
                </form>

            </div>
    </body>

</html>