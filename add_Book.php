<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author_id = $_POST['author_id'];
    $ISBN = $_POST['ISBN'];
    $genre = $_POST['genre'];
    $publication_year = $_POST['publication_year'];

    // Check if new author is being added
    if (isset($_POST['new_author']) && !empty($_POST['new_author'])) {
        $new_author = $_POST['new_author'];
        $nationality = $_POST['nationality'];
        $conn->query("INSERT INTO authors (name, nationality) VALUES ('$new_author', '$nationality')");
        $author_id = $conn->insert_id;
    }

    $sql = "INSERT INTO books (title, author_id, ISBN, genre, publication_year) VALUES ('$title', '$author_id', '$ISBN', '$genre', '$publication_year')";
    $conn->query($sql);

    header("Location: view_books.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>
    <h2>Add New Book</h2>
    <form method="post" action="">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="author_id">Author:</label>
        <select name="author_id">
            <?php
            $result = $conn->query("SELECT * FROM authors");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['author_id'] . "'>" . $row['name'] . "</option>";
            }
            ?>
        </select>
        <br>

        <label for="new_author">New Author:</label>
        <input type="text" name="new_author"><br>

        <label for="nationality">Nationality (if new author):</label>
        <input type="text" name="nationality"><br>

        <label for="ISBN">ISBN:</label>
        <input type="text" name="ISBN" required><br>

        <label for="genre">Genre:</label>
        <input type="text" name="genre"><br>

        <label for="publication_year">Publication Year:</label>
        <input type="text" name="publication_year" required><br>

        <input type="submit" value="Add Book">
    </form>
</body>
</html>
