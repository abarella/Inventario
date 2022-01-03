<?php

$servername = "localhost";
$username = "abjinfo_invusr";
$password = "ABj*010359";
$dbname = "abjinfo_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>
