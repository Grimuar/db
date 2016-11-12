<?php
include_once('classes/adodb/adodb.inc.php');
//include('classes/ip_ban.php');
require('classes/smarty/Smarty.class.php');

$db_host="localhost";
$db_login="root";
$db_password="root";
$db_work="prices";

$db = ADONewConnection('mysql');
$db->debug = false;
$db->Connect($db_host, $db_login, $db_password, $db_work);
$db->SetFetchMode(ADODB_FETCH_ASSOC);


// конфигурация шаблонизатора
$smarty = new Smarty();
$smarty->compile_dir = true;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->template_dir = 'inc';
$smarty->compile_dir  = 'temp';


IF(!empty($_GET['act'])){$act=$_GET['act'];}
IF(isset($_GET['query_string'])){$query_string=$_GET['query_string'];}

IF(isset($_GET['id'])){$id=$_GET['id'];}
IF(isset($_GET['action'])){$action=$_GET['action'];}
IF(isset($_GET['config_dir'])){$config_dir=$_GET['config_dir'];}
IF(isset($_GET['config_usd'])){$config_usd=$_GET['config_usd'];}
IF(isset($_GET['config_article'])){$config_article=$_GET['config_article'];}
IF(isset($_GET['config_string'])){$config_string=$_GET['config_string'];}
IF(isset($_GET['config_quantity'])){$config_quantity=$_GET['config_quantity'];}
IF(isset($_GET['config_quantity'])){$config_quantity=$_GET['config_quantity'];}
IF(isset($_GET['config_inprice'])){$config_inprice=$_GET['config_inprice'];}
IF(isset($_GET['config_customerprice'])){$config_customerprice=$_GET['config_customerprice'];}
IF(isset($_GET['config_customer'])){$config_customer=$_GET['config_customer'];}


function getLastPrice($dir)
	{
		    global $db;
		    $files = glob($dir."\*.xls"); // Получаем все xls-файлы из директории
		    $results = array(); // Создаём массив для результатов поиска
		    for ($i = 0; $i < count($files); $i++) {
		      /* Перебираем все полученные файлы */
		     $results[$i] = $files[$i]; // Если хотя бы 1 вхождение найдено, то добавляем файл с количеством вхождений в массив результатов
		    }
		    $max=$results[0];
		  	foreach($results as $f)
		  		{
		      		if($max<filemtime($f))
		    		{
						$max=filemtime($f);
		        		$file=$f;
		    		}
		  		}
	        $hash_dir=md5($dir);
	        $rs=$db->Execute("SELECT * FROM `config` WHERE `const`='".$hash_dir."' LIMIT 1");
		  	if($rs->_numOfRows>0)
		  	  {  
		  	 	if($max!=$rs->fields["value"])
		  	 		{
		  	 			//$db->Execute("UPDATE `config` SET `value`='".$max."' WHERE `id`='".$rs->fields['id']."'");
		  	 			return $file;
		  	 		}
		  	    else
		  	    	{
		  	    	 	$message.="Прайс актуален";
		  	    	}
		  	  }
		  	 else
		  	  {
		  	  	$db->Execute("INSERT INTO `config` (`const`,`value`) VALUES ('".$hash_dir."','".$max."')");
		  	  	$message.="Создание структуры конфигурационной таблицы успешно завершено";
		  	  }
	}

