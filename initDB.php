<?php
#turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('config.php');
echo "Loaded Host: " . $host;

$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";


try{
	$db = new PDO($conn_string, $username, $password);
	echo " Connected";
	
	$query = "create table if not exists `TestUsers`(
		`id` int auto_increment not null, 
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	
	$stmt = $db->prepare($query);
	$r = $stmt->execute();
	echo "<br>" . $r . "<br>";
	$insertTest = "INSERT INTO `joa23`.`TestUsers` (`id`, `username`, `pin`) VALUES ('1', 'username', '0');";
    	$stmt = $db->prepare($insertTest);
    	$r = $stmt->execute();
	


	$insert_query = "INSERT INTO `TestUsers`(`username`, `pin`) VALUES (':username', :pin)";
	$stmt = $db->prepare($insert_query);
	$r = $stmt->execute();
	 
	$user = "MaryJane";
	$pin = 5678;
	$r = $stmt->execute();
	
	$select_query = "select * from `TestUsers` where username = :username";

	$result = $stmt->fetch();
	echo "<br><pre>" . var_export($result, true) . "</pre><br>";

}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}


?>
