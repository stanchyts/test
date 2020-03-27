<?php
	include 'lib.php';
	$curAdmin = new admin();
	$curAdmin->sqlQueryChangeItemByContact($_POST["nameByContact"], $_POST["lastNameByContact"], $_POST["idByPhones"], $_POST["listOfNumbersByContact"],$_POST["idByContact"]);	
	header("Location: http://localhost/tz/admin/itemOfContact.php?newChange=1&idOfContact=".$_POST["idByContact"]);
?>