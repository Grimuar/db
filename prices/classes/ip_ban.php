<?php
/* http://wm-help.net/ */
/* ��������� ��� ����� ip */
define("bann_message", "��� ������ IP: %ip% ������ � ����� ������.");
 
/* �������������� � ����������� ����� �� ip */
define("wrong_message", "�� ������������� ��������������� ������� ����� � ��������� ���������� ������ IP: %ip% � ������ ����������� ��������� ������.");
 
/* ������ � ip � ����� ����������. � ����� ������� IP, � �������� ��� ���������� */
$bann_array = array(
                    "192.168.0.30"=>"open", // �������� ������ IP
                    "192.168.1.200"=>"open1",  // �������� ������ IP
                    //"127.0.0.1"=>"wrong"      // Test
                    );
					
/* ������� ��� ����� 100% ����������� IP ������ ����������. */
/* ���������� ��� ��������� ���������� � IP. */
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

/* ����������, ��� ������ � ���������� ���� ��� ����� ip ������ */
function bann_on_not_to_bann()
{
    global $bann_array; // �������� ������ � ip ��������
    $user_ip = _ip();   // �������� ip
 
/* ��������� ������ �� ���� � �������� */
foreach($bann_array as $ip=>$type)
{
    if ($ip == $user_ip) // ���������
    {
        if($type!='open')
		{
                die(str_replace("%ip%", $user_ip, bann_message)); // ��������� � ���, ��� ������ ������ + ���������� ������ php
                // break �� ��������� �.�. ������ ��� ������ �� �����������
		}
    }
}
}
 
/* ��������� ��������� ip � ���������\������������� ���� ��� ������ */
bann_on_not_to_bann();
?>