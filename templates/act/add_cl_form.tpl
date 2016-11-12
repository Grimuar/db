<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="print, projection, screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
{literal}
                <script type="text/javascript" src="js/jquery-latest.js"></script>
		<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
		<script type="text/javascript">

            $(document).ready(function() {
				$('#ac_fio').autocomplete('autocomplete/fio.php', {
			    delay:10,
			    minChars:3,
			    matchSubset:1,
			    autoFill:false,
			    maxItemsToShow:5
			    }
			  );
			});
		</script>
	<script type="text/javascript">
            function show_gar() 
			{
				$('#garant_sn').attr('style','background-color:LightCoral');
				$('.bold').attr('style','font-weight:bold');
				$('.hide').fadeIn("slow");
				$('.hide2').fadeIn("slow");
				$('.hide3').fadeIn("slow");
			}
	    function hide_gar() 
			{
				$('#garant_sn').removeAttr('style');
				$('.bold').removeAttr('style');
				$('.hide').fadeOut("slow");
				$('.hide2').fadeOut("slow");
				$('.hide3').fadeOut("slow");
			}
		</script>
	
	{/literal}
</head>
<body>
<div id="add_cl_form">
<center><h2>Добавление записи</h2></center>
<form action="?page=add_row" method="post">
{if $code=='main_query_failed'}<font color="#993333"><b>Заполнены не все данные!</b></font>{/if}
<table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
      <tr>
      		<td>Ф.И.О:</td>
      		<td colspan="2"><input type="text" class="stext" id="ac/_fio" name="fio" required="required" placeholder="ФИО" onkeyup="check_agent(this)" size="0"></td>
      </tr>
      <tr>
      		<td>Телефон:</td>
      		<td colspan="2"><input type="text" id="agent_tel" class="stext" required="required" placeholder="Телефон" name="tel" size="0"></td>
      </tr>
      <tr>
      		<td><b>Тип ремонта:</b></td>
      		<td colspan="2">
      			<div class="middle">
      				<input type="radio" name="repair_type" onclick="hide_gar()" class="scheck" value="Платный" checked>Платный
      				<input type="radio" name="repair_type" class="scheck" onclick="show_gar()" value="Проверка качества">Проверка качества
      				<input type="radio" name="repair_type" onclick="hide_gar()"  class="scheck"  value="Повторный">Повторный
      			</div>
      		</td>
      </tr>
      <tr>
      		<td>Устройство:</td>
      		<td colspan="2">
      		{foreach from=$dev_query item=item}
        		<input type="checkbox" name="dev_ck[]" class="scheck" {if $item.checked=='1'}checked{/if} value="{$item.name}">{$item.name}&nbsp;&nbsp;|&nbsp;&nbsp;
      		{/foreach}
      			<input type="text" class="stext" name="device" placeholder="другое...">
      		</td>
      </tr>
      <tr>
      		<td>Модель:</td>
      		<td colspan="2">
      			<input type="text" class="stext" name="model" placeholder="Модель" value="{$model}">
      		</td>
      </tr>
      <tr>
      		<td><span class="bold">Серийный номер:</span></td>
      		<td colspan="2">
      			<input type="text" id="garant_sn" class="stext" placeholder="Серийный номер" name="s_n" value="{$s_n}">
      		</td>
      </tr>
      <tr class="hide" style="display:none;">
      		<td><b>Дата продажи:</b></td>
      		<td colspan="2">
      			<input type="text" style="background-color:LightCoral" placeholder="Дата продажи" class="stext" name="date_sale" value="{$item.date_sale}">
      		</td>
      </tr>
      <tr class="hide" style="display:none;">
      		<td class="hide" style="display:none;"><b>Документ о продаже:</b></td>
      		<td class="hide" style="display:none;" colspan="2">
      			<input type="text" style="background-color:LightCoral" placeholder="Документ о продаже" class="stext" name="doc" value="{$item.date_doc}">
      		</td>
      </tr>
      <tr class="hide" style="display:none;">
      		<td class="hide" style="display:none;"><b>Комплект:</b></td>
      		<td class="hide" style="display:none;" colspan="2">
      			<input type="text" style="background-color:LightCoral" class="stext" name="complect" value="полный комплект" onfocus="if(this.value=='полный комплект')this.value='';" onblur="if(this.value=='')this.value='полный комплект';"">
      		</td>
      </tr>
      <tr>
      		<td>Внешний вид:</td>
      		<td colspan="2">
      		{foreach from=$view_query item=item}
      			<input type="checkbox" name="view_ck[]" class="scheck" {if $item.checked=='1'}checked{/if} value="{$item.view}">{$item.view}&nbsp;&nbsp;|&nbsp;&nbsp;
      		{/foreach}
      			<input type="text" id="garant_vw" class="stext" name="view" placeholder="Внешний вид" value="{$view}">
      		</td>
      </tr>
      <tr>
      		<td>Неисправность <br><small>(со слов клиента):</small></td>
      		<td colspan="2">
      		{foreach from=$fail_query item=item}
      			<input type="checkbox" name="fail_ck[]" class="scheck" {if $item.checked=='1'}checked{/if} value="{$item.fail}">{$item.fail}&nbsp;&nbsp;|&nbsp;&nbsp;
      		{/foreach}
      			<input type="text" id="q" class="stext" name="fail" placeholder="Неисправность">
      		</td>
      </tr>
      
      <tr>
      		<td>Примечание</td>
      		<td colspan="2">
		    {foreach from=$note_query item=item}
      			<input type="checkbox" name="note_ck[]" class="scheck" {if $item.checked=='1'}checked{/if} value="{$item.name}">{$item.name}
      		{/foreach}
		      	<input type="text" class="stext" name="note" placeholder="Примечание">
      		</td>
      </tr>
      <tr>
      		<td>Предварительная цена</td>
      		<td colspan="2">
      			<div class="middle">
      				<input type="text" class="stext" name="summa_in" placeholder="Предварительная сумма" value="">
      			</div>
      		</td>
      </tr>
      <tr>
      		<td>Дата приема</td>
      		<td colspan="2">
      			<select name="date_day">
      	 		  {foreach from=$day_query item=item}
      			    <option {if $item==$smarty.now|date_format:"%d"}selected{/if}>{$item}
      		      {/foreach}
      			</select>
      			<select name="date_month">
      	 		  {foreach from=$month_query item=item}
      			    <option {if $item==$smarty.now|date_format:"%m"}selected{/if} value="{$item}">
      			    	{if $item=='01'}января{/if}
      			    	{if $item=='02'}февраля{/if}
      			    	{if $item=='03'}марта{/if}
      			    	{if $item=='04'}апреля{/if}
      			    	{if $item=='05'}мая{/if}
      			    	{if $item=='06'}июня{/if}
      			    	{if $item=='07'}июля{/if}
      			    	{if $item=='08'}августа{/if}
      			    	{if $item=='09'}сентября{/if}
      			    	{if $item=='10'}октября{/if}
      			    	{if $item=='11'}ноября{/if}
      			    	{if $item=='12'}декабря{/if}
      		      {/foreach}
      			</select>
      			<select name="date_year">
      			    <option value="{$smarty.now|date_format:"%Y"}">{$smarty.now|date_format:"%Y"}
      			</select>
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
      		<td colspan="3"><input type="submit" class="sbutton" name="add_row" value="Добавить запись"></td>
      </tr>
</table>
</form>
</div>
</body>
</html>
