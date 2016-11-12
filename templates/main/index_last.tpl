{include file="header.tpl"}
{include file="nav.tpl"}
<center>
  <table width="100%" border="0" align="center" id="clients" class="table_user" cellpadding="0" cellspacing="1">
      <thead>
      	<tr>
      		<th>Действия</th>
      		<th>ФИО</th>
      		<th>Адрес</th>
      		<th>Телефон</th>
      		<th>Устройство</th>
      		<th>Тип ремонта</th>
      		<th>Неисправность</th>
      		<th>Примечание</th>
      		<th>Выполненные работы</th>
      		<th>Дата приема</th>
      		<th>Сумма</th>
      	</tr>
      </thead>

      <tbody>
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
	{if $main_query}
      {foreach from=$main_query item=item}
         <tr onmousemove="show_edit({$item.id})" class="{if $item.cur_st=='1'}color_st1{/if}{if $item.cur_st=='2'}color_st2{/if}{if $item.cur_st=='-1'}color_st3{/if}{if $item.cur_st=='-2'}color_st4{/if}">
      		<td style="min-width:120px;">
		      <a href="?page=edit_row&id={$item.id}" class="modalw_edit"><img src="images/page.png" alt="Редактирование"></a>
              <a class="btnprint" href="?page=kv&id={$item.id}"><img src="images/kv.png" alt="Квитанция"></a>
      			<a href="?page=return&id={$item.id}"><img src="images/undo.png" alt="Вернуть как повторный с id={$item.id}"></a>
			<a href="?page=call&id={$item.id}"><img src="images/call.png" width="18" alt="Звонили по заявке № id={$item.id}"></a>
			<select name="cur_st" id="cur_st" onchange="get_st(this,{$item.id},{if $display==''}0{else}{$display}{/if})">
      				<option value="-1" {if $item.cur_st=='-1'}selected{/if}>не смотрели
      				<option value="1" {if $item.cur_st=='1'}selected{/if}>в работе
      				<option value="2" {if $item.cur_st=='2'}selected{/if}>готов
      				<option value="3" {if $item.cur_st=='3'}selected{/if}>оплачен
      				<option value="4" {if $item.cur_st=='4'}selected{/if}>отдан на руки
      				<option value="-2" {if $item.cur_st=='-2'}selected{/if}>в сервисе
				<option value="-3" {if $item.cur_st=='-3'}selected{/if}>ждет отправки
      			</select>
      		</td>
      		<td style="width:15%; max-width:15%;"><a href="?page=show_agent&id={$item.id_a}">{$item.fio}</a></td>
      		<td width="10%">{$item.adress}</td>
      		<td width="10%">{$item.tel}</td>
      		<td width="10%">{$item.device}</td>
      		<td width="10%">{$item.repair_type}</td>
      		<td width="10%">{$item.fail}</td>
      		<td width="10%">{$item.note}</td>
            <td style="width:20%; max-width:20%;">
				<a class="modalw" href="?page=add_work&id_a={$item.id}">
					<img style="display:none;" id="edit_work_{$item.id}" class="edit" src="images/page.png" alt="Редактировать">
				</a>
				{$item.work}
            </td>
      		<td>
	      		<center>{$item.date_in}</center>
      		</td>
      		<td width="10%">
			<input type="text" class="stext_hard" name="summa_hard" value="{$item.summa_hard}" onchange="pay_hard(this,{$item.id})">
			<input type="text" class="stext_soft" name="summa" value="{$item.summa}" onchange="pay(this,{$item.id})">
      		</td>
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


