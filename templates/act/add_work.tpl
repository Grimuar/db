<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="print, projection, screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form action="?page=add_work_act" method="post">
<table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
      <thead>
          <th colspan="2">Список работ и услуг /
          				  {if $date_last_edit=='0000-00-00 00:00:00'}Редактировалось до 05.01.2012{else}Последнее редактирование: {$date_last_edit}{/if}</th>
      </thead>
      <tbody>
	      <tr>
	      		<td width="50%">
	      			{foreach from=$fail_query item=item}
						<input type="checkbox" class="scheck" name="fail_ck[]" value="{$item.fail}">{$item.fail} - {$item.price} руб<br>
					{/foreach}
	      		</td>
	      		<td width="50%">
	      			<textarea name="work" cols="40" rows="10" style="width:100%">{$work}</textarea>
	      		</td>
	      </tr>
	      		<input type="hidden" value="{$id_a}" name="id">
	      		<td colspan="2"><input type="submit" name="add_work" class="sbutton" value="Добавить"></td>
	      </tr>
      </tbody>
</table>
</form>
</body>
</html>
