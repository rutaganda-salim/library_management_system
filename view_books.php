<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling search functionality
$search = "";
$sql = "SELECT books.*, authors.name AS author_name 
        FROM books 
        JOIN authors ON books.author_id = authors.author_id 
        WHERE books.archived = 0";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql .= " AND (books.title LIKE '%$search%' OR authors.name LIKE '%$search%' OR books.ISBN LIKE '%$search%' OR books.genre LIKE '%$search%' OR books.publication_year LIKE '%$search%')";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .mt-4 {
            margin-top: 1.5rem !important;
        }
        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4 mb-4">Books List</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <form class="form-inline">
                    <div class="form-group mb-2">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" class="form-control" id="search" name="search" placeholder="Search..." value="<?php echo htmlspecialchars($search); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary ml-2 mb-2">Search</button>
                </form>
            </div>
            <div class="col-md-6 text-right">
                <a href="add_book.php" class="btn btn-success mb-2">Add New Book</a>
            </div>
        </div>

        <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>ISBN</th>
                    <th>Genre</th>
                    <th>Publication Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['author_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['ISBN']); ?></td>
                    <td><?php echo htmlspecialchars($row['genre']); ?></td>
                    <td><?php echo htmlspecialchars($row['publication_year']); ?></td>
                    <td>
                        <a href="edit_book.php?book_id=<?php echo $row['book_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="archive_book.php?book_id=<?php echo $row['book_id']; ?>" class="btn btn-warning btn-sm ml-1" onclick="return confirm('Are you sure you want to archive this book?')">Archive</a>
                        <!-- Include Delete option if needed -->
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
        <div class="alert alert-info">No books found matching your search criteria.</div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
