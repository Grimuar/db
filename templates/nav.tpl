<div id="nav">

<div class="label">
     <input type="text" class="q_text" name="q" onkeyup="query(this)" value="поиск..." onfocus="if(this.value=='поиск...')this.value='';" onblur="if(this.value=='')this.value='поиск...';">
</div>
       <div class="nav_p">
       <!--  	<div id="time"><script type="text/javascript">document.write(time())</script></div>-->
			 <div class="navig">
			 	<a href="?page=main">Главная таблица</a> |
			 	<a href="?page=add_form" class="modalw">Добавить запись</a> |
			 	<a href="?page=main_arc">Архив</a> |
				<a href="?page=config">Конфигурация</a> |
			 	<a href="libs/backend.php" class="modalw">Бэкап</a> |
				<a href="http://192.168.0.110/db/">Старая БД</a>
			</div>

         </div>
        {literal}
        <script type="text/javascript">
	$('#inputDate').DatePicker({
	format:'Y-m-d',
	date: $('#inputDate').val(),
	current: $('#inputDate').val(),
	starts: 1,
	position: 'r',
	onBeforeShow: function(){
		$('#inputDate').DatePickerSetDate($('#inputDate').val(), true);
	},
	onChange: function(formated, dates){
		$('#inputDate').val(formated);
		if ($('#closeOnSelect input').attr('checked')) {
			$('#inputDate').DatePickerHide();
		}
	}
});
$('#inputDate2').DatePicker({
	format:'Y-m-d',
	date: $('#inputDate2').val(),
	current: $('#inputDate2').val(),
	starts: 1,
	position: 'r',
	onBeforeShow: function(){
		$('#inputDate2').DatePickerSetDate($('#inputDate2').val(), true);
	},
	onChange: function(formated, dates){
		$('#inputDate2').val(formated);
		if ($('#closeOnSelect input').attr('checked')) {
			$('#inputDate2').DatePickerHide();
		}
	}
});
	</script>
	{/literal}

         <div class="label" style="margin-left:830px;">
		с <input size="10" id="begin" value="{$smarty.now|date_format:"%Y-%m-%d"}" /> по
                <input size="10" id="end" value="{$smarty.now|date_format:"%Y-%m-%d"}" />
                <input type="button" class="but" value="Отчет" onclick="send()">
      </div>

<div class="line"></div>
</div>
<div style="padding-top:50px;">