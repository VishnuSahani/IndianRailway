<!DOCTYPE html>
<html lang="en">
<head>
<title>MMIT POLYTECHNIC - Official Website</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="css/animate.min.css" rel="stylesheet" type="text/css" media="all">
<link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
<script>

/* 

  ================================================
  PVII Scroll Magic scripts
  Copyright (c) 2007 Project Seven Development
  www.projectseven.com
  Version:  1.0.5 - script build: 1-23
  ================================================
  
 */

var p7VSCi=false,p7VSCctl=[],p7vscobj,p7vscofY,p7vscuA=navigator.userAgent.toLowerCase();
function P7_setVSC(){
	var h;
	if(!document.getElementById){
		return;
	}
	h='\n<st'+'yle type="text/css">\n';
	h+='.p7VSC_scrollbox {overflow:hidden;}\n';
	h+='.p7VSC_scrolling {position:absolute;}\n';
	h+='.p7VSCdragchannel, .p7VSCtoolbar{display: block !important;}\n';
	h+='</s'+'tyle>';
	document.write(h);
}
function P7_VSCaddLoad(){
	if(!document.getElementById){
		return;
	}
	if(window.addEventListener){
		window.addEventListener("load",P7_initVSC,false);
	}
	else if(window.attachEvent){
		window.attachEvent("onload",P7_initVSC);
	}
	else if(typeof window.onload=='function'){
		var p7vloadit=onload;
		window.onload=function(){
			p7vloadit();
			P7_initVSC();
		};
	}
	else{
		window.onload=P7_initVSC;
	}
	p7VSCi=true;
}
P7_setVSC();
function P7_opVSC(){
	var h='',hh,b,cn;
	if(!document.getElementById){
		return;
	}
	p7VSCctl[p7VSCctl.length]=arguments;
	hh=arguments[6];
	b=arguments[0];
	cn=b.replace("b","cn");
	h='\n<st'+'yle type="text/css">\n';
	h+='#'+b+'{height:'+eval(-140+hh)+'px !important;}\n';
	h+='#'+cn+'{height:'+eval(-140+hh)+'px !important;}\n';
	h+='</s'+'tyle>';
	document.write(h);
	if(!p7VSCi){
		P7_VSCaddLoad();
	}
}
function P7_initVSC(){
	var i,j,tB,d,sD,t,oh,dB,pp,dD,h,sf;
	for(i=0;i<p7VSCctl.length;i++){
		tB=document.getElementById(p7VSCctl[i][0]);
		if(tB){
			tB.p7opt=p7VSCctl[i];
			tB.p7acdv='';
			tB.p7dragbar=false;
			tB.p7resume='no';
			tB.p7status='none';
			tB.p7box=tB.id;
			d=tB.id.replace('b','d')+'_c'+tB.p7opt[8];
			sD=document.getElementById(d);
			if(sD){
				t=tB.p7opt[9];
				sD.style.top=t+'px';
				tB.p7acdv=d;
				if(t<tB.offsetHeight*-1){
					tB.p7dir='down';
				}
				else{
					tB.p7dir='up';
				}
				oh=tB.p7opt[6];
				d=tB.id.replace("b","dc");
				dB=document.getElementById(d);
				if(dB){
					pp=dB.parentNode.childNodes;
					for(j=0;j<pp.length;j++){
						if(pp[j].nodeName=='DIV'&&pp[j]!=dB){
							h=pp[j].offsetHeight;
							if(!h||h===0){
								if(p7vscuA.indexOf("applewebkit")>-1){
									sf=P7_fixSafDB(tB);
								}
								h=parseInt(P7_getPropValue(pp[j].getElementsByTagName("A")[0],'height','height'),10);
							}
							h=(h>0)?h:0;
							oh-=h;
						}
					}
					dB.style.height=eval(50+oh)+"px";
					if(sf){
						sf.style.display="none";
					}
				}
				if(tB.p7opt[7]==1){
					tB.onmouseover=function(){
						if(this.p7status=='moving'){
							this.p7resume='yes';
						}
						P7_VSCpause(this,1);
					};
					tB.onmouseout=function(){
						if(this.p7resume=='yes'){
							P7_VSCplay(this,1);
						}
					};
				}
				dD=getBoxChild(tB.id,"a",true);
				if(dD){
					dD.p7status='show';
					dD.onclick=function(){
						return P7_VSCshowall(this);
					};
				}
				dD=getBoxChild(tB.id,"db",true);
				dD=getBoxChild(tB.id,"dc",true);
				if(dD){
					dDa=dD.getElementsByTagName("A")[0];
					tB.p7dragbar=d;
					tB.p7dragbar=d;
					if(tB.p7opt[14]===1){
						dDa.removeAttribute("href");
					}
					else{
						dDa.onmousedown=P7_VSCeng;
						dDa.onkeydown=P7_VSCkey;
						dDa.onkeyup=P7_VSCkeyup;
						dD.onmousedown=P7_VSCeng;
					}
					P7VSCsetDrag(tB);
				}
				dD=getBoxChild(tB.id,"du",true);
				if(dD){
					dD.onmousedown=function(){
						P7_VSCmoveUp(this);
					};
					dD.onmouseup=function(){
						P7_VSCpause(this);
					};
					dD.onkeydown=P7_VSCkey;
					dD.onkeyup=P7_VSCkeyup;
				}
				dD=getBoxChild(tB.id,"dd",true);
				if(dD){
					dD.onmousedown=function(){
						P7_VSCmoveDown(this);
					};
					dD.onmouseup=function(){
						P7_VSCpause(this);
					};
					dD.onkeydown=P7_VSCkey;
					dD.onkeyup=P7_VSCkeyup;
				}
				dD=getBoxChild(tB.id,"bu",true);
				if(dD){
					dD.onmousedown=function(){
						P7_VSCmoveUp(this);
					};
					dD.onkeydown=P7_VSCkey;
					if(tB.p7opt[3]<3){
						dD.onmouseup=function(){
							P7_VSCpause(this);
						};
						dD.onkeyup=P7_VSCkeyup;
					}
				}
				dD=getBoxChild(tB.id,"bd",true);
				if(dD){
					dD.onmousedown=function(){
						P7_VSCmoveDown(this);
					};
					dD.onkeydown=P7_VSCkey;
					if(tB.p7opt[3]<3){
						dD.onmouseup=function(){
							P7_VSCpause(this);
						};
						dD.onkeyup=P7_VSCkeyup;
					}
				}
				dD=getBoxChild(tB.id,"bpp",true);
				if(dD){
					dD.onmousedown=function(){
						P7_VSCpp(this);
					};
					dD.onkeydown=P7_VSCppkey;
				}
				tB.accum=0;
				tB.autostarting=false;
				tB.p7vscMode='manual';
				if(tB.p7opt[10]==1){
					tB.p7vscMode='auto';
					tB.p7status='moving';
					tB.p7VSCtimer=setTimeout("P7_VSCplay('"+tB.id+"')",tB.p7opt[11]);
				}
			}
		}
	}
	P7_VSCaddEvts();
}
function getBoxChild(bx,rp,fl){
	var d,ret;
	d=bx.replace("b",rp);
	ret=document.getElementById(d);
	if(ret&&fl){
		ret.p7box=bx;
	}
	return ret;
}
function P7_VSCaddEvts(){
	if(window.addEventListener){
		document.addEventListener("mousemove",P7_VSCdrg,false);
		document.addEventListener("mouseup",P7_VSCrel,false);
		document.addEventListener("DOMMouseScroll",P7_VSCwheel,false);
		if(window.opera || p7vscuA.indexOf("applewebkit")>-1){
			document.addEventListener("mousewheel",P7_VSCwheel,false);
		}
	}
	else if(window.attachEvent){
		document.attachEvent("onmousemove",P7_VSCdrg);
		document.attachEvent("onmouseup",P7_VSCrel);
		document.attachEvent("onmousewheel",P7_VSCwheel);
	}
	else{
		document.onmousemove=P7_VSCdrg;
		document.onmouseup=P7_VSCrel;
	}
}
function P7_VSCshowall(a){
	var b,tB,tD,tC,tT,mv;
	b=a.p7box;
	tB=document.getElementById(b);
	tD=document.getElementById(tB.p7acdv);
	tC=getBoxChild(tB.id,"cn");
	tT=getBoxChild(tB.id,"tb");
	mv=tB.p7status;
	if(a.p7status=="show"){
		P7_VSCpause(b);
		tB.p7restore=mv;
		a.p7status="restore";
		a.innerHTML="Restore Scroller";
		a.setAttribute("title","Restore Scroller");
		tB.style.height="auto";
		tD.style.position="static";
		if(tC){
			tC.style.visibility="hidden";
		}
		if(tT){
			tT.style.visibility="hidden";
		}
	}
	else{
		a.p7status="show";
		a.innerHTML="Show All";
		a.setAttribute("title","Show All Scroller Content");
		tB.style.height=tB.p7opt[6]+"px";
		tD.style.position="absolute";
		if(tC){
			tC.style.visibility="visible";
		}
		if(tT){
			tT.style.visibility="visible";
		}
		if(tB.p7restore=='moving'){
			P7_VSCplay(tB);
		}
	}
	return false;
}
function P7_VSCplay(b,ov){
	var tB,tS,t,ct,bh,sh,dy;
	if(typeof(b)=='object'){
		b=b.p7box;
	}
	tB=document.getElementById(b);
	tB.p7vscMode='auto';
	P7_VSCpause(b,ov);
	tS=document.getElementById(tB.p7acdv);
	bh=tB.offsetHeight;
	sh=tS.offsetHeight;
	t=bh-sh;
	dy=tB.p7opt[2];
	if(t>=0){
		return;
	}
	ct=parseInt(tS.style.top,10);
	if(ct==t){
		if(tB.p7opt[3]===0 || tB.p7opt[3]==3){
			ct=0;
			P7_VSCmoveTo(tB.p7box,ct);
			dy=(tB.p7opt[3]==3)?tB.p7opt[13]:1000;
		}
	}
	t=(tB.p7dir=='up')?t:0;
	if(tB.p7opt[3]==2){
		t=t-bh;
		if(ct<t){
			ct=bh;
		}
		else if(ct>bh){
			ct=bh;
		}
		tS.style.top=ct+"px";
		tB.p7dir='up';
	}
	if(tB.p7opt[3]>2){
		var m=true;
		var x=tB.p7opt[12];
		while (m){
			if(ct>x){
				m=false;
				if(tB.p7dir=='up'){
					tB.accum=(x+tB.p7opt[12])-ct;
				}
				else{
					tB.accum=ct - x;
				}
			}
			if(x<=(tB.offsetHeight-tS.offsetHeight)){
				m=false;
			}
			x-=tB.p7opt[12];
		}
	}
	P7_VSCspp(b,'play');
	if(tB.p7VSCtimer){
		clearTimeout(tB.p7VSCtimer);
	}
	tB.p7VSCtimer=setTimeout("P7_VSCscroll('"+tB.id+"',"+ct+","+t+","+false+")",dy);
}
function P7_VSCpp(b){
	var a,cl;
	if(typeof(b)=='object'){
		b=b.p7box;
	}
	a=getBoxChild(b,"bpp");
	cl=a.className;
	if(a.className=='pause'){
		a.className='play';
		P7_VSCpause(b);
	}
	else{
		a.className='pause';
		P7_VSCplay(b);
	}
}
function P7_VSCspp(b,m){
	var a=getBoxChild(b,"bpp");
	if(a&&a.className&&a.className==m){
		a.className=(m=='play')?'pause':'play';
	}
}
function P7_VSCpause(b,ov){
	if(typeof(b)=='object'){
		b=b.p7box;
	}
	var dB=document.getElementById(b);
	if(dB.p7VSCtimer){
		clearTimeout(dB.p7VSCtimer);
		dB.p7status='stopped';
	}
	if(ov!=1){
		dB.p7resume='no';
	}
	P7_VSCspp(b,'pause');
}
function P7_VSCctrl(op,b,y){
	if(op=='pause'){
		P7_VSCpause(b);
	}
	else if(op=='play'){
		P7_VSCplay(b);
	}
	else if(op=='scrollUp'){
		P7_VSCmoveUp(b);
	}
	else if(op=='scrollDown'){
		P7_VSCmoveDown(b);
	}
	else if(op=='panelUp'){
		P7_VSCmoveBy(b,'up');
	}
	else if(op=='panelDown'){
		P7_VSCmoveBy(b,'down');
	}
	else if(y&&op=='moveBy'){
		P7_VSCmoveBy(b,y);
	}
	else if(y&&op=='goTo'){
		P7_VSCmoveTo(b,y);
	}
	else if(op=='goToElement'){
		P7_VSCmovetoId(b);
	}
}
function P7_VSCmovetoId(d){
	var tB,tS,ct,tD,pp,tt,y=0,m=false,bx;
	pp=document.getElementById(d);
	while(pp){
		y+=pp.offsetTop;
		if(pp.className&&pp.className=='p7VSC_scrolling'){
			m=true;
			break;
		}
		pp=pp.offsetParent;
	}
	if(m){
		tB=pp.parentNode;
		tS=document.getElementById(tB.p7acdv);
		ct=parseInt(tS.style.top,10);
		tt=ct-y;
		P7_VSCmoveTo(tB.id,tt);
	}
}
function P7_VSCwheel(evt){
	var g,m=false,r=true,delta=0,s,tS;
	evt=(evt)?evt:event;
	g=(evt.target)?evt.target:evt.srcElement;
	while(g){
		if(g.id&&g.id.indexOf("p7VSCb_")>-1){
			m=true;
			break;
		}
		g=g.parentNode;
	}
	if(m){
		tS=document.getElementById(g.p7acdv);
		if(tS.offsetHeight>g.offsetHeight){
			r=false;
			if(evt.wheelDelta){
				delta=evt.wheelDelta/120;
				if(window.opera&&parseFloat(navigator.appVersion)<9.20){
					delta=delta*-1;
				}
			}
			else if(evt.detail){
				delta= -evt.detail/3;
			}
			s=delta*16;
			P7_VSCmoveBy(g.id,s);
			if(evt.preventDefault){
				evt.preventDefault();
			}
		}
	}
	return r;
}
function P7_VSCmoveBy(b,y){
	var tS,t,tB,rr;
	tB=document.getElementById(b);
	if(tB.p7status!="stopped"){
		P7_VSCpause(b);
	}
	tS=document.getElementById(tB.p7acdv);
	rr=tB.offsetHeight-tS.offsetHeight;
	if(rr>=0){
		return;
	}
	if(y=='down'){
		y=tB.offsetHeight*-1;
	}
	if(y=='up'){
		y=tB.offsetHeight;
	}
	if(rr<0){
		t=parseInt(tS.style.top,10);
		t+=y;
		t=(t<=rr)?rr:t;
		t=(t>=0)?0:t;
		tS.style.top=t+"px";
		if(tB.p7dragbar){
			P7VSCsetDrag(tB);
		}
	}
}
function P7_VSCmoveTo(b,y){
	var tB,tS,rr,t;
	P7_VSCpause(b);
	tB=document.getElementById(b);
	tS=document.getElementById(tB.p7acdv);
	rr=tB.offsetHeight-tS.offsetHeight;
	if(rr>=0){
		return;
	}
	if(y=='start'){
		y=0;
	}
	else if(y=='end'){
		y=rr;
	}
	if(rr<0){
		t=parseInt(tS.style.top,10);
		y=(y<=rr)?rr:y;
		y=(y>=0)?0:y;
		tS.style.top=y+"px";
		if(tB.p7dragbar){
			P7VSCsetDrag(tB);
		}
	}
}
function P7_VSCmoveUp(b){
	var tS,t,tB,fl=1,a;
	if(typeof(b)=='object'){
		a=b;
		b=b.p7box;
	}
	P7_VSCpause(b);
	tB=document.getElementById(b);
	tS=document.getElementById(tB.p7acdv);
	if(tS.offsetHeight<=tB.offsetHeight){
		return;
	}
	if(tB.p7opt[3]>2){
		if(a&&a.id&&a.id.indexOf("p7VSCbu_")>-1){
			fl=2;
		}
	}
	P7_VSCscroll(tB.id,parseInt(tS.style.top,10),0,fl);
}
function P7_VSCmoveDown(b){
	var tS,t,tB,fl=1,a;
	P7_VSCpause(b);
	if(typeof(b)=='object'){
		a=b;
		b=b.p7box;
	}
	tB=document.getElementById(b);
	tS=document.getElementById(tB.p7acdv);
	t=tB.offsetHeight-tS.offsetHeight;
	if(t>=0){
		return;
	}
	if(tB.p7opt[3]>2){
		if(a&&a.id&&a.id.indexOf("p7VSCbd_")>-1){
			fl=2;
		}
	}
	P7_VSCscroll(tB.id,parseInt(tS.style.top,10),t,fl);
}
function P7_VSCscroll(b,ct,tt,dd){
	var fr,dy,dB,dD,nt,dr,r,m=true,op;
	if(!dd){
		dd=false;
	}
	dB=document.getElementById(b);
	dD=document.getElementById(dB.p7acdv);
	dB.p7status='moving';
	op=dB.p7opt[3];
	r=dB.offsetHeight-dD.offsetHeight;
	if(r>=0){
		return;
	}
	if(!dd){
		fr=dB.p7opt[1];
		dy=dB.p7opt[2];
	}
	else{
		fr=dB.p7opt[4];
		dy=dB.p7opt[5];
	}
	if(tt!==0){
		if(op>2&&dd!==1){
			dB.accum+=fr;
			if(dB.accum>=dB.p7opt[12]){
				fr-=dB.accum-dB.p7opt[12];
				dB.accum=0;
				m=false;
			}
		}
		ct-=fr;
		if(ct<=tt){
			ct=tt;
			m=false;
		}
	}
	else{
		if(dd!=1&&op>2){
			dB.accum+=fr;
			if(dB.accum>=dB.p7opt[12]){
				fr-=dB.accum-dB.p7opt[12];
				dB.accum=0;
				m=false;
			}
		}
		ct+=fr;
		if(ct>=tt){
			ct=tt;
			m=false;
		}
	}
	dD.style.top=ct+"px";
	if(dB.p7dragbar){
		P7VSCsetDrag(dB);
	}
	if(!m&&dd!==1){
		if(op>2){
			dB.accum=0;
			dy=dB.p7opt[13];
			if(dd!==2){
				if(ct!==0&&ct!=r){
					m=true;
				}
			}
			if(op==4 && (ct===0||ct==r)){
				op=1;
			}
		}
		if(op==1){
			tt=(ct===0)?r:0;
			dB.p7dir=(tt===0)?'down':'up';
			if(dd!==2){
				m=true;
			}
		}
		else if(op==2){
			ct=dB.offsetHeight;
			dB.p7dir='up';
			m=true;
		}
	}
	if(m){
		dB.p7VSCtimer=setTimeout("P7_VSCscroll('"+b+"',"+ct+","+tt+","+dd+")",dy);
	}
	else{
		dB.p7status='stopped';
		P7_VSCpause(dB.p7box);
	}
}
function P7_VSCkey(evt){
	var tg,m=true;
	evt=(evt)?evt:event;
	tg=(evt.target)?evt.target:evt.srcElement;
	if(tg&&tg.p7box){
		if(evt.keyCode==38){
			P7_VSCmoveUp(tg.p7box);
			m=false;
		}
		else if(evt.keyCode==40){
			P7_VSCmoveDown(tg.p7box);
			m=false;
		}
		else if(evt.keyCode==33||evt.keyCode==37||(evt.keyCode==32&&evt.shiftKey)){
			P7_VSCmoveBy(tg.p7box,'up');
			m=false;
		}
		else if(evt.keyCode==34||evt.keyCode==39||evt.keyCode==32){
			P7_VSCmoveBy(tg.p7box,'down');
			m=false;
		}
		else if(evt.keyCode==36){
			P7_VSCmoveTo(tg.p7box,'start');
			m=false;
		}
		else if(evt.keyCode==35){
			P7_VSCmoveTo(tg.p7box,'end');
			m=false;
		}
		if(!m){
			if(evt.preventDefault){
				evt.preventDefault();
			}
		}
	}
	return m;
}
function P7_VSCkeyup(evt){
	evt=(evt)?evt:event;
	tg=(evt.target)?evt.target:evt.srcElement;
	if(tg&&tg.p7box){
		if(evt.keyCode!=9&&evt.keyCode!=16){
			P7_VSCpause(tg.p7box);
		}
	}
}
function P7_VSCppkey(evt){
	var tg;
	evt=(evt)?evt:event;
	tg=(evt.target)?evt.target:evt.srcElement;
	if(tg&&tg.p7box){
		if(evt.keyCode==13){
			P7_VSCpp(tg.p7box);
		}
	}
}
function P7_VSCeng(evt){
	var tg,y,tD,g,ot=0,pp,yy,oh,m=true,dr;
	evt=(evt)?evt:event;
	p7vscobj=null;
	tg=(evt.target)?evt.target:evt.srcElement;
	g=tg.parentNode;
	if(evt.clientY){
		if(tg&&tg.id&&tg.id.indexOf('p7VSCdc_')>-1){
			g=document.getElementById(tg.id.replace("dc","db"));
			P7_VSCpause(g.p7box);
			oh=tg.offsetHeight;
			pp=tg;
			while(pp){
				ot+=pp.offsetTop;
				pp=pp.offsetParent;
			}
			y=(evt.clientY+document.documentElement.scrollTop+document.body.scrollTop)-ot;
			dr='down';
			if(y<=g.offsetTop){
				dr='up';
			}
			P7_VSCmoveBy(g.p7box,dr);
			m=false;
		}
		else if(g&&g.id&&g.id.indexOf('p7VSCdb_')>-1){
			p7vscobj=g;
			P7_VSCpause(g.p7box);
			y=(p7vscobj.offsetTop)?p7vscobj.offsetTop:0;
			p7vscofY=evt.clientY-y;
			m=false;
			if(!document.addEventListener&&document.attachEvent){
				g.setCapture();
			}
		}
	}
	return m;
}
function P7_VSCdrg(evt){
	evt=(evt)?evt:event;
	var m=true;
	if(p7vscobj){
		if(evt.clientY){
			P7_VSCshift(p7vscobj,(evt.clientY-p7vscofY));
		}
		evt.cancelBubble=true;
		m=false;
	}
	return m;
}
function P7_VSCrel(){
	if(p7vscobj){
		if(!document.addEventListener&&document.attachEvent){
			p7vscobj.releaseCapture();
		}
		p7vscobj=null;
	}
}
function P7_VSCshift(obj,y){
	var tC,d,b,bT,s,sT,bh,sh,p,yy,r,rr;
	d=obj.id.replace("db","dc");
	tC=document.getElementById(d);
	b=obj.id.replace("db","b");
	bT=document.getElementById(b);
	r=tC.offsetHeight-obj.offsetHeight;
	y=(y<=0)?0:y;
	y=(y>=r)?r:y;
	s=bT.p7acdv;
	sT=document.getElementById(s);
	rr=bT.offsetHeight-sT.offsetHeight;
	if(rr>=0){
		y=0;
		rr=0;
	}
	p=y/r;
	yy=parseInt(rr*p,10);
	obj.style.top=y+"px";
	sT.style.top=yy+"px";
}
function P7VSCsetDrag(sB){
	var dC,s,dB,y,rr,r,p,sD;
	if(sB.p7dragbar){
		dC=document.getElementById(sB.p7dragbar);
		s=dC.id.replace("dc","db");
		dB=document.getElementById(s);
		sD=document.getElementById(sB.p7acdv);
		y=parseInt(sD.style.top,10);
		rr=sB.offsetHeight-sD.offsetHeight;
		r=dC.offsetHeight-dB.offsetHeight;
		p=y/rr;
		yy=parseInt(r*p,10);
		yy=(yy<=0)?0:yy;
		yy=(yy>=r)?r:yy;
		if(!isNaN(yy)){
			dB.style.top=yy+"px";
		}
	}
}
function P7_getPropValue(ob,prop,prop2){
	var h,v=null;
	if(ob){
		if(ob.currentStyle){
			v=eval('ob.currentStyle.'+prop);
		}
		else if(document.defaultView.getComputedStyle(ob,"")){
			v=document.defaultView.getComputedStyle(ob,"").getPropertyValue(prop2);
		}
		else{
			v=eval("ob.style."+prop);
		}
	}
	return v;
}
function P7_fixSafDB(bx){
	var s,d,pm=false;
	s=bx.id.replace("b","");
	pp=document.getElementById(s);
	pp=pp.parentNode;
	while(pp){
		d=P7_getPropValue(pp,'display','display');
		if(!d || d=='none'){
			if(!pp.id || pp.id.indexOf("p7VSC")==-1){
				pm=pp;
				pp.style.display="block";
				break;
			}
		}
		if(pp.nodeName=='BODY'){
			break;
		}
		pp=pp.parentNode;
	}
	return pm;
}












