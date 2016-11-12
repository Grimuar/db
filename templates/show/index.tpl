{include file="header.tpl"}
{include file="nav.tpl"}
   {literal}
       <script type="text/javascript">
			$(function() {
			  $('.modalw_edit').nyroModal();
			});
		</script>
		{/literal}
  <div style="float:left; width:20%;">
       <fieldset>
       <legend>Клиент № {$id_a}</legend>
       <input type="hidden" value="{$id_a}" name="id_a" id="id_a">
         <table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
         	<tr>
         		<td>ФИО</td>
         		<td><input type="text" id="fio" name="fio" class="stext" value="{$fio}"></td>
         	</tr>
         	<tr>
         		<td>Адрес</td>
         		<td><input type="text" id="adress" name="adress" class="stext" value="{$adress}"></td>
         	</tr>
         	<tr>
         		<td>Телефон</td>
         		<td><input type="text" id="tel" name="tel" class="stext" value="{$tel}"></td>
         	</tr>
         	<tr>
         		<td colspan="2"><input type="button" class="sbutton" onclick="edit_agent()" value="Сохранить"></td>
         	</tr>
         </table>
         <center><span class="blue" id="msg">Отредактируйте данные</span></center>
	   </fieldset>
  </div>
  <div style="float:right; width:80%;">
       <fieldset>
       <legend>Устройства, сданные на ремонт клиентом с именем <b>{$fio}</b></legend>
	       <table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
     			 <thead>
	     			<tr>
	     			    <th>Действия</th>
	     			    <th width="20%">Устройство</th>
	     			    <th width="20%">Тип ремонта</th>
	     			    <th width="20%">Неисправность</th>
	     			    <th width="20%">Примечание</th>
	     			    <th width="20%">Выполненные работы</th>
	     			    <th width="20%">Дата приема</th>
	     			    <th width="20%">Дата выдачи</th>
	     			    <th width="20%">Сумма</th>
	     			</tr>
     			</thead>
     			<tbody>
     			{foreach from=$repairs item=item}
		     			<tr>
		     			    <td align="center">
			     			     <a href="?page=edit_row&id={$item.id}" class="modalw_edit"><img src="images/page.png" alt="Редактирование"></a>
                                 <a href="?page=kv&id={$item.id}"><img src="images/kv.png" alt="Квитанция"></a>
		     			<a href="?page=return&id={$item.id}" class="modalw"><img src="images/undo.png" alt="Вернуть как повторный с id={$item.id}"></a>
					</td>
		     			    <td width="20%">{$item.device}</td>
		     			    <td width="20%">{$item.repair_type}</td>
		     			    <td width="20%">{$item.fail}</td>
		     			    <td width="20%">{$item.note}</td>
		     			    <td width="20%">{$item.work}</td>
		     			    <td width="20%">{$item.date_in}</td>
		     			    <td width="20%">{$item.date_out}</td>
		     			    <td width="20%">{$item.summa}</td>

		     			</tr>
	     			</form>
	     		{foreachelse}
	     		    <tr>
	     			    <td colspan="2">Нет записей</td>
	     			</tr>
	     		{/foreach}

     			</tbody>
     	   </table>
	   </fieldset>
  </div>
