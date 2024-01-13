<?php
class BookModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getBooks() {
        $stmt = $this->db->query('SELECT * FROM books');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchBooks($search) {
        $stmt = $this->db->prepare('
            SELECT books.*, authors.first_name, authors.last_name 
            FROM books 
            INNER JOIN authors ON books.author_id = authors.id 
            WHERE books.title LIKE :search OR authors.first_name LIKE :search OR authors.last_name LIKE :search
        ');
        $stmt->execute(['search' => '%' . $search . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>