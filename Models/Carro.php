<?php
// Criação da classe.
class Carro{
    // Atributos...
    private int $id;
    private string $marca;
    private string $modelo;
    private int $ano;
    private string $placa;
    private string $preco;
    private string $cambio;
    private string $observacoes;

    // Método construtor. (=null -> para dizer: caso não venha valor... aceite o valor null.);
    public function __construct($marca = null, $modelo = null, $ano = null, $placa = null, $preco = null, $cambio = null, $observacoes = null){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
        $this->placa = $placa;
        $this->preco = $preco;
        $this->cambio = $cambio;
        $this->observacoes = $observacoes;

    }

    // Métodos gets...
    public function getId(){
        return $this->id;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getAno(){
        return $this->ano;
    }
    public function getPlaca(){
        return $this->placa;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function getCambio(){
        return $this->cambio;
    }
    public function getObservacoes(){
        return $this->observacoes;
    }

    // Métodos sets...
    public function setId(int $id):void{ // :void -> indica o tipo de rretorno do método. (PHP 8.4)
        $this->id = $id;
    }
    public function setMarca(string $marca):void{
        $this->marca = $marca;
    }
    public function setModelo(string $modelo):void{
        $this->modelo = $modelo;
    }
    public function setAno(int $ano):void{
        $this->ano = $ano;
    }
    public function setPlaca(string $placa):void{
        $this->placa = $placa;
    }
    public function setPreco(string $preco):void{
        $this->preco = $preco;
    }
    public function setCambio(string $cambio):void{
        $this->cambio = $cambio;
    }
    public function setObservacoes(string $observacoes):void{
        $this->observacoes = $observacoes;
    }

}// fechamento da classe Carro().
?>