<?php

declare(strict_types=1);

require_once '../getDB.php';

echo $_POST['id'];

if (isset($_POST['id'])) {
	require '../getDB.php';

	$id = hex2bin($_POST['id']);

	if (empty($id)) {
		echo 0;
	} else {
		$stmt = $conn->prepare("DELETE FROM $db_name.list WHERE id=?");
		$res = $stmt->execute([$id]);

		header("Refresh: 0;"); 

		$conn = null;
		exit();
	}
}
