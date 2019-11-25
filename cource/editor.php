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
    	<style>
body{
	background-color: DarkSlateGray;
	color: MistyRose;
}
.header{
	text-align: center;
}
.newdata-header {
background-color: #5455;
color: white;
/*display: flex;*/
padding: 2px 16px;
}
.newdata-content {
position: relative;
background-color: #fefefe;
margin: auto;
padding: 0;
border: 1px solid #888;
width: 80%;
/*box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);*/
}
.newdata-body {
padding: 2px 16px;
background-color: Lavender;
color: black;
}
.newdata-footer{
background-color: #5455;
color: grey;
display: flex;
padding: 2px 16px;
}
.opadd {	
width: 500px;
/*border-radius: 3px;	*/
}
.subadd {
background-color: #4CAF50;
border: 8px;
color: white;
padding: 5px 10px;
text-align: center;
text-decoration: none;
display: inline-block;
font-size: 16px;
}
</style>
        <header>
           <h1>PHP Operator</h1>
        </header>
<div id="box">
	<div class="box_arr">
			<?php include 'database.php' ?>
			<?php include 'api.php' ?>
	</div>
	<form action="save.php" method="POST">
	<div class="newdata-content">
	<div class="newdata-header">
	<h2>Додати новий оператор</h2>
	</div>
	<form action="index.php" method="GET">
	<div class="newdata-body">
	<div class="group-form">
	<label for = "operatorsel">Тип оператора</label>
	<br>
	<select name = "type_id" id="type">
    <option disabled ="disabled" selected="selected">Выберите тип оператора</option>
	</select>
	</div>
	<br>	
	<div class="group-form">
	<label for = "operator1">Оператор</label>
	<br>
	<input type="text" id = "operator1" name="operator" class="opadd" value="<?php echo $adb['operator']; ?>">
	</div>
	<br>		
	<div class="group-form">
	<label for = "operatorname">Назва оператора</label>
	<br>
	<input type="text" id = "operatorname" name="name_operator" class="opadd" value="<?php echo $adb['name_operator']; ?>;">
	</div>
	<br>
	<div class="group-form">
	<label for = "operatorexamp">Приклад</label>
	<br>
	<input type="text" id = "operatorexamp" name="example" class="opadd" value="<?php echo $adb['example']; ?>">
	</div>
	<br>
	<div class="group-form">
	<label for = "operatorres">Результат</label>
	<br>
	<input type="text" id = "operatorres" name="result_work" class="opadd" value="<?php echo $adb['result_work']; ?>">
	</div>
	<br>	
	<button type="submit" name= "diff" class="subadd">Застосувати</button>		
	</div>	
				<?php 
			$operator = $_GET['$operator'];
			$name_operator = $_GET['$name_operator'];
			$example = $_GET['$example'];
			$result_work = $_GET['$result_work'];
			$abd = GetEditDB($database, $operator, $name_operator, $example, $result_work);
			?>

	</form>
	
	<div class="newdata-footer">
	</div>
</div>
	</form>
</div>
</body>
</html>