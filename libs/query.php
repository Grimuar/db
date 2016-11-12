<?php

//if(!defined('SECURITY')){die("Crash: 403, get away kid.");}

class Core {

   //автоматизация обычных запросов к таблице
   public function BaseQuery($table) {
   	  global $db;
      $rs=$db->Execute("SELECT * FROM `".$table."` ORDER BY `id` DESC");
  	  return $rs;
   }

   //функция запроса для отображения главной страницы
   public function MainQuery() {
   	  global $db;
      $rs=$db->Execute("SELECT `".TABLE_REPAIRS."`.*,`".TABLE_AGENTS."`.*
        				FROM `".TABLE_REPAIRS."`
        			    RIGHT JOIN `".TABLE_AGENTS."`
        				ON `".TABLE_REPAIRS."`.`id_agent`=`".TABLE_AGENTS."`.`id_a`
        				WHERE `".TABLE_REPAIRS."`.`cur_st`<>4
        				ORDER BY `".TABLE_REPAIRS."`.`id` DESC");
  	  return $rs;
      }

   public function MainQueryLast() {
   	  global $db;

      $rs=$db->Execute("SELECT `".TABLE_REPAIRS."`.*,`".TABLE_AGENTS."`.*
        				FROM `".TABLE_REPAIRS."`
        			    RIGHT JOIN `".TABLE_AGENTS."`
        				ON `".TABLE_REPAIRS."`.`id_agent`=`".TABLE_AGENTS."`.`id_a`
        				WHERE `".TABLE_REPAIRS."`.`date_last_edit` LIKE '%".$this->l_date_year."-".$this->l_date_month."-".$this->l_date_day."%'
        				ORDER BY `".TABLE_REPAIRS."`.`id` DESC");
  	  return $rs;
      }

  public function MainQueryArc() {
   	  global $db;
      $rs=$db->Execute("SELECT `".TABLE_REPAIRS."`.*,`".TABLE_AGENTS."`.*
        				FROM `".TABLE_REPAIRS."`
        			    RIGHT JOIN `".TABLE_AGENTS."`
        				ON `".TABLE_REPAIRS."`.`id_agent`=`".TABLE_AGENTS."`.`id_a`
        				WHERE `".TABLE_REPAIRS."`.`cur_st`=4
        				ORDER BY `".TABLE_REPAIRS."`.`id` DESC");
  	  return $rs;
      }

  public function MainQueryWhereId() {
   	  global $db;
      $rs=$db->Execute("SELECT `".TABLE_REPAIRS."`.*,`".TABLE_AGENTS."`.*
                		FROM `".TABLE_REPAIRS."`
                		RIGHT JOIN `".TABLE_AGENTS."`
                		ON `".TABLE_REPAIRS."`.`id_agent`=`".TABLE_AGENTS."`.`id_a`
                		WHERE `".TABLE_REPAIRS."`.`id`='".$this->id."'
                		LIMIT 1");
  	  return $rs;
      }
}

class Ajax {

   public function CheckAgent() {   	  global $config;   	  global $db;
      $rs=$db->Execute("SELECT * FROM `".TABLE_AGENTS."` WHERE `fio`='".$this->fio."'");
	  if($rs->_numOfRows>0)
  			{
  				$json_data=array("fio"=>$rs->fields['fio'],
  								 "adr"=>$rs->fields['adress'],
  								 "tel"=>$rs->fields['tel']);
  			}
  	  return json_encode($json_data);
   }

   public function EditAgent() {
      global $config;
      global $db;
      $rs=$db->Execute("UPDATE `".TABLE_AGENTS."` SET `fio`='".$this->fio."', `adress`='".$this->adress."', `tel`='".$this->tel."' WHERE `id_a`='".$this->id_a."'");
	  if($rs)
	  	{
                $rs1=$db->Execute("SELECT * FROM `".TABLE_AGENTS."` WHERE `id_a`='".$this->id_a."'");
				if($rs1->_numOfRows>0)
  					{
  						$json_data=array("fio"=>$rs1->fields['fio'],
  						  				 "adr"=>$rs1->fields['adress'],
  						  				 "tel"=>$rs1->fields['tel'],
  						  				 "msg"=>"Данные успешно сохранены");
  					}
  				else
  					{
  						$json_data=array("fio"=>$this->fio,
  									     "adr"=>$this->adress,
  									     "tel"=>$this->tel,
  									     "msg"=>"Произошла ошибка выборки, сохранение успешно");
  					}
       	}
      else
  		{
  			$json_data=array("fio"=>$this->fio,
  							 "adr"=>$this->adress,
  							 "tel"=>$this->tel,
  							 "msg"=>"Произошла ошибка сохранения");
  		}
  	return json_encode($json_data);
   }



}
?>