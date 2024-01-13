<?php

abstract class BookHandler {
    protected $successor;

    public function setSuccessor(BookHandler $successor) {
        $this->successor = $successor;
    }

    abstract public function handleRequest($book);
}

class AuthorHandler extends BookHandler {
    public function handleRequest($book) {
        if ($book->get("author") == "John Doe") {
            echo "Book found by author!";
        } elseif ($this->successor != null) {
            $this->successor->handleRequest($book);
        } else {
            echo "Book not found!";
        }
    }
}

class TitleHandler extends BookHandler {
    public function handleRequest($book) {
        if ($book->get("title") == "The Novel") {
            echo "Book found by title!";
        } elseif ($this->successor != null) {
            $this->successor->handleRequest($book);
        } else {
            echo "Book not found!";
        }
    }
}

class PublisherHandler extends BookHandler {
    public function handleRequest($book) {
        if ($book->get("publisher") == "Publisher C") {
            echo "Book found by publisher!";
        } elseif ($this->successor != null) {
            $this->successor->handleRequest($book);
        } else {
            echo "Book not found!";
        }
    }
}

class Book {
    private $attributes = [];

    public function set($key, $value) {
        $this->attributes[$key] = $value;
    }

    public function get($key) {
        return $this->attributes[$key] ?? null;
    }
}

$authorHandler = new AuthorHandler();
$titleHandler = new TitleHandler();
$publisherHandler = new PublisherHandler();

$authorHandler->setSuccessor($titleHandler);
$titleHandler->setSuccessor($publisherHandler);

$book = new Book();
$book->set("author", "John Doe");
$book->set("title", "The Novel");
$book->set("publisher", "Publisher C");
$book->set("pages", 300);

$authorHandler->handleRequest($book);
?>
