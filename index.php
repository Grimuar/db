<?php
session_start();
define('SECURITY', '1');
require_once('libs/adodb/adodb.inc.php'); // adodb
require('libs/smarty/JSON.php'); // json
require('libs/smarty/Smarty.class.php'); //смарти
include("libs/query.php");
require('conf/conf.php');
require('conf/func.php');
//конфигурирование

// подключение к первой базе
$db        = ADONewConnection('mysql');
$db->debug = false;
$db->Connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
$db->SetFetchMode(ADODB_FETCH_ASSOC);
$db->Execute("SET NAMES utf8");

// конфигурация шаблонизатора
$smarty               = new Smarty();
$smarty->compile_dir  = true;
$smarty->debugging    = false;
$smarty->caching      = false;
$smarty->template_dir = 'templates';
$smarty->compile_dir  = 'temp_cache';

$Core = new Core();


//отправим в шаблонизатор пару нужных переменных из config'а
$smarty->assign("company_name", COMPANY_NAME);
$smarty->assign("logo_img", LOGO_IMAGE);
$smarty->assign("table_timeout", UPDATE_TIMEOUT);
$smarty->assign("today", today());
$smarty->assign("hash", get_crypt(uniqid("")));

$smarty->assign("color_st1", "#d0f0c0"); //в работе
$smarty->assign("color_st2", "LightSkyBlue"); //готов
$smarty->assign("color_st3", "LightCoral"); //не смотрели
$smarty->assign("color_st4", "#ffff00"); //в сервисе
$smarty->assign("color_st5", "#ff00ff"); //в кредит
//работа с датой и отправка переменных даты в шаблонизатор
while ($i < 31) {
    $i++;
    if ($i < 10) {
        $i = '0' . $i;
    }
    $day_query[$i] = $i;
}
$i = 0;
while ($i < 12) {
    $i++;
    if ($i < 10) {
        $i = '0' . $i;
    }
    $month_query[$i] = $i;
}
$smarty->assign("day_query", $day_query);
$smarty->assign("month_query", $month_query);

if (isset($_GET['query'])) {
    $query = nl2br(trim($_GET['query']));
}
//обработка генеральных массивов
obr();
if (isset($_GET['query'])) {
    $query = nl2br(trim($_GET['query']));
}
//проверка переменных
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if (isset($_GET['q'])) {
    $q = $_GET['q'];
}

if (isset($_GET['id_a'])) {
    $id_a = $_GET['id_a'];
}
if (isset($_GET['fio'])) {
    $fio = trim($_GET['fio']);
}
if (isset($_GET['adress'])) {
    $adress = trim($_GET['adress']);
}
if (isset($_GET['tel'])) {
    $tel = trim($_GET['tel']);
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_GET['code'])) {
    $code = $_GET['code'];
}
if (isset($_GET['display'])) {
    $display = $_GET['display'];
}
if (isset($_GET['st'])) {
    $st = $_GET['st'];
}
if (isset($_GET['money'])) {
    $money = $_GET['money'];
}
if (isset($_GET['work'])) {
    $work = $_GET['work'];
}
if (isset($_GET['nav'])) {
    $nav = $_GET['nav'];
}
if (isset($_GET['date_set'])) {
    $date_set = $_GET['date_set'];
}


if (isset($_POST['fio'])) {
    $fio = trim($_POST['fio']);
}
if (isset($_POST['adress'])) {
    $adress = trim($_POST['adress']);
}
if (isset($_POST['tel'])) {
    $tel = trim($_POST['tel']);
}
if (isset($_POST['device'])) {
    $device = trim($_POST['device']);
}
if (isset($_POST['fail'])) {
    $fail = trim($_POST['fail']);
}
if (isset($_POST['repair_type'])) {
    $repair_type = $_POST['repair_type'];
}
if (isset($_POST['note'])) {
    $note = trim($_POST['note']);
}
if (isset($_POST['date_day'])) {
    $date_day = trim($_POST['date_day']);
}
if (isset($_POST['date_in'])) {
    $date_in = trim($_POST['date_in']);
}
if (isset($_POST['date_month'])) {
    $date_month = trim($_POST['date_month']);
}
if (isset($_POST['date_year'])) {
    $date_year = trim($_POST['date_year']);
}
if (isset($_POST['add_row'])) {
    $add_row = $_POST['add_row'];
}
if (isset($_POST['edit_row'])) {
    $edit_row = $_POST['edit_row'];
}
if (isset($_POST['row_id'])) {
    $row_id = $_POST['row_id'];
}
if (isset($_POST['complect'])) {
    $complect = $_POST['complect'];
}
if (isset($_POST['doc'])) {
    $doc = $_POST['doc'];
}

