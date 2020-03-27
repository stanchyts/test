<html>
	<head>
		<title>
			Добавить новый контакт
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
			<form action = "sqlAddNewContact.php" id="formNewContact" class="formOfAuth" method = "POST" >
				<p>
				    Добавить контакт:
				</p>
				<input type = "text" id = "nameOfContact" placeholder = "Введите имя ..." name = "nameOfContact" required />
				<br /><br />
				<input type = "text" id = "lastNameOfContact" placeholder = "Введите фамилию..." name = "lastNameOfContact" required />
				<br /><br />
				<input type = "text" id = "numbersOfContact" value="" onkeyup="if(/[^0-9;\s]/.test(this.value))this.value=this.value.replace(/[^0-9;\s]+/g,'')" placeholder = "Введите телефон..." name = "numbersOfContact" class="auth" />
				<br /><br />
				<button type = "submit" class = "buttonOfAuth">
					Добавить
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