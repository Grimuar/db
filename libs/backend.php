﻿<?php
include('../conf/conf.php');
backup_database_tables(DB_HOST,DB_LOGIN,DB_PASS,DB_NAME, '*');
// backup the db function
function backup_database_tables($host,$user,$pass,$name,$tables)
{
        $link = mysql_connect($host,$user,$pass);
        mysql_select_db($name,$link);
        //get all of the tables
	mysql_query('SET NAMES utf8');
        if($tables == '*')
        {
                $tables = array();
                $result = mysql_query('SHOW TABLES');
                while($row = mysql_fetch_row($result))
                {
                        $tables[] = $row[0];
                }
        }
        else
        {
                $tables = is_array($tables) ? $tables : explode(',',$tables);
        }
        //cycle through each table and format the data
        foreach($tables as $table)
        {
                $result = mysql_query('SELECT * FROM '.$table);
                $num_fields = mysql_num_fields($result);
                $return.= 'DROP TABLE '.$table.';';
                $row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
                $return.= "\n\n".$row2[1].";\n\n";
                for ($i = 0; $i < $num_fields; $i++)
                {
                        while($row = mysql_fetch_row($result))
                        {
                                $return.= 'INSERT INTO '.$table.' VALUES(';
                                for($j=0; $j<$num_fields; $j++)
                                {
                                        $row[$j] = addslashes($row[$j]);
                                        $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                                        if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                                        if ($j<($num_fields-1)) { $return.= ','; }
                                }
                                $return.= ");\n";
                        }
                }
                $return.="\n\n\n";
        }
        //save the file
        $handle = fopen('../db_backend/db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
        fwrite($handle,$return);
        fclose($handle);
	echo "<center><h1>Успешное сохранение!</h1><br>db-backup-".time()."-".(md5(implode(',',$tables))).".sql<br><a href='http://192.168.0.200/xp/'>Возврат</a></center>";
}
?>