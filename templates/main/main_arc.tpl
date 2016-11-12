{include file="header.tpl"}
{include file="nav.tpl"}
<center>
       {literal}
       <script type="text/javascript">
			$(function() {
			  $('.modalw').nyroModal();
			});
			$(function() {
			  $('.modalw_edit').nyroModal();
			});
			$(function() {
			  $('.modalw_fail').nyroModal();
			});
		</script>
		{/literal}
  <table width="100%" border="0" align="center" id="archive" class="tablesorter" cellpadding="0" cellspacing="1">
      <thead>
      	<tr>
      		<th>№</th>
      		<th>Действия</th>
      		<th>ФИО</th>
      		<th>Телефон</th>
      		<th>Устройство</th>
      		<th>Неисправность</th>
      		<th>Тип ремонта</th>
      		<th>Работы</th>
      		<th>Дата получения</th>
      		<th>Сумма</th>
      	</tr>
      </thead>
      <tbody>
      {if $main_query}
      {foreach from=$main_query item=item}
         <tr>
      		<td>{$item.id}</td>
      		<td width="100px">
      			<a href="?page=return&id={$item.id}"><img src="images/undo.png" alt="Вернуть как повторный с id={$item.id}"></a>
      			<a href="?paage=erase&id={$item.id}"><img src="images/cross.png" alt="Удалить"></a>
      			<a href="?page=edit_row&id={$item.id}" class="modalw_edit"><img src="images/page.png" alt="Редактирование"></a>
                <a class="btnprint" href="?page=kv&id={$item.id}"><img src="images/kv.png" alt="Квитанция"></a>
			<a href="?page=call&id={$item.id}"><img src="images/call.png" width="18" alt="Звонили по заявке № id={$item.id}"></a>
      			<select name="cur_st" id="cur_st" onchange="get_st(this,{$item.id})">
      				<option value="-1" {if $item.cur_st=='-1'}selected{/if}>не смотрели
      				<option value="1" {if $item.cur_st=='1'}selected{/if}>в работе
      				<option value="2" {if $item.cur_st=='2'}selected{/if}>готов
      				<option value="3" {if $item.cur_st=='3'}selected{/if}>оплачен
      				<option value="5" {if $item.cur_st=='5'}selected{/if}>в кредит
      				<option value="4" {if $item.cur_st=='4'}selected{/if}>отдан на руки
      				<option value="-2" {if $item.cur_st=='-2'}selected{/if}>в сервисе
				<option value="-3" {if $item.cur_st=='-3'}selected{/if}>ждет отправки
      			</select>
      		</td>
      		<td>{$item.fio}</td>
      		<td><span id="client_phone">{$item.tel}</span></td>
      		<td>{$item.device}</td>
      		<td>{$item.fail}</td>
      		<td>{$item.repair_type}</td>
      		<td onmousemove="show_edit({$item.id})">
             <div style="display:none;" id="edit_work_{$item.id}">
            	<a class="modalw" href="?page=add_work&id_a={$item.id}"><img class="edit" src="images/page.png" alt="Редактировать"></a>
             </div>
             {$item.work}
             </td>
      		<td>{$item.date_out}</td>
      		<td>{$item.summa_hard}{$item.summa}</td>
      	</tr>
      {/foreach}
      {else}
		<tr>
      		<td colspan="11"><center><b>Нет записей</b></center></td>
      	</tr>
      {/if}
      </tbody>
  </table>
  </center>


