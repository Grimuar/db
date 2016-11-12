<?php /* Smarty version Smarty-3.1.10, created on 2013-11-28 14:43:15
         compiled from "inc\config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26557528a0f08551755-87217720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d0d0073bd1b5ea420fa73db40e8b2727c45a7ad' => 
    array (
      0 => 'inc\\config.tpl',
      1 => 1385642593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26557528a0f08551755-87217720',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_528a0f08665e13_36903844',
  'variables' => 
  array (
    'config_array' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a0f08665e13_36903844')) {function content_528a0f08665e13_36903844($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table align="center" class="tablesorter" width="70%">
		<thead>
		      <tr align="center">
		        <th width="10%">Действия</th>
		      	<th width="20%">Папка с прайсами</th>
		      	<th width="10%">Курс доллара</th>
		      	<th width="10%">Артикул</th>
		      	<th width="10%">Номенклатура</th>
		      	<th width="10%">Количество</th>
		      	<th width="10%">Входящая цена</th>
		      	<th width="10%">Розница поставщика</th>
		      	<th width="10%">Поставщик</th>
		      </tr>
		</thead>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['config_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		   <tr id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onmousemove="showicons(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" onmouseleave="hideicons(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
)" align="center">
		   		<td>
		   			<img id="edit" src="images/edit.png" onclick="edit_string(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,'edit')">
		   			<img style="display:none;" id="save" src="images/save.png" onclick="edit_string(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,'save')">
		   			<img id="erase" src="images/erase.png" onclick="edit_string(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,'erase')">
		   		</td>
		   		<td class="string_dir"><?php echo $_smarty_tpl->tpl_vars['item']->value['dir'];?>
</td>
		   		<td class="string_usd"><?php echo $_smarty_tpl->tpl_vars['item']->value['usd'];?>
</td>
		   		<td class="string_article"><?php echo $_smarty_tpl->tpl_vars['item']->value['string_article'];?>
</td>
		   		<td class="string_string"><?php echo $_smarty_tpl->tpl_vars['item']->value['string_string'];?>
</td>
		   		<td class="string_quantity"><?php echo $_smarty_tpl->tpl_vars['item']->value['string_quantity'];?>
</td>
		   		<td class="string_inprice"><?php echo $_smarty_tpl->tpl_vars['item']->value['string_inprice'];?>
</td>
		   		<td class="string_customerprice"><?php echo $_smarty_tpl->tpl_vars['item']->value['string_customerprice'];?>
</td>
		   		<td class="string_customer"><?php echo $_smarty_tpl->tpl_vars['item']->value['customer'];?>
</td>
			</tr>
		<?php } ?>
            <tr id="add" align="center">
		   		<td>
		   			<img id="add" src="images/add.png" onclick="edit_string(0,'add')">
		   		</td>
		   		<td class="string_dir"><input type='text' value=''></td>
		   		<td class="string_usd"><input type='text' size='2' value=''></td>
		   		<td class="string_article"><input type='text' size='1' value=''></td>
		   		<td class="string_string"><input type='text' size='1' value=''></td>
		   		<td class="string_quantity"><input type='text' size='1' value=''></td>
		   		<td class="string_inprice"><input type='text' size='1' value=''></td>
		   		<td class="string_customerprice"><input type='text' size='1' value=''></td>
		   		<td class="string_customer"><input type='text' size='7' value=''></td>
			</tr>
		</tbody>
</table>
<?php }} ?>