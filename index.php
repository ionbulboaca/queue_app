<?php
	include "includes/functions.php";
	$services = getAllServices();
	$titles   = getAllCustomersTitles();
	$types    = getAllCustomersTypes();
?>

<?php include "template/header.php"; ?>

<?php include "template/content.php";?>

<?php include "template/footer.php";?>


