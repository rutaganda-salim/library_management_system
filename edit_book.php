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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Edit Book</h2>
        <form method="post" action="">
            <input type="hidden" name="book_id" value="<?php echo $book['book_id']; ?>">

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $book['title']; ?>" required>
            </div>

            <div class="form-group">
                <label for="author_id">Author:</label>
                <select class="form-control" id="author_id" name="author_id">
                    <?php
                    $result = $conn->query("SELECT * FROM authors");
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row['author_id'] == $book['author_id']) ? 'selected' : '';
                        echo "<option value='" . $row['author_id'] . "' $selected>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="ISBN">ISBN:</label>
                <input type="text" class="form-control" id="ISBN" name="ISBN" value="<?php echo $book['ISBN']; ?>" required>
            </div>

            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $book['genre']; ?>">
            </div>

            <div class="form-group">
                <label for="publication_year">Publication Year:</label>
                <input type="text" class="form-control" id="publication_year" name="publication_year" value="<?php echo $book['publication_year']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