</script>
<style>
*-------------news----------------*/



.smBox .smBX.newsBlock ul { margin:0 auto;
	
}
.smBox .smBX.newsBlock ul li { background:url(list_arrow.gif) 0 10px no-repeat;
padding-left:20px;
 font-family:Trebuchet MS,Lucida Sans Unicode,Arial,sans-serif;
  font-size: 13px;
text-align:left;
line-height:18px; text-align:justify;
padding:5px 0 10px 15px;
font-family:Trebuchet MS,Lucida Sans Unicode,Arial,sans-serif;
}
.smBox .smBX.newsBlock ul li a
{
    color: #3399FF;
    font-family: Trebuchet MS,Lucida Sans Unicode,Arial,sans-serif;
    font-size: 13px;
    text-decoration: none;
}

.smBox .smBX.newsBlock ul li a:hover
{
    color: #FF9933;
    font-size: 13px;
    text-decoration: underline;
}


.smBX.newsBlock ul li .newsBox h4 {
	color: #95061F;
	font-size: 11px;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 5px;
}

.smBX.newsBlock ul li.newsBox  {
	color: #1464A3;
	font-size: 11px;
	padding-bottom: 10px;

}



#innerBody {
	background: #FFF;	
	margin:0 auto;
	margin-bottom: 6px;
 width:365px;	
}


