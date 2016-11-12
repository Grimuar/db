function get_st(str,i,j)
			{
				xmlhttp=createRequestObject();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState=='4' && xmlhttp.status=='200')
				    {
					    $('#clients').load("?page=main_t&display="+j);
				    }
				  }
				xmlhttp.open("GET","?page=get_st&id="+i+"&st="+str.value,true);
				xmlhttp.send();
			}

			function del_str(str)
			{
				xmlhttp=createRequestObject();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState=='4' && xmlhttp.status=='200')
				    {
					    $('#clients').load("?page=main_t");
				    }
				  }
				xmlhttp.open("GET","?page=delete&id="+str,true);
				xmlhttp.send();
			}

			function pay(str,i)
			{
				xmlhttp=createRequestObject();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState=='4' && xmlhttp.status=='200')
				    {
					    $('#clients').load("?page=main_t");
				    }
				  }
				xmlhttp.open("GET","?page=pay&money="+str.value+"&id="+i,true);
				xmlhttp.send();
			}

			function pay_hard(str,i)
			{
				xmlhttp=createRequestObject();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState=='4' && xmlhttp.status=='200')
				    {
					    $('#clients').load("?page=main_t");
				    }
				  }
				xmlhttp.open("GET","?page=pay_hard&money="+str.value+"&id="+i,true);
				xmlhttp.send();
			}

			function make_work(str,i)
			{
				xmlhttp=createRequestObject();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState=='4' && xmlhttp.status=='200')
				    {
					    $('#clients').load("?page=main_t");
				    }
				  }
				xmlhttp.open("GET","?page=make_work&work="+str.value+"&id="+i,true);
				xmlhttp.send();
			}

			function add_work(str,id)
			{
				xmlhttp=createRequestObject();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState=='4' && xmlhttp.status=='200')
				    {
					    $('#works').load("?page=add_work");
				    }
				  }
				xmlhttp.open("GET","?page=add_work&work="+str.value+"&id_a="+id,true);
				xmlhttp.send();
			}