<?php

declare(strict_types=1);

$db_name = 'todolist';
$server = 'localhost';
$uName = 'root';
$pass = "";


try {
	$conn = new PDO("mysql:host=$server;db_name=$db_name", $uName, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo 'connected: getDB at <br>';
} catch (PDOException $e) {
	echo 'connection failed: ' . $e->getMessage();
}
