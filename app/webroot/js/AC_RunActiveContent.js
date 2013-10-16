//v1.0
//Copyright 2006 Adobe Systems, Inc. All rights reserved.
function AC_AddExtension(src, ext)
{
  if (src.indexOf('?') != -1)
    return src.replace(/\?/, ext+'?'); 
  else
    return src + ext;
}

function AC_Generateobj(objAttrs, params, embedAttrs) 
{ 
  var str = '<object ';
  for (var i in objAttrs)
    str += i + '="' + objAttrs[i] + '" ';
  str += '>';
  for (var i in params)
    str += '<param name="' + i + '" value="' + params[i] + '" /> ';
  str += '<embed ';
  for (var i in embedAttrs)
    str += i + '="' + embedAttrs[i] + '" ';
  str += ' ></embed></object>';

  document.write(str);
}

function AC_FL_RunContent(){
  var ret = 
    AC_GetArgs
    (  arguments, ".swf", "movie", "clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
     , "application/x-shockwave-flash"
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_SW_RunContent(){
  var ret = 
    AC_GetArgs
    (  arguments, ".dcr", "src", "clsid:166B1BCA-3F9C-11CF-8075-444553540000"
     , null
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}


function AC_GetArgs(args, ext, srcParamName, classid, mimeType){
  var ret = new Object();
  ret.embedAttrs = new Object();
  ret.params = new Object();
  ret.objAttrs = new Object();
  for (var i=0; i < args.length; i=i+2){
    var currArg = args[i].toLowerCase();    

    switch (currArg){	
      case "classid":
        break;
      case "pluginspage":
        ret.embedAttrs[args[i]] = args[i+1];
        break;
      case "src":
      case "movie":	
        args[i+1] = AC_AddExtension(args[i+1], ext);
        ret.embedAttrs["src"] = args[i+1];
        ret.params[srcParamName] = args[i+1];
        break;
      case "onafterupdate":
      case "onbeforeupdate":
      case "onblur":
      case "oncellchange":
      case "onclick":
      case "ondblClick":
      case "ondrag":
      case "ondragend":
      case "ondragenter":
      case "ondragleave":
      case "ondragover":
      case "ondrop":
      case "onfinish":
      case "onfocus":
      case "onhelp":
      case "onmousedown":
      case "onmouseup":
      case "onmouseover":
      case "onmousemove":
      case "onmouseout":
      case "onkeypress":
      case "onkeydown":
      case "onkeyup":
      case "onload":
      case "onlosecapture":
      case "onpropertychange":
      case "onreadystatechange":
      case "onrowsdelete":
      case "onrowenter":
      case "onrowexit":
      case "onrowsinserted":
      case "onstart":
      case "onscroll":
      case "onbeforeeditfocus":
      case "onactivate":
      case "onbeforedeactivate":
      case "ondeactivate":
      case "type":
      case "codebase":
        ret.objAttrs[args[i]] = args[i+1];
        break;
      case "width":
      case "height":
      case "align":
      case "vspace": 
      case "hspace":
      case "class":
      case "title":
      case "accesskey":
      case "name":
      case "id":
      case "tabindex":
        ret.embedAttrs[args[i]] = ret.objAttrs[args[i]] = args[i+1];
        break;
      default:
        ret.embedAttrs[args[i]] = ret.params[args[i]] = args[i+1];
    }
  }
  ret.objAttrs["classid"] = classid;
  if (mimeType) ret.embedAttrs["type"] = mimeType;
  return ret;
}











/****************************************************************************
* Flash Tag Write Object v1.5 - by Lucas Fererira - www.lucasferreira.com	*
* Info and Usage: www.lucasferreira.com/flashtag							*
* bugs/reports: contato@lucasferreira.com									*
****************************************************************************/

if(Browser == undefined){
	var Browser = {
		isIE: function(){ return (window.ActiveXObject && document.all && navigator.userAgent.toLowerCase().indexOf("msie") > -1  && navigator.userAgent.toLowerCase().indexOf("opera") == -1) ? true : false; }
	}
}

var Flash = function(movie, id, width, height, initParams){

	this.html = "";
	this.attributes = this.params = this.variables = null;
	
	this.variables = new Array();
	this.attributes = {
		"classid": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
		"codebase": "http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab#version=7,0,0,0",
		"type": "application/x-shockwave-flash"
	}
	this.params = { "pluginurl": "http://www.macromedia.com/go/getflashplayer_br" };
	
	if(movie) {
		this.addAttribute("data", movie);
		this.addParameter("movie", movie);
	}
	
	if(id && id != null) this.addAttribute("id", id);
	if(width) this.addAttribute("width", width);
	if(height) this.addAttribute("height", height);
	
	if(initParams != undefined){
		for(var i in initParams){
			this.addParameter(i.toString(), initParams[i]);
		}
	}
	
}
Flash.version = "1.2b";
Flash.getObjectByExceptions = function(obj, excep){
	var tempObj = {};
	for(var i in obj){
		var inclui = true;
		for(var j=0; j<excep.length; j++)
			if(excep[j] == i.toString()) { inclui = false; break; };
		if(inclui) tempObj[i] = obj[i];
	}
	return tempObj;
}
Flash.prototype.addAttribute = function(prop, val){ this.attributes[prop] = val; }
Flash.prototype.addParameter = function(prop, val){ this.params[prop] = val; }
Flash.prototype.addVariable = function(prop, val){ this.variables.push([prop, val]); }
Flash.prototype.getFlashVars = function(){
	var tempString = new Array();
	
	for(var i=0; i<this.variables.length; i++)
		tempString.push(this.variables[i].join("="));
		
	return tempString.join("&");
}
Flash.prototype.toString = function(){
	
	this.params.flashVars = this.getFlashVars();
	if(Browser.isIE()){
		//IE
		this.html = "<ob" + "ject";
		var attr = Flash.getObjectByExceptions(this.attributes, ["type", "data"]);
		for(var i in attr) if(i.toString() != "extend") this.html += " " + i.toString() + " = \"" + attr[i] + "\"";
		this.html += "> ";
		var params = Flash.getObjectByExceptions(this.params, ["pluginurl", "extend"]);
		for(var i in params) if(i.toString() != "extend") this.html += "<param name=\"" + i.toString() + "\" value=\"" + params[i] + "\" /> ";
		this.html += " </obj" + "ect>";
	} else {
		//non-IE
		this.html = "<!--[if !IE]> <--> <obj" + "ect";
		var attr = Flash.getObjectByExceptions(this.attributes, ["classid", "codebase"]);
		for(var i in attr) if(i.toString() != "extend") this.html += " " + i.toString() + " = \"" + attr[i] + "\"";
		this.html += "> ";
		var params = Flash.getObjectByExceptions(this.params, ["extend"]);
		for(var i in params) if(i.toString() != "extend") this.html += "<param name=\"" + i.toString() + "\" value=\"" + params[i] + "\" /> ";
		this.html += " </obj" + "ect> <!--> <![endif]-->";
	}

	return this.html;
	
}
Flash.prototype.write = Flash.prototype.outIn = Flash.prototype.writeIn = function(w){
	if(typeof w == "string" && document.getElementById) var w = document.getElementById(w);
	if( w != undefined && w ) w.innerHTML = this.toString();
	else document.write( this.toString() );
}

//funções de automatização...
Flash.correctAll = function(){
	
	if(!/MSIE (5|6)/.test(navigator.userAgent) || !document.getElementsByTagName) return false;

	for (var i = 0, objects = document.getElementsByTagName("OBJECT");
			i < objects.length; (objects[i].outerHTML ? (objects[i].outerHTML = objects[i].outerHTML, objects[i].style.visibility = "visible") : null), i++);

}
Flash.automatic = function(r){
	
	if(r && window.attachEvent){
	
		for (var i = 0, objects = document.getElementsByTagName("OBJECT");
				i < objects.length; (objects[i].style.visibility = "hidden"), i++);
		
		window.attachEvent("onload", Flash.correctAll);
		window.attachEvent("onunload", function(){	window.detachEvent("onload", Flash.correctAll);	});
		
	} else {
		Flash.correctAll();
	}

}



function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}


function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var contato = document.getElementById('contato');
  var i, check = false, interesse;
  for( i = 1; i <= 5; i++ ){
	interesse = document.getElementById('interesse'+i).checked;
	if( interesse == true ){
	  check = true;
	}
  }
  
  
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { 
      test=args[i+2]; 
	  val=MM_findObj(args[i]);
	  if(val.name == 'mensagem'){
		if( check == false ){
				errors += '- serviço de interesse é requerido.\n'; 
		} 
	  }
      if (val) { 
	    nm=val.name; 
		if ((val=val.value)!="") {
		  if (test.indexOf('isEmail')!=-1) { 		
			if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value))){
			   errors+='- O '+nm+' não é valido.\n';
			}	
		  } else if (test!='R') { 
		    num = parseFloat(val);
			if (isNaN(val)) errors+='- O '+nm+'deve conter apenas números.\n';
			if (test.indexOf('inRange') != -1) { 
			    p=test.indexOf(':');
			    min=test.substring(8,p); max=test.substring(p+1);
			    if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
			} 
		  } 
		} else if (test.charAt(0) == 'R'){
			errors += '- '+nm+' é requerido.\n'; 
		}
	  }
	
  } 

  if (errors) alert('Ocorreram os seguintes erros:\n'+errors);
  document.MM_returnValue = (errors == '');
  if (errors == ''){ contato.submit(); }
}

