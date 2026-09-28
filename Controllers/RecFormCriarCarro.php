<?php 

// requisições necessárias...
require_once("../Models/Carro.php");
require_once("../Config/Conexao.php");
require_once("../Models/CarroDAO.php");


// Captura textos removendo 'tags HTML perigosas' (Sanitização)
// SE LIGA: pedando dados vindos do formulário já com PHP 8.4 (maior segurança)
$marca = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_SPECIAL_CHARS) ?: null; // Capitura textos removendo tags HTML perigosas (sanitização)
$modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_SPECIAL_CHARS) ?: null;// Capitura textos removendo tags HTML perigosas (sanitização)
$ano = filter_input(INPUT_POST, 'ano', FILTER_VALIDATE_INT) ?: null; // Capitura e valida números inteiros (se não for números virá null ou false)
$placa = filter_input(INPUT_POST, 'placa', FILTER_SANITIZE_SPECIAL_CHARS) ?: null;

// SE LIGA: LIMPAR O CAMPO PREÇO.
// 1. Pega o valor bruto do formulário (ex: "50.000,00" ou "R$ 50.000,00")
$precoBruto = filter_input(INPUT_POST, 'preco', FILTER_DEFAULT) ?? '';
// 2. Remove o "R$" e espaços se o usuário ou uma máscara tiverem colocado
$precoLimpo = str_replace(['R$', ' ', 'r$'], '', $precoBruto);
// 3. Remove TODOS os pontos e TODAS as vírgulas de uma vez só
// Passando um array com ['.', ','], o PHP substitui ambos por nada ('')
$precoApenasNumeros = str_replace(['.', ','], '', $precoLimpo);
// 4. Converte para um número inteiro seguro
$preco = filter_var($precoApenasNumeros, FILTER_VALIDATE_INT) ?: null;

$cambio = filter_input(INPUT_POST, 'cambio', FILTER_SANITIZE_SPECIAL_CHARS) ?: null;
$observacoes = filter_input(INPUT_POST, 'observacao', FILTER_SANITIZE_SPECIAL_CHARS) ?: null;

// criando o objeto e setar os valores.
$objCarro = new Carro($marca, $modelo, $ano, $placa, $preco, $cambio, $observacoes);

// criando meu objeto DAO para manipulação com o Banco de dados...
$objCarroDAO = new CarroDAO(Conexao::getConexao());
$objCarroDAO->CriarCarro($objCarro);

// redirecionamento de tela...
header("location:../views/formCadastrarCarros.php");

?>