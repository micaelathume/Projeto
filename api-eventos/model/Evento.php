<?php


class Evento
{

    // DB Stuff
    private $conn;
    private $table = 'evento';

    // Properties
    private $id; 
    private $nome;
    private $status;
    private $local;
    private $data;
    private $lotacao;
    private $valor_inscricao;
    private $duracao;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create()
    {
        $query = $query = 'INSERT INTO ' . $this->table .
                          ' SET nome = :nome, status = :status, local = :local, data = :data,
                                locatao = :lotacao, valor_inscricao= :valor_inscricao, duracao = :duracao';

        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->local = htmlspecialchars(strip_tags($this->local));
        $this->data = htmlspecialchars(strip_tags($this->data));
        $this->lotacao = htmlspecialchars(strip_tags($this->lotacao));
        $this->valor_inscricao = htmlspecialchars(strip_tags($this->valor_inscricao));
        $this->duracao = htmlspecialchars(strip_tags($this->duracao));

        // Bind data
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':local', $this->local);
        $stmt->bindParam(':data', $this->data);
        $stmt->bindParam(':lotacao', $this->lotacao);
        $stmt->bindParam(':valor_inscricao', $this->valor_inscricao);
        $stmt->bindParam(':duracao', $this->duracao);

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
                    SET status = :status, local = :local, data = :data, lotacao = :lotacao, 
                        valor_inscricao = :valor_inscricao, duracao = :duracao
                    WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->local = htmlspecialchars(strip_tags($this->local));
        $this->data = htmlspecialchars(strip_tags($this->data));
        $this->lotacao = htmlspecialchars(strip_tags($this->lotacao));
        $this->valor_inscricao = htmlspecialchars(strip_tags($this->valor_inscricao));
        $this->duracao = htmlspecialchars(strip_tags($this->duracao));

        // Bind data
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':local', $this->local);
        $stmt->bindParam(':data', $this->data);
        $stmt->bindParam(':lotacao', $this->lotacao);
        $stmt->bindParam(':valor_inscricao', $this->valor_inscricao);
        $stmt->bindParam(':duracao', $this->duracao);

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
		            FROM ' . $this->table . ' 
			       ORDER BY data DESC';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function read_id() {
        $query = 'SELECT * FROM ' . $this->table . '
                  WHERE id = ?';

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
        $this->status = $row['status'];
        $this->local = $row['local'];
        $this->data = $row['data'];
        $this->lotacao = $row['lotacao'];
        $this->valor_inscricao = $row['valor_inscricao'];
        $this->duracao = $row['duracao'];
    }

}