/* 
  -----------------------------------
  Vertical Scroller Magic
  by Project Seven Development
  www.projectseven.com
  Style Theme: 03 - Carbon
  -----------------------------------
*/

.p7VSC03 {
	position: relative;
	padding-left:6px;
    top: 0px;
    left: 0px;
}
.p7VSC_showall {
	color: #000000;
	letter-spacing: 0.1em;
}
.p7VSC_showall:hover, .p7VSC_showall:active, .p7VSC_showall:focus {
	color: #009900;
}
.p7VSC03 .p7VSC_scrollbox_wrapper {
	margin: 0 25px 0 0;
	padding: 0px;
}
.p7VSC03 .p7VSC_scrollbox {
	height: auto;
	position: relative;
	width: 100%;
}
.p7VSC03 .p7VSC_scrolling
{
    top: 0;
    left: 0;
    width: 100%;
}
.p7VSC03 .p7VSC_content {  left:0; padding:0;

}
.p7VSC03 .p7VSC_content ul{  padding:0;}

.p7VSC03 .p7VSC_up a
{
    height: 17px;
    width: 13px;
    background-image: url(p7sc3_dbup.png);
    background-repeat: no-repeat;
    
}
.p7VSC03 .p7VSC_up a:hover {background-position: -13px 0px;}
.p7VSC03 .p7VSC_dn a {
	height: 16px;
	width: 13px;
	background-image: url(p7sc3_dbdn.png);
	background-repeat: no-repeat;
}
.p7VSC03 .p7VSC_dn a:hover {background-position: -13px 0px;}
.p7VSC03 .p7VSC_pauseplay .pause {
	height: 11px;
	width:13px;
	background-image: url(p7sc3_psplay.png);
	background-repeat: no-repeat;
}
.p7VSC03 .p7VSC_pauseplay .pause:hover  {
	background-position: -13px 0px;
}
.p7VSC03 .p7VSC_pauseplay .play {
	height: 11px;
	width: 13px;
	background-position: 0px -11px;
	background-image: url(p7sc3_psplay.png);
	background-repeat: no-repeat;
}
.p7VSC03 .p7VSC_pauseplay .play:hover  {
	background-position: -13px -11px;
}
.p7VSC03 .p7VSCdragchannel {
	position: absolute;
	width: 13px;
	top: 0px;
	background-image: url(p7sc3_dbbg.png);
	background-repeat: repeat-y;
	right: 0px;
	display: none;
	cursor: default;
}
.p7VSC03 .p7VSCdragchannel em {
	display: none;
}
.p7VSC03 .p7VSCdragchannel a {
	display: block;
}
.p7VSC03 .p7VSCdragbar {
	position: relative;
}
.p7VSC03 .p7VSCdragCtrl {
	position: absolute;
	left: 0px;
	top: 0px;
}
.p7VSC03 .p7VSCdragCtrl a {
	height: 37px;
	width: 13px;
	background-image: url(p7sc3_dbdrag.png);
	background-repeat: no-repeat;
}
.p7VSC03 .p7VSCdragCtrl a:hover  {
	background-position: -13px 0px;
}

