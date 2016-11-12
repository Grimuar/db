<?php
date_default_timezone_set('UTC');
function today() // сегодня =)
   {
    $day=date("d");
    $year=date("Y");
    $hour=date("H");
    $min=date("i");
    $sec=date("s");
    $mon=date("m");
    switch ($mon)
      {
       case 1:$month='января';break;
       case 2:$month='февраля';break;
       case 3:$month='марта';break;
       case 4:$month='апреля';break;
       case 5:$month='мая';break;
       case 6:$month='июня';break;
       case 7:$month='июля';break;
       case 8:$month='августа';break;
       case 9:$month='сентября';break;
       case 10:$month='октября';break;
       case 11:$month='ноября';break;
       case 12:$month='декабря';break;
       default:$month=' ';
      }
    $date=$day." ".$month." ".$year;
    return $date;
  }

function check_auth () //проверка на аутентификацию
{
        global $smarty, $db, $table_users;
        if (isset($_SESSION["sess_login"]) && isset($_SESSION["sess_pass"]))  // проверка существования сессии
          {

                $rs=$db->Execute("SELECT `rel`, `rep` FROM `".$table_users."` WHERE `id`=1 AND `type`=1");

                $sess_login=$_SESSION["sess_login"];
                $sess_pass=$_SESSION["sess_pass"];
                if($sess_login==$rs->fields['rel'] && $sess_pass==$rs->fields['rep'])
                  {
                        return "1";
                  }
                else
                  {
                        return "0";
                  }
          }
        else
          {
                return "0";
          }
}


function getPreviewText($text, $maxwords, $maxchar) //для новостей
{
        $text  = trim($text);
        $words = split(' ', $text);
        $text='';
        foreach ($words as $word){
                        if (mb_strlen($text.' '.$word) < $maxchar)
                        {$text.=' '.$word; }
                                else
                        {$text.='...';break;};
         }
 return $text;
}

function result($arr)   // обработка данных с формы
{
   foreach($arr as $k=>$v)
   {
       if (is_array($v))
       {
                     if (!get_magic_quotes_gpc()){$v = addslashes($v);}
                     result($v);
           $arr[$k] = $v;
       }
       else
       {
                     if (!get_magic_quotes_gpc()){$v = addslashes($v);}
           $arr[$k] = htmlspecialchars($v,ENT_NOQUOTES, "Windows-1251");
       }
   }
}

function obr()     // обработка данных $_POST $_GET $COOKIE
{
       result($_POST);
       result($_GET);
       result($_COOKIE);
}

function check_id($value)     // доп.обработка id
{
         $value=trim($value);
         if($value!=(int)$value)
            {
                $value=(int)$value;
            }
         $value=intval($value);
         return $value;
}

function check($value)     // доп.обработка id
{
         $value=trim(strip_tags($value));
         return $value;
}

function check_str($value)     // доп.обработка str
{
         $value=trim($value);
         if($value!=(string)$value)
            {
                $value=(string)$value;
            }
         return $value;
}

function redir_back() // генерация ссылки для возврата
{
         global $smarty;
        list($url,$zapros)=explode("?",getenv("HTTP_REFERER"));
//        $curent_url=getenv("QUERY_STRING");
        exit(header("Location: ?".$zapros));
}

function redir()
{
        list($url,$zapros)=explode("?",getenv("HTTP_REFERER"));
//        $curent_url=getenv("QUERY_STRING");
        return "?".$zapros;
}

function get_crypt($pass)    // доп шифрование
         {
          if(!empty($pass))
           {
            while($i<strlen($pass))
                   {
                        $quod[$i]=md5(substr($pass, $i, strlen($pass)));
                        $i++;
                   }

            foreach ($quod as $element)
                   {
                    $out=$out.$element;
                   }
            $out=md5(sha1($out));
            return $out;
           }
         }

function uid($id)
	{		if(!empty($id))
			{				$out=$id.substr(preg_replace("/[a-z]/i","",md5($id)),1,3);
				return $out;
			}
	}

function getIP()    // получение ip
{
  if (!empty($_SERVER['HTTP_CLIENT_IP']))
  {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
  }
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
    $ip=$_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}

function getAG()   // получение ОС и браузера
{
   $r = $_SERVER['HTTP_USER_AGENT'];
   $out = $r;

   $os_p = array("|Windows\sNT\s5.1|",
                "|Windows\sNT\s5.0|",
                "|Windows\s98|",
                "|Linux\si686|",
                "|Windows\sNT\s6.1|",
                "|Windows\sNT\s6.0|");

   $os = array("Windows XP",
               "Windows 2000",
               "Windows 98",
               "Linux",
               "Windows 7",
               "Windows Vista");

   for($j=0; $j<count($os); $j++)
   {
       if(preg_match($os_p[$j], $r, $mas))
       {
          $h = str_replace($mas[0], $os[$j], $mas[0]);
          $out=$out." ( ".$h;
       }

   }

   $arr = array("|Opera/[0-9\.]*\s|",
                 "|Chrome/[0-9\.]*\s|",
                 "|Firefox/[0-9\.]*$|",
                 "|Navigator/[0-9\.]*$|",
                 "|MAXTHON\s[0-9\.]*(?=[)])|",
                 "|MSIE\s[0-9\.]*|"
                 );


    for($i=0; $i<count($arr); $i++)
    {
        if(preg_match($arr[$i],  $r, $a))
        {
               $out=$out." / ".$a[0].")";

        }

    }
    return $out;
}


function file_check($file)
		 {
				global $no_image;
				global $upload_dir;
				$url=$upload_dir.$file;
				if (@fopen($url, "r"))
					{
						return $file;
					}
				else
					{
						return $no_image;
					}
		 }


function checkEmail($email) // проверка e-mail
{
if (!ereg( "^[a-z0-9]+@[a-z0-9]+\.[a-z0-9]{2,4}$", strtolower($email)))
{
return FALSE;
}
else
{
	return TRUE;
	}

//list ($Username, $Domain) = split ("@",$email);

//if (getmxrr ($Domain, $MXHost))
//{
//return TRUE;
//}
//else
//{
//if (fsockopen ($Domain, 25, $errno, $errstr, 30))
//{
//return TRUE;
//}
//else
//{
//return FALSE;
//}
//}
}


function str_nav($zapros){
        global $str_num,$act,$skin,$db,$status;
$str_num="1";
         $page = $_GET['p'];
         $rs = $db->Execute($zapros);
                 $count = $rs->_numOfRows;
                 $total = (($count - 1) / $str_num) + 1;
                 $total =  intval($total);
                 $page = intval($page);
                 if(empty($page) or $page < 0) $page = 1;
                   if($page > $total) $page = $total;
                   $start = $page * $str_num - $str_num;
                   if ($start<"0"){$start="0";}

          if ($page != 1) $pervpage = '<a href=?page='.$act.'&p=1&status='.$status.'>Первая</a> | <a href=?page='.$act.'&p='. ($page - 1) .'&status='.$status.'>Предыдущая</a> | ';
        if ($page != $total) $nextpage = ' | <a href=?page='.$act.'&p='. ($page + 1) .'&status='.$status.'>Следующая</a> | <a href=?page='.$act.'&p=' .$total. '&status='.$status.'>Последняя</a>';

        if($page - 5 > 0) $page5left = ' <a href=?page='.$act.'&p='. ($page - 5) .'&status='.$status.'>'. ($page - 5) .'</a> | ';
        if($page - 4 > 0) $page4left = ' <a href=?page='.$act.'&p='. ($page - 4) .'&status='.$status.'>'. ($page - 4) .'</a> | ';
        if($page - 3 > 0) $page3left = ' <a href=?page='.$act.'&p='. ($page - 3) .'&status='.$status.'>'. ($page - 3) .'</a> | ';
        if($page - 2 > 0) $page2left = ' <a href=?page='.$act.'&p='. ($page - 2) .'&status='.$status.'>'. ($page - 2) .'</a> | ';
        if($page - 1 > 0) $page1left = '<a href=?page='.$act.'&p='. ($page - 1) .'&status='.$status.'>'. ($page - 1) .'</a> | ';

        if($page + 5 <= $total) $page5right = ' | <a href=?page='.$act.'&p='. ($page + 5) .'&status='.$status.'>'. ($page + 5) .'</a>';
        if($page + 4 <= $total) $page4right = ' | <a href=?page='.$act.'&p='. ($page + 4) .'&status='.$status.'>'. ($page + 4) .'</a>';
        if($page + 3 <= $total) $page3right = ' | <a href=?page='.$act.'&p='. ($page + 3) .'&status='.$status.'>'. ($page + 3) .'</a>';
        if($page + 2 <= $total) $page2right = ' | <a href=?page='.$act.'&p='. ($page + 2) .'&status='.$status.'>'. ($page + 2) .'</a>';
        if($page + 1 <= $total) $page1right = ' | <a href=?page='.$act.'&p='. ($page + 1) .'&status='.$status.'>'. ($page + 1) .'</a>';
        if ($total > 1)
{
         $skin->assign("str_v","1");
        $skin->assign("navig",$pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage);
}else{
          $skin->assign("str_v","0");
}
return $start;
}


function checkbox_verify($_name)
		 {
			$result=0;// обязательно прописываем, чтобы функция всегда возвращала результат
						// проверяем, а есть ли вообще такой checkbox на html форме, а то часто промахиваются
			if (isset($_REQUEST[$_name]))
			{
				if ($_REQUEST[$_name]=='on') { $result=1; } else { $result=0; }
			}
			return $result;
		}
?>