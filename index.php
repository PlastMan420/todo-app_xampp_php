<?php
require 'getDB.php';
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<!-- Always force latest IE rendering engine or request Chrome Frame -->
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Use title if it's in the page YAML frontmatter -->
	<title>Welcome to XAMPP</title>

	<meta name="description"
		content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
	<meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />

	<script src="https://cdn.tailwindcss.com"></script>

	<link href="/dashboard/images/favicon.png" rel="icon" type="image/png" />


</head>

<body class="index">
	Index
	<ul>
	<li><a href="/phpmyadmin/">phpMyAdmin</a></li>
	<li><a href="./phpinfo.php">henlo</a></li>
	<li><a href="./data/data.php">Go to todo app</a> <---</li>
	</ul>	
</body>

</html>

<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	//header('Location: '.$uri.'/dashboard/');
	exit;
?>
