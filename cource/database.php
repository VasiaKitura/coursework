<?php
	$user = "root";
	$password = "3012005";
	$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
); 
//якщо плануємо обробляти помилку підключення до бази дани;
	try {
		$database = new PDO("mysql:host=localhost; dbname=phpoperator", $user, $password, $options);
	} catch (Exception $e) {
		echo "Підключити базу даних не вдалось: ".$e -> getMessage();
	}

?>

