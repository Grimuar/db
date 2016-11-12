<?php

require_once('libs/adodb/adodb.inc.php'); // adodb
require('libs/smarty/JSON.php'); // json
include("libs/query.php");
require('conf/conf.php');
require('conf/func.php');
//конфигурирование

// подключение к первой базе
$db = ADONewConnection('mysql');
$db->debug = false;
$db->Connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
$db->SetFetchMode(ADODB_FETCH_ASSOC);
$db->Execute("SET NAMES utf8");

$Core = new Core();

obr();

if(isset($_GET['act'])){$act=trim($_GET['act']);}
if(isset($_GET['hash'])){$hash=trim($_GET['hash']);}
if(isset($_GET['id'])){$id=trim($_GET['id']);}
if(isset($_GET['phone'])){$phone=trim($_GET['phone']);}


//IF(!check_auth()){$page="admin";}
//собственно скрипты
//$smarty->assign("nav", $nav);
//$smarty->assign("display", $display);

//echo get_crypt("2721"); возвращает хэш
//в ссылке нужен id(ид квитанции), номер телефона с квитаниц и хэш = get_crypt(id)
//пример ссылки -  api.php?act=get_st&hash=6e4d07555a1a378a6dd7870cde07df83&id=2721&phone=89114558845

if(isset($act)&&!empty($act)&&$act=='get_st')
	{		$rs=$db->Execute("SELECT `".TABLE_REPAIRS."`.*,`".TABLE_AGENTS."`.*
                		  FROM `".TABLE_REPAIRS."`
                		  RIGHT JOIN `".TABLE_AGENTS."`
                		  ON `".TABLE_REPAIRS."`.`id_agent`=`".TABLE_AGENTS."`.`id_a`
                		  WHERE `".TABLE_REPAIRS."`.id='".$id."'
						  AND `".TABLE_AGENTS."`.tel='".$phone."'
                		  LIMIT 1");
        if(get_crypt($rs->fields['id'])==$hash)
        	{        		if($rs->_numOfRows>0)
  					{
	  					$out['fio']=$rs->fields['fio'];
	  					$out['device']=$rs->fields['device'];
	  					$out['cur_st']=$rs->fields['cur_st'];
	  					$out['hash']=get_crypt($hash);
  					}
        	}
        else
        	{        			$out['error']="0101";
        	}

	}
else
	{		$out['error']="0102";
	}
echo json_encode($out);













  if($fio=="Ваше имя..." && $tel=="8" && $fail=="Что случилось с Вашей техникой...")
  	{
  		$fio="";
  		$tel="";
  		$fail="";
  		echo json_encode(array("color"=>"color-8",
  							   "msg"=>"Введите, пожайлуста все данные!"));
  		exit();
  	}
  	if($fio=="Grimuar")
  	{
  		echo json_encode(array("color"=>"color-8",
  							   "msg"=>"Сервер посылает Егора нахер=)"));
  		exit();
  	}
  if(!empty($fio)&&!empty($tel)&&!empty($fail))
  	{
  		$rs=$db->Execute("INSERT INTO  `".TABLE_CALLS."` (
								 `fio` ,
								 `tel` ,
								 `fail` ,
								 `ip` ,
								 `date`)
					VALUES ('".$fio."',
							'".$tel."',
							'".$fail."',
							'".getIP()."',
							NOW());");
	  	if($rs)
  			{
  				$json_data=array("sent"=>"1",
  				                 "color"=>"color-7",
  				                 "msg"=>"Спасибо! Мы перезвоним Вам, чтобы уточнить время вызова!");
  			}
  	  	else
  	  		{
  	  			$json_data=array("color"=>"color-8",
  	  							 "msg"=>"Извините! Произошла ошибка. Попробуйте снова =(");
  	  		}
  	 }
   else
   	 {
   	 	$json_data=array("color"=>"color-8",
   	 					 "msg"=>"Извините! Произошла ошибка. Попробуйте снова =(");
   	 }
  	  echo json_encode($json_data);
?>