#p7VSCdc_1
{
    height: 186px !important
}
#p7VSCdc_11
{
    height: 186px !important
}

#p7VSCdc_111
{
    height: 586px !important
}


#p7VSCdc_1111
{
    height: 346px !important
}
</style>
 <style type="text/css">
        .p7VSC_scrollbox {
            overflow: hidden;
        }

        .p7VSC_scrolling {
            position: absolute;
        }

        .p7VSCdragchannel, .p7VSCtoolbar {
            display: block !important;
        }
    </style>
    <!---News scroll---end----------------------------------------------------->

<style>
#mainav a{
text-decoration:none;
}
*{
font-family: 'Work Sans', sans-serif;
margin:0px;
padding:0px;
}
#phone{
font-size:16px;
}
</style>
</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
   
    <div class="fl_left">
      <ul class="nospace inline pushright">
        
        <li><i class="fa fa-envelope-o" style="color:#3a9fe5;font-size:20px;"></i> <span style="font-size:20px;">info@mmit.ac.in</span></li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="faico clear">
        <li><a href="#" style="color:#3b5998;"><i class="fa fa-facebook"></i></a></li>
       
        <li><a href="#" style="color:#06b0d6;"><i class="fa fa-twitter" ></i></a></li>
        <li><a href="#" style="color:#c4302b;"><i class="fa fa-youtube"></i></a></li>
        <li><a href="#"  style="color:#3b5998;"><i class="fa fa-linkedin"></i></a></li>
        
      
      </ul>
    </div>
    
  </div>
