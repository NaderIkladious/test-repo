<?php
require 'functions.php';

$conn = connect($config);

if ( $conn ) {
	$users = get('USERS', $conn);

	
} else {
	die('Could not Connect');
}
?>
<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	if ($users){
		foreach ($users as $user) {
		echo "<li>{$user['username']}</li>";
		}
	}else {
		echo 'No Rows Returned.';
	}
?>
</body>
</html>