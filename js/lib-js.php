if(typeof deconcept=="undefined"){var deconcept=new Object();}if(typeof deconcept.util=="undefined"){deconcept.util=new Object();}if(typeof deconcept.SWFObjectUtil=="undefined"){deconcept.SWFObjectUtil=new Object();}deconcept.SWFObject=function(_1,id,w,h,_5,c,_7,_8,_9,_a){if(!document.getElementById){return;}this.DETECT_KEY=_a?_a:"detectflash";this.skipDetect=deconcept.util.getRequestParameter(this.DETECT_KEY);this.params=new Object();this.variables=new Object();this.attributes=new Array();if(_1){this.setAttribute("swf",_1);}if(id){this.setAttribute("id",id);}if(w){this.setAttribute("width",w);}if(h){this.setAttribute("height",h);}if(_5){this.setAttribute("version",new deconcept.PlayerVersion(_5.toString().split(".")));}this.installedVer=deconcept.SWFObjectUtil.getPlayerVersion();if(!window.opera&&document.all&&this.installedVer.major>7){deconcept.SWFObject.doPrepUnload=true;}if(c){this.addParam("bgcolor",c);}var q=_7?_7:"high";this.addParam("quality",q);this.setAttribute("useExpressInstall",false);this.setAttribute("doExpressInstall",false);var _c=(_8)?_8:window.location;this.setAttribute("xiRedirectUrl",_c);this.setAttribute("redirectUrl","");if(_9){this.setAttribute("redirectUrl",_9);}};deconcept.SWFObject.prototype={useExpressInstall:function(_d){this.xiSWFPath=!_d?"expressinstall.swf":_d;this.setAttribute("useExpressInstall",true);},setAttribute:function(_e,_f){this.attributes[_e]=_f;},getAttribute:function(_10){return this.attributes[_10];},addParam:function(_11,_12){this.params[_11]=_12;},getParams:function(){return this.params;},addVariable:function(_13,_14){this.variables[_13]=_14;},getVariable:function(_15){return this.variables[_15];},getVariables:function(){return this.variables;},getVariablePairs:function(){var _16=new Array();var key;var _18=this.getVariables();for(key in _18){_16[_16.length]=key+"="+_18[key];}return _16;},getSWFHTML:function(){var _19="";if(navigator.plugins&&navigator.mimeTypes&&navigator.mimeTypes.length){if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","PlugIn");this.setAttribute("swf",this.xiSWFPath);}_19="<embed type=\"application/x-shockwave-flash\" src=\""+this.getAttribute("swf")+"\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\" style=\""+this.getAttribute("style")+"\"";_19+=" id=\""+this.getAttribute("id")+"\" name=\""+this.getAttribute("id")+"\" ";var _1a=this.getParams();for(var key in _1a){_19+=[key]+"=\""+_1a[key]+"\" ";}var _1c=this.getVariablePairs().join("&");if(_1c.length>0){_19+="flashvars=\""+_1c+"\"";}_19+="/>";}else{if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","ActiveX");this.setAttribute("swf",this.xiSWFPath);}_19="<object id=\""+this.getAttribute("id")+"\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\" style=\""+this.getAttribute("style")+"\">";_19+="<param name=\"movie\" value=\""+this.getAttribute("swf")+"\" />";var _1d=this.getParams();for(var key in _1d){_19+="<param name=\""+key+"\" value=\""+_1d[key]+"\" />";}var _1f=this.getVariablePairs().join("&");if(_1f.length>0){_19+="<param name=\"flashvars\" value=\""+_1f+"\" />";}_19+="</object>";}return _19;},write:function(_20){if(this.getAttribute("useExpressInstall")){var _21=new deconcept.PlayerVersion([6,0,65]);if(this.installedVer.versionIsValid(_21)&&!this.installedVer.versionIsValid(this.getAttribute("version"))){this.setAttribute("doExpressInstall",true);this.addVariable("MMredirectURL",escape(this.getAttribute("xiRedirectUrl")));document.title=document.title.slice(0,47)+" - Flash Player Installation";this.addVariable("MMdoctitle",document.title);}}if(this.skipDetect||this.getAttribute("doExpressInstall")||this.installedVer.versionIsValid(this.getAttribute("version"))){var n=(typeof _20=="string")?document.getElementById(_20):_20;n.innerHTML=this.getSWFHTML();return true;}else{if(this.getAttribute("redirectUrl")!=""){document.location.replace(this.getAttribute("redirectUrl"));}}return false;}};deconcept.SWFObjectUtil.getPlayerVersion=function(){var _23=new deconcept.PlayerVersion([0,0,0]);if(navigator.plugins&&navigator.mimeTypes.length){var x=navigator.plugins["Shockwave Flash"];if(x&&x.description){_23=new deconcept.PlayerVersion(x.description.replace(/([a-zA-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split("."));}}else{if(navigator.userAgent&&navigator.userAgent.indexOf("Windows CE")>=0){var axo=1;var _26=3;while(axo){try{_26++;axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+_26);_23=new deconcept.PlayerVersion([_26,0,0]);}catch(e){axo=null;}}}else{try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7");}catch(e){try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6");_23=new deconcept.PlayerVersion([6,0,21]);axo.AllowScriptAccess="always";}catch(e){if(_23.major==6){return _23;}}try{axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");}catch(e){}}if(axo!=null){_23=new deconcept.PlayerVersion(axo.GetVariable("$version").split(" ")[1].split(","));}}}return _23;};deconcept.PlayerVersion=function(_29){this.major=_29[0]!=null?parseInt(_29[0]):0;this.minor=_29[1]!=null?parseInt(_29[1]):0;this.rev=_29[2]!=null?parseInt(_29[2]):0;};deconcept.PlayerVersion.prototype.versionIsValid=function(fv){if(this.major<fv.major){return false;}if(this.major>fv.major){return true;}if(this.minor<fv.minor){return false;}if(this.minor>fv.minor){return true;}if(this.rev<fv.rev){return false;}return true;};deconcept.util={getRequestParameter:function(_2b){var q=document.location.search||document.location.hash;if(_2b==null){return q;}if(q){var _2d=q.substring(1).split("&");for(var i=0;i<_2d.length;i++){if(_2d[i].substring(0,_2d[i].indexOf("="))==_2b){return _2d[i].substring((_2d[i].indexOf("=")+1));}}}return "";}};deconcept.SWFObjectUtil.cleanupSWFs=function(){var _2f=document.getElementsByTagName("OBJECT");for(var i=_2f.length-1;i>=0;i--){_2f[i].style.display="none";for(var x in _2f[i]){if(typeof _2f[i][x]=="function"){_2f[i][x]=function(){};}}}};if(deconcept.SWFObject.doPrepUnload){if(!deconcept.unloadSet){deconcept.SWFObjectUtil.prepUnload=function(){__flash_unloadHandler=function(){};__flash_savedUnloadHandler=function(){};window.attachEvent("onunload",deconcept.SWFObjectUtil.cleanupSWFs);};window.attachEvent("onbeforeunload",deconcept.SWFObjectUtil.prepUnload);deconcept.unloadSet=true;}}if(!document.getElementById&&document.all){document.getElementById=function(id){return document.all[id];};}var getQueryParamValue=deconcept.util.getRequestParameter;var FlashObject=deconcept.SWFObject;var SWFObject=deconcept.SWFObject;
(function(a,b){function cy(a){return f.isWindow(a)?a:a.nodeType===9?a.defaultView||a.parentWindow:!1}function cv(a){if(!ck[a]){var b=c.body,d=f("<"+a+">").appendTo(b),e=d.css("display");d.remove();if(e==="none"||e===""){cl||(cl=c.createElement("iframe"),cl.frameBorder=cl.width=cl.height=0),b.appendChild(cl);if(!cm||!cl.createElement)cm=(cl.contentWindow||cl.contentDocument).document,cm.write((c.compatMode==="CSS1Compat"?"<!doctype html>":"")+"<html><body>"),cm.close();d=cm.createElement(a),cm.body.appendChild(d),e=f.css(d,"display"),b.removeChild(cl)}ck[a]=e}return ck[a]}function cu(a,b){var c={};f.each(cq.concat.apply([],cq.slice(0,b)),function(){c[this]=a});return c}function ct(){cr=b}function cs(){setTimeout(ct,0);return cr=f.now()}function cj(){try{return new a.ActiveXObject("Microsoft.XMLHTTP")}catch(b){}}function ci(){try{return new a.XMLHttpRequest}catch(b){}}function cc(a,c){a.dataFilter&&(c=a.dataFilter(c,a.dataType));var d=a.dataTypes,e={},g,h,i=d.length,j,k=d[0],l,m,n,o,p;for(g=1;g<i;g++){if(g===1)for(h in a.converters)typeof h=="string"&&(e[h.toLowerCase()]=a.converters[h]);l=k,k=d[g];if(k==="*")k=l;else if(l!=="*"&&l!==k){m=l+" "+k,n=e[m]||e["* "+k];if(!n){p=b;for(o in e){j=o.split(" ");if(j[0]===l||j[0]==="*"){p=e[j[1]+" "+k];if(p){o=e[o],o===!0?n=p:p===!0&&(n=o);break}}}}!n&&!p&&f.error("No conversion from "+m.replace(" "," to ")),n!==!0&&(c=n?n(c):p(o(c)))}}return c}function cb(a,c,d){var e=a.contents,f=a.dataTypes,g=a.responseFields,h,i,j,k;for(i in g)i in d&&(c[g[i]]=d[i]);while(f[0]==="*")f.shift(),h===b&&(h=a.mimeType||c.getResponseHeader("content-type"));if(h)for(i in e)if(e[i]&&e[i].test(h)){f.unshift(i);break}if(f[0]in d)j=f[0];else{for(i in d){if(!f[0]||a.converters[i+" "+f[0]]){j=i;break}k||(k=i)}j=j||k}if(j){j!==f[0]&&f.unshift(j);return d[j]}}function ca(a,b,c,d){if(f.isArray(b))f.each(b,function(b,e){c||bE.test(a)?d(a,e):ca(a+"["+(typeof e=="object"||f.isArray(e)?b:"")+"]",e,c,d)});else if(!c&&b!=null&&typeof b=="object")for(var e in b)ca(a+"["+e+"]",b[e],c,d);else d(a,b)}function b_(a,c){var d,e,g=f.ajaxSettings.flatOptions||{};for(d in c)c[d]!==b&&((g[d]?a:e||(e={}))[d]=c[d]);e&&f.extend(!0,a,e)}function b$(a,c,d,e,f,g){f=f||c.dataTypes[0],g=g||{},g[f]=!0;var h=a[f],i=0,j=h?h.length:0,k=a===bT,l;for(;i<j&&(k||!l);i++)l=h[i](c,d,e),typeof l=="string"&&(!k||g[l]?l=b:(c.dataTypes.unshift(l),l=b$(a,c,d,e,l,g)));(k||!l)&&!g["*"]&&(l=b$(a,c,d,e,"*",g));return l}function bZ(a){return function(b,c){typeof b!="string"&&(c=b,b="*");if(f.isFunction(c)){var d=b.toLowerCase().split(bP),e=0,g=d.length,h,i,j;for(;e<g;e++)h=d[e],j=/^\+/.test(h),j&&(h=h.substr(1)||"*"),i=a[h]=a[h]||[],i[j?"unshift":"push"](c)}}}function bC(a,b,c){var d=b==="width"?a.offsetWidth:a.offsetHeight,e=b==="width"?bx:by,g=0,h=e.length;if(d>0){if(c!=="border")for(;g<h;g++)c||(d-=parseFloat(f.css(a,"padding"+e[g]))||0),c==="margin"?d+=parseFloat(f.css(a,c+e[g]))||0:d-=parseFloat(f.css(a,"border"+e[g]+"Width"))||0;return d+"px"}d=bz(a,b,b);if(d<0||d==null)d=a.style[b]||0;d=parseFloat(d)||0;if(c)for(;g<h;g++)d+=parseFloat(f.css(a,"padding"+e[g]))||0,c!=="padding"&&(d+=parseFloat(f.css(a,"border"+e[g]+"Width"))||0),c==="margin"&&(d+=parseFloat(f.css(a,c+e[g]))||0);return d+"px"}function bp(a,b){b.src?f.ajax({url:b.src,async:!1,dataType:"script"}):f.globalEval((b.text||b.textContent||b.innerHTML||"").replace(bf,"")),b.parentNode&&b.parentNode.removeChild(b)}function bo(a){var b=c.createElement("div");bh.appendChild(b),b.innerHTML=a.outerHTML;return b.firstChild}function bn(a){var b=(a.nodeName||"").toLowerCase();b==="input"?bm(a):b!=="script"&&typeof a.getElementsByTagName!="undefined"&&f.grep(a.getElementsByTagName("input"),bm)}function bm(a){if(a.type==="checkbox"||a.type==="radio")a.defaultChecked=a.checked}function bl(a){return typeof a.getElementsByTagName!="undefined"?a.getElementsByTagName("*"):typeof a.querySelectorAll!="undefined"?a.querySelectorAll("*"):[]}function bk(a,b){var c;if(b.nodeType===1){b.clearAttributes&&b.clearAttributes(),b.mergeAttributes&&b.mergeAttributes(a),c=b.nodeName.toLowerCase();if(c==="object")b.outerHTML=a.outerHTML;else if(c!=="input"||a.type!=="checkbox"&&a.type!=="radio"){if(c==="option")b.selected=a.defaultSelected;else if(c==="input"||c==="textarea")b.defaultValue=a.defaultValue}else a.checked&&(b.defaultChecked=b.checked=a.checked),b.value!==a.value&&(b.value=a.value);b.removeAttribute(f.expando)}}function bj(a,b){if(b.nodeType===1&&!!f.hasData(a)){var c,d,e,g=f._data(a),h=f._data(b,g),i=g.events;if(i){delete h.handle,h.events={};for(c in i)for(d=0,e=i[c].length;d<e;d++)f.event.add(b,c+(i[c][d].namespace?".":"")+i[c][d].namespace,i[c][d],i[c][d].data)}h.data&&(h.data=f.extend({},h.data))}}function bi(a,b){return f.nodeName(a,"table")?a.getElementsByTagName("tbody")[0]||a.appendChild(a.ownerDocument.createElement("tbody")):a}function U(a){var b=V.split("|"),c=a.createDocumentFragment();if(c.createElement)while(b.length)c.createElement(b.pop());return c}function T(a,b,c){b=b||0;if(f.isFunction(b))return f.grep(a,function(a,d){var e=!!b.call(a,d,a);return e===c});if(b.nodeType)return f.grep(a,function(a,d){return a===b===c});if(typeof b=="string"){var d=f.grep(a,function(a){return a.nodeType===1});if(O.test(b))return f.filter(b,d,!c);b=f.filter(b,d)}return f.grep(a,function(a,d){return f.inArray(a,b)>=0===c})}function S(a){return!a||!a.parentNode||a.parentNode.nodeType===11}function K(){return!0}function J(){return!1}function n(a,b,c){var d=b+"defer",e=b+"queue",g=b+"mark",h=f._data(a,d);h&&(c==="queue"||!f._data(a,e))&&(c==="mark"||!f._data(a,g))&&setTimeout(function(){!f._data(a,e)&&!f._data(a,g)&&(f.removeData(a,d,!0),h.fire())},0)}function m(a){for(var b in a){if(b==="data"&&f.isEmptyObject(a[b]))continue;if(b!=="toJSON")return!1}return!0}function l(a,c,d){if(d===b&&a.nodeType===1){var e="data-"+c.replace(k,"-$1").toLowerCase();d=a.getAttribute(e);if(typeof d=="string"){try{d=d==="true"?!0:d==="false"?!1:d==="null"?null:f.isNumeric(d)?parseFloat(d):j.test(d)?f.parseJSON(d):d}catch(g){}f.data(a,c,d)}else d=b}return d}function h(a){var b=g[a]={},c,d;a=a.split(/\s+/);for(c=0,d=a.length;c<d;c++)b[a[c]]=!0;return b}var c=a.document,d=a.navigator,e=a.location,f=function(){function J(){if(!e.isReady){try{c.documentElement.doScroll("left")}catch(a){setTimeout(J,1);return}e.ready()}}var e=function(a,b){return new e.fn.init(a,b,h)},f=a.jQuery,g=a.$,h,i=/^(?:[^#<]*(<[\w\W]+>)[^>]*$|#([\w\-]*)$)/,j=/\S/,k=/^\s+/,l=/\s+$/,m=/^<(\w+)\s*\/?>(?:<\/\1>)?$/,n=/^[\],:{}\s]*$/,o=/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,p=/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,q=/(?:^|:|,)(?:\s*\[)+/g,r=/(webkit)[ \/]([\w.]+)/,s=/(opera)(?:.*version)?[ \/]([\w.]+)/,t=/(msie) ([\w.]+)/,u=/(mozilla)(?:.*? rv:([\w.]+))?/,v=/-([a-z]|[0-9])/ig,w=/^-ms-/,x=function(a,b){return(b+"").toUpperCase()},y=d.userAgent,z,A,B,C=Object.prototype.toString,D=Object.prototype.hasOwnProperty,E=Array.prototype.push,F=Array.prototype.slice,G=String.prototype.trim,H=Array.prototype.indexOf,I={};e.fn=e.prototype={constructor:e,init:function(a,d,f){var g,h,j,k;if(!a)return this;if(a.nodeType){this.context=this[0]=a,this.length=1;return this}if(a==="body"&&!d&&c.body){this.context=c,this[0]=c.body,this.selector=a,this.length=1;return this}if(typeof a=="string"){a.charAt(0)!=="<"||a.charAt(a.length-1)!==">"||a.length<3?g=i.exec(a):g=[null,a,null];if(g&&(g[1]||!d)){if(g[1]){d=d instanceof e?d[0]:d,k=d?d.ownerDocument||d:c,j=m.exec(a),j?e.isPlainObject(d)?(a=[c.createElement(j[1])],e.fn.attr.call(a,d,!0)):a=[k.createElement(j[1])]:(j=e.buildFragment([g[1]],[k]),a=(j.cacheable?e.clone(j.fragment):j.fragment).childNodes);return e.merge(this,a)}h=c.getElementById(g[2]);if(h&&h.parentNode){if(h.id!==g[2])return f.find(a);this.length=1,this[0]=h}this.context=c,this.selector=a;return this}return!d||d.jquery?(d||f).find(a):this.constructor(d).find(a)}if(e.isFunction(a))return f.ready(a);a.selector!==b&&(this.selector=a.selector,this.context=a.context);return e.makeArray(a,this)},selector:"",jquery:"1.7.1",length:0,size:function(){return this.length},toArray:function(){return F.call(this,0)},get:function(a){return a==null?this.toArray():a<0?this[this.length+a]:this[a]},pushStack:function(a,b,c){var d=this.constructor();e.isArray(a)?E.apply(d,a):e.merge(d,a),d.prevObject=this,d.context=this.context,b==="find"?d.selector=this.selector+(this.selector?" ":"")+c:b&&(d.selector=this.selector+"."+b+"("+c+")");return d},each:function(a,b){return e.each(this,a,b)},ready:function(a){e.bindReady(),A.add(a);return this},eq:function(a){a=+a;return a===-1?this.slice(a):this.slice(a,a+1)},first:function(){return this.eq(0)},last:function(){return this.eq(-1)},slice:function(){return this.pushStack(F.apply(this,arguments),"slice",F.call(arguments).join(","))},map:function(a){return this.pushStack(e.map(this,function(b,c){return a.call(b,c,b)}))},end:function(){return this.prevObject||this.constructor(null)},push:E,sort:[].sort,splice:[].splice},e.fn.init.prototype=e.fn,e.extend=e.fn.extend=function(){var a,c,d,f,g,h,i=arguments[0]||{},j=1,k=arguments.length,l=!1;typeof i=="boolean"&&(l=i,i=arguments[1]||{},j=2),typeof i!="object"&&!e.isFunction(i)&&(i={}),k===j&&(i=this,--j);for(;j<k;j++)if((a=arguments[j])!=null)for(c in a){d=i[c],f=a[c];if(i===f)continue;l&&f&&(e.isPlainObject(f)||(g=e.isArray(f)))?(g?(g=!1,h=d&&e.isArray(d)?d:[]):h=d&&e.isPlainObject(d)?d:{},i[c]=e.extend(l,h,f)):f!==b&&(i[c]=f)}return i},e.extend({noConflict:function(b){a.$===e&&(a.$=g),b&&a.jQuery===e&&(a.jQuery=f);return e},isReady:!1,readyWait:1,holdReady:function(a){a?e.readyWait++:e.ready(!0)},ready:function(a){if(a===!0&&!--e.readyWait||a!==!0&&!e.isReady){if(!c.body)return setTimeout(e.ready,1);e.isReady=!0;if(a!==!0&&--e.readyWait>0)return;A.fireWith(c,[e]),e.fn.trigger&&e(c).trigger("ready").off("ready")}},bindReady:function(){if(!A){A=e.Callbacks("once memory");if(c.readyState==="complete")return setTimeout(e.ready,1);if(c.addEventListener)c.addEventListener("DOMContentLoaded",B,!1),a.addEventListener("load",e.ready,!1);else if(c.attachEvent){c.attachEvent("onreadystatechange",B),a.attachEvent("onload",e.ready);var b=!1;try{b=a.frameElement==null}catch(d){}c.documentElement.doScroll&&b&&J()}}},isFunction:function(a){return e.type(a)==="function"},isArray:Array.isArray||function(a){return e.type(a)==="array"},isWindow:function(a){return a&&typeof a=="object"&&"setInterval"in a},isNumeric:function(a){return!isNaN(parseFloat(a))&&isFinite(a)},type:function(a){return a==null?String(a):I[C.call(a)]||"object"},isPlainObject:function(a){if(!a||e.type(a)!=="object"||a.nodeType||e.isWindow(a))return!1;try{if(a.constructor&&!D.call(a,"constructor")&&!D.call(a.constructor.prototype,"isPrototypeOf"))return!1}catch(c){return!1}var d;for(d in a);return d===b||D.call(a,d)},isEmptyObject:function(a){for(var b in a)return!1;return!0},error:function(a){throw new Error(a)},parseJSON:function(b){if(typeof b!="string"||!b)return null;b=e.trim(b);if(a.JSON&&a.JSON.parse)return a.JSON.parse(b);if(n.test(b.replace(o,"@").replace(p,"]").replace(q,"")))return(new Function("return "+b))();e.error("Invalid JSON: "+b)},parseXML:function(c){var d,f;try{a.DOMParser?(f=new DOMParser,d=f.parseFromString(c,"text/xml")):(d=new ActiveXObject("Microsoft.XMLDOM"),d.async="false",d.loadXML(c))}catch(g){d=b}(!d||!d.documentElement||d.getElementsByTagName("parsererror").length)&&e.error("Invalid XML: "+c);return d},noop:function(){},globalEval:function(b){b&&j.test(b)&&(a.execScript||function(b){a.eval.call(a,b)})(b)},camelCase:function(a){return a.replace(w,"ms-").replace(v,x)},nodeName:function(a,b){return a.nodeName&&a.nodeName.toUpperCase()===b.toUpperCase()},each:function(a,c,d){var f,g=0,h=a.length,i=h===b||e.isFunction(a);if(d){if(i){for(f in a)if(c.apply(a[f],d)===!1)break}else for(;g<h;)if(c.apply(a[g++],d)===!1)break}else if(i){for(f in a)if(c.call(a[f],f,a[f])===!1)break}else for(;g<h;)if(c.call(a[g],g,a[g++])===!1)break;return a},trim:G?function(a){return a==null?"":G.call(a)}:function(a){return a==null?"":(a+"").replace(k,"").replace(l,"")},makeArray:function(a,b){var c=b||[];if(a!=null){var d=e.type(a);a.length==null||d==="string"||d==="function"||d==="regexp"||e.isWindow(a)?E.call(c,a):e.merge(c,a)}return c},inArray:function(a,b,c){var d;if(b){if(H)return H.call(b,a,c);d=b.length,c=c?c<0?Math.max(0,d+c):c:0;for(;c<d;c++)if(c in b&&b[c]===a)return c}return-1},merge:function(a,c){var d=a.length,e=0;if(typeof c.length=="number")for(var f=c.length;e<f;e++)a[d++]=c[e];else while(c[e]!==b)a[d++]=c[e++];a.length=d;return a},grep:function(a,b,c){var d=[],e;c=!!c;for(var f=0,g=a.length;f<g;f++)e=!!b(a[f],f),c!==e&&d.push(a[f]);return d},map:function(a,c,d){var f,g,h=[],i=0,j=a.length,k=a instanceof e||j!==b&&typeof j=="number"&&(j>0&&a[0]&&a[j-1]||j===0||e.isArray(a));if(k)for(;i<j;i++)f=c(a[i],i,d),f!=null&&(h[h.length]=f);else for(g in a)f=c(a[g],g,d),f!=null&&(h[h.length]=f);return h.concat.apply([],h)},guid:1,proxy:function(a,c){if(typeof c=="string"){var d=a[c];c=a,a=d}if(!e.isFunction(a))return b;var f=F.call(arguments,2),g=function(){return a.apply(c,f.concat(F.call(arguments)))};g.guid=a.guid=a.guid||g.guid||e.guid++;return g},access:function(a,c,d,f,g,h){var i=a.length;if(typeof c=="object"){for(var j in c)e.access(a,j,c[j],f,g,d);return a}if(d!==b){f=!h&&f&&e.isFunction(d);for(var k=0;k<i;k++)g(a[k],c,f?d.call(a[k],k,g(a[k],c)):d,h);return a}return i?g(a[0],c):b},now:function(){return(new Date).getTime()},uaMatch:function(a){a=a.toLowerCase();var b=r.exec(a)||s.exec(a)||t.exec(a)||a.indexOf("compatible")<0&&u.exec(a)||[];return{browser:b[1]||"",version:b[2]||"0"}},sub:function(){function a(b,c){return new a.fn.init(b,c)}e.extend(!0,a,this),a.superclass=this,a.fn=a.prototype=this(),a.fn.constructor=a,a.sub=this.sub,a.fn.init=function(d,f){f&&f instanceof e&&!(f instanceof a)&&(f=a(f));return e.fn.init.call(this,d,f,b)},a.fn.init.prototype=a.fn;var b=a(c);return a},browser:{}}),e.each("Boolean Number String Function Array Date RegExp Object".split(" "),function(a,b){I["[object "+b+"]"]=b.toLowerCase()}),z=e.uaMatch(y),z.browser&&(e.browser[z.browser]=!0,e.browser.version=z.version),e.browser.webkit&&(e.browser.safari=!0),j.test(" ")&&(k=/^[\s\xA0]+/,l=/[\s\xA0]+$/),h=e(c),c.addEventListener?B=function(){c.removeEventListener("DOMContentLoaded",B,!1),e.ready()}:c.attachEvent&&(B=function(){c.readyState==="complete"&&(c.detachEvent("onreadystatechange",B),e.ready())});return e}(),g={};f.Callbacks=function(a){a=a?g[a]||h(a):{};var c=[],d=[],e,i,j,k,l,m=function(b){var d,e,g,h,i;for(d=0,e=b.length;d<e;d++)g=b[d],h=f.type(g),h==="array"?m(g):h==="function"&&(!a.unique||!o.has(g))&&c.push(g)},n=function(b,f){f=f||[],e=!a.memory||[b,f],i=!0,l=j||0,j=0,k=c.length;for(;c&&l<k;l++)if(c[l].apply(b,f)===!1&&a.stopOnFalse){e=!0;break}i=!1,c&&(a.once?e===!0?o.disable():c=[]:d&&d.length&&(e=d.shift(),o.fireWith(e[0],e[1])))},o={add:function(){if(c){var a=c.length;m(arguments),i?k=c.length:e&&e!==!0&&(j=a,n(e[0],e[1]))}return this},remove:function(){if(c){var b=arguments,d=0,e=b.length;for(;d<e;d++)for(var f=0;f<c.length;f++)if(b[d]===c[f]){i&&f<=k&&(k--,f<=l&&l--),c.splice(f--,1);if(a.unique)break}}return this},has:function(a){if(c){var b=0,d=c.length;for(;b<d;b++)if(a===c[b])return!0}return!1},empty:function(){c=[];return this},disable:function(){c=d=e=b;return this},disabled:function(){return!c},lock:function(){d=b,(!e||e===!0)&&o.disable();return this},locked:function(){return!d},fireWith:function(b,c){d&&(i?a.once||d.push([b,c]):(!a.once||!e)&&n(b,c));return this},fire:function(){o.fireWith(this,arguments);return this},fired:function(){return!!e}};return o};var i=[].slice;f.extend({Deferred:function(a){var b=f.Callbacks("once memory"),c=f.Callbacks("once memory"),d=f.Callbacks("memory"),e="pending",g={resolve:b,reject:c,notify:d},h={done:b.add,fail:c.add,progress:d.add,state:function(){return e},isResolved:b.fired,isRejected:c.fired,then:function(a,b,c){i.done(a).fail(b).progress(c);return this},always:function(){i.done.apply(i,arguments).fail.apply(i,arguments);return this},pipe:function(a,b,c){return f.Deferred(function(d){f.each({done:[a,"resolve"],fail:[b,"reject"],progress:[c,"notify"]},function(a,b){var c=b[0],e=b[1],g;f.isFunction(c)?i[a](function(){g=c.apply(this,arguments),g&&f.isFunction(g.promise)?g.promise().then(d.resolve,d.reject,d.notify):d[e+"With"](this===i?d:this,[g])}):i[a](d[e])})}).promise()},promise:function(a){if(a==null)a=h;else for(var b in h)a[b]=h[b];return a}},i=h.promise({}),j;for(j in g)i[j]=g[j].fire,i[j+"With"]=g[j].fireWith;i.done(function(){e="resolved"},c.disable,d.lock).fail(function(){e="rejected"},b.disable,d.lock),a&&a.call(i,i);return i},when:function(a){function m(a){return function(b){e[a]=arguments.length>1?i.call(arguments,0):b,j.notifyWith(k,e)}}function l(a){return function(c){b[a]=arguments.length>1?i.call(arguments,0):c,--g||j.resolveWith(j,b)}}var b=i.call(arguments,0),c=0,d=b.length,e=Array(d),g=d,h=d,j=d<=1&&a&&f.isFunction(a.promise)?a:f.Deferred(),k=j.promise();if(d>1){for(;c<d;c++)b[c]&&b[c].promise&&f.isFunction(b[c].promise)?b[c].promise().then(l(c),j.reject,m(c)):--g;g||j.resolveWith(j,b)}else j!==a&&j.resolveWith(j,d?[a]:[]);return k}}),f.support=function(){var b,d,e,g,h,i,j,k,l,m,n,o,p,q=c.createElement("div"),r=c.documentElement;q.setAttribute("className","t"),q.innerHTML="   <link/><table></table><a href='/a' style='top:1px;float:left;opacity:.55;'>a</a><input type='checkbox'/>",d=q.getElementsByTagName("*"),e=q.getElementsByTagName("a")[0];if(!d||!d.length||!e)return{};g=c.createElement("select"),h=g.appendChild(c.createElement("option")),i=q.getElementsByTagName("input")[0],b={leadingWhitespace:q.firstChild.nodeType===3,tbody:!q.getElementsByTagName("tbody").length,htmlSerialize:!!q.getElementsByTagName("link").length,style:/top/.test(e.getAttribute("style")),hrefNormalized:e.getAttribute("href")==="/a",opacity:/^0.55/.test(e.style.opacity),cssFloat:!!e.style.cssFloat,checkOn:i.value==="on",optSelected:h.selected,getSetAttribute:q.className!=="t",enctype:!!c.createElement("form").enctype,html5Clone:c.createElement("nav").cloneNode(!0).outerHTML!=="<:nav></:nav>",submitBubbles:!0,changeBubbles:!0,focusinBubbles:!1,deleteExpando:!0,noCloneEvent:!0,inlineBlockNeedsLayout:!1,shrinkWrapBlocks:!1,reliableMarginRight:!0},i.checked=!0,b.noCloneChecked=i.cloneNode(!0).checked,g.disabled=!0,b.optDisabled=!h.disabled;try{delete q.test}catch(s){b.deleteExpando=!1}!q.addEventListener&&q.attachEvent&&q.fireEvent&&(q.attachEvent("onclick",function(){b.noCloneEvent=!1}),q.cloneNode(!0).fireEvent("onclick")),i=c.createElement("input"),i.value="t",i.setAttribute("type","radio"),b.radioValue=i.value==="t",i.setAttribute("checked","checked"),q.appendChild(i),k=c.createDocumentFragment(),k.appendChild(q.lastChild),b.checkClone=k.cloneNode(!0).cloneNode(!0).lastChild.checked,b.appendChecked=i.checked,k.removeChild(i),k.appendChild(q),q.innerHTML="",a.getComputedStyle&&(j=c.createElement("div"),j.style.width="0",j.style.marginRight="0",q.style.width="2px",q.appendChild(j),b.reliableMarginRight=(parseInt((a.getComputedStyle(j,null)||{marginRight:0}).marginRight,10)||0)===0);if(q.attachEvent)for(o in{submit:1,change:1,focusin:1})n="on"+o,p=n in q,p||(q.setAttribute(n,"return;"),p=typeof q[n]=="function"),b[o+"Bubbles"]=p;k.removeChild(q),k=g=h=j=q=i=null,f(function(){var a,d,e,g,h,i,j,k,m,n,o,r=c.getElementsByTagName("body")[0];!r||(j=1,k="position:absolute;top:0;left:0;width:1px;height:1px;margin:0;",m="visibility:hidden;border:0;",n="style='"+k+"border:5px solid #000;padding:0;'",o="<div "+n+"><div></div></div>"+"<table "+n+" cellpadding='0' cellspacing='0'>"+"<tr><td></td></tr></table>",a=c.createElement("div"),a.style.cssText=m+"width:0;height:0;position:static;top:0;margin-top:"+j+"px",r.insertBefore(a,r.firstChild),q=c.createElement("div"),a.appendChild(q),q.innerHTML="<table><tr><td style='padding:0;border:0;display:none'></td><td>t</td></tr></table>",l=q.getElementsByTagName("td"),p=l[0].offsetHeight===0,l[0].style.display="",l[1].style.display="none",b.reliableHiddenOffsets=p&&l[0].offsetHeight===0,q.innerHTML="",q.style.width=q.style.paddingLeft="1px",f.boxModel=b.boxModel=q.offsetWidth===2,typeof q.style.zoom!="undefined"&&(q.style.display="inline",q.style.zoom=1,b.inlineBlockNeedsLayout=q.offsetWidth===2,q.style.display="",q.innerHTML="<div style='width:4px;'></div>",b.shrinkWrapBlocks=q.offsetWidth!==2),q.style.cssText=k+m,q.innerHTML=o,d=q.firstChild,e=d.firstChild,h=d.nextSibling.firstChild.firstChild,i={doesNotAddBorder:e.offsetTop!==5,doesAddBorderForTableAndCells:h.offsetTop===5},e.style.position="fixed",e.style.top="20px",i.fixedPosition=e.offsetTop===20||e.offsetTop===15,e.style.position=e.style.top="",d.style.overflow="hidden",d.style.position="relative",i.subtractsBorderForOverflowNotVisible=e.offsetTop===-5,i.doesNotIncludeMarginInBodyOffset=r.offsetTop!==j,r.removeChild(a),q=a=null,f.extend(b,i))});return b}();var j=/^(?:\{.*\}|\[.*\])$/,k=/([A-Z])/g;f.extend({cache:{},uuid:0,expando:"jQuery"+(f.fn.jquery+Math.random()).replace(/\D/g,""),noData:{embed:!0,object:"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",applet:!0},hasData:function(a){a=a.nodeType?f.cache[a[f.expando]]:a[f.expando];return!!a&&!m(a)},data:function(a,c,d,e){if(!!f.acceptData(a)){var g,h,i,j=f.expando,k=typeof c=="string",l=a.nodeType,m=l?f.cache:a,n=l?a[j]:a[j]&&j,o=c==="events";if((!n||!m[n]||!o&&!e&&!m[n].data)&&k&&d===b)return;n||(l?a[j]=n=++f.uuid:n=j),m[n]||(m[n]={},l||(m[n].toJSON=f.noop));if(typeof c=="object"||typeof c=="function")e?m[n]=f.extend(m[n],c):m[n].data=f.extend(m[n].data,c);g=h=m[n],e||(h.data||(h.data={}),h=h.data),d!==b&&(h[f.camelCase(c)]=d);if(o&&!h[c])return g.events;k?(i=h[c],i==null&&(i=h[f.camelCase(c)])):i=h;return i}},removeData:function(a,b,c){if(!!f.acceptData(a)){var d,e,g,h=f.expando,i=a.nodeType,j=i?f.cache:a,k=i?a[h]:h;if(!j[k])return;if(b){d=c?j[k]:j[k].data;if(d){f.isArray(b)||(b in d?b=[b]:(b=f.camelCase(b),b in d?b=[b]:b=b.split(" ")));for(e=0,g=b.length;e<g;e++)delete d[b[e]];if(!(c?m:f.isEmptyObject)(d))return}}if(!c){delete j[k].data;if(!m(j[k]))return}f.support.deleteExpando||!j.setInterval?delete j[k]:j[k]=null,i&&(f.support.deleteExpando?delete a[h]:a.removeAttribute?a.removeAttribute(h):a[h]=null)}},_data:function(a,b,c){return f.data(a,b,c,!0)},acceptData:function(a){if(a.nodeName){var b=f.noData[a.nodeName.toLowerCase()];if(b)return b!==!0&&a.getAttribute("classid")===b}return!0}}),f.fn.extend({data:function(a,c){var d,e,g,h=null;if(typeof a=="undefined"){if(this.length){h=f.data(this[0]);if(this[0].nodeType===1&&!f._data(this[0],"parsedAttrs")){e=this[0].attributes;for(var i=0,j=e.length;i<j;i++)g=e[i].name,g.indexOf("data-")===0&&(g=f.camelCase(g.substring(5)),l(this[0],g,h[g]));f._data(this[0],"parsedAttrs",!0)}}return h}if(typeof a=="object")return this.each(function(){f.data(this,a)});d=a.split("."),d[1]=d[1]?"."+d[1]:"";if(c===b){h=this.triggerHandler("getData"+d[1]+"!",[d[0]]),h===b&&this.length&&(h=f.data(this[0],a),h=l(this[0],a,h));return h===b&&d[1]?this.data(d[0]):h}return this.each(function(){var b=f(this),e=[d[0],c];b.triggerHandler("setData"+d[1]+"!",e),f.data(this,a,c),b.triggerHandler("changeData"+d[1]+"!",e)})},removeData:function(a){return this.each(function(){f.removeData(this,a)})}}),f.extend({_mark:function(a,b){a&&(b=(b||"fx")+"mark",f._data(a,b,(f._data(a,b)||0)+1))},_unmark:function(a,b,c){a!==!0&&(c=b,b=a,a=!1);if(b){c=c||"fx";var d=c+"mark",e=a?0:(f._data(b,d)||1)-1;e?f._data(b,d,e):(f.removeData(b,d,!0),n(b,c,"mark"))}},queue:function(a,b,c){var d;if(a){b=(b||"fx")+"queue",d=f._data(a,b),c&&(!d||f.isArray(c)?d=f._data(a,b,f.makeArray(c)):d.push(c));return d||[]}},dequeue:function(a,b){b=b||"fx";var c=f.queue(a,b),d=c.shift(),e={};d==="inprogress"&&(d=c.shift()),d&&(b==="fx"&&c.unshift("inprogress"),f._data(a,b+".run",e),d.call(a,function(){f.dequeue(a,b)},e)),c.length||(f.removeData(a,b+"queue "+b+".run",!0),n(a,b,"queue"))}}),f.fn.extend({queue:function(a,c){typeof a!="string"&&(c=a,a="fx");if(c===b)return f.queue(this[0],a);return this.each(function(){var b=f.queue(this,a,c);a==="fx"&&b[0]!=="inprogress"&&f.dequeue(this,a)})},dequeue:function(a){return this.each(function(){f.dequeue(this,a)})},delay:function(a,b){a=f.fx?f.fx.speeds[a]||a:a,b=b||"fx";return this.queue(b,function(b,c){var d=setTimeout(b,a);c.stop=function(){clearTimeout(d)}})},clearQueue:function(a){return this.queue(a||"fx",[])},promise:function(a,c){function m(){--h||d.resolveWith(e,[e])}typeof a!="string"&&(c=a,a=b),a=a||"fx";var d=f.Deferred(),e=this,g=e.length,h=1,i=a+"defer",j=a+"queue",k=a+"mark",l;while(g--)if(l=f.data(e[g],i,b,!0)||(f.data(e[g],j,b,!0)||f.data(e[g],k,b,!0))&&f.data(e[g],i,f.Callbacks("once memory"),!0))h++,l.add(m);m();return d.promise()}});var o=/[\n\t\r]/g,p=/\s+/,q=/\r/g,r=/^(?:button|input)$/i,s=/^(?:button|input|object|select|textarea)$/i,t=/^a(?:rea)?$/i,u=/^(?:autofocus|autoplay|async|checked|controls|defer|disabled|hidden|loop|multiple|open|readonly|required|scoped|selected)$/i,v=f.support.getSetAttribute,w,x,y;f.fn.extend({attr:function(a,b){return f.access(this,a,b,!0,f.attr)},removeAttr:function(a){return this.each(function(){f.removeAttr(this,a)})},prop:function(a,b){return f.access(this,a,b,!0,f.prop)},removeProp:function(a){a=f.propFix[a]||a;return this.each(function(){try{this[a]=b,delete this[a]}catch(c){}})},addClass:function(a){var b,c,d,e,g,h,i;if(f.isFunction(a))return this.each(function(b){f(this).addClass(a.call(this,b,this.className))});if(a&&typeof a=="string"){b=a.split(p);for(c=0,d=this.length;c<d;c++){e=this[c];if(e.nodeType===1)if(!e.className&&b.length===1)e.className=a;else{g=" "+e.className+" ";for(h=0,i=b.length;h<i;h++)~g.indexOf(" "+b[h]+" ")||(g+=b[h]+" ");e.className=f.trim(g)}}}return this},removeClass:function(a){var c,d,e,g,h,i,j;if(f.isFunction(a))return this.each(function(b){f(this).removeClass(a.call(this,b,this.className))});if(a&&typeof a=="string"||a===b){c=(a||"").split(p);for(d=0,e=this.length;d<e;d++){g=this[d];if(g.nodeType===1&&g.className)if(a){h=(" "+g.className+" ").replace(o," ");for(i=0,j=c.length;i<j;i++)h=h.replace(" "+c[i]+" "," ");g.className=f.trim(h)}else g.className=""}}return this},toggleClass:function(a,b){var c=typeof a,d=typeof b=="boolean";if(f.isFunction(a))return this.each(function(c){f(this).toggleClass(a.call(this,c,this.className,b),b)});return this.each(function(){if(c==="string"){var e,g=0,h=f(this),i=b,j=a.split(p);while(e=j[g++])i=d?i:!h.hasClass(e),h[i?"addClass":"removeClass"](e)}else if(c==="undefined"||c==="boolean")this.className&&f._data(this,"__className__",this.className),this.className=this.className||a===!1?"":f._data(this,"__className__")||""})},hasClass:function(a){var b=" "+a+" ",c=0,d=this.length;for(;c<d;c++)if(this[c].nodeType===1&&(" "+this[c].className+" ").replace(o," ").indexOf(b)>-1)return!0;return!1},val:function(a){var c,d,e,g=this[0];{if(!!arguments.length){e=f.isFunction(a);return this.each(function(d){var g=f(this),h;if(this.nodeType===1){e?h=a.call(this,d,g.val()):h=a,h==null?h="":typeof h=="number"?h+="":f.isArray(h)&&(h=f.map(h,function(a){return a==null?"":a+""})),c=f.valHooks[this.nodeName.toLowerCase()]||f.valHooks[this.type];if(!c||!("set"in c)||c.set(this,h,"value")===b)this.value=h}})}if(g){c=f.valHooks[g.nodeName.toLowerCase()]||f.valHooks[g.type];if(c&&"get"in c&&(d=c.get(g,"value"))!==b)return d;d=g.value;return typeof d=="string"?d.replace(q,""):d==null?"":d}}}}),f.extend({valHooks:{option:{get:function(a){var b=a.attributes.value;return!b||b.specified?a.value:a.text}},select:{get:function(a){var b,c,d,e,g=a.selectedIndex,h=[],i=a.options,j=a.type==="select-one";if(g<0)return null;c=j?g:0,d=j?g+1:i.length;for(;c<d;c++){e=i[c];if(e.selected&&(f.support.optDisabled?!e.disabled:e.getAttribute("disabled")===null)&&(!e.parentNode.disabled||!f.nodeName(e.parentNode,"optgroup"))){b=f(e).val();if(j)return b;h.push(b)}}if(j&&!h.length&&i.length)return f(i[g]).val();return h},set:function(a,b){var c=f.makeArray(b);f(a).find("option").each(function(){this.selected=f.inArray(f(this).val(),c)>=0}),c.length||(a.selectedIndex=-1);return c}}},attrFn:{val:!0,css:!0,html:!0,text:!0,data:!0,width:!0,height:!0,offset:!0},attr:function(a,c,d,e){var g,h,i,j=a.nodeType;if(!!a&&j!==3&&j!==8&&j!==2){if(e&&c in f.attrFn)return f(a)[c](d);if(typeof a.getAttribute=="undefined")return f.prop(a,c,d);i=j!==1||!f.isXMLDoc(a),i&&(c=c.toLowerCase(),h=f.attrHooks[c]||(u.test(c)?x:w));if(d!==b){if(d===null){f.removeAttr(a,c);return}if(h&&"set"in h&&i&&(g=h.set(a,d,c))!==b)return g;a.setAttribute(c,""+d);return d}if(h&&"get"in h&&i&&(g=h.get(a,c))!==null)return g;g=a.getAttribute(c);return g===null?b:g}},removeAttr:function(a,b){var c,d,e,g,h=0;if(b&&a.nodeType===1){d=b.toLowerCase().split(p),g=d.length;for(;h<g;h++)e=d[h],e&&(c=f.propFix[e]||e,f.attr(a,e,""),a.removeAttribute(v?e:c),u.test(e)&&c in a&&(a[c]=!1))}},attrHooks:{type:{set:function(a,b){if(r.test(a.nodeName)&&a.parentNode)f.error("type property can't be changed");else if(!f.support.radioValue&&b==="radio"&&f.nodeName(a,"input")){var c=a.value;a.setAttribute("type",b),c&&(a.value=c);return b}}},value:{get:function(a,b){if(w&&f.nodeName(a,"button"))return w.get(a,b);return b in a?a.value:null},set:function(a,b,c){if(w&&f.nodeName(a,"button"))return w.set(a,b,c);a.value=b}}},propFix:{tabindex:"tabIndex",readonly:"readOnly","for":"htmlFor","class":"className",maxlength:"maxLength",cellspacing:"cellSpacing",cellpadding:"cellPadding",rowspan:"rowSpan",colspan:"colSpan",usemap:"useMap",frameborder:"frameBorder",contenteditable:"contentEditable"},prop:function(a,c,d){var e,g,h,i=a.nodeType;if(!!a&&i!==3&&i!==8&&i!==2){h=i!==1||!f.isXMLDoc(a),h&&(c=f.propFix[c]||c,g=f.propHooks[c]);return d!==b?g&&"set"in g&&(e=g.set(a,d,c))!==b?e:a[c]=d:g&&"get"in g&&(e=g.get(a,c))!==null?e:a[c]}},propHooks:{tabIndex:{get:function(a){var c=a.getAttributeNode("tabindex");return c&&c.specified?parseInt(c.value,10):s.test(a.nodeName)||t.test(a.nodeName)&&a.href?0:b}}}}),f.attrHooks.tabindex=f.propHooks.tabIndex,x={get:function(a,c){var d,e=f.prop(a,c);return e===!0||typeof e!="boolean"&&(d=a.getAttributeNode(c))&&d.nodeValue!==!1?c.toLowerCase():b},set:function(a,b,c){var d;b===!1?f.removeAttr(a,c):(d=f.propFix[c]||c,d in a&&(a[d]=!0),a.setAttribute(c,c.toLowerCase()));return c}},v||(y={name:!0,id:!0},w=f.valHooks.button={get:function(a,c){var d;d=a.getAttributeNode(c);return d&&(y[c]?d.nodeValue!=="":d.specified)?d.nodeValue:b},set:function(a,b,d){var e=a.getAttributeNode(d);e||(e=c.createAttribute(d),a.setAttributeNode(e));return e.nodeValue=b+""}},f.attrHooks.tabindex.set=w.set,f.each(["width","height"],function(a,b){f.attrHooks[b]=f.extend(f.attrHooks[b],{set:function(a,c){if(c===""){a.setAttribute(b,"auto");return c}}})}),f.attrHooks.contenteditable={get:w.get,set:function(a,b,c){b===""&&(b="false"),w.set(a,b,c)}}),f.support.hrefNormalized||f.each(["href","src","width","height"],function(a,c){f.attrHooks[c]=f.extend(f.attrHooks[c],{get:function(a){var d=a.getAttribute(c,2);return d===null?b:d}})}),f.support.style||(f.attrHooks.style={get:function(a){return a.style.cssText.toLowerCase()||b},set:function(a,b){return a.style.cssText=""+b}}),f.support.optSelected||(f.propHooks.selected=f.extend(f.propHooks.selected,{get:function(a){var b=a.parentNode;b&&(b.selectedIndex,b.parentNode&&b.parentNode.selectedIndex);return null}})),f.support.enctype||(f.propFix.enctype="encoding"),f.support.checkOn||f.each(["radio","checkbox"],function(){f.valHooks[this]={get:function(a){return a.getAttribute("value")===null?"on":a.value}}}),f.each(["radio","checkbox"],function(){f.valHooks[this]=f.extend(f.valHooks[this],{set:function(a,b){if(f.isArray(b))return a.checked=f.inArray(f(a).val(),b)>=0}})});var z=/^(?:textarea|input|select)$/i,A=/^([^\.]*)?(?:\.(.+))?$/,B=/\bhover(\.\S+)?\b/,C=/^key/,D=/^(?:mouse|contextmenu)|click/,E=/^(?:focusinfocus|focusoutblur)$/,F=/^(\w*)(?:#([\w\-]+))?(?:\.([\w\-]+))?$/,G=function(a){var b=F.exec(a);b&&(b[1]=(b[1]||"").toLowerCase(),b[3]=b[3]&&new RegExp("(?:^|\\s)"+b[3]+"(?:\\s|$)"));return b},H=function(a,b){var c=a.attributes||{};return(!b[1]||a.nodeName.toLowerCase()===b[1])&&(!b[2]||(c.id||{}).value===b[2])&&(!b[3]||b[3].test((c["class"]||{}).value))},I=function(a){return f.event.special.hover?a:a.replace(B,"mouseenter$1 mouseleave$1")};
f.event={add:function(a,c,d,e,g){var h,i,j,k,l,m,n,o,p,q,r,s;if(!(a.nodeType===3||a.nodeType===8||!c||!d||!(h=f._data(a)))){d.handler&&(p=d,d=p.handler),d.guid||(d.guid=f.guid++),j=h.events,j||(h.events=j={}),i=h.handle,i||(h.handle=i=function(a){return typeof f!="undefined"&&(!a||f.event.triggered!==a.type)?f.event.dispatch.apply(i.elem,arguments):b},i.elem=a),c=f.trim(I(c)).split(" ");for(k=0;k<c.length;k++){l=A.exec(c[k])||[],m=l[1],n=(l[2]||"").split(".").sort(),s=f.event.special[m]||{},m=(g?s.delegateType:s.bindType)||m,s=f.event.special[m]||{},o=f.extend({type:m,origType:l[1],data:e,handler:d,guid:d.guid,selector:g,quick:G(g),namespace:n.join(".")},p),r=j[m];if(!r){r=j[m]=[],r.delegateCount=0;if(!s.setup||s.setup.call(a,e,n,i)===!1)a.addEventListener?a.addEventListener(m,i,!1):a.attachEvent&&a.attachEvent("on"+m,i)}s.add&&(s.add.call(a,o),o.handler.guid||(o.handler.guid=d.guid)),g?r.splice(r.delegateCount++,0,o):r.push(o),f.event.global[m]=!0}a=null}},global:{},remove:function(a,b,c,d,e){var g=f.hasData(a)&&f._data(a),h,i,j,k,l,m,n,o,p,q,r,s;if(!!g&&!!(o=g.events)){b=f.trim(I(b||"")).split(" ");for(h=0;h<b.length;h++){i=A.exec(b[h])||[],j=k=i[1],l=i[2];if(!j){for(j in o)f.event.remove(a,j+b[h],c,d,!0);continue}p=f.event.special[j]||{},j=(d?p.delegateType:p.bindType)||j,r=o[j]||[],m=r.length,l=l?new RegExp("(^|\\.)"+l.split(".").sort().join("\\.(?:.*\\.)?")+"(\\.|$)"):null;for(n=0;n<r.length;n++)s=r[n],(e||k===s.origType)&&(!c||c.guid===s.guid)&&(!l||l.test(s.namespace))&&(!d||d===s.selector||d==="**"&&s.selector)&&(r.splice(n--,1),s.selector&&r.delegateCount--,p.remove&&p.remove.call(a,s));r.length===0&&m!==r.length&&((!p.teardown||p.teardown.call(a,l)===!1)&&f.removeEvent(a,j,g.handle),delete o[j])}f.isEmptyObject(o)&&(q=g.handle,q&&(q.elem=null),f.removeData(a,["events","handle"],!0))}},customEvent:{getData:!0,setData:!0,changeData:!0},trigger:function(c,d,e,g){if(!e||e.nodeType!==3&&e.nodeType!==8){var h=c.type||c,i=[],j,k,l,m,n,o,p,q,r,s;if(E.test(h+f.event.triggered))return;h.indexOf("!")>=0&&(h=h.slice(0,-1),k=!0),h.indexOf(".")>=0&&(i=h.split("."),h=i.shift(),i.sort());if((!e||f.event.customEvent[h])&&!f.event.global[h])return;c=typeof c=="object"?c[f.expando]?c:new f.Event(h,c):new f.Event(h),c.type=h,c.isTrigger=!0,c.exclusive=k,c.namespace=i.join("."),c.namespace_re=c.namespace?new RegExp("(^|\\.)"+i.join("\\.(?:.*\\.)?")+"(\\.|$)"):null,o=h.indexOf(":")<0?"on"+h:"";if(!e){j=f.cache;for(l in j)j[l].events&&j[l].events[h]&&f.event.trigger(c,d,j[l].handle.elem,!0);return}c.result=b,c.target||(c.target=e),d=d!=null?f.makeArray(d):[],d.unshift(c),p=f.event.special[h]||{};if(p.trigger&&p.trigger.apply(e,d)===!1)return;r=[[e,p.bindType||h]];if(!g&&!p.noBubble&&!f.isWindow(e)){s=p.delegateType||h,m=E.test(s+h)?e:e.parentNode,n=null;for(;m;m=m.parentNode)r.push([m,s]),n=m;n&&n===e.ownerDocument&&r.push([n.defaultView||n.parentWindow||a,s])}for(l=0;l<r.length&&!c.isPropagationStopped();l++)m=r[l][0],c.type=r[l][1],q=(f._data(m,"events")||{})[c.type]&&f._data(m,"handle"),q&&q.apply(m,d),q=o&&m[o],q&&f.acceptData(m)&&q.apply(m,d)===!1&&c.preventDefault();c.type=h,!g&&!c.isDefaultPrevented()&&(!p._default||p._default.apply(e.ownerDocument,d)===!1)&&(h!=="click"||!f.nodeName(e,"a"))&&f.acceptData(e)&&o&&e[h]&&(h!=="focus"&&h!=="blur"||c.target.offsetWidth!==0)&&!f.isWindow(e)&&(n=e[o],n&&(e[o]=null),f.event.triggered=h,e[h](),f.event.triggered=b,n&&(e[o]=n));return c.result}},dispatch:function(c){c=f.event.fix(c||a.event);var d=(f._data(this,"events")||{})[c.type]||[],e=d.delegateCount,g=[].slice.call(arguments,0),h=!c.exclusive&&!c.namespace,i=[],j,k,l,m,n,o,p,q,r,s,t;g[0]=c,c.delegateTarget=this;if(e&&!c.target.disabled&&(!c.button||c.type!=="click")){m=f(this),m.context=this.ownerDocument||this;for(l=c.target;l!=this;l=l.parentNode||this){o={},q=[],m[0]=l;for(j=0;j<e;j++)r=d[j],s=r.selector,o[s]===b&&(o[s]=r.quick?H(l,r.quick):m.is(s)),o[s]&&q.push(r);q.length&&i.push({elem:l,matches:q})}}d.length>e&&i.push({elem:this,matches:d.slice(e)});for(j=0;j<i.length&&!c.isPropagationStopped();j++){p=i[j],c.currentTarget=p.elem;for(k=0;k<p.matches.length&&!c.isImmediatePropagationStopped();k++){r=p.matches[k];if(h||!c.namespace&&!r.namespace||c.namespace_re&&c.namespace_re.test(r.namespace))c.data=r.data,c.handleObj=r,n=((f.event.special[r.origType]||{}).handle||r.handler).apply(p.elem,g),n!==b&&(c.result=n,n===!1&&(c.preventDefault(),c.stopPropagation()))}}return c.result},props:"attrChange attrName relatedNode srcElement altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),fixHooks:{},keyHooks:{props:"char charCode key keyCode".split(" "),filter:function(a,b){a.which==null&&(a.which=b.charCode!=null?b.charCode:b.keyCode);return a}},mouseHooks:{props:"button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),filter:function(a,d){var e,f,g,h=d.button,i=d.fromElement;a.pageX==null&&d.clientX!=null&&(e=a.target.ownerDocument||c,f=e.documentElement,g=e.body,a.pageX=d.clientX+(f&&f.scrollLeft||g&&g.scrollLeft||0)-(f&&f.clientLeft||g&&g.clientLeft||0),a.pageY=d.clientY+(f&&f.scrollTop||g&&g.scrollTop||0)-(f&&f.clientTop||g&&g.clientTop||0)),!a.relatedTarget&&i&&(a.relatedTarget=i===a.target?d.toElement:i),!a.which&&h!==b&&(a.which=h&1?1:h&2?3:h&4?2:0);return a}},fix:function(a){if(a[f.expando])return a;var d,e,g=a,h=f.event.fixHooks[a.type]||{},i=h.props?this.props.concat(h.props):this.props;a=f.Event(g);for(d=i.length;d;)e=i[--d],a[e]=g[e];a.target||(a.target=g.srcElement||c),a.target.nodeType===3&&(a.target=a.target.parentNode),a.metaKey===b&&(a.metaKey=a.ctrlKey);return h.filter?h.filter(a,g):a},special:{ready:{setup:f.bindReady},load:{noBubble:!0},focus:{delegateType:"focusin"},blur:{delegateType:"focusout"},beforeunload:{setup:function(a,b,c){f.isWindow(this)&&(this.onbeforeunload=c)},teardown:function(a,b){this.onbeforeunload===b&&(this.onbeforeunload=null)}}},simulate:function(a,b,c,d){var e=f.extend(new f.Event,c,{type:a,isSimulated:!0,originalEvent:{}});d?f.event.trigger(e,null,b):f.event.dispatch.call(b,e),e.isDefaultPrevented()&&c.preventDefault()}},f.event.handle=f.event.dispatch,f.removeEvent=c.removeEventListener?function(a,b,c){a.removeEventListener&&a.removeEventListener(b,c,!1)}:function(a,b,c){a.detachEvent&&a.detachEvent("on"+b,c)},f.Event=function(a,b){if(!(this instanceof f.Event))return new f.Event(a,b);a&&a.type?(this.originalEvent=a,this.type=a.type,this.isDefaultPrevented=a.defaultPrevented||a.returnValue===!1||a.getPreventDefault&&a.getPreventDefault()?K:J):this.type=a,b&&f.extend(this,b),this.timeStamp=a&&a.timeStamp||f.now(),this[f.expando]=!0},f.Event.prototype={preventDefault:function(){this.isDefaultPrevented=K;var a=this.originalEvent;!a||(a.preventDefault?a.preventDefault():a.returnValue=!1)},stopPropagation:function(){this.isPropagationStopped=K;var a=this.originalEvent;!a||(a.stopPropagation&&a.stopPropagation(),a.cancelBubble=!0)},stopImmediatePropagation:function(){this.isImmediatePropagationStopped=K,this.stopPropagation()},isDefaultPrevented:J,isPropagationStopped:J,isImmediatePropagationStopped:J},f.each({mouseenter:"mouseover",mouseleave:"mouseout"},function(a,b){f.event.special[a]={delegateType:b,bindType:b,handle:function(a){var c=this,d=a.relatedTarget,e=a.handleObj,g=e.selector,h;if(!d||d!==c&&!f.contains(c,d))a.type=e.origType,h=e.handler.apply(this,arguments),a.type=b;return h}}}),f.support.submitBubbles||(f.event.special.submit={setup:function(){if(f.nodeName(this,"form"))return!1;f.event.add(this,"click._submit keypress._submit",function(a){var c=a.target,d=f.nodeName(c,"input")||f.nodeName(c,"button")?c.form:b;d&&!d._submit_attached&&(f.event.add(d,"submit._submit",function(a){this.parentNode&&!a.isTrigger&&f.event.simulate("submit",this.parentNode,a,!0)}),d._submit_attached=!0)})},teardown:function(){if(f.nodeName(this,"form"))return!1;f.event.remove(this,"._submit")}}),f.support.changeBubbles||(f.event.special.change={setup:function(){if(z.test(this.nodeName)){if(this.type==="checkbox"||this.type==="radio")f.event.add(this,"propertychange._change",function(a){a.originalEvent.propertyName==="checked"&&(this._just_changed=!0)}),f.event.add(this,"click._change",function(a){this._just_changed&&!a.isTrigger&&(this._just_changed=!1,f.event.simulate("change",this,a,!0))});return!1}f.event.add(this,"beforeactivate._change",function(a){var b=a.target;z.test(b.nodeName)&&!b._change_attached&&(f.event.add(b,"change._change",function(a){this.parentNode&&!a.isSimulated&&!a.isTrigger&&f.event.simulate("change",this.parentNode,a,!0)}),b._change_attached=!0)})},handle:function(a){var b=a.target;if(this!==b||a.isSimulated||a.isTrigger||b.type!=="radio"&&b.type!=="checkbox")return a.handleObj.handler.apply(this,arguments)},teardown:function(){f.event.remove(this,"._change");return z.test(this.nodeName)}}),f.support.focusinBubbles||f.each({focus:"focusin",blur:"focusout"},function(a,b){var d=0,e=function(a){f.event.simulate(b,a.target,f.event.fix(a),!0)};f.event.special[b]={setup:function(){d++===0&&c.addEventListener(a,e,!0)},teardown:function(){--d===0&&c.removeEventListener(a,e,!0)}}}),f.fn.extend({on:function(a,c,d,e,g){var h,i;if(typeof a=="object"){typeof c!="string"&&(d=c,c=b);for(i in a)this.on(i,c,d,a[i],g);return this}d==null&&e==null?(e=c,d=c=b):e==null&&(typeof c=="string"?(e=d,d=b):(e=d,d=c,c=b));if(e===!1)e=J;else if(!e)return this;g===1&&(h=e,e=function(a){f().off(a);return h.apply(this,arguments)},e.guid=h.guid||(h.guid=f.guid++));return this.each(function(){f.event.add(this,a,e,d,c)})},one:function(a,b,c,d){return this.on.call(this,a,b,c,d,1)},off:function(a,c,d){if(a&&a.preventDefault&&a.handleObj){var e=a.handleObj;f(a.delegateTarget).off(e.namespace?e.type+"."+e.namespace:e.type,e.selector,e.handler);return this}if(typeof a=="object"){for(var g in a)this.off(g,c,a[g]);return this}if(c===!1||typeof c=="function")d=c,c=b;d===!1&&(d=J);return this.each(function(){f.event.remove(this,a,d,c)})},bind:function(a,b,c){return this.on(a,null,b,c)},unbind:function(a,b){return this.off(a,null,b)},live:function(a,b,c){f(this.context).on(a,this.selector,b,c);return this},die:function(a,b){f(this.context).off(a,this.selector||"**",b);return this},delegate:function(a,b,c,d){return this.on(b,a,c,d)},undelegate:function(a,b,c){return arguments.length==1?this.off(a,"**"):this.off(b,a,c)},trigger:function(a,b){return this.each(function(){f.event.trigger(a,b,this)})},triggerHandler:function(a,b){if(this[0])return f.event.trigger(a,b,this[0],!0)},toggle:function(a){var b=arguments,c=a.guid||f.guid++,d=0,e=function(c){var e=(f._data(this,"lastToggle"+a.guid)||0)%d;f._data(this,"lastToggle"+a.guid,e+1),c.preventDefault();return b[e].apply(this,arguments)||!1};e.guid=c;while(d<b.length)b[d++].guid=c;return this.click(e)},hover:function(a,b){return this.mouseenter(a).mouseleave(b||a)}}),f.each("blur focus focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup error contextmenu".split(" "),function(a,b){f.fn[b]=function(a,c){c==null&&(c=a,a=null);return arguments.length>0?this.on(b,null,a,c):this.trigger(b)},f.attrFn&&(f.attrFn[b]=!0),C.test(b)&&(f.event.fixHooks[b]=f.event.keyHooks),D.test(b)&&(f.event.fixHooks[b]=f.event.mouseHooks)}),function(){function x(a,b,c,e,f,g){for(var h=0,i=e.length;h<i;h++){var j=e[h];if(j){var k=!1;j=j[a];while(j){if(j[d]===c){k=e[j.sizset];break}if(j.nodeType===1){g||(j[d]=c,j.sizset=h);if(typeof b!="string"){if(j===b){k=!0;break}}else if(m.filter(b,[j]).length>0){k=j;break}}j=j[a]}e[h]=k}}}function w(a,b,c,e,f,g){for(var h=0,i=e.length;h<i;h++){var j=e[h];if(j){var k=!1;j=j[a];while(j){if(j[d]===c){k=e[j.sizset];break}j.nodeType===1&&!g&&(j[d]=c,j.sizset=h);if(j.nodeName.toLowerCase()===b){k=j;break}j=j[a]}e[h]=k}}}var a=/((?:\((?:\([^()]+\)|[^()]+)+\)|\[(?:\[[^\[\]]*\]|['"][^'"]*['"]|[^\[\]'"]+)+\]|\\.|[^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?((?:.|\r|\n)*)/g,d="sizcache"+(Math.random()+"").replace(".",""),e=0,g=Object.prototype.toString,h=!1,i=!0,j=/\\/g,k=/\r\n/g,l=/\W/;[0,0].sort(function(){i=!1;return 0});var m=function(b,d,e,f){e=e||[],d=d||c;var h=d;if(d.nodeType!==1&&d.nodeType!==9)return[];if(!b||typeof b!="string")return e;var i,j,k,l,n,q,r,t,u=!0,v=m.isXML(d),w=[],x=b;do{a.exec(""),i=a.exec(x);if(i){x=i[3],w.push(i[1]);if(i[2]){l=i[3];break}}}while(i);if(w.length>1&&p.exec(b))if(w.length===2&&o.relative[w[0]])j=y(w[0]+w[1],d,f);else{j=o.relative[w[0]]?[d]:m(w.shift(),d);while(w.length)b=w.shift(),o.relative[b]&&(b+=w.shift()),j=y(b,j,f)}else{!f&&w.length>1&&d.nodeType===9&&!v&&o.match.ID.test(w[0])&&!o.match.ID.test(w[w.length-1])&&(n=m.find(w.shift(),d,v),d=n.expr?m.filter(n.expr,n.set)[0]:n.set[0]);if(d){n=f?{expr:w.pop(),set:s(f)}:m.find(w.pop(),w.length===1&&(w[0]==="~"||w[0]==="+")&&d.parentNode?d.parentNode:d,v),j=n.expr?m.filter(n.expr,n.set):n.set,w.length>0?k=s(j):u=!1;while(w.length)q=w.pop(),r=q,o.relative[q]?r=w.pop():q="",r==null&&(r=d),o.relative[q](k,r,v)}else k=w=[]}k||(k=j),k||m.error(q||b);if(g.call(k)==="[object Array]")if(!u)e.push.apply(e,k);else if(d&&d.nodeType===1)for(t=0;k[t]!=null;t++)k[t]&&(k[t]===!0||k[t].nodeType===1&&m.contains(d,k[t]))&&e.push(j[t]);else for(t=0;k[t]!=null;t++)k[t]&&k[t].nodeType===1&&e.push(j[t]);else s(k,e);l&&(m(l,h,e,f),m.uniqueSort(e));return e};m.uniqueSort=function(a){if(u){h=i,a.sort(u);if(h)for(var b=1;b<a.length;b++)a[b]===a[b-1]&&a.splice(b--,1)}return a},m.matches=function(a,b){return m(a,null,null,b)},m.matchesSelector=function(a,b){return m(b,null,null,[a]).length>0},m.find=function(a,b,c){var d,e,f,g,h,i;if(!a)return[];for(e=0,f=o.order.length;e<f;e++){h=o.order[e];if(g=o.leftMatch[h].exec(a)){i=g[1],g.splice(1,1);if(i.substr(i.length-1)!=="\\"){g[1]=(g[1]||"").replace(j,""),d=o.find[h](g,b,c);if(d!=null){a=a.replace(o.match[h],"");break}}}}d||(d=typeof b.getElementsByTagName!="undefined"?b.getElementsByTagName("*"):[]);return{set:d,expr:a}},m.filter=function(a,c,d,e){var f,g,h,i,j,k,l,n,p,q=a,r=[],s=c,t=c&&c[0]&&m.isXML(c[0]);while(a&&c.length){for(h in o.filter)if((f=o.leftMatch[h].exec(a))!=null&&f[2]){k=o.filter[h],l=f[1],g=!1,f.splice(1,1);if(l.substr(l.length-1)==="\\")continue;s===r&&(r=[]);if(o.preFilter[h]){f=o.preFilter[h](f,s,d,r,e,t);if(!f)g=i=!0;else if(f===!0)continue}if(f)for(n=0;(j=s[n])!=null;n++)j&&(i=k(j,f,n,s),p=e^i,d&&i!=null?p?g=!0:s[n]=!1:p&&(r.push(j),g=!0));if(i!==b){d||(s=r),a=a.replace(o.match[h],"");if(!g)return[];break}}if(a===q)if(g==null)m.error(a);else break;q=a}return s},m.error=function(a){throw new Error("Syntax error, unrecognized expression: "+a)};var n=m.getText=function(a){var b,c,d=a.nodeType,e="";if(d){if(d===1||d===9){if(typeof a.textContent=="string")return a.textContent;if(typeof a.innerText=="string")return a.innerText.replace(k,"");for(a=a.firstChild;a;a=a.nextSibling)e+=n(a)}else if(d===3||d===4)return a.nodeValue}else for(b=0;c=a[b];b++)c.nodeType!==8&&(e+=n(c));return e},o=m.selectors={order:["ID","NAME","TAG"],match:{ID:/#((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,CLASS:/\.((?:[\w\u00c0-\uFFFF\-]|\\.)+)/,NAME:/\[name=['"]*((?:[\w\u00c0-\uFFFF\-]|\\.)+)['"]*\]/,ATTR:/\[\s*((?:[\w\u00c0-\uFFFF\-]|\\.)+)\s*(?:(\S?=)\s*(?:(['"])(.*?)\3|(#?(?:[\w\u00c0-\uFFFF\-]|\\.)*)|)|)\s*\]/,TAG:/^((?:[\w\u00c0-\uFFFF\*\-]|\\.)+)/,CHILD:/:(only|nth|last|first)-child(?:\(\s*(even|odd|(?:[+\-]?\d+|(?:[+\-]?\d*)?n\s*(?:[+\-]\s*\d+)?))\s*\))?/,POS:/:(nth|eq|gt|lt|first|last|even|odd)(?:\((\d*)\))?(?=[^\-]|$)/,PSEUDO:/:((?:[\w\u00c0-\uFFFF\-]|\\.)+)(?:\((['"]?)((?:\([^\)]+\)|[^\(\)]*)+)\2\))?/},leftMatch:{},attrMap:{"class":"className","for":"htmlFor"},attrHandle:{href:function(a){return a.getAttribute("href")},type:function(a){return a.getAttribute("type")}},relative:{"+":function(a,b){var c=typeof b=="string",d=c&&!l.test(b),e=c&&!d;d&&(b=b.toLowerCase());for(var f=0,g=a.length,h;f<g;f++)if(h=a[f]){while((h=h.previousSibling)&&h.nodeType!==1);a[f]=e||h&&h.nodeName.toLowerCase()===b?h||!1:h===b}e&&m.filter(b,a,!0)},">":function(a,b){var c,d=typeof b=="string",e=0,f=a.length;if(d&&!l.test(b)){b=b.toLowerCase();for(;e<f;e++){c=a[e];if(c){var g=c.parentNode;a[e]=g.nodeName.toLowerCase()===b?g:!1}}}else{for(;e<f;e++)c=a[e],c&&(a[e]=d?c.parentNode:c.parentNode===b);d&&m.filter(b,a,!0)}},"":function(a,b,c){var d,f=e++,g=x;typeof b=="string"&&!l.test(b)&&(b=b.toLowerCase(),d=b,g=w),g("parentNode",b,f,a,d,c)},"~":function(a,b,c){var d,f=e++,g=x;typeof b=="string"&&!l.test(b)&&(b=b.toLowerCase(),d=b,g=w),g("previousSibling",b,f,a,d,c)}},find:{ID:function(a,b,c){if(typeof b.getElementById!="undefined"&&!c){var d=b.getElementById(a[1]);return d&&d.parentNode?[d]:[]}},NAME:function(a,b){if(typeof b.getElementsByName!="undefined"){var c=[],d=b.getElementsByName(a[1]);for(var e=0,f=d.length;e<f;e++)d[e].getAttribute("name")===a[1]&&c.push(d[e]);return c.length===0?null:c}},TAG:function(a,b){if(typeof b.getElementsByTagName!="undefined")return b.getElementsByTagName(a[1])}},preFilter:{CLASS:function(a,b,c,d,e,f){a=" "+a[1].replace(j,"")+" ";if(f)return a;for(var g=0,h;(h=b[g])!=null;g++)h&&(e^(h.className&&(" "+h.className+" ").replace(/[\t\n\r]/g," ").indexOf(a)>=0)?c||d.push(h):c&&(b[g]=!1));return!1},ID:function(a){return a[1].replace(j,"")},TAG:function(a,b){return a[1].replace(j,"").toLowerCase()},CHILD:function(a){if(a[1]==="nth"){a[2]||m.error(a[0]),a[2]=a[2].replace(/^\+|\s*/g,"");var b=/(-?)(\d*)(?:n([+\-]?\d*))?/.exec(a[2]==="even"&&"2n"||a[2]==="odd"&&"2n+1"||!/\D/.test(a[2])&&"0n+"+a[2]||a[2]);a[2]=b[1]+(b[2]||1)-0,a[3]=b[3]-0}else a[2]&&m.error(a[0]);a[0]=e++;return a},ATTR:function(a,b,c,d,e,f){var g=a[1]=a[1].replace(j,"");!f&&o.attrMap[g]&&(a[1]=o.attrMap[g]),a[4]=(a[4]||a[5]||"").replace(j,""),a[2]==="~="&&(a[4]=" "+a[4]+" ");return a},PSEUDO:function(b,c,d,e,f){if(b[1]==="not")if((a.exec(b[3])||"").length>1||/^\w/.test(b[3]))b[3]=m(b[3],null,null,c);else{var g=m.filter(b[3],c,d,!0^f);d||e.push.apply(e,g);return!1}else if(o.match.POS.test(b[0])||o.match.CHILD.test(b[0]))return!0;return b},POS:function(a){a.unshift(!0);return a}},filters:{enabled:function(a){return a.disabled===!1&&a.type!=="hidden"},disabled:function(a){return a.disabled===!0},checked:function(a){return a.checked===!0},selected:function(a){a.parentNode&&a.parentNode.selectedIndex;return a.selected===!0},parent:function(a){return!!a.firstChild},empty:function(a){return!a.firstChild},has:function(a,b,c){return!!m(c[3],a).length},header:function(a){return/h\d/i.test(a.nodeName)},text:function(a){var b=a.getAttribute("type"),c=a.type;return a.nodeName.toLowerCase()==="input"&&"text"===c&&(b===c||b===null)},radio:function(a){return a.nodeName.toLowerCase()==="input"&&"radio"===a.type},checkbox:function(a){return a.nodeName.toLowerCase()==="input"&&"checkbox"===a.type},file:function(a){return a.nodeName.toLowerCase()==="input"&&"file"===a.type},password:function(a){return a.nodeName.toLowerCase()==="input"&&"password"===a.type},submit:function(a){var b=a.nodeName.toLowerCase();return(b==="input"||b==="button")&&"submit"===a.type},image:function(a){return a.nodeName.toLowerCase()==="input"&&"image"===a.type},reset:function(a){var b=a.nodeName.toLowerCase();return(b==="input"||b==="button")&&"reset"===a.type},button:function(a){var b=a.nodeName.toLowerCase();return b==="input"&&"button"===a.type||b==="button"},input:function(a){return/input|select|textarea|button/i.test(a.nodeName)},focus:function(a){return a===a.ownerDocument.activeElement}},setFilters:{first:function(a,b){return b===0},last:function(a,b,c,d){return b===d.length-1},even:function(a,b){return b%2===0},odd:function(a,b){return b%2===1},lt:function(a,b,c){return b<c[3]-0},gt:function(a,b,c){return b>c[3]-0},nth:function(a,b,c){return c[3]-0===b},eq:function(a,b,c){return c[3]-0===b}},filter:{PSEUDO:function(a,b,c,d){var e=b[1],f=o.filters[e];if(f)return f(a,c,b,d);if(e==="contains")return(a.textContent||a.innerText||n([a])||"").indexOf(b[3])>=0;if(e==="not"){var g=b[3];for(var h=0,i=g.length;h<i;h++)if(g[h]===a)return!1;return!0}m.error(e)},CHILD:function(a,b){var c,e,f,g,h,i,j,k=b[1],l=a;switch(k){case"only":case"first":while(l=l.previousSibling)if(l.nodeType===1)return!1;if(k==="first")return!0;l=a;case"last":while(l=l.nextSibling)if(l.nodeType===1)return!1;return!0;case"nth":c=b[2],e=b[3];if(c===1&&e===0)return!0;f=b[0],g=a.parentNode;if(g&&(g[d]!==f||!a.nodeIndex)){i=0;for(l=g.firstChild;l;l=l.nextSibling)l.nodeType===1&&(l.nodeIndex=++i);g[d]=f}j=a.nodeIndex-e;return c===0?j===0:j%c===0&&j/c>=0}},ID:function(a,b){return a.nodeType===1&&a.getAttribute("id")===b},TAG:function(a,b){return b==="*"&&a.nodeType===1||!!a.nodeName&&a.nodeName.toLowerCase()===b},CLASS:function(a,b){return(" "+(a.className||a.getAttribute("class"))+" ").indexOf(b)>-1},ATTR:function(a,b){var c=b[1],d=m.attr?m.attr(a,c):o.attrHandle[c]?o.attrHandle[c](a):a[c]!=null?a[c]:a.getAttribute(c),e=d+"",f=b[2],g=b[4];return d==null?f==="!=":!f&&m.attr?d!=null:f==="="?e===g:f==="*="?e.indexOf(g)>=0:f==="~="?(" "+e+" ").indexOf(g)>=0:g?f==="!="?e!==g:f==="^="?e.indexOf(g)===0:f==="$="?e.substr(e.length-g.length)===g:f==="|="?e===g||e.substr(0,g.length+1)===g+"-":!1:e&&d!==!1},POS:function(a,b,c,d){var e=b[2],f=o.setFilters[e];if(f)return f(a,c,b,d)}}},p=o.match.POS,q=function(a,b){return"\\"+(b-0+1)};for(var r in o.match)o.match[r]=new RegExp(o.match[r].source+/(?![^\[]*\])(?![^\(]*\))/.source),o.leftMatch[r]=new RegExp(/(^(?:.|\r|\n)*?)/.source+o.match[r].source.replace(/\\(\d+)/g,q));var s=function(a,b){a=Array.prototype.slice.call(a,0);if(b){b.push.apply(b,a);return b}return a};try{Array.prototype.slice.call(c.documentElement.childNodes,0)[0].nodeType}catch(t){s=function(a,b){var c=0,d=b||[];if(g.call(a)==="[object Array]")Array.prototype.push.apply(d,a);else if(typeof a.length=="number")for(var e=a.length;c<e;c++)d.push(a[c]);else for(;a[c];c++)d.push(a[c]);return d}}var u,v;c.documentElement.compareDocumentPosition?u=function(a,b){if(a===b){h=!0;return 0}if(!a.compareDocumentPosition||!b.compareDocumentPosition)return a.compareDocumentPosition?-1:1;return a.compareDocumentPosition(b)&4?-1:1}:(u=function(a,b){if(a===b){h=!0;return 0}if(a.sourceIndex&&b.sourceIndex)return a.sourceIndex-b.sourceIndex;var c,d,e=[],f=[],g=a.parentNode,i=b.parentNode,j=g;if(g===i)return v(a,b);if(!g)return-1;if(!i)return 1;while(j)e.unshift(j),j=j.parentNode;j=i;while(j)f.unshift(j),j=j.parentNode;c=e.length,d=f.length;for(var k=0;k<c&&k<d;k++)if(e[k]!==f[k])return v(e[k],f[k]);return k===c?v(a,f[k],-1):v(e[k],b,1)},v=function(a,b,c){if(a===b)return c;var d=a.nextSibling;while(d){if(d===b)return-1;d=d.nextSibling}return 1}),function(){var a=c.createElement("div"),d="script"+(new Date).getTime(),e=c.documentElement;a.innerHTML="<a name='"+d+"'/>",e.insertBefore(a,e.firstChild),c.getElementById(d)&&(o.find.ID=function(a,c,d){if(typeof c.getElementById!="undefined"&&!d){var e=c.getElementById(a[1]);return e?e.id===a[1]||typeof e.getAttributeNode!="undefined"&&e.getAttributeNode("id").nodeValue===a[1]?[e]:b:[]}},o.filter.ID=function(a,b){var c=typeof a.getAttributeNode!="undefined"&&a.getAttributeNode("id");return a.nodeType===1&&c&&c.nodeValue===b}),e.removeChild(a),e=a=null}(),function(){var a=c.createElement("div");a.appendChild(c.createComment("")),a.getElementsByTagName("*").length>0&&(o.find.TAG=function(a,b){var c=b.getElementsByTagName(a[1]);if(a[1]==="*"){var d=[];for(var e=0;c[e];e++)c[e].nodeType===1&&d.push(c[e]);c=d}return c}),a.innerHTML="<a href='#'></a>",a.firstChild&&typeof a.firstChild.getAttribute!="undefined"&&a.firstChild.getAttribute("href")!=="#"&&(o.attrHandle.href=function(a){return a.getAttribute("href",2)}),a=null}(),c.querySelectorAll&&function(){var a=m,b=c.createElement("div"),d="__sizzle__";b.innerHTML="<p class='TEST'></p>";if(!b.querySelectorAll||b.querySelectorAll(".TEST").length!==0){m=function(b,e,f,g){e=e||c;if(!g&&!m.isXML(e)){var h=/^(\w+$)|^\.([\w\-]+$)|^#([\w\-]+$)/.exec(b);if(h&&(e.nodeType===1||e.nodeType===9)){if(h[1])return s(e.getElementsByTagName(b),f);if(h[2]&&o.find.CLASS&&e.getElementsByClassName)return s(e.getElementsByClassName(h[2]),f)}if(e.nodeType===9){if(b==="body"&&e.body)return s([e.body],f);if(h&&h[3]){var i=e.getElementById(h[3]);if(!i||!i.parentNode)return s([],f);if(i.id===h[3])return s([i],f)}try{return s(e.querySelectorAll(b),f)}catch(j){}}else if(e.nodeType===1&&e.nodeName.toLowerCase()!=="object"){var k=e,l=e.getAttribute("id"),n=l||d,p=e.parentNode,q=/^\s*[+~]/.test(b);l?n=n.replace(/'/g,"\\$&"):e.setAttribute("id",n),q&&p&&(e=e.parentNode);try{if(!q||p)return s(e.querySelectorAll("[id='"+n+"'] "+b),f)}catch(r){}finally{l||k.removeAttribute("id")}}}return a(b,e,f,g)};for(var e in a)m[e]=a[e];b=null}}(),function(){var a=c.documentElement,b=a.matchesSelector||a.mozMatchesSelector||a.webkitMatchesSelector||a.msMatchesSelector;if(b){var d=!b.call(c.createElement("div"),"div"),e=!1;try{b.call(c.documentElement,"[test!='']:sizzle")}catch(f){e=!0}m.matchesSelector=function(a,c){c=c.replace(/\=\s*([^'"\]]*)\s*\]/g,"='$1']");if(!m.isXML(a))try{if(e||!o.match.PSEUDO.test(c)&&!/!=/.test(c)){var f=b.call(a,c);if(f||!d||a.document&&a.document.nodeType!==11)return f}}catch(g){}return m(c,null,null,[a]).length>0}}}(),function(){var a=c.createElement("div");a.innerHTML="<div class='test e'></div><div class='test'></div>";if(!!a.getElementsByClassName&&a.getElementsByClassName("e").length!==0){a.lastChild.className="e";if(a.getElementsByClassName("e").length===1)return;o.order.splice(1,0,"CLASS"),o.find.CLASS=function(a,b,c){if(typeof b.getElementsByClassName!="undefined"&&!c)return b.getElementsByClassName(a[1])},a=null}}(),c.documentElement.contains?m.contains=function(a,b){return a!==b&&(a.contains?a.contains(b):!0)}:c.documentElement.compareDocumentPosition?m.contains=function(a,b){return!!(a.compareDocumentPosition(b)&16)}:m.contains=function(){return!1},m.isXML=function(a){var b=(a?a.ownerDocument||a:0).documentElement;return b?b.nodeName!=="HTML":!1};var y=function(a,b,c){var d,e=[],f="",g=b.nodeType?[b]:b;while(d=o.match.PSEUDO.exec(a))f+=d[0],a=a.replace(o.match.PSEUDO,"");a=o.relative[a]?a+"*":a;for(var h=0,i=g.length;h<i;h++)m(a,g[h],e,c);return m.filter(f,e)};m.attr=f.attr,m.selectors.attrMap={},f.find=m,f.expr=m.selectors,f.expr[":"]=f.expr.filters,f.unique=m.uniqueSort,f.text=m.getText,f.isXMLDoc=m.isXML,f.contains=m.contains}();var L=/Until$/,M=/^(?:parents|prevUntil|prevAll)/,N=/,/,O=/^.[^:#\[\.,]*$/,P=Array.prototype.slice,Q=f.expr.match.POS,R={children:!0,contents:!0,next:!0,prev:!0};f.fn.extend({find:function(a){var b=this,c,d;if(typeof a!="string")return f(a).filter(function(){for(c=0,d=b.length;c<d;c++)if(f.contains(b[c],this))return!0});var e=this.pushStack("","find",a),g,h,i;for(c=0,d=this.length;c<d;c++){g=e.length,f.find(a,this[c],e);if(c>0)for(h=g;h<e.length;h++)for(i=0;i<g;i++)if(e[i]===e[h]){e.splice(h--,1);break}}return e},has:function(a){var b=f(a);return this.filter(function(){for(var a=0,c=b.length;a<c;a++)if(f.contains(this,b[a]))return!0})},not:function(a){return this.pushStack(T(this,a,!1),"not",a)},filter:function(a){return this.pushStack(T(this,a,!0),"filter",a)},is:function(a){return!!a&&(typeof a=="string"?Q.test(a)?f(a,this.context).index(this[0])>=0:f.filter(a,this).length>0:this.filter(a).length>0)},closest:function(a,b){var c=[],d,e,g=this[0];if(f.isArray(a)){var h=1;while(g&&g.ownerDocument&&g!==b){for(d=0;d<a.length;d++)f(g).is(a[d])&&c.push({selector:a[d],elem:g,level:h});g=g.parentNode,h++}return c}var i=Q.test(a)||typeof a!="string"?f(a,b||this.context):0;for(d=0,e=this.length;d<e;d++){g=this[d];while(g){if(i?i.index(g)>-1:f.find.matchesSelector(g,a)){c.push(g);break}g=g.parentNode;if(!g||!g.ownerDocument||g===b||g.nodeType===11)break}}c=c.length>1?f.unique(c):c;return this.pushStack(c,"closest",a)},index:function(a){if(!a)return this[0]&&this[0].parentNode?this.prevAll().length:-1;if(typeof a=="string")return f.inArray(this[0],f(a));return f.inArray(a.jquery?a[0]:a,this)},add:function(a,b){var c=typeof a=="string"?f(a,b):f.makeArray(a&&a.nodeType?[a]:a),d=f.merge(this.get(),c);return this.pushStack(S(c[0])||S(d[0])?d:f.unique(d))},andSelf:function(){return this.add(this.prevObject)}}),f.each({parent:function(a){var b=a.parentNode;return b&&b.nodeType!==11?b:null},parents:function(a){return f.dir(a,"parentNode")},parentsUntil:function(a,b,c){return f.dir(a,"parentNode",c)},next:function(a){return f.nth(a,2,"nextSibling")},prev:function(a){return f.nth(a,2,"previousSibling")},nextAll:function(a){return f.dir(a,"nextSibling")},prevAll:function(a){return f.dir(a,"previousSibling")},nextUntil:function(a,b,c){return f.dir(a,"nextSibling",c)},prevUntil:function(a,b,c){return f.dir(a,"previousSibling",c)},siblings:function(a){return f.sibling(a.parentNode.firstChild,a)},children:function(a){return f.sibling(a.firstChild)},contents:function(a){return f.nodeName(a,"iframe")?a.contentDocument||a.contentWindow.document:f.makeArray(a.childNodes)}},function(a,b){f.fn[a]=function(c,d){var e=f.map(this,b,c);L.test(a)||(d=c),d&&typeof d=="string"&&(e=f.filter(d,e)),e=this.length>1&&!R[a]?f.unique(e):e,(this.length>1||N.test(d))&&M.test(a)&&(e=e.reverse());return this.pushStack(e,a,P.call(arguments).join(","))}}),f.extend({filter:function(a,b,c){c&&(a=":not("+a+")");return b.length===1?f.find.matchesSelector(b[0],a)?[b[0]]:[]:f.find.matches(a,b)},dir:function(a,c,d){var e=[],g=a[c];while(g&&g.nodeType!==9&&(d===b||g.nodeType!==1||!f(g).is(d)))g.nodeType===1&&e.push(g),g=g[c];return e},nth:function(a,b,c,d){b=b||1;var e=0;for(;a;a=a[c])if(a.nodeType===1&&++e===b)break;return a},sibling:function(a,b){var c=[];for(;a;a=a.nextSibling)a.nodeType===1&&a!==b&&c.push(a);return c}});var V="abbr|article|aside|audio|canvas|datalist|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",W=/ jQuery\d+="(?:\d+|null)"/g,X=/^\s+/,Y=/<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/ig,Z=/<([\w:]+)/,$=/<tbody/i,_=/<|&#?\w+;/,ba=/<(?:script|style)/i,bb=/<(?:script|object|embed|option|style)/i,bc=new RegExp("<(?:"+V+")","i"),bd=/checked\s*(?:[^=]|=\s*.checked.)/i,be=/\/(java|ecma)script/i,bf=/^\s*<!(?:\[CDATA\[|\-\-)/,bg={option:[1,"<select multiple='multiple'>","</select>"],legend:[1,"<fieldset>","</fieldset>"],thead:[1,"<table>","</table>"],tr:[2,"<table><tbody>","</tbody></table>"],td:[3,"<table><tbody><tr>","</tr></tbody></table>"],col:[2,"<table><tbody></tbody><colgroup>","</colgroup></table>"],area:[1,"<map>","</map>"],_default:[0,"",""]},bh=U(c);bg.optgroup=bg.option,bg.tbody=bg.tfoot=bg.colgroup=bg.caption=bg.thead,bg.th=bg.td,f.support.htmlSerialize||(bg._default=[1,"div<div>","</div>"]),f.fn.extend({text:function(a){if(f.isFunction(a))return this.each(function(b){var c=f(this);c.text(a.call(this,b,c.text()))});if(typeof a!="object"&&a!==b)return this.empty().append((this[0]&&this[0].ownerDocument||c).createTextNode(a));return f.text(this)},wrapAll:function(a){if(f.isFunction(a))return this.each(function(b){f(this).wrapAll(a.call(this,b))});if(this[0]){var b=f(a,this[0].ownerDocument).eq(0).clone(!0);this[0].parentNode&&b.insertBefore(this[0]),b.map(function(){var a=this;while(a.firstChild&&a.firstChild.nodeType===1)a=a.firstChild;return a}).append(this)}return this},wrapInner:function(a){if(f.isFunction(a))return this.each(function(b){f(this).wrapInner(a.call(this,b))});return this.each(function(){var b=f(this),c=b.contents();c.length?c.wrapAll(a):b.append(a)})},wrap:function(a){var b=f.isFunction(a);return this.each(function(c){f(this).wrapAll(b?a.call(this,c):a)})},unwrap:function(){return this.parent().each(function(){f.nodeName(this,"body")||f(this).replaceWith(this.childNodes)}).end()},append:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.appendChild(a)})},prepend:function(){return this.domManip(arguments,!0,function(a){this.nodeType===1&&this.insertBefore(a,this.firstChild)})},before:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this)});if(arguments.length){var a=f.clean(arguments);a.push.apply(a,this.toArray());return this.pushStack(a,"before",arguments)}},after:function(){if(this[0]&&this[0].parentNode)return this.domManip(arguments,!1,function(a){this.parentNode.insertBefore(a,this.nextSibling)});if(arguments.length){var a=this.pushStack(this,"after",arguments);a.push.apply(a,f.clean(arguments));return a}},remove:function(a,b){for(var c=0,d;(d=this[c])!=null;c++)if(!a||f.filter(a,[d]).length)!b&&d.nodeType===1&&(f.cleanData(d.getElementsByTagName("*")),f.cleanData([d])),d.parentNode&&d.parentNode.removeChild(d);return this},empty:function()
{for(var a=0,b;(b=this[a])!=null;a++){b.nodeType===1&&f.cleanData(b.getElementsByTagName("*"));while(b.firstChild)b.removeChild(b.firstChild)}return this},clone:function(a,b){a=a==null?!1:a,b=b==null?a:b;return this.map(function(){return f.clone(this,a,b)})},html:function(a){if(a===b)return this[0]&&this[0].nodeType===1?this[0].innerHTML.replace(W,""):null;if(typeof a=="string"&&!ba.test(a)&&(f.support.leadingWhitespace||!X.test(a))&&!bg[(Z.exec(a)||["",""])[1].toLowerCase()]){a=a.replace(Y,"<$1></$2>");try{for(var c=0,d=this.length;c<d;c++)this[c].nodeType===1&&(f.cleanData(this[c].getElementsByTagName("*")),this[c].innerHTML=a)}catch(e){this.empty().append(a)}}else f.isFunction(a)?this.each(function(b){var c=f(this);c.html(a.call(this,b,c.html()))}):this.empty().append(a);return this},replaceWith:function(a){if(this[0]&&this[0].parentNode){if(f.isFunction(a))return this.each(function(b){var c=f(this),d=c.html();c.replaceWith(a.call(this,b,d))});typeof a!="string"&&(a=f(a).detach());return this.each(function(){var b=this.nextSibling,c=this.parentNode;f(this).remove(),b?f(b).before(a):f(c).append(a)})}return this.length?this.pushStack(f(f.isFunction(a)?a():a),"replaceWith",a):this},detach:function(a){return this.remove(a,!0)},domManip:function(a,c,d){var e,g,h,i,j=a[0],k=[];if(!f.support.checkClone&&arguments.length===3&&typeof j=="string"&&bd.test(j))return this.each(function(){f(this).domManip(a,c,d,!0)});if(f.isFunction(j))return this.each(function(e){var g=f(this);a[0]=j.call(this,e,c?g.html():b),g.domManip(a,c,d)});if(this[0]){i=j&&j.parentNode,f.support.parentNode&&i&&i.nodeType===11&&i.childNodes.length===this.length?e={fragment:i}:e=f.buildFragment(a,this,k),h=e.fragment,h.childNodes.length===1?g=h=h.firstChild:g=h.firstChild;if(g){c=c&&f.nodeName(g,"tr");for(var l=0,m=this.length,n=m-1;l<m;l++)d.call(c?bi(this[l],g):this[l],e.cacheable||m>1&&l<n?f.clone(h,!0,!0):h)}k.length&&f.each(k,bp)}return this}}),f.buildFragment=function(a,b,d){var e,g,h,i,j=a[0];b&&b[0]&&(i=b[0].ownerDocument||b[0]),i.createDocumentFragment||(i=c),a.length===1&&typeof j=="string"&&j.length<512&&i===c&&j.charAt(0)==="<"&&!bb.test(j)&&(f.support.checkClone||!bd.test(j))&&(f.support.html5Clone||!bc.test(j))&&(g=!0,h=f.fragments[j],h&&h!==1&&(e=h)),e||(e=i.createDocumentFragment(),f.clean(a,i,e,d)),g&&(f.fragments[j]=h?e:1);return{fragment:e,cacheable:g}},f.fragments={},f.each({appendTo:"append",prependTo:"prepend",insertBefore:"before",insertAfter:"after",replaceAll:"replaceWith"},function(a,b){f.fn[a]=function(c){var d=[],e=f(c),g=this.length===1&&this[0].parentNode;if(g&&g.nodeType===11&&g.childNodes.length===1&&e.length===1){e[b](this[0]);return this}for(var h=0,i=e.length;h<i;h++){var j=(h>0?this.clone(!0):this).get();f(e[h])[b](j),d=d.concat(j)}return this.pushStack(d,a,e.selector)}}),f.extend({clone:function(a,b,c){var d,e,g,h=f.support.html5Clone||!bc.test("<"+a.nodeName)?a.cloneNode(!0):bo(a);if((!f.support.noCloneEvent||!f.support.noCloneChecked)&&(a.nodeType===1||a.nodeType===11)&&!f.isXMLDoc(a)){bk(a,h),d=bl(a),e=bl(h);for(g=0;d[g];++g)e[g]&&bk(d[g],e[g])}if(b){bj(a,h);if(c){d=bl(a),e=bl(h);for(g=0;d[g];++g)bj(d[g],e[g])}}d=e=null;return h},clean:function(a,b,d,e){var g;b=b||c,typeof b.createElement=="undefined"&&(b=b.ownerDocument||b[0]&&b[0].ownerDocument||c);var h=[],i;for(var j=0,k;(k=a[j])!=null;j++){typeof k=="number"&&(k+="");if(!k)continue;if(typeof k=="string")if(!_.test(k))k=b.createTextNode(k);else{k=k.replace(Y,"<$1></$2>");var l=(Z.exec(k)||["",""])[1].toLowerCase(),m=bg[l]||bg._default,n=m[0],o=b.createElement("div");b===c?bh.appendChild(o):U(b).appendChild(o),o.innerHTML=m[1]+k+m[2];while(n--)o=o.lastChild;if(!f.support.tbody){var p=$.test(k),q=l==="table"&&!p?o.firstChild&&o.firstChild.childNodes:m[1]==="<table>"&&!p?o.childNodes:[];for(i=q.length-1;i>=0;--i)f.nodeName(q[i],"tbody")&&!q[i].childNodes.length&&q[i].parentNode.removeChild(q[i])}!f.support.leadingWhitespace&&X.test(k)&&o.insertBefore(b.createTextNode(X.exec(k)[0]),o.firstChild),k=o.childNodes}var r;if(!f.support.appendChecked)if(k[0]&&typeof (r=k.length)=="number")for(i=0;i<r;i++)bn(k[i]);else bn(k);k.nodeType?h.push(k):h=f.merge(h,k)}if(d){g=function(a){return!a.type||be.test(a.type)};for(j=0;h[j];j++)if(e&&f.nodeName(h[j],"script")&&(!h[j].type||h[j].type.toLowerCase()==="text/javascript"))e.push(h[j].parentNode?h[j].parentNode.removeChild(h[j]):h[j]);else{if(h[j].nodeType===1){var s=f.grep(h[j].getElementsByTagName("script"),g);h.splice.apply(h,[j+1,0].concat(s))}d.appendChild(h[j])}}return h},cleanData:function(a){var b,c,d=f.cache,e=f.event.special,g=f.support.deleteExpando;for(var h=0,i;(i=a[h])!=null;h++){if(i.nodeName&&f.noData[i.nodeName.toLowerCase()])continue;c=i[f.expando];if(c){b=d[c];if(b&&b.events){for(var j in b.events)e[j]?f.event.remove(i,j):f.removeEvent(i,j,b.handle);b.handle&&(b.handle.elem=null)}g?delete i[f.expando]:i.removeAttribute&&i.removeAttribute(f.expando),delete d[c]}}}});var bq=/alpha\([^)]*\)/i,br=/opacity=([^)]*)/,bs=/([A-Z]|^ms)/g,bt=/^-?\d+(?:px)?$/i,bu=/^-?\d/,bv=/^([\-+])=([\-+.\de]+)/,bw={position:"absolute",visibility:"hidden",display:"block"},bx=["Left","Right"],by=["Top","Bottom"],bz,bA,bB;f.fn.css=function(a,c){if(arguments.length===2&&c===b)return this;return f.access(this,a,c,!0,function(a,c,d){return d!==b?f.style(a,c,d):f.css(a,c)})},f.extend({cssHooks:{opacity:{get:function(a,b){if(b){var c=bz(a,"opacity","opacity");return c===""?"1":c}return a.style.opacity}}},cssNumber:{fillOpacity:!0,fontWeight:!0,lineHeight:!0,opacity:!0,orphans:!0,widows:!0,zIndex:!0,zoom:!0},cssProps:{"float":f.support.cssFloat?"cssFloat":"styleFloat"},style:function(a,c,d,e){if(!!a&&a.nodeType!==3&&a.nodeType!==8&&!!a.style){var g,h,i=f.camelCase(c),j=a.style,k=f.cssHooks[i];c=f.cssProps[i]||i;if(d===b){if(k&&"get"in k&&(g=k.get(a,!1,e))!==b)return g;return j[c]}h=typeof d,h==="string"&&(g=bv.exec(d))&&(d=+(g[1]+1)*+g[2]+parseFloat(f.css(a,c)),h="number");if(d==null||h==="number"&&isNaN(d))return;h==="number"&&!f.cssNumber[i]&&(d+="px");if(!k||!("set"in k)||(d=k.set(a,d))!==b)try{j[c]=d}catch(l){}}},css:function(a,c,d){var e,g;c=f.camelCase(c),g=f.cssHooks[c],c=f.cssProps[c]||c,c==="cssFloat"&&(c="float");if(g&&"get"in g&&(e=g.get(a,!0,d))!==b)return e;if(bz)return bz(a,c)},swap:function(a,b,c){var d={};for(var e in b)d[e]=a.style[e],a.style[e]=b[e];c.call(a);for(e in b)a.style[e]=d[e]}}),f.curCSS=f.css,f.each(["height","width"],function(a,b){f.cssHooks[b]={get:function(a,c,d){var e;if(c){if(a.offsetWidth!==0)return bC(a,b,d);f.swap(a,bw,function(){e=bC(a,b,d)});return e}},set:function(a,b){if(!bt.test(b))return b;b=parseFloat(b);if(b>=0)return b+"px"}}}),f.support.opacity||(f.cssHooks.opacity={get:function(a,b){return br.test((b&&a.currentStyle?a.currentStyle.filter:a.style.filter)||"")?parseFloat(RegExp.$1)/100+"":b?"1":""},set:function(a,b){var c=a.style,d=a.currentStyle,e=f.isNumeric(b)?"alpha(opacity="+b*100+")":"",g=d&&d.filter||c.filter||"";c.zoom=1;if(b>=1&&f.trim(g.replace(bq,""))===""){c.removeAttribute("filter");if(d&&!d.filter)return}c.filter=bq.test(g)?g.replace(bq,e):g+" "+e}}),f(function(){f.support.reliableMarginRight||(f.cssHooks.marginRight={get:function(a,b){var c;f.swap(a,{display:"inline-block"},function(){b?c=bz(a,"margin-right","marginRight"):c=a.style.marginRight});return c}})}),c.defaultView&&c.defaultView.getComputedStyle&&(bA=function(a,b){var c,d,e;b=b.replace(bs,"-$1").toLowerCase(),(d=a.ownerDocument.defaultView)&&(e=d.getComputedStyle(a,null))&&(c=e.getPropertyValue(b),c===""&&!f.contains(a.ownerDocument.documentElement,a)&&(c=f.style(a,b)));return c}),c.documentElement.currentStyle&&(bB=function(a,b){var c,d,e,f=a.currentStyle&&a.currentStyle[b],g=a.style;f===null&&g&&(e=g[b])&&(f=e),!bt.test(f)&&bu.test(f)&&(c=g.left,d=a.runtimeStyle&&a.runtimeStyle.left,d&&(a.runtimeStyle.left=a.currentStyle.left),g.left=b==="fontSize"?"1em":f||0,f=g.pixelLeft+"px",g.left=c,d&&(a.runtimeStyle.left=d));return f===""?"auto":f}),bz=bA||bB,f.expr&&f.expr.filters&&(f.expr.filters.hidden=function(a){var b=a.offsetWidth,c=a.offsetHeight;return b===0&&c===0||!f.support.reliableHiddenOffsets&&(a.style&&a.style.display||f.css(a,"display"))==="none"},f.expr.filters.visible=function(a){return!f.expr.filters.hidden(a)});var bD=/%20/g,bE=/\[\]$/,bF=/\r?\n/g,bG=/#.*$/,bH=/^(.*?):[ \t]*([^\r\n]*)\r?$/mg,bI=/^(?:color|date|datetime|datetime-local|email|hidden|month|number|password|range|search|tel|text|time|url|week)$/i,bJ=/^(?:about|app|app\-storage|.+\-extension|file|res|widget):$/,bK=/^(?:GET|HEAD)$/,bL=/^\/\//,bM=/\?/,bN=/<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,bO=/^(?:select|textarea)/i,bP=/\s+/,bQ=/([?&])_=[^&]*/,bR=/^([\w\+\.\-]+:)(?:\/\/([^\/?#:]*)(?::(\d+))?)?/,bS=f.fn.load,bT={},bU={},bV,bW,bX=["*/"]+["*"];try{bV=e.href}catch(bY){bV=c.createElement("a"),bV.href="",bV=bV.href}bW=bR.exec(bV.toLowerCase())||[],f.fn.extend({load:function(a,c,d){if(typeof a!="string"&&bS)return bS.apply(this,arguments);if(!this.length)return this;var e=a.indexOf(" ");if(e>=0){var g=a.slice(e,a.length);a=a.slice(0,e)}var h="GET";c&&(f.isFunction(c)?(d=c,c=b):typeof c=="object"&&(c=f.param(c,f.ajaxSettings.traditional),h="POST"));var i=this;f.ajax({url:a,type:h,dataType:"html",data:c,complete:function(a,b,c){c=a.responseText,a.isResolved()&&(a.done(function(a){c=a}),i.html(g?f("<div>").append(c.replace(bN,"")).find(g):c)),d&&i.each(d,[c,b,a])}});return this},serialize:function(){return f.param(this.serializeArray())},serializeArray:function(){return this.map(function(){return this.elements?f.makeArray(this.elements):this}).filter(function(){return this.name&&!this.disabled&&(this.checked||bO.test(this.nodeName)||bI.test(this.type))}).map(function(a,b){var c=f(this).val();return c==null?null:f.isArray(c)?f.map(c,function(a,c){return{name:b.name,value:a.replace(bF,"\r\n")}}):{name:b.name,value:c.replace(bF,"\r\n")}}).get()}}),f.each("ajaxStart ajaxStop ajaxComplete ajaxError ajaxSuccess ajaxSend".split(" "),function(a,b){f.fn[b]=function(a){return this.on(b,a)}}),f.each(["get","post"],function(a,c){f[c]=function(a,d,e,g){f.isFunction(d)&&(g=g||e,e=d,d=b);return f.ajax({type:c,url:a,data:d,success:e,dataType:g})}}),f.extend({getScript:function(a,c){return f.get(a,b,c,"script")},getJSON:function(a,b,c){return f.get(a,b,c,"json")},ajaxSetup:function(a,b){b?b_(a,f.ajaxSettings):(b=a,a=f.ajaxSettings),b_(a,b);return a},ajaxSettings:{url:bV,isLocal:bJ.test(bW[1]),global:!0,type:"GET",contentType:"application/x-www-form-urlencoded",processData:!0,async:!0,accepts:{xml:"application/xml, text/xml",html:"text/html",text:"text/plain",json:"application/json, text/javascript","*":bX},contents:{xml:/xml/,html:/html/,json:/json/},responseFields:{xml:"responseXML",text:"responseText"},converters:{"* text":a.String,"text html":!0,"text json":f.parseJSON,"text xml":f.parseXML},flatOptions:{context:!0,url:!0}},ajaxPrefilter:bZ(bT),ajaxTransport:bZ(bU),ajax:function(a,c){function w(a,c,l,m){if(s!==2){s=2,q&&clearTimeout(q),p=b,n=m||"",v.readyState=a>0?4:0;var o,r,u,w=c,x=l?cb(d,v,l):b,y,z;if(a>=200&&a<300||a===304){if(d.ifModified){if(y=v.getResponseHeader("Last-Modified"))f.lastModified[k]=y;if(z=v.getResponseHeader("Etag"))f.etag[k]=z}if(a===304)w="notmodified",o=!0;else try{r=cc(d,x),w="success",o=!0}catch(A){w="parsererror",u=A}}else{u=w;if(!w||a)w="error",a<0&&(a=0)}v.status=a,v.statusText=""+(c||w),o?h.resolveWith(e,[r,w,v]):h.rejectWith(e,[v,w,u]),v.statusCode(j),j=b,t&&g.trigger("ajax"+(o?"Success":"Error"),[v,d,o?r:u]),i.fireWith(e,[v,w]),t&&(g.trigger("ajaxComplete",[v,d]),--f.active||f.event.trigger("ajaxStop"))}}typeof a=="object"&&(c=a,a=b),c=c||{};var d=f.ajaxSetup({},c),e=d.context||d,g=e!==d&&(e.nodeType||e instanceof f)?f(e):f.event,h=f.Deferred(),i=f.Callbacks("once memory"),j=d.statusCode||{},k,l={},m={},n,o,p,q,r,s=0,t,u,v={readyState:0,setRequestHeader:function(a,b){if(!s){var c=a.toLowerCase();a=m[c]=m[c]||a,l[a]=b}return this},getAllResponseHeaders:function(){return s===2?n:null},getResponseHeader:function(a){var c;if(s===2){if(!o){o={};while(c=bH.exec(n))o[c[1].toLowerCase()]=c[2]}c=o[a.toLowerCase()]}return c===b?null:c},overrideMimeType:function(a){s||(d.mimeType=a);return this},abort:function(a){a=a||"abort",p&&p.abort(a),w(0,a);return this}};h.promise(v),v.success=v.done,v.error=v.fail,v.complete=i.add,v.statusCode=function(a){if(a){var b;if(s<2)for(b in a)j[b]=[j[b],a[b]];else b=a[v.status],v.then(b,b)}return this},d.url=((a||d.url)+"").replace(bG,"").replace(bL,bW[1]+"//"),d.dataTypes=f.trim(d.dataType||"*").toLowerCase().split(bP),d.crossDomain==null&&(r=bR.exec(d.url.toLowerCase()),d.crossDomain=!(!r||r[1]==bW[1]&&r[2]==bW[2]&&(r[3]||(r[1]==="http:"?80:443))==(bW[3]||(bW[1]==="http:"?80:443)))),d.data&&d.processData&&typeof d.data!="string"&&(d.data=f.param(d.data,d.traditional)),b$(bT,d,c,v);if(s===2)return!1;t=d.global,d.type=d.type.toUpperCase(),d.hasContent=!bK.test(d.type),t&&f.active++===0&&f.event.trigger("ajaxStart");if(!d.hasContent){d.data&&(d.url+=(bM.test(d.url)?"&":"?")+d.data,delete d.data),k=d.url;if(d.cache===!1){var x=f.now(),y=d.url.replace(bQ,"$1_="+x);d.url=y+(y===d.url?(bM.test(d.url)?"&":"?")+"_="+x:"")}}(d.data&&d.hasContent&&d.contentType!==!1||c.contentType)&&v.setRequestHeader("Content-Type",d.contentType),d.ifModified&&(k=k||d.url,f.lastModified[k]&&v.setRequestHeader("If-Modified-Since",f.lastModified[k]),f.etag[k]&&v.setRequestHeader("If-None-Match",f.etag[k])),v.setRequestHeader("Accept",d.dataTypes[0]&&d.accepts[d.dataTypes[0]]?d.accepts[d.dataTypes[0]]+(d.dataTypes[0]!=="*"?", "+bX+"; q=0.01":""):d.accepts["*"]);for(u in d.headers)v.setRequestHeader(u,d.headers[u]);if(d.beforeSend&&(d.beforeSend.call(e,v,d)===!1||s===2)){v.abort();return!1}for(u in{success:1,error:1,complete:1})v[u](d[u]);p=b$(bU,d,c,v);if(!p)w(-1,"No Transport");else{v.readyState=1,t&&g.trigger("ajaxSend",[v,d]),d.async&&d.timeout>0&&(q=setTimeout(function(){v.abort("timeout")},d.timeout));try{s=1,p.send(l,w)}catch(z){if(s<2)w(-1,z);else throw z}}return v},param:function(a,c){var d=[],e=function(a,b){b=f.isFunction(b)?b():b,d[d.length]=encodeURIComponent(a)+"="+encodeURIComponent(b)};c===b&&(c=f.ajaxSettings.traditional);if(f.isArray(a)||a.jquery&&!f.isPlainObject(a))f.each(a,function(){e(this.name,this.value)});else for(var g in a)ca(g,a[g],c,e);return d.join("&").replace(bD,"+")}}),f.extend({active:0,lastModified:{},etag:{}});var cd=f.now(),ce=/(\=)\?(&|$)|\?\?/i;f.ajaxSetup({jsonp:"callback",jsonpCallback:function(){return f.expando+"_"+cd++}}),f.ajaxPrefilter("json jsonp",function(b,c,d){var e=b.contentType==="application/x-www-form-urlencoded"&&typeof b.data=="string";if(b.dataTypes[0]==="jsonp"||b.jsonp!==!1&&(ce.test(b.url)||e&&ce.test(b.data))){var g,h=b.jsonpCallback=f.isFunction(b.jsonpCallback)?b.jsonpCallback():b.jsonpCallback,i=a[h],j=b.url,k=b.data,l="$1"+h+"$2";b.jsonp!==!1&&(j=j.replace(ce,l),b.url===j&&(e&&(k=k.replace(ce,l)),b.data===k&&(j+=(/\?/.test(j)?"&":"?")+b.jsonp+"="+h))),b.url=j,b.data=k,a[h]=function(a){g=[a]},d.always(function(){a[h]=i,g&&f.isFunction(i)&&a[h](g[0])}),b.converters["script json"]=function(){g||f.error(h+" was not called");return g[0]},b.dataTypes[0]="json";return"script"}}),f.ajaxSetup({accepts:{script:"text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"},contents:{script:/javascript|ecmascript/},converters:{"text script":function(a){f.globalEval(a);return a}}}),f.ajaxPrefilter("script",function(a){a.cache===b&&(a.cache=!1),a.crossDomain&&(a.type="GET",a.global=!1)}),f.ajaxTransport("script",function(a){if(a.crossDomain){var d,e=c.head||c.getElementsByTagName("head")[0]||c.documentElement;return{send:function(f,g){d=c.createElement("script"),d.async="async",a.scriptCharset&&(d.charset=a.scriptCharset),d.src=a.url,d.onload=d.onreadystatechange=function(a,c){if(c||!d.readyState||/loaded|complete/.test(d.readyState))d.onload=d.onreadystatechange=null,e&&d.parentNode&&e.removeChild(d),d=b,c||g(200,"success")},e.insertBefore(d,e.firstChild)},abort:function(){d&&d.onload(0,1)}}}});var cf=a.ActiveXObject?function(){for(var a in ch)ch[a](0,1)}:!1,cg=0,ch;f.ajaxSettings.xhr=a.ActiveXObject?function(){return!this.isLocal&&ci()||cj()}:ci,function(a){f.extend(f.support,{ajax:!!a,cors:!!a&&"withCredentials"in a})}(f.ajaxSettings.xhr()),f.support.ajax&&f.ajaxTransport(function(c){if(!c.crossDomain||f.support.cors){var d;return{send:function(e,g){var h=c.xhr(),i,j;c.username?h.open(c.type,c.url,c.async,c.username,c.password):h.open(c.type,c.url,c.async);if(c.xhrFields)for(j in c.xhrFields)h[j]=c.xhrFields[j];c.mimeType&&h.overrideMimeType&&h.overrideMimeType(c.mimeType),!c.crossDomain&&!e["X-Requested-With"]&&(e["X-Requested-With"]="XMLHttpRequest");try{for(j in e)h.setRequestHeader(j,e[j])}catch(k){}h.send(c.hasContent&&c.data||null),d=function(a,e){var j,k,l,m,n;try{if(d&&(e||h.readyState===4)){d=b,i&&(h.onreadystatechange=f.noop,cf&&delete ch[i]);if(e)h.readyState!==4&&h.abort();else{j=h.status,l=h.getAllResponseHeaders(),m={},n=h.responseXML,n&&n.documentElement&&(m.xml=n),m.text=h.responseText;try{k=h.statusText}catch(o){k=""}!j&&c.isLocal&&!c.crossDomain?j=m.text?200:404:j===1223&&(j=204)}}}catch(p){e||g(-1,p)}m&&g(j,k,m,l)},!c.async||h.readyState===4?d():(i=++cg,cf&&(ch||(ch={},f(a).unload(cf)),ch[i]=d),h.onreadystatechange=d)},abort:function(){d&&d(0,1)}}}});var ck={},cl,cm,cn=/^(?:toggle|show|hide)$/,co=/^([+\-]=)?([\d+.\-]+)([a-z%]*)$/i,cp,cq=[["height","marginTop","marginBottom","paddingTop","paddingBottom"],["width","marginLeft","marginRight","paddingLeft","paddingRight"],["opacity"]],cr;f.fn.extend({show:function(a,b,c){var d,e;if(a||a===0)return this.animate(cu("show",3),a,b,c);for(var g=0,h=this.length;g<h;g++)d=this[g],d.style&&(e=d.style.display,!f._data(d,"olddisplay")&&e==="none"&&(e=d.style.display=""),e===""&&f.css(d,"display")==="none"&&f._data(d,"olddisplay",cv(d.nodeName)));for(g=0;g<h;g++){d=this[g];if(d.style){e=d.style.display;if(e===""||e==="none")d.style.display=f._data(d,"olddisplay")||""}}return this},hide:function(a,b,c){if(a||a===0)return this.animate(cu("hide",3),a,b,c);var d,e,g=0,h=this.length;for(;g<h;g++)d=this[g],d.style&&(e=f.css(d,"display"),e!=="none"&&!f._data(d,"olddisplay")&&f._data(d,"olddisplay",e));for(g=0;g<h;g++)this[g].style&&(this[g].style.display="none");return this},_toggle:f.fn.toggle,toggle:function(a,b,c){var d=typeof a=="boolean";f.isFunction(a)&&f.isFunction(b)?this._toggle.apply(this,arguments):a==null||d?this.each(function(){var b=d?a:f(this).is(":hidden");f(this)[b?"show":"hide"]()}):this.animate(cu("toggle",3),a,b,c);return this},fadeTo:function(a,b,c,d){return this.filter(":hidden").css("opacity",0).show().end().animate({opacity:b},a,c,d)},animate:function(a,b,c,d){function g(){e.queue===!1&&f._mark(this);var b=f.extend({},e),c=this.nodeType===1,d=c&&f(this).is(":hidden"),g,h,i,j,k,l,m,n,o;b.animatedProperties={};for(i in a){g=f.camelCase(i),i!==g&&(a[g]=a[i],delete a[i]),h=a[g],f.isArray(h)?(b.animatedProperties[g]=h[1],h=a[g]=h[0]):b.animatedProperties[g]=b.specialEasing&&b.specialEasing[g]||b.easing||"swing";if(h==="hide"&&d||h==="show"&&!d)return b.complete.call(this);c&&(g==="height"||g==="width")&&(b.overflow=[this.style.overflow,this.style.overflowX,this.style.overflowY],f.css(this,"display")==="inline"&&f.css(this,"float")==="none"&&(!f.support.inlineBlockNeedsLayout||cv(this.nodeName)==="inline"?this.style.display="inline-block":this.style.zoom=1))}b.overflow!=null&&(this.style.overflow="hidden");for(i in a)j=new f.fx(this,b,i),h=a[i],cn.test(h)?(o=f._data(this,"toggle"+i)||(h==="toggle"?d?"show":"hide":0),o?(f._data(this,"toggle"+i,o==="show"?"hide":"show"),j[o]()):j[h]()):(k=co.exec(h),l=j.cur(),k?(m=parseFloat(k[2]),n=k[3]||(f.cssNumber[i]?"":"px"),n!=="px"&&(f.style(this,i,(m||1)+n),l=(m||1)/j.cur()*l,f.style(this,i,l+n)),k[1]&&(m=(k[1]==="-="?-1:1)*m+l),j.custom(l,m,n)):j.custom(l,h,""));return!0}var e=f.speed(b,c,d);if(f.isEmptyObject(a))return this.each(e.complete,[!1]);a=f.extend({},a);return e.queue===!1?this.each(g):this.queue(e.queue,g)},stop:function(a,c,d){typeof a!="string"&&(d=c,c=a,a=b),c&&a!==!1&&this.queue(a||"fx",[]);return this.each(function(){function h(a,b,c){var e=b[c];f.removeData(a,c,!0),e.stop(d)}var b,c=!1,e=f.timers,g=f._data(this);d||f._unmark(!0,this);if(a==null)for(b in g)g[b]&&g[b].stop&&b.indexOf(".run")===b.length-4&&h(this,g,b);else g[b=a+".run"]&&g[b].stop&&h(this,g,b);for(b=e.length;b--;)e[b].elem===this&&(a==null||e[b].queue===a)&&(d?e[b](!0):e[b].saveState(),c=!0,e.splice(b,1));(!d||!c)&&f.dequeue(this,a)})}}),f.each({slideDown:cu("show",1),slideUp:cu("hide",1),slideToggle:cu("toggle",1),fadeIn:{opacity:"show"},fadeOut:{opacity:"hide"},fadeToggle:{opacity:"toggle"}},function(a,b){f.fn[a]=function(a,c,d){return this.animate(b,a,c,d)}}),f.extend({speed:function(a,b,c){var d=a&&typeof a=="object"?f.extend({},a):{complete:c||!c&&b||f.isFunction(a)&&a,duration:a,easing:c&&b||b&&!f.isFunction(b)&&b};d.duration=f.fx.off?0:typeof d.duration=="number"?d.duration:d.duration in f.fx.speeds?f.fx.speeds[d.duration]:f.fx.speeds._default;if(d.queue==null||d.queue===!0)d.queue="fx";d.old=d.complete,d.complete=function(a){f.isFunction(d.old)&&d.old.call(this),d.queue?f.dequeue(this,d.queue):a!==!1&&f._unmark(this)};return d},easing:{linear:function(a,b,c,d){return c+d*a},swing:function(a,b,c,d){return(-Math.cos(a*Math.PI)/2+.5)*d+c}},timers:[],fx:function(a,b,c){this.options=b,this.elem=a,this.prop=c,b.orig=b.orig||{}}}),f.fx.prototype={update:function(){this.options.step&&this.options.step.call(this.elem,this.now,this),(f.fx.step[this.prop]||f.fx.step._default)(this)},cur:function(){if(this.elem[this.prop]!=null&&(!this.elem.style||this.elem.style[this.prop]==null))return this.elem[this.prop];var a,b=f.css(this.elem,this.prop);return isNaN(a=parseFloat(b))?!b||b==="auto"?0:b:a},custom:function(a,c,d){function h(a){return e.step(a)}var e=this,g=f.fx;this.startTime=cr||cs(),this.end=c,this.now=this.start=a,this.pos=this.state=0,this.unit=d||this.unit||(f.cssNumber[this.prop]?"":"px"),h.queue=this.options.queue,h.elem=this.elem,h.saveState=function(){e.options.hide&&f._data(e.elem,"fxshow"+e.prop)===b&&f._data(e.elem,"fxshow"+e.prop,e.start)},h()&&f.timers.push(h)&&!cp&&(cp=setInterval(g.tick,g.interval))},show:function(){var a=f._data(this.elem,"fxshow"+this.prop);this.options.orig[this.prop]=a||f.style(this.elem,this.prop),this.options.show=!0,a!==b?this.custom(this.cur(),a):this.custom(this.prop==="width"||this.prop==="height"?1:0,this.cur()),f(this.elem).show()},hide:function(){this.options.orig[this.prop]=f._data(this.elem,"fxshow"+this.prop)||f.style(this.elem,this.prop),this.options.hide=!0,this.custom(this.cur(),0)},step:function(a){var b,c,d,e=cr||cs(),g=!0,h=this.elem,i=this.options;if(a||e>=i.duration+this.startTime){this.now=this.end,this.pos=this.state=1,this.update(),i.animatedProperties[this.prop]=!0;for(b in i.animatedProperties)i.animatedProperties[b]!==!0&&(g=!1);if(g){i.overflow!=null&&!f.support.shrinkWrapBlocks&&f.each(["","X","Y"],function(a,b){h.style["overflow"+b]=i.overflow[a]}),i.hide&&f(h).hide();if(i.hide||i.show)for(b in i.animatedProperties)f.style(h,b,i.orig[b]),f.removeData(h,"fxshow"+b,!0),f.removeData(h,"toggle"+b,!0);d=i.complete,d&&(i.complete=!1,d.call(h))}return!1}i.duration==Infinity?this.now=e:(c=e-this.startTime,this.state=c/i.duration,this.pos=f.easing[i.animatedProperties[this.prop]](this.state,c,0,1,i.duration),this.now=this.start+(this.end-this.start)*this.pos),this.update();return!0}},f.extend(f.fx,{tick:function(){var a,b=f.timers,c=0;for(;c<b.length;c++)a=b[c],!a()&&b[c]===a&&b.splice(c--,1);b.length||f.fx.stop()},interval:13,stop:function(){clearInterval(cp),cp=null},speeds:{slow:600,fast:200,_default:400},step:{opacity:function(a){f.style(a.elem,"opacity",a.now)},_default:function(a){a.elem.style&&a.elem.style[a.prop]!=null?a.elem.style[a.prop]=a.now+a.unit:a.elem[a.prop]=a.now}}}),f.each(["width","height"],function(a,b){f.fx.step[b]=function(a){f.style(a.elem,b,Math.max(0,a.now)+a.unit)}}),f.expr&&f.expr.filters&&(f.expr.filters.animated=function(a){return f.grep(f.timers,function(b){return a===b.elem}).length});var cw=/^t(?:able|d|h)$/i,cx=/^(?:body|html)$/i;"getBoundingClientRect"in c.documentElement?f.fn.offset=function(a){var b=this[0],c;if(a)return this.each(function(b){f.offset.setOffset(this,a,b)});if(!b||!b.ownerDocument)return null;if(b===b.ownerDocument.body)return f.offset.bodyOffset(b);try{c=b.getBoundingClientRect()}catch(d){}var e=b.ownerDocument,g=e.documentElement;if(!c||!f.contains(g,b))return c?{top:c.top,left:c.left}:{top:0,left:0};var h=e.body,i=cy(e),j=g.clientTop||h.clientTop||0,k=g.clientLeft||h.clientLeft||0,l=i.pageYOffset||f.support.boxModel&&g.scrollTop||h.scrollTop,m=i.pageXOffset||f.support.boxModel&&g.scrollLeft||h.scrollLeft,n=c.top+l-j,o=c.left+m-k;return{top:n,left:o}}:f.fn.offset=function(a){var b=this[0];if(a)return this.each(function(b){f.offset.setOffset(this,a,b)});if(!b||!b.ownerDocument)return null;if(b===b.ownerDocument.body)return f.offset.bodyOffset(b);var c,d=b.offsetParent,e=b,g=b.ownerDocument,h=g.documentElement,i=g.body,j=g.defaultView,k=j?j.getComputedStyle(b,null):b.currentStyle,l=b.offsetTop,m=b.offsetLeft;while((b=b.parentNode)&&b!==i&&b!==h){if(f.support.fixedPosition&&k.position==="fixed")break;c=j?j.getComputedStyle(b,null):b.currentStyle,l-=b.scrollTop,m-=b.scrollLeft,b===d&&(l+=b.offsetTop,m+=b.offsetLeft,f.support.doesNotAddBorder&&(!f.support.doesAddBorderForTableAndCells||!cw.test(b.nodeName))&&(l+=parseFloat(c.borderTopWidth)||0,m+=parseFloat(c.borderLeftWidth)||0),e=d,d=b.offsetParent),f.support.subtractsBorderForOverflowNotVisible&&c.overflow!=="visible"&&(l+=parseFloat(c.borderTopWidth)||0,m+=parseFloat(c.borderLeftWidth)||0),k=c}if(k.position==="relative"||k.position==="static")l+=i.offsetTop,m+=i.offsetLeft;f.support.fixedPosition&&k.position==="fixed"&&(l+=Math.max(h.scrollTop,i.scrollTop),m+=Math.max(h.scrollLeft,i.scrollLeft));return{top:l,left:m}},f.offset={bodyOffset:function(a){var b=a.offsetTop,c=a.offsetLeft;f.support.doesNotIncludeMarginInBodyOffset&&(b+=parseFloat(f.css(a,"marginTop"))||0,c+=parseFloat(f.css(a,"marginLeft"))||0);return{top:b,left:c}},setOffset:function(a,b,c){var d=f.css(a,"position");d==="static"&&(a.style.position="relative");var e=f(a),g=e.offset(),h=f.css(a,"top"),i=f.css(a,"left"),j=(d==="absolute"||d==="fixed")&&f.inArray("auto",[h,i])>-1,k={},l={},m,n;j?(l=e.position(),m=l.top,n=l.left):(m=parseFloat(h)||0,n=parseFloat(i)||0),f.isFunction(b)&&(b=b.call(a,c,g)),b.top!=null&&(k.top=b.top-g.top+m),b.left!=null&&(k.left=b.left-g.left+n),"using"in b?b.using.call(a,k):e.css(k)}},f.fn.extend({position:function(){if(!this[0])return null;var a=this[0],b=this.offsetParent(),c=this.offset(),d=cx.test(b[0].nodeName)?{top:0,left:0}:b.offset();c.top-=parseFloat(f.css(a,"marginTop"))||0,c.left-=parseFloat(f.css(a,"marginLeft"))||0,d.top+=parseFloat(f.css(b[0],"borderTopWidth"))||0,d.left+=parseFloat(f.css(b[0],"borderLeftWidth"))||0;return{top:c.top-d.top,left:c.left-d.left}},offsetParent:function(){return this.map(function(){var a=this.offsetParent||c.body;while(a&&!cx.test(a.nodeName)&&f.css(a,"position")==="static")a=a.offsetParent;return a})}}),f.each(["Left","Top"],function(a,c){var d="scroll"+c;f.fn[d]=function(c){var e,g;if(c===b){e=this[0];if(!e)return null;g=cy(e);return g?"pageXOffset"in g?g[a?"pageYOffset":"pageXOffset"]:f.support.boxModel&&g.document.documentElement[d]||g.document.body[d]:e[d]}return this.each(function(){g=cy(this),g?g.scrollTo(a?f(g).scrollLeft():c,a?c:f(g).scrollTop()):this[d]=c})}}),f.each(["Height","Width"],function(a,c){var d=c.toLowerCase();f.fn["inner"+c]=function(){var a=this[0];return a?a.style?parseFloat(f.css(a,d,"padding")):this[d]():null},f.fn["outer"+c]=function(a){var b=this[0];return b?b.style?parseFloat(f.css(b,d,a?"margin":"border")):this[d]():null},f.fn[d]=function(a){var e=this[0];if(!e)return a==null?null:this;if(f.isFunction(a))return this.each(function(b){var c=f(this);c[d](a.call(this,b,c[d]()))});if(f.isWindow(e)){var g=e.document.documentElement["client"+c],h=e.document.body;return e.document.compatMode==="CSS1Compat"&&g||h&&h["client"+c]||g}if(e.nodeType===9)return Math.max(e.documentElement["client"+c],e.body["scroll"+c],e.documentElement["scroll"+c],e.body["offset"+c],e.documentElement["offset"+c]);if(a===b){var i=f.css(e,d),j=parseFloat(i);return f.isNumeric(j)?j:i}return this.css(d,typeof a=="string"?a:a+"px")}}),a.jQuery=a.$=f,typeof define=="function"&&define.amd&&define.amd.jQuery&&define("jquery",[],function(){return f})})(window);
(function(a,b){function c(b,c){var e=b.nodeName.toLowerCase();if("area"===e){var f=b.parentNode,g=f.name,h;return!b.href||!g||f.nodeName.toLowerCase()!=="map"?!1:(h=a("img[usemap=#"+g+"]")[0],!!h&&d(h))}return(/input|select|textarea|button|object/.test(e)?!b.disabled:"a"==e?b.href||c:c)&&d(b)}function d(b){return!a(b).parents().andSelf().filter(function(){return a.curCSS(this,"visibility")==="hidden"||a.expr.filters.hidden(this)}).length}a.ui=a.ui||{};if(a.ui.version)return;a.extend(a.ui,{version:"1.8.23",keyCode:{ALT:18,BACKSPACE:8,CAPS_LOCK:20,COMMA:188,COMMAND:91,COMMAND_LEFT:91,COMMAND_RIGHT:93,CONTROL:17,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,INSERT:45,LEFT:37,MENU:93,NUMPAD_ADD:107,NUMPAD_DECIMAL:110,NUMPAD_DIVIDE:111,NUMPAD_ENTER:108,NUMPAD_MULTIPLY:106,NUMPAD_SUBTRACT:109,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SHIFT:16,SPACE:32,TAB:9,UP:38,WINDOWS:91}}),a.fn.extend({propAttr:a.fn.prop||a.fn.attr,_focus:a.fn.focus,focus:function(b,c){return typeof b=="number"?this.each(function(){var d=this;setTimeout(function(){a(d).focus(),c&&c.call(d)},b)}):this._focus.apply(this,arguments)},scrollParent:function(){var b;return a.browser.msie&&/(static|relative)/.test(this.css("position"))||/absolute/.test(this.css("position"))?b=this.parents().filter(function(){return/(relative|absolute|fixed)/.test(a.curCSS(this,"position",1))&&/(auto|scroll)/.test(a.curCSS(this,"overflow",1)+a.curCSS(this,"overflow-y",1)+a.curCSS(this,"overflow-x",1))}).eq(0):b=this.parents().filter(function(){return/(auto|scroll)/.test(a.curCSS(this,"overflow",1)+a.curCSS(this,"overflow-y",1)+a.curCSS(this,"overflow-x",1))}).eq(0),/fixed/.test(this.css("position"))||!b.length?a(document):b},zIndex:function(c){if(c!==b)return this.css("zIndex",c);if(this.length){var d=a(this[0]),e,f;while(d.length&&d[0]!==document){e=d.css("position");if(e==="absolute"||e==="relative"||e==="fixed"){f=parseInt(d.css("zIndex"),10);if(!isNaN(f)&&f!==0)return f}d=d.parent()}}return 0},disableSelection:function(){return this.bind((a.support.selectstart?"selectstart":"mousedown")+".ui-disableSelection",function(a){a.preventDefault()})},enableSelection:function(){return this.unbind(".ui-disableSelection")}}),a("<a>").outerWidth(1).jquery||a.each(["Width","Height"],function(c,d){function h(b,c,d,f){return a.each(e,function(){c-=parseFloat(a.curCSS(b,"padding"+this,!0))||0,d&&(c-=parseFloat(a.curCSS(b,"border"+this+"Width",!0))||0),f&&(c-=parseFloat(a.curCSS(b,"margin"+this,!0))||0)}),c}var e=d==="Width"?["Left","Right"]:["Top","Bottom"],f=d.toLowerCase(),g={innerWidth:a.fn.innerWidth,innerHeight:a.fn.innerHeight,outerWidth:a.fn.outerWidth,outerHeight:a.fn.outerHeight};a.fn["inner"+d]=function(c){return c===b?g["inner"+d].call(this):this.each(function(){a(this).css(f,h(this,c)+"px")})},a.fn["outer"+d]=function(b,c){return typeof b!="number"?g["outer"+d].call(this,b):this.each(function(){a(this).css(f,h(this,b,!0,c)+"px")})}}),a.extend(a.expr[":"],{data:a.expr.createPseudo?a.expr.createPseudo(function(b){return function(c){return!!a.data(c,b)}}):function(b,c,d){return!!a.data(b,d[3])},focusable:function(b){return c(b,!isNaN(a.attr(b,"tabindex")))},tabbable:function(b){var d=a.attr(b,"tabindex"),e=isNaN(d);return(e||d>=0)&&c(b,!e)}}),a(function(){var b=document.body,c=b.appendChild(c=document.createElement("div"));c.offsetHeight,a.extend(c.style,{minHeight:"100px",height:"auto",padding:0,borderWidth:0}),a.support.minHeight=c.offsetHeight===100,a.support.selectstart="onselectstart"in c,b.removeChild(c).style.display="none"}),a.curCSS||(a.curCSS=a.css),a.extend(a.ui,{plugin:{add:function(b,c,d){var e=a.ui[b].prototype;for(var f in d)e.plugins[f]=e.plugins[f]||[],e.plugins[f].push([c,d[f]])},call:function(a,b,c){var d=a.plugins[b];if(!d||!a.element[0].parentNode)return;for(var e=0;e<d.length;e++)a.options[d[e][0]]&&d[e][1].apply(a.element,c)}},contains:function(a,b){return document.compareDocumentPosition?a.compareDocumentPosition(b)&16:a!==b&&a.contains(b)},hasScroll:function(b,c){if(a(b).css("overflow")==="hidden")return!1;var d=c&&c==="left"?"scrollLeft":"scrollTop",e=!1;return b[d]>0?!0:(b[d]=1,e=b[d]>0,b[d]=0,e)},isOverAxis:function(a,b,c){return a>b&&a<b+c},isOver:function(b,c,d,e,f,g){return a.ui.isOverAxis(b,d,f)&&a.ui.isOverAxis(c,e,g)}})})(jQuery),function(a,b){if(a.cleanData){var c=a.cleanData;a.cleanData=function(b){for(var d=0,e;(e=b[d])!=null;d++)try{a(e).triggerHandler("remove")}catch(f){}c(b)}}else{var d=a.fn.remove;a.fn.remove=function(b,c){return this.each(function(){return c||(!b||a.filter(b,[this]).length)&&a("*",this).add([this]).each(function(){try{a(this).triggerHandler("remove")}catch(b){}}),d.call(a(this),b,c)})}}a.widget=function(b,c,d){var e=b.split(".")[0],f;b=b.split(".")[1],f=e+"-"+b,d||(d=c,c=a.Widget),a.expr[":"][f]=function(c){return!!a.data(c,b)},a[e]=a[e]||{},a[e][b]=function(a,b){arguments.length&&this._createWidget(a,b)};var g=new c;g.options=a.extend(!0,{},g.options),a[e][b].prototype=a.extend(!0,g,{namespace:e,widgetName:b,widgetEventPrefix:a[e][b].prototype.widgetEventPrefix||b,widgetBaseClass:f},d),a.widget.bridge(b,a[e][b])},a.widget.bridge=function(c,d){a.fn[c]=function(e){var f=typeof e=="string",g=Array.prototype.slice.call(arguments,1),h=this;return e=!f&&g.length?a.extend.apply(null,[!0,e].concat(g)):e,f&&e.charAt(0)==="_"?h:(f?this.each(function(){var d=a.data(this,c),f=d&&a.isFunction(d[e])?d[e].apply(d,g):d;if(f!==d&&f!==b)return h=f,!1}):this.each(function(){var b=a.data(this,c);b?b.option(e||{})._init():a.data(this,c,new d(e,this))}),h)}},a.Widget=function(a,b){arguments.length&&this._createWidget(a,b)},a.Widget.prototype={widgetName:"widget",widgetEventPrefix:"",options:{disabled:!1},_createWidget:function(b,c){a.data(c,this.widgetName,this),this.element=a(c),this.options=a.extend(!0,{},this.options,this._getCreateOptions(),b);var d=this;this.element.bind("remove."+this.widgetName,function(){d.destroy()}),this._create(),this._trigger("create"),this._init()},_getCreateOptions:function(){return a.metadata&&a.metadata.get(this.element[0])[this.widgetName]},_create:function(){},_init:function(){},destroy:function(){this.element.unbind("."+this.widgetName).removeData(this.widgetName),this.widget().unbind("."+this.widgetName).removeAttr("aria-disabled").removeClass(this.widgetBaseClass+"-disabled "+"ui-state-disabled")},widget:function(){return this.element},option:function(c,d){var e=c;if(arguments.length===0)return a.extend({},this.options);if(typeof c=="string"){if(d===b)return this.options[c];e={},e[c]=d}return this._setOptions(e),this},_setOptions:function(b){var c=this;return a.each(b,function(a,b){c._setOption(a,b)}),this},_setOption:function(a,b){return this.options[a]=b,a==="disabled"&&this.widget()[b?"addClass":"removeClass"](this.widgetBaseClass+"-disabled"+" "+"ui-state-disabled").attr("aria-disabled",b),this},enable:function(){return this._setOption("disabled",!1)},disable:function(){return this._setOption("disabled",!0)},_trigger:function(b,c,d){var e,f,g=this.options[b];d=d||{},c=a.Event(c),c.type=(b===this.widgetEventPrefix?b:this.widgetEventPrefix+b).toLowerCase(),c.target=this.element[0],f=c.originalEvent;if(f)for(e in f)e in c||(c[e]=f[e]);return this.element.trigger(c,d),!(a.isFunction(g)&&g.call(this.element[0],c,d)===!1||c.isDefaultPrevented())}}}(jQuery),function(a,b){var c=!1;a(document).mouseup(function(a){c=!1}),a.widget("ui.mouse",{options:{cancel:":input,option",distance:1,delay:0},_mouseInit:function(){var b=this;this.element.bind("mousedown."+this.widgetName,function(a){return b._mouseDown(a)}).bind("click."+this.widgetName,function(c){if(!0===a.data(c.target,b.widgetName+".preventClickEvent"))return a.removeData(c.target,b.widgetName+".preventClickEvent"),c.stopImmediatePropagation(),!1}),this.started=!1},_mouseDestroy:function(){this.element.unbind("."+this.widgetName),this._mouseMoveDelegate&&a(document).unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate)},_mouseDown:function(b){if(c)return;this._mouseStarted&&this._mouseUp(b),this._mouseDownEvent=b;var d=this,e=b.which==1,f=typeof this.options.cancel=="string"&&b.target.nodeName?a(b.target).closest(this.options.cancel).length:!1;if(!e||f||!this._mouseCapture(b))return!0;this.mouseDelayMet=!this.options.delay,this.mouseDelayMet||(this._mouseDelayTimer=setTimeout(function(){d.mouseDelayMet=!0},this.options.delay));if(this._mouseDistanceMet(b)&&this._mouseDelayMet(b)){this._mouseStarted=this._mouseStart(b)!==!1;if(!this._mouseStarted)return b.preventDefault(),!0}return!0===a.data(b.target,this.widgetName+".preventClickEvent")&&a.removeData(b.target,this.widgetName+".preventClickEvent"),this._mouseMoveDelegate=function(a){return d._mouseMove(a)},this._mouseUpDelegate=function(a){return d._mouseUp(a)},a(document).bind("mousemove."+this.widgetName,this._mouseMoveDelegate).bind("mouseup."+this.widgetName,this._mouseUpDelegate),b.preventDefault(),c=!0,!0},_mouseMove:function(b){return!a.browser.msie||document.documentMode>=9||!!b.button?this._mouseStarted?(this._mouseDrag(b),b.preventDefault()):(this._mouseDistanceMet(b)&&this._mouseDelayMet(b)&&(this._mouseStarted=this._mouseStart(this._mouseDownEvent,b)!==!1,this._mouseStarted?this._mouseDrag(b):this._mouseUp(b)),!this._mouseStarted):this._mouseUp(b)},_mouseUp:function(b){return a(document).unbind("mousemove."+this.widgetName,this._mouseMoveDelegate).unbind("mouseup."+this.widgetName,this._mouseUpDelegate),this._mouseStarted&&(this._mouseStarted=!1,b.target==this._mouseDownEvent.target&&a.data(b.target,this.widgetName+".preventClickEvent",!0),this._mouseStop(b)),!1},_mouseDistanceMet:function(a){return Math.max(Math.abs(this._mouseDownEvent.pageX-a.pageX),Math.abs(this._mouseDownEvent.pageY-a.pageY))>=this.options.distance},_mouseDelayMet:function(a){return this.mouseDelayMet},_mouseStart:function(a){},_mouseDrag:function(a){},_mouseStop:function(a){},_mouseCapture:function(a){return!0}})}(jQuery),function(a,b){a.widget("ui.draggable",a.ui.mouse,{widgetEventPrefix:"drag",options:{addClasses:!0,appendTo:"parent",axis:!1,connectToSortable:!1,containment:!1,cursor:"auto",cursorAt:!1,grid:!1,handle:!1,helper:"original",iframeFix:!1,opacity:!1,refreshPositions:!1,revert:!1,revertDuration:500,scope:"default",scroll:!0,scrollSensitivity:20,scrollSpeed:20,snap:!1,snapMode:"both",snapTolerance:20,stack:!1,zIndex:!1},_create:function(){this.options.helper=="original"&&!/^(?:r|a|f)/.test(this.element.css("position"))&&(this.element[0].style.position="relative"),this.options.addClasses&&this.element.addClass("ui-draggable"),this.options.disabled&&this.element.addClass("ui-draggable-disabled"),this._mouseInit()},destroy:function(){if(!this.element.data("draggable"))return;return this.element.removeData("draggable").unbind(".draggable").removeClass("ui-draggable ui-draggable-dragging ui-draggable-disabled"),this._mouseDestroy(),this},_mouseCapture:function(b){var c=this.options;return this.helper||c.disabled||a(b.target).is(".ui-resizable-handle")?!1:(this.handle=this._getHandle(b),this.handle?(c.iframeFix&&a(c.iframeFix===!0?"iframe":c.iframeFix).each(function(){a('<div class="ui-draggable-iframeFix" style="background: #fff;"></div>').css({width:this.offsetWidth+"px",height:this.offsetHeight+"px",position:"absolute",opacity:"0.001",zIndex:1e3}).css(a(this).offset()).appendTo("body")}),!0):!1)},_mouseStart:function(b){var c=this.options;return this.helper=this._createHelper(b),this.helper.addClass("ui-draggable-dragging"),this._cacheHelperProportions(),a.ui.ddmanager&&(a.ui.ddmanager.current=this),this._cacheMargins(),this.cssPosition=this.helper.css("position"),this.scrollParent=this.helper.scrollParent(),this.offset=this.positionAbs=this.element.offset(),this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left},a.extend(this.offset,{click:{left:b.pageX-this.offset.left,top:b.pageY-this.offset.top},parent:this._getParentOffset(),relative:this._getRelativeOffset()}),this.originalPosition=this.position=this._generatePosition(b),this.originalPageX=b.pageX,this.originalPageY=b.pageY,c.cursorAt&&this._adjustOffsetFromHelper(c.cursorAt),c.containment&&this._setContainment(),this._trigger("start",b)===!1?(this._clear(),!1):(this._cacheHelperProportions(),a.ui.ddmanager&&!c.dropBehaviour&&a.ui.ddmanager.prepareOffsets(this,b),this._mouseDrag(b,!0),a.ui.ddmanager&&a.ui.ddmanager.dragStart(this,b),!0)},_mouseDrag:function(b,c){this.position=this._generatePosition(b),this.positionAbs=this._convertPositionTo("absolute");if(!c){var d=this._uiHash();if(this._trigger("drag",b,d)===!1)return this._mouseUp({}),!1;this.position=d.position}if(!this.options.axis||this.options.axis!="y")this.helper[0].style.left=this.position.left+"px";if(!this.options.axis||this.options.axis!="x")this.helper[0].style.top=this.position.top+"px";return a.ui.ddmanager&&a.ui.ddmanager.drag(this,b),!1},_mouseStop:function(b){var c=!1;a.ui.ddmanager&&!this.options.dropBehaviour&&(c=a.ui.ddmanager.drop(this,b)),this.dropped&&(c=this.dropped,this.dropped=!1);var d=this.element[0],e=!1;while(d&&(d=d.parentNode))d==document&&(e=!0);if(!e&&this.options.helper==="original")return!1;if(this.options.revert=="invalid"&&!c||this.options.revert=="valid"&&c||this.options.revert===!0||a.isFunction(this.options.revert)&&this.options.revert.call(this.element,c)){var f=this;a(this.helper).animate(this.originalPosition,parseInt(this.options.revertDuration,10),function(){f._trigger("stop",b)!==!1&&f._clear()})}else this._trigger("stop",b)!==!1&&this._clear();return!1},_mouseUp:function(b){return this.options.iframeFix===!0&&a("div.ui-draggable-iframeFix").each(function(){this.parentNode.removeChild(this)}),a.ui.ddmanager&&a.ui.ddmanager.dragStop(this,b),a.ui.mouse.prototype._mouseUp.call(this,b)},cancel:function(){return this.helper.is(".ui-draggable-dragging")?this._mouseUp({}):this._clear(),this},_getHandle:function(b){var c=!this.options.handle||!a(this.options.handle,this.element).length?!0:!1;return a(this.options.handle,this.element).find("*").andSelf().each(function(){this==b.target&&(c=!0)}),c},_createHelper:function(b){var c=this.options,d=a.isFunction(c.helper)?a(c.helper.apply(this.element[0],[b])):c.helper=="clone"?this.element.clone().removeAttr("id"):this.element;return d.parents("body").length||d.appendTo(c.appendTo=="parent"?this.element[0].parentNode:c.appendTo),d[0]!=this.element[0]&&!/(fixed|absolute)/.test(d.css("position"))&&d.css("position","absolute"),d},_adjustOffsetFromHelper:function(b){typeof b=="string"&&(b=b.split(" ")),a.isArray(b)&&(b={left:+b[0],top:+b[1]||0}),"left"in b&&(this.offset.click.left=b.left+this.margins.left),"right"in b&&(this.offset.click.left=this.helperProportions.width-b.right+this.margins.left),"top"in b&&(this.offset.click.top=b.top+this.margins.top),"bottom"in b&&(this.offset.click.top=this.helperProportions.height-b.bottom+this.margins.top)},_getParentOffset:function(){this.offsetParent=this.helper.offsetParent();var b=this.offsetParent.offset();this.cssPosition=="absolute"&&this.scrollParent[0]!=document&&a.ui.contains(this.scrollParent[0],this.offsetParent[0])&&(b.left+=this.scrollParent.scrollLeft(),b.top+=this.scrollParent.scrollTop());if(this.offsetParent[0]==document.body||this.offsetParent[0].tagName&&this.offsetParent[0].tagName.toLowerCase()=="html"&&a.browser.msie)b={top:0,left:0};return{top:b.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:b.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if(this.cssPosition=="relative"){var a=this.element.position();return{top:a.top-(parseInt(this.helper.css("top"),10)||0)+this.scrollParent.scrollTop(),left:a.left-(parseInt(this.helper.css("left"),10)||0)+this.scrollParent.scrollLeft()}}return{top:0,left:0}},_cacheMargins:function(){this.margins={left:parseInt(this.element.css("marginLeft"),10)||0,top:parseInt(this.element.css("marginTop"),10)||0,right:parseInt(this.element.css("marginRight"),10)||0,bottom:parseInt(this.element.css("marginBottom"),10)||0}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var b=this.options;b.containment=="parent"&&(b.containment=this.helper[0].parentNode);if(b.containment=="document"||b.containment=="window")this.containment=[b.containment=="document"?0:a(window).scrollLeft()-this.offset.relative.left-this.offset.parent.left,b.containment=="document"?0:a(window).scrollTop()-this.offset.relative.top-this.offset.parent.top,(b.containment=="document"?0:a(window).scrollLeft())+a(b.containment=="document"?document:window).width()-this.helperProportions.width-this.margins.left,(b.containment=="document"?0:a(window).scrollTop())+(a(b.containment=="document"?document:window).height()||document.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top];if(!/^(document|window|parent)$/.test(b.containment)&&b.containment.constructor!=Array){var c=a(b.containment),d=c[0];if(!d)return;var e=c.offset(),f=a(d).css("overflow")!="hidden";this.containment=[(parseInt(a(d).css("borderLeftWidth"),10)||0)+(parseInt(a(d).css("paddingLeft"),10)||0),(parseInt(a(d).css("borderTopWidth"),10)||0)+(parseInt(a(d).css("paddingTop"),10)||0),(f?Math.max(d.scrollWidth,d.offsetWidth):d.offsetWidth)-(parseInt(a(d).css("borderLeftWidth"),10)||0)-(parseInt(a(d).css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left-this.margins.right,(f?Math.max(d.scrollHeight,d.offsetHeight):d.offsetHeight)-(parseInt(a(d).css("borderTopWidth"),10)||0)-(parseInt(a(d).css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top-this.margins.bottom],this.relative_container=c}else b.containment.constructor==Array&&(this.containment=b.containment)},_convertPositionTo:function(b,c){c||(c=this.position);var d=b=="absolute"?1:-1,e=this.options,f=this.cssPosition=="absolute"&&(this.scrollParent[0]==document||!a.ui.contains(this.scrollParent[0],this.offsetParent[0]))?this.offsetParent:this.scrollParent,g=/(html|body)/i.test(f[0].tagName);return{top:c.top+this.offset.relative.top*d+this.offset.parent.top*d-(a.browser.safari&&a.browser.version<526&&this.cssPosition=="fixed"?0:(this.cssPosition=="fixed"?-this.scrollParent.scrollTop():g?0:f.scrollTop())*d),left:c.left+this.offset.relative.left*d+this.offset.parent.left*d-(a.browser.safari&&a.browser.version<526&&this.cssPosition=="fixed"?0:(this.cssPosition=="fixed"?-this.scrollParent.scrollLeft():g?0:f.scrollLeft())*d)}},_generatePosition:function(b){var c=this.options,d=this.cssPosition=="absolute"&&(this.scrollParent[0]==document||!a.ui.contains(this.scrollParent[0],this.offsetParent[0]))?this.offsetParent:this.scrollParent,e=/(html|body)/i.test(d[0].tagName),f=b.pageX,g=b.pageY;if(this.originalPosition){var h;if(this.containment){if(this.relative_container){var i=this.relative_container.offset();h=[this.containment[0]+i.left,this.containment[1]+i.top,this.containment[2]+i.left,this.containment[3]+i.top]}else h=this.containment;b.pageX-this.offset.click.left<h[0]&&(f=h[0]+this.offset.click.left),b.pageY-this.offset.click.top<h[1]&&(g=h[1]+this.offset.click.top),b.pageX-this.offset.click.left>h[2]&&(f=h[2]+this.offset.click.left),b.pageY-this.offset.click.top>h[3]&&(g=h[3]+this.offset.click.top)}if(c.grid){var j=c.grid[1]?this.originalPageY+Math.round((g-this.originalPageY)/c.grid[1])*c.grid[1]:this.originalPageY;g=h?j-this.offset.click.top<h[1]||j-this.offset.click.top>h[3]?j-this.offset.click.top<h[1]?j+c.grid[1]:j-c.grid[1]:j:j;var k=c.grid[0]?this.originalPageX+Math.round((f-this.originalPageX)/c.grid[0])*c.grid[0]:this.originalPageX;f=h?k-this.offset.click.left<h[0]||k-this.offset.click.left>h[2]?k-this.offset.click.left<h[0]?k+c.grid[0]:k-c.grid[0]:k:k}}return{top:g-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+(a.browser.safari&&a.browser.version<526&&this.cssPosition=="fixed"?0:this.cssPosition=="fixed"?-this.scrollParent.scrollTop():e?0:d.scrollTop()),left:f-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+(a.browser.safari&&a.browser.version<526&&this.cssPosition=="fixed"?0:this.cssPosition=="fixed"?-this.scrollParent.scrollLeft():e?0:d.scrollLeft())}},_clear:function(){this.helper.removeClass("ui-draggable-dragging"),this.helper[0]!=this.element[0]&&!this.cancelHelperRemoval&&this.helper.remove(),this.helper=null,this.cancelHelperRemoval=!1},_trigger:function(b,c,d){return d=d||this._uiHash(),a.ui.plugin.call(this,b,[c,d]),b=="drag"&&(this.positionAbs=this._convertPositionTo("absolute")),a.Widget.prototype._trigger.call(this,b,c,d)},plugins:{},_uiHash:function(a){return{helper:this.helper,position:this.position,originalPosition:this.originalPosition,offset:this.positionAbs}}}),a.extend(a.ui.draggable,{version:"1.8.23"}),a.ui.plugin.add("draggable","connectToSortable",{start:function(b,c){var d=a(this).data("draggable"),e=d.options,f=a.extend({},c,{item:d.element});d.sortables=[],a(e.connectToSortable).each(function(){var c=a.data(this,"sortable");c&&!c.options.disabled&&(d.sortables.push({instance:c,shouldRevert:c.options.revert}),c.refreshPositions(),c._trigger("activate",b,f))})},stop:function(b,c){var d=a(this).data("draggable"),e=a.extend({},c,{item:d.element});a.each(d.sortables,function(){this.instance.isOver?(this.instance.isOver=0,d.cancelHelperRemoval=!0,this.instance.cancelHelperRemoval=!1,this.shouldRevert&&(this.instance.options.revert=!0),this.instance._mouseStop(b),this.instance.options.helper=this.instance.options._helper,d.options.helper=="original"&&this.instance.currentItem.css({top:"auto",left:"auto"})):(this.instance.cancelHelperRemoval=!1,this.instance._trigger("deactivate",b,e))})},drag:function(b,c){var d=a(this).data("draggable"),e=this,f=function(b){var c=this.offset.click.top,d=this.offset.click.left,e=this.positionAbs.top,f=this.positionAbs.left,g=b.height,h=b.width,i=b.top,j=b.left;return a.ui.isOver(e+c,f+d,i,j,g,h)};a.each(d.sortables,function(f){this.instance.positionAbs=d.positionAbs,this.instance.helperProportions=d.helperProportions,this.instance.offset.click=d.offset.click,this.instance._intersectsWith(this.instance.containerCache)?(this.instance.isOver||(this.instance.isOver=1,this.instance.currentItem=a(e).clone().removeAttr("id").appendTo(this.instance.element).data("sortable-item",!0),this.instance.options._helper=this.instance.options.helper,this.instance.options.helper=function(){return c.helper[0]},b.target=this.instance.currentItem[0],this.instance._mouseCapture(b,!0),this.instance._mouseStart(b,!0,!0),this.instance.offset.click.top=d.offset.click.top,this.instance.offset.click.left=d.offset.click.left,this.instance.offset.parent.left-=d.offset.parent.left-this.instance.offset.parent.left,this.instance.offset.parent.top-=d.offset.parent.top-this.instance.offset.parent.top,d._trigger("toSortable",b),d.dropped=this.instance.element,d.currentItem=d.element,this.instance.fromOutside=d),this.instance.currentItem&&this.instance._mouseDrag(b)):this.instance.isOver&&(this.instance.isOver=0,this.instance.cancelHelperRemoval=!0,this.instance.options.revert=!1,this.instance._trigger("out",b,this.instance._uiHash(this.instance)),this.instance._mouseStop(b,!0),this.instance.options.helper=this.instance.options._helper,this.instance.currentItem.remove(),this.instance.placeholder&&this.instance.placeholder.remove(),d._trigger("fromSortable",b),d.dropped=!1)})}}),a.ui.plugin.add("draggable","cursor",{start:function(b,c){var d=a("body"),e=a(this).data("draggable").options;d.css("cursor")&&(e._cursor=d.css("cursor")),d.css("cursor",e.cursor)},stop:function(b,c){var d=a(this).data("draggable").options;d._cursor&&a("body").css("cursor",d._cursor)}}),a.ui.plugin.add("draggable","opacity",{start:function(b,c){var d=a(c.helper),e=a(this).data("draggable").options;d.css("opacity")&&(e._opacity=d.css("opacity")),d.css("opacity",e.opacity)},stop:function(b,c){var d=a(this).data("draggable").options;d._opacity&&a(c.helper).css("opacity",d._opacity)}}),a.ui.plugin.add("draggable","scroll",{start:function(b,c){var d=a(this).data("draggable");d.scrollParent[0]!=document&&d.scrollParent[0].tagName!="HTML"&&(d.overflowOffset=d.scrollParent.offset())},drag:function(b,c){var d=a(this).data("draggable"),e=d.options,f=!1;if(d.scrollParent[0]!=document&&d.scrollParent[0].tagName!="HTML"){if(!e.axis||e.axis!="x")d.overflowOffset.top+d.scrollParent[0].offsetHeight-b.pageY<e.scrollSensitivity?d.scrollParent[0].scrollTop=f=d.scrollParent[0].scrollTop+e.scrollSpeed:b.pageY-d.overflowOffset.top<e.scrollSensitivity&&(d.scrollParent[0].scrollTop=f=d.scrollParent[0].scrollTop-e.scrollSpeed);if(!e.axis||e.axis!="y")d.overflowOffset.left+d.scrollParent[0].offsetWidth-b.pageX<e.scrollSensitivity?d.scrollParent[0].scrollLeft=f=d.scrollParent[0].scrollLeft+e.scrollSpeed:b.pageX-d.overflowOffset.left<e.scrollSensitivity&&(d.scrollParent[0].scrollLeft=f=d.scrollParent[0].scrollLeft-e.scrollSpeed)}else{if(!e.axis||e.axis!="x")b.pageY-a(document).scrollTop()<e.scrollSensitivity?f=a(document).scrollTop(a(document).scrollTop()-e.scrollSpeed):a(window).height()-(b.pageY-a(document).scrollTop())<e.scrollSensitivity&&(f=a(document).scrollTop(a(document).scrollTop()+e.scrollSpeed));if(!e.axis||e.axis!="y")b.pageX-a(document).scrollLeft()<e.scrollSensitivity?f=a(document).scrollLeft(a(document).scrollLeft()-e.scrollSpeed):a(window).width()-(b.pageX-a(document).scrollLeft())<e.scrollSensitivity&&(f=a(document).scrollLeft(a(document).scrollLeft()+e.scrollSpeed))}f!==!1&&a.ui.ddmanager&&!e.dropBehaviour&&a.ui.ddmanager.prepareOffsets(d,b)}}),a.ui.plugin.add("draggable","snap",{start:function(b,c){var d=a(this).data("draggable"),e=d.options;d.snapElements=[],a(e.snap.constructor!=String?e.snap.items||":data(draggable)":e.snap).each(function(){var b=a(this),c=b.offset();this!=d.element[0]&&d.snapElements.push({item:this,width:b.outerWidth(),height:b.outerHeight(),top:c.top,left:c.left})})},drag:function(b,c){var d=a(this).data("draggable"),e=d.options,f=e.snapTolerance,g=c.offset.left,h=g+d.helperProportions.width,i=c.offset.top,j=i+d.helperProportions.height;for(var k=d.snapElements.length-1;k>=0;k--){var l=d.snapElements[k].left,m=l+d.snapElements[k].width,n=d.snapElements[k].top,o=n+d.snapElements[k].height;if(!(l-f<g&&g<m+f&&n-f<i&&i<o+f||l-f<g&&g<m+f&&n-f<j&&j<o+f||l-f<h&&h<m+f&&n-f<i&&i<o+f||l-f<h&&h<m+f&&n-f<j&&j<o+f)){d.snapElements[k].snapping&&d.options.snap.release&&d.options.snap.release.call(d.element,b,a.extend(d._uiHash(),{snapItem:d.snapElements[k].item})),d.snapElements[k].snapping=!1;continue}if(e.snapMode!="inner"){var p=Math.abs(n-j)<=f,q=Math.abs(o-i)<=f,r=Math.abs(l-h)<=f,s=Math.abs(m-g)<=f;p&&(c.position.top=d._convertPositionTo("relative",{top:n-d.helperProportions.height,left:0}).top-d.margins.top),q&&(c.position.top=d._convertPositionTo("relative",{top:o,left:0}).top-d.margins.top),r&&(c.position.left=d._convertPositionTo("relative",{top:0,left:l-d.helperProportions.width}).left-d.margins.left),s&&(c.position.left=d._convertPositionTo("relative",{top:0,left:m}).left-d.margins.left)}var t=p||q||r||s;if(e.snapMode!="outer"){var p=Math.abs(n-i)<=f,q=Math.abs(o-j)<=f,r=Math.abs(l-g)<=f,s=Math.abs(m-h)<=f;p&&(c.position.top=d._convertPositionTo("relative",{top:n,left:0}).top-d.margins.top),q&&(c.position.top=d._convertPositionTo("relative",{top:o-d.helperProportions.height,left:0}).top-d.margins.top),r&&(c.position.left=d._convertPositionTo("relative",{top:0,left:l}).left-d.margins.left),s&&(c.position.left=d._convertPositionTo("relative",{top:0,left:m-d.helperProportions.width}).left-d.margins.left)}!d.snapElements[k].snapping&&(p||q||r||s||t)&&d.options.snap.snap&&d.options.snap.snap.call(d.element,b,a.extend(d._uiHash(),{snapItem:d.snapElements[k].item})),d.snapElements[k].snapping=p||q||r||s||t}}}),a.ui.plugin.add("draggable","stack",{start:function(b,c){var d=a(this).data("draggable").options,e=a.makeArray(a(d.stack)).sort(function(b,c){return(parseInt(a(b).css("zIndex"),10)||0)-(parseInt(a(c).css("zIndex"),10)||0)});if(!e.length)return;var f=parseInt(e[0].style.zIndex)||0;a(e).each(function(a){this.style.zIndex=f+a}),this[0].style.zIndex=f+e.length}}),a.ui.plugin.add("draggable","zIndex",{start:function(b,c){var d=a(c.helper),e=a(this).data("draggable").options;d.css("zIndex")&&(e._zIndex=d.css("zIndex")),d.css("zIndex",e.zIndex)},stop:function(b,c){var d=a(this).data("draggable").options;d._zIndex&&a(c.helper).css("zIndex",d._zIndex)}})}(jQuery),function(a,b){a.widget("ui.droppable",{widgetEventPrefix:"drop",options:{accept:"*",activeClass:!1,addClasses:!0,greedy:!1,hoverClass:!1,scope:"default",tolerance:"intersect"},_create:function(){var b=this.options,c=b.accept;this.isover=0,this.isout=1,this.accept=a.isFunction(c)?c:function(a){return a.is(c)},this.proportions={width:this.element[0].offsetWidth,height:this.element[0].offsetHeight},a.ui.ddmanager.droppables[b.scope]=a.ui.ddmanager.droppables[b.scope]||[],a.ui.ddmanager.droppables[b.scope].push(this),b.addClasses&&this.element.addClass("ui-droppable")},destroy:function(){var b=a.ui.ddmanager.droppables[this.options.scope];for(var c=0;c<b.length;c++)b[c]==this&&b.splice(c,1);return this.element.removeClass("ui-droppable ui-droppable-disabled").removeData("droppable").unbind(".droppable"),this},_setOption:function(b,c){b=="accept"&&(this.accept=a.isFunction(c)?c:function(a){return a.is(c)}),a.Widget.prototype._setOption.apply(this,arguments)},_activate:function(b){var c=a.ui.ddmanager.current;this.options.activeClass&&this.element.addClass(this.options.activeClass),c&&this._trigger("activate",b,this.ui(c))},_deactivate:function(b){var c=a.ui.ddmanager.current;this.options.activeClass&&this.element.removeClass(this.options.activeClass),c&&this._trigger("deactivate",b,this.ui(c))},_over:function(b){var c=a.ui.ddmanager.current;if(!c||(c.currentItem||c.element)[0]==this.element[0])return;this.accept.call(this.element[0],c.currentItem||c.element)&&(this.options.hoverClass&&this.element.addClass(this.options.hoverClass),this._trigger("over",b,this.ui(c)))},_out:function(b){var c=a.ui.ddmanager.current;if(!c||(c.currentItem||c.element)[0]==this.element[0])return;this.accept.call(this.element[0],c.currentItem||c.element)&&(this.options.hoverClass&&this.element.removeClass(this.options.hoverClass),this._trigger("out",b,this.ui(c)))},_drop:function(b,c){var d=c||a.ui.ddmanager.current;if(!d||(d.currentItem||d.element)[0]==this.element[0])return!1;var e=!1;return this.element.find(":data(droppable)").not(".ui-draggable-dragging").each(function(){var b=a.data(this,"droppable");if(b.options.greedy&&!b.options.disabled&&b.options.scope==d.options.scope&&b.accept.call(b.element[0],d.currentItem||d.element)&&a.ui.intersect(d,a.extend(b,{offset:b.element.offset()}),b.options.tolerance))return e=!0,!1}),e?!1:this.accept.call(this.element[0],d.currentItem||d.element)?(this.options.activeClass&&this.element.removeClass(this.options.activeClass),this.options.hoverClass&&this.element.removeClass(this.options.hoverClass),this._trigger("drop",b,this.ui(d)),this.element):!1},ui:function(a){return{draggable:a.currentItem||a.element,helper:a.helper,position:a.position,offset:a.positionAbs}}}),a.extend(a.ui.droppable,{version:"1.8.23"}),a.ui.intersect=function(b,c,d){if(!c.offset)return!1;var e=(b.positionAbs||b.position.absolute).left,f=e+b.helperProportions.width,g=(b.positionAbs||b.position.absolute).top,h=g+b.helperProportions.height,i=c.offset.left,j=i+c.proportions.width,k=c.offset.top,l=k+c.proportions.height;switch(d){case"fit":return i<=e&&f<=j&&k<=g&&h<=l;case"intersect":return i<e+b.helperProportions.width/2&&f-b.helperProportions.width/2<j&&k<g+b.helperProportions.height/2&&h-b.helperProportions.height/2<l;case"pointer":var m=(b.positionAbs||b.position.absolute).left+(b.clickOffset||b.offset.click).left,n=(b.positionAbs||b.position.absolute).top+(b.clickOffset||b.offset.click).top,o=a.ui.isOver(n,m,k,i,c.proportions.height,c.proportions.width);return o;case"touch":return(g>=k&&g<=l||h>=k&&h<=l||g<k&&h>l)&&(e>=i&&e<=j||f>=i&&f<=j||e<i&&f>j);default:return!1}},a.ui.ddmanager={current:null,droppables:{"default":[]},prepareOffsets:function(b,c){var d=a.ui.ddmanager.droppables[b.options.scope]||[],e=c?c.type:null,f=(b.currentItem||b.element).find(":data(droppable)").andSelf();g:for(var h=0;h<d.length;h++){if(d[h].options.disabled||b&&!d[h].accept.call(d[h].element[0],b.currentItem||b.element))continue;for(var i=0;i<f.length;i++)if(f[i]==d[h].element[0]){d[h].proportions.height=0;continue g}d[h].visible=d[h].element.css("display")!="none";if(!d[h].visible)continue;e=="mousedown"&&d[h]._activate.call(d[h],c),d[h].offset=d[h].element.offset(),d[h].proportions={width:d[h].element[0].offsetWidth,height:d[h].element[0].offsetHeight}}},drop:function(b,c){var d=!1;return a.each(a.ui.ddmanager.droppables[b.options.scope]||[],function(){if(!this.options)return;!this.options.disabled&&this.visible&&a.ui.intersect(b,this,this.options.tolerance)&&(d=this._drop.call(this,c)||d),!this.options.disabled&&this.visible&&this.accept.call(this.element[0],b.currentItem||b.element)&&(this.isout=1,this.isover=0,this._deactivate.call(this,c))}),d},dragStart:function(b,c){b.element.parents(":not(body,html)").bind("scroll.droppable",function(){b.options.refreshPositions||a.ui.ddmanager.prepareOffsets(b,c)})},drag:function(b,c){b.options.refreshPositions&&a.ui.ddmanager.prepareOffsets(b,c),a.each(a.ui.ddmanager.droppables[b.options.scope]||[],function(){if(this.options.disabled||this.greedyChild||!this.visible)return;var d=a.ui.intersect(b,this,this.options.tolerance),e=!d&&this.isover==1?"isout":d&&this.isover==0?"isover":null;if(!e)return;var f;if(this.options.greedy){var g=this.element.parents(":data(droppable):eq(0)");g.length&&(f=a.data(g[0],"droppable"),f.greedyChild=e=="isover"?1:0)}f&&e=="isover"&&(f.isover=0,f.isout=1,f._out.call(f,c)),this[e]=1,this[e=="isout"?"isover":"isout"]=0,this[e=="isover"?"_over":"_out"].call(this,c),f&&e=="isout"&&(f.isout=0,f.isover=1,f._over.call(f,c))})},dragStop:function(b,c){b.element.parents(":not(body,html)").unbind("scroll.droppable"),b.options.refreshPositions||a.ui.ddmanager.prepareOffsets(b,c)}}}(jQuery),function(a,b){a.widget("ui.resizable",a.ui.mouse,{widgetEventPrefix:"resize",options:{alsoResize:!1,animate:!1,animateDuration:"slow",animateEasing:"swing",aspectRatio:!1,autoHide:!1,containment:!1,ghost:!1,grid:!1,handles:"e,s,se",helper:!1,maxHeight:null,maxWidth:null,minHeight:10,minWidth:10,zIndex:1e3},_create:function(){var b=this,c=this.options;this.element.addClass("ui-resizable"),a.extend(this,{_aspectRatio:!!c.aspectRatio,aspectRatio:c.aspectRatio,originalElement:this.element,_proportionallyResizeElements:[],_helper:c.helper||c.ghost||c.animate?c.helper||"ui-resizable-helper":null}),this.element[0].nodeName.match(/canvas|textarea|input|select|button|img/i)&&(this.element.wrap(a('<div class="ui-wrapper" style="overflow: hidden;"></div>').css({position:this.element.css("position"),width:this.element.outerWidth(),height:this.element.outerHeight(),top:this.element.css("top"),left:this.element.css("left")})),this.element=this.element.parent().data("resizable",this.element.data("resizable")),this.elementIsWrapper=!0,this.element.css({marginLeft:this.originalElement.css("marginLeft"),marginTop:this.originalElement.css("marginTop"),marginRight:this.originalElement.css("marginRight"),marginBottom:this.originalElement.css("marginBottom")}),this.originalElement.css({marginLeft:0,marginTop:0,marginRight:0,marginBottom:0}),this.originalResizeStyle=this.originalElement.css("resize"),this.originalElement.css("resize","none"),this._proportionallyResizeElements.push(this.originalElement.css({position:"static",zoom:1,display:"block"})),this.originalElement.css({margin:this.originalElement.css("margin")}),this._proportionallyResize()),this.handles=c.handles||(a(".ui-resizable-handle",this.element).length?{n:".ui-resizable-n",e:".ui-resizable-e",s:".ui-resizable-s",w:".ui-resizable-w",se:".ui-resizable-se",sw:".ui-resizable-sw",ne:".ui-resizable-ne",nw:".ui-resizable-nw"}:"e,s,se");if(this.handles.constructor==String){this.handles=="all"&&(this.handles="n,e,s,w,se,sw,ne,nw");var d=this.handles.split(",");this.handles={};for(var e=0;e<d.length;e++){var f=a.trim(d[e]),g="ui-resizable-"+f,h=a('<div class="ui-resizable-handle '+g+'"></div>');h.css({zIndex:c.zIndex}),"se"==f&&h.addClass("ui-icon ui-icon-gripsmall-diagonal-se"),this.handles[f]=".ui-resizable-"+f,this.element.append(h)}}this._renderAxis=function(b){b=b||this.element;for(var c in this.handles){this.handles[c].constructor==String&&(this.handles[c]=a(this.handles[c],this.element).show());if(this.elementIsWrapper&&this.originalElement[0].nodeName.match(/textarea|input|select|button/i)){var d=a(this.handles[c],this.element),e=0;e=/sw|ne|nw|se|n|s/.test(c)?d.outerHeight():d.outerWidth();var f=["padding",/ne|nw|n/.test(c)?"Top":/se|sw|s/.test(c)?"Bottom":/^e$/.test(c)?"Right":"Left"].join("");b.css(f,e),this._proportionallyResize()}if(!a(this.handles[c]).length)continue}},this._renderAxis(this.element),this._handles=a(".ui-resizable-handle",this.element).disableSelection(),this._handles.mouseover(function(){if(!b.resizing){if(this.className)var a=this.className.match(/ui-resizable-(se|sw|ne|nw|n|e|s|w)/i);b.axis=a&&a[1]?a[1]:"se"}}),c.autoHide&&(this._handles.hide(),a(this.element).addClass("ui-resizable-autohide").hover(function(){if(c.disabled)return;a(this).removeClass("ui-resizable-autohide"),b._handles.show()},function(){if(c.disabled)return;b.resizing||(a(this).addClass("ui-resizable-autohide"),b._handles.hide())})),this._mouseInit()},destroy:function(){this._mouseDestroy();var b=function(b){a(b).removeClass("ui-resizable ui-resizable-disabled ui-resizable-resizing").removeData("resizable").unbind(".resizable").find(".ui-resizable-handle").remove()};if(this.elementIsWrapper){b(this.element);var c=this.element;c.after(this.originalElement.css({position:c.css("position"),width:c.outerWidth(),height:c.outerHeight(),top:c.css("top"),left:c.css("left")})).remove()}return this.originalElement.css("resize",this.originalResizeStyle),b(this.originalElement),this},_mouseCapture:function(b){var c=!1;for(var d in this.handles)a(this.handles[d])[0]==b.target&&(c=!0);return!this.options.disabled&&c},_mouseStart:function(b){var d=this.options,e=this.element.position(),f=this.element;this.resizing=!0,this.documentScroll={top:a(document).scrollTop(),left:a(document).scrollLeft()},(f.is(".ui-draggable")||/absolute/.test(f.css("position")))&&f.css({position:"absolute",top:e.top,left:e.left}),this._renderProxy();var g=c(this.helper.css("left")),h=c(this.helper.css("top"));d.containment&&(g+=a(d.containment).scrollLeft()||0,h+=a(d.containment).scrollTop()||0),this.offset=this.helper.offset(),this.position={left:g,top:h},this.size=this._helper?{width:f.outerWidth(),height:f.outerHeight()}:{width:f.width(),height:f.height()},this.originalSize=this._helper?{width:f.outerWidth(),height:f.outerHeight()}:{width:f.width(),height:f.height()},this.originalPosition={left:g,top:h},this.sizeDiff={width:f.outerWidth()-f.width(),height:f.outerHeight()-f.height()},this.originalMousePosition={left:b.pageX,top:b.pageY},this.aspectRatio=typeof d.aspectRatio=="number"?d.aspectRatio:this.originalSize.width/this.originalSize.height||1;var i=a(".ui-resizable-"+this.axis).css("cursor");return a("body").css("cursor",i=="auto"?this.axis+"-resize":i),f.addClass("ui-resizable-resizing"),this._propagate("start",b),!0},_mouseDrag:function(b){var c=this.helper,d=this.options,e={},f=this,g=this.originalMousePosition,h=this.axis,i=b.pageX-g.left||0,j=b.pageY-g.top||0,k=this._change[h];if(!k)return!1;var l=k.apply(this,[b,i,j]),m=a.browser.msie&&a.browser.version<7,n=this.sizeDiff;this._updateVirtualBoundaries(b.shiftKey);if(this._aspectRatio||b.shiftKey)l=this._updateRatio(l,b);return l=this._respectSize(l,b),this._propagate("resize",b),c.css({top:this.position.top+"px",left:this.position.left+"px",width:this.size.width+"px",height:this.size.height+"px"}),!this._helper&&this._proportionallyResizeElements.length&&this._proportionallyResize(),this._updateCache(l),this._trigger("resize",b,this.ui()),!1},_mouseStop:function(b){this.resizing=!1;var c=this.options,d=this;if(this._helper){var e=this._proportionallyResizeElements,f=e.length&&/textarea/i.test(e[0].nodeName),g=f&&a.ui.hasScroll(e[0],"left")?0:d.sizeDiff.height,h=f?0:d.sizeDiff.width,i={width:d.helper.width()-h,height:d.helper.height()-g},j=parseInt(d.element.css("left"),10)+(d.position.left-d.originalPosition.left)||null,k=parseInt(d.element.css("top"),10)+(d.position.top-d.originalPosition.top)||null;c.animate||this.element.css(a.extend(i,{top:k,left:j})),d.helper.height(d.size.height),d.helper.width(d.size.width),this._helper&&!c.animate&&this._proportionallyResize()}return a("body").css("cursor","auto"),this.element.removeClass("ui-resizable-resizing"),this._propagate("stop",b),this._helper&&this.helper.remove(),!1},_updateVirtualBoundaries:function(a){var b=this.options,c,e,f,g,h;h={minWidth:d(b.minWidth)?b.minWidth:0,maxWidth:d(b.maxWidth)?b.maxWidth:Infinity,minHeight:d(b.minHeight)?b.minHeight:0,maxHeight:d(b.maxHeight)?b.maxHeight:Infinity};if(this._aspectRatio||a)c=h.minHeight*this.aspectRatio,f=h.minWidth/this.aspectRatio,e=h.maxHeight*this.aspectRatio,g=h.maxWidth/this.aspectRatio,c>h.minWidth&&(h.minWidth=c),f>h.minHeight&&(h.minHeight=f),e<h.maxWidth&&(h.maxWidth=e),g<h.maxHeight&&(h.maxHeight=g);this._vBoundaries=h},_updateCache:function(a){var b=this.options;this.offset=this.helper.offset(),d(a.left)&&(this.position.left=a.left),d(a.top)&&(this.position.top=a.top),d(a.height)&&(this.size.height=a.height),d(a.width)&&(this.size.width=a.width)},_updateRatio:function(a,b){var c=this.options,e=this.position,f=this.size,g=this.axis;return d(a.height)?a.width=a.height*this.aspectRatio:d(a.width)&&(a.height=a.width/this.aspectRatio),g=="sw"&&(a.left=e.left+(f.width-a.width),a.top=null),g=="nw"&&(a.top=e.top+(f.height-a.height),a.left=e.left+(f.width-a.width)),a},_respectSize:function(a,b){var c=this.helper,e=this._vBoundaries,f=this._aspectRatio||b.shiftKey,g=this.axis,h=d(a.width)&&e.maxWidth&&e.maxWidth<a.width,i=d(a.height)&&e.maxHeight&&e.maxHeight<a.height,j=d(a.width)&&e.minWidth&&e.minWidth>a.width,k=d(a.height)&&e.minHeight&&e.minHeight>a.height;j&&(a.width=e.minWidth),k&&(a.height=e.minHeight),h&&(a.width=e.maxWidth),i&&(a.height=e.maxHeight);var l=this.originalPosition.left+this.originalSize.width,m=this.position.top+this.size.height,n=/sw|nw|w/.test(g),o=/nw|ne|n/.test(g);j&&n&&(a.left=l-e.minWidth),h&&n&&(a.left=l-e.maxWidth),k&&o&&(a.top=m-e.minHeight),i&&o&&(a.top=m-e.maxHeight);var p=!a.width&&!a.height;return p&&!a.left&&a.top?a.top=null:p&&!a.top&&a.left&&(a.left=null),a},_proportionallyResize:function(){var b=this.options;if(!this._proportionallyResizeElements.length)return;var c=this.helper||this.element;for(var d=0;d<this._proportionallyResizeElements.length;d++){var e=this._proportionallyResizeElements[d];if(!this.borderDif){var f=[e.css("borderTopWidth"),e.css("borderRightWidth"),e.css("borderBottomWidth"),e.css("borderLeftWidth")],g=[e.css("paddingTop"),e.css("paddingRight"),e.css("paddingBottom"),e.css("paddingLeft")];this.borderDif=a.map(f,function(a,b){var c=parseInt(a,10)||0,d=parseInt(g[b],10)||0;return c+d})}if(!a.browser.msie||!a(c).is(":hidden")&&!a(c).parents(":hidden").length)e.css({height:c.height()-this.borderDif[0]-this.borderDif[2]||0,width:c.width()-this.borderDif[1]-this.borderDif[3]||0});else continue}},_renderProxy:function(){var b=this.element,c=this.options;this.elementOffset=b.offset();if(this._helper){this.helper=this.helper||a('<div style="overflow:hidden;"></div>');var d=a.browser.msie&&a.browser.version<7,e=d?1:0,f=d?2:-1;this.helper.addClass(this._helper).css({width:this.element.outerWidth()+f,height:this.element.outerHeight()+f,position:"absolute",left:this.elementOffset.left-e+"px",top:this.elementOffset.top-e+"px",zIndex:++c.zIndex}),this.helper.appendTo("body").disableSelection()}else this.helper=this.element},_change:{e:function(a,b,c){return{width:this.originalSize.width+b}},w:function(a,b,c){var d=this.options,e=this.originalSize,f=this.originalPosition;return{left:f.left+b,width:e.width-b}},n:function(a,b,c){var d=this.options,e=this.originalSize,f=this.originalPosition;return{top:f.top+c,height:e.height-c}},s:function(a,b,c){return{height:this.originalSize.height+c}},se:function(b,c,d){return a.extend(this._change.s.apply(this,arguments),this._change.e.apply(this,[b,c,d]))},sw:function(b,c,d){return a.extend(this._change.s.apply(this,arguments),this._change.w.apply(this,[b,c,d]))},ne:function(b,c,d){return a.extend(this._change.n.apply(this,arguments),this._change.e.apply(this,[b,c,d]))},nw:function(b,c,d){return a.extend(this._change.n.apply(this,arguments),this._change.w.apply(this,[b,c,d]))}},_propagate:function(b,c){a.ui.plugin.call(this,b,[c,this.ui()]),b!="resize"&&this._trigger(b,c,this.ui())},plugins:{},ui:function(){return{originalElement:this.originalElement,element:this.element,helper:this.helper,position:this.position,size:this.size,originalSize:this.originalSize,originalPosition:this.originalPosition}}}),a.extend(a.ui.resizable,{version:"1.8.23"}),a.ui.plugin.add("resizable","alsoResize",{start:function(b,c){var d=a(this).data("resizable"),e=d.options,f=function(b){a(b).each(function(){var b=a(this);b.data("resizable-alsoresize",{width:parseInt(b.width(),10),height:parseInt(b.height(),10),left:parseInt(b.css("left"),10),top:parseInt(b.css("top"),10)})})};typeof e.alsoResize=="object"&&!e.alsoResize.parentNode?e.alsoResize.length?(e.alsoResize=e.alsoResize[0],f(e.alsoResize)):a.each(e.alsoResize,function(a){f(a)}):f(e.alsoResize)},resize:function(b,c){var d=a(this).data("resizable"),e=d.options,f=d.originalSize,g=d.originalPosition,h={height:d.size.height-f.height||0,width:d.size.width-f.width||0,top:d.position.top-g.top||0,left:d.position.left-g.left||0},i=function(b,d){a(b).each(function(){var b=a(this),e=a(this).data("resizable-alsoresize"),f={},g=d&&d.length?d:b.parents(c.originalElement[0]).length?["width","height"]:["width","height","top","left"];a.each(g,function(a,b){var c=(e[b]||0)+(h[b]||0);c&&c>=0&&(f[b]=c||null)}),b.css(f)})};typeof e.alsoResize=="object"&&!e.alsoResize.nodeType?a.each(e.alsoResize,function(a,b){i(a,b)}):i(e.alsoResize)},stop:function(b,c){a(this).removeData("resizable-alsoresize")}}),a.ui.plugin.add("resizable","animate",{stop:function(b,c){var d=a(this).data("resizable"),e=d.options,f=d._proportionallyResizeElements,g=f.length&&/textarea/i.test(f[0].nodeName),h=g&&a.ui.hasScroll(f[0],"left")?0:d.sizeDiff.height,i=g?0:d.sizeDiff.width,j={width:d.size.width-i,height:d.size.height-h},k=parseInt(d.element.css("left"),10)+(d.position.left-d.originalPosition.left)||null,l=parseInt(d.element.css("top"),10)+(d.position.top-d.originalPosition.top)||null;d.element.animate(a.extend(j,l&&k?{top:l,left:k}:{}),{duration:e.animateDuration,easing:e.animateEasing,step:function(){var c={width:parseInt(d.element.css("width"),10),height:parseInt(d.element.css("height"),10),top:parseInt(d.element.css("top"),10),left:parseInt(d.element.css("left"),10)};f&&f.length&&a(f[0]).css({width:c.width,height:c.height}),d._updateCache(c),d._propagate("resize",b)}})}}),a.ui.plugin.add("resizable","containment",{start:function(b,d){var e=a(this).data("resizable"),f=e.options,g=e.element,h=f.containment,i=h instanceof a?h.get(0):/parent/.test(h)?g.parent().get(0):h;if(!i)return;e.containerElement=a(i);if(/document/.test(h)||h==document)e.containerOffset={left:0,top:0},e.containerPosition={left:0,top:0},e.parentData={element:a(document),left:0,top:0,width:a(document).width(),height:a(document).height()||document.body.parentNode.scrollHeight};else{var j=a(i),k=[];a(["Top","Right","Left","Bottom"]).each(function(a,b){k[a]=c(j.css("padding"+b))}),e.containerOffset=j.offset(),e.containerPosition=j.position(),e.containerSize={height:j.innerHeight()-k[3],width:j.innerWidth()-k[1]};var l=e.containerOffset,m=e.containerSize.height,n=e.containerSize.width,o=a.ui.hasScroll(i,"left")?i.scrollWidth:n,p=a.ui.hasScroll(i)?i.scrollHeight:m;e.parentData={element:i,left:l.left,top:l.top,width:o,height:p}}},resize:function(b,c){var d=a(this).data("resizable"),e=d.options,f=d.containerSize,g=d.containerOffset,h=d.size,i=d.position,j=d._aspectRatio||b.shiftKey,k={top:0,left:0},l=d.containerElement;l[0]!=document&&/static/.test(l.css("position"))&&(k=g),i.left<(d._helper?g.left:0)&&(d.size.width=d.size.width+(d._helper?d.position.left-g.left:d.position.left-k.left),j&&(d.size.height=d.size.width/d.aspectRatio),d.position.left=e.helper?g.left:0),i.top<(d._helper?g.top:0)&&(d.size.height=d.size.height+(d._helper?d.position.top-g.top:d.position.top),j&&(d.size.width=d.size.height*d.aspectRatio),d.position.top=d._helper?g.top:0),d.offset.left=d.parentData.left+d.position.left,d.offset.top=d.parentData.top+d.position.top;var m=Math.abs((d._helper?d.offset.left-k.left:d.offset.left-k.left)+d.sizeDiff.width),n=Math.abs((d._helper?d.offset.top-k.top:d.offset.top-g.top)+d.sizeDiff.height),o=d.containerElement.get(0)==d.element.parent().get(0),p=/relative|absolute/.test(d.containerElement.css("position"));o&&p&&(m-=d.parentData.left),m+d.size.width>=d.parentData.width&&(d.size.width=d.parentData.width-m,j&&(d.size.height=d.size.width/d.aspectRatio)),n+d.size.height>=d.parentData.height&&(d.size.height=d.parentData.height-n,j&&(d.size.width=d.size.height*d.aspectRatio))},stop:function(b,c){var d=a(this).data("resizable"),e=d.options,f=d.position,g=d.containerOffset,h=d.containerPosition,i=d.containerElement,j=a(d.helper),k=j.offset(),l=j.outerWidth()-d.sizeDiff.width,m=j.outerHeight()-d.sizeDiff.height;d._helper&&!e.animate&&/relative/.test(i.css("position"))&&a(this).css({left:k.left-h.left-g.left,width:l,height:m}),d._helper&&!e.animate&&/static/.test(i.css("position"))&&a(this).css({left:k.left-h.left-g.left,width:l,height:m})}}),a.ui.plugin.add("resizable","ghost",{start:function(b,c){var d=a(this).data("resizable"),e=d.options,f=d.size;d.ghost=d.originalElement.clone(),d.ghost.css({opacity:.25,display:"block",position:"relative",height:f.height,width:f.width,margin:0,left:0,top:0}).addClass("ui-resizable-ghost").addClass(typeof e.ghost=="string"?e.ghost:""),d.ghost.appendTo(d.helper)},resize:function(b,c){var d=a(this).data("resizable"),e=d.options;d.ghost&&d.ghost.css({position:"relative",height:d.size.height,width:d.size.width})},stop:function(b,c){var d=a(this).data("resizable"),e=d.options;d.ghost&&d.helper&&d.helper.get(0).removeChild(d.ghost.get(0))}}),a.ui.plugin.add("resizable","grid",{resize:function(b,c){var d=a(this).data("resizable"),e=d.options,f=d.size,g=d.originalSize,h=d.originalPosition,i=d.axis,j=e._aspectRatio||b.shiftKey;e.grid=typeof e.grid=="number"?[e.grid,e.grid]:e.grid;var k=Math.round((f.width-g.width)/(e.grid[0]||1))*(e.grid[0]||1),l=Math.round((f.height-g.height)/(e.grid[1]||1))*(e.grid[1]||1);/^(se|s|e)$/.test(i)?(d.size.width=g.width+k,d.size.height=g.height+l):/^(ne)$/.test(i)?(d.size.width=g.width+k,d.size.height=g.height+l,d.position.top=h.top-l):/^(sw)$/.test(i)?(d.size.width=g.width+k,d.size.height=g.height+l,d.position.left=h.left-k):(d.size.width=g.width+k,d.size.height=g.height+l,d.position.top=h.top-l,d.position.left=h.left-k)}});var c=function(a){return parseInt(a,10)||0},d=function(a){return!isNaN(parseInt(a,10))}}(jQuery),function(a,b){a.widget("ui.selectable",a.ui.mouse,{options:{appendTo:"body",autoRefresh:!0,distance:0,filter:"*",tolerance:"touch"},_create:function(){var b=this;this.element.addClass("ui-selectable"),this.dragged=!1;var c;this.refresh=function(){c=a(b.options.filter,b.element[0]),c.addClass("ui-selectee"),c.each(function(){var b=a(this),c=b.offset();a.data(this,"selectable-item",{element:this,$element:b,left:c.left,top:c.top,right:c.left+b.outerWidth(),bottom:c.top+b.outerHeight(),startselected:!1,selected:b.hasClass("ui-selected"),selecting:b.hasClass("ui-selecting"),unselecting:b.hasClass("ui-unselecting")})})},this.refresh(),this.selectees=c.addClass("ui-selectee"),this._mouseInit(),this.helper=a("<div class='ui-selectable-helper'></div>")},destroy:function(){return this.selectees.removeClass("ui-selectee").removeData("selectable-item"),this.element.removeClass("ui-selectable ui-selectable-disabled").removeData("selectable").unbind(".selectable"),this._mouseDestroy(),this},_mouseStart:function(b){var c=this;this.opos=[b.pageX,b.pageY];if(this.options.disabled)return;var d=this.options;this.selectees=a(d.filter,this.element[0]),this._trigger("start",b),a(d.appendTo).append(this.helper),this.helper.css({left:b.clientX,top:b.clientY,width:0,height:0}),d.autoRefresh&&this.refresh(),this.selectees.filter(".ui-selected").each(function(){var d=a.data(this,"selectable-item");d.startselected=!0,!b.metaKey&&!b.ctrlKey&&(d.$element.removeClass("ui-selected"),d.selected=!1,d.$element.addClass("ui-unselecting"),d.unselecting=!0,c._trigger("unselecting",b,{unselecting:d.element}))}),a(b.target).parents().andSelf().each(function(){var d=a.data(this,"selectable-item");if(d){var e=!b.metaKey&&!b.ctrlKey||!d.$element.hasClass("ui-selected");return d.$element.removeClass(e?"ui-unselecting":"ui-selected").addClass(e?"ui-selecting":"ui-unselecting"),d.unselecting=!e,d.selecting=e,d.selected=e,e?c._trigger("selecting",b,{selecting:d.element}):c._trigger("unselecting",b,{unselecting:d.element}),!1}})},_mouseDrag:function(b){var c=this;this.dragged=!0;if(this.options.disabled)return;var d=this.options,e=this.opos[0],f=this.opos[1],g=b.pageX,h=b.pageY;if(e>g){var i=g;g=e,e=i}if(f>h){var i=h;h=f,f=i}return this.helper.css({left:e,top:f,width:g-e,height:h-f}),this.selectees.each(function(){var i=a.data(this,"selectable-item");if(!i||i.element==c.element[0])return;var j=!1;d.tolerance=="touch"?j=!(i.left>g||i.right<e||i.top>h||i.bottom<f):d.tolerance=="fit"&&(j=i.left>e&&i.right<g&&i.top>f&&i.bottom<h),j?(i.selected&&(i.$element.removeClass("ui-selected"),i.selected=!1),i.unselecting&&(i.$element.removeClass("ui-unselecting"),i.unselecting=!1),i.selecting||(i.$element.addClass("ui-selecting"),i.selecting=!0,c._trigger("selecting",b,{selecting:i.element}))):(i.selecting&&((b.metaKey||b.ctrlKey)&&i.startselected?(i.$element.removeClass("ui-selecting"),i.selecting=!1,i.$element.addClass("ui-selected"),i.selected=!0):(i.$element.removeClass("ui-selecting"),i.selecting=!1,i.startselected&&(i.$element.addClass("ui-unselecting"),i.unselecting=!0),c._trigger("unselecting",b,{unselecting:i.element}))),i.selected&&!b.metaKey&&!b.ctrlKey&&!i.startselected&&(i.$element.removeClass("ui-selected"),i.selected=!1,i.$element.addClass("ui-unselecting"),i.unselecting=!0,c._trigger("unselecting",b,{unselecting:i.element})))}),!1},_mouseStop:function(b){var c=this;this.dragged=!1;var d=this.options;return a(".ui-unselecting",this.element[0]).each(function(){var d=a.data(this,"selectable-item");d.$element.removeClass("ui-unselecting"),d.unselecting=!1,d.startselected=!1,c._trigger("unselected",b,{unselected:d.element})}),a(".ui-selecting",this.element[0]).each(function(){var d=a.data(this,"selectable-item");d.$element.removeClass("ui-selecting").addClass("ui-selected"),d.selecting=!1,d.selected=!0,d.startselected=!0,c._trigger("selected",b,{selected:d.element})}),this._trigger("stop",b),this.helper.remove(),!1}}),a.extend(a.ui.selectable,{version:"1.8.23"})}(jQuery),function(a,b){a.widget("ui.sortable",a.ui.mouse,{widgetEventPrefix:"sort",ready:!1,options:{appendTo:"parent",axis:!1,connectWith:!1,containment:!1,cursor:"auto",cursorAt:!1,dropOnEmpty:!0,forcePlaceholderSize:!1,forceHelperSize:!1,grid:!1,handle:!1,helper:"original",items:"> *",opacity:!1,placeholder:!1,revert:!1,scroll:!0,scrollSensitivity:20,scrollSpeed:20,scope:"default",tolerance:"intersect",zIndex:1e3},_create:function(){var a=this.options;this.containerCache={},this.element.addClass("ui-sortable"),this.refresh(),this.floating=this.items.length?a.axis==="x"||/left|right/.test(this.items[0].item.css("float"))||/inline|table-cell/.test(this.items[0].item.css("display")):!1,this.offset=this.element.offset(),this._mouseInit(),this.ready=!0},destroy:function(){a.Widget.prototype.destroy.call(this),this.element.removeClass("ui-sortable ui-sortable-disabled"),this._mouseDestroy();for(var b=this.items.length-1;b>=0;b--)this.items[b].item.removeData(this.widgetName+"-item");return this},_setOption:function(b,c){b==="disabled"?(this.options[b]=c,this.widget()[c?"addClass":"removeClass"]("ui-sortable-disabled")):a.Widget.prototype._setOption.apply(this,arguments)},_mouseCapture:function(b,c){var d=this;if(this.reverting)return!1;if(this.options.disabled||this.options.type=="static")return!1;this._refreshItems(b);var e=null,f=this,g=a(b.target).parents().each(function(){if(a.data(this,d.widgetName+"-item")==f)return e=a(this),!1});a.data(b.target,d.widgetName+"-item")==f&&(e=a(b.target));if(!e)return!1;if(this.options.handle&&!c){var h=!1;a(this.options.handle,e).find("*").andSelf().each(function(){this==b.target&&(h=!0)});if(!h)return!1}return this.currentItem=e,this._removeCurrentsFromItems(),!0},_mouseStart:function(b,c,d){var e=this.options,f=this;this.currentContainer=this,this.refreshPositions(),this.helper=this._createHelper(b),this._cacheHelperProportions(),this._cacheMargins(),this.scrollParent=this.helper.scrollParent(),this.offset=this.currentItem.offset(),this.offset={top:this.offset.top-this.margins.top,left:this.offset.left-this.margins.left},a.extend(this.offset,{click:{left:b.pageX-this.offset.left,top:b.pageY-this.offset.top},parent:this._getParentOffset(),relative:this._getRelativeOffset()}),this.helper.css("position","absolute"),this.cssPosition=this.helper.css("position"),this.originalPosition=this._generatePosition(b),this.originalPageX=b.pageX,this.originalPageY=b.pageY,e.cursorAt&&this._adjustOffsetFromHelper(e.cursorAt),this.domPosition={prev:this.currentItem.prev()[0],parent:this.currentItem.parent()[0]},this.helper[0]!=this.currentItem[0]&&this.currentItem.hide(),this._createPlaceholder(),e.containment&&this._setContainment(),e.cursor&&(a("body").css("cursor")&&(this._storedCursor=a("body").css("cursor")),a("body").css("cursor",e.cursor)),e.opacity&&(this.helper.css("opacity")&&(this._storedOpacity=this.helper.css("opacity")),this.helper.css("opacity",e.opacity)),e.zIndex&&(this.helper.css("zIndex")&&(this._storedZIndex=this.helper.css("zIndex")),this.helper.css("zIndex",e.zIndex)),this.scrollParent[0]!=document&&this.scrollParent[0].tagName!="HTML"&&(this.overflowOffset=this.scrollParent.offset()),this._trigger("start",b,this._uiHash()),this._preserveHelperProportions||this._cacheHelperProportions();if(!d)for(var g=this.containers.length-1;g>=0;g--)this.containers[g]._trigger("activate",b,f._uiHash(this));return a.ui.ddmanager&&(a.ui.ddmanager.current=this),a.ui.ddmanager&&!e.dropBehaviour&&a.ui.ddmanager.prepareOffsets(this,b),this.dragging=!0,this.helper.addClass("ui-sortable-helper"),this._mouseDrag(b),!0},_mouseDrag:function(b){this.position=this._generatePosition(b),this.positionAbs=this._convertPositionTo("absolute"),this.lastPositionAbs||(this.lastPositionAbs=this.positionAbs);if(this.options.scroll){var c=this.options,d=!1;this.scrollParent[0]!=document&&this.scrollParent[0].tagName!="HTML"?(this.overflowOffset.top+this.scrollParent[0].offsetHeight-b.pageY<c.scrollSensitivity?this.scrollParent[0].scrollTop=d=this.scrollParent[0].scrollTop+c.scrollSpeed:b.pageY-this.overflowOffset.top<c.scrollSensitivity&&(this.scrollParent[0].scrollTop=d=this.scrollParent[0].scrollTop-c.scrollSpeed),this.overflowOffset.left+this.scrollParent[0].offsetWidth-b.pageX<c.scrollSensitivity?this.scrollParent[0].scrollLeft=d=this.scrollParent[0].scrollLeft+c.scrollSpeed:b.pageX-this.overflowOffset.left<c.scrollSensitivity&&(this.scrollParent[0].scrollLeft=d=this.scrollParent[0].scrollLeft-c.scrollSpeed)):(b.pageY-a(document).scrollTop()<c.scrollSensitivity?d=a(document).scrollTop(a(document).scrollTop()-c.scrollSpeed):a(window).height()-(b.pageY-a(document).scrollTop())<c.scrollSensitivity&&(d=a(document).scrollTop(a(document).scrollTop()+c.scrollSpeed)),b.pageX-a(document).scrollLeft()<c.scrollSensitivity?d=a(document).scrollLeft(a(document).scrollLeft()-c.scrollSpeed):a(window).width()-(b.pageX-a(document).scrollLeft())<c.scrollSensitivity&&(d=a(document).scrollLeft(a(document).scrollLeft()+c.scrollSpeed))),d!==!1&&a.ui.ddmanager&&!c.dropBehaviour&&a.ui.ddmanager.prepareOffsets(this,b)}this.positionAbs=this._convertPositionTo("absolute");if(!this.options.axis||this.options.axis!="y")this.helper[0].style.left=this.position.left+"px";if(!this.options.axis||this.options.axis!="x")this.helper[0].style.top=this.position.top+"px";for(var e=this.items.length-1;e>=0;e--){var f=this.items[e],g=f.item[0],h=this._intersectsWithPointer(f);if(!h)continue;if(g!=this.currentItem[0]&&this.placeholder[h==1?"next":"prev"]()[0]!=g&&!a.ui.contains(this.placeholder[0],g)&&(this.options.type=="semi-dynamic"?!a.ui.contains(this.element[0],g):!0)){this.direction=h==1?"down":"up";if(this.options.tolerance=="pointer"||this._intersectsWithSides(f))this._rearrange(b,f);else break;this._trigger("change",b,this._uiHash());break}}return this._contactContainers(b),a.ui.ddmanager&&a.ui.ddmanager.drag(this,b),this._trigger("sort",b,this._uiHash()),this.lastPositionAbs=this.positionAbs,!1},_mouseStop:function(b,c){if(!b)return;a.ui.ddmanager&&!this.options.dropBehaviour&&a.ui.ddmanager.drop(this,b);if(this.options.revert){var d=this,e=d.placeholder.offset();d.reverting=!0,a(this.helper).animate({left:e.left-this.offset.parent.left-d.margins.left+(this.offsetParent[0]==document.body?0:this.offsetParent[0].scrollLeft),top:e.top-this.offset.parent.top-d.margins.top+(this.offsetParent[0]==document.body?0:this.offsetParent[0].scrollTop)},parseInt(this.options.revert,10)||500,function(){d._clear(b)})}else this._clear(b,c);return!1},cancel:function(){var b=this;if(this.dragging){this._mouseUp({target:null}),this.options.helper=="original"?this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper"):this.currentItem.show();for(var c=this.containers.length-1;c>=0;c--)this.containers[c]._trigger("deactivate",null,b._uiHash(this)),this.containers[c].containerCache.over&&(this.containers[c]._trigger("out",null,b._uiHash(this)),this.containers[c].containerCache.over=0)}return this.placeholder&&(this.placeholder[0].parentNode&&this.placeholder[0].parentNode.removeChild(this.placeholder[0]),this.options.helper!="original"&&this.helper&&this.helper[0].parentNode&&this.helper.remove(),a.extend(this,{helper:null,dragging:!1,reverting:!1,_noFinalSort:null}),this.domPosition.prev?a(this.domPosition.prev).after(this.currentItem):a(this.domPosition.parent).prepend(this.currentItem)),this},serialize:function(b){var c=this._getItemsAsjQuery(b&&b.connected),d=[];return b=b||{},a(c).each(function(){var c=(a(b.item||this).attr(b.attribute||"id")||"").match(b.expression||/(.+)[-=_](.+)/);c&&d.push((b.key||c[1]+"[]")+"="+(b.key&&b.expression?c[1]:c[2]))}),!d.length&&b.key&&d.push(b.key+"="),d.join("&")},toArray:function(b){var c=this._getItemsAsjQuery(b&&b.connected),d=[];return b=b||{},c.each(function(){d.push(a(b.item||this).attr(b.attribute||"id")||"")}),d},_intersectsWith:function(a){var b=this.positionAbs.left,c=b+this.helperProportions.width,d=this.positionAbs.top,e=d+this.helperProportions.height,f=a.left,g=f+a.width,h=a.top,i=h+a.height,j=this.offset.click.top,k=this.offset.click.left,l=d+j>h&&d+j<i&&b+k>f&&b+k<g;return this.options.tolerance=="pointer"||this.options.forcePointerForContainers||this.options.tolerance!="pointer"&&this.helperProportions[this.floating?"width":"height"]>a[this.floating?"width":"height"]?l:f<b+this.helperProportions.width/2&&c-this.helperProportions.width/2<g&&h<d+this.helperProportions.height/2&&e-this.helperProportions.height/2<i},_intersectsWithPointer:function(b){var c=this.options.axis==="x"||a.ui.isOverAxis(this.positionAbs.top+this.offset.click.top,b.top,b.height),d=this.options.axis==="y"||a.ui.isOverAxis(this.positionAbs.left+this.offset.click.left,b.left,b.width),e=c&&d,f=this._getDragVerticalDirection(),g=this._getDragHorizontalDirection();return e?this.floating?g&&g=="right"||f=="down"?2:1:f&&(f=="down"?2:1):!1},_intersectsWithSides:function(b){var c=a.ui.isOverAxis(this.positionAbs.top+this.offset.click.top,b.top+b.height/2,b.height),d=a.ui.isOverAxis(this.positionAbs.left+this.offset.click.left,b.left+b.width/2,b.width),e=this._getDragVerticalDirection(),f=this._getDragHorizontalDirection();return this.floating&&f?f=="right"&&d||f=="left"&&!d:e&&(e=="down"&&c||e=="up"&&!c)},_getDragVerticalDirection:function(){var a=this.positionAbs.top-this.lastPositionAbs.top;return a!=0&&(a>0?"down":"up")},_getDragHorizontalDirection:function(){var a=this.positionAbs.left-this.lastPositionAbs.left;return a!=0&&(a>0?"right":"left")},refresh:function(a){return this._refreshItems(a),this.refreshPositions(),this},_connectWith:function(){var a=this.options;return a.connectWith.constructor==String?[a.connectWith]:a.connectWith},_getItemsAsjQuery:function(b){var c=this,d=[],e=[],f=this._connectWith();if(f&&b)for(var g=f.length-1;g>=0;g--){var h=a(f[g]);for(var i=h.length-1;i>=0;i--){var j=a.data(h[i],this.widgetName);j&&j!=this&&!j.options.disabled&&e.push([a.isFunction(j.options.items)?j.options.items.call(j.element):a(j.options.items,j.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),j])}}e.push([a.isFunction(this.options.items)?this.options.items.call(this.element,null,{options:this.options,item:this.currentItem}):a(this.options.items,this.element).not(".ui-sortable-helper").not(".ui-sortable-placeholder"),this]);for(var g=e.length-1;g>=0;g--)e[g][0].each(function(){d.push(this)});return a(d)},_removeCurrentsFromItems:function(){var a=this.currentItem.find(":data("+this.widgetName+"-item)");for(var b=0;b<this.items.length;b++)for(var c=0;c<a.length;c++)a[c]==this.items[b].item[0]&&this.items.splice(b,1)},_refreshItems:function(b){this.items=[],this.containers=[this];var c=this.items,d=this,e=[[a.isFunction(this.options.items)?this.options.items.call(this.element[0],b,{item:this.currentItem}):a(this.options.items,this.element),this]],f=this._connectWith();if(f&&this.ready)for(var g=f.length-1;g>=0;g--){var h=a(f[g]);for(var i=h.length-1;i>=0;i--){var j=a.data(h[i],this.widgetName);j&&j!=this&&!j.options.disabled&&(e.push([a.isFunction(j.options.items)?j.options.items.call(j.element[0],b,{item:this.currentItem}):a(j.options.items,j.element),j]),this.containers.push(j))}}for(var g=e.length-1;g>=0;g--){var k=e[g][1],l=e[g][0];for(var i=0,m=l.length;i<m;i++){var n=a(l[i]);n.data(this.widgetName+"-item",k),c.push({item:n,instance:k,width:0,height:0,left:0,top:0})}}},refreshPositions:function(b){this.offsetParent&&this.helper&&(this.offset.parent=this._getParentOffset());for(var c=this.items.length-1;c>=0;c--){var d=this.items[c];if(d.instance!=this.currentContainer&&this.currentContainer&&d.item[0]!=this.currentItem[0])continue;var e=this.options.toleranceElement?a(this.options.toleranceElement,d.item):d.item;b||(d.width=e.outerWidth(),d.height=e.outerHeight());var f=e.offset();d.left=f.left,d.top=f.top}if(this.options.custom&&this.options.custom.refreshContainers)this.options.custom.refreshContainers.call(this);else for(var c=this.containers.length-1;c>=0;c--){var f=this.containers[c].element.offset();this.containers[c].containerCache.left=f.left,this.containers[c].containerCache.top=f.top,this.containers[c].containerCache.width=this.containers[c].element.outerWidth(),this.containers[c].containerCache.height=this.containers[c].element.outerHeight()}return this},_createPlaceholder:function(b){var c=b||this,d=c.options;if(!d.placeholder||d.placeholder.constructor==String){var e=d.placeholder;d.placeholder={element:function(){var b=a(document.createElement(c.currentItem[0].nodeName)).addClass(e||c.currentItem[0].className+" ui-sortable-placeholder").removeClass("ui-sortable-helper")[0];return e||(b.style.visibility="hidden"),b},update:function(a,b){if(e&&!d.forcePlaceholderSize)return;b.height()||b.height(c.currentItem.innerHeight()-parseInt(c.currentItem.css("paddingTop")||0,10)-parseInt(c.currentItem.css("paddingBottom")||0,10)),b.width()||b.width(c.currentItem.innerWidth()-parseInt(c.currentItem.css("paddingLeft")||0,10)-parseInt(c.currentItem.css("paddingRight")||0,10))}}}c.placeholder=a(d.placeholder.element.call(c.element,c.currentItem)),c.currentItem.after(c.placeholder),d.placeholder.update(c,c.placeholder)},_contactContainers:function(b){var c=null,d=null;for(var e=this.containers.length-1;e>=0;e--){if(a.ui.contains(this.currentItem[0],this.containers[e].element[0]))continue;if(this._intersectsWith(this.containers[e].containerCache)){if(c&&a.ui.contains(this.containers[e].element[0],c.element[0]))continue;c=this.containers[e],d=e}else this.containers[e].containerCache.over&&(this.containers[e]._trigger("out",b,this._uiHash(this)),this.containers[e].containerCache.over=0)}if(!c)return;if(this.containers.length===1)this.containers[d]._trigger("over",b,this._uiHash(this)),this.containers[d].containerCache.over=1;else if(this.currentContainer!=this.containers[d]){var f=1e4,g=null,h=this.positionAbs[this.containers[d].floating?"left":"top"];for(var i=this.items.length-1;i>=0;i--){if(!a.ui.contains(this.containers[d].element[0],this.items[i].item[0]))continue;var j=this.containers[d].floating?this.items[i].item.offset().left:this.items[i].item.offset().top;Math.abs(j-h)<f&&(f=Math.abs(j-h),g=this.items[i],this.direction=j-h>0?"down":"up")}if(!g&&!this.options.dropOnEmpty)return;this.currentContainer=this.containers[d],g?this._rearrange(b,g,null,!0):this._rearrange(b,null,this.containers[d].element,!0),this._trigger("change",b,this._uiHash()),this.containers[d]._trigger("change",b,this._uiHash(this)),this.options.placeholder.update(this.currentContainer,this.placeholder),this.containers[d]._trigger("over",b,this._uiHash(this)),this.containers[d].containerCache.over=1}},_createHelper:function(b){var c=this.options,d=a.isFunction(c.helper)?a(c.helper.apply(this.element[0],[b,this.currentItem])):c.helper=="clone"?this.currentItem.clone():this.currentItem;return d.parents("body").length||a(c.appendTo!="parent"?c.appendTo:this.currentItem[0].parentNode)[0].appendChild(d[0]),d[0]==this.currentItem[0]&&(this._storedCSS={width:this.currentItem[0].style.width,height:this.currentItem[0].style.height,position:this.currentItem.css("position"),top:this.currentItem.css("top"),left:this.currentItem.css("left")}),(d[0].style.width==""||c.forceHelperSize)&&d.width(this.currentItem.width()),(d[0].style.height==""||c.forceHelperSize)&&d.height(this.currentItem.height()),d},_adjustOffsetFromHelper:function(b){typeof b=="string"&&(b=b.split(" ")),a.isArray(b)&&(b={left:+b[0],top:+b[1]||0}),"left"in b&&(this.offset.click.left=b.left+this.margins.left),"right"in b&&(this.offset.click.left=this.helperProportions.width-b.right+this.margins.left),"top"in b&&(this.offset.click.top=b.top+this.margins.top),"bottom"in b&&(this.offset.click.top=this.helperProportions.height-b.bottom+this.margins.top)},_getParentOffset:function(){this.offsetParent=this.helper.offsetParent();var b=this.offsetParent.offset();this.cssPosition=="absolute"&&this.scrollParent[0]!=document&&a.ui.contains(this.scrollParent[0],this.offsetParent[0])&&(b.left+=this.scrollParent.scrollLeft(),b.top+=this.scrollParent.scrollTop());if(this.offsetParent[0]==document.body||this.offsetParent[0].tagName&&this.offsetParent[0].tagName.toLowerCase()=="html"&&a.browser.msie)b={top:0,left:0};return{top:b.top+(parseInt(this.offsetParent.css("borderTopWidth"),10)||0),left:b.left+(parseInt(this.offsetParent.css("borderLeftWidth"),10)||0)}},_getRelativeOffset:function(){if(this.cssPosition=="relative"){var a=this.currentItem.position();return{top:a.top-(parseInt(this.helper.css("top"),10)||0)+this.scrollParent.scrollTop(),left:a.left-(parseInt(this.helper.css("left"),10)||0)+this.scrollParent.scrollLeft()}}return{top:0,left:0}},_cacheMargins:function(){this.margins={left:parseInt(this.currentItem.css("marginLeft"),10)||0,top:parseInt(this.currentItem.css("marginTop"),10)||0}},_cacheHelperProportions:function(){this.helperProportions={width:this.helper.outerWidth(),height:this.helper.outerHeight()}},_setContainment:function(){var b=this.options;b.containment=="parent"&&(b.containment=this.helper[0].parentNode);if(b.containment=="document"||b.containment=="window")this.containment=[0-this.offset.relative.left-this.offset.parent.left,0-this.offset.relative.top-this.offset.parent.top,a(b.containment=="document"?document:window).width()-this.helperProportions.width-this.margins.left,(a(b.containment=="document"?document:window).height()||document.body.parentNode.scrollHeight)-this.helperProportions.height-this.margins.top];if(!/^(document|window|parent)$/.test(b.containment)){var c=a(b.containment)[0],d=a(b.containment).offset(),e=a(c).css("overflow")!="hidden";this.containment=[d.left+(parseInt(a(c).css("borderLeftWidth"),10)||0)+(parseInt(a(c).css("paddingLeft"),10)||0)-this.margins.left,d.top+(parseInt(a(c).css("borderTopWidth"),10)||0)+(parseInt(a(c).css("paddingTop"),10)||0)-this.margins.top,d.left+(e?Math.max(c.scrollWidth,c.offsetWidth):c.offsetWidth)-(parseInt(a(c).css("borderLeftWidth"),10)||0)-(parseInt(a(c).css("paddingRight"),10)||0)-this.helperProportions.width-this.margins.left,d.top+(e?Math.max(c.scrollHeight,c.offsetHeight):c.offsetHeight)-(parseInt(a(c).css("borderTopWidth"),10)||0)-(parseInt(a(c).css("paddingBottom"),10)||0)-this.helperProportions.height-this.margins.top]}},_convertPositionTo:function(b,c){c||(c=this.position);var d=b=="absolute"?1:-1,e=this.options,f=this.cssPosition=="absolute"&&(this.scrollParent[0]==document||!a.ui.contains(this.scrollParent[0],this.offsetParent[0]))?this.offsetParent:this.scrollParent,g=/(html|body)/i.test(f[0].tagName);return{top:c.top+this.offset.relative.top*d+this.offset.parent.top*d-(a.browser.safari&&this.cssPosition=="fixed"?0:(this.cssPosition=="fixed"?-this.scrollParent.scrollTop():g?0:f.scrollTop())*d),left:c.left+this.offset.relative.left*d+this.offset.parent.left*d-(a.browser.safari&&this.cssPosition=="fixed"?0:(this.cssPosition=="fixed"?-this.scrollParent.scrollLeft():g?0:f.scrollLeft())*d)}},_generatePosition:function(b){var c=this.options,d=this.cssPosition=="absolute"&&(this.scrollParent[0]==document||!a.ui.contains(this.scrollParent[0],this.offsetParent[0]))?this.offsetParent:this.scrollParent,e=/(html|body)/i.test(d[0].tagName);this.cssPosition=="relative"&&(this.scrollParent[0]==document||this.scrollParent[0]==this.offsetParent[0])&&(this.offset.relative=this._getRelativeOffset());var f=b.pageX,g=b.pageY;if(this.originalPosition){this.containment&&(b.pageX-this.offset.click.left<this.containment[0]&&(f=this.containment[0]+this.offset.click.left),b.pageY-this.offset.click.top<this.containment[1]&&(g=this.containment[1]+this.offset.click.top),b.pageX-this.offset.click.left>this.containment[2]&&(f=this.containment[2]+this.offset.click.left),b.pageY-this.offset.click.top>this.containment[3]&&(g=this.containment[3]+this.offset.click.top));if(c.grid){var h=this.originalPageY+Math.round((g-this.originalPageY)/c.grid[1])*c.grid[1];g=this.containment?h-this.offset.click.top<this.containment[1]||h-this.offset.click.top>this.containment[3]?h-this.offset.click.top<this.containment[1]?h+c.grid[1]:h-c.grid[1]:h:h;var i=this.originalPageX+Math.round((f-this.originalPageX)/c.grid[0])*c.grid[0];f=this.containment?i-this.offset.click.left<this.containment[0]||i-this.offset.click.left>this.containment[2]?i-this.offset.click.left<this.containment[0]?i+c.grid[0]:i-c.grid[0]:i:i}}return{top:g-this.offset.click.top-this.offset.relative.top-this.offset.parent.top+(a.browser.safari&&this.cssPosition=="fixed"?0:this.cssPosition=="fixed"?-this.scrollParent.scrollTop():e?0:d.scrollTop()),left:f-this.offset.click.left-this.offset.relative.left-this.offset.parent.left+(a.browser.safari&&this.cssPosition=="fixed"?0:this.cssPosition=="fixed"?-this.scrollParent.scrollLeft():e?0:d.scrollLeft())}},_rearrange:function(a,b,c,d){c?c[0].appendChild(this.placeholder[0]):b.item[0].parentNode.insertBefore(this.placeholder[0],this.direction=="down"?b.item[0]:b.item[0].nextSibling),this.counter=this.counter?++this.counter:1;var e=this,f=this.counter;window.setTimeout(function(){f==e.counter&&e.refreshPositions(!d)},0)},_clear:function(b,c){this.reverting=!1;var d=[],e=this;!this._noFinalSort&&this.currentItem.parent().length&&this.placeholder.before(this.currentItem),this._noFinalSort=null;if(this.helper[0]==this.currentItem[0]){for(var f in this._storedCSS)if(this._storedCSS[f]=="auto"||this._storedCSS[f]=="static")this._storedCSS[f]="";this.currentItem.css(this._storedCSS).removeClass("ui-sortable-helper")}else this.currentItem.show();this.fromOutside&&!c&&d.push(function(a){this._trigger("receive",a,this._uiHash(this.fromOutside))}),(this.fromOutside||this.domPosition.prev!=this.currentItem.prev().not(".ui-sortable-helper")[0]||this.domPosition.parent!=this.currentItem.parent()[0])&&!c&&d.push(function(a){this._trigger("update",a,this._uiHash())});if(!a.ui.contains(this.element[0],this.currentItem[0])){c||d.push(function(a){this._trigger("remove",a,this._uiHash())});for(var f=this.containers.length-1;f>=0;f--)a.ui.contains(this.containers[f].element[0],this.currentItem[0])&&!c&&(d.push(function(a){return function(b){a._trigger("receive",b,this._uiHash(this))}}.call(this,this.containers[f])),d.push(function(a){return function(b){a._trigger("update",b,this._uiHash(this))}}.call(this,this.containers[f])))}for(var f=this.containers.length-1;f>=0;f--)c||d.push(function(a){return function(b){a._trigger("deactivate",b,this._uiHash(this))}}.call(this,this.containers[f])),this.containers[f].containerCache.over&&(d.push(function(a){return function(b){a._trigger("out",b,this._uiHash(this))}}.call(this,this.containers[f])),this.containers[f].containerCache.over=0);this._storedCursor&&a("body").css("cursor",this._storedCursor),this._storedOpacity&&this.helper.css("opacity",this._storedOpacity),this._storedZIndex&&this.helper.css("zIndex",this._storedZIndex=="auto"?"":this._storedZIndex),this.dragging=!1;if(this.cancelHelperRemoval){if(!c){this._trigger("beforeStop",b,this._uiHash());for(var f=0;f<d.length;f++)d[f].call(this,b);this._trigger("stop",b,this._uiHash())}return this.fromOutside=!1,!1}c||this._trigger("beforeStop",b,this._uiHash()),this.placeholder[0].parentNode.removeChild(this.placeholder[0]),this.helper[0]!=this.currentItem[0]&&this.helper.remove(),this.helper=null;if(!c){for(var f=0;f<d.length;f++)d[f].call(this,b);this._trigger("stop",b,this._uiHash())}return this.fromOutside=!1,!0},_trigger:function(){a.Widget.prototype._trigger.apply(this,arguments)===!1&&this.cancel()},_uiHash:function(b){var c=b||this;return{helper:c.helper,placeholder:c.placeholder||a([]),position:c.position,originalPosition:c.originalPosition,offset:c.positionAbs,item:c.currentItem,sender:b?b.element:null}}}),a.extend(a.ui.sortable,{version:"1.8.23"})}(jQuery),jQuery.effects||function(a,b){function c(b){var c;return b&&b.constructor==Array&&b.length==3?b:(c=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(b))?[parseInt(c[1],10),parseInt(c[2],10),parseInt(c[3],10)]:(c=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(b))?[parseFloat(c[1])*2.55,parseFloat(c[2])*2.55,parseFloat(c[3])*2.55]:(c=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(b))?[parseInt(c[1],16),parseInt(c[2],16),parseInt(c[3],16)]:(c=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(b))?[parseInt(c[1]+c[1],16),parseInt(c[2]+c[2],16),parseInt(c[3]+c[3],16)]:(c=/rgba\(0, 0, 0, 0\)/.exec(b))?e.transparent:e[a.trim(b).toLowerCase()]}function d(b,d){var e;do{e=(a.curCSS||a.css)(b,d);if(e!=""&&e!="transparent"||a.nodeName(b,"body"))break;d="backgroundColor"}while(b=b.parentNode);return c(e)}function h(){var a=document.defaultView?document.defaultView.getComputedStyle(this,null):this.currentStyle,b={},c,d;if(a&&a.length&&a[0]&&a[a[0]]){var e=a.length;while(e--)c=a[e],typeof a[c]=="string"&&(d=c.replace(/\-(\w)/g,function(a,b){return b.toUpperCase()}),b[d]=a[c])}else for(c in a)typeof a[c]=="string"&&(b[c]=a[c]);return b}function i(b){var c,d;for(c in b)d=b[c],(d==null||a.isFunction(d)||c in g||/scrollbar/.test(c)||!/color/i.test(c)&&isNaN(parseFloat(d)))&&delete b[c];return b}function j(a,b){var c={_:0},d;for(d in b)a[d]!=b[d]&&(c[d]=b[d]);return c}function k(b,c,d,e){typeof b=="object"&&(e=c,d=null,c=b,b=c.effect),a.isFunction(c)&&(e=c,d=null,c={});if(typeof c=="number"||a.fx.speeds[c])e=d,d=c,c={};return a.isFunction(d)&&(e=d,d=null),c=c||{},d=d||c.duration,d=a.fx.off?0:typeof d=="number"?d:d in a.fx.speeds?a.fx.speeds[d]:a.fx.speeds._default,e=e||c.complete,[b,c,d,e]}function l(b){return!b||typeof b=="number"||a.fx.speeds[b]?!0:typeof b=="string"&&!a.effects[b]?!0:!1}a.effects={},a.each(["backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","borderColor","color","outlineColor"],function(b,e){a.fx.step[e]=function(a){a.colorInit||(a.start=d(a.elem,e),a.end=c(a.end),a.colorInit=!0),a.elem.style[e]="rgb("+Math.max(Math.min(parseInt(a.pos*(a.end[0]-a.start[0])+a.start[0],10),255),0)+","+Math.max(Math.min(parseInt(a.pos*(a.end[1]-a.start[1])+a.start[1],10),255),0)+","+Math.max(Math.min(parseInt(a.pos*(a.end[2]-a.start[2])+a.start[2],10),255),0)+")"}});var e={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0],transparent:[255,255,255]},f=["add","remove","toggle"],g={border:1,borderBottom:1,borderColor:1,borderLeft:1,borderRight:1,borderTop:1,borderWidth:1,margin:1,padding:1};a.effects.animateClass=function(b,c,d,e){return a.isFunction(d)&&(e=d,d=null),this.queue(function(){var g=a(this),k=g.attr("style")||" ",l=i(h.call(this)),m,n=g.attr("class")||"";a.each(f,function(a,c){b[c]&&g[c+"Class"](b[c])}),m=i(h.call(this)),g.attr("class",n),g.animate(j(l,m),{queue:!1,duration:c,easing:d,complete:function(){a.each(f,function(a,c){b[c]&&g[c+"Class"](b[c])}),typeof g.attr("style")=="object"?(g.attr("style").cssText="",g.attr("style").cssText=k):g.attr("style",k),e&&e.apply(this,arguments),a.dequeue(this)}})})},a.fn.extend({_addClass:a.fn.addClass,addClass:function(b,c,d,e){return c?a.effects.animateClass.apply(this,[{add:b},c,d,e]):this._addClass(b)},_removeClass:a.fn.removeClass,removeClass:function(b,c,d,e){return c?a.effects.animateClass.apply(this,[{remove:b},c,d,e]):this._removeClass(b)},_toggleClass:a.fn.toggleClass,toggleClass:function(c,d,e,f,g){return typeof d=="boolean"||d===b?e?a.effects.animateClass.apply(this,[d?{add:c}:{remove:c},e,f,g]):this._toggleClass(c,d):a.effects.animateClass.apply(this,[{toggle:c},d,e,f])},switchClass:function(b,c,d,e,f){return a.effects.animateClass.apply(this,[{add:c,remove:b},d,e,f])}}),a.extend(a.effects,{version:"1.8.23",save:function(a,b){for(var c=0;c<b.length;c++)b[c]!==null&&a.data("ec.storage."+b[c],a[0].style[b[c]])},restore:function(a,b){for(var c=0;c<b.length;c++)b[c]!==null&&a.css(b[c],a.data("ec.storage."+b[c]))},setMode:function(a,b){return b=="toggle"&&(b=a.is(":hidden")?"show":"hide"),b},getBaseline:function(a,b){var c,d;switch(a[0]){case"top":c=0;break;case"middle":c=.5;break;case"bottom":c=1;break;default:c=a[0]/b.height}switch(a[1]){case"left":d=0;break;case"center":d=.5;break;case"right":d=1;break;default:d=a[1]/b.width}return{x:d,y:c}},createWrapper:function(b){if(b.parent().is(".ui-effects-wrapper"))return b.parent();var c={width:b.outerWidth(!0),height:b.outerHeight(!0),"float":b.css("float")},d=a("<div></div>").addClass("ui-effects-wrapper").css({fontSize:"100%",background:"transparent",border:"none",margin:0,padding:0}),e=document.activeElement;try{e.id}catch(f){e=document.body}return b.wrap(d),(b[0]===e||a.contains(b[0],e))&&a(e).focus(),d=b.parent(),b.css("position")=="static"?(d.css({position:"relative"}),b.css({position:"relative"})):(a.extend(c,{position:b.css("position"),zIndex:b.css("z-index")}),a.each(["top","left","bottom","right"],function(a,d){c[d]=b.css(d),isNaN(parseInt(c[d],10))&&(c[d]="auto")}),b.css({position:"relative",top:0,left:0,right:"auto",bottom:"auto"})),d.css(c).show()},removeWrapper:function(b){var c,d=document.activeElement;return b.parent().is(".ui-effects-wrapper")?(c=b.parent().replaceWith(b),(b[0]===d||a.contains(b[0],d))&&a(d).focus(),c):b},setTransition:function(b,c,d,e){return e=e||{},a.each(c,function(a,c){var f=b.cssUnit(c);f[0]>0&&(e[c]=f[0]*d+f[1])}),e}}),a.fn.extend({effect:function(b,c,d,e){var f=k.apply(this,arguments),g={options:f[1],duration:f[2],callback:f[3]},h=g.options.mode,i=a.effects[b];return a.fx.off||!i?h?this[h](g.duration,g.callback):this.each(function(){g.callback&&g.callback.call(this)}):i.call(this,g)},_show:a.fn.show,show:function(a){if(l(a))return this._show.apply(this,arguments);var b=k.apply(this,arguments);return b[1].mode="show",this.effect.apply(this,b)},_hide:a.fn.hide,hide:function(a){if(l(a))return this._hide.apply(this,arguments);var b=k.apply(this,arguments);return b[1].mode="hide",this.effect.apply(this,b)},__toggle:a.fn.toggle,toggle:function(b){if(l(b)||typeof b=="boolean"||a.isFunction(b))return this.__toggle.apply(this,arguments);var c=k.apply(this,arguments);return c[1].mode="toggle",this.effect.apply(this,c)},cssUnit:function(b){var c=this.css(b),d=[];return a.each(["em","px","%","pt"],function(a,b){c.indexOf(b)>0&&(d=[parseFloat(c),b])}),d}});var m={};a.each(["Quad","Cubic","Quart","Quint","Expo"],function(a,b){m[b]=function(b){return Math.pow(b,a+2)}}),a.extend(m,{Sine:function(a){return 1-Math.cos(a*Math.PI/2)},Circ:function(a){return 1-Math.sqrt(1-a*a)},Elastic:function(a){return a===0||a===1?a:-Math.pow(2,8*(a-1))*Math.sin(((a-1)*80-7.5)*Math.PI/15)},Back:function(a){return a*a*(3*a-2)},Bounce:function(a){var b,c=4;while(a<((b=Math.pow(2,--c))-1)/11);return 1/Math.pow(4,3-c)-7.5625*Math.pow((b*3-2)/22-a,2)}}),a.each(m,function(b,c){a.easing["easeIn"+b]=c,a.easing["easeOut"+b]=function(a){return 1-c(1-a)},a.easing["easeInOut"+b]=function(a){return a<.5?c(a*2)/2:c(a*-2+2)/-2+1}})}(jQuery),function(a,b){a.effects.blind=function(b){return this.queue(function(){var c=a(this),d=["position","top","bottom","left","right"],e=a.effects.setMode(c,b.options.mode||"hide"),f=b.options.direction||"vertical";a.effects.save(c,d),c.show();var g=a.effects.createWrapper(c).css({overflow:"hidden"}),h=f=="vertical"?"height":"width",i=f=="vertical"?g.height():g.width();e=="show"&&g.css(h,0);var j={};j[h]=e=="show"?i:0,g.animate(j,b.duration,b.options.easing,function(){e=="hide"&&c.hide(),a.effects.restore(c,d),a.effects.removeWrapper(c),b.callback&&b.callback.apply(c[0],arguments),c.dequeue()})})}}(jQuery),function(a,b){a.effects.bounce=function(b){return this.queue(function(){var c=a(this),d=["position","top","bottom","left","right"],e=a.effects.setMode(c,b.options.mode||"effect"),f=b.options.direction||"up",g=b.options.distance||20,h=b.options.times||5,i=b.duration||250;/show|hide/.test(e)&&d.push("opacity"),a.effects.save(c,d),c.show(),a.effects.createWrapper(c);var j=f=="up"||f=="down"?"top":"left",k=f=="up"||f=="left"?"pos":"neg",g=b.options.distance||(j=="top"?c.outerHeight(!0)/3:c.outerWidth(!0)/3);e=="show"&&c.css("opacity",0).css(j,k=="pos"?-g:g),e=="hide"&&(g=g/(h*2)),e!="hide"&&h--;if(e=="show"){var l={opacity:1};l[j]=(k=="pos"?"+=":"-=")+g,c.animate(l,i/2,b.options.easing),g=g/2,h--}for(var m=0;m<h;m++){var n={},p={};n[j]=(k=="pos"?"-=":"+=")+g,p[j]=(k=="pos"?"+=":"-=")+g,c.animate(n,i/2,b.options.easing).animate(p,i/2,b.options.easing),g=e=="hide"?g*2:g/2}if(e=="hide"){var l={opacity:0};l[j]=(k=="pos"?"-=":"+=")+g,c.animate(l,i/2,b.options.easing,function(){c.hide(),a.effects.restore(c,d),a.effects.removeWrapper(c),b.callback&&b.callback.apply(this,arguments)})}else{var n={},p={};n[j]=(k=="pos"?"-=":"+=")+g,p[j]=(k=="pos"?"+=":"-=")+g,c.animate(n,i/2,b.options.easing).animate(p,i/2,b.options.easing,function(){a.effects.restore(c,d),a.effects.removeWrapper(c),b.callback&&b.callback.apply(this,arguments)})}c.queue("fx",function(){c.dequeue()}),c.dequeue()})}}(jQuery),function(a,b){a.effects.clip=function(b){return this.queue(function(){var c=a(this),d=["position","top","bottom","left","right","height","width"],e=a.effects.setMode(c,b.options.mode||"hide"),f=b.options.direction||"vertical";a.effects.save(c,d),c.show();var g=a.effects.createWrapper(c).css({overflow:"hidden"}),h=c[0].tagName=="IMG"?g:c,i={size:f=="vertical"?"height":"width",position:f=="vertical"?"top":"left"},j=f=="vertical"?h.height():h.width();e=="show"&&(h.css(i.size,0),h.css(i.position,j/2));var k={};k[i.size]=e=="show"?j:0,k[i.position]=e=="show"?0:j/2,h.animate(k,{queue:!1,duration:b.duration,easing:b.options.easing,complete:function(){e=="hide"&&c.hide(),a.effects.restore(c,d),a.effects.removeWrapper(c),b.callback&&b.callback.apply(c[0],arguments),c.dequeue()}})})}}(jQuery),function(a,b){a.effects.drop=function(b){return this.queue(function(){var c=a(this),d=["position","top","bottom","left","right","opacity"],e=a.effects.setMode(c,b.options.mode||"hide"),f=b.options.direction||"left";a.effects.save(c,d),c.show(),a.effects.createWrapper(c);var g=f=="up"||f=="down"?"top":"left",h=f=="up"||f=="left"?"pos":"neg",i=b.options.distance||(g=="top"?c.outerHeight(!0)/2:c.outerWidth(!0)/2);e=="show"&&c.css("opacity",0).css(g,h=="pos"?-i:i);var j={opacity:e=="show"?1:0};j[g]=(e=="show"?h=="pos"?"+=":"-=":h=="pos"?"-=":"+=")+i,c.animate(j,{queue:!1,duration:b.duration,easing:b.options.easing,complete:function(){e=="hide"&&c.hide(),a.effects.restore(c,d),a.effects.removeWrapper(c),b.callback&&b.callback.apply(this,arguments),c.dequeue()}})})}}(jQuery),function(a,b){a.effects.explode=function(b){return this.queue(function(){var c=b.options.pieces?Math.round(Math.sqrt(b.options.pieces)):3,d=b.options.pieces?Math.round(Math.sqrt(b.options.pieces)):3;b.options.mode=b.options.mode=="toggle"?a(this).is(":visible")?"hide":"show":b.options.mode;var e=a(this).show().css("visibility","hidden"),f=e.offset();f.top-=parseInt(e.css("marginTop"),10)||0,f.left-=parseInt(e.css("marginLeft"),10)||0;var g=e.outerWidth(!0),h=e.outerHeight(!0);for(var i=0;i<c;i++)for(var j=0;j<d;j++)e.clone().appendTo("body").wrap("<div></div>").css({position:"absolute",visibility:"visible",left:-j*(g/d),top:-i*(h/c)}).parent().addClass("ui-effects-explode").css({position:"absolute",overflow:"hidden",width:g/d,height:h/c,left:f.left+j*(g/d)+(b.options.mode=="show"?(j-Math.floor(d/2))*(g/d):0),top:f.top+i*(h/c)+(b.options.mode=="show"?(i-Math.floor(c/2))*(h/c):0),opacity:b.options.mode=="show"?0:1}).animate({left:f.left+j*(g/d)+(b.options.mode=="show"?0:(j-Math.floor(d/2))*(g/d)),top:f.top+i*(h/c)+(b.options.mode=="show"?0:(i-Math.floor(c/2))*(h/c)),opacity:b.options.mode=="show"?1:0},b.duration||500);setTimeout(function(){b.options.mode=="show"?e.css({visibility:"visible"}):e.css({visibility:"visible"}).hide(),b.callback&&b.callback.apply(e[0]),e.dequeue(),a("div.ui-effects-explode").remove()},b.duration||500)})}}(jQuery),function(a,b){a.effects.fade=function(b){return this.queue(function(){var c=a(this),d=a.effects.setMode(c,b.options.mode||"hide");c.animate({opacity:d},{queue:!1,duration:b.duration,easing:b.options.easing,complete:function(){b.callback&&b.callback.apply(this,arguments),c.dequeue()}})})}}(jQuery),function(a,b){a.effects.fold=function(b){return this.queue(function(){var c=a(this),d=["position","top","bottom","left","right"],e=a.effects.setMode(c,b.options.mode||"hide"),f=b.options.size||15,g=!!b.options.horizFirst,h=b.duration?b.duration/2:a.fx.speeds._default/2;a.effects.save(c,d),c.show();var i=a.effects.createWrapper(c).css({overflow:"hidden"}),j=e=="show"!=g,k=j?["width","height"]:["height","width"],l=j?[i.width(),i.height()]:[i.height(),i.width()],m=/([0-9]+)%/.exec(f);m&&(f=parseInt(m[1],10)/100*l[e=="hide"?0:1]),e=="show"&&i.css(g?{height:0,width:f}:{height:f,width:0});var n={},p={};n[k[0]]=e=="show"?l[0]:f,p[k[1]]=e=="show"?l[1]:0,i.animate(n,h,b.options.easing).animate(p,h,b.options.easing,function(){e=="hide"&&c.hide(),a.effects.restore(c,d),a.effects.removeWrapper(c),b.callback&&b.callback.apply(c[0],arguments),c.dequeue()})})}}(jQuery),function(a,b){a.effects.highlight=function(b){return this.queue(function(){var c=a(this),d=["backgroundImage","backgroundColor","opacity"],e=a.effects.setMode(c,b.options.mode||"show"),f={backgroundColor:c.css("backgroundColor")};e=="hide"&&(f.opacity=0),a.effects.save(c,d),c.show().css({backgroundImage:"none",backgroundColor:b.options.color||"#ffff99"}).animate(f,{queue:!1,duration:b.duration,easing:b.options.easing,complete:function(){e=="hide"&&c.hide(),a.effects.restore(c,d),e=="show"&&!a.support.opacity&&this.style.removeAttribute("filter"),b.callback&&b.callback.apply(this,arguments),c.dequeue()}})})}}(jQuery),function(a,b){a.effects.pulsate=function(b){return this.queue(function(){var c=a(this),d=a.effects.setMode(c,b.options.mode||"show"),e=(b.options.times||5)*2-1,f=b.duration?b.duration/2:a.fx.speeds._default/2,g=c.is(":visible"),h=0;g||(c.css("opacity",0).show(),h=1),(d=="hide"&&g||d=="show"&&!g)&&e--;for(var i=0;i<e;i++)c.animate({opacity:h},f,b.options.easing),h=(h+1)%2;c.animate({opacity:h},f,b.options.easing,function(){h==0&&c.hide(),b.callback&&b.callback.apply(this,arguments)}),c.queue("fx",function(){c.dequeue()}).dequeue()})}}(jQuery),function(a,b){a.effects.puff=function(b){return this.queue(function(){var c=a(this),d=a.effects.setMode(c,b.options.mode||"hide"),e=parseInt(b.options.percent,10)||150,f=e/100,g={height:c.height(),width:c.width()};a.extend(b.options,{fade:!0,mode:d,percent:d=="hide"?e:100,from:d=="hide"?g:{height:g.height*f,width:g.width*f}}),c.effect("scale",b.options,b.duration,b.callback),c.dequeue()})},a.effects.scale=function(b){return this.queue(function(){var c=a(this),d=a.extend(!0,{},b.options),e=a.effects.setMode(c,b.options.mode||"effect"),f=parseInt(b.options.percent,10)||(parseInt(b.options.percent,10)==0?0:e=="hide"?0:100),g=b.options.direction||"both",h=b.options.origin;e!="effect"&&(d.origin=h||["middle","center"],d.restore=!0);var i={height:c.height(),width:c.width()};c.from=b.options.from||(e=="show"?{height:0,width:0}:i);var j={y:g!="horizontal"?f/100:1,x:g!="vertical"?f/100:1};c.to={height:i.height*j.y,width:i.width*j.x},b.options.fade&&(e=="show"&&(c.from.opacity=0,c.to.opacity=1),e=="hide"&&(c.from.opacity=1,c.to.opacity=0)),d.from=c.from,d.to=c.to,d.mode=e,c.effect("size",d,b.duration,b.callback),c.dequeue()})},a.effects.size=function(b){return this.queue(function(){var c=a(this),d=["position","top","bottom","left","right","width","height","overflow","opacity"],e=["position","top","bottom","left","right","overflow","opacity"],f=["width","height","overflow"],g=["fontSize"],h=["borderTopWidth","borderBottomWidth","paddingTop","paddingBottom"],i=["borderLeftWidth","borderRightWidth","paddingLeft","paddingRight"],j=a.effects.setMode(c,b.options.mode||"effect"),k=b.options.restore||!1,l=b.options.scale||"both",m=b.options.origin,n={height:c.height(),width:c.width()};c.from=b.options.from||n,c.to=b.options.to||n;if(m){var p=a.effects.getBaseline(m,n);c.from.top=(n.height-c.from.height)*p.y,c.from.left=(n.width-c.from.width)*p.x,c.to.top=(n.height-c.to.height)*p.y,c.to.left=(n.width-c.to.width)*p.x}var q={from:{y:c.from.height/n.height,x:c.from.width/n.width},to:{y:c.to.height/n.height,x:c.to.width/n.width}};if(l=="box"||l=="both")q.from.y!=q.to.y&&(d=d.concat(h),c.from=a.effects.setTransition(c,h,q.from.y,c.from),c.to=a.effects.setTransition(c,h,q.to.y,c.to)),q.from.x!=q.to.x&&(d=d.concat(i),c.from=a.effects.setTransition(c,i,q.from.x,c.from),c.to=a.effects.setTransition(c,i,q.to.x,c.to));(l=="content"||l=="both")&&q.from.y!=q.to.y&&(d=d.concat(g),c.from=a.effects.setTransition(c,g,q.from.y,c.from),c.to=a.effects.setTransition(c,g,q.to.y,c.to)),a.effects.save(c,k?d:e),c.show(),a.effects.createWrapper(c),c.css("overflow","hidden").css(c.from);if(l=="content"||l=="both")h=h.concat(["marginTop","marginBottom"]).concat(g),i=i.concat(["marginLeft","marginRight"]),f=d.concat(h).concat(i),c.find("*[width]").each(function(){var c=a(this);k&&a.effects.save(c,f);var d={height:c.height(),width:c.width()};c.from={height:d.height*q.from.y,width:d.width*q.from.x},c.to={height:d.height*q.to.y,width:d.width*q.to.x},q.from.y!=q.to.y&&(c.from=a.effects.setTransition(c,h,q.from.y,c.from),c.to=a.effects.setTransition(c,h,q.to.y,c.to)),q.from.x!=q.to.x&&(c.from=a.effects.setTransition(c,i,q.from.x,c.from),c.to=a.effects.setTransition(c,i,q.to.x,c.to)),c.css(c.from),c.animate(c.to,b.duration,b.options.easing,function(){k&&a.effects.restore(c,f)})});c.animate(c.to,{queue:!1,duration:b.duration,easing:b.options.easing,complete:function(){c.to.opacity===0&&c.css("opacity",c.from.opacity),j=="hide"&&c.hide(),a.effects.restore(c,k?d:e),a.effects.removeWrapper(c),b.callback&&b.callback.apply(this,arguments),c.dequeue()}})})}}(jQuery),function(a,b){a.effects.shake=function(b){return this.queue(function(){var c=a(this),d=["position","top","bottom","left","right"],e=a.effects.setMode(c,b.options.mode||"effect"),f=b.options.direction||"left",g=b.options.distance||20,h=b.options.times||3,i=b.duration||b.options.duration||140;a.effects.save(c,d),c.show(),a.effects.createWrapper(c);var j=f=="up"||f=="down"?"top":"left",k=f=="up"||f=="left"?"pos":"neg",l={},m={},n={};l[j]=(k=="pos"?"-=":"+=")+g,m[j]=(k=="pos"?"+=":"-=")+g*2,n[j]=(k=="pos"?"-=":"+=")+g*2,c.animate(l,i,b.options.easing);for(var p=1;p<h;p++)c.animate(m,i,b.options.easing).animate(n,i,b.options.easing);c.animate(m,i,b.options.easing).animate(l,i/2,b.options.easing,function(){a.effects.restore(c,d),a.effects.removeWrapper(c),b.callback&&b.callback.apply(this,arguments)}),c.queue("fx",function(){c.dequeue()}),c.dequeue()})}}(jQuery),function(a,b){a.effects.slide=function(b){return this.queue(function(){var c=a(this),d=["position","top","bottom","left","right"],e=a.effects.setMode(c,b.options.mode||"show"),f=b.options.direction||"left";a.effects.save(c,d),c.show(),a.effects.createWrapper(c).css({overflow:"hidden"});var g=f=="up"||f=="down"?"top":"left",h=f=="up"||f=="left"?"pos":"neg",i=b.options.distance||(g=="top"?c.outerHeight(!0):c.outerWidth(!0));e=="show"&&c.css(g,h=="pos"?isNaN(i)?"-"+i:-i:i);var j={};j[g]=(e=="show"?h=="pos"?"+=":"-=":h=="pos"?"-=":"+=")+i,c.animate(j,{queue:!1,duration:b.duration,easing:b.options.easing,complete:function(){e=="hide"&&c.hide(),a.effects.restore(c,d),a.effects.removeWrapper(c),b.callback&&b.callback.apply(this,arguments),c.dequeue()}})})}}(jQuery),function(a,b){a.effects.transfer=function(b){return this.queue(function(){var c=a(this),d=a(b.options.to),e=d.offset(),f={top:e.top,left:e.left,height:d.innerHeight(),width:d.innerWidth()},g=c.offset(),h=a('<div class="ui-effects-transfer"></div>').appendTo(document.body).addClass(b.options.className).css({top:g.top,left:g.left,height:c.innerHeight(),width:c.innerWidth(),position:"absolute"}).animate(f,b.duration,b.options.easing,function(){h.remove(),b.callback&&b.callback.apply(c[0],arguments),c.dequeue()})})}}(jQuery),function(a,b){a.widget("ui.accordion",{options:{active:0,animated:"slide",autoHeight:!0,clearStyle:!1,collapsible:!1,event:"click",fillSpace:!1,header:"> li > :first-child,> :not(li):even",icons:{header:"ui-icon-triangle-1-e",headerSelected:"ui-icon-triangle-1-s"},navigation:!1,navigationFilter:function(){return this.href.toLowerCase()===location.href.toLowerCase()}},_create:function(){var b=this,c=b.options;b.running=0,b.element.addClass("ui-accordion ui-widget ui-helper-reset").children("li").addClass("ui-accordion-li-fix"),b.headers=b.element.find(c.header).addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-all").bind("mouseenter.accordion",function(){if(c.disabled)return;a(this).addClass("ui-state-hover")}).bind("mouseleave.accordion",function(){if(c.disabled)return;a(this).removeClass("ui-state-hover")}).bind("focus.accordion",function(){if(c.disabled)return;a(this).addClass("ui-state-focus")}).bind("blur.accordion",function(){if(c.disabled)return;a(this).removeClass("ui-state-focus")}),b.headers.next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom");if(c.navigation){var d=b.element.find("a").filter(c.navigationFilter).eq(0);if(d.length){var e=d.closest(".ui-accordion-header");e.length?b.active=e:b.active=d.closest(".ui-accordion-content").prev()}}b.active=b._findActive(b.active||c.active).addClass("ui-state-default ui-state-active").toggleClass("ui-corner-all").toggleClass("ui-corner-top"),b.active.next().addClass("ui-accordion-content-active"),b._createIcons(),b.resize(),b.element.attr("role","tablist"),b.headers.attr("role","tab").bind("keydown.accordion",function(a){return b._keydown(a)}).next().attr("role","tabpanel"),b.headers.not(b.active||"").attr({"aria-expanded":"false","aria-selected":"false",tabIndex:-1}).next().hide(),b.active.length?b.active.attr({"aria-expanded":"true","aria-selected":"true",tabIndex:0}):b.headers.eq(0).attr("tabIndex",0),a.browser.safari||b.headers.find("a").attr("tabIndex",-1),c.event&&b.headers.bind(c.event.split(" ").join(".accordion ")+".accordion",function(a){b._clickHandler.call(b,a,this),a.preventDefault()})},_createIcons:function(){var b=this.options;b.icons&&(a("<span></span>").addClass("ui-icon "+b.icons.header).prependTo(this.headers),this.active.children(".ui-icon").toggleClass(b.icons.header).toggleClass(b.icons.headerSelected),this.element.addClass("ui-accordion-icons"))},_destroyIcons:function(){this.headers.children(".ui-icon").remove(),this.element.removeClass("ui-accordion-icons")},destroy:function(){var b=this.options;this.element.removeClass("ui-accordion ui-widget ui-helper-reset").removeAttr("role"),this.headers.unbind(".accordion").removeClass("ui-accordion-header ui-accordion-disabled ui-helper-reset ui-state-default ui-corner-all ui-state-active ui-state-disabled ui-corner-top").removeAttr("role").removeAttr("aria-expanded").removeAttr("aria-selected").removeAttr("tabIndex"),this.headers.find("a").removeAttr("tabIndex"),this._destroyIcons();var c=this.headers.next().css("display","").removeAttr("role").removeClass("ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content ui-accordion-content-active ui-accordion-disabled ui-state-disabled");return(b.autoHeight||b.fillHeight)&&c.css("height",""),a.Widget.prototype.destroy.call(this)},_setOption:function(b,c){a.Widget.prototype._setOption.apply(this,arguments),b=="active"&&this.activate(c),b=="icons"&&(this._destroyIcons(),c&&this._createIcons()),b=="disabled"&&this.headers.add(this.headers.next())[c?"addClass":"removeClass"]("ui-accordion-disabled ui-state-disabled")},_keydown:function(b){if(this.options.disabled||b.altKey||b.ctrlKey)return;var c=a.ui.keyCode,d=this.headers.length,e=this.headers.index(b.target),f=!1;switch(b.keyCode){case c.RIGHT:case c.DOWN:f=this.headers[(e+1)%d];break;case c.LEFT:case c.UP:f=this.headers[(e-1+d)%d];break;case c.SPACE:case c.ENTER:this._clickHandler({target:b.target},b.target),b.preventDefault()}return f?(a(b.target).attr("tabIndex",-1),a(f).attr("tabIndex",0),f.focus(),!1):!0},resize:function(){var b=this.options,c;if(b.fillSpace){if(a.browser.msie){var d=this.element.parent().css("overflow");this.element.parent().css("overflow","hidden")}c=this.element.parent().height(),a.browser.msie&&this.element.parent().css("overflow",d),this.headers.each(function(){c-=a(this).outerHeight(!0)}),this.headers.next().each(function(){a(this).height(Math.max(0,c-a(this).innerHeight()+a(this).height()))}).css("overflow","auto")}else b.autoHeight&&(c=0,this.headers.next().each(function(){c=Math.max(c,a(this).height("").height())}).height(c));return this},activate:function(a){this.options.active=a;var b=this._findActive(a)[0];return this._clickHandler({target:b},b),this},_findActive:function(b){return b?typeof b=="number"?this.headers.filter(":eq("+b+")"):this.headers.not(this.headers.not(b)):b===!1?a([]):this.headers.filter(":eq(0)")},_clickHandler:function(b,c){var d=this.options;if(d.disabled)return;if(!b.target){if(!d.collapsible)return;this.active.removeClass("ui-state-active ui-corner-top").addClass("ui-state-default ui-corner-all").children(".ui-icon").removeClass(d.icons.headerSelected).addClass(d.icons.header),this.active.next().addClass("ui-accordion-content-active");var e=this.active.next(),f={options:d,newHeader:a([]),oldHeader:d.active,newContent:a([]),oldContent:e},g=this.active=a([]);this._toggle(g,e,f);return}var h=a(b.currentTarget||c),i=h[0]===this.active[0];d.active=d.collapsible&&i?!1:this.headers.index(h);if(this.running||!d.collapsible&&i)return;var j=this.active,g=h.next(),e=this.active.next(),f={options:d,newHeader:i&&d.collapsible?a([]):h,oldHeader:this.active,newContent:i&&d.collapsible?a([]):g,oldContent:e},k=this.headers.index(this.active[0])>this.headers.index(h[0]);this.active=i?a([]):h,this._toggle(g,e,f,i,k),j.removeClass("ui-state-active ui-corner-top").addClass("ui-state-default ui-corner-all").children(".ui-icon").removeClass(d.icons.headerSelected).addClass(d.icons.header),i||(h.removeClass("ui-state-default ui-corner-all").addClass("ui-state-active ui-corner-top").children(".ui-icon").removeClass(d.icons.header).addClass(d.icons.headerSelected),h.next().addClass("ui-accordion-content-active"));return},_toggle:function(b,c,d,e,f){var g=this,h=g.options;g.toShow=b,g.toHide=c,g.data=d;var i=function(){if(!g)return;return g._completed.apply(g,arguments)};g._trigger("changestart",null,g.data),g.running=c.size()===0?b.size():c.size();if(h.animated){var j={};h.collapsible&&e?j={toShow:a([]),toHide:c,complete:i,down:f,autoHeight:h.autoHeight||h.fillSpace}:j={toShow:b,toHide:c,complete:i,down:f,autoHeight:h.autoHeight||h.fillSpace},h.proxied||(h.proxied=h.animated),h.proxiedDuration||(h.proxiedDuration=h.duration),h.animated=a.isFunction(h.proxied)?h.proxied(j):h.proxied,h.duration=a.isFunction(h.proxiedDuration)?h.proxiedDuration(j):h.proxiedDuration;var k=a.ui.accordion.animations,l=h.duration,m=h.animated;m&&!k[m]&&!a.easing[m]&&(m="slide"),k[m]||(k[m]=function(a){this.slide(a,{easing:m,duration:l||700})}),k[m](j)}else h.collapsible&&e?b.toggle():(c.hide(),b.show()),i(!0);c.prev().attr({"aria-expanded":"false","aria-selected":"false",tabIndex:-1}).blur(),b.prev().attr({"aria-expanded":"true","aria-selected":"true",tabIndex:0}).focus()},_completed:function(a){this.running=a?0:--this.running;if(this.running)return;this.options.clearStyle&&this.toShow.add(this.toHide).css({height:"",overflow:""}),this.toHide.removeClass("ui-accordion-content-active"),this.toHide.length&&(this.toHide.parent()[0].className=this.toHide.parent()[0].className),this._trigger("change",null,this.data)}}),a.extend(a.ui.accordion,{version:"1.8.23",animations:{slide:function(b,c){b=a.extend({easing:"swing",duration:300},b,c);if(!b.toHide.size()){b.toShow.animate({height:"show",paddingTop:"show",paddingBottom:"show"},b);return}if(!b.toShow.size()){b.toHide.animate({height:"hide",paddingTop:"hide",paddingBottom:"hide"},b);return}var d=b.toShow.css("overflow"),e=0,f={},g={},h=["height","paddingTop","paddingBottom"],i,j=b.toShow;i=j[0].style.width,j.width(j.parent().width()-parseFloat(j.css("paddingLeft"))-parseFloat(j.css("paddingRight"))-(parseFloat(j.css("borderLeftWidth"))||0)-(parseFloat(j.css("borderRightWidth"))||0)),a.each(h,function(c,d){g[d]="hide";var e=(""+a.css(b.toShow[0],d)).match(/^([\d+-.]+)(.*)$/);f[d]={value:e[1],unit:e[2]||"px"}}),b.toShow.css({height:0,overflow:"hidden"}).show(),b.toHide.filter(":hidden").each(b.complete).end().filter(":visible").animate(g,{step:function(a,c){c.prop=="height"&&(e=c.end-c.start===0?0:(c.now-c.start)/(c.end-c.start)),b.toShow[0].style[c.prop]=e*f[c.prop].value+f[c.prop].unit},duration:b.duration,easing:b.easing,complete:function(){b.autoHeight||b.toShow.css("height",""),b.toShow.css({width:i,overflow:d}),b.complete()}})},bounceslide:function(a){this.slide(a,{easing:a.down?"easeOutBounce":"swing",duration:a.down?1e3:200})}}})}(jQuery),function(a,b){var c=0;a.widget("ui.autocomplete",{options:{appendTo:"body",autoFocus:!1,delay:300,minLength:1,position:{my:"left top",at:"left bottom",collision:"none"},source:null},pending:0,_create:function(){var b=this,c=this.element[0].ownerDocument,d;this.isMultiLine=this.element.is("textarea"),this.element.addClass("ui-autocomplete-input").attr("autocomplete","off").attr({role:"textbox","aria-autocomplete":"list","aria-haspopup":"true"}).bind("keydown.autocomplete",function(c){if(b.options.disabled||b.element.propAttr("readOnly"))return;d=!1;var e=a.ui.keyCode;switch(c.keyCode){case e.PAGE_UP:b._move("previousPage",c);break;case e.PAGE_DOWN:b._move("nextPage",c);break;case e.UP:b._keyEvent("previous",c);break;case e.DOWN:b._keyEvent("next",c);break;case e.ENTER:case e.NUMPAD_ENTER:b.menu.active&&(d=!0,c.preventDefault());case e.TAB:if(!b.menu.active)return;b.menu.select(c);break;case e.ESCAPE:b.element.val(b.term),b.close(c);break;default:clearTimeout(b.searching),b.searching=setTimeout(function(){b.term!=b.element.val()&&(b.selectedItem=null,b.search(null,c))},b.options.delay)}}).bind("keypress.autocomplete",function(a){d&&(d=!1,a.preventDefault())}).bind("focus.autocomplete",function(){if(b.options.disabled)return;b.selectedItem=null,b.previous=b.element.val()}).bind("blur.autocomplete",function(a){if(b.options.disabled)return;clearTimeout(b.searching),b.closing=setTimeout(function(){b.close(a),b._change(a)},150)}),this._initSource(),this.menu=a("<ul></ul>").addClass("ui-autocomplete").appendTo(a(this.options.appendTo||"body",c)[0]).mousedown(function(c){var d=b.menu.element[0];a(c.target).closest(".ui-menu-item").length||setTimeout(function(){a(document).one("mousedown",function(c){c.target!==b.element[0]&&c.target!==d&&!a.ui.contains(d,c.target)&&b.close()})},1),setTimeout(function(){clearTimeout(b.closing)},13)}).menu({focus:function(a,c){var d=c.item.data("item.autocomplete");!1!==b._trigger("focus",a,{item:d})&&/^key/.test(a.originalEvent.type)&&b.element.val(d.value)},selected:function(a,d){var e=d.item.data("item.autocomplete"),f=b.previous;b.element[0]!==c.activeElement&&(b.element.focus(),b.previous=f,setTimeout(function(){b.previous=f,b.selectedItem=e},1)),!1!==b._trigger("select",a,{item:e})&&b.element.val(e.value),b.term=b.element.val(),b.close(a),b.selectedItem=e},blur:function(a,c){b.menu.element.is(":visible")&&b.element.val()!==b.term&&b.element.val(b.term)}}).zIndex(this.element.zIndex()+1).css({top:0,left:0}).hide().data("menu"),a.fn.bgiframe&&this.menu.element.bgiframe(),b.beforeunloadHandler=function(){b.element.removeAttr("autocomplete")},a(window).bind("beforeunload",b.beforeunloadHandler)},destroy:function(){this.element.removeClass("ui-autocomplete-input").removeAttr("autocomplete").removeAttr("role").removeAttr("aria-autocomplete").removeAttr("aria-haspopup"),this.menu.element.remove(),a(window).unbind("beforeunload",this.beforeunloadHandler),a.Widget.prototype.destroy.call(this)},_setOption:function(b,c){a.Widget.prototype._setOption.apply(this,arguments),b==="source"&&this._initSource(),b==="appendTo"&&this.menu.element.appendTo(a(c||"body",this.element[0].ownerDocument)[0]),b==="disabled"&&c&&this.xhr&&this.xhr.abort()},_initSource:function(){var b=this,c,d;a.isArray(this.options.source)?(c=this.options.source,this.source=function(b,d){d(a.ui.autocomplete.filter(c,b.term))}):typeof this.options.source=="string"?(d=this.options.source,this.source=function(c,e){b.xhr&&b.xhr.abort(),b.xhr=a.ajax({url:d,data:c,dataType:"json",success:function(a,b){e(a)},error:function(){e([])}})}):this.source=this.options.source},search:function(a,b){a=a!=null?a:this.element.val(),this.term=this.element.val();if(a.length<this.options.minLength)return this.close(b);clearTimeout(this.closing);if(this._trigger("search",b)===!1)return;return this._search(a)},_search:function(a){this.pending++,this.element.addClass("ui-autocomplete-loading"),this.source({term:a},this._response())},_response:function(){var a=this,b=++c;return function(d){b===c&&a.__response(d),a.pending--,a.pending||a.element.removeClass("ui-autocomplete-loading")}},__response:function(a){!this.options.disabled&&a&&a.length?(a=this._normalize(a),this._suggest(a),this._trigger("open")):this.close()},close:function(a){clearTimeout(this.closing),this.menu.element.is(":visible")&&(this.menu.element.hide(),this.menu.deactivate(),this._trigger("close",a))},_change:function(a){this.previous!==this.element.val()&&this._trigger("change",a,{item:this.selectedItem})},_normalize:function(b){return b.length&&b[0].label&&b[0].value?b:a.map(b,function(b){return typeof b=="string"?{label:b,value:b}:a.extend({label:b.label||b.value,value:b.value||b.label},b)})},_suggest:function(b){var c=this.menu.element.empty().zIndex(this.element.zIndex()+1);this._renderMenu(c,b),this.menu.deactivate(),this.menu.refresh(),c.show(),this._resizeMenu(),c.position(a.extend({of:this.element},this.options.position)),this.options.autoFocus&&this.menu.next(new a.Event("mouseover"))},_resizeMenu:function(){var a=this.menu.element;a.outerWidth(Math.max(a.width("").outerWidth()+1,this.element.outerWidth()))},_renderMenu:function(b,c){var d=this;a.each(c,function(a,c){d._renderItem(b,c)})},_renderItem:function(b,c){return a("<li></li>").data("item.autocomplete",c).append(a("<a></a>").text(c.label)).appendTo(b)},_move:function(a,b){if(!this.menu.element.is(":visible")){this.search(null,b);return}if(this.menu.first()&&/^previous/.test(a)||this.menu.last()&&/^next/.test(a)){this.element.val(this.term),this.menu.deactivate();return}this.menu[a](b)},widget:function(){return this.menu.element},_keyEvent:function(a,b){if(!this.isMultiLine||this.menu.element.is(":visible"))this._move(a,b),b.preventDefault()}}),a.extend(a.ui.autocomplete,{escapeRegex:function(a){return a.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&")},filter:function(b,c){var d=new RegExp(a.ui.autocomplete.escapeRegex(c),"i");return a.grep(b,function(a){return d.test(a.label||a.value||a)})}})}(jQuery),function(a){a.widget("ui.menu",{_create:function(){var b=this;this.element.addClass("ui-menu ui-widget ui-widget-content ui-corner-all").attr({role:"listbox","aria-activedescendant":"ui-active-menuitem"}).click(function(c){if(!a(c.target).closest(".ui-menu-item a").length)return;c.preventDefault(),b.select(c)}),this.refresh()},refresh:function(){var b=this,c=this.element.children("li:not(.ui-menu-item):has(a)").addClass("ui-menu-item").attr("role","menuitem");c.children("a").addClass("ui-corner-all").attr("tabindex",-1).mouseenter(function(c){b.activate(c,a(this).parent())}).mouseleave(function(){b.deactivate()})},activate:function(a,b){this.deactivate();if(this.hasScroll()){var c=b.offset().top-this.element.offset().top,d=this.element.scrollTop(),e=this.element.height();c<0?this.element.scrollTop(d+c):c>=e&&this.element.scrollTop(d+c-e+b.height())}this.active=b.eq(0).children("a").addClass("ui-state-hover").attr("id","ui-active-menuitem").end(),this._trigger("focus",a,{item:b})},deactivate:function(){if(!this.active)return;this.active.children("a").removeClass("ui-state-hover").removeAttr("id"),this._trigger("blur"),this.active=null},next:function(a){this.move("next",".ui-menu-item:first",a)},previous:function(a){this.move("prev",".ui-menu-item:last",a)},first:function(){return this.active&&!this.active.prevAll(".ui-menu-item").length},last:function(){return this.active&&!this.active.nextAll(".ui-menu-item").length},move:function(a,b,c){if(!this.active){this.activate(c,this.element.children(b));return}var d=this.active[a+"All"](".ui-menu-item").eq(0);d.length?this.activate(c,d):this.activate(c,this.element.children(b))},nextPage:function(b){if(this.hasScroll()){if(!this.active||this.last()){this.activate(b,this.element.children(".ui-menu-item:first"));return}var c=this.active.offset().top,d=this.element.height(),e=this.element.children(".ui-menu-item").filter(function(){var b=a(this).offset().top-c-d+a(this).height();return b<10&&b>-10});e.length||(e=this.element.children(".ui-menu-item:last")),this.activate(b,e)}else this.activate(b,this.element.children(".ui-menu-item").filter(!this.active||this.last()?":first":":last"))},previousPage:function(b){if(this.hasScroll()){if(!this.active||this.first()){this.activate(b,this.element.children(".ui-menu-item:last"));return}var c=this.active.offset().top,d=this.element.height(),e=this.element.children(".ui-menu-item").filter(function(){var b=a(this).offset().top-c+d-a(this).height();return b<10&&b>-10});e.length||(e=this.element.children(".ui-menu-item:first")),this.activate(b,e)}else this.activate(b,this.element.children(".ui-menu-item").filter(!this.active||this.first()?":last":":first"))},hasScroll:function(){return this.element.height()<this.element[a.fn.prop?"prop":"attr"]("scrollHeight")},select:function(a){this._trigger("selected",a,{item:this.active})}})}(jQuery),function(a,b){var c,d,e,f,g="ui-button ui-widget ui-state-default ui-corner-all",h="ui-state-hover ui-state-active ",i="ui-button-icons-only ui-button-icon-only ui-button-text-icons ui-button-text-icon-primary ui-button-text-icon-secondary ui-button-text-only",j=function(){var b=a(this).find(":ui-button");setTimeout(function(){b.button("refresh")},1)},k=function(b){var c=b.name,d=b.form,e=a([]);return c&&(d?e=a(d).find("[name='"+c+"']"):e=a("[name='"+c+"']",b.ownerDocument).filter(function(){return!this.form})),e};a.widget("ui.button",{options:{disabled:null,text:!0,label:null,icons:{primary:null,secondary:null}},_create:function(){this.element.closest("form").unbind("reset.button").bind("reset.button",j),typeof this.options.disabled!="boolean"?this.options.disabled=!!this.element.propAttr("disabled"):this.element.propAttr("disabled",this.options.disabled),this._determineButtonType(),this.hasTitle=!!this.buttonElement.attr("title");var b=this,h=this.options,i=this.type==="checkbox"||this.type==="radio",l="ui-state-hover"+(i?"":" ui-state-active"),m="ui-state-focus";h.label===null&&(h.label=this.buttonElement.html()),this.buttonElement.addClass(g).attr("role","button").bind("mouseenter.button",function(){if(h.disabled)return;a(this).addClass("ui-state-hover"),this===c&&a(this).addClass("ui-state-active")}).bind("mouseleave.button",function(){if(h.disabled)return;a(this).removeClass(l)}).bind("click.button",function(a){h.disabled&&(a.preventDefault(),a.stopImmediatePropagation())}),this.element.bind("focus.button",function(){b.buttonElement.addClass(m)}).bind("blur.button",function(){b.buttonElement.removeClass(m)}),i&&(this.element.bind("change.button",function(){if(f)return;b.refresh()}),this.buttonElement.bind("mousedown.button",function(a){if(h.disabled)return;f=!1,d=a.pageX,e=a.pageY}).bind("mouseup.button",function(a){if(h.disabled)return;if(d!==a.pageX||e!==a.pageY)f=!0})),this.type==="checkbox"?this.buttonElement.bind("click.button",function(){if(h.disabled||f)return!1;a(this).toggleClass("ui-state-active"),b.buttonElement.attr("aria-pressed",b.element[0].checked)}):this.type==="radio"?this.buttonElement.bind("click.button",function(){if(h.disabled||f)return!1;a(this).addClass("ui-state-active"),b.buttonElement.attr("aria-pressed","true");var c=b.element[0];k(c).not(c).map(function(){return a(this).button("widget")[0]}).removeClass("ui-state-active").attr("aria-pressed","false")}):(this.buttonElement.bind("mousedown.button",function(){if(h.disabled)return!1;a(this).addClass("ui-state-active"),c=this,a(document).one("mouseup",function(){c=null})}).bind("mouseup.button",function(){if(h.disabled)return!1;a(this).removeClass("ui-state-active")}).bind("keydown.button",function(b){if(h.disabled)return!1;(b.keyCode==a.ui.keyCode.SPACE||b.keyCode==a.ui.keyCode.ENTER)&&a(this).addClass("ui-state-active")}).bind("keyup.button",function(){a(this).removeClass("ui-state-active")}),this.buttonElement.is("a")&&this.buttonElement.keyup(function(b){b.keyCode===a.ui.keyCode.SPACE&&a(this).click()})),this._setOption("disabled",h.disabled),this._resetButton()},_determineButtonType:function(){this.element.is(":checkbox")?this.type="checkbox":this.element.is(":radio")?this.type="radio":this.element.is("input")?this.type="input":this.type="button";if(this.type==="checkbox"||this.type==="radio"){var a=this.element.parents().filter(":last"),b="label[for='"+this.element.attr("id")+"']";this.buttonElement=a.find(b),this.buttonElement.length||(a=a.length?a.siblings():this.element.siblings(),this.buttonElement=a.filter(b),this.buttonElement.length||(this.buttonElement=a.find(b))),this.element.addClass("ui-helper-hidden-accessible");var c=this.element.is(":checked");c&&this.buttonElement.addClass("ui-state-active"),this.buttonElement.attr("aria-pressed",c)}else this.buttonElement=this.element},widget:function(){return this.buttonElement},destroy:function(){this.element.removeClass("ui-helper-hidden-accessible"),this.buttonElement.removeClass(g+" "+h+" "+i).removeAttr("role").removeAttr("aria-pressed").html(this.buttonElement.find(".ui-button-text").html()),this.hasTitle||this.buttonElement.removeAttr("title"),a.Widget.prototype.destroy.call(this)},_setOption:function(b,c){a.Widget.prototype._setOption.apply(this,arguments);if(b==="disabled"){c?this.element.propAttr("disabled",!0):this.element.propAttr("disabled",!1);return}this._resetButton()},refresh:function(){var b=this.element.is(":disabled");b!==this.options.disabled&&this._setOption("disabled",b),this.type==="radio"?k(this.element[0]).each(function(){a(this).is(":checked")?a(this).button("widget").addClass("ui-state-active").attr("aria-pressed","true"):a(this).button("widget").removeClass("ui-state-active").attr("aria-pressed","false")}):this.type==="checkbox"&&(this.element.is(":checked")?this.buttonElement.addClass("ui-state-active").attr("aria-pressed","true"):this.buttonElement.removeClass("ui-state-active").attr("aria-pressed","false"))},_resetButton:function(){if(this.type==="input"){this.options.label&&this.element.val(this.options.label);return}var b=this.buttonElement.removeClass(i),c=a("<span></span>",this.element[0].ownerDocument).addClass("ui-button-text").html(this.options.label).appendTo(b.empty()).text(),d=this.options.icons,e=d.primary&&d.secondary,f=[];d.primary||d.secondary?(this.options.text&&f.push("ui-button-text-icon"+(e?"s":d.primary?"-primary":"-secondary")),d.primary&&b.prepend("<span class='ui-button-icon-primary ui-icon "+d.primary+"'></span>"),d.secondary&&b.append("<span class='ui-button-icon-secondary ui-icon "+d.secondary+"'></span>"),this.options.text||(f.push(e?"ui-button-icons-only":"ui-button-icon-only"),this.hasTitle||b.attr("title",c))):f.push("ui-button-text-only"),b.addClass(f.join(" "))}}),a.widget("ui.buttonset",{options:{items:":button, :submit, :reset, :checkbox, :radio, a, :data(button)"},_create:function(){this.element.addClass("ui-buttonset")},_init:function(){this.refresh()},_setOption:function(b,c){b==="disabled"&&this.buttons.button("option",b,c),a.Widget.prototype._setOption.apply(this,arguments)},refresh:function(){var b=this.element.css("direction")==="rtl";this.buttons=this.element.find(this.options.items).filter(":ui-button").button("refresh").end().not(":ui-button").button().end().map(function(){return a(this).button("widget")[0]}).removeClass("ui-corner-all ui-corner-left ui-corner-right").filter(":first").addClass(b?"ui-corner-right":"ui-corner-left").end().filter(":last").addClass(b?"ui-corner-left":"ui-corner-right").end().end()},destroy:function(){this.element.removeClass("ui-buttonset"),this.buttons.map(function(){return a(this).button("widget")[0]}).removeClass("ui-corner-left ui-corner-right").end().button("destroy"),a.Widget.prototype.destroy.call(this)}})}(jQuery),function($,undefined){function Datepicker(){this.debug=!1,this._curInst=null,this._keyEvent=!1,this._disabledInputs=[],this._datepickerShowing=!1,this._inDialog=!1,this._mainDivId="ui-datepicker-div",this._inlineClass="ui-datepicker-inline",this._appendClass="ui-datepicker-append",this._triggerClass="ui-datepicker-trigger",this._dialogClass="ui-datepicker-dialog",this._disableClass="ui-datepicker-disabled",this._unselectableClass="ui-datepicker-unselectable",this._currentClass="ui-datepicker-current-day",this._dayOverClass="ui-datepicker-days-cell-over",this.regional=[],this.regional[""]={closeText:"Done",prevText:"Prev",nextText:"Next",currentText:"Today",monthNames:["January","February","March","April","May","June","July","August","September","October","November","December"],monthNamesShort:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],dayNames:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],dayNamesShort:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],dayNamesMin:["Su","Mo","Tu","We","Th","Fr","Sa"],weekHeader:"Wk",dateFormat:"mm/dd/yy",firstDay:0,isRTL:!1,showMonthAfterYear:!1,yearSuffix:""},this._defaults={showOn:"focus",showAnim:"fadeIn",showOptions:{},defaultDate:null,appendText:"",buttonText:"...",buttonImage:"",buttonImageOnly:!1,hideIfNoPrevNext:!1,navigationAsDateFormat:!1,gotoCurrent:!1,changeMonth:!1,changeYear:!1,yearRange:"c-10:c+10",showOtherMonths:!1,selectOtherMonths:!1,showWeek:!1,calculateWeek:this.iso8601Week,shortYearCutoff:"+10",minDate:null,maxDate:null,duration:"fast",beforeShowDay:null,beforeShow:null,onSelect:null,onChangeMonthYear:null,onClose:null,numberOfMonths:1,showCurrentAtPos:0,stepMonths:1,stepBigMonths:12,altField:"",altFormat:"",constrainInput:!0,showButtonPanel:!1,autoSize:!1,disabled:!1},$.extend(this._defaults,this.regional[""]),this.dpDiv=bindHover($('<div id="'+this._mainDivId+'" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>'))}function bindHover(a){var b="button, .ui-datepicker-prev, .ui-datepicker-next, .ui-datepicker-calendar td a";return a.bind("mouseout",function(a){var c=$(a.target).closest(b);if(!c.length)return;c.removeClass("ui-state-hover ui-datepicker-prev-hover ui-datepicker-next-hover")}).bind("mouseover",function(c){var d=$(c.target).closest(b);if($.datepicker._isDisabledDatepicker(instActive.inline?a.parent()[0]:instActive.input[0])||!d.length)return;d.parents(".ui-datepicker-calendar").find("a").removeClass("ui-state-hover"),d.addClass("ui-state-hover"),d.hasClass("ui-datepicker-prev")&&d.addClass("ui-datepicker-prev-hover"),d.hasClass("ui-datepicker-next")&&d.addClass("ui-datepicker-next-hover")})}function extendRemove(a,b){$.extend(a,b);for(var c in b)if(b[c]==null||b[c]==undefined)a[c]=b[c];return a}function isArray(a){return a&&($.browser.safari&&typeof a=="object"&&a.length||a.constructor&&a.constructor.toString().match(/\Array\(\)/))}$.extend($.ui,{datepicker:{version:"1.8.23"}});var PROP_NAME="datepicker",dpuuid=(new Date).getTime(),instActive;$.extend(Datepicker.prototype,{markerClassName:"hasDatepicker",maxRows:4,log:function(){this.debug&&console.log.apply("",arguments)},_widgetDatepicker:function(){return this.dpDiv},setDefaults:function(a){return extendRemove(this._defaults,a||{}),this},_attachDatepicker:function(target,settings){var inlineSettings=null;for(var attrName in this._defaults){var attrValue=target.getAttribute("date:"+attrName);if(attrValue){inlineSettings=inlineSettings||{};try{inlineSettings[attrName]=eval(attrValue)}catch(err){inlineSettings[attrName]=attrValue}}}var nodeName=target.nodeName.toLowerCase(),inline=nodeName=="div"||nodeName=="span";target.id||(this.uuid+=1,target.id="dp"+this.uuid);var inst=this._newInst($(target),inline);inst.settings=$.extend({},settings||{},inlineSettings||{}),nodeName=="input"?this._connectDatepicker(target,inst):inline&&this._inlineDatepicker(target,inst)},_newInst:function(a,b){var c=a[0].id.replace(/([^A-Za-z0-9_-])/g,"\\\\$1");return{id:c,input:a,selectedDay:0,selectedMonth:0,selectedYear:0,drawMonth:0,drawYear:0,inline:b,dpDiv:b?bindHover($('<div class="'+this._inlineClass+' ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div>')):this.dpDiv}},_connectDatepicker:function(a,b){var c=$(a);b.append=$([]),b.trigger=$([]);if(c.hasClass(this.markerClassName))return;this._attachments(c,b),c.addClass(this.markerClassName).keydown(this._doKeyDown).keypress(this._doKeyPress).keyup(this._doKeyUp).bind("setData.datepicker",function(a,c,d){b.settings[c]=d}).bind("getData.datepicker",function(a,c){return this._get(b,c)}),this._autoSize(b),$.data(a,PROP_NAME,b),b.settings.disabled&&this._disableDatepicker(a)},_attachments:function(a,b){var c=this._get(b,"appendText"),d=this._get(b,"isRTL");b.append&&b.append.remove(),c&&(b.append=$('<span class="'+this._appendClass+'">'+c+"</span>"),a[d?"before":"after"](b.append)),a.unbind("focus",this._showDatepicker),b.trigger&&b.trigger.remove();var e=this._get(b,"showOn");(e=="focus"||e=="both")&&a.focus(this._showDatepicker);if(e=="button"||e=="both"){var f=this._get(b,"buttonText"),g=this._get(b,"buttonImage");b.trigger=$(this._get(b,"buttonImageOnly")?$("<img/>").addClass(this._triggerClass).attr({src:g,alt:f,title:f}):$('<button type="button"></button>').addClass(this._triggerClass).html(g==""?f:$("<img/>").attr({src:g,alt:f,title:f}))),a[d?"before":"after"](b.trigger),b.trigger.click(function(){return $.datepicker._datepickerShowing&&$.datepicker._lastInput==a[0]?$.datepicker._hideDatepicker():$.datepicker._datepickerShowing&&$.datepicker._lastInput!=a[0]?($.datepicker._hideDatepicker(),$.datepicker._showDatepicker(a[0])):$.datepicker._showDatepicker(a[0]),!1})}},_autoSize:function(a){if(this._get(a,"autoSize")&&!a.inline){var b=new Date(2009,11,20),c=this._get(a,"dateFormat");if(c.match(/[DM]/)){var d=function(a){var b=0,c=0;for(var d=0;d<a.length;d++)a[d].length>b&&(b=a[d].length,c=d);return c};b.setMonth(d(this._get(a,c.match(/MM/)?"monthNames":"monthNamesShort"))),b.setDate(d(this._get(a,c.match(/DD/)?"dayNames":"dayNamesShort"))+20-b.getDay())}a.input.attr("size",this._formatDate(a,b).length)}},_inlineDatepicker:function(a,b){var c=$(a);if(c.hasClass(this.markerClassName))return;c.addClass(this.markerClassName).append(b.dpDiv).bind("setData.datepicker",function(a,c,d){b.settings[c]=d}).bind("getData.datepicker",function(a,c){return this._get(b,c)}),$.data(a,PROP_NAME,b),this._setDate(b,this._getDefaultDate(b),!0),this._updateDatepicker(b),this._updateAlternate(b),b.settings.disabled&&this._disableDatepicker(a),b.dpDiv.css("display","block")},_dialogDatepicker:function(a,b,c,d,e){var f=this._dialogInst;if(!f){this.uuid+=1;var g="dp"+this.uuid;this._dialogInput=$('<input type="text" id="'+g+'" style="position: absolute; top: -100px; width: 0px;"/>'),this._dialogInput.keydown(this._doKeyDown),$("body").append(this._dialogInput),f=this._dialogInst=this._newInst(this._dialogInput,!1),f.settings={},$.data(this._dialogInput[0],PROP_NAME,f)}extendRemove(f.settings,d||{}),b=b&&b.constructor==Date?this._formatDate(f,b):b,this._dialogInput.val(b),this._pos=e?e.length?e:[e.pageX,e.pageY]:null;if(!this._pos){var h=document.documentElement.clientWidth,i=document.documentElement.clientHeight,j=document.documentElement.scrollLeft||document.body.scrollLeft,k=document.documentElement.scrollTop||document.body.scrollTop;this._pos=[h/2-100+j,i/2-150+k]}return this._dialogInput.css("left",this._pos[0]+20+"px").css("top",this._pos[1]+"px"),f.settings.onSelect=c,this._inDialog=!0,this.dpDiv.addClass(this._dialogClass),this._showDatepicker(this._dialogInput[0]),$.blockUI&&$.blockUI(this.dpDiv),$.data(this._dialogInput[0],PROP_NAME,f),this},_destroyDatepicker:function(a){var b=$(a),c=$.data(a,PROP_NAME);if(!b.hasClass(this.markerClassName))return;var d=a.nodeName.toLowerCase();$.removeData(a,PROP_NAME),d=="input"?(c.append.remove(),c.trigger.remove(),b.removeClass(this.markerClassName).unbind("focus",this._showDatepicker).unbind("keydown",this._doKeyDown).unbind("keypress",this._doKeyPress).unbind("keyup",this._doKeyUp)):(d=="div"||d=="span")&&b.removeClass(this.markerClassName).empty()},_enableDatepicker:function(a){var b=$(a),c=$.data(a,PROP_NAME);if(!b.hasClass(this.markerClassName))return;var d=a.nodeName.toLowerCase();if(d=="input")a.disabled=!1,c.trigger.filter("button").each(function(){this.disabled=!1}).end().filter("img").css({opacity:"1.0",cursor:""});else if(d=="div"||d=="span"){var e=b.children("."+this._inlineClass);e.children().removeClass("ui-state-disabled"),e.find("select.ui-datepicker-month, select.ui-datepicker-year").removeAttr("disabled")}this._disabledInputs=$.map(this._disabledInputs,function(b){return b==a?null:b})},_disableDatepicker:function(a){var b=$(a),c=$.data(a,PROP_NAME);if(!b.hasClass(this.markerClassName))return;var d=a.nodeName.toLowerCase();if(d=="input")a.disabled=!0,c.trigger.filter("button").each(function(){this.disabled=!0}).end().filter("img").css({opacity:"0.5",cursor:"default"});else if(d=="div"||d=="span"){var e=b.children("."+this._inlineClass);e.children().addClass("ui-state-disabled"),e.find("select.ui-datepicker-month, select.ui-datepicker-year").attr("disabled","disabled")}this._disabledInputs=$.map(this._disabledInputs,function(b){return b==a?null:b}),this._disabledInputs[this._disabledInputs.length]=a},_isDisabledDatepicker:function(a){if(!a)return!1;for(var b=0;b<this._disabledInputs.length;b++)if(this._disabledInputs[b]==a)return!0;return!1},_getInst:function(a){try{return $.data(a,PROP_NAME)}catch(b){throw"Missing instance data for this datepicker"}},_optionDatepicker:function(a,b,c){var d=this._getInst(a);if(arguments.length==2&&typeof b=="string")return b=="defaults"?$.extend({},$.datepicker._defaults):d?b=="all"?$.extend({},d.settings):this._get(d,b):null;var e=b||{};typeof b=="string"&&(e={},e[b]=c);if(d){this._curInst==d&&this._hideDatepicker();var f=this._getDateDatepicker(a,!0),g=this._getMinMaxDate(d,"min"),h=this._getMinMaxDate(d,"max");extendRemove(d.settings,e),g!==null&&e.dateFormat!==undefined&&e.minDate===undefined&&(d.settings.minDate=this._formatDate(d,g)),h!==null&&e.dateFormat!==undefined&&e.maxDate===undefined&&(d.settings.maxDate=this._formatDate(d,h)),this._attachments($(a),d),this._autoSize(d),this._setDate(d,f),this._updateAlternate(d),this._updateDatepicker(d)}},_changeDatepicker:function(a,b,c){this._optionDatepicker(a,b,c)},_refreshDatepicker:function(a){var b=this._getInst(a);b&&this._updateDatepicker(b)},_setDateDatepicker:function(a,b){var c=this._getInst(a);c&&(this._setDate(c,b),this._updateDatepicker(c),this._updateAlternate(c))},_getDateDatepicker:function(a,b){var c=this._getInst(a);return c&&!c.inline&&this._setDateFromField(c,b),c?this._getDate(c):null},_doKeyDown:function(a){var b=$.datepicker._getInst(a.target),c=!0,d=b.dpDiv.is(".ui-datepicker-rtl");b._keyEvent=!0;if($.datepicker._datepickerShowing)switch(a.keyCode){case 9:$.datepicker._hideDatepicker(),c=!1;break;case 13:var e=$("td."+$.datepicker._dayOverClass+":not(."+$.datepicker._currentClass+")",b.dpDiv);e[0]&&$.datepicker._selectDay(a.target,b.selectedMonth,b.selectedYear,e[0]);var f=$.datepicker._get(b,"onSelect");if(f){var g=$.datepicker._formatDate(b);f.apply(b.input?b.input[0]:null,[g,b])}else $.datepicker._hideDatepicker();return!1;case 27:$.datepicker._hideDatepicker();break;case 33:$.datepicker._adjustDate(a.target,a.ctrlKey?-$.datepicker._get(b,"stepBigMonths"):-$.datepicker._get(b,"stepMonths"),"M");break;case 34:$.datepicker._adjustDate(a.target,a.ctrlKey?+$.datepicker._get(b,"stepBigMonths"):+$.datepicker._get(b,"stepMonths"),"M");break;case 35:(a.ctrlKey||a.metaKey)&&$.datepicker._clearDate(a.target),c=a.ctrlKey||a.metaKey;break;case 36:(a.ctrlKey||a.metaKey)&&$.datepicker._gotoToday(a.target),c=a.ctrlKey||a.metaKey;break;case 37:(a.ctrlKey||a.metaKey)&&$.datepicker._adjustDate(a.target,d?1:-1,"D"),c=a.ctrlKey||a.metaKey,a.originalEvent.altKey&&$.datepicker._adjustDate(a.target,a.ctrlKey?-$.datepicker._get(b,"stepBigMonths"):-$.datepicker._get(b,"stepMonths"),"M");break;case 38:(a.ctrlKey||a.metaKey)&&$.datepicker._adjustDate(a.target,-7,"D"),c=a.ctrlKey||a.metaKey;break;case 39:(a.ctrlKey||a.metaKey)&&$.datepicker._adjustDate(a.target,d?-1:1,"D"),c=a.ctrlKey||a.metaKey,a.originalEvent.altKey&&$.datepicker._adjustDate(a.target,a.ctrlKey?+$.datepicker._get(b,"stepBigMonths"):+$.datepicker._get(b,"stepMonths"),"M");break;case 40:(a.ctrlKey||a.metaKey)&&$.datepicker._adjustDate(a.target,7,"D"),c=a.ctrlKey||a.metaKey;break;default:c=!1}else a.keyCode==36&&a.ctrlKey?$.datepicker._showDatepicker(this):c=!1;c&&(a.preventDefault(),a.stopPropagation())},_doKeyPress:function(a){var b=$.datepicker._getInst(a.target);if($.datepicker._get(b,"constrainInput")){var c=$.datepicker._possibleChars($.datepicker._get(b,"dateFormat")),d=String.fromCharCode(a.charCode==undefined?a.keyCode:a.charCode);return a.ctrlKey||a.metaKey||d<" "||!c||c.indexOf(d)>-1}},_doKeyUp:function(a){var b=$.datepicker._getInst(a.target);if(b.input.val()!=b.lastVal)try{var c=$.datepicker.parseDate($.datepicker._get(b,"dateFormat"),b.input?b.input.val():null,$.datepicker._getFormatConfig(b));c&&($.datepicker._setDateFromField(b),$.datepicker._updateAlternate(b),$.datepicker._updateDatepicker(b))}catch(d){$.datepicker.log(d)}return!0},_showDatepicker:function(a){a=a.target||a,a.nodeName.toLowerCase()!="input"&&(a=$("input",a.parentNode)[0]);if($.datepicker._isDisabledDatepicker(a)||$.datepicker._lastInput==a)return;var b=$.datepicker._getInst(a);$.datepicker._curInst&&$.datepicker._curInst!=b&&($.datepicker._curInst.dpDiv.stop(!0,!0),b&&$.datepicker._datepickerShowing&&$.datepicker._hideDatepicker($.datepicker._curInst.input[0]));var c=$.datepicker._get(b,"beforeShow"),d=c?c.apply(a,[a,b]):{};if(d===!1)return;extendRemove(b.settings,d),b.lastVal=null,$.datepicker._lastInput=a,$.datepicker._setDateFromField(b),$.datepicker._inDialog&&(a.value=""),$.datepicker._pos||($.datepicker._pos=$.datepicker._findPos(a),$.datepicker._pos[1]+=a.offsetHeight);var e=!1;$(a).parents().each(function(){return e|=$(this).css("position")=="fixed",!e}),e&&$.browser.opera&&($.datepicker._pos[0]-=document.documentElement.scrollLeft,$.datepicker._pos[1]-=document.documentElement.scrollTop);var f={left:$.datepicker._pos[0],top:$.datepicker._pos[1]};$.datepicker._pos=null,b.dpDiv.empty(),b.dpDiv.css({position:"absolute",display:"block",top:"-1000px"}),$.datepicker._updateDatepicker(b),f=$.datepicker._checkOffset(b,f,e),b.dpDiv.css({position:$.datepicker._inDialog&&$.blockUI?"static":e?"fixed":"absolute",display:"none",left:f.left+"px",top:f.top+"px"});if(!b.inline){var g=$.datepicker._get(b,"showAnim"),h=$.datepicker._get(b,"duration"),i=function(){var a=b.dpDiv.find("iframe.ui-datepicker-cover");if(!!a.length){var c=$.datepicker._getBorders(b.dpDiv);a.css({left:-c[0],top:-c[1],width:b.dpDiv.outerWidth(),height:b.dpDiv.outerHeight()})}};b.dpDiv.zIndex($(a).zIndex()+1),$.datepicker._datepickerShowing=!0,$.effects&&$.effects[g]?b.dpDiv.show(g,$.datepicker._get(b,"showOptions"),h,i):b.dpDiv[g||"show"](g?h:null,i),(!g||!h)&&i(),b.input.is(":visible")&&!b.input.is(":disabled")&&b.input.focus(),$.datepicker._curInst=b}},_updateDatepicker:function(a){var b=this;b.maxRows=4;var c=$.datepicker._getBorders(a.dpDiv);instActive=a,a.dpDiv.empty().append(this._generateHTML(a)),this._attachHandlers(a);var d=a.dpDiv.find("iframe.ui-datepicker-cover");!d.length||d.css({left:-c[0],top:-c[1],width:a.dpDiv.outerWidth(),height:a.dpDiv.outerHeight()}),a.dpDiv.find("."+this._dayOverClass+" a").mouseover();var e=this._getNumberOfMonths(a),f=e[1],g=17;a.dpDiv.removeClass("ui-datepicker-multi-2 ui-datepicker-multi-3 ui-datepicker-multi-4").width(""),f>1&&a.dpDiv.addClass("ui-datepicker-multi-"+f).css("width",g*f+"em"),a.dpDiv[(e[0]!=1||e[1]!=1?"add":"remove")+"Class"]("ui-datepicker-multi"),a.dpDiv[(this._get(a,"isRTL")?"add":"remove")+"Class"]("ui-datepicker-rtl"),a==$.datepicker._curInst&&$.datepicker._datepickerShowing&&a.input&&a.input.is(":visible")&&!a.input.is(":disabled")&&a.input[0]!=document.activeElement&&a.input.focus();if(a.yearshtml){var h=a.yearshtml;setTimeout(function(){h===a.yearshtml&&a.yearshtml&&a.dpDiv.find("select.ui-datepicker-year:first").replaceWith(a.yearshtml),h=a.yearshtml=null},0)}},_getBorders:function(a){var b=function(a){return{thin:1,medium:2,thick:3}[a]||a};return[parseFloat(b(a.css("border-left-width"))),parseFloat(b(a.css("border-top-width")))]},_checkOffset:function(a,b,c){var d=a.dpDiv.outerWidth(),e=a.dpDiv.outerHeight(),f=a.input?a.input.outerWidth():0,g=a.input?a.input.outerHeight():0,h=document.documentElement.clientWidth+(c?0:$(document).scrollLeft()),i=document.documentElement.clientHeight+(c?0:$(document).scrollTop());return b.left-=this._get(a,"isRTL")?d-f:0,b.left-=c&&b.left==a.input.offset().left?$(document).scrollLeft():0,b.top-=c&&b.top==a.input.offset().top+g?$(document).scrollTop():0,b.left-=Math.min(b.left,b.left+d>h&&h>d?Math.abs(b.left+d-h):0),b.top-=Math.min(b.top,b.top+e>i&&i>e?Math.abs(e+g):0),b},_findPos:function(a){var b=this._getInst(a),c=this._get(b,"isRTL");while(a&&(a.type=="hidden"||a.nodeType!=1||$.expr.filters.hidden(a)))a=a[c?"previousSibling":"nextSibling"];var d=$(a).offset();return[d.left,d.top]},_hideDatepicker:function(a){var b=this._curInst;if(!b||a&&b!=$.data(a,PROP_NAME))return;if(this._datepickerShowing){var c=this._get(b,"showAnim"),d=this._get(b,"duration"),e=function(){$.datepicker._tidyDialog(b)};$.effects&&$.effects[c]?b.dpDiv.hide(c,$.datepicker._get(b,"showOptions"),d,e):b.dpDiv[c=="slideDown"?"slideUp":c=="fadeIn"?"fadeOut":"hide"](c?d:null,e),c||e(),this._datepickerShowing=!1;var f=this._get(b,"onClose");f&&f.apply(b.input?b.input[0]:null,[b.input?b.input.val():"",b]),this._lastInput=null,this._inDialog&&(this._dialogInput.css({position:"absolute",left:"0",top:"-100px"}),$.blockUI&&($.unblockUI(),$("body").append(this.dpDiv))),this._inDialog=!1}},_tidyDialog:function(a){a.dpDiv.removeClass(this._dialogClass).unbind(".ui-datepicker-calendar")},_checkExternalClick:function(a){if(!$.datepicker._curInst)return;var b=$(a.target),c=$.datepicker._getInst(b[0]);(b[0].id!=$.datepicker._mainDivId&&b.parents("#"+$.datepicker._mainDivId).length==0&&!b.hasClass($.datepicker.markerClassName)&&!b.closest("."+$.datepicker._triggerClass).length&&$.datepicker._datepickerShowing&&(!$.datepicker._inDialog||!$.blockUI)||b.hasClass($.datepicker.markerClassName)&&$.datepicker._curInst!=c)&&$.datepicker._hideDatepicker()},_adjustDate:function(a,b,c){var d=$(a),e=this._getInst(d[0]);if(this._isDisabledDatepicker(d[0]))return;this._adjustInstDate(e,b+(c=="M"?this._get(e,"showCurrentAtPos"):0),c),this._updateDatepicker(e)},_gotoToday:function(a){var b=$(a),c=this._getInst(b[0]);if(this._get(c,"gotoCurrent")&&c.currentDay)c.selectedDay=c.currentDay,c.drawMonth=c.selectedMonth=c.currentMonth,c.drawYear=c.selectedYear=c.currentYear;else{var d=new Date;c.selectedDay=d.getDate(),c.drawMonth=c.selectedMonth=d.getMonth(),c.drawYear=c.selectedYear=d.getFullYear()}this._notifyChange(c),this._adjustDate(b)},_selectMonthYear:function(a,b,c){var d=$(a),e=this._getInst(d[0]);e["selected"+(c=="M"?"Month":"Year")]=e["draw"+(c=="M"?"Month":"Year")]=parseInt(b.options[b.selectedIndex].value,10),this._notifyChange(e),this._adjustDate(d)},_selectDay:function(a,b,c,d){var e=$(a);if($(d).hasClass(this._unselectableClass)||this._isDisabledDatepicker(e[0]))return;var f=this._getInst(e[0]);f.selectedDay=f.currentDay=$("a",d).html(),f.selectedMonth=f.currentMonth=b,f.selectedYear=f.currentYear=c,this._selectDate(a,this._formatDate(f,f.currentDay,f.currentMonth,f.currentYear))},_clearDate:function(a){var b=$(a),c=this._getInst(b[0]);this._selectDate(b,"")},_selectDate:function(a,b){var c=$(a),d=this._getInst(c[0]);b=b!=null?b:this._formatDate(d),d.input&&d.input.val(b),this._updateAlternate(d);var e=this._get(d,"onSelect");e?e.apply(d.input?d.input[0]:null,[b,d]):d.input&&d.input.trigger("change"),d.inline?this._updateDatepicker(d):(this._hideDatepicker(),this._lastInput=d.input[0],typeof d.input[0]!="object"&&d.input.focus(),this._lastInput=null)},_updateAlternate:function(a){var b=this._get(a,"altField");if(b){var c=this._get(a,"altFormat")||this._get(a,"dateFormat"),d=this._getDate(a),e=this.formatDate(c,d,this._getFormatConfig(a));$(b).each(function(){$(this).val(e)})}},noWeekends:function(a){var b=a.getDay();return[b>0&&b<6,""]},iso8601Week:function(a){var b=new Date(a.getTime());b.setDate(b.getDate()+4-(b.getDay()||7));var c=b.getTime();return b.setMonth(0),b.setDate(1),Math.floor(Math.round((c-b)/864e5)/7)+1},parseDate:function(a,b,c){if(a==null||b==null)throw"Invalid arguments";b=typeof b=="object"?b.toString():b+"";if(b=="")return null;var d=(c?c.shortYearCutoff:null)||this._defaults.shortYearCutoff;d=typeof d!="string"?d:(new Date).getFullYear()%100+parseInt(d,10);var e=(c?c.dayNamesShort:null)||this._defaults.dayNamesShort,f=(c?c.dayNames:null)||this._defaults.dayNames,g=(c?c.monthNamesShort:null)||this._defaults.monthNamesShort,h=(c?c.monthNames:null)||this._defaults.monthNames,i=-1,j=-1,k=-1,l=-1,m=!1,n=function(b){var c=s+1<a.length&&a.charAt(s+1)==b;return c&&s++,c},o=function(a){var c=n(a),d=a=="@"?14:a=="!"?20:a=="y"&&c?4:a=="o"?3:2,e=new RegExp("^\\d{1,"+d+"}"),f=b.substring(r).match(e);if(!f)throw"Missing number at position "+r;return r+=f[0].length,parseInt(f[0],10)},p=function(a,c,d){var e=$.map(n(a)?d:c,function(a,b){return[[b,a]]}).sort(function(a,b){return-(a[1].length-b[1].length)}),f=-1;$.each(e,function(a,c){var d=c[1];if(b.substr(r,d.length).toLowerCase()==d.toLowerCase())return f=c[0],r+=d.length,!1});if(f!=-1)return f+1;throw"Unknown name at position "+r},q=function(){if(b.charAt(r)!=a.charAt(s))throw"Unexpected literal at position "+r;r++},r=0;for(var s=0;s<a.length;s++)if(m)a.charAt(s)=="'"&&!n("'")?m=!1:q();else switch(a.charAt(s)){case"d":k=o("d");break;case"D":p("D",e,f);break;case"o":l=o("o");break;case"m":j=o("m");break;case"M":j=p("M",g,h);break;case"y":i=o("y");break;case"@":var t=new Date(o("@"));i=t.getFullYear(),j=t.getMonth()+1,k=t.getDate();break;case"!":var t=new Date((o("!")-this._ticksTo1970)/1e4);i=t.getFullYear(),j=t.getMonth()+1,k=t.getDate();break;case"'":n("'")?q():m=!0;break;default:q()}if(r<b.length)throw"Extra/unparsed characters found in date: "+b.substring(r);i==-1?i=(new Date).getFullYear():i<100&&(i+=(new Date).getFullYear()-(new Date).getFullYear()%100+(i<=d?0:-100));if(l>-1){j=1,k=l;do{var u=this._getDaysInMonth(i,j-1);if(k<=u)break;j++,k-=u}while(!0)}var t=this._daylightSavingAdjust(new Date(i,j-1,k));if(t.getFullYear()!=i||t.getMonth()+1!=j||t.getDate()!=k)throw"Invalid date";return t},ATOM:"yy-mm-dd",COOKIE:"D, dd M yy",ISO_8601:"yy-mm-dd",RFC_822:"D, d M y",RFC_850:"DD, dd-M-y",RFC_1036:"D, d M y",RFC_1123:"D, d M yy",RFC_2822:"D, d M yy",RSS:"D, d M y",TICKS:"!",TIMESTAMP:"@",W3C:"yy-mm-dd",_ticksTo1970:(718685+Math.floor(492.5)-Math.floor(19.7)+Math.floor(4.925))*24*60*60*1e7,formatDate:function(a,b,c){if(!b)return"";var d=(c?c.dayNamesShort:null)||this._defaults.dayNamesShort,e=(c?c.dayNames:null)||this._defaults.dayNames,f=(c?c.monthNamesShort:null)||this._defaults.monthNamesShort,g=(c?c.monthNames:null)||this._defaults.monthNames,h=function(b){var c=m+1<a.length&&a.charAt(m+1)==b;return c&&m++,c},i=function(a,b,c){var d=""+b;if(h(a))while(d.length<c)d="0"+d;return d},j=function(a,b,c,d){return h(a)?d[b]:c[b]},k="",l=!1;if(b)for(var m=0;m<a.length;m++)if(l)a.charAt(m)=="'"&&!h("'")?l=!1:k+=a.charAt(m);else switch(a.charAt(m)){case"d":k+=i("d",b.getDate(),2);break;case"D":k+=j("D",b.getDay(),d,e);break;case"o":k+=i("o",Math.round(((new Date(b.getFullYear(),b.getMonth(),b.getDate())).getTime()-(new Date(b.getFullYear(),0,0)).getTime())/864e5),3);break;case"m":k+=i("m",b.getMonth()+1,2);break;case"M":k+=j("M",b.getMonth(),f,g);break;case"y":k+=h("y")?b.getFullYear():(b.getYear()%100<10?"0":"")+b.getYear()%100;break;case"@":k+=b.getTime();break;case"!":k+=b.getTime()*1e4+this._ticksTo1970;break;case"'":h("'")?k+="'":l=!0;break;default:k+=a.charAt(m)}return k},_possibleChars:function(a){var b="",c=!1,d=function(b){var c=e+1<a.length&&a.charAt(e+1)==b;return c&&e++,c};for(var e=0;e<a.length;e++)if(c)a.charAt(e)=="'"&&!d("'")?c=!1:b+=a.charAt(e);else switch(a.charAt(e)){case"d":case"m":case"y":case"@":b+="0123456789";break;case"D":case"M":return null;case"'":d("'")?b+="'":c=!0;break;default:b+=a.charAt(e)}return b},_get:function(a,b){return a.settings[b]!==undefined?a.settings[b]:this._defaults[b]},_setDateFromField:function(a,b){if(a.input.val()==a.lastVal)return;var c=this._get(a,"dateFormat"),d=a.lastVal=a.input?a.input.val():null,e,f;e=f=this._getDefaultDate(a);var g=this._getFormatConfig(a);try{e=this.parseDate(c,d,g)||f}catch(h){this.log(h),d=b?"":d}a.selectedDay=e.getDate(),a.drawMonth=a.selectedMonth=e.getMonth(),a.drawYear=a.selectedYear=e.getFullYear(),a.currentDay=d?e.getDate():0,a.currentMonth=d?e.getMonth():0,a.currentYear=d?e.getFullYear():0,this._adjustInstDate(a)},_getDefaultDate:function(a){return this._restrictMinMax(a,this._determineDate(a,this._get(a,"defaultDate"),new Date))},_determineDate:function(a,b,c){var d=function(a){var b=new Date;return b.setDate(b.getDate()+a),b},e=function(b){try{return $.datepicker.parseDate($.datepicker._get(a,"dateFormat"),b,$.datepicker._getFormatConfig(a))}catch(c){}var d=(b.toLowerCase().match(/^c/)?$.datepicker._getDate(a):null)||new Date,e=d.getFullYear(),f=d.getMonth(),g=d.getDate(),h=/([+-]?[0-9]+)\s*(d|D|w|W|m|M|y|Y)?/g,i=h.exec(b);while(i){switch(i[2]||"d"){case"d":case"D":g+=parseInt(i[1],10);break;case"w":case"W":g+=parseInt(i[1],10)*7;break;case"m":case"M":f+=parseInt(i[1],10),g=Math.min(g,$.datepicker._getDaysInMonth(e,f));break;case"y":case"Y":e+=parseInt(i[1],10),g=Math.min(g,$.datepicker._getDaysInMonth(e,f))}i=h.exec(b)}return new Date(e,f,g)},f=b==null||b===""?c:typeof b=="string"?e(b):typeof b=="number"?isNaN(b)?c:d(b):new Date(b.getTime());return f=f&&f.toString()=="Invalid Date"?c:f,f&&(f.setHours(0),f.setMinutes(0),f.setSeconds(0),f.setMilliseconds(0)),this._daylightSavingAdjust(f)},_daylightSavingAdjust:function(a){return a?(a.setHours(a.getHours()>12?a.getHours()+2:0),a):null},_setDate:function(a,b,c){var d=!b,e=a.selectedMonth,f=a.selectedYear,g=this._restrictMinMax(a,this._determineDate(a,b,new Date));a.selectedDay=a.currentDay=g.getDate(),a.drawMonth=a.selectedMonth=a.currentMonth=g.getMonth(),a.drawYear=a.selectedYear=a.currentYear=g.getFullYear(),(e!=a.selectedMonth||f!=a.selectedYear)&&!c&&this._notifyChange(a),this._adjustInstDate(a),a.input&&a.input.val(d?"":this._formatDate(a))},_getDate:function(a){var b=!a.currentYear||a.input&&a.input.val()==""?null:this._daylightSavingAdjust(new Date(a.currentYear,a.currentMonth,a.currentDay));return b},_attachHandlers:function(a){var b=this._get(a,"stepMonths"),c="#"+a.id.replace(/\\\\/g,"\\");a.dpDiv.find("[data-handler]").map(function(){var a={prev:function(){window["DP_jQuery_"+dpuuid].datepicker._adjustDate(c,-b,"M")},next:function(){window["DP_jQuery_"+dpuuid].datepicker._adjustDate(c,+b,"M")},hide:function(){window["DP_jQuery_"+dpuuid].datepicker._hideDatepicker()},today:function(){window["DP_jQuery_"+dpuuid].datepicker._gotoToday(c)},selectDay:function(){return window["DP_jQuery_"+dpuuid].datepicker._selectDay(c,+this.getAttribute("data-month"),+this.getAttribute("data-year"),this),!1},selectMonth:function(){return window["DP_jQuery_"+dpuuid].datepicker._selectMonthYear(c,this,"M"),!1},selectYear:function(){return window["DP_jQuery_"+dpuuid].datepicker._selectMonthYear(c,this,"Y"),!1}};$(this).bind(this.getAttribute("data-event"),a[this.getAttribute("data-handler")])})},_generateHTML:function(a){var b=new Date;b=this._daylightSavingAdjust(new Date(b.getFullYear(),b.getMonth(),b.getDate()));var c=this._get(a,"isRTL"),d=this._get(a,"showButtonPanel"),e=this._get(a,"hideIfNoPrevNext"),f=this._get(a,"navigationAsDateFormat"),g=this._getNumberOfMonths(a),h=this._get(a,"showCurrentAtPos"),i=this._get(a,"stepMonths"),j=g[0]!=1||g[1]!=1,k=this._daylightSavingAdjust(a.currentDay?new Date(a.currentYear,a.currentMonth,a.currentDay):new Date(9999,9,9)),l=this._getMinMaxDate(a,"min"),m=this._getMinMaxDate(a,"max"),n=a.drawMonth-h,o=a.drawYear;n<0&&(n+=12,o--);if(m){var p=this._daylightSavingAdjust(new Date(m.getFullYear(),m.getMonth()-g[0]*g[1]+1,m.getDate()));p=l&&p<l?l:p;while(this._daylightSavingAdjust(new Date(o,n,1))>p)n--,n<0&&(n=11,o--)}a.drawMonth=n,a.drawYear=o;var q=this._get(a,"prevText");q=f?this.formatDate(q,this._daylightSavingAdjust(new Date(o,n-i,1)),this._getFormatConfig(a)):q;var r=this._canAdjustMonth(a,-1,o,n)?'<a class="ui-datepicker-prev ui-corner-all" data-handler="prev" data-event="click" title="'+q+'"><span class="ui-icon ui-icon-circle-triangle-'+(c?"e":"w")+'">'+q+"</span></a>":e?"":'<a class="ui-datepicker-prev ui-corner-all ui-state-disabled" title="'+q+'"><span class="ui-icon ui-icon-circle-triangle-'+(c?"e":"w")+'">'+q+"</span></a>",s=this._get(a,"nextText");s=f?this.formatDate(s,this._daylightSavingAdjust(new Date(o,n+i,1)),this._getFormatConfig(a)):s;var t=this._canAdjustMonth(a,1,o,n)?'<a class="ui-datepicker-next ui-corner-all" data-handler="next" data-event="click" title="'+s+'"><span class="ui-icon ui-icon-circle-triangle-'+(c?"w":"e")+'">'+s+"</span></a>":e?"":'<a class="ui-datepicker-next ui-corner-all ui-state-disabled" title="'+s+'"><span class="ui-icon ui-icon-circle-triangle-'+(c?"w":"e")+'">'+s+"</span></a>",u=this._get(a,"currentText"),v=this._get(a,"gotoCurrent")&&a.currentDay?k:b;u=f?this.formatDate(u,v,this._getFormatConfig(a)):u;var w=a.inline?"":'<button type="button" class="ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all" data-handler="hide" data-event="click">'+this._get(a,"closeText")+"</button>",x=d?'<div class="ui-datepicker-buttonpane ui-widget-content">'+(c?w:"")+(this._isInRange(a,v)?'<button type="button" class="ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all" data-handler="today" data-event="click">'+u+"</button>":"")+(c?"":w)+"</div>":"",y=parseInt(this._get(a,"firstDay"),10);y=isNaN(y)?0:y;var z=this._get(a,"showWeek"),A=this._get(a,"dayNames"),B=this._get(a,"dayNamesShort"),C=this._get(a,"dayNamesMin"),D=this._get(a,"monthNames"),E=this._get(a,"monthNamesShort"),F=this._get(a,"beforeShowDay"),G=this._get(a,"showOtherMonths"),H=this._get(a,"selectOtherMonths"),I=this._get(a,"calculateWeek")||this.iso8601Week,J=this._getDefaultDate(a),K="";for(var L=0;L<g[0];L++){var M="";this.maxRows=4;for(var N=0;N<g[1];N++){var O=this._daylightSavingAdjust(new Date(o,n,a.selectedDay)),P=" ui-corner-all",Q="";if(j){Q+='<div class="ui-datepicker-group';if(g[1]>1)switch(N){case 0:Q+=" ui-datepicker-group-first",P=" ui-corner-"+(c?"right":"left");break;case g[1]-1:Q+=" ui-datepicker-group-last",P=" ui-corner-"+(c?"left":"right");break;default:Q+=" ui-datepicker-group-middle",P=""}Q+='">'}Q+='<div class="ui-datepicker-header ui-widget-header ui-helper-clearfix'+P+'">'+(/all|left/.test(P)&&L==0?c?t:r:"")+(/all|right/.test(P)&&L==0?c?r:t:"")+this._generateMonthYearHeader(a,n,o,l,m,L>0||N>0,D,E)+'</div><table class="ui-datepicker-calendar"><thead>'+"<tr>";var R=z?'<th class="ui-datepicker-week-col">'+this._get(a,"weekHeader")+"</th>":"";for(var S=0;S<7;S++){var T=(S+y)%7;R+="<th"+((S+y+6)%7>=5?' class="ui-datepicker-week-end"':"")+">"+'<span title="'+A[T]+'">'+C[T]+"</span></th>"}Q+=R+"</tr></thead><tbody>";var U=this._getDaysInMonth(o,n);o==a.selectedYear&&n==a.selectedMonth&&(a.selectedDay=Math.min(a.selectedDay,U));var V=(this._getFirstDayOfMonth(o,n)-y+7)%7,W=Math.ceil((V+U)/7),X=j?this.maxRows>W?this.maxRows:W:W;this.maxRows=X;var Y=this._daylightSavingAdjust(new Date(o,n,1-V));for(var Z=0;Z<X;Z++){Q+="<tr>";var _=z?'<td class="ui-datepicker-week-col">'+this._get(a,"calculateWeek")(Y)+"</td>":"";for(var S=0;S<7;S++){var ba=F?F.apply(a.input?a.input[0]:null,[Y]):[!0,""],bb=Y.getMonth()!=n,bc=bb&&!H||!ba[0]||l&&Y<l||m&&Y>m;_+='<td class="'+((S+y+6)%7>=5?" ui-datepicker-week-end":"")+(bb?" ui-datepicker-other-month":"")+(Y.getTime()==O.getTime()&&n==a.selectedMonth&&a._keyEvent||J.getTime()==Y.getTime()&&J.getTime()==O.getTime()?" "+this._dayOverClass:"")+(bc?" "+this._unselectableClass+" ui-state-disabled":"")+(bb&&!G?"":" "+ba[1]+(Y.getTime()==k.getTime()?" "+this._currentClass:"")+(Y.getTime()==b.getTime()?" ui-datepicker-today":""))+'"'+((!bb||G)&&ba[2]?' title="'+ba[2]+'"':"")+(bc?"":' data-handler="selectDay" data-event="click" data-month="'+Y.getMonth()+'" data-year="'+Y.getFullYear()+'"')+">"+(bb&&!G?"&#xa0;":bc?'<span class="ui-state-default">'+Y.getDate()+"</span>":'<a class="ui-state-default'+(Y.getTime()==b.getTime()?" ui-state-highlight":"")+(Y.getTime()==k.getTime()?" ui-state-active":"")+(bb?" ui-priority-secondary":"")+'" href="#">'+Y.getDate()+"</a>")+"</td>",Y.setDate(Y.getDate()+1),Y=this._daylightSavingAdjust(Y)}Q+=_+"</tr>"}n++,n>11&&(n=0,o++),Q+="</tbody></table>"+(j?"</div>"+(g[0]>0&&N==g[1]-1?'<div class="ui-datepicker-row-break"></div>':""):""),M+=Q}K+=M}return K+=x+($.browser.msie&&parseInt($.browser.version,10)<7&&!a.inline?'<iframe src="javascript:false;" class="ui-datepicker-cover" frameborder="0"></iframe>':""),a._keyEvent=!1,K},_generateMonthYearHeader:function(a,b,c,d,e,f,g,h){var i=this._get(a,"changeMonth"),j=this._get(a,"changeYear"),k=this._get(a,"showMonthAfterYear"),l='<div class="ui-datepicker-title">',m="";if(f||!i)m+='<span class="ui-datepicker-month">'+g[b]+"</span>";else{var n=d&&d.getFullYear()==c,o=e&&e.getFullYear()==c;m+='<select class="ui-datepicker-month" data-handler="selectMonth" data-event="change">';for(var p=0;p<12;p++)(!n||p>=d.getMonth())&&(!o||p<=e.getMonth())&&(m+='<option value="'+p+'"'+(p==b?' selected="selected"':"")+">"+h[p]+"</option>");m+="</select>"}k||(l+=m+(f||!i||!j?"&#xa0;":""));if(!a.yearshtml){a.yearshtml="";if(f||!j)l+='<span class="ui-datepicker-year">'+c+"</span>";else{var q=this._get(a,"yearRange").split(":"),r=(new Date).getFullYear(),s=function(a){var b=a.match(/c[+-].*/)?c+parseInt(a.substring(1),10):a.match(/[+-].*/)?r+parseInt(a,10):parseInt(a,10);return isNaN(b)?r:b},t=s(q[0]),u=Math.max(t,s(q[1]||""));t=d?Math.max(t,d.getFullYear()):t,u=e?Math.min(u,e.getFullYear()):u,a.yearshtml+='<select class="ui-datepicker-year" data-handler="selectYear" data-event="change">';for(;t<=u;t++)a.yearshtml+='<option value="'+t+'"'+(t==c?' selected="selected"':"")+">"+t+"</option>";a.yearshtml+="</select>",l+=a.yearshtml,a.yearshtml=null}}return l+=this._get(a,"yearSuffix"),k&&(l+=(f||!i||!j?"&#xa0;":"")+m),l+="</div>",l},_adjustInstDate:function(a,b,c){var d=a.drawYear+(c=="Y"?b:0),e=a.drawMonth+(c=="M"?b:0),f=Math.min(a.selectedDay,this._getDaysInMonth(d,e))+(c=="D"?b:0),g=this._restrictMinMax(a,this._daylightSavingAdjust(new Date(d,e,f)));a.selectedDay=g.getDate(),a.drawMonth=a.selectedMonth=g.getMonth(),a.drawYear=a.selectedYear=g.getFullYear(),(c=="M"||c=="Y")&&this._notifyChange(a)},_restrictMinMax:function(a,b){var c=this._getMinMaxDate(a,"min"),d=this._getMinMaxDate(a,"max"),e=c&&b<c?c:b;return e=d&&e>d?d:e,e},_notifyChange:function(a){var b=this._get(a,"onChangeMonthYear");b&&b.apply(a.input?a.input[0]:null,[a.selectedYear,a.selectedMonth+1,a])},_getNumberOfMonths:function(a){var b=this._get(a,"numberOfMonths");return b==null?[1,1]:typeof b=="number"?[1,b]:b},_getMinMaxDate:function(a,b){return this._determineDate(a,this._get(a,b+"Date"),null)},_getDaysInMonth:function(a,b){return 32-this._daylightSavingAdjust(new Date(a,b,32)).getDate()},_getFirstDayOfMonth:function(a,b){return(new Date(a,b,1)).getDay()},_canAdjustMonth:function(a,b,c,d){var e=this._getNumberOfMonths(a),f=this._daylightSavingAdjust(new Date(c,d+(b<0?b:e[0]*e[1]),1));return b<0&&f.setDate(this._getDaysInMonth(f.getFullYear(),f.getMonth())),this._isInRange(a,f)},_isInRange:function(a,b){var c=this._getMinMaxDate(a,"min"),d=this._getMinMaxDate(a,"max");return(!c||b.getTime()>=c.getTime())&&(!d||b.getTime()<=d.getTime())},_getFormatConfig:function(a){var b=this._get(a,"shortYearCutoff");return b=typeof b!="string"?b:(new Date).getFullYear()%100+parseInt(b,10),{shortYearCutoff:b,dayNamesShort:this._get(a,"dayNamesShort"),dayNames:this._get(a,"dayNames"),monthNamesShort:this._get(a,"monthNamesShort"),monthNames:this._get(a,"monthNames")}},_formatDate:function(a,b,c,d){b||(a.currentDay=a.selectedDay,a.currentMonth=a.selectedMonth,a.currentYear=a.selectedYear);var e=b?typeof b=="object"?b:this._daylightSavingAdjust(new Date(d,c,b)):this._daylightSavingAdjust(new Date(a.currentYear,a.currentMonth,a.currentDay));return this.formatDate(this._get(a,"dateFormat"),e,this._getFormatConfig(a))}}),$.fn.datepicker=function(a){if(!this.length)return this;$.datepicker.initialized||($(document).mousedown($.datepicker._checkExternalClick).find("body").append($.datepicker.dpDiv),$.datepicker.initialized=!0);var b=Array.prototype.slice.call(arguments,1);return typeof a!="string"||a!="isDisabled"&&a!="getDate"&&a!="widget"?a=="option"&&arguments.length==2&&typeof arguments[1]=="string"?$.datepicker["_"+a+"Datepicker"].apply($.datepicker,[this[0]].concat(b)):this.each(function(){typeof a=="string"?$.datepicker["_"+a+"Datepicker"].apply($.datepicker,[this].concat(b)):$.datepicker._attachDatepicker(this,a)}):$.datepicker["_"+a+"Datepicker"].apply($.datepicker,[this[0]].concat(b))},$.datepicker=new Datepicker,$.datepicker.initialized=!1,$.datepicker.uuid=(new Date).getTime(),$.datepicker.version="1.8.23",window["DP_jQuery_"+dpuuid]=$}(jQuery),function(a,b){var c="ui-dialog ui-widget ui-widget-content ui-corner-all ",d={buttons:!0,height:!0,maxHeight:!0,maxWidth:!0,minHeight:!0,minWidth:!0,width:!0},e={maxHeight:!0,maxWidth:!0,minHeight:!0,minWidth:!0};a.widget("ui.dialog",{options:{autoOpen:!0,buttons:{},closeOnEscape:!0,closeText:"close",dialogClass:"",draggable:!0,hide:null,height:"auto",maxHeight:!1,maxWidth:!1,minHeight:150,minWidth:150,modal:!1,position:{my:"center",at:"center",collision:"fit",using:function(b){var c=a(this).css(b).offset().top;c<0&&a(this).css("top",b.top-c)}},resizable:!0,show:null,stack:!0,title:"",width:300,zIndex:1e3},_create:function(){this.originalTitle=this.element.attr("title"),typeof this.originalTitle!="string"&&(this.originalTitle=""),this.options.title=this.options.title||this.originalTitle;var b=this,d=b.options,e=d.title||"&#160;",f=a.ui.dialog.getTitleId(b.element),g=(b.uiDialog=a("<div></div>")).appendTo(document.body).hide().addClass(c+d.dialogClass).css({zIndex:d.zIndex}).attr("tabIndex",-1).css("outline",0).keydown(function(c){d.closeOnEscape&&!c.isDefaultPrevented()&&c.keyCode&&c.keyCode===a.ui.keyCode.ESCAPE&&(b.close(c),c.preventDefault())}).attr({role:"dialog","aria-labelledby":f}).mousedown(function(a){b.moveToTop(!1,a)}),h=b.element.show().removeAttr("title").addClass("ui-dialog-content ui-widget-content").appendTo(g),i=(b.uiDialogTitlebar=a("<div></div>")).addClass("ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix").prependTo(g),j=a('<a href="#"></a>').addClass("ui-dialog-titlebar-close ui-corner-all").attr("role","button").hover(function(){j.addClass("ui-state-hover")},function(){j.removeClass("ui-state-hover")}).focus(function(){j.addClass("ui-state-focus")}).blur(function(){j.removeClass("ui-state-focus")}).click(function(a){return b.close(a),!1}).appendTo(i),k=(b.uiDialogTitlebarCloseText=a("<span></span>")).addClass("ui-icon ui-icon-closethick").text(d.closeText).appendTo(j),l=a("<span></span>").addClass("ui-dialog-title").attr("id",f).html(e).prependTo(i);a.isFunction(d.beforeclose)&&!a.isFunction(d.beforeClose)&&(d.beforeClose=d.beforeclose),i.find("*").add(i).disableSelection(),d.draggable&&a.fn.draggable&&b._makeDraggable(),d.resizable&&a.fn.resizable&&b._makeResizable(),b._createButtons(d.buttons),b._isOpen=!1,a.fn.bgiframe&&g.bgiframe()},_init:function(){this.options.autoOpen&&this.open()},destroy:function(){var a=this;return a.overlay&&a.overlay.destroy(),a.uiDialog.hide(),a.element.unbind(".dialog").removeData("dialog").removeClass("ui-dialog-content ui-widget-content").hide().appendTo("body"),a.uiDialog.remove(),a.originalTitle&&a.element.attr("title",a.originalTitle),a},widget:function(){return this.uiDialog},close:function(b){var c=this,d,e;if(!1===c._trigger("beforeClose",b))return;return c.overlay&&c.overlay.destroy(),c.uiDialog.unbind("keypress.ui-dialog"),c._isOpen=!1,c.options.hide?c.uiDialog.hide(c.options.hide,function(){c._trigger("close",b)}):(c.uiDialog.hide(),c._trigger("close",b)),a.ui.dialog.overlay.resize(),c.options.modal&&(d=0,a(".ui-dialog").each(function(){this!==c.uiDialog[0]&&(e=a(this).css("z-index"),isNaN(e)||(d=Math.max(d,e)))}),a.ui.dialog.maxZ=d),c},isOpen:function(){return this._isOpen},moveToTop:function(b,c){var d=this,e=d.options,f;return e.modal&&!b||!e.stack&&!e.modal?d._trigger("focus",c):(e.zIndex>a.ui.dialog.maxZ&&(a.ui.dialog.maxZ=e.zIndex),d.overlay&&(a.ui.dialog.maxZ+=1,d.overlay.$el.css("z-index",a.ui.dialog.overlay.maxZ=a.ui.dialog.maxZ)),f={scrollTop:d.element.scrollTop(),scrollLeft:d.element.scrollLeft()},a.ui.dialog.maxZ+=1,d.uiDialog.css("z-index",a.ui.dialog.maxZ),d.element.attr(f),d._trigger("focus",c),d)},open:function(){if(this._isOpen)return;var b=this,c=b.options,d=b.uiDialog;return b.overlay=c.modal?new a.ui.dialog.overlay(b):null,b._size(),b._position(c.position),d.show(c.show),b.moveToTop(!0),c.modal&&d.bind("keydown.ui-dialog",function(b){if(b.keyCode!==a.ui.keyCode.TAB)return;var c=a(":tabbable",this),d=c.filter(":first"),e=c.filter(":last");if(b.target===e[0]&&!b.shiftKey)return d.focus(1),!1;if(b.target===d[0]&&b.shiftKey)return e.focus(1),!1}),a(b.element.find(":tabbable").get().concat(d.find(".ui-dialog-buttonpane :tabbable").get().concat(d.get()))).eq(0).focus(),b._isOpen=!0,b._trigger("open"),b},_createButtons:function(b){var c=this,d=!1,e=a("<div></div>").addClass("ui-dialog-buttonpane ui-widget-content ui-helper-clearfix"),f=a("<div></div>").addClass("ui-dialog-buttonset").appendTo(e);c.uiDialog.find(".ui-dialog-buttonpane").remove(),typeof b=="object"&&b!==null&&a.each(b,function(){return!(d=!0)}),d&&(a.each(b,function(b,d){d=a.isFunction(d)?{click:d,text:b}:d;var e=a('<button type="button"></button>').click(function(){d.click.apply(c.element[0],arguments)}).appendTo(f);a.each(d,function(a,b){if(a==="click")return;a in e?e[a](b):e.attr(a,b)}),a.fn.button&&e.button()}),e.appendTo(c.uiDialog))},_makeDraggable:function(){function f(a){return{position:a.position,offset:a.offset}}var b=this,c=b.options,d=a(document),e;b.uiDialog.draggable({cancel:".ui-dialog-content, .ui-dialog-titlebar-close",handle:".ui-dialog-titlebar",containment:"document",start:function(d,g){e=c.height==="auto"?"auto":a(this).height(),a(this).height(a(this).height()).addClass("ui-dialog-dragging"),b._trigger("dragStart",d,f(g))},drag:function(a,c){b._trigger("drag",a,f(c))},stop:function(g,h){c.position=[h.position.left-d.scrollLeft(),h.position.top-d.scrollTop()],a(this).removeClass("ui-dialog-dragging").height(e),b._trigger("dragStop",g,f(h)),a.ui.dialog.overlay.resize()}})},_makeResizable:function(c){function h(a){return{originalPosition:a.originalPosition,originalSize:a.originalSize,position:a.position,size:a.size}}c=c===b?this.options.resizable:c;var d=this,e=d.options,f=d.uiDialog.css("position"),g=typeof c=="string"?c:"n,e,s,w,se,sw,ne,nw";d.uiDialog.resizable({cancel:".ui-dialog-content",containment:"document",alsoResize:d.element,maxWidth:e.maxWidth,maxHeight:e.maxHeight,minWidth:e.minWidth,minHeight:d._minHeight(),handles:g,start:function(b,c){a(this).addClass("ui-dialog-resizing"),d._trigger("resizeStart",b,h(c))},resize:function(a,b){d._trigger("resize",a,h(b))},stop:function(b,c){a(this).removeClass("ui-dialog-resizing"),e.height=a(this).height(),e.width=a(this).width(),d._trigger("resizeStop",b,h(c)),a.ui.dialog.overlay.resize()}}).css("position",f).find(".ui-resizable-se").addClass("ui-icon ui-icon-grip-diagonal-se")},_minHeight:function(){var a=this.options;return a.height==="auto"?a.minHeight:Math.min(a.minHeight,a.height)},_position:function(b){var c=[],d=[0,0],e;if(b){if(typeof b=="string"||typeof b=="object"&&"0"in b)c=b.split?b.split(" "):[b[0],b[1]],c.length===1&&(c[1]=c[0]),a.each(["left","top"],function(a,b){+c[a]===c[a]&&(d[a]=c[a],c[a]=b)}),b={my:c.join(" "),at:c.join(" "),offset:d.join(" ")};b=a.extend({},a.ui.dialog.prototype.options.position,b)}else b=a.ui.dialog.prototype.options.position;e=this.uiDialog.is(":visible"),e||this.uiDialog.show(),this.uiDialog.css({top:0,left:0}).position(a.extend({of:window},b)),e||this.uiDialog.hide()},_setOptions:function(b){var c=this,f={},g=!1;a.each(b,function(a,b){c._setOption(a,b),a in d&&(g=!0),a in e&&(f[a]=b)}),g&&this._size(),this.uiDialog.is(":data(resizable)")&&this.uiDialog.resizable("option",f)},_setOption:function(b,d){var e=this,f=e.uiDialog;switch(b){case"beforeclose":b="beforeClose";break;case"buttons":e._createButtons(d);break;case"closeText":e.uiDialogTitlebarCloseText.text(""+d);break;case"dialogClass":f.removeClass(e.options.dialogClass).addClass(c+d);break;case"disabled":d?f.addClass("ui-dialog-disabled"):f.removeClass("ui-dialog-disabled");break;case"draggable":var g=f.is(":data(draggable)");g&&!d&&f.draggable("destroy"),!g&&d&&e._makeDraggable();break;case"position":e._position(d);break;case"resizable":var h=f.is(":data(resizable)");h&&!d&&f.resizable("destroy"),h&&typeof d=="string"&&f.resizable("option","handles",d),!h&&d!==!1&&e._makeResizable(d);break;case"title":a(".ui-dialog-title",e.uiDialogTitlebar).html(""+(d||"&#160;"))}a.Widget.prototype._setOption.apply(e,arguments)},_size:function(){var b=this.options,c,d,e=this.uiDialog.is(":visible");this.element.show().css({width:"auto",minHeight:0,height:0}),b.minWidth>b.width&&(b.width=b.minWidth),c=this.uiDialog.css({height:"auto",width:b.width}).height(),d=Math.max(0,b.minHeight-c);if(b.height==="auto")if(a.support.minHeight)this.element.css({minHeight:d,height:"auto"});else{this.uiDialog.show();var f=this.element.css("height","auto").height();e||this.uiDialog.hide(),this.element.height(Math.max(f,d))}else this.element.height(Math.max(b.height-c,0));this.uiDialog.is(":data(resizable)")&&this.uiDialog.resizable("option","minHeight",this._minHeight())}}),a.extend(a.ui.dialog,{version:"1.8.23",uuid:0,maxZ:0,getTitleId:function(a){var b=a.attr("id");return b||(this.uuid+=1,b=this.uuid),"ui-dialog-title-"+b},overlay:function(b){this.$el=a.ui.dialog.overlay.create(b)}}),a.extend(a.ui.dialog.overlay,{instances:[],oldInstances:[],maxZ:0,events:a.map("focus,mousedown,mouseup,keydown,keypress,click".split(","),function(a){return a+".dialog-overlay"}).join(" "),create:function(b){this.instances.length===0&&(setTimeout(function(){a.ui.dialog.overlay.instances.length&&a(document).bind(a.ui.dialog.overlay.events,function(b){if(a(b.target).zIndex()<a.ui.dialog.overlay.maxZ)return!1})},1),a(document).bind("keydown.dialog-overlay",function(c){b.options.closeOnEscape&&!c.isDefaultPrevented()&&c.keyCode&&c.keyCode===a.ui.keyCode.ESCAPE&&(b.close(c),c.preventDefault())}),a(window).bind("resize.dialog-overlay",a.ui.dialog.overlay.resize));var c=(this.oldInstances.pop()||a("<div></div>").addClass("ui-widget-overlay")).appendTo(document.body).css({width:this.width(),height:this.height()});return a.fn.bgiframe&&c.bgiframe(),this.instances.push(c),c},destroy:function(b){var c=a.inArray(b,this.instances);c!=-1&&this.oldInstances.push(this.instances.splice(c,1)[0]),this.instances.length===0&&a([document,window]).unbind(".dialog-overlay"),b.remove();var d=0;a.each(this.instances,function(){d=Math.max(d,this.css("z-index"))}),this.maxZ=d},height:function(){var b,c;return a.browser.msie&&a.browser.version<7?(b=Math.max(document.documentElement.scrollHeight,document.body.scrollHeight),c=Math.max(document.documentElement.offsetHeight,document.body.offsetHeight),b<c?a(window).height()+"px":b+"px"):a(document).height()+"px"},width:function(){var b,c;return a.browser.msie?(b=Math.max(document.documentElement.scrollWidth,document.body.scrollWidth),c=Math.max(document.documentElement.offsetWidth,document.body.offsetWidth),b<c?a(window).width()+"px":b+"px"):a(document).width()+"px"},resize:function(){var b=a([]);a.each(a.ui.dialog.overlay.instances,function(){b=b.add(this)}),b.css({width:0,height:0}).css({width:a.ui.dialog.overlay.width(),height:a.ui.dialog.overlay.height()})}}),a.extend(a.ui.dialog.overlay.prototype,{destroy:function(){a.ui.dialog.overlay.destroy(this.$el)}})}(jQuery),function(a,b){a.ui=a.ui||{};var c=/left|center|right/,d=/top|center|bottom/,e="center",f={},g=a.fn.position,h=a.fn.offset;a.fn.position=function(b){if(!b||!b.of)return g.apply(this,arguments);b=a.extend({},b);var h=a(b.of),i=h[0],j=(b.collision||"flip").split(" "),k=b.offset?b.offset.split(" "):[0,0],l,m,n;return i.nodeType===9?(l=h.width(),m=h.height(),n={top:0,left:0}):i.setTimeout?(l=h.width(),m=h.height(),n={top:h.scrollTop(),left:h.scrollLeft()}):i.preventDefault?(b.at="left top",l=m=0,n={top:b.of.pageY,left:b.of.pageX}):(l=h.outerWidth(),m=h.outerHeight(),n=h.offset()),a.each(["my","at"],function(){var a=(b[this]||"").split(" ");a.length===1&&(a=c.test(a[0])?a.concat([e]):d.test(a[0])?[e].concat(a):[e,e]),a[0]=c.test(a[0])?a[0]:e,a[1]=d.test(a[1])?a[1]:e,b[this]=a}),j.length===1&&(j[1]=j[0]),k[0]=parseInt(k[0],10)||0,k.length===1&&(k[1]=k[0]),k[1]=parseInt(k[1],10)||0,b.at[0]==="right"?n.left+=l:b.at[0]===e&&(n.left+=l/2),b.at[1]==="bottom"?n.top+=m:b.at[1]===e&&(n.top+=m/2),n.left+=k[0],n.top+=k[1],this.each(function(){var c=a(this),d=c.outerWidth(),g=c.outerHeight(),h=parseInt(a.curCSS(this,"marginLeft",!0))||0,i=parseInt(a.curCSS(this,"marginTop",!0))||0,o=d+h+(parseInt(a.curCSS(this,"marginRight",!0))||0),p=g+i+(parseInt(a.curCSS(this,"marginBottom",!0))||0),q=a.extend({},n),r;b.my[0]==="right"?q.left-=d:b.my[0]===e&&(q.left-=d/2),b.my[1]==="bottom"?q.top-=g:b.my[1]===e&&(q.top-=g/2),f.fractions||(q.left=Math.round(q.left),q.top=Math.round(q.top)),r={left:q.left-h,top:q.top-i},a.each(["left","top"],function(c,e){a.ui.position[j[c]]&&a.ui.position[j[c]][e](q,{targetWidth:l,targetHeight:m,elemWidth:d,elemHeight:g,collisionPosition:r,collisionWidth:o,collisionHeight:p,offset:k,my:b.my,at:b.at})}),a.fn.bgiframe&&c.bgiframe(),c.offset(a.extend(q,{using:b.using}))})},a.ui.position={fit:{left:function(b,c){var d=a(window),e=c.collisionPosition.left+c.collisionWidth-d.width()-d.scrollLeft();b.left=e>0?b.left-e:Math.max(b.left-c.collisionPosition.left,b.left)},top:function(b,c){var d=a(window),e=c.collisionPosition.top+c.collisionHeight-d.height()-d.scrollTop();b.top=e>0?b.top-e:Math.max(b.top-c.collisionPosition.top,b.top)}},flip:{left:function(b,c){if(c.at[0]===e)return;var d=a(window),f=c.collisionPosition.left+c.collisionWidth-d.width()-d.scrollLeft(),g=c.my[0]==="left"?-c.elemWidth:c.my[0]==="right"?c.elemWidth:0,h=c.at[0]==="left"?c.targetWidth:-c.targetWidth,i=-2*c.offset[0];b.left+=c.collisionPosition.left<0?g+h+i:f>0?g+h+i:0},top:function(b,c){if(c.at[1]===e)return;var d=a(window),f=c.collisionPosition.top+c.collisionHeight-d.height()-d.scrollTop(),g=c.my[1]==="top"?-c.elemHeight:c.my[1]==="bottom"?c.elemHeight:0,h=c.at[1]==="top"?c.targetHeight:-c.targetHeight,i=-2*c.offset[1];b.top+=c.collisionPosition.top<0?g+h+i:f>0?g+h+i:0}}},a.offset.setOffset||(a.offset.setOffset=function(b,c){/static/.test(a.curCSS(b,"position"))&&(b.style.position="relative");var d=a(b),e=d.offset(),f=parseInt(a.curCSS(b,"top",!0),10)||0,g=parseInt(a.curCSS(b,"left",!0),10)||0,h={top:c.top-e.top+f,left:c.left-e.left+g};"using"in c?c.using.call(b,h):d.css(h)},a.fn.offset=function(b){var c=this[0];return!c||!c.ownerDocument?null:b?a.isFunction(b)?this.each(function(c){a(this).offset(b.call(this,c,a(this).offset()))}):this.each(function(){a.offset.setOffset(this,b)}):h.call(this)}),a.curCSS||(a.curCSS=a.css),function(){var b=document.getElementsByTagName("body")[0],c=document.createElement("div"),d,e,g,h,i;d=document.createElement(b?"div":"body"),g={visibility:"hidden",width:0,height:0,border:0,margin:0,background:"none"},b&&a.extend(g,{position:"absolute",left:"-1000px",top:"-1000px"});for(var j in g)d.style[j]=g[j];d.appendChild(c),e=b||document.documentElement,e.insertBefore(d,e.firstChild),c.style.cssText="position: absolute; left: 10.7432222px; top: 10.432325px; height: 30px; width: 201px;",h=a(c).offset(function(a,b){return b}).offset(),d.innerHTML="",e.removeChild(d),i=h.top+h.left+(b?2e3:0),f.fractions=i>21&&i<22}()}(jQuery),function(a,b){a.widget("ui.progressbar",{options:{value:0,max:100},min:0,_create:function(){this.element.addClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").attr({role:"progressbar","aria-valuemin":this.min,"aria-valuemax":this.options.max,"aria-valuenow":this._value()}),this.valueDiv=a("<div class='ui-progressbar-value ui-widget-header ui-corner-left'></div>").appendTo(this.element),this.oldValue=this._value(),this._refreshValue()},destroy:function(){this.element.removeClass("ui-progressbar ui-widget ui-widget-content ui-corner-all").removeAttr("role").removeAttr("aria-valuemin").removeAttr("aria-valuemax").removeAttr("aria-valuenow"),this.valueDiv.remove(),a.Widget.prototype.destroy.apply(this,arguments)},value:function(a){return a===b?this._value():(this._setOption("value",a),this)},_setOption:function(b,c){b==="value"&&(this.options.value=c,this._refreshValue(),this._value()===this.options.max&&this._trigger("complete")),a.Widget.prototype._setOption.apply(this,arguments)},_value:function(){var a=this.options.value;return typeof a!="number"&&(a=0),Math.min(this.options.max,Math.max(this.min,a))},_percentage:function(){return 100*this._value()/this.options.max},_refreshValue:function(){var a=this.value(),b=this._percentage();this.oldValue!==a&&(this.oldValue=a,this._trigger("change")),this.valueDiv.toggle(a>this.min).toggleClass("ui-corner-right",a===this.options.max).width(b.toFixed(0)+"%"),this.element.attr("aria-valuenow",a)}}),a.extend(a.ui.progressbar,{version:"1.8.23"})}(jQuery),function(a,b){var c=5;a.widget("ui.slider",a.ui.mouse,{widgetEventPrefix:"slide",options:{animate:!1,distance:0,max:100,min:0,orientation:"horizontal",range:!1,step:1,value:0,values:null},_create:function(){var b=this,d=this.options,e=this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),f="<a class='ui-slider-handle ui-state-default ui-corner-all' href='#'></a>",g=d.values&&d.values.length||1,h=[];this._keySliding=!1,this._mouseSliding=!1,this._animateOff=!0,this._handleIndex=null,this._detectOrientation(),this._mouseInit(),this.element.addClass("ui-slider ui-slider-"+this.orientation+" ui-widget"+" ui-widget-content"+" ui-corner-all"+(d.disabled?" ui-slider-disabled ui-disabled":"")),this.range=a([]),d.range&&(d.range===!0&&(d.values||(d.values=[this._valueMin(),this._valueMin()]),d.values.length&&d.values.length!==2&&(d.values=[d.values[0],d.values[0]])),this.range=a("<div></div>").appendTo(this.element).addClass("ui-slider-range ui-widget-header"+(d.range==="min"||d.range==="max"?" ui-slider-range-"+d.range:"")));for(var i=e.length;i<g;i+=1)h.push(f);this.handles=e.add(a(h.join("")).appendTo(b.element)),this.handle=this.handles.eq(0),this.handles.add(this.range).filter("a").click(function(a){a.preventDefault()}).hover(function(){d.disabled||a(this).addClass("ui-state-hover")},function(){a(this).removeClass("ui-state-hover")}).focus(function(){d.disabled?a(this).blur():(a(".ui-slider .ui-state-focus").removeClass("ui-state-focus"),a(this).addClass("ui-state-focus"))}).blur(function(){a(this).removeClass("ui-state-focus")}),this.handles.each(function(b){a(this).data("index.ui-slider-handle",b)}),this.handles.keydown(function(d){var e=a(this).data("index.ui-slider-handle"),f,g,h,i;if(b.options.disabled)return;switch(d.keyCode){case a.ui.keyCode.HOME:case a.ui.keyCode.END:case a.ui.keyCode.PAGE_UP:case a.ui.keyCode.PAGE_DOWN:case a.ui.keyCode.UP:case a.ui.keyCode.RIGHT:case a.ui.keyCode.DOWN:case a.ui.keyCode.LEFT:d.preventDefault();if(!b._keySliding){b._keySliding=!0,a(this).addClass("ui-state-active"),f=b._start(d,e);if(f===!1)return}}i=b.options.step,b.options.values&&b.options.values.length?g=h=b.values(e):g=h=b.value();switch(d.keyCode){case a.ui.keyCode.HOME:h=b._valueMin();break;case a.ui.keyCode.END:h=b._valueMax();break;case a.ui.keyCode.PAGE_UP:h=b._trimAlignValue(g+(b._valueMax()-b._valueMin())/c);break;case a.ui.keyCode.PAGE_DOWN:h=b._trimAlignValue(g-(b._valueMax()-b._valueMin())/c);break;case a.ui.keyCode.UP:case a.ui.keyCode.RIGHT:if(g===b._valueMax())return;h=b._trimAlignValue(g+i);break;case a.ui.keyCode.DOWN:case a.ui.keyCode.LEFT:if(g===b._valueMin())return;h=b._trimAlignValue(g-i)}b._slide(d,e,h)}).keyup(function(c){var d=a(this).data("index.ui-slider-handle");b._keySliding&&(b._keySliding=!1,b._stop(c,d),b._change(c,d),a(this).removeClass("ui-state-active"))}),this._refreshValue(),this._animateOff=!1},destroy:function(){return this.handles.remove(),this.range.remove(),this.element.removeClass("ui-slider ui-slider-horizontal ui-slider-vertical ui-slider-disabled ui-widget ui-widget-content ui-corner-all").removeData("slider").unbind(".slider"),this._mouseDestroy(),this},_mouseCapture:function(b){var c=this.options,d,e,f,g,h,i,j,k,l;return c.disabled?!1:(this.elementSize={width:this.element.outerWidth(),height:this.element.outerHeight()},this.elementOffset=this.element.offset(),d={x:b.pageX,y:b.pageY},e=this._normValueFromMouse(d),f=this._valueMax()-this._valueMin()+1,h=this,this.handles.each(function(b){var c=Math.abs(e-h.values(b));f>c&&(f=c,g=a(this),i=b)}),c.range===!0&&this.values(1)===c.min&&(i+=1,g=a(this.handles[i])),j=this._start(b,i),j===!1?!1:(this._mouseSliding=!0,h._handleIndex=i,g.addClass("ui-state-active").focus(),k=g.offset(),l=!a(b.target).parents().andSelf().is(".ui-slider-handle"),this._clickOffset=l?{left:0,top:0}:{left:b.pageX-k.left-g.width()/2,top:b.pageY-k.top-g.height()/2-(parseInt(g.css("borderTopWidth"),10)||0)-(parseInt(g.css("borderBottomWidth"),10)||0)+(parseInt(g.css("marginTop"),10)||0)},this.handles.hasClass("ui-state-hover")||this._slide(b,i,e),this._animateOff=!0,!0))},_mouseStart:function(a){return!0},_mouseDrag:function(a){var b={x:a.pageX,y:a.pageY},c=this._normValueFromMouse(b);return this._slide(a,this._handleIndex,c),!1},_mouseStop:function(a){return this.handles.removeClass("ui-state-active"),this._mouseSliding=!1,this._stop(a,this._handleIndex),this._change(a,this._handleIndex),this._handleIndex=null,this._clickOffset=null,this._animateOff=!1,!1},_detectOrientation:function(){this.orientation=this.options.orientation==="vertical"?"vertical":"horizontal"},_normValueFromMouse:function(a){var b,c,d,e,f;return this.orientation==="horizontal"?(b=this.elementSize.width,c=a.x-this.elementOffset.left-(this._clickOffset?this._clickOffset.left:0)):(b=this.elementSize.height,c=a.y-this.elementOffset.top-(this._clickOffset?this._clickOffset.top:0)),d=c/b,d>1&&(d=1),d<0&&(d=0),this.orientation==="vertical"&&(d=1-d),e=this._valueMax()-this._valueMin(),f=this._valueMin()+d*e,this._trimAlignValue(f)},_start:function(a,b){var c={handle:this.handles[b],value:this.value()};return this.options.values&&this.options.values.length&&(c.value=this.values(b),c.values=this.values()),this._trigger("start",a,c)},_slide:function(a,b,c){var d,e,f;this.options.values&&this.options.values.length?(d=this.values(b?0:1),this.options.values.length===2&&this.options.range===!0&&(b===0&&c>d||b===1&&c<d)&&(c=d),c!==this.values(b)&&(e=this.values(),e[b]=c,f=this._trigger("slide",a,{handle:this.handles[b],value:c,values:e}),d=this.values(b?0:1),f!==!1&&this.values(b,c,!0))):c!==this.value()&&(f=this._trigger("slide",a,{handle:this.handles[b],value:c}),f!==!1&&this.value(c))},_stop:function(a,b){var c={handle:this.handles[b],value:this.value()};this.options.values&&this.options.values.length&&(c.value=this.values(b),c.values=this.values()),this._trigger("stop",a,c)},_change:function(a,b){if(!this._keySliding&&!this._mouseSliding){var c={handle:this.handles[b],value:this.value()};this.options.values&&this.options.values.length&&(c.value=this.values(b),c.values=this.values()),this._trigger("change",a,c)}},value:function(a){if(arguments.length){this.options.value=this._trimAlignValue(a),this._refreshValue(),this._change(null,0);return}return this._value()},values:function(b,c){var d,e,f;if(arguments.length>1){this.options.values[b]=this._trimAlignValue(c),this._refreshValue(),this._change(null,b);return}if(!arguments.length)return this._values();if(!a.isArray(arguments[0]))return this.options.values&&this.options.values.length?this._values(b):this.value();d=this.options.values,e=arguments[0];for(f=0;f<d.length;f+=1)d[f]=this._trimAlignValue(e[f]),this._change(null,f);this._refreshValue()},_setOption:function(b,c){var d,e=0;a.isArray(this.options.values)&&(e=this.options.values.length),a.Widget.prototype._setOption.apply(this,arguments);switch(b){case"disabled":c?(this.handles.filter(".ui-state-focus").blur(),this.handles.removeClass("ui-state-hover"),this.handles.propAttr("disabled",!0),this.element.addClass("ui-disabled")):(this.handles.propAttr("disabled",!1),this.element.removeClass("ui-disabled"));break;case"orientation":this._detectOrientation(),this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-"+this.orientation),this._refreshValue();break;case"value":this._animateOff=!0,this._refreshValue(),this._change(null,0),this._animateOff=!1;break;case"values":this._animateOff=!0,this._refreshValue();for(d=0;d<e;d+=1)this._change(null,d);this._animateOff=!1}},_value:function(){var a=this.options.value;return a=this._trimAlignValue(a),a},_values:function(a){var b,c,d;if(arguments.length)return b=this.options.values[a],b=this._trimAlignValue(b),b;c=this.options.values.slice();for(d=0;d<c.length;d+=1)c[d]=this._trimAlignValue(c[d]);return c},_trimAlignValue:function(a){if(a<=this._valueMin())return this._valueMin();if(a>=this._valueMax())return this._valueMax();var b=this.options.step>0?this.options.step:1,c=(a-this._valueMin())%b,d=a-c;return Math.abs(c)*2>=b&&(d+=c>0?b:-b),parseFloat(d.toFixed(5))},_valueMin:function(){return this.options.min},_valueMax:function(){return this.options.max},_refreshValue:function(){var b=this.options.range,c=this.options,d=this,e=this._animateOff?!1:c.animate,f,g={},h,i,j,k;this.options.values&&this.options.values.length?this.handles.each(function(b,i){f=(d.values(b)-d._valueMin())/(d._valueMax()-d._valueMin())*100,g[d.orientation==="horizontal"?"left":"bottom"]=f+"%",a(this).stop(1,1)[e?"animate":"css"](g,c.animate),d.options.range===!0&&(d.orientation==="horizontal"?(b===0&&d.range.stop(1,1)[e?"animate":"css"]({left:f+"%"},c.animate),b===1&&d.range[e?"animate":"css"]({width:f-h+"%"},{queue:!1,duration:c.animate})):(b===0&&d.range.stop(1,1)[e?"animate":"css"]({bottom:f+"%"},c.animate),b===1&&d.range[e?"animate":"css"]({height:f-h+"%"},{queue:!1,duration:c.animate}))),h=f}):(i=this.value(),j=this._valueMin(),k=this._valueMax(),f=k!==j?(i-j)/(k-j)*100:0,g[d.orientation==="horizontal"?"left":"bottom"]=f+"%",this.handle.stop(1,1)[e?"animate":"css"](g,c.animate),b==="min"&&this.orientation==="horizontal"&&this.range.stop(1,1)[e?"animate":"css"]({width:f+"%"},c.animate),b==="max"&&this.orientation==="horizontal"&&this.range[e?"animate":"css"]({width:100-f+"%"},{queue:!1,duration:c.animate}),b==="min"&&this.orientation==="vertical"&&this.range.stop(1,1)[e?"animate":"css"]({height:f+"%"},c.animate),b==="max"&&this.orientation==="vertical"&&this.range[e?"animate":"css"]({height:100-f+"%"},{queue:!1,duration:c.animate}))}}),a.extend(a.ui.slider,{version:"1.8.23"})}(jQuery),function(a,b){function e(){return++c}function f(){return++d}var c=0,d=0;a.widget("ui.tabs",{options:{add:null,ajaxOptions:null,cache:!1,cookie:null,collapsible:!1,disable:null,disabled:[],enable:null,event:"click",fx:null,idPrefix:"ui-tabs-",load:null,panelTemplate:"<div></div>",remove:null,select:null,show:null,spinner:"<em>Loading&#8230;</em>",tabTemplate:"<li><a href='#{href}'><span>#{label}</span></a></li>"},_create:function(){this._tabify(!0)},_setOption:function(a,b){if(a=="selected"){if(this.options.collapsible&&b==this.options.selected)return;this.select(b)}else this.options[a]=b,this._tabify()},_tabId:function(a){return a.title&&a.title.replace(/\s/g,"_").replace(/[^\w\u00c0-\uFFFF-]/g,"")||this.options.idPrefix+e()},_sanitizeSelector:function(a){return a.replace(/:/g,"\\:")},_cookie:function(){var b=this.cookie||(this.cookie=this.options.cookie.name||"ui-tabs-"+f());return a.cookie.apply(null,[b].concat(a.makeArray(arguments)))},_ui:function(a,b){return{tab:a,panel:b,index:this.anchors.index(a)}},_cleanup:function(){this.lis.filter(".ui-state-processing").removeClass("ui-state-processing").find("span:data(label.tabs)").each(function(){var b=a(this);b.html(b.data("label.tabs")).removeData("label.tabs")})},_tabify:function(c){function m(b,c){b.css("display",""),!a.support.opacity&&c.opacity&&b[0].style.removeAttribute("filter")}var d=this,e=this.options,f=/^#.+/;this.list=this.element.find("ol,ul").eq(0),this.lis=a(" > li:has(a[href])",this.list),this.anchors=this.lis.map(function(){return a("a",this)[0]}),this.panels=a([]),this.anchors.each(function(b,c){var g=a(c).attr("href"),h=g.split("#")[0],i;h&&(h===location.toString().split("#")[0]||(i=a("base")[0])&&h===i.href)&&(g=c.hash,c.href=g);if(f.test(g))d.panels=d.panels.add(d.element.find(d._sanitizeSelector(g)));else if(g&&g!=="#"){a.data(c,"href.tabs",g),a.data(c,"load.tabs",g.replace(/#.*$/,""));var j=d._tabId(c);c.href="#"+j;var k=d.element.find("#"+j);k.length||(k=a(e.panelTemplate).attr("id",j).addClass("ui-tabs-panel ui-widget-content ui-corner-bottom").insertAfter(d.panels[b-1]||d.list),k.data("destroy.tabs",!0)),d.panels=d.panels.add(k)}else e.disabled.push(b)}),c?(this.element.addClass("ui-tabs ui-widget ui-widget-content ui-corner-all"),this.list.addClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"),this.lis.addClass("ui-state-default ui-corner-top"),this.panels.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom"),e.selected===b?(location.hash&&this.anchors.each(function(a,b){if(b.hash==location.hash)return e.selected=a,!1}),typeof e.selected!="number"&&e.cookie&&(e.selected=parseInt(d._cookie(),10)),typeof e.selected!="number"&&this.lis.filter(".ui-tabs-selected").length&&(e.selected=this.lis.index(this.lis.filter(".ui-tabs-selected"))),e.selected=e.selected||(this.lis.length?0:-1)):e.selected===null&&(e.selected=-1),e.selected=e.selected>=0&&this.anchors[e.selected]||e.selected<0?e.selected:0,e.disabled=a.unique(e.disabled.concat(a.map(this.lis.filter(".ui-state-disabled"),function(a,b){return d.lis.index(a)}))).sort(),a.inArray(e.selected,e.disabled)!=-1&&e.disabled.splice(a.inArray(e.selected,e.disabled),1),this.panels.addClass("ui-tabs-hide"),this.lis.removeClass("ui-tabs-selected ui-state-active"),e.selected>=0&&this.anchors.length&&(d.element.find(d._sanitizeSelector(d.anchors[e.selected].hash)).removeClass("ui-tabs-hide"),this.lis.eq(e.selected).addClass("ui-tabs-selected ui-state-active"),d.element.queue("tabs",function(){d._trigger("show",null,d._ui(d.anchors[e.selected],d.element.find(d._sanitizeSelector(d.anchors[e.selected].hash))[0]))}),this.load(e.selected)),a(window).bind("unload",function(){d.lis.add(d.anchors).unbind(".tabs"),d.lis=d.anchors=d.panels=null})):e.selected=this.lis.index(this.lis.filter(".ui-tabs-selected")),this.element[e.collapsible?"addClass":"removeClass"]("ui-tabs-collapsible"),e.cookie&&this._cookie(e.selected,e.cookie);for(var g=0,h;h=this.lis[g];g++)a(h)[a.inArray(g,e.disabled)!=-1&&!a(h).hasClass("ui-tabs-selected")?"addClass":"removeClass"]("ui-state-disabled");e.cache===!1&&this.anchors.removeData("cache.tabs"),this.lis.add(this.anchors).unbind(".tabs");if(e.event!=="mouseover"){var i=function(a,b){b.is(":not(.ui-state-disabled)")&&b.addClass("ui-state-"+a)},j=function(a,b){b.removeClass("ui-state-"+a)};this.lis.bind("mouseover.tabs",function(){i("hover",a(this))}),this.lis.bind("mouseout.tabs",function(){j("hover",a(this))}),this.anchors.bind("focus.tabs",function(){i("focus",a(this).closest("li"))}),this.anchors.bind("blur.tabs",function(){j("focus",a(this).closest("li"))})}var k,l;e.fx&&(a.isArray(e.fx)?(k=e.fx[0],l=e.fx[1]):k=l=e.fx);var n=l?function(b,c){a(b).closest("li").addClass("ui-tabs-selected ui-state-active"),c.hide().removeClass("ui-tabs-hide").animate(l,l.duration||"normal",function(){m(c,l),d._trigger("show",null,d._ui(b,c[0]))})}:function(b,c){a(b).closest("li").addClass("ui-tabs-selected ui-state-active"),c.removeClass("ui-tabs-hide"),d._trigger("show",null,d._ui(b,c[0]))},o=k?function(a,b){b.animate(k,k.duration||"normal",function(){d.lis.removeClass("ui-tabs-selected ui-state-active"),b.addClass("ui-tabs-hide"),m(b,k),d.element.dequeue("tabs")})}:function(a,b,c){d.lis.removeClass("ui-tabs-selected ui-state-active"),b.addClass("ui-tabs-hide"),d.element.dequeue("tabs")};this.anchors.bind(e.event+".tabs",function(){var b=this,c=a(b).closest("li"),f=d.panels.filter(":not(.ui-tabs-hide)"),g=d.element.find(d._sanitizeSelector(b.hash));if(c.hasClass("ui-tabs-selected")&&!e.collapsible||c.hasClass("ui-state-disabled")||c.hasClass("ui-state-processing")||d.panels.filter(":animated").length||d._trigger("select",null,d._ui(this,g[0]))===!1)return this.blur(),!1;e.selected=d.anchors.index(this),d.abort();if(e.collapsible){if(c.hasClass("ui-tabs-selected"))return e.selected=-1,e.cookie&&d._cookie(e.selected,e.cookie),d.element.queue("tabs",function(){o(b,f)}).dequeue("tabs"),this.blur(),!1;if(!f.length)return e.cookie&&d._cookie(e.selected,e.cookie),d.element.queue("tabs",function(){n(b,g)}),d.load(d.anchors.index(this)),this.blur(),!1}e.cookie&&d._cookie(e.selected,e.cookie);if(g.length)f.length&&d.element.queue("tabs",function(){o(b,f)}),d.element.queue("tabs",function(){n(b,g)}),d.load(d.anchors.index(this));else throw"jQuery UI Tabs: Mismatching fragment identifier.";a.browser.msie&&this.blur()}),this.anchors.bind("click.tabs",function(){return!1})},_getIndex:function(a){return typeof a=="string"&&(a=this.anchors.index(this.anchors.filter("[href$='"+a+"']"))),a},destroy:function(){var b=this.options;return this.abort(),this.element.unbind(".tabs").removeClass("ui-tabs ui-widget ui-widget-content ui-corner-all ui-tabs-collapsible").removeData("tabs"),this.list.removeClass("ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all"),this.anchors.each(function(){var b=a.data(this,"href.tabs");b&&(this.href=b);var c=a(this).unbind(".tabs");a.each(["href","load","cache"],function(a,b){c.removeData(b+".tabs")})}),this.lis.unbind(".tabs").add(this.panels).each(function(){a.data(this,"destroy.tabs")?a(this).remove():a(this).removeClass(["ui-state-default","ui-corner-top","ui-tabs-selected","ui-state-active","ui-state-hover","ui-state-focus","ui-state-disabled","ui-tabs-panel","ui-widget-content","ui-corner-bottom","ui-tabs-hide"].join(" "))}),b.cookie&&this._cookie(null,b.cookie),this},add:function(c,d,e){e===b&&(e=this.anchors.length);var f=this,g=this.options,h=a(g.tabTemplate.replace(/#\{href\}/g,c).replace(/#\{label\}/g,d)),i=c.indexOf("#")?this._tabId(a("a",h)[0]):c.replace("#","");h.addClass("ui-state-default ui-corner-top").data("destroy.tabs",!0);var j=f.element.find("#"+i);return j.length||(j=a(g.panelTemplate).attr("id",i).data("destroy.tabs",!0)),j.addClass("ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide"),e>=this.lis.length?(h.appendTo(this.list),j.appendTo(this.list[0].parentNode)):(h.insertBefore(this.lis[e]),j.insertBefore(this.panels[e])),g.disabled=a.map(g.disabled,function(a,b){return a>=e?++a:a}),this._tabify(),this.anchors.length==1&&(g.selected=0,h.addClass("ui-tabs-selected ui-state-active"),j.removeClass("ui-tabs-hide"),this.element.queue("tabs",function(){f._trigger("show",null,f._ui(f.anchors[0],f.panels[0]))}),this.load(0)),this._trigger("add",null,this._ui(this.anchors[e],this.panels[e])),this},remove:function(b){b=this._getIndex(b);var c=this.options,d=this.lis.eq(b).remove(),e=this.panels.eq(b).remove();return d.hasClass("ui-tabs-selected")&&this.anchors.length>1&&this.select(b+(b+1<this.anchors.length?1:-1)),c.disabled=a.map(a.grep(c.disabled,function(a,c){return a!=b}),function(a,c){return a>=b?--a:a}),this._tabify(),this._trigger("remove",null,this._ui(d.find("a")[0],e[0])),this},enable:function(b){b=this._getIndex(b);var c=this.options;if(a.inArray(b,c.disabled)==-1)return;return this.lis.eq(b).removeClass("ui-state-disabled"),c.disabled=a.grep(c.disabled,function(a,c){return a!=b}),this._trigger("enable",null,this._ui(this.anchors[b],this.panels[b])),this},disable:function(a){a=this._getIndex(a);var b=this,c=this.options;return a!=c.selected&&(this.lis.eq(a).addClass("ui-state-disabled"),c.disabled.push(a),c.disabled.sort(),this._trigger("disable",null,this._ui(this.anchors[a],this.panels[a]))),this},select:function(a){a=this._getIndex(a);if(a==-1)if(this.options.collapsible&&this.options.selected!=-1)a=this.options.selected;else return this;return this.anchors.eq(a).trigger(this.options.event+".tabs"),this},load:function(b){b=this._getIndex(b);var c=this,d=this.options,e=this.anchors.eq(b)[0],f=a.data(e,"load.tabs");this.abort();if(!f||this.element.queue("tabs").length!==0&&a.data(e,"cache.tabs")){this.element.dequeue("tabs");return}this.lis.eq(b).addClass("ui-state-processing");if(d.spinner){var g=a("span",e);g.data("label.tabs",g.html()).html(d.spinner)}return this.xhr=a.ajax(a.extend({},d.ajaxOptions,{url:f,success:function(f,g){c.element.find(c._sanitizeSelector(e.hash)).html(f),c._cleanup(),d.cache&&a.data(e,"cache.tabs",!0),c._trigger("load",null,c._ui(c.anchors[b],c.panels[b]));try{d.ajaxOptions.success(f,g)}catch(h){}},error:function(a,f,g){c._cleanup(),c._trigger("load",null,c._ui(c.anchors[b],c.panels[b]));try{d.ajaxOptions.error(a,f,b,e)}catch(g){}}})),c.element.dequeue("tabs"),this},abort:function(){return this.element.queue([]),this.panels.stop(!1,!0),this.element.queue("tabs",this.element.queue("tabs").splice(-2,2)),this.xhr&&(this.xhr.abort(),delete this.xhr),this._cleanup(),this},url:function(a,b){return this.anchors.eq(a).removeData("cache.tabs").data("load.tabs",b),this},length:function(){return this.anchors.length}}),a.extend(a.ui.tabs,{version:"1.8.23"}),a.extend(a.ui.tabs.prototype,{rotation:null,rotate:function(a,b){var c=this,d=this.options,e=c._rotate||(c._rotate=function(b){clearTimeout(c.rotation),c.rotation=setTimeout(function(){var a=d.selected;c.select(++a<c.anchors.length?a:0)},a),b&&b.stopPropagation()}),f=c._unrotate||(c._unrotate=b?function(a){e()}:function(a){a.clientX&&c.rotate(null)});return a?(this.element.bind("tabsshow",e),this.anchors.bind(d.event+".tabs",f),e()):(clearTimeout(c.rotation),this.element.unbind("tabsshow",e),this.anchors.unbind(d.event+".tabs",f),delete this._rotate,delete this._unrotate),this}})}(jQuery);// ColorBox v1.3.19 - jQuery lightbox plugin
// (c) 2011 Jack Moore - jacklmoore.com
// License: http://www.opensource.org/licenses/mit-license.php
(function ($, document, window) {
    var
    // Default settings object.	
    // See http://jacklmoore.com/colorbox for details.
    defaults = {
        transition: "elastic",
        speed: 300,
        width: false,
        initialWidth: "600",
        innerWidth: false,
        maxWidth: false,
        height: false,
        initialHeight: "450",
        innerHeight: false,
        maxHeight: false,
        scalePhotos: true,
        scrolling: true,
        inline: false,
        html: false,
        iframe: false,
        fastIframe: true,
        photo: false,
        href: false,
        title: false,
        rel: false,
        opacity: 0.9,
        preloading: true,
        current: "image {current} of {total}",
        previous: "previous",
        next: "next",
        close: "close",
        open: false,
        returnFocus: true,
        reposition: true,
        loop: true,
        slideshow: false,
        slideshowAuto: true,
        slideshowSpeed: 2500,
        slideshowStart: "start slideshow",
        slideshowStop: "stop slideshow",
        onOpen: false,
        onLoad: false,
        onComplete: false,
        onCleanup: false,
        onClosed: false,
        overlayClose: true,		
        escKey: true,
        arrowKey: true,
        top: false,
        bottom: false,
        left: false,
        right: false,
        fixed: false,
        data: undefined
    },
	
    // Abstracting the HTML and event identifiers for easy rebranding
    colorbox = 'colorbox',
    prefix = 'cbox',
    boxElement = prefix + 'Element',
    
    // Events	
    event_open = prefix + '_open',
    event_load = prefix + '_load',
    event_complete = prefix + '_complete',
    event_cleanup = prefix + '_cleanup',
    event_closed = prefix + '_closed',
    event_purge = prefix + '_purge',
    
    // Special Handling for IE
    isIE = !$.support.opacity && !$.support.style, // IE7 & IE8
    isIE6 = isIE && !window.XMLHttpRequest, // IE6
    event_ie6 = prefix + '_IE6',

    // Cached jQuery Object Variables
    $overlay,
    $box,
    $wrap,
    $content,
    $topBorder,
    $leftBorder,
    $rightBorder,
    $bottomBorder,
    $related,
    $window,
    $loaded,
    $loadingBay,
    $loadingOverlay,
    $title,
    $current,
    $slideshow,
    $next,
    $prev,
    $close,
    $groupControls,
    
    // Variables for cached values or use across multiple functions
    settings,
    interfaceHeight,
    interfaceWidth,
    loadedHeight,
    loadedWidth,
    element,
    index,
    photo,
    open,
    active,
    closing,
    loadingTimer,
    publicMethod,
    div = "div",
    init;

	// ****************
	// HELPER FUNCTIONS
	// ****************
    
	// Convience function for creating new jQuery objects
    function $tag(tag, id, css) {
		var element = document.createElement(tag);

		if (id) {
			element.id = prefix + id;
		}

		if (css) {
			element.style.cssText = css;
		}

		return $(element);
    }

	// Determine the next and previous members in a group.
	function getIndex(increment) {
		var 
		max = $related.length, 
		newIndex = (index + increment) % max;
		
		return (newIndex < 0) ? max + newIndex : newIndex;
	}

	// Convert '%' and 'px' values to integers
	function setSize(size, dimension) {
		return Math.round((/%/.test(size) ? ((dimension === 'x' ? $window.width() : $window.height()) / 100) : 1) * parseInt(size, 10));
	}
	
	// Checks an href to see if it is a photo.
	// There is a force photo option (photo: true) for hrefs that cannot be matched by this regex.
	function isImage(url) {
		return settings.photo || /\.(gif|png|jpe?g|bmp|ico)((#|\?).*)?$/i.test(url);
	}
	
	// Assigns function results to their respective properties
	function makeSettings() {
        var i;
        settings = $.extend({}, $.data(element, colorbox));
        
		for (i in settings) {
			if ($.isFunction(settings[i]) && i.slice(0, 2) !== 'on') { // checks to make sure the function isn't one of the callbacks, they will be handled at the appropriate time.
			    settings[i] = settings[i].call(element);
			}
		}
        
		settings.rel = settings.rel || element.rel || 'nofollow';
		settings.href = settings.href || $(element).attr('href');
		settings.title = settings.title || element.title;
        
        if (typeof settings.href === "string") {
            settings.href = $.trim(settings.href);
        }
	}

	function trigger(event, callback) {
		$.event.trigger(event);
		if (callback) {
			callback.call(element);
		}
	}

	// Slideshow functionality
	function slideshow() {
		var
		timeOut,
		className = prefix + "Slideshow_",
		click = "click." + prefix,
		start,
		stop,
		clear;
		
		if (settings.slideshow && $related[1]) {
			start = function () {
				$slideshow
					.text(settings.slideshowStop)
					.unbind(click)
					.bind(event_complete, function () {
						if (settings.loop || $related[index + 1]) {
							timeOut = setTimeout(publicMethod.next, settings.slideshowSpeed);
						}
					})
					.bind(event_load, function () {
						clearTimeout(timeOut);
					})
					.one(click + ' ' + event_cleanup, stop);
				$box.removeClass(className + "off").addClass(className + "on");
				timeOut = setTimeout(publicMethod.next, settings.slideshowSpeed);
			};
			
			stop = function () {
				clearTimeout(timeOut);
				$slideshow
					.text(settings.slideshowStart)
					.unbind([event_complete, event_load, event_cleanup, click].join(' '))
					.one(click, function () {
						publicMethod.next();
						start();
					});
				$box.removeClass(className + "on").addClass(className + "off");
			};
			
			if (settings.slideshowAuto) {
				start();
			} else {
				stop();
			}
		} else {
            $box.removeClass(className + "off " + className + "on");
        }
	}

	function launch(target) {
		if (!closing) {
			
			element = target;
			
			makeSettings();
			
			$related = $(element);
			
			index = 0;
			
			if (settings.rel !== 'nofollow') {
				$related = $('.' + boxElement).filter(function () {
					var relRelated = $.data(this, colorbox).rel || this.rel;
					return (relRelated === settings.rel);
				});
				index = $related.index(element);
				
				// Check direct calls to ColorBox.
				if (index === -1) {
					$related = $related.add(element);
					index = $related.length - 1;
				}
			}
			
			if (!open) {
				open = active = true; // Prevents the page-change action from queuing up if the visitor holds down the left or right keys.
				
				$box.show();
				
				if (settings.returnFocus) {
					$(element).blur().one(event_closed, function () {
						$(this).focus();
					});
				}
				
				// +settings.opacity avoids a problem in IE when using non-zero-prefixed-string-values, like '.5'
				$overlay.css({"opacity": +settings.opacity, "cursor": settings.overlayClose ? "pointer" : "auto"}).show();
				
				// Opens inital empty ColorBox prior to content being loaded.
				settings.w = setSize(settings.initialWidth, 'x');
				settings.h = setSize(settings.initialHeight, 'y');
				publicMethod.position();
				
				if (isIE6) {
					$window.bind('resize.' + event_ie6 + ' scroll.' + event_ie6, function () {
						$overlay.css({width: $window.width(), height: $window.height(), top: $window.scrollTop(), left: $window.scrollLeft()});
					}).trigger('resize.' + event_ie6);
				}
				
				trigger(event_open, settings.onOpen);
				
				$groupControls.add($title).hide();
				
				$close.html(settings.close).show();
			}
			
			publicMethod.load(true);
		}
	}

	// ColorBox's markup needs to be added to the DOM prior to being called
	// so that the browser will go ahead and load the CSS background images.
	function appendHTML() {
		if (!$box && document.body) {
			init = false;

			$window = $(window);
			$box = $tag(div).attr({id: colorbox, 'class': isIE ? prefix + (isIE6 ? 'IE6' : 'IE') : ''}).hide();
			$overlay = $tag(div, "Overlay", isIE6 ? 'position:absolute' : '').hide();
			$wrap = $tag(div, "Wrapper");
			$content = $tag(div, "Content").append(
				$loaded = $tag(div, "LoadedContent", 'width:0; height:0; overflow:hidden'),
				$loadingOverlay = $tag(div, "LoadingOverlay").add($tag(div, "LoadingGraphic")),
				$title = $tag(div, "Title"),
				$current = $tag(div, "Current"),
				$next = $tag(div, "Next"),
				$prev = $tag(div, "Previous"),
				$slideshow = $tag(div, "Slideshow").bind(event_open, slideshow),
				$close = $tag(div, "Close")
			);
			
			$wrap.append( // The 3x3 Grid that makes up ColorBox
				$tag(div).append(
					$tag(div, "TopLeft"),
					$topBorder = $tag(div, "TopCenter"),
					$tag(div, "TopRight")
				),
				$tag(div, false, 'clear:left').append(
					$leftBorder = $tag(div, "MiddleLeft"),
					$content,
					$rightBorder = $tag(div, "MiddleRight")
				),
				$tag(div, false, 'clear:left').append(
					$tag(div, "BottomLeft"),
					$bottomBorder = $tag(div, "BottomCenter"),
					$tag(div, "BottomRight")
				)
			).find('div div').css({'float': 'left'});
			
			$loadingBay = $tag(div, false, 'position:absolute; width:9999px; visibility:hidden; display:none');
			
			$groupControls = $next.add($prev).add($current).add($slideshow);

			$(document.body).append($overlay, $box.append($wrap, $loadingBay));
		}
	}

	// Add ColorBox's event bindings
	function addBindings() {
		if ($box) {
			if (!init) {
				init = true;

				// Cache values needed for size calculations
				interfaceHeight = $topBorder.height() + $bottomBorder.height() + $content.outerHeight(true) - $content.height();//Subtraction needed for IE6
				interfaceWidth = $leftBorder.width() + $rightBorder.width() + $content.outerWidth(true) - $content.width();
				loadedHeight = $loaded.outerHeight(true);
				loadedWidth = $loaded.outerWidth(true);
				
				// Setting padding to remove the need to do size conversions during the animation step.
				$box.css({"padding-bottom": interfaceHeight, "padding-right": interfaceWidth});

				// Anonymous functions here keep the public method from being cached, thereby allowing them to be redefined on the fly.
				$next.click(function () {
					publicMethod.next();
				});
				$prev.click(function () {
					publicMethod.prev();
				});
				$close.click(function () {
					publicMethod.close();
				});
				$overlay.click(function () {
					if (settings.overlayClose) {
						publicMethod.close();
					}
				});
				
				// Key Bindings
				$(document).bind('keydown.' + prefix, function (e) {
					var key = e.keyCode;
					if (open && settings.escKey && key === 27) {
						e.preventDefault();
						publicMethod.close();
					}
					if (open && settings.arrowKey && $related[1]) {
						if (key === 37) {
							e.preventDefault();
							$prev.click();
						} else if (key === 39) {
							e.preventDefault();
							$next.click();
						}
					}
				});

				$('.' + boxElement, document).live('click', function (e) {
			        // ignore non-left-mouse-clicks and clicks modified with ctrl / command, shift, or alt.
			        // See: http://jacklmoore.com/notes/click-events/
			        if (!(e.which > 1 || e.shiftKey || e.altKey || e.metaKey)) {
			            e.preventDefault();
			            launch(this);
			        }
			    });
			}
			return true;
		}
		return false;
	}

	// Don't do anything if ColorBox already exists.
	if ($.colorbox) {
		return;
	}

	// Append the HTML when the DOM loads
	$(appendHTML);


	// ****************
	// PUBLIC FUNCTIONS
	// Usage format: $.fn.colorbox.close();
	// Usage from within an iframe: parent.$.fn.colorbox.close();
	// ****************
	
	publicMethod = $.fn[colorbox] = $[colorbox] = function (options, callback) {
		var $this = this;
		
        options = options || {};
        
        appendHTML();

		if (addBindings()) {
			if (!$this[0]) {
				if ($this.selector) { // if a selector was given and it didn't match any elements, go ahead and exit.
	                return $this;
	            }
	            // if no selector was given (ie. $.colorbox()), create a temporary element to work with
				$this = $('<a/>');
				options.open = true; // assume an immediate open
			}
			
			if (callback) {
				options.onComplete = callback;
			}
			
			$this.each(function () {
				$.data(this, colorbox, $.extend({}, $.data(this, colorbox) || defaults, options));
			}).addClass(boxElement);
			
	        if (($.isFunction(options.open) && options.open.call($this)) || options.open) {
				launch($this[0]);
			}
		}
        
		return $this;
	};

	publicMethod.position = function (speed, loadedCallback) {
        var 
        top = 0, 
        left = 0, 
        offset = $box.offset(),
        scrollTop = $window.scrollTop(), 
        scrollLeft = $window.scrollLeft();
        
        $window.unbind('resize.' + prefix);

        // remove the modal so that it doesn't influence the document width/height        
        $box.css({top: -9e4, left: -9e4});

        if (settings.fixed && !isIE6) {
			offset.top -= scrollTop;
			offset.left -= scrollLeft;
            $box.css({position: 'fixed'});
        } else {
            top = scrollTop;
            left = scrollLeft;
            $box.css({position: 'absolute'});
        }

		// keeps the top and left positions within the browser's viewport.
        if (settings.right !== false) {
            left += Math.max($window.width() - settings.w - loadedWidth - interfaceWidth - setSize(settings.right, 'x'), 0);
        } else if (settings.left !== false) {
            left += setSize(settings.left, 'x');
        } else {
            left += Math.round(Math.max($window.width() - settings.w - loadedWidth - interfaceWidth, 0) / 2);
        }
        
        if (settings.bottom !== false) {
            top += Math.max($window.height() - settings.h - loadedHeight - interfaceHeight - setSize(settings.bottom, 'y'), 0);
        } else if (settings.top !== false) {
            top += setSize(settings.top, 'y');
        } else {
            top += Math.round(Math.max($window.height() - settings.h - loadedHeight - interfaceHeight, 0) / 2);
        }

        $box.css({top: offset.top, left: offset.left});

		// setting the speed to 0 to reduce the delay between same-sized content.
		speed = ($box.width() === settings.w + loadedWidth && $box.height() === settings.h + loadedHeight) ? 0 : speed || 0;
        
		// this gives the wrapper plenty of breathing room so it's floated contents can move around smoothly,
		// but it has to be shrank down around the size of div#colorbox when it's done.  If not,
		// it can invoke an obscure IE bug when using iframes.
		$wrap[0].style.width = $wrap[0].style.height = "9999px";
		
		function modalDimensions(that) {
			$topBorder[0].style.width = $bottomBorder[0].style.width = $content[0].style.width = that.style.width;
			$content[0].style.height = $leftBorder[0].style.height = $rightBorder[0].style.height = that.style.height;
		}
		
		$box.dequeue().animate({width: settings.w + loadedWidth, height: settings.h + loadedHeight, top: top, left: left}, {
			duration: speed,
			complete: function () {
				modalDimensions(this);
				
				active = false;
				
				// shrink the wrapper down to exactly the size of colorbox to avoid a bug in IE's iframe implementation.
				$wrap[0].style.width = (settings.w + loadedWidth + interfaceWidth) + "px";
				$wrap[0].style.height = (settings.h + loadedHeight + interfaceHeight) + "px";
                
                if (settings.reposition) {
	                setTimeout(function () {  // small delay before binding onresize due to an IE8 bug.
	                    $window.bind('resize.' + prefix, publicMethod.position);
	                }, 1);
	            }

				if (loadedCallback) {
					loadedCallback();
				}
			},
			step: function () {
				modalDimensions(this);
			}
		});
	};

	publicMethod.resize = function (options) {
		if (open) {
			options = options || {};
			
			if (options.width) {
				settings.w = setSize(options.width, 'x') - loadedWidth - interfaceWidth;
			}
			if (options.innerWidth) {
				settings.w = setSize(options.innerWidth, 'x');
			}
			$loaded.css({width: settings.w});
			
			if (options.height) {
				settings.h = setSize(options.height, 'y') - loadedHeight - interfaceHeight;
			}
			if (options.innerHeight) {
				settings.h = setSize(options.innerHeight, 'y');
			}
			if (!options.innerHeight && !options.height) {
				$loaded.css({height: "auto"});
				settings.h = $loaded.height();
			}
			$loaded.css({height: settings.h});
			
			publicMethod.position(settings.transition === "none" ? 0 : settings.speed);
		}
	};

	publicMethod.prep = function (object) {
		if (!open) {
			return;
		}
		
		var callback, speed = settings.transition === "none" ? 0 : settings.speed;
		
		$loaded.remove();
		$loaded = $tag(div, 'LoadedContent').append(object);
		
		function getWidth() {
			settings.w = settings.w || $loaded.width();
			settings.w = settings.mw && settings.mw < settings.w ? settings.mw : settings.w;
			return settings.w;
		}
		function getHeight() {
			settings.h = settings.h || $loaded.height();
			settings.h = settings.mh && settings.mh < settings.h ? settings.mh : settings.h;
			return settings.h;
		}
		
		$loaded.hide()
		.appendTo($loadingBay.show())// content has to be appended to the DOM for accurate size calculations.
		.css({width: getWidth(), overflow: settings.scrolling ? 'auto' : 'hidden'})
		.css({height: getHeight()})// sets the height independently from the width in case the new width influences the value of height.
		.prependTo($content);
		
		$loadingBay.hide();
		
		// floating the IMG removes the bottom line-height and fixed a problem where IE miscalculates the width of the parent element as 100% of the document width.
		//$(photo).css({'float': 'none', marginLeft: 'auto', marginRight: 'auto'});
		
        $(photo).css({'float': 'none'});
        
		// Hides SELECT elements in IE6 because they would otherwise sit on top of the overlay.
		if (isIE6) {
			$('select').not($box.find('select')).filter(function () {
				return this.style.visibility !== 'hidden';
			}).css({'visibility': 'hidden'}).one(event_cleanup, function () {
				this.style.visibility = 'inherit';
			});
		}
		
		callback = function () {
            var preload, i, total = $related.length, iframe, frameBorder = 'frameBorder', allowTransparency = 'allowTransparency', complete, src, img;
            
            if (!open) {
                return;
            }
            
            function removeFilter() {
                if (isIE) {
                    $box[0].style.removeAttribute('filter');
                }
            }
            
            complete = function () {
                clearTimeout(loadingTimer);
                $loadingOverlay.hide();
                trigger(event_complete, settings.onComplete);
            };
            
            if (isIE) {
                //This fadeIn helps the bicubic resampling to kick-in.
                if (photo) {
                    $loaded.fadeIn(100);
                }
            }
            
            $title.html(settings.title).add($loaded).show();
            
            if (total > 1) { // handle grouping
                if (typeof settings.current === "string") {
                    $current.html(settings.current.replace('{current}', index + 1).replace('{total}', total)).show();
                }
                
                $next[(settings.loop || index < total - 1) ? "show" : "hide"]().html(settings.next);
                $prev[(settings.loop || index) ? "show" : "hide"]().html(settings.previous);
				
                if (settings.slideshow) {
                    $slideshow.show();
                }
				
                // Preloads images within a rel group
                if (settings.preloading) {
					preload = [
						getIndex(-1),
						getIndex(1)
					];
					while (i = $related[preload.pop()]) {
						src = $.data(i, colorbox).href || i.href;
						if ($.isFunction(src)) {
							src = src.call(i);
						}
						if (isImage(src)) {
							img = new Image();
							img.src = src;
						}
					}
                }
            } else {
                $groupControls.hide();
            }
            
            if (settings.iframe) {
                iframe = $tag('iframe')[0];
                
                if (frameBorder in iframe) {
                    iframe[frameBorder] = 0;
                }
                if (allowTransparency in iframe) {
                    iframe[allowTransparency] = "true";
                }
                // give the iframe a unique name to prevent caching
                iframe.name = prefix + (+new Date());
                if (settings.fastIframe) {
                    complete();
                } else {
                    $(iframe).one('load', complete);
                }
                iframe.src = settings.href;
                if (!settings.scrolling) {
                    iframe.scrolling = "no";
                }
                $(iframe).addClass(prefix + 'Iframe').appendTo($loaded).one(event_purge, function () {
                    iframe.src = "//about:blank";
                });
            } else {
                complete();
            }
            
            if (settings.transition === 'fade') {
                $box.fadeTo(speed, 1, removeFilter);
            } else {
                removeFilter();
            }
		};
		
		if (settings.transition === 'fade') {
			$box.fadeTo(speed, 0, function () {
				publicMethod.position(0, callback);
			});
		} else {
			publicMethod.position(speed, callback);
		}
	};

	publicMethod.load = function (launched) {
		var href, setResize, prep = publicMethod.prep;
		
		active = true;
		
		photo = false;
		
		element = $related[index];
		
		if (!launched) {
			makeSettings();
		}
		
		trigger(event_purge);
		
		trigger(event_load, settings.onLoad);
		
		settings.h = settings.height ?
				setSize(settings.height, 'y') - loadedHeight - interfaceHeight :
				settings.innerHeight && setSize(settings.innerHeight, 'y');
		
		settings.w = settings.width ?
				setSize(settings.width, 'x') - loadedWidth - interfaceWidth :
				settings.innerWidth && setSize(settings.innerWidth, 'x');
		
		// Sets the minimum dimensions for use in image scaling
		settings.mw = settings.w;
		settings.mh = settings.h;
		
		// Re-evaluate the minimum width and height based on maxWidth and maxHeight values.
		// If the width or height exceed the maxWidth or maxHeight, use the maximum values instead.
		if (settings.maxWidth) {
			settings.mw = setSize(settings.maxWidth, 'x') - loadedWidth - interfaceWidth;
			settings.mw = settings.w && settings.w < settings.mw ? settings.w : settings.mw;
		}
		if (settings.maxHeight) {
			settings.mh = setSize(settings.maxHeight, 'y') - loadedHeight - interfaceHeight;
			settings.mh = settings.h && settings.h < settings.mh ? settings.h : settings.mh;
		}
		
		href = settings.href;
		
        loadingTimer = setTimeout(function () {
            $loadingOverlay.show();
        }, 100);
        
		if (settings.inline) {
			// Inserts an empty placeholder where inline content is being pulled from.
			// An event is bound to put inline content back when ColorBox closes or loads new content.
			$tag(div).hide().insertBefore($(href)[0]).one(event_purge, function () {
				$(this).replaceWith($loaded.children());
			});
			prep($(href));
		} else if (settings.iframe) {
			// IFrame element won't be added to the DOM until it is ready to be displayed,
			// to avoid problems with DOM-ready JS that might be trying to run in that iframe.
			prep(" ");
		} else if (settings.html) {
			prep(settings.html);
		} else if (isImage(href)) {
			$(photo = new Image())
			.addClass(prefix + 'Photo')
			.error(function () {
				settings.title = false;
				prep($tag(div, 'Error').text('This image could not be loaded'));
			})
			.load(function () {
				var percent;
				photo.onload = null; //stops animated gifs from firing the onload repeatedly.
				
				if (settings.scalePhotos) {
					setResize = function () {
						photo.height -= photo.height * percent;
						photo.width -= photo.width * percent;	
					};
					if (settings.mw && photo.width > settings.mw) {
						percent = (photo.width - settings.mw) / photo.width;
						setResize();
					}
					if (settings.mh && photo.height > settings.mh) {
						percent = (photo.height - settings.mh) / photo.height;
						setResize();
					}
				}
				
				if (settings.h) {
					photo.style.marginTop = Math.max(settings.h - photo.height, 0) / 2 + 'px';
				}
				
				if ($related[1] && (settings.loop || $related[index + 1])) {
					photo.style.cursor = 'pointer';
					photo.onclick = function () {
                        publicMethod.next();
                    };
				}
				
				if (isIE) {
					photo.style.msInterpolationMode = 'bicubic';
				}
				
				setTimeout(function () { // A pause because Chrome will sometimes report a 0 by 0 size otherwise.
					prep(photo);
				}, 1);
			});
			
			setTimeout(function () { // A pause because Opera 10.6+ will sometimes not run the onload function otherwise.
				photo.src = href;
			}, 1);
		} else if (href) {
			$loadingBay.load(href, settings.data, function (data, status, xhr) {
				prep(status === 'error' ? $tag(div, 'Error').text('Request unsuccessful: ' + xhr.statusText) : $(this).contents());
			});
		}
	};
        
	// Navigates to the next page/image in a set.
	publicMethod.next = function () {
		if (!active && $related[1] && (settings.loop || $related[index + 1])) {
			index = getIndex(1);
			publicMethod.load();
		}
	};
	
	publicMethod.prev = function () {
		if (!active && $related[1] && (settings.loop || index)) {
			index = getIndex(-1);
			publicMethod.load();
		}
	};

	// Note: to use this within an iframe use the following format: parent.$.fn.colorbox.close();
	publicMethod.close = function () {
		if (open && !closing) {
			
			closing = true;
			
			open = false;
			
			trigger(event_cleanup, settings.onCleanup);
			
			$window.unbind('.' + prefix + ' .' + event_ie6);
			
			$overlay.fadeTo(200, 0);
			
			$box.stop().fadeTo(300, 0, function () {
                 
				$box.add($overlay).css({'opacity': 1, cursor: 'auto'}).hide();
				
				trigger(event_purge);
				
				$loaded.remove();
				
				setTimeout(function () {
					closing = false;
					trigger(event_closed, settings.onClosed);
				}, 1);
			});
		}
	};

	// Removes changes ColorBox made to the document, but does not remove the plugin
	// from jQuery.
	publicMethod.remove = function () {
		$([]).add($box).add($overlay).remove();
		$box = null;
		$('.' + boxElement)
			.removeData(colorbox)
			.removeClass(boxElement)
			.die();
	};

	// A method for fetching the current element ColorBox is referencing.
	// returns a jQuery object.
	publicMethod.element = function () {
		return $(element);
	};

	publicMethod.settings = defaults;

}(jQuery, document, this));
jQuery.cookie = function (key, value, options) {

    // key and at least value given, set cookie...
    if (arguments.length > 1 && String(value) !== "[object Object]") {
        options = jQuery.extend({}, options);

        if (value === null || value === undefined) {
            options.expires = -1;
        }

        if (typeof options.expires === 'number') {
            var days = options.expires, t = options.expires = new Date();
            t.setDate(t.getDate() + days);
        }

        value = String(value);

        return (document.cookie = [
            encodeURIComponent(key), '=',
            options.raw ? value : encodeURIComponent(value),
            options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
            options.path ? '; path=' + options.path : '',
            options.domain ? '; domain=' + options.domain : '',
            options.secure ? '; secure' : ''
        ].join(''));
    }

    // key and possibly options given, get cookie...
    options = value || {};
    var result, decode = options.raw ? function (s) { return s; } : decodeURIComponent;
    return (result = new RegExp('(?:^|; )' + encodeURIComponent(key) + '=([^;]*)').exec(document.cookie)) ? decode(result[1]) : null;
};


jQuery(function($){
	$.datepicker.regional['th'] = {
		closeText: 'เธเธดเธ”',
		prevText: '&laquo;&nbsp;เธขเนเธญเธ',
		nextText: 'เธ–เธฑเธ”เนเธ&nbsp;&raquo;',
		currentText: 'เธงเธฑเธเธเธตเน',
		monthNames: ['เธกเธเธฃเธฒเธเธก','เธเธธเธกเธ เธฒเธเธฑเธเธเน','เธกเธตเธเธฒเธเธก','เน€เธกเธฉเธฒเธขเธ','เธเธคเธฉเธ เธฒเธเธก','เธกเธดเธ–เธธเธเธฒเธขเธ',
		'เธเธฃเธเธเธฒเธเธก','เธชเธดเธเธซเธฒเธเธก','เธเธฑเธเธขเธฒเธขเธ','เธ•เธธเธฅเธฒเธเธก','เธเธคเธจเธเธดเธเธฒเธขเธ','เธเธฑเธเธงเธฒเธเธก'],
		monthNamesShort: ['เธก.เธ.','เธ.เธ.','เธกเธต.เธ.','เน€เธก.เธข.','เธ.เธ.','เธกเธด.เธข.',
		'เธ.เธ.','เธช.เธ.','เธ.เธข.','เธ•.เธ.','เธ.เธข.','เธ.เธ.'],
		dayNames: ['เธญเธฒเธ—เธดเธ•เธขเน','เธเธฑเธเธ—เธฃเน','เธญเธฑเธเธเธฒเธฃ','เธเธธเธ','เธเธคเธซเธฑเธชเธเธ”เธต','เธจเธธเธเธฃเน','เน€เธชเธฒเธฃเน'],
		dayNamesShort: ['เธญเธฒ.','เธ.','เธญ.','เธ.','เธเธค.','เธจ.','เธช.'],
		dayNamesMin: ['เธญเธฒ.','เธ.','เธญ.','เธ.','เธเธค.','เธจ.','เธช.'],
		weekHeader: 'Wk',
		dateFormat: 'dd/mm/yy',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['th']);
});

(function(jQuery){jQuery.fn.awShowcase=function(options){var defaults={content_width:700,content_height:470,fit_to_parent:false,auto:false,interval:3000,continuous:false,loading:true,tooltip_width:200,tooltip_icon_width:32,tooltip_icon_height:32,tooltip_offsetx:18,tooltip_offsety:0,arrows:true,buttons:true,btn_numbers:false,keybord_keys:false,mousetrace:false,pauseonover:true,stoponclick:true,transition:'hslide',transition_delay:300,transition_speed:500,show_caption:'onload',thumbnails:false,thumbnails_position:'outside-last',thumbnails_direction:'vertical',thumbnails_slidex:0,dynamic_height:false,speed_change:false,viewline:false,fullscreen_width_x:15,custom_function:null};options=jQuery.extend(defaults,options);var current_id=0;var previous_id=0;var break_loop=false;var pause_loop=false;var myInterval=null;var showcase=jQuery(this);var showcase_width=options.content_width;var animating=false;var content_viewline_width=10000;var animation_distance=0;var old_animation_distance=0;var remaining_width=0;var content_container=jQuery(document.createElement('div')).css('overflow','hidden').css('position','relative').addClass('showcase-content-container').prependTo(showcase);if(options.fit_to_parent){showcase_width=jQuery(showcase).width()+options.fullscreen_width_x}if(options.viewline){options.thumbnails=false;options.dynamic_height=false;content_container.css('width',content_viewline_width);showcase.css('overflow','hidden');$('.showcase-arrow-previous').hide()}var contentArray=[];var thumbnailArray=[];var content_count=0;showcase.children('.showcase-slide').each(function(){var object=jQuery(this);content_count++;if(options.thumbnails){var thumb=object.find('.showcase-thumbnail');thumbnailArray.push(thumb);thumb.remove()}var object_width=object.find('.showcase-content').children().width();var object_height=object.find('.showcase-content').children().height();contentArray.push(object.html());object.remove();var new_object=getContent(content_count-1);if(options.viewline||content_count===1){content_container.append(new_object)}if(options.viewline){new_object.css('position','relative');new_object.css('float','left');new_object.css('width',object_width)}if(options.dynamic_height){new_object.css('height',object_height);if(content_count===1){content_container.css('height',object_height)}}else{new_object.css('height',options.content_height);if(content_count===1){content_container.css('height',options.content_height)}}if(options.viewline||content_count===1){displayAnchors(new_object);displayCaption(new_object);if(options.show_caption==='show'){jQuery(new_object).find('.showcase-caption').show()}}});var thumb_wrapper;var thumbnailStretch=0;var thumbnailsPerPage=0;if(options.thumbnails){thumb_container=jQuery('<div />');thumb_restriction=jQuery('<div />');thumb_wrapper=jQuery('<div />');for(i=thumbnailArray.length-1;i>=0;--i){var thumbnail=jQuery(thumbnailArray[i]).css({'overflow':'hidden'});thumbnail.attr('id','showcase-thumbnail-'+i);thumbnail.addClass((i===0)?'active':'');thumbnail.click(function(a,b){return function(){if(myInterval){pause_loop=true;clearInterval(myInterval)}changeContent(a,b)}}(i,''));thumb_wrapper.prepend(thumbnail)}if(options.thumbnails_position==='outside-first'||options.thumbnails_position==='outside-last'){if(options.thumbnails_direction!=='horizontal'){content_container.css('float','left');content_container.css('width',options.content_width);thumb_container.css('float','left');thumb_container.css('height',options.content_height)}else{jQuery(thumb_wrapper).find('.showcase-thumbnail').css('float','left')}if(options.thumbnails_position==='outside-last'){showcase.append(thumb_container);if(options.thumbnails_direction!=='horizontal'){showcase.append(jQuery('<div />').addClass('clear'))}}else{showcase.prepend(thumb_container);if(options.thumbnails_direction!=='horizontal'){showcase.append(jQuery('<div />').addClass('clear'))}}}else{thumb_container.css({'position':'absolute','z-index':20});if(options.thumbnails_direction==='horizontal'){thumb_container.css({'left':0,'right':0});jQuery(thumb_wrapper).find('.showcase-thumbnail').css('float','left');jQuery(thumb_wrapper).append(jQuery('<div />').addClass('clear'));if(options.thumbnails_position==='inside-first'){thumb_container.css('top',0)}else{thumb_container.css('bottom',0)}}else{thumb_container.css({'top':0,'bottom':0});if(options.thumbnails_position==='inside-first'){thumb_container.css('left',0)}else{thumb_container.css('right',0)}}content_container.prepend(thumb_container)}thumb_container.addClass('showcase-thumbnail-container');thumb_container.css('overflow','hidden');thumb_restriction.addClass('showcase-thumbnail-restriction');thumb_restriction.css({'overflow':'hidden','position':'relative'});if(options.thumbnails_direction==='horizontal'){thumb_restriction.css({'float':'left'})}thumb_wrapper.addClass('showcase-thumbnail-wrapper');if(options.thumbnails_direction==='horizontal'){thumb_wrapper.addClass('showcase-thumbnail-wrapper-horizontal')}else{thumb_wrapper.addClass('showcase-thumbnail-wrapper-vertical')}thumb_wrapper.css('position','relative');thumb_restriction.append(thumb_wrapper);thumb_container.append(thumb_restriction);var buttonBackward=jQuery('<div class="showcase-thumbnail-button-backward" />');if(options.thumbnails_direction!=='horizontal'){buttonBackward.html('<span class="showcase-thumbnail-vertical"><span>Up</span></span>')}else{buttonBackward.css({'float':'left'});buttonBackward.html('<span class="showcase-thumbnail-horizontal"><span>Left</span></span>')}buttonBackward.click(function(){slideThumbnailWrapper('backward',false,true)});thumb_container.prepend(buttonBackward);var buttonForward=jQuery('<div class="showcase-thumbnail-button-forward" />');if(options.thumbnails_direction!=='horizontal'){buttonForward.html('<span class="showcase-thumbnail-vertical"><span>Down</span></span>')}else{buttonForward.css({'float':'left'});buttonForward.html('<span class="showcase-thumbnail-horizontal"><span>Right</span></span>')}buttonForward.click(function(){slideThumbnailWrapper('forward',false,true)});thumb_container.append(buttonForward);var thumbnailVisibleStretch=0;if(options.thumbnails_direction!=='horizontal'){thumbnailVisibleStretch=getElementHeight(thumb_wrapper,false);thumbnailVisibleStretch+=(getElementHeight(buttonBackward))+(getElementHeight(buttonForward));while(thumbnailVisibleStretch<options.content_height){thumbnailVisibleStretch+=getElementHeight(jQuery(thumbnailArray[0]));thumbnailsPerPage++}}else{thumbnailVisibleStretch=getElementWidth(thumb_wrapper,false);thumbnailVisibleStretch+=(getElementWidth(buttonBackward))+(getElementWidth(buttonForward));while(thumbnailVisibleStretch<showcase_width){thumbnailVisibleStretch+=getElementWidth(jQuery(thumbnailArray[0]));thumbnailsPerPage++}}if(thumbnailsPerPage+1>thumbnailArray.length){if(options.thumbnails_direction!=='horizontal'){thumb_restriction.css('margin-top',getElementHeight(buttonBackward))}else{thumb_restriction.css('margin-left',getElementWidth(buttonBackward))}buttonBackward.hide();buttonForward.hide()}if(options.thumbnails_direction!=='horizontal'){var buttonsHeight=(getElementHeight(buttonBackward))+(getElementHeight(buttonForward));thumb_restriction.css('height',options.content_height-buttonsHeight)}else{var buttonsWidth=(getElementWidth(buttonBackward))+(getElementWidth(buttonForward));thumb_restriction.css('width',showcase_width-buttonsWidth)}if(options.thumbnails_direction==='horizontal'){jQuery('.showcase-thumbnail').each(function(){thumbnailStretch+=getElementWidth(jQuery(this))});thumb_wrapper.css('width',thumbnailStretch)}else{jQuery('.showcase-thumbnail').each(function(){thumbnailStretch+=getElementHeight(jQuery(this))})}}if(options.thumbnails&&options.thumbnails_position.indexOf("outside")!==-1&&options.thumbnails_direction!=='horizontal'&&!options.viewline){showcase.css('width',showcase_width+getElementWidth(thumb_wrapper,true,false))}else if(!options.fit_to_parent){showcase.css('width',showcase_width)}if(content_count>1&&options.auto){myInterval=window.setInterval(autoChange,options.interval)}if(options.auto&&options.pauseonover){showcase.mouseenter(function(){break_loop=true;clearInterval(myInterval)});showcase.mouseleave(function(){if(!pause_loop){break_loop=false;myInterval=window.setInterval(autoChange,options.interval)}})}if(options.arrows&&content_count>1){jQuery(document.createElement('div')).addClass('showcase-arrow-previous').prependTo(showcase).click(function(){if(myInterval){if(options.stoponclick){pause_loop=true}clearInterval(myInterval)}changeContent((current_id===0)?content_count-1:parseInt(current_id)-1,'previous')});jQuery(document.createElement('div')).addClass('showcase-arrow-next').prependTo(showcase).click(function(){if(myInterval){if(options.stoponclick){pause_loop=true}clearInterval(myInterval)}changeContent(current_id+1,'next')});if(options.viewline){$('.showcase-arrow-previous').hide()}}if(options.buttons&&content_count>1){jQuery(document.createElement('div')).css('clear','both').addClass('showcase-button-wrapper').appendTo(showcase);i=0;while(i<content_count){jQuery(document.createElement('span')).attr('id','showcase-navigation-button-'+i).addClass((i===0)?'active':'').html((options.btn_numbers)?parseInt(i)+1:'&#9679;').click(function(a,b){return function(){if(myInterval){if(options.stoponclick){pause_loop=true}clearInterval(myInterval)}changeContent(a,b)}}(i,'')).appendTo(jQuery(showcase).find('.showcase-button-wrapper'));i++}}if(options.keybord_keys){jQuery(document).keydown(function(e){if(options.stoponclick){pause_loop=true}if(myInterval)clearInterval(myInterval);if(e.keyCode===37){changeContent((current_id===0)?content_count-1:parseInt(current_id)-1,'previous')}if(e.keyCode===39){changeContent((current_id===content_count-1)?0:parseInt(current_id)+1,'next')}})}function getContent(id){var new_content=jQuery(document.createElement('div')).attr('id','showcase-content-'+id).css('overflow','hidden').css('position','absolute').addClass('showcase-content').html(contentArray[id]);if(!options.viewline){new_content.css('width',options.content_width)}if(options.fit_to_parent&&!options.viewline){new_content.css('left',(showcase_width/2)-options.content_width/2)}return new_content}function autoChange(){var nextID=parseInt(current_id)+1;if(nextID===content_count&&options.continuous){nextID=0}else if(nextID===content_count&&!options.continuous){break_loop=true;clearInterval(myInterval)}if(!break_loop){changeContent(nextID,'next')}}function changeContent(id,direction){if(current_id!==id&&!animating){var obj;var obj2;var delay=0;var i;var lrpos=(options.fit_to_parent)?(showcase_width/2)-(options.content_width/2):0;if((id>current_id&&direction!=='previous')||direction==='next'){if(options.viewline){if(current_id<content_count-1){if(!options.speed_change){animating=true}updateContentViewlineWidth();if(options.pauseonover){window.clearInterval(myInterval)}remaining_width=0;for(i=current_id+1,len=content_count;i<len;++i){obj=addedContentArray[i];remaining_width+=obj.find('.showcase-content').children().width()}if(remaining_width>showcase_width){old_animation_distance=animation_distance;animation_distance-=addedContentArray[current_id].find('.showcase-content').children().width()}else if($('.showcase-arrow-next').is(':visible')){old_animation_distance=animation_distance;animation_distance=-(content_viewline_width-(remaining_width+(showcase_width-remaining_width)));$('.showcase-arrow-next').fadeOut(300)}content_container.animate({left:animation_distance+'px'},options.transition_speed,function(){animating=false});if($('.showcase-arrow-next').is(':visible')){current_id++}$('.showcase-arrow-previous').fadeIn(300)}}else{if(!options.speed_change){animating=true}obj=jQuery(showcase).find('#showcase-content-'+parseInt(current_id));obj2=getContent(id);content_container.append(obj2);if(options.dynamic_height){obj2.css('height',obj2.find('.showcase-content').children().height())}else{obj2.css('height',options.content_height)}if(obj.find('.showcase-content').children().height()>obj2.find('.showcase-content').children().height()&&options.dynamic_height){content_container.stop(true,true).animate({height:obj2.find('.showcase-content').children().height()},200);delay=100}if(options.transition==='hslide'){jQuery(obj).delay(delay).animate({left:-(options.content_width)},options.transition_speed+options.transition_delay,function(){obj.remove()})}else if(options.transition==='vslide'){jQuery(obj).delay(delay).animate({top:-(options.content_height)},options.transition_speed+options.transition_delay,function(){obj.remove()})}else{jQuery(obj).delay(delay).fadeOut(options.transition_speed,function(){obj.remove()})}displayAnchors(obj,true);displayCaption(obj,true);if(options.transition==='hslide'){obj2.css('left',showcase_width);jQuery(obj2).delay(delay).animate({left:lrpos},options.transition_speed,function(){displayAnchors(obj2);displayCaption(obj2);afterAnimation(obj2)})}else if(options.transition==='vslide'){obj2.css('top',showcase.height());jQuery(obj2).delay(delay).animate({top:'0px'},options.transition_speed,function(){displayAnchors(obj2);displayCaption(obj2);afterAnimation(obj2)})}else{obj2.css('left',lrpos);obj2.css('display','none');jQuery(obj2).delay(delay).fadeIn(options.transition_speed,function(){displayAnchors(obj2);displayCaption(obj2);afterAnimation(obj2)})}}}else if(id<current_id||direction==='previous'){if(options.viewline){if(current_id!==0){if(!options.speed_change){animating=true}updateContentViewlineWidth();if(options.pauseonover){window.clearInterval(myInterval)}content_container.animate({left:old_animation_distance+'px'},options.transition_speed,function(){animating=false});animation_distance=old_animation_distance;current_id--;if(current_id===0){$('.showcase-arrow-previous').fadeOut(300)}old_id=current_id-1;sub_width=jQuery(addedContentArray[old_id]).width();old_animation_distance=old_animation_distance+sub_width}$('.showcase-arrow-next').fadeIn(300)}else{if(!options.speed_change){animating=true}obj=jQuery(showcase).find('#showcase-content-'+parseInt(current_id));obj2=getContent(id);content_container.append(obj2);if(options.dynamic_height){obj2.css('height',obj2.find('.showcase-content').children().height())}else{obj2.css('height',options.content_height)}if(obj.find('.showcase-content').children().height()>obj2.find('.showcase-content').children().height()&&options.dynamic_height){content_container.stop(true,true).animate({height:obj2.find('.showcase-content').children().height()},200);delay=100}if(options.transition==='hslide'){jQuery(obj).delay(delay).animate({left:(showcase_width)+'px'},options.transition_speed+options.transition_delay,function(){displayAnchors(obj,true);displayCaption(obj,true);obj.remove()})}else if(options.transition==='vslide'){jQuery(obj).delay(delay).animate({top:(options.content_height)+'px'},options.transition_speed+options.transition_delay,function(){displayAnchors(obj,true);displayCaption(obj,true);obj.remove()})}else{jQuery(obj).delay(delay).fadeOut(options.transition_speed,function(){displayAnchors(obj,true);displayCaption(obj,true);obj.remove()})}if(options.transition==='hslide'){obj2.css('left','-'+options.content_width+'px');jQuery(obj2).delay(delay).animate({left:lrpos},options.transition_speed,function(){displayAnchors(obj2);displayCaption(obj2);afterAnimation(obj2)})}else if(options.transition==='vslide'){obj2.css('top','-'+showcase.height()+'px');jQuery(obj2).delay(delay).animate({top:'0px'},options.transition_speed,function(){displayAnchors(obj2);displayCaption(obj2);afterAnimation(obj2)})}else{obj2.css('left',lrpos);obj2.css('display','none');jQuery(obj2).delay(delay).fadeIn(options.transition_speed,function(){displayAnchors(obj2);displayCaption(obj2);afterAnimation(obj2)})}content_container.append(obj2)}}if(!options.viewline){previous_id=current_id;current_id=id;if(options.thumbnails){if((current_id>previous_id&&direction!=='previous')||direction==='next'){slideThumbnailWrapper('forward',true)}else if(current_id<previous_id||direction==='previous'){slideThumbnailWrapper('backward',true)}}if(options.arrows){jQuery(showcase).find('.showcase-arrow-previous').unbind('click').click(function(){if(myInterval){if(options.stoponclick){pause_loop=true}clearInterval(myInterval)}changeContent((current_id===0)?content_count-1:parseInt(current_id)-1,'previous')});jQuery(showcase).find('.showcase-arrow-next').unbind('click').click(function(){if(myInterval){if(options.stoponclick){pause_loop=true}clearInterval(myInterval)}changeContent((current_id===content_count-1)?0:parseInt(current_id)+1,'next')})}if(options.thumbnails){i=0;showcase.find('.showcase-thumbnail').each(function(){var object=jQuery(this);object.removeClass('active');if(i===current_id){object.addClass('active')}i++})}if(options.show_caption==='show'){jQuery(obj2).find('.showcase-caption').show()}}if(options.buttons){i=0;showcase.find('.showcase-button-wrapper span').each(function(){var object=jQuery(this);object.removeClass('active');if(i===current_id){object.addClass('active')}i++})}if(typeof options.custom_function=='function'){options.custom_function()}}}function afterAnimation(obj){if(options.dynamic_height){content_container.stop(true,true).animate({height:obj.find('.showcase-content').children().height()},200)}animating=false}var thumbnailSlidePosition=0;function slideThumbnailWrapper(direction,check,backwardforward){var doTheSlide=true;var thumbnailHeightOrWidth=getElementHeight(jQuery(thumb_wrapper).find('.showcase-thumbnail'));if(options.thumbnails_direction==='horizontal'){thumbnailHeightOrWidth=getElementWidth(jQuery(thumb_wrapper).find('.showcase-thumbnail'))}var multiplySlidePosition=1;if(options.thumbnails_slidex===0){options.thumbnails_slidex=thumbnailsPerPage}if(check){var thumbnailSlidePositionCopy=thumbnailSlidePosition;var thumbnailsScrolled=0;while(thumbnailSlidePositionCopy<0){if(options.thumbnails_direction==='horizontal'){thumbnailSlidePositionCopy+=getElementWidth(jQuery(thumbnailArray[0]))}else{thumbnailSlidePositionCopy+=getElementHeight(jQuery(thumbnailArray[0]))}thumbnailsScrolled++}var firstVisible=thumbnailsScrolled;var lastVisible=thumbnailsPerPage+thumbnailsScrolled-1;if(current_id>=firstVisible&&current_id<=lastVisible){doTheSlide=false}var distance;if((current_id-lastVisible)>options.thumbnails_slidex){distance=current_id-lastVisible;while(distance>options.thumbnails_slidex){distance-=options.thumbnails_slidex;multiplySlidePosition++}}else if((firstVisible-current_id)>options.thumbnails_slidex){distance=firstVisible-current_id;while(distance>options.thumbnails_slidex){distance-=options.thumbnails_slidex;multiplySlidePosition++}}else{multiplySlidePosition=1}}if(direction==='forward'&&doTheSlide){if(options.thumbnails_direction==='vertical'&&options.content_height<(thumbnailStretch+thumbnailSlidePosition)){thumbnailSlidePosition-=thumbnailHeightOrWidth*(options.thumbnails_slidex*multiplySlidePosition)}else if(options.thumbnails_direction==='horizontal'&&options.content_width<(thumbnailStretch+thumbnailSlidePosition)){thumbnailSlidePosition-=thumbnailHeightOrWidth*(options.thumbnails_slidex*multiplySlidePosition)}else if(current_id===0){if(!backwardforward){thumbnailSlidePosition=0}}if(options.thumbnails_direction==='horizontal'){thumb_wrapper.animate({left:thumbnailSlidePosition},300)}else{thumb_wrapper.animate({top:thumbnailSlidePosition},300)}}else if(doTheSlide){if(thumbnailSlidePosition<0){thumbnailSlidePosition+=thumbnailHeightOrWidth*(options.thumbnails_slidex*multiplySlidePosition)}else if(current_id===content_count-1){if(!backwardforward){thumbnailSlidePosition-=thumbnailHeightOrWidth*(options.thumbnails_slidex*multiplySlidePosition)}}else{thumbnailSlidePosition=0}if(options.thumbnails_direction==='horizontal'){thumb_wrapper.animate({left:thumbnailSlidePosition},300)}else{thumb_wrapper.animate({top:thumbnailSlidePosition},300)}}}function displayCaption(container,fadeOut){var caption=container.find('.showcase-caption');if(!fadeOut){if(options.show_caption==='onload'){caption.fadeIn(300)}else if(options.show_caption==='onhover'){jQuery(container).mouseenter(function(){caption.fadeIn(300)});jQuery(container).mouseleave(function(){caption.stop(true,true).fadeOut(100)})}}else{caption.stop(true,true).fadeOut(300)}}function displayAnchors(container,fadeOut){container.find('.showcase-tooltips a').each(function(){if(!fadeOut){var coords=jQuery(this).attr('coords');coords=coords.split(',');jQuery(this).addClass('showcase-plus-anchor');jQuery(this).css('position','absolute');jQuery(this).css('display','none');jQuery(this).css('width',options.tooltip_icon_width);jQuery(this).css('height',options.tooltip_icon_height);jQuery(this).css('left',parseInt(coords[0])-(parseInt(options.tooltip_icon_width)/2));jQuery(this).css('top',parseInt(coords[1])-(parseInt(options.tooltip_icon_height)/2));var content=jQuery(this).html();jQuery(this).mouseenter(function(){animateTooltip(container,coords[0],coords[1],content)});jQuery(this).mouseleave(function(){animateTooltip(container,coords[0],coords[1],content)});jQuery(this).html('');jQuery(this).fadeIn(300)}else{jQuery(this).stop(true,true).fadeOut(300)}})}var tooltip=null;function animateTooltip(container,x,y,content){if(tooltip===null){tooltip=jQuery(document.createElement('div')).addClass('showcase-tooltip').css('display','none').css('position','absolute').css('max-width',options.tooltip_width).html(content);container.append(tooltip);var tooltip_paddingx=parseInt(tooltip.css('padding-right'))*2+parseInt(tooltip.css('border-right-width'))*2;var tooltip_paddingy=parseInt(tooltip.css('padding-bottom'))*2+parseInt(tooltip.css('border-bottom-width'))*2;lastx=parseInt(x)+tooltip.width()+tooltip_paddingx;lasty=parseInt(y)+tooltip.height()+tooltip_paddingy;if(lastx<options.content_width){tooltip.css('left',parseInt(x)+parseInt(options.tooltip_offsetx))}else{tooltip.css('left',(parseInt(x)-parseInt(options.tooltip_offsetx))-(parseInt(tooltip.width())+parseInt(options.tooltip_offsetx)))}if(lasty<options.content_height){tooltip.css('top',parseInt(y)+parseInt(options.tooltip_offsety))}else{tooltip.css('top',(parseInt(y)-parseInt(options.tooltip_offsety))-(parseInt(tooltip.height())+parseInt(tooltip_paddingy)))}tooltip.fadeIn(400)}else{tooltip.fadeOut(400);tooltip.remove();tooltip=null}}function getElementHeight(el,incHeight,incMargin,incPadding,incBorders){incHeight=typeof(incHeight)!=='undefined'?incHeight:true;incMargin=typeof(incMargin)!=='undefined'?incMargin:true;incPadding=typeof(incPadding)!=='undefined'?incPadding:true;incBorders=typeof(incBorders)!=='undefined'?incBorders:true;var elHeight=(incHeight)?jQuery((el)).height():0;var elMargin=(incMargin)?parseFloat(jQuery((el)).css('margin-top'))+parseFloat(jQuery(el).css('margin-bottom')):0;var elPadding=(incPadding)?parseFloat(jQuery((el)).css('padding-top'))+parseFloat(jQuery(el).css('padding-bottom')):0;var elBorder=(incBorders)?parseFloat(jQuery((el)).css('border-top-width'))+parseFloat(jQuery((el)).css('border-bottom-width')):0;elHeight+=elMargin+elPadding+elBorder;return elHeight}function getElementWidth(el,incWidth,incMargin,incPadding,incBorders){incWidth=typeof(incWidth)!=='undefined'?incWidth:true;incMargin=typeof(incMargin)!=='undefined'?incMargin:true;incPadding=typeof(incPadding)!=='undefined'?incPadding:true;incBorders=typeof(incBorders)!=='undefined'?incBorders:true;var elWidth=(incWidth)?jQuery((el)).width():0;var elMargin=(incMargin)?parseFloat(jQuery((el)).css('margin-left'))+parseFloat(jQuery(el).css('margin-right')):0;var elPadding=(incPadding)?parseFloat(jQuery((el)).css('padding-left'))+parseFloat(jQuery((el)).css('padding-right')):0;var elBorder=(incBorders)?parseFloat(jQuery((el)).css('border-left-width'))+parseFloat(jQuery((el)).css('border-right-width')):0;elWidth+=elMargin+elPadding+elBorder;return elWidth}if(options.mousetrace){var mousetrace=jQuery(document.createElement('div')).css('position','absolute').css('top','0').css('background-color','#fff').css('color','#000').css('padding','3px 5px').css('x-index','30').html('X: 0 Y: 0');showcase.append(mousetrace);var offset=showcase.offset();content_container.mousemove(function(e){mousetrace.html('X: '+(e.pageX-offset.left)+' Y: '+(e.pageY-offset.top))})}$('#awOnePageButton').click(function showInOnePage(){if($('.view-page').is(':visible')){var temp_container=jQuery(document.createElement('div'));temp_container.addClass('showcase-onepage');showcase.before(temp_container);if(myInterval){pause_loop=true;clearInterval(myInterval)}$(this).find('.view-page').hide();$(this).find('.view-slide').show();showcase.hide();$.each(contentArray,function(index,value){obj=getContent(index);obj.css('position','relative');temp_container.append(obj);displayAnchors(obj);displayCaption(obj);if(options.dynamic_height){obj.css('height',obj.find('.showcase-content').children().height())}else{obj.css('height',options.content_height)}});var clear=jQuery(document.createElement('div'));clear.addClass('clear');temp_container.append(clear)}else{$('.showcase-onepage').remove();$(this).find('.view-page').show();$(this).find('.view-slide').hide();showcase.show()}return false});var addedContentArray=[];function updateContentViewlineWidth(){content_viewline_width=0;content_container.children('div').each(function(){content_viewline_width+=$(this).find('.showcase-content').children().width();addedContentArray.push($(this))})}showcase.removeClass('showcase-load')}})(jQuery);


jQuery.fn.liScroll = function(settings) {
		settings = jQuery.extend({
		travelocity: 0.07
		}, settings);		
		return this.each(function(){
				var $strip = jQuery(this);
				$strip.addClass("newsticker")
				var stripWidth = 1;
				$strip.find("li").each(function(i){
				stripWidth += jQuery(this, i).outerWidth(true); // thanks to Michael Haszprunar and Fabien Volpi
				});
				var $mask = $strip.wrap("<div class='mask'></div>");
				var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");								
				var containerWidth = $strip.parent().parent().width();	//a.k.a. 'mask' width 	
				$strip.width(stripWidth);			
				var totalTravel = stripWidth+containerWidth;
				var defTiming = totalTravel/settings.travelocity;	// thanks to Scott Waye		
				function scrollnews(spazio, tempo){
				$strip.animate({left: '-='+ spazio}, tempo, "linear", function(){$strip.css("left", containerWidth); scrollnews(totalTravel, defTiming);});
				}
				scrollnews(totalTravel, defTiming);				
				$strip.hover(function(){
				jQuery(this).stop();
				},
				function(){
				var offset = jQuery(this).offset();
				var residualSpace = offset.left + stripWidth;
				var residualTime = residualSpace/settings.travelocity;
				scrollnews(residualSpace, residualTime);
				});			
		});	
};

(function(g){var q={vertical:!1,rtl:!1,start:1,offset:1,size:null,scroll:3,visible:null,animation:"normal",easing:"swing",auto:0,wrap:null,initCallback:null,setupCallback:null,reloadCallback:null,itemLoadCallback:null,itemFirstInCallback:null,itemFirstOutCallback:null,itemLastInCallback:null,itemLastOutCallback:null,itemVisibleInCallback:null,itemVisibleOutCallback:null,animationStepCallback:null,buttonNextHTML:"<div></div>",buttonPrevHTML:"<div></div>",buttonNextEvent:"click",buttonPrevEvent:"click", buttonNextCallback:null,buttonPrevCallback:null,itemFallbackDimension:null},m=!1;g(window).bind("load.jcarousel",function(){m=!0});g.jcarousel=function(a,c){this.options=g.extend({},q,c||{});this.autoStopped=this.locked=!1;this.buttonPrevState=this.buttonNextState=this.buttonPrev=this.buttonNext=this.list=this.clip=this.container=null;if(!c||c.rtl===void 0)this.options.rtl=(g(a).attr("dir")||g("html").attr("dir")||"").toLowerCase()=="rtl";this.wh=!this.options.vertical?"width":"height";this.lt=!this.options.vertical? this.options.rtl?"right":"left":"top";for(var b="",d=a.className.split(" "),f=0;f<d.length;f++)if(d[f].indexOf("jcarousel-skin")!=-1){g(a).removeClass(d[f]);b=d[f];break}a.nodeName.toUpperCase()=="UL"||a.nodeName.toUpperCase()=="OL"?(this.list=g(a),this.clip=this.list.parents(".jcarousel-clip"),this.container=this.list.parents(".jcarousel-container")):(this.container=g(a),this.list=this.container.find("ul,ol").eq(0),this.clip=this.container.find(".jcarousel-clip"));if(this.clip.size()===0)this.clip= this.list.wrap("<div></div>").parent();if(this.container.size()===0)this.container=this.clip.wrap("<div></div>").parent();b!==""&&this.container.parent()[0].className.indexOf("jcarousel-skin")==-1&&this.container.wrap('<div class=" '+b+'"></div>');this.buttonPrev=g(".jcarousel-prev",this.container);if(this.buttonPrev.size()===0&&this.options.buttonPrevHTML!==null)this.buttonPrev=g(this.options.buttonPrevHTML).appendTo(this.container);this.buttonPrev.addClass(this.className("jcarousel-prev"));this.buttonNext= g(".jcarousel-next",this.container);if(this.buttonNext.size()===0&&this.options.buttonNextHTML!==null)this.buttonNext=g(this.options.buttonNextHTML).appendTo(this.container);this.buttonNext.addClass(this.className("jcarousel-next"));this.clip.addClass(this.className("jcarousel-clip")).css({position:"relative"});this.list.addClass(this.className("jcarousel-list")).css({overflow:"hidden",position:"relative",top:0,margin:0,padding:0}).css(this.options.rtl?"right":"left",0);this.container.addClass(this.className("jcarousel-container")).css({position:"relative"}); !this.options.vertical&&this.options.rtl&&this.container.addClass("jcarousel-direction-rtl").attr("dir","rtl");var j=this.options.visible!==null?Math.ceil(this.clipping()/this.options.visible):null,b=this.list.children("li"),e=this;if(b.size()>0){var h=0,i=this.options.offset;b.each(function(){e.format(this,i++);h+=e.dimension(this,j)});this.list.css(this.wh,h+100+"px");if(!c||c.size===void 0)this.options.size=b.size()}this.container.css("display","block");this.buttonNext.css("display","block");this.buttonPrev.css("display", "block");this.funcNext=function(){e.next()};this.funcPrev=function(){e.prev()};this.funcResize=function(){e.resizeTimer&&clearTimeout(e.resizeTimer);e.resizeTimer=setTimeout(function(){e.reload()},100)};this.options.initCallback!==null&&this.options.initCallback(this,"init");!m&&g.browser.safari?(this.buttons(!1,!1),g(window).bind("load.jcarousel",function(){e.setup()})):this.setup()};var f=g.jcarousel;f.fn=f.prototype={jcarousel:"0.2.8"};f.fn.extend=f.extend=g.extend;f.fn.extend({setup:function(){this.prevLast= this.prevFirst=this.last=this.first=null;this.animating=!1;this.tail=this.resizeTimer=this.timer=null;this.inTail=!1;if(!this.locked){this.list.css(this.lt,this.pos(this.options.offset)+"px");var a=this.pos(this.options.start,!0);this.prevFirst=this.prevLast=null;this.animate(a,!1);g(window).unbind("resize.jcarousel",this.funcResize).bind("resize.jcarousel",this.funcResize);this.options.setupCallback!==null&&this.options.setupCallback(this)}},reset:function(){this.list.empty();this.list.css(this.lt, "0px");this.list.css(this.wh,"10px");this.options.initCallback!==null&&this.options.initCallback(this,"reset");this.setup()},reload:function(){this.tail!==null&&this.inTail&&this.list.css(this.lt,f.intval(this.list.css(this.lt))+this.tail);this.tail=null;this.inTail=!1;this.options.reloadCallback!==null&&this.options.reloadCallback(this);if(this.options.visible!==null){var a=this,c=Math.ceil(this.clipping()/this.options.visible),b=0,d=0;this.list.children("li").each(function(f){b+=a.dimension(this, c);f+1<a.first&&(d=b)});this.list.css(this.wh,b+"px");this.list.css(this.lt,-d+"px")}this.scroll(this.first,!1)},lock:function(){this.locked=!0;this.buttons()},unlock:function(){this.locked=!1;this.buttons()},size:function(a){if(a!==void 0)this.options.size=a,this.locked||this.buttons();return this.options.size},has:function(a,c){if(c===void 0||!c)c=a;if(this.options.size!==null&&c>this.options.size)c=this.options.size;for(var b=a;b<=c;b++){var d=this.get(b);if(!d.length||d.hasClass("jcarousel-item-placeholder"))return!1}return!0}, get:function(a){return g(">.jcarousel-item-"+a,this.list)},add:function(a,c){var b=this.get(a),d=0,p=g(c);if(b.length===0)for(var j,e=f.intval(a),b=this.create(a);;){if(j=this.get(--e),e<=0||j.length){e<=0?this.list.prepend(b):j.after(b);break}}else d=this.dimension(b);p.get(0).nodeName.toUpperCase()=="LI"?(b.replaceWith(p),b=p):b.empty().append(c);this.format(b.removeClass(this.className("jcarousel-item-placeholder")),a);p=this.options.visible!==null?Math.ceil(this.clipping()/this.options.visible): null;d=this.dimension(b,p)-d;a>0&&a<this.first&&this.list.css(this.lt,f.intval(this.list.css(this.lt))-d+"px");this.list.css(this.wh,f.intval(this.list.css(this.wh))+d+"px");return b},remove:function(a){var c=this.get(a);if(c.length&&!(a>=this.first&&a<=this.last)){var b=this.dimension(c);a<this.first&&this.list.css(this.lt,f.intval(this.list.css(this.lt))+b+"px");c.remove();this.list.css(this.wh,f.intval(this.list.css(this.wh))-b+"px")}},next:function(){this.tail!==null&&!this.inTail?this.scrollTail(!1): this.scroll((this.options.wrap=="both"||this.options.wrap=="last")&&this.options.size!==null&&this.last==this.options.size?1:this.first+this.options.scroll)},prev:function(){this.tail!==null&&this.inTail?this.scrollTail(!0):this.scroll((this.options.wrap=="both"||this.options.wrap=="first")&&this.options.size!==null&&this.first==1?this.options.size:this.first-this.options.scroll)},scrollTail:function(a){if(!this.locked&&!this.animating&&this.tail){this.pauseAuto();var c=f.intval(this.list.css(this.lt)), c=!a?c-this.tail:c+this.tail;this.inTail=!a;this.prevFirst=this.first;this.prevLast=this.last;this.animate(c)}},scroll:function(a,c){!this.locked&&!this.animating&&(this.pauseAuto(),this.animate(this.pos(a),c))},pos:function(a,c){var b=f.intval(this.list.css(this.lt));if(this.locked||this.animating)return b;this.options.wrap!="circular"&&(a=a<1?1:this.options.size&&a>this.options.size?this.options.size:a);for(var d=this.first>a,g=this.options.wrap!="circular"&&this.first<=1?1:this.first,j=d?this.get(g): this.get(this.last),e=d?g:g-1,h=null,i=0,k=!1,l=0;d?--e>=a:++e<a;){h=this.get(e);k=!h.length;if(h.length===0&&(h=this.create(e).addClass(this.className("jcarousel-item-placeholder")),j[d?"before":"after"](h),this.first!==null&&this.options.wrap=="circular"&&this.options.size!==null&&(e<=0||e>this.options.size)))j=this.get(this.index(e)),j.length&&(h=this.add(e,j.clone(!0)));j=h;l=this.dimension(h);k&&(i+=l);if(this.first!==null&&(this.options.wrap=="circular"||e>=1&&(this.options.size===null||e<= this.options.size)))b=d?b+l:b-l}for(var g=this.clipping(),m=[],o=0,n=0,j=this.get(a-1),e=a;++o;){h=this.get(e);k=!h.length;if(h.length===0){h=this.create(e).addClass(this.className("jcarousel-item-placeholder"));if(j.length===0)this.list.prepend(h);else j[d?"before":"after"](h);if(this.first!==null&&this.options.wrap=="circular"&&this.options.size!==null&&(e<=0||e>this.options.size))j=this.get(this.index(e)),j.length&&(h=this.add(e,j.clone(!0)))}j=h;l=this.dimension(h);if(l===0)throw Error("jCarousel: No width/height set for items. This will cause an infinite loop. Aborting..."); this.options.wrap!="circular"&&this.options.size!==null&&e>this.options.size?m.push(h):k&&(i+=l);n+=l;if(n>=g)break;e++}for(h=0;h<m.length;h++)m[h].remove();i>0&&(this.list.css(this.wh,this.dimension(this.list)+i+"px"),d&&(b-=i,this.list.css(this.lt,f.intval(this.list.css(this.lt))-i+"px")));i=a+o-1;if(this.options.wrap!="circular"&&this.options.size&&i>this.options.size)i=this.options.size;if(e>i){o=0;e=i;for(n=0;++o;){h=this.get(e--);if(!h.length)break;n+=this.dimension(h);if(n>=g)break}}e=i-o+ 1;this.options.wrap!="circular"&&e<1&&(e=1);if(this.inTail&&d)b+=this.tail,this.inTail=!1;this.tail=null;if(this.options.wrap!="circular"&&i==this.options.size&&i-o+1>=1&&(d=f.intval(this.get(i).css(!this.options.vertical?"marginRight":"marginBottom")),n-d>g))this.tail=n-g-d;if(c&&a===this.options.size&&this.tail)b-=this.tail,this.inTail=!0;for(;a-- >e;)b+=this.dimension(this.get(a));this.prevFirst=this.first;this.prevLast=this.last;this.first=e;this.last=i;return b},animate:function(a,c){if(!this.locked&& !this.animating){this.animating=!0;var b=this,d=function(){b.animating=!1;a===0&&b.list.css(b.lt,0);!b.autoStopped&&(b.options.wrap=="circular"||b.options.wrap=="both"||b.options.wrap=="last"||b.options.size===null||b.last<b.options.size||b.last==b.options.size&&b.tail!==null&&!b.inTail)&&b.startAuto();b.buttons();b.notify("onAfterAnimation");if(b.options.wrap=="circular"&&b.options.size!==null)for(var c=b.prevFirst;c<=b.prevLast;c++)c!==null&&!(c>=b.first&&c<=b.last)&&(c<1||c>b.options.size)&&b.remove(c)}; this.notify("onBeforeAnimation");if(!this.options.animation||c===!1)this.list.css(this.lt,a+"px"),d();else{var f=!this.options.vertical?this.options.rtl?{right:a}:{left:a}:{top:a},d={duration:this.options.animation,easing:this.options.easing,complete:d};if(g.isFunction(this.options.animationStepCallback))d.step=this.options.animationStepCallback;this.list.animate(f,d)}}},startAuto:function(a){if(a!==void 0)this.options.auto=a;if(this.options.auto===0)return this.stopAuto();if(this.timer===null){this.autoStopped= !1;var c=this;this.timer=window.setTimeout(function(){c.next()},this.options.auto*1E3)}},stopAuto:function(){this.pauseAuto();this.autoStopped=!0},pauseAuto:function(){if(this.timer!==null)window.clearTimeout(this.timer),this.timer=null},buttons:function(a,c){if(a==null&&(a=!this.locked&&this.options.size!==0&&(this.options.wrap&&this.options.wrap!="first"||this.options.size===null||this.last<this.options.size),!this.locked&&(!this.options.wrap||this.options.wrap=="first")&&this.options.size!==null&& this.last>=this.options.size))a=this.tail!==null&&!this.inTail;if(c==null&&(c=!this.locked&&this.options.size!==0&&(this.options.wrap&&this.options.wrap!="last"||this.first>1),!this.locked&&(!this.options.wrap||this.options.wrap=="last")&&this.options.size!==null&&this.first==1))c=this.tail!==null&&this.inTail;var b=this;this.buttonNext.size()>0?(this.buttonNext.unbind(this.options.buttonNextEvent+".jcarousel",this.funcNext),a&&this.buttonNext.bind(this.options.buttonNextEvent+".jcarousel",this.funcNext), this.buttonNext[a?"removeClass":"addClass"](this.className("jcarousel-next-disabled")).attr("disabled",a?!1:!0),this.options.buttonNextCallback!==null&&this.buttonNext.data("jcarouselstate")!=a&&this.buttonNext.each(function(){b.options.buttonNextCallback(b,this,a)}).data("jcarouselstate",a)):this.options.buttonNextCallback!==null&&this.buttonNextState!=a&&this.options.buttonNextCallback(b,null,a);this.buttonPrev.size()>0?(this.buttonPrev.unbind(this.options.buttonPrevEvent+".jcarousel",this.funcPrev), c&&this.buttonPrev.bind(this.options.buttonPrevEvent+".jcarousel",this.funcPrev),this.buttonPrev[c?"removeClass":"addClass"](this.className("jcarousel-prev-disabled")).attr("disabled",c?!1:!0),this.options.buttonPrevCallback!==null&&this.buttonPrev.data("jcarouselstate")!=c&&this.buttonPrev.each(function(){b.options.buttonPrevCallback(b,this,c)}).data("jcarouselstate",c)):this.options.buttonPrevCallback!==null&&this.buttonPrevState!=c&&this.options.buttonPrevCallback(b,null,c);this.buttonNextState= a;this.buttonPrevState=c},notify:function(a){var c=this.prevFirst===null?"init":this.prevFirst<this.first?"next":"prev";this.callback("itemLoadCallback",a,c);this.prevFirst!==this.first&&(this.callback("itemFirstInCallback",a,c,this.first),this.callback("itemFirstOutCallback",a,c,this.prevFirst));this.prevLast!==this.last&&(this.callback("itemLastInCallback",a,c,this.last),this.callback("itemLastOutCallback",a,c,this.prevLast));this.callback("itemVisibleInCallback",a,c,this.first,this.last,this.prevFirst, this.prevLast);this.callback("itemVisibleOutCallback",a,c,this.prevFirst,this.prevLast,this.first,this.last)},callback:function(a,c,b,d,f,j,e){if(!(this.options[a]==null||typeof this.options[a]!="object"&&c!="onAfterAnimation")){var h=typeof this.options[a]=="object"?this.options[a][c]:this.options[a];if(g.isFunction(h)){var i=this;if(d===void 0)h(i,b,c);else if(f===void 0)this.get(d).each(function(){h(i,this,d,b,c)});else for(var a=function(a){i.get(a).each(function(){h(i,this,a,b,c)})},k=d;k<=f;k++)k!== null&&!(k>=j&&k<=e)&&a(k)}}},create:function(a){return this.format("<li></li>",a)},format:function(a,c){for(var a=g(a),b=a.get(0).className.split(" "),d=0;d<b.length;d++)b[d].indexOf("jcarousel-")!=-1&&a.removeClass(b[d]);a.addClass(this.className("jcarousel-item")).addClass(this.className("jcarousel-item-"+c)).css({"float":this.options.rtl?"right":"left","list-style":"none"}).attr("jcarouselindex",c);return a},className:function(a){return a+" "+a+(!this.options.vertical?"-horizontal":"-vertical")}, dimension:function(a,c){var b=g(a);if(c==null)return!this.options.vertical?b.outerWidth(!0)||f.intval(this.options.itemFallbackDimension):b.outerHeight(!0)||f.intval(this.options.itemFallbackDimension);else{var d=!this.options.vertical?c-f.intval(b.css("marginLeft"))-f.intval(b.css("marginRight")):c-f.intval(b.css("marginTop"))-f.intval(b.css("marginBottom"));g(b).css(this.wh,d+"px");return this.dimension(b)}},clipping:function(){return!this.options.vertical?this.clip[0].offsetWidth-f.intval(this.clip.css("borderLeftWidth"))- f.intval(this.clip.css("borderRightWidth")):this.clip[0].offsetHeight-f.intval(this.clip.css("borderTopWidth"))-f.intval(this.clip.css("borderBottomWidth"))},index:function(a,c){if(c==null)c=this.options.size;return Math.round(((a-1)/c-Math.floor((a-1)/c))*c)+1}});f.extend({defaults:function(a){return g.extend(q,a||{})},intval:function(a){a=parseInt(a,10);return isNaN(a)?0:a},windowLoaded:function(){m=!0}});g.fn.jcarousel=function(a){if(typeof a=="string"){var c=g(this).data("jcarousel"),b=Array.prototype.slice.call(arguments, 1);return c[a].apply(c,b)}else return this.each(function(){var b=g(this).data("jcarousel");b?(a&&g.extend(b.options,a),b.reload()):g(this).data("jcarousel",new f(this,a))})}})(jQuery);
function doIframe(){
	o = document.getElementsByTagName('iframe');
	for(i=0;i<o.length;i++){
		if (/\bautoHeight\b/.test(o[i].className)){
			setHeight(o[i]);
			addEvent(o[i],'load', doIframe);
		}
	}
}

function setHeight(e){
	if(e.contentDocument){
		e.height = e.contentDocument.body.offsetHeight + 35;
	} else {
		e.height = e.contentWindow.document.body.scrollHeight;
	}
}

function addEvent(obj, evType, fn){
	if(obj.addEventListener)
	{
	obj.addEventListener(evType, fn,false);
	return true;
	} else if (obj.attachEvent){
	var r = obj.attachEvent("on"+evType, fn);
	return r;
	} else {
	return false;
	}
}

if (document.getElementById && document.createTextNode){
 addEvent(window,'load', doIframe);	
}

;(function($) {




$.fn.ajaxSubmit = function(options) {
	// fast fail if nothing selected (http://dev.jquery.com/ticket/2752)
	if (!this.length) {
		log('ajaxSubmit: skipping submit process - no element selected');
		return this;
	}

	if (typeof options == 'function')
		options = { success: options };

	var url = $.trim(this.attr('action'));
	if (url) {
		// clean url (don't include hash vaue)
		url = (url.match(/^([^#]+)/)||[])[1];
   	}
   	url = url || window.location.href || '';

	options = $.extend({
		url:  url,
		type: this.attr('method') || 'GET',
		iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank'
	}, options || {});

	// hook for manipulating the form data before it is extracted;
	// convenient for use with rich editors like tinyMCE or FCKEditor
	var veto = {};
	this.trigger('form-pre-serialize', [this, options, veto]);
	if (veto.veto) {
		log('ajaxSubmit: submit vetoed via form-pre-serialize trigger');
		return this;
	}

	// provide opportunity to alter form data before it is serialized
	if (options.beforeSerialize && options.beforeSerialize(this, options) === false) {
		log('ajaxSubmit: submit aborted via beforeSerialize callback');
		return this;
	}

	var a = this.formToArray(options.semantic);
	if (options.data) {
		options.extraData = options.data;
		for (var n in options.data) {
		  if(options.data[n] instanceof Array) {
			for (var k in options.data[n])
			  a.push( { name: n, value: options.data[n][k] } );
		  }
		  else
			 a.push( { name: n, value: options.data[n] } );
		}
	}

	// give pre-submit callback an opportunity to abort the submit
	if (options.beforeSubmit && options.beforeSubmit(a, this, options) === false) {
		log('ajaxSubmit: submit aborted via beforeSubmit callback');
		return this;
	}

	// fire vetoable 'validate' event
	this.trigger('form-submit-validate', [a, this, options, veto]);
	if (veto.veto) {
		log('ajaxSubmit: submit vetoed via form-submit-validate trigger');
		return this;
	}

	var q = $.param(a);

	if (options.type.toUpperCase() == 'GET') {
		options.url += (options.url.indexOf('?') >= 0 ? '&' : '?') + q;
		options.data = null;  // data is null for 'get'
	}
	else
		options.data = q; // data is the query string for 'post'

	var $form = this, callbacks = [];
	if (options.resetForm) callbacks.push(function() { $form.resetForm(); });
	if (options.clearForm) callbacks.push(function() { $form.clearForm(); });

	// perform a load on the target only if dataType is not provided
	if (!options.dataType && options.target) {
		var oldSuccess = options.success || function(){};
		callbacks.push(function(data) {
			$(options.target).html(data).each(oldSuccess, arguments);
		});
	}
	else if (options.success)
		callbacks.push(options.success);

	options.success = function(data, status) {
		for (var i=0, max=callbacks.length; i < max; i++)
			callbacks[i].apply(options, [data, status, $form]);
	};

	// are there files to upload?
	var files = $('input:file', this).fieldValue();
	var found = false;
	for (var j=0; j < files.length; j++)
		if (files[j])
			found = true;

	var multipart = false;
//	var mp = 'multipart/form-data';
//	multipart = ($form.attr('enctype') == mp || $form.attr('encoding') == mp);

	// options.iframe allows user to force iframe mode
	// 06-NOV-09: now defaulting to iframe mode if file input is detected
   if ((files.length && options.iframe !== false) || options.iframe || found || multipart) {
	   // hack to fix Safari hang (thanks to Tim Molendijk for this)
	   // see:  http://groups.google.com/group/jquery-dev/browse_thread/thread/36395b7ab510dd5d
	   if (options.closeKeepAlive)
		   $.get(options.closeKeepAlive, fileUpload);
	   else
		   fileUpload();
	   }
   else
	   $.ajax(options);

	// fire 'notify' event
	this.trigger('form-submit-notify', [this, options]);
	return this;


	// private function for handling file uploads (hat tip to YAHOO!)
	function fileUpload() {
		var form = $form[0];

		if ($(':input[name=submit]', form).length) {
			alert('Error: Form elements must not be named "submit".');
			return;
		}

		var opts = $.extend({}, $.ajaxSettings, options);
		var s = $.extend(true, {}, $.extend(true, {}, $.ajaxSettings), opts);

		var id = 'jqFormIO' + (new Date().getTime());
		var $io = $('<iframe id="' + id + '" name="' + id + '" src="'+ opts.iframeSrc +'" />');
		var io = $io[0];

		$io.css({ position: 'absolute', top: '-1000px', left: '-1000px' });

		var xhr = { // mock object
			aborted: 0,
			responseText: null,
			responseXML: null,
			status: 0,
			statusText: 'n/a',
			getAllResponseHeaders: function() {},
			getResponseHeader: function() {},
			setRequestHeader: function() {},
			abort: function() {
				this.aborted = 1;
				$io.attr('src', opts.iframeSrc); // abort op in progress
			}
		};

		var g = opts.global;
		// trigger ajax global events so that activity/block indicators work like normal
		if (g && ! $.active++) $.event.trigger("ajaxStart");
		if (g) $.event.trigger("ajaxSend", [xhr, opts]);

		if (s.beforeSend && s.beforeSend(xhr, s) === false) {
			s.global && $.active--;
			return;
		}
		if (xhr.aborted)
			return;

		var cbInvoked = 0;
		var timedOut = 0;

		// add submitting element to data if we know it
		var sub = form.clk;
		if (sub) {
			var n = sub.name;
			if (n && !sub.disabled) {
				options.extraData = options.extraData || {};
				options.extraData[n] = sub.value;
				if (sub.type == "image") {
					options.extraData[name+'.x'] = form.clk_x;
					options.extraData[name+'.y'] = form.clk_y;
				}
			}
		}

		// take a breath so that pending repaints get some cpu time before the upload starts
		setTimeout(function() {
			// make sure form attrs are set
			var t = $form.attr('target'), a = $form.attr('action');

			// update form attrs in IE friendly way
			form.setAttribute('target',id);
			if (form.getAttribute('method') != 'POST')
				form.setAttribute('method', 'POST');
			if (form.getAttribute('action') != opts.url)
				form.setAttribute('action', opts.url);

			// ie borks in some cases when setting encoding
			if (! options.skipEncodingOverride) {
				$form.attr({
					encoding: 'multipart/form-data',
					enctype:  'multipart/form-data'
				});
			}

			// support timout
			if (opts.timeout)
				setTimeout(function() { timedOut = true; cb(); }, opts.timeout);

			// add "extra" data to form if provided in options
			var extraInputs = [];
			try {
				if (options.extraData)
					for (var n in options.extraData)
						extraInputs.push(
							$('<input type="hidden" name="'+n+'" value="'+options.extraData[n]+'" />')
								.appendTo(form)[0]);

				// add iframe to doc and submit the form
				$io.appendTo('body');
				io.attachEvent ? io.attachEvent('onload', cb) : io.addEventListener('load', cb, false);
				form.submit();
			}
			finally {
				// reset attrs and remove "extra" input elements
				form.setAttribute('action',a);
				t ? form.setAttribute('target', t) : $form.removeAttr('target');
				$(extraInputs).remove();
			}
		}, 10);

		var domCheckCount = 50;

		function cb() {
			if (cbInvoked++) return;

			io.detachEvent ? io.detachEvent('onload', cb) : io.removeEventListener('load', cb, false);

			var ok = true;
			try {
				if (timedOut) throw 'timeout';
				// extract the server response from the iframe
				var data, doc;

				doc = io.contentWindow ? io.contentWindow.document : io.contentDocument ? io.contentDocument : io.document;
				
				var isXml = opts.dataType == 'xml' || doc.XMLDocument || $.isXMLDoc(doc);
				log('isXml='+isXml);
				if (!isXml && (doc.body == null || doc.body.innerHTML == '')) {
				 	if (--domCheckCount) {
						// in some browsers (Opera) the iframe DOM is not always traversable when
						// the onload callback fires, so we loop a bit to accommodate
						cbInvoked = 0;
						setTimeout(cb, 100);
						return;
					}
					log('Could not access iframe DOM after 50 tries.');
					return;
				}

				xhr.responseText = doc.body ? doc.body.innerHTML : null;
				xhr.responseXML = doc.XMLDocument ? doc.XMLDocument : doc;
				xhr.getResponseHeader = function(header){
					var headers = {'content-type': opts.dataType};
					return headers[header];
				};

				if (opts.dataType == 'json' || opts.dataType == 'script') {
					// see if user embedded response in textarea
					var ta = doc.getElementsByTagName('textarea')[0];
					if (ta)
						xhr.responseText = ta.value;
					else {
						// account for browsers injecting pre around json response
						var pre = doc.getElementsByTagName('pre')[0];
						if (pre)
							xhr.responseText = pre.innerHTML;
					}			  
				}
				else if (opts.dataType == 'xml' && !xhr.responseXML && xhr.responseText != null) {
					xhr.responseXML = toXml(xhr.responseText);
				}
				data = $.httpData(xhr, opts.dataType);
			}
			catch(e){
				ok = false;
				$.handleError(opts, xhr, 'error', e);
			}

			// ordering of these callbacks/triggers is odd, but that's how $.ajax does it
			if (ok) {
				opts.success(data, 'success');
				if (g) $.event.trigger("ajaxSuccess", [xhr, opts]);
			}
			if (g) $.event.trigger("ajaxComplete", [xhr, opts]);
			if (g && ! --$.active) $.event.trigger("ajaxStop");
			if (opts.complete) opts.complete(xhr, ok ? 'success' : 'error');

			// clean up
			setTimeout(function() {
				$io.remove();
				xhr.responseXML = null;
			}, 100);
		};

		function toXml(s, doc) {
			if (window.ActiveXObject) {
				doc = new ActiveXObject('Microsoft.XMLDOM');
				doc.async = 'false';
				doc.loadXML(s);
			}
			else
				doc = (new DOMParser()).parseFromString(s, 'text/xml');
			return (doc && doc.documentElement && doc.documentElement.tagName != 'parsererror') ? doc : null;
		};
	};
};


$.fn.ajaxForm = function(options) {
	return this.ajaxFormUnbind().bind('submit.form-plugin', function() {
		$(this).ajaxSubmit(options);
		return false;
	}).bind('click.form-plugin', function(e) {
		var target = e.target;
		var $el = $(target);
		if (!($el.is(":submit,input:image"))) {
			// is this a child element of the submit el?  (ex: a span within a button)
			var t = $el.closest(':submit');
			if (t.length == 0)
				return;
			target = t[0];
		}
		var form = this;
		form.clk = target;
		if (target.type == 'image') {
			if (e.offsetX != undefined) {
				form.clk_x = e.offsetX;
				form.clk_y = e.offsetY;
			} else if (typeof $.fn.offset == 'function') { // try to use dimensions plugin
				var offset = $el.offset();
				form.clk_x = e.pageX - offset.left;
				form.clk_y = e.pageY - offset.top;
			} else {
				form.clk_x = e.pageX - target.offsetLeft;
				form.clk_y = e.pageY - target.offsetTop;
			}
		}
		// clear form vars
		setTimeout(function() { form.clk = form.clk_x = form.clk_y = null; }, 100);
	});
};

// ajaxFormUnbind unbinds the event handlers that were bound by ajaxForm
$.fn.ajaxFormUnbind = function() {
	return this.unbind('submit.form-plugin click.form-plugin');
};


$.fn.formToArray = function(semantic) {
	var a = [];
	if (this.length == 0) return a;

	var form = this[0];
	var els = semantic ? form.getElementsByTagName('*') : form.elements;
	if (!els) return a;
	for(var i=0, max=els.length; i < max; i++) {
		var el = els[i];
		var n = el.name;
		if (!n) continue;

		if (semantic && form.clk && el.type == "image") {
			// handle image inputs on the fly when semantic == true
			if(!el.disabled && form.clk == el) {
				a.push({name: n, value: $(el).val()});
				a.push({name: n+'.x', value: form.clk_x}, {name: n+'.y', value: form.clk_y});
			}
			continue;
		}

		var v = $.fieldValue(el, true);
		if (v && v.constructor == Array) {
			for(var j=0, jmax=v.length; j < jmax; j++)
				a.push({name: n, value: v[j]});
		}
		else if (v !== null && typeof v != 'undefined')
			a.push({name: n, value: v});
	}

	if (!semantic && form.clk) {
		// input type=='image' are not found in elements array! handle it here
		var $input = $(form.clk), input = $input[0], n = input.name;
		if (n && !input.disabled && input.type == 'image') {
			a.push({name: n, value: $input.val()});
			a.push({name: n+'.x', value: form.clk_x}, {name: n+'.y', value: form.clk_y});
		}
	}
	return a;
};


$.fn.formSerialize = function(semantic) {
	//hand off to jQuery.param for proper encoding
	return $.param(this.formToArray(semantic));
};


$.fn.fieldSerialize = function(successful) {
	var a = [];
	this.each(function() {
		var n = this.name;
		if (!n) return;
		var v = $.fieldValue(this, successful);
		if (v && v.constructor == Array) {
			for (var i=0,max=v.length; i < max; i++)
				a.push({name: n, value: v[i]});
		}
		else if (v !== null && typeof v != 'undefined')
			a.push({name: this.name, value: v});
	});
	//hand off to jQuery.param for proper encoding
	return $.param(a);
};


$.fn.fieldValue = function(successful) {
	for (var val=[], i=0, max=this.length; i < max; i++) {
		var el = this[i];
		var v = $.fieldValue(el, successful);
		if (v === null || typeof v == 'undefined' || (v.constructor == Array && !v.length))
			continue;
		v.constructor == Array ? $.merge(val, v) : val.push(v);
	}
	return val;
};


$.fieldValue = function(el, successful) {
	var n = el.name, t = el.type, tag = el.tagName.toLowerCase();
	if (typeof successful == 'undefined') successful = true;

	if (successful && (!n || el.disabled || t == 'reset' || t == 'button' ||
		(t == 'checkbox' || t == 'radio') && !el.checked ||
		(t == 'submit' || t == 'image') && el.form && el.form.clk != el ||
		tag == 'select' && el.selectedIndex == -1))
			return null;

	if (tag == 'select') {
		var index = el.selectedIndex;
		if (index < 0) return null;
		var a = [], ops = el.options;
		var one = (t == 'select-one');
		var max = (one ? index+1 : ops.length);
		for(var i=(one ? index : 0); i < max; i++) {
			var op = ops[i];
			if (op.selected) {
				var v = op.value;
				if (!v) // extra pain for IE...
					v = (op.attributes && op.attributes['value'] && !(op.attributes['value'].specified)) ? op.text : op.value;
				if (one) return v;
				a.push(v);
			}
		}
		return a;
	}
	return el.value;
};


$.fn.clearForm = function() {
	return this.each(function() {
		$('input,select,textarea', this).clearFields();
	});
};


$.fn.clearFields = $.fn.clearInputs = function() {
	return this.each(function() {
		var t = this.type, tag = this.tagName.toLowerCase();
		if (t == 'text' || t == 'password' || tag == 'textarea')
			this.value = '';
		else if (t == 'checkbox' || t == 'radio')
			this.checked = false;
		else if (tag == 'select')
			this.selectedIndex = -1;
	});
};


$.fn.resetForm = function() {
	return this.each(function() {
		// guard against an input with the name of 'reset'
		// note that IE reports the reset function as an 'object'
		if (typeof this.reset == 'function' || (typeof this.reset == 'object' && !this.reset.nodeType))
			this.reset();
	});
};


$.fn.enable = function(b) {
	if (b == undefined) b = true;
	return this.each(function() {
		this.disabled = !b;
	});
};


$.fn.selected = function(select) {
	if (select == undefined) select = true;
	return this.each(function() {
		var t = this.type;
		if (t == 'checkbox' || t == 'radio')
			this.checked = select;
		else if (this.tagName.toLowerCase() == 'option') {
			var $sel = $(this).parent('select');
			if (select && $sel[0] && $sel[0].type == 'select-one') {
				// deselect all other options
				$sel.find('option').selected(false);
			}
			this.selected = select;
		}
	});
};

// helper fn for console logging
// set $.fn.ajaxSubmit.debug to true to enable debug logging
function log() {
	if ($.fn.ajaxSubmit.debug && window.console && window.console.log)
		window.console.log('[jquery.form] ' + Array.prototype.join.call(arguments,''));
};

})(jQuery);

(function(c){c.extend(c.fn,{validate:function(a){if(this.length){var b=c.data(this[0],"validator");if(b)return b;this.attr("novalidate","novalidate");b=new c.validator(a,this[0]);c.data(this[0],"validator",b);if(b.settings.onsubmit){a=this.find("input, button");a.filter(".cancel").click(function(){b.cancelSubmit=true});b.settings.submitHandler&&a.filter(":submit").click(function(){b.submitButton=this});this.submit(function(d){function e(){if(b.settings.submitHandler){if(b.submitButton)var f=c("<input type='hidden'/>").attr("name",
b.submitButton.name).val(b.submitButton.value).appendTo(b.currentForm);b.settings.submitHandler.call(b,b.currentForm);b.submitButton&&f.remove();return false}return true}b.settings.debug&&d.preventDefault();if(b.cancelSubmit){b.cancelSubmit=false;return e()}if(b.form()){if(b.pendingRequest){b.formSubmitted=true;return false}return e()}else{b.focusInvalid();return false}})}return b}else a&&a.debug&&window.console&&console.warn("nothing selected, can't validate, returning nothing")},valid:function(){if(c(this[0]).is("form"))return this.validate().form();
else{var a=true,b=c(this[0].form).validate();this.each(function(){a&=b.element(this)});return a}},removeAttrs:function(a){var b={},d=this;c.each(a.split(/\s/),function(e,f){b[f]=d.attr(f);d.removeAttr(f)});return b},rules:function(a,b){var d=this[0];if(a){var e=c.data(d.form,"validator").settings,f=e.rules,g=c.validator.staticRules(d);switch(a){case "add":c.extend(g,c.validator.normalizeRule(b));f[d.name]=g;if(b.messages)e.messages[d.name]=c.extend(e.messages[d.name],b.messages);break;case "remove":if(!b){delete f[d.name];
return g}var h={};c.each(b.split(/\s/),function(j,i){h[i]=g[i];delete g[i]});return h}}d=c.validator.normalizeRules(c.extend({},c.validator.metadataRules(d),c.validator.classRules(d),c.validator.attributeRules(d),c.validator.staticRules(d)),d);if(d.required){e=d.required;delete d.required;d=c.extend({required:e},d)}return d}});c.extend(c.expr[":"],{blank:function(a){return!c.trim(""+a.value)},filled:function(a){return!!c.trim(""+a.value)},unchecked:function(a){return!a.checked}});c.validator=function(a,
b){this.settings=c.extend(true,{},c.validator.defaults,a);this.currentForm=b;this.init()};c.validator.format=function(a,b){if(arguments.length==1)return function(){var d=c.makeArray(arguments);d.unshift(a);return c.validator.format.apply(this,d)};if(arguments.length>2&&b.constructor!=Array)b=c.makeArray(arguments).slice(1);if(b.constructor!=Array)b=[b];c.each(b,function(d,e){a=a.replace(RegExp("\\{"+d+"\\}","g"),e)});return a};c.extend(c.validator,{defaults:{messages:{},groups:{},rules:{},errorClass:"error",
validClass:"valid",errorElement:"label",focusInvalid:true,errorContainer:c([]),errorLabelContainer:c([]),onsubmit:true,ignore:":hidden",ignoreTitle:false,onfocusin:function(a){this.lastActive=a;if(this.settings.focusCleanup&&!this.blockFocusCleanup){this.settings.unhighlight&&this.settings.unhighlight.call(this,a,this.settings.errorClass,this.settings.validClass);this.addWrapper(this.errorsFor(a)).hide()}},onfocusout:function(a){if(!this.checkable(a)&&(a.name in this.submitted||!this.optional(a)))this.element(a)},
onkeyup:function(a){if(a.name in this.submitted||a==this.lastElement)this.element(a)},onclick:function(a){if(a.name in this.submitted)this.element(a);else a.parentNode.name in this.submitted&&this.element(a.parentNode)},highlight:function(a,b,d){a.type==="radio"?this.findByName(a.name).addClass(b).removeClass(d):c(a).addClass(b).removeClass(d)},unhighlight:function(a,b,d){a.type==="radio"?this.findByName(a.name).removeClass(b).addClass(d):c(a).removeClass(b).addClass(d)}},setDefaults:function(a){c.extend(c.validator.defaults,
a)},messages:{required:"This field is required.",remote:"Please fix this field.",email:"Please enter a valid email address.",url:"Please enter a valid URL.",date:"Please enter a valid date.",dateISO:"Please enter a valid date (ISO).",number:"Please enter a valid number.",digits:"Please enter only digits.",creditcard:"Please enter a valid credit card number.",equalTo:"Please enter the same value again.",accept:"Please enter a value with a valid extension.",maxlength:c.validator.format("Please enter no more than {0} characters."),
minlength:c.validator.format("Please enter at least {0} characters."),rangelength:c.validator.format("Please enter a value between {0} and {1} characters long."),range:c.validator.format("Please enter a value between {0} and {1}."),max:c.validator.format("Please enter a value less than or equal to {0}."),min:c.validator.format("Please enter a value greater than or equal to {0}.")},autoCreateRanges:false,prototype:{init:function(){function a(e){var f=c.data(this[0].form,"validator"),g="on"+e.type.replace(/^validate/,
"");f.settings[g]&&f.settings[g].call(f,this[0],e)}this.labelContainer=c(this.settings.errorLabelContainer);this.errorContext=this.labelContainer.length&&this.labelContainer||c(this.currentForm);this.containers=c(this.settings.errorContainer).add(this.settings.errorLabelContainer);this.submitted={};this.valueCache={};this.pendingRequest=0;this.pending={};this.invalid={};this.reset();var b=this.groups={};c.each(this.settings.groups,function(e,f){c.each(f.split(/\s/),function(g,h){b[h]=e})});var d=
this.settings.rules;c.each(d,function(e,f){d[e]=c.validator.normalizeRule(f)});c(this.currentForm).validateDelegate("[type='text'], [type='password'], [type='file'], select, textarea, [type='number'], [type='search'] ,[type='tel'], [type='url'], [type='email'], [type='datetime'], [type='date'], [type='month'], [type='week'], [type='time'], [type='datetime-local'], [type='range'], [type='color'] ","focusin focusout keyup",a).validateDelegate("[type='radio'], [type='checkbox'], select, option","click",
a);this.settings.invalidHandler&&c(this.currentForm).bind("invalid-form.validate",this.settings.invalidHandler)},form:function(){this.checkForm();c.extend(this.submitted,this.errorMap);this.invalid=c.extend({},this.errorMap);this.valid()||c(this.currentForm).triggerHandler("invalid-form",[this]);this.showErrors();return this.valid()},checkForm:function(){this.prepareForm();for(var a=0,b=this.currentElements=this.elements();b[a];a++)this.check(b[a]);return this.valid()},element:function(a){this.lastElement=
a=this.validationTargetFor(this.clean(a));this.prepareElement(a);this.currentElements=c(a);var b=this.check(a);if(b)delete this.invalid[a.name];else this.invalid[a.name]=true;if(!this.numberOfInvalids())this.toHide=this.toHide.add(this.containers);this.showErrors();return b},showErrors:function(a){if(a){c.extend(this.errorMap,a);this.errorList=[];for(var b in a)this.errorList.push({message:a[b],element:this.findByName(b)[0]});this.successList=c.grep(this.successList,function(d){return!(d.name in a)})}this.settings.showErrors?
this.settings.showErrors.call(this,this.errorMap,this.errorList):this.defaultShowErrors()},resetForm:function(){c.fn.resetForm&&c(this.currentForm).resetForm();this.submitted={};this.lastElement=null;this.prepareForm();this.hideErrors();this.elements().removeClass(this.settings.errorClass)},numberOfInvalids:function(){return this.objectLength(this.invalid)},objectLength:function(a){var b=0,d;for(d in a)b++;return b},hideErrors:function(){this.addWrapper(this.toHide).hide()},valid:function(){return this.size()==
0},size:function(){return this.errorList.length},focusInvalid:function(){if(this.settings.focusInvalid)try{c(this.findLastActive()||this.errorList.length&&this.errorList[0].element||[]).filter(":visible").focus().trigger("focusin")}catch(a){}},findLastActive:function(){var a=this.lastActive;return a&&c.grep(this.errorList,function(b){return b.element.name==a.name}).length==1&&a},elements:function(){var a=this,b={};return c(this.currentForm).find("input, select, textarea").not(":submit, :reset, :image, [disabled]").not(this.settings.ignore).filter(function(){!this.name&&
a.settings.debug&&window.console&&console.error("%o has no name assigned",this);if(this.name in b||!a.objectLength(c(this).rules()))return false;return b[this.name]=true})},clean:function(a){return c(a)[0]},errors:function(){return c(this.settings.errorElement+"."+this.settings.errorClass,this.errorContext)},reset:function(){this.successList=[];this.errorList=[];this.errorMap={};this.toShow=c([]);this.toHide=c([]);this.currentElements=c([])},prepareForm:function(){this.reset();this.toHide=this.errors().add(this.containers)},
prepareElement:function(a){this.reset();this.toHide=this.errorsFor(a)},check:function(a){a=this.validationTargetFor(this.clean(a));var b=c(a).rules(),d=false,e;for(e in b){var f={method:e,parameters:b[e]};try{var g=c.validator.methods[e].call(this,a.value.replace(/\r/g,""),a,f.parameters);if(g=="dependency-mismatch")d=true;else{d=false;if(g=="pending"){this.toHide=this.toHide.not(this.errorsFor(a));return}if(!g){this.formatAndAdd(a,f);return false}}}catch(h){this.settings.debug&&window.console&&console.log("exception occured when checking element "+
a.id+", check the '"+f.method+"' method",h);throw h;}}if(!d){this.objectLength(b)&&this.successList.push(a);return true}},customMetaMessage:function(a,b){if(c.metadata){var d=this.settings.meta?c(a).metadata()[this.settings.meta]:c(a).metadata();return d&&d.messages&&d.messages[b]}},customMessage:function(a,b){var d=this.settings.messages[a];return d&&(d.constructor==String?d:d[b])},findDefined:function(){for(var a=0;a<arguments.length;a++)if(arguments[a]!==undefined)return arguments[a]},defaultMessage:function(a,
b){return this.findDefined(this.customMessage(a.name,b),this.customMetaMessage(a,b),!this.settings.ignoreTitle&&a.title||undefined,c.validator.messages[b],"<strong>Warning: No message defined for "+a.name+"</strong>")},formatAndAdd:function(a,b){var d=this.defaultMessage(a,b.method),e=/\$?\{(\d+)\}/g;if(typeof d=="function")d=d.call(this,b.parameters,a);else if(e.test(d))d=jQuery.format(d.replace(e,"{$1}"),b.parameters);this.errorList.push({message:d,element:a});this.errorMap[a.name]=d;this.submitted[a.name]=
d},addWrapper:function(a){if(this.settings.wrapper)a=a.add(a.parent(this.settings.wrapper));return a},defaultShowErrors:function(){for(var a=0;this.errorList[a];a++){var b=this.errorList[a];this.settings.highlight&&this.settings.highlight.call(this,b.element,this.settings.errorClass,this.settings.validClass);this.showLabel(b.element,b.message)}if(this.errorList.length)this.toShow=this.toShow.add(this.containers);if(this.settings.success)for(a=0;this.successList[a];a++)this.showLabel(this.successList[a]);
if(this.settings.unhighlight){a=0;for(b=this.validElements();b[a];a++)this.settings.unhighlight.call(this,b[a],this.settings.errorClass,this.settings.validClass)}this.toHide=this.toHide.not(this.toShow);this.hideErrors();this.addWrapper(this.toShow).show()},validElements:function(){return this.currentElements.not(this.invalidElements())},invalidElements:function(){return c(this.errorList).map(function(){return this.element})},showLabel:function(a,b){var d=this.errorsFor(a);if(d.length){d.removeClass(this.settings.validClass).addClass(this.settings.errorClass);
d.attr("generated")&&d.html(b)}else{d=c("<"+this.settings.errorElement+"/>").attr({"for":this.idOrName(a),generated:true}).addClass(this.settings.errorClass).html(b||"");if(this.settings.wrapper)d=d.hide().show().wrap("<"+this.settings.wrapper+"/>").parent();this.labelContainer.append(d).length||(this.settings.errorPlacement?this.settings.errorPlacement(d,c(a)):d.insertAfter(a))}if(!b&&this.settings.success){d.text("");typeof this.settings.success=="string"?d.addClass(this.settings.success):this.settings.success(d)}this.toShow=
this.toShow.add(d)},errorsFor:function(a){var b=this.idOrName(a);return this.errors().filter(function(){return c(this).attr("for")==b})},idOrName:function(a){return this.groups[a.name]||(this.checkable(a)?a.name:a.id||a.name)},validationTargetFor:function(a){if(this.checkable(a))a=this.findByName(a.name).not(this.settings.ignore)[0];return a},checkable:function(a){return/radio|checkbox/i.test(a.type)},findByName:function(a){var b=this.currentForm;return c(document.getElementsByName(a)).map(function(d,
e){return e.form==b&&e.name==a&&e||null})},getLength:function(a,b){switch(b.nodeName.toLowerCase()){case "select":return c("option:selected",b).length;case "input":if(this.checkable(b))return this.findByName(b.name).filter(":checked").length}return a.length},depend:function(a,b){return this.dependTypes[typeof a]?this.dependTypes[typeof a](a,b):true},dependTypes:{"boolean":function(a){return a},string:function(a,b){return!!c(a,b.form).length},"function":function(a,b){return a(b)}},optional:function(a){return!c.validator.methods.required.call(this,
c.trim(a.value),a)&&"dependency-mismatch"},startRequest:function(a){if(!this.pending[a.name]){this.pendingRequest++;this.pending[a.name]=true}},stopRequest:function(a,b){this.pendingRequest--;if(this.pendingRequest<0)this.pendingRequest=0;delete this.pending[a.name];if(b&&this.pendingRequest==0&&this.formSubmitted&&this.form()){c(this.currentForm).submit();this.formSubmitted=false}else if(!b&&this.pendingRequest==0&&this.formSubmitted){c(this.currentForm).triggerHandler("invalid-form",[this]);this.formSubmitted=
false}},previousValue:function(a){return c.data(a,"previousValue")||c.data(a,"previousValue",{old:null,valid:true,message:this.defaultMessage(a,"remote")})}},classRuleSettings:{required:{required:true},email:{email:true},url:{url:true},date:{date:true},dateISO:{dateISO:true},dateDE:{dateDE:true},number:{number:true},numberDE:{numberDE:true},digits:{digits:true},creditcard:{creditcard:true}},addClassRules:function(a,b){a.constructor==String?this.classRuleSettings[a]=b:c.extend(this.classRuleSettings,
a)},classRules:function(a){var b={};(a=c(a).attr("class"))&&c.each(a.split(" "),function(){this in c.validator.classRuleSettings&&c.extend(b,c.validator.classRuleSettings[this])});return b},attributeRules:function(a){var b={};a=c(a);for(var d in c.validator.methods){var e;if(e=d==="required"&&typeof c.fn.prop==="function"?a.prop(d):a.attr(d))b[d]=e;else if(a[0].getAttribute("type")===d)b[d]=true}b.maxlength&&/-1|2147483647|524288/.test(b.maxlength)&&delete b.maxlength;return b},metadataRules:function(a){if(!c.metadata)return{};
var b=c.data(a.form,"validator").settings.meta;return b?c(a).metadata()[b]:c(a).metadata()},staticRules:function(a){var b={},d=c.data(a.form,"validator");if(d.settings.rules)b=c.validator.normalizeRule(d.settings.rules[a.name])||{};return b},normalizeRules:function(a,b){c.each(a,function(d,e){if(e===false)delete a[d];else if(e.param||e.depends){var f=true;switch(typeof e.depends){case "string":f=!!c(e.depends,b.form).length;break;case "function":f=e.depends.call(b,b)}if(f)a[d]=e.param!==undefined?
e.param:true;else delete a[d]}});c.each(a,function(d,e){a[d]=c.isFunction(e)?e(b):e});c.each(["minlength","maxlength","min","max"],function(){if(a[this])a[this]=Number(a[this])});c.each(["rangelength","range"],function(){if(a[this])a[this]=[Number(a[this][0]),Number(a[this][1])]});if(c.validator.autoCreateRanges){if(a.min&&a.max){a.range=[a.min,a.max];delete a.min;delete a.max}if(a.minlength&&a.maxlength){a.rangelength=[a.minlength,a.maxlength];delete a.minlength;delete a.maxlength}}a.messages&&delete a.messages;
return a},normalizeRule:function(a){if(typeof a=="string"){var b={};c.each(a.split(/\s/),function(){b[this]=true});a=b}return a},addMethod:function(a,b,d){c.validator.methods[a]=b;c.validator.messages[a]=d!=undefined?d:c.validator.messages[a];b.length<3&&c.validator.addClassRules(a,c.validator.normalizeRule(a))},methods:{required:function(a,b,d){if(!this.depend(d,b))return"dependency-mismatch";switch(b.nodeName.toLowerCase()){case "select":return(a=c(b).val())&&a.length>0;case "input":if(this.checkable(b))return this.getLength(a,
b)>0;default:return c.trim(a).length>0}},remote:function(a,b,d){if(this.optional(b))return"dependency-mismatch";var e=this.previousValue(b);this.settings.messages[b.name]||(this.settings.messages[b.name]={});e.originalMessage=this.settings.messages[b.name].remote;this.settings.messages[b.name].remote=e.message;d=typeof d=="string"&&{url:d}||d;if(this.pending[b.name])return"pending";if(e.old===a)return e.valid;e.old=a;var f=this;this.startRequest(b);var g={};g[b.name]=a;c.ajax(c.extend(true,{url:d,
mode:"abort",port:"validate"+b.name,dataType:"json",data:g,success:function(h){f.settings.messages[b.name].remote=e.originalMessage;var j=h===true;if(j){var i=f.formSubmitted;f.prepareElement(b);f.formSubmitted=i;f.successList.push(b);f.showErrors()}else{i={};h=h||f.defaultMessage(b,"remote");i[b.name]=e.message=c.isFunction(h)?h(a):h;f.showErrors(i)}e.valid=j;f.stopRequest(b,j)}},d));return"pending"},minlength:function(a,b,d){return this.optional(b)||this.getLength(c.trim(a),b)>=d},maxlength:function(a,
b,d){return this.optional(b)||this.getLength(c.trim(a),b)<=d},rangelength:function(a,b,d){a=this.getLength(c.trim(a),b);return this.optional(b)||a>=d[0]&&a<=d[1]},min:function(a,b,d){return this.optional(b)||a>=d},max:function(a,b,d){return this.optional(b)||a<=d},range:function(a,b,d){return this.optional(b)||a>=d[0]&&a<=d[1]},email:function(a,b){return this.optional(b)||/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test(a)},
url:function(a,b){return this.optional(b)||/^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(a)},
date:function(a,b){return this.optional(b)||!/Invalid|NaN/.test(new Date(a))},dateISO:function(a,b){return this.optional(b)||/^\d{4}[\/-]\d{1,2}[\/-]\d{1,2}$/.test(a)},number:function(a,b){return this.optional(b)||/^-?(?:\d+|\d{1,3}(?:,\d{3})+)(?:\.\d+)?$/.test(a)},digits:function(a,b){return this.optional(b)||/^\d+$/.test(a)},creditcard:function(a,b){if(this.optional(b))return"dependency-mismatch";if(/[^0-9 -]+/.test(a))return false;var d=0,e=0,f=false;a=a.replace(/\D/g,"");for(var g=a.length-1;g>=
0;g--){e=a.charAt(g);e=parseInt(e,10);if(f)if((e*=2)>9)e-=9;d+=e;f=!f}return d%10==0},accept:function(a,b,d){d=typeof d=="string"?d.replace(/,/g,"|"):"png|jpe?g|gif";return this.optional(b)||a.match(RegExp(".("+d+")$","i"))},equalTo:function(a,b,d){d=c(d).unbind(".validate-equalTo").bind("blur.validate-equalTo",function(){c(b).valid()});return a==d.val()}}});c.format=c.validator.format})(jQuery);
(function(c){var a={};if(c.ajaxPrefilter)c.ajaxPrefilter(function(d,e,f){e=d.port;if(d.mode=="abort"){a[e]&&a[e].abort();a[e]=f}});else{var b=c.ajax;c.ajax=function(d){var e=("port"in d?d:c.ajaxSettings).port;if(("mode"in d?d:c.ajaxSettings).mode=="abort"){a[e]&&a[e].abort();return a[e]=b.apply(this,arguments)}return b.apply(this,arguments)}}})(jQuery);
(function(c){!jQuery.event.special.focusin&&!jQuery.event.special.focusout&&document.addEventListener&&c.each({focus:"focusin",blur:"focusout"},function(a,b){function d(e){e=c.event.fix(e);e.type=b;return c.event.handle.call(this,e)}c.event.special[b]={setup:function(){this.addEventListener(a,d,true)},teardown:function(){this.removeEventListener(a,d,true)},handler:function(e){arguments[0]=c.event.fix(e);arguments[0].type=b;return c.event.handle.apply(this,arguments)}}});c.extend(c.fn,{validateDelegate:function(a,
b,d){return this.bind(b,function(e){var f=c(e.target);if(f.is(a))return d.apply(f,arguments)})}})})(jQuery);


(function($){$.fn.simplyScroll=function(o){return this.each(function(){new $.simplyScroll(this,o);});};var defaults={className:'simply-scroll',frameRate:24,speed:1,horizontal:true,autoMode:'off',pauseOnHover:true,startOnLoad:false,localJsonSource:'',flickrFeed:'',jsonImgWidth:240,jsonImgHeight:180};$.simplyScroll=function(el,o){var self=this;this.o=$.extend({},defaults,o||{});this.auto=this.o.autoMode!=="off"?true:false;this.$list=$(el);this.$list.addClass('simply-scroll-list').wrap('<div class="simply-scroll-clip"></div>').parent().wrap('<div class="'+this.o.className+' simply-scroll-container"></div>');if(!this.o.auto){this.$list.parent().parent().prepend('<div class="simply-scroll-forward"></div>').prepend('<div class="simply-scroll-back"></div>');}
if(this.o.flickrFeed){$.getJSON(this.o.flickrFeed+"&format=json&jsoncallback=?",function(data){json=[];$.each(data.items,function(i,item){json.push({"src":item.media.m,"title":item.title,"link":item.link});});self.renderData(json);});}else if(this.o.localJsonSource){$.getJSON(this.o.localJsonSource,function(json){self.renderData(json);});}else{if(!this.o.startOnLoad){this.init();}else{$(window).load(function(){self.init();});}}};$.simplyScroll.fn=$.simplyScroll.prototype={};$.simplyScroll.fn.extend=$.simplyScroll.extend=$.extend;$.simplyScroll.fn.extend({init:function(){this.$items=this.$list.children();this.$clip=this.$list.parent();this.$container=this.$clip.parent();if(!this.o.horizontal){this.itemMax=this.$items[0].offsetHeight;this.clipMax=this.$clip.height();this.dimension='height';this.moveBackClass='simply-scroll-btn-up';this.moveForwardClass='simply-scroll-btn-down';}else{this.itemMax=this.$items[0].offsetWidth;this.clipMax=this.$clip.width();this.dimension='width';this.moveBackClass='simply-scroll-btn-left';this.moveForwardClass='simply-scroll-btn-right';}
this.posMin=0;this.posMax=this.$items.length*this.itemMax;this.$list.css(this.dimension,this.posMax+'px');if(this.o.autoMode=='loop'){var addItems=Math.ceil(this.clipMax/this.itemMax);this.$items.slice(0,addItems).clone(true).appendTo(this.$list);this.posMax+=(this.clipMax-this.o.speed);this.$list.css(this.dimension,this.posMax+(this.itemMax*addItems)+'px');}
this.interval=null;this.intervalDelay=Math.floor(1000/this.o.frameRate);while(this.itemMax%this.o.speed!==0){this.o.speed--;if(this.o.speed===0){this.o.speed=1;break;}}
var self=this;this.trigger=null;this.funcMoveBack=function(){self.trigger=this;self.moveBack();};this.funcMoveForward=function(){self.trigger=this;self.moveForward();};this.funcMoveStop=function(){self.moveStop();};this.funcMoveResume=function(){self.moveResume();};if(this.auto){if(this.o.pauseOnHover){this.$clip.hover(this.funcMoveStop,this.funcMoveResume);}
this.moveForward();}else{this.$btnBack=$('.simply-scroll-back',this.$container).addClass('simply-scroll-btn'+' '+this.moveBackClass+' '+'disabled').hover(this.funcMoveBack,this.funcMoveStop);this.$btnForward=$('.simply-scroll-forward',this.$container).addClass('simply-scroll-btn'+' '+this.moveForwardClass).hover(this.funcMoveForward,this.funcMoveStop);}},moveForward:function(){var self=this;this.movement='forward';if(this.trigger!==null){this.$btnBack.removeClass('disabled');}
self.interval=setInterval(function(){if(!self.o.horizontal&&self.$clip[0].scrollTop<(self.posMax-self.clipMax)){self.$clip[0].scrollTop+=self.o.speed;}else if(self.o.horizontal&&self.$clip[0].scrollLeft<(self.posMax-self.clipMax)){self.$clip[0].scrollLeft+=self.o.speed;}else if(self.o.autoMode=='loop'){self.resetPos();}else{self.moveStop(self.movement);}},self.intervalDelay);},moveBack:function(){var self=this;this.movement='back';if(this.trigger!==null){this.$btnForward.removeClass('disabled');}
self.interval=setInterval(function(){if(!self.o.horizontal&&self.$clip[0].scrollTop>0){self.$clip[0].scrollTop-=self.o.speed;}else if(self.o.horizontal&&self.$clip[0].scrollLeft>0){self.$clip[0].scrollLeft-=self.o.speed;}else if(self.o.autoMode=='loop'){self.resetPos();}else{self.moveStop(self.movement);}},self.intervalDelay);},moveStop:function(moveDir){clearInterval(this.interval);if(this.trigger!==null){if(typeof moveDir!="undefined"){$(this.trigger).addClass('disabled');}
this.trigger=null;}
if(this.auto){if(this.o.autoMode=='bounce'){moveDir=='forward'?this.moveBack():this.moveForward();}}},moveResume:function(){this.movement=='forward'?this.moveForward():this.moveBack();},resetPos:function(){if(!this.o.horizontal){this.$clip[0].scrollTop=0;}else{this.$clip[0].scrollLeft=0;}},renderData:function(json){if(json.length>0){var self=this;$.each(json,function(i,item){$("<img/>").attr({src:item.src,title:item.title,alt:item.title,width:self.o.jsonImgWidth,height:self.o.jsonImgHeight}).appendTo(self.$list);});this.init();}}});})(jQuery);



(function(a,b,c){"use strict";var d=b.event,e;d.special.smartresize={setup:function(){b(this).bind("resize",d.special.smartresize.handler)},teardown:function(){b(this).unbind("resize",d.special.smartresize.handler)},handler:function(a,c){var d=this,f=arguments;a.type="smartresize",e&&clearTimeout(e),e=setTimeout(function(){b.event.handle.apply(d,f)},c==="execAsap"?0:100)}},b.fn.smartresize=function(a){return a?this.bind("smartresize",a):this.trigger("smartresize",["execAsap"])},b.Mason=function(a,c){this.element=b(c),this._create(a),this._init()},b.Mason.settings={isResizable:!0,isAnimated:!1,animationOptions:{queue:!1,duration:500},gutterWidth:0,isRTL:!1,isFitWidth:!1,containerStyle:{position:"relative"}},b.Mason.prototype={_filterFindBricks:function(a){var b=this.options.itemSelector;return b?a.filter(b).add(a.find(b)):a},_getBricks:function(a){var b=this._filterFindBricks(a).css({position:"absolute"}).addClass("masonry-brick");return b},_create:function(c){this.options=b.extend(!0,{},b.Mason.settings,c),this.styleQueue=[];var d=this.element[0].style;this.originalStyle={height:d.height||""};var e=this.options.containerStyle;for(var f in e)this.originalStyle[f]=d[f]||"";this.element.css(e),this.horizontalDirection=this.options.isRTL?"right":"left",this.offset={x:parseInt(this.element.css("padding-"+this.horizontalDirection),10),y:parseInt(this.element.css("padding-top"),10)},this.isFluid=this.options.columnWidth&&typeof this.options.columnWidth=="function";var g=this;setTimeout(function(){g.element.addClass("masonry")},0),this.options.isResizable&&b(a).bind("smartresize.masonry",function(){g.resize()}),this.reloadItems()},_init:function(a){this._getColumns(),this._reLayout(a)},option:function(a,c){b.isPlainObject(a)&&(this.options=b.extend(!0,this.options,a))},layout:function(a,b){for(var c=0,d=a.length;c<d;c++)this._placeBrick(a[c]);var e={};e.height=Math.max.apply(Math,this.colYs);if(this.options.isFitWidth){var f=0;c=this.cols;while(--c){if(this.colYs[c]!==0)break;f++}e.width=(this.cols-f)*this.columnWidth-this.options.gutterWidth}this.styleQueue.push({$el:this.element,style:e});var g=this.isLaidOut?this.options.isAnimated?"animate":"css":"css",h=this.options.animationOptions,i;for(c=0,d=this.styleQueue.length;c<d;c++)i=this.styleQueue[c],i.$el[g](i.style,h);this.styleQueue=[],b&&b.call(a),this.isLaidOut=!0},_getColumns:function(){var a=this.options.isFitWidth?this.element.parent():this.element,b=a.width();this.columnWidth=this.isFluid?this.options.columnWidth(b):this.options.columnWidth||this.$bricks.outerWidth(!0)||b,this.columnWidth+=this.options.gutterWidth,this.cols=Math.floor((b+this.options.gutterWidth)/this.columnWidth),this.cols=Math.max(this.cols,1)},_placeBrick:function(a){var c=b(a),d,e,f,g,h;d=Math.ceil(c.outerWidth(!0)/this.columnWidth),d=Math.min(d,this.cols);if(d===1)f=this.colYs;else{e=this.cols+1-d,f=[];for(h=0;h<e;h++)g=this.colYs.slice(h,h+d),f[h]=Math.max.apply(Math,g)}var i=Math.min.apply(Math,f),j=0;for(var k=0,l=f.length;k<l;k++)if(f[k]===i){j=k;break}var m={top:i+this.offset.y};m[this.horizontalDirection]=this.columnWidth*j+this.offset.x,this.styleQueue.push({$el:c,style:m});var n=i+c.outerHeight(!0),o=this.cols+1-l;for(k=0;k<o;k++)this.colYs[j+k]=n},resize:function(){var a=this.cols;this._getColumns(),(this.isFluid||this.cols!==a)&&this._reLayout()},_reLayout:function(a){var b=this.cols;this.colYs=[];while(b--)this.colYs.push(0);this.layout(this.$bricks,a)},reloadItems:function(){this.$bricks=this._getBricks(this.element.children())},reload:function(a){this.reloadItems(),this._init(a)},appended:function(a,b,c){if(b){this._filterFindBricks(a).css({top:this.element.height()});var d=this;setTimeout(function(){d._appended(a,c)},1)}else this._appended(a,c)},_appended:function(a,b){var c=this._getBricks(a);this.$bricks=this.$bricks.add(c),this.layout(c,b)},remove:function(a){this.$bricks=this.$bricks.not(a),a.remove()},destroy:function(){this.$bricks.removeClass("masonry-brick").each(function(){this.style.position="",this.style.top="",this.style.left=""});var c=this.element[0].style;for(var d in this.originalStyle)c[d]=this.originalStyle[d];this.element.unbind(".masonry").removeClass("masonry").removeData("masonry"),b(a).unbind(".masonry")}},b.fn.imagesLoaded=function(a){function h(){a.call(c,d)}function i(a){var c=a.target;c.src!==f&&b.inArray(c,g)===-1&&(g.push(c),--e<=0&&(setTimeout(h),d.unbind(".imagesLoaded",i)))}var c=this,d=c.find("img").add(c.filter("img")),e=d.length,f="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",g=[];return e||h(),d.bind("load.imagesLoaded error.imagesLoaded",i).each(function(){var a=this.src;this.src=f,this.src=a}),c};var f=function(b){a.console&&a.console.error(b)};b.fn.masonry=function(a){if(typeof a=="string"){var c=Array.prototype.slice.call(arguments,1);this.each(function(){var d=b.data(this,"masonry");if(!d){f("cannot call methods on masonry prior to initialization; attempted to call method '"+a+"'");return}if(!b.isFunction(d[a])||a.charAt(0)==="_"){f("no such method '"+a+"' for masonry instance");return}d[a].apply(d,c)})}else this.each(function(){var c=b.data(this,"masonry");c?(c.option(a||{}),c._init()):b.data(this,"masonry",new b.Mason(a,this))});return this}})(window,jQuery);
(function(){function s(a,b){var c;a||(a={});for(c in b)a[c]=b[c];return a}function la(){for(var a=0,b=arguments,c=b.length,d={};a<c;a++)d[b[a++]]=b[a];return d}function A(a,b){return parseInt(a,b||10)}function ma(a){return typeof a==="string"}function Z(a){return typeof a==="object"}function Fa(a){return Object.prototype.toString.call(a)==="[object Array]"}function Ga(a){return typeof a==="number"}function na(a){return K.log(a)/K.LN10}function ca(a){return K.pow(10,a)}function ya(a,b){for(var c=a.length;c--;)if(a[c]===
b){a.splice(c,1);break}}function u(a){return a!==x&&a!==null}function B(a,b,c){var d,e;if(ma(b))u(c)?a.setAttribute(b,c):a&&a.getAttribute&&(e=a.getAttribute(b));else if(u(b)&&Z(b))for(d in b)a.setAttribute(d,b[d]);return e}function oa(a){return Fa(a)?a:[a]}function p(){var a=arguments,b,c,d=a.length;for(b=0;b<d;b++)if(c=a[b],typeof c!=="undefined"&&c!==null)return c}function G(a,b){if(Ha&&b&&b.opacity!==x)b.filter="alpha(opacity="+b.opacity*100+")";s(a.style,b)}function S(a,b,c,d,e){a=z.createElement(a);
b&&s(a,b);e&&G(a,{padding:0,border:T,margin:0});c&&G(a,c);d&&d.appendChild(a);return a}function da(a,b){var c=function(){};c.prototype=new a;s(c.prototype,b);return c}function Ia(a,b,c,d){var e=O.lang,f=a;b===-1?(b=(a||0).toString(),a=b.indexOf(".")>-1?b.split(".")[1].length:0):a=isNaN(b=N(b))?2:b;var b=a,c=c===void 0?e.decimalPoint:c,d=d===void 0?e.thousandsSep:d,e=f<0?"-":"",a=String(A(f=N(+f||0).toFixed(b))),g=a.length>3?a.length%3:0;return e+(g?a.substr(0,g)+d:"")+a.substr(g).replace(/(\d{3})(?=\d)/g,
"$1"+d)+(b?c+N(f-a).toFixed(b).slice(2):"")}function sa(a,b){return Array((b||2)+1-String(a).length).join(0)+a}function hb(a,b,c,d){var e,c=p(c,1);e=a/c;b||(b=[1,2,2.5,5,10],d&&d.allowDecimals===!1&&(c===1?b=[1,2,5,10]:c<=0.1&&(b=[1/c])));for(d=0;d<b.length;d++)if(a=b[d],e<=(b[d]+(b[d+1]||b[d]))/2)break;a*=c;return a}function Nb(a,b){var c=b||[[zb,[1,2,5,10,20,25,50,100,200,500]],[ib,[1,2,5,10,15,30]],[Ua,[1,2,5,10,15,30]],[Ja,[1,2,3,4,6,8,12]],[pa,[1,2]],[Va,[1,2]],[Ka,[1,2,3,4,6]],[ta,null]],d=
c[c.length-1],e=D[d[0]],f=d[1],g;for(g=0;g<c.length;g++)if(d=c[g],e=D[d[0]],f=d[1],c[g+1]&&a<=(e*f[f.length-1]+D[c[g+1][0]])/2)break;e===D[ta]&&a<5*e&&(f=[1,2,5]);e===D[ta]&&a<5*e&&(f=[1,2,5]);c=hb(a/e,f);return{unitRange:e,count:c,unitName:d[0]}}function Ob(a,b,c,d){var e=[],f={},g=O.global.useUTC,h,i=new Date(b),b=a.unitRange,j=a.count;b>=D[ib]&&(i.setMilliseconds(0),i.setSeconds(b>=D[Ua]?0:j*V(i.getSeconds()/j)));if(b>=D[Ua])i[Ab](b>=D[Ja]?0:j*V(i[jb]()/j));if(b>=D[Ja])i[Bb](b>=D[pa]?0:j*V(i[kb]()/
j));if(b>=D[pa])i[lb](b>=D[Ka]?1:j*V(i[La]()/j));b>=D[Ka]&&(i[Cb](b>=D[ta]?0:j*V(i[Wa]()/j)),h=i[Xa]());b>=D[ta]&&(h-=h%j,i[Db](h));if(b===D[Va])i[lb](i[La]()-i[mb]()+p(d,1));d=1;h=i[Xa]();for(var k=i.getTime(),l=i[Wa](),m=i[La](),i=g?0:(864E5+i.getTimezoneOffset()*6E4)%864E5;k<c;)e.push(k),b===D[ta]?k=Ya(h+d*j,0):b===D[Ka]?k=Ya(h,l+d*j):!g&&(b===D[pa]||b===D[Va])?k=Ya(h,l,m+d*j*(b===D[pa]?1:7)):(k+=b*j,b<=D[Ja]&&k%D[pa]===i&&(f[k]=pa)),d++;e.push(k);e.info=s(a,{higherRanks:f,totalRange:b*j});return e}
function Eb(){this.symbol=this.color=0}function Fb(a,b){var c=a.length,d,e;for(e=0;e<c;e++)a[e].ss_i=e;a.sort(function(a,c){d=b(a,c);return d===0?a.ss_i-c.ss_i:d});for(e=0;e<c;e++)delete a[e].ss_i}function Ma(a){for(var b=a.length,c=a[0];b--;)a[b]<c&&(c=a[b]);return c}function za(a){for(var b=a.length,c=a[0];b--;)a[b]>c&&(c=a[b]);return c}function Aa(a,b){for(var c in a)a[c]&&a[c]!==b&&a[c].destroy&&a[c].destroy(),delete a[c]}function Na(a){Za||(Za=S(ia));a&&Za.appendChild(a);Za.innerHTML=""}function $a(a,
b){var c="Highcharts error #"+a+": www.highcharts.com/errors/"+a;if(b)throw c;else L.console&&console.log(c)}function ja(a){return parseFloat(a.toPrecision(14))}function ua(a,b){Oa=p(a,b.animation)}function Gb(){var a=O.global.useUTC,b=a?"getUTC":"get",c=a?"setUTC":"set";Ya=a?Date.UTC:function(a,b,c,g,h,i){return(new Date(a,b,p(c,1),p(g,0),p(h,0),p(i,0))).getTime()};jb=b+"Minutes";kb=b+"Hours";mb=b+"Day";La=b+"Date";Wa=b+"Month";Xa=b+"FullYear";Ab=c+"Minutes";Bb=c+"Hours";lb=c+"Date";Cb=c+"Month";
Db=c+"FullYear"}function va(){}function Pa(a,b,c){this.axis=a;this.pos=b;this.type=c||"";this.isNew=!0;c||this.addLabel()}function nb(a,b){this.axis=a;if(b)this.options=b,this.id=b.id;return this}function Hb(a,b,c,d,e){var f=a.chart.inverted;this.axis=a;this.isNegative=c;this.options=b;this.x=d;this.stack=e;this.alignOptions={align:b.align||(f?c?"left":"right":"center"),verticalAlign:b.verticalAlign||(f?"middle":c?"bottom":"top"),y:p(b.y,f?4:c?14:-6),x:p(b.x,f?c?-6:6:0)};this.textAlign=b.textAlign||
(f?c?"right":"left":"center")}function ob(){this.init.apply(this,arguments)}function pb(a,b){var c=b.borderWidth,d=b.style,e=A(d.padding);this.chart=a;this.options=b;this.crosshairs=[];this.now={x:0,y:0};this.isHidden=!0;this.label=a.renderer.label("",0,0,b.shape,null,null,b.useHTML,null,"tooltip").attr({padding:e,fill:b.backgroundColor,"stroke-width":c,r:b.borderRadius,zIndex:8}).css(d).css({padding:0}).hide().add();$||this.label.shadow(b.shadow);this.shared=b.shared}function qb(a,b){var c=$?"":
b.chart.zoomType;this.zoomX=/x/.test(c);this.zoomY=/y/.test(c);this.options=b;this.chart=a;this.init(a,b.tooltip)}function rb(a){this.init(a)}function sb(a,b){var c,d=a.series;a.series=null;c=C(O,a);c.series=a.series=d;var d=c.chart,e=d.margin,e=Z(e)?e:[e,e,e,e];this.optionsMarginTop=p(d.marginTop,e[0]);this.optionsMarginRight=p(d.marginRight,e[1]);this.optionsMarginBottom=p(d.marginBottom,e[2]);this.optionsMarginLeft=p(d.marginLeft,e[3]);this.runChartClick=(e=d.events)&&!!e.click;this.callback=b;
this.isResizing=0;this.options=c;this.axes=[];this.series=[];this.hasCartesianSeries=d.showAxes;this.init(e)}var x,z=document,L=window,K=Math,t=K.round,V=K.floor,wa=K.ceil,v=K.max,P=K.min,N=K.abs,W=K.cos,aa=K.sin,xa=K.PI,ab=xa*2/360,Ba=navigator.userAgent,Ib=L.opera,Ha=/msie/i.test(Ba)&&!Ib,Qa=z.documentMode===8,tb=/AppleWebKit/.test(Ba),bb=/Firefox/.test(Ba),fa=!!z.createElementNS&&!!z.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect,Pb=bb&&parseInt(Ba.split("Firefox/")[1],10)<4,
$=!fa&&!Ha&&!!z.createElement("canvas").getContext,Ra,ga=z.documentElement.ontouchstart!==x,Jb={},ub=0,Za,O,cb,Oa,vb,D,Ca=function(){},ia="div",T="none",wb="rgba(192,192,192,"+(fa?1.0E-6:0.0020)+")",zb="millisecond",ib="second",Ua="minute",Ja="hour",pa="day",Va="week",Ka="month",ta="year",Ya,jb,kb,mb,La,Wa,Xa,Ab,Bb,lb,Cb,Db,ba={};L.Highcharts={};cb=function(a,b,c){if(!u(b)||isNaN(b))return"Invalid date";var a=p(a,"%Y-%m-%d %H:%M:%S"),d=new Date(b),e,f=d[kb](),g=d[mb](),h=d[La](),i=d[Wa](),j=d[Xa](),
k=O.lang,l=k.weekdays,b={a:l[g].substr(0,3),A:l[g],d:sa(h),e:h,b:k.shortMonths[i],B:k.months[i],m:sa(i+1),y:j.toString().substr(2,2),Y:j,H:sa(f),I:sa(f%12||12),l:f%12||12,M:sa(d[jb]()),p:f<12?"AM":"PM",P:f<12?"am":"pm",S:sa(d.getSeconds()),L:sa(t(b%1E3),3)};for(e in b)a=a.replace("%"+e,b[e]);return c?a.substr(0,1).toUpperCase()+a.substr(1):a};Eb.prototype={wrapColor:function(a){if(this.color>=a)this.color=0},wrapSymbol:function(a){if(this.symbol>=a)this.symbol=0}};D=la(zb,1,ib,1E3,Ua,6E4,Ja,36E5,
pa,864E5,Va,6048E5,Ka,2592E6,ta,31556952E3);vb={init:function(a,b,c){var b=b||"",d=a.shift,e=b.indexOf("C")>-1,f=e?7:3,g,b=b.split(" "),c=[].concat(c),h,i,j=function(a){for(g=a.length;g--;)a[g]==="M"&&a.splice(g+1,0,a[g+1],a[g+2],a[g+1],a[g+2])};e&&(j(b),j(c));a.isArea&&(h=b.splice(b.length-6,6),i=c.splice(c.length-6,6));if(d<=c.length/f)for(;d--;)c=[].concat(c).splice(0,f).concat(c);a.shift=0;if(b.length)for(a=c.length;b.length<a;)d=[].concat(b).splice(b.length-f,f),e&&(d[f-6]=d[f-2],d[f-5]=d[f-
1]),b=b.concat(d);h&&(b=b.concat(h),c=c.concat(i));return[b,c]},step:function(a,b,c,d){var e=[],f=a.length;if(c===1)e=d;else if(f===b.length&&c<1)for(;f--;)d=parseFloat(a[f]),e[f]=isNaN(d)?a[f]:c*parseFloat(b[f]-d)+d;else e=b;return e}};(function(a){L.HighchartsAdapter=L.HighchartsAdapter||a&&{init:function(b){var c=a.fx,d=c.step,e,f=a.Tween,g=f&&f.propHooks;a.extend(a.easing,{easeOutQuad:function(a,b,c,d,e){return-d*(b/=e)*(b-2)+c}});a.each(["cur","_default","width","height"],function(a,b){var e=
d,k,l;b==="cur"?e=c.prototype:b==="_default"&&f&&(e=g[b],b="set");(k=e[b])&&(e[b]=function(c){c=a?c:this;l=c.elem;return l.attr?l.attr(c.prop,b==="cur"?x:c.now):k.apply(this,arguments)})});e=function(a){var c=a.elem,d;if(!a.started)d=b.init(c,c.d,c.toD),a.start=d[0],a.end=d[1],a.started=!0;c.attr("d",b.step(a.start,a.end,a.pos,c.toD))};f?g.d={set:e}:d.d=e;this.each=Array.prototype.forEach?function(a,b){return Array.prototype.forEach.call(a,b)}:function(a,b){for(var c=0,d=a.length;c<d;c++)if(b.call(a[c],
a[c],c,a)===!1)return c}},getScript:a.getScript,inArray:a.inArray,adapterRun:function(b,c){return a(b)[c]()},grep:a.grep,map:function(a,c){for(var d=[],e=0,f=a.length;e<f;e++)d[e]=c.call(a[e],a[e],e,a);return d},merge:function(){var b=arguments;return a.extend(!0,null,b[0],b[1],b[2],b[3])},offset:function(b){return a(b).offset()},addEvent:function(b,c,d){a(b).bind(c,d)},removeEvent:function(b,c,d){var e=z.removeEventListener?"removeEventListener":"detachEvent";z[e]&&!b[e]&&(b[e]=function(){});a(b).unbind(c,
d)},fireEvent:function(b,c,d,e){var f=a.Event(c),g="detached"+c,h;!Ha&&d&&(delete d.layerX,delete d.layerY);s(f,d);b[c]&&(b[g]=b[c],b[c]=null);a.each(["preventDefault","stopPropagation"],function(a,b){var c=f[b];f[b]=function(){try{c.call(f)}catch(a){b==="preventDefault"&&(h=!0)}}});a(b).trigger(f);b[g]&&(b[c]=b[g],b[g]=null);e&&!f.isDefaultPrevented()&&!h&&e(f)},washMouseEvent:function(a){var c=a.originalEvent||a;c.pageX=a.pageX;c.pageY=a.pageY;return c},animate:function(b,c,d){var e=a(b);if(c.d)b.toD=
c.d,c.d=1;e.stop();e.animate(c,d)},stop:function(b){a(b).stop()}}})(L.jQuery);var X=L.HighchartsAdapter,F=X||{};X&&X.init.call(X,vb);var db=F.adapterRun,Qb=F.getScript,Rb=F.inArray,n=F.each,Kb=F.grep,Sb=F.offset,Sa=F.map,C=F.merge,H=F.addEvent,U=F.removeEvent,E=F.fireEvent,Lb=F.washMouseEvent,xb=F.animate,eb=F.stop,F={enabled:!0,align:"center",x:0,y:15,style:{color:"#666",fontSize:"11px",lineHeight:"14px"}};O={colors:"#4572A7,#AA4643,#89A54E,#80699B,#3D96AE,#DB843D,#92A8CD,#A47D7C,#B5CA92".split(","),
symbols:["circle","diamond","square","triangle","triangle-down"],lang:{loading:"Loading...",months:"January,February,March,April,May,June,July,August,September,October,November,December".split(","),shortMonths:"Jan,Feb,Mar,Apr,May,Jun,Jul,Aug,Sep,Oct,Nov,Dec".split(","),weekdays:"Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday".split(","),decimalPoint:".",numericSymbols:"k,M,G,T,P,E".split(","),resetZoom:"Reset zoom",resetZoomTitle:"Reset zoom level 1:1",thousandsSep:","},global:{useUTC:!0,
canvasToolsURL:"http://code.highcharts.com/2.3.2/modules/canvas-tools.js",VMLRadialGradientURL:"http://code.highcharts.com/2.3.2/gfx/vml-radial-gradient.png"},chart:{borderColor:"#4572A7",borderRadius:5,defaultSeriesType:"line",ignoreHiddenSeries:!0,spacingTop:10,spacingRight:10,spacingBottom:15,spacingLeft:10,style:{fontFamily:'"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif',fontSize:"12px"},backgroundColor:"#FFFFFF",plotBorderColor:"#C0C0C0",resetZoomButton:{theme:{zIndex:20},
position:{align:"right",x:-10,y:10}}},title:{text:"Chart title",align:"center",y:15,style:{color:"#3E576F",fontSize:"16px"}},subtitle:{text:"",align:"center",y:30,style:{color:"#6D869F"}},plotOptions:{line:{allowPointSelect:!1,showCheckbox:!1,animation:{duration:1E3},events:{},lineWidth:2,shadow:!0,marker:{enabled:!0,lineWidth:0,radius:4,lineColor:"#FFFFFF",states:{hover:{enabled:!0},select:{fillColor:"#FFFFFF",lineColor:"#000000",lineWidth:2}}},point:{events:{}},dataLabels:C(F,{enabled:!1,y:-6,formatter:function(){return this.y}}),
cropThreshold:300,pointRange:0,showInLegend:!0,states:{hover:{marker:{}},select:{marker:{}}},stickyTracking:!0}},labels:{style:{position:"absolute",color:"#3E576F"}},legend:{enabled:!0,align:"center",layout:"horizontal",labelFormatter:function(){return this.name},borderWidth:1,borderColor:"#909090",borderRadius:5,navigation:{activeColor:"#3E576F",inactiveColor:"#CCC"},shadow:!1,itemStyle:{cursor:"pointer",color:"#3E576F",fontSize:"12px"},itemHoverStyle:{color:"#000"},itemHiddenStyle:{color:"#CCC"},
itemCheckboxStyle:{position:"absolute",width:"13px",height:"13px"},symbolWidth:16,symbolPadding:5,verticalAlign:"bottom",x:0,y:0},loading:{labelStyle:{fontWeight:"bold",position:"relative",top:"1em"},style:{position:"absolute",backgroundColor:"white",opacity:0.5,textAlign:"center"}},tooltip:{enabled:!0,backgroundColor:"rgba(255, 255, 255, .85)",borderWidth:2,borderRadius:5,dateTimeLabelFormats:{millisecond:"%A, %b %e, %H:%M:%S.%L",second:"%A, %b %e, %H:%M:%S",minute:"%A, %b %e, %H:%M",hour:"%A, %b %e, %H:%M",
day:"%A, %b %e, %Y",week:"Week from %A, %b %e, %Y",month:"%B %Y",year:"%Y"},headerFormat:'<span style="font-size: 10px">{point.key}</span><br/>',pointFormat:'<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b><br/>',shadow:!0,shared:$,snap:ga?25:10,style:{color:"#333333",fontSize:"12px",padding:"5px",whiteSpace:"nowrap"}},credits:{enabled:0,text:"Highcharts.com",href:"http://www.highcharts.com",position:{align:"right",x:-10,verticalAlign:"bottom",y:-5},style:{cursor:"pointer",
color:"#909090",fontSize:"10px"}}};var Y=O.plotOptions,X=Y.line;Gb();var qa=function(a){var b=[],c;(function(a){(c=/rgba\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]?(?:\.[0-9]+)?)\s*\)/.exec(a))?b=[A(c[1]),A(c[2]),A(c[3]),parseFloat(c[4],10)]:(c=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(a))&&(b=[A(c[1],16),A(c[2],16),A(c[3],16),1])})(a);return{get:function(c){return b&&!isNaN(b[0])?c==="rgb"?"rgb("+b[0]+","+b[1]+","+b[2]+")":c==="a"?b[3]:"rgba("+b.join(",")+
")":a},brighten:function(a){if(Ga(a)&&a!==0){var c;for(c=0;c<3;c++)b[c]+=A(a*255),b[c]<0&&(b[c]=0),b[c]>255&&(b[c]=255)}return this},setOpacity:function(a){b[3]=a;return this}}};va.prototype={init:function(a,b){this.element=b==="span"?S(b):z.createElementNS("http://www.w3.org/2000/svg",b);this.renderer=a;this.attrSetters={}},animate:function(a,b,c){b=p(b,Oa,!0);eb(this);if(b){b=C(b);if(c)b.complete=c;xb(this,a,b)}else this.attr(a),c&&c()},attr:function(a,b){var c,d,e,f,g=this.element,h=g.nodeName,
i=this.renderer,j,k=this.attrSetters,l=this.shadows,m,o,r=this;ma(a)&&u(b)&&(c=a,a={},a[c]=b);if(ma(a))c=a,h==="circle"?c={x:"cx",y:"cy"}[c]||c:c==="strokeWidth"&&(c="stroke-width"),r=B(g,c)||this[c]||0,c!=="d"&&c!=="visibility"&&(r=parseFloat(r));else for(c in a)if(j=!1,d=a[c],e=k[c]&&k[c].call(this,d,c),e!==!1){e!==x&&(d=e);if(c==="d")d&&d.join&&(d=d.join(" ")),/(NaN| {2}|^$)/.test(d)&&(d="M 0 0");else if(c==="x"&&h==="text"){for(e=0;e<g.childNodes.length;e++)f=g.childNodes[e],B(f,"x")===B(g,"x")&&
B(f,"x",d);this.rotation&&B(g,"transform","rotate("+this.rotation+" "+d+" "+A(a.y||B(g,"y"))+")")}else if(c==="fill")d=i.color(d,g,c);else if(h==="circle"&&(c==="x"||c==="y"))c={x:"cx",y:"cy"}[c]||c;else if(h==="rect"&&c==="r")B(g,{rx:d,ry:d}),j=!0;else if(c==="translateX"||c==="translateY"||c==="rotation"||c==="verticalAlign")j=o=!0;else if(c==="stroke")d=i.color(d,g,c);else if(c==="dashstyle")if(c="stroke-dasharray",d=d&&d.toLowerCase(),d==="solid")d=T;else{if(d){d=d.replace("shortdashdotdot","3,1,1,1,1,1,").replace("shortdashdot",
"3,1,1,1").replace("shortdot","1,1,").replace("shortdash","3,1,").replace("longdash","8,3,").replace(/dot/g,"1,3,").replace("dash","4,3,").replace(/,$/,"").split(",");for(e=d.length;e--;)d[e]=A(d[e])*a["stroke-width"];d=d.join(",")}}else if(c==="isTracker")this[c]=d;else if(c==="width")d=A(d);else if(c==="align")c="text-anchor",d={left:"start",center:"middle",right:"end"}[d];else if(c==="title")e=g.getElementsByTagName("title")[0],e||(e=z.createElementNS("http://www.w3.org/2000/svg","title"),g.appendChild(e)),
e.textContent=d;c==="strokeWidth"&&(c="stroke-width");tb&&c==="stroke-width"&&d===0&&(d=1.0E-6);this.symbolName&&/^(x|y|width|height|r|start|end|innerR|anchorX|anchorY)/.test(c)&&(m||(this.symbolAttr(a),m=!0),j=!0);if(l&&/^(width|height|visibility|x|y|d|transform)$/.test(c))for(e=l.length;e--;)B(l[e],c,c==="height"?v(d-(l[e].cutHeight||0),0):d);if((c==="width"||c==="height")&&h==="rect"&&d<0)d=0;this[c]=d;o&&this.updateTransform();c==="text"?(d!==this.textStr&&delete this.bBox,this.textStr=d,this.added&&
i.buildText(this)):j||B(g,c,d)}return r},symbolAttr:function(a){var b=this;n("x,y,r,start,end,width,height,innerR,anchorX,anchorY".split(","),function(c){b[c]=p(a[c],b[c])});b.attr({d:b.renderer.symbols[b.symbolName](b.x,b.y,b.width,b.height,b)})},clip:function(a){return this.attr("clip-path",a?"url("+this.renderer.url+"#"+a.id+")":T)},crisp:function(a,b,c,d,e){var f,g={},h={},i,a=a||this.strokeWidth||this.attr&&this.attr("stroke-width")||0;i=t(a)%2/2;h.x=V(b||this.x||0)+i;h.y=V(c||this.y||0)+i;h.width=
V((d||this.width||0)-2*i);h.height=V((e||this.height||0)-2*i);h.strokeWidth=a;for(f in h)this[f]!==h[f]&&(this[f]=g[f]=h[f]);return g},css:function(a){var b=this.element,b=a&&a.width&&b.nodeName==="text",c,d="",e=function(a,b){return"-"+b.toLowerCase()};if(a&&a.color)a.fill=a.color;this.styles=a=s(this.styles,a);if(Ha&&!fa)b&&delete a.width,G(this.element,a);else{for(c in a)d+=c.replace(/([A-Z])/g,e)+":"+a[c]+";";this.attr({style:d})}b&&this.added&&this.renderer.buildText(this);return this},on:function(a,
b){var c=b;ga&&a==="click"&&(a="touchstart",c=function(a){a.preventDefault();b()});this.element["on"+a]=c;return this},setRadialReference:function(a){this.element.radialReference=a;return this},translate:function(a,b){return this.attr({translateX:a,translateY:b})},invert:function(){this.inverted=!0;this.updateTransform();return this},htmlCss:function(a){var b=this.element;if(b=a&&b.tagName==="SPAN"&&a.width)delete a.width,this.textWidth=b,this.updateTransform();this.styles=s(this.styles,a);G(this.element,
a);return this},htmlGetBBox:function(){var a=this.element,b=this.bBox;if(!b){if(a.nodeName==="text")a.style.position="absolute";b=this.bBox={x:a.offsetLeft,y:a.offsetTop,width:a.offsetWidth,height:a.offsetHeight}}return b},htmlUpdateTransform:function(){if(this.added){var a=this.renderer,b=this.element,c=this.translateX||0,d=this.translateY||0,e=this.x||0,f=this.y||0,g=this.textAlign||"left",h={left:0,center:0.5,right:1}[g],i=g&&g!=="left",j=this.shadows;if(c||d)G(b,{marginLeft:c,marginTop:d}),j&&
n(j,function(a){G(a,{marginLeft:c+1,marginTop:d+1})});this.inverted&&n(b.childNodes,function(c){a.invertChild(c,b)});if(b.tagName==="SPAN"){var k,l,j=this.rotation,m,o=0,r=1,o=0,ea;m=A(this.textWidth);var q=this.xCorr||0,y=this.yCorr||0,M=[j,g,b.innerHTML,this.textWidth].join(",");k={};if(M!==this.cTT){if(u(j))a.isSVG?(q=Ha?"-ms":tb?"-webkit":bb?"-moz":Ib?"-o":"",k[q+"-transform"]=k.transform="rotate("+j+"deg)"):(o=j*ab,r=W(o),o=aa(o),k.filter=j?["progid:DXImageTransform.Microsoft.Matrix(M11=",r,
", M12=",-o,", M21=",o,", M22=",r,", sizingMethod='auto expand')"].join(""):T),G(b,k);k=p(this.elemWidth,b.offsetWidth);l=p(this.elemHeight,b.offsetHeight);k>m&&/[ \-]/.test(b.innerText)&&(G(b,{width:m+"px",display:"block",whiteSpace:"normal"}),k=m);m=a.fontMetrics(b.style.fontSize).b;q=r<0&&-k;y=o<0&&-l;ea=r*o<0;q+=o*m*(ea?1-h:h);y-=r*m*(j?ea?h:1-h:1);i&&(q-=k*h*(r<0?-1:1),j&&(y-=l*h*(o<0?-1:1)),G(b,{textAlign:g}));this.xCorr=q;this.yCorr=y}G(b,{left:e+q+"px",top:f+y+"px"});this.cTT=M}}else this.alignOnAdd=
!0},updateTransform:function(){var a=this.translateX||0,b=this.translateY||0,c=this.inverted,d=this.rotation,e=[];c&&(a+=this.attr("width"),b+=this.attr("height"));(a||b)&&e.push("translate("+a+","+b+")");c?e.push("rotate(90) scale(-1,1)"):d&&e.push("rotate("+d+" "+(this.x||0)+" "+(this.y||0)+")");e.length&&B(this.element,"transform",e.join(" "))},toFront:function(){var a=this.element;a.parentNode.appendChild(a);return this},align:function(a,b,c){a?(this.alignOptions=a,this.alignByTranslate=b,c||
this.renderer.alignedObjects.push(this)):(a=this.alignOptions,b=this.alignByTranslate);var c=p(c,this.renderer),d=a.align,e=a.verticalAlign,f=(c.x||0)+(a.x||0),g=(c.y||0)+(a.y||0),h={};/^(right|center)$/.test(d)&&(f+=(c.width-(a.width||0))/{right:1,center:2}[d]);h[b?"translateX":"x"]=t(f);/^(bottom|middle)$/.test(e)&&(g+=(c.height-(a.height||0))/({bottom:1,middle:2}[e]||1));h[b?"translateY":"y"]=t(g);this[this.placed?"animate":"attr"](h);this.placed=!0;this.alignAttr=h;return this},getBBox:function(){var a=
this.bBox,b=this.renderer,c,d=this.rotation;c=this.element;var e=d*ab;if(!a){if(c.namespaceURI==="http://www.w3.org/2000/svg"||b.forExport){try{a=c.getBBox?s({},c.getBBox()):{width:c.offsetWidth,height:c.offsetHeight}}catch(f){}if(!a||a.width<0)a={width:0,height:0}}else a=this.htmlGetBBox();if(b.isSVG&&(b=a.width,c=a.height,d))a.width=N(c*aa(e))+N(b*W(e)),a.height=N(c*W(e))+N(b*aa(e));this.bBox=a}return a},show:function(){return this.attr({visibility:"visible"})},hide:function(){return this.attr({visibility:"hidden"})},
add:function(a){var b=this.renderer,c=a||b,d=c.element||b.box,e=d.childNodes,f=this.element,g=B(f,"zIndex"),h;if(a)this.parentGroup=a;this.parentInverted=a&&a.inverted;this.textStr!==void 0&&b.buildText(this);if(g)c.handleZ=!0,g=A(g);if(c.handleZ)for(c=0;c<e.length;c++)if(a=e[c],b=B(a,"zIndex"),a!==f&&(A(b)>g||!u(g)&&u(b))){d.insertBefore(f,a);h=!0;break}h||d.appendChild(f);this.added=!0;E(this,"add");return this},safeRemoveChild:function(a){var b=a.parentNode;b&&b.removeChild(a)},destroy:function(){var a=
this,b=a.element||{},c=a.shadows,d=a.box,e,f;b.onclick=b.onmouseout=b.onmouseover=b.onmousemove=null;eb(a);if(a.clipPath)a.clipPath=a.clipPath.destroy();if(a.stops){for(f=0;f<a.stops.length;f++)a.stops[f]=a.stops[f].destroy();a.stops=null}a.safeRemoveChild(b);c&&n(c,function(b){a.safeRemoveChild(b)});d&&d.destroy();ya(a.renderer.alignedObjects,a);for(e in a)delete a[e];return null},empty:function(){for(var a=this.element,b=a.childNodes,c=b.length;c--;)a.removeChild(b[c])},shadow:function(a,b,c){var d=
[],e,f,g=this.element,h,i,j,k;if(a){i=p(a.width,3);j=(a.opacity||0.15)/i;k=this.parentInverted?"(-1,-1)":"("+(a.offsetX||1)+", "+(a.offsetY||1)+")";for(e=1;e<=i;e++){f=g.cloneNode(0);h=i*2+1-2*e;B(f,{isShadow:"true",stroke:a.color||"black","stroke-opacity":j*e,"stroke-width":h,transform:"translate"+k,fill:T});if(c)B(f,"height",v(B(f,"height")-h,0)),f.cutHeight=h;b?b.element.appendChild(f):g.parentNode.insertBefore(f,g);d.push(f)}this.shadows=d}return this}};var ra=function(){this.init.apply(this,
arguments)};ra.prototype={Element:va,init:function(a,b,c,d){var e=location,f;f=this.createElement("svg").attr({xmlns:"http://www.w3.org/2000/svg",version:"1.1"});a.appendChild(f.element);this.isSVG=!0;this.box=f.element;this.boxWrapper=f;this.alignedObjects=[];this.url=(bb||tb)&&z.getElementsByTagName("base").length?e.href.replace(/#.*?$/,"").replace(/([\('\)])/g,"\\$1").replace(/ /g,"%20"):"";this.defs=this.createElement("defs").add();this.forExport=d;this.gradients={};this.setSize(b,c,!1);var g;
if(bb&&a.getBoundingClientRect)this.subPixelFix=b=function(){G(a,{left:0,top:0});g=a.getBoundingClientRect();G(a,{left:wa(g.left)-g.left+"px",top:wa(g.top)-g.top+"px"})},b(),H(L,"resize",b)},isHidden:function(){return!this.boxWrapper.getBBox().width},destroy:function(){var a=this.defs;this.box=null;this.boxWrapper=this.boxWrapper.destroy();Aa(this.gradients||{});this.gradients=null;if(a)this.defs=a.destroy();this.subPixelFix&&U(L,"resize",this.subPixelFix);return this.alignedObjects=null},createElement:function(a){var b=
new this.Element;b.init(this,a);return b},draw:function(){},buildText:function(a){for(var b=a.element,c=p(a.textStr,"").toString().replace(/<(b|strong)>/g,'<span style="font-weight:bold">').replace(/<(i|em)>/g,'<span style="font-style:italic">').replace(/<a/g,"<span").replace(/<\/(b|strong|i|em|a)>/g,"</span>").split(/<br.*?>/g),d=b.childNodes,e=/style="([^"]+)"/,f=/href="([^"]+)"/,g=B(b,"x"),h=a.styles,i=h&&A(h.width),j=h&&h.lineHeight,k,h=d.length,l=[];h--;)b.removeChild(d[h]);i&&!a.added&&this.box.appendChild(b);
c[c.length-1]===""&&c.pop();n(c,function(c,d){var h,ea=0,q,c=c.replace(/<span/g,"|||<span").replace(/<\/span>/g,"</span>|||");h=c.split("|||");n(h,function(c){if(c!==""||h.length===1){var m={},p=z.createElementNS("http://www.w3.org/2000/svg","tspan");e.test(c)&&B(p,"style",c.match(e)[1].replace(/(;| |^)color([ :])/,"$1fill$2"));f.test(c)&&(B(p,"onclick",'location.href="'+c.match(f)[1]+'"'),G(p,{cursor:"pointer"}));c=(c.replace(/<(.|\n)*?>/g,"")||" ").replace(/&lt;/g,"<").replace(/&gt;/g,">");p.appendChild(z.createTextNode(c));
ea?m.dx=3:m.x=g;if(!ea){if(d){!fa&&a.renderer.forExport&&G(p,{display:"block"});q=L.getComputedStyle&&A(L.getComputedStyle(k,null).getPropertyValue("line-height"));if(!q||isNaN(q)){var n;if(!(n=j))if(!(n=k.offsetHeight))l[d]=b.getBBox?b.getBBox().height:a.renderer.fontMetrics(b.style.fontSize).h,n=t(l[d]-(l[d-1]||0))||18;q=n}B(p,"dy",q)}k=p}B(p,m);b.appendChild(p);ea++;if(i)for(var c=c.replace(/-/g,"- ").split(" "),I=[];c.length||I.length;)delete a.bBox,n=a.getBBox().width,m=n>i,!m||c.length===1?
(c=I,I=[],c.length&&(p=z.createElementNS("http://www.w3.org/2000/svg","tspan"),B(p,{dy:j||16,x:g}),b.appendChild(p),n>i&&(i=n))):(p.removeChild(p.firstChild),I.unshift(c.pop())),c.length&&p.appendChild(z.createTextNode(c.join(" ").replace(/- /g,"-")))}})})},button:function(a,b,c,d,e,f,g){var h=this.label(a,b,c),i=0,j,k,l,m,o,a={x1:0,y1:0,x2:0,y2:1},e=C(la("stroke-width",1,"stroke","#999","fill",la("linearGradient",a,"stops",[[0,"#FFF"],[1,"#DDD"]]),"r",3,"padding",3,"style",la("color","black")),e);
l=e.style;delete e.style;f=C(e,la("stroke","#68A","fill",la("linearGradient",a,"stops",[[0,"#FFF"],[1,"#ACF"]])),f);m=f.style;delete f.style;g=C(e,la("stroke","#68A","fill",la("linearGradient",a,"stops",[[0,"#9BD"],[1,"#CDF"]])),g);o=g.style;delete g.style;H(h.element,"mouseenter",function(){h.attr(f).css(m)});H(h.element,"mouseleave",function(){j=[e,f,g][i];k=[l,m,o][i];h.attr(j).css(k)});h.setState=function(a){(i=a)?a===2&&h.attr(g).css(o):h.attr(e).css(l)};return h.on("click",function(){d.call(h)}).attr(e).css(s({cursor:"default"},
l))},crispLine:function(a,b){a[1]===a[4]&&(a[1]=a[4]=t(a[1])-b%2/2);a[2]===a[5]&&(a[2]=a[5]=t(a[2])+b%2/2);return a},path:function(a){var b={fill:T};Fa(a)?b.d=a:Z(a)&&s(b,a);return this.createElement("path").attr(b)},circle:function(a,b,c){a=Z(a)?a:{x:a,y:b,r:c};return this.createElement("circle").attr(a)},arc:function(a,b,c,d,e,f){if(Z(a))b=a.y,c=a.r,d=a.innerR,e=a.start,f=a.end,a=a.x;return this.symbol("arc",a||0,b||0,c||0,c||0,{innerR:d||0,start:e||0,end:f||0})},rect:function(a,b,c,d,e,f){e=Z(a)?
a.r:e;e=this.createElement("rect").attr({rx:e,ry:e,fill:T});return e.attr(Z(a)?a:e.crisp(f,a,b,v(c,0),v(d,0)))},setSize:function(a,b,c){var d=this.alignedObjects,e=d.length;this.width=a;this.height=b;for(this.boxWrapper[p(c,!0)?"animate":"attr"]({width:a,height:b});e--;)d[e].align()},g:function(a){var b=this.createElement("g");return u(a)?b.attr({"class":"highcharts-"+a}):b},image:function(a,b,c,d,e){var f={preserveAspectRatio:T};arguments.length>1&&s(f,{x:b,y:c,width:d,height:e});f=this.createElement("image").attr(f);
f.element.setAttributeNS?f.element.setAttributeNS("http://www.w3.org/1999/xlink","href",a):f.element.setAttribute("hc-svg-href",a);return f},symbol:function(a,b,c,d,e,f){var g,h=this.symbols[a],h=h&&h(t(b),t(c),d,e,f),i=/^url\((.*?)\)$/,j,k;h?(g=this.path(h),s(g,{symbolName:a,x:b,y:c,width:d,height:e}),f&&s(g,f)):i.test(a)&&(k=function(a,b){a.attr({width:b[0],height:b[1]});a.alignByTranslate||a.translate(-t(b[0]/2),-t(b[1]/2))},j=a.match(i)[1],a=Jb[j],g=this.image(j).attr({x:b,y:c}),a?k(g,a):(g.attr({width:0,
height:0}),S("img",{onload:function(){k(g,Jb[j]=[this.width,this.height])},src:j})));return g},symbols:{circle:function(a,b,c,d){var e=0.166*c;return["M",a+c/2,b,"C",a+c+e,b,a+c+e,b+d,a+c/2,b+d,"C",a-e,b+d,a-e,b,a+c/2,b,"Z"]},square:function(a,b,c,d){return["M",a,b,"L",a+c,b,a+c,b+d,a,b+d,"Z"]},triangle:function(a,b,c,d){return["M",a+c/2,b,"L",a+c,b+d,a,b+d,"Z"]},"triangle-down":function(a,b,c,d){return["M",a,b,"L",a+c,b,a+c/2,b+d,"Z"]},diamond:function(a,b,c,d){return["M",a+c/2,b,"L",a+c,b+d/2,a+
c/2,b+d,a,b+d/2,"Z"]},arc:function(a,b,c,d,e){var f=e.start,c=e.r||c||d,g=e.end-1.0E-6,d=e.innerR,h=e.open,i=W(f),j=aa(f),k=W(g),g=aa(g),e=e.end-f<xa?0:1;return["M",a+c*i,b+c*j,"A",c,c,0,e,1,a+c*k,b+c*g,h?"M":"L",a+d*k,b+d*g,"A",d,d,0,e,0,a+d*i,b+d*j,h?"":"Z"]}},clipRect:function(a,b,c,d){var e="highcharts-"+ub++,f=this.createElement("clipPath").attr({id:e}).add(this.defs),a=this.rect(a,b,c,d,0).add(f);a.id=e;a.clipPath=f;return a},color:function(a,b,c){var d=this,e,f=/^rgba/,g;a&&a.linearGradient?
g="linearGradient":a&&a.radialGradient&&(g="radialGradient");if(g){var c=a[g],h=d.gradients,i,j,k,b=b.radialReference;if(!c.id||!h[c.id])Fa(c)&&(a[g]=c={x1:c[0],y1:c[1],x2:c[2],y2:c[3],gradientUnits:"userSpaceOnUse"}),g==="radialGradient"&&b&&!u(c.gradientUnits)&&s(c,{cx:b[0]-b[2]/2+c.cx*b[2],cy:b[1]-b[2]/2+c.cy*b[2],r:c.r*b[2],gradientUnits:"userSpaceOnUse"}),c.id="highcharts-"+ub++,h[c.id]=i=d.createElement(g).attr(c).add(d.defs),i.stops=[],n(a.stops,function(a){f.test(a[1])?(e=qa(a[1]),j=e.get("rgb"),
k=e.get("a")):(j=a[1],k=1);a=d.createElement("stop").attr({offset:a[0],"stop-color":j,"stop-opacity":k}).add(i);i.stops.push(a)});return"url("+d.url+"#"+c.id+")"}else return f.test(a)?(e=qa(a),B(b,c+"-opacity",e.get("a")),e.get("rgb")):(b.removeAttribute(c+"-opacity"),a)},text:function(a,b,c,d){var e=O.chart.style;if(d&&!this.forExport)return this.html(a,b,c);b=t(p(b,0));c=t(p(c,0));a=this.createElement("text").attr({x:b,y:c,text:a}).css({fontFamily:e.fontFamily,fontSize:e.fontSize});!fa&&this.forExport&&
a.css({position:"absolute"});a.x=b;a.y=c;return a},html:function(a,b,c){var d=O.chart.style,e=this.createElement("span"),f=e.attrSetters,g=e.element,h=e.renderer;f.text=function(a){a!==g.innerHTML&&delete this.bBox;g.innerHTML=a;return!1};f.x=f.y=f.align=function(a,b){b==="align"&&(b="textAlign");e[b]=a;e.htmlUpdateTransform();return!1};e.attr({text:a,x:t(b),y:t(c)}).css({position:"absolute",whiteSpace:"nowrap",fontFamily:d.fontFamily,fontSize:d.fontSize});e.css=e.htmlCss;if(h.isSVG)e.add=function(a){var b,
c=h.box.parentNode,d=[];if(a){if(b=a.div,!b){for(;a;)d.push(a),a=a.parentGroup;n(d.reverse(),function(a){var d;b=a.div=a.div||S(ia,{className:B(a.element,"class")},{position:"absolute",left:(a.translateX||0)+"px",top:(a.translateY||0)+"px"},b||c);d=b.style;s(a.attrSetters,{translateX:function(a){d.left=a+"px"},translateY:function(a){d.top=a+"px"},visibility:function(a,b){d[b]=a}})})}}else b=c;b.appendChild(g);e.added=!0;e.alignOnAdd&&e.htmlUpdateTransform();return e};return e},fontMetrics:function(a){var a=
A(a||11),a=a<24?a+4:t(a*1.2),b=t(a*0.8);return{h:a,b:b}},label:function(a,b,c,d,e,f,g,h,i){function j(){var a=o.styles,a=a&&a.textAlign,b=M*(1-y),c;c=h?0:Ea;if(u(Da)&&(a==="center"||a==="right"))b+={center:0.5,right:1}[a]*(Da-q.width);(b!==r.x||c!==r.y)&&r.attr({x:b,y:c});r.x=b;r.y=c}function k(a,b){p?p.attr(a,b):fb[a]=b}function l(){r.add(o);o.attr({text:a,x:b,y:c});u(e)&&o.attr({anchorX:e,anchorY:f})}var m=this,o=m.g(i),r=m.text("",0,0,g).attr({zIndex:1}),p,q,y=0,M=3,Da,w,I,J,Q=0,fb={},Ea,g=o.attrSetters;
H(o,"add",l);g.width=function(a){Da=a;return!1};g.height=function(a){w=a;return!1};g.padding=function(a){u(a)&&a!==M&&(M=a,j());return!1};g.align=function(a){y={left:0,center:0.5,right:1}[a];return!1};g.text=function(a,b){r.attr(b,a);var c;c=r.element.style;q=(Da===void 0||w===void 0||o.styles.textAlign)&&r.getBBox();o.width=(Da||q.width||0)+2*M;o.height=(w||q.height||0)+2*M;Ea=M+m.fontMetrics(c&&c.fontSize).b;if(!p)c=h?-Ea:0,o.box=p=d?m.symbol(d,-y*M,c,o.width,o.height):m.rect(-y*M,c,o.width,o.height,
0,fb["stroke-width"]),p.add(o);p.attr(C({width:o.width,height:o.height},fb));fb=null;j();return!1};g["stroke-width"]=function(a,b){Q=a%2/2;k(b,a);return!1};g.stroke=g.fill=g.r=function(a,b){k(b,a);return!1};g.anchorX=function(a,b){e=a;k(b,a+Q-I);return!1};g.anchorY=function(a,b){f=a;k(b,a-J);return!1};g.x=function(a){o.x=a;a-=y*((Da||q.width)+M);I=t(a);o.attr("translateX",I);return!1};g.y=function(a){J=o.y=t(a);o.attr("translateY",a);return!1};var v=o.css;return s(o,{css:function(a){if(a){var b={},
a=C({},a);n("fontSize,fontWeight,fontFamily,color,lineHeight,width".split(","),function(c){a[c]!==x&&(b[c]=a[c],delete a[c])});r.css(b)}return v.call(o,a)},getBBox:function(){return p.getBBox()},shadow:function(a){p.shadow(a);return o},destroy:function(){U(o,"add",l);U(o.element,"mouseenter");U(o.element,"mouseleave");r&&(r=r.destroy());va.prototype.destroy.call(o)}})}};Ra=ra;var ka;if(!fa&&!$){ka={init:function(a,b){var c=["<",b,' filled="f" stroked="f"'],d=["position: ","absolute",";"];(b==="shape"||
b===ia)&&d.push("left:0;top:0;width:1px;height:1px;");Qa&&d.push("visibility: ",b===ia?"hidden":"visible");c.push(' style="',d.join(""),'"/>');if(b)c=b===ia||b==="span"||b==="img"?c.join(""):a.prepVML(c),this.element=S(c);this.renderer=a;this.attrSetters={}},add:function(a){var b=this.renderer,c=this.element,d=b.box,d=a?a.element||a:d;a&&a.inverted&&b.invertChild(c,d);d.appendChild(c);this.added=!0;this.alignOnAdd&&!this.deferUpdateTransform&&this.updateTransform();E(this,"add");return this},updateTransform:va.prototype.htmlUpdateTransform,
attr:function(a,b){var c,d,e,f=this.element||{},g=f.style,h=f.nodeName,i=this.renderer,j=this.symbolName,k,l=this.shadows,m,o=this.attrSetters,r=this;ma(a)&&u(b)&&(c=a,a={},a[c]=b);if(ma(a))c=a,r=c==="strokeWidth"||c==="stroke-width"?this.strokeweight:this[c];else for(c in a)if(d=a[c],m=!1,e=o[c]&&o[c].call(this,d,c),e!==!1&&d!==null){e!==x&&(d=e);if(j&&/^(x|y|r|start|end|width|height|innerR|anchorX|anchorY)/.test(c))k||(this.symbolAttr(a),k=!0),m=!0;else if(c==="d"){d=d||[];this.d=d.join(" ");e=
d.length;for(m=[];e--;)m[e]=Ga(d[e])?t(d[e]*10)-5:d[e]==="Z"?"x":d[e];d=m.join(" ")||"x";f.path=d;if(l)for(e=l.length;e--;)l[e].path=l[e].cutOff?this.cutOffPath(d,l[e].cutOff):d;m=!0}else if(c==="visibility"){if(l)for(e=l.length;e--;)l[e].style[c]=d;h==="DIV"&&(d=d==="hidden"?"-999em":0,c="top");g[c]=d;m=!0}else if(c==="zIndex")d&&(g[c]=d),m=!0;else if(c==="width"||c==="height")d=v(0,d),this[c]=d,this.updateClipping?(this[c]=d,this.updateClipping()):g[c]=d,m=!0;else if(c==="x"||c==="y")this[c]=d,
g[{x:"left",y:"top"}[c]]=d;else if(c==="class")f.className=d;else if(c==="stroke")d=i.color(d,f,c),c="strokecolor";else if(c==="stroke-width"||c==="strokeWidth")f.stroked=d?!0:!1,c="strokeweight",this[c]=d,Ga(d)&&(d+="px");else if(c==="dashstyle")(f.getElementsByTagName("stroke")[0]||S(i.prepVML(["<stroke/>"]),null,null,f))[c]=d||"solid",this.dashstyle=d,m=!0;else if(c==="fill")h==="SPAN"?g.color=d:(f.filled=d!==T?!0:!1,d=i.color(d,f,c,this),c="fillcolor");else if(h==="shape"&&c==="rotation")this[c]=
d,f.style.left=-t(aa(d*ab)+1)+"px",f.style.top=t(W(d*ab))+"px";else if(c==="translateX"||c==="translateY"||c==="rotation")this[c]=d,this.updateTransform(),m=!0;else if(c==="text")this.bBox=null,f.innerHTML=d,m=!0;m||(Qa?f[c]=d:B(f,c,d))}return r},clip:function(a){var b=this,c,d=b.element,e=d.parentNode;a?(c=a.members,c.push(b),b.destroyClip=function(){ya(c,b)},e&&e.className==="highcharts-tracker"&&!Qa&&G(d,{visibility:"hidden"}),a=a.getCSS(b)):(b.destroyClip&&b.destroyClip(),a={clip:Qa?"inherit":
"rect(auto)"});return b.css(a)},css:va.prototype.htmlCss,safeRemoveChild:function(a){a.parentNode&&Na(a)},destroy:function(){this.destroyClip&&this.destroyClip();return va.prototype.destroy.apply(this)},empty:function(){for(var a=this.element.childNodes,b=a.length,c;b--;)c=a[b],c.parentNode.removeChild(c)},on:function(a,b){this.element["on"+a]=function(){var a=L.event;a.target=a.srcElement;b(a)};return this},cutOffPath:function(a,b){var c,a=a.split(/[ ,]/);c=a.length;if(c===9||c===11)a[c-4]=a[c-2]=
A(a[c-2])-10*b;return a.join(" ")},shadow:function(a,b,c){var d=[],e,f=this.element,g=this.renderer,h,i=f.style,j,k=f.path,l,m,o,r;k&&typeof k.value!=="string"&&(k="x");m=k;if(a){o=p(a.width,3);r=(a.opacity||0.15)/o;for(e=1;e<=3;e++){l=o*2+1-2*e;c&&(m=this.cutOffPath(k.value,l+0.5));j=['<shape isShadow="true" strokeweight="',l,'" filled="false" path="',m,'" coordsize="10 10" style="',f.style.cssText,'" />'];h=S(g.prepVML(j),null,{left:A(i.left)+(a.offsetX||1),top:A(i.top)+(a.offsetY||1)});if(c)h.cutOff=
l+1;j=['<stroke color="',a.color||"black",'" opacity="',r*e,'"/>'];S(g.prepVML(j),null,null,h);b?b.element.appendChild(h):f.parentNode.insertBefore(h,f);d.push(h)}this.shadows=d}return this}};ka=da(va,ka);var ha={Element:ka,isIE8:Ba.indexOf("MSIE 8.0")>-1,init:function(a,b,c){var d,e;this.alignedObjects=[];d=this.createElement(ia);e=d.element;e.style.position="relative";a.appendChild(d.element);this.box=e;this.boxWrapper=d;this.setSize(b,c,!1);if(!z.namespaces.hcv)z.namespaces.add("hcv","urn:schemas-microsoft-com:vml"),
z.createStyleSheet().cssText="hcv\\:fill, hcv\\:path, hcv\\:shape, hcv\\:stroke{ behavior:url(#default#VML); display: inline-block; } "},isHidden:function(){return!this.box.offsetWidth},clipRect:function(a,b,c,d){var e=this.createElement(),f=Z(a);return s(e,{members:[],left:f?a.x:a,top:f?a.y:b,width:f?a.width:c,height:f?a.height:d,getCSS:function(a){var b=a.inverted,c=this.top,d=this.left,e=d+this.width,f=c+this.height,c={clip:"rect("+t(b?d:c)+"px,"+t(b?f:e)+"px,"+t(b?e:f)+"px,"+t(b?c:d)+"px)"};!b&&
Qa&&a.element.nodeName!=="IMG"&&s(c,{width:e+"px",height:f+"px"});return c},updateClipping:function(){n(e.members,function(a){a.css(e.getCSS(a))})}})},color:function(a,b,c,d){var e=this,f,g=/^rgba/,h,i,j=T;a&&a.linearGradient?i="gradient":a&&a.radialGradient&&(i="pattern");if(i){var k,l,m=a.linearGradient||a.radialGradient,o,r,p,q,y,M="",a=a.stops,u,w=[],I=function(){h=['<fill colors="'+w.join(",")+'" opacity="',p,'" o:opacity2="',r,'" type="',i,'" ',M,'focus="100%" method="any" />'];S(e.prepVML(h),
null,null,b)};o=a[0];u=a[a.length-1];o[0]>0&&a.unshift([0,o[1]]);u[0]<1&&a.push([1,u[1]]);n(a,function(a,b){g.test(a[1])?(f=qa(a[1]),k=f.get("rgb"),l=f.get("a")):(k=a[1],l=1);w.push(a[0]*100+"% "+k);b?(p=l,q=k):(r=l,y=k)});if(c==="fill")if(i==="gradient")c=m.x1||m[0]||0,a=m.y1||m[1]||0,o=m.x2||m[2]||0,m=m.y2||m[3]||0,M='angle="'+(90-K.atan((m-a)/(o-c))*180/xa)+'"',I();else{var j=m.r,J=j*2,Q=j*2,t=m.cx,s=m.cy,v=b.radialReference,x,j=function(){v&&(x=d.getBBox(),t+=(v[0]-x.x)/x.width-0.5,s+=(v[1]-x.y)/
x.height-0.5,J*=v[2]/x.width,Q*=v[2]/x.height);M='src="'+O.global.VMLRadialGradientURL+'" size="'+J+","+Q+'" origin="0.5,0.5" position="'+t+","+s+'" color2="'+y+'" ';I()};d.added?j():H(d,"add",j);j=q}else j=k}else if(g.test(a)&&b.tagName!=="IMG")f=qa(a),h=["<",c,' opacity="',f.get("a"),'"/>'],S(this.prepVML(h),null,null,b),j=f.get("rgb");else{j=b.getElementsByTagName(c);if(j.length)j[0].opacity=1;j=a}return j},prepVML:function(a){var b=this.isIE8,a=a.join("");b?(a=a.replace("/>",' xmlns="urn:schemas-microsoft-com:vml" />'),
a=a.indexOf('style="')===-1?a.replace("/>",' style="display:inline-block;behavior:url(#default#VML);" />'):a.replace('style="','style="display:inline-block;behavior:url(#default#VML);')):a=a.replace("<","<hcv:");return a},text:ra.prototype.html,path:function(a){var b={coordsize:"10 10"};Fa(a)?b.d=a:Z(a)&&s(b,a);return this.createElement("shape").attr(b)},circle:function(a,b,c){return this.symbol("circle").attr({x:a-c,y:b-c,width:2*c,height:2*c})},g:function(a){var b;a&&(b={className:"highcharts-"+
a,"class":"highcharts-"+a});return this.createElement(ia).attr(b)},image:function(a,b,c,d,e){var f=this.createElement("img").attr({src:a});arguments.length>1&&f.css({left:b,top:c,width:d,height:e});return f},rect:function(a,b,c,d,e,f){if(Z(a))b=a.y,c=a.width,d=a.height,f=a.strokeWidth,a=a.x;var g=this.symbol("rect");g.r=e;return g.attr(g.crisp(f,a,b,v(c,0),v(d,0)))},invertChild:function(a,b){var c=b.style;G(a,{flip:"x",left:A(c.width)-1,top:A(c.height)-1,rotation:-90})},symbols:{arc:function(a,b,
c,d,e){var f=e.start,g=e.end,h=e.r||c||d,c=W(f),d=aa(f),i=W(g),j=aa(g),k=e.innerR,l=0.08/h,m=k&&0.1/k||0;if(g-f===0)return["x"];else 2*xa-g+f<l?i=-l:g-f<m&&(i=W(f+m));f=["wa",a-h,b-h,a+h,b+h,a+h*c,b+h*d,a+h*i,b+h*j];e.open&&!k&&f.push("e","M",a,b);f.push("at",a-k,b-k,a+k,b+k,a+k*i,b+k*j,a+k*c,b+k*d,"x","e");return f},circle:function(a,b,c,d){return["wa",a,b,a+c,b+d,a+c,b+d/2,a+c,b+d/2,"e"]},rect:function(a,b,c,d,e){var f=a+c,g=b+d,h;!u(e)||!e.r?f=ra.prototype.symbols.square.apply(0,arguments):(h=
P(e.r,c,d),f=["M",a+h,b,"L",f-h,b,"wa",f-2*h,b,f,b+2*h,f-h,b,f,b+h,"L",f,g-h,"wa",f-2*h,g-2*h,f,g,f,g-h,f-h,g,"L",a+h,g,"wa",a,g-2*h,a+2*h,g,a+h,g,a,g-h,"L",a,b+h,"wa",a,b,a+2*h,b+2*h,a,b+h,a+h,b,"x","e"]);return f}}};ka=function(){this.init.apply(this,arguments)};ka.prototype=C(ra.prototype,ha);Ra=ka}var gb,Mb;if($)gb=function(){},gb.prototype.symbols={},Mb=function(){function a(){var a=b.length,d;for(d=0;d<a;d++)b[d]();b=[]}var b=[];return{push:function(c,d){b.length===0&&Qb(d,a);b.push(c)}}}();
Ra=ka||gb||ra;Pa.prototype={addLabel:function(){var a=this.axis,b=a.options,c=a.chart,d=a.horiz,e=a.categories,f=this.pos,g=b.labels,h=a.tickPositions,d=e&&d&&e.length&&!g.step&&!g.staggerLines&&!g.rotation&&c.plotWidth/h.length||!d&&c.plotWidth/2,i=f===h[0],j=f===h[h.length-1],k=e&&u(e[f])?e[f]:f,e=this.label,h=h.info,l;a.isDatetimeAxis&&h&&(l=b.dateTimeLabelFormats[h.higherRanks[f]||h.unitName]);this.isFirst=i;this.isLast=j;b=a.labelFormatter.call({axis:a,chart:c,isFirst:i,isLast:j,dateTimeLabelFormat:l,
value:a.isLog?ja(ca(k)):k});f=d&&{width:v(1,t(d-2*(g.padding||10)))+"px"};f=s(f,g.style);if(u(e))e&&e.attr({text:b}).css(f);else{d={align:g.align};if(Ga(g.rotation))d.rotation=g.rotation;this.label=u(b)&&g.enabled?c.renderer.text(b,0,0,g.useHTML).attr(d).css(f).add(a.labelGroup):null}},getLabelSize:function(){var a=this.label,b=this.axis;return a?(this.labelBBox=a.getBBox())[b.horiz?"height":"width"]:0},getLabelSides:function(){var a=this.axis.options.labels,b=this.labelBBox.width,a=b*{left:0,center:0.5,
right:1}[a.align]-a.x;return[-a,b-a]},handleOverflow:function(a,b){var c=!0,d=this.axis,e=d.chart,f=this.isFirst,g=this.isLast,h=b.x,i=d.reversed,j=d.tickPositions;if(f||g){var k=this.getLabelSides(),l=k[0],k=k[1],e=e.plotLeft,m=e+d.len,j=(d=d.ticks[j[a+(f?1:-1)]])&&d.label.xy&&d.label.xy.x+d.getLabelSides()[f?0:1];f&&!i||g&&i?h+l<e&&(h=e-l,d&&h+k>j&&(c=!1)):h+k>m&&(h=m-k,d&&h+l<j&&(c=!1));b.x=h}return c},getPosition:function(a,b,c,d){var e=this.axis,f=e.chart,g=d&&f.oldChartHeight||f.chartHeight;
return{x:a?e.translate(b+c,null,null,d)+e.transB:e.left+e.offset+(e.opposite?(d&&f.oldChartWidth||f.chartWidth)-e.right-e.left:0),y:a?g-e.bottom+e.offset-(e.opposite?e.height:0):g-e.translate(b+c,null,null,d)-e.transB}},getLabelPosition:function(a,b,c,d,e,f,g,h){var i=this.axis,j=i.transA,k=i.reversed,i=i.staggerLines,a=a+e.x-(f&&d?f*j*(k?-1:1):0),b=b+e.y-(f&&!d?f*j*(k?1:-1):0);u(e.y)||(b+=A(c.styles.lineHeight)*0.9-c.getBBox().height/2);i&&(b+=g/(h||1)%i*16);return{x:a,y:b}},getMarkPath:function(a,
b,c,d,e,f){return f.crispLine(["M",a,b,"L",a+(e?0:-c),b+(e?c:0)],d)},render:function(a,b){var c=this.axis,d=c.options,e=c.chart.renderer,f=c.horiz,g=this.type,h=this.label,i=this.pos,j=d.labels,k=this.gridLine,l=g?g+"Grid":"grid",m=g?g+"Tick":"tick",o=d[l+"LineWidth"],r=d[l+"LineColor"],n=d[l+"LineDashStyle"],q=d[m+"Length"],l=d[m+"Width"]||0,y=d[m+"Color"],u=d[m+"Position"],m=this.mark,t=j.step,w=!0,I=c.tickmarkOffset,J=this.getPosition(f,i,I,b),Q=J.x,J=J.y,v=c.staggerLines;if(o){i=c.getPlotLinePath(i+
I,o,b);if(k===x){k={stroke:r,"stroke-width":o};if(n)k.dashstyle=n;if(!g)k.zIndex=1;this.gridLine=k=o?e.path(i).attr(k).add(c.gridGroup):null}if(!b&&k&&i)k[this.isNew?"attr":"animate"]({d:i})}if(l&&q)u==="inside"&&(q=-q),c.opposite&&(q=-q),g=this.getMarkPath(Q,J,q,l,f,e),m?m.animate({d:g}):this.mark=e.path(g).attr({stroke:y,"stroke-width":l}).add(c.axisGroup);if(h&&!isNaN(Q))h.xy=J=this.getLabelPosition(Q,J,h,f,j,I,a,t),this.isFirst&&!p(d.showFirstLabel,1)||this.isLast&&!p(d.showLastLabel,1)?w=!1:
!v&&f&&j.overflow==="justify"&&!this.handleOverflow(a,J)&&(w=!1),t&&a%t&&(w=!1),w?(h[this.isNew?"attr":"animate"](J),h.show(),this.isNew=!1):h.hide()},destroy:function(){Aa(this,this.axis)}};nb.prototype={render:function(){var a=this,b=a.axis,c=b.horiz,d=(b.pointRange||0)/2,e=a.options,f=e.label,g=a.label,h=e.width,i=e.to,j=e.from,k=u(j)&&u(i),l=e.value,m=e.dashStyle,o=a.svgElem,r=[],n,q=e.color,y=e.zIndex,M=e.events,t=b.chart.renderer;b.isLog&&(j=na(j),i=na(i),l=na(l));if(h){if(r=b.getPlotLinePath(l,
h),d={stroke:q,"stroke-width":h},m)d.dashstyle=m}else if(k){if(j=v(j,b.min-d),i=P(i,b.max+d),r=b.getPlotBandPath(j,i,e),d={fill:q},e.borderWidth)d.stroke=e.borderColor,d["stroke-width"]=e.borderWidth}else return;if(u(y))d.zIndex=y;if(o)r?o.animate({d:r},null,o.onGetPath):(o.hide(),o.onGetPath=function(){o.show()});else if(r&&r.length&&(a.svgElem=o=t.path(r).attr(d).add(),M))for(n in e=function(b){o.on(b,function(c){M[b].apply(a,[c])})},M)e(n);if(f&&u(f.text)&&r&&r.length&&b.width>0&&b.height>0){f=
C({align:c&&k&&"center",x:c?!k&&4:10,verticalAlign:!c&&k&&"middle",y:c?k?16:10:k?6:-4,rotation:c&&!k&&90},f);if(!g)a.label=g=t.text(f.text,0,0).attr({align:f.textAlign||f.align,rotation:f.rotation,zIndex:y}).css(f.style).add();b=[r[1],r[4],p(r[6],r[1])];r=[r[2],r[5],p(r[7],r[2])];c=Ma(b);k=Ma(r);g.align(f,!1,{x:c,y:k,width:za(b)-c,height:za(r)-k});g.show()}else g&&g.hide();return a},destroy:function(){ya(this.axis.plotLinesAndBands,this);Aa(this,this.axis)}};Hb.prototype={destroy:function(){Aa(this,
this.axis)},setTotal:function(a){this.cum=this.total=a},render:function(a){var b=this.options.formatter.call(this);this.label?this.label.attr({text:b,visibility:"hidden"}):this.label=this.axis.chart.renderer.text(b,0,0).css(this.options.style).attr({align:this.textAlign,rotation:this.options.rotation,visibility:"hidden"}).add(a)},setOffset:function(a,b){var c=this.axis,d=c.chart,e=d.inverted,f=this.isNegative,g=c.translate(this.total,0,0,0,1),c=c.translate(0),c=N(g-c),h=d.xAxis[0].translate(this.x)+
a,d=d.plotHeight,e={x:e?f?g:g-c:h,y:e?d-h-b:f?d-g-c:d-g,width:e?c:b,height:e?b:c};this.label&&this.label.align(this.alignOptions,null,e).attr({visibility:"visible"})}};ob.prototype={defaultOptions:{dateTimeLabelFormats:{millisecond:"%H:%M:%S.%L",second:"%H:%M:%S",minute:"%H:%M",hour:"%H:%M",day:"%e. %b",week:"%e. %b",month:"%b '%y",year:"%Y"},endOnTick:!1,gridLineColor:"#C0C0C0",labels:F,lineColor:"#C0D0E0",lineWidth:1,minPadding:0.01,maxPadding:0.01,minorGridLineColor:"#E0E0E0",minorGridLineWidth:1,
minorTickColor:"#A0A0A0",minorTickLength:2,minorTickPosition:"outside",startOfWeek:1,startOnTick:!1,tickColor:"#C0D0E0",tickLength:5,tickmarkPlacement:"between",tickPixelInterval:100,tickPosition:"outside",tickWidth:1,title:{align:"middle",style:{color:"#6D869F",fontWeight:"bold"}},type:"linear"},defaultYAxisOptions:{endOnTick:!0,gridLineWidth:1,tickPixelInterval:72,showLastLabel:!0,labels:{align:"right",x:-8,y:3},lineWidth:0,maxPadding:0.05,minPadding:0.05,startOnTick:!0,tickWidth:0,title:{rotation:270,
text:"Y-values"},stackLabels:{enabled:!1,formatter:function(){return this.total},style:F.style}},defaultLeftAxisOptions:{labels:{align:"right",x:-8,y:null},title:{rotation:270}},defaultRightAxisOptions:{labels:{align:"left",x:8,y:null},title:{rotation:90}},defaultBottomAxisOptions:{labels:{align:"center",x:0,y:14},title:{rotation:0}},defaultTopAxisOptions:{labels:{align:"center",x:0,y:-5},title:{rotation:0}},init:function(a,b){var c=b.isX;this.horiz=a.inverted?!c:c;this.xOrY=(this.isXAxis=c)?"x":
"y";this.opposite=b.opposite;this.side=this.horiz?this.opposite?0:2:this.opposite?1:3;this.setOptions(b);var d=this.options,e=d.type,f=e==="datetime";this.labelFormatter=d.labels.formatter||this.defaultLabelFormatter;this.staggerLines=this.horiz&&d.labels.staggerLines;this.userOptions=b;this.minPixelPadding=0;this.chart=a;this.reversed=d.reversed;this.categories=d.categories;this.isLog=e==="logarithmic";this.isLinked=u(d.linkedTo);this.isDatetimeAxis=f;this.tickmarkOffset=d.categories&&d.tickmarkPlacement===
"between"?0.5:0;this.ticks={};this.minorTicks={};this.plotLinesAndBands=[];this.alternateBands={};this.len=0;this.minRange=this.userMinRange=d.minRange||d.maxZoom;this.range=d.range;this.offset=d.offset||0;this.stacks={};this.min=this.max=null;var g,d=this.options.events;a.axes.push(this);a[c?"xAxis":"yAxis"].push(this);this.series=[];if(a.inverted&&c&&this.reversed===x)this.reversed=!0;this.removePlotLine=this.removePlotBand=this.removePlotBandOrLine;this.addPlotLine=this.addPlotBand=this.addPlotBandOrLine;
for(g in d)H(this,g,d[g]);if(this.isLog)this.val2lin=na,this.lin2val=ca},setOptions:function(a){this.options=C(this.defaultOptions,this.isXAxis?{}:this.defaultYAxisOptions,[this.defaultTopAxisOptions,this.defaultRightAxisOptions,this.defaultBottomAxisOptions,this.defaultLeftAxisOptions][this.side],C(O[this.isXAxis?"xAxis":"yAxis"],a))},defaultLabelFormatter:function(){var a=this.axis,b=this.value,c=this.dateTimeLabelFormat,d=O.lang.numericSymbols,e=d&&d.length,f,g=a.isLog?b:a.tickInterval;if(a.categories)f=
b;else if(c)f=cb(c,b);else if(e&&g>=1E3)for(;e--&&f===x;)a=Math.pow(1E3,e+1),g>=a&&d[e]!==null&&(f=Ia(b/a,-1)+d[e]);f===x&&(f=b>=1E3?Ia(b,0):Ia(b,-1));return f},getSeriesExtremes:function(){var a=this,b=a.chart,c=a.stacks,d=[],e=[],f;a.hasVisibleSeries=!1;a.dataMin=a.dataMax=null;n(a.series,function(g){if(g.visible||!b.options.chart.ignoreHiddenSeries){var h=g.options,i,j,k,l,m,o,r,n,q,y=h.threshold,t,s=[],w=0;a.hasVisibleSeries=!0;if(a.isLog&&y<=0)y=h.threshold=null;if(a.isXAxis){if(h=g.xData,h.length)a.dataMin=
P(p(a.dataMin,h[0]),Ma(h)),a.dataMax=v(p(a.dataMax,h[0]),za(h))}else{var I,J,Q,C=g.cropped,Ea=g.xAxis.getExtremes(),A=!!g.modifyValue;i=h.stacking;a.usePercentage=i==="percent";if(i)m=h.stack,l=g.type+p(m,""),o="-"+l,g.stackKey=l,j=d[l]||[],d[l]=j,k=e[o]||[],e[o]=k;if(a.usePercentage)a.dataMin=0,a.dataMax=99;h=g.processedXData;r=g.processedYData;t=r.length;for(f=0;f<t;f++)if(n=h[f],q=r[f],q!==null&&q!==x&&(i?(J=(I=q<y)?k:j,Q=I?o:l,q=J[n]=u(J[n])?J[n]+q:q,c[Q]||(c[Q]={}),c[Q][n]||(c[Q][n]=new Hb(a,
a.options.stackLabels,I,n,m)),c[Q][n].setTotal(q)):A&&(q=g.modifyValue(q)),C||(h[f+1]||n)>=Ea.min&&(h[f-1]||n)<=Ea.max))if(n=q.length)for(;n--;)q[n]!==null&&(s[w++]=q[n]);else s[w++]=q;if(!a.usePercentage&&s.length)a.dataMin=P(p(a.dataMin,s[0]),Ma(s)),a.dataMax=v(p(a.dataMax,s[0]),za(s));if(u(y))if(a.dataMin>=y)a.dataMin=y,a.ignoreMinPadding=!0;else if(a.dataMax<y)a.dataMax=y,a.ignoreMaxPadding=!0}}})},translate:function(a,b,c,d,e,f){var g=this.len,h=1,i=0,j=d?this.oldTransA:this.transA,d=d?this.oldMin:
this.min,e=this.options.ordinal||this.isLog&&e;if(!j)j=this.transA;c&&(h*=-1,i=g);this.reversed&&(h*=-1,i-=h*g);b?(this.reversed&&(a=g-a),a=a/j+d,e&&(a=this.lin2val(a))):(e&&(a=this.val2lin(a)),a=h*(a-d)*j+i+h*this.minPixelPadding+(f?j*this.pointRange/2:0));return a},getPlotLinePath:function(a,b,c){var d=this.chart,e=this.left,f=this.top,g,h,i,a=this.translate(a,null,null,c),j=c&&d.oldChartHeight||d.chartHeight,k=c&&d.oldChartWidth||d.chartWidth,l;g=this.transB;c=h=t(a+g);g=i=t(j-a-g);if(isNaN(a))l=
!0;else if(this.horiz){if(g=f,i=j-this.bottom,c<e||c>e+this.width)l=!0}else if(c=e,h=k-this.right,g<f||g>f+this.height)l=!0;return l?null:d.renderer.crispLine(["M",c,g,"L",h,i],b||0)},getPlotBandPath:function(a,b){var c=this.getPlotLinePath(b),d=this.getPlotLinePath(a);d&&c?d.push(c[4],c[5],c[1],c[2]):d=null;return d},getLinearTickPositions:function(a,b,c){for(var d,b=ja(V(b/a)*a),c=ja(wa(c/a)*a),e=[];b<=c;){e.push(b);b=ja(b+a);if(b===d)break;d=b}return e},getLogTickPositions:function(a,b,c,d){var e=
this.options,f=this.len,g=[];if(!d)this._minorAutoInterval=null;if(a>=0.5)a=t(a),g=this.getLinearTickPositions(a,b,c);else if(a>=0.08)for(var f=V(b),h,i,j,k,l,e=a>0.3?[1,2,4]:a>0.15?[1,2,4,6,8]:[1,2,3,4,5,6,7,8,9];f<c+1&&!l;f++){i=e.length;for(h=0;h<i&&!l;h++)j=na(ca(f)*e[h]),j>b&&g.push(k),k>c&&(l=!0),k=j}else if(b=ca(b),c=ca(c),a=e[d?"minorTickInterval":"tickInterval"],a=p(a==="auto"?null:a,this._minorAutoInterval,(c-b)*(e.tickPixelInterval/(d?5:1))/((d?f/this.tickPositions.length:f)||1)),a=hb(a,
null,K.pow(10,V(K.log(a)/K.LN10))),g=Sa(this.getLinearTickPositions(a,b,c),na),!d)this._minorAutoInterval=a/5;if(!d)this.tickInterval=a;return g},getMinorTickPositions:function(){var a=this.tickPositions,b=this.minorTickInterval,c=[],d,e;if(this.isLog){e=a.length;for(d=1;d<e;d++)c=c.concat(this.getLogTickPositions(b,a[d-1],a[d],!0))}else for(a=this.min+(a[0]-this.min)%b;a<=this.max;a+=b)c.push(a);return c},adjustForMinRange:function(){var a=this.options,b=this.min,c=this.max,d,e=this.dataMax-this.dataMin>=
this.minRange,f,g,h,i,j;if(this.isXAxis&&this.minRange===x&&!this.isLog)u(a.min)||u(a.max)?this.minRange=null:(n(this.series,function(a){i=a.xData;for(g=j=a.xIncrement?1:i.length-1;g>0;g--)if(h=i[g]-i[g-1],f===x||h<f)f=h}),this.minRange=P(f*5,this.dataMax-this.dataMin));if(c-b<this.minRange){var k=this.minRange;d=(k-c+b)/2;d=[b-d,p(a.min,b-d)];if(e)d[2]=this.dataMin;b=za(d);c=[b+k,p(a.max,b+k)];if(e)c[2]=this.dataMax;c=Ma(c);c-b<k&&(d[0]=c-k,d[1]=p(a.min,c-k),b=za(d))}this.min=b;this.max=c},setAxisTranslation:function(){var a=
this.max-this.min,b=0,c,d=0,e=0,f=this.transA;if(this.isXAxis)this.isLinked?d=this.linkedParent.minPointOffset:n(this.series,function(a){var f=a.pointRange,i=a.options.pointPlacement,j=a.closestPointRange;b=v(b,f);d=v(d,i?0:f/2);e=v(e,i==="on"?0:f);!a.noSharedTooltip&&u(j)&&(c=u(c)?P(c,j):j)}),this.minPointOffset=d,this.pointRange=b,this.closestPointRange=c;this.oldTransA=f;this.translationSlope=this.transA=f=this.len/(a+e||1);this.transB=this.horiz?this.left:this.bottom;this.minPixelPadding=f*d},
setTickPositions:function(a){var b=this,c=b.chart,d=b.options,e=b.isLog,f=b.isDatetimeAxis,g=b.isXAxis,h=b.isLinked,i=b.options.tickPositioner,j=d.maxPadding,k=d.minPadding,l=d.tickInterval,m=d.minTickInterval,o=d.tickPixelInterval,r=b.categories;h?(b.linkedParent=c[g?"xAxis":"yAxis"][d.linkedTo],c=b.linkedParent.getExtremes(),b.min=p(c.min,c.dataMin),b.max=p(c.max,c.dataMax),d.type!==b.linkedParent.options.type&&$a(11,1)):(b.min=p(b.userMin,d.min,b.dataMin),b.max=p(b.userMax,d.max,b.dataMax));if(e)!a&&
P(b.min,p(b.dataMin,b.min))<=0&&$a(10,1),b.min=ja(na(b.min)),b.max=ja(na(b.max));if(b.range&&(b.userMin=b.min=v(b.min,b.max-b.range),b.userMax=b.max,a))b.range=null;b.adjustForMinRange();if(!r&&!b.usePercentage&&!h&&u(b.min)&&u(b.max)){c=b.max-b.min||1;if(!u(d.min)&&!u(b.userMin)&&k&&(b.dataMin<0||!b.ignoreMinPadding))b.min-=c*k;if(!u(d.max)&&!u(b.userMax)&&j&&(b.dataMax>0||!b.ignoreMaxPadding))b.max+=c*j}b.tickInterval=b.min===b.max||b.min===void 0||b.max===void 0?1:h&&!l&&o===b.linkedParent.options.tickPixelInterval?
b.linkedParent.tickInterval:p(l,r?1:(b.max-b.min)*o/(b.len||1));g&&!a&&n(b.series,function(a){a.processData(b.min!==b.oldMin||b.max!==b.oldMax)});b.setAxisTranslation(a);b.beforeSetTickPositions&&b.beforeSetTickPositions();if(b.postProcessTickInterval)b.tickInterval=b.postProcessTickInterval(b.tickInterval);if(!l&&b.tickInterval<m)b.tickInterval=m;if(!f&&!e&&(a=K.pow(10,V(K.log(b.tickInterval)/K.LN10)),!l))b.tickInterval=hb(b.tickInterval,null,a,d);b.minorTickInterval=d.minorTickInterval==="auto"&&
b.tickInterval?b.tickInterval/5:d.minorTickInterval;b.tickPositions=i=d.tickPositions||i&&i.apply(b,[b.min,b.max]);if(!i)i=f?(b.getNonLinearTimeTicks||Ob)(Nb(b.tickInterval,d.units),b.min,b.max,d.startOfWeek,b.ordinalPositions,b.closestPointRange,!0):e?b.getLogTickPositions(b.tickInterval,b.min,b.max):b.getLinearTickPositions(b.tickInterval,b.min,b.max),b.tickPositions=i;if(!h)e=i[0],f=i[i.length-1],h=b.minPointOffset||0,d.startOnTick?b.min=e:b.min-h>e&&i.shift(),d.endOnTick?b.max=f:b.max+h<f&&i.pop()},
setMaxTicks:function(){var a=this.chart,b=a.maxTicks,c=this.tickPositions,d=this.xOrY;b||(b={x:0,y:0});if(!this.isLinked&&!this.isDatetimeAxis&&c.length>b[d]&&this.options.alignTicks!==!1)b[d]=c.length;a.maxTicks=b},adjustTickAmount:function(){var a=this.xOrY,b=this.tickPositions,c=this.chart.maxTicks;if(c&&c[a]&&!this.isDatetimeAxis&&!this.categories&&!this.isLinked&&this.options.alignTicks!==!1){var d=this.tickAmount,e=b.length;this.tickAmount=a=c[a];if(e<a){for(;b.length<a;)b.push(ja(b[b.length-
1]+this.tickInterval));this.transA*=(e-1)/(a-1);this.max=b[b.length-1]}if(u(d)&&a!==d)this.isDirty=!0}},setScale:function(){var a=this.stacks,b,c,d,e;this.oldMin=this.min;this.oldMax=this.max;this.oldAxisLength=this.len;this.setAxisSize();e=this.len!==this.oldAxisLength;n(this.series,function(a){if(a.isDirtyData||a.isDirty||a.xAxis.isDirty)d=!0});if(e||d||this.isLinked||this.userMin!==this.oldUserMin||this.userMax!==this.oldUserMax)if(this.getSeriesExtremes(),this.setTickPositions(),this.oldUserMin=
this.userMin,this.oldUserMax=this.userMax,!this.isDirty)this.isDirty=e||this.min!==this.oldMin||this.max!==this.oldMax;if(!this.isXAxis)for(b in a)for(c in a[b])a[b][c].cum=a[b][c].total;this.setMaxTicks()},setExtremes:function(a,b,c,d,e){var f=this,g=f.chart,c=p(c,!0),e=s(e,{min:a,max:b});E(f,"setExtremes",e,function(){f.userMin=a;f.userMax=b;f.isDirtyExtremes=!0;c&&g.redraw(d)})},zoom:function(a,b){this.setExtremes(a,b,!1,x,{trigger:"zoom"});return!0},setAxisSize:function(){var a=this.chart,b=this.options,
c=b.offsetLeft||0,d=b.offsetRight||0;this.left=p(b.left,a.plotLeft+c);this.top=p(b.top,a.plotTop);this.width=p(b.width,a.plotWidth-c+d);this.height=p(b.height,a.plotHeight);this.bottom=a.chartHeight-this.height-this.top;this.right=a.chartWidth-this.width-this.left;this.len=v(this.horiz?this.width:this.height,0)},getExtremes:function(){var a=this.isLog;return{min:a?ja(ca(this.min)):this.min,max:a?ja(ca(this.max)):this.max,dataMin:this.dataMin,dataMax:this.dataMax,userMin:this.userMin,userMax:this.userMax}},
getThreshold:function(a){var b=this.isLog,c=b?ca(this.min):this.min,b=b?ca(this.max):this.max;c>a||a===null?a=c:b<a&&(a=b);return this.translate(a,0,1,0,1)},addPlotBandOrLine:function(a){a=(new nb(this,a)).render();this.plotLinesAndBands.push(a);return a},getOffset:function(){var a=this,b=a.chart,c=b.renderer,d=a.options,e=a.tickPositions,f=a.ticks,g=a.horiz,h=a.side,i,j=0,k,l=0,m=d.title,o=d.labels,r=0,ea=b.axisOffset,q=[-1,1,1,-1][h],y;a.hasData=b=a.hasVisibleSeries||u(a.min)&&u(a.max)&&!!e;a.showAxis=
i=b||p(d.showEmpty,!0);if(!a.axisGroup)a.gridGroup=c.g("grid").attr({zIndex:d.gridZIndex||1}).add(),a.axisGroup=c.g("axis").attr({zIndex:d.zIndex||2}).add(),a.labelGroup=c.g("axis-labels").attr({zIndex:o.zIndex||7}).add();if(b||a.isLinked)n(e,function(b){f[b]?f[b].addLabel():f[b]=new Pa(a,b)}),n(e,function(a){if(h===0||h===2||{1:"left",3:"right"}[h]===o.align)r=v(f[a].getLabelSize(),r)}),a.staggerLines&&(r+=(a.staggerLines-1)*16);else for(y in f)f[y].destroy(),delete f[y];if(m&&m.text){if(!a.axisTitle)a.axisTitle=
c.text(m.text,0,0,m.useHTML).attr({zIndex:7,rotation:m.rotation||0,align:m.textAlign||{low:"left",middle:"center",high:"right"}[m.align]}).css(m.style).add(a.axisGroup),a.axisTitle.isNew=!0;if(i)j=a.axisTitle.getBBox()[g?"height":"width"],l=p(m.margin,g?5:10),k=m.offset;a.axisTitle[i?"show":"hide"]()}a.offset=q*p(d.offset,ea[h]);a.axisTitleMargin=p(k,r+l+(h!==2&&r&&q*d.labels[g?"y":"x"]));ea[h]=v(ea[h],a.axisTitleMargin+j+q*a.offset)},getLinePath:function(a){var b=this.chart,c=this.opposite,d=this.offset,
e=this.horiz,f=this.left+(c?this.width:0)+d;this.lineTop=c=b.chartHeight-this.bottom-(c?this.height:0)+d;return b.renderer.crispLine(["M",e?this.left:f,e?c:this.top,"L",e?b.chartWidth-this.right:f,e?c:b.chartHeight-this.bottom],a)},getTitlePosition:function(){var a=this.horiz,b=this.left,c=this.top,d=this.len,e=this.options.title,f=a?b:c,g=this.opposite,h=this.offset,i=A(e.style.fontSize||12),d={low:f+(a?0:d),middle:f+d/2,high:f+(a?d:0)}[e.align],b=(a?c+this.height:b)+(a?1:-1)*(g?-1:1)*this.axisTitleMargin+
(this.side===2?i:0);return{x:a?d:b+(g?this.width:0)+h+(e.x||0),y:a?b-(g?this.height:0)+h:d+(e.y||0)}},render:function(){var a=this,b=a.chart,c=b.renderer,d=a.options,e=a.isLog,f=a.isLinked,g=a.tickPositions,h=a.axisTitle,i=a.stacks,j=a.ticks,k=a.minorTicks,l=a.alternateBands,m=d.stackLabels,o=d.alternateGridColor,r=a.tickmarkOffset,p=d.lineWidth,q,y=b.hasRendered&&u(a.oldMin)&&!isNaN(a.oldMin),t=a.showAxis,s,w;if(a.hasData||f)if(a.minorTickInterval&&!a.categories&&n(a.getMinorTickPositions(),function(b){k[b]||
(k[b]=new Pa(a,b,"minor"));y&&k[b].isNew&&k[b].render(null,!0);k[b].isActive=!0;k[b].render()}),n(g.slice(1).concat([g[0]]),function(b,c){c=c===g.length-1?0:c+1;if(!f||b>=a.min&&b<=a.max)j[b]||(j[b]=new Pa(a,b)),y&&j[b].isNew&&j[b].render(c,!0),j[b].isActive=!0,j[b].render(c)}),o&&n(g,function(b,c){if(c%2===0&&b<a.max)l[b]||(l[b]=new nb(a)),s=b+r,w=g[c+1]!==x?g[c+1]+r:a.max,l[b].options={from:e?ca(s):s,to:e?ca(w):w,color:o},l[b].render(),l[b].isActive=!0}),!a._addedPlotLB)n((d.plotLines||[]).concat(d.plotBands||
[]),function(b){a.addPlotBandOrLine(b)}),a._addedPlotLB=!0;n([j,k,l],function(a){for(var b in a)a[b].isActive?a[b].isActive=!1:(a[b].destroy(),delete a[b])});if(p)q=a.getLinePath(p),a.axisLine?a.axisLine.animate({d:q}):a.axisLine=c.path(q).attr({stroke:d.lineColor,"stroke-width":p,zIndex:7}).add(a.axisGroup),a.axisLine[t?"show":"hide"]();if(h&&t)h[h.isNew?"attr":"animate"](a.getTitlePosition()),h.isNew=!1;if(m&&m.enabled){var I,J,d=a.stackTotalGroup;if(!d)a.stackTotalGroup=d=c.g("stack-labels").attr({visibility:"visible",
zIndex:6}).add();d.translate(b.plotLeft,b.plotTop);for(I in i)for(J in b=i[I],b)b[J].render(d)}a.isDirty=!1},removePlotBandOrLine:function(a){for(var b=this.plotLinesAndBands,c=b.length;c--;)b[c].id===a&&b[c].destroy()},setTitle:function(a,b){var c=this.chart,d=this.options,e=this.axisTitle;d.title=C(d.title,a);this.axisTitle=e&&e.destroy();this.isDirty=!0;p(b,!0)&&c.redraw()},redraw:function(){var a=this.chart;a.tracker.resetTracker&&a.tracker.resetTracker(!0);this.render();n(this.plotLinesAndBands,
function(a){a.render()});n(this.series,function(a){a.isDirty=!0})},setCategories:function(a,b){var c=this.chart;this.categories=this.userOptions.categories=a;n(this.series,function(a){a.translate();a.setTooltipPoints(!0)});this.isDirty=!0;p(b,!0)&&c.redraw()},destroy:function(){var a=this,b=a.stacks,c;U(a);for(c in b)Aa(b[c]),b[c]=null;n([a.ticks,a.minorTicks,a.alternateBands,a.plotLinesAndBands],function(a){Aa(a)});n("stackTotalGroup,axisLine,axisGroup,gridGroup,labelGroup,axisTitle".split(","),
function(b){a[b]&&(a[b]=a[b].destroy())})}};pb.prototype={destroy:function(){n(this.crosshairs,function(a){a&&a.destroy()});if(this.label)this.label=this.label.destroy()},move:function(a,b,c,d){var e=this,f=e.now,g=e.options.animation!==!1&&!e.isHidden;s(f,{x:g?(2*f.x+a)/3:a,y:g?(f.y+b)/2:b,anchorX:g?(2*f.anchorX+c)/3:c,anchorY:g?(f.anchorY+d)/2:d});e.label.attr(f);e.tooltipTick=g&&(N(a-f.x)>1||N(b-f.y)>1)?function(){e.move(a,b,c,d)}:null},hide:function(){if(!this.isHidden){var a=this.chart.hoverPoints;
this.label.hide();a&&n(a,function(a){a.setState()});this.chart.hoverPoints=null;this.isHidden=!0}},hideCrosshairs:function(){n(this.crosshairs,function(a){a&&a.hide()})},getAnchor:function(a,b){var c,d=this.chart,e=d.inverted,f=0,g=0,h,a=oa(a);c=a[0].tooltipPos;c||(n(a,function(a){h=a.series.yAxis;f+=a.plotX;g+=(a.plotLow?(a.plotLow+a.plotHigh)/2:a.plotY)+(!e&&h?h.top-d.plotTop:0)}),f/=a.length,g/=a.length,c=[e?d.plotWidth-g:f,this.shared&&!e&&a.length>1&&b?b.chartY-d.plotTop:e?d.plotHeight-f:g]);
return Sa(c,t)},getPosition:function(a,b,c){var d=this.chart,e=d.plotLeft,f=d.plotTop,g=d.plotWidth,h=d.plotHeight,i=p(this.options.distance,12),j=c.plotX,c=c.plotY,d=j+e+(d.inverted?i:-a-i),k=c-b+f+15,l;d<7&&(d=e+j+i);d+a>e+g&&(d-=d+a-(e+g),k=c-b+f-i,l=!0);k<f+5&&(k=f+5,l&&c>=k&&c<=k+b&&(k=c+f+i));k+b>f+h&&(k=v(f,f+h-b-i));return{x:d,y:k}},refresh:function(a,b){function c(){var a=this.points||oa(this),b=a[0].series,c;c=[b.tooltipHeaderFormatter(a[0].key)];n(a,function(a){b=a.series;c.push(b.tooltipFormatter&&
b.tooltipFormatter(a)||a.point.tooltipFormatter(b.tooltipOptions.pointFormat))});c.push(f.footerFormat||"");return c.join("")}var d=this.chart,e=this.label,f=this.options,g,h,i,j={},k,l=[];k=f.formatter||c;var j=d.hoverPoints,m,o=f.crosshairs;i=this.shared;h=this.getAnchor(a,b);g=h[0];h=h[1];i&&(!a.series||!a.series.noSharedTooltip)?(d.hoverPoints=a,j&&n(j,function(a){a.setState()}),n(a,function(a){a.setState("hover");l.push(a.getLabelConfig())}),j={x:a[0].category,y:a[0].y},j.points=l,a=a[0]):j=
a.getLabelConfig();k=k.call(j);j=a.series;i=i||!j.isCartesian||j.tooltipOutsidePlot||d.isInsidePlot(g,h);k===!1||!i?this.hide():(this.isHidden&&e.show(),e.attr({text:k}),m=f.borderColor||a.color||j.color||"#606060",e.attr({stroke:m}),e=(f.positioner||this.getPosition).call(this,e.width,e.height,{plotX:g,plotY:h}),this.move(t(e.x),t(e.y),g+d.plotLeft,h+d.plotTop),this.isHidden=!1);if(o){o=oa(o);for(e=o.length;e--;)if(i=a.series[e?"yAxis":"xAxis"],o[e]&&i)if(i=i.getPlotLinePath(e?p(a.stackY,a.y):a.x,
1),this.crosshairs[e])this.crosshairs[e].attr({d:i,visibility:"visible"});else{j={"stroke-width":o[e].width||1,stroke:o[e].color||"#C0C0C0",zIndex:o[e].zIndex||2};if(o[e].dashStyle)j.dashstyle=o[e].dashStyle;this.crosshairs[e]=d.renderer.path(i).attr(j).add()}}E(d,"tooltipRefresh",{text:k,x:g+d.plotLeft,y:h+d.plotTop,borderColor:m})},tick:function(){this.tooltipTick&&this.tooltipTick()}};qb.prototype={normalizeMouseEvent:function(a){var b,c,d,a=a||L.event;if(!a.target)a.target=a.srcElement;a=Lb(a);
d=a.touches?a.touches.item(0):a;this.chartPosition=b=Sb(this.chart.container);d.pageX===x?(c=a.x,b=a.y):(c=d.pageX-b.left,b=d.pageY-b.top);return s(a,{chartX:t(c),chartY:t(b)})},getMouseCoordinates:function(a){var b={xAxis:[],yAxis:[]},c=this.chart;n(c.axes,function(d){var e=d.isXAxis;b[e?"xAxis":"yAxis"].push({axis:d,value:d.translate(((c.inverted?!e:e)?a.chartX-c.plotLeft:d.top+d.len-a.chartY)-d.minPixelPadding,!0)})});return b},getIndex:function(a){var b=this.chart;return b.inverted?b.plotHeight+
b.plotTop-a.chartY:a.chartX-b.plotLeft},onmousemove:function(a){var b=this.chart,c=b.series,d=b.tooltip,e,f=b.hoverPoint,g=b.hoverSeries,h,i,j=b.chartWidth,k=this.getIndex(a);if(d&&this.options.tooltip.shared&&(!g||!g.noSharedTooltip)){e=[];h=c.length;for(i=0;i<h;i++)if(c[i].visible&&c[i].options.enableMouseTracking!==!1&&!c[i].noSharedTooltip&&c[i].tooltipPoints.length)b=c[i].tooltipPoints[k],b._dist=N(k-b[c[i].xAxis.tooltipPosName||"plotX"]),j=P(j,b._dist),e.push(b);for(h=e.length;h--;)e[h]._dist>
j&&e.splice(h,1);if(e.length&&e[0].plotX!==this.hoverX)d.refresh(e,a),this.hoverX=e[0].plotX}if(g&&g.tracker&&(b=g.tooltipPoints[k])&&b!==f)b.onMouseOver()},resetTracker:function(a){var b=this.chart,c=b.hoverSeries,d=b.hoverPoint,e=b.tooltip,b=e&&e.shared?b.hoverPoints:d;(a=a&&e&&b)&&oa(b)[0].plotX===x&&(a=!1);if(a)e.refresh(b);else{if(d)d.onMouseOut();if(c)c.onMouseOut();e&&(e.hide(),e.hideCrosshairs());this.hoverX=null}},setDOMEvents:function(){function a(){if(b.selectionMarker){var f={xAxis:[],
yAxis:[]},g=b.selectionMarker.getBBox(),h=g.x-c.plotLeft,l=g.y-c.plotTop,m;e&&(n(c.axes,function(a){if(a.options.zoomEnabled!==!1){var b=a.isXAxis,d=c.inverted?!b:b,e=a.translate(d?h:c.plotHeight-l-g.height,!0,0,0,1),d=a.translate((d?h+g.width:c.plotHeight-l)-2*a.minPixelPadding,!0,0,0,1);!isNaN(e)&&!isNaN(d)&&(f[b?"xAxis":"yAxis"].push({axis:a,min:P(e,d),max:v(e,d)}),m=!0)}}),m&&E(c,"selection",f,function(a){c.zoom(a)}));b.selectionMarker=b.selectionMarker.destroy()}if(c)G(d,{cursor:"auto"}),c.cancelClick=
e,c.mouseIsDown=e=!1;U(z,ga?"touchend":"mouseup",a)}var b=this,c=b.chart,d=c.container,e,f=b.zoomX&&!c.inverted||b.zoomY&&c.inverted,g=b.zoomY&&!c.inverted||b.zoomX&&c.inverted;b.hideTooltipOnMouseMove=function(a){a=Lb(a);b.chartPosition&&c.hoverSeries&&c.hoverSeries.isCartesian&&!c.isInsidePlot(a.pageX-b.chartPosition.left-c.plotLeft,a.pageY-b.chartPosition.top-c.plotTop)&&b.resetTracker()};b.hideTooltipOnMouseLeave=function(){b.resetTracker();b.chartPosition=null};d.onmousedown=function(d){d=b.normalizeMouseEvent(d);
!ga&&d.preventDefault&&d.preventDefault();c.mouseIsDown=!0;c.cancelClick=!1;c.mouseDownX=b.mouseDownX=d.chartX;b.mouseDownY=d.chartY;H(z,ga?"touchend":"mouseup",a)};var h=function(a){if(!a||!(a.touches&&a.touches.length>1)){a=b.normalizeMouseEvent(a);if(!ga)a.returnValue=!1;var d=a.chartX,h=a.chartY,l=!c.isInsidePlot(d-c.plotLeft,h-c.plotTop);ga&&a.type==="touchstart"&&(B(a.target,"isTracker")?c.runTrackerClick||a.preventDefault():!c.runChartClick&&!l&&a.preventDefault());if(l)d<c.plotLeft?d=c.plotLeft:
d>c.plotLeft+c.plotWidth&&(d=c.plotLeft+c.plotWidth),h<c.plotTop?h=c.plotTop:h>c.plotTop+c.plotHeight&&(h=c.plotTop+c.plotHeight);if(c.mouseIsDown&&a.type!=="touchstart"&&(e=Math.sqrt(Math.pow(b.mouseDownX-d,2)+Math.pow(b.mouseDownY-h,2)),e>10)){var m=c.isInsidePlot(b.mouseDownX-c.plotLeft,b.mouseDownY-c.plotTop);if(c.hasCartesianSeries&&(b.zoomX||b.zoomY)&&m&&!b.selectionMarker)b.selectionMarker=c.renderer.rect(c.plotLeft,c.plotTop,f?1:c.plotWidth,g?1:c.plotHeight,0).attr({fill:b.options.chart.selectionMarkerFill||
"rgba(69,114,167,0.25)",zIndex:7}).add();if(b.selectionMarker&&f){var o=d-b.mouseDownX;b.selectionMarker.attr({width:N(o),x:(o>0?0:o)+b.mouseDownX})}b.selectionMarker&&g&&(h-=b.mouseDownY,b.selectionMarker.attr({height:N(h),y:(h>0?0:h)+b.mouseDownY}));m&&!b.selectionMarker&&b.options.chart.panning&&c.pan(d)}if(!l)b.onmousemove(a);return l||!c.hasCartesianSeries}};d.onmousemove=h;H(d,"mouseleave",b.hideTooltipOnMouseLeave);H(z,"mousemove",b.hideTooltipOnMouseMove);d.ontouchstart=function(a){if(b.zoomX||
b.zoomY)d.onmousedown(a);h(a)};d.ontouchmove=h;d.ontouchend=function(){e&&b.resetTracker()};d.onclick=function(a){var d=c.hoverPoint,e,f,a=b.normalizeMouseEvent(a);a.cancelBubble=!0;if(!c.cancelClick)d&&(B(a.target,"isTracker")||B(a.target.parentNode,"isTracker"))?(e=d.plotX,f=d.plotY,s(d,{pageX:b.chartPosition.left+c.plotLeft+(c.inverted?c.plotWidth-f:e),pageY:b.chartPosition.top+c.plotTop+(c.inverted?c.plotHeight-e:f)}),E(d.series,"click",s(a,{point:d})),d.firePointEvent("click",a)):(s(a,b.getMouseCoordinates(a)),
c.isInsidePlot(a.chartX-c.plotLeft,a.chartY-c.plotTop)&&E(c,"click",a))}},destroy:function(){var a=this.chart,b=a.container;if(a.trackerGroup)a.trackerGroup=a.trackerGroup.destroy();U(b,"mouseleave",this.hideTooltipOnMouseLeave);U(z,"mousemove",this.hideTooltipOnMouseMove);b.onclick=b.onmousedown=b.onmousemove=b.ontouchstart=b.ontouchend=b.ontouchmove=null;clearInterval(this.tooltipInterval)},init:function(a,b){if(!a.trackerGroup)a.trackerGroup=a.renderer.g("tracker").attr({zIndex:9}).add();if(b.enabled)a.tooltip=
new pb(a,b),this.tooltipInterval=setInterval(function(){a&&a.tooltip&&a.tooltip.tick()},32);this.setDOMEvents()}};rb.prototype={init:function(a){var b=this,c=b.options=a.options.legend;if(c.enabled){var d=c.itemStyle,e=p(c.padding,8),f=c.itemMarginTop||0;b.baseline=A(d.fontSize)+3+f;b.itemStyle=d;b.itemHiddenStyle=C(d,c.itemHiddenStyle);b.itemMarginTop=f;b.padding=e;b.initialItemX=e;b.initialItemY=e-5;b.maxItemWidth=0;b.chart=a;b.itemHeight=0;b.lastLineHeight=0;b.render();H(b.chart,"endResize",function(){b.positionCheckboxes()})}},
colorizeItem:function(a,b){var c=this.options,d=a.legendItem,e=a.legendLine,f=a.legendSymbol,g=this.itemHiddenStyle.color,c=b?c.itemStyle.color:g,g=b?a.color:g;d&&d.css({fill:c});e&&e.attr({stroke:g});f&&f.attr({stroke:g,fill:g})},positionItem:function(a){var b=this.options,c=b.symbolPadding,b=!b.rtl,d=a._legendItemPos,e=d[0],d=d[1],f=a.checkbox;a.legendGroup&&a.legendGroup.translate(b?e:this.legendWidth-e-2*c-4,d);if(f)f.x=e,f.y=d},destroyItem:function(a){var b=a.checkbox;n(["legendItem","legendLine",
"legendSymbol","legendGroup"],function(b){a[b]&&a[b].destroy()});b&&Na(a.checkbox)},destroy:function(){var a=this.group,b=this.box;if(b)this.box=b.destroy();if(a)this.group=a.destroy()},positionCheckboxes:function(){var a=this;n(a.allItems,function(b){var c=b.checkbox,d=a.group.alignAttr;c&&G(c,{left:d.translateX+b.legendItemWidth+c.x-20+"px",top:d.translateY+c.y+3+"px"})})},renderItem:function(a){var q;var b=this,c=b.chart,d=c.renderer,e=b.options,f=e.layout==="horizontal",g=e.symbolWidth,h=e.symbolPadding,
i=b.itemStyle,j=b.itemHiddenStyle,k=b.padding,l=!e.rtl,m=e.width,o=e.itemMarginBottom||0,r=b.itemMarginTop,p=b.initialItemX,n=a.legendItem,y=a.series||a,u=y.options,t=u.showCheckbox;if(!n&&(a.legendGroup=d.g("legend-item").attr({zIndex:1}).add(b.scrollGroup),y.drawLegendSymbol(b,a),a.legendItem=n=d.text(e.labelFormatter.call(a),l?g+h:-h,b.baseline,e.useHTML).css(C(a.visible?i:j)).attr({align:l?"left":"right",zIndex:2}).add(a.legendGroup),a.legendGroup.on("mouseover",function(){a.setState("hover");
n.css(b.options.itemHoverStyle)}).on("mouseout",function(){n.css(a.visible?i:j);a.setState()}).on("click",function(b){var c=function(){a.setVisible()},b={browserEvent:b};a.firePointEvent?a.firePointEvent("legendItemClick",b,c):E(a,"legendItemClick",b,c)}),b.colorizeItem(a,a.visible),u&&t))a.checkbox=S("input",{type:"checkbox",checked:a.selected,defaultChecked:a.selected},e.itemCheckboxStyle,c.container),H(a.checkbox,"click",function(b){E(a,"checkboxClick",{checked:b.target.checked},function(){a.select()})});
d=n.getBBox();q=a.legendItemWidth=e.itemWidth||g+h+d.width+k+(t?20:0),e=q;b.itemHeight=g=d.height;if(f&&b.itemX-p+e>(m||c.chartWidth-2*k-p))b.itemX=p,b.itemY+=r+b.lastLineHeight+o,b.lastLineHeight=0;b.maxItemWidth=v(b.maxItemWidth,e);b.lastItemY=r+b.itemY+o;b.lastLineHeight=v(g,b.lastLineHeight);a._legendItemPos=[b.itemX,b.itemY];f?b.itemX+=e:(b.itemY+=r+g+o,b.lastLineHeight=g);b.offsetWidth=m||v(f?b.itemX-p:e,b.offsetWidth)},render:function(){var a=this,b=a.chart,c=b.renderer,d=a.group,e,f,g,h,i=
a.box,j=a.options,k=a.padding,l=j.borderWidth,m=j.backgroundColor;a.itemX=a.initialItemX;a.itemY=a.initialItemY;a.offsetWidth=0;a.lastItemY=0;if(!d)a.group=d=c.g("legend").attr({zIndex:7}).add(),a.contentGroup=c.g().attr({zIndex:1}).add(d),a.scrollGroup=c.g().add(a.contentGroup),a.clipRect=c.clipRect(0,0,9999,b.chartHeight),a.contentGroup.clip(a.clipRect);e=[];n(b.series,function(a){var b=a.options;b.showInLegend&&(e=e.concat(a.legendItems||(b.legendType==="point"?a.data:a)))});Fb(e,function(a,b){return(a.options&&
a.options.legendIndex||0)-(b.options&&b.options.legendIndex||0)});j.reversed&&e.reverse();a.allItems=e;a.display=f=!!e.length;n(e,function(b){a.renderItem(b)});g=j.width||a.offsetWidth;h=a.lastItemY+a.lastLineHeight;h=a.handleOverflow(h);if(l||m){g+=k;h+=k;if(i){if(g>0&&h>0)i[i.isNew?"attr":"animate"](i.crisp(null,null,null,g,h)),i.isNew=!1}else a.box=i=c.rect(0,0,g,h,j.borderRadius,l||0).attr({stroke:j.borderColor,"stroke-width":l||0,fill:m||T}).add(d).shadow(j.shadow),i.isNew=!0;i[f?"show":"hide"]()}a.legendWidth=
g;a.legendHeight=h;n(e,function(b){a.positionItem(b)});f&&d.align(s({width:g,height:h},j),!0,b.spacingBox);b.isResizing||this.positionCheckboxes()},handleOverflow:function(a){var b=this,c=this.chart,d=c.renderer,e=this.options,f=e.y,f=c.spacingBox.height+(e.verticalAlign==="top"?-f:f)-this.padding,g=e.maxHeight,h=this.clipRect,i=e.navigation,j=p(i.animation,!0),k=i.arrowSize||12,l=this.nav;e.layout==="horizontal"&&(f/=2);g&&(f=P(f,g));if(a>f){this.clipHeight=c=f-20;this.pageCount=wa(a/c);this.currentPage=
p(this.currentPage,1);this.fullHeight=a;h.attr({height:c});if(!l)this.nav=l=d.g().attr({zIndex:1}).add(this.group),this.up=d.symbol("triangle",0,0,k,k).on("click",function(){b.scroll(-1,j)}).add(l),this.pager=d.text("",15,10).css(i.style).add(l),this.down=d.symbol("triangle-down",0,0,k,k).on("click",function(){b.scroll(1,j)}).add(l);b.scroll(0);a=f}else l&&(h.attr({height:c.chartHeight}),l.hide(),this.scrollGroup.attr({translateY:1}));return a},scroll:function(a,b){var c=this.pageCount,d=this.currentPage+
a,e=this.clipHeight,f=this.options.navigation,g=f.activeColor,f=f.inactiveColor,h=this.pager,i=this.padding;d>c&&(d=c);if(d>0)b!==x&&ua(b,this.chart),this.nav.attr({translateX:i,translateY:e+7,visibility:"visible"}),this.up.attr({fill:d===1?f:g}).css({cursor:d===1?"default":"pointer"}),h.attr({text:d+"/"+this.pageCount}),this.down.attr({x:18+this.pager.getBBox().width,fill:d===c?f:g}).css({cursor:d===c?"default":"pointer"}),this.scrollGroup.animate({translateY:-P(e*(d-1),this.fullHeight-e+i)+1}),
h.attr({text:d+"/"+c}),this.currentPage=d}};sb.prototype={initSeries:function(a){var b=this.options.chart,b=new ba[a.type||b.type||b.defaultSeriesType];b.init(this,a);return b},addSeries:function(a,b,c){var d,e=this;a&&(ua(c,e),b=p(b,!0),E(e,"addSeries",{options:a},function(){d=e.initSeries(a);e.isDirtyLegend=!0;b&&e.redraw()}));return d},isInsidePlot:function(a,b,c){var d=c?b:a,a=c?a:b;return d>=0&&d<=this.plotWidth&&a>=0&&a<=this.plotHeight},adjustTickAmounts:function(){this.options.chart.alignTicks!==
!1&&n(this.axes,function(a){a.adjustTickAmount()});this.maxTicks=null},redraw:function(a){var b=this.axes,c=this.series,d=this.tracker,e=this.legend,f=this.isDirtyLegend,g,h=this.isDirtyBox,i=c.length,j=i,k=this.renderer,l=k.isHidden();ua(a,this);for(l&&this.cloneRenderTo();j--;)if(a=c[j],a.isDirty&&a.options.stacking){g=!0;break}if(g)for(j=i;j--;)if(a=c[j],a.options.stacking)a.isDirty=!0;n(c,function(a){a.isDirty&&a.options.legendType==="point"&&(f=!0)});if(f&&e.options.enabled)e.render(),this.isDirtyLegend=
!1;if(this.hasCartesianSeries){if(!this.isResizing)this.maxTicks=null,n(b,function(a){a.setScale()});this.adjustTickAmounts();this.getMargins();n(b,function(a){if(a.isDirtyExtremes)a.isDirtyExtremes=!1,E(a,"afterSetExtremes",a.getExtremes());if(a.isDirty||h||g)a.redraw(),h=!0})}h&&this.drawChartBox();n(c,function(a){a.isDirty&&a.visible&&(!a.isCartesian||a.xAxis)&&a.redraw()});d&&d.resetTracker&&d.resetTracker(!0);k.draw();E(this,"redraw");l&&this.cloneRenderTo(!0)},showLoading:function(a){var b=
this.options,c=this.loadingDiv,d=b.loading;if(!c)this.loadingDiv=c=S(ia,{className:"highcharts-loading"},s(d.style,{left:this.plotLeft+"px",top:this.plotTop+"px",width:this.plotWidth+"px",height:this.plotHeight+"px",zIndex:10,display:T}),this.container),this.loadingSpan=S("span",null,d.labelStyle,c);this.loadingSpan.innerHTML=a||b.lang.loading;if(!this.loadingShown)G(c,{opacity:0,display:""}),xb(c,{opacity:d.style.opacity},{duration:d.showDuration||0}),this.loadingShown=!0},hideLoading:function(){var a=
this.options,b=this.loadingDiv;b&&xb(b,{opacity:0},{duration:a.loading.hideDuration||100,complete:function(){G(b,{display:T})}});this.loadingShown=!1},get:function(a){var b=this.axes,c=this.series,d,e;for(d=0;d<b.length;d++)if(b[d].options.id===a)return b[d];for(d=0;d<c.length;d++)if(c[d].options.id===a)return c[d];for(d=0;d<c.length;d++){e=c[d].points||[];for(b=0;b<e.length;b++)if(e[b].id===a)return e[b]}return null},getAxes:function(){var a=this,b=this.options,c=b.xAxis||{},b=b.yAxis||{},c=oa(c);
n(c,function(a,b){a.index=b;a.isX=!0});b=oa(b);n(b,function(a,b){a.index=b});c=c.concat(b);n(c,function(b){new ob(a,b)});a.adjustTickAmounts()},getSelectedPoints:function(){var a=[];n(this.series,function(b){a=a.concat(Kb(b.points,function(a){return a.selected}))});return a},getSelectedSeries:function(){return Kb(this.series,function(a){return a.selected})},showResetZoom:function(){var a=this,b=O.lang,c=a.options.chart.resetZoomButton,d=c.theme,e=d.states,f=c.relativeTo==="chart"?null:"plotBox";this.resetZoomButton=
a.renderer.button(b.resetZoom,null,null,function(){a.zoomOut()},d,e&&e.hover).attr({align:c.position.align,title:b.resetZoomTitle}).add().align(c.position,!1,a[f]);this.resetZoomButton.alignTo=f},zoomOut:function(){var a=this,b=a.resetZoomButton;E(a,"selection",{resetSelection:!0},function(){a.zoom()});if(b)a.resetZoomButton=b.destroy()},zoom:function(a){var b=this,c;!a||a.resetSelection?n(b.axes,function(a){c=a.zoom()}):n(a.xAxis.concat(a.yAxis),function(a){var e=a.axis;if(b.tracker[e.isXAxis?"zoomX":
"zoomY"])c=e.zoom(a.min,a.max)});b.resetZoomButton||b.showResetZoom();c&&b.redraw(p(b.options.chart.animation,b.pointCount<100))},pan:function(a){var b=this.xAxis[0],c=this.mouseDownX,d=b.pointRange/2,e=b.getExtremes(),f=b.translate(c-a,!0)+d,c=b.translate(c+this.plotWidth-a,!0)-d;(d=this.hoverPoints)&&n(d,function(a){a.setState()});b.series.length&&f>P(e.dataMin,e.min)&&c<v(e.dataMax,e.max)&&b.setExtremes(f,c,!0,!1,{trigger:"pan"});this.mouseDownX=a;G(this.container,{cursor:"move"})},setTitle:function(a,
b){var c=this,d=c.options,e;c.chartTitleOptions=e=C(d.title,a);c.chartSubtitleOptions=d=C(d.subtitle,b);n([["title",a,e],["subtitle",b,d]],function(a){var b=a[0],d=c[b],e=a[1],a=a[2];d&&e&&(c[b]=d=d.destroy());a&&a.text&&!d&&(c[b]=c.renderer.text(a.text,0,0,a.useHTML).attr({align:a.align,"class":"highcharts-"+b,zIndex:a.zIndex||4}).css(a.style).add().align(a,!1,c.spacingBox))})},getChartSize:function(){var a=this.options.chart,b=this.renderToClone||this.renderTo;this.containerWidth=db(b,"width");
this.containerHeight=db(b,"height");this.chartWidth=a.width||this.containerWidth||600;this.chartHeight=a.height||(this.containerHeight>19?this.containerHeight:400)},cloneRenderTo:function(a){var b=this.renderToClone,c=this.container;a?b&&(this.renderTo.appendChild(c),Na(b),delete this.renderToClone):(c&&this.renderTo.removeChild(c),this.renderToClone=b=this.renderTo.cloneNode(0),G(b,{position:"absolute",top:"-9999px",display:"block"}),z.body.appendChild(b),c&&b.appendChild(c))},getContainer:function(){var a,
b=this.options.chart,c,d,e;this.renderTo=a=b.renderTo;e="highcharts-"+ub++;if(ma(a))this.renderTo=a=z.getElementById(a);a||$a(13,!0);a.innerHTML="";a.offsetWidth||this.cloneRenderTo();this.getChartSize();c=this.chartWidth;d=this.chartHeight;this.container=a=S(ia,{className:"highcharts-container"+(b.className?" "+b.className:""),id:e},s({position:"relative",overflow:"hidden",width:c+"px",height:d+"px",textAlign:"left",lineHeight:"normal",zIndex:0},b.style),this.renderToClone||a);this.renderer=b.forExport?
new ra(a,c,d,!0):new Ra(a,c,d);$&&this.renderer.create(this,a,c,d)},getMargins:function(){var a=this.options.chart,b=a.spacingTop,c=a.spacingRight,d=a.spacingBottom,a=a.spacingLeft,e,f=this.legend,g=this.optionsMarginTop,h=this.optionsMarginLeft,i=this.optionsMarginRight,j=this.optionsMarginBottom,k=this.chartTitleOptions,l=this.chartSubtitleOptions,m=this.options.legend,o=p(m.margin,10),r=m.x,t=m.y,q=m.align,y=m.verticalAlign;this.resetMargins();e=this.axisOffset;if((this.title||this.subtitle)&&
!u(this.optionsMarginTop))if(l=v(this.title&&!k.floating&&!k.verticalAlign&&k.y||0,this.subtitle&&!l.floating&&!l.verticalAlign&&l.y||0))this.plotTop=v(this.plotTop,l+p(k.margin,15)+b);if(f.display&&!m.floating)if(q==="right"){if(!u(i))this.marginRight=v(this.marginRight,f.legendWidth-r+o+c)}else if(q==="left"){if(!u(h))this.plotLeft=v(this.plotLeft,f.legendWidth+r+o+a)}else if(y==="top"){if(!u(g))this.plotTop=v(this.plotTop,f.legendHeight+t+o+b)}else if(y==="bottom"&&!u(j))this.marginBottom=v(this.marginBottom,
f.legendHeight-t+o+d);this.extraBottomMargin&&(this.marginBottom+=this.extraBottomMargin);this.extraTopMargin&&(this.plotTop+=this.extraTopMargin);this.hasCartesianSeries&&n(this.axes,function(a){a.getOffset()});u(h)||(this.plotLeft+=e[3]);u(g)||(this.plotTop+=e[0]);u(j)||(this.marginBottom+=e[2]);u(i)||(this.marginRight+=e[1]);this.setChartSize()},initReflow:function(){function a(a){var g=c.width||db(d,"width"),h=c.height||db(d,"height"),a=a?a.target:L;if(g&&h&&(a===L||a===z)){if(g!==b.containerWidth||
h!==b.containerHeight)clearTimeout(e),e=setTimeout(function(){b.resize(g,h,!1)},100);b.containerWidth=g;b.containerHeight=h}}var b=this,c=b.options.chart,d=b.renderTo,e;H(L,"resize",a);H(b,"destroy",function(){U(L,"resize",a)})},resize:function(a,b,c){var d=this,e,f,g=d.resetZoomButton,h=d.title,i=d.subtitle,j;d.isResizing+=1;j=function(){d&&E(d,"endResize",null,function(){d.isResizing-=1})};ua(c,d);d.oldChartHeight=d.chartHeight;d.oldChartWidth=d.chartWidth;if(u(a))d.chartWidth=e=t(a);if(u(b))d.chartHeight=
f=t(b);G(d.container,{width:e+"px",height:f+"px"});d.renderer.setSize(e,f,c);d.plotWidth=e-d.plotLeft-d.marginRight;d.plotHeight=f-d.plotTop-d.marginBottom;d.maxTicks=null;n(d.axes,function(a){a.isDirty=!0;a.setScale()});n(d.series,function(a){a.isDirty=!0});d.isDirtyLegend=!0;d.isDirtyBox=!0;d.getMargins();a=d.spacingBox;h&&h.align(null,null,a);i&&i.align(null,null,a);g&&g.align(null,null,d[g.alignTo]);d.redraw(c);d.oldChartHeight=null;E(d,"resize");Oa===!1?j():setTimeout(j,Oa&&Oa.duration||500)},
setChartSize:function(){var a=this.inverted,b=this.chartWidth,c=this.chartHeight,d=this.options.chart,e=d.spacingTop,f=d.spacingRight,g=d.spacingBottom,h=d.spacingLeft,i,j,k,l;this.plotLeft=i=t(this.plotLeft);this.plotTop=j=t(this.plotTop);this.plotWidth=k=t(b-i-this.marginRight);this.plotHeight=l=t(c-j-this.marginBottom);this.plotSizeX=a?l:k;this.plotSizeY=a?k:l;this.plotBorderWidth=a=d.plotBorderWidth||0;this.spacingBox={x:h,y:e,width:b-h-f,height:c-e-g};this.plotBox={x:i,y:j,width:k,height:l};
this.clipBox={x:a/2,y:a/2,width:this.plotSizeX-a,height:this.plotSizeY-a};n(this.axes,function(a){a.setAxisSize();a.setAxisTranslation()})},resetMargins:function(){var a=this.options.chart,b=a.spacingRight,c=a.spacingBottom,d=a.spacingLeft;this.plotTop=p(this.optionsMarginTop,a.spacingTop);this.marginRight=p(this.optionsMarginRight,b);this.marginBottom=p(this.optionsMarginBottom,c);this.plotLeft=p(this.optionsMarginLeft,d);this.axisOffset=[0,0,0,0]},drawChartBox:function(){var a=this.options.chart,
b=this.renderer,c=this.chartWidth,d=this.chartHeight,e=this.chartBackground,f=this.plotBackground,g=this.plotBorder,h=this.plotBGImage,i=a.borderWidth||0,j=a.backgroundColor,k=a.plotBackgroundColor,l=a.plotBackgroundImage,m=a.plotBorderWidth||0,o,p=this.plotLeft,n=this.plotTop,q=this.plotWidth,y=this.plotHeight,t=this.plotBox,u=this.clipRect,w=this.clipBox;o=i+(a.shadow?8:0);if(i||j)if(e)e.animate(e.crisp(null,null,null,c-o,d-o));else{e={fill:j||T};if(i)e.stroke=a.borderColor,e["stroke-width"]=i;
this.chartBackground=b.rect(o/2,o/2,c-o,d-o,a.borderRadius,i).attr(e).add().shadow(a.shadow)}if(k)f?f.animate(t):this.plotBackground=b.rect(p,n,q,y,0).attr({fill:k}).add().shadow(a.plotShadow);if(l)h?h.animate(t):this.plotBGImage=b.image(l,p,n,q,y).add();u?u.animate({width:w.width,height:w.height}):this.clipRect=b.clipRect(w);if(m)g?g.animate(g.crisp(null,p,n,q,y)):this.plotBorder=b.rect(p,n,q,y,0,m).attr({stroke:a.plotBorderColor,"stroke-width":m,zIndex:1}).add();this.isDirtyBox=!1},propFromSeries:function(){var a=
this,b=a.options.chart,c,d=a.options.series,e,f;n(["inverted","angular","polar"],function(g){c=ba[b.type||b.defaultSeriesType];f=a[g]||b[g]||c&&c.prototype[g];for(e=d&&d.length;!f&&e--;)(c=ba[d[e].type])&&c.prototype[g]&&(f=!0);a[g]=f})},render:function(){var a=this,b=a.axes,c=a.renderer,d=a.options,e=d.labels,d=d.credits,f;a.setTitle();a.legend=new rb(a);n(b,function(a){a.setScale()});a.getMargins();a.maxTicks=null;n(b,function(a){a.setTickPositions(!0);a.setMaxTicks()});a.adjustTickAmounts();a.getMargins();
a.drawChartBox();a.hasCartesianSeries&&n(b,function(a){a.render()});if(!a.seriesGroup)a.seriesGroup=c.g("series-group").attr({zIndex:3}).add();n(a.series,function(a){a.translate();a.setTooltipPoints();a.render()});e.items&&n(e.items,function(b){var d=s(e.style,b.style),f=A(d.left)+a.plotLeft,j=A(d.top)+a.plotTop+12;delete d.left;delete d.top;c.text(b.html,f,j).attr({zIndex:2}).css(d).add()});if(d.enabled&&!a.credits)f=d.href,a.credits=c.text(d.text,0,0).on("click",function(){if(f)location.href=f}).attr({align:d.position.align,
zIndex:8}).css(d.style).add().align(d.position);a.hasRendered=!0},destroy:function(){var a=this,b=a.axes,c=a.series,d=a.container,e,f=d&&d.parentNode;if(a!==null){E(a,"destroy");U(a);for(e=b.length;e--;)b[e]=b[e].destroy();for(e=c.length;e--;)c[e]=c[e].destroy();n("title,subtitle,chartBackground,plotBackground,plotBGImage,plotBorder,seriesGroup,clipRect,credits,tracker,scroller,rangeSelector,legend,resetZoomButton,tooltip,renderer".split(","),function(b){var c=a[b];c&&(a[b]=c.destroy())});if(d)d.innerHTML=
"",U(d),f&&Na(d),d=null;for(e in a)delete a[e];a=a.options=null}},firstRender:function(){var a=this,b=a.options,c=a.callback;if(!fa&&L==L.top&&z.readyState!=="complete"||$&&!L.canvg)$?Mb.push(function(){a.firstRender()},b.global.canvasToolsURL):z.attachEvent("onreadystatechange",function(){z.detachEvent("onreadystatechange",a.firstRender);z.readyState==="complete"&&a.firstRender()});else{a.getContainer();E(a,"init");if(Highcharts.RangeSelector&&b.rangeSelector.enabled)a.rangeSelector=new Highcharts.RangeSelector(a);
a.resetMargins();a.setChartSize();a.propFromSeries();a.getAxes();n(b.series||[],function(b){a.initSeries(b)});if(Highcharts.Scroller&&(b.navigator.enabled||b.scrollbar.enabled))a.scroller=new Highcharts.Scroller(a);a.tracker=new qb(a,b);a.render();a.renderer.draw();c&&c.apply(a,[a]);n(a.callbacks,function(b){b.apply(a,[a])});a.cloneRenderTo(!0);E(a,"load")}},init:function(a){var b=this.options.chart,c;b.reflow!==!1&&H(this,"load",this.initReflow);if(a)for(c in a)H(this,c,a[c]);this.xAxis=[];this.yAxis=
[];this.animation=$?!1:p(b.animation,!0);this.setSize=this.resize;this.pointCount=0;this.counters=new Eb;this.firstRender()}};sb.prototype.callbacks=[];var Ta=function(){};Ta.prototype={init:function(a,b,c){var d=a.chart.counters;this.series=a;this.applyOptions(b,c);this.pointAttr={};if(a.options.colorByPoint)b=a.chart.options.colors,this.color=this.color||b[d.color++],d.wrapColor(b.length);a.chart.pointCount++;return this},applyOptions:function(a,b){var c=this.series,d=typeof a;this.config=a;if(d===
"number"||a===null)this.y=a;else if(typeof a[0]==="number")this.x=a[0],this.y=a[1];else if(d==="object"&&typeof a.length!=="number"){s(this,a);this.options=a;if(a.dataLabels)c._hasPointLabels=!0;if(a.marker)c._hasPointMarkers=!0}else if(typeof a[0]==="string")this.name=a[0],this.y=a[1];if(this.x===x)this.x=b===x?c.autoIncrement():b},destroy:function(){var a=this.series.chart,b=a.hoverPoints,c;a.pointCount--;if(b&&(this.setState(),ya(b,this),!b.length))a.hoverPoints=null;if(this===a.hoverPoint)this.onMouseOut();
if(this.graphic||this.dataLabel)U(this),this.destroyElements();this.legendItem&&a.legend.destroyItem(this);for(c in this)this[c]=null},destroyElements:function(){for(var a="graphic,tracker,dataLabel,group,connector,shadowGroup".split(","),b,c=6;c--;)b=a[c],this[b]&&(this[b]=this[b].destroy())},getLabelConfig:function(){return{x:this.category,y:this.y,key:this.name||this.category,series:this.series,point:this,percentage:this.percentage,total:this.total||this.stackTotal}},select:function(a,b){var c=
this,d=c.series.chart,a=p(a,!c.selected);c.firePointEvent(a?"select":"unselect",{accumulate:b},function(){c.selected=a;c.setState(a&&"select");b||n(d.getSelectedPoints(),function(a){if(a.selected&&a!==c)a.selected=!1,a.setState(""),a.firePointEvent("unselect")})})},onMouseOver:function(){var a=this.series,b=a.chart,c=b.tooltip,d=b.hoverPoint;if(d&&d!==this)d.onMouseOut();this.firePointEvent("mouseOver");c&&(!c.shared||a.noSharedTooltip)&&c.refresh(this);this.setState("hover");b.hoverPoint=this},onMouseOut:function(){var a=
this.series.chart,b=a.hoverPoints;if(!b||Rb(this,b)===-1)this.firePointEvent("mouseOut"),this.setState(),a.hoverPoint=null},tooltipFormatter:function(a){var b=this.series,c=b.tooltipOptions,d=a.match(/\{(series|point)\.[a-zA-Z]+\}/g),e=/[{\.}]/,f,g,h,i,j={y:0,open:0,high:0,low:0,close:0,percentage:1,total:1};c.valuePrefix=c.valuePrefix||c.yPrefix;c.valueDecimals=c.valueDecimals||c.yDecimals;c.valueSuffix=c.valueSuffix||c.ySuffix;for(i in d)g=d[i],ma(g)&&g!==a&&(h=(" "+g).split(e),f={point:this,series:b}[h[1]],
h=h[2],f===this&&j.hasOwnProperty(h)?(f=j[h]?h:"value",f=(c[f+"Prefix"]||"")+Ia(this[h],p(c[f+"Decimals"],-1))+(c[f+"Suffix"]||"")):f=f[h],a=a.replace(g,f));return a},update:function(a,b,c){var d=this,e=d.series,f=d.graphic,g,h=e.data,i=h.length,j=e.chart,b=p(b,!0);d.firePointEvent("update",{options:a},function(){d.applyOptions(a);Z(a)&&(e.getAttribs(),f&&f.attr(d.pointAttr[e.state]));for(g=0;g<i;g++)if(h[g]===d){e.xData[g]=d.x;e.yData[g]=d.y;e.options.data[g]=a;break}e.isDirty=!0;e.isDirtyData=!0;
b&&j.redraw(c)})},remove:function(a,b){var c=this,d=c.series,e=d.chart,f,g=d.data,h=g.length;ua(b,e);a=p(a,!0);c.firePointEvent("remove",null,function(){for(f=0;f<h;f++)if(g[f]===c){g.splice(f,1);d.options.data.splice(f,1);d.xData.splice(f,1);d.yData.splice(f,1);break}c.destroy();d.isDirty=!0;d.isDirtyData=!0;a&&e.redraw()})},firePointEvent:function(a,b,c){var d=this,e=this.series.options;(e.point.events[a]||d.options&&d.options.events&&d.options.events[a])&&this.importEvents();a==="click"&&e.allowPointSelect&&
(c=function(a){d.select(null,a.ctrlKey||a.metaKey||a.shiftKey)});E(this,a,b,c)},importEvents:function(){if(!this.hasImportedEvents){var a=C(this.series.options.point,this.options).events,b;this.events=a;for(b in a)H(this,b,a[b]);this.hasImportedEvents=!0}},setState:function(a){var b=this.plotX,c=this.plotY,d=this.series,e=d.options.states,f=Y[d.type].marker&&d.options.marker,g=f&&!f.enabled,h=f&&f.states[a],i=h&&h.enabled===!1,j=d.stateMarkerGraphic,k=d.chart,l=this.pointAttr,a=a||"";if(!(a===this.state||
this.selected&&a!=="select"||e[a]&&e[a].enabled===!1||a&&(i||g&&!h.enabled))){if(this.graphic)e=f&&this.graphic.symbolName&&l[a].r,this.graphic.attr(C(l[a],e?{x:b-e,y:c-e,width:2*e,height:2*e}:{}));else{if(a&&h)e=h.radius,j?j.attr({x:b-e,y:c-e}):d.stateMarkerGraphic=j=k.renderer.symbol(d.symbol,b-e,c-e,2*e,2*e).attr(l[a]).add(d.markerGroup);if(j)j[a&&k.isInsidePlot(b,c)?"show":"hide"]()}this.state=a}}};var R=function(){};R.prototype={isCartesian:!0,type:"line",pointClass:Ta,sorted:!0,pointAttrToOptions:{stroke:"lineColor",
"stroke-width":"lineWidth",fill:"fillColor",r:"radius"},init:function(a,b){var c,d;this.chart=a;this.options=b=this.setOptions(b);this.bindAxes();s(this,{name:b.name,state:"",pointAttr:{},visible:b.visible!==!1,selected:b.selected===!0});if($)b.animation=!1;d=b.events;for(c in d)H(this,c,d[c]);if(d&&d.click||b.point&&b.point.events&&b.point.events.click||b.allowPointSelect)a.runTrackerClick=!0;this.getColor();this.getSymbol();this.setData(b.data,!1);if(this.isCartesian)a.hasCartesianSeries=!0;a.series.push(this);
Fb(a.series,function(a,b){return(a.options.index||0)-(b.options.index||0)});n(a.series,function(a,b){a.index=b;a.name=a.name||"Series "+(b+1)})},bindAxes:function(){var a=this,b=a.options,c=a.chart,d;a.isCartesian&&n(["xAxis","yAxis"],function(e){n(c[e],function(c){d=c.options;if(b[e]===d.index||b[e]===x&&d.index===0)c.series.push(a),a[e]=c,c.isDirty=!0})})},autoIncrement:function(){var a=this.options,b=this.xIncrement,b=p(b,a.pointStart,0);this.pointInterval=p(this.pointInterval,a.pointInterval,
1);this.xIncrement=b+this.pointInterval;return b},getSegments:function(){var a=-1,b=[],c,d=this.points,e=d.length;if(e)if(this.options.connectNulls){for(c=e;c--;)d[c].y===null&&d.splice(c,1);d.length&&(b=[d])}else n(d,function(c,g){c.y===null?(g>a+1&&b.push(d.slice(a+1,g)),a=g):g===e-1&&b.push(d.slice(a+1,g+1))});this.segments=b},setOptions:function(a){var b=this.chart.options,c=b.plotOptions,d=c[this.type],e=a.data;a.data=null;c=C(d,c.series,a);c.data=a.data=e;this.tooltipOptions=C(b.tooltip,c.tooltip);
d.marker===null&&delete c.marker;return c},getColor:function(){var a=this.options,b=this.chart.options.colors,c=this.chart.counters;this.color=a.color||!a.colorByPoint&&b[c.color++]||"gray";c.wrapColor(b.length)},getSymbol:function(){var a=this.options.marker,b=this.chart,c=b.options.symbols,b=b.counters;this.symbol=a.symbol||c[b.symbol++];if(/^url/.test(this.symbol))a.radius=0;b.wrapSymbol(c.length)},drawLegendSymbol:function(a){var b=this.options,c=b.marker,d=a.options.symbolWidth,e=this.chart.renderer,
f=this.legendGroup,a=a.baseline,g;if(b.lineWidth){g={"stroke-width":b.lineWidth};if(b.dashStyle)g.dashstyle=b.dashStyle;this.legendLine=e.path(["M",0,a-4,"L",d,a-4]).attr(g).add(f)}if(c&&c.enabled)b=c.radius,this.legendSymbol=e.symbol(this.symbol,d/2-b,a-4-b,2*b,2*b).attr(this.pointAttr[""]).add(f)},addPoint:function(a,b,c,d){var e=this.data,f=this.graph,g=this.area,h=this.chart,i=this.xData,j=this.yData,k=f&&f.shift||0,l=this.options.data,m=this.pointClass.prototype;ua(d,h);if(f&&c)f.shift=k+1;if(g){if(c)g.shift=
k+1;g.isArea=!0}b=p(b,!0);d={series:this};m.applyOptions.apply(d,[a]);i.push(d.x);j.push(m.toYData?m.toYData.call(d):d.y);l.push(a);c&&(e[0]&&e[0].remove?e[0].remove(!1):(e.shift(),i.shift(),j.shift(),l.shift()));this.getAttribs();this.isDirtyData=this.isDirty=!0;b&&h.redraw()},setData:function(a,b){var c=this.points,d=this.options,e=this.initialColor,f=this.chart,g=null,h=this.xAxis,i,j=this.pointClass.prototype;this.xIncrement=null;this.pointRange=h&&h.categories?1:d.pointRange;if(u(e))f.counters.color=
e;var e=[],k=[],l=a?a.length:[],m=(i=this.pointArrayMap)&&i.length;if(l>(d.turboThreshold||1E3)){for(i=0;g===null&&i<l;)g=a[i],i++;if(Ga(g)){j=p(d.pointStart,0);d=p(d.pointInterval,1);for(i=0;i<l;i++)e[i]=j,k[i]=a[i],j+=d;this.xIncrement=j}else if(Fa(g))if(m)for(i=0;i<l;i++)d=a[i],e[i]=d[0],k[i]=d.slice(1,m+1);else for(i=0;i<l;i++)d=a[i],e[i]=d[0],k[i]=d[1]}else for(i=0;i<l;i++)d={series:this},j.applyOptions.apply(d,[a[i]]),e[i]=d.x,k[i]=j.toYData?j.toYData.call(d):d.y;ma(k[0])&&$a(14,!0);this.data=
[];this.options.data=a;this.xData=e;this.yData=k;for(i=c&&c.length||0;i--;)c[i]&&c[i].destroy&&c[i].destroy();if(h)h.minRange=h.userMinRange;this.isDirty=this.isDirtyData=f.isDirtyBox=!0;p(b,!0)&&f.redraw(!1)},remove:function(a,b){var c=this,d=c.chart,a=p(a,!0);if(!c.isRemoving)c.isRemoving=!0,E(c,"remove",null,function(){c.destroy();d.isDirtyLegend=d.isDirtyBox=!0;a&&d.redraw(b)});c.isRemoving=!1},processData:function(a){var b=this.xData,c=this.yData,d=b.length,e=0,f=d,g,h,i=this.xAxis,j=this.options,
k=j.cropThreshold,l=this.isCartesian;if(l&&!this.isDirty&&!i.isDirty&&!this.yAxis.isDirty&&!a)return!1;if(l&&this.sorted&&(!k||d>k||this.forceCrop))if(a=i.getExtremes(),i=a.min,k=a.max,b[d-1]<i||b[0]>k)b=[],c=[];else if(b[0]<i||b[d-1]>k){for(a=0;a<d;a++)if(b[a]>=i){e=v(0,a-1);break}for(;a<d;a++)if(b[a]>k){f=a+1;break}b=b.slice(e,f);c=c.slice(e,f);g=!0}for(a=b.length-1;a>0;a--)if(d=b[a]-b[a-1],d>0&&(h===x||d<h))h=d;this.cropped=g;this.cropStart=e;this.processedXData=b;this.processedYData=c;if(j.pointRange===
null)this.pointRange=h||1;this.closestPointRange=h},generatePoints:function(){var a=this.options.data,b=this.data,c,d=this.processedXData,e=this.processedYData,f=this.pointClass,g=d.length,h=this.cropStart||0,i,j=this.hasGroupedData,k,l=[],m;if(!b&&!j)b=[],b.length=a.length,b=this.data=b;for(m=0;m<g;m++)i=h+m,j?l[m]=(new f).init(this,[d[m]].concat(oa(e[m]))):(b[i]?k=b[i]:a[i]!==x&&(b[i]=k=(new f).init(this,a[i],d[m])),l[m]=k);if(b&&(g!==(c=b.length)||j))for(m=0;m<c;m++)if(m===h&&!j&&(m+=g),b[m])b[m].destroyElements(),
b[m].plotX=x;this.data=b;this.points=l},translate:function(){this.processedXData||this.processData();this.generatePoints();for(var a=this.chart,b=this.options,c=b.stacking,d=this.xAxis,e=d.categories,f=this.yAxis,g=this.points,h=g.length,i=!!this.modifyValue,j,k=f.series,l=k.length,m=b.pointPlacement==="between";l--;)if(k[l].visible){k[l]===this&&(j=!0);break}for(l=0;l<h;l++){var k=g[l],o=k.x,n=k.y,s=k.low,q=f.stacks[(n<b.threshold?"-":"")+this.stackKey];k.plotX=d.translate(o,0,0,0,1,m);if(c&&this.visible&&
q&&q[o])s=q[o],o=s.total,s.cum=s=s.cum-n,n=s+n,j&&(s=p(b.threshold,f.isLog?null:f.min)),c==="percent"&&(s=o?s*100/o:0,n=o?n*100/o:0),k.percentage=o?k.y*100/o:0,k.total=k.stackTotal=o,k.stackY=n;k.yBottom=u(s)?f.translate(s,0,1,0,1):null;i&&(n=this.modifyValue(n,k));k.plotY=typeof n==="number"?t(f.translate(n,0,1,0,1)*10)/10:x;k.clientX=a.inverted?a.plotHeight-k.plotX:k.plotX;k.category=e&&e[k.x]!==x?e[k.x]:k.x}this.getSegments()},setTooltipPoints:function(a){var b=[],c,d,e=(c=this.xAxis)?c.tooltipLen||
c.len:this.chart.plotSizeX,f=c&&c.tooltipPosName||"plotX",g,h,i=[];if(this.options.enableMouseTracking!==!1){if(a)this.tooltipPoints=null;n(this.segments||this.points,function(a){b=b.concat(a)});c&&c.reversed&&(b=b.reverse());a=b.length;for(h=0;h<a;h++){g=b[h];c=b[h-1]?d+1:0;for(d=b[h+1]?v(0,V((g[f]+(b[h+1]?b[h+1][f]:e))/2)):e;c>=0&&c<=d;)i[c++]=g}this.tooltipPoints=i}},tooltipHeaderFormatter:function(a){var b=this.tooltipOptions,c=b.xDateFormat,d=this.xAxis,e=d&&d.options.type==="datetime",f;if(e&&
!c)for(f in D)if(D[f]>=d.closestPointRange){c=b.dateTimeLabelFormats[f];break}return b.headerFormat.replace("{point.key}",e?cb(c,a):a).replace("{series.name}",this.name).replace("{series.color}",this.color)},onMouseOver:function(){var a=this.chart,b=a.hoverSeries;if(b&&b!==this)b.onMouseOut();this.options.events.mouseOver&&E(this,"mouseOver");this.setState("hover");a.hoverSeries=this},onMouseOut:function(){var a=this.options,b=this.chart,c=b.tooltip,d=b.hoverPoint;if(d)d.onMouseOut();this&&a.events.mouseOut&&
E(this,"mouseOut");c&&!a.stickyTracking&&!c.shared&&c.hide();this.setState();b.hoverSeries=null},animate:function(a){var b=this,c=b.chart,d=c.renderer,e;e=b.options.animation;var f=c.clipBox,g=c.inverted,h;if(e&&!Z(e))e=Y[b.type].animation;h="_sharedClip"+e.duration+e.easing;if(a)a=c[h],e=c[h+"m"],a||(c[h]=a=d.clipRect(s(f,{width:0})),c[h+"m"]=e=d.clipRect(-99,g?-c.plotLeft:-c.plotTop,99,g?c.chartWidth:c.chartHeight)),b.group.clip(a),b.markerGroup.clip(e),b.sharedClipKey=h;else{if(a=c[h])a.animate({width:c.plotSizeX},
e),c[h+"m"].animate({width:c.plotSizeX+99},e);b.animate=null;b.animationTimeout=setTimeout(function(){b.afterAnimate()},e.duration)}},afterAnimate:function(){var a=this.chart,b=this.sharedClipKey,c=this.group;c&&this.options.clip!==!1&&(c.clip(a.clipRect),this.markerGroup.clip());setTimeout(function(){b&&a[b]&&(a[b]=a[b].destroy(),a[b+"m"]=a[b+"m"].destroy())},100)},drawPoints:function(){var a,b=this.points,c=this.chart,d,e,f,g,h,i,j,k,l=this.options.marker,m,o=this.markerGroup;if(l.enabled||this._hasPointMarkers)for(f=
b.length;f--;)if(g=b[f],d=g.plotX,e=g.plotY,k=g.graphic,i=g.marker||{},a=l.enabled&&i.enabled===x||i.enabled,m=c.isInsidePlot(d,e,c.inverted),a&&e!==x&&!isNaN(e))if(a=g.pointAttr[g.selected?"select":""],h=a.r,i=p(i.symbol,this.symbol),j=i.indexOf("url")===0,k)k.attr({visibility:m?fa?"inherit":"visible":"hidden"}).animate(s({x:d-h,y:e-h},k.symbolName?{width:2*h,height:2*h}:{}));else if(m&&(h>0||j))g.graphic=c.renderer.symbol(i,d-h,e-h,2*h,2*h).attr(a).add(o)},convertAttribs:function(a,b,c,d){var e=
this.pointAttrToOptions,f,g,h={},a=a||{},b=b||{},c=c||{},d=d||{};for(f in e)g=e[f],h[f]=p(a[g],b[f],c[f],d[f]);return h},getAttribs:function(){var a=this,b=Y[a.type].marker?a.options.marker:a.options,c=b.states,d=c.hover,e,f=a.color,g={stroke:f,fill:f},h=a.points||[],i=[],j,k=a.pointAttrToOptions,l;a.options.marker?(d.radius=d.radius||b.radius+2,d.lineWidth=d.lineWidth||b.lineWidth+1):d.color=d.color||qa(d.color||f).brighten(d.brightness).get();i[""]=a.convertAttribs(b,g);n(["hover","select"],function(b){i[b]=
a.convertAttribs(c[b],i[""])});a.pointAttr=i;for(f=h.length;f--;){g=h[f];if((b=g.options&&g.options.marker||g.options)&&b.enabled===!1)b.radius=0;e=a.options.colorByPoint;if(g.options)for(l in k)u(b[k[l]])&&(e=!0);if(e){b=b||{};j=[];c=b.states||{};e=c.hover=c.hover||{};if(!a.options.marker)e.color=qa(e.color||g.color).brighten(e.brightness||d.brightness).get();j[""]=a.convertAttribs(s({color:g.color},b),i[""]);j.hover=a.convertAttribs(c.hover,i.hover,j[""]);j.select=a.convertAttribs(c.select,i.select,
j[""])}else j=i;g.pointAttr=j}},destroy:function(){var a=this,b=a.chart,c=/AppleWebKit\/533/.test(Ba),d,e,f=a.data||[],g,h,i;E(a,"destroy");U(a);n(["xAxis","yAxis"],function(b){if(i=a[b])ya(i.series,a),i.isDirty=!0});a.legendItem&&a.chart.legend.destroyItem(a);for(e=f.length;e--;)(g=f[e])&&g.destroy&&g.destroy();a.points=null;clearTimeout(a.animationTimeout);n("area,graph,dataLabelsGroup,group,markerGroup,tracker,trackerGroup".split(","),function(b){a[b]&&(d=c&&b==="group"?"hide":"destroy",a[b][d]())});
if(b.hoverSeries===a)b.hoverSeries=null;ya(b.series,a);for(h in a)delete a[h]},drawDataLabels:function(){var a=this,b=a.options,c=b.dataLabels;if(c.enabled||a._hasPointLabels){var d,e,f=a.points,g,h,i,j,k=a.chart,l=k.renderer,m=k.inverted,o=a.type,r=b.stacking,s=o==="column"||o==="bar",q=c.verticalAlign===null,y=c.y===null,v=l.fontMetrics(c.style.fontSize),A=v.h,w=v.b;s&&(v={top:w,middle:w-A/2,bottom:-A+w},r?(q&&(c=C(c,{verticalAlign:"middle"})),y&&(c=C(c,{y:v[c.verticalAlign]}))):q?c=C(c,{verticalAlign:"top"}):
y&&(c=C(c,{y:v[c.verticalAlign]})));j=a.plotGroup("dataLabelsGroup","data-labels",a.visible?"visible":"hidden",6);h=c;n(f,function(f){var n,q,y,v,B=f.dataLabel;c=h;(g=f.options)&&g.dataLabels&&(c=C(c,g.dataLabels));if(v=c.enabled)n=f.barX&&f.barX+f.barW/2||p(f.plotX,-999),q=p(f.plotY,-999),y=c.y===null?f.y>=b.threshold?-A+w:w:c.y,d=(m?k.plotWidth-q:n)+c.x,e=t((m?k.plotHeight-n:q)+y);a.isCartesian&&!k.isInsidePlot(d-c.x,e)&&(v=!1);if(B&&!v)f.dataLabel=B.destroy();else if(v){n=c.align;var z;i=c.formatter.call(f.getLabelConfig(),
c);o==="column"&&(d+={left:-1,right:1}[n]*f.barW/2||0);!r&&m&&f.y<0&&(n="right",d-=10);c.style.color=p(c.color,c.style.color,a.color,"black");if(B)B.attr({text:i}).animate({x:d,y:e});else if(u(i)){B={align:n,fill:c.backgroundColor,stroke:c.borderColor,"stroke-width":c.borderWidth,r:c.borderRadius||0,rotation:c.rotation,padding:c.padding,zIndex:1};for(z in B)B[z]===x&&delete B[z];B=f.dataLabel=l[c.rotation?"text":"label"](i,d,e,null,null,null,c.useHTML,!0).attr(B).css(c.style).add(j).shadow(c.shadow)}if(s&&
b.stacking&&B)z=f.barX,n=f.barY,q=f.barW,f=f.barH,B.align(c,null,{x:m?k.plotWidth-n-f:z,y:m?k.plotHeight-z-q:n,width:m?f:q,height:m?q:f})}})}},getSegmentPath:function(a){var b=this,c=[];n(a,function(d,e){b.getPointSpline?c.push.apply(c,b.getPointSpline(a,d,e)):(c.push(e?"L":"M"),e&&b.options.step&&c.push(d.plotX,a[e-1].plotY),c.push(d.plotX,d.plotY))});return c},getGraphPath:function(){var a=this,b=[],c,d=[];n(a.segments,function(e){c=a.getSegmentPath(e);e.length>1?b=b.concat(c):d.push(e[0])});a.singlePoints=
d;return a.graphPath=b},drawGraph:function(){var a=this.options,b=this.graph,c=this.group,d=a.lineColor||this.color,e=a.lineWidth,f=a.dashStyle,g=this.getGraphPath();if(b)eb(b),b.animate({d:g});else if(e){b={stroke:d,"stroke-width":e,zIndex:1};if(f)b.dashstyle=f;this.graph=this.chart.renderer.path(g).attr(b).add(c).shadow(a.shadow)}},invertGroups:function(){function a(){var a={width:b.yAxis.len,height:b.xAxis.len};n(["group","trackerGroup","markerGroup"],function(c){b[c]&&b[c].attr(a).invert()})}
var b=this,c=b.chart;H(c,"resize",a);H(b,"destroy",function(){U(c,"resize",a)});a();b.invertGroups=a},plotGroup:function(a,b,c,d,e){var f=this[a],g=this.chart,h=this.xAxis,i=this.yAxis;f||(this[a]=f=g.renderer.g(b).attr({visibility:c,zIndex:d||0.1}).add(e));f.translate(h?h.left:g.plotLeft,i?i.top:g.plotTop);return f},render:function(){var a=this.chart,b,c=this.options,d=c.animation&&!!this.animate,e=this.visible?"visible":"hidden",f=c.zIndex,g=this.hasRendered,h=a.seriesGroup;b=this.plotGroup("group",
"series",e,f,h);this.markerGroup=this.plotGroup("markerGroup","markers",e,f,h);this.drawDataLabels();d&&this.animate(!0);this.getAttribs();b.inverted=a.inverted;this.drawGraph&&this.drawGraph();this.drawPoints();this.options.enableMouseTracking!==!1&&this.drawTracker();a.inverted&&this.invertGroups();c.clip!==!1&&!this.sharedClipKey&&!g&&(b.clip(a.clipRect),this.trackerGroup&&this.trackerGroup.clip(a.clipRect));d?this.animate():g||this.afterAnimate();this.isDirty=this.isDirtyData=!1;this.hasRendered=
!0},redraw:function(){var a=this.chart,b=this.isDirtyData,c=this.group;c&&(a.inverted&&c.attr({width:a.plotWidth,height:a.plotHeight}),c.animate({translateX:this.xAxis.left,translateY:this.yAxis.top}));this.translate();this.setTooltipPoints(!0);this.render();b&&E(this,"updatedData")},setState:function(a){var b=this.options,c=this.graph,d=b.states,b=b.lineWidth,a=a||"";if(this.state!==a)this.state=a,d[a]&&d[a].enabled===!1||(a&&(b=d[a].lineWidth||b+1),c&&!c.dashstyle&&c.attr({"stroke-width":b},a?0:
500))},setVisible:function(a,b){var c=this.chart,d=this.legendItem,e=this.group,f=this.tracker,g=this.dataLabelsGroup,h=this.markerGroup,i,j=this.points,k=c.options.chart.ignoreHiddenSeries;i=this.visible;i=(this.visible=a=a===x?!i:a)?"show":"hide";if(e)e[i]();if(h)h[i]();if(f)f[i]();else if(j)for(e=j.length;e--;)if(f=j[e],f.tracker)f.tracker[i]();if(g)g[i]();d&&c.legend.colorizeItem(this,a);this.isDirty=!0;this.options.stacking&&n(c.series,function(a){if(a.options.stacking&&a.visible)a.isDirty=!0});
if(k)c.isDirtyBox=!0;b!==!1&&c.redraw();E(this,i)},show:function(){this.setVisible(!0)},hide:function(){this.setVisible(!1)},select:function(a){this.selected=a=a===x?!this.selected:a;if(this.checkbox)this.checkbox.checked=a;E(this,a?"select":"unselect")},drawTracker:function(){var a=this,b=a.options,c=b.trackByArea,d=[].concat(c?a.areaPath:a.graphPath),e=d.length,f=a.chart,g=f.renderer,h=f.options.tooltip.snap,i=a.tracker,j=b.cursor,j=j&&{cursor:j},k=a.singlePoints,l=this.isCartesian&&this.plotGroup("trackerGroup",
null,"visible",b.zIndex||1,f.trackerGroup),m;if(e&&!c)for(m=e+1;m--;)d[m]==="M"&&d.splice(m+1,0,d[m+1]-h,d[m+2],"L"),(m&&d[m]==="M"||m===e)&&d.splice(m,0,"L",d[m-2]+h,d[m-1]);for(m=0;m<k.length;m++)e=k[m],d.push("M",e.plotX-h,e.plotY,"L",e.plotX+h,e.plotY);i?i.attr({d:d}):a.tracker=g.path(d).attr({isTracker:!0,"stroke-linejoin":"bevel",visibility:a.visible?"visible":"hidden",stroke:wb,fill:c?wb:T,"stroke-width":b.lineWidth+(c?0:2*h)}).on(ga?"touchstart":"mouseover",function(){if(f.hoverSeries!==a)a.onMouseOver()}).on("mouseout",
function(){if(!b.stickyTracking)a.onMouseOut()}).css(j).add(l)}};F=da(R);ba.line=F;Y.area=C(X,{threshold:0});F=da(R,{type:"area",getSegmentPath:function(a){var b=R.prototype.getSegmentPath.call(this,a),c=[].concat(b),d,e=this.options;b.length===3&&c.push("L",b[1],b[2]);if(e.stacking&&!this.closedStacks)for(d=a.length-1;d>=0;d--)d<a.length-1&&e.step&&c.push(a[d+1].plotX,a[d].yBottom),c.push(a[d].plotX,a[d].yBottom);else this.closeSegment(c,a);this.areaPath=this.areaPath.concat(c);return b},closeSegment:function(a,
b){var c=this.yAxis.getThreshold(this.options.threshold);a.push("L",b[b.length-1].plotX,c,"L",b[0].plotX,c)},drawGraph:function(){this.areaPath=[];R.prototype.drawGraph.apply(this);var a=this.areaPath,b=this.options,c=this.area;c?c.animate({d:a}):this.area=this.chart.renderer.path(a).attr({fill:p(b.fillColor,qa(this.color).setOpacity(b.fillOpacity||0.75).get()),zIndex:0}).add(this.group)},drawLegendSymbol:function(a,b){b.legendSymbol=this.chart.renderer.rect(0,a.baseline-11,a.options.symbolWidth,
12,2).attr({zIndex:3}).add(b.legendGroup)}});ba.area=F;Y.spline=C(X);ha=da(R,{type:"spline",getPointSpline:function(a,b,c){var d=b.plotX,e=b.plotY,f=a[c-1],g=a[c+1],h,i,j,k;if(f&&g){a=f.plotY;j=g.plotX;var g=g.plotY,l;h=(1.5*d+f.plotX)/2.5;i=(1.5*e+a)/2.5;j=(1.5*d+j)/2.5;k=(1.5*e+g)/2.5;l=(k-i)*(j-d)/(j-h)+e-k;i+=l;k+=l;i>a&&i>e?(i=v(a,e),k=2*e-i):i<a&&i<e&&(i=P(a,e),k=2*e-i);k>g&&k>e?(k=v(g,e),i=2*e-k):k<g&&k<e&&(k=P(g,e),i=2*e-k);b.rightContX=j;b.rightContY=k}c?(b=["C",f.rightContX||f.plotX,f.rightContY||
f.plotY,h||d,i||e,d,e],f.rightContX=f.rightContY=null):b=["M",d,e];return b}});ba.spline=ha;Y.areaspline=C(Y.area);var yb=F.prototype,ha=da(ha,{type:"areaspline",closedStacks:!0,getSegmentPath:yb.getSegmentPath,closeSegment:yb.closeSegment,drawGraph:yb.drawGraph});ba.areaspline=ha;Y.column=C(X,{borderColor:"#FFFFFF",borderWidth:1,borderRadius:0,groupPadding:0.2,marker:null,pointPadding:0.1,minPointLength:0,cropThreshold:50,pointRange:null,states:{hover:{brightness:0.1,shadow:!1},select:{color:"#C0C0C0",
borderColor:"#000000",shadow:!1}},dataLabels:{y:null,verticalAlign:null},threshold:0});Ca=da(R,{type:"column",tooltipOutsidePlot:!0,pointAttrToOptions:{stroke:"borderColor","stroke-width":"borderWidth",fill:"color",r:"borderRadius"},init:function(){R.prototype.init.apply(this,arguments);var a=this,b=a.chart;b.hasRendered&&n(b.series,function(b){if(b.type===a.type)b.isDirty=!0})},translate:function(){var a=this,b=a.chart,c=a.options,d=c.stacking,e=c.borderWidth,f=0,g=a.xAxis,h=g.reversed,i={},j,k;
R.prototype.translate.apply(a);c.grouping===!1?f=1:n(b.series,function(b){var c=b.options;if(b.type===a.type&&b.visible&&a.options.group===c.group)c.stacking?(j=b.stackKey,i[j]===x&&(i[j]=f++),k=i[j]):c.grouping!==!1&&(k=f++),b.columnIndex=k});var l=a.points,g=N(g.transA)*(g.ordinalSlope||c.pointRange||g.closestPointRange||1),m=g*c.groupPadding,o=(g-2*m)/f,r=c.pointWidth,t=u(r)?(o-r)/2:o*c.pointPadding,q=p(r,o-2*t),y=wa(v(q,1+2*e)),B=t+(m+((h?f-a.columnIndex:a.columnIndex)||0)*o-g/2)*(h?-1:1),A=a.yAxis.getThreshold(c.threshold),
w=p(c.minPointLength,5);n(l,function(c){var f=c.plotY,g=p(c.yBottom,A),h=c.plotX+B,i=wa(P(f,g)),j=wa(v(f,g)-i),k=a.yAxis.stacks[(c.y<0?"-":"")+a.stackKey];d&&a.visible&&k&&k[c.x]&&k[c.x].setOffset(B,y);N(j)<w&&w&&(j=w,i=N(i-A)>w?g-w:A-(f<=A?w:0));s(c,{barX:h,barY:i,barW:y,barH:j,pointWidth:q});c.shapeType="rect";c.shapeArgs=f=b.renderer.Element.prototype.crisp.call(0,e,h,i,y,j);e%2&&(f.y-=1,f.height+=1);c.trackerArgs=N(j)<3&&C(c.shapeArgs,{height:6,y:i-3})})},getSymbol:Ca,drawLegendSymbol:F.prototype.drawLegendSymbol,
drawGraph:Ca,drawPoints:function(){var a=this,b=a.options,c=a.chart.renderer,d,e;n(a.points,function(f){var g=f.plotY;if(g!==x&&!isNaN(g)&&f.y!==null)d=f.graphic,e=f.shapeArgs,d?(eb(d),d.animate(C(e))):f.graphic=d=c[f.shapeType](e).attr(f.pointAttr[f.selected?"select":""]).add(a.group).shadow(b.shadow,null,b.stacking&&!b.borderRadius)})},drawTracker:function(){var a=this,b=a.chart,c=b.renderer,d,e,f=+new Date,g=a.options,h=g.cursor,i=h&&{cursor:h},j=a.isCartesian&&a.plotGroup("trackerGroup",null,
"visible",g.zIndex||1,b.trackerGroup),k,l,m;n(a.points,function(h){e=h.tracker;d=h.trackerArgs||h.shapeArgs;l=h.plotY;m=!a.isCartesian||l!==x&&!isNaN(l);delete d.strokeWidth;if(h.y!==null&&m)e?e.attr(d):h.tracker=c[h.shapeType](d).attr({isTracker:f,fill:wb,visibility:a.visible?"visible":"hidden"}).on(ga?"touchstart":"mouseover",function(c){k=c.relatedTarget||c.fromElement;if(b.hoverSeries!==a&&B(k,"isTracker")!==f)a.onMouseOver();h.onMouseOver()}).on("mouseout",function(b){if(!g.stickyTracking&&(k=
b.relatedTarget||b.toElement,B(k,"isTracker")!==f))a.onMouseOut()}).css(i).add(h.group||j)})},animate:function(a){var b=this,c=b.points,d=b.options;if(!a)n(c,function(a){var c=a.graphic,a=a.shapeArgs,g=b.yAxis,h=d.threshold;c&&(c.attr({height:0,y:u(h)?g.getThreshold(h):g.translate(g.getExtremes().min,0,1,0,1)}),c.animate({height:a.height,y:a.y},d.animation))}),b.animate=null},remove:function(){var a=this,b=a.chart;b.hasRendered&&n(b.series,function(b){if(b.type===a.type)b.isDirty=!0});R.prototype.remove.apply(a,
arguments)}});ba.column=Ca;Y.bar=C(Y.column,{dataLabels:{align:"left",x:5,y:null,verticalAlign:"middle"}});ha=da(Ca,{type:"bar",inverted:!0});ba.bar=ha;Y.scatter=C(X,{lineWidth:0,states:{hover:{lineWidth:0}},tooltip:{headerFormat:'<span style="font-size: 10px; color:{series.color}">{series.name}</span><br/>',pointFormat:"x: <b>{point.x}</b><br/>y: <b>{point.y}</b><br/>"}});ha=da(R,{type:"scatter",sorted:!1,translate:function(){var a=this;R.prototype.translate.apply(a);n(a.points,function(b){b.shapeType=
"circle";b.shapeArgs={x:b.plotX,y:b.plotY,r:a.chart.options.tooltip.snap}})},drawTracker:function(){for(var a=this,b=a.options.cursor,b=b&&{cursor:b},c=a.points,d=c.length,e;d--;)if(e=c[d].graphic)e.element._i=d;a._hasTracking?a._hasTracking=!0:a.markerGroup.attr({isTracker:!0}).on(ga?"touchstart":"mouseover",function(b){a.onMouseOver();if(b.target._i!==x)c[b.target._i].onMouseOver()}).on("mouseout",function(){if(!a.options.stickyTracking)a.onMouseOut()}).css(b)}});ba.scatter=ha;Y.pie=C(X,{borderColor:"#FFFFFF",
borderWidth:1,center:["50%","50%"],colorByPoint:!0,dataLabels:{distance:30,enabled:!0,formatter:function(){return this.point.name},y:5},legendType:"point",marker:null,size:"75%",showInLegend:!1,slicedOffset:10,states:{hover:{brightness:0.1,shadow:!1}}});X={type:"pie",isCartesian:!1,pointClass:da(Ta,{init:function(){Ta.prototype.init.apply(this,arguments);var a=this,b;s(a,{visible:a.visible!==!1,name:p(a.name,"Slice")});b=function(){a.slice()};H(a,"select",b);H(a,"unselect",b);return a},setVisible:function(a){var b=
this.series,c=b.chart,d=this.tracker,e=this.dataLabel,f=this.connector,g=this.shadowGroup,h;h=(this.visible=a=a===x?!this.visible:a)?"show":"hide";this.group[h]();if(d)d[h]();if(e)e[h]();if(f)f[h]();if(g)g[h]();this.legendItem&&c.legend.colorizeItem(this,a);if(!b.isDirty&&b.options.ignoreHiddenPoint)b.isDirty=!0,c.redraw()},slice:function(a,b,c){var d=this.series.chart,e=this.slicedTranslation;ua(c,d);p(b,!0);a=this.sliced=u(a)?a:!this.sliced;a={translateX:a?e[0]:d.plotLeft,translateY:a?e[1]:d.plotTop};
this.group.animate(a);this.shadowGroup&&this.shadowGroup.animate(a)}}),pointAttrToOptions:{stroke:"borderColor","stroke-width":"borderWidth",fill:"color"},getColor:function(){this.initialColor=this.chart.counters.color},animate:function(){var a=this;n(a.points,function(b){var c=b.graphic,b=b.shapeArgs,d=-xa/2;c&&(c.attr({r:0,start:d,end:d}),c.animate({r:b.r,start:b.start,end:b.end},a.options.animation))});a.animate=null},setData:function(a,b){R.prototype.setData.call(this,a,!1);this.processData();
this.generatePoints();p(b,!0)&&this.chart.redraw()},getCenter:function(){var a=this.options,b=this.chart,c=b.plotWidth,d=b.plotHeight,a=a.center.concat([a.size,a.innerSize||0]),e=P(c,d),f;return Sa(a,function(a,b){return(f=/%$/.test(a))?[c,d,e,e][b]*A(a)/100:a})},translate:function(){this.generatePoints();var a=0,b=-0.25,c=this.options,d=c.slicedOffset,e=d+c.borderWidth,f,g=this.chart,h,i,j,k=this.points,l=2*xa,m,o,p,s=c.dataLabels.distance,q=c.ignoreHiddenPoint;this.center=f=this.getCenter();this.getX=
function(a,b){j=K.asin((a-f[1])/(f[2]/2+s));return f[0]+(b?-1:1)*W(j)*(f[2]/2+s)};n(k,function(b){a+=q&&!b.visible?0:b.y});n(k,function(c){m=a?c.y/a:0;h=t(b*l*1E3)/1E3;if(!q||c.visible)b+=m;i=t(b*l*1E3)/1E3;c.shapeType="arc";c.shapeArgs={x:f[0],y:f[1],r:f[2]/2,innerR:f[3]/2,start:h,end:i};j=(i+h)/2;c.slicedTranslation=Sa([W(j)*d+g.plotLeft,aa(j)*d+g.plotTop],t);o=W(j)*f[2]/2;p=aa(j)*f[2]/2;c.tooltipPos=[f[0]+o*0.7,f[1]+p*0.7];c.labelPos=[f[0]+o+W(j)*s,f[1]+p+aa(j)*s,f[0]+o+W(j)*e,f[1]+p+aa(j)*e,f[0]+
o,f[1]+p,s<0?"center":j<l/4?"left":"right",j];c.percentage=m*100;c.total=a});this.setTooltipPoints()},render:function(){this.getAttribs();this.drawPoints();this.options.enableMouseTracking!==!1&&this.drawTracker();this.drawDataLabels();this.options.animation&&this.animate&&this.animate();this.isDirty=!1},drawPoints:function(){var a=this,b=a.chart,c=b.renderer,d,e,f,g=a.options.shadow,h,i;n(a.points,function(j){e=j.graphic;i=j.shapeArgs;f=j.group;h=j.shadowGroup;if(g&&!h)h=j.shadowGroup=c.g("shadow").attr({zIndex:4}).add();
if(!f)f=j.group=c.g("point").attr({zIndex:5}).add();d=j.sliced?j.slicedTranslation:[b.plotLeft,b.plotTop];f.translate(d[0],d[1]);h&&h.translate(d[0],d[1]);e?e.animate(i):j.graphic=e=c.arc(i).setRadialReference(a.center).attr(s(j.pointAttr[""],{"stroke-linejoin":"round"})).add(j.group).shadow(g,h);j.visible===!1&&j.setVisible(!1)})},drawDataLabels:function(){var a=this.data,b,c=this.chart,d=this.options.dataLabels,e=p(d.connectorPadding,10),f=p(d.connectorWidth,1),g,h,i=p(d.softConnector,!0),j=d.distance,
k=this.center,l=k[2]/2,m=k[1],o=j>0,r=[[],[]],s,q,t,u,v=2,w;if(d.enabled||this._hasPointLabels){R.prototype.drawDataLabels.apply(this);n(a,function(a){a.dataLabel&&r[a.labelPos[7]<xa/2?0:1].push(a)});r[1].reverse();u=function(a,b){return b.y-a.y};for(a=r[0][0]&&r[0][0].dataLabel&&(r[0][0].dataLabel.getBBox().height||21);v--;){var x=[],B=[],A=r[v],C=A.length,z;if(j>0){for(w=m-l-j;w<=m+l+j;w+=a)x.push(w);t=x.length;if(C>t){h=[].concat(A);h.sort(u);for(w=C;w--;)h[w].rank=w;for(w=C;w--;)A[w].rank>=t&&
A.splice(w,1);C=A.length}for(w=0;w<C;w++){b=A[w];h=b.labelPos;b=9999;for(q=0;q<t;q++)g=N(x[q]-h[1]),g<b&&(b=g,z=q);if(z<w&&x[w]!==null)z=w;else for(t<C-w+z&&x[w]!==null&&(z=t-C+w);x[z]===null;)z++;B.push({i:z,y:x[z]});x[z]=null}B.sort(u)}for(w=0;w<C;w++){b=A[w];h=b.labelPos;g=b.dataLabel;t=b.visible===!1?"hidden":"visible";s=h[1];if(j>0){if(q=B.pop(),z=q.i,q=q.y,s>q&&x[z+1]!==null||s<q&&x[z-1]!==null)q=s}else q=s;s=d.justify?k[0]+(v?-1:1)*(l+j):this.getX(z===0||z===x.length-1?s:q,v);g.attr({visibility:t,
align:h[6]})[g.moved?"animate":"attr"]({x:s+d.x+({left:e,right:-e}[h[6]]||0),y:q+d.y});g.moved=!0;if(o&&f)g=b.connector,h=i?["M",s+(h[6]==="left"?5:-5),q,"C",s,q,2*h[2]-h[4],2*h[3]-h[5],h[2],h[3],"L",h[4],h[5]]:["M",s+(h[6]==="left"?5:-5),q,"L",h[2],h[3],"L",h[4],h[5]],g?(g.animate({d:h}),g.attr("visibility",t)):b.connector=g=this.chart.renderer.path(h).attr({"stroke-width":f,stroke:d.connectorColor||b.color||"#606060",visibility:t,zIndex:3}).translate(c.plotLeft,c.plotTop).add()}}}},drawTracker:Ca.prototype.drawTracker,
drawLegendSymbol:F.prototype.drawLegendSymbol,getSymbol:function(){}};X=da(R,X);ba.pie=X;s(Highcharts,{Axis:ob,CanVGRenderer:gb,Chart:sb,Color:qa,Legend:rb,MouseTracker:qb,Point:Ta,Tick:Pa,Tooltip:pb,Renderer:Ra,Series:R,SVGRenderer:ra,VMLRenderer:ka,dateFormat:cb,pathAnim:vb,getOptions:function(){return O},hasBidiBug:Pb,numberFormat:Ia,seriesTypes:ba,setOptions:function(a){O=C(O,a);Gb();return O},addEvent:H,removeEvent:U,createElement:S,discardElement:Na,css:G,each:n,extend:s,map:Sa,merge:C,pick:p,
splat:oa,extendClass:da,pInt:A,wrap:function(a,b,c){var d=a[b];a[b]=function(){var a=Array.prototype.slice.call(arguments);a.unshift(d);return c.apply(this,a)}},svg:fa,canvas:$,vml:!fa&&!$,product:"Highcharts",version:"2.3.2"})})();

if (!hs) { var hs = {
// Language strings
lang : {
	cssDirection: 'ltr',
	loadingText : 'Loading...',
	loadingTitle : 'Click to cancel',
	focusTitle : 'Click to bring to front',
	fullExpandTitle : 'Expand to actual size (f)',
	creditsText : 'Powered by <i>Highslide JS</i>',
	creditsTitle : 'Go to the Highslide JS homepage',
	previousText : 'Previous',
	nextText : 'Next', 
	moveText : 'Move',
	closeText : 'Close', 
	closeTitle : 'Close (esc)', 
	resizeTitle : 'Resize',
	playText : 'Play',
	playTitle : 'Play slideshow (spacebar)',
	pauseText : 'Pause',
	pauseTitle : 'Pause slideshow (spacebar)',
	previousTitle : 'Previous (arrow left)',
	nextTitle : 'Next (arrow right)',
	moveTitle : 'Move',
	fullExpandText : '1:1',
	number: 'Image %1 of %2',
	restoreTitle : 'Click to close image, click and drag to move. Use arrow keys for next and previous.'
},
// See http://highslide.com/ref for examples of settings  
graphicsDir : 'highslide/graphics/',
expandCursor : 'zoomin.cur', // null disables
restoreCursor : 'zoomout.cur', // null disables
expandDuration : 250, // milliseconds
restoreDuration : 250,
marginLeft : 15,
marginRight : 15,
marginTop : 15,
marginBottom : 15,
zIndexCounter : 1001, // adjust to other absolutely positioned elements
loadingOpacity : 0.75,
allowMultipleInstances: true,
numberOfImagesToPreload : 5,
outlineWhileAnimating : 2, // 0 = never, 1 = always, 2 = HTML only 
outlineStartOffset : 3, // ends at 10
padToMinWidth : false, // pad the popup width to make room for wide caption
fullExpandPosition : 'bottom right',
fullExpandOpacity : 1,
showCredits : true, // you can set this to false if you want
creditsHref : 'http://highslide.com/',
creditsTarget : '_self',
enableKeyListener : true,
openerTagNames : ['a', 'area'], // Add more to allow slideshow indexing
transitions : [],
transitionDuration: 250,
dimmingOpacity: 0, // Lightbox style dimming background
dimmingDuration: 50, // 0 for instant dimming

allowWidthReduction : false,
allowHeightReduction : true,
preserveContent : true, // Preserve changes made to the content and position of HTML popups.
objectLoadTime : 'before', // Load iframes 'before' or 'after' expansion.
cacheAjax : true, // Cache ajax popups for instant display. Can be overridden for each popup.
anchor : 'auto', // where the image expands from
align : 'auto', // position in the client (overrides anchor)
targetX: null, // the id of a target element
targetY: null,
dragByHeading: true,
minWidth: 200,
minHeight: 200,
allowSizeReduction: true, // allow the image to reduce to fit client size. If false, this overrides minWidth and minHeight
outlineType : 'drop-shadow', // set null to disable outlines
skin : {
	controls:
		'<div class="highslide-controls"><ul>'+
			'<li class="highslide-previous">'+
				'<a href="#" title="{hs.lang.previousTitle}">'+
				'<span>{hs.lang.previousText}</span></a>'+
			'</li>'+
			'<li class="highslide-play">'+
				'<a href="#" title="{hs.lang.playTitle}">'+
				'<span>{hs.lang.playText}</span></a>'+
			'</li>'+
			'<li class="highslide-pause">'+
				'<a href="#" title="{hs.lang.pauseTitle}">'+
				'<span>{hs.lang.pauseText}</span></a>'+
			'</li>'+
			'<li class="highslide-next">'+
				'<a href="#" title="{hs.lang.nextTitle}">'+
				'<span>{hs.lang.nextText}</span></a>'+
			'</li>'+
			'<li class="highslide-move">'+
				'<a href="#" title="{hs.lang.moveTitle}">'+
				'<span>{hs.lang.moveText}</span></a>'+
			'</li>'+
			'<li class="highslide-full-expand">'+
				'<a href="#" title="{hs.lang.fullExpandTitle}">'+
				'<span>{hs.lang.fullExpandText}</span></a>'+
			'</li>'+
			'<li class="highslide-close">'+
				'<a href="#" title="{hs.lang.closeTitle}" >'+
				'<span>{hs.lang.closeText}</span></a>'+
			'</li>'+
		'</ul></div>'
	,
	contentWrapper:
		'<div class="highslide-header"><ul>'+
			'<li class="highslide-previous">'+
				'<a href="#" title="{hs.lang.previousTitle}" onclick="return hs.previous(this)">'+
				'<span>{hs.lang.previousText}</span></a>'+
			'</li>'+
			'<li class="highslide-next">'+
				'<a href="#" title="{hs.lang.nextTitle}" onclick="return hs.next(this)">'+
				'<span>{hs.lang.nextText}</span></a>'+
			'</li>'+
			'<li class="highslide-move">'+
				'<a href="#" title="{hs.lang.moveTitle}" onclick="return false">'+
				'<span>{hs.lang.moveText}</span></a>'+
			'</li>'+
			'<li class="highslide-close">'+
				'<a href="#" title="{hs.lang.closeTitle}" onclick="return hs.close(this)">'+
				'<span>{hs.lang.closeText}</span></a>'+
			'</li>'+
		'</ul></div>'+
		'<div class="highslide-body"></div>'+
		'<div class="highslide-footer"><div>'+
			'<span class="highslide-resize" title="{hs.lang.resizeTitle}"><span></span></span>'+
		'</div></div>'
},
// END OF YOUR SETTINGS


// declare internal properties
preloadTheseImages : [],
continuePreloading: true,
expanders : [],
overrides : [
	'allowSizeReduction',
	'useBox',
	'anchor',
	'align',
	'targetX',
	'targetY',
	'outlineType',
	'outlineWhileAnimating',
	'captionId',
	'captionText',
	'captionEval',
	'captionOverlay',
	'headingId',
	'headingText',
	'headingEval',
	'headingOverlay',
	'creditsPosition',
	'dragByHeading',
	'autoplay',
	'numberPosition',
	'transitions',
	'dimmingOpacity',
	
	'width',
	'height',
	
	'contentId',
	'allowWidthReduction',
	'allowHeightReduction',
	'preserveContent',
	'maincontentId',
	'maincontentText',
	'maincontentEval',
	'objectType',	
	'cacheAjax',	
	'objectWidth',
	'objectHeight',
	'objectLoadTime',	
	'swfOptions',
	'wrapperClassName',
	'minWidth',
	'minHeight',
	'maxWidth',
	'maxHeight',
	'pageOrigin',
	'slideshowGroup',
	'easing',
	'easingClose',
	'fadeInOut',
	'src'
],
overlays : [],
idCounter : 0,
oPos : {
	x: ['leftpanel', 'left', 'center', 'right', 'rightpanel'],
	y: ['above', 'top', 'middle', 'bottom', 'below']
},
mouse: {},
headingOverlay: {},
captionOverlay: {},
swfOptions: { flashvars: {}, params: {}, attributes: {} },
timers : [],

slideshows : [],

pendingOutlines : {},
sleeping : [],
preloadTheseAjax : [],
cacheBindings : [],
cachedGets : {},
clones : {},
onReady: [],
uaVersion: /Trident\/4\.0/.test(navigator.userAgent) ? 8 :
	parseFloat((navigator.userAgent.toLowerCase().match( /.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/ ) || [0,'0'])[1]),
ie : (document.all && !window.opera),
safari : /Safari/.test(navigator.userAgent),
geckoMac : /Macintosh.+rv:1\.[0-8].+Gecko/.test(navigator.userAgent),

$ : function (id) {
	if (id) return document.getElementById(id);
},

push : function (arr, val) {
	arr[arr.length] = val;
},

createElement : function (tag, attribs, styles, parent, nopad) {
	var el = document.createElement(tag);
	if (attribs) hs.extend(el, attribs);
	if (nopad) hs.setStyles(el, {padding: 0, border: 'none', margin: 0});
	if (styles) hs.setStyles(el, styles);
	if (parent) parent.appendChild(el);	
	return el;
},

extend : function (el, attribs) {
	for (var x in attribs) el[x] = attribs[x];
	return el;
},

setStyles : function (el, styles) {
	for (var x in styles) {
		if (hs.ie && x == 'opacity') {
			if (styles[x] > 0.99) el.style.removeAttribute('filter');
			else el.style.filter = 'alpha(opacity='+ (styles[x] * 100) +')';
		}
		else el.style[x] = styles[x];
	}
},
animate: function(el, prop, opt) {
	var start,
		end,
		unit;
	if (typeof opt != 'object' || opt === null) {
		var args = arguments;
		opt = {
			duration: args[2],
			easing: args[3],
			complete: args[4]
		};
	}
	if (typeof opt.duration != 'number') opt.duration = 250;
	opt.easing = Math[opt.easing] || Math.easeInQuad;
	opt.curAnim = hs.extend({}, prop);
	for (var name in prop) {
		var e = new hs.fx(el, opt , name );
		
		start = parseFloat(hs.css(el, name)) || 0;
		end = parseFloat(prop[name]);
		unit = name != 'opacity' ? 'px' : '';
		
		e.custom( start, end, unit );
	}	
},
css: function(el, prop) {
	if (el.style[prop]) {
		return el.style[prop];
	} else if (document.defaultView) {
		return document.defaultView.getComputedStyle(el, null).getPropertyValue(prop);

	} else {
		if (prop == 'opacity') prop = 'filter';
		var val = el.currentStyle[prop.replace(/\-(\w)/g, function (a, b){ return b.toUpperCase(); })];
		if (prop == 'filter') 
			val = val.replace(/alpha\(opacity=([0-9]+)\)/, 
				function (a, b) { return b / 100 });
		return val === '' ? 1 : val;
	} 
},

getPageSize : function () {
	var d = document, w = window, iebody = d.compatMode && d.compatMode != 'BackCompat' 
		? d.documentElement : d.body;
	
	var width = hs.ie ? iebody.clientWidth : 
			(d.documentElement.clientWidth || self.innerWidth),
		height = hs.ie ? iebody.clientHeight : self.innerHeight;
	
	hs.page = {
		width: width,
		height: height,		
		scrollLeft: hs.ie ? iebody.scrollLeft : pageXOffset,
		scrollTop: hs.ie ? iebody.scrollTop : pageYOffset
	};
	return hs.page;
},

getPosition : function(el)	{
	if (/area/i.test(el.tagName)) {
		var imgs = document.getElementsByTagName('img');
		for (var i = 0; i < imgs.length; i++) {
			var u = imgs[i].useMap;
			if (u && u.replace(/^.*?#/, '') == el.parentNode.name) {
				el = imgs[i];
				break;
			}
		}
	}
	var p = { x: el.offsetLeft, y: el.offsetTop };
	while (el.offsetParent)	{
		el = el.offsetParent;
		p.x += el.offsetLeft;
		p.y += el.offsetTop;
		if (el != document.body && el != document.documentElement) {
			p.x -= el.scrollLeft;
			p.y -= el.scrollTop;
		}
	}
	return p;
},

expand : function(a, params, custom, type) {
	if (!a) a = hs.createElement('a', null, { display: 'none' }, hs.container);
	if (typeof a.getParams == 'function') return params;
	if (type == 'html') {
		for (var i = 0; i < hs.sleeping.length; i++) {
			if (hs.sleeping[i] && hs.sleeping[i].a == a) {
				hs.sleeping[i].awake();
				hs.sleeping[i] = null;
				return false;
			}
		}
		hs.hasHtmlExpanders = true;
	}	
	try {	
		new hs.Expander(a, params, custom, type);
		return false;
	} catch (e) { return true; }
},

htmlExpand : function(a, params, custom) {
	return hs.expand(a, params, custom, 'html');
},

getSelfRendered : function() {
	return hs.createElement('div', { 
		className: 'highslide-html-content', 
		innerHTML: hs.replaceLang(hs.skin.contentWrapper) 
	});
},
getElementByClass : function (el, tagName, className) {
	var els = el.getElementsByTagName(tagName);
	for (var i = 0; i < els.length; i++) {
    	if ((new RegExp(className)).test(els[i].className)) {
			return els[i];
		}
	}
	return null;
},
replaceLang : function(s) {
	s = s.replace(/\s/g, ' ');
	var re = /{hs\.lang\.([^}]+)\}/g,
		matches = s.match(re),
		lang;
	if (matches) for (var i = 0; i < matches.length; i++) {
		lang = matches[i].replace(re, "$1");
		if (typeof hs.lang[lang] != 'undefined') s = s.replace(matches[i], hs.lang[lang]);
	}
	return s;
},


setClickEvents : function () {
	var els = document.getElementsByTagName('a');
	for (var i = 0; i < els.length; i++) {
		var type = hs.isUnobtrusiveAnchor(els[i]);
		if (type && !els[i].hsHasSetClick) {
			(function(){
				var t = type;
				if (hs.fireEvent(hs, 'onSetClickEvent', { element: els[i], type: t })) {
					els[i].onclick =(type == 'image') ?function() { return hs.expand(this) }:
						function() { return hs.htmlExpand(this, { objectType: t } );};
				}
			})();
			els[i].hsHasSetClick = true;	
		}
	}
	hs.getAnchors();
},
isUnobtrusiveAnchor: function(el) {
	if (el.rel == 'highslide') return 'image';
	else if (el.rel == 'highslide-ajax') return 'ajax';
	else if (el.rel == 'highslide-iframe') return 'iframe';
	else if (el.rel == 'highslide-swf') return 'swf';
},

getCacheBinding : function (a) {
	for (var i = 0; i < hs.cacheBindings.length; i++) {
		if (hs.cacheBindings[i][0] == a) {
			var c = hs.cacheBindings[i][1];
			hs.cacheBindings[i][1] = c.cloneNode(1);
			return c;
		}
	}
	return null;
},

preloadAjax : function (e) {
	var arr = hs.getAnchors();
	for (var i = 0; i < arr.htmls.length; i++) {
		var a = arr.htmls[i];
		if (hs.getParam(a, 'objectType') == 'ajax' && hs.getParam(a, 'cacheAjax'))
			hs.push(hs.preloadTheseAjax, a);
	}
	
	hs.preloadAjaxElement(0);
},

preloadAjaxElement : function (i) {
	if (!hs.preloadTheseAjax[i]) return;
	var a = hs.preloadTheseAjax[i];
	var cache = hs.getNode(hs.getParam(a, 'contentId'));
	if (!cache) cache = hs.getSelfRendered();
	var ajax = new hs.Ajax(a, cache, 1);	
   	ajax.onError = function () { };
   	ajax.onLoad = function () {
   		hs.push(hs.cacheBindings, [a, cache]);
   		hs.preloadAjaxElement(i + 1);
   	};
   	ajax.run();
},

focusTopmost : function() {
	var topZ = 0, 
		topmostKey = -1,
		expanders = hs.expanders,
		exp,
		zIndex;
	for (var i = 0; i < expanders.length; i++) {
		exp = expanders[i];
		if (exp) {
			zIndex = exp.wrapper.style.zIndex;
			if (zIndex && zIndex > topZ) {
				topZ = zIndex;				
				topmostKey = i;
			}
		}
	}
	if (topmostKey == -1) hs.focusKey = -1;
	else expanders[topmostKey].focus();
},

getParam : function (a, param) {
	a.getParams = a.onclick;
	var p = a.getParams ? a.getParams() : null;
	a.getParams = null;
	
	return (p && typeof p[param] != 'undefined') ? p[param] : 
		(typeof hs[param] != 'undefined' ? hs[param] : null);
},

getSrc : function (a) {
	var src = hs.getParam(a, 'src');
	if (src) return src;
	return a.href;
},

getNode : function (id) {
	var node = hs.$(id), clone = hs.clones[id], a = {};
	if (!node && !clone) return null;
	if (!clone) {
		clone = node.cloneNode(true);
		clone.id = '';
		hs.clones[id] = clone;
		return node;
	} else {
		return clone.cloneNode(true);
	}
},

discardElement : function(d) {
	if (d) hs.garbageBin.appendChild(d);
	hs.garbageBin.innerHTML = '';
},
dim : function(exp) {
	if (!hs.dimmer) {
		hs.dimmer = hs.createElement ('div', {
				className: 'highslide-dimming highslide-viewport-size',
				owner: '',
				onclick: function() {
					if (hs.fireEvent(hs, 'onDimmerClick'))
					
						hs.close();
				}
			}, {
                visibility: 'visible',
				opacity: 0
			}, hs.container, true);
	}

	hs.dimmer.style.display = '';

	hs.dimmer.owner += '|'+ exp.key;
	if (hs.geckoMac && hs.dimmingGeckoFix)
		hs.setStyles(hs.dimmer, {
			background: 'url('+ hs.graphicsDir + 'geckodimmer.png)',
			opacity: 1
		});
	else
		hs.animate(hs.dimmer, { opacity: exp.dimmingOpacity }, hs.dimmingDuration);
},
undim : function(key) {
	if (!hs.dimmer) return;
	if (typeof key != 'undefined') hs.dimmer.owner = hs.dimmer.owner.replace('|'+ key, '');

	if (
		(typeof key != 'undefined' && hs.dimmer.owner != '')
		|| (hs.upcoming && hs.getParam(hs.upcoming, 'dimmingOpacity'))
	) return;

	if (hs.geckoMac && hs.dimmingGeckoFix) hs.dimmer.style.display = 'none';
	else hs.animate(hs.dimmer, { opacity: 0 }, hs.dimmingDuration, null, function() {
		hs.dimmer.style.display = 'none';
	});
},
transit : function (adj, exp) {
	var last = exp || hs.getExpander();
	exp = last;
	if (hs.upcoming) return false;
	else hs.last = last;
	hs.removeEventListener(document, window.opera ? 'keypress' : 'keydown', hs.keyHandler);
	try {
		hs.upcoming = adj;
		adj.onclick(); 		
	} catch (e){
		hs.last = hs.upcoming = null;
	}
	try {
		if (!adj || exp.transitions[1] != 'crossfade')
		exp.close();
	} catch (e) {}
	return false;
},

previousOrNext : function (el, op) {
	var exp = hs.getExpander(el);
	if (exp) return hs.transit(exp.getAdjacentAnchor(op), exp);
	else return false;
},

previous : function (el) {
	return hs.previousOrNext(el, -1);
},

next : function (el) {
	return hs.previousOrNext(el, 1);	
},

keyHandler : function(e) {
	if (!e) e = window.event;
	if (!e.target) e.target = e.srcElement; // ie
	if (typeof e.target.form != 'undefined') return true; // form element has focus
	if (!hs.fireEvent(hs, 'onKeyDown', e)) return true;
	var exp = hs.getExpander();
	
	var op = null;
	switch (e.keyCode) {
		case 70: // f
			if (exp) exp.doFullExpand();
			return true;
		case 32: // Space
			op = 2;
			break;
		case 34: // Page Down
		case 39: // Arrow right
		case 40: // Arrow down
			op = 1;
			break;
		case 8:  // Backspace
		case 33: // Page Up
		case 37: // Arrow left
		case 38: // Arrow up
			op = -1;
			break;
		case 27: // Escape
		case 13: // Enter
			op = 0;
	}
	if (op !== null) {
		hs.removeEventListener(document, window.opera ? 'keypress' : 'keydown', hs.keyHandler);
		if (!hs.enableKeyListener) return true;
		
		if (e.preventDefault) e.preventDefault();
    	else e.returnValue = false;
    	if (exp) {
			if (op == 0) {
				exp.close();
			} else if (op == 2) {
				if (exp.slideshow) exp.slideshow.hitSpace();
			} else {
				if (exp.slideshow) exp.slideshow.pause();
				hs.previousOrNext(exp.key, op);
			}
			return false;
		}
	}
	return true;
},


registerOverlay : function (overlay) {
	hs.push(hs.overlays, hs.extend(overlay, { hsId: 'hsId'+ hs.idCounter++ } ));
},


addSlideshow : function (options) {
	var sg = options.slideshowGroup;
	if (typeof sg == 'object') {
		for (var i = 0; i < sg.length; i++) {
			var o = {};
			for (var x in options) o[x] = options[x];
			o.slideshowGroup = sg[i];
			hs.push(hs.slideshows, o);
		}
	} else {
		hs.push(hs.slideshows, options);
	}
},

getWrapperKey : function (element, expOnly) {
	var el, re = /^highslide-wrapper-([0-9]+)$/;
	// 1. look in open expanders
	el = element;
	while (el.parentNode)	{
		if (el.hsKey !== undefined) return el.hsKey;
		if (el.id && re.test(el.id)) return el.id.replace(re, "$1");
		el = el.parentNode;
	}
	// 2. look in thumbnail
	if (!expOnly) {
		el = element;
		while (el.parentNode)	{
			if (el.tagName && hs.isHsAnchor(el)) {
				for (var key = 0; key < hs.expanders.length; key++) {
					var exp = hs.expanders[key];
					if (exp && exp.a == el) return key;
				}
			}
			el = el.parentNode;
		}
	}
	return null; 
},

getExpander : function (el, expOnly) {
	if (typeof el == 'undefined') return hs.expanders[hs.focusKey] || null;
	if (typeof el == 'number') return hs.expanders[el] || null;
	if (typeof el == 'string') el = hs.$(el);
	return hs.expanders[hs.getWrapperKey(el, expOnly)] || null;
},

isHsAnchor : function (a) {
	return (a.onclick && a.onclick.toString().replace(/\s/g, ' ').match(/hs.(htmlE|e)xpand/));
},

reOrder : function () {
	for (var i = 0; i < hs.expanders.length; i++)
		if (hs.expanders[i] && hs.expanders[i].isExpanded) hs.focusTopmost();
},
fireEvent : function (obj, evt, args) {
	return obj && obj[evt] ? (obj[evt](obj, args) !== false) : true;
},

mouseClickHandler : function(e) 
{	
	if (!e) e = window.event;
	if (e.button > 1) return true;
	if (!e.target) e.target = e.srcElement;
	
	var el = e.target;
	while (el.parentNode
		&& !(/highslide-(image|move|html|resize)/.test(el.className)))
	{
		el = el.parentNode;
	}
	var exp = hs.getExpander(el);
	if (exp && (exp.isClosing || !exp.isExpanded)) return true;
		
	if (exp && e.type == 'mousedown') {
		if (e.target.form) return true;
		var match = el.className.match(/highslide-(image|move|resize)/);
		if (match) {
			hs.dragArgs = { 
				exp: exp , 
				type: match[1], 
				left: exp.x.pos, 
				width: exp.x.size, 
				top: exp.y.pos, 
				height: exp.y.size, 
				clickX: e.clientX, 
				clickY: e.clientY
			};
			
			
			hs.addEventListener(document, 'mousemove', hs.dragHandler);
			if (e.preventDefault) e.preventDefault(); // FF
			
			if (/highslide-(image|html)-blur/.test(exp.content.className)) {
				exp.focus();
				hs.hasFocused = true;
			}
			return false;
		}
		else if (/highslide-html/.test(el.className) && hs.focusKey != exp.key) {
			exp.focus();
			exp.doShowHide('hidden');
		}
	} else if (e.type == 'mouseup') {
		
		hs.removeEventListener(document, 'mousemove', hs.dragHandler);
		
		if (hs.dragArgs) {
			if (hs.styleRestoreCursor && hs.dragArgs.type == 'image') 
				hs.dragArgs.exp.content.style.cursor = hs.styleRestoreCursor;
			var hasDragged = hs.dragArgs.hasDragged;
			
			if (!hasDragged &&!hs.hasFocused && !/(move|resize)/.test(hs.dragArgs.type)) {
				if (hs.fireEvent(exp, 'onImageClick'))
				exp.close();
			} 
			else if (hasDragged || (!hasDragged && hs.hasHtmlExpanders)) {
				hs.dragArgs.exp.doShowHide('hidden');
			}
			
			if (hs.dragArgs.exp.releaseMask) 
				hs.dragArgs.exp.releaseMask.style.display = 'none';
			
			if (hasDragged) hs.fireEvent(hs.dragArgs.exp, 'onDrop', hs.dragArgs);
			hs.hasFocused = false;
			hs.dragArgs = null;
		
		} else if (/highslide-image-blur/.test(el.className)) {
			el.style.cursor = hs.styleRestoreCursor;		
		}
	}
	return false;
},

dragHandler : function(e)
{
	if (!hs.dragArgs) return true;
	if (!e) e = window.event;
	var a = hs.dragArgs, exp = a.exp;
	if (exp.iframe) {		
		if (!exp.releaseMask) exp.releaseMask = hs.createElement('div', null, 
			{ position: 'absolute', width: exp.x.size+'px', height: exp.y.size+'px', 
				left: exp.x.cb+'px', top: exp.y.cb+'px', zIndex: 4,	background: (hs.ie ? 'white' : 'none'), 
				opacity: 0.01 }, 
			exp.wrapper, true);
		if (exp.releaseMask.style.display == 'none')
			exp.releaseMask.style.display = '';
	}
	
	a.dX = e.clientX - a.clickX;
	a.dY = e.clientY - a.clickY;	
	
	var distance = Math.sqrt(Math.pow(a.dX, 2) + Math.pow(a.dY, 2));
	if (!a.hasDragged) a.hasDragged = (a.type != 'image' && distance > 0)
		|| (distance > (hs.dragSensitivity || 5));
	
	if (a.hasDragged && e.clientX > 5 && e.clientY > 5) {
		if (!hs.fireEvent(exp, 'onDrag', a)) return false;
		
		if (a.type == 'resize') exp.resize(a);
		else {
			exp.moveTo(a.left + a.dX, a.top + a.dY);
			if (a.type == 'image') exp.content.style.cursor = 'move';
		}
	}
	return false;
},

wrapperMouseHandler : function (e) {
	try {
		if (!e) e = window.event;
		var over = /mouseover/i.test(e.type); 
		if (!e.target) e.target = e.srcElement; // ie
		if (hs.ie) e.relatedTarget = 
			over ? e.fromElement : e.toElement; // ie
		var exp = hs.getExpander(e.target);
		if (!exp.isExpanded) return;
		if (!exp || !e.relatedTarget || hs.getExpander(e.relatedTarget, true) == exp 
			|| hs.dragArgs) return;
		hs.fireEvent(exp, over ? 'onMouseOver' : 'onMouseOut', e);
		for (var i = 0; i < exp.overlays.length; i++) (function() {
			var o = hs.$('hsId'+ exp.overlays[i]);
			if (o && o.hideOnMouseOut) {
				if (over) hs.setStyles(o, { visibility: 'visible', display: '' });
				hs.animate(o, { opacity: over ? o.opacity : 0 }, o.dur);
			}
		})();	
	} catch (e) {}
},
addEventListener : function (el, event, func) {
	if (el == document && event == 'ready') {
		hs.push(hs.onReady, func);
	}
	try {
		el.addEventListener(event, func, false);
	} catch (e) {
		try {
			el.detachEvent('on'+ event, func);
			el.attachEvent('on'+ event, func);
		} catch (e) {
			el['on'+ event] = func;
		}
	} 
},

removeEventListener : function (el, event, func) {
	try {
		el.removeEventListener(event, func, false);
	} catch (e) {
		try {
			el.detachEvent('on'+ event, func);
		} catch (e) {
			el['on'+ event] = null;
		}
	}
},

preloadFullImage : function (i) {
	if (hs.continuePreloading && hs.preloadTheseImages[i] && hs.preloadTheseImages[i] != 'undefined') {
		var img = document.createElement('img');
		img.onload = function() { 
			img = null;
			hs.preloadFullImage(i + 1);
		};
		img.src = hs.preloadTheseImages[i];
	}
},
preloadImages : function (number) {
	if (number && typeof number != 'object') hs.numberOfImagesToPreload = number;
	
	var arr = hs.getAnchors();
	for (var i = 0; i < arr.images.length && i < hs.numberOfImagesToPreload; i++) {
		hs.push(hs.preloadTheseImages, hs.getSrc(arr.images[i]));
	}
	
	// preload outlines
	if (hs.outlineType)	new hs.Outline(hs.outlineType, function () { hs.preloadFullImage(0)} );
	else
	
	hs.preloadFullImage(0);
	
	// preload cursor
	if (hs.restoreCursor) var cur = hs.createElement('img', { src: hs.graphicsDir + hs.restoreCursor });
},


init : function () {
	if (!hs.container) {
	
		hs.getPageSize();
		hs.ieLt7 = hs.ie && hs.uaVersion < 7;
		hs.ie6SSL = hs.ieLt7 && location.protocol == 'https:';
		for (var x in hs.langDefaults) {
			if (typeof hs[x] != 'undefined') hs.lang[x] = hs[x];
			else if (typeof hs.lang[x] == 'undefined' && typeof hs.langDefaults[x] != 'undefined') 
				hs.lang[x] = hs.langDefaults[x];
		}
		
		hs.container = hs.createElement('div', {
				className: 'highslide-container'
			}, {
				position: 'absolute',
				left: 0, 
				top: 0, 
				width: '100%', 
				zIndex: hs.zIndexCounter,
				direction: 'ltr'
			}, 
			document.body,
			true
		);
		hs.loading = hs.createElement('a', {
				className: 'highslide-loading',
				title: hs.lang.loadingTitle,
				innerHTML: hs.lang.loadingText,
				href: 'javascript:;'
			}, {
				position: 'absolute',
				top: '-9999px',
				opacity: hs.loadingOpacity,
				zIndex: 1
			}, hs.container
		);
		hs.garbageBin = hs.createElement('div', null, { display: 'none' }, hs.container);
		hs.viewport = hs.createElement('div', {
				className: 'highslide-viewport highslide-viewport-size'
			}, {
				visibility: (hs.safari && hs.uaVersion < 525) ? 'visible' : 'hidden'
			}, hs.container, 1
		);
		hs.clearing = hs.createElement('div', null, 
			{ clear: 'both', paddingTop: '1px' }, null, true);
		
		// http://www.robertpenner.com/easing/ 
		Math.linearTween = function (t, b, c, d) {
			return c*t/d + b;
		};
		Math.easeInQuad = function (t, b, c, d) {
			return c*(t/=d)*t + b;
		};
		Math.easeOutQuad = function (t, b, c, d) {
			return -c *(t/=d)*(t-2) + b;
		};
		
		hs.hideSelects = hs.ieLt7;
		hs.hideIframes = ((window.opera && hs.uaVersion < 9) || navigator.vendor == 'KDE' 
			|| (hs.ie && hs.uaVersion < 5.5));
		hs.fireEvent(this, 'onActivate');
	}
},
ready : function() {
	if (hs.isReady) return;
	hs.isReady = true;
	for (var i = 0; i < hs.onReady.length; i++) hs.onReady[i]();
},

updateAnchors : function() {
	var el, els, all = [], images = [], htmls = [],groups = {}, re;
		
	for (var i = 0; i < hs.openerTagNames.length; i++) {
		els = document.getElementsByTagName(hs.openerTagNames[i]);
		for (var j = 0; j < els.length; j++) {
			el = els[j];
			re = hs.isHsAnchor(el);
			if (re) {
				hs.push(all, el);
				if (re[0] == 'hs.expand') hs.push(images, el);
				else if (re[0] == 'hs.htmlExpand') hs.push(htmls, el);
				var g = hs.getParam(el, 'slideshowGroup') || 'none';
				if (!groups[g]) groups[g] = [];
				hs.push(groups[g], el);
			}
		}
	}
	hs.anchors = { all: all, groups: groups, images: images, htmls: htmls };
	return hs.anchors;
	
},

getAnchors : function() {
	return hs.anchors || hs.updateAnchors();
},


close : function(el) {
	var exp = hs.getExpander(el);
	if (exp) exp.close();
	return false;
}
}; // end hs object
hs.fx = function( elem, options, prop ){
	this.options = options;
	this.elem = elem;
	this.prop = prop;

	if (!options.orig) options.orig = {};
};
hs.fx.prototype = {
	update: function(){
		(hs.fx.step[this.prop] || hs.fx.step._default)(this);
		
		if (this.options.step)
			this.options.step.call(this.elem, this.now, this);

	},
	custom: function(from, to, unit){
		this.startTime = (new Date()).getTime();
		this.start = from;
		this.end = to;
		this.unit = unit;// || this.unit || "px";
		this.now = this.start;
		this.pos = this.state = 0;

		var self = this;
		function t(gotoEnd){
			return self.step(gotoEnd);
		}

		t.elem = this.elem;

		if ( t() && hs.timers.push(t) == 1 ) {
			hs.timerId = setInterval(function(){
				var timers = hs.timers;

				for ( var i = 0; i < timers.length; i++ )
					if ( !timers[i]() )
						timers.splice(i--, 1);

				if ( !timers.length ) {
					clearInterval(hs.timerId);
				}
			}, 13);
		}
	},
	step: function(gotoEnd){
		var t = (new Date()).getTime();
		if ( gotoEnd || t >= this.options.duration + this.startTime ) {
			this.now = this.end;
			this.pos = this.state = 1;
			this.update();

			this.options.curAnim[ this.prop ] = true;

			var done = true;
			for ( var i in this.options.curAnim )
				if ( this.options.curAnim[i] !== true )
					done = false;

			if ( done ) {
				if (this.options.complete) this.options.complete.call(this.elem);
			}
			return false;
		} else {
			var n = t - this.startTime;
			this.state = n / this.options.duration;
			this.pos = this.options.easing(n, 0, 1, this.options.duration);
			this.now = this.start + ((this.end - this.start) * this.pos);
			this.update();
		}
		return true;
	}

};

hs.extend( hs.fx, {
	step: {

		opacity: function(fx){
			hs.setStyles(fx.elem, { opacity: fx.now });
		},

		_default: function(fx){
			try {
				if ( fx.elem.style && fx.elem.style[ fx.prop ] != null )
					fx.elem.style[ fx.prop ] = fx.now + fx.unit;
				else
					fx.elem[ fx.prop ] = fx.now;
			} catch (e) {}
		}
	}
});

hs.Outline =  function (outlineType, onLoad) {
	this.onLoad = onLoad;
	this.outlineType = outlineType;
	var v = hs.uaVersion, tr;
	
	this.hasAlphaImageLoader = hs.ie && v >= 5.5 && v < 7;
	if (!outlineType) {
		if (onLoad) onLoad();
		return;
	}
	
	hs.init();
	this.table = hs.createElement(
		'table', { 
			cellSpacing: 0 
		}, {
			visibility: 'hidden',
			position: 'absolute',
			borderCollapse: 'collapse',
			width: 0
		},
		hs.container,
		true
	);
	var tbody = hs.createElement('tbody', null, null, this.table, 1);
	
	this.td = [];
	for (var i = 0; i <= 8; i++) {
		if (i % 3 == 0) tr = hs.createElement('tr', null, { height: 'auto' }, tbody, true);
		this.td[i] = hs.createElement('td', null, null, tr, true);
		var style = i != 4 ? { lineHeight: 0, fontSize: 0} : { position : 'relative' };
		hs.setStyles(this.td[i], style);
	}
	this.td[4].className = outlineType +' highslide-outline';
	
	this.preloadGraphic(); 
};

hs.Outline.prototype = {
preloadGraphic : function () {
	var src = hs.graphicsDir + (hs.outlinesDir || "outlines/")+ this.outlineType +".png";
				
	var appendTo = hs.safari ? hs.container : null;
	this.graphic = hs.createElement('img', null, { position: 'absolute', 
		top: '-9999px' }, appendTo, true); // for onload trigger
	
	var pThis = this;
	this.graphic.onload = function() { pThis.onGraphicLoad(); };
	
	this.graphic.src = src;
},

onGraphicLoad : function () {
	var o = this.offset = this.graphic.width / 4,
		pos = [[0,0],[0,-4],[-2,0],[0,-8],0,[-2,-8],[0,-2],[0,-6],[-2,-2]],
		dim = { height: (2*o) +'px', width: (2*o) +'px' };
	for (var i = 0; i <= 8; i++) {
		if (pos[i]) {
			if (this.hasAlphaImageLoader) {
				var w = (i == 1 || i == 7) ? '100%' : this.graphic.width +'px';
				var div = hs.createElement('div', null, { width: '100%', height: '100%', position: 'relative', overflow: 'hidden'}, this.td[i], true);
				hs.createElement ('div', null, { 
						filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale, src='"+ this.graphic.src + "')", 
						position: 'absolute',
						width: w, 
						height: this.graphic.height +'px',
						left: (pos[i][0]*o)+'px',
						top: (pos[i][1]*o)+'px'
					}, 
				div,
				true);
			} else {
				hs.setStyles(this.td[i], { background: 'url('+ this.graphic.src +') '+ (pos[i][0]*o)+'px '+(pos[i][1]*o)+'px'});
			}
			
			if (window.opera && (i == 3 || i ==5)) 
				hs.createElement('div', null, dim, this.td[i], true);
			
			hs.setStyles (this.td[i], dim);
		}
	}
	this.graphic = null;
	if (hs.pendingOutlines[this.outlineType]) hs.pendingOutlines[this.outlineType].destroy();
	hs.pendingOutlines[this.outlineType] = this;
	if (this.onLoad) this.onLoad();
},
	
setPosition : function (pos, offset, vis, dur, easing) {
	var exp = this.exp,
		stl = exp.wrapper.style,
		offset = offset || 0,
		pos = pos || {
			x: exp.x.pos + offset,
			y: exp.y.pos + offset,
			w: exp.x.get('wsize') - 2 * offset,
			h: exp.y.get('wsize') - 2 * offset
		};
	if (vis) this.table.style.visibility = (pos.h >= 4 * this.offset) 
		? 'visible' : 'hidden';
	hs.setStyles(this.table, {
		left: (pos.x - this.offset) +'px',
		top: (pos.y - this.offset) +'px',
		width: (pos.w + 2 * this.offset) +'px'
	});
	
	pos.w -= 2 * this.offset;
	pos.h -= 2 * this.offset;
	hs.setStyles (this.td[4], {
		width: pos.w >= 0 ? pos.w +'px' : 0,
		height: pos.h >= 0 ? pos.h +'px' : 0
	});
	if (this.hasAlphaImageLoader) this.td[3].style.height 
		= this.td[5].style.height = this.td[4].style.height;	
	
},
	
destroy : function(hide) {
	if (hide) this.table.style.visibility = 'hidden';
	else hs.discardElement(this.table);
}
};

hs.Dimension = function(exp, dim) {
	this.exp = exp;
	this.dim = dim;
	this.ucwh = dim == 'x' ? 'Width' : 'Height';
	this.wh = this.ucwh.toLowerCase();
	this.uclt = dim == 'x' ? 'Left' : 'Top';
	this.lt = this.uclt.toLowerCase();
	this.ucrb = dim == 'x' ? 'Right' : 'Bottom';
	this.rb = this.ucrb.toLowerCase();
	this.p1 = this.p2 = 0;
};
hs.Dimension.prototype = {
get : function(key) {
	switch (key) {
		case 'loadingPos':
			return this.tpos + this.tb + (this.t - hs.loading['offset'+ this.ucwh]) / 2;
		case 'loadingPosXfade':
			return this.pos + this.cb+ this.p1 + (this.size - hs.loading['offset'+ this.ucwh]) / 2;
		case 'wsize':
			return this.size + 2 * this.cb + this.p1 + this.p2;
		case 'fitsize':
			return this.clientSize - this.marginMin - this.marginMax;
		case 'maxsize':
			return this.get('fitsize') - 2 * this.cb - this.p1 - this.p2 ;
		case 'opos':
			return this.pos - (this.exp.outline ? this.exp.outline.offset : 0);
		case 'osize':
			return this.get('wsize') + (this.exp.outline ? 2*this.exp.outline.offset : 0);
		case 'imgPad':
			return this.imgSize ? Math.round((this.size - this.imgSize) / 2) : 0;
		
	}
},
calcBorders: function() {
	// correct for borders
	this.cb = (this.exp.content['offset'+ this.ucwh] - this.t) / 2;
	
	this.marginMax = hs['margin'+ this.ucrb];
},
calcThumb: function() {
	this.t = this.exp.el[this.wh] ? parseInt(this.exp.el[this.wh]) : 
		this.exp.el['offset'+ this.ucwh];
	this.tpos = this.exp.tpos[this.dim];
	this.tb = (this.exp.el['offset'+ this.ucwh] - this.t) / 2;
	if (this.tpos == 0 || this.tpos == -1) {
		this.tpos = (hs.page[this.wh] / 2) + hs.page['scroll'+ this.uclt];		
	};
},
calcExpanded: function() {
	var exp = this.exp;
	this.justify = 'auto';
	
	// get alignment
	if (exp.align == 'center') this.justify = 'center';
	else if (new RegExp(this.lt).test(exp.anchor)) this.justify = null;
	else if (new RegExp(this.rb).test(exp.anchor)) this.justify = 'max';
	
	
	// size and position
	this.pos = this.tpos - this.cb + this.tb;
	
	if (this.maxHeight && this.dim == 'x')
		exp.maxWidth = Math.min(exp.maxWidth || this.full, exp.maxHeight * this.full / exp.y.full); 
		
	this.size = Math.min(this.full, exp['max'+ this.ucwh] || this.full);
	this.minSize = exp.allowSizeReduction ? 
		Math.min(exp['min'+ this.ucwh], this.full) :this.full;
	if (exp.isImage && exp.useBox)	{
		this.size = exp[this.wh];
		this.imgSize = this.full;
	}
	if (this.dim == 'x' && hs.padToMinWidth) this.minSize = exp.minWidth;
	this.target = exp['target'+ this.dim.toUpperCase()];
	this.marginMin = hs['margin'+ this.uclt];
	this.scroll = hs.page['scroll'+ this.uclt];
	this.clientSize = hs.page[this.wh];
},
setSize: function(i) {
	var exp = this.exp;
	if (exp.isImage && (exp.useBox || hs.padToMinWidth)) {
		this.imgSize = i;
		this.size = Math.max(this.size, this.imgSize);
		exp.content.style[this.lt] = this.get('imgPad')+'px';
	} else
	this.size = i;
	
	exp.content.style[this.wh] = i +'px';
	exp.wrapper.style[this.wh] = this.get('wsize') +'px';
	if (exp.outline) exp.outline.setPosition();
	if (exp.releaseMask) exp.releaseMask.style[this.wh] = i +'px';
	if (this.dim == 'y' && exp.iDoc && exp.body.style.height != 'auto') try {
		exp.iDoc.body.style.overflow = 'auto';
	} catch (e) {}
	if (exp.isHtml) {
		var d = exp.scrollerDiv;
		if (this.sizeDiff === undefined)
			this.sizeDiff = exp.innerContent['offset'+ this.ucwh] - d['offset'+ this.ucwh];
		d.style[this.wh] = (this.size - this.sizeDiff) +'px';
			
		if (this.dim == 'x') exp.mediumContent.style.width = 'auto';
		if (exp.body) exp.body.style[this.wh] = 'auto';
	}
	if (this.dim == 'x' && exp.overlayBox) exp.sizeOverlayBox(true);
	if (this.dim == 'x' && exp.slideshow && exp.isImage) {
		if (i == this.full) exp.slideshow.disable('full-expand');
		else exp.slideshow.enable('full-expand');
	}
},
setPos: function(i) {
	this.pos = i;
	this.exp.wrapper.style[this.lt] = i +'px';	
	
	if (this.exp.outline) this.exp.outline.setPosition();
	
}
};

hs.Expander = function(a, params, custom, contentType) {
	if (document.readyState && hs.ie && !hs.isReady) {
		hs.addEventListener(document, 'ready', function() {
			new hs.Expander(a, params, custom, contentType);
		});
		return;
	} 
	this.a = a;
	this.custom = custom;
	this.contentType = contentType || 'image';
	this.isHtml = (contentType == 'html');
	this.isImage = !this.isHtml;
	
	hs.continuePreloading = false;
	this.overlays = [];
	this.last = hs.last;
	hs.last = null;
	hs.init();
	var key = this.key = hs.expanders.length;
	// override inline parameters
	for (var i = 0; i < hs.overrides.length; i++) {
		var name = hs.overrides[i];
		this[name] = params && typeof params[name] != 'undefined' ?
			params[name] : hs[name];
	}
	if (!this.src) this.src = a.href;
	
	// get thumb
	var el = (params && params.thumbnailId) ? hs.$(params.thumbnailId) : a;
	el = this.thumb = el.getElementsByTagName('img')[0] || el;
	this.thumbsUserSetId = el.id || a.id;
	if (!hs.fireEvent(this, 'onInit')) return true;
	
	// check if already open
	for (var i = 0; i < hs.expanders.length; i++) {
		if (hs.expanders[i] && hs.expanders[i].a == a 
			&& !(this.last && this.transitions[1] == 'crossfade')) {
			hs.expanders[i].focus();
			return false;
		}
	}	

	// cancel other
	if (!hs.allowSimultaneousLoading) for (var i = 0; i < hs.expanders.length; i++) {
		if (hs.expanders[i] && hs.expanders[i].thumb != el && !hs.expanders[i].onLoadStarted) {
			hs.expanders[i].cancelLoading();
		}
	}
	hs.expanders[key] = this;
	if (!hs.allowMultipleInstances && !hs.upcoming) {
		if (hs.expanders[key-1]) hs.expanders[key-1].close();
		if (typeof hs.focusKey != 'undefined' && hs.expanders[hs.focusKey])
			hs.expanders[hs.focusKey].close();
	}
	
	// initiate metrics
	this.el = el;
	this.tpos = this.pageOrigin || hs.getPosition(el);
	hs.getPageSize();
	var x = this.x = new hs.Dimension(this, 'x');
	x.calcThumb();
	var y = this.y = new hs.Dimension(this, 'y');
	y.calcThumb();
	if (/area/i.test(el.tagName)) this.getImageMapAreaCorrection(el);
	this.wrapper = hs.createElement(
		'div', {
			id: 'highslide-wrapper-'+ this.key,
			className: 'highslide-wrapper '+ this.wrapperClassName
		}, {
			visibility: 'hidden',
			position: 'absolute',
			zIndex: hs.zIndexCounter += 2
		}, null, true );
	
	this.wrapper.onmouseover = this.wrapper.onmouseout = hs.wrapperMouseHandler;
	if (this.contentType == 'image' && this.outlineWhileAnimating == 2)
		this.outlineWhileAnimating = 0;
	
	// get the outline
	if (!this.outlineType 
		|| (this.last && this.isImage && this.transitions[1] == 'crossfade')) {
		this[this.contentType +'Create']();
	
	} else if (hs.pendingOutlines[this.outlineType]) {
		this.connectOutline();
		this[this.contentType +'Create']();
	
	} else {
		this.showLoading();
		var exp = this;
		new hs.Outline(this.outlineType, 
			function () {
				exp.connectOutline();
				exp[exp.contentType +'Create']();
			} 
		);
	}
	return true;
};

hs.Expander.prototype = {
error : function(e) {
	if (hs.debug) alert ('Line '+ e.lineNumber +': '+ e.message);
	else window.location.href = this.src;
},

connectOutline : function() {
	var outline = this.outline = hs.pendingOutlines[this.outlineType];
	outline.exp = this;
	outline.table.style.zIndex = this.wrapper.style.zIndex - 1;
	hs.pendingOutlines[this.outlineType] = null;
},

showLoading : function() {
	if (this.onLoadStarted || this.loading) return;
	
	this.loading = hs.loading;
	var exp = this;
	this.loading.onclick = function() {
		exp.cancelLoading();
	};
	
	
	if (!hs.fireEvent(this, 'onShowLoading')) return;
	var exp = this, 
		l = this.x.get('loadingPos') +'px',
		t = this.y.get('loadingPos') +'px';
	if (!tgt && this.last && this.transitions[1] == 'crossfade') 
		var tgt = this.last; 
	if (tgt) {
		l = tgt.x.get('loadingPosXfade') +'px';
		t = tgt.y.get('loadingPosXfade') +'px';
		this.loading.style.zIndex = hs.zIndexCounter++;
	}
	setTimeout(function () { 
		if (exp.loading) hs.setStyles(exp.loading, { left: l, top: t, zIndex: hs.zIndexCounter++ })}
	, 100);
},

imageCreate : function() {
	var exp = this;
	
	var img = document.createElement('img');
    this.content = img;
    img.onload = function () {
    	if (hs.expanders[exp.key]) exp.contentLoaded(); 
	};
    if (hs.blockRightClick) img.oncontextmenu = function() { return false; };
    img.className = 'highslide-image';
    hs.setStyles(img, {
    	visibility: 'hidden',
    	display: 'block',
    	position: 'absolute',
		maxWidth: '9999px',
		zIndex: 3
	});
    img.title = hs.lang.restoreTitle;
    if (hs.safari) hs.container.appendChild(img);
    if (hs.ie && hs.flushImgSize) img.src = null;
	img.src = this.src;
	
	this.showLoading();
},

htmlCreate : function () {
	if (!hs.fireEvent(this, 'onBeforeGetContent')) return;
	
	this.content = hs.getCacheBinding(this.a);
	if (!this.content) 
		this.content = hs.getNode(this.contentId);
	if (!this.content) 
		this.content = hs.getSelfRendered();
	this.getInline(['maincontent']);
	if (this.maincontent) {
		var body = hs.getElementByClass(this.content, 'div', 'highslide-body');
		if (body) body.appendChild(this.maincontent);
		this.maincontent.style.display = 'block';
	}
	hs.fireEvent(this, 'onAfterGetContent');
	
	var innerContent = this.innerContent = this.content;
	
	if (/(swf|iframe)/.test(this.objectType)) this.setObjContainerSize(innerContent);
	
	// the content tree
	hs.container.appendChild(this.wrapper);
	hs.setStyles( this.wrapper, { 
		position: 'static',
		padding: '0 '+ hs.marginRight +'px 0 '+ hs.marginLeft +'px'
	});
	this.content = hs.createElement(
    	'div', {
    		className: 'highslide-html' 
    	}, {
			position: 'relative',
			zIndex: 3,
			height: 0,
			overflow: 'hidden'
		},
		this.wrapper
	);
	this.mediumContent = hs.createElement('div', null, null, this.content, 1);
	this.mediumContent.appendChild(innerContent);
	
	hs.setStyles (innerContent, { 
		position: 'relative',
		display: 'block',
		direction: hs.lang.cssDirection || ''
	});
	if (this.width) innerContent.style.width = this.width +'px';
	if (this.height) hs.setStyles(innerContent, {
		height: this.height +'px',
		overflow: 'hidden'
	});
	if (innerContent.offsetWidth < this.minWidth)
		innerContent.style.width = this.minWidth +'px';
		
	
    
	if (this.objectType == 'ajax' && !hs.getCacheBinding(this.a)) {
		this.showLoading();
    	var exp = this;
    	var ajax = new hs.Ajax(this.a, innerContent);
		ajax.src = this.src;
    	ajax.onLoad = function () {	if (hs.expanders[exp.key]) exp.contentLoaded(); };
    	ajax.onError = function () { location.href = exp.src; };
    	ajax.run();
	}
    else
    
    if (this.objectType == 'iframe' && this.objectLoadTime == 'before') {
		this.writeExtendedContent();
	}
    else
    	this.contentLoaded();
},

contentLoaded : function() {
	try {	
		if (!this.content) return;
		this.content.onload = null;
		if (this.onLoadStarted) return;
		else this.onLoadStarted = true;
		
		var x = this.x, y = this.y;
		
		if (this.loading) {
			hs.setStyles(this.loading, { top: '-9999px' });
			this.loading = null;
			hs.fireEvent(this, 'onHideLoading');
		}
		if (this.isImage) {	
			x.full = this.content.width;
			y.full = this.content.height;
			
			hs.setStyles(this.content, {
				width: x.t +'px',
				height: y.t +'px'
			});
			this.wrapper.appendChild(this.content);
			hs.container.appendChild(this.wrapper);
		} else if (this.htmlGetSize) this.htmlGetSize();
		
		x.calcBorders();
		y.calcBorders();
		
		hs.setStyles (this.wrapper, {
			left: (x.tpos + x.tb - x.cb) +'px',
			top: (y.tpos + x.tb - y.cb) +'px'
		});
		
		
		this.initSlideshow();
		this.getOverlays();
		
		var ratio = x.full / y.full;
		x.calcExpanded();
		this.justify(x);
		
		y.calcExpanded();
		this.justify(y);
		if (this.isHtml) this.htmlSizeOperations();
		if (this.overlayBox) this.sizeOverlayBox(0, 1);

		
		if (this.allowSizeReduction) {
			if (this.isImage)
				this.correctRatio(ratio);
			else this.fitOverlayBox();
			var ss = this.slideshow;			
			if (ss && this.last && ss.controls && ss.fixedControls) {
				var pos = ss.overlayOptions.position || '', p;
				for (var dim in hs.oPos) for (var i = 0; i < 5; i++) {
					p = this[dim];
					if (pos.match(hs.oPos[dim][i])) {
						p.pos = this.last[dim].pos 
							+ (this.last[dim].p1 - p.p1)
							+ (this.last[dim].size - p.size) * [0, 0, .5, 1, 1][i];
						if (ss.fixedControls == 'fit') {
							if (p.pos + p.size + p.p1 + p.p2 > p.scroll + p.clientSize - p.marginMax)
								p.pos = p.scroll + p.clientSize - p.size - p.marginMin - p.marginMax - p.p1 - p.p2;
							if (p.pos < p.scroll + p.marginMin) p.pos = p.scroll + p.marginMin; 
						} 
					}
				}
			}
			if (this.isImage && this.x.full > (this.x.imgSize || this.x.size)) {
				this.createFullExpand();
				if (this.overlays.length == 1) this.sizeOverlayBox();
			}
		}
		this.show();
		
	} catch (e) {
		this.error(e);
	}
},


setObjContainerSize : function(parent, auto) {
	var c = hs.getElementByClass(parent, 'DIV', 'highslide-body');
	if (/(iframe|swf)/.test(this.objectType)) {
		if (this.objectWidth) c.style.width = this.objectWidth +'px';
		if (this.objectHeight) c.style.height = this.objectHeight +'px';
	}
},

writeExtendedContent : function () {
	if (this.hasExtendedContent) return;
	var exp = this;
	this.body = hs.getElementByClass(this.innerContent, 'DIV', 'highslide-body');
	if (this.objectType == 'iframe') {
		this.showLoading();
		var ruler = hs.clearing.cloneNode(1);
		this.body.appendChild(ruler);
		this.newWidth = this.innerContent.offsetWidth;
		if (!this.objectWidth) this.objectWidth = ruler.offsetWidth;
		var hDiff = this.innerContent.offsetHeight - this.body.offsetHeight,
			h = this.objectHeight || hs.page.height - hDiff - hs.marginTop - hs.marginBottom,
			onload = this.objectLoadTime == 'before' ? 
				' onload="if (hs.expanders['+ this.key +']) hs.expanders['+ this.key +'].contentLoaded()" ' : '';
		this.body.innerHTML += '<iframe name="hs'+ (new Date()).getTime() +'" frameborder="0" key="'+ this.key +'" '
			+' style="width:'+ this.objectWidth +'px; height:'+ h +'px" '
			+ onload +' src="'+ this.src +'" ></iframe>';
		this.ruler = this.body.getElementsByTagName('div')[0];
		this.iframe = this.body.getElementsByTagName('iframe')[0];
		
		if (this.objectLoadTime == 'after') this.correctIframeSize();
		
	}
	if (this.objectType == 'swf') {
		this.body.id = this.body.id || 'hs-flash-id-' + this.key;
		var a = this.swfOptions;
		if (!a.params) a.params = {};
		if (typeof a.params.wmode == 'undefined') a.params.wmode = 'transparent';
		if (swfobject) swfobject.embedSWF(this.src, this.body.id, this.objectWidth, this.objectHeight, 
			a.version || '7', a.expressInstallSwfurl, a.flashvars, a.params, a.attributes);
	}
	this.hasExtendedContent = true;
},
htmlGetSize : function() {
	if (this.iframe && !this.objectHeight) { // loadtime before
		this.iframe.style.height = this.body.style.height = this.getIframePageHeight() +'px';
	}
	this.innerContent.appendChild(hs.clearing);
	if (!this.x.full) this.x.full = this.innerContent.offsetWidth;
    this.y.full = this.innerContent.offsetHeight;
    this.innerContent.removeChild(hs.clearing);
    if (hs.ie && this.newHeight > parseInt(this.innerContent.currentStyle.height)) { // ie css bug
		this.newHeight = parseInt(this.innerContent.currentStyle.height);
	}
	hs.setStyles( this.wrapper, { position: 'absolute',	padding: '0'});
	hs.setStyles( this.content, { width: this.x.t +'px', height: this.y.t +'px'});
	
},

getIframePageHeight : function() {
	var h;
	try {
		var doc = this.iDoc = this.iframe.contentDocument || this.iframe.contentWindow.document;
		var clearing = doc.createElement('div');
		clearing.style.clear = 'both';
		doc.body.appendChild(clearing);
		h = clearing.offsetTop;
		if (hs.ie) h += parseInt(doc.body.currentStyle.marginTop) 
			+ parseInt(doc.body.currentStyle.marginBottom) - 1;
	} catch (e) { // other domain
		h = 300;
	}
	return h;
},
correctIframeSize : function () {
	var wDiff = this.innerContent.offsetWidth - this.ruler.offsetWidth;
	hs.discardElement(this.ruler);
	if (wDiff < 0) wDiff = 0;
	
	var hDiff = this.innerContent.offsetHeight - this.iframe.offsetHeight;
	if (this.iDoc && !this.objectHeight && !this.height && this.y.size == this.y.full) try {
		this.iDoc.body.style.overflow = 'hidden';
	} catch (e) {}
	hs.setStyles(this.iframe, { 
		width: Math.abs(this.x.size - wDiff) +'px', 
		height: Math.abs(this.y.size - hDiff) +'px'
	});
    hs.setStyles(this.body, { 
		width: this.iframe.style.width, 
    	height: this.iframe.style.height
	});
    	
    this.scrollingContent = this.iframe;
    this.scrollerDiv = this.scrollingContent;
	
},
htmlSizeOperations : function () {
	
	this.setObjContainerSize(this.innerContent);
	
	
	if (this.objectType == 'swf' && this.objectLoadTime == 'before') this.writeExtendedContent();	
	
    // handle minimum size
    if (this.x.size < this.x.full && !this.allowWidthReduction) this.x.size = this.x.full;
    if (this.y.size < this.y.full && !this.allowHeightReduction) this.y.size = this.y.full;
	this.scrollerDiv = this.innerContent;
    hs.setStyles(this.mediumContent, { 
		position: 'relative',
		width: this.x.size +'px'
	});
    hs.setStyles(this.innerContent, { 
    	border: 'none',
    	width: 'auto',
    	height: 'auto'
    });
	var node = hs.getElementByClass(this.innerContent, 'DIV', 'highslide-body');
    if (node && !/(iframe|swf)/.test(this.objectType)) {
    	var cNode = node; // wrap to get true size
    	node = hs.createElement(cNode.nodeName, null, {overflow: 'hidden'}, null, true);
    	cNode.parentNode.insertBefore(node, cNode);
    	node.appendChild(hs.clearing); // IE6
    	node.appendChild(cNode);
    	
    	var wDiff = this.innerContent.offsetWidth - node.offsetWidth;
    	var hDiff = this.innerContent.offsetHeight - node.offsetHeight;
		node.removeChild(hs.clearing);
    	
    	var kdeBugCorr = hs.safari || navigator.vendor == 'KDE' ? 1 : 0; // KDE repainting bug
    	hs.setStyles(node, { 
    			width: (this.x.size - wDiff - kdeBugCorr) +'px', 
    			height: (this.y.size - hDiff) +'px',
    			overflow: 'auto', 
    			position: 'relative' 
    		} 
    	);
		if (kdeBugCorr && cNode.offsetHeight > node.offsetHeight)	{
    		node.style.width = (parseInt(node.style.width) + kdeBugCorr) + 'px';
		}
    	this.scrollingContent = node;
    	this.scrollerDiv = this.scrollingContent;
	}
    if (this.iframe && this.objectLoadTime == 'before') this.correctIframeSize();
    if (!this.scrollingContent && this.y.size < this.mediumContent.offsetHeight) this.scrollerDiv = this.content;
	
	if (this.scrollerDiv == this.content && !this.allowWidthReduction && !/(iframe|swf)/.test(this.objectType)) {
		this.x.size += 17; // room for scrollbars
	}
	if (this.scrollerDiv && this.scrollerDiv.offsetHeight > this.scrollerDiv.parentNode.offsetHeight) {
		setTimeout("try { hs.expanders["+ this.key +"].scrollerDiv.style.overflow = 'auto'; } catch(e) {}",
			 hs.expandDuration);
	}
},

getImageMapAreaCorrection : function(area) {
	var c = area.coords.split(',');
	for (var i = 0; i < c.length; i++) c[i] = parseInt(c[i]);
	
	if (area.shape.toLowerCase() == 'circle') {
		this.x.tpos += c[0] - c[2];
		this.y.tpos += c[1] - c[2];
		this.x.t = this.y.t = 2 * c[2];
	} else {
		var maxX, maxY, minX = maxX = c[0], minY = maxY = c[1];
		for (var i = 0; i < c.length; i++) {
			if (i % 2 == 0) {
				minX = Math.min(minX, c[i]);
				maxX = Math.max(maxX, c[i]);
			} else {
				minY = Math.min(minY, c[i]);
				maxY = Math.max(maxY, c[i]);
			}
		}
		this.x.tpos += minX;
		this.x.t = maxX - minX;
		this.y.tpos += minY;
		this.y.t = maxY - minY;
	}
},
justify : function (p, moveOnly) {
	var tgtArr, tgt = p.target, dim = p == this.x ? 'x' : 'y';
	
	if (tgt && tgt.match(/ /)) {
		tgtArr = tgt.split(' ');
		tgt = tgtArr[0];
	}
	if (tgt && hs.$(tgt)) {
		p.pos = hs.getPosition(hs.$(tgt))[dim];
		if (tgtArr && tgtArr[1] && tgtArr[1].match(/^[-]?[0-9]+px$/)) 
			p.pos += parseInt(tgtArr[1]);
		if (p.size < p.minSize) p.size = p.minSize;
		
	} else if (p.justify == 'auto' || p.justify == 'center') {
	
		var hasMovedMin = false;
		
		var allowReduce = p.exp.allowSizeReduction;
		if (p.justify == 'center')
			p.pos = Math.round(p.scroll + (p.clientSize + p.marginMin - p.marginMax - p.get('wsize')) / 2);
		else
			p.pos = Math.round(p.pos - ((p.get('wsize') - p.t) / 2));
		if (p.pos < p.scroll + p.marginMin) {
			p.pos = p.scroll + p.marginMin;
			hasMovedMin = true;		
		}
		if (!moveOnly && p.size < p.minSize) {
			p.size = p.minSize;
			allowReduce = false;
		}
		if (p.pos + p.get('wsize') > p.scroll + p.clientSize - p.marginMax) {
			if (!moveOnly && hasMovedMin && allowReduce) {
				p.size = Math.min(p.size, p.get(dim == 'y' ? 'fitsize' : 'maxsize'));
			} else if (p.get('wsize') < p.get('fitsize')) {
				p.pos = p.scroll + p.clientSize - p.marginMax - p.get('wsize');
			} else { // image larger than viewport
				p.pos = p.scroll + p.marginMin;
				if (!moveOnly && allowReduce) p.size = p.get(dim == 'y' ? 'fitsize' : 'maxsize');
			}			
		}
		
		if (!moveOnly && p.size < p.minSize) {
			p.size = p.minSize;
			allowReduce = false;
		}
		
	
	} else if (p.justify == 'max') {
		p.pos = Math.floor(p.pos - p.size + p.t);
	}
	
		
	if (p.pos < p.marginMin) {
		var tmpMin = p.pos;
		p.pos = p.marginMin; 
		
		if (allowReduce && !moveOnly) p.size = p.size - (p.pos - tmpMin);
		
	}
},

correctRatio : function(ratio) {
	var x = this.x, 
		y = this.y,
		changed = false,
		xSize = Math.min(x.full, x.size),
		ySize = Math.min(y.full, y.size),
		useBox = (this.useBox || hs.padToMinWidth);
	
	if (xSize / ySize > ratio) { // width greater
		xSize = ySize * ratio;
		if (xSize < x.minSize) { // below minWidth
			xSize = x.minSize;
			ySize = xSize / ratio;
		}
		changed = true;
	
	} else if (xSize / ySize < ratio) { // height greater
		ySize = xSize / ratio;
		changed = true;
	}
	
	if (hs.padToMinWidth && x.full < x.minSize) {
		x.imgSize = x.full;
		y.size = y.imgSize = y.full;
	} else if (this.useBox) {
		x.imgSize = xSize;
		y.imgSize = ySize;
	} else {
		x.size = xSize;
		y.size = ySize;
	}
	changed = this.fitOverlayBox(useBox ? null : ratio, changed);
	if (useBox && y.size < y.imgSize) {
		y.imgSize = y.size;
		x.imgSize = y.size * ratio;
	}
	if (changed || useBox) {
		x.pos = x.tpos - x.cb + x.tb;
		x.minSize = x.size;
		this.justify(x, true);
	
		y.pos = y.tpos - y.cb + y.tb;
		y.minSize = y.size;
		this.justify(y, true);
		if (this.overlayBox) this.sizeOverlayBox();
	}
},
fitOverlayBox : function(ratio, changed) {
	var x = this.x, y = this.y;
	if (this.overlayBox && (this.isImage || this.allowHeightReduction)) {
		while (y.size > this.minHeight && x.size > this.minWidth 
				&&  y.get('wsize') > y.get('fitsize')) {
			y.size -= 10;
			if (ratio) x.size = y.size * ratio;
			this.sizeOverlayBox(0, 1);
			changed = true;
		}
	}
	return changed;
},

reflow : function () {
	if (this.scrollerDiv) {
		var h = /iframe/i.test(this.scrollerDiv.tagName) ? (this.getIframePageHeight() + 1) +'px' : 'auto';
		if (this.body) this.body.style.height = h;
		this.scrollerDiv.style.height = h;
		this.y.setSize(this.innerContent.offsetHeight);
	}
},

show : function () {
	var x = this.x, y = this.y;
	this.doShowHide('hidden');
	hs.fireEvent(this, 'onBeforeExpand');
	if (this.slideshow && this.slideshow.thumbstrip) this.slideshow.thumbstrip.selectThumb();
	
	// Apply size change
	this.changeSize(
		1, {
			wrapper: {
				width : x.get('wsize'),
				height : y.get('wsize'),
				left: x.pos,
				top: y.pos
			},
			content: {
				left: x.p1 + x.get('imgPad'),
				top: y.p1 + y.get('imgPad'),
				width:x.imgSize ||x.size,
				height:y.imgSize ||y.size
			}
		},
		hs.expandDuration
	);
},

changeSize : function(up, to, dur) {
	// transition
	var trans = this.transitions,
	other = up ? (this.last ? this.last.a : null) : hs.upcoming,
	t = (trans[1] && other 
			&& hs.getParam(other, 'transitions')[1] == trans[1]) ?
		trans[1] : trans[0];
		
	if (this[t] && t != 'expand') {
		this[t](up, to);
		return;
	}
	
	if (this.outline && !this.outlineWhileAnimating) {
		if (up) this.outline.setPosition();
		else this.outline.destroy(
				(this.isHtml && this.preserveContent));
	}
	
	
	if (!up) this.destroyOverlays();
	
	var exp = this,
		x = exp.x,
		y = exp.y,
		easing = this.easing;
	if (!up) easing = this.easingClose || easing;
	var after = up ?
		function() {
				
			if (exp.outline) exp.outline.table.style.visibility = "visible";
			setTimeout(function() {
				exp.afterExpand();
			}, 50);
		} :
		function() {
			exp.afterClose();
		};
	if (up) hs.setStyles( this.wrapper, {
		width: x.t +'px',
		height: y.t +'px'
	});
	if (up && this.isHtml) {
		hs.setStyles(this.wrapper, {
			left: (x.tpos - x.cb + x.tb) +'px',
			top: (y.tpos - y.cb + y.tb) +'px'
		});
	}
	if (this.fadeInOut) {
		hs.setStyles(this.wrapper, { opacity: up ? 0 : 1 });
		hs.extend(to.wrapper, { opacity: up });
	}
	hs.animate( this.wrapper, to.wrapper, {
		duration: dur,
		easing: easing,
		step: function(val, args) {
			if (exp.outline && exp.outlineWhileAnimating && args.prop == 'top') {
				var fac = up ? args.pos : 1 - args.pos;
				var pos = {
					w: x.t + (x.get('wsize') - x.t) * fac,
					h: y.t + (y.get('wsize') - y.t) * fac,
					x: x.tpos + (x.pos - x.tpos) * fac,
					y: y.tpos + (y.pos - y.tpos) * fac
				};
				exp.outline.setPosition(pos, 0, 1);				
			}
			if (exp.isHtml) {	
				if (args.prop == 'left') 
					exp.mediumContent.style.left = (x.pos - val) +'px';
				if (args.prop == 'top') 
					exp.mediumContent.style.top = (y.pos - val) +'px';
			}
		}
	});
	hs.animate( this.content, to.content, dur, easing, after);
	if (up) {
		this.wrapper.style.visibility = 'visible';
		this.content.style.visibility = 'visible';
		if (this.isHtml) this.innerContent.style.visibility = 'visible';
	}
},



fade : function(up, to) {
	this.outlineWhileAnimating = false;
	var exp = this,	t = up ? hs.expandDuration : 0;
	
	if (up) {
		hs.animate(this.wrapper, to.wrapper, 0);
		hs.setStyles(this.wrapper, { opacity: 0, visibility: 'visible' });
		hs.animate(this.content, to.content, 0);
		this.content.style.visibility = 'visible';

		hs.animate(this.wrapper, { opacity: 1 }, t, null, 
			function() { exp.afterExpand(); });
	}
	
	if (this.outline) {
		this.outline.table.style.zIndex = this.wrapper.style.zIndex;
		var dir = up || -1, 
			offset = this.outline.offset,
			startOff = up ? 3 : offset,
			endOff = up? offset : 3;
		for (var i = startOff; dir * i <= dir * endOff; i += dir, t += 25) {
			(function() {
				var o = up ? endOff - i : startOff - i;
				setTimeout(function() {
					exp.outline.setPosition(0, o, 1);
				}, t);
			})();
		}
	}
	
	
	if (up) {}//setTimeout(function() { exp.afterExpand(); }, t+50);
	else {
		setTimeout( function() {
			if (exp.outline) exp.outline.destroy(exp.preserveContent);
			
			exp.destroyOverlays();
	
			hs.animate( exp.wrapper, { opacity: 0 }, hs.restoreDuration, null, function(){
				exp.afterClose();
			});
		}, t);		
	}
},
crossfade : function (up, to, from) {
	if (!up) return;
	var exp = this, 
		last = this.last,
		x = this.x,
		y = this.y,
		lastX = last.x,
		lastY = last.y,
		wrapper = this.wrapper,
		content = this.content,
		overlayBox = this.overlayBox;
	hs.removeEventListener(document, 'mousemove', hs.dragHandler);
	
	hs.setStyles(content, { 
		width: (x.imgSize || x.size) +'px', 
		height: (y.imgSize || y.size) +'px'		
	});
	if (overlayBox) overlayBox.style.overflow = 'visible';
	this.outline = last.outline;
	if (this.outline) this.outline.exp = exp;
	last.outline = null;
	var fadeBox = hs.createElement('div', {
			className: 'highslide-'+ this.contentType
		}, { 
			position: 'absolute', 
			zIndex: 4,
			overflow: 'hidden',
			display: 'none'
		}
	);
	var names = { oldImg: last, newImg: this };
	for (var n in names) { 	
		this[n] = names[n].content.cloneNode(1);
		hs.setStyles(this[n], {
			position: 'absolute',
			border: 0,
			visibility: 'visible'
		});
		fadeBox.appendChild(this[n]);
	}
	wrapper.appendChild(fadeBox);
	if (this.isHtml) hs.setStyles(this.mediumContent, { 
		left: 0,
		top: 0
	});
	if (overlayBox) {
		overlayBox.className = '';
		wrapper.appendChild(overlayBox);
	}
	fadeBox.style.display = '';
	last.content.style.display = 'none';
	
	
	if (hs.safari) {
		var match = navigator.userAgent.match(/Safari\/([0-9]{3})/);
		if (match && parseInt(match[1]) < 525) this.wrapper.style.visibility = 'visible';
	}
	hs.animate(wrapper, {
		width: x.size
	}, {
		duration: hs.transitionDuration, 
		step: function(val, args) {
			var pos = args.pos,
				invPos = 1 - pos;
			var prop,
				size = {}, 
				props = ['pos', 'size', 'p1', 'p2'];
			for (var n in props) {
				prop = props[n];
				size['x'+ prop] = Math.round(invPos * lastX[prop] + pos * x[prop]);
				size['y'+ prop] = Math.round(invPos * lastY[prop] + pos * y[prop]);
				size.ximgSize = Math.round(
					invPos * (lastX.imgSize || lastX.size) + pos * (x.imgSize || x.size));
				size.ximgPad = Math.round(invPos * lastX.get('imgPad') + pos * x.get('imgPad'));
				size.yimgSize = Math.round(
					invPos * (lastY.imgSize || lastY.size) + pos * (y.imgSize || y.size));
				size.yimgPad = Math.round(invPos * lastY.get('imgPad') + pos * y.get('imgPad'));
			}
			if (exp.outline) exp.outline.setPosition({ 
				x: size.xpos, 
				y: size.ypos, 
				w: size.xsize + size.xp1 + size.xp2 + 2 * x.cb, 
				h: size.ysize + size.yp1 + size.yp2 + 2 * y.cb
			});
			last.wrapper.style.clip = 'rect('
				+ (size.ypos - lastY.pos)+'px, '
				+ (size.xsize + size.xp1 + size.xp2 + size.xpos + 2 * lastX.cb - lastX.pos) +'px, '
				+ (size.ysize + size.yp1 + size.yp2 + size.ypos + 2 * lastY.cb - lastY.pos) +'px, '
				+ (size.xpos - lastX.pos)+'px)';
				
			hs.setStyles(content, {
				top: (size.yp1 + y.get('imgPad')) +'px',
				left: (size.xp1 + x.get('imgPad')) +'px',
				marginTop: (y.pos - size.ypos) +'px',
				marginLeft: (x.pos - size.xpos) +'px'
			});
			hs.setStyles(wrapper, {
				top: size.ypos +'px',
				left: size.xpos +'px',
				width: (size.xp1 + size.xp2 + size.xsize + 2 * x.cb)+ 'px',
				height: (size.yp1 + size.yp2 + size.ysize + 2 * y.cb) + 'px'
			});
			hs.setStyles(fadeBox, {
				width: (size.ximgSize || size.xsize) + 'px',
				height: (size.yimgSize || size.ysize) +'px',
				left: (size.xp1 + size.ximgPad)  +'px',
				top: (size.yp1 + size.yimgPad) +'px',
				visibility: 'visible'
			});
			
			hs.setStyles(exp.oldImg, {
				top: (lastY.pos - size.ypos + lastY.p1 - size.yp1 + lastY.get('imgPad') - size.yimgPad)+'px',
				left: (lastX.pos - size.xpos + lastX.p1 - size.xp1 + lastX.get('imgPad') - size.ximgPad)+'px'
			});		
			
			hs.setStyles(exp.newImg, {
				opacity: pos,
				top: (y.pos - size.ypos + y.p1 - size.yp1 + y.get('imgPad') - size.yimgPad) +'px',
				left: (x.pos - size.xpos + x.p1 - size.xp1 + x.get('imgPad') - size.ximgPad) +'px'
			});
			if (overlayBox) hs.setStyles(overlayBox, {
				width: size.xsize + 'px',
				height: size.ysize +'px',
				left: (size.xp1 + x.cb)  +'px',
				top: (size.yp1 + y.cb) +'px'
			});
		},
		complete: function () {
			wrapper.style.visibility = content.style.visibility = 'visible';
			content.style.display = 'block';
			hs.discardElement(fadeBox);
			exp.afterExpand();
			last.afterClose();
			exp.last = null;
		}
		
	});
},
reuseOverlay : function(o, el) {
	if (!this.last) return false;
	for (var i = 0; i < this.last.overlays.length; i++) {
		var oDiv = hs.$('hsId'+ this.last.overlays[i]);
		if (oDiv && oDiv.hsId == o.hsId) {
			this.genOverlayBox();
			oDiv.reuse = this.key;
			hs.push(this.overlays, this.last.overlays[i]);
			return true;
		}
	}
	return false;
},


afterExpand : function() {
	this.isExpanded = true;
	
	this.a.className += ' highslide-active-anchor';	
	this.focus();
	
	if (this.isHtml && this.objectLoadTime == 'after') this.writeExtendedContent();
	if (this.iframe) {
		try {
			var exp = this,
				doc = this.iframe.contentDocument || this.iframe.contentWindow.document;
			hs.addEventListener(doc, 'mousedown', function () {
				if (hs.focusKey != exp.key) exp.focus();
			});
		} catch(e) {}
		if (hs.ie && typeof this.isClosing != 'boolean') // first open 
			this.iframe.style.width = (this.objectWidth - 1) +'px'; // hasLayout
	}
	if (this.dimmingOpacity) hs.dim(this);
	if (hs.upcoming && hs.upcoming == this.a) hs.upcoming = null;
	this.prepareNextOutline();
	var p = hs.page, mX = hs.mouse.x + p.scrollLeft, mY = hs.mouse.y + p.scrollTop;
	this.mouseIsOver = this.x.pos < mX && mX < this.x.pos + this.x.get('wsize')
		&& this.y.pos < mY && mY < this.y.pos + this.y.get('wsize');	
	if (this.overlayBox) this.showOverlays();
	hs.fireEvent(this, 'onAfterExpand');
	
},


prepareNextOutline : function() {
	var key = this.key;
	var outlineType = this.outlineType;
	new hs.Outline(outlineType, 
		function () { try { hs.expanders[key].preloadNext(); } catch (e) {} });
},


preloadNext : function() {
	var next = this.getAdjacentAnchor(1);
	if (next && next.onclick.toString().match(/hs\.expand/)) 
		var img = hs.createElement('img', { src: hs.getSrc(next) });
},


getAdjacentAnchor : function(op) {
	var current = this.getAnchorIndex(), as = hs.anchors.groups[this.slideshowGroup || 'none'];
	
	
	if (!as[current + op] && this.slideshow && this.slideshow.repeat) {
		if (op == 1) return as[0];
		else if (op == -1) return as[as.length-1];
	}
	
	return as[current + op] || null;
},

getAnchorIndex : function() {
	var arr = hs.getAnchors().groups[this.slideshowGroup || 'none'];
	if (arr) for (var i = 0; i < arr.length; i++) {
		if (arr[i] == this.a) return i; 
	}
	return null;
},


getNumber : function() {
	if (this[this.numberPosition]) {
		var arr = hs.anchors.groups[this.slideshowGroup || 'none'];
		if (arr) {
			var s = hs.lang.number.replace('%1', this.getAnchorIndex() + 1).replace('%2', arr.length);
			this[this.numberPosition].innerHTML = 
				'<div class="highslide-number">'+ s +'</div>'+ this[this.numberPosition].innerHTML;
		}
	}
},
initSlideshow : function() {
	if (!this.last) {
		for (var i = 0; i < hs.slideshows.length; i++) {
			var ss = hs.slideshows[i], sg = ss.slideshowGroup;
			if (typeof sg == 'undefined' || sg === null || sg === this.slideshowGroup) 
				this.slideshow = new hs.Slideshow(this.key, ss);
		} 
	} else {
		this.slideshow = this.last.slideshow;
	}
	var ss = this.slideshow;
	if (!ss) return;
	var key = ss.expKey = this.key;
	
	ss.checkFirstAndLast();
	ss.disable('full-expand');
	if (ss.controls) {
		this.createOverlay(hs.extend(ss.overlayOptions || {}, {
			overlayId: ss.controls,
			hsId: 'controls',
			zIndex: 5
		}));
	}
	if (ss.thumbstrip) ss.thumbstrip.add(this);
	if (!this.last && this.autoplay) ss.play(true);
	if (ss.autoplay) {
		ss.autoplay = setTimeout(function() {
			hs.next(key);
		}, (ss.interval || 500));
	}
},

cancelLoading : function() {
	hs.discardElement (this.wrapper);
	hs.expanders[this.key] = null;
	if (hs.upcoming == this.a) hs.upcoming = null;
	hs.undim(this.key);
	if (this.loading) hs.loading.style.left = '-9999px';
	hs.fireEvent(this, 'onHideLoading');
},

writeCredits : function () {
	if (this.credits) return;
	this.credits = hs.createElement('a', {
		href: hs.creditsHref,
		target: hs.creditsTarget,
		className: 'highslide-credits',
		innerHTML: hs.lang.creditsText,
		title: hs.lang.creditsTitle
	});
	this.createOverlay({ 
		overlayId: this.credits, 
		position: this.creditsPosition || 'top left', 
		hsId: 'credits' 
	});
},

getInline : function(types, addOverlay) {
	for (var i = 0; i < types.length; i++) {
		var type = types[i], s = null;
		if (type == 'caption' && !hs.fireEvent(this, 'onBeforeGetCaption')) return;
		else if (type == 'heading' && !hs.fireEvent(this, 'onBeforeGetHeading')) return;
		if (!this[type +'Id'] && this.thumbsUserSetId)  
			this[type +'Id'] = type +'-for-'+ this.thumbsUserSetId;
		if (this[type +'Id']) this[type] = hs.getNode(this[type +'Id']);
		if (!this[type] && !this[type +'Text'] && this[type +'Eval']) try {
			s = eval(this[type +'Eval']);
		} catch (e) {}
		if (!this[type] && this[type +'Text']) {
			s = this[type +'Text'];
		}
		if (!this[type] && !s) {
			this[type] = hs.getNode(this.a['_'+ type + 'Id']);
			if (!this[type]) {
				var next = this.a.nextSibling;
				while (next && !hs.isHsAnchor(next)) {
					if ((new RegExp('highslide-'+ type)).test(next.className || null)) {
						if (!next.id) this.a['_'+ type + 'Id'] = next.id = 'hsId'+ hs.idCounter++;
						this[type] = hs.getNode(next.id);
						break;
					}
					next = next.nextSibling;
				}
			}
		}
		if (!this[type] && !s && this.numberPosition == type) s = '\n';
		
		if (!this[type] && s) this[type] = hs.createElement('div', 
				{ className: 'highslide-'+ type, innerHTML: s } );
		
		if (addOverlay && this[type]) {
			var o = { position: (type == 'heading') ? 'above' : 'below' };
			for (var x in this[type+'Overlay']) o[x] = this[type+'Overlay'][x];
			o.overlayId = this[type];
			this.createOverlay(o);
		}
	}
},


// on end move and resize
doShowHide : function(visibility) {
	if (hs.hideSelects) this.showHideElements('SELECT', visibility);
	if (hs.hideIframes) this.showHideElements('IFRAME', visibility);
	if (hs.geckoMac) this.showHideElements('*', visibility);
},
showHideElements : function (tagName, visibility) {
	var els = document.getElementsByTagName(tagName);
	var prop = tagName == '*' ? 'overflow' : 'visibility';
	for (var i = 0; i < els.length; i++) {
		if (prop == 'visibility' || (document.defaultView.getComputedStyle(
				els[i], "").getPropertyValue('overflow') == 'auto'
				|| els[i].getAttribute('hidden-by') != null)) {
			var hiddenBy = els[i].getAttribute('hidden-by');
			if (visibility == 'visible' && hiddenBy) {
				hiddenBy = hiddenBy.replace('['+ this.key +']', '');
				els[i].setAttribute('hidden-by', hiddenBy);
				if (!hiddenBy) els[i].style[prop] = els[i].origProp;
			} else if (visibility == 'hidden') { // hide if behind
				var elPos = hs.getPosition(els[i]);
				elPos.w = els[i].offsetWidth;
				elPos.h = els[i].offsetHeight;
				if (!this.dimmingOpacity) { // hide all if dimming
				
					var clearsX = (elPos.x + elPos.w < this.x.get('opos') 
						|| elPos.x > this.x.get('opos') + this.x.get('osize'));
					var clearsY = (elPos.y + elPos.h < this.y.get('opos') 
						|| elPos.y > this.y.get('opos') + this.y.get('osize'));
				}
				var wrapperKey = hs.getWrapperKey(els[i]);
				if (!clearsX && !clearsY && wrapperKey != this.key) { // element falls behind image
					if (!hiddenBy) {
						els[i].setAttribute('hidden-by', '['+ this.key +']');
						els[i].origProp = els[i].style[prop];
						els[i].style[prop] = 'hidden';
						
					} else if (hiddenBy.indexOf('['+ this.key +']') == -1) {
						els[i].setAttribute('hidden-by', hiddenBy + '['+ this.key +']');
					}
				} else if ((hiddenBy == '['+ this.key +']' || hs.focusKey == wrapperKey)
						&& wrapperKey != this.key) { // on move
					els[i].setAttribute('hidden-by', '');
					els[i].style[prop] = els[i].origProp || '';
				} else if (hiddenBy && hiddenBy.indexOf('['+ this.key +']') > -1) {
					els[i].setAttribute('hidden-by', hiddenBy.replace('['+ this.key +']', ''));
				}
						
			}
		}
	}
},

focus : function() {
	this.wrapper.style.zIndex = hs.zIndexCounter += 2;
	// blur others
	for (var i = 0; i < hs.expanders.length; i++) {
		if (hs.expanders[i] && i == hs.focusKey) {
			var blurExp = hs.expanders[i];
			blurExp.content.className += ' highslide-'+ blurExp.contentType +'-blur';
			if (blurExp.isImage) {
				blurExp.content.style.cursor = hs.ie ? 'hand' : 'pointer';
				blurExp.content.title = hs.lang.focusTitle;	
			}	
			hs.fireEvent(blurExp, 'onBlur');
		}
	}
	
	// focus this
	if (this.outline) this.outline.table.style.zIndex 
		= this.wrapper.style.zIndex - 1;
	this.content.className = 'highslide-'+ this.contentType;
	if (this.isImage) {
		this.content.title = hs.lang.restoreTitle;
		
		if (hs.restoreCursor) {
			hs.styleRestoreCursor = window.opera ? 'pointer' : 'url('+ hs.graphicsDir + hs.restoreCursor +'), pointer';
			if (hs.ie && hs.uaVersion < 6) hs.styleRestoreCursor = 'hand';
			this.content.style.cursor = hs.styleRestoreCursor;
		}
	}
	hs.focusKey = this.key;	
	hs.addEventListener(document, window.opera ? 'keypress' : 'keydown', hs.keyHandler);	
	hs.fireEvent(this, 'onFocus');	
},
moveTo: function(x, y) {
	this.x.setPos(x);
	this.y.setPos(y);
},
resize : function (e) {
	var w, h, r = e.width / e.height;
	w = Math.max(e.width + e.dX, Math.min(this.minWidth, this.x.full));
	if (this.isImage && Math.abs(w - this.x.full) < 12) w = this.x.full;
	h = this.isHtml ? e.height + e.dY : w / r;
	if (h < Math.min(this.minHeight, this.y.full)) {
		h = Math.min(this.minHeight, this.y.full);
		if (this.isImage) w = h * r;
	}
	this.resizeTo(w, h);
},
resizeTo: function(w, h) {
	this.y.setSize(h);
	this.x.setSize(w);
	this.wrapper.style.height = this.y.get('wsize') +'px';
},

close : function() {
	if (this.isClosing || !this.isExpanded) return;
	if (this.transitions[1] == 'crossfade' && hs.upcoming) {
		hs.getExpander(hs.upcoming).cancelLoading();
		hs.upcoming = null;
	}
	if (!hs.fireEvent(this, 'onBeforeClose')) return;
	this.isClosing = true;
	if (this.slideshow && !hs.upcoming) this.slideshow.pause();
	
	hs.removeEventListener(document, window.opera ? 'keypress' : 'keydown', hs.keyHandler);
	
	try {
		if (this.isHtml) this.htmlPrepareClose();
		this.content.style.cursor = 'default';
		this.changeSize(
			0, {
				wrapper: {
					width : this.x.t,
					height : this.y.t,
					left: this.x.tpos - this.x.cb + this.x.tb,
					top: this.y.tpos - this.y.cb + this.y.tb
				},
				content: {
					left: 0,
					top: 0,
					width: this.x.t,
					height: this.y.t
				}
			}, hs.restoreDuration
		);
	} catch (e) { this.afterClose(); }
},

htmlPrepareClose : function() {
	if (hs.geckoMac) { // bad redraws
		if (!hs.mask) hs.mask = hs.createElement('div', null, 
			{ position: 'absolute' }, hs.container);
		hs.setStyles(hs.mask, { width: this.x.size +'px', height: this.y.size +'px', 
			left: this.x.pos +'px', top: this.y.pos +'px', display: 'block' });			
	}
	if (this.objectType == 'swf') try { hs.$(this.body.id).StopPlay(); } catch (e) {}
	
	if (this.objectLoadTime == 'after' && !this.preserveContent) this.destroyObject();		
	if (this.scrollerDiv && this.scrollerDiv != this.scrollingContent) 
		this.scrollerDiv.style.overflow = 'hidden';
},

destroyObject : function () {
	if (hs.ie && this.iframe)
		try { this.iframe.contentWindow.document.body.innerHTML = ''; } catch (e) {}
	if (this.objectType == 'swf') swfobject.removeSWF(this.body.id);
	this.body.innerHTML = '';
},

sleep : function() {
	if (this.outline) this.outline.table.style.display = 'none';
	this.releaseMask = null;
	this.wrapper.style.display = 'none';
	hs.push(hs.sleeping, this);
},

awake : function() {try {
	
	hs.expanders[this.key] = this;
	
	if (!hs.allowMultipleInstances &&hs.focusKey != this.key) {	
		try { hs.expanders[hs.focusKey].close(); } catch (e){}
	}
	
	var z = hs.zIndexCounter++, stl = { display: '', zIndex: z };
	hs.setStyles (this.wrapper, stl);
	this.isClosing = false;
	
	var o = this.outline || 0;
	if (o) {
		if (!this.outlineWhileAnimating) stl.visibility = 'hidden';
		hs.setStyles (o.table, stl);		
	}
	if (this.slideshow) {
		this.initSlideshow();
	}
		
	this.show();
} catch (e) {}


},

createOverlay : function (o) {
	var el = o.overlayId, 
		relToVP = (o.relativeTo == 'viewport' && !/panel$/.test(o.position));
	if (typeof el == 'string') el = hs.getNode(el);
	if (o.html) el = hs.createElement('div', { innerHTML: o.html });
	if (!el || typeof el == 'string') return;
	if (!hs.fireEvent(this, 'onCreateOverlay', { overlay: el })) return;
	el.style.display = 'block';
	o.hsId = o.hsId || o.overlayId; 
	if (this.transitions[1] == 'crossfade' && this.reuseOverlay(o, el)) return;
	this.genOverlayBox();
	var width = o.width && /^[0-9]+(px|%)$/.test(o.width) ? o.width : 'auto';
	if (/^(left|right)panel$/.test(o.position) && !/^[0-9]+px$/.test(o.width)) width = '200px';
	var overlay = hs.createElement(
		'div', {
			id: 'hsId'+ hs.idCounter++,
			hsId: o.hsId
		}, {
			position: 'absolute',
			visibility: 'hidden',
			width: width,
			direction: hs.lang.cssDirection || '',
			opacity: 0
		},
		relToVP ? hs.viewport :this.overlayBox,
		true
	);
	if (relToVP) overlay.hsKey = this.key;
	
	overlay.appendChild(el);
	hs.extend(overlay, {
		opacity: 1,
		offsetX: 0,
		offsetY: 0,
		dur: (o.fade === 0 || o.fade === false || (o.fade == 2 && hs.ie)) ? 0 : 250
	});
	hs.extend(overlay, o);
	
		
	if (this.gotOverlays) {
		this.positionOverlay(overlay);
		if (!overlay.hideOnMouseOut || this.mouseIsOver) 
			hs.animate(overlay, { opacity: overlay.opacity }, overlay.dur);
	}
	hs.push(this.overlays, hs.idCounter - 1);
},
positionOverlay : function(overlay) {
	var p = overlay.position || 'middle center',
		relToVP = (overlay.relativeTo == 'viewport'),
		offX = overlay.offsetX,
		offY = overlay.offsetY;
	if (relToVP) {
		hs.viewport.style.display = 'block';
		overlay.hsKey = this.key;
		if (overlay.offsetWidth > overlay.parentNode.offsetWidth)
			overlay.style.width = '100%';
	} else
	if (overlay.parentNode != this.overlayBox) this.overlayBox.appendChild(overlay);
	if (/left$/.test(p)) overlay.style.left = offX +'px'; 
	
	if (/center$/.test(p))	hs.setStyles (overlay, { 
		left: '50%',
		marginLeft: (offX - Math.round(overlay.offsetWidth / 2)) +'px'
	});	
	
	if (/right$/.test(p)) overlay.style.right = - offX +'px';
		
	if (/^leftpanel$/.test(p)) { 
		hs.setStyles(overlay, {
			right: '100%',
			marginRight: this.x.cb +'px',
			top: - this.y.cb +'px',
			bottom: - this.y.cb +'px',
			overflow: 'auto'
		});		 
		this.x.p1 = overlay.offsetWidth;
	
	} else if (/^rightpanel$/.test(p)) {
		hs.setStyles(overlay, {
			left: '100%',
			marginLeft: this.x.cb +'px',
			top: - this.y.cb +'px',
			bottom: - this.y.cb +'px',
			overflow: 'auto'
		});
		this.x.p2 = overlay.offsetWidth;
	}
	var parOff = overlay.parentNode.offsetHeight;
	overlay.style.height = 'auto';
	if (relToVP && overlay.offsetHeight > parOff)
		overlay.style.height = hs.ieLt7 ? parOff +'px' : '100%';

	if (/^top/.test(p)) overlay.style.top = offY +'px'; 
	if (/^middle/.test(p))	hs.setStyles (overlay, { 
		top: '50%', 
		marginTop: (offY - Math.round(overlay.offsetHeight / 2)) +'px'
	});	
	if (/^bottom/.test(p)) overlay.style.bottom = - offY +'px';
	if (/^above$/.test(p)) {
		hs.setStyles(overlay, {
			left: (- this.x.p1 - this.x.cb) +'px',
			right: (- this.x.p2 - this.x.cb) +'px',
			bottom: '100%',
			marginBottom: this.y.cb +'px',
			width: 'auto'
		});
		this.y.p1 = overlay.offsetHeight;
	
	} else if (/^below$/.test(p)) {
		hs.setStyles(overlay, {
			position: 'relative',
			left: (- this.x.p1 - this.x.cb) +'px',
			right: (- this.x.p2 - this.x.cb) +'px',
			top: '100%',
			marginTop: this.y.cb +'px',
			width: 'auto'
		});
		this.y.p2 = overlay.offsetHeight;
		overlay.style.position = 'absolute';
	}
},

getOverlays : function() {	
	this.getInline(['heading', 'caption'], true);
	this.getNumber();
	if (this.caption) hs.fireEvent(this, 'onAfterGetCaption');
	if (this.heading) hs.fireEvent(this, 'onAfterGetHeading');
	if (this.heading && this.dragByHeading) this.heading.className += ' highslide-move';
	if (hs.showCredits) this.writeCredits();
	for (var i = 0; i < hs.overlays.length; i++) {
		var o = hs.overlays[i], tId = o.thumbnailId, sg = o.slideshowGroup;
		if ((!tId && !sg) || (tId && tId == this.thumbsUserSetId)
				|| (sg && sg === this.slideshowGroup)) {
			if (this.isImage || (this.isHtml && o.useOnHtml))
			this.createOverlay(o);
		}
	}
	var os = [];
	for (var i = 0; i < this.overlays.length; i++) {
		var o = hs.$('hsId'+ this.overlays[i]);
		if (/panel$/.test(o.position)) this.positionOverlay(o);
		else hs.push(os, o);
	}
	for (var i = 0; i < os.length; i++) this.positionOverlay(os[i]);
	this.gotOverlays = true;
},
genOverlayBox : function() {
	if (!this.overlayBox) this.overlayBox = hs.createElement (
		'div', {
			className: this.wrapperClassName
		}, {
			position : 'absolute',
			width: (this.x.size || (this.useBox ? this.width : null) 
				|| this.x.full) +'px',
			height: (this.y.size || this.y.full) +'px',
			visibility : 'hidden',
			overflow : 'hidden',
			zIndex : hs.ie ? 4 : 'auto'
		},
		hs.container,
		true
	);
},
sizeOverlayBox : function(doWrapper, doPanels) {
	var overlayBox = this.overlayBox, 
		x = this.x,
		y = this.y;
	hs.setStyles( overlayBox, {
		width: x.size +'px', 
		height: y.size +'px'
	});
	if (doWrapper || doPanels) {
		for (var i = 0; i < this.overlays.length; i++) {
			var o = hs.$('hsId'+ this.overlays[i]);
			var ie6 = (hs.ieLt7 || document.compatMode == 'BackCompat');
			if (o && /^(above|below)$/.test(o.position)) {
				if (ie6) {
					o.style.width = (overlayBox.offsetWidth + 2 * x.cb
						+ x.p1 + x.p2) +'px';
				}
				y[o.position == 'above' ? 'p1' : 'p2'] = o.offsetHeight;
			}
			if (o && ie6 && /^(left|right)panel$/.test(o.position)) {
				o.style.height = (overlayBox.offsetHeight + 2* y.cb) +'px';
			}
		}
	}
	if (doWrapper) {
		hs.setStyles(this.content, {
			top: y.p1 +'px'
		});
		hs.setStyles(overlayBox, {
			top: (y.p1 + y.cb) +'px'
		});
	}
},

showOverlays : function() {
	var b = this.overlayBox;
	b.className = '';
	hs.setStyles(b, {
		top: (this.y.p1 + this.y.cb) +'px',
		left: (this.x.p1 + this.x.cb) +'px',
		overflow : 'visible'
	});
	if (hs.safari) b.style.visibility = 'visible';
	this.wrapper.appendChild (b);
	for (var i = 0; i < this.overlays.length; i++) {
		var o = hs.$('hsId'+ this.overlays[i]);
		o.style.zIndex = o.zIndex || 4;
		if (!o.hideOnMouseOut || this.mouseIsOver) {
			o.style.visibility = 'visible';
			hs.setStyles(o, { visibility: 'visible', display: '' });
			hs.animate(o, { opacity: o.opacity }, o.dur);
		}
	}
},

destroyOverlays : function() {
	if (!this.overlays.length) return;
	if (this.slideshow) {
		var c = this.slideshow.controls;
		if (c && hs.getExpander(c) == this) c.parentNode.removeChild(c);
	}
	for (var i = 0; i < this.overlays.length; i++) {
		var o = hs.$('hsId'+ this.overlays[i]);
		if (o && o.parentNode == hs.viewport && hs.getExpander(o) == this) hs.discardElement(o);
	}
	if (this.isHtml && this.preserveContent) {
		this.overlayBox.style.top = '-9999px';
		hs.container.appendChild(this.overlayBox);
	} else
	hs.discardElement(this.overlayBox);
},



createFullExpand : function () {
	if (this.slideshow && this.slideshow.controls) {
		this.slideshow.enable('full-expand');
		return;
	}
	this.fullExpandLabel = hs.createElement(
		'a', {
			href: 'javascript:hs.expanders['+ this.key +'].doFullExpand();',
			title: hs.lang.fullExpandTitle,
			className: 'highslide-full-expand'
		}
	);
	if (!hs.fireEvent(this, 'onCreateFullExpand')) return;
	
	this.createOverlay({ 
		overlayId: this.fullExpandLabel, 
		position: hs.fullExpandPosition, 
		hideOnMouseOut: true, 
		opacity: hs.fullExpandOpacity
	});
},

doFullExpand : function () {
	try {
		if (!hs.fireEvent(this, 'onDoFullExpand')) return;
		if (this.fullExpandLabel) hs.discardElement(this.fullExpandLabel);
		
		this.focus();
		var xSize = this.x.size;
		this.resizeTo(this.x.full, this.y.full);
		
		var xpos = this.x.pos - (this.x.size - xSize) / 2;
		if (xpos < hs.marginLeft) xpos = hs.marginLeft;
		
		this.moveTo(xpos, this.y.pos);
		this.doShowHide('hidden');
	
	} catch (e) {
		this.error(e);
	}
},


afterClose : function () {
	this.a.className = this.a.className.replace('highslide-active-anchor', '');
	
	this.doShowHide('visible');	
	
	if (this.isHtml && this.preserveContent
			 && this.transitions[1] != 'crossfade') {
		this.sleep();
	} else {
		if (this.outline && this.outlineWhileAnimating) this.outline.destroy();
	
		hs.discardElement(this.wrapper);
	}
	if (hs.mask) hs.mask.style.display = 'none';
	this.destroyOverlays();
	if (!hs.viewport.childNodes.length) hs.viewport.style.display = 'none';
	
	if (this.dimmingOpacity) hs.undim(this.key);
	hs.fireEvent(this, 'onAfterClose');
	hs.expanders[this.key] = null;		
	hs.reOrder();
}

};


// hs.Ajax object prototype
hs.Ajax = function (a, content, pre) {
	this.a = a;
	this.content = content;
	this.pre = pre;
};

hs.Ajax.prototype = {
run : function () {
	var xhr;
	if (!this.src) this.src = hs.getSrc(this.a);
	if (this.src.match('#')) {
		var arr = this.src.split('#');
		this.src = arr[0];
		this.id = arr[1];
	}
	if (hs.cachedGets[this.src]) {
		this.cachedGet = hs.cachedGets[this.src];
		if (this.id) this.getElementContent();
		else this.loadHTML();
		return;
	}
	try { xhr = new XMLHttpRequest(); }
	catch (e) {
		try { xhr = new ActiveXObject("Msxml2.XMLHTTP"); }
		catch (e) {
			try { xhr = new ActiveXObject("Microsoft.XMLHTTP"); }
			catch (e) { this.onError(); }
		}
	}
	var pThis = this; 
	xhr.onreadystatechange = function() {
		if(pThis.xhr.readyState == 4) {
			if (pThis.id) pThis.getElementContent();
			else pThis.loadHTML();
		}
	};
	var src = this.src;
	this.xhr = xhr;
	if (hs.forceAjaxReload) 
		src = src.replace(/$/, (/\?/.test(src) ? '&' : '?') +'dummy='+ (new Date()).getTime());
	xhr.open('GET', src, true);
	xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.send(null);
},

getElementContent : function() {
	hs.init();
	var attribs = window.opera || hs.ie6SSL ? { src: 'about:blank' } : null;
	
	this.iframe = hs.createElement('iframe', attribs, 
		{ position: 'absolute', top: '-9999px' }, hs.container);
		
	this.loadHTML();
},

loadHTML : function() {
	var s = this.cachedGet || this.xhr.responseText,
		regBody;
	if (this.pre) hs.cachedGets[this.src] = s;
	if (!hs.ie || hs.uaVersion >= 5.5) {
		s = s.replace(new RegExp('<link[^>]*>', 'gi'), '')
			.replace(new RegExp('<script[^>]*>.*?</script>', 'gi'), '');
		if (this.iframe) {
			var doc = this.iframe.contentDocument;
			if (!doc && this.iframe.contentWindow) doc = this.iframe.contentWindow.document;
			if (!doc) { // Opera
				var pThis = this;
				setTimeout(function() {	pThis.loadHTML(); }, 25);
				return;
			}
			doc.open();
			doc.write(s);
			doc.close();
			try { s = doc.getElementById(this.id).innerHTML; } catch (e) {
				try { s = this.iframe.document.getElementById(this.id).innerHTML; } catch (e) {} // opera
			}
			hs.discardElement(this.iframe);
		} else {
			regBody = /(<body[^>]*>|<\/body>)/ig;
			if (regBody.test(s)) s = s.split(regBody)[hs.ie ? 1 : 2];
			
		}
	}
	hs.getElementByClass(this.content, 'DIV', 'highslide-body').innerHTML = s;
	this.onLoad();
	for (var x in this) this[x] = null;
}
};


hs.Slideshow = function (expKey, options) {
	if (hs.dynamicallyUpdateAnchors !== false) hs.updateAnchors();
	this.expKey = expKey;
	for (var x in options) this[x] = options[x];
	if (this.useControls) this.getControls();
	if (this.thumbstrip) this.thumbstrip = hs.Thumbstrip(this);
};
hs.Slideshow.prototype = {
getControls: function() {
	this.controls = hs.createElement('div', { innerHTML: hs.replaceLang(hs.skin.controls) }, 
		null, hs.container);
	
	var buttons = ['play', 'pause', 'previous', 'next', 'move', 'full-expand', 'close'];
	this.btn = {};
	var pThis = this;
	for (var i = 0; i < buttons.length; i++) {
		this.btn[buttons[i]] = hs.getElementByClass(this.controls, 'li', 'highslide-'+ buttons[i]);
		this.enable(buttons[i]);
	}
	this.btn.pause.style.display = 'none';
	//this.disable('full-expand');
},
checkFirstAndLast: function() {
	if (this.repeat || !this.controls) return;
	var exp = hs.expanders[this.expKey],
		cur = exp.getAnchorIndex(), 
		re = /disabled$/;
	if (cur == 0) 
		this.disable('previous');
	else if (re.test(this.btn.previous.getElementsByTagName('a')[0].className))
		this.enable('previous');
	if (cur + 1 == hs.anchors.groups[exp.slideshowGroup || 'none'].length) {
		this.disable('next');
		this.disable('play');
	} else if (re.test(this.btn.next.getElementsByTagName('a')[0].className)) {
		this.enable('next');
		this.enable('play');
	}
},
enable: function(btn) {
	if (!this.btn) return;
	var sls = this, a = this.btn[btn].getElementsByTagName('a')[0], re = /disabled$/;
	a.onclick = function() {
		sls[btn]();
		return false;
	};
	if (re.test(a.className)) a.className = a.className.replace(re, '');
},
disable: function(btn) {
	if (!this.btn) return;
	var a = this.btn[btn].getElementsByTagName('a')[0];
	a.onclick = function() { return false; };
	if (!/disabled$/.test(a.className)) a.className += ' disabled';
},
hitSpace: function() {
	if (this.autoplay) this.pause();
	else this.play();
},
play: function(wait) {
	if (this.btn) {
		this.btn.play.style.display = 'none';
		this.btn.pause.style.display = '';
	}
	
	this.autoplay = true;	
	if (!wait) hs.next(this.expKey);
},
pause: function() {
	if (this.btn) {
		this.btn.pause.style.display = 'none';
		this.btn.play.style.display = '';
	}
	
	clearTimeout(this.autoplay);
	this.autoplay = null;
},
previous: function() {
	this.pause();
	hs.previous(this.btn.previous);
},
next: function() {
	this.pause();
	hs.next(this.btn.next);
},
move: function() {},
'full-expand': function() {
	hs.getExpander().doFullExpand();
},
close: function() {
	hs.close(this.btn.close);
}
};
hs.Thumbstrip = function(slideshow) {
	function add (exp) {
		hs.extend(options || {}, {
			overlayId: dom,
			hsId: 'thumbstrip',
			className: 'highslide-thumbstrip-'+ mode +'-overlay ' + (options.className || '')
		});
		if (hs.ieLt7) options.fade = 0;
		exp.createOverlay(options);
		hs.setStyles(dom.parentNode, { overflow: 'hidden' });
	};
	
	function scroll (delta) {	
		selectThumb(undefined, Math.round(delta * dom[isX ? 'offsetWidth' : 'offsetHeight'] * 0.7));
	};
	
	function selectThumb (i, scrollBy) {
		if (i === undefined) for (var j = 0; j < group.length; j++) {
			if (group[j] == hs.expanders[slideshow.expKey].a) {
				i = j;
				break;
			}
		}
		if (i === undefined) return;
		var as = dom.getElementsByTagName('a'),
			active = as[i],
			cell = active.parentNode,
			left = isX ? 'Left' : 'Top',
			right = isX ? 'Right' : 'Bottom',
			width = isX ? 'Width' : 'Height',
			offsetLeft = 'offset' + left,
			offsetWidth = 'offset' + width,
			overlayWidth = div.parentNode.parentNode[offsetWidth],
			minTblPos = overlayWidth - table[offsetWidth],
			curTblPos = parseInt(table.style[isX ? 'left' : 'top']) || 0,
			tblPos = curTblPos,
			mgnRight = 20;
		if (scrollBy !== undefined) {
			tblPos = curTblPos - scrollBy;
			
			if (minTblPos > 0) minTblPos = 0;
			if (tblPos > 0) tblPos = 0;
			if (tblPos < minTblPos) tblPos = minTblPos;
			
	
		} else {
			for (var j = 0; j < as.length; j++) as[j].className = '';
			active.className = 'highslide-active-anchor';
			var activeLeft = i > 0 ? as[i - 1].parentNode[offsetLeft] : cell[offsetLeft],
				activeRight = cell[offsetLeft] + cell[offsetWidth] + 
					(as[i + 1] ? as[i + 1].parentNode[offsetWidth] : 0);
			if (activeRight > overlayWidth - curTblPos) tblPos = overlayWidth - activeRight;
			else if (activeLeft < -curTblPos) tblPos = -activeLeft;
		}
		var markerPos = cell[offsetLeft] + (cell[offsetWidth] - marker[offsetWidth]) / 2 + tblPos;
		hs.animate(table, isX ? { left: tblPos } : { top: tblPos }, null, 'easeOutQuad');
		hs.animate(marker, isX ? { left: markerPos } : { top: markerPos }, null, 'easeOutQuad');
		scrollUp.style.display = tblPos < 0 ? 'block' : 'none';
		scrollDown.style.display = (tblPos > minTblPos)  ? 'block' : 'none';
		
	};
	

	// initialize
	var group = hs.anchors.groups[hs.expanders[slideshow.expKey].slideshowGroup || 'none'],
		options = slideshow.thumbstrip,
		mode = options.mode || 'horizontal',
		floatMode = (mode == 'float'),
		tree = floatMode ? ['div', 'ul', 'li', 'span'] : ['table', 'tbody', 'tr', 'td'],
		isX = (mode == 'horizontal'),
		dom = hs.createElement('div', {
				className: 'highslide-thumbstrip highslide-thumbstrip-'+ mode,
				innerHTML:
					'<div class="highslide-thumbstrip-inner">'+
					'<'+ tree[0] +'><'+ tree[1] +'></'+ tree[1] +'></'+ tree[0] +'></div>'+
					'<div class="highslide-scroll-up"><div></div></div>'+
					'<div class="highslide-scroll-down"><div></div></div>'+
					'<div class="highslide-marker"><div></div></div>'
			}, {
				display: 'none'
			}, hs.container),
		domCh = dom.childNodes,
		div = domCh[0],
		scrollUp = domCh[1],
		scrollDown = domCh[2],
		marker = domCh[3],
		table = div.firstChild,
		tbody = dom.getElementsByTagName(tree[1])[0],
		tr;
	for (var i = 0; i < group.length; i++) {
		if (i == 0 || !isX) tr = hs.createElement(tree[2], null, null, tbody);
		(function(){
			var a = group[i],
				cell = hs.createElement(tree[3], null, null, tr),
				pI = i;
			hs.createElement('a', {
				href: a.href,
				onclick: function() {
					hs.getExpander(this).focus();
					return hs.transit(a);
				},
				innerHTML: hs.stripItemFormatter ? hs.stripItemFormatter(a) : a.innerHTML
			}, null, cell);
		})();
	}
	if (!floatMode) {
		scrollUp.onclick = function () { scroll(-1); };
		scrollDown.onclick = function() { scroll(1); };
		hs.addEventListener(tbody, document.onmousewheel !== undefined ? 
				'mousewheel' : 'DOMMouseScroll', function(e) {        
			var delta = 0;
	        e = e || window.event;
	        if (e.wheelDelta) {
				delta = e.wheelDelta/120;
				if (hs.opera) delta = -delta;
	        } else if (e.detail) {
				delta = -e.detail/3;
	        }
	        if (delta) scroll(-delta * 0.2);
			if (e.preventDefault) e.preventDefault();
			e.returnValue = false;
		});
	}
	
	return {
		add: add,
		selectThumb: selectThumb
	}
};
hs.langDefaults = hs.lang;
// history
var HsExpander = hs.Expander;
if (hs.ie && window == window.top) {
	(function () {
		try {
			document.documentElement.doScroll('left');
		} catch (e) {
			setTimeout(arguments.callee, 50);
			return;
		}
		hs.ready();
	})();
}
hs.addEventListener(document, 'DOMContentLoaded', hs.ready);
hs.addEventListener(window, 'load', hs.ready);

// set handlers
hs.addEventListener(document, 'ready', function() {
	if (hs.expandCursor || hs.dimmingOpacity) {
		var style = hs.createElement('style', { type: 'text/css' }, null, 
			document.getElementsByTagName('HEAD')[0]);
			
		function addRule(sel, dec) {		
			if (!hs.ie) {
				style.appendChild(document.createTextNode(sel + " {" + dec + "}"));
			} else {
				var last = document.styleSheets[document.styleSheets.length - 1];
				if (typeof(last.addRule) == "object") last.addRule(sel, dec);
			}
		}
		function fix(prop) {
			return 'expression( ( ( ignoreMe = document.documentElement.'+ prop +
				' ? document.documentElement.'+ prop +' : document.body.'+ prop +' ) ) + \'px\' );';
		}
		if (hs.expandCursor) addRule ('.highslide img', 
			'cursor: url('+ hs.graphicsDir + hs.expandCursor +'), pointer !important;');
		addRule ('.highslide-viewport-size',
			hs.ie && (hs.uaVersion < 7 || document.compatMode == 'BackCompat') ?
				'position: absolute; '+
				'left:'+ fix('scrollLeft') +
				'top:'+ fix('scrollTop') +
				'width:'+ fix('clientWidth') +
				'height:'+ fix('clientHeight') :
				'position: fixed; width: 100%; height: 100%; left: 0; top: 0');
	}
});
hs.addEventListener(window, 'resize', function() {
	hs.getPageSize();
	if (hs.viewport) for (var i = 0; i < hs.viewport.childNodes.length; i++) {
		var node = hs.viewport.childNodes[i],
			exp = hs.getExpander(node);
		exp.positionOverlay(node);
		if (node.hsId == 'thumbstrip') exp.slideshow.thumbstrip.selectThumb();
	}
});
hs.addEventListener(document, 'mousemove', function(e) {
	hs.mouse = { x: e.clientX, y: e.clientY	};
});
hs.addEventListener(document, 'mousedown', hs.mouseClickHandler);
hs.addEventListener(document, 'mouseup', hs.mouseClickHandler);
hs.addEventListener(document, 'ready', hs.setClickEvents);
hs.addEventListener(window, 'load', hs.preloadImages);
hs.addEventListener(window, 'load', hs.preloadAjax);
}
hs.graphicsDir = 'http://www.highcharts.com/highslide/graphics/';
hs.outlineType = 'rounded-white';
hs.wrapperClassName = 'draggable-header';
hs.captionEval = 'this.a.title';
hs.showCredits = false;
hs.marginTop = 20;
hs.marginRight = 20;
hs.marginBottom = 20;
hs.marginLeft = 20;// Copyright 2006 Google Inc.
//
// Licensed under the Apache License, Version 2.0 (the "License");
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
//
//   http://www.apache.org/licenses/LICENSE-2.0
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
document.createElement("canvas").getContext||(function(){var s=Math,j=s.round,F=s.sin,G=s.cos,V=s.abs,W=s.sqrt,k=10,v=k/2;function X(){return this.context_||(this.context_=new H(this))}var L=Array.prototype.slice;function Y(b,a){var c=L.call(arguments,2);return function(){return b.apply(a,c.concat(L.call(arguments)))}}var M={init:function(b){if(/MSIE/.test(navigator.userAgent)&&!window.opera){var a=b||document;a.createElement("canvas");a.attachEvent("onreadystatechange",Y(this.init_,this,a))}},init_:function(b){b.namespaces.g_vml_||
b.namespaces.add("g_vml_","urn:schemas-microsoft-com:vml","#default#VML");b.namespaces.g_o_||b.namespaces.add("g_o_","urn:schemas-microsoft-com:office:office","#default#VML");if(!b.styleSheets.ex_canvas_){var a=b.createStyleSheet();a.owningElement.id="ex_canvas_";a.cssText="canvas{display:inline-block;overflow:hidden;text-align:left;width:300px;height:150px}g_vml_\\:*{behavior:url(#default#VML)}g_o_\\:*{behavior:url(#default#VML)}"}var c=b.getElementsByTagName("canvas"),d=0;for(;d<c.length;d++)this.initElement(c[d])},
initElement:function(b){if(!b.getContext){b.getContext=X;b.innerHTML="";b.attachEvent("onpropertychange",Z);b.attachEvent("onresize",$);var a=b.attributes;if(a.width&&a.width.specified)b.style.width=a.width.nodeValue+"px";else b.width=b.clientWidth;if(a.height&&a.height.specified)b.style.height=a.height.nodeValue+"px";else b.height=b.clientHeight}return b}};function Z(b){var a=b.srcElement;switch(b.propertyName){case "width":a.style.width=a.attributes.width.nodeValue+"px";a.getContext().clearRect();
break;case "height":a.style.height=a.attributes.height.nodeValue+"px";a.getContext().clearRect();break}}function $(b){var a=b.srcElement;if(a.firstChild){a.firstChild.style.width=a.clientWidth+"px";a.firstChild.style.height=a.clientHeight+"px"}}M.init();var N=[],B=0;for(;B<16;B++){var C=0;for(;C<16;C++)N[B*16+C]=B.toString(16)+C.toString(16)}function I(){return[[1,0,0],[0,1,0],[0,0,1]]}function y(b,a){var c=I(),d=0;for(;d<3;d++){var f=0;for(;f<3;f++){var h=0,g=0;for(;g<3;g++)h+=b[d][g]*a[g][f];c[d][f]=
h}}return c}function O(b,a){a.fillStyle=b.fillStyle;a.lineCap=b.lineCap;a.lineJoin=b.lineJoin;a.lineWidth=b.lineWidth;a.miterLimit=b.miterLimit;a.shadowBlur=b.shadowBlur;a.shadowColor=b.shadowColor;a.shadowOffsetX=b.shadowOffsetX;a.shadowOffsetY=b.shadowOffsetY;a.strokeStyle=b.strokeStyle;a.globalAlpha=b.globalAlpha;a.arcScaleX_=b.arcScaleX_;a.arcScaleY_=b.arcScaleY_;a.lineScale_=b.lineScale_}function P(b){var a,c=1;b=String(b);if(b.substring(0,3)=="rgb"){var d=b.indexOf("(",3),f=b.indexOf(")",d+
1),h=b.substring(d+1,f).split(",");a="#";var g=0;for(;g<3;g++)a+=N[Number(h[g])];if(h.length==4&&b.substr(3,1)=="a")c=h[3]}else a=b;return{color:a,alpha:c}}function aa(b){switch(b){case "butt":return"flat";case "round":return"round";case "square":default:return"square"}}function H(b){this.m_=I();this.mStack_=[];this.aStack_=[];this.currentPath_=[];this.fillStyle=this.strokeStyle="#000";this.lineWidth=1;this.lineJoin="miter";this.lineCap="butt";this.miterLimit=k*1;this.globalAlpha=1;this.canvas=b;
var a=b.ownerDocument.createElement("div");a.style.width=b.clientWidth+"px";a.style.height=b.clientHeight+"px";a.style.overflow="hidden";a.style.position="absolute";b.appendChild(a);this.element_=a;this.lineScale_=this.arcScaleY_=this.arcScaleX_=1}var i=H.prototype;i.clearRect=function(){this.element_.innerHTML=""};i.beginPath=function(){this.currentPath_=[]};i.moveTo=function(b,a){var c=this.getCoords_(b,a);this.currentPath_.push({type:"moveTo",x:c.x,y:c.y});this.currentX_=c.x;this.currentY_=c.y};
i.lineTo=function(b,a){var c=this.getCoords_(b,a);this.currentPath_.push({type:"lineTo",x:c.x,y:c.y});this.currentX_=c.x;this.currentY_=c.y};i.bezierCurveTo=function(b,a,c,d,f,h){var g=this.getCoords_(f,h),l=this.getCoords_(b,a),e=this.getCoords_(c,d);Q(this,l,e,g)};function Q(b,a,c,d){b.currentPath_.push({type:"bezierCurveTo",cp1x:a.x,cp1y:a.y,cp2x:c.x,cp2y:c.y,x:d.x,y:d.y});b.currentX_=d.x;b.currentY_=d.y}i.quadraticCurveTo=function(b,a,c,d){var f=this.getCoords_(b,a),h=this.getCoords_(c,d),g={x:this.currentX_+
0.6666666666666666*(f.x-this.currentX_),y:this.currentY_+0.6666666666666666*(f.y-this.currentY_)};Q(this,g,{x:g.x+(h.x-this.currentX_)/3,y:g.y+(h.y-this.currentY_)/3},h)};i.arc=function(b,a,c,d,f,h){c*=k;var g=h?"at":"wa",l=b+G(d)*c-v,e=a+F(d)*c-v,m=b+G(f)*c-v,r=a+F(f)*c-v;if(l==m&&!h)l+=0.125;var n=this.getCoords_(b,a),o=this.getCoords_(l,e),q=this.getCoords_(m,r);this.currentPath_.push({type:g,x:n.x,y:n.y,radius:c,xStart:o.x,yStart:o.y,xEnd:q.x,yEnd:q.y})};i.rect=function(b,a,c,d){this.moveTo(b,
a);this.lineTo(b+c,a);this.lineTo(b+c,a+d);this.lineTo(b,a+d);this.closePath()};i.strokeRect=function(b,a,c,d){var f=this.currentPath_;this.beginPath();this.moveTo(b,a);this.lineTo(b+c,a);this.lineTo(b+c,a+d);this.lineTo(b,a+d);this.closePath();this.stroke();this.currentPath_=f};i.fillRect=function(b,a,c,d){var f=this.currentPath_;this.beginPath();this.moveTo(b,a);this.lineTo(b+c,a);this.lineTo(b+c,a+d);this.lineTo(b,a+d);this.closePath();this.fill();this.currentPath_=f};i.createLinearGradient=function(b,
a,c,d){var f=new D("gradient");f.x0_=b;f.y0_=a;f.x1_=c;f.y1_=d;return f};i.createRadialGradient=function(b,a,c,d,f,h){var g=new D("gradientradial");g.x0_=b;g.y0_=a;g.r0_=c;g.x1_=d;g.y1_=f;g.r1_=h;return g};i.drawImage=function(b){var a,c,d,f,h,g,l,e,m=b.runtimeStyle.width,r=b.runtimeStyle.height;b.runtimeStyle.width="auto";b.runtimeStyle.height="auto";var n=b.width,o=b.height;b.runtimeStyle.width=m;b.runtimeStyle.height=r;if(arguments.length==3){a=arguments[1];c=arguments[2];h=g=0;l=d=n;e=f=o}else if(arguments.length==
5){a=arguments[1];c=arguments[2];d=arguments[3];f=arguments[4];h=g=0;l=n;e=o}else if(arguments.length==9){h=arguments[1];g=arguments[2];l=arguments[3];e=arguments[4];a=arguments[5];c=arguments[6];d=arguments[7];f=arguments[8]}else throw Error("Invalid number of arguments");var q=this.getCoords_(a,c),t=[];t.push(" <g_vml_:group",' coordsize="',k*10,",",k*10,'"',' coordorigin="0,0"',' style="width:',10,"px;height:",10,"px;position:absolute;");if(this.m_[0][0]!=1||this.m_[0][1]){var E=[];E.push("M11=",
this.m_[0][0],",","M12=",this.m_[1][0],",","M21=",this.m_[0][1],",","M22=",this.m_[1][1],",","Dx=",j(q.x/k),",","Dy=",j(q.y/k),"");var p=q,z=this.getCoords_(a+d,c),w=this.getCoords_(a,c+f),x=this.getCoords_(a+d,c+f);p.x=s.max(p.x,z.x,w.x,x.x);p.y=s.max(p.y,z.y,w.y,x.y);t.push("padding:0 ",j(p.x/k),"px ",j(p.y/k),"px 0;filter:progid:DXImageTransform.Microsoft.Matrix(",E.join(""),", sizingmethod='clip');")}else t.push("top:",j(q.y/k),"px;left:",j(q.x/k),"px;");t.push(' ">','<g_vml_:image src="',b.src,
'"',' style="width:',k*d,"px;"," height:",k*f,'px;"',' cropleft="',h/n,'"',' croptop="',g/o,'"',' cropright="',(n-h-l)/n,'"',' cropbottom="',(o-g-e)/o,'"'," />","</g_vml_:group>");this.element_.insertAdjacentHTML("BeforeEnd",t.join(""))};i.stroke=function(b){var a=[],c=P(b?this.fillStyle:this.strokeStyle),d=c.color,f=c.alpha*this.globalAlpha;a.push("<g_vml_:shape",' filled="',!!b,'"',' style="position:absolute;width:',10,"px;height:",10,'px;"',' coordorigin="0 0" coordsize="',k*10," ",k*10,'"',' stroked="',
!b,'"',' path="');var h={x:null,y:null},g={x:null,y:null},l=0;for(;l<this.currentPath_.length;l++){var e=this.currentPath_[l];switch(e.type){case "moveTo":a.push(" m ",j(e.x),",",j(e.y));break;case "lineTo":a.push(" l ",j(e.x),",",j(e.y));break;case "close":a.push(" x ");e=null;break;case "bezierCurveTo":a.push(" c ",j(e.cp1x),",",j(e.cp1y),",",j(e.cp2x),",",j(e.cp2y),",",j(e.x),",",j(e.y));break;case "at":case "wa":a.push(" ",e.type," ",j(e.x-this.arcScaleX_*e.radius),",",j(e.y-this.arcScaleY_*e.radius),
" ",j(e.x+this.arcScaleX_*e.radius),",",j(e.y+this.arcScaleY_*e.radius)," ",j(e.xStart),",",j(e.yStart)," ",j(e.xEnd),",",j(e.yEnd));break}if(e){if(h.x==null||e.x<h.x)h.x=e.x;if(g.x==null||e.x>g.x)g.x=e.x;if(h.y==null||e.y<h.y)h.y=e.y;if(g.y==null||e.y>g.y)g.y=e.y}}a.push(' ">');if(b)if(typeof this.fillStyle=="object"){var m=this.fillStyle,r=0,n={x:0,y:0},o=0,q=1;if(m.type_=="gradient"){var t=m.x1_/this.arcScaleX_,E=m.y1_/this.arcScaleY_,p=this.getCoords_(m.x0_/this.arcScaleX_,m.y0_/this.arcScaleY_),
z=this.getCoords_(t,E);r=Math.atan2(z.x-p.x,z.y-p.y)*180/Math.PI;if(r<0)r+=360;if(r<1.0E-6)r=0}else{var p=this.getCoords_(m.x0_,m.y0_),w=g.x-h.x,x=g.y-h.y;n={x:(p.x-h.x)/w,y:(p.y-h.y)/x};w/=this.arcScaleX_*k;x/=this.arcScaleY_*k;var R=s.max(w,x);o=2*m.r0_/R;q=2*m.r1_/R-o}var u=m.colors_;u.sort(function(ba,ca){return ba.offset-ca.offset});var J=u.length,da=u[0].color,ea=u[J-1].color,fa=u[0].alpha*this.globalAlpha,ga=u[J-1].alpha*this.globalAlpha,S=[],l=0;for(;l<J;l++){var T=u[l];S.push(T.offset*q+
o+" "+T.color)}a.push('<g_vml_:fill type="',m.type_,'"',' method="none" focus="100%"',' color="',da,'"',' color2="',ea,'"',' colors="',S.join(","),'"',' opacity="',ga,'"',' g_o_:opacity2="',fa,'"',' angle="',r,'"',' focusposition="',n.x,",",n.y,'" />')}else a.push('<g_vml_:fill color="',d,'" opacity="',f,'" />');else{var K=this.lineScale_*this.lineWidth;if(K<1)f*=K;a.push("<g_vml_:stroke",' opacity="',f,'"',' joinstyle="',this.lineJoin,'"',' miterlimit="',this.miterLimit,'"',' endcap="',aa(this.lineCap),
'"',' weight="',K,'px"',' color="',d,'" />')}a.push("</g_vml_:shape>");this.element_.insertAdjacentHTML("beforeEnd",a.join(""))};i.fill=function(){this.stroke(true)};i.closePath=function(){this.currentPath_.push({type:"close"})};i.getCoords_=function(b,a){var c=this.m_;return{x:k*(b*c[0][0]+a*c[1][0]+c[2][0])-v,y:k*(b*c[0][1]+a*c[1][1]+c[2][1])-v}};i.save=function(){var b={};O(this,b);this.aStack_.push(b);this.mStack_.push(this.m_);this.m_=y(I(),this.m_)};i.restore=function(){O(this.aStack_.pop(),
this);this.m_=this.mStack_.pop()};function ha(b){var a=0;for(;a<3;a++){var c=0;for(;c<2;c++)if(!isFinite(b[a][c])||isNaN(b[a][c]))return false}return true}function A(b,a,c){if(!!ha(a)){b.m_=a;if(c)b.lineScale_=W(V(a[0][0]*a[1][1]-a[0][1]*a[1][0]))}}i.translate=function(b,a){A(this,y([[1,0,0],[0,1,0],[b,a,1]],this.m_),false)};i.rotate=function(b){var a=G(b),c=F(b);A(this,y([[a,c,0],[-c,a,0],[0,0,1]],this.m_),false)};i.scale=function(b,a){this.arcScaleX_*=b;this.arcScaleY_*=a;A(this,y([[b,0,0],[0,a,
0],[0,0,1]],this.m_),true)};i.transform=function(b,a,c,d,f,h){A(this,y([[b,a,0],[c,d,0],[f,h,1]],this.m_),true)};i.setTransform=function(b,a,c,d,f,h){A(this,[[b,a,0],[c,d,0],[f,h,1]],true)};i.clip=function(){};i.arcTo=function(){};i.createPattern=function(){return new U};function D(b){this.type_=b;this.r1_=this.y1_=this.x1_=this.r0_=this.y0_=this.x0_=0;this.colors_=[]}D.prototype.addColorStop=function(b,a){a=P(a);this.colors_.push({offset:b,color:a.color,alpha:a.alpha})};function U(){}G_vmlCanvasManager=
M;CanvasRenderingContext2D=H;CanvasGradient=D;CanvasPattern=U})();
// Chosen, a Select Box Enhancer for jQuery and Protoype
// by Patrick Filler for Harvest, http://getharvest.com
// 
// Version 0.9.8
// Full source at https://github.com/harvesthq/chosen
// Copyright (c) 2011 Harvest http://getharvest.com

// MIT License, https://github.com/harvesthq/chosen/blob/master/LICENSE.md
// This file is generated by `cake build`, do not edit it by hand.
((function(){var a;a=function(){function a(){this.options_index=0,this.parsed=[]}return a.prototype.add_node=function(a){return a.nodeName==="OPTGROUP"?this.add_group(a):this.add_option(a)},a.prototype.add_group=function(a){var b,c,d,e,f,g;b=this.parsed.length,this.parsed.push({array_index:b,group:!0,label:a.label,children:0,disabled:a.disabled}),f=a.childNodes,g=[];for(d=0,e=f.length;d<e;d++)c=f[d],g.push(this.add_option(c,b,a.disabled));return g},a.prototype.add_option=function(a,b,c){if(a.nodeName==="OPTION")return a.text!==""?(b!=null&&(this.parsed[b].children+=1),this.parsed.push({array_index:this.parsed.length,options_index:this.options_index,value:a.value,text:a.text,html:a.innerHTML,selected:a.selected,disabled:c===!0?c:a.disabled,group_array_index:b,classes:a.className,style:a.style.cssText})):this.parsed.push({array_index:this.parsed.length,options_index:this.options_index,empty:!0}),this.options_index+=1},a}(),a.select_to_array=function(b){var c,d,e,f,g;d=new a,g=b.childNodes;for(e=0,f=g.length;e<f;e++)c=g[e],d.add_node(c);return d.parsed},this.SelectParser=a})).call(this),function(){var a,b;b=this,a=function(){function a(a,b){this.form_field=a,this.options=b!=null?b:{},this.set_default_values(),this.is_multiple=this.form_field.multiple,this.set_default_text(),this.setup(),this.set_up_html(),this.register_observers(),this.finish_setup()}return a.prototype.set_default_values=function(){var a=this;return this.click_test_action=function(b){return a.test_active_click(b)},this.activate_action=function(b){return a.activate_field(b)},this.active_field=!1,this.mouse_on_container=!1,this.results_showing=!1,this.result_highlighted=null,this.result_single_selected=null,this.allow_single_deselect=this.options.allow_single_deselect!=null&&this.form_field.options[0]!=null&&this.form_field.options[0].text===""?this.options.allow_single_deselect:!1,this.disable_search_threshold=this.options.disable_search_threshold||0,this.search_contains=this.options.search_contains||!1,this.choices=0,this.single_backstroke_delete=this.options.single_backstroke_delete||!1,this.max_selected_options=this.options.max_selected_options||Infinity},a.prototype.set_default_text=function(){return this.form_field.getAttribute("data-placeholder")?this.default_text=this.form_field.getAttribute("data-placeholder"):this.is_multiple?this.default_text=this.options.placeholder_text_multiple||this.options.placeholder_text||"Select Some Options":this.default_text=this.options.placeholder_text_single||this.options.placeholder_text||"Select an Option",this.results_none_found=this.form_field.getAttribute("data-no_results_text")||this.options.no_results_text||"No results match"},a.prototype.mouse_enter=function(){return this.mouse_on_container=!0},a.prototype.mouse_leave=function(){return this.mouse_on_container=!1},a.prototype.input_focus=function(a){var b=this;if(!this.active_field)return setTimeout(function(){return b.container_mousedown()},50)},a.prototype.input_blur=function(a){var b=this;if(!this.mouse_on_container)return this.active_field=!1,setTimeout(function(){return b.blur_test()},100)},a.prototype.result_add_option=function(a){var b,c;return a.disabled?"":(a.dom_id=this.container_id+"_o_"+a.array_index,b=a.selected&&this.is_multiple?[]:["active-result"],a.selected&&b.push("result-selected"),a.group_array_index!=null&&b.push("group-option"),a.classes!==""&&b.push(a.classes),c=a.style.cssText!==""?' style="'+a.style+'"':"",'<li id="'+a.dom_id+'" class="'+b.join(" ")+'"'+c+">"+a.html+"</li>")},a.prototype.results_update_field=function(){return this.is_multiple||this.results_reset_cleanup(),this.result_clear_highlight(),this.result_single_selected=null,this.results_build()},a.prototype.results_toggle=function(){return this.results_showing?this.results_hide():this.results_show()},a.prototype.results_search=function(a){return this.results_showing?this.winnow_results():this.results_show()},a.prototype.keyup_checker=function(a){var b,c;b=(c=a.which)!=null?c:a.keyCode,this.search_field_scale();switch(b){case 8:if(this.is_multiple&&this.backstroke_length<1&&this.choices>0)return this.keydown_backstroke();if(!this.pending_backstroke)return this.result_clear_highlight(),this.results_search();break;case 13:a.preventDefault();if(this.results_showing)return this.result_select(a);break;case 27:return this.results_showing&&this.results_hide(),!0;case 9:case 38:case 40:case 16:case 91:case 17:break;default:return this.results_search()}},a.prototype.generate_field_id=function(){var a;return a=this.generate_random_id(),this.form_field.id=a,a},a.prototype.generate_random_char=function(){var a,b,c;return a="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ",c=Math.floor(Math.random()*a.length),b=a.substring(c,c+1)},a}(),b.AbstractChosen=a}.call(this),function(){var a,b,c,d,e=Object.prototype.hasOwnProperty,f=function(a,b){function d(){this.constructor=a}for(var c in b)e.call(b,c)&&(a[c]=b[c]);return d.prototype=b.prototype,a.prototype=new d,a.__super__=b.prototype,a};d=this,a=jQuery,a.fn.extend({chosen:function(c){return!a.browser.msie||a.browser.version!=="6.0"&&a.browser.version!=="7.0"?this.each(function(d){var e;e=a(this);if(!e.hasClass("chzn-done"))return e.data("chosen",new b(this,c))}):this}}),b=function(b){function e(){e.__super__.constructor.apply(this,arguments)}return f(e,b),e.prototype.setup=function(){return this.form_field_jq=a(this.form_field),this.current_value=this.form_field_jq.val(),this.is_rtl=this.form_field_jq.hasClass("chzn-rtl")},e.prototype.finish_setup=function(){return this.form_field_jq.addClass("chzn-done")},e.prototype.set_up_html=function(){var b,d,e,f;return this.container_id=this.form_field.id.length?this.form_field.id.replace(/[^\w]/g,"_"):this.generate_field_id(),this.container_id+="_chzn",this.f_width=this.form_field_jq.outerWidth(),b=a("<div />",{id:this.container_id,"class":"chzn-container"+(this.is_rtl?" chzn-rtl":""),style:"width: "+this.f_width+"px;"}),this.is_multiple?b.html('<ul class="chzn-choices"><li class="search-field"><input type="text" value="'+this.default_text+'" class="default" autocomplete="off" style="width:25px;" /></li></ul><div class="chzn-drop" style="left:-9000px;"><ul class="chzn-results"></ul></div>'):b.html('<a href="javascript:void(0)" class="chzn-single chzn-default"><span>'+this.default_text+'</span><div><b></b></div></a><div class="chzn-drop" style="left:-9000px;"><div class="chzn-search"><input type="text" autocomplete="off" /></div><ul class="chzn-results"></ul></div>'),this.form_field_jq.hide().after(b),this.container=a("#"+this.container_id),this.container.addClass("chzn-container-"+(this.is_multiple?"multi":"single")),this.dropdown=this.container.find("div.chzn-drop").first(),d=this.container.height(),e=this.f_width-c(this.dropdown),this.dropdown.css({width:e+"px",top:d+"px"}),this.search_field=this.container.find("input").first(),this.search_results=this.container.find("ul.chzn-results").first(),this.search_field_scale(),this.search_no_results=this.container.find("li.no-results").first(),this.is_multiple?(this.search_choices=this.container.find("ul.chzn-choices").first(),this.search_container=this.container.find("li.search-field").first()):(this.search_container=this.container.find("div.chzn-search").first(),this.selected_item=this.container.find(".chzn-single").first(),f=e-c(this.search_container)-c(this.search_field),this.search_field.css({width:f+"px"})),this.results_build(),this.set_tab_index(),this.form_field_jq.trigger("liszt:ready",{chosen:this})},e.prototype.register_observers=function(){var a=this;return this.container.mousedown(function(b){return a.container_mousedown(b)}),this.container.mouseup(function(b){return a.container_mouseup(b)}),this.container.mouseenter(function(b){return a.mouse_enter(b)}),this.container.mouseleave(function(b){return a.mouse_leave(b)}),this.search_results.mouseup(function(b){return a.search_results_mouseup(b)}),this.search_results.mouseover(function(b){return a.search_results_mouseover(b)}),this.search_results.mouseout(function(b){return a.search_results_mouseout(b)}),this.form_field_jq.bind("liszt:updated",function(b){return a.results_update_field(b)}),this.search_field.blur(function(b){return a.input_blur(b)}),this.search_field.keyup(function(b){return a.keyup_checker(b)}),this.search_field.keydown(function(b){return a.keydown_checker(b)}),this.is_multiple?(this.search_choices.click(function(b){return a.choices_click(b)}),this.search_field.focus(function(b){return a.input_focus(b)})):this.container.click(function(a){return a.preventDefault()})},e.prototype.search_field_disabled=function(){this.is_disabled=this.form_field_jq[0].disabled;if(this.is_disabled)return this.container.addClass("chzn-disabled"),this.search_field[0].disabled=!0,this.is_multiple||this.selected_item.unbind("focus",this.activate_action),this.close_field();this.container.removeClass("chzn-disabled"),this.search_field[0].disabled=!1;if(!this.is_multiple)return this.selected_item.bind("focus",this.activate_action)},e.prototype.container_mousedown=function(b){var c;if(!this.is_disabled)return c=b!=null?a(b.target).hasClass("search-choice-close"):!1,b&&b.type==="mousedown"&&!this.results_showing&&b.stopPropagation(),!this.pending_destroy_click&&!c?(this.active_field?!this.is_multiple&&b&&(a(b.target)[0]===this.selected_item[0]||a(b.target).parents("a.chzn-single").length)&&(b.preventDefault(),this.results_toggle()):(this.is_multiple&&this.search_field.val(""),a(document).click(this.click_test_action),this.results_show()),this.activate_field()):this.pending_destroy_click=!1},e.prototype.container_mouseup=function(a){if(a.target.nodeName==="ABBR"&&!this.is_disabled)return this.results_reset(a)},e.prototype.blur_test=function(a){if(!this.active_field&&this.container.hasClass("chzn-container-active"))return this.close_field()},e.prototype.close_field=function(){return a(document).unbind("click",this.click_test_action),this.is_multiple||(this.selected_item.attr("tabindex",this.search_field.attr("tabindex")),this.search_field.attr("tabindex",-1)),this.active_field=!1,this.results_hide(),this.container.removeClass("chzn-container-active"),this.winnow_results_clear(),this.clear_backstroke(),this.show_search_field_default(),this.search_field_scale()},e.prototype.activate_field=function(){return!this.is_multiple&&!this.active_field&&(this.search_field.attr("tabindex",this.selected_item.attr("tabindex")),this.selected_item.attr("tabindex",-1)),this.container.addClass("chzn-container-active"),this.active_field=!0,this.search_field.val(this.search_field.val()),this.search_field.focus()},e.prototype.test_active_click=function(b){return a(b.target).parents("#"+this.container_id).length?this.active_field=!0:this.close_field()},e.prototype.results_build=function(){var a,b,c,e,f;this.parsing=!0,this.results_data=d.SelectParser.select_to_array(this.form_field),this.is_multiple&&this.choices>0?(this.search_choices.find("li.search-choice").remove(),this.choices=0):this.is_multiple||(this.selected_item.addClass("chzn-default").find("span").text(this.default_text),this.form_field.options.length<=this.disable_search_threshold?this.container.addClass("chzn-container-single-nosearch"):this.container.removeClass("chzn-container-single-nosearch")),a="",f=this.results_data;for(c=0,e=f.length;c<e;c++)b=f[c],b.group?a+=this.result_add_group(b):b.empty||(a+=this.result_add_option(b),b.selected&&this.is_multiple?this.choice_build(b):b.selected&&!this.is_multiple&&(this.selected_item.removeClass("chzn-default").find("span").text(b.text),this.allow_single_deselect&&this.single_deselect_control_build()));return this.search_field_disabled(),this.show_search_field_default(),this.search_field_scale(),this.search_results.html(a),this.parsing=!1},e.prototype.result_add_group=function(b){return b.disabled?"":(b.dom_id=this.container_id+"_g_"+b.array_index,'<li id="'+b.dom_id+'" class="group-result">'+a("<div />").text(b.label).html()+"</li>")},e.prototype.result_do_highlight=function(a){var b,c,d,e,f;if(a.length){this.result_clear_highlight(),this.result_highlight=a,this.result_highlight.addClass("highlighted"),d=parseInt(this.search_results.css("maxHeight"),10),f=this.search_results.scrollTop(),e=d+f,c=this.result_highlight.position().top+this.search_results.scrollTop(),b=c+this.result_highlight.outerHeight();if(b>=e)return this.search_results.scrollTop(b-d>0?b-d:0);if(c<f)return this.search_results.scrollTop(c)}},e.prototype.result_clear_highlight=function(){return this.result_highlight&&this.result_highlight.removeClass("highlighted"),this.result_highlight=null},e.prototype.results_show=function(){var a;if(!this.is_multiple)this.selected_item.addClass("chzn-single-with-drop"),this.result_single_selected&&this.result_do_highlight(this.result_single_selected);else if(this.max_selected_options<=this.choices)return this.form_field_jq.trigger("liszt:maxselected",{chosen:this}),!1;return a=this.is_multiple?this.container.height():this.container.height()-1,this.form_field_jq.trigger("liszt:showing_dropdown",{chosen:this}),this.dropdown.css({top:a+"px",left:0}),this.results_showing=!0,this.search_field.focus(),this.search_field.val(this.search_field.val()),this.winnow_results()},e.prototype.results_hide=function(){return this.is_multiple||this.selected_item.removeClass("chzn-single-with-drop"),this.result_clear_highlight(),this.form_field_jq.trigger("liszt:hiding_dropdown",{chosen:this}),this.dropdown.css({left:"-9000px"}),this.results_showing=!1},e.prototype.set_tab_index=function(a){var b;if(this.form_field_jq.attr("tabindex"))return b=this.form_field_jq.attr("tabindex"),this.form_field_jq.attr("tabindex",-1),this.is_multiple?this.search_field.attr("tabindex",b):(this.selected_item.attr("tabindex",b),this.search_field.attr("tabindex",-1))},e.prototype.show_search_field_default=function(){return this.is_multiple&&this.choices<1&&!this.active_field?(this.search_field.val(this.default_text),this.search_field.addClass("default")):(this.search_field.val(""),this.search_field.removeClass("default"))},e.prototype.search_results_mouseup=function(b){var c;c=a(b.target).hasClass("active-result")?a(b.target):a(b.target).parents(".active-result").first();if(c.length)return this.result_highlight=c,this.result_select(b)},e.prototype.search_results_mouseover=function(b){var c;c=a(b.target).hasClass("active-result")?a(b.target):a(b.target).parents(".active-result").first();if(c)return this.result_do_highlight(c)},e.prototype.search_results_mouseout=function(b){if(a(b.target).hasClass("active-result"))return this.result_clear_highlight()},e.prototype.choices_click=function(b){b.preventDefault();if(this.active_field&&!a(b.target).hasClass("search-choice")&&!this.results_showing)return this.results_show()},e.prototype.choice_build=function(b){var c,d,e=this;return this.is_multiple&&this.max_selected_options<=this.choices?(this.form_field_jq.trigger("liszt:maxselected",{chosen:this}),!1):(c=this.container_id+"_c_"+b.array_index,this.choices+=1,this.search_container.before('<li class="search-choice" id="'+c+'"><span>'+b.html+'</span><a href="javascript:void(0)" class="search-choice-close" rel="'+b.array_index+'"></a></li>'),d=a("#"+c).find("a").first(),d.click(function(a){return e.choice_destroy_link_click(a)}))},e.prototype.choice_destroy_link_click=function(b){return b.preventDefault(),this.is_disabled?b.stopPropagation:(this.pending_destroy_click=!0,this.choice_destroy(a(b.target)))},e.prototype.choice_destroy=function(a){return this.choices-=1,this.show_search_field_default(),this.is_multiple&&this.choices>0&&this.search_field.val().length<1&&this.results_hide(),this.result_deselect(a.attr("rel")),a.parents("li").first().remove()},e.prototype.results_reset=function(){this.form_field.options[0].selected=!0,this.selected_item.find("span").text(this.default_text),this.is_multiple||this.selected_item.addClass("chzn-default"),this.show_search_field_default(),this.results_reset_cleanup(),this.form_field_jq.trigger("change");if(this.active_field)return this.results_hide()},e.prototype.results_reset_cleanup=function(){return this.selected_item.find("abbr").remove()},e.prototype.result_select=function(a){var b,c,d,e;if(this.result_highlight)return b=this.result_highlight,c=b.attr("id"),this.result_clear_highlight(),this.is_multiple?this.result_deactivate(b):(this.search_results.find(".result-selected").removeClass("result-selected"),this.result_single_selected=b,this.selected_item.removeClass("chzn-default")),b.addClass("result-selected"),e=c.substr(c.lastIndexOf("_")+1),d=this.results_data[e],d.selected=!0,this.form_field.options[d.options_index].selected=!0,this.is_multiple?this.choice_build(d):(this.selected_item.find("span").first().text(d.text),this.allow_single_deselect&&this.single_deselect_control_build()),(!a.metaKey||!this.is_multiple)&&this.results_hide(),this.search_field.val(""),(this.is_multiple||this.form_field_jq.val()!==this.current_value)&&this.form_field_jq.trigger("change",{selected:this.form_field.options[d.options_index].value}),this.current_value=this.form_field_jq.val(),this.search_field_scale()},e.prototype.result_activate=function(a){return a.addClass("active-result")},e.prototype.result_deactivate=function(a){return a.removeClass("active-result")},e.prototype.result_deselect=function(b){var c,d;return d=this.results_data[b],d.selected=!1,this.form_field.options[d.options_index].selected=!1,c=a("#"+this.container_id+"_o_"+b),c.removeClass("result-selected").addClass("active-result").show(),this.result_clear_highlight(),this.winnow_results(),this.form_field_jq.trigger("change",{deselected:this.form_field.options[d.options_index].value}),this.search_field_scale()},e.prototype.single_deselect_control_build=function(){if(this.allow_single_deselect&&this.selected_item.find("abbr").length<1)return this.selected_item.find("span").first().after('<abbr class="search-choice-close"></abbr>')},e.prototype.winnow_results=function(){var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s;this.no_results_clear(),j=0,k=this.search_field.val()===this.default_text?"":a("<div/>").text(a.trim(this.search_field.val())).html(),g=this.search_contains?"":"^",f=new RegExp(k.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&"),"i"),n=new RegExp(k.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&"),"i"),s=this.results_data;for(o=0,q=s.length;o<q;o++){c=s[o];if(!c.disabled&&!c.empty)if(c.group)a("#"+c.dom_id).css("display","none");else if(!this.is_multiple||!c.selected){b=!1,i=c.dom_id,h=a("#"+i);if(f.test(c.html))b=!0,j+=1;else if(c.html.indexOf(" ")>=0||c.html.indexOf("[")===0){e=c.html.replace(/\[|\]/g,"").split(" ");if(e.length)for(p=0,r=e.length;p<r;p++)d=e[p],f.test(d)&&(b=!0,j+=1)}b?(k.length?(l=c.html.search(n),m=c.html.substr(0,l+k.length)+"</em>"+c.html.substr(l+k.length),m=m.substr(0,l)+"<em>"+m.substr(l)):m=c.html,h.html(m),this.result_activate(h),c.group_array_index!=null&&a("#"+this.results_data[c.group_array_index].dom_id).css("display","list-item")):(this.result_highlight&&i===this.result_highlight.attr("id")&&this.result_clear_highlight(),this.result_deactivate(h))}}return j<1&&k.length?this.no_results(k):this.winnow_results_set_highlight()},e.prototype.winnow_results_clear=function(){var b,c,d,e,f;this.search_field.val(""),c=this.search_results.find("li"),f=[];for(d=0,e=c.length;d<e;d++)b=c[d],b=a(b),b.hasClass("group-result")?f.push(b.css("display","auto")):!this.is_multiple||!b.hasClass("result-selected")?f.push(this.result_activate(b)):f.push(void 0);return f},e.prototype.winnow_results_set_highlight=function(){var a,b;if(!this.result_highlight){b=this.is_multiple?[]:this.search_results.find(".result-selected.active-result"),a=b.length?b.first():this.search_results.find(".active-result").first();if(a!=null)return this.result_do_highlight(a)}},e.prototype.no_results=function(b){var c;return c=a('<li class="no-results">'+this.results_none_found+' "<span></span>"</li>'),c.find("span").first().html(b),this.search_results.append(c)},e.prototype.no_results_clear=function(){return this.search_results.find(".no-results").remove()},e.prototype.keydown_arrow=function(){var b,c;this.result_highlight?this.results_showing&&(c=this.result_highlight.nextAll("li.active-result").first(),c&&this.result_do_highlight(c)):(b=this.search_results.find("li.active-result").first(),b&&this.result_do_highlight(a(b)));if(!this.results_showing)return this.results_show()},e.prototype.keyup_arrow=function(){var a;if(!this.results_showing&&!this.is_multiple)return this.results_show();if(this.result_highlight)return a=this.result_highlight.prevAll("li.active-result"),a.length?this.result_do_highlight(a.first()):(this.choices>0&&this.results_hide(),this.result_clear_highlight())},e.prototype.keydown_backstroke=function(){return this.pending_backstroke?(this.choice_destroy(this.pending_backstroke.find("a").first()),this.clear_backstroke()):(this.pending_backstroke=this.search_container.siblings("li.search-choice").last(),this.single_backstroke_delete?this.keydown_backstroke():this.pending_backstroke.addClass("search-choice-focus"))},e.prototype.clear_backstroke=function(){return this.pending_backstroke&&this.pending_backstroke.removeClass("search-choice-focus"),this.pending_backstroke=null},e.prototype.keydown_checker=function(a){var b,c;b=(c=a.which)!=null?c:a.keyCode,this.search_field_scale(),b!==8&&this.pending_backstroke&&this.clear_backstroke();switch(b){case 8:this.backstroke_length=this.search_field.val().length;break;case 9:this.results_showing&&!this.is_multiple&&this.result_select(a),this.mouse_on_container=!1;break;case 13:a.preventDefault();break;case 38:a.preventDefault(),this.keyup_arrow();break;case 40:this.keydown_arrow()}},e.prototype.search_field_scale=function(){var b,c,d,e,f,g,h,i,j;if(this.is_multiple){d=0,h=0,f="position:absolute; left: -1000px; top: -1000px; display:none;",g=["font-size","font-style","font-weight","font-family","line-height","text-transform","letter-spacing"];for(i=0,j=g.length;i<j;i++)e=g[i],f+=e+":"+this.search_field.css(e)+";";return c=a("<div />",{style:f}),c.text(this.search_field.val()),a("body").append(c),h=c.width()+25,c.remove(),h>this.f_width-10&&(h=this.f_width-10),this.search_field.css({width:h+"px"}),b=this.container.height(),this.dropdown.css({top:b+"px"})}},e.prototype.generate_random_id=function(){var b;b="sel"+this.generate_random_char()+this.generate_random_char()+this.generate_random_char();while(a("#"+b).length>0)b+=this.generate_random_char();return b},e}(AbstractChosen),c=function(a){var b;return b=a.outerWidth()-a.width()},d.get_side_border_padding=c}.call(this);