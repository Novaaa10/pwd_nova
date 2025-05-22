<?php
require_once __DIR__ . '/../config/database.php';

class Anime {
    private $conn;
    private $table_name = "anime";

    public $id;
    public $judul;
    public $genre;
    public $studio;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll(){
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_anime asc";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getById($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_anime = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(){
        $query = "INSERT INTO " . $this->table_name . " SET judul=:judul, genre=:genre, studio=:studio";
        $stmt = $this->conn->prepare($query);

        $this->judul = htmlspecialchars(strip_tags($this->judul));
        $this->genre = htmlspecialchars(strip_tags($this->genre));
        $this->studio = htmlspecialchars(strip_tags($this->studio));

        $stmt->bindParam(":judul", $this->judul);
        $stmt->bindParam(":genre", $this->genre);
        $stmt->bindParam(":studio", $this->studio);

        return $stmt->execute();
    }

    public function update(){
        $query = "UPDATE " . $this->table_name . " SET judul=:judul, genre=:genre, studio=:studio WHERE id_anime =:id_anime";
        $stmt = $this->conn->prepare($query);

        $this->judul = htmlspecialchars(strip_tags($this->judul));
        $this->genre = htmlspecialchars(strip_tags($this->genre));
        $this->studio = htmlspecialchars(strip_tags($this->studio));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":judul", $this->judul);
        $stmt->bindParam(":genre", $this->genre);
        $stmt->bindParam(":studio", $this->studio);
        $stmt->bindParam(":id_anime", $this->id);

        return $stmt->execute();
    }

    public function delete($id){
        $query = "DELETE FROM " . $this->table_name . " WHERE id_anime =:id_anime";
        $stmt = $this->conn->prepare($query);
        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(":id_anime", $id);
        return $stmt->execute();
    }
}
