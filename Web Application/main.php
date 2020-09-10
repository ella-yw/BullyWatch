<?php
	session_start();
	$_SESSION['hello'] = "hello";
	session_unset();
?>
<!DOCTYPE html>
<html lang="en">
<head>


<style>
a { cursor: pointer; }
div#load_screen{
	opacity: 1;
	position: fixed;
    z-index:10;
	top: 0px;
	width: 100%;
	height: 1600px;
}
div#load_screen > div#loading{
	color:#FFF;
	width:120px;
	height:24px;
	margin: 300px auto;
}
</style>
<title>Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style_home.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/script.js"></script> 
<script src="js/superfish.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
<script src="js/tmStickUp.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<!--  Font-Awesome Style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!--  Pretty Photo Style -->
    <link href="css/prettyPhoto.css" rel="stylesheet" />
    <!--  Custom Style -->
    <link href="css/style_quotes.css" rel="stylesheet" />
    <!--  Core Bootstrap Script -->
    <script src="js/bootstrap.js"></script>
    <!--  Scrolling Script -->
    <script src="js/jquery.easing.min.js"></script>
    <!--  PrettyPhoto Script -->
    <script src="js/jquery.prettyPhoto.js"></script>
    <!--  knob Scripts -->
    <script src="js/jquery.knob.js"></script>
    <!--  Custom Scripts -->
    <script src="js/custom.js"></script>
<script>
       
 $(window).load(function(){
  $().UItoTop({ easingType: 'easeOutQuart' });
  $('#stuck_container').tmStickUp({});  
 }); 
</script>
 <script type = "text/javascript">

	function development() {
		alert("Coming Soon!!");
	}

});
</script>
</head>
<body>
<div style = "margin:0 auto">

<!--==============================
              header
=================================-->

  <section id="stuck_container">
  <!--==============================
              Stuck menu
  =================================-->
    <div>

          <nav class = "isStuck" >
              <div class = "center">
			  <b><span id = "main_heading" >
           <div style="padding-top:20px;padding-bottom:10px;line-height:35px;color:white;font-size:45px;font-family:'Trebuchet MS', Helvetica, sans-serif;">Stop Being Bullied</div>
</span></b><div id = "description_heading" style="font-family:'Trebuchet MS', Helvetica, sans-serif;font-size:12px;">This is a web application that allows an easy-to-use bullying reporting system where a bullied victim can confidentially report an incident that would have happened to him/her. On those incidents, it permits teachers to take accountable actions, who can choose to place the bully under continuous or periodic monitoring through various behavior monitoring parameters, which produce an auto-generated rating graphically represented. As an addition, many levels of administration have been incorporated - School Administrators, School District Administrators, Province Administrators and Country Administrators, who are given, appropriate user rights, such as filtered reports, and master data. This web application has the potential to help kids who are constantly getting bullied by providing a safe place for bullied victims to report such incidents knowing an action would be taken right away. </div>
         </div>
             

	</ul>
            </nav>
			
			</div>    
  </section>
   <div style = "margin-right:50px;float:right">
   <div style="position:fixed" >
   <br/>
            <a id = "social_linkedin" style="text-decoration:none" href="https://www.linkedin.com/company/stop-being-bullied" class="fa fa-linkedin-square"></a>
          
            
</div>
</div>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/basic.css" rel="stylesheet" />
        </head>
<body>
    <div id="wrapper">
       
        <nav class="navbar-default navbar-side" id = "nav"  role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                   <li>
                        <a class="active-menu" href="main.php"><i class="fa fa-dashboard "></i>Home</a>
                    </li>
                    <li>
                        <a href="Report.pdf"><i class="fa fa-desktop"></i>About </a>
                    </li>
					<!--<li>
                        <a onclick = "development()" ><i class="fa fa-info-circle fa-spin"></i>Bullying Facts</a>
                    </li>
                     <li>
                        <a><i class="fa fa-cog fa-spin"></i>Soggestions For: </a>
						 <li>
                       
                    <ul class="nav nav-second-level">
                            <li> <a style = "color:yellow; font-weight:900" onclick = "development()"><span class="fa fa-male"></span><i class="fa fa-female"></i>Parents/Guardians</a> </li>
								<li> <a style = "color:yellow; font-weight:900" onclick = "development()" ><i class="fa fa-users"></i>Community</a> </li>
                           
							<li>
                                <a style = "color:yellow; font-weight:900"><i class="fa fa-graduation-cap "></i>Students</a>
								<ul> <a style = "text-decoration:none;color:green; font-weight:bold" onclick = "development()"><i class="fa fa-child "></i>&nbsp;&nbsp;&nbsp;&nbsp;<b>Kids</b></a> </ul>
								<ul> <a style = "text-decoration:none;color:green; font-weight:bold" onclick = "development()"><i class="fa fa-child "></i>&nbsp;&nbsp;&nbsp;&nbsp;<b>Youth</b></a> </ul>
                           </li>
                            
								
                        </ul>
                    </li>
                         
                    </li> -->
					</ul>
                  
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
	<header >	
<div class="reviews-section">
        <br/>
            <div class="container" >
                <div class="row " >
                    <div class="col-lg-12 col-md-12 " >
                        <div id="reviews" class="carousel slide" data-ride="carousel" >

                            <ol class="carousel-indicators">
                                <li data-target="#reviews" data-slide-to="0" class="" style = 'background-color:black'></li>
                                <li data-target="#reviews" data-slide-to="1" class="active" style = 'background-color:black'></li>
                                <li data-target="#reviews" data-slide-to="2" class="" style = 'background-color:black'></li>
                            </ol>

                            <div class="carousel-inner" id = "custom-quote-style-responsive" >
                                <div class="item" >
                                    <div class="container center">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom">

                                            <h3 style = 'color:black;font-size:17px;'><i class="fa fa-quote-left"></i> Never be bullied into silence. Never allow yourself to be a victim. Accept no one's definition of life; define yourself. <i class="fa fa-quote-right"></i><br/></h3>
<br/><br/>
                                            <h5 class="pull-right" style='color:black'><strong class="c-black"> - Robert Frost</strong></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="item active">
                                    <div class="container center">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom" >
                                            <h3 style = 'color:black;font-size:17px;'><i class="fa fa-quote-left"></i> I have been driven many times upon my knees by the overwhelming conviction that I had nowhere else to go. My wisdom seemed insufficient for the day. <i class="fa fa-quote-right"></i><br/></h3>
<br/><br/>
                                            <h5 class="pull-right" style='color:black'><strong class="c-black"> - Abraham Lincoln</strong></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="container center">
                                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 slide-custom">
                                            <h3 style = 'color:black;font-size:17px;'><i class="fa fa-quote-left"></i> If we are to teach real peace in this world, and if we are to carry on a real war against war, we shall have to begin with the children. <i class="fa fa-quote-right"></i><br/></h3>
<br/><br/>
                                            <h5 class="pull-right" style='color:black'><strong class="c-black"> - Mahatma Gandhi</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
    </div>

  <section class="page1_header">
  <div  >
 <!-- #region Jssor Slider Begin --><!-- Generated by Jssor Slider Maker. --><!-- This is deep minimized demo, it works alone, it doesn't depend on any javascript library. --><script>(function(h,g,c,j,e,l,k){/*! Jssor */
