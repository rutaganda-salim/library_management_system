<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Password: " . htmlspecialchars($password);
}
?>
