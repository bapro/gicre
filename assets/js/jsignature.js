//--------------jSignature.min.js------------------------------------
/*
 
jSignature v2 "2012-11-01T22:48" "commit ID 1c15dfafecc75925c3b7d529356a558b59220edb"
Copyright (c) 2012 Willow Systems Corp http://willow-systems.com
Copyright (c) 2010 Brinley Ang http://www.unbolt.net
MIT License <http://www.opensource.org/licenses/mit-license.php> 


Simplify.js BSD 
(c) 2012, Vladimir Agafonkin
mourner.github.com/simplify-js


base64 encoder
MIT, GPL
http://phpjs.org/functions/base64_encode
+   original by: Tyler Akins (http://rumkin.com)
+   improved by: Bayron Guevara
+   improved by: Thunder.m
+   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
+   bugfixed by: Pellentesque Malesuada
+   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
+   improved by: Rafal Kukawski (http://kukawski.pl)


jSignature v2 jSignature's Undo Button and undo functionality plugin


jSignature v2 jSignature's custom "base30" format export and import plugins.


jSignature v2 SVG export plugin.

*/
(function(){function q(b){for(var j,s=b.css("color"),g,b=b[0],c=!1;b&&!g&&!c;){try{j=$(b).css("background-color")}catch(d){j="transparent"}"transparent"!==j&&"rgba(0, 0, 0, 0)"!==j&&(g=j);c=b.body;b=b.parentNode}var b=/rgb[a]*\((\d+),\s*(\d+),\s*(\d+)/,c=/#([AaBbCcDdEeFf\d]{2})([AaBbCcDdEeFf\d]{2})([AaBbCcDdEeFf\d]{2})/,a;j=void 0;(j=s.match(b))?a={r:parseInt(j[1],10),g:parseInt(j[2],10),b:parseInt(j[3],10)}:(j=s.match(c))&&(a={r:parseInt(j[1],16),g:parseInt(j[2],16),b:parseInt(j[3],16)});var f;g?
(j=void 0,(j=g.match(b))?f={r:parseInt(j[1],10),g:parseInt(j[2],10),b:parseInt(j[3],10)}:(j=g.match(c))&&(f={r:parseInt(j[1],16),g:parseInt(j[2],16),b:parseInt(j[3],16)})):f=a?127<Math.max.apply(null,[a.r,a.g,a.b])?{r:0,g:0,b:0}:{r:255,g:255,b:255}:{r:255,g:255,b:255};j=function(b){return"rgb("+[b.r,b.g,b.b].join(", ")+")"};a&&f?(b=Math.max.apply(null,[a.r,a.g,a.b]),a=Math.max.apply(null,[f.r,f.g,f.b]),a=Math.round(a+-0.75*(a-b)),a={r:a,g:a,b:a}):a?(a=Math.max.apply(null,[a.r,a.g,a.b]),b=1,127<a&&
(b=-1),a=Math.round(a+96*b),a={r:a,g:a,b:a}):a={r:191,g:191,b:191};return{color:s,"background-color":f?j(f):g,"decor-color":j(a)}}function m(b,j){this.x=b;this.y=j;this.reverse=function(){return new this.constructor(-1*this.x,-1*this.y)};this._length=null;this.getLength=function(){this._length||(this._length=Math.sqrt(Math.pow(this.x,2)+Math.pow(this.y,2)));return this._length};var s=function(b){return Math.round(b/Math.abs(b))};this.resizeTo=function(b){if(0===this.x&&0===this.y)this._length=0;else if(0===
this.x)this._length=b,this.y=b*s(this.y);else if(0===this.y)this._length=b,this.x=b*s(this.x);else{var j=Math.abs(this.y/this.x),a=Math.sqrt(Math.pow(b,2)/(1+Math.pow(j,2))),j=j*a;this._length=b;this.x=a*s(this.x);this.y=j*s(this.y)}return this};this.angleTo=function(b){var j=this.getLength()*b.getLength();return 0===j?0:Math.acos(Math.min(Math.max((this.x*b.x+this.y*b.y)/j,-1),1))/Math.PI}}function k(b,j){this.x=b;this.y=j;this.getVectorToCoordinates=function(b,j){return new m(b-this.x,j-this.y)};
this.getVectorFromCoordinates=function(b,j){return this.getVectorToCoordinates(b,j).reverse()};this.getVectorToPoint=function(b){return new m(b.x-this.x,b.y-this.y)};this.getVectorFromPoint=function(b){return this.getVectorToPoint(b).reverse()}}function t(b,j,a,g,c){this.data=b;this.context=j;if(b.length)for(var d=b.length,f,l,i=0;i<d;i++){f=b[i];l=f.x.length;a.call(j,f);for(var e=1;e<l;e++)g.call(j,f,e);c.call(j,f)}this.changed=function(){};this.startStrokeFn=a;this.addToStrokeFn=g;this.endStrokeFn=
c;this.inStroke=!1;this._stroke=this._lastPoint=null;this.startStroke=function(b){if(b&&"number"==typeof b.x&&"number"==typeof b.y){this._stroke={x:[b.x],y:[b.y]};this.data.push(this._stroke);this._lastPoint=b;this.inStroke=!0;var j=this._stroke,a=this.startStrokeFn,g=this.context;setTimeout(function(){a.call(g,j)},3);return b}return null};this.addToStroke=function(b){if(this.inStroke&&"number"===typeof b.x&&"number"===typeof b.y&&4<Math.abs(b.x-this._lastPoint.x)+Math.abs(b.y-this._lastPoint.y)){var j=
this._stroke.x.length;this._stroke.x.push(b.x);this._stroke.y.push(b.y);this._lastPoint=b;var a=this._stroke,g=this.addToStrokeFn,s=this.context;setTimeout(function(){g.call(s,a,j)},3);return b}return null};this.endStroke=function(){var b=this.inStroke;this.inStroke=!1;this._lastPoint=null;if(b){var j=this._stroke,a=this.endStrokeFn,g=this.context,s=this.changed;setTimeout(function(){a.call(g,j);s.call(g)},3);return!0}return null}}function r(b,j,a){var g=this.$parent=$(b),b=this.eventTokens={};this.events=
new v(this);var c=$.fn[e]("globalEvents"),d={width:"ratio",height:"ratio",sizeRatio:4,color:"#000","background-color":"#fff","decor-color":"#eee",lineWidth:0,minFatFingerCompensation:-10,showUndoButton:!1,data:[]};$.extend(d,q(g));j&&$.extend(d,j);this.settings=d;for(var f in a)a.hasOwnProperty(f)&&a[f].call(this,f);this.events.publish(e+".initializing");this.$controlbarUpper=$('<div style="padding:0 !important;margin:0 !important;width: 100% !important; height: 0 !important;margin-top:-1em !important;margin-bottom:1em !important;"></div>').appendTo(g);
this.isCanvasEmulator=!1;a=this.canvas=this.initializeCanvas(d);j=$(a);this.$controlbarLower=$('<div style="padding:0 !important;margin:0 !important;width: 100% !important; height: 0 !important;margin-top:-1.5em !important;margin-bottom:1.5em !important;"></div>').appendTo(g);this.canvasContext=a.getContext("2d");j.data(e+".this",this);g=(g=d.lineWidth)?g:Math.max(Math.round(a.width/400),2);d.lineWidth=g;this.lineCurveThreshold=3*d.lineWidth;d.cssclass&&""!=$.trim(d.cssclass)&&j.addClass(d.cssclass);
this.fatFingerCompensation=0;var g=function(b){var j,a,g=function(g){g=g.changedTouches&&0<g.changedTouches.length?g.changedTouches[0]:g;return new k(Math.round(g.pageX+j),Math.round(g.pageY+a)+b.fatFingerCompensation)},d=new y(750,function(){b.dataEngine.endStroke()});this.drawEndHandler=function(j){try{j.preventDefault()}catch(a){}d.clear();b.dataEngine.endStroke()};this.drawStartHandler=function(c){c.preventDefault();var s=$(b.canvas).offset();j=-1*s.left;a=-1*s.top;b.dataEngine.startStroke(g(c));
d.kick()};this.drawMoveHandler=function(j){j.preventDefault();b.dataEngine.inStroke&&(b.dataEngine.addToStroke(g(j)),d.kick())};return this}.call({},this),l=g.drawEndHandler,i=g.drawStartHandler,p=g.drawMoveHandler,h=this.canvas,j=$(h);this.isCanvasEmulator?(j.bind("mousemove."+e,p),j.bind("mouseup."+e,l),j.bind("mousedown."+e,i)):(h.ontouchstart=function(b){h.onmousedown=void 0;h.onmouseup=void 0;h.onmousemove=void 0;this.fatFingerCompensation=d.minFatFingerCompensation&&-3*d.lineWidth>d.minFatFingerCompensation?
-3*d.lineWidth:d.minFatFingerCompensation;i(b);h.ontouchend=l;h.ontouchstart=i;h.ontouchmove=p},h.onmousedown=function(b){h.ontouchstart=void 0;h.ontouchend=void 0;h.ontouchmove=void 0;i(b);h.onmousedown=i;h.onmouseup=l;h.onmousemove=p});b[e+".windowmouseup"]=c.subscribe(e+".windowmouseup",g.drawEndHandler);this.events.publish(e+".attachingEventHandlers");var n=this,b=d.width.toString(10),w=e;if("ratio"===b||"%"===b.split("")[b.length-1])this.eventTokens[w+".parentresized"]=c.subscribe(w+".parentresized",
function(b,j,a){return function(){var g=j.width();if(g!==a){for(var d in b)b.hasOwnProperty(d)&&(c.unsubscribe(b[d]),delete b[d]);var s=n.settings;n.$parent.children().remove();for(d in n)n.hasOwnProperty(d)&&delete n[d];d=s.data;var g=1*g/a,f=[],l,i,e,h,k,p;i=0;for(e=d.length;i<e;i++){p=d[i];l={x:[],y:[]};h=0;for(k=p.x.length;h<k;h++)l.x.push(p.x[h]*g),l.y.push(p.y[h]*g);f.push(l)}s.data=f;j[w](s)}}}(this.eventTokens,this.$parent,this.$parent.width(),1*this.canvas.width/this.canvas.height));this.resetCanvas(d.data);
this.events.publish(e+".initialized");return this}var e="jSignature",y=function(b,j){var a;this.kick=function(){clearTimeout(a);a=setTimeout(j,b)};this.clear=function(){clearTimeout(a)};return this},v=function(b){this.topics={};this.context=b?b:this;this.publish=function(b,a,g,d){if(this.topics[b]){var c=this.topics[b],f=Array.prototype.slice.call(arguments,1),l=[],i,e,h,p;e=0;for(h=c.length;e<h;e++)p=c[e],i=p[0],p[1]&&(p[0]=function(){},l.push(e)),i.apply(this.context,f);e=0;for(h=l.length;e<h;e++)c.splice(l[e],
1)}};this.subscribe=function(b,a,g){this.topics[b]?this.topics[b].push([a,g]):this.topics[b]=[[a,g]];return{topic:b,callback:a}};this.unsubscribe=function(b){if(this.topics[b.topic])for(var a=this.topics[b.topic],g=0,d=a.length;g<d;g++)a[g][0]===b.callback&&a.splice(g,1)}},z=function(b){var a=this.canvasContext,d=b.x[0],b=b.y[0],g=this.settings.lineWidth,c=a.fillStyle;a.fillStyle=a.strokeStyle;a.fillRect(d+g/-2,b+g/-2,g,g);a.fillStyle=c},u=function(b,a){var d=new k(b.x[a-1],b.y[a-1]),g=new k(b.x[a],
b.y[a]),c=d.getVectorToPoint(g);if(1<a){var f=new k(b.x[a-2],b.y[a-2]),l=f.getVectorToPoint(d),i;if(l.getLength()>this.lineCurveThreshold){i=2<a?(new k(b.x[a-3],b.y[a-3])).getVectorToPoint(f):new m(0,0);var e=0.35*l.getLength(),h=l.angleTo(i.reverse()),p=c.angleTo(l.reverse());i=(new m(i.x+l.x,i.y+l.y)).resizeTo(Math.max(0.05,h)*e);var n=(new m(l.x+c.x,l.y+c.y)).reverse().resizeTo(Math.max(0.05,p)*e),l=this.canvasContext,e=f.x,p=f.y,h=d.x,w=d.y,A=f.x+i.x,f=f.y+i.y;i=d.x+n.x;n=d.y+n.y;l.beginPath();
l.moveTo(e,p);l.bezierCurveTo(A,f,i,n,h,w);l.stroke()}}c.getLength()<=this.lineCurveThreshold&&(c=this.canvasContext,f=d.x,d=d.y,i=g.x,g=g.y,c.beginPath(),c.moveTo(f,d),c.lineTo(i,g),c.stroke())},x=function(b){var a=b.x.length-1;if(0<a){var d=new k(b.x[a],b.y[a]),g=new k(b.x[a-1],b.y[a-1]),c=g.getVectorToPoint(d);if(c.getLength()>this.lineCurveThreshold){if(1<a){var b=(new k(b.x[a-2],b.y[a-2])).getVectorToPoint(g),f=(new m(b.x+c.x,b.y+c.y)).resizeTo(c.getLength()/2),c=this.canvasContext,b=g.x,a=g.y,
l=d.x,i=d.y,e=g.x+f.x,g=g.y+f.y,f=d.x,d=d.y;c.beginPath();c.moveTo(b,a);c.bezierCurveTo(e,g,f,d,l,i)}else c=this.canvasContext,b=g.x,g=g.y,a=d.x,d=d.y,c.beginPath(),c.moveTo(b,g),c.lineTo(a,d);c.stroke()}}};r.prototype.resetCanvas=function(b){var a=this.canvas,d=this.settings,c=this.canvasContext,f=this.isCanvasEmulator,l=a.width,i=a.height;c.clearRect(0,0,l+30,i+30);c.shadowColor=c.fillStyle=d["background-color"];f&&c.fillRect(0,0,l+30,i+30);c.lineWidth=Math.ceil(parseInt(d.lineWidth,10));c.lineCap=
c.lineJoin="round";c.strokeStyle=d["decor-color"];c.shadowOffsetX=0;c.shadowOffsetY=0;var h=Math.round(i/5),p=1.5*h,k=i-h,l=l-1.5*h,i=i-h;c.beginPath();c.moveTo(p,k);c.lineTo(l,i);c.stroke();c.strokeStyle=d.color;f||(c.shadowColor=c.strokeStyle,c.shadowOffsetX=0.5*c.lineWidth,c.shadowOffsetY=-0.6*c.lineWidth,c.shadowBlur=0);b||(b=[]);c=this.dataEngine=new t(b,this,z,u,x);d.data=b;$(a).data(e+".data",b).data(e+".settings",d);var n=this.$parent,w=this.events,A=e;c.changed=function(){w.publish(A+".change");
n.trigger("change")};c.changed();return!0};r.prototype.initializeCanvas=function(b){var a=document.createElement("canvas"),c=$(a);b.width===b.height&&"ratio"===b.height&&(b.width="100%");c.css("margin",0).css("padding",0).css("border","none").css("height","ratio"===b.height||!b.height?1:b.height.toString(10)).css("width","ratio"===b.width||!b.width?1:b.width.toString(10));c.appendTo(this.$parent);"ratio"===b.height?c.css("height",Math.round(c.width()/b.sizeRatio)):"ratio"===b.width&&c.css("width",
Math.round(c.height()*b.sizeRatio));c.addClass(e);a.width=c.width();a.height=c.height();b=a;if(b.getContext)b=!1;else{var c=b.ownerDocument.parentWindow,d=c.FlashCanvas?b.ownerDocument.parentWindow.FlashCanvas:"undefined"===typeof FlashCanvas?void 0:FlashCanvas;if(d){b=d.initElement(b);d=1;c&&(c.screen&&c.screen.deviceXDPI&&c.screen.logicalXDPI)&&(d=1*c.screen.deviceXDPI/c.screen.logicalXDPI);if(1!==d)try{$(b).children("object").get(0).resize(Math.ceil(b.width*d),Math.ceil(b.height*d)),b.getContext("2d").scale(d,
d)}catch(f){}b=!0}else throw Error("Canvas element does not support 2d context. jSignature cannot proceed.");}this.isCanvasEmulator=b;a.onselectstart=function(b){b&&b.preventDefault&&b.preventDefault();b&&b.stopPropagation&&b.stopPropagation();return!1};return a};var p=window,h=function(b,a){var c=new Image,d=this;c.onload=function(){d.getContext("2d").drawImage(c,0,0,c.width<d.width?c.width:d.width,c.height<d.height?c.height:d.height)};c.src="data:"+a+","+b},a=function(b){this.find("canvas."+e).add(this.filter("canvas."+
e)).data(e+".this").resetCanvas(b);return this},f=function(b,a){if(void 0===a&&("string"===typeof b&&"data:"===b.substr(0,5))&&(a=b.slice(5).split(",")[0],b=b.slice(6+a.length),a===b))return;var c=this.find("canvas."+e).add(this.filter("canvas."+e));if(n.hasOwnProperty(a))0!==c.length&&n[a].call(c[0],b,a,function(b){return function(){return b.resetCanvas.apply(b,arguments)}}(c.data(e+".this")));else throw Error(e+" is unable to find import plugin with for format '"+String(a)+"'");return this},d=new v,
c=e,l,i=function(){d.publish(c+".parentresized")};$(p).bind("resize."+c,function(){l&&clearTimeout(l);l=setTimeout(i,500)}).bind("mouseup."+c,function(){d.publish(c+".windowmouseup")});var w={},A={"default":function(){return this.toDataURL()},"native":function(b){return b},image:function(){var b=this.toDataURL();if("string"===typeof b&&4<b.length&&"data:"===b.slice(0,5)&&-1!==b.indexOf(",")){var a=b.indexOf(",");return[b.slice(5,a),b.substr(a+1)]}return[]}},n={"native":function(b,a,c){c(b)},image:h,
"image/png;base64":h,"image/jpeg;base64":h,"image/jpg;base64":h},B={"export":A,"import":n,instance:w},C={init:function(b){return this.each(function(){var a,c=!1;for(a=this.parentNode;a&&!c;)c=a.body,a=a.parentNode;!c||new r(this,b,w)})},getSettings:function(){return this.find("canvas."+e).add(this.filter("canvas."+e)).data(e+".this").settings},clear:a,reset:a,addPlugin:function(b,a,c){B.hasOwnProperty(b)&&(B[b][a]=c);return this},listPlugins:function(b){var a=[];if(B.hasOwnProperty(b)){var b=B[b],
c;for(c in b)b.hasOwnProperty(c)&&a.push(c)}return a},getData:function(b){var a=this.find("canvas."+e).add(this.filter("canvas."+e));void 0===b&&(b="default");if(0!==a.length&&A.hasOwnProperty(b))return A[b].call(a.get(0),a.data(e+".data"))},importData:f,setData:f,globalEvents:function(){return d},events:function(){return this.find("canvas."+e).add(this.filter("canvas."+e)).data(e+".this").events}};$.fn[e]=function(b){if(!b||"object"===typeof b)return C.init.apply(this,arguments);if("string"===typeof b&&
C[b])return C[b].apply(this,Array.prototype.slice.call(arguments,1));$.error("Method "+String(b)+" does not exist on jQuery."+e)}})();
(function(){$.fn.jSignature("addPlugin","instance","UndoButton",function(q){this.events.subscribe("jSignature.attachingEventHandlers",function(){if(this.settings[q]){var m=this.settings[q];"function"!==typeof m&&(m=function(){var e=$('<input type="button" value="Limpiar" style="position:absolute;display:none;margin:0 !important;top:auto" class="btn btn-default btn-warning" />').appendTo(this.$controlbarLower),k=e.width();e.css("left",Math.round((this.canvas.width-k)/2));k!==e.width()&&e.width(k);return e});var k=m.call(this),
t=this;t.events.subscribe("jSignature.change",function(){t.dataEngine.data.length?k.show():k.hide()});var r=this,e=(this.events.topics.hasOwnProperty("jSignature.undo")?q:"jSignature")+".undo";k.bind("click",function(){r.events.publish(e)});r.events.subscribe(e,function(){var e=r.dataEngine.data;e.length&&(e.pop(),r.resetCanvas(e))})}})})})();
(function(){for(var q={},m={},k="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWX".split(""),t=k.length/2,r=t-1;-1<r;r--)q[k[r]]=k[r+t],m[k[r+t]]=k[r];var e=function(e){for(var e=e.split(""),h=e.length,a=1;a<h;a++)e[a]=q[e[a]];return e.join("")},y=function(k){for(var h=[],a=0,f=1,d=k.length,c,l,i=0;i<d;i++)c=Math.round(k[i]),l=c-a,a=c,0>l&&0<f?(f=-1,h.push("Z")):0<l&&0>f&&(f=1,h.push("Y")),c=Math.abs(l),c>=t?h.push(e(c.toString(t))):h.push(c.toString(t));return h.join("")},v=function(e){for(var h=
[],e=e.split(""),a=e.length,f,d=1,c=[],l=0,i=0;i<a;i++)f=e[i],f in q||"Z"===f||"Y"===f?(0!==c.length&&(c=parseInt(c.join(""),t)*d+l,h.push(c),l=c),"Z"===f?(d=-1,c=[]):"Y"===f?(d=1,c=[]):c=[f]):c.push(m[f]);h.push(parseInt(c.join(""),t)*d+l);return h},z=function(e){for(var h=[],a=e.length,f,d=0;d<a;d++)f=e[d],h.push(y(f.x)),h.push(y(f.y));return h.join("_")},u=function(e){for(var h=[],e=e.split("_"),a=e.length/2,f=0;f<a;f++)h.push({x:v(e[2*f]),y:v(e[2*f+1])});return h},k=function(e){return["image/jsignature;base30",
z(e)]},r=function(e,h,a){"string"===typeof e&&("image/jsignature;base30"===e.substring(0,23).toLowerCase()&&(e=e.substring(24)),a(u(e)))};if(null==this.jQuery)throw Error("We need jQuery for some of the functionality. jQuery is not detected. Failing to initialize...");var x=this.jQuery.fn.jSignature;x("addPlugin","export","base30",k);x("addPlugin","export","image/jsignature;base30",k);x("addPlugin","import","base30",r);x("addPlugin","import","image/jsignature;base30",r);this.jSignatureDebug&&(this.jSignatureDebug.base30=
{remapTailChars:e,compressstrokeleg:y,uncompressstrokeleg:v,compressstrokes:z,uncompressstrokes:u,charmap:q})}).call("undefined"!==typeof window?window:this);
(function(){function q(a,f){this.x=a;this.y=f;this.reverse=function(){return new this.constructor(-1*this.x,-1*this.y)};this._length=null;this.getLength=function(){this._length||(this._length=Math.sqrt(Math.pow(this.x,2)+Math.pow(this.y,2)));return this._length};var d=function(a){return Math.round(a/Math.abs(a))};this.resizeTo=function(a){if(0===this.x&&0===this.y)this._length=0;else if(0===this.x)this._length=a,this.y=a*d(this.y);else if(0===this.y)this._length=a,this.x=a*d(this.x);else{var f=Math.abs(this.y/
this.x),e=Math.sqrt(Math.pow(a,2)/(1+Math.pow(f,2))),f=f*e;this._length=a;this.x=e*d(this.x);this.y=f*d(this.y)}return this};this.angleTo=function(a){var d=this.getLength()*a.getLength();return 0===d?0:Math.acos(Math.min(Math.max((this.x*a.x+this.y*a.y)/d,-1),1))/Math.PI}}function m(a,f){this.x=a;this.y=f;this.getVectorToCoordinates=function(a,c){return new q(a-this.x,c-this.y)};this.getVectorFromCoordinates=function(a,c){return this.getVectorToCoordinates(a,c).reverse()};this.getVectorToPoint=function(a){return new q(a.x-
this.x,a.y-this.y)};this.getVectorFromPoint=function(a){return this.getVectorToPoint(a).reverse()}}function k(a,f){var d=Math.pow(10,f);return Math.round(a*d)/d}function t(a,f,d){var f=f+1,c=new m(a.x[f-1],a.y[f-1]),e=new m(a.x[f],a.y[f]),e=c.getVectorToPoint(e),i=new m(a.x[f-2],a.y[f-2]),c=i.getVectorToPoint(c);return c.getLength()>d?(d=2<f?(new m(a.x[f-3],a.y[f-3])).getVectorToPoint(i):new q(0,0),a=0.35*c.getLength(),i=c.angleTo(d.reverse()),f=e.angleTo(c.reverse()),d=(new q(d.x+c.x,d.y+c.y)).resizeTo(Math.max(0.05,
i)*a),e=(new q(c.x+e.x,c.y+e.y)).reverse().resizeTo(Math.max(0.05,f)*a),e=new q(c.x+e.x,c.y+e.y),["c",k(d.x,2),k(d.y,2),k(e.x,2),k(e.y,2),k(c.x,2),k(c.y,2)]):["l",k(c.x,2),k(c.y,2)]}function r(a,f){var d=a.x.length-1,c=new m(a.x[d],a.y[d]),e=new m(a.x[d-1],a.y[d-1]),c=e.getVectorToPoint(c);if(1<d&&c.getLength()>f){var d=(new m(a.x[d-2],a.y[d-2])).getVectorToPoint(e),e=c.angleTo(d.reverse()),i=0.35*c.getLength(),d=(new q(d.x+c.x,d.y+c.y)).resizeTo(Math.max(0.05,e)*i);return["c",k(d.x,2),k(d.y,2),k(c.x,
2),k(c.y,2),k(c.x,2),k(c.y,2)]}return["l",k(c.x,2),k(c.y,2)]}function e(a,e,d){for(var e=["M",k(a.x[0]-e,2),k(a.y[0]-d,2)],d=1,c=a.x.length-1;d<c;d++)e.push.apply(e,t(a,d,1));0<c?e.push.apply(e,r(a,d,1)):0===c&&e.push.apply(e,["l",1,1]);return e.join(" ")}function y(a){var f=['<?xml version="1.0" encoding="UTF-8" standalone="no"?>','<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">'],d,c=a.length,l,i=[],h=[],k=l=d=0,n=0,p=[];if(0!==c){for(d=0;d<c;d++){k=
a[d];n=[];l={x:[],y:[]};for(var m=void 0,b=void 0,m=0,b=k.x.length;m<b;m++)n.push({x:k.x[m],y:k.y[m]});n=simplify(n,0.7,!0);m=0;for(b=n.length;m<b;m++)l.x.push(n[m].x),l.y.push(n[m].y);p.push(l);i=i.concat(l.x);h=h.concat(l.y)}a=Math.min.apply(null,i)-1;c=Math.max.apply(null,i)+1;i=Math.min.apply(null,h)-1;h=Math.max.apply(null,h)+1;k=0>a?0:a;n=0>i?0:i;d=c-a;l=h-i}f.push('<svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="'+d.toString()+'" height="'+l.toString()+'">');d=0;for(c=p.length;d<
c;d++)l=p[d],f.push('<path fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="'+e(l,k,n)+'"/>');f.push("</svg>");return f.join("")}function v(a){return[p,y(a)]}function z(a){return[h,x(y(a))]}var u=window;"use strict";("undefined"!=typeof exports?exports:u).simplify=function(a,e,d){e=void 0!==e?e*e:1;if(!d){for(var c=a.length,l,i=a[0],h=[i],d=1;d<c;d++){l=a[d];var k=l.x-i.x,n=l.y-i.y;k*k+n*n>e&&(h.push(l),i=l)}a=(i!==l&&h.push(l),h)}l=a;var d=l.length,
c=new ("undefined"!=typeof Uint8Array?Uint8Array:Array)(d),i=0,h=d-1,m,p,b=[],j=[],s=[];for(c[i]=c[h]=1;h;){n=0;for(k=i+1;k<h;k++){m=l[k];var g=l[i],r=l[h],q=g.x,t=g.y,g=r.x-q,u=r.y-t,v=void 0;if(0!==g||0!==u)v=((m.x-q)*g+(m.y-t)*u)/(g*g+u*u),1<v?(q=r.x,t=r.y):0<v&&(q+=g*v,t+=u*v);m=(g=m.x-q,u=m.y-t,g*g+u*u);m>n&&(p=k,n=m)}n>e&&(c[p]=1,b.push(i),j.push(p),b.push(p),j.push(h));i=b.pop();h=j.pop()}for(k=0;k<d;k++)c[k]&&s.push(l[k]);return a=s,a};if("function"!==typeof x)var x=function(a){var e="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=".split(""),
d,c,h,i,k=0,m=0,n="",n=[];do d=a.charCodeAt(k++),c=a.charCodeAt(k++),h=a.charCodeAt(k++),i=d<<16|c<<8|h,d=i>>18&63,c=i>>12&63,h=i>>6&63,i&=63,n[m++]=e[d]+e[c]+e[h]+e[i];while(k<a.length);n=n.join("");a=a.length%3;return(a?n.slice(0,a-3):n)+"===".slice(a||3)};var p="image/svg+xml",h="image/svg+xml;base64";if("undefined"===typeof $)throw Error("We need jQuery for some of the functionality. jQuery is not detected. Failing to initialize...");u=$.fn.jSignature;u("addPlugin","export","svg",v);u("addPlugin",
"export",p,v);u("addPlugin","export","svgbase64",z);u("addPlugin","export",h,z)})();
//----------------modernizr.js--------------------------------------------------

/* Modernizr 2.5.2 (Custom Build) | MIT & BSD
 * Build: http://www.modernizr.com/download/#-borderradius-csscolumns-canvas-touch-mq-cssclasses-addtest-teststyles-testprop-testallprops-prefixes-domprefixes-fullscreen_api
 */
;window.Modernizr=function(a,b,c){function A(a){j.cssText=a}function B(a,b){return A(m.join(a+";")+(b||""))}function C(a,b){return typeof a===b}function D(a,b){return!!~(""+a).indexOf(b)}function E(a,b){for(var d in a)if(j[a[d]]!==c)return b=="pfx"?a[d]:!0;return!1}function F(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:C(f,"function")?f.bind(d||b):f}return!1}function G(a,b,c){var d=a.charAt(0).toUpperCase()+a.substr(1),e=(a+" "+o.join(d+" ")+d).split(" ");return C(b,"string")||C(b,"undefined")?E(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),F(e,b,c))}var d="2.5.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k=b.createElement("div"),l=b.body,m=l?l:b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),k.appendChild(j);return f=["&#173;","<style>",a,"</style>"].join(""),k.id=h,m.innerHTML+=f,m.appendChild(k),l||g.appendChild(m),i=c(k,a),l?k.parentNode.removeChild(k):m.parentNode.removeChild(m),!!i},x=function(b){var c=a.matchMedia||a.msMatchMedia;if(c)return c(b).matches;var d;return w("@media "+b+" { #"+h+" { position: absolute; } }",function(b){d=(a.getComputedStyle?getComputedStyle(b,null):b.currentStyle)["position"]=="absolute"}),d},y={}.hasOwnProperty,z;!C(y,"undefined")&&!C(y.call,"undefined")?z=function(a,b){return y.call(a,b)}:z=function(a,b){return b in a&&C(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e});var H=function(c,d){var f=c.join(""),g=d.length;w(f,function(c,d){var f=b.styleSheets[b.styleSheets.length-1],h=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"",i=c.childNodes,j={};while(g--)j[i[g].id]=i[g];e.touch="ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch||(j.touch&&j.touch.offsetTop)===9},g,d)}([,["@media (",m.join("touch-enabled),("),h,")","{#touch{top:9px;position:absolute}}"].join("")],[,"touch"]);q.canvas=function(){var a=b.createElement("canvas");return!!a.getContext&&!!a.getContext("2d")},q.touch=function(){return e.touch},q.borderradius=function(){return G("borderRadius")},q.csscolumns=function(){return G("columnCount")};for(var I in q)z(q,I)&&(v=I.toLowerCase(),e[v]=q[I](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)z(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,g.className+=" "+(b?"":"no-")+a,e[a]=b}return e},A(""),i=k=null,e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.mq=x,e.testProp=function(a){return E([a])},e.testAllProps=G,e.testStyles=w,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),Modernizr.addTest("fullscreen",function(){for(var a=0;a<Modernizr._domPrefixes.length;a++)if(document[Modernizr._domPrefixes[a].toLowerCase()+"CancelFullScreen"])return!0;return!!document.cancelFullScreen||!1});

