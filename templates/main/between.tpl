{include file="header.tpl"}
{include file="nav.tpl"}	
			<center><h1>Отчет по сервису</h1>
					<h2>c {$begin} по {$end}</h2></center>	
			<table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
                	<thead>
                	<tr>
                		<th>ФИО клиента</th>
                		<th>Выполненные работы</th>
                		<th>Дата выдачи</th>
                		<th width="8%">Сумма по работам</th>
                		<th width="8%">Сумма по железу</th>
                		<th width="8%">Сумма за день</th>
                	</tr>
                	</thead>
                	<tbody>
                	{foreach from=$query_sum item=item}
                	<tr>
                		<td>{$item.fio}</td>
                		<td>{$item.work}</td>
                		<td>{$item.date}</td>
                		<td><b>{if $item.summa==""}0{else}{$item.summa}{/if} руб</b></td>
                		<td><b>{if $item.summa_hard==""}0{else}{$item.summa_hard}{/if} руб</b></td>
                		<td><b><font color="green">{if $item.summa_hard+$item.summa==""}0{else}{$item.summa_hard+$item.summa}{/if} руб</font></b></td>
                	</tr>
                	{foreachelse}
                	<tr>
                		<td colspan="6">Нет записей</td>
                	</tr>
                	{/foreach}
                	<td colspan="3" align="right"><big><b style="color:red">Всего клиентов: {$q_kontrag}</b></big></td>
                	<td><big><b style="color:red">{if $summa==""}0{else}{$summa}{/if} руб</b></big></td>
                	<td><big><b style="color:red">{if $summa_hard==""}0{else}{$summa_hard}{/if} руб</b></big></td>
                	<td><big><b style="color:red">{if $summa_hard+$summa==""}0{else}{$summa_hard+$summa}{/if} руб</b></big></td>
                	</tbody>
			</table>	
				
				
</body>
</html>