<form action="index.php" method="get" style="background-color: none; color: #fff; padding: 10px; border-radius: 20px;">
    <input type="text" name="search" placeholder="Search for books or authors" style="background-color: #555; color: #fff; border: none; padding: 5px; border-radius: 20px;">
    <input type="submit" value="Search" style="background-color: #777; color: #fff; border: none; padding: 5px; border-radius: 20px;">
</form>
<br>

<?php
include_once("task2/Model.php");
include_once("task2/View.php");
include_once("task2/Controller.php");

$db = new PDO('mysql:host=localhost;dbname=books_db', 'user12', '121212aA');

$model = new BookModel($db);
$controller = new BookController($model);
$view = new BookView($controller);


// If a search term is provided, display the search results
if (isset($_GET['search'])) {
    $view->searchBooks($_GET['search']);
}
// Otherwise, display all books
else {
    $view->displayBooks();
}
?>