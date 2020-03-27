<?php
class admin {
	public function __construct() {
		
	}
	public function sqlQueryPrintContacts(){
		$datebase = mysqli_connect('localhost', 'root', '', 'test');
        $res  = $datebase->query("SELECT * FROM `contacts`");
		return $res;
	}
	public function sqlQueryPrintItemContact($idOfContact){
		$datebase = mysqli_connect('localhost', 'root', '', 'test');
        $res  = $datebase->query("SELECT * FROM `contacts` WHERE id=".$idOfContact);
		return $res;
	}
	public function sqlQueryItemNumber($idOfNumber){
		$datebase = mysqli_connect('localhost', 'root', '', 'test');
		$res  =  $datebase->query("SELECT phoneByNumber FROM `numbers` WHERE id = ".$idOfNumber);
		return $res;
	}
	public function sqlQueryAddNewPhone($phoneString){
		$datebase = mysqli_connect('localhost', 'root', '', 'test');
		if($phoneString == "") {
		    return NULL;
		}
		else {
		    $itemsOfPhones = explode(";",$phoneString);
		    $count = 0;
		    if(count($itemsOfPhones) > 20)
			    $count = 20;
		    else
			    $count = count($itemsOfPhones);
		    $idListByNewPhones = "";
		    $i = 0;
		    while($i < $count)
	     	{
		        $datebase->query("INSERT INTO numbers (phoneByNumber) VALUES ('".$itemsOfPhones[$i]."')");
		        $i++;
		    }
		    $i = 0;
		    while($i < $count)
		    {
		        $res = $datebase->query("SELECT id FROM `numbers` WHERE phoneByNumber=".$itemsOfPhones[$i]);
		        $idByNewPhone  =  $res->fetch_assoc();
                $idListByNewPhones = $idListByNewPhones.$idByNewPhone["id"]."&"; 
                $i++;
		    }
            return mb_substr($idListByNewPhones, 0, -1);			
		}
		
	}
	public function sqlQueryAddNewContact($nameByContact,$lastNameByContact,$listByIdPhones){
		$datebase = mysqli_connect('localhost', 'root', '', 'test');
		$datebase->query("INSERT INTO contacts (nameByContact, lastNameByContact, listOfIdNumbersByContact) VALUES ('".$nameByContact."', '".$lastNameByContact."', '".$listByIdPhones."')");
	}
	public function sqlQueryDeleteSelectContact($idOfContact){
		$datebase = mysqli_connect('localhost', 'root', '', 'test');
		$resByContact = $this->sqlQueryPrintItemContact($idOfContact);
		$itemByContact = $resByContact->fetch_assoc();
		$itemsPhonesByItemContact = explode("&",$itemByContact['listOfIdNumbersByContact']);
		$i = 0;
		while ($i < count($itemsPhonesByItemContact)) 
		{ 
			$this->sqlQueryDeleteSelectPhone($itemsPhonesByItemContact[$i]);
			$i++;
		}
		$datebase->query("DELETE FROM contacts WHERE id = '".$idOfContact."'");
	}
	public function sqlQueryDeleteSelectPhone($idByPhone){
		$datebase = mysqli_connect('localhost', 'root', '', 'test');
		$datebase->query("DELETE FROM numbers WHERE id = '".$idByPhone."'");
	}
	public function sqlQueryReversIdToPhone($strOfListId){
		$datebase = mysqli_connect('localhost', 'root', '', 'test');
		$itemsOfPhones = explode("&",$strOfListId);
		$phonesPrintByContact = "";
		$i = 0;
		while($i<count($itemsOfPhones))
		{
			$resByPhones = $this->sqlQueryItemNumber($itemsOfPhones[$i]);
			$itemPhoneOfContact  =  $resByPhones->fetch_assoc();
			$phonesPrintByContact = $phonesPrintByContact.$itemPhoneOfContact["phoneByNumber"].";";
			$i++;
		}
		return mb_substr($phonesPrintByContact, 0, -1);
	}
	public function sqlQueryChangeItemByContact($nameOfContact, $lastNameOfContact, $listByIdOfPhones, $listByPhones, $idByContact) {
		$datebase = mysqli_connect('localhost', 'root', '', 'test');
		if($listByPhones = "")
		{
			$datebase->query("UPDATE contacts SET nameByContact='".$nameOfContact."', lastNameByContact='".$lastNameOfContact."', listOfIdNumbersByContact='' WHERE id='".$idByContact."'");
		    $itemsOfIdByPhones = explode("&",$listByIdOfPhones);
			$i = 0;
			while($i < count($itemsOfIdByPhones))
		    {
		        $this->sqlQueryDeleteSelectPhone($itemsOfIdByPhones[$i]);
		        $i++;
		    }
		}
	    else {
		    $itemsOfPhones = explode(";",$listByPhones);
		    $itemsOfIdByPhones = explode("&",$listByIdOfPhones);
		    $i = 0;
		    while($i < count($itemsOfIdByPhones))
		    {
		        $datebase->query("UPDATE numbers SET phoneByNumber='".$itemsOfPhones[$i]."' WHERE id='".$itemsOfIdByPhones[$i]."'");
		        $i++;
		    }
		    $datebase->query("UPDATE contacts SET nameByContact='".$nameOfContact."', lastNameByContact='".$lastNameOfContact."', listOfIdNumbersByContact='".$listByIdOfPhones."' WHERE id='".$idByContact."'");
		}
	}
}
?>