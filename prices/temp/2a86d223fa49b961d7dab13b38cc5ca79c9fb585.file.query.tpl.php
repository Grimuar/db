<?php /* Smarty version Smarty-3.1.10, created on 2013-11-16 11:11:15
         compiled from "inc\query.tpl" */ ?>
<?php /*%%SmartyHeaderCode:160575284e82cc06293-47780257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a86d223fa49b961d7dab13b38cc5ca79c9fb585' => 
    array (
      0 => 'inc\\query.tpl',
      1 => 1384593013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '160575284e82cc06293-47780257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.10',
  'unifunc' => 'content_5284e82cd6ee42_18398314',
  'variables' => 
  array (
    'out_array' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5284e82cd6ee42_18398314')) {function content_5284e82cd6ee42_18398314($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table id="queryTable" class="tablesorter">
<thead>
	<tr>
		<th>Артикул</th>
		<th>Номенклатура</th>
		<th>Количество</th>
		<th>Закуп</th>
		<th>Розница</th>
	</tr>
</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['out_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
      <tr>
      	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['art'];?>
</td>
      	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['string'];?>
</td>
      	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['quant'];?>
</td>
      	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['in_price'];?>
</td>
      	<td><?php echo $_smarty_tpl->tpl_vars['item']->value['our_price'];?>
</td>
      </tr>
<?php } ?>
</tbody>
</table>
<form method="get" action="?act=query">
    <input type="text" name="query_string" size="20">
    <input type="submit">
</form><?php }} ?>