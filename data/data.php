<?php

declare(strict_types=1);

require_once '../getDB.php';

$query_todoLists = $conn->query("SELECT * FROM $db_name.list");
$ncols = $query_todoLists->rowCount();
echo 'got ' . $ncols . " rows from list table.";


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<title>data</title>
</head>

<body>
	<div class="flex justify-center">
		<form action="./submit.php" method="post" autocomplete="off">
			<input type="text" name="title" id="form_title">
			<button type="submit">Add</button>
		</form>
	</div>

	<div class="flex flex-col justify-center">
		<?php while ($todo = $query_todoLists->fetch(PDO::FETCH_ASSOC)) { ?>
			<div class="justify-between flex w-1/4">
				<div class="justify-self-center">
					<?php echo $todo['Title'] ?>
				</div>
				<div class="justify-self-center flex justify-between">
					<?php $rowId = bin2hex($todo['id']); ?>
					<input class="justify-self-center" type="checkbox" value="<?php echo $todo['done']; ?>">
					<?php echo "<button data-list-id='$rowId' class='btn-del'>Delete</button>"; ?>
				</div>
			</div>
		<?php } ?>
	</div>

	<script>
		$(".btn-del").on("click", function(e) {
			const id = $(this).attr('data-list-id');
console.log(id)
			$.post('./delete.php', {
					id: id
				},
				(data) => {
					window.location.reload();
				}	
			);
		})
	</script>
</body>

</html>