<?php

$config = array(
	'username' => 'root',
	'password' => '1234'
);

function connect($config)
{
	try{
		$conn = new PDO('mysql:host=localhost;dbname=amazon',
						$config['username'],
						$config['password']);

		$conn->setAttribute(PDO::ATTR_ERRMODE, 	PDO::ERRMODE_EXCEPTION);
		return $conn;
	}catch(Exception $e) {
		return false;
	}
}

function get($tableName, $conn)
{	
	try {	
		$result = $conn->query("SELECT * FROM $tableName");
		return ($result->rowCount() > 0)
		? $result
		: false;
	} catch (Exception $e) {
		return false;
	}

	
}

function query($query, $bindings, $conn)
{
	$result = $conn->prepare($query);
	$result->execute($bindings);
	$result = $result->fetchAll();
	return $result ? $result : false;
}