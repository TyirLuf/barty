<?php 
$conn = mysqli_connect('localhost', 'root', '', 'barty_teste');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>