</div>
<!-- ################################################################################################ -->

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
 
    <div  class="row" id="logo" >
    <div class="col-lg-8">
      <h1><a href="index.php"><img src="images/logo/mmit-logo.png"></a></h1>
    </div>
    
    <div class="col-lg-4">      
          <div class="card" style=" background-color:#3d95dc;" >
         
          <div class="card-body" id="phone" >
          <center>
           <strong style=" color:#ffffff" >Office :</strong>
           &nbsp; 
         <a href="tel:+91 888 766 7635" style="text-decoration:none;"> <i class="fa fa-phone" style="color:#FFFF33;"></i> 
          <span style=" color:#ffffff">+91 888 766 7635</span></a>
        <br><br>
          <strong style=" color:#ffffff"   >Principal :</strong>
           &nbsp;
         <a href="tel:+91 945 189 6967" style="text-decoration:none;"> <i class="fa fa-phone" style="color:#FFFF33;"></i>
          <span style=" color:#ffffff">+91 945 189 6967</span></a>
          </center>
         </div>
       </div>
    </div>
 </div>
   
  </header>
</div>
<!-- ################################################################################################ -->


<!--<div class="wrapper row2" style="font-size:12px;">-->
<nav class="navbar  navbar-expand-lg  sticky-top row2" >
   <a class="navbar-brand" href="index.php" style="color:#FFFFFF;"><i class="fa fa-institution"></i> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fa fa-navicon"></i></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav" style="color:#FFFFFF;"> 
    <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-item nav-link active" href="index.php" style="color:#FFFFFF;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="about-us.php" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          About Us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="about-us.php">About Institute</a>
          <a class="dropdown-item" href="#">Vision &#038; Mission</a>
          <a class="dropdown-item" href="#">Director’s Message</a>
          <a class="dropdown-item" href="#">Rules and Regulations</a>
          <a class="dropdown-item" href="#">Institute Brochure</a>
          <a class="dropdown-item" href="#">Infrastructure</a>
          
        </div>
      </li>
            <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Governance
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Director</a>
          <a class="dropdown-item" href="#">Board of Governors</a>
          <a class="dropdown-item" href="#">Finance Committee</a>
          <a class="dropdown-item" href="#">Academic Committee</a>
          <a class="dropdown-item" href="#">Students Affairs Committee</a>
          <a class="dropdown-item" href="#">Training &#038; Placement Officer</a>
       </div>
      </li>
      
      <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Academics
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Academic Programmes</a>
          <a class="dropdown-item" href="#">Syllabus</a>
          <a class="dropdown-item" href="#">Academic Calendar</a>
          <a class="dropdown-item" href="#">Academic Committee</a>
          <a class="dropdown-item" href="#">Admissions</a>
          <a class="dropdown-item" href="#">Fees Structure</a>
          <a class="dropdown-item" href="#">List Of Holidays</a>
        </div>
      </li>
     

      <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Departments
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Computer Science &amp; Engineering</a>
          <a class="dropdown-item" href="#">Information Technology</a>
          <a class="dropdown-item" href="#">Electronic Engineering</a>
      
          
        </div>
      </li>
    
      <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Training &#038; Placement
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Placement Statistics</a>
          <a class="dropdown-item" href="#">Brochure</a>
          <a class="dropdown-item" href="#">Recruitments</a>
          <a class="dropdown-item" href="#">Recruiting Partners</a>
         
        </div>
      </li>
     
      <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Facilities &#038; Resources
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Hostels</a>
          <a class="dropdown-item" href="#">Central Library</a>
          <a class="dropdown-item" href="#">Sport &#038; Atheletics</a>
          <a class="dropdown-item" href="#">Auditorium &#038; Seminar Halls</a>
          <a class="dropdown-item" href="#">Medical Faciltie</a>
          <a class="dropdown-item" href="#">Transport Facilities</a>
          
        </div>
      </li>
    
      <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Alumni
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Alumni Registration</a>
       </div>
      </li>
      
      <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="contact-us.php" style="color:#FFFFFF;" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Contact us
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="contact-us.php">Address</a>
          <a class="dropdown-item" href="contact-us.php">Maps &#038; Location</a>
          <a class="dropdown-item" href="contact-us.php">Phone Directory</a>
          <a class="dropdown-item" href="contact-us.php">Feedback / Query</a>
       </div>
      </li>
   </ul>
    </div>
  </div>
