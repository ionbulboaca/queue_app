<?php 
	include "../../includes/functions.php";

	if(!empty($_POST)){

		$FirstName = !empty($_POST['FirstName'])?filter_var($_POST['FirstName'], FILTER_SANITIZE_STRING):'';
		$LastName  = !empty($_POST['LastName'])?filter_var($_POST['LastName'], FILTER_SANITIZE_STRING):'';
		$Name      = !empty($_POST['Name'])?filter_var($_POST['Name'], FILTER_SANITIZE_STRING):'';
		$title_id  = !empty($_POST['title'])?filter_var($_POST['title'], FILTER_SANITIZE_NUMBER_INT):'';
		$type_id   = !empty($_POST['type'])?filter_var($_POST['type'], FILTER_SANITIZE_NUMBER_INT):'';
		$service_id= !empty($_POST['service'])?filter_var($_POST['service'], FILTER_SANITIZE_NUMBER_INT):'';

		if($type_id == 1){
			if(InsertQueue(array('FirstName'=>$FirstName,'LastName'=>$LastName,'Name'=>null,'title_id'=>$title_id,'type_id'=>$type_id,'service_id'=>$service_id))){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			if($type_id == 2){
				if(InsertQueue(array('FirstName'=>null,'LastName'=>null,'Name'=>$Name,'title_id'=>null,'type_id'=>$type_id,'service_id'=>$service_id))){
					echo 1;
				}else{
					echo 0;
				}
			}else{
				if(InsertQueue(array('FirstName'=>null,'LastName'=>null,'Name'=>null,'title_id'=>null,'type_id'=>$type_id,'service_id'=>$service_id))){
					echo 1;
				}else{
					echo 0;
				}
			}
		}
	}
?>