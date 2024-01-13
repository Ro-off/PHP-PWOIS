<?php
class BookView {
    private $controller;

    public function __construct($controller) {
        $this->controller = $controller;
    }

    public function displayBooks() {
        $books = $this->controller->index();
        foreach ($books as $book) {
             echo $book['title'] . ' by ' . $book['author'] . '<br>';
        }
    }

    public function searchBooks($search) {
        $books = $this->controller->search($search);
        foreach ($books as $book) {
            echo $book['title'] . ' by ' . $book['author'] . '<br>';
        }
    }
}
?>