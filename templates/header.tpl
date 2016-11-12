<html>
<head>
<link rel="shortcut icon" href="favicon.png" >
<link rel="stylesheet" href="css/style.css" type="text/css" media="print, projection, screen" />
<link rel="stylesheet" href="css/nyroModal.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/datepicker.css" type="text/css" />
<link rel="stylesheet" media="screen" type="text/css" href="css/layout.css" />
<style>{literal}
table.table_user tbody tr.color_st1 td {
	background-color: {/literal}{$color_st1}{literal};
}
table.table_user tbody tr.color_st2 td {
	background-color: {/literal}{$color_st2}{literal};
}
table.table_user tbody tr.color_st3 td {
	background-color: {/literal}{$color_st3}{literal};
}
table.table_user tbody tr.color_st4 td {
	background-color: {/literal}{$color_st4}{literal};
}
table.table_user tbody tr.color_st5 td {
	background-color: {/literal}{$color_st5}{literal};
	}{/literal}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {literal}
		<script type="text/javascript" src="js/jquery-latest.js"></script>
		<script type="text/javascript" src="js/jquery.nyroModal.custom.min.js"></script>
		<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
		<script type="text/javascript" src="js/ui.tablesorter.js"></script>
        <script type="text/javascript">
        function check_agent(str)
			{
				$.get("index.php", {page: 'ch', fio: str.value},
   				function(data){   					$('#agent_adr').val(data.adr);
    				$('#agent_tel').val(data.tel);
   				}, "json");
			}
		function show_edit(str)
			{

           		$("#edit_work_"+str).removeAttr('style');
           		//$("#edit_work_"+str).attr('style','position:relative;');
           		$(this).bind("mouseleave",function(){
          		$("#edit_work_"+str).attr('style','display:none;');});
          		//$("#edit_work_"+str).fadeOut('fast');
			}
		    function edit_agent()
			{
				//alert("index.php?page=edit_agent&id_a="+$('#id_a').val()+"&fio="+$('#fio').val()+"&adress="+$('#adress').val()+"&tel="+$('#tel').val());
				$.get("index.php",
					{
						page: 'edit_agent',
						id_a: $('#id_a').val(),
                 		fio: $('#fio').val(),
                 		adress: $('#adress').val(),
                 		tel: $('#tel').val()
					},
   				function(data){
                 		$('#msg').attr('class','red'),
                 		$('#msg').text(data.msg)
   				},"json");

			}
			
			function print_tel(str) {
				str = str.replace(/(\.(.*))/g, '');
				var arr = str.split('');
				var str_temp = '';
				if (str.length > 3) {
					for (var i = arr.length - 1, j = 1; i >= 0; i--, j++) {
						str_temp = arr[i] + str_temp;
						if (j % 3 == 0) {
							str_temp = ' ' + str_temp;
						}
					}
					return str_temp;
				} else {
					return str;
				}
			}
			
			$(function() {
			  $('.modalw').nyroModal();
			  $("#archive").tablesorter({sortList:[[0,0]], widgets: ['zebra']});
			  $( "span" ).each(function( index ) {
				  $( this ).text(print_tel($( this ).text()));
				});
			});
			
		</script>
		<script type="text/javascript" src="js/create-request.js"></script>
		<script type="text/javascript" src="js/time.js"></script>
		<script type="text/javascript">
			function table_update()
			{
				$('#clients').load("?page=main_t");
			}

			function query(str)
			{
				xmlhttp=createRequestObject();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState=='4' && xmlhttp.status=='200')
				    {
					    $('#clients').load("?page=query&q="+str.value);
				    }
				  }						xmlhttp.open("GET","?page=query&q="+str.value,true);
						xmlhttp.send();
				}

            function show_gar()
			{
				$('#garant').attr('style','background-color:red;');
			}
			setInterval ("table_update()", {/literal}{$table_timeout}{literal});
		</script>
		<script type="text/javascript">
			function send()
				{
					window.open("?page=between&begin="+$('#begin').val()+"&end="+$('#end').val());
				}
		</script>
		<script type="text/javascript" src="js/ajax.js"></script>
		<script type="text/javascript" src="js/datepicker.js"></script>
    		<script type="text/javascript" src="js/eye.js"></script>
   		<script type="text/javascript" src="js/utils.js"></script>
    		<script type="text/javascript" src="js/layout.js?ver=1.0.2"></script>
	{/literal}
<title>{if $title!=''}{$title} - {/if}Сервисная книга Компьютерный центр</title>
</head>
<body>
