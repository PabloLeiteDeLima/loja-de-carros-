<?php

// requisições necessárias...
require_once("../Models/Carro.php");
require_once("../Models/CarroDAO.php");
require_once("../Config/Conexao.php");

// pegar dados vindos do formulário atualizar carro.
$id_carro = filter_input(INPUT_POST, 'id_carro', FILTER_VALIDATE_INT) ? : null;
$marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_SPECIAL_CHARS) ?: null; // Capitura textos removendo tags HTML perigosas (sanitização)
$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_SPECIAL_CHARS) ? : null; 
$ano = filter_input(INPUT_POST, 'ano', FILTER_VALIDATE_INT) ?: null;  // Capitura e valida números inteiros (se não for números virá null ou false)
$placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_SPECIAL_CHARS) ? : null; 

// 2. Ajuste do preço para bater com o formato INTEIRO (Centavos) configurado no DAO
$precoBruto         = filter_input(INPUT_POST, 'preco', FILTER_DEFAULT) ?? '';
$precoLimpo         = str_replace(['R$', ' ', 'r$'], '', $precoBruto);
$precoApenasNumeros = str_replace(['.', ','], '', $precoLimpo);
$preco              = filter_var($precoApenasNumeros, FILTER_VALIDATE_INT) ?: null;$cambio = filter_input(INPUT_POST, 'cambio', FILTER_SANITIZE_SPECIAL_CHARS) ? : null;

$observacoes = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_SPECIAL_CHARS) ? : null;

// criando o objeto carro para setar os valores vindos do formulário atualizar carro.
$objCarro1 = new Carro($marca, $modelo, $ano, $placa, $preco, $cambio, $observacoes);
$objCarro1->setId($id_carro);

// Criando o objeto dao para manipulação com o Banco de dados
$objCarroDAO = new CarroDAO(Conexao::getConexao());
$objCarroDAO->AtualizarUmCarro($objCarro1);

// redirecionamento para página visualizar carros.php
header("location:../views/visualizarCarros.php");

?>