<?php

class Inscricao
{
    // DB Stuff
    private $conn;
    private $table = 'inscricao';

    // Properties
    public $usuario;
    public $evento;
    public $valor;
    public $status;
    public $data_inscricao;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    { 
        $query = $query = 'INSERT INTO ' . $this->table . ' SET usuario = :usuario, evento = :evento, valor = :valor, status = :status, data_inscricao = :data_inscricao';

        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->usuario = htmlspecialchars(strip_tags($this->usuario));
        $this->evento = htmlspecialchars(strip_tags($this->evento));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->data_inscricao = htmlspecialchars(strip_tags($this->data_inscricao));

        // Bind data
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':evento', $this->evento);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':data_inscricao', $this->data_inscricao);

        // Execute query
        if ($stmt->execute()) {
            return true;
        } 
        
        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function update()
    {
        // Create query
        $query = 'UPDATE ' . $this->table . '
                    SET valor = :valor, status = :status, data_inscricao = :data_inscricao
                    WHERE usuario = :usuario
                      AND evento = :evento';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->usuario = htmlspecialchars(strip_tags($this->usuario));
        $this->evento = htmlspecialchars(strip_tags($this->evento));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->data_inscricao = htmlspecialchars(strip_tags($this->data_inscricao));

        // Bind data
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':evento', $this->evento);
        $stmt->bindParam(':valor', $this->valor);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':data_inscricao', $this->data_inscricao);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function delete()
    {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' 
                    WHERE usuario = :usuario
                      AND evento = :evento';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->usuario = htmlspecialchars(strip_tags($this->usuario));
        $this->evento = htmlspecialchars(strip_tags($this->evento));

        // Bind data
        $stmt->bindParam(':usuario', $this->usuario);
        $stmt->bindParam(':evento', $this->evento);

        // Execute query
        if ($stmt->execute()) {
            return true;
        }

        // Print error if something goes wrong
        printf("Error: %s.\n", $stmt->error);
        return false;
    }

    public function read()
    {
        $query = 'SELECT i.*, e.nome as nome_evento
		            FROM ' . $this->table . ' i, evento e 
			       WHERE i.evento = e.id
			       ORDER BY data_inscricao DESC';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function read_user()
    {
        $query = 'SELECT i.*, e.nome as nome_evento
		            FROM ' . $this->table . ' i, evento e 
			       WHERE i.evento = e.id
				     AND i.usuario = ?
			       ORDER BY data_inscricao DESC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->usuario);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function read_event()
    {
        $query = 'SELECT *
		            FROM ' . $this->table . '
			       WHERE evento = ?
			       ORDER BY data_inscricao DESC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->evento);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    public function read_id()
    {
        $query = 'SELECT * FROM ' . $this->table . '
                  WHERE usuario = ? AND evento = ? ';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->usuario);
        $stmt->bindParam(2, $this->evento);

        // Execute query
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->usuario = $row['usuario'];
        $this->evento = $row['evento'];
        $this->valor = $row['valor'];
        $this->status = $row['status'];
        $this->data_inscricao = $row['data_inscricao'];
    }
}