if (isset($_POST['adr_ck'])) {
    $adr_ck = $_POST['adr_ck'];
}
if (isset($_POST['dev_ck'])) {
    $dev_ck = $_POST['dev_ck'];
}
if (isset($_POST['fail_ck'])) {
    $fail_ck = $_POST['fail_ck'];
}
if (isset($_POST['note_ck'])) {
    $note_ck = $_POST['note_ck'];
}
if (isset($_POST['view_ck'])) {
    $view_ck = $_POST['view_ck'];
}
if (isset($_POST['add_item'])) {
    $add_item = trim($_POST['add_item']);
}
if (isset($_POST['name_fail'])) {
    $name_fail = trim($_POST['name_fail']);
}
if (isset($_POST['edit_fail'])) {
    $edit_fail = trim($_POST['edit_fail']);
}
if (isset($_POST['name_dev'])) {
    $name_dev = trim($_POST['name_dev']);
}
if (isset($_POST['edit_dev'])) {
    $edit_dev = trim($_POST['edit_dev']);
}
if (isset($_POST['edit_view'])) {
    $edit_view = trim($_POST['edit_view']);
}
if (isset($_POST['name_view'])) {
    $name_view = trim($_POST['name_view']);
}
if (isset($_POST['name_adr'])) {
    $name_adr = trim($_POST['name_adr']);
}
if (isset($_POST['edit_adr'])) {
    $edit_adr = trim($_POST['edit_adr']);
}
if (isset($_POST['name_note'])) {
    $name_note = trim($_POST['name_note']);
}
if (isset($_POST['edit_note'])) {
    $edit_note = trim($_POST['edit_note']);
}
if (isset($_POST['default_ch'])) {
    $default_ch = trim($_POST['default_ch']);
}
if (isset($_POST['summa_in'])) {
    $summa_in = intval(trim($_POST['summa_in']));
}

if (isset($_POST['add_work'])) {
    $add_work = trim($_POST['add_work']);
}
if (isset($_POST['work'])) {
    $work = nl2br(trim($_POST['work']));
}
if (isset($_POST['summa'])) {
    $summa = trim($_POST['summa']);
}
if (isset($_POST['user'])) {
    $user = trim($_POST['user']);
}

if (isset($_POST['model'])) {
    $model = trim($_POST['model']);
}
if (isset($_POST['s_n'])) {
    $s_n = trim($_POST['s_n']);
}
if (isset($_POST['date_sale'])) {
    $date_sale = trim($_POST['date_sale']);
}
if (isset($_POST['view'])) {
    $view = trim($_POST['view']);
}

if (isset($_POST['l_date_day'])) {
    $l_date_day = trim($_POST['l_date_day']);
}
if (isset($_POST['l_date_month'])) {
    $l_date_month = trim($_POST['l_date_month']);
}
if (isset($_POST['l_date_year'])) {
    $l_date_year = trim($_POST['l_date_year']);
}
if (isset($_POST['get_last_button'])) {
    $get_last_button = trim($_POST['get_last_button']);
}

if (isset($_POST['hash'])) {
    $hash = trim($_POST['hash']);
}
if (isset($_GET['act'])) {
    $act = trim($_GET['act']);
}
//проверка на авторизацию
//IF(!check_auth()){$page="admin";}
//собственно скрипты
//$smarty->assign("nav", $nav);
//$smarty->assign("display", $display);
//echo get_crypt("1");
$smarty->assign("users", $Core->BaseQuery(TABLE_USERS));
$smarty->assign("need", $Core->BaseQuery(TABLE_NEED)->_numOfRows);
$smarty->assign("fail_query", $Core->BaseQuery(TABLE_FAIL));
$smarty->assign("dev_query", $Core->BaseQuery(TABLE_DEV));
$smarty->assign("view_query", $Core->BaseQuery(TABLE_VIEW));
$smarty->assign("note_query", $Core->BaseQuery(TABLE_NOTE));
$smarty->assign("adr_query", $Core->BaseQuery(TABLE_ADR));

