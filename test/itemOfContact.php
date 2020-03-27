<html>
	<head>
		<title>
			Просмотр контакта
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
				<?php
					if(isset($_GET['newChange']))
					{
				?>
						<p class = "newInformation" style = "margin-left:30%;">
							Вы успешно изменили контакт!
						</p>
				<?php
					}
				?>
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
		<div class = "rowsOfBlocksItem">
			<?php
			    include 'lib.php';
				$curAdmin = new admin();
				$resultByItemOfContacts = $curAdmin->sqlQueryPrintItemContact($_GET['idOfContact']);
				$itemOfContact  =  $resultByItemOfContacts->fetch_assoc();
			?>
			<div class = "itemOfProduct" style = "margin-left:35%;">
				<div class = "mainOfProduct" >
					<h3>
						<?php echo $itemOfContact['nameByContact'];?>
					</h3>
					<p>
						<?php echo $itemOfContact['lastNameByContact'];?>
					</p>
					<span class = "priceOfProduct">
						<?php 
							$itemsPhonesByItemContact = explode("&",$itemOfContact['listOfIdNumbersByContact']);
							$i = 0;
							while ($i < count($itemsPhonesByItemContact)) 
							{ 
								$resultByContactsPhones = $curAdmin->sqlQueryItemNumber($itemsPhonesByItemContact[$i]);
							    $phonesByItemContact  =  $resultByContactsPhones->fetch_assoc();
							    echo $phonesByItemContact["phoneByNumber"]."; ";
								$i++;
							}
						?>
					</span>
					<a href = "<?php echo 'changeInfoOfContact.php?idOfContact='.$itemOfContact['id']?>" class = "buttonOfProduct">
						Изменить
					</a>
					<a href = "<?php echo 'deleteSelectItemOfContact.php?idOfContact='.$itemOfContact['id']?>" class = "buttonOfProduct">
						Удалить
					</a>
				</div>
			</div>
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