function createTable(){
	var altura = '';
	var largura = '';
	altura = document.body.scrollHeight;
	largura = document.body.scrollWidth;
	
	document.getElementById('transparente').style.height = altura;
	document.getElementById('transparente').style.width = largura;
	
	var redimenciona = '<img src="imagens/img.gif" width="30" height="'+altura+'">';	
	
	document.getElementById('transparente').innerHTML = redimenciona;	

}

function contato(valor){
	document.getElementById('valor').innerHTML = valor;
	document.getElementById('contato-menu').style.visibility = 'hidden';
	document.getElementById('hidden').style.visibility = 'hidden';		
	
	if (valor == "Contato"){
	
		document.getElementById('subject').value = 'Contacto Net | Contato';
	
	}else{
		document.getElementById('subject').value = 'Contacto Net | Orçamento';
	}
	
	
}


function resize(valor){
	
	var mensagem;
	var tamanho;
	var aumentar;
	
	mensagem = document.getElementById('mensagem').style.height;	
	tamanho  = mensagem.substring(mensagem.length-2,0);
	

	if (valor == "+"){
		aumentar = parseFloat(tamanho) + 40;
		document.getElementById('mensagem').style.height = aumentar + 'px';
		
	}

	if (valor == "-"){
		if (tamanho > 150){
			reduzir = parseFloat(tamanho) - 40;
			document.getElementById('mensagem').style.height = reduzir + 'px';
		}
	}
	
	document.getElementById('mensagem').focus();
	
}

function foco(){
	document.getElementById('empresa').focus();
}


function swf(xml,id){
		
	var flash = '<a href="#item'+id+'" onClick="MM_showHideLayers(\'transparente\',\'\',\'hide\',\'exemplo\',\'\',\'hide\');"><img src="imagens/fecharfoto.gif" width="139" height="20" border="0" style="margin-bottom: 5px;"></a><br>';	
		
		flash += '<script type="text/javascript">AC_FL_RunContent( \'codebase\',\'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\',\'wmode\',\'transparent\',\'width\',\'410\',\'height\',\'340\',\'menu\',\'false\',\'src\',\'galeria_fotos?arquivo='+xml+'\',\'quality\',\'high\',\'pluginspage\',\'http://www.macromedia.com/go/getflashplayer\',\'movie\',\'galeria_fotos?arquivo='+xml+'\' );</script>';
      	flash += '<embed src="galeria_fotos.swf?arquivo='+xml+'" menu="false" width="410" height="340" wmode="transparent" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>';

		
		document.getElementById('site').innerHTML = flash;
	
}












