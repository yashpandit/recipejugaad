
<?php
$conn = new mysqli("localhost", "root", "","Recipe_Jugad");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>