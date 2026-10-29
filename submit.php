<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "contacts";

$conn = new mysqli($servername, $username, $pass, $dbname);
if ($conn->connect_error) {
    die("connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    $sql = "INSERT INTO my_contact (name, email, contact) VALUES ('$name', '$email', '$contact')";

    if ($conn->query($sql) === TRUE) {
        echo "Data Saved";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close;
?>