function UpdatePrice($xls,$usd,$string_articul,$string_string,$string_quantity,$string_inprice,$string_customerprice,$customer)
	{
        global $db;
        include_once 'classes/PHPExcel/IOFactory.php';
		$hash_dir=md5($xls);
		$xls=getLastPrice($xls);   //получаем последний прайс
		$filetime=filemtime($xls);  //дата последнего прайса
		$string_price_info=$customer.$filetime;
		$objPHPExcel = PHPExcel_IOFactory::load($xls);
		$objPHPExcel->setActiveSheetIndex(0);
		$aSheet = $objPHPExcel->getActiveSheet();
        $db->Execute("DELETE FROM `format_price` WHERE `customer`='".$customer."'"); //удаление старого прайса
		$array = array();//этот массив будет содержать массивы содержащие в себе значения ячеек каждой строки
		//получим итератор строки и пройдемся по нему циклом
		foreach($aSheet->getRowIterator() as $row){
			//получим итератор ячеек текущей строки
			$cellIterator = $row->getCellIterator();
			//пройдемся циклом по ячейкам строки
			$item = array();//этот массив будет содержать значения каждой отдельной строки
			$col=0;
			unset($columns_str);
            unset($values_str);
			foreach($cellIterator as $cell){
				//заносим значения ячеек одной строки в отдельный массив
				if($string_articul==$col)
					{
					    $art=iconv('utf-8', 'cp1251', $cell->getCalculatedValue());    //артикул
					}
	            if($string_string==$col)
					{
					    $string=iconv('utf-8', 'cp1251', $cell->getCalculatedValue());    //номенклатура
					}
	            if($string_quantity==$col)
					{
					    $quant=iconv('utf-8', 'cp1251', $cell->getCalculatedValue());    //количество
					}
				if($string_inprice==$col)
					{
					    $in_price=round(iconv('utf-8', 'cp1251', $cell->getCalculatedValue()),2);   //вычисление розничной цены
        				if(!empty($usd) && $usd!='0.00')
				        	{
		        		            $in_price=$in_price*$usd;
									$our_price=round(($in_price*1.17),2);									
				        	}
						else
							{
							        $our_price=round(($in_price*1.17),2);
							}
					}
	            if($string_customerprice==$col)
					{
					    $customer_price=round(iconv('utf-8', 'cp1251', $cell->getCalculatedValue()),2);  //рекомендованная цена поставщика
					}
                $col++;
			}
			//заносим массив со значениями ячеек отдельной строки в "общий массв строк"
			$columns_str = substr($columns_str, 0, -1);
        	$values_str = substr($values_str, 0, -1);
        	if($our_price!=0)
        		{
        		     $rs=$db->Execute("INSERT INTO  `prices`.`format_price` (`art` ,
																	`string` ,
																	`quant` ,
																	`in_price` ,
																	`out_customer_price` ,
																	`our_price` ,
																	`price_list`,
																	`customer`)
        									    			VALUES ('".$art."',
        									    					'".$string."',
        									    					'".$quant."',
        									    					'".$in_price."',
        				                                            '".$customer_price."',
        									    				    '".$our_price."',
        									    				    '".$string_price_info."',
        									    				    '".$customer."')");
        		}
		}
		$db->Execute("UPDATE `config` SET `value`='".$filetime."' WHERE `const`='".$hash_dir."'"); //обновление информации о последнем прайсе
		return true;
	}

