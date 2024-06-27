<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query("SELECT books.*, authors.name AS author_name FROM books JOIN authors ON books.author_id = authors.author_id WHERE books.archived = 0");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
</head>
<body>
    <h2>Books List</h2>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Genre</th>
            <th>Publication Year</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author_name']; ?></td>
            <td><?php echo $row['ISBN']; ?></td>
            <td><?php echo $row['genre']; ?></td>
            <td><?php echo $row['publication_year']; ?></td>
            <td>
                <a href="edit_book.php?book_id=<?php echo $row['book_id']; ?>">Edit</a> | 
                <a href="delete_book.php?book_id=<?php echo $row['book_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
