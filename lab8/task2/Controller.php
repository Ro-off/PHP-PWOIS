<?php
class BookController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        return $this->model->getBooks();
    }

    public function search($search) {
        return $this->model->searchBooks($search);
    }
}
?>