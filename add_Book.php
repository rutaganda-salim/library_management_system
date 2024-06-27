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
        <h2 class="mb-4">Add New Book</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="author_id">Author:</label>
                <select class="form-control" id="author_id" name="author_id">
                    <?php
                    $result = $conn->query("SELECT * FROM authors");
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['author_id'] . "'>" . $row['name'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="new_author">New Author:</label>
                <input type="text" class="form-control" id="new_author" name="new_author">
            </div>

            <div class="form-group">
                <label for="nationality">Nationality (if new author):</label>
                <input type="text" class="form-control" id="nationality" name="nationality">
            </div>

            <div class="form-group">
                <label for="ISBN">ISBN:</label>
                <input type="text" class="form-control" id="ISBN" name="ISBN" required>
            </div>

            <div class="form-group">
                <label for="genre">Genre:</label>
                <input type="text" class="form-control" id="genre" name="genre">
            </div>

            <div class="form-group">
                <label for="publication_year">Publication Year:</label>
                <input type="text" class="form-control" id="publication_year" name="publication_year" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
