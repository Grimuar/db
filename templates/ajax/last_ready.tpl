<thead>
      	<tr>
      		<th>ФИО</th>
      		<th>Телефон</th>
      		<th>Устройство</th>
      		<th>Тип ремонта</th>
      		<th>Примечание</th>
      		<th>Дата приема</th>
      		<th>Дата получения</th>
      		<th>Сумма</th>
      		<th>Статус</th>
      	</tr>
      </thead>

      <tbody>
      {foreach from=$main_query item=item}
         <tr>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>
      			<img src="images/cross.png" alt="Удалить запись {$item.id}" style="cursor:pointer;" onclick="del_str({$item.id})">
      			<select name="cur_st" id="cur_st" onchange="get_st(this,{$item.id})">
      				<option value="-1" {if $item.cur_st=='-1'}selected{/if}>не смотрели&nbsp;
      				<option value="1" {if $item.cur_st=='1'}selected{/if}>в работе&nbsp;
      				<option value="2" {if $item.cur_st=='2'}selected{/if}>готов&nbsp;
      			</select>
      		</td>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>{$item.fio}</td>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>{$item.adress}</td>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>{$item.tel}</td>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>{$item.device}</td>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>{$item.fail}</td>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>{$item.repair_type}</td>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>{$item.date_in}</td>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>{$item.date_out}</td>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>{$item.summa}</td>
      		<td {if $item.cur_st=='1'}style="background:#ddffdd;"{/if}{if $item.cur_st=='-1'}style="background:#ffdddd;"{/if}>{$item.status}</td>
      	</tr>
      {foreachelse}
		<tr>
      		<td colspan="11"><center><b>Нет записей</b></center></td>
      	</tr>
      {/foreach}
      </tbody>