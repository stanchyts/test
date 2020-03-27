<html>
	<head>
		<title>
			Изменить контакт
		</title>
		<meta http-equiv = "Content-Type" content = "text/html; charset = utf-8" />	
		<link rel = "shortcut icon" type = "image/x-icon" href = "../img/f.ico" />
		<link rel = "stylesheet" href = "../css/styles.css" />
	</head>
	<body>
		<div class = "rowsOfBlocksTop">
			<div class = "blockTop">
				<a href = "contacts.php">
					<img src = "../img/log.png" />
				</a>
			</div>
			<div class = "blockTop">
				<p class = "newInformation" style = "margin-left:40%;">
                    Добрый день!
				</p>
			</div>
			<div class = "lastBlockTop">
			</div>
		</div>
		<div class = "mainMenu">
			<ul class = "blocksOfMainMenu">
				<li>
					
				</li>
				<li>
					<a href = "contacts.php">
						Ваши контакты
					</a>
				</li>
				<li>
					<a href = "addNewContact.php">
						Добавить контакт
					</a>
				</li>
			</ul>
		</div>
		<div class = "textAuth">
			<?php
				include 'lib.php';
				$curAdmin = new admin();
				$resultByItemOfContacts = $curAdmin->sqlQueryPrintItemContact($_GET['idOfContact']);
				$itemOfContact  =  $resultByItemOfContacts->fetch_assoc();
			?>
			<form action = "sqlChangeInfoOfContact.php" class="formOfAuth" method = "POST">
			    <input type = "hidden" id = "idByPhones" value = "<?php echo $itemOfContact['listOfIdNumbersByContact'];?>" name = "idByPhones" />
				<input type = "hidden" id = "idByContact" value = "<?php echo $_GET['idOfContact'];?>" name = "idByContact" />
			    <p>
				    Изменить контакт:
			    </p>
			    <input type = "text" id = "nameByContact" value = "<?php echo $itemOfContact['nameByContact'];?>" name = "nameByContact" required />
				<br /><br />
				<input type = "text" id = "lastNameByContact" value = "<?php echo $itemOfContact['lastNameByContact'];?>" name = "lastNameByContact" required />
				<br /><br />
				<input type = "text" id = "listOfNumbersByContact" value = "<?php echo $curAdmin->sqlQueryReversIdToPhone($itemOfContact['listOfIdNumbersByContact']);?>" onkeyup="if(/[^0-9;\s]/.test(this.value))this.value=this.value.replace(/[^0-9;\s]+/g,'')"name = "listOfNumbersByContact" />
				<br /><br />
				<button type = "submit" class = "buttonOfAuth">
					Изменить
				</button>
			</form>
		</div>
		<div class = "rowsOfBlocksDown" style = "clear:both;">
			<div class = "blockDown">
				<p class = "textBlocksDown">
					©Contacts 2020
				</p>
			</div>
			<div class = "blockDown">
				<p class = "textBlocksDown">
					
				</p>
			</div>
			<div class = "lastBlockDown">
				<p class = "textBlocksDown">
					All right<br />reserved
				</p>
			</div>
		</div>
	</body>
</html>