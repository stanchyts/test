<?php
    include 'lib.php';
	$curAdmin = new admin();
    $curAdmin->sqlQueryDeleteSelectContact($_GET["idOfContact"]);
	header("Location: http://localhost/tz/admin/contacts.php?newDelete=1");
?>