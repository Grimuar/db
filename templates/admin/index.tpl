{include file="header.tpl"}
<table width="30%" height = "100%"  border="0" align="center" cellpadding="0" cellspacing="0"><tr><td align="center" valign="middle">

<form method = 'post'>
{$error}
<table class="tablesorter" border="0" cellpadding="0" cellspacing="1">

			<thead>
			<tr>
				<th colspan = "2">Авторизация в сервисной книге</th>
			</tr>
			</thead>

	<tbody>

	<tr>
    <td width = "50%">Логин<br><small></small></td>
    <td><input class="stext" name="login" type="text" value="1"></td>
	</tr>

	<tr>
    <td width = "50%">Пароль<br><small></small></td>
    <td><input class="stext" name="pass" type="password" value=""></td>
	</tr>

 </tbody>
<tr>
    <td align = 'center' colspan="2">
        <input class = 'sbutton' type="submit" value="Авторизация">
    </td>
</tr>

</table>

</td></tr></table>
</form>