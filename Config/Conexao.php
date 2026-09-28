<?php
// Criar a classe para conectar ao Banco de dados.

class Conexao{
    // Atributos...
    private static string $host = "localhost";
    private static string $port = "3306";
    private static string $user = "root";
    private static string $pass = "";
    private static string $dbname = "#"; //****SE LIGA: FALTANDO CRIAR O BANCO DE DADOS****

    private static $instance = null;

    public static function getConexao() {
        if (self::$instance === null) {
            try {
                // String de conexão direta
                $dsn = "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbname . ";charset=utf8";
                
                // Cria a conexão com usuário e senha
                self::$instance = new PDO($dsn, self::$user, self::$pass);
                
            } catch (PDOException $e) {
                // Se der erro, mostra uma mensagem simples na tela e para o código
                die("Erro ao conectar no banco de dados=> " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}// fechamento da classe Conexao().

?>