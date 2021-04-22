


   var clock_ele=document.getElementById("clock");
    clock_ele.innerHTML="DD/MM/YYYY,HH:I:S";

function clock(){
	var d=new Date();
	var date,month,year,hour,minute,second;
    var m=[1,2,3,4,5,6,7,8,9,10,11,12];
	date=d.getDate();
	month=m[d.getMonth()];
	year=d.getFullYear();
	hour=d.getHours();
	minute=d.getMinutes();
	second=d.getSeconds();
	  clock_ele.innerHTML=""+date+"/"+month+"/"+year+", "+hour+":"+minute+":"+second;
}
setInterval(clock,1000);
