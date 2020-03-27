<html>
	<head>
		<title>
			Телефонная книга
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
					if(isset($_GET['newContact']))
					{
				?>
						<p class = "newInformation" style = "margin-left:30%;">
							Вы успешно добавили новый контакт!
						</p>
				<?php
					}
					if(isset($_GET['newDelete']))
					{
				?>
				        <p class = "newInformation" style = "margin-left:30%;">
							Вы успешно удалили контакт!
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
				$resultByContacts = $curAdmin->sqlQueryPrintContacts();
			    while ($itemsOfContacts = $resultByContacts->fetch_assoc())
				{
			?>
					<div class = "itemOfProduct">
						<div class = "mainOfProduct">
							<h3>
								<?php 
								    echo $itemsOfContacts['nameByContact']." ".$itemsOfContacts['lastNameByContact'];
							    ?>
							</h3>
							<span class = "priceOfProduct">
							    <?php 
								    if($itemsOfContacts['listOfIdNumbersByContact'] == "")
										echo " ";
									else {
							            $itemsOfContactsPhones = explode("&",$itemsOfContacts['listOfIdNumbersByContact']);
							            $i = 0;
							            while ($i < count($itemsOfContactsPhones)) 
							            { 
								            $resultByContactsPhones = $curAdmin->sqlQueryItemNumber($itemsOfContactsPhones[$i]);
										    $phonesByContact  =  $resultByContactsPhones->fetch_assoc();
										    echo $phonesByContact["phoneByNumber"]."; ";
								            $i++;
							            }
									}
							    ?>
							</span>
							<a href = "<?php echo "itemOfContact.php?idOfContact=".$itemsOfContacts['id']; ?>" class = "buttonOfProduct">
								Просмотреть
							</a>
						</div>
					</div>
			<?php
				}
			?>
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