<?php
    include 'lib.php';
	$curAdmin = new admin();
	echo "1".$_POST["numbersOfContact"]."2";
	$listByIdPhones = $curAdmin->sqlQueryAddNewPhone($_POST["numbersOfContact"]);
	$curAdmin->sqlQueryAddNewContact($_POST["nameOfContact"],$_POST["lastNameOfContact"], $listByIdPhones);
	//header("Location: http://localhost/tz/admin/contacts.php?newContact=1");
?>