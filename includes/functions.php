<?php
	require_once ("db_connection.php");

	function getAllQueueLists(){
		global $conn;
		
		$queues = array();

		$select = " SELECT
					    q.id,
					    t.Name AS Type,
					    IF(
					        t.id = 1,
					        CONCAT(
					            ct.Title,
					            ' ',
					            q.FirstName,
					            ' ',
					            q.LastName
					        ),
					        IF(
					        	t.id = 2,
					        	q.Name,
					        	t.Name
					        )
					    ) AS Name,
					    s.Name AS Service,
					    TIME_FORMAT(q.queued_at, '%h:%i') AS `Queued AT`
					FROM
					    queue_list q
					LEFT JOIN
					    customer_title ct
					ON
					    q.customer_title_id = ct.id
					LEFT JOIN
					    customer_type t
					ON
					    q.customer_type_id = t.id
					LEFT JOIN
					    services s
					ON
					    q.service_id = s.id
					WHERE
					    DATE(q.queued_at) = CURDATE()";

		$result = mysqli_query($conn,$select);

	    if($result){
	        while($row = mysqli_fetch_assoc($result)){
	            array_push($queues,$row);
	        }
	    }
	    return $queues;
	}

	function getAllServices(){
		global $conn;

		$services = array();

		$select   = "SELECT * FROM services order by id asc";
		$result = mysqli_query($conn,$select);

	    if($result){
	        while($row = mysqli_fetch_assoc($result)){
	            array_push($services,$row);
	        }
	    }
	    return $services;
	}

	function getAllCustomersTitles(){
		global $conn;

		$titles = array();

		$select   = "SELECT * FROM customer_title order by id asc";
		$result = mysqli_query($conn,$select);

	    if($result){
	        while($row = mysqli_fetch_assoc($result)){
	            array_push($titles,$row);
	        }
	    }
	    return $titles;
	}

	function getAllCustomersTypes(){
		global $conn;

		$types  = array();
		$select = "SELECT * FROM customer_type order by id";
		$result = mysqli_query($conn,$select);

	    if($result){
	        while($row = mysqli_fetch_assoc($result)){
	            array_push($types,$row);
	        }
	    }
	    return $types;
	}

	function InsertQueue($var){
		global $conn;

		$sql = "INSERT INTO queue_list(FirstName, LastName, Name, service_id, customer_type_id, customer_title_id) 
				VALUES(?, ?, ?, ?, ?, ?)";
	    $stmt = mysqli_prepare($conn, $sql);

	    mysqli_stmt_bind_param($stmt, 'sssddd', $var['FirstName'], $var['LastName'], $var['Name'], $var['service_id'], $var['type_id'], $var['title_id']);

	    return mysqli_stmt_execute($stmt);
	}
?>