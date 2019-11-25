<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    </head>
    <body>
        <header>
        	<div class = "header">
        		<h1>PHP Operator</h1>
        	</div>
        </header>
	<div id="content">
			<div id="content">
		<div class="container-fluid">
			<?php include 'database.php'; ?>
			<?php include 'api.php'; ?>
			<?php
				$id = $_GET['id'];
				if($id) {
					deleteData($database, $id);	
					echo "<h3>Оператор видалений</h3>";
				} else {
					echo "<h1>Error</h1>";
					exit();
				}
			?>
		</div>
		<a href="index.php">Перейти на головну сторінку</a>
	</div>
</body>
</html>