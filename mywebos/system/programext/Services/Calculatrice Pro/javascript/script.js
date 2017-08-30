var calc=0
var part=1
var o=1
var t=1
var n=0
var calc1=0
var point=0
var p=1
var op=0
var calce=0
var fe="franc"

function t1(t)
	{
		if (point<=0)
		{
			calc=calc*10+t
		}
		if (point>0)
		{
			puis(t);calc=calc+p;point++
		}
			calc=Math.round(calc*10000000000)/10000000000
			aff.innerHTML = calc;
			trans(calc)
	}

function t0()
	{
		if (point<=0)
		{
			calc=calc*10;
			aff.innerHTML = calc;
		}
		else
		{
			point++
		}
			trans(calc)
	}

function puis(t)
	{
			p=1
		for (i=1; i<=point; i++)
		{
			p=p/10
		}
			p=p*t
	}

function top(o) 
	{
			tegal();op=o;calc1=calc;calc=0;point=0;part=2
	}

function tegal()
	{
		if (op==1)
		{
			calc=calc+calc1
		}
		if (op==2)
		{
			calc=calc1-calc
		}
		if (op==3)
		{
			calc=calc*calc1
		}
		if (op==4)
		{
			calc=calc1/calc
		}
		aff.innerHTML=calc
		trans(calc)
	}
	
function tvirg()
	{
		if (point==0)
		{
			point=1
		}
	}

function tneg()
	{
		calc=-calc
		aff.innerHTML = calc;
		trans(calc)
	}

function tretour()
	{
		calc = Math.floor(calc / 10);
		aff.innerHTML = calc;
	}

function tce()
	{
		point=0;
		aff.innerHTML = "0";
		euro.innerHTML="0.00"
		if (part==1)
		{
			calc=0;calc1=0
		}
		else
		{
			calc=0
		}
	}

function tc()
	{
		op=0;
		point=0;
		calc=0;
		aff.innerHTML = "0";
		euro.innerHTML="0.00";
		part=1
	}

function trans(calc)
	{
		if (fe=="franc")
		{
			calce=Math.round(calc/6.55957*100)/100
		}
		else
		{
			calce=Math.round(calc*6.55957*100)/100
		}
			euro.innerHTML=calce
	}

function nfe()
	{
		if (fe=="franc")
		{
			fe="euro";
			f.innerHTML="€";
			e.innerHTML="F";
		}
		else
		{
			fe="franc";
			f.innerHTML="F";
			e.innerHTML="€"
		}
			trans(calc)
	}

