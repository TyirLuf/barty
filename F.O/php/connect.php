<?php 
$con = mysqli_connect('localhost', 'root', '', 'barty_teste');

if ($con->connect_error) {
    die("Falha na conexão: " . $con->connect_error);
}
?>