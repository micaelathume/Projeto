<?php

class Certificado
{
    // DB Stuff
    private $conn;
    private $table = 'certificado';

    // Properties
    public $codigo;
    public $usuario;
    public $evento;
    public $data_emissao;
    public $conteudo;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    private function gerarCodigo(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return md5($randomString);
    }

    public function create()
    {
        $query = $query = 'INSERT INTO ' . $this->table . ' SET codigo = :codigo, usuario = :usuario, evento = :evento, data_emissao = :data_emissao, conteudo = :conteudo';

        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->codigo = $this->gerarCodigo();
        $this->usuario = htmlspecialchars(strip_tags($this->usuario));
        $this->evento = htmlspecialchars(strip_tags($this->evento));
        $this->data_emissao = htmlspecialchars(strip_tags($this->data_emissao));
        $this->conteudo = htmlspecialchars(strip_tags($this->conteudo));

        // Bind data
        $stmt->bindParam(':codigo', $this->codigo);
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':evento', $this->evento);
        $stmt->bindParam(':data_emissao', $this->data_emissao);
        $stmt->bindParam(':conteudo', $this->conteudo);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function read_id() {
        $query = 'SELECT * FROM ' . $this->table . '
                  WHERE usuario = ? AND evento = ?';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->usuario);
        $stmt->bindParam(2, $this->evento);

        // Execute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->codigo = $row['codigo'];
        $this->usuario = $row['usuario'];
        $this->evento = $row['evento'];
        $this->data_emissao = $row['data_emissao'];
        $this->conteudo = $row['conteudo'];
    }

    public function validate() {
        $query = 'SELECT * FROM ' . $this->table . '
                  WHERE codigo = ?';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->codigo);

        // Execute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->codigo = $row['codigo'];
        $this->usuario = $row['usuario'];
        $this->evento = $row['evento'];
        $this->data_emissao = $row['data_emissao'];
        $this->conteudo = $row['conteudo'];
    }
}