</nav>
<!--</div>-->
    <!-- ################################################################################################ -->
    <div>
   <marquee align="baseline">
  <strong><p><a href="#" ><img src="images/33.gif">  Important Notice Regarding Student Registration 2018-19 Even Semester New</a> | <a href="#"> <img src="images/33.gif">Important Notice related to Registration of All the 2nd and Final Year students of MMIT POLYTECHNIC Maharajganj.</p></a></strong>
   </marquee>
    
    </div>
    <!-- ################################################################################################ -->


<style>


div.polaroid {
  width: 100%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
  margin-top: 25px;
}

div.container {
  text-align: center;
  padding: 10px 20px;
}

	
	* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding in columns */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 6px;
  text-align: center;
  background-color: #f1f1f1;
}
.card a{
text-decoration:none;
}
/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 600px) {
  .card {
   padding: 2px;
   margin-bottom:10px;
}


</style>
<?php require('slider-flex.php');?>
<!---MENUS----------->
<div class="container-fluid" style="background-color:#FFFFFF; margin-top:50px" >
<div class="row">
  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card">
     <a href="#" class="#"><i class="fa fa-calendar" style="font-size:24px;"></i><br>ACADEMIC <br>CALENDAR</a>
    
    
    </div>
  </div>
 

 
 

  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card"> <a href="#" class="#"><i class="fa fa-rupee" style="font-size:24px;"></i><br>FEE <br>STRUCTURE</a></div>
  </div>
 

  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card">
    <a href="#" class="#"><i class="fa fa-gavel" style="font-size:24px;"></i> <br>GRIEVANCE <br>SUBMISSION </a>
    </div>
  </div>
 

  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card"> <a href="#" class="#"><i class="fa fa fa-flask" style="font-size:24px;"></i><br>ACADEMIC <br>WORKSHOP</a></div>
  </div>
 
 
  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card"> <a href="#" class="#"><i class="fa fa-ban" style="font-size:24px;"></i><br>ANIT RAGGING <br>MESSURES</a></div>
  </div>
 
 
  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card"> <a href="#" class="#"><i class="fa fa-user" style="font-size:24px;"></i><br>MMIT <br>FACULTIES</a></div>
  </div>
 
 
 
 
</div>
</div>


<!------------------------------------------>
<div class="container-fluid" style="background-color:#FF3300; margin-top:50px" >
<div class="row">
<div class="wrap">
                <div class="sidebar">
                    <div class="sidebar_left_top">
                        <div class="services">
                            <h3>
                                <span class="glyphicon glyphicon-picture" style="font-size: 20px; color: #FFFFFF; text-decoration: none; text-align: center;"></span>Happenings @ MMMUT
                            </h3>
                            <div class="services_list">
                                <div style="padding: 5px; width: 100%">
                                    <div class="smBox">
                                        <div class="smBX newsBlock">
                                            <div id="p7VSC_111" class="p7VSC03">
                                                <div class="p7VSC_scrollbox_wrapper">
                                                    <div id="p7VSCb_111" class="p7VSC_scrollbox">
                                                        <div style="top: -252px;" id="p7VSCd_111_c1" class="p7VSC_scrolling">
                                                            <div class="p7VSC_content">

                                                                <span id="ctl00_DataList4" style="display:inline-block;width:100%;"><span>
                                                                        <div class="latestnews_desc">
                                                                            <h4>
                                                                                <img id="ctl00_DataList4_ctl00_Image1" class="w_fl_ico" src="images/new.gif" style="border-width:0px;" />
                                                                                <span id="ctl00_DataList4_ctl00_Label1">MET-2019</span></h4>
                                                                            <div class="clr">
                                                                            </div>
                                                                            <p style="text-align: justify">
                                                                                <span id="ctl00_DataList4_ctl00_Label2" class="text">Submission of Online Application Form will start from Jan 17, 2019</span>
                                                                                
                                                                            </p>
                                                                            <div class="clr">
                                                                            </div>
                                                                        </div>
                                                                    </span><span>
                                                                        <div class="latestnews_desc">
                                                                            <h4>
                                                                                <img id="ctl00_DataList4_ctl01_Image1" class="w_fl_ico" src="images/new.gif" style="border-width:0px;" />
                                                                                <span id="ctl00_DataList4_ctl01_Label1">Foreman Instructor (UR) Recruitment</span></h4>
                                                                            <div class="clr">
                                                                            </div>
                                                                            <p style="text-align: justify">
                                                                                <span id="ctl00_DataList4_ctl01_Label2" class="text">List of Eligible Candidates for Written Test for the Post of Foreman Instructor (UR)</span>
                                                                                <a id="ctl00_DataList4_ctl01_HyperLink1" class="btn btn-danger btn-xs w_fl_more" href="News_content/30123news_01052019.pdf" target="_blank" style="text-decoration:underline;">More..</a>
                                                                            </p>
                                                                            <div class="clr">
                                                                            </div>
                                                                        </div>
                                                                    </span><span>
                                                                        <div class="latestnews_desc">
                                                                            <h4>
                                                                                <img id="ctl00_DataList4_ctl02_Image1" class="w_fl_ico" src="images/new.gif" style="border-width:0px;" />
                                                                                <span id="ctl00_DataList4_ctl02_Label1">Librarian (UR) Recruitment</span></h4>
                                                                            <div class="clr">
                                                                            </div>
                                                                            <p style="text-align: justify">
                                                                                <span id="ctl00_DataList4_ctl02_Label2" class="text">List of Eligible Candidates for Presentation and Interview for the Post of Librarian (UR)</span>
                                                                                <a id="ctl00_DataList4_ctl02_HyperLink1" class="btn btn-danger btn-xs w_fl_more" href="News_content/34321news_01052019.pdf" target="_blank" style="text-decoration:underline;">More..</a>
                                                                            </p>
                                                                            <div class="clr">
                                                                            </div>
                                                                        </div>
                                                                    </span><span>
                                                                        <div class="latestnews_desc">
                                                                            <h4>
                                                                                <img id="ctl00_DataList4_ctl03_Image1" class="w_fl_ico" src="images/new.gif" style="border-width:0px;" />
                                                                                <span id="ctl00_DataList4_ctl03_Label1">Tender for Finance Section Software</span></h4>
                                                                            <div class="clr">
                                                                            </div>
                                                                            <p style="text-align: justify">
                                                                                <span id="ctl00_DataList4_ctl03_Label2" class="text">Tender for Development, Installation, Up-grading / Maintenance and Hosting of Web Application Software for Automation of Finance Section</span>
                                                                                <a id="ctl00_DataList4_ctl03_HyperLink1" class="btn btn-danger btn-xs w_fl_more" href="http://mmmut.ac.in/tender/7867682685tender_12312018.pdf" target="_blank" style="text-decoration:underline;">More..</a>
                                                                            </p>
                                                                            <div class="clr">
                                                                            </div>
                                                                        </div>
                                                                    </span><span>
                                                                        <div class="latestnews_desc">
                                                                            <h4>
                                                                                <img id="ctl00_DataList4_ctl04_Image1" class="w_fl_ico" src="images/new.gif" style="border-width:0px;" />
                                                                                <span id="ctl00_DataList4_ctl04_Label1">Commonwealth-2019 Scholarship</span></h4>
                                                                            <div class="clr">
                                                                            </div>
                                                                            <p style="text-align: justify">
                                                                                <span id="ctl00_DataList4_ctl04_Label2" class="text">Commonwealth-2019 Scholarship for pursuing Masters & Doctoral degree programme in UK</span>
                                                                                <a id="ctl00_DataList4_ctl04_HyperLink1" class="btn btn-danger btn-xs w_fl_more" href="https://drive.google.com/file/d/1iS6EKos-AxrdvRDLS5C6YBBP_Oho4Laf/view" target="_blank" style="text-decoration:underline;">More..</a>
                                                                            </p>
                                                                            <div class="clr">
                                                                            </div>
                                                                        </div>
                                                                    </span><span>
                                                                        <div class="latestnews_desc">
                                                                            <h4>
                                                                                <img id="ctl00_DataList4_ctl05_Image1" class="w_fl_ico" src="images/new.gif" style="border-width:0px;" />
                                                                                <span id="ctl00_DataList4_ctl05_Label1">Alumni Directory</span></h4>
                                                                            <div class="clr">
                                                                            </div>
                                                                            <p style="text-align: justify">
                                                                                <span id="ctl00_DataList4_ctl05_Label2" class="text">Alumni are invited to fill the Google form for creation of Alumni Directory</span>
                                                                                <a id="ctl00_DataList4_ctl05_HyperLink1" class="btn btn-danger btn-xs w_fl_more" href="https://goo.gl/forms/Dd8dHMayE9ORgVTH2" target="_blank" style="text-decoration:underline;">More..</a>
                                                                            </p>
                                                                            <div class="clr">
                                                                            </div>
                                                                        </div>
                                                                    </span><span>
                                                                        <div class="latestnews_desc">
                                                                            <h4>
                                                                                <img id="ctl00_DataList4_ctl06_Image1" class="w_fl_ico" src="images/new.gif" style="border-width:0px;" />
                                                                                <span id="ctl00_DataList4_ctl06_Label1">Malaviyans' Darpan</span></h4>
                                                                            <div class="clr">
                                                                            </div>
                                                                            <p style="text-align: justify">
                                                                                <span id="ctl00_DataList4_ctl06_Label2" class="text">Malaviyans’ Darpan Google Form for Golden Jubilee (1968 Pass-out ) and Silver Jubilee (1993 Pass-out) Batch Alumni</span>
                                                                                <a id="ctl00_DataList4_ctl06_HyperLink1" class="btn btn-danger btn-xs w_fl_more" href="https://goo.gl/forms/mSZw3874LYdfQnUo1" target="_blank" style="text-decoration:underline;">More..</a>
                                                                            </p>
                                                                            <div class="clr">
                                                                            </div>
                                                                        </div>
                                                                    </span></span>

                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="p7VSCcn_111" class="p7VSCdragchannel">
                                                    <div class="p7VSC_up">
                                                        <a href="javascript:;" id="p7VSCdu_111"><em>up</em></a>
                                                    </div>
                                                    <div style="height: 535px;" id="p7VSCdc_111" class="p7VSCdragbar">
                                                        <div id="p7VSCdb_111" class="p7VSCdragCtrl">
                                                            <a href="javascript:;"><em>scroll</em></a>
                                                        </div>
                                                    </div>
                                                    <div class="p7VSC_pauseplay">
                                                        <a href="javascript:;" class="pause" id="p7VSCbpp_111"><em>Pause or Play</em></a>
                                                    </div>
                                                    <div class="p7VSC_dn">
                                                        <a href="javascript:;" id="p7VSCdd_111"><em>down</em></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <script type="text/javascript">

                                                P7_opVSC('p7VSCb_111', 1, 40, 4, 10, 10, 290, 1, 1, 0, 1, 1200, 50, 2000, 0);

                                            </script>

                                            <style type="text/css">
                                                #p7VSCb_111 {
                                                    height: 620px !important;
                                                }

                                                #p7VSCcn_111 {
                                                    height: 620px !important;
                                                }
                                            </style>
                                            <style type="text/css">
                                                #p7VSCcn_111 {
                                                    height: 660px;
                                                }
                                            </style>
                                        </div>
                                    </div>

                                </div>




                                

                                <div style="padding: 5px; margin: 5px;">
                                    <a href="AllHappenings.aspx" class="btn btn-danger btn-xs">View All Happenings</a>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
