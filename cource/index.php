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
<link href="index.css"  rel="stylesheet">
<header>
<div class = "header">
<h1>PHP Operator</h1>
</div>
</header>
<div id="content">
<div class="container-fluid">
<?php include 'database.php' ?>
<?php include 'api.php' ?>
<?php 
$all_db = GetAllDataBase($database);
?>
<button id="addButton" class="buttadd">+ Add</button>
<div id="newdata" class = "ndata">
<div class="newdata-content">
	<div class="newdata-header">
	<h2>Додати новий оператор</h2>
	<span class="close">&times;</span>
	</div>
	<form action="index.php" method="POST">
	<div class="newdata-body">
	<div class="group-form">
	<label for = "operatorsel">Тип оператора <sup>*</sup></label>
	<br>
	<select name = "type_id" id="type">
    <option disabled ="disabled" selected="selected">Выберите тип оператора</option>
    <?php
    	$type_id = GetAllType($database);
    	foreach ($type_id as $key => $value) {
    	echo "<option value=".$value['id'].">".$value['name_type']."</option>";
    }
    ?>
	</select>
	</div>
	<br>	
	<div class="group-form">
	<label for = "operator1">Оператор <sup>*</sup></label>
	<br>
	<input type="text" id = "operator1" name="operator" class="opadd" placeholder="Введіть оператор">
	</div>
	<br>		
	<div class="group-form">
	<label for = "operatorname">Назву оператора <sup>*</sup></label>
	<br>
	<input type="text" id = "operatorname" name="name_operator" class="opadd" placeholder="Введіть назву оператора">
	</div>
	<br>
	<div class="group-form">
	<label for = "operatorexamp">Приклад <sup>*</sup></label>
	<br>
	<input type="text" id = "operatorexamp" name="example" class="opadd" placeholder="Введіть приклад">
	</div>
	<br>
	<div class="group-form">
	<label for = "operatorres">Результат <sup>*</sup></label>
	<br>
	<input type="text" id = "operatorres" name="result_work" class="opadd" placeholder="Введіть Результат">
	</div>
	<br>	
	<button type="submit" name= "ADD" class="subadd">Додати</button>		
	</div>	
	</form>
		<div class="newdata-footer">
	<p><sup>*</sup> Поля, які необхідно заповнити</p>
	</div>
</div>
<?php
	if (isset($_POST['ADD'])) {
		$type_id = $_POST['type_id'];
		$operator = $_POST['operator'];
		$name_operator = $_POST['name_operator'];
		$example = $_POST['example'];
		$result_work = $_POST['result_work'];	
		AddData($database, $type_id, $operator, $name_operator, $example, $result_work);
	}
	?>
</div>
<script>
var newdata = document.getElementById('newdata'),
	newdataToggle = document.getElementById('addButton'),
	newdataClose = document.querySelector('.close');

	newdataToggle.onclick = function() {
		newdata.style.display="block";
	}
	newdataClose.onclick = function() {
		newdata.style.display="none";
	}
</script>
		<a class="btnadd" href="add.php">+ Add</a>

<table class="table table-bordered">
<tr>
	<td><strong>Типи операторів</strong></td>
	<td><strong>Оператор</strong></td>
	<td><strong>Назви операторів</strong></td>
	<td><strong>Приклад</strong></td>
	<td><strong>Результат</strong></td>
	<td><strong>Редагувати</strong></td>
	<td><strong>Видалити</strong></td>	
</tr>
<?php foreach ($all_db as $adb) { ?>
	<tr>
		<td><?php echo $adb['name_type']; ?></td>
		<td><?php echo $adb['operator']; ?></td>
		<td><?php echo $adb['name_operator']; ?></td>
		<td><?php echo $adb['example']; ?></td>
		<td><?php echo $adb['result_work']; ?></td>
		<td>
<!-- 			<button class="editd" href="editor.php?id=<?php echo $adb['id'];?>">Editor</button> -->			
            <a class="btn btn-success btn-sm" href="editor.php?id=<?php echo $adb['id'];?>">Editor</a>  
		</td>
		<td>
			<a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $adb['id'];?>">Delete</a>
		</td>
		</tr>
<?php } ?>
</table>
</div>
</div>
</body>
</html>


