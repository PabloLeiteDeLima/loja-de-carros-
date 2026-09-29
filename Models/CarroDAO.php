<?php
// classe para manipulação do Banco de Dados...

// requisições necessárias...
require_once("../Config/Conexao.php");
require_once("Carro.php");

class CarroDAO{
    // atributo...
    private PDO $conn;

    // Método construtor.
    public function __construct(PDO $conn){
        $this->conn = $conn;
    }

    // Método para Criar no Bando de Dados.(Insert)...OK.
    public function CriarCarro(Carro $objCarro){

        $stmt = $this->conn->prepare("INSERT INTO tb_carro (marca, modelo, ano, placa, preco,
        cambio, observacoes) VALUES (:marca, :modelo, :ano, :placa, :preco, :cambio,
        :observacoes)");

        $stmt->bindValue(":marca", $objCarro->getMarca(), PDO::PARAM_STR);
        $stmt->bindValue(":modelo", $objCarro->getModelo(), PDO::PARAM_STR);
        $stmt->bindValue(":ano", $objCarro->getAno(), $objCarro->getAno() === null ? PDO::PARAM_NULL : PDO::PARAM_INT); // tratando para se vier null ou inteiro.
        $stmt->bindValue(":placa", $objCarro->getPlaca(), PDO::PARAM_STR);
        $stmt->bindValue(":preco", $objCarro->getPreco(), $objCarro->getPreco() === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
        $stmt->bindValue(":cambio", $objCarro->getCambio(), PDO::PARAM_STR);
        $stmt->bindValue(":observacoes", $objCarro->getObservacoes(), PDO::PARAM_STR);

        return $stmt->execute();        

    }//fechamento da função CriarCarro().

    // Método para Listar o Bando de Dados.(Read)...OK.
    public function ListarCarros():array{

        // Usando query() diretamente e retornando o resultado sem criar variáveis extras
        $stmt = $this->conn->query("SELECT * FROM tb_carro");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }//fechamento da função ListarCarros().

    // Método para listar um carro do Banco de dados... OK.
    public function RetornaUmCarro(int $id):array | false{

        $stmt = $this->conn->prepare("SELECT * FROM tb_carro WHERE id_carro = :id_carro");
        // protegendo contra SQL Injection.
        $stmt->bindValue(":id_carro", $id, PDO::PARAM_INT);
        // executa a query internamente.
        $stmt->execute();

        // fetch ->traz apenas uma linha do banco de dados.
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }//fechamento da função RetornaUmCarro().

    // Método para Atualizar um carro do Banco de dados... OK.
    public function AtualizarUmCarro(Carro $carro):bool{

        $stmt = $this->conn->prepare("UPDATE `tb_carro` SET `marca` = :marca, `modelo` = :modelo, `ano` = :ano,
        `placa` = :placa, `preco` = :preco, `cambio` = :cambio, `observacoes` = :observacoes 
        WHERE `tb_carro`.`id_carro` = :id_carro");

        $stmt->bindValue(":id_carro", $carro->getId(), $carro->getId() === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
        $stmt->bindValue(":marca", $carro->getMarca(), PDO::PARAM_STR);
        $stmt->bindValue(":modelo", $carro->getModelo(), PDO::PARAM_STR);
        $stmt->bindValue(":ano", $carro->getAno(), $carro->getAno() === null ? PDO::PARAM_NULL : PDO::PARAM_INT); // tratando para se vier null ou inteiro.);
        $stmt->bindValue(":placa", $carro->getPlaca(), PDO::PARAM_STR);
        $stmt->bindValue(":preco", $carro->getPreco(), $carro->getPreco() === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
        $stmt->bindValue(":cambio", $carro->getCambio(), PDO::PARAM_STR);
        $stmt->bindValue(":observacoes", $carro->getObservacoes(), PDO::PARAM_STR);

        return $stmt->execute();

    }// fechamento da função AtualizarUmCarro().

    // Método para Deletar um carro do Banco de dados... ?.
    public function deletarCarro(int $id_carro):bool{

        $stmt = $this->conn->prepare("DELETE FROM tb_carro WHERE id_carro = :id_carro");

        $stmt->bindValue(":id_carro", $id_carro, PDO::PARAM_INT);

        return $stmt->execute(); 
    }// fechamento da função deletarCarro().





}//fechamento da classe CarroDAO().

?>