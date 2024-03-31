;// bundle: simple-mvc___dc8e6b1391a7a0d35652b4401baff73c_m
;// files: jquery.cookies.2.2.0.1.js, jquery.cookie.js

;// jquery.cookies.2.2.0.1.js
var jaaulde=window.jaaulde||{};jaaulde.utils=jaaulde.utils||{},jaaulde.utils.cookies=function(){var i,u,r,n,t={expiresAt:null,path:"/",domain:null,secure:!1};return i=function(n){var i,r;return typeof n!="object"||n===null?i=t:(i={expiresAt:t.expiresAt,path:t.path,domain:t.domain,secure:t.secure},typeof n.expiresAt=="object"&&n.expiresAt instanceof Date?i.expiresAt=n.expiresAt:typeof n.hoursToLive=="number"&&n.hoursToLive!==0&&(r=new Date,r.setTime(r.getTime()+n.hoursToLive*36e5),i.expiresAt=r),typeof n.path=="string"&&n.path!==""&&(i.path=n.path),typeof n.domain=="string"&&n.domain!==""&&(i.domain=n.domain),n.secure===!0&&(i.secure=n.secure)),i},u=function(n){return n=i(n),(typeof n.expiresAt=="object"&&n.expiresAt instanceof Date?"; expires="+n.expiresAt.toGMTString():"")+"; path="+n.path+(typeof n.domain=="string"?"; domain="+n.domain:"")+(n.secure===!0?"; secure":"")},r=function(){for(var r={},i,u,n,f=document.cookie.split(";"),e,t=0;t<f.length;t=t+1){i=f[t].split("="),u=i[0].replace(/^\s*/,"").replace(/\s*$/,"");try{n=decodeURIComponent(i[1])}catch(o){n=i[1]}if(typeof JSON=="object"&&JSON!==null&&typeof JSON.parse=="function")try{e=n,n=JSON.parse(n)}catch(s){n=e}r[u]=n}return r},n=function(){},n.prototype.get=function(n){var t,i,u=r();if(typeof n=="string")t=typeof u[n]!="undefined"?u[n]:null;else if(typeof n=="object"&&n!==null){t={};for(i in n)t[n[i]]=typeof u[n[i]]!="undefined"?u[n[i]]:null}else t=u;return t},n.prototype.filter=function(n){var t,i={},u=r();typeof n=="string"&&(n=new RegExp(n));for(t in u)t.match(n)&&(i[t]=u[t]);return i},n.prototype.set=function(n,t,i){if((typeof i!="object"||i===null)&&(i={}),typeof t=="undefined"||t===null)t="",i.hoursToLive=-8760;else if(typeof t!="string")if(typeof JSON=="object"&&JSON!==null&&typeof JSON.stringify=="function")t=JSON.stringify(t);else throw new Error("cookies.set() received non-string value and could not serialize.");var r=u(i);document.cookie=n+"="+encodeURIComponent(t)+r},n.prototype.del=function(n,t){var r={},i;(typeof t!="object"||t===null)&&(t={}),typeof n=="boolean"&&n===!0?r=this.get():typeof n=="string"&&(r[n]=!0);for(i in r)typeof i=="string"&&i!==""&&this.set(i,null,t)},n.prototype.test=function(){var t=!1,n="cT",i="data";return this.set(n,i),this.get(n)===i&&(this.del(n),t=!0),t},n.prototype.setOptions=function(n){typeof n!="object"&&(n=null),t=i(n)},new n}(),function(){window.jQuery&&function(n){n.cookies=jaaulde.utils.cookies;var t={cookify:function(t){return this.each(function(){var f,e=["name","id"],u,i=n(this),r;for(f in e)if(!isNaN(f)&&(u=i.attr(e[f]),typeof u=="string"&&u!=="")){i.is(":checkbox, :radio")?i.attr("checked")&&(r=i.val()):r=i.is(":input")?i.val():i.html(),(typeof r!="string"||r==="")&&(r=null),n.cookies.set(u,r,t);break}})},cookieFill:function(){return this.each(function(){for(var u,e=["name","id"],r,t=n(this),i,f=function(){return u=e.pop(),!!u};f();)if(r=t.attr(u),typeof r=="string"&&r!==""){i=n.cookies.get(r),i!==null&&(t.is(":checkbox, :radio")?t.val()===i?t.attr("checked","checked"):t.removeAttr("checked"):t.is(":input")?t.val(i):t.html(i));break}})},cookieBind:function(t){return this.each(function(){var i=n(this);i.cookieFill().change(function(){i.cookify(t)})})}};n.each(t,function(t){n.fn[t]=this})}(window.jQuery)}();

;// jquery.cookie.js
jQuery.cookie=function(n,t,i){var f,r,e,o,u,s;if(typeof t!="undefined"){i=i||{},t===null&&(t="",i.expires=-1),f="",i.expires&&(typeof i.expires=="number"||i.expires.toUTCString)&&(typeof i.expires=="number"?(r=new Date,r.setTime(r.getTime()+i.expires*864e5)):r=i.expires,f="; expires="+r.toUTCString());var h=i.path?"; path="+i.path:"",c=i.domain?"; domain="+i.domain:"",l=i.secure?"; secure":"";document.cookie=[n,"=",encodeURIComponent(t),f,h,c,l].join("")}else{if(e=null,document.cookie&&document.cookie!="")for(o=document.cookie.split(";"),u=0;u<o.length;u++)if(s=jQuery.trim(o[u]),s.substring(0,n.length+1)==n+"="){e=decodeURIComponent(s.substring(n.length+1));break}return e}};
