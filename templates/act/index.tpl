{include file="header.tpl"}
{include file="nav.tpl"}
<h1>Сервисная книга &copy; ООО Рудикон</h1>
<table width="98%" height = "50%"  border="0" align="center" cellpadding="0" cellspacing="0">
<fieldset>
<legend>Таблица клиентов</legend>
  <table width="100%" border="0" align="center" class="tablesorter" cellpadding="0" cellspacing="0">
      <thead>
      	<tr>
      		<th>Действия</th>
      		<th>ФИО</th>
      		<th>Адрес</th>
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
      		<th> </th>
      		<th>{$item.fio}</th>
      		<th>{$item.adress}</th>
      		<th>{$item.tel}</th>
      		<th>{$item.device}</th>
      		<th>{$item.fail}</th>
      		<th>{$item.repair_type}</th>
      		<th>{$item.date_in}</th>
      		<th>{$item.date_out}</th>
      		<th>{$item.summa}</th>
      		<th>{$item.status}</th>
      	</tr>
      {/foreach}
      </tbody>
  </table>
</fieldset>
</table>
