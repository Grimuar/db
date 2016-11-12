{include file="header.tpl"}
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
		{foreach from=$config_array item=item}
		   <tr id="{$item.id}" onmousemove="showicons({$item.id})" onmouseleave="hideicons({$item.id})" align="center">
		   		<td>
		   			<img id="edit" src="images/edit.png" onclick="edit_string({$item.id},'edit')">
		   			<img style="display:none;" id="save" src="images/save.png" onclick="edit_string({$item.id},'save')">
		   			<img id="erase" src="images/erase.png" onclick="edit_string({$item.id},'erase')">
		   		</td>
		   		<td class="string_dir">{$item.dir}</td>
		   		<td class="string_usd">{$item.usd}</td>
		   		<td class="string_article">{$item.string_article}</td>
		   		<td class="string_string">{$item.string_string}</td>
		   		<td class="string_quantity">{$item.string_quantity}</td>
		   		<td class="string_inprice">{$item.string_inprice}</td>
		   		<td class="string_customerprice">{$item.string_customerprice}</td>
		   		<td class="string_customer">{$item.customer}</td>
			</tr>
		{/foreach}
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
