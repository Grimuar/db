function time(){

	dayarray=new Array("воскресенье","понедельник","вторник","среда","четверг","пятница","суббота")
	montharray=new Array ("января","февраля","марта","апреля","мая","июня","июля","августа","сентября", 	"октября","ноября","декабря")
	ndata=new Date();
	day=dayarray[ndata.getDay()];
	month=montharray[ndata.getMonth()];
	date=ndata.getDate();
	year=ndata.getFullYear();
	hours = ndata.getHours();
	mins = ndata.getMinutes();
	secs = ndata.getSeconds();
	if (hours < 10) {hours = '0' + hours }
	if (mins < 10) {mins = '0' + mins }
	if (secs < 10) {secs = '0' + secs }
	
        return datastr=(+ date +" "+ month +" "+ year+" "+hours+":"+mins+":"+secs)
}