<?php

class Usuario
{
    // DB Stuff
    private $conn;
    private $table = 'usuario';

    // Properties
    public $id;
    public $nome;
    public $cpf;
    public $email;
    public $senha;
    public $endereco;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = $query = 'INSERT INTO ' . $this->table . ' SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, endereco = :endereco';

        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));
        $this->endereco = htmlspecialchars(strip_tags($this->endereco));

        // Bind data
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':endereco', $this->endereco);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function update() {
        // Create query
        $query = 'UPDATE ' . $this->table . '
                    SET senha = :senha, endereco = :endereco, cpf = :cpf, email = :email
                    WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->senha = htmlspecialchars(strip_tags($this->senha));
        $this->endereco = htmlspecialchars(strip_tags($this->endereco));
        $this->cpf = htmlspecialchars(strip_tags($this->cpf));
        $this->email = htmlspecialchars(strip_tags($this->email));

        // Bind data
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':cpf', $this->cpf);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function delete() {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' 
                    WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind data
        $stmt->bindParam(':id', $this->id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function read()
    {
        $query = 'SELECT *
		            FROM ' . $this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
	
    public function read_id() {
        $query = 'SELECT * FROM ' . $this->table . '
                  WHERE id = ? ';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->id = $row['id'];
        $this->nome = $row['nome'];
        $this->cpf = $row['cpf'];
        $this->email = $row['email'];
        $this->senha = $row['senha'];
        $this->endereco = $row['endereco'];
    }

    public function login() {
        $query = 'SELECT * FROM ' . $this->table . '
                  WHERE email = ? 
                    AND senha = ?';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        $encryptedPwd = md5($this->senha);

        // Bind
        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2, $encryptedPwd);

        // Execute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->id = $row['id'] ?? null;
        $this->nome = $row['nome'] ?? null;
        $this->cpf = $row['cpf'] ?? null;
        $this->email = $row['email'] ?? null;
        $this->senha = $row['senha'] ?? null;
        $this->endereco = $row['endereco'] ?? null;
    }
}