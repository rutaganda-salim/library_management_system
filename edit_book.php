<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $author_id = $_POST['author_id'];
    $ISBN = $_POST['ISBN'];
    $genre = $_POST['genre'];
    $publication_year = $_POST['publication_year'];

    $sql = "UPDATE books SET title='$title', author_id='$author_id', ISBN='$ISBN', genre='$genre', publication_year='$publication_year' WHERE book_id='$book_id'";
    $conn->query($sql);
    header("Location: view_books.php");
}

if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    $result = $conn->query("SELECT * FROM books WHERE book_id='$book_id'");
    $book = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
    <h2>Edit Book</h2>
    <form method="post" action="">
        <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">

        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $book['title']; ?>" required><br>

        <label for="author_id">Author:</label>
        <select name="author_id">
            <?php
            $result = $conn->query("SELECT * FROM authors");
            while ($row = $result->fetch_assoc()) {
                $selected = ($row['author_id'] == $book['author_id']) ? 'selected' : '';
                echo "<option value='" . $row['author_id'] . "' $selected>" . $row['name'] . "</option>";
            }
            ?>
        </select>
        <br>

        <label for="ISBN">ISBN:</label>
        <input type="text" name="ISBN" value="<?php echo $book['ISBN']; ?>" required><br>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" value="<?php echo $book['genre']; ?>"><br>

        <label for="publication_year">Publication Year:</label>
        <input type="text" name="publication_year" value="<?php echo $book['publication_year']; ?>" required><br>

        <input type="submit" value="Update Book">
    </form>
</body>
</html>
