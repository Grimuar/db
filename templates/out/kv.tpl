{include file="header.tpl"}
	<fieldset style="width:99%;">
	<table class="kv">
		<tr>
			<td style="width:200px;">
				<table class="tablesorter" border="0" style="width:200px; margin:0;" align="center" cellpadding="0" cellspacing="1">
										<tbody>
											<tr>
										         <td rowspan="2" width="56px"><img src="{$logo_img}" width="56px" alt="Логотип"></td>
										         <td><center><b><small>{$company_name}<br>
										         			  г.Гвардейск, ул. Ленина, д.6 Б<br>
			<b>Сервис Рудикон: <br>8-9082-90-43-63</b><br>
                 <b>магазин Цифра: <br>8-9082-90-44-93</b></small></center><b></td>
											</tr>
										</tbody>
				</table>
			</td>
			<td style="width:auto;">
				{foreach from=$kv_query item=item}
				  {if $item.repair_type=='Проверка качества'}
					<h2>Акт приёма-передачи № {$number_kv}_{$item.id} от {$item.date_in}</h2>
					товара продавцу магазина {$company_name} для проведения проверки качества в соответствии со ст. 18 Закона РФ "О защите
прав потребителей"<br><br>
				  {else}<h2>Квитанция к заказ-наряду № {$number_kv}_{$item.id} от {$item.date_in}</h2>
					на передачу устройства на ответственное хранение и для проверки и устранения заявленной неисправности<br><br>{/if}
				      <big><b>{if $item.repair_type=='Проверка качества'}Покупатель:{else}Заказчик:{/if} </b>{$item.fio}<br></big>
				      <big><b>Адрес: </b>{$item.adress}<br></big>
				      <big><b>Контактный телефон: </b>{$item.tel}<br><br></big>
  			</td>
  		</tr>
	  	<tr>
	  		<td colspan="2">
    <table class="tablesorter" border="0" style="width:99%; margin:0px;" align="center" cellpadding="0" cellspacing="1">

							<tbody>
								<tr>
									<td colspan="2"><big><b style="color: #0033cc;"><center>Подпишись на нашу группу ВКОНТАКТЕ ( vk.com/rudiconru ) и получи 5% СКИДКУ! www.rudicon.ru</center></b></td>
								</tr>
								<tr>
							        {if $item.repair_type=='Проверка качества'}
									<td width="180px"><b>Передается товар:</b></td>
							        	<td>{$item.device}</td>
								{else}
									<td width="180px"><b>Устройство:</b></td>
							         	<td>{$item.device}</td>
								{/if}
								</tr>
								<tr>
							         <td width="180px"><b>Модель:</b></td>
							         <td>{$item.model}</td>
								</tr>
								<tr>
							         <td width="180px"><b>Серийный номер:</b></td>
							         <td>{$item.s_n}</td>
								</tr>
								{if $item.repair_type=='Проверка качества'}
								<tr>
							         <td width="180px"><b>Дата продажи:</b></td>
							         <td>{$item.date_sale}</td>
								</tr>
								<tr>
							         <td width="180px"><b>Прилагаемый документ:</b></td>
							         <td>{$item.doc}</td>
								</tr>
								<tr>
							         <td width="180px"><b>Комплектность:</b></td>
							         <td>{$item.complect}</td>
								</tr>
								{/if}
								<tr>
							         <td width="180px"><b>Внешний вид:</b></td>
							         <td>{$item.view}</td>
								</tr>
								<tr>
							         <td><b>{if $item.repair_type=='Проверка качества'}Заявленный недостаток{else}Заявленная неисправность{/if}:</b></td>
							         <td>{$item.fail}{if $item.summa_in!='0.00'}<b>(Ориентировочная цена ремонта: {$item.summa_in} руб.)</b>{/if}</td>
								</tr>
								<tr>
							         <td><b>Тип ремонта:</b></td>
							         <td>{$item.repair_type}</td>
								</tr>
								<tr>
							         <td><b>Примечание:</b></td>
							         <td>{$item.note}</td>
								</tr>
							</tbody>
						</table>
{/foreach}
<br>
<table class="tablesorter" border="0" style="width:99%; margin:0;" align="center" cellpadding="0" cellspacing="1">
							<thead>
							    <tr>
							         <th><center>Условия</center></th>
							    </tr>
							</thead>
							<tbody>
								<tr>
							         <td><small>
                                          &nbsp;&nbsp;1. По истечении 180 дней со дня принятия заказа, {$company_name} имеет право утилизировать изделие по своему усмотрению.<br>
                                          &nbsp;&nbsp;2. {$company_name} не несет ответственности за принадлежности и аксессуары, не указанные при сдаче изделия в ремонт.<br>
                                          &nbsp;&nbsp;3. Срок исполнения гарантийного ремонта до 45 дней (на основании ст.20 п.1 закона "О защите прав потребителей").<br>
                                          &nbsp;&nbsp;4. {if $item.repair_type=='Проверка качества'}Покупатель{else}Заказчик{/if} самостоятельно выясняет готовность изделия по телефонам технического отдела<br>
					  &nbsp;&nbsp;5. Установка ПО производится с дистрибутивов {if $item.repair_type=='Проверка качества'}Покупателя{else}Заказчика{/if}. На программное  обеспечение гарантийные обязательства не распространяются.<br>
					  &nbsp;&nbsp;6. За работоспособность программного обеспечения и сохранение данных на различных носителях информации {if $item.repair_type=='Проверка качества'}Покупателя{else}Заказчика{/if}, {$company_name} ответственности не несет.<br>
					  &nbsp;&nbsp;7. В случае снятия изделия с гарантии, все затраты, связанные с ремонтом и транспортировкой изделия берет на себя {if $item.repair_type=='Проверка качества'}Покупатель{else}Заказчик{/if}.
</small>
							         </td>
								</tr>
								<tr>
							         <td><small>
                                         {if $item.repair_type=='Проверка качества'}Покупатель{else}Заказчик{/if} с правилами, условиями, сроками ознакомлен и согласен.<br>
					 {if $item.repair_type=='Проверка качества'}
						Дата обращения Покупателя для проверки качества совпадает с датой составления Акта приема передачи.<br>
					 {/if}
                                         Подписывая настоящий Документ, {if $item.repair_type=='Проверка качества'}Покупатель{else}Заказчик{/if} дает согласие {$company_name} на использование, обработку, распространение, передачу своих персональных данных, указанных в {if $item.repair_type=='Проверка качества'}Акте приема-передачи{else}данном документе{/if}, а также дает право {$company_name} обращаться в стороние авторизованные сервисные центры от лица {if $item.repair_type=='Проверка качества'}Покупателя{else}Заказчика{/if}.<br><br>
                                         <b>{if $item.repair_type=='Проверка качества'}Вышеуказанный товар и приложенное к нему для проведения проверки качества передал Покупатель{else}Устройство сдал Заказчик{/if} </b> __________________({$item.fio})
                                         <b>&nbsp;&nbsp;&nbsp;&nbsp;Принял(а) {if $item.repair_type=='Проверка качества'}представитель продавца{/if}</b> _______________({$item.manager})<br><br>
                                         <b>Устройство принял, претензий к {if $item.repair_type=='Проверка качества'}{$company_name} не имею, Покупатель:{else}работе не имею, Заказчик:{/if}</b> __________________({$item.fio})</small>
                                         </small>
							         </td>
								</tr>
							</tbody>
						</table>
		</td>
		</table>
		</fieldset>

		<div style="height:20px;"></div>
		<hr style="height:0px; color:#555555;">