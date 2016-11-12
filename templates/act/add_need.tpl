<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" media="print, projection, screen" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-latest.js"></script>
<script type="text/javascript" src="js/create-request.js"></script>
<script type="text/javascript">
function we_need_so_much()
			{
				xmlhttp=createRequestObject();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState=='4' && xmlhttp.status=='200')
				    {
					 window.location.href = "?page=main";
				    }
				  }
				xmlhttp.open("GET","?page=need_act&query="+$('#need_txt').val(),true);
				//alert("?page=need_act&query="+$('#need_txt').val());
				xmlhttp.send();
			}
</script>
</head>
<body>
<table class="tablesorter" style="margin:0;" border="0" align="center" cellpadding="0" cellspacing="1">
      <thead>
          <th>Окошко для обмена нужной информацией <b>(разделитель - запятая)</b></th>
      </thead>
      <tbody>
	      <tr>
	      		<td width="50%">
	      			<textarea id="need_txt" cols="40" rows="20" class="stext">{foreach from=$need_arr item=item}{$item.need},{/foreach}</textarea>
	      		</td>
	      </tr>
	      		<td colspan="2"><input type="button" onclick="we_need_so_much()" class="sbutton" value="Сохранить"></td>
	      </tr>
      </tbody>
</table>
</body>
</html>