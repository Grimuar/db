{include file="header.tpl"}
<table id="queryTable" class="tablesorter">
<thead>
	<tr>
		<th>�������</th>
		<th>������������</th>
		<th>����������</th>
		<th>�����</th>
		<th>�������</th>
	</tr>
</thead>
<tbody>
{foreach from=$out_array item=item}
      <tr>
      	<td>{$item.art}</td>
      	<td>{$item.string}</td>
      	<td>{$item.quant}</td>
      	<td>{$item.in_price}</td>
      	<td>{$item.our_price}</td>
      </tr>
{/foreach}
</tbody>
</table>
<form method="get" action="?act=query">
    <input type="text" name="query_string" size="20">
    <input type="submit">
</form>