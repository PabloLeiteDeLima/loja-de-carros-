<?php
// Criar a classe para conectar ao Banco de dados.

class Conexao{
    // Atributos...
    private static string $host = "localhost";
    private static string $port = "3306";
    private static string $user = "root";
    private static string $pass = "";
    private static string $dbname = "projetolojacarros";

    private static ?PDO $instance = null; // ?PDO ->significa: que aceita a classe PDO ou nulo, ou seja, é a tipagem. PHP 8.4

    public static function getConexao():PDO { // indica o tipo de retorno do método (PHP 8.4)
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