<!--<div class="col-lg-4" >
<div class="card" >
  <h5 class="card-header" style="color:
#af0202"><strong><center> <i class="fa fa-bullhorn" style="font-size:36px;color:red"></i> NOTICE BOARD</center></strong></h5>
  <div class="card-body">
  <marquee  onMouseOver="this.scrollAmount=0" onMouseOut="this.scrollAmount=2" scrollamount="2" direction="up" loop="true" width="100%">
<center>
<font><img src="images/new_red.gif"> Important Notice Regarding Student Registration 2018-19 Even Semester New</font><p>
<font> <img src="images/new_red.gif"> Notice Regarding Student Registration 2018 19 Even Semester</font><p> 
<font> Final Schedule for all Odd Semester Examination, 2018-19 </font><p>
<font> Important Notice Regarding Student Registration 2018-19 Even Semester New</font><p>

<font> <img src="images/new_red.gif">Final Schedule for all Odd Semester Examination, 2018-19 </font>
</center>
</marquee>
  </div>
</div>
</div>

<div class="col-lg-4">
<div class="card">
  <h5 class="card-header" style="color:#af0202;"><strong><center>WELCOME TO MMIT POLYTECHNIC, MAHARAJGANJ</center></strong></h5>
  <div class="card-body">
<p>Mahamaya It Polytechnic Maharajganj is a Government diploma college located in the district of Maharajganj, Uttar Pradesh state of India. This polytechnic college is located at Dhanewa-Dhanei Maharajganj.</p>