new(function(){});var f={ed:function(a){return-c.cos(a*c.PI)/2+.5},Zc:function(a){return a},De:function(a){return-a*(a-2)},Ee:function(a){return a*a*a},Fe:function(a){return(a-=1)*a*a+1}},d={m:f.Zc,l:f.Ee,Vc:f.Fe};var b=new function(){var d=this,Bb=/\S+/g,G=1,db=2,hb=3,gb=4,lb=5,H,r=0,i=0,s=0,W=0,z=0,J=navigator,pb=J.appName,o=J.userAgent,p=parseFloat;function zb(){if(!H){H={rf:"ontouchstart"in h||"createTouch"in g};var a;if(J.pointerEnabled||(a=J.msPointerEnabled))H.ld=a?"msTouchAction":"touchAction"}return H}function v(j){if(!r){r=-1;if(pb=="Microsoft Internet Explorer"&&!!h.attachEvent&&!!h.ActiveXObject){var e=o.indexOf("MSIE");r=G;s=p(o.substring(e+5,o.indexOf(";",e)));/*@cc_on W=@_jscript_version@*/;i=g.documentMode||s}else if(pb=="Netscape"&&!!h.addEventListener){var d=o.indexOf("Firefox"),b=o.indexOf("Safari"),f=o.indexOf("Chrome"),c=o.indexOf("AppleWebKit");if(d>=0){r=db;i=p(o.substring(d+8))}else if(b>=0){var k=o.substring(0,b).lastIndexOf("/");r=f>=0?gb:hb;i=p(o.substring(k+1,b))}else{var a=/Trident\/.*rv:([0-9]{1,}[\.0-9]{0,})/i.exec(o);if(a){r=G;i=s=p(a[1])}}if(c>=0)z=p(o.substring(c+12))}else{var a=/(opera)(?:.*version|)[ \/]([\w.]+)/i.exec(o);if(a){r=lb;i=p(a[2])}}}return j==r}function q(){return v(G)}function R(){return q()&&(i<6||g.compatMode=="BackCompat")}function fb(){return v(hb)}function kb(){return v(lb)}function wb(){return fb()&&z>534&&z<535}function K(){v();return z>537||i>42||r==G&&i>=11}function P(){return q()&&i<9}function xb(a){var b,c;return function(f){if(!b){b=e;var d=a.substr(0,1).toUpperCase()+a.substr(1);n([a].concat(["WebKit","ms","Moz","O","webkit"]),function(g,e){var b=a;if(e)b=g+d;if(f.style[b]!=k)return c=b})}return c}}function vb(b){var a;return function(c){a=a||xb(b)(c)||b;return a}}var L=vb("transform");function ob(a){return{}.toString.call(a)}var F;function Hb(){if(!F){F={};n(["Boolean","Number","String","Function","Array","Date","RegExp","Object"],function(a){F["[object "+a+"]"]=a.toLowerCase()})}return F}function n(b,d){var a,c;if(ob(b)=="[object Array]"){for(a=0;a<b.length;a++)if(c=d(b[a],a,b))return c}else for(a in b)if(c=d(b[a],a,b))return c}function C(a){return a==j?String(a):Hb()[ob(a)]||"object"}function mb(a){for(var b in a)return e}function A(a){try{return C(a)=="object"&&!a.nodeType&&a!=a.window&&(!a.constructor||{}.hasOwnProperty.call(a.constructor.prototype,"isPrototypeOf"))}catch(b){}}function u(a,b){return{x:a,y:b}}function sb(b,a){setTimeout(b,a||0)}function I(b,d,c){var a=!b||b=="inherit"?"":b;n(d,function(c){var b=c.exec(a);if(b){var d=a.substr(0,b.index),e=a.substr(b.index+b[0].length+1,a.length-1);a=d+e}});a=c+(!a.indexOf(" ")?"":" ")+a;return a}function ub(b,a){if(i<9)b.style.filter=a}d.yf=zb;d.nd=q;d.Af=fb;d.qd=kb;d.xf=K;d.pb=P;xb("transform");d.wd=function(){return i};d.uf=function(){v();return z};d.W=sb;function Z(a){a.constructor===Z.caller&&a.gd&&a.gd.apply(a,Z.caller.arguments)}d.gd=Z;d.ub=function(a){if(d.pf(a))a=g.getElementById(a);return a};function t(a){return a||h.event}d.Cd=t;d.qc=function(b){b=t(b);var a=b.target||b.srcElement||g;if(a.nodeType==3)a=d.Ed(a);return a};d.Id=function(a){a=t(a);return{x:a.pageX||a.clientX||0,y:a.pageY||a.clientY||0}};function D(c,d,a){if(a!==k)c.style[d]=a==k?"":a;else{var b=c.currentStyle||c.style;a=b[d];if(a==""&&h.getComputedStyle){b=c.ownerDocument.defaultView.getComputedStyle(c,j);b&&(a=b.getPropertyValue(d)||b[d])}return a}}function bb(b,c,a,d){if(a!==k){if(a==j)a="";else d&&(a+="px");D(b,c,a)}else return p(D(b,c))}function m(c,a){var d=a?bb:D,b;if(a&4)b=vb(c);return function(e,f){return d(e,b?b(e):c,f,a&2)}}function Eb(b){if(q()&&s<9){var a=/opacity=([^)]*)/.exec(b.style.filter||"");return a?p(a[1])/100:1}else return p(b.style.opacity||"1")}function Gb(b,a,f){if(q()&&s<9){var h=b.style.filter||"",i=new RegExp(/[\s]*alpha\([^\)]*\)/g),e=c.round(100*a),d="";if(e<100||f)d="alpha(opacity="+e+") ";var g=I(h,[i],d);ub(b,g)}else b.style.opacity=a==1?"":c.round(a*100)/100}var M={U:["rotate"],fb:["rotateX"],db:["rotateY"],Wb:["skewX"],fc:["skewY"]};if(!K())M=B(M,{v:["scaleX",2],A:["scaleY",2],Z:["translateZ",1]});function N(d,a){var c="";if(a){if(q()&&i&&i<10){delete a.fb;delete a.db;delete a.Z}b.j(a,function(d,b){var a=M[b];if(a){var e=a[1]||0;if(O[b]!=d)c+=" "+a[0]+"("+d+(["deg","px",""])[e]+")"}});if(K()){if(a.sb||a.rb||a.Z)c+=" translate3d("+(a.sb||0)+"px,"+(a.rb||0)+"px,"+(a.Z||0)+"px)";if(a.v==k)a.v=1;if(a.A==k)a.A=1;if(a.v!=1||a.A!=1)c+=" scale3d("+a.v+", "+a.A+", 1)"}}d.style[L(d)]=c}d.Hc=m("transformOrigin",4);d.qf=m("backfaceVisibility",4);d.Ye=m("transformStyle",4);d.Ze=m("perspective",6);d.af=m("perspectiveOrigin",4);d.je=function(a,b){if(q()&&s<9||s<10&&R())a.style.zoom=b==1?"":b;else{var c=L(a),f="scale("+b+")",e=a.style[c],g=new RegExp(/[\s]*scale\(.*?\)/g),d=I(e,[g],f);a.style[c]=d}};d.hc=function(b,a){return function(c){c=t(c);var f=c.type,e=c.relatedTarget||(f=="mouseout"?c.toElement:c.fromElement);(!e||e!==a&&!d.df(a,e))&&b(c)}};d.g=function(a,e,b,c){a=d.ub(a);if(a.addEventListener){e=="mousewheel"&&a.addEventListener("DOMMouseScroll",b,c);a.addEventListener(e,b,c)}else if(a.attachEvent){a.attachEvent("on"+e,b);c&&a.setCapture&&a.setCapture()}};d.T=function(a,c,e,b){a=d.ub(a);if(a.removeEventListener){c=="mousewheel"&&a.removeEventListener("DOMMouseScroll",e,b);a.removeEventListener(c,e,b)}else if(a.detachEvent){a.detachEvent("on"+c,e);b&&a.releaseCapture&&a.releaseCapture()}};d.ic=function(a){a=t(a);a.preventDefault&&a.preventDefault();a.cancel=e;a.returnValue=l};d.hf=function(a){a=t(a);a.stopPropagation&&a.stopPropagation();a.cancelBubble=e};d.K=function(d,c){var a=[].slice.call(arguments,2),b=function(){var b=a.concat([].slice.call(arguments,0));return c.apply(d,b)};return b};d.ad=function(a,b){if(b==k)return a.textContent||a.innerText;var c=g.createTextNode(b);d.kc(a);a.appendChild(c)};d.bc=function(d,c){for(var b=[],a=d.firstChild;a;a=a.nextSibling)(c||a.nodeType==1)&&b.push(a);return b};function nb(a,c,e,b){b=b||"u";for(a=a?a.firstChild:j;a;a=a.nextSibling)if(a.nodeType==1){if(V(a,b)==c)return a;if(!e){var d=nb(a,c,e,b);if(d)return d}}}d.E=nb;function T(a,d,f,b){b=b||"u";var c=[];for(a=a?a.firstChild:j;a;a=a.nextSibling)if(a.nodeType==1){V(a,b)==d&&c.push(a);if(!f){var e=T(a,d,f,b);if(e.length)c=c.concat(e)}}return c}d.jf=T;function ib(a,c,d){for(a=a?a.firstChild:j;a;a=a.nextSibling)if(a.nodeType==1){if(a.tagName==c)return a;if(!d){var b=ib(a,c,d);if(b)return b}}}d.gf=ib;function yb(a,c,e){var b=[];for(a=a?a.firstChild:j;a;a=a.nextSibling)if(a.nodeType==1){(!c||a.tagName==c)&&b.push(a);if(!e){var d=yb(a,c,e);if(d.length)b=b.concat(d)}}return b}d.ff=yb;d.ef=function(b,a){return b.getElementsByTagName(a)};function B(){var e=arguments,d,c,b,a,g=1&e[0],f=1+g;d=e[f-1]||{};for(;f<e.length;f++)if(c=e[f])for(b in c){a=c[b];if(a!==k){a=c[b];var h=d[b];d[b]=g&&(A(h)||A(a))?B(g,{},h,a):a}}return d}d.H=B;function ab(f,g){var d={},c,a,b;for(c in f){a=f[c];b=g[c];if(a!==b){var e;if(A(a)&&A(b)){a=ab(a,b);e=!mb(a)}!e&&(d[c]=a)}}return d}d.Gc=function(a){return C(a)=="function"};d.pf=function(a){return C(a)=="string"};d.Ad=function(a){return!isNaN(p(a))&&isFinite(a)};d.j=n;d.We=A;function S(a){return g.createElement(a)}d.ab=function(){return S("DIV")};d.tf=function(){return S("SPAN")};d.rd=function(){};function X(b,c,a){if(a==k)return b.getAttribute(c);b.setAttribute(c,a)}function V(a,b){return X(a,b)||X(a,"data-"+b)}d.G=X;d.r=V;function x(b,a){if(a==k)return b.className;b.className=a}d.Qc=x;function rb(b){var a={};n(b,function(b){a[b]=b});return a}function tb(b,a){return b.match(a||Bb)}function Q(b,a){return rb(tb(b||"",a))}d.ke=tb;function cb(b,c){var a="";n(c,function(c){a&&(a+=b);a+=c});return a}function E(a,c,b){x(a,cb(" ",B(ab(Q(x(a)),Q(c)),Q(b))))}d.Ed=function(a){return a.parentNode};d.V=function(a){d.bb(a,"none")};d.J=function(a,b){d.bb(a,b?"none":"")};d.Od=function(b,a){b.removeAttribute(a)};d.he=function(){return q()&&i<10};d.Rd=function(d,a){if(a)d.style.clip="rect("+c.round(a.e||a.S||0)+"px "+c.round(a.D)+"px "+c.round(a.C)+"px "+c.round(a.f||a.O||0)+"px)";else if(a!==k){var g=d.style.cssText,f=[new RegExp(/[\s]*clip: rect\(.*?\)[;]?/i),new RegExp(/[\s]*cliptop: .*?[;]?/i),new RegExp(/[\s]*clipright: .*?[;]?/i),new RegExp(/[\s]*clipbottom: .*?[;]?/i),new RegExp(/[\s]*clipleft: .*?[;]?/i)],e=I(g,f,"");b.Fb(d,e)}};d.Y=function(){return+new Date};d.F=function(b,a){b.appendChild(a)};d.Ub=function(b,a,c){(c||a.parentNode).insertBefore(b,a)};d.Db=function(b,a){a=a||b.parentNode;a&&a.removeChild(b)};d.de=function(a,b){n(a,function(a){d.Db(a,b)})};d.kc=function(a){d.de(d.bc(a,e),a)};d.ce=function(a,b){var c=d.Ed(a);b&1&&d.M(a,(d.p(c)-d.p(a))/2);b&2&&d.N(a,(d.q(c)-d.q(a))/2)};d.be=function(b,a){return parseInt(b,a||10)};d.ae=p;d.df=function(b,a){var c=g.body;while(a&&b!==a&&c!==a)try{a=a.parentNode}catch(d){return l}return b===a};function Y(e,c,b){var a=e.cloneNode(!c);!b&&d.Od(a,"id");return a}d.jb=Y;d.Mb=function(f,g){var a=new Image;function b(f,e){d.T(a,"load",b);d.T(a,"abort",c);d.T(a,"error",c);g&&g(a,e)}function c(a){b(a,e)}if(kb()&&i<11.6||!f)b(!f);else{d.g(a,"load",b);d.g(a,"abort",c);d.g(a,"error",c);a.src=f}};d.Zd=function(e,a,f){var c=e.length+1;function b(b){c--;if(a&&b&&b.src==a.src)a=b;!c&&f&&f(a)}n(e,function(a){d.Mb(a.src,b)});b()};d.jd=function(a,g,i,h){if(h)a=Y(a);var c=T(a,g);if(!c.length)c=b.ef(a,g);for(var f=c.length-1;f>-1;f--){var d=c[f],e=Y(i);x(e,x(d));b.Fb(e,d.style.cssText);b.Ub(e,d);b.Db(d)}return a};function Ib(a){var l=this,p="",r=["av","pv","ds","dn"],f=[],q,j=0,h=0,e=0;function i(){E(a,q,f[e||j||h&2||h]);b.hb(a,"pointer-events",e?"none":"")}function c(){j=0;i();d.T(g,"mouseup",c);d.T(g,"touchend",c);d.T(g,"touchcancel",c)}function o(a){if(e)d.ic(a);else{j=4;i();d.g(g,"mouseup",c);d.g(g,"touchend",c);d.g(g,"touchcancel",c)}}l.yd=function(a){if(a===k)return h;h=a&2||a&1;i()};l.Oc=function(a){if(a===k)return!e;e=a?0:3;i()};l.gb=a=d.ub(a);var m=b.ke(x(a));if(m)p=m.shift();n(r,function(a){f.push(p+a)});q=cb(" ",f);f.unshift("");d.g(a,"mousedown",o);d.g(a,"touchstart",o)}d.Tb=function(a){return new Ib(a)};d.hb=D;d.zb=m("overflow");d.N=m("top",2);d.M=m("left",2);d.p=m("width",2);d.q=m("height",2);d.Xd=m("marginLeft",2);d.Wd=m("marginTop",2);d.I=m("position");d.bb=m("display");d.R=m("zIndex",1);d.Gb=function(b,a,c){if(a!=k)Gb(b,a,c);else return Eb(b)};d.Fb=function(a,b){if(b!=k)a.style.cssText=b;else return a.style.cssText};var U={a:d.Gb,e:d.N,f:d.M,ib:d.p,cb:d.q,Bb:d.I,Lf:d.bb,X:d.R};function w(g,l){var f=P(),b=K(),e=wb(),h=L(g);function i(b,d,a){var e=b.vb(u(-d/2,-a/2)),f=b.vb(u(d/2,-a/2)),g=b.vb(u(d/2,a/2)),h=b.vb(u(-d/2,a/2));b.vb(u(300,300));return u(c.min(e.x,f.x,g.x,h.x)+d/2,c.min(e.y,f.y,g.y,h.y)+a/2)}function a(e,a){a=a||{};var g=a.Z||0,l=(a.fb||0)%360,m=(a.db||0)%360,o=(a.U||0)%360,p=a.Mf;if(f){g=0;l=0;m=0;p=0}var c=new Db(a.sb,a.rb,g);c.fb(l);c.db(m);c.Vd(o);c.Ud(a.Wb,a.fc);c.Zb(a.v,a.A,p);if(b){c.wb(a.O,a.S);e.style[h]=c.Td()}else if(!W||W<9){var j="";if(o||a.v!=k&&a.v!=1||a.A!=k&&a.A!=1){var n=i(c,a.xb,a.yb);d.Wd(e,n.y);d.Xd(e,n.x);j=c.Sd()}var r=e.style.filter,s=new RegExp(/[\s]*progid:DXImageTransform\.Microsoft\.Matrix\([^\)]*\)/g),q=I(r,[s],j);ub(e,q)}}w=function(f,c){c=c||{};var h=c.O,i=c.S,g;n(U,function(a,b){g=c[b];g!==k&&a(f,g)});d.Rd(f,c.c);if(!b){h!=k&&d.M(f,c.Wc+h);i!=k&&d.N(f,c.Sc+i)}if(c.Qd)if(e)sb(d.K(j,N,f,c));else a(f,c)};d.Eb=N;if(e)d.Eb=w;if(f)d.Eb=a;else if(!b)a=N;d.P=w;w(g,l)}d.Eb=w;d.P=w;function Db(i,l,p){var d=this,b=[1,0,0,0,0,1,0,0,0,0,1,0,i||0,l||0,p||0,1],h=c.sin,g=c.cos,m=c.tan;function f(a){return a*c.PI/180}function o(a,b){return{x:a,y:b}}function n(c,e,l,m,o,r,t,u,w,z,A,C,E,b,f,k,a,g,i,n,p,q,s,v,x,y,B,D,F,d,h,j){return[c*a+e*p+l*x+m*F,c*g+e*q+l*y+m*d,c*i+e*s+l*B+m*h,c*n+e*v+l*D+m*j,o*a+r*p+t*x+u*F,o*g+r*q+t*y+u*d,o*i+r*s+t*B+u*h,o*n+r*v+t*D+u*j,w*a+z*p+A*x+C*F,w*g+z*q+A*y+C*d,w*i+z*s+A*B+C*h,w*n+z*v+A*D+C*j,E*a+b*p+f*x+k*F,E*g+b*q+f*y+k*d,E*i+b*s+f*B+k*h,E*n+b*v+f*D+k*j]}function e(c,a){return n.apply(j,(a||b).concat(c))}d.Zb=function(a,c,d){if(a==k)a=1;if(c==k)c=1;if(d==k)d=1;if(a!=1||c!=1||d!=1)b=e([a,0,0,0,0,c,0,0,0,0,d,0,0,0,0,1])};d.wb=function(a,c,d){b[12]+=a||0;b[13]+=c||0;b[14]+=d||0};d.fb=function(c){if(c){a=f(c);var d=g(a),i=h(a);b=e([1,0,0,0,0,d,i,0,0,-i,d,0,0,0,0,1])}};d.db=function(c){if(c){a=f(c);var d=g(a),i=h(a);b=e([d,0,-i,0,0,1,0,0,i,0,d,0,0,0,0,1])}};d.Vd=function(c){if(c){a=f(c);var d=g(a),i=h(a);b=e([d,i,0,0,-i,d,0,0,0,0,1,0,0,0,0,1])}};d.Ud=function(a,c){if(a||c){i=f(a);l=f(c);b=e([1,m(l),0,0,m(i),1,0,0,0,0,1,0,0,0,0,1])}};d.vb=function(c){var a=e(b,[1,0,0,0,0,1,0,0,0,0,1,0,c.x,c.y,0,1]);return o(a[12],a[13])};d.Td=function(){return"matrix3d("+b.join(",")+")"};d.Sd=function(){return"progid:DXImageTransform.Microsoft.Matrix(M11="+b[0]+", M12="+b[4]+", M21="+b[1]+", M22="+b[5]+", SizingMethod='auto expand')"}}new function(){var a=this;function b(d,g){for(var j=d[0].length,i=d.length,h=g[0].length,f=[],c=0;c<i;c++)for(var k=f[c]=[],b=0;b<h;b++){for(var e=0,a=0;a<j;a++)e+=d[c][a]*g[a][b];k[b]=e}return f}a.v=function(b,c){return a.Lc(b,c,0)};a.A=function(b,c){return a.Lc(b,0,c)};a.Lc=function(a,c,d){return b(a,[[c,0],[0,d]])};a.vb=function(d,c){var a=b(d,[[c.x],[c.y]]);return u(a[0][0],a[1][0])}};var O={Wc:0,Sc:0,O:0,S:0,L:1,v:1,A:1,U:0,fb:0,db:0,sb:0,rb:0,Z:0,Wb:0,fc:0};d.Jc=function(a){var c=a||{};if(a)if(b.Gc(a))c={Cc:c};else if(b.Gc(a.c))c.c={Cc:a.c};return c};d.Bd=function(l,m,w,n,y,z,o){var a=m;if(l){a={};for(var g in m){var A=z[g]||1,v=y[g]||[0,1],d=(w-v[0])/v[1];d=c.min(c.max(d,0),1);d=d*A;var u=c.floor(d);if(d!=u)d-=u;var h=n.Cc||f.ed,i,B=l[g],q=m[g];if(b.Ad(q)){h=n[g]||h;var x=h(d);i=B+q*x}else{i=b.H({Xb:{}},l[g]);b.j(q.Xb||q,function(e,a){if(n.c)h=n.c[a]||n.c.Cc||h;var c=h(d),b=e*c;i.Xb[a]=b;i[a]+=b})}a[g]=i}var t=b.j(m,function(b,a){return O[a]!=k});t&&b.j(O,function(c,b){if(a[b]==k&&l[b]!==k)a[b]=l[b]});if(t){if(a.L)a.v=a.A=a.L;a.xb=o.xb;a.yb=o.yb;a.Qd=e}}if(m.c&&o.wb){var p=a.c.Xb,s=(p.e||0)+(p.C||0),r=(p.f||0)+(p.D||0);a.f=(a.f||0)+r;a.e=(a.e||0)+s;a.c.f-=r;a.c.D-=r;a.c.e-=s;a.c.C-=s}if(a.c&&b.he()&&!a.c.e&&!a.c.f&&a.c.D==o.xb&&a.c.C==o.yb)a.c=j;return a}};function n(){var a=this,d=[];function i(a,b){d.push({rc:a,pc:b})}function g(a,c){b.j(d,function(b,e){b.rc==a&&b.pc===c&&d.splice(e,1)})}a.Hb=a.addEventListener=i;a.removeEventListener=g;a.o=function(a){var c=[].slice.call(arguments,1);b.j(d,function(b){b.rc==a&&b.pc.apply(h,c)})}}var m=function(z,C,i,J,M,L){z=z||0;var a=this,q,n,o,u,A=0,G,H,F,B,y=0,g=0,m=0,D,k,f,d,p,w=[],x;function O(a){f+=a;d+=a;k+=a;g+=a;m+=a;y+=a}function t(o){var h=o;if(p&&(h>=d||h<=f))h=((h-f)%p+p)%p+f;if(!D||u||g!=h){var j=c.min(h,d);j=c.max(j,f);if(!D||u||j!=m){if(L){var l=(j-k)/(C||1);if(i.dd)l=1-l;var n=b.Bd(M,L,l,G,F,H,i);if(x)b.j(n,function(b,a){x[a]&&x[a](J,b)});else b.P(J,n)}a.sc(m-k,j-k);m=j;b.j(w,function(b,c){var a=o<g?w[w.length-c-1]:b;a.ob(m-y)});var r=g,q=m;g=h;D=e;a.ec(r,q)}}}function E(a,b,e){b&&a.Rb(d);if(!e){f=c.min(f,a.ud()+y);d=c.max(d,a.mc()+y)}w.push(a)}var r=h.requestAnimationFrame||h.webkitRequestAnimationFrame||h.mozRequestAnimationFrame||h.msRequestAnimationFrame;if(b.Af()&&b.wd()<7)r=j;r=r||function(a){b.W(a,i.nb)};function I(){if(q){var d=b.Y(),e=c.min(d-A,i.Kd),a=g+e*o;A=d;if(a*o>=n*o)a=n;t(a);if(!u&&a*o>=n*o)K(B);else r(I)}}function s(h,i,j){if(!q){q=e;u=j;B=i;h=c.max(h,f);h=c.min(h,d);n=h;o=n<g?-1:1;a.Ld();A=b.Y();r(I)}}function K(b){if(q){u=q=B=l;a.Md();b&&b()}}a.hd=function(a,b,c){s(a?g+a:d,b,c)};a.vd=s;a.tb=K;a.ee=function(a){s(a)};a.mb=function(){return g};a.Xc=function(){return n};a.Nb=function(){return m};a.ob=t;a.wb=function(a){t(g+a)};a.od=function(){return q};a.Pd=function(a){p=a};a.Rb=O;a.Ec=function(a,b){E(a,0,b)};a.nc=function(a){E(a,1)};a.ud=function(){return f};a.mc=function(){return d};a.ec=a.Ld=a.Md=a.sc=b.rd;a.jc=b.Y();i=b.H({nb:16,Kd:50},i);p=i.bd;x=i.ge;f=k=z;d=z+C;H=i.Pc||{};F=i.z||{};G=b.Jc(i.i)};var p=new function(){var h=this;function g(b,a,c){c.push(a);b[a]=b[a]||[];b[a].push(c)}h.Yd=function(d){for(var e=[],a,b=0;b<d.u;b++)for(a=0;a<d.n;a++)g(e,c.ceil(1e5*c.random())%13,[b,a]);return e}},t=function(k,s,q,u,z){var d=this,v,g,a,y=0,x=u.fe,r,h=8;function t(a){if(a.e)a.S=a.e;if(a.f)a.O=a.f;b.j(a,function(a){b.We(a)&&t(a)})}function i(g,d){var a={nb:d,k:1,W:0,n:1,u:1,a:0,L:0,c:0,wb:l,s:l,dd:l,Nd:p.Yd,B:{eb:0,kb:0},i:f.ed,Pc:{},gc:[],z:{}};b.H(a,g);t(a);a.i=b.Jc(a.i);a.sf=c.ceil(a.k/a.nb);a.of=function(c,b){c/=a.n;b/=a.u;var f=c+"x"+b;if(!a.gc[f]){a.gc[f]={ib:c,cb:b};for(var d=0;d<a.n;d++)for(var e=0;e<a.u;e++)a.gc[f][e+","+d]={e:e*b,D:d*c+c,C:e*b+b,f:d*c}}return a.gc[f]};if(a.lc){a.lc=i(a.lc,d);a.s=e}return a}function o(B,h,a,w,o,m){var z=this,u,v={},i={},n=[],f,d,s,q=a.B.eb||0,r=a.B.kb||0,g=a.of(o,m),p=C(a),D=p.length-1,t=a.k+a.W*D,x=w+t,k=a.s,y;x+=50;function C(a){var b=a.Nd(a);return a.dd?b.reverse():b}z.xd=x;z.Yb=function(d){d-=w;var e=d<t;if(e||y){y=e;if(!k)d=t-d;var f=c.ceil(d/a.nb);b.j(i,function(a,e){var d=c.max(f,a.cf);d=c.min(d,a.length-1);if(a.Uc!=d){if(!a.Uc&&!k)b.J(n[e]);else d==a.lf&&k&&b.V(n[e]);a.Uc=d;b.P(n[e],a[d])}})}};h=b.jb(h);b.Eb(h,j);if(b.pb()){var E=!h["no-image"],A=b.ff(h);b.j(A,function(a){(E||a["jssor-slider"])&&b.Gb(a,b.Gb(a),e)})}b.j(p,function(h,j){b.j(h,function(G){var K=G[0],J=G[1],t=K+","+J,n=l,p=l,x=l;if(q&&J%2){if(q&3)n=!n;if(q&12)p=!p;if(q&16)x=!x}if(r&&K%2){if(r&3)n=!n;if(r&12)p=!p;if(r&16)x=!x}a.e=a.e||a.c&4;a.C=a.C||a.c&8;a.f=a.f||a.c&1;a.D=a.D||a.c&2;var E=p?a.C:a.e,B=p?a.e:a.C,D=n?a.D:a.f,C=n?a.f:a.D;a.c=E||B||D||C;s={};d={S:0,O:0,a:1,ib:o,cb:m};f=b.H({},d);u=b.H({},g[t]);if(a.a)d.a=2-a.a;if(a.X){d.X=a.X;f.X=0}var I=a.n*a.u>1||a.c;if(a.L||a.U){var H=e;if(b.pb())if(a.n*a.u>1)H=l;else I=l;if(H){d.L=a.L?a.L-1:1;f.L=1;if(b.pb()||b.qd())d.L=c.min(d.L,2);var N=a.U||0;d.U=N*360*(x?-1:1);f.U=0}}if(I){var h=u.Xb={};if(a.c){var w=a.Df||1;if(E&&B){h.e=g.cb/2*w;h.C=-h.e}else if(E)h.C=-g.cb*w;else if(B)h.e=g.cb*w;if(D&&C){h.f=g.ib/2*w;h.D=-h.f}else if(D)h.D=-g.ib*w;else if(C)h.f=g.ib*w}s.c=u;f.c=g[t]}var L=n?1:-1,M=p?1:-1;if(a.x)d.O+=o*a.x*L;if(a.y)d.S+=m*a.y*M;b.j(d,function(a,c){if(b.Ad(a))if(a!=f[c])s[c]=a-f[c]});v[t]=k?f:d;var F=a.sf,A=c.round(j*a.W/a.nb);i[t]=new Array(A);i[t].cf=A;i[t].lf=A+F-1;for(var z=0;z<=F;z++){var y=b.Bd(f,s,z/F,a.i,a.z,a.Pc,{wb:a.wb,xb:o,yb:m});y.X=y.X||1;i[t].push(y)}})});p.reverse();b.j(p,function(a){b.j(a,function(c){var f=c[0],e=c[1],d=f+","+e,a=h;if(e||f)a=b.jb(h);b.P(a,v[d]);b.zb(a,"hidden");b.I(a,"absolute");B.mf(a);n[d]=a;b.J(a,!k)})})}function w(){var b=this,c=0;m.call(b,0,v);b.ec=function(d,b){if(b-c>h){c=b;a&&a.Yb(b);g&&g.Yb(b)}};b.Yc=r}d.nf=function(){var a=0,b=u.Jb,d=b.length;if(x)a=y++%d;else a=c.floor(c.random()*d);b[a]&&(b[a].qb=a);return b[a]};d.bf=function(w,x,l,m,b){r=b;b=i(b,h);var j=m.Jd,f=l.Jd;j["no-image"]=!m.Qb;f["no-image"]=!l.Qb;var n=j,p=f,u=b,e=b.lc||i({},h);if(!b.s){n=f;p=j}var t=e.Rb||0;g=new o(k,p,e,c.max(t-e.nb,0),s,q);a=new o(k,n,u,c.max(e.nb-t,0),s,q);g.Yb(0);a.Yb(0);v=c.max(g.xd,a.xd);d.qb=w};d.Cb=function(){k.Cb();g=j;a=j};d.Xe=function(){var b=j;if(a)b=new w;return b};if(b.pb()||b.qd()||z&&b.uf()<537)h=16;n.call(d);m.call(d,-1e7,1e7)},i=function(p,fc){var d=this;function Bc(){var a=this;m.call(a,-1e8,2e8);a.vf=function(){var b=a.Nb(),d=c.floor(b),f=t(d),e=b-c.floor(b);return{qb:f,wf:d,Bb:e}};a.ec=function(b,a){var f=c.floor(a);if(f!=a&&a>b)f++;Ub(f,e);d.o(i.zf,t(a),t(b),a,b)}}function Ac(){var a=this;m.call(a,0,0,{bd:q});b.j(C,function(b){D&1&&b.Pd(q);a.nc(b);b.Rb(ib/bc)})}function zc(){var a=this,b=Tb.gb;m.call(a,-1,2,{i:f.Zc,ge:{Bb:Zb},bd:q},b,{Bb:1},{Bb:-2});a.Pb=b}function nc(o,n){var b=this,f,g,h,k,c;m.call(b,-1e8,2e8,{Kd:100});b.Ld=function(){M=e;R=j;d.o(i.Bf,t(w.mb()),w.mb())};b.Md=function(){M=l;k=l;var a=w.vf();d.o(i.Cf,t(w.mb()),w.mb());!a.Bb&&Dc(a.wf,s)};b.ec=function(i,e){var b;if(k)b=c;else{b=g;if(h){var d=e/h;b=a.Ve(d)*(g-f)+f}}w.ob(b)};b.Vb=function(a,d,c,e){f=a;g=d;h=c;w.ob(a);b.ob(0);b.vd(c,e)};b.kf=function(a){k=e;c=a;b.hd(a,j,e)};b.Te=function(a){c=a};w=new Bc;w.Ec(o);w.Ec(n)}function pc(){var c=this,a=Xb();b.R(a,0);b.hb(a,"pointerEvents","none");c.gb=a;c.mf=function(c){b.F(a,c);b.J(a)};c.Cb=function(){b.V(a);b.kc(a)}}function xc(o,g){var f=this,r,L,v,k,y=[],x,B,W,G,Q,F,h,w,p;m.call(f,-u,u+1,{});function E(a){r&&r.kd();T(o,a,0);F=e;r=new I.Q(o,I,b.ae(b.r(o,"idle"))||lc);r.ob(0)}function Z(){r.jc<I.jc&&E()}function M(p,r,o){if(!G){G=e;if(k&&o){var h=o.width,c=o.height,n=h,m=c;if(h&&c&&a.Lb){if(a.Lb&3&&(!(a.Lb&4)||h>K||c>J)){var j=l,q=K/J*c/h;if(a.Lb&1)j=q>1;else if(a.Lb&2)j=q<1;n=j?h*J/c:K;m=j?J:c*K/h}b.p(k,n);b.q(k,m);b.N(k,(J-m)/2);b.M(k,(K-n)/2)}b.I(k,"absolute");d.o(i.Ae,g)}}b.V(r);p&&p(f)}function Y(b,c,d,e){if(e==R&&s==g&&N)if(!Cc){var a=t(b);A.bf(a,g,c,f,d);c.ye();U.Rb(a-U.ud()-1);U.ob(a);z.Vb(b,b,0)}}function cb(b){if(b==R&&s==g){if(!h){var a=j;if(A)if(A.qb==g)a=A.Xe();else A.Cb();Z();h=new vc(o,g,a,r);h.pd(p)}!h.od()&&h.zc()}}function S(d,e,l){if(d==g){if(d!=e)C[e]&&C[e].xe();else!l&&h&&h.we();p&&p.Oc();var m=R=b.Y();f.Mb(b.K(j,cb,m))}else{var k=c.min(g,d),i=c.max(g,d),o=c.min(i-k,k+q-i),n=u+a.ve-1;(!Q||o<=n)&&f.Mb()}}function db(){if(s==g&&h){h.tb();p&&p.ue();p&&p.te();h.zd()}}function eb(){s==g&&h&&h.tb()}function ab(a){!P&&d.o(i.se,g,a)}function O(){p=w.pInstance;h&&h.pd(p)}f.Mb=function(c,a){a=a||v;if(y.length&&!G){b.J(a);if(!W){W=e;d.o(i.re,g);b.j(y,function(a){if(!b.G(a,"src")){a.src=b.r(a,"src2");b.bb(a,a["display-origin"])}})}b.Zd(y,k,b.K(j,M,c,a))}else M(c,a)};f.qe=function(){var h=g;if(a.Dd<0)h-=q;var d=h+a.Dd*tc;if(D&2)d=t(d);if(!(D&1))d=c.max(0,c.min(d,q-u));if(d!=g){if(A){var e=A.nf(q);if(e){var i=R=b.Y(),f=C[t(d)];return f.Mb(b.K(j,Y,d,f,e,i),v)}}bb(d)}};f.vc=function(){S(g,g,e)};f.xe=function(){p&&p.ue();p&&p.te();f.Hd();h&&h.pe();h=j;E()};f.ye=function(){b.V(o)};f.Hd=function(){b.J(o)};f.oe=function(){p&&p.Oc()};function T(a,c,d){if(b.G(a,"jssor-slider"))return;if(!F){if(a.tagName=="IMG"){y.push(a);if(!b.G(a,"src")){Q=e;a["display-origin"]=b.bb(a);b.V(a)}}b.pb()&&b.R(a,(b.R(a)||0)+1)}var f=b.bc(a);b.j(f,function(f){var h=f.tagName,i=b.r(f,"u");if(i=="player"&&!w){w=f;if(w.pInstance)O();else b.g(w,"dataavailable",O)}if(i=="caption"){if(c){b.Hc(f,b.r(f,"to"));b.qf(f,b.r(f,"bf"));b.r(f,"3d")&&b.Ye(f,"preserve-3d")}else if(!b.nd()){var g=b.jb(f,l,e);b.Ub(g,f,a);b.Db(f,a);f=g;c=e}}else if(!F&&!d&&!k){if(h=="A"){if(b.r(f,"u")=="image")k=b.gf(f,"IMG");else k=b.E(f,"image",e);if(k){x=f;b.bb(x,"block");b.P(x,V);B=b.jb(x,e);b.I(x,"relative");b.Gb(B,0);b.hb(B,"backgroundColor","#000")}}else if(h=="IMG"&&b.r(f,"u")=="image")k=f;if(k){k.border=0;b.P(k,V)}}T(f,c,d+1)})}f.sc=function(c,b){var a=u-b;Zb(L,a)};f.qb=g;n.call(f);b.Ze(o,b.r(o,"p"));b.af(o,b.r(o,"po"));var H=b.E(o,"thumb",e);if(H){f.ne=b.jb(H);b.V(H)}b.J(o);v=b.jb(fb);b.R(v,1e3);b.g(o,"click",ab);E(e);f.Qb=k;f.fd=B;f.Jd=o;f.Pb=L=o;b.F(L,v);d.Hb(203,S);d.Hb(28,eb);d.Hb(24,db)}function vc(y,g,p,q){var a=this,n=0,u=0,h,j,f,c,k,t,r,o=C[g];m.call(a,0,0);function v(){b.kc(L);cc&&k&&o.fd&&b.F(L,o.fd);b.J(L,!k&&o.Qb)}function w(){a.zc()}function x(b){r=b;a.tb();a.zc()}a.zc=function(){var b=a.Nb();if(!B&&!M&&!r&&s==g){if(!b){if(h&&!k){k=e;a.zd(e);d.o(i.Ue,g,n,u,h,c)}v()}var l,p=i.Kc;if(b!=c)if(b==f)l=c;else if(b==j)l=f;else if(!b)l=j;else l=a.Xc();d.o(p,g,b,n,j,f,c);var m=N&&(!E||F);if(b==c)(f!=c&&!(E&12)||m)&&o.qe();else(m||b!=f)&&a.vd(l,w)}};a.we=function(){f==c&&f==a.Nb()&&a.ob(j)};a.pe=function(){A&&A.qb==g&&A.Cb();var b=a.Nb();b<c&&d.o(i.Kc,g,-b-1,n,j,f,c)};a.zd=function(a){p&&b.zb(jb,a&&p.Yc.Jf?"":"hidden")};a.sc=function(b,a){if(k&&a>=h){k=l;v();o.Hd();A.Cb();d.o(i.me,g,n,u,h,c)}d.o(i.le,g,a,n,j,f,c)};a.pd=function(a){if(a&&!t){t=a;a.Hb($JssorPlayer$.ie,x)}};p&&a.nc(p);h=a.mc();a.nc(q);j=h+q.Fc;f=h+q.Ic;c=a.mc()}function Kb(a,c,d){b.M(a,c);b.N(a,d)}function Zb(c,b){var a=x>0?x:eb,d=zb*b*(a&1),e=Ab*b*(a>>1&1);Kb(c,d,e)}function Pb(){pb=M;Ib=z.Xc();G=w.mb()}function gc(){Pb();if(B||!F&&E&12){z.tb();d.o(i.ze)}}function ec(f){if(!B&&(F||!(E&12))&&!z.od()){var d=w.mb(),b=c.ceil(G);if(f&&c.abs(H)>=a.Mc){b=c.ceil(d);b+=hb}if(!(D&1))b=c.min(q-u,c.max(b,0));var e=c.abs(b-d);e=1-c.pow(1-e,5);if(!P&&pb)z.ee(Ib);else if(d==b){sb.oe();sb.vc()}else z.Vb(d,b,e*Vb)}}function Hb(a){!b.r(b.qc(a),"nodrag")&&b.ic(a)}function rc(a){Yb(a,1)}function Yb(a,c){a=b.Cd(a);var k=b.qc(a);if(!O&&!b.r(k,"nodrag")&&sc()&&(!c||a.touches.length==1)){B=e;yb=l;R=j;b.g(g,c?"touchmove":"mousemove",Bb);b.Y();P=0;gc();if(!pb)x=0;if(c){var h=a.touches[0];ub=h.clientX;vb=h.clientY}else{var f=b.Id(a);ub=f.x;vb=f.y}H=0;gb=0;hb=0;d.o(i.Be,t(G),G,a)}}function Bb(d){if(B){d=b.Cd(d);var f;if(d.type!="mousemove"){var l=d.touches[0];f={x:l.clientX,y:l.clientY}}else f=b.Id(d);if(f){var j=f.x-ub,k=f.y-vb;if(c.floor(G)!=G)x=x||eb&O;if((j||k)&&!x){if(O==3)if(c.abs(k)>c.abs(j))x=2;else x=1;else x=O;if(mb&&x==1&&c.abs(k)-c.abs(j)>3)yb=e}if(x){var a=k,i=Ab;if(x==1){a=j;i=zb}if(!(D&1)){if(a>0){var g=i*s,h=a-g;if(h>0)a=g+c.sqrt(h)*5}if(a<0){var g=i*(q-u-s),h=-a-g;if(h>0)a=-g-c.sqrt(h)*5}}if(H-gb<-2)hb=0;else if(H-gb>2)hb=-1;gb=H;H=a;rb=G-H/i/(Y||1);if(H&&x&&!yb){b.ic(d);if(!M)z.kf(rb);else z.Te(rb)}}}}}function ab(){qc();if(B){B=l;b.Y();b.T(g,"mousemove",Bb);b.T(g,"touchmove",Bb);P=H;z.tb();var a=w.mb();d.o(i.Se,t(a),a,t(G),G);E&12&&Pb();ec(e)}}function jc(c){if(P){b.hf(c);var a=b.qc(c);while(a&&v!==a){a.tagName=="A"&&b.ic(c);try{a=a.parentNode}catch(d){break}}}}function Jb(a){C[s];s=t(a);sb=C[s];Ub(a);return s}function Dc(a,b){x=0;Jb(a);d.o(i.Ce,t(a),b)}function Ub(a,c){wb=a;b.j(S,function(b){b.Bc(t(a),a,c)})}function sc(){var b=i.cd||0,a=X;if(mb)a&1&&(a&=1);i.cd|=a;return O=a&~b}function qc(){if(O){i.cd&=~X;O=0}}function Xb(){var a=b.ab();b.P(a,V);b.I(a,"absolute");return a}function t(a){return(a%q+q)%q}function kc(b,d){if(d)if(!D){b=c.min(c.max(b+wb,0),q-u);d=l}else if(D&2){b=t(b+wb);d=l}bb(b,a.xc,d)}function xb(){b.j(S,function(a){a.yc(a.cc.Kf<=F)})}function hc(){if(!F){F=1;xb();if(!B){E&12&&ec();E&3&&C[s].vc()}}}function Ec(){if(F){F=0;xb();B||!(E&12)||gc()}}function ic(){V={ib:K,cb:J,e:0,f:0};b.j(T,function(a){b.P(a,V);b.I(a,"absolute");b.zb(a,"hidden");b.V(a)});b.P(fb,V)}function ob(b,a){bb(b,a,e)}function bb(g,f,j){if(Rb&&(!B&&(F||!(E&12))||a.Tc)){M=e;B=l;z.tb();if(f==k)f=Vb;var d=Cb.Nb(),b=g;if(j){b=d+g;if(g>0)b=c.ceil(b);else b=c.floor(b)}if(D&2)b=t(b);if(!(D&1))b=c.max(0,c.min(b,q-u));var i=(b-d)%q;b=d+i;var h=d==b?0:f*c.abs(i);h=c.min(h,f*u*1.5);z.Vb(d,b,h||1)}}d.Re=bb;d.hd=function(){if(!N){N=e;C[s]&&C[s].vc()}};d.Pe=function(){return P};function W(){return b.p(y||p)}function lb(){return b.q(y||p)}d.xb=W;d.yb=lb;function Eb(c,d){if(c==k)return b.p(p);if(!y){var a=b.ab(g);b.Qc(a,b.Qc(p));b.Fb(a,b.Fb(p));b.bb(a,"block");b.I(a,"relative");b.N(a,0);b.M(a,0);b.zb(a,"visible");y=b.ab(g);b.I(y,"absolute");b.N(y,0);b.M(y,0);b.p(y,b.p(p));b.q(y,b.q(p));b.Hc(y,"0 0");b.F(y,a);var h=b.bc(p);b.F(p,y);b.hb(p,"backgroundImage","");b.j(h,function(c){b.F(b.r(c,"noscale")?p:a,c);b.r(c,"autocenter")&&Mb.push(c)})}Y=c/(d?b.q:b.p)(y);b.je(y,Y);var f=d?Y*W():c,e=d?c:Y*lb();b.p(p,f);b.q(p,e);b.j(Mb,function(a){var c=b.be(b.r(a,"autocenter"));b.ce(a,c)})}d.Oe=Eb;d.Nc=function(a){var d=c.ceil(t(ib/bc)),b=t(a-s+d);if(b>u){if(a-s>q/2)a-=q;else if(a-s<=-q/2)a+=q}else a=s+b-d;return a};n.call(d);d.gb=p=b.ub(p);var a=b.H({Lb:0,ve:1,Dc:1,wc:0,Ac:l,Sb:1,Ib:e,Tc:e,Dd:1,Fd:3e3,md:1,xc:500,Ve:f.De,Mc:20,id:0,n:1,tc:0,Ne:1,uc:1,sd:1},fc);a.Ib=a.Ib&&b.xf();if(a.Me!=k)a.Fd=a.Me;if(a.Le!=k)a.tc=a.Le;var eb=a.uc&3,tc=(a.uc&4)/-4||1,kb=a.Qe,I=b.H({Q:r,Ib:a.Ib},a.Hf);I.Jb=I.Jb||I.Gf;var Fb=a.Ke,Z=a.Je,db=a.Ie,Q=!a.Ne,y,v=b.E(p,"slides",Q),fb=b.E(p,"loading",Q)||b.ab(g),Nb=b.E(p,"navigator",Q),dc=b.E(p,"arrowleft",Q),ac=b.E(p,"arrowright",Q),Lb=b.E(p,"thumbnavigator",Q),oc=b.p(v),mc=b.q(v),V,T=[],uc=b.bc(v);b.j(uc,function(a){if(a.tagName=="DIV"&&!b.r(a,"u"))T.push(a);else b.pb()&&b.R(a,(b.R(a)||0)+1)});var s=-1,wb,sb,q=T.length,K=a.He||oc,J=a.Ge||mc,Wb=a.id,zb=K+Wb,Ab=J+Wb,bc=eb&1?zb:Ab,u=c.min(a.n,q),jb,x,O,yb,S=[],Qb,Sb,Ob,cc,Cc,N,E=a.md,lc=a.Fd,Vb=a.xc,qb,tb,ib,Rb=u<q,D=Rb?a.Sb:0,X,P,F=1,M,B,R,ub=0,vb=0,H,gb,hb,Cb,w,U,z,Tb=new pc,Y,Mb=[];if(q){if(a.Ib)Kb=function(a,c,d){b.Eb(a,{sb:c,rb:d})};N=a.Ac;d.cc=fc;ic();b.G(p,"jssor-slider",e);b.R(v,b.R(v)||0);b.I(v,"absolute");jb=b.jb(v,e);b.Ub(jb,v);if(kb){cc=kb.If;qb=kb.Q;tb=u==1&&q>1&&qb&&(!b.nd()||b.wd()>=8)}ib=tb||u>=q||!(D&1)?0:a.tc;X=(u>1||ib?eb:-1)&a.sd;var Gb=v,C=[],A,L,Db=b.yf(),mb=Db.rf,G,pb,Ib,rb;Db.ld&&b.hb(Gb,Db.ld,([j,"pan-y","pan-x","none"])[X]||"");U=new zc;if(tb)A=new qb(Tb,K,J,kb,mb);b.F(jb,U.Pb);b.zb(v,"hidden");L=Xb();b.hb(L,"backgroundColor","#000");b.Gb(L,0);b.Ub(L,Gb.firstChild,Gb);for(var cb=0;cb<T.length;cb++){var wc=T[cb],yc=new xc(wc,cb);C.push(yc)}b.V(fb);Cb=new Ac;z=new nc(Cb,U);if(X){b.g(v,"mousedown",Yb);b.g(v,"touchstart",rc);b.g(v,"dragstart",Hb);b.g(v,"selectstart",Hb);b.g(g,"mouseup",ab);b.g(g,"touchend",ab);b.g(g,"touchcancel",ab);b.g(h,"blur",ab)}E&=mb?10:5;if(Nb&&Fb){Qb=new Fb.Q(Nb,Fb,W(),lb());S.push(Qb)}if(Z&&dc&&ac){Z.Sb=D;Z.n=u;Sb=new Z.Q(dc,ac,Z,W(),lb());S.push(Sb)}if(Lb&&db){db.wc=a.wc;Ob=new db.Q(Lb,db);S.push(Ob)}b.j(S,function(a){a.oc(q,C,fb);a.Hb(o.dc,kc)});b.hb(p,"visibility","visible");Eb(W());b.g(v,"click",jc,e);b.g(p,"mouseout",b.hc(hc,p));b.g(p,"mouseover",b.hc(Ec,p));xb();a.Dc&&b.g(g,"keydown",function(b){if(b.keyCode==37)ob(-a.Dc);else b.keyCode==39&&ob(a.Dc)});var nb=a.wc;if(!(D&1))nb=c.max(0,c.min(nb,q-u));z.Vb(nb,nb,0)}};i.se=21;i.Be=22;i.Se=23;i.Bf=24;i.Cf=25;i.re=26;i.Ae=27;i.ze=28;i.zf=202;i.Ce=203;i.Ue=206;i.me=207;i.le=208;i.Kc=209;var o={dc:1},s=function(d,C){var f=this;n.call(f);d=b.ub(d);var s,A,z,r,k=0,a,m,i,w,x,h,g,q,p,B=[],y=[];function v(a){a!=-1&&y[a].yd(a==k)}function t(a){f.o(o.dc,a*m)}f.gb=d;f.Bc=function(a){if(a!=r){var d=k,b=c.floor(a/m);k=b;r=a;v(d);v(b)}};f.yc=function(a){b.J(d,a)};var u;f.oc=function(D){if(!u){s=c.ceil(D/m);k=0;var o=q+w,r=p+x,n=c.ceil(s/i)-1;A=q+o*(!h?n:i-1);z=p+r*(h?n:i-1);b.p(d,A);b.q(d,z);for(var f=0;f<s;f++){var C=b.tf();b.ad(C,f+1);var l=b.jd(g,"numbertemplate",C,e);b.I(l,"absolute");var v=f%(n+1);b.M(l,!h?o*v:f%i*o);b.N(l,h?r*v:c.floor(f/(n+1))*r);b.F(d,l);B[f]=l;a.Kb&1&&b.g(l,"click",b.K(j,t,f));a.Kb&2&&b.g(l,"mouseover",b.hc(b.K(j,t,f),l));y[f]=b.Tb(l)}u=e}};f.cc=a=b.H({ac:10,Ob:10,Ab:1,Kb:1},C);g=b.E(d,"prototype");q=b.p(g);p=b.q(g);b.Db(g,d);m=a.Rc||1;i=a.u||1;w=a.ac;x=a.Ob;h=a.Ab-1;a.Zb==l&&b.G(d,"noscale",e);a.lb&&b.G(d,"autocenter",a.lb)},u=function(a,g,h){var c=this;n.call(c);var r,q,d,f,i;b.p(a);b.q(a);function k(a){c.o(o.dc,a,e)}function p(c){b.J(a,c||!h.Sb&&d==0);b.J(g,c||!h.Sb&&d>=q-h.n);r=c}c.Bc=function(b,a,c){if(c)d=a;else{d=b;p(r)}};c.yc=p;var m;c.oc=function(c){q=c;d=0;if(!m){b.g(a,"click",b.K(j,k,-i));b.g(g,"click",b.K(j,k,i));b.Tb(a);b.Tb(g);m=e}};c.cc=f=b.H({Rc:1},h);i=f.Rc;if(f.Zb==l){b.G(a,"noscale",e);b.G(g,"noscale",e)}if(f.lb){b.G(a,"autocenter",f.lb);b.G(g,"autocenter",f.lb)}},q=function(g,B){var h=this,z,p,a,v=[],x,w,d,q,r,u,t,m,s,f,k;n.call(h);g=b.ub(g);function A(n,f){var g=this,c,m,l;function q(){m.yd(p==f)}function i(e){if(e||!s.Pe()){var a=d-f%d,b=s.Nc((f+a)/d-1),c=b*d+d-a;h.o(o.dc,c)}}g.qb=f;g.td=q;l=n.ne||n.Qb||b.ab();g.Pb=c=b.jd(k,"thumbnailtemplate",l,e);m=b.Tb(c);a.Kb&1&&b.g(c,"click",b.K(j,i,0));a.Kb&2&&b.g(c,"mouseover",b.hc(b.K(j,i,1),c))}h.Bc=function(b,e,f){var a=p;p=b;a!=-1&&v[a].td();v[b].td();!f&&s.Re(s.Nc(c.floor(e/d)))};h.yc=function(a){b.J(g,a)};var y;h.oc=function(D,C){if(!y){z=D;c.ceil(z/d);p=-1;m=c.min(m,C.length);var h=a.Ab&1,n=u+(u+q)*(d-1)*(1-h),k=t+(t+r)*(d-1)*h,B=n+(n+q)*(m-1)*h,o=k+(k+r)*(m-1)*(1-h);b.I(f,"absolute");b.zb(f,"hidden");a.lb&1&&b.M(f,(x-B)/2);a.lb&2&&b.N(f,(w-o)/2);b.p(f,B);b.q(f,o);var j=[];b.j(C,function(l,g){var i=new A(l,g),e=i.Pb,a=c.floor(g/d),k=g%d;b.M(e,(u+q)*k*(1-h));b.N(e,(t+r)*k*h);if(!j[a]){j[a]=b.ab();b.F(f,j[a])}b.F(j[a],e);v.push(i)});var E=b.H({Ac:l,Tc:l,He:n,Ge:k,id:q*h+r*(1-h),Mc:12,xc:200,md:1,uc:a.Ab,sd:a.Ff||a.Ef?0:a.Ab},a);s=new i(g,E);y=e}};h.cc=a=b.H({ac:0,Ob:0,n:1,Ab:1,lb:3,Kb:1},B);x=b.p(g);w=b.q(g);f=b.E(g,"slides",e);k=b.E(f,"prototype");u=b.p(k);t=b.q(k);b.Db(k,f);d=a.u||1;q=a.ac;r=a.Ob;m=a.n;a.Zb==l&&b.G(g,"noscale",e)};function r(e,d,c){var a=this;m.call(a,0,c);a.kd=b.rd;a.Fc=0;a.Ic=c}jssor_1_slider_init=function(){var g=[{k:1200,x:.3,z:{f:[.3,.7]},i:{f:d.l,a:d.m},a:2},{k:1200,x:-.3,s:e,i:{f:d.l,a:d.m},a:2},{k:1200,x:-.3,z:{f:[.3,.7]},i:{f:d.l,a:d.m},a:2},{k:1200,x:.3,s:e,i:{f:d.l,a:d.m},a:2},{k:1200,y:.3,z:{e:[.3,.7]},i:{e:d.l,a:d.m},a:2},{k:1200,y:-.3,s:e,i:{e:d.l,a:d.m},a:2},{k:1200,y:-.3,z:{e:[.3,.7]},i:{e:d.l,a:d.m},a:2},{k:1200,y:.3,s:e,i:{e:d.l,a:d.m},a:2},{k:1200,x:.3,n:2,z:{f:[.3,.7]},B:{eb:3},i:{f:d.l,a:d.m},a:2},{k:1200,x:.3,n:2,s:e,B:{eb:3},i:{f:d.l,a:d.m},a:2},{k:1200,y:.3,u:2,z:{e:[.3,.7]},B:{kb:12},i:{e:d.l,a:d.m},a:2},{k:1200,y:.3,u:2,s:e,B:{kb:12},i:{e:d.l,a:d.m},a:2},{k:1200,y:.3,n:2,z:{e:[.3,.7]},B:{eb:12},i:{e:d.l,a:d.m},a:2},{k:1200,y:-.3,n:2,s:e,B:{eb:12},i:{e:d.l,a:d.m},a:2},{k:1200,x:.3,u:2,z:{f:[.3,.7]},B:{kb:3},i:{f:d.l,a:d.m},a:2},{k:1200,x:-.3,u:2,s:e,B:{kb:3},i:{f:d.l,a:d.m},a:2},{k:1200,x:.3,y:.3,n:2,u:2,z:{f:[.3,.7],e:[.3,.7]},B:{eb:3,kb:12},i:{f:d.l,e:d.l,a:d.m},a:2},{k:1200,x:.3,y:.3,n:2,u:2,z:{f:[.3,.7],e:[.3,.7]},s:e,B:{eb:3,kb:12},i:{f:d.l,e:d.l,a:d.m},a:2},{k:1200,W:20,c:3,i:{c:d.l,a:d.m},a:2},{k:1200,W:20,c:3,s:e,i:{c:d.Vc,a:d.m},a:2},{k:1200,W:20,c:12,i:{c:d.l,a:d.m},a:2},{k:1200,W:20,c:12,s:e,i:{c:d.Vc,a:d.m},a:2}],j={Ac:e,Qe:{Q:t,Jb:g,fe:1},Je:{Q:u},Ke:{Q:s},Ie:{Q:q,n:10,ac:8,Ob:8,tc:261}},f=new i("jssor_1",j);function k(){var d=b.jf(f.gb,"slides");if(d){var c=d[1];if(c){var a=b.E(c,"ad");if(!a){a=b.ab();b.Fb(a,"position:absolute;top:0px;right:0px;width:80px;height:20px;background-color:rgba(255,255,140,0.5);font-size: 12px;line-height: 20px;text-align:center;");b.ad(a,"Jssor Slider");b.F(c,a)}}}}k();function a(){var b=f.gb.parentNode.clientWidth;if(b){b=c.min(b,800);f.Oe(b)}else h.setTimeout(a,30)}a();b.g(h,"load",a);b.g(h,"resize",a);b.g(h,"orientationchange",a)}})(window,document,Math,null,true,false)</script><style>.jssorb12{position:absolute}.jssorb12 div,.jssorb12 div:hover,.jssorb12 .av{position:absolute;width:16px;height:16px;background:url('img/b12.png') no-repeat;overflow:hidden;cursor:pointer}.jssorb12 div{background-position:-7px -7px}.jssorb12 div:hover,.jssorb12 .av:hover{background-position:-37px -7px}.jssorb12 .av{background-position:-67px -7px}.jssorb12 .dn,.jssorb12 .dn:hover{background-position:-97px -7px}.jssora05l,.jssora05r{display:block;position:absolute;width:40px;height:40px;cursor:pointer;background:url('img/a17.png') no-repeat;overflow:hidden}.jssora05l{background-position:-10px -40px}.jssora05r{background-position:-70px -40px}.jssora05l:hover{background-position:-130px -40px}.jssora05r:hover{background-position:-190px -40px}.jssora05l.jssora05ldn{background-position:-250px -40px}.jssora05r.jssora05rdn{background-position:-310px -40px}.jssort01-50-52 .p{position:absolute;top:0;left:0;width:50px;height:52px}.jssort01-50-52 .t{position:absolute;top:0;left:0;width:100%;height:100%;border:none}.jssort01-50-52 .w{position:absolute;top:0;left:0;width:100%;height:100%}.jssort01-50-52 .c{position:absolute;top:0;left:0;width:46px;height:48px;border:#000 2px solid;box-sizing:content-box;background:url('img/t01.png') -800px -800px no-repeat;_background:none}.jssort01-50-52 .pav .c{top:2px;_top:0;left:2px;_left:0;width:46px;height:48px;border:#000 0 solid;_border:#fff 2px solid;background-position:50% 50%}.jssort01-50-52 .p:hover .c{top:0;left:0;width:48px;height:50px;border:#fff 1px solid;background-position:50% 50%}.jssort01-50-52 .p.pdn .c{background-position:50% 50%;width:46px;height:48px;border:#000 2px solid}* html .jssort01-50-52 .c,* html .jssort01-50-52 .pdn .c,* html .jssort01-50-52 .pav .c{width:50px;height:52px}</style><div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 440px; overflow: hidden; visibility: hidden; background-color: #24262e;"><!-- Loading Screen --><div data-u="loading" style="position: absolute; top: 0px; left: 0px;"><div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div><div style="position:absolute;display:block;background:url('img/loading2.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div></div><div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 350px; overflow: hidden;"><div data-p="118.75" style="display: none;"><img data-u="image" src="img/puzzle9.jpg" /><img data-u="thumb" src="img/puzzle9.jpg" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/puzzle21.png" /><img data-u="thumb" src="img/puzzle21.png" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/puzzle15.jpg" /><img data-u="thumb" src="img/puzzle15.jpg" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/bullyingpic.JPG" /><img data-u="thumb" src="img/bullyingpic.JPG" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/puzzle2.jpg" /><img data-u="thumb" src="img/puzzle2.jpg" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/puzzle3.png" /><img data-u="thumb" src="img/puzzle3.png" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/bullyingpicb.jpg" /><img data-u="thumb" src="img/bullyingpicb.jpg" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/puzzle11.jpg" /><img data-u="thumb" src="img/puzzle11.jpg" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/background.jpg" /><img data-u="thumb" src="img/background.jpg" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/testdata.JPG" /><img data-u="thumb" src="img/testdata.JPG" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/erdiagram.JPG" /><img data-u="thumb" src="img/erdiagram.JPG" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/6.JPG" /><img data-u="thumb" src="img/6.JPG" /></div><div data-p="118.75" style="display: none;"><img data-u="image" src="img/1.jpg" /><img data-u="thumb" src="img/1.jpg" /></div><a data-u="ad" style="display:block;position:absolute;top:0;right:0;width:16px;height:16px;"></a></div><!-- Thumbnail Navigator --><div data-u="thumbnavigator" class="jssort01-50-52" style="position:absolute;left:0px;bottom:0px;width:600px;height:90px;" data-autocenter="1"><!-- Thumbnail Item Skin Begin --><div data-u="slides" style="cursor: default;"><div data-u="prototype" class="p"><div class="w"><div data-u="thumbnailtemplate" class="t"></div></div><div class="c"></div></div></div><!-- Thumbnail Item Skin End --></div><!-- Bullet Navigator --><div data-u="navigator" class="jssorb12" style="top:470px;right:16px;" data-autocenter="1"><!-- bullet navigator item prototype --><div data-u="prototype" style="width:16px;height:16px;"></div></div><!-- Arrow Navigator --><span data-u="arrowleft" class="jssora05l" style="top:0px;left:8px;width:40px;height:40px;" data-autocenter="2"></span><span data-u="arrowright" class="jssora05r" style="top:0px;right:8px;width:40px;height:40px;" data-autocenter="2"></span></div><script>jssor_1_slider_init();</script><!-- #endregion Jssor Slider End -->
</div>

<div style = "text-align:center" >
<div class="container">
      <div class="row" >
        <div class="grid_4" >
          <br/><br/>
		  <a  href = "login_panel.php?msg=info" style = "background-color:#3e495c" class="banner "><div>
            <div class="fa fa-outdent"></div><strong>Report<br/>An Incident</strong></div>
          </a>

          <a href = "login_panel.php?msg=info" style = "background-color:#41567c" class="banner "><div>
           <div class="fa fa-credit-card"></div><strong>Assign<br/>An Incident</strong></div>
          </a>
          <a href = "login_panel.php?msg=info" style = "background-color:#3e5d92" class="banner "><div>
            <div class="fa fa-bar-chart-o"></div><strong>Take<br/>An Action</strong></div>
          </a>
          <a href = "login_panel.php?msg=info" style = "background-color:#3962a9" class="banner"><div>
            <div class="fa fa-table"></div><strong>Monitor<br/>Behaviour</strong></div>
          </a>
		  
		  <a href = "login_panel.php?msg=info" style = "background-color:#2d64c5" class="banner"><div>
            <div class="fa fa-flag"></div><strong>Data<br/>Records</strong></div>
          </a>
          <a href = "login_panel.php?msg=info" style = "background-color:#1a61dd" class="banner"><div>
            <div class="fa fa-file-text-o"></div><strong>Statistical<br/>Deliverables</strong></div>
          </a>
		  <a href = "contacts.php" style = "background-color:#025cf6" class="banner"><div>
            <div class="fa fa-flag"></div><strong>Take<br/>Survey</strong></div>
          </a>
		  <a href="http://www.amitagarwal.net" style = "background-color:#0212f6" class="banner"><div>
            <div class="fa fa-file-text-o"></div><strong>Who<br/>Am I</strong></div>
          </a>
        </div>
        
                            
        
      </div></div>
    </div>

  <br/>


<!--=====================
          Content
======================-->


  <div class="container" style='color:black;font-weight:900'>
    <div class="row" id = "left" style = "text-align:center">
    	<div class = "des">
		<h3 class="deshead">Prime Minister's Message	</h3>
          <iframe width="90%" height="170" src="https://www.youtube.com/embed/xslNMR0N7kw" frameborder="0" allowfullscreen></iframe>

    </div>
	<div class = "des" id = "desa">
		<h3 class="deshead">Website Walk-through</h3>
		<iframe width="90%" height="170" src="https://www.youtube.com/embed/SeVqggl-upA" frameborder="0" allowfullscreen></iframe>
		 <!--<h5>This component has been intentionally removed.</h5>-->
		</div>
	<div class = "des" id = "desb" >
       <h3 class="deshead">Locate Us</h3>
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2609.7771632592207!2d-122.79127048485137!3d49.14785517931691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5485da09cfabdff3%3A0xcf0478c23064603!2sFleetwood+Park+Secondary+School!5e0!3m2!1sen!2sca!4v1456089387328" width="90%" height="170" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
</div>
<br/>
</section>
	</header>
<!--==============================
              footer
=================================-->
      
      <!-- Bottom Footer -->
      <section class="padding full-width" style="background-color:#00001a">
        <div class="s-12 l-6">
          <div  style="font-size:11px;text-align:center;color:white">Programmed and Architectured by Om Amit Agarwal</div>
        </div>
      </section>

</div>
</body>
</html>