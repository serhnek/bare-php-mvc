<?php

namespace Model;

use Dto\FormDto;

class FormModel
{
    protected \PDO $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Insert a new value row into the database
     *
     * @param $value
     * @return string Last inserted identifier from the database
     * @throws \Exception
     */
    public function insert(FormDto $dto): string
    {
        // use a prepared statement to prevent SQL injection
        $stmt = $this->db->prepare("INSERT INTO data (id, content) VALUES (:id, :content)");
        $stmt->execute([
            ':id' => bin2hex(random_bytes(16)), // a random hexadecimal identifier
            ':content' => $dto->textArea,
        ]);
        return $this->db->lastInsertId();
    }

    /**
     * Select a value from the database by identifier
     *
     * @param $id
     * @return string
     */
    public function select($id): FormDto
    {
        // use a prepared statement to prevent SQL injection
        $stmt = $this->db->prepare("SELECT content FROM data WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return new FormDto($stmt->fetchColumn());
    }
}