//-----------------------------------flashcanvas.js------------------------------------------


/** @preserve FlashCanvas, ${buildDate} ${commitID}
 * Copyright 2012 Willow Systems Corp
 * Copyright (c) 2009      Tim Cameron Ryan
 * Copyright (c) 2009-2011 FlashCanvas Project
 * Released under the MIT/X License
 */

// Reference:
//   http://www.whatwg.org/specs/web-apps/current-work/multipage/the-canvas-element.html
//   http://dev.w3.org/html5/spec/the-canvas-element.html

// If the browser is IE and does not support HTML5 Canvas
if (window["ActiveXObject"] && !window["CanvasRenderingContext2D"]) {

(function() {
'use strict'

var window = this
, document = window.document
, undefined

/*
 * Constant
 */

var NULL                        = null;
var CANVAS                      = "canvas";
var CANVAS_RENDERING_CONTEXT_2D = "CanvasRenderingContext2D";
var CANVAS_GRADIENT             = "CanvasGradient";
var CANVAS_PATTERN              = "CanvasPattern";
var FLASH_CANVAS                = "FlashCanvas";
var OBJECT_ID_PREFIX            = "external";
var ON_FOCUS                    = "onfocus";
var ON_PROPERTY_CHANGE          = "onpropertychange";
var ON_READY_STATE_CHANGE       = "onreadystatechange";
var ON_UNLOAD                   = "onunload";

var BASE_URL = (function(){
    var scripts = this.document.getElementsByTagName("script")

    // async script tag injections lead to our script NOT being the last. so
    // var script  = scripts[scripts.length - 1];
    // will not work

    // so we just loop over scripts and look for "flashcanvas"
    // and go for "last script tag's src" only if path is not matched 
    // (may happen when flashcanvas script is loaded with name not containing 'flashcanvas')

    // backwardCompatibilityUrl: original script was looking at last script tag's src.
    // we simulate that for cases when proper URL is not found elsewhere.

    var backwardCompatibilityUrl = ''
    var i = scripts.length
    if (i) {
        backwardCompatibilityUrl = scripts[i - 1].src || ''
        while (i){
            script = scripts[i - 1] // yes, we look from the back of the queue
            if (script.src && script.src.match('flashcanvas')) {
                // we are trying to return absolute path:
                // @see http://msdn.microsoft.com/en-us/library/ms536429(VS.85).aspx
                // @see http://stackoverflow.com/questions/984510/what-is-my-script-src-url
                if (document.documentMode >= 8) {
                    return script.src;
                } else {
                    return script.getAttribute("src", 4);
                }
            }
            ;i--;
        }
    }
    return backwardCompatibilityUrl
}).call(window).replace(/[^\/]+$/, "") // last part trims all chars following last '/'

// DOMException code
var INDEX_SIZE_ERR              =  1;
var NOT_SUPPORTED_ERR           =  9;
var INVALID_STATE_ERR           = 11;
var SYNTAX_ERR                  = 12;
var TYPE_MISMATCH_ERR           = 17;
var SECURITY_ERR                = 18;

/**
 * @constructor
 */
function Lookup(array) {
    for (var i = 0, n = array.length; i < n; i++)
        this[array[i]] = i;
}

var properties = new Lookup([
    // Canvas element
    "toDataURL",

    // CanvasRenderingContext2D
    "save",
    "restore",
    "scale",
    "rotate",
    "translate",
    "transform",
    "setTransform",
    "globalAlpha",
    "globalCompositeOperation",
    "strokeStyle",
    "fillStyle",
    "createLinearGradient",
    "createRadialGradient",
    "createPattern",
    "lineWidth",
    "lineCap",
    "lineJoin",
    "miterLimit",
    "shadowOffsetX",
    "shadowOffsetY",
    "shadowBlur",
    "shadowColor",
    "clearRect",
    "fillRect",
    "strokeRect",
    "beginPath",
    "closePath",
    "moveTo",
    "lineTo",
    "quadraticCurveTo",
    "bezierCurveTo",
    "arcTo",
    "rect",
    "arc",
    "fill",
    "stroke",
    "clip",
    "isPointInPath",
//  "drawFocusRing",
    "font",
    "textAlign",
    "textBaseline",
    "fillText",
    "strokeText",
    "measureText",
    "drawImage",
    "createImageData",
    "getImageData",
    "putImageData",

    // CanvasGradient
    "addColorStop",

    // Internal use
    "direction",
    "resize"
]);

// Whether swf is ready for use
var isReady = {};

// Cache of images loaded by createPattern() or drawImage()
var images = {};

// Monitor the number of loading files
var lock = {};

// Callback functions passed to loadImage()
var callbacks = {};

// SPAN element embedded in the canvas
var spans = {};

var elementIsOrphan = function(e){
    var topOfDOM = false
    e = e.parentNode
    while (e && !topOfDOM){
        topOfDOM = e.body
        e = e.parentNode
    }
    return !topOfDOM
}

/**
 * 2D context
 * @constructor
 */
var CanvasRenderingContext2D = function(canvas, swf) {

    // back-reference to the canvas
    this.canvas = canvas;

    // back-reference to the swf
    this._swf = swf;

    // unique ID of canvas
    this._canvasId = swf.id.slice(8);

    // initialize drawing states
    this._initialize();

    // Count CanvasGradient and CanvasPattern objects
    this._gradientPatternId = 0;

    // Directionality of the canvas element
    this._direction = "";

    // This ensures that font properties of the canvas element is
    // transmitted to Flash.
    this._font = "";

    // frame update interval
    var self = this
    this._executeCommandIntervalID = setInterval(function() {
        if (elementIsOrphan(self.canvas)) {
            clearInterval(self._executeCommandIntervalID)
        } else {
            if (lock[self._canvasId] === 0) {
                self._executeCommand();
            }
        }
    }, 30)
};

CanvasRenderingContext2D.prototype = {
    /*
     * state
     */

    save: function() {
        // write all properties
        this._setCompositing();
        this._setShadows();
        this._setStrokeStyle();
        this._setFillStyle();
        this._setLineStyles();
        this._setFontStyles();

        // push state
        this._stateStack.push([
            this._globalAlpha,
            this._globalCompositeOperation,
            this._strokeStyle,
            this._fillStyle,
            this._lineWidth,
            this._lineCap,
            this._lineJoin,
            this._miterLimit,
            this._shadowOffsetX,
            this._shadowOffsetY,
            this._shadowBlur,
            this._shadowColor,
            this._font,
            this._textAlign,
            this._textBaseline
        ]);

        this._queue.push(properties.save);
    },

    restore: function() {
        // pop state
        var stateStack = this._stateStack;
        if (stateStack.length) {
            var state = stateStack.pop();
            this.globalAlpha              = state[0];
            this.globalCompositeOperation = state[1];
            this.strokeStyle              = state[2];
            this.fillStyle                = state[3];
            this.lineWidth                = state[4];
            this.lineCap                  = state[5];
            this.lineJoin                 = state[6];
            this.miterLimit               = state[7];
            this.shadowOffsetX            = state[8];
            this.shadowOffsetY            = state[9];
            this.shadowBlur               = state[10];
            this.shadowColor              = state[11];
            this.font                     = state[12];
            this.textAlign                = state[13];
            this.textBaseline             = state[14];
        }

        this._queue.push(properties.restore);
    },

    /*
     * transformations
     */

    scale: function(x, y) {
        this._queue.push(properties.scale, x, y);
    },

    rotate: function(angle) {
        this._queue.push(properties.rotate, angle);
    },

    translate: function(x, y) {
        this._queue.push(properties.translate, x, y);
    },

    transform: function(m11, m12, m21, m22, dx, dy) {
        this._queue.push(properties.transform, m11, m12, m21, m22, dx, dy);
    },

    setTransform: function(m11, m12, m21, m22, dx, dy) {
        this._queue.push(properties.setTransform, m11, m12, m21, m22, dx, dy);
    },

    /*
     * compositing
     */

    _setCompositing: function() {
        var queue = this._queue;
        if (this._globalAlpha !== this.globalAlpha) {
            this._globalAlpha = this.globalAlpha;
            queue.push(properties.globalAlpha, this._globalAlpha);
        }
        if (this._globalCompositeOperation !== this.globalCompositeOperation) {
            this._globalCompositeOperation = this.globalCompositeOperation;
            queue.push(properties.globalCompositeOperation, this._globalCompositeOperation);
        }
    },

    /*
     * colors and styles
     */

    _setStrokeStyle: function() {
        if (this._strokeStyle !== this.strokeStyle) {
            var style = this._strokeStyle = this.strokeStyle;
            if (typeof style === "string") {
                // OK
            } else if (style instanceof CanvasGradient ||
                       style instanceof CanvasPattern) {
                style = style.id;
            } else {
                return;
            }
            this._queue.push(properties.strokeStyle, style);
        }
    },

    _setFillStyle: function() {
        if (this._fillStyle !== this.fillStyle) {
            var style = this._fillStyle = this.fillStyle;
            if (typeof style === "string") {
                // OK
            } else if (style instanceof CanvasGradient ||
                       style instanceof CanvasPattern) {
                style = style.id;
            } else {
                return;
            }
            this._queue.push(properties.fillStyle, style);
        }
    },

    createLinearGradient: function(x0, y0, x1, y1) {
        // If any of the arguments are not finite numbers, throws a
        // NOT_SUPPORTED_ERR exception.
        if (!(isFinite(x0) && isFinite(y0) && isFinite(x1) && isFinite(y1))) {
            throwException(NOT_SUPPORTED_ERR);
        }

        this._queue.push(properties.createLinearGradient, x0, y0, x1, y1);
        return new CanvasGradient(this);
    },

    createRadialGradient: function(x0, y0, r0, x1, y1, r1) {
        // If any of the arguments are not finite numbers, throws a
        // NOT_SUPPORTED_ERR exception.
        if (!(isFinite(x0) && isFinite(y0) && isFinite(r0) &&
              isFinite(x1) && isFinite(y1) && isFinite(r1))) {
            throwException(NOT_SUPPORTED_ERR);
        }

        // If either of the radii are negative, throws an INDEX_SIZE_ERR
        // exception.
        if (r0 < 0 || r1 < 0) {
            throwException(INDEX_SIZE_ERR);
        }

        this._queue.push(properties.createRadialGradient, x0, y0, r0, x1, y1, r1);
        return new CanvasGradient(this);
    },

    createPattern: function(image, repetition) {
        // If the image is null, the implementation must raise a
        // TYPE_MISMATCH_ERR exception.
        if (!image) {
            throwException(TYPE_MISMATCH_ERR);
        }

        var tagName = image.tagName, src;
        var canvasId = this._canvasId;

        // If the first argument isn't an img, canvas, or video element,
        // throws a TYPE_MISMATCH_ERR exception.
        if (tagName) {
            tagName = tagName.toLowerCase();
            if (tagName === "img") {
                src = image.getAttribute("src", 2);
            } else if (tagName === CANVAS || tagName === "video") {
                // For now, only HTMLImageElement is supported.
                return;
            } else {
                throwException(TYPE_MISMATCH_ERR);
            }
        }

        // Additionally, we accept any object that has a src property.
        // This is useful when you'd like to specify a long data URI.
        else if (image.src) {
            src = image.src;
        } else {
            throwException(TYPE_MISMATCH_ERR);
        }

        // If the second argument isn't one of the allowed values, throws a
        // SYNTAX_ERR exception.
        if (!(repetition === "repeat"   || repetition === "no-repeat" ||
              repetition === "repeat-x" || repetition === "repeat-y"  ||
              repetition === ""         || repetition === NULL)) {
            throwException(SYNTAX_ERR);
        }

        // Special characters in the filename need escaping.
        this._queue.push(properties.createPattern, encodeXML(src), repetition);

        // If this is the first time to access the URL, the canvas should be
        // locked while the image is being loaded asynchronously.
        if (!images[canvasId][src] && isReady[canvasId]) {
            this._executeCommand();
            ++lock[canvasId];
            images[canvasId][src] = true;
        }

        return new CanvasPattern(this);
    },

    /*
     * line caps/joins
     */

    _setLineStyles: function() {
        var queue = this._queue;
        if (this._lineWidth !== this.lineWidth) {
            this._lineWidth = this.lineWidth;
            queue.push(properties.lineWidth, this._lineWidth);
        }
        if (this._lineCap !== this.lineCap) {
            this._lineCap = this.lineCap;
            queue.push(properties.lineCap, this._lineCap);
        }
        if (this._lineJoin !== this.lineJoin) {
            this._lineJoin = this.lineJoin;
            queue.push(properties.lineJoin, this._lineJoin);
        }
        if (this._miterLimit !== this.miterLimit) {
            this._miterLimit = this.miterLimit;
            queue.push(properties.miterLimit, this._miterLimit);
        }
    },

    /*
     * shadows
     */

    _setShadows: function() {
        var queue = this._queue;
        if (this._shadowOffsetX !== this.shadowOffsetX) {
            this._shadowOffsetX = this.shadowOffsetX;
            queue.push(properties.shadowOffsetX, this._shadowOffsetX);
        }
        if (this._shadowOffsetY !== this.shadowOffsetY) {
            this._shadowOffsetY = this.shadowOffsetY;
            queue.push(properties.shadowOffsetY, this._shadowOffsetY);
        }
        if (this._shadowBlur !== this.shadowBlur) {
            this._shadowBlur = this.shadowBlur;
            queue.push(properties.shadowBlur, this._shadowBlur);
        }
        if (this._shadowColor !== this.shadowColor) {
            this._shadowColor = this.shadowColor;
            queue.push(properties.shadowColor, this._shadowColor);
        }
    },

    /*
     * rects
     */

    clearRect: function(x, y, w, h) {
        this._queue.push(properties.clearRect, x, y, w, h);
    },

    fillRect: function(x, y, w, h) {
        this._setCompositing();
        this._setShadows();
        this._setFillStyle();
        this._queue.push(properties.fillRect, x, y, w, h);
    },

    strokeRect: function(x, y, w, h) {
        this._setCompositing();
        this._setShadows();
        this._setStrokeStyle();
        this._setLineStyles();
        this._queue.push(properties.strokeRect, x, y, w, h);
    },

    /*
     * path API
     */

    beginPath: function() {
        this._queue.push(properties.beginPath);
    },

    closePath: function() {
        this._queue.push(properties.closePath);
    },

    moveTo: function(x, y) {
        this._queue.push(properties.moveTo, x, y);
    },

    lineTo: function(x, y) {
        this._queue.push(properties.lineTo, x, y);
    },

    quadraticCurveTo: function(cpx, cpy, x, y) {
        this._queue.push(properties.quadraticCurveTo, cpx, cpy, x, y);
    },

    bezierCurveTo: function(cp1x, cp1y, cp2x, cp2y, x, y) {
        this._queue.push(properties.bezierCurveTo, cp1x, cp1y, cp2x, cp2y, x, y);
    },

    arcTo: function(x1, y1, x2, y2, radius) {
        // Throws an INDEX_SIZE_ERR exception if the given radius is negative.
        if (radius < 0 && isFinite(radius)) {
            throwException(INDEX_SIZE_ERR);
        }

        this._queue.push(properties.arcTo, x1, y1, x2, y2, radius);
    },

    rect: function(x, y, w, h) {
        this._queue.push(properties.rect, x, y, w, h);
    },

    arc: function(x, y, radius, startAngle, endAngle, anticlockwise) {
        // Throws an INDEX_SIZE_ERR exception if the given radius is negative.
        if (radius < 0 && isFinite(radius)) {
            throwException(INDEX_SIZE_ERR);
        }

        this._queue.push(properties.arc, x, y, radius, startAngle, endAngle, anticlockwise ? 1 : 0);
    },

    fill: function() {
        this._setCompositing();
        this._setShadows();
        this._setFillStyle();
        this._queue.push(properties.fill);
    },

    stroke: function() {
        this._setCompositing();
        this._setShadows();
        this._setStrokeStyle();
        this._setLineStyles();
        this._queue.push(properties.stroke);
    },

    clip: function() {
        this._queue.push(properties.clip);
    },

    isPointInPath: function(x, y) {
        // TODO: Implement
    },

    /*
     * text
     */

    _setFontStyles: function() {
        var queue = this._queue;
        if (this._font !== this.font) {
            try {
                var span = spans[this._canvasId];
                span.style.font = this._font = this.font;

                var style = span.currentStyle;
                var fontSize = span.offsetHeight;
                var font = [style.fontStyle, style.fontWeight, fontSize, style.fontFamily].join(" ");
                queue.push(properties.font, font);
            } catch(e) {
                // If this.font cannot be parsed as a CSS font value, then it
                // must be ignored.
            }
        }
        if (this._textAlign !== this.textAlign) {
            this._textAlign = this.textAlign;
            queue.push(properties.textAlign, this._textAlign);
        }
        if (this._textBaseline !== this.textBaseline) {
            this._textBaseline = this.textBaseline;
            queue.push(properties.textBaseline, this._textBaseline);
        }
        if (this._direction !== this.canvas.currentStyle.direction) {
            this._direction = this.canvas.currentStyle.direction;
            queue.push(properties.direction, this._direction);
        }
    },

    fillText: function(text, x, y, maxWidth) {
        this._setCompositing();
        this._setFillStyle();
        this._setShadows();
        this._setFontStyles();
        this._queue.push(properties.fillText, encodeXML(text), x, y,
                         maxWidth === undefined ? Infinity : maxWidth);
    },

    strokeText: function(text, x, y, maxWidth) {
        this._setCompositing();
        this._setStrokeStyle();
        this._setShadows();
        this._setFontStyles();
        this._queue.push(properties.strokeText, encodeXML(text), x, y,
                         maxWidth === undefined ? Infinity : maxWidth);
    },

    measureText: function(text) {
        var span = spans[this._canvasId];
        try {
            span.style.font = this.font;
        } catch(e) {
            // If this.font cannot be parsed as a CSS font value, then it must
            // be ignored.
        }

        // Replace space characters with tab characters because innerText
        // removes trailing white spaces.
        span.innerText = text.replace(/[ \n\f\r]/g, "\t");

        return new TextMetrics(span.offsetWidth);
    },

    /*
     * drawing images
     */

    drawImage: function(image, x1, y1, w1, h1, x2, y2, w2, h2) {
        // If the image is null, the implementation must raise a
        // TYPE_MISMATCH_ERR exception.
        if (!image) {
            throwException(TYPE_MISMATCH_ERR);
        }

        var tagName = image.tagName, src, argc = arguments.length;
        var canvasId = this._canvasId;

        // If the first argument isn't an img, canvas, or video element,
        // throws a TYPE_MISMATCH_ERR exception.
        if (tagName) {
            tagName = tagName.toLowerCase();
            if (tagName === "img") {
                src = image.getAttribute("src", 2);
            } else if (tagName === CANVAS || tagName === "video") {
                // For now, only HTMLImageElement is supported.
                return;
            } else {
                throwException(TYPE_MISMATCH_ERR);
            }
        }

        // Additionally, we accept any object that has a src property.
        // This is useful when you'd like to specify a long data URI.
        else if (image.src) {
            src = image.src;
        } else {
            throwException(TYPE_MISMATCH_ERR);
        }

        this._setCompositing();
        this._setShadows();

        // Special characters in the filename need escaping.
        src = encodeXML(src);

        if (argc === 3) {
            this._queue.push(properties.drawImage, argc, src, x1, y1);
        } else if (argc === 5) {
            this._queue.push(properties.drawImage, argc, src, x1, y1, w1, h1);
        } else if (argc === 9) {
            // If one of the sw or sh arguments is zero, the implementation
            // must raise an INDEX_SIZE_ERR exception.
            if (w1 === 0 || h1 === 0) {
                throwException(INDEX_SIZE_ERR);
            }

            this._queue.push(properties.drawImage, argc, src, x1, y1, w1, h1, x2, y2, w2, h2);
        } else {
            return;
        }

        // If this is the first time to access the URL, the canvas should be
        // locked while the image is being loaded asynchronously.
        if (!images[canvasId][src] && isReady[canvasId]) {
            this._executeCommand();
            ++lock[canvasId];
            images[canvasId][src] = true;
        }
    },

    /*
     * pixel manipulation
     */

    // ImageData createImageData(in float sw, in float sh);
    // ImageData createImageData(in ImageData imagedata);
    createImageData: function() {
        // TODO: Implement
    },

    // ImageData getImageData(in float sx, in float sy, in float sw, in float sh);
    getImageData: function(sx, sy, sw, sh) {
        // TODO: Implement
    },

    // void putImageData(in ImageData imagedata, in float dx, in float dy, [Optional] in float dirtyX, in float dirtyY, in float dirtyWidth, in float dirtyHeight);
    putImageData: function(imagedata, dx, dy, dirtyX, dirtyY, dirtyWidth, dirtyHeight) {
        // TODO: Implement
    },

    /*
     * extended functions
     */

    loadImage: function(image, onload, onerror) {
        var tagName = image.tagName, src;
        var canvasId = this._canvasId;

        // Get the URL of the image.
        if (tagName) {
            if (tagName.toLowerCase() === "img") {
                src = image.getAttribute("src", 2);
            }
        } else if (image.src) {
            src = image.src;
        }

        // Do nothing in the following cases:
        //  - The first argument is neither an img element nor an object
        //    with a src property,
        //  - The image has been already cached.
        if (!src || images[canvasId][src]) {
            return;
        }

        // Store the objects.
        if (onload || onerror) {
            callbacks[canvasId][src] = [image, onload, onerror];
        }

        // Load the image without drawing.
        this._queue.push(properties.drawImage, 1, encodeXML(src));

        // Execute the command immediately if possible.
        if (isReady[canvasId]) {
            this._executeCommand();
            ++lock[canvasId];
            images[canvasId][src] = true;
        }
     },

    /*
     * private methods
     */

    _initialize: function() {

        // compositing
        this.globalAlpha = this._globalAlpha = 1.0;
        this.globalCompositeOperation = this._globalCompositeOperation = "source-over";

        // colors and styles
        this.strokeStyle = this._strokeStyle = "#000000";
        this.fillStyle   = this._fillStyle   = "#000000";

        // line caps/joins
        this.lineWidth  = this._lineWidth  = 1.0;
        this.lineCap    = this._lineCap    = "butt";
        this.lineJoin   = this._lineJoin   = "miter";
        this.miterLimit = this._miterLimit = 10.0;

        // shadows
        this.shadowOffsetX = this._shadowOffsetX = 0;
        this.shadowOffsetY = this._shadowOffsetY = 0;
        this.shadowBlur    = this._shadowBlur    = 0;
        this.shadowColor   = this._shadowColor   = "rgba(0, 0, 0, 0.0)";

        // text
        this.font         = this._font         = "10px sans-serif";
        this.textAlign    = this._textAlign    = "start";
        this.textBaseline = this._textBaseline = "alphabetic";

        // command queue
        this._queue = [];

        // stack of drawing states
        this._stateStack = [];
    },

    _flush: function() {
        var queue = this._queue;
        this._queue = [];
        return queue;
    },

    _executeCommand: function() {
        // execute commands
        var commands = this._flush();
        if (commands.length > 0) {
            try {
                return eval( this._swf.CallFunction(
                    '<invoke name="executeCommand" returntype="javascript"><arguments><string>'
                    + commands.join("&#0;") + "</string></arguments></invoke>"
                ))
            } catch (ex) {
            }
        }
    },

    _resize: function(width, height) {
        // Flush commands in the queue
        this._executeCommand();

        // Clear back to the initial state
        this._initialize();

        // Adjust the size of Flash to that of the canvas
        if (width > 0) {
            this._swf.width = width;
        }
        if (height > 0) {
            this._swf.height = height;
        }

        // Execute a resize command at the start of the next frame
        this._queue.push(properties.resize, width, height);
    }
};

/**
 * CanvasGradient stub
 * @constructor
 */
var CanvasGradient = function(ctx) {
    this._ctx = ctx;
    this.id   = ctx._gradientPatternId++;
};

CanvasGradient.prototype = {
    addColorStop: function(offset, color) {
        // Throws an INDEX_SIZE_ERR exception if the offset is out of range.
        if (isNaN(offset) || offset < 0 || offset > 1) {
            throwException(INDEX_SIZE_ERR);
        }

        this._ctx._queue.push(properties.addColorStop, this.id, offset, color);
    }
};

/**
 * CanvasPattern stub
 * @constructor
 */
var CanvasPattern = function(ctx) {
    this.id = ctx._gradientPatternId++;
};

/**
 * TextMetrics stub
 * @constructor
 */
var TextMetrics = function(width) {
    this.width = width;
};

/**
 * DOMException
 * @constructor
 */
var DOMException = function(code) {
    var DOMExceptionNames = {
        1:  "INDEX_SIZE_ERR",
        9:  "NOT_SUPPORTED_ERR",
        11: "INVALID_STATE_ERR",
        12: "SYNTAX_ERR",
        17: "TYPE_MISMATCH_ERR",
        18: "SECURITY_ERR"
    }

    this.code    = code;
    this.message = DOMExceptionNames[code];
};

DOMException.prototype = new Error;

/*
 * Event handlers
 */


/*
 * FlashCanvas global object API (not the Canvas API, just initializer etc.)
 */

/**
Generates a URL pointing to fashcanvas.swf file by inspecing constants and Window-specific
settings and deriving the path appropirate for that Window.
@public
@function
@param window {Object} Pointer to Window (top, child frames) object instance into which we will dig.
@returns {String} relative or absolute path to the swf file.
*/
function getSwfUrl(window) {
    return ( (window[FLASH_CANVAS + "Options"] || {})["swfPath"] || BASE_URL ) + "flashcanvas.swf"
}

var registeredEvents = 'registeredEvents'
, canvasesProp = 'canvases'
, initWindow = 'initWindow'
, initElement = 'initElement'
, saveImage = 'saveImage'
, unlock = 'unlock'
, trigger = 'trigger'

var FlashCanvas = {}

FlashCanvas[registeredEvents] = {} // 'canvasID':[[eventName, handler],...]
FlashCanvas[canvasesProp] = {}

FlashCanvas[initWindow] = function(window){

    var document = window.document

    // IE HTML5 shiv
    document.createElement(CANVAS);

    // setup default CSS
    document.createStyleSheet().cssText =
        CANVAS + "{display:inline-block;overflow:hidden;width:300px;height:150px}";

    var canvases = this[canvasesProp]

    var registeredEvents = this.registeredEvents

    var onUnload = function() {
        window.detachEvent(ON_UNLOAD, onUnload);

        var canvas
        , swf
        , prop
        , NULL = null
        , parentWindow
        , i, l, e

        for (var canvasId in canvases) {
            canvas = canvases[canvasId]
            swf = canvas.firstChild
            parentWindow = canvas.ownerDocument.defaultView ? canvas.ownerDocument.defaultView : canvas.ownerDocument.parentWindow

            // parent frame may be handling canvas elemns in self and in children frames. We only kill
            // the canvases in "windows" that "unloaded"
            if (window === parentWindow) {
                // clean up the references of swf.executeCommand and swf.resize
                for (prop in swf) {
                    if (typeof swf[prop] === "function") {
                        swf[prop] = NULL;
                    }
                }

                // clean up the references of canvas.getContext and canvas.toDataURL
                for (prop in canvas) {
                    if (typeof canvas[prop] === "function") {
                        canvas[prop] = NULL;
                    }
                }

                i = 0
                l = registeredEvents[canvasId].length
                for (; i !== l; i++) {
                    e = registeredEvents[canvasId][i] // it's an array: [eventName, eventHandler]
                    swf.detachEvent(e[0], e[1]);
                    canvas.detachEvent(e[0], e[1]);
                }
            }
        }

        // delete exported symbols
        window[CANVAS_RENDERING_CONTEXT_2D] = NULL;
        window[CANVAS_GRADIENT]             = NULL;
        window[CANVAS_PATTERN]              = NULL;
        window[FLASH_CANVAS]                = NULL;
    }

    // prevent IE6 memory leaks
    window.attachEvent(ON_UNLOAD, onUnload);

    window[CANVAS_RENDERING_CONTEXT_2D] = CanvasRenderingContext2D;
    window[CANVAS_GRADIENT]             = CanvasGradient;
    window[CANVAS_PATTERN]              = CanvasPattern;
    window[FLASH_CANVAS]                = FlashCanvas;

    // preload SWF file if it's in the same domain
    var swfUrl = getSwfUrl(window)
    if (swfUrl.indexOf(window.location.protocol + "//" + window.location.host + "/") === 0) {
        window.setTimeout(function(){
            var req = new ActiveXObject("Microsoft.XMLHTTP");
            req.open("GET", swfUrl, false);
            req.send(NULL);
        }, 0)
    }

    function onReadyStateChange() {
        if (window.document.readyState === "complete") {
            window.document.detachEvent(ON_READY_STATE_CHANGE, onReadyStateChange);
            var canvases = window.document.getElementsByTagName(CANVAS);
            for (var i = 0, n = canvases.length; i < n; ++i) {
                FlashCanvas[initElement](canvases[i]);
            }
        }
    }

    // initialize canvas elements
    if (window.document.readyState === "complete") {
        onReadyStateChange();
    } else {
        window.document.attachEvent(ON_READY_STATE_CHANGE, onReadyStateChange);
    }

}

FlashCanvas[initElement] = function(canvas) {
    // Check whether the initialization is required or not.
    if (canvas.getContext) {
        return canvas;
    }

    // when init is called from parent frame over canvas sitting in child frame,
    // FlashCanvas does not pick up the right "window" or "document" - the one from child frame.
    // to avoid making the users specify window, document, we sniff them out from canvas element.
    var document = canvas.ownerDocument
    , window = document.defaultView ? document.defaultView : document.parentWindow

    if (!window[CANVAS_RENDERING_CONTEXT_2D]) {
        // this may happen when FlashCanvas.initElement is called from parent fram on a canvas in child frame
        // child frame's `window` will not have the canvas methods
        this[initWindow](window)
    }

    // initialize lock
    var canvasId        = getUniqueId();
    var objectId        = OBJECT_ID_PREFIX + canvasId;
    isReady[canvasId]   = false;
    images[canvasId]    = {};
    lock[canvasId]      = 1;
    callbacks[canvasId] = {};

    this.registeredEvents[canvasId] = []

    // Set the width and height attributes.
    setCanvasSize(canvas);

    var swfUrl = getSwfUrl(window)

    // on iframes with src = 'about:blank' location.protocol is "about:"
    // so, let's not go crafty nuts about this:
    var protocol = window.location.protocol === 'https:' ? 'https:' : 'http:'
    // embed swf and SPAN element
    canvas.innerHTML =
        '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"' +
        ' codebase="' + protocol + '//fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"' +
        ' width="100%" height="100%" id="' + objectId + '">' +
        '<param name="allowScriptAccess" value="always">' +
        '<param name="flashvars" value="id=' + objectId + '">' +
        '<param name="wmode" value="transparent">' +
        // '<param name="movie" value="'+swfUrl+'">'
        '</object>' +
        '<span style="margin:0;padding:0;border:0;display:inline-block;position:static;height:1em;overflow:visible;white-space:nowrap">' +
        '</span>';

    this[canvasesProp][canvasId] = canvas;
    var swf = canvas.firstChild;
    spans[canvasId] = canvas.lastChild;

    // Check whether the canvas element is in the DOM tree
    var documentContains = document.body.contains;
    if (documentContains(canvas)) {
        // Load swf file immediately
        swf["movie"] = swfUrl;
    } else {
        // Wait until the element is added to the DOM tree
        var intervalId = window.setInterval(function() {
            if (documentContains(canvas)) {
                window.clearInterval(intervalId);
                swf["movie"] = swfUrl;
            }
        }, 2);
    }

    // If the browser is IE6 or in quirks mode
    if (document.compatMode === "BackCompat" || !window.XMLHttpRequest) {
        spans[canvasId].style.overflow = "hidden";
    }

    // initialize context
    var ctx = new CanvasRenderingContext2D(canvas, swf);

    // canvas API
    canvas.getContext = function(contextId) {
        return contextId === "2d" ? ctx : NULL;
    };

    canvas.toDataURL = function(type, quality) {
        if (("" + type).toLowerCase() === "image/jpeg") {
            ctx._queue.push(
                properties.toDataURL
                , type
                , typeof quality === "number" ? quality : ""
            )
        } else {
            ctx._queue.push(properties.toDataURL, type);
        }
        return ctx._executeCommand();
    };

    // the events handler functions are declared within initElement because
    // when it is inited against an iframe, the "window" object points
    // elswhere. Thus, we create new set of event handlers for each "window" 
    // In other words, "window" below is preset.

    // forward the event to the parent
    var onFocus = function(e) {
        var swf = e ? e.srcElement : window.event.srcElement
        , canvas = swf.parentNode
        swf.blur();
        canvas.focus();
    }

    this.registeredEvents[canvasId].push(
        [ON_FOCUS, onFocus]
    )

    // add event listener
    swf.attachEvent(ON_FOCUS, onFocus);

    return canvas;
}

FlashCanvas[saveImage] = function(canvas) {
    var swf = canvas.firstChild;
    swf[saveImage]();
}

FlashCanvas.setOptions = function(options) {
    // TODO: Implement
}

FlashCanvas[trigger] = function(canvasId, type) {
    var canvas = this[canvasesProp][canvasId];
    canvas.fireEvent("on" + type);
}

FlashCanvas[unlock] = function(canvasId, url, error) {

    try {
        
    var canvas, swf, width, height;
    var _callback, image, callback;
    var document, window

    // If Flash becomes ready
    if (url === undefined) {
        canvas = this[canvasesProp][canvasId];
        swf    = canvas.firstChild;

        // when init is called from parent frame over canvas sitting in child frame,
        // FlashCanvas does not pick up the right "window" or "document" - the one from child frame.
        // to avoid making the users specify window, document, we sniff them out from canvas element.
        document = canvas.ownerDocument
        window = document.defaultView ? document.defaultView : document.parentWindow

        // Set the width and height attributes of the canvas element.
        setCanvasSize(canvas);
        width  = canvas.width;
        height = canvas.height;

        canvas.style.width  = width  + "px";
        canvas.style.height = height + "px";

        // Adjust the size of Flash to that of the canvas
        if (width > 0) {
            swf.width = width;
        }
        if (height > 0) {
            swf.height = height;
        }
        swf.resize(width, height);

        // the events handler functions are declared within initElement because
        // when it is inited against an iframe, the "window" object points
        // elswhere. Thus, we create new set of event handlers for each "window" 
        // In other words, "window" below is NOT resolved runtime. It's preset.

        var onPropertyChange = function(e) {
            var e = e ? e : window.event
            , prop = e.propertyName

            if (prop === "width" || prop === "height") {
                var canvas = e.srcElement;
                var value  = canvas[prop];
                var number = parseInt(value, 10);

                if (isNaN(number) || number < 0) {
                    number = (prop === "width") ? 300 : 150;
                }

                if (value === number) {
                    canvas.style[prop] = number + "px";
                    canvas.getContext("2d")._resize(canvas.width, canvas.height);
                } else {
                    canvas[prop] = number;
                }
            }
        }

        this.registeredEvents[canvasId].push(
            [ON_PROPERTY_CHANGE, onPropertyChange]
        )

        // Add event listener
        canvas.attachEvent(ON_PROPERTY_CHANGE, onPropertyChange);

        // ExternalInterface is now ready for use
        isReady[canvasId] = true;

        // Call the onload event handler
        if (typeof canvas.onload === "function") {
            window.setTimeout(function() {
                canvas.onload();
            }, 0);
        }
    }

    // If callback functions were defined
    else if (_callback = callbacks[canvasId][url]) {
        image    = _callback[0];
        callback = _callback[1 + error];
        delete callbacks[canvasId][url];

        // Call the onload or onerror callback function.
        if (typeof callback === "function") {
            callback.call(image);
        }
    }

    if (lock[canvasId]) {
        --lock[canvasId];
    }

    } catch (ex) {
        // .unlock is called from within try catch inside flash. We never see errors if we don't
        // capture and display them.
        console.log("Call to FlashCanvas.unlock had thrown an error: ", ex.message)
        throw ex
    }

}


/*
 * Utility methods
 */

// Get a unique ID composed of alphanumeric characters.
function getUniqueId() {
    return Math.random().toString(36).slice(2) || "0";
}

// Escape characters not permitted in XML.
function encodeXML(str) {
    return ("" + str).replace(/&/g, "&amp;").replace(/</g, "&lt;");
}

function throwException(code) {
    throw new DOMException(code);
}

// The width and height attributes of a canvas element must have values that
// are valid non-negative integers.
function setCanvasSize(canvas) {
    var width  = parseInt(canvas.width, 10);
    var height = parseInt(canvas.height, 10);

    if (isNaN(width) || width < 0) {
        width = 300;
    }
    if (isNaN(height) || height < 0) {
        height = 150;
    }

    canvas.width  = width;
    canvas.height = height;
}

/*
 * initialization
 */

FlashCanvas.initWindow(window, document)

// Prevent Closure Compiler from removing the function.
keep = [
    CanvasRenderingContext2D.measureText,
    CanvasRenderingContext2D.loadImage
];

}).call(window);

}