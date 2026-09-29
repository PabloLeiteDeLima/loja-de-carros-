<?php

// requisições necessárias...
require_once('../Models/CarroDAO.php');
require_once('../Config/Conexao.php');

// $id_carro = $_GET['id_carro'];
$id_carro = filter_input(INPUT_GET, 'id_carro', FILTER_VALIDATE_INT);

// criando o objeto dao.
$objCarroDAO = new CarroDAO(Conexao::getConexao());
$objCarroDAO->deletarCarro($id_carro);

// rredirecionamento para página visualizarCarro.php
header("location:../views/visualizarCarros.php");

?>