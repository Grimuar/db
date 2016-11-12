<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="print, projection, screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
 {foreach from=$edit item=item}
       <legend>Редактирование записи №{$item.id}</legend>
           <form action="?page=edit_row_act" method="post">
           <input type="hidden" name="row_id" value="{$item.id}">
				{if $code=='main_query_failed'}<font color="#993333"><b>Заполнены не все данные!</b></font>{/if}
				<table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
				      <tr>
				      		<td>Ф.И.О:</td>
				      		<td colspan="2">{$item.fio}</td>
				      </tr>
				      <tr>
				      		<td>Адрес:</td>
				      		<td colspan="2">
				      			{$item.adress}
				      		</td>
				      </tr>
				      <tr>
				      		<td>Телефон:</td>
				      		<td colspan="2">{$item.tel}</td>
				      </tr>
				      <tr>
				      		<td>Устройство</td>
				      		<td colspan="2">
				      			<input type="text" class="stext" name="device" value="{$item.device}">
				      		</td>
				      </tr>
				     <tr>
				      		<td>Модель:</td>
				      		<td colspan="2">
				      			<input type="text" class="stext" name="model" value="{$item.model}">
				      		</td>
				      </tr>
				      <tr>
				      		<td>Серийный номер:</td>
				      		<td colspan="2">
				      			<input type="text" class="stext" name="s_n" value="{$item.s_n}">
				      		</td>
				      </tr>
				      <tr>
      						<td>Дата продажи:</td>
      						<td colspan="2">
      							<input type="text" class="stext" name="date_sale" value="{$item.date_sale}">
      						</td>
      				      </tr>
      				      <tr>
				      		<td>Документ о продаже:</td>
				      		<td colspan="2">
      							<input type="text" class="stext" name="doc" value="{$item.doc}">
      						</td>
      				      </tr>
				      <tr>
				      		<td>Комплект:</td>
				      		<td colspan="2">
				      			<input type="text" class="stext" name="complect" value="{$item.complect}">
				      		</td>
				      </tr>
				      <tr>
				      		<td>Внешний вид:</td>
				      		<td colspan="2">
				      			<input type="text" id="q" class="stext" name="view" value="{$item.view}">
				      		</td>
				      </tr>
				      <tr>
				      		<td>Неисправность <br><small>(со слов клиента)</small></td>
				      		<td colspan="2">
				      			<input type="text" id="q" class="stext" name="fail" value="{$item.fail}">
				      		</td>
				      </tr>
				      <tr>
				      		<td>Тип ремонта</td>
				      		<td colspan="2">
				      			<div class="middle">
				      				<input type="radio" name="repair_type" class="scheck" {if $item.repair_type=='Платный'}checked{/if} value="Платный" checked>Платный
				      				<input type="radio" name="repair_type" class="scheck" {if $item.repair_type=='Проверка качества'}checked{/if} value="Проверка качества">Проверка качества
				      				<input type="radio" name="repair_type" class="scheck" {if $item.repair_type=='Повторный'}checked{/if} value="Повторный">Повторный
				      			</div>
				      		</td>
				      </tr>
				      <tr>
				      		<td>Примечание</td>
				      		<td colspan="2">
						      	<input type="text" class="stext" name="note" value="{$item.note}"></textarea>
				      		</td>
				      </tr>
				      <tr>
				      		<td>Предварительная цена</td>
				      		<td colspan="2">
						      	<input type="text" class="stext" name="summa_in" value="{$item.summa_in}"></textarea>
				      		</td>
				      </tr>
				      <tr>
				      		<td>Дата приема</td>
				      		<td colspan="2">
				      			<input type="text" size="2" class="stext" name="date_in" value="{$item.date_in}">
				      		</td>
				      </tr>
				      <tr>
				      		<td style="background:pink;"><font color="red"><b>Принял(a):</b></font></td>
				      		<td style="background:pink;" colspan="2">
				      			<select name="user">
				      	  			{foreach from=$users item=user}
				                        <option value="{$user.rep}" {if $user.rep==$item.manager}selected{/if}>{$user.rep}&nbsp;
				      	  			{/foreach}
				      			</select>
				      		</td>
				      </tr>
				      <tr>
				      		<td colspan="3"><input type="submit" class="sbutton" name="edit_row" value="Применить редактирование"></td>
				      </tr>
				</table>
				</form>
	    {/foreach}
</body>
</html>