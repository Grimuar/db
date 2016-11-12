<html>
<head>
<meta charset="cp1251">
  <title>Поиск по всем прайсам</title>
  <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="js/ui.tablesorter.js"></script>
  <script type="text/javascript" src="js/confirm.js"></script>
  <link rel="stylesheet" media="screen" type="text/css" href="css/style.css" />
  <script type="text/javascript">
  {literal}
  $(document).ready(function()
    {
        $("#queryTable").tablesorter({sortList:[[0,0]], widgets: ['zebra']});
    }
  {/literal}
  </script>
  <script type="text/javascript">
  {literal}
  function search()
      {
		var query_str = $('#query_string').val();
		if(query_str.length > 3)
			{
			      $.get("index.php", {act:'search', query_string: query_str},
				  function(data)
				  	{
				  		$('table').empty();
				  		var tr;
				  		var thead;
				  		var i;
				  		$('table').append("<thead><tr><th>DST</th><th>Артикул</th><th>Номенклатура</th><th>Закуп</th><th>Рекоменд</th><th>Розница</th></tr></thead><tbody>");
				        for (i in data)
				        	{
						    	tr = $('<tr/>');
								tr.append("<td>" + data[i].customer + "</td>");
						        tr.append("<td>" + data[i].art + "</td>");
						        tr.append("<td><a href='http://yandex.ru/yandsearch?text=" + data[i].str + "&lr=22' target='_blank'>" + data[i].str + "</a></td>");
						        tr.append("<td>" + data[i].in_price + "</td>");
						        tr.append("<td>" + data[i].out_customer_price + "</td>");
						        tr.append("<td>" + data[i].our_price + "</td>");
						        $('table').append(tr);
				             }
				 		$('table').append("</tbody>");
					}, 'json');
			}
	  }

    function update_price()
      {
	  	$('#ajaxload').show(10);
	  	$('#updateinfo').attr('style','color:#444;');
	  	$.get("index.php?act=update_price",
	  			function(data)
				  	{
				       $('#ajaxload').hide(10);
				       $('#updateinfo').removeAttr('style');
				       $('#count').empty();
				       $('#count').attr('style','color:red;');
				       $('#count').append(data);
				  	},'json');
	  }

	function edit_string(id, action)
      {
        if(action=='edit')
        	{
		        $('#'+id+' td #save').removeAttr('style');
		        var config_dir = ($('#'+id+' .string_dir').text());
				var config_usd = ($('#'+id+' .string_usd').text());
				var config_article = ($('#'+id+' .string_article').text());
				var config_string = ($('#'+id+' .string_string').text());
				var config_quantity = ($('#'+id+' .string_quantity').text());
				var config_inprice = ($('#'+id+' .string_inprice').text());
				var config_customerprice = ($('#'+id+' .string_customerprice').text());
				var config_customer = ($('#'+id+' .string_customer').text());
		        $('#'+id+' .string_dir').empty();
		        $('#'+id+' .string_usd').empty();
		        $('#'+id+' .string_article').empty();
		        $('#'+id+' .string_string').empty();
		        $('#'+id+' .string_quantity').empty();
		        $('#'+id+' .string_inprice').empty();
		        $('#'+id+' .string_customerprice').empty();
		        $('#'+id+' .string_customer').empty();
		        $('#'+id+' .string_dir').append("<input type='text' value='"+config_dir+"'>");
		        $('#'+id+' .string_usd').append("<input type='text' size='2' value='"+config_usd+"'>");
		        $('#'+id+' .string_article').append("<input type='text' size='1' value='"+config_article+"'>");
		        $('#'+id+' .string_string').append("<input type='text' size='1' value='"+config_string+"'>");
		        $('#'+id+' .string_quantity').append("<input type='text' size='1' value='"+config_quantity+"'>");
		        $('#'+id+' .string_inprice').append("<input type='text' size='1' value='"+config_inprice+"'>");
		        $('#'+id+' .string_customerprice').append("<input type='text' size='1' value='"+config_customerprice+"'>");
		        $('#'+id+' .string_customer').append("<input type='text' size='7' value='"+config_customer+"'>");
		        $('#'+id+' td #save').show(100);
		        $('#'+id+' td #edit').hide(100);
		    }
	if(action=='add')
        	{
        	$.get("index.php", {
                		act:'config',
                		id: id,
                		action: action,
                		config_dir: $('#add .string_dir input').val(),
                		config_usd: $('#add .string_usd input').val(),
                		config_article: $('#add .string_article input').val(),
                		config_string: $('#add .string_string input').val(),
                		config_quantity: $('#add .string_quantity input').val(),
                		config_inprice: $('#add .string_inprice input').val(),
                		config_customerprice: $('#add .string_customerprice input').val(),
                		config_customer: $('#add .string_customer input').val()},
				  function(data)
				  	{
				       location.reload();
				  	},'html');
		    }
	     if(action=='erase')
        	{
		       var elem = $(this).closest('.item');

		        $.confirm({
		            'title'        : 'Подтверждение удаления',
		            'message'    : 'Удалить строку навсегда?',
		            'buttons'    : {
		                'Удалить'    : {
		                    'class'    : 'blue',
		                    'action': function(){
		                        elem.slideUp();
				                $.get("index.php", {
		                		act:'config',
		                		id: id,
		                		action: action},
						  function(data)
						  	{
		                        $('#'+id).hide(500);
		                        $('#'+id).empty();
						  	},'html');
		                    }
		                },
		                'Отмена'    : {
		                    'class'    : 'gray',
		                    'action': function(){}
		                }
		            }
		        });
		    }
	     if(action=='save')
        	{
                var config_dir = $('#'+id+' .string_dir input').val();
				var config_usd = $('#'+id+' .string_usd input').val();
				var config_article = $('#'+id+' .string_article input').val();
				var config_string = $('#'+id+' .string_string input').val();
				var config_quantity = $('#'+id+' .string_quantity input').val();
				var config_inprice = $('#'+id+' .string_inprice input').val();
				var config_customerprice = $('#'+id+' .string_customerprice input').val();
				var config_customer = $('#'+id+' .string_customer input').val();
                var elem = $(this).closest('.item');

		        $.confirm({
		            'title'        : 'Сохранение данных',
		            'message'    : 'Сохранить изменения?',
		            'buttons'    : {
		                'Ок'    : {
		                    'class'    : 'blue',
		                    'action': function(){
		                        elem.slideUp();
				                $.get("index.php", {
                		act:'config',
                		id: id,
                		action: action,
                		config_dir: config_dir,
                		config_usd: config_usd,
                		config_article: config_article,
                		config_string: config_string,
                		config_quantity: config_quantity,
                		config_inprice: config_inprice,
                		config_customerprice: config_customerprice,
                		config_customer: config_customer},
				  function(data)
				  	{
                        $('#'+id+' .string_dir').empty();
				        $('#'+id+' .string_usd').empty();
				        $('#'+id+' .string_article').empty();
				        $('#'+id+' .string_string').empty();
				        $('#'+id+' .string_quantity').empty();
				        $('#'+id+' .string_inprice').empty();
				        $('#'+id+' .string_customerprice').empty();
				        $('#'+id+' .string_customer').empty();
				        $('#'+id+' .string_dir').append(config_dir);
				        $('#'+id+' .string_usd').append(config_usd);
				        $('#'+id+' .string_article').append(config_article);
				        $('#'+id+' .string_string').append(config_string);
				        $('#'+id+' .string_quantity').append(config_quantity);
				        $('#'+id+' .string_inprice').append(config_inprice);
				        $('#'+id+' .string_customerprice').append(config_customerprice);
				        $('#'+id+' .string_customer').append(config_customer);
				        $('#'+id+' td #save').hide(100);
				        $('#'+id+' td #edit').show(100);
				  	},'html');
		                    }
		                },
		                'Отмена'    : {
		                    'class'    : 'gray',
		                    'action': function(){}
		                }
		            }
		        });

        	}
	  }
   	{/literal}
  </script>

</head>
<body>
<div id="nav">

<div class="label">
     <input type="text" id="query_string" onkeyup="search()" value="поиск..." onfocus="if(this.value=='поиск...')this.value='';" onblur="if(this.value=='')this.value='поиск...';">
</div>
       <div class="nav_p">
			 <div class="navig">
			 	<a href="../">Сервисная книга</a> |
				<a href="?page=main">Поиск</a> |
			 	<a href="?act=config" class="modalw">Конфигурация поиска</a> |
			 	<a href="#" id="updateinfo" onclick="update_price()">Обновление прайсов</a> {if $count>0}<span id="count">({$count})</span>{/if}
			 </div>
         </div><img id="ajaxload" src="images/load.gif">
<div class="line"></div>
</div>
<div style="padding-top:50px;">


