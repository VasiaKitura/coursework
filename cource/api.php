<?php  

function GetAllDataBase($database) {
	$sql = "SELECT * FROM operator
	          INNER JOIN type_operator ON operator.type_id=type_operator.id 
	          INNER JOIN result ON operator.id=result.id";
	$result  = array();

	$statement = $database->prepare($sql);
	$statement->execute();

	while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		$result[$row['id']] = $row;
	}
	return $result;	
}
function deleteData($database, $id) {	
	$sql ="DELETE FROM operator WHERE id = :id";
	// $sql1 ="DELETE FROM operator WHERE id = :id";	
	$statement = $database->prepare($sql);
	$statement->bindValue(":id", $id, PDO::PARAM_INT);
	// $statement = $database->prepare($sql1);
	// $statement->bindValue(":id", $id2, PDO::PARAM_INT);
	$statement->execute();
}
function  GetAllType($database) {
	$sql = "SELECT * FROM type_operator";

	$res = array();
	$statement = $database->prepare($sql);
	$statement->execute();

	while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
		$res[$row['id']] = $row;
	}
	return $res;	
}
function AddData($database, $type_id, $operator, $name_operator,$example, $result_work){
	$sql = "INSERT INTO operator(type_id, operator, name_operator)
			Values(:type_id, :operator, :name_operator)";

	$sql1 = "INSERT INTO result(result_work,example)
			 Values(:result_work, :example)";
	$statement = $database->prepare($sql);
	$statement->bindParam(":type_id", $type_id, PDO::PARAM_INT);
	$statement->bindParam(":operator", $operator, PDO::PARAM_STR);
	$statement->bindParam(":name_operator", $name_operator, PDO::PARAM_STR);

	$statement = $database->prepare($sql1);
	$statement->bindParam(":result_work", $result_work, PDO::PARAM_STR);
	$statement->bindParam(":example", $example, PDO::PARAM_STR);

	$statement->execute();
	// $statement1->execute();
}

// function GetEditDB($database, $operator, $name_operator, $example, $result_work) {
// 	$sql = "SELECT * FROM operator WHERE id = :id";

// 	$statement = $database->prepare($sql);
// 	$statement->bindParam(":operator", $operator, PDO::PARAM_STR);
// 	$statement->bindParam(":name_operator", $name_operator, PDO::PARAM_STR);
// 	$statement->bindParam(":example", $example, PDO::PARAM_STR);
// 	$statement->bindValue(":result_work", $result_work, PDO::PARAM_STR);
// 	$statement->execute();


// }
function GetSearch($database, $param){
	$sql = "SELECT * FROM operator
	        INNER JOIN type_operator ON operator.type_id=type_operator.id 
	        INNER JOIN result ON operator.result_id=result.id WHERE name_type LIKE :param OR operator LIKE :param OR 
	        name_operator LIKE :param ";
	$statement = $database->prepare($sql);
	$statement->bindValue(':param', '%'.$param.'%', PDO::PARAM_STR); 
	$statement->execute();       
}
?>