switch ($act)
{
  default:
        exit(header("Location: ?act=main"));
  break;

  case "main":
  		$i=0;
  		$rs=$db->Execute("SELECT * FROM `config_array`");
        if($rs->_numOfRows>0)
        	{
        	 	while(!$rs->EOF)
        	 		{
        	 			if(getLastPrice($rs->fields['dir'])){$i++;}
        	 			$rs->MoveNext();
        	 		}
        	}
        $smarty->assign("count",$i);
        $smarty->display('main.tpl');
  break;

  case "update_price":
        $rs=$db->Execute("SELECT * FROM `config_array`");
        $count=0;
        if($rs->_numOfRows>0)
        	{
        	 	while(!$rs->EOF)
        	 		{
        	 			if(getLastPrice($rs->fields['dir']))
							{
								if($rs->fields['usd']=='0.00')
									{
										$rs->fields['usd']='';
									}
								if(UpdatePrice($rs->fields['dir'],$rs->fields['usd'],$rs->fields['string_article'],$rs->fields['string_string'],$rs->fields['string_quantity'],$rs->fields['string_inprice'],$rs->fields['string_customerprice'],$rs->fields['customer']));
								{
									$count++;
								}
							}
						
        	 			$rs->MoveNext();
        	 		}
        	}
        	 	echo json_encode("Обновлено прайсов: ".$count);

        //UpdatePrice("C:\Users\Admin\Desktop\Price\COXO\INFO","33","2","3","4","5","","sohoinfo");
        //UpdatePrice("C:\Users\Admin\Desktop\Price\COXO\HOUSEHOLD","33","2","3","4","5","","sohohouse");
        //UpdatePrice("C:\Users\Admin\Desktop\Price\MAXIMUS\INFO","","2","1","3","5","4","maximusinfo");
        //UpdatePrice("C:\Users\Admin\Desktop\Price\MAXIMUS\HOUSEHOLD","","2","1","3","5","4","maximushouse");
       // UpdatePrice("C:\Users\Admin\Desktop\Price\MAXIMUS\AUDIO","","2","1","3","5","4","maximusaudio");
  break;

  case "search":
  		if(isset($query_string)&&!empty($query_string)&&strlen($query_string)>3)
  			{
  			     $query_string=iconv("utf-8", "cp1251", $query_string);
  			     $rs=$db->Execute("SELECT DISTINCT `art`,`string`,`quant`,`in_price`,`out_customer_price`,`our_price`,`customer` FROM `format_price` WHERE `string` LIKE'%".$query_string."%'");
				 if($rs->_numOfRows>0)
				 	{
				 		while(!$rs->EOF)
				 			{
				 			 	$i++;
				 			 	$search_array[$i]['art']=iconv('cp1251', 'utf-8',$rs->fields['art']);
				 			 	$search_array[$i]['str']=iconv('cp1251', 'utf-8',$rs->fields['string']);
				 			 	$search_array[$i]['quant']=iconv('cp1251', 'utf-8',$rs->fields['quant']);
				 			 	$search_array[$i]['in_price']=iconv('cp1251', 'utf-8',$rs->fields['in_price']);
								$search_array[$i]['customer']=iconv('cp1251', 'utf-8',$rs->fields['customer']);
				 			 	$search_array[$i]['out_customer_price']=iconv('cp1251', 'utf-8',$rs->fields['out_customer_price']);
								if($search_array[$i]['out_customer_price']=='0.00')
									{
										$search_array[$i]['out_customer_price']='нет';
									}
				 			 	$search_array[$i]['our_price']=iconv('cp1251', 'utf-8',$rs->fields['our_price']);
				 			 	$rs->MoveNext();
				 			 	//echo $search_array[$i]['str']." ";
				 			}
				 			//print_r($search_array);
				 		echo json_encode($search_array);
				 	}
  			}
  break;

  case "config":
        $rs=$db->Execute("SELECT * FROM `config_array`");
        if(isset($action) && !empty($action))
        	{
        		switch ($action)
				{
		        		case "add":
		                $rs=$db->Execute("INSERT INTO `config_array`   (`usd` ,
																		`dir` ,
																		`string_article` ,
																		`string_string` ,
																		`string_quantity` ,
																		`string_inprice` ,
																		`string_customerprice` ,
																		`customer`)
																		VALUES (
																		'".$config_usd."',
																		'".$config_dir."',
																		'".$config_article."',
																		'".$config_string."',
																		'".$config_quantity."',
																		'".$config_inprice."',
																		'".$config_customerprice."',
																		'".$config_customer."'); ");
						$rs=$db->Execute("DELETE FROM `config` WHERE `const`='".md5($config_dir)."'");
						$rs=$db->Execute("INSERT INTO `config` (`const`,`value`) VALUES ('".md5($config_dir)."','0')");
		        		break;

		        		case "save":
                        $db->Execute("UPDATE `config_array` SET     `usd` = '".$config_usd."',
																	`dir` = '".$config_dir."',
																	`string_article` = '".$config_article."',
																	`string_string` = '".$config_string."',
																	`string_quantity` = '".$config_quantity."',
																	`string_inprice` = '".$config_inprice."',
																	`string_customerprice` = '".$config_customerprice."',
																	`customer` ='".$config_customer."'
																WHERE `id` = '".$id."'");
		        		break;

		        		case "erase":
                        $db->Execute("DELETE FROM `config_array` WHERE `id` = '".$id."'");
		        		break;
        		}
        	}

        $smarty->assign("config_array",$rs);
        $smarty->display('config.tpl');
  break;
}

//$smarty->display('foot.tpl');


?>