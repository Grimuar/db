{include file="header.tpl"}
{include file="nav.tpl"}

  <div class="left">
       <fieldset>
       <legend>КАТЕГОРИИ РЕМОНТА</legend>
	       <table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
     			 <thead>
	     			<tr>
	     			    <th>Действия</th>
	     			    <th width="100%" colspan="3">Наименование</th>
	     			</tr>
     			</thead>
     			<tbody>
     			{foreach from=$fail_query item=item}
     				<form method="post">
		     			<tr>
		     			    <td align="center">
			     			     <a href="?page=config&act=erase_fail&id={$item.id}"><img src="images/cross.png" alt="Удалить запись {$item.id}"></a>
		     			    </td>
		     			    <td width="100%">
		     			    	<input type="hidden" value="{$hash}" name="hash">
		     			    	<input type="hidden" value="{$item.id}" name="id">
		     			    	<input type="text" class="stext" name="edit_fail" value="{$item.fail}">
		     				</td>
		     				<td>
	     			    		<input type="checkbox" class="scheck" {if $item.checked=='1'}checked{/if} name="default_ch" value="1">
	     					</td>
	     					<td>
		     			    	<input type="image" src="images/page_edit.png">
		     			    </td>
		     			</tr>
	     			</form>
	     		{foreachelse}
	     		    <tr>
	     			    <td colspan="2">Нет записей</td>
	     			</tr>
	     		{/foreach}
	     		<form method="post">
     	  		<input type="hidden" name="add_item" value="{$hash}">
	     		     <tr>
	     			    <td colspan="2" width="100%"><input type="text" name="name_fail" class="stext" value="Добавить запись..." onfocus="if(this.value=='Добавить запись...')this.value='';" onblur="if(this.value=='')this.value='Добавить запись...';"></td>
	     			    <td>
	     			    	<input type="checkbox" class="scheck" name="default_ch" value="1">
	     				</td>
	     				<td>
	     			        <input type="image" style="cursor:pointer;" src="images/add.png" name="add_button" value="add_button">
	     			    </td>
	     			</tr>
	     		</form>
     			</tbody>
     	   </table>
	   </fieldset>

	   <fieldset>
       <legend>ТИПЫ УСТРОЙСТВ</legend>
	       <table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
     			 <thead>
	     			<tr>
	     			    <th>Действия</th>
	     			    <th width="100%" colspan="3">Наименование</th>
	     			</tr>
     			</thead>
     			<tbody>
     			{foreach from=$dev_query item=item}
     				<form method="post">
		     			<tr>
		     			    <td align="center">
			     			     <a href="?page=config&act=erase_dev&id={$item.id}"><img src="images/cross.png" alt="Удалить запись {$item.id}"></a>
		     			    </td>
		     			    <td width="100%">
		     			    	<input type="hidden" value="{$hash}" name="hash">
		     			    	<input type="hidden" value="{$item.id}" name="id">
		     			    	<input type="text" class="stext" name="edit_dev" value="{$item.name}">
		     				</td>
		     				<td>
	     			    		<input type="checkbox" class="scheck" name="default_ch" {if $item.checked=='1'}checked{/if} value="1">
	     					</td>
		     				<td>
		     			    	<input type="image" style="cursor:pointer;" src="images/page_edit.png">
		     			    </td>
		     			</tr>
	     			</form>
	     		{foreachelse}
	     		    <tr>
	     			    <td colspan="2">Нет записей</td>
	     			</tr>
	     		{/foreach}
	     		<form method="post">
     	  		<input type="hidden" name="add_item" value="{$hash}">
	     		     <tr>
	     			    <td colspan="2" width="100%"><input type="text" name="name_dev" class="stext" value="Добавить запись..." onfocus="if(this.value=='Добавить запись...')this.value='';" onblur="if(this.value=='')this.value='Добавить запись...';"></td>
	     			    <td>
	     			    	<input type="checkbox" class="scheck" name="default_ch" value="1">
	     				</td>
	     				<td>
	     			    	<input type="image" style="cursor:pointer;" src="images/add.png" name="add_button" value="add_button">
	     			    </td>
	     			</tr>
	     		</form>
     			</tbody>
     	   </table>
	   </fieldset>

	   <fieldset>
       <legend>СОСТОЯНИЯ УСТРОЙСТВ</legend>
	       <table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
     			 <thead>
	     			<tr>
	     			    <th>Действия</th>
	     			    <th width="100%" colspan="3">Наименование</th>
	     			</tr>
     			</thead>
     			<tbody>
     			{foreach from=$view_query item=item}
     				<form method="post">
		     			<tr>
		     			    <td align="center">
			     			     <a href="?page=config&act=erase_view&id={$item.id}"><img src="images/cross.png" alt="Удалить запись {$item.id}"></a>
		     			    </td>
		     			    <td width="100%">
		     			    	<input type="hidden" value="{$hash}" name="hash">
		     			    	<input type="hidden" value="{$item.id}" name="id">
		     			    	<input type="text" class="stext" name="edit_view" value="{$item.view}">
		     				</td>
		     				<td>
	     			    		<input type="checkbox" class="scheck" name="default_ch" {if $item.checked=='1'}checked{/if} value="1">
	     					</td>
		     				<td>
		     			    	<input type="image" style="cursor:pointer;" src="images/page_edit.png">
		     			    </td>
		     			</tr>
	     			</form>
	     		{foreachelse}
	     		    <tr>
	     			    <td colspan="2">Нет записей</td>
	     			</tr>
	     		{/foreach}
	     		<form method="post">
     	  		<input type="hidden" name="add_item" value="{$hash}">
	     		     <tr>
	     			    <td colspan="2" width="100%"><input type="text" name="name_view" class="stext" value="Добавить запись..." onfocus="if(this.value=='Добавить запись...')this.value='';" onblur="if(this.value=='')this.value='Добавить запись...';"></td>
	     			    <td>
	     			    	<input type="checkbox" class="scheck" name="default_ch" value="1">
	     				</td>
	     				<td>
	     			    	<input type="image" src="images/add.png" style="cursor:pointer;" name="add_button" value="add_button">
	     			    </td>
	     			</tr>
	     		</form>
     			</tbody>
     	   </table>
	   </fieldset>

	   <fieldset>
       <legend>РАЗНАЯ ИНФОРМАЦИЯ</legend>
	       <table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
     			 <thead>
	     			<tr>
	     			    <th>Действия</th>
	     			    <th width="100%" colspan="3">Наименование</th>
	     			</tr>
     			</thead>
     			<tbody>
     			{foreach from=$note_query item=item}
     				<form method="post">
		     			<tr>
		     			    <td align="center">
			     			     <a href="?page=config&act=erase_note&id={$item.id}"><img src="images/cross.png" alt="Удалить запись {$item.id}"></a>
		     			    </td>
		     			    <td width="100%">
		     			    	<input type="hidden" value="{$hash}" name="hash">
		     			    	<input type="hidden" value="{$item.id}" name="id">
		     			    	<input type="text" class="stext" name="edit_note" value="{$item.name}">
		     				</td>
		     				<td>
	     			    		<input type="checkbox" class="scheck" name="default_ch" {if $item.checked=='1'}checked{/if} value="1">
	     					</td>
		     				<td>
		     			    	<input type="image" style="cursor:pointer;" src="images/page_edit.png">
		     			    </td>
		     			</tr>
	     			</form>
	     		{foreachelse}
	     		    <tr>
	     			    <td colspan="2">Нет записей</td>
	     			</tr>
	     		{/foreach}
	     		<form method="post">
     	  		<input type="hidden" name="add_item" value="{$hash}">
	     		     <tr>
	     			    <td colspan="2" width="100%"><input type="text" name="name_note" class="stext" value="Добавить запись..." onfocus="if(this.value=='Добавить запись...')this.value='';" onblur="if(this.value=='')this.value='Добавить запись...';"></td>
	     			    <td>
	     			    	<input type="checkbox" class="scheck" name="default_ch" value="1">
	     				</td>
	     				<td>
	     			    	<input type="image" src="images/add.png" style="cursor:pointer;" name="add_button" value="add_button">
	     			    </td>
	     			</tr>
	     		</form>
     			</tbody>
     	   </table>
	   </fieldset>
  </div>


