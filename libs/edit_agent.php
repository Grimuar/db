<?php
require_once('adodb/adodb.inc.php'); // adodb
require('libs/JSON.php'); // json
require('conf/conf.php');
//конфигурирование

// подключение к первой базе
$db = ADONewConnection('mysql');
$db->debug = false;
$db->Connect($config['DB_HOST'], $config['DB_LOGIN'], $config['DB_PASS'], $config['DB_NAME']);
$db->SetFetchMode(ADODB_FETCH_ASSOC);
$db->Execute("SET NAMES utf8");

if(isset($_POST['id_a'])){$id_a=$_POST['id_a'];}
if(isset($_POST['fio'])){$fio=$_POST['fio'];}
if(isset($_POST['adress'])){$adress=$_POST['adress'];}
if(isset($_POST['tel'])){$tel=$_POST['tel'];}

$rs=$db->Execute("UPDATE `".$config['TABLE_AGENTS']."` SET `fio`='".$fio."', `adress`='".$adress."', `tel`='".$tel."' WHERE `id_a`='".$id_a."'");
		if($rs)
			{                $rs1=$db->Execute("SELECT * FROM `".$config['TABLE_AGENTS']."` WHERE `id_a`='".$id_a."'");
					if($rs1->_numOfRows>0)
  						  	{
  						  		$json_data=array("fio"=>$rs1->fields['fio'],"adr"=>$rs1->fields['adress'],"tel"=>$rs1->fields['tel'],"msg"=>"Данные успешно сохранены");
  						  	}
  					else
  						{  							$json_data=array("fio"=>$fio,"adr"=>$adress,"tel"=>$tel,"msg"=>"Произошла ошибка выборки, сохранение успешно");
  						}
            }
        else
  						{
  							$json_data=array("fio"=>$_POST['fio'],"adr"=>$_POST['adress'],"tel"=>$_POST['tel'],"msg"=>"Произошла ошибка сохранения");
  						}
  	echo json_encode($json_data);
?>