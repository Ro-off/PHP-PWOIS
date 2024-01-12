<?php

class Book {
    public $author;
    public $title;
    public $publisher;
    public $pages;
    private $privateField;

    public function set($field, $value) {
        $this->$field = $value;
    }

    public function get($field) {
        return $this->$field;
    }

    public function show() {
        echo "Author: " . $this->author . "\n";
        echo "Title: " . $this->title . "\n";
        echo "Publisher: " . $this->publisher . "\n";
        echo "Pages: " . $this->pages . "\n";
    }

    private function privateMethod() {
        echo "This is a private method.";
    }

    public function search($field, $value) {
        if ($this->$field == $value) {
            echo "Book found!";
        } else {
            echo "Book not found!";
        }
    }

    public function __destruct() {
        echo "Object is deleted!";
    }
}


// Новий інтерфейс, який ми хочемо використовувати
interface Readable
{
    public function read(): array;
}

// Адаптер для класу Book
class BookAdapter implements Readable
{
    private $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function read(): array
    {
        $books = [];
        foreach ($this->book as $book) {
            $books[] = [
                'author' => $book->get("author"),
                'title' => $book->get("title"),
                'publisher' => $book->get("publisher"),
                'pages' => $book->get("pages"),
            ];
        }
        return $books;
    }
}

// Ваш оригінальний код залишається незмінним

$books = array();

$book1 = new Book();
$book1->set("author", "John Doe");
$book1->set("title", "The Book");
$book1->set("publisher", "Publisher A");
$book1->set("pages", 200);
$books[] = $book1;

$book2 = new Book();
$book2->set("author", "Jane Smith");
$book2->set("title", "The Novel");
$book2->set("publisher", "Publisher B");
$book2->set("pages", 300);
$books[] = $book2;

$book3 = new Book();
$book3->set("author", "James Johnson");
$book3->set("title", "The Story");
$book3->set("publisher", "Publisher C");
$book3->set("pages", 150);
$books[] = $book3;

$bookFile = new BookFile("books.csv");
$bookFile->saveBooks($books);

// Створення об'єкта адаптера
$bookAdapter = new BookAdapter($bookFile->loadBooks());

// Використання нового інтерфейсу
$loadedBooks = $bookAdapter->read();
print_r($loadedBooks);

?>
