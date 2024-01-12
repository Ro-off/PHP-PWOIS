<?php

interface CloneableBook
{
    public function cloneBook(): self;
}

class Book implements CloneableBook
{
    private $author;
    private $title;
    private $publisher;
    private $pages;

    public function __construct($author, $title, $publisher, $pages)
    {
        $this->author = $author;
        $this->title = $title;
        $this->publisher = $publisher;
        $this->pages = $pages;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function getPages()
    {
        return $this->pages;
    }

    public function cloneBook(): self
    {
        return new self($this->author, $this->title, $this->publisher, $this->pages);
    }

    public function show()
    {
        echo "Author: " . $this->author . "\n";
        echo "Title: " . $this->title . "\n";
        echo "Publisher: " . $this->publisher . "\n";
        echo "Pages: " . $this->pages . "\n";
    }

    private function privateMethod()
    {
        echo "This is a private method.";
    }

    public function search($field, $value)
    {
        if ($this->$field == $value) {
            echo "Book found!";
        } else {
            echo "Book not found!";
        }
    }

    public function __destruct()
    {
        echo "Object is deleted!";
    }
}

class BookFile
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function saveBooks($books)
    {
        $file = fopen($this->filePath, 'w');
        foreach ($books as $book) {
            fputcsv($file, [$book->getAuthor(), $book->getTitle(), $book->getPublisher(), $book->getPages()]);
        }
        fclose($file);
    }

    public function loadBooks()
    {
        $books = [];
        if (file_exists($this->filePath)) {
            $file = fopen($this->filePath, 'r');
            while (($data = fgetcsv($file)) !== false) {
                $book = new Book($data[0], $data[1], $data[2], $data[3]);
                $books[] = $book;
            }
            fclose($file);
        }
        return $books;
    }
}

$books = [];

$book1 = new Book("John Doe", "The Book", "Publisher A", 200);
$books[] = $book1;

$book2 = new Book("Jane Smith", "The Novel", "Publisher B", 300);
$books[] = $book2;

$book3 = new Book("James Johnson", "The Story", "Publisher C", 150);
$books[] = $book3;

$bookFile = new BookFile("books.csv");
$bookFile->saveBooks($books);

$loadedBooks = $bookFile->loadBooks();

// Приклад використання клонування
$clonedBook = $loadedBooks[0]->cloneBook();
echo "Original Book:\n";
$loadedBooks[0]->show();

echo "\nCloned Book:\n";
$clonedBook->show();
?>
