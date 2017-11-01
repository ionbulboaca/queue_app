<?php
	require_once('constants.php');

	$conn = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT );

	if(mysqli_connect_errno()) {
	    if($_SESSION["_env"] == "testing"){
	        header('Location: downtime_db.php');
	    }else{
	        header('Location: downtime.php');
	    }
	}

	$DSN = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=utf8";
	
	$OPT = [
	    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	    PDO::ATTR_EMULATE_PREPARES   => false,
	];

	try {
	    $pdo = new PDO($DSN, DB_USER, DB_PASSWORD, $OPT);
	} catch (PDOException $e) {
	    print "Connection failed:: " . $e->getMessage() . "<br/>";
	}
?>