<p>Mahamaya It Polytechnic Maharajganj college offers a diploma in Computer Sceince and Engineering. This course falls under the Engineering and Technology programme. This course is affiliated under Uttar Pradesh Board of Technical Education, Lucknow. </p>
  </div>
</div>
</div>

<div class="col-lg-4">
<div class="card">
  <h5 class="card-header" style="color:#af0202;"><strong><center> <i class="fa fa-calendar" style="font-size:36px;color:red"></i></i> NEWS & EVENTS</center></strong></h5>
  <div class="card-body">
 <marquee  onMouseOver="this.scrollAmount=0" onMouseOut="this.scrollAmount=2" scrollamount="2" direction="up" loop="true" width="100%">
<center>
<font><img src="images/new_red.gif"> Important Notice Regarding Student Registration 2018-19 Even Semester New</font><p>
<font> <img src="images/new_red.gif"> Notice Regarding Student Registration 2018 19 Even Semester</font><p> 
<font> Final Schedule for all Odd Semester Examination, 2018-19 </font><p>
<font> Important Notice Regarding Student Registration 2018-19 Even Semester New</font><p>

<font> <img src="images/new_red.gif">Final Schedule for all Odd Semester Examination, 2018-19 </font>
</center>
</marquee>
  </div>
</div>
</div>

</div>-->
</div>




<div class="container-fluid" style="background-color:#FFFFFF; margin-top:50px;" >
<h1><center><strong>OUR DEPARTMENT</strong></center></h1>
<div class="row">

<div class="col-lg-4">
<div class="polaroid">
<a href="#" class="headline" >
  <img src="images/demo/Departments/computer-science.jpg" alt=""  style="width:100%">
  </a>
  <div class="container">
  <p><strong>Computer Science &amp; Engineering</strong></p>
  </div>
</div>

</div>

<div class="col-lg-4">
<div class="polaroid">
  <img src="images/demo/Departments/information-technology.jpg" alt="" style="width:100%">
  <div class="container">
  <p><strong>Electronic Engineering</strong></p>
  </div>
</div>
</div>
  
<div class="col-lg-4">
<div class="polaroid">
  <img src="images/demo/Departments/electrical-engg.jpg" alt="" style="width:100%">
  <div class="container">
  <p><strong>Electrical Engineering</strong></p>
  </div>
</div>
</div>


</div>
</div>




<!-------------------------------------->






<!---MENUS----------->
<div class="container-fluid" style="background-color:#FFFFFF; margin-top:50px;margin-bottom:50px;" >
<div class="row">
  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card">
     <a href="#" class="#"><i class="fa fa-group" style="font-size:24px;"></i><br>TPO OFFICERS </a>
    
    
    </div>
  </div>
 

 
 

  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card"> <a href="#" class="#"><i class="fa fa-globe" style="font-size:24px;"></i><br>WEBMAIL</a></div>
  </div>
 

  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card">
    <a href="#" class="#"><i class="fa fa-street-view" style="font-size:24px;"></i> <br>RIGHT TO INFO </a>
    </div>
  </div>
 

  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card"> <a href="#" class="#"><i class="fa fa-bell" style="font-size:24px;"></i><br>CULTURAL</a></div>
  </div>
 
 
  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card"> <a href="#" class="#"><i class="fa fa-graduation-cap" style="font-size:24px;"></i><br>SYLLABUS</a></div>
  </div>
 
 
  <div class="col-lg-2 col-md-3  col-sm-4 col-xs-4 col-6">
    <div class="card"> <a href="#" class="#"><i class="fa fa-external-link" style="font-size:24px;"></i><br>USEFUL LINKS</a></div>
  </div>
 
 
 
 
</div>
</div>


<!------------------------------------------>



<?php require('footer.php');?>