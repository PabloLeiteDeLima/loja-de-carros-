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

    // Método para Listar o Bando de Dados.(Read)...?.
    public function ListarCarros():array{

        // Usando query() diretamente e retornando o resultado sem criar variáveis extras
        $stmt = $this->conn->query("SELECT * FROM tb_carro");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }//fechamento da função ListarCarros().

}//fechamento da classe CarroDAO().

?>