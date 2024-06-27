<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $conn->query("UPDATE books SET archived=1 WHERE book_id='$book_id'");
    header("Location: view_books.php");
}
?>
