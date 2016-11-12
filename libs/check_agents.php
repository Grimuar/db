<?php

if(!defined('SECURITY')){die(echo "Crash: 403, get away kid.")}

if(isset($_GET['id'])){$id=$_GET['id'];}

$rs=$db->Execute("SELECT * FROM `".$config['TABLE_AGENTS']."` WHERE `fio`='".$id."'");
				if($rs->_numOfRows>0)
  						  	{
  						  		$json_data=array("fio"=>$rs->fields['fio'],"adr"=>$rs->fields['adress'],"tel"=>$rs->fields['tel']);
  						  	}
  				else
  					{  						echo "Чо та я ничо не нашол(((";
  					}

  	echo json_encode($json_data);
?>