switch ($page) {
    default:
        exit(header("Location: ?page=main"));
        break;
    
    case "add_form":
        $smarty->display("act/add_cl_form.tpl");
        break;
    
    case "main":
        $smarty->assign("title", "Главная таблица");
        $smarty->assign("main_query", $Core->MainQuery());
        $smarty->display('main/index.tpl');
        break;
    
    case "main_t":
        $smarty->assign("main_query", $Core->MainQuery());
        $smarty->display('ajax/main_t.tpl');
        
        break;
    
    case "main_arc":
        $smarty->assign("main_query", $Core->MainQueryArc());
        $smarty->assign("title", "Архив");
        $smarty->display('main/main_arc.tpl');
        break;
    
    case "kv":
        if (isset($id)) {
            $Core->id = $id;
            $rs       = $Core->MainQueryWhereId();
            $smarty->assign("title", "Квитанция №" . $rs->fields["id"] . " от " . $rs->fields["date_in"]);
            if (!$rs) {
                exit(header("Location: ?page=main"));
            }
            $smarty->assign("number_kv", date("y"));
            $smarty->assign("kv_query", $rs);
            $smarty->assign("uid", uid($rs->fields["id"]));
            $smarty->display('out/kv.tpl');
        } else {
            exit(header("Location: ?page=main"));
        }
        break;
    
    case "get_st":
        if (isset($st) && isset($id)) {
            if ($st == '4') {
                $rs = $db->Execute("UPDATE `" . TABLE_REPAIRS . "`
                        SET `date_out`=NOW()
                        WHERE `id`='" . $id . "'");
            } else {
                $rs = $db->Execute("UPDATE `" . TABLE_REPAIRS . "`
                        SET `date_out`='0'
                        WHERE `id`='" . $id . "'");
            }
            if ($st == '-2') {
                $sel = $db->Execute("SELECT `cur_st`, `work`
                         FROM `" . TABLE_REPAIRS . "`
                         WHERE `id`='" . $id . "'");
                
                $rs = $db->Execute("UPDATE `" . TABLE_REPAIRS . "`
                        SET `work`='" . $sel->fields['work'] . "<br> уехал " . date("d-m-Y") . "'
                        WHERE `id`='" . $id . "'");
                if ($sel->fields['cur_st'] == '-2') {
                    $rs = $db->Execute("UPDATE `" . TABLE_REPAIRS . "`
                            SET `work`='" . $sel->fields['work'] . "<br> приехал " . date("d-m-Y") . "'
                            WHERE `id`='" . $id . "'");
                }
            }
            if ($st == '2') {
                $sel = $db->Execute("SELECT `cur_st`, `work` FROM `" . TABLE_REPAIRS . "` WHERE `id`='" . $id . "'");
                if ($sel->fields['cur_st'] == '-2') {
                    $rs = $db->Execute("UPDATE `" . TABLE_REPAIRS . "`
                            SET `work`='" . $sel->fields['work'] . "<br> приехал " . date("d-m-Y") . "'
                            WHERE `id`='" . $id . "'");
                }
            }
            $rs = $db->Execute("UPDATE `" . TABLE_REPAIRS . "` SET `cur_st` = '" . $st . "', `date_last_edit`=NOW() WHERE `id`='" . $id . "'");
        }
        break;
    
    case "pay":
        if (isset($money) && isset($id)) {
            $rs = $db->Execute("UPDATE `" . TABLE_REPAIRS . "` SET `summa` = '" . $money . "' WHERE `id`='" . $id . "'");
        }
        break;
    
    case "pay_hard":
        if (isset($money) && isset($id)) {
            $rs = $db->Execute("UPDATE `" . TABLE_REPAIRS . "` SET `summa_hard` = '" . $money . "' WHERE `id`='" . $id . "'");
        }
        break;
    
    case "need":
        $smarty->assign("need_arr", $Core->BaseQuery(TABLE_NEED));
        $smarty->display("act/add_need.tpl");
        break;
    
    case "between":
        $smarty->assign("title", "Отчеты");
        $summa      = 0;
        $summa_hard = 0;
        $date_begin = $_GET["begin"];
        $date_end   = $_GET["end"];
        $rs         = $db->Execute("SELECT `" . TABLE_REPAIRS . "`.*,`" . TABLE_AGENTS . "`.*
                          FROM `" . TABLE_REPAIRS . "`
                          RIGHT JOIN `" . TABLE_AGENTS . "`
                          ON `" . TABLE_REPAIRS . "`.`id_agent`=`" . TABLE_AGENTS . "`.`id_a`
                          WHERE `date_out` BETWEEN '" . $date_begin . " 00:00:01' AND '" . $date_end . " 23:59:59'
                          ORDER BY `date_out` ASC");
        if ($rs->_numOfRows > 0) {
            while (!$rs->EOF) {
                $i++;
                $summa_hard                  = $summa_hard + $rs->fields['summa_hard'];
                $summa                       = $summa + $rs->fields['summa'];
                $query_sum[$i]["fio"]        = $rs->fields['fio'];
                $query_sum[$i]["work"]       = $rs->fields['work'];
                $query_sum[$i]["date"]       = $rs->fields['date_out'];
                $query_sum[$i]["summa"]      = $rs->fields['summa'];
                $query_sum[$i]["summa_hard"] = $rs->fields['summa_hard'];
                $rs->MoveNext();
            }
        }
        $smarty->assign("query_sum", $query_sum);
        $smarty->assign("q_kontrag", $rs->_numOfRows);
        $smarty->assign("summa", $summa);
        $smarty->assign("begin", $date_begin . " 00:00:01");
        $smarty->assign("end", $date_end . " 23:59:59");
        $smarty->assign("summa_hard", $summa_hard);
        $smarty->display("main/between.tpl");
        break;
    
    case "need_act":
        
        if (isset($query)) {
            //echo $query;
            $query_array = explode(",", $query);
            $rs          = $db->Execute("TRUNCATE `need`");
            foreach ($query_array as $str_value) {
                $rs1 = $db->Execute("INSERT INTO `" . TABLE_NEED . "` (`need`) VALUES ('" . $str_value . "')");
            }
            
        }
        break;
    
    case "stat":
        $rows_rw = $Core->BaseQuery(TABLE_REPAIRS);
        $rows_cl = $Core->BaseQuery(TABLE_AGENTS);
        $first   = $db->Execute("SELECT `date_in` FROM `" . TABLE_REPAIRS . "` WHERE `id`='1'");
        if ($rows_rw->_numOfRows > 0) {
            while (!$rows_rw->EOF) {
                $i++;
                $summa = $summa + $rows_rw->fields['summa'];
                $rows_rw->MoveNext();
            }
        }
        $smarty->assign("rows_rw", $rows_rw->_numOfRows);
        $smarty->assign("first", $first->fields['date_in']);
        $smarty->assign("rows_cl", $rows_cl->_numOfRows);
        $smarty->assign("summa", $summa);
        $smarty->assign("summa_sr", $summa / $rows_rw->_numOfRows);
        $smarty->display("act/stat.tpl");
        break;
    
    case "config":
        if (empty($default_ch)) {
            $default_ch = '-1';
        }
        //конфигурация категорий ремонта
        if (isset($add_item) && isset($name_fail)) {
            if (!empty($name_fail) && !empty($add_item) && $name_fail != 'Добавить запись...') {
                $rs = $db->Execute("INSERT INTO `" . TABLE_FAIL . "` (`fail`,`checked`) VALUES ('" . $name_fail . "','" . $default_ch . "')");
                exit(header("Location: ?page=config"));
            }
        }
        if (isset($act)) {
            if (!empty($id) && $act == "erase_fail") {
                $rs = $db->Execute("DELETE FROM `" . TABLE_FAIL . "` WHERE `id`='" . $id . "'");
                exit(header("Location: ?page=config"));
            }
        }
        if (isset($hash) && isset($edit_fail) && isset($id)) {
            if (!empty($edit_fail) && !empty($id) && !empty($hash)) {
                
                $rs = $db->Execute("UPDATE `" . TABLE_FAIL . "` SET `fail` = '" . $edit_fail . "', `checked`='" . $default_ch . "' WHERE `id`='" . $id . "'");
                exit(header("Location: ?page=config"));
            }
        }
        //конфигурация категорий устройств
        if (isset($add_item) && isset($name_dev)) {
            if (!empty($name_dev) && !empty($add_item) && $name_dev != 'Добавить запись...') {
                $rs = $db->Execute("INSERT INTO `" . TABLE_DEV . "` (`name`,`checked`) VALUES ('" . $name_dev . "','" . $default_ch . "')");
                exit(header("Location: ?page=config"));
            }
        }
        if (isset($act)) {
            if (!empty($id) && $act == "erase_dev") {
                $rs = $db->Execute("DELETE FROM `" . TABLE_DEV . "` WHERE `id`='" . $id . "'");
                exit(header("Location: ?page=config"));
            }
        }
        if (isset($hash) && isset($edit_dev) && isset($id)) {
            if (!empty($edit_dev) && !empty($id) && !empty($hash)) {
                $rs = $db->Execute("UPDATE `" . TABLE_DEV . "` SET `name` = '" . $edit_dev . "', `checked`='" . $default_ch . "' WHERE `id`='" . $id . "'");
                exit(header("Location: ?page=config"));
            }
        }
        //конфигурация состояний устройств
        if (isset($add_item) && isset($name_view)) {
            if (!empty($name_view) && !empty($add_item) && $name_view != 'Добавить запись...') {
                $rs = $db->Execute("INSERT INTO `" . TABLE_VIEW . "` (`view`,`checked`) VALUES ('" . $name_view . "','" . $default_ch . "')");
                exit(header("Location: ?page=config"));
            }
        }
        if (isset($act)) {
            if (!empty($id) && $act == "erase_view") {
                $rs = $db->Execute("DELETE FROM `" . TABLE_VIEW . "` WHERE `id`='" . $id . "'");
                exit(header("Location: ?page=config"));
            }
        }
        if (isset($hash) && isset($edit_view) && isset($id)) {
            if (!empty($edit_view) && !empty($id) && !empty($hash)) {
                $rs = $db->Execute("UPDATE `" . TABLE_VIEW . "` SET `view` = '" . $edit_view . "', `checked`='" . $default_ch . "' WHERE `id`='" . $id . "'");
                exit(header("Location: ?page=config"));
            }
        }
        //конфигурация примечаний
        if (isset($add_item) && isset($name_note)) {
            if (!empty($name_note) && !empty($add_item) && $name_note != 'Добавить запись...') {
                $rs = $db->Execute("INSERT INTO `" . TABLE_NOTE . "` (`name`,`checked`) VALUES ('" . $name_note . "','" . $default_ch . "')");
                exit(header("Location: ?page=config"));
            }
        }
        if (isset($act)) {
            if (!empty($id) && $act == "erase_note") {
                $rs = $db->Execute("DELETE FROM `" . TABLE_NOTE . "` WHERE `id`='" . $id . "'");
                exit(header("Location: ?page=config"));
            }
        }
        if (isset($hash) && isset($edit_note) && isset($id)) {
            if (!empty($edit_note) && !empty($id) && !empty($hash)) {
                $rs = $db->Execute("UPDATE `" . TABLE_NOTE . "` SET `name` = '" . $edit_note . "', `checked`='" . $default_ch . "' WHERE `id`='" . $id . "'");
                exit(header("Location: ?page=config"));
            }
        }
        $smarty->display('conf/index.tpl');
        break;
    
    case "erase":
        if (isset($id)) {
            $rs = $db->Execute("DELETE FROM `" . TABLE_REPAIRS . "` WHERE `id`='" . $id . "'");
            exit(header("location: ?page=main"));
        }
        break;
    
    case "call":
        if (isset($id)) {
            $sel = $db->Execute("SELECT `work` FROM `" . TABLE_REPAIRS . "` WHERE `id`='" . $id . "'");
            if ($sel->_numOfRows > 0) {
                $rs = $db->Execute("UPDATE `" . TABLE_REPAIRS . "`
                    SET `work`='" . $sel->fields['work'] . "<br> звонили " . date("d-m-Y") . "'
                    WHERE `id`='" . $id . "'");
                exit(header("location: ?page=main"));
            }
        }
        break;
    
    case "add_row":
        if (isset($add_row)) {
            if (isset($fio) && isset($tel) && isset($repair_type) && isset($date_day) && isset($date_month) && isset($date_year)) {
                if (!empty($fio) && !empty($tel) && !empty($repair_type) && !empty($date_day) && !empty($date_month) && !empty($date_year)) {
                    $base_date = $date_day . "-" . $date_month . "-" . $date_year;
                    if ($fail == 'другое...') {
                        $fail = '';
                    }
                    if ($adress == 'другое...') {
                        $adress = '';
                    }
                    if ($device == 'другое...') {
                        $device = '';
                    }
                    if ($note == 'другое...') {
                        $note = '';
                    }
                    if ($model == '') {
                        $model = '-';
                    }
                    if ($s_n == '') {
                        $s_n = '-';
                    }
                    if ($view == '') {
                        $view = '-';
                    }
                    if ($date_sale == '') {
                        $date_sale = '-';
                    }
                    if (isset($adr_ck)) {
                        foreach ($adr_ck as $v) {
                            $adress = $v . ", " . $adress;
                        }
                    }
                    if (isset($dev_ck)) {
                        foreach ($dev_ck as $v) {
                            $device = $v . ", " . $device;
                        }
                    }
                    if (isset($note_ck)) {
                        foreach ($note_ck as $v) {
                            $note = $v . ", " . $note;
                        }
                    }
                    if (isset($fail_ck)) {
                        foreach ($fail_ck as $v) {
                            $fail = $v . ", " . $fail;
                        }
                    }
                    if (isset($view_ck)) {
                        foreach ($view_ck as $v) {
                            $view = $v . ", " . $view;
                        }
                    }
                    
                    $rs = $db->Execute("SELECT * FROM `" . TABLE_AGENTS . "` WHERE `fio`='" . $fio . "' LIMIT 1");
                    if ($rs->_numOfRows > 0) {
                        $ct  = $db->Execute("UPDATE `" . TABLE_AGENTS . "` SET `tel`='" . $tel . "' WHERE `id_a`='" . $rs->fields["id_a"] . "'");
                        $rs1 = $db->Execute("INSERT INTO `" . TABLE_REPAIRS . "`
                                   (`id_agent`,
                                    `device`,
                                    `model`,
                                    `s_n`,
									`complect`,
									`doc`,
                                    `date_sale`,
                                    `view`,
                                    `fail`,
                                    `repair_type`,
                                    `note`,
                                    `summa_in`,
                                    `date_in`,
                                    `manager`,
                                    `date_last_edit`,
                                    `date_add`)
                                            VALUES ('" . $rs->fields["id_a"] . "',
                                                    '" . $device . "',
                                                    '" . $model . "',
                                                    '" . $s_n . "',
													'" . $complect . "',
													'" . $doc . "',
                                                    '" . $date_sale . "',
                                                    '" . $view . "',
                                                    '" . $fail . "',
                                                    '" . $repair_type . "',
                                                    '" . $note . "',
                                                    '" . $summa_in . "',
                                                    '" . $base_date . "',
                                                    '" . $user . "',
                                                    NOW(),
                                                    NOW())");
                        if ($rs1) {
                            exit(header("location: ?page=main"));
                        } else {
                            echo "<font color='#993333'>Произошла ошибка MySQL. Проблема с БД.</font><br><a href='?page=main'>Главная</a>";
                        }
                    } else {
                        $rs = $db->Execute("INSERT INTO `" . TABLE_AGENTS . "`
                                                     (`fio`,
                                                      `adress`,
                                                      `tel`)
                                                VALUES  ('" . $fio . "',
                                                 '" . $adress . "',
                                                 '" . $tel . "')");
                        if ($rs) {
                            $last_id = mysql_insert_id();
                            $rs1     = $db->Execute("INSERT INTO `" . TABLE_REPAIRS . "`
                                   (`id_agent`,
                                    `device`,
                                    `model`,
                                    `s_n`,
									`complect`,
									`doc`,
                                    `date_sale`,
                                    `view`,
                                    `fail`,
                                    `repair_type`,
                                    `note`,
                                    `summa_in`,
                                    `date_in`,
                                    `manager`,
                                    `date_last_edit`,
                                    `date_add`)
                                            VALUES ('" . $last_id . "',
                                                    '" . $device . "',
                                                    '" . $model . "',
                                                    '" . $s_n . "',
													'" . $complect . "',
													'" . $doc . "',
                                                    '" . $date_sale . "',
                                                    '" . $view . "',
                                                    '" . $fail . "',
                                                    '" . $repair_type . "',
                                                    '" . $note . "',
                                                    '" . $summa_in . "',
                                                    '" . $base_date . "',
                                                    '" . $user . "',
                                                    NOW(),
                                                    NOW())");
                            if ($rs1) {
                                
                                exit(header("location: ?page=main"));
                            } else {
                                echo "INSERT INTO `" . TABLE_REPAIRS . "`
                                   (`id_agent`,
                                    `device`,
                                    `model`,
                                    `s_n`,
                              `complect`,
                              `doc`,
                                    `date_sale`,
                                    `view`,
                                    `fail`,
                                    `repair_type`,
                                    `note`,
                                    `summa_in`,
                                    `date_in`,
                                    `manager`,
                                    `date_last_edit`,
                                    `date_add`)
                                            VALUES ('" . $last_id . "',
                                                    '" . $device . "',
                                                    '" . $model . "',
                                                    '" . $s_n . "',
													'" . $complect . "',
													'" . $doc . "',
                                                    '" . $date_sale . "',
                                                    '" . $view . "',
                                                    '" . $fail . "',
                                                    '" . $repair_type . "',
                                                    '" . $note . "',
                                                    '" . $summa_in . "',
                                                    '" . $base_date . "',
                                                    '" . $user . "',
                                                    NOW(),
                                                    NOW())";
                            }
                        } else {
                            echo "<font color='#993333'>Произошла ошибка MySQL. Проблема с БД.</font><br><a href='?page=main'>Главная</a>";
                        }
                    }
                } else {
                    exit(header("location: ?page=main"));
                }
            } else {
                exit(header("location: ?page=main"));
            }
        } else {
            exit(header("location: ?page=main"));
        }
        break;
    
    case "edit_row":
        if (isset($id) && !empty($id)) {
            $Core->id = $id;
            $smarty->assign("edit", $Core->MainQueryWhereId());
            $smarty->display("act/edit_page.tpl");
        } else {
            exit(header("Location: ?page=main"));
        }
        break;
    
    case "edit_row_act":
        if (isset($edit_row) && isset($row_id)) {
            if (isset($repair_type) && isset($date_in)) {
                if (!empty($repair_type) && !empty($date_in)) {
                    $rs = $db->Execute("UPDATE `" . TABLE_REPAIRS . "` SET
                                        `device`='" . $device . "',
                                        `model`='" . $model . "',
                                        `s_n`='" . $s_n . "',
                                        `complect`='" . $complect . "',
                                        `doc`='" . $doc . "',
                                        `date_sale`='" . $date_sale . "',
                                        `view`='" . $view . "',
                                        `fail`='" . $fail . "',
                                        `repair_type`='" . $repair_type . "',
                                        `note`='" . $note . "',
                                        `date_in`='" . $date_in . "',
                                        `summa_in`='" . $summa_in . "',
                                        `manager`='" . $user . "'
                                  WHERE `id`='" . $row_id . "'");
                    if ($rs) {
                        exit(header("Location: ?page=main"));
                    } else {
                        echo "Ошибка запроса к базе данных";
                    }
                }
            } else {
                echo "Ошибка связи с базой данных";
            }
        }
        break;
    
    case "show_agent":
        if (isset($id) && !empty($id)) {
            $rs = $db->Execute("SELECT * FROM `" . TABLE_AGENTS . "` WHERE `id_a`='" . $id . "'");
            if ($rs->_numOfRows > 0) {
                $rs1 = $db->Execute("SELECT * FROM `" . TABLE_REPAIRS . "` WHERE `id_agent`='" . $rs->fields["id_a"] . "'");
                $smarty->assign("id_a", $rs->fields["id_a"]);
                $smarty->assign("fio", $rs->fields["fio"]);
                $smarty->assign("adress", $rs->fields["adress"]);
                $smarty->assign("tel", $rs->fields["tel"]);
                $smarty->assign("repairs", $rs1);
            }
            $smarty->display("show/index.tpl");
        } else {
            exit(header("Location: ?page=main"));
        }
        break;
    
    case "add_work":
        if (isset($id_a) && !empty($id_a)) {
            $rs = $db->Execute("SELECT `id`,`work`,`date_last_edit` FROM `" . TABLE_REPAIRS . "` WHERE `id`='" . $id_a . "' LIMIT 1");
            $smarty->assign("id_a", $id_a);
            $smarty->assign("date_last_edit", $rs->fields['date_last_edit']);
            $smarty->assign("work", strip_tags($rs->fields["work"]));
        }
        $smarty->display("act/add_work.tpl");
        break;
    
    
    case "add_work_act":
        if (isset($id) && !empty($id) && isset($add_work) && isset($work)) {
            if (isset($fail_ck)) {
                foreach ($fail_ck as $v) {
                    $fail = $v . ", " . $fail;
                }
            }
            $work = $fail . $work;
            $rs   = $db->Execute("UPDATE `" . TABLE_REPAIRS . "` SET `work`='" . $work . "', `date_last_edit`=NOW() WHERE `id`='" . $id . "'");
            if ($rs) {
                exit(header("Location: ?page=main"));
            }
        } else {
            exit(header("Location: ?page=main"));
        }
        break;
    
    case "query":
        if (isset($q) && !empty($q) && strlen($q) > 4) {
            $rs = $db->Execute("SELECT `" . TABLE_REPAIRS . "`.*,`" . TABLE_AGENTS . "`.*
                          FROM `" . TABLE_REPAIRS . "`
                          RIGHT JOIN `" . TABLE_AGENTS . "`
                          ON `" . TABLE_REPAIRS . "`.`id_agent`=`" . TABLE_AGENTS . "`.`id_a`
                          WHERE `" . TABLE_AGENTS . "`.`fio`
                          LIKE '%" . $q . "%'");
            
            if ($rs->_numOfRows > 0) {
                while (!$rs->EOF) {
                    $rs1 = $db->Execute("SELECT * FROM `" . TABLE_WORKS . "` WHERE `id_w`='" . $rs->fields["id"] . "'");
                    if ($rs1->_numOfRows > 0) {
                        while (!$rs1->EOF) {
                            $i++;
                            $out[$i]["ver"]   = $rs->fields["id"];
                            $out[$i]["work"]  = $rs1->fields["work"];
                            $out[$i]["summa"] = $rs1->fields["summa"];
                            $rs1->MoveNext();
                        }
                    }
                    
                    $rs->MoveNext();
                }
            }
            $smarty->assign("work", $out);
            $smarty->assign("main_query", $rs);
            $smarty->display('ajax/main_t.tpl');
        } else {
            exit(header("Location: ?page=main_t"));
        }
        break;
    
    case "return":
        if (isset($id) && !empty($id)) {
            $Core->id = $id;
            $rs       = $Core->MainQueryWhereId();
            if ($rs) {
                $rs1 = $db->Execute("INSERT INTO `" . TABLE_REPAIRS . "`
                                   (`id_agent`,
                                    `device`,
                                    `model`,
                                    `s_n`,
                                    `complect`,
                                    `doc`,
                                    `date_sale`,
                                    `view`,
                                    `fail`,
                                    `repair_type`,
                                    `note`,
                                    `summa_in`,
                                    `date_in`,
                                    `manager`,
                                    `date_last_edit`,
                                    `date_add`)
                                            VALUES ('" . $rs->fields["id_agent"] . "',
                                                    '" . $rs->fields["device"] . "',
                                                    '" . $rs->fields["model"] . "',
                                                    '" . $rs->fields["s_n"] . "',
                                                    '" . $rs->fields["complect"] . "',
                                                    '" . $rs->fields["doc"] . "',
                                                    '" . $rs->fields["date_sale"] . "',
                                                    '" . $rs->fields["view"] . "',
                                                    '" . $rs->fields["fail"] . "',
                                                    '" . $rs->fields["repair_type"] . "',
                                                    '" . $rs->fields["note"] . "',
                                                    '" . $rs->fields["summa_in"] . "',
                                                    '" . $rs->fields["date_in"] . "',
                                                    '" . $rs->fields["manager"] . "',
                                NOW(),
                                NOW())");
                if ($rs1) {
                    header("Location: ?page=main");
                } else {
                    echo "MySQL query error:<br>INSERT INTO `" . TABLE_REPAIRS . "`
                                   (`id_agent`,
                                    `device`,
                                    `model`,
                                    `s_n`,
                                    `complect`,
                                    `doc`,
                                    `date_sale`,
                                    `view`,
                                    `fail`,
                                    `repair_type`,
                                    `note`,
                                    `summa_in`,
                                    `date_in`,
                                    `manager`,
                                    `date_last_edit`,
                                    `date_add`)
                                            VALUES ('" . $rs->fields["id_agent"] . "',
                                                    '" . $rs->fields["device"] . "',
                                                    '" . $rs->fields["model"] . "',
                                                    '" . $rs->fields["s_n"] . "',
                                                    '" . $rs->fields["complect"] . "',
                                                    '" . $rs->fields["doc"] . "',
                                                    '" . $rs->fields["date_sale"] . "',
                                                    '" . $rs->fields["view"] . "',
                                                    '" . $rs->fields["fail"] . "',
                                                    '" . $rs->fields["repair_type"] . "',
                                                    '" . $rs->fields["note"] . "',
                                                    '" . $rs->fields["summa_in"] . "',
                                                    '" . $rs->fields["date_in"] . "',
                                                    '" . $rs->fields["manager"] . "',
                                NOW(),
                                NOW())";
                }
            } else {
                echo "Ошибка связи с сервером";
            }
        }
        header("Location: ?page=main");
        break;
    
    case "ch":
        include("libs/ajax.php");
        $Ajax      = new Ajax();
        $Ajax->fio = $_GET['fio'];
        echo $Ajax->CheckAgent();
        break;
    
    case "last_work":
        $Core = new Core();
        if (isset($l_date_day) && isset($l_date_month) && isset($l_date_year)) {
            $smarty->assign("title", "Отчет на " . $l_date_day . "-" . $l_date_month . "-" . $l_date_year);
            $Core->l_date_day   = $l_date_day;
            $Core->l_date_month = $l_date_month;
            $Core->l_date_year  = $l_date_year;
            $smarty->assign("main_query", $Core->MainQueryLast());
            $smarty->display('main/index_last.tpl');
        } else {
            exit(header("Location: ?page=main"));
        }
        break;
    
    case "edit_agent":
        $Ajax         = new Ajax();
        $Ajax->fio    = $fio;
        $Ajax->adress = $adress;
        $Ajax->tel    = $tel;
        $Ajax->id_a   = $id_a;
        echo $Ajax->EditAgent();
        break;
}

if ($page != "edit_agent") {
    $smarty->display("footer.tpl");
}
?>