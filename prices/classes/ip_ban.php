<?php
/* http://wm-help.net/ */
/* —ообщение при банне ip */
define("bann_message", "ƒл€ вашего IP: %ip% доступ к сайту закрыт.");
 
/* ѕредупреждение о возможности банна по ip */
define("wrong_message", "¬ы предупреждены администратором данного сайта о возможной блокировке вашего IP: %ip% в случае дальнейшего нарушени€ правил.");
 
/* массив с ip и типом блокировки. в ключе массива IP, в значении тип блокировки */
$bann_array = array(
                    "192.168.0.30"=>"open", // реальный плохой IP
                    "192.168.1.200"=>"open1",  // реальный плохой IP
                    //"127.0.0.1"=>"wrong"      // Test
                    );
					
/* ‘ункци€ дл€ почти 100% определени€ IP адреса посетител€. */
/* ѕеребирает все возможные переменные с IP. */
function _ip()
{
  if(isset($HTTP_SERVER_VARS)) {
    if(isset($HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"])) {
    $realip = $HTTP_SERVER_VARS["HTTP_X_FORWARDED_FOR"];
    }elseif(isset($HTTP_SERVER_VARS["HTTP_CLIENT_IP"])) {
      $realip = $HTTP_SERVER_VARS["HTTP_CLIENT_IP"];
    }else{
      $realip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
    }
  }else{
  if(getenv( 'HTTP_X_FORWARDED_FOR' ) ) {
    $realip = getenv( 'HTTP_X_FORWARDED_FOR' );
  }elseif ( getenv( 'HTTP_CLIENT_IP' ) ) {
    $realip = getenv( 'HTTP_CLIENT_IP' );
  }else {
    $realip = getenv( 'REMOTE_ADDR' );
  }
}
return $realip;
echo $realip;
}

/* ќпредел€ет, что делать с владельцем того или иного ip адреса */
function bann_on_not_to_bann()
{
    global $bann_array; // получаем массив с ip адресами
    $user_ip = _ip();   // получаем ip
 
/* разбираем массив на ключ и значение */
foreach($bann_array as $ip=>$type)
{
    if ($ip == $user_ip) // провер€ем
    {
        if($type!='open')
		{
                die(str_replace("%ip%", $user_ip, bann_message)); // —ообщение о том, что доступ закрыт + завершение работы php
                // break не требуетс€ т.к. дальше уже ничего не выполн€етс€
		}
    }
}
}
 
/* провер€ем владельца ip и блокируем\предупреждаем если это спамер */
bann_on_not_to_bann();
?>