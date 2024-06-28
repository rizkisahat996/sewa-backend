import{c as Y,g as ee}from"./_commonjsHelpers-725317a4.js";var te={exports:{}};(function(j){var _=typeof window<"u"?window:typeof WorkerGlobalScope<"u"&&self instanceof WorkerGlobalScope?self:{};/**
 * Prism: Lightweight, robust, elegant syntax highlighting
 *
 * @license MIT <https://opensource.org/licenses/MIT>
 * @author Lea Verou <https://lea.verou.me>
 * @namespace
 * @public
 */var s=function(x){var k=/(?:^|\s)lang(?:uage)?-([\w-]+)(?=\s|$)/i,r=0,a={},e={manual:x.Prism&&x.Prism.manual,disableWorkerMessageHandler:x.Prism&&x.Prism.disableWorkerMessageHandler,util:{encode:function n(t){return t instanceof c?new c(t.type,n(t.content),t.alias):Array.isArray(t)?t.map(n):t.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/\u00a0/g," ")},type:function(n){return Object.prototype.toString.call(n).slice(8,-1)},objId:function(n){return n.__id||Object.defineProperty(n,"__id",{value:++r}),n.__id},clone:function n(t,o){o=o||{};var l,u;switch(e.util.type(t)){case"Object":if(u=e.util.objId(t),o[u])return o[u];l={},o[u]=l;for(var p in t)t.hasOwnProperty(p)&&(l[p]=n(t[p],o));return l;case"Array":return u=e.util.objId(t),o[u]?o[u]:(l=[],o[u]=l,t.forEach(function(F,i){l[i]=n(F,o)}),l);default:return t}},getLanguage:function(n){for(;n;){var t=k.exec(n.className);if(t)return t[1].toLowerCase();n=n.parentElement}return"none"},setLanguage:function(n,t){n.className=n.className.replace(RegExp(k,"gi"),""),n.classList.add("language-"+t)},currentScript:function(){if(typeof document>"u")return null;if("currentScript"in document&&1<2)return document.currentScript;try{throw new Error}catch(l){var n=(/at [^(\r\n]*\((.*):[^:]+:[^:]+\)$/i.exec(l.stack)||[])[1];if(n){var t=document.getElementsByTagName("script");for(var o in t)if(t[o].src==n)return t[o]}return null}},isActive:function(n,t,o){for(var l="no-"+t;n;){var u=n.classList;if(u.contains(t))return!0;if(u.contains(l))return!1;n=n.parentElement}return!!o}},languages:{plain:a,plaintext:a,text:a,txt:a,extend:function(n,t){var o=e.util.clone(e.languages[n]);for(var l in t)o[l]=t[l];return o},insertBefore:function(n,t,o,l){l=l||e.languages;var u=l[n],p={};for(var F in u)if(u.hasOwnProperty(F)){if(F==t)for(var i in o)o.hasOwnProperty(i)&&(p[i]=o[i]);o.hasOwnProperty(F)||(p[F]=u[F])}var g=l[n];return l[n]=p,e.languages.DFS(e.languages,function(f,v){v===g&&f!=n&&(this[f]=p)}),p},DFS:function n(t,o,l,u){u=u||{};var p=e.util.objId;for(var F in t)if(t.hasOwnProperty(F)){o.call(t,F,t[F],l||F);var i=t[F],g=e.util.type(i);g==="Object"&&!u[p(i)]?(u[p(i)]=!0,n(i,o,null,u)):g==="Array"&&!u[p(i)]&&(u[p(i)]=!0,n(i,o,F,u))}}},plugins:{},highlightAll:function(n,t){e.highlightAllUnder(document,n,t)},highlightAllUnder:function(n,t,o){var l={callback:o,container:n,selector:'code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code'};e.hooks.run("before-highlightall",l),l.elements=Array.prototype.slice.apply(l.container.querySelectorAll(l.selector)),e.hooks.run("before-all-elements-highlight",l);for(var u=0,p;p=l.elements[u++];)e.highlightElement(p,t===!0,l.callback)},highlightElement:function(n,t,o){var l=e.util.getLanguage(n),u=e.languages[l];e.util.setLanguage(n,l);var p=n.parentElement;p&&p.nodeName.toLowerCase()==="pre"&&e.util.setLanguage(p,l);var F=n.textContent,i={element:n,language:l,grammar:u,code:F};function g(v){i.highlightedCode=v,e.hooks.run("before-insert",i),i.element.innerHTML=i.highlightedCode,e.hooks.run("after-highlight",i),e.hooks.run("complete",i),o&&o.call(i.element)}if(e.hooks.run("before-sanity-check",i),p=i.element.parentElement,p&&p.nodeName.toLowerCase()==="pre"&&!p.hasAttribute("tabindex")&&p.setAttribute("tabindex","0"),!i.code){e.hooks.run("complete",i),o&&o.call(i.element);return}if(e.hooks.run("before-highlight",i),!i.grammar){g(e.util.encode(i.code));return}if(t&&x.Worker){var f=new Worker(e.filename);f.onmessage=function(v){g(v.data)},f.postMessage(JSON.stringify({language:i.language,code:i.code,immediateClose:!0}))}else g(e.highlight(i.code,i.grammar,i.language))},highlight:function(n,t,o){var l={code:n,grammar:t,language:o};if(e.hooks.run("before-tokenize",l),!l.grammar)throw new Error('The language "'+l.language+'" has no grammar.');return l.tokens=e.tokenize(l.code,l.grammar),e.hooks.run("after-tokenize",l),c.stringify(e.util.encode(l.tokens),l.language)},tokenize:function(n,t){var o=t.rest;if(o){for(var l in o)t[l]=o[l];delete t.rest}var u=new h;return b(u,u.head,n),d(n,u,t,u.head,0),L(u)},hooks:{all:{},add:function(n,t){var o=e.hooks.all;o[n]=o[n]||[],o[n].push(t)},run:function(n,t){var o=e.hooks.all[n];if(!(!o||!o.length))for(var l=0,u;u=o[l++];)u(t)}},Token:c};x.Prism=e;function c(n,t,o,l){this.type=n,this.content=t,this.alias=o,this.length=(l||"").length|0}c.stringify=function n(t,o){if(typeof t=="string")return t;if(Array.isArray(t)){var l="";return t.forEach(function(g){l+=n(g,o)}),l}var u={type:t.type,content:n(t.content,o),tag:"span",classes:["token",t.type],attributes:{},language:o},p=t.alias;p&&(Array.isArray(p)?Array.prototype.push.apply(u.classes,p):u.classes.push(p)),e.hooks.run("wrap",u);var F="";for(var i in u.attributes)F+=" "+i+'="'+(u.attributes[i]||"").replace(/"/g,"&quot;")+'"';return"<"+u.tag+' class="'+u.classes.join(" ")+'"'+F+">"+u.content+"</"+u.tag+">"};function A(n,t,o,l){n.lastIndex=t;var u=n.exec(o);if(u&&l&&u[1]){var p=u[1].length;u.index+=p,u[0]=u[0].slice(p)}return u}function d(n,t,o,l,u,p){for(var F in o)if(!(!o.hasOwnProperty(F)||!o[F])){var i=o[F];i=Array.isArray(i)?i:[i];for(var g=0;g<i.length;++g){if(p&&p.cause==F+","+g)return;var f=i[g],v=f.inside,E=!!f.lookbehind,y=!!f.greedy,T=f.alias;if(y&&!f.pattern.global){var O=f.pattern.toString().match(/[imsuy]*$/)[0];f.pattern=RegExp(f.pattern.source,O+"g")}for(var M=f.pattern||f,C=l.next,z=u;C!==t.tail&&!(p&&z>=p.reach);z+=C.value.length,C=C.next){var I=C.value;if(t.length>n.length)return;if(!(I instanceof c)){var H=1,P;if(y){if(P=A(M,z,n,E),!P||P.index>=n.length)break;var q=P.index,K=P.index+P[0].length,R=z;for(R+=C.value.length;q>=R;)C=C.next,R+=C.value.length;if(R-=C.value.length,z=R,C.value instanceof c)continue;for(var D=C;D!==t.tail&&(R<K||typeof D.value=="string");D=D.next)H++,R+=D.value.length;H--,I=n.slice(z,R),P.index-=z}else if(P=A(M,0,I,E),!P)continue;var q=P.index,N=P[0],U=I.slice(0,q),J=I.slice(q+N.length),W=z+I.length;p&&W>p.reach&&(p.reach=W);var G=C.prev;U&&(G=b(t,G,U),z+=U.length),$(t,G,H);var Q=new c(F,v?e.tokenize(N,v):N,T,N);if(C=b(t,G,Q),J&&b(t,C,J),H>1){var Z={cause:F+","+g,reach:W};d(n,t,o,C.prev,z,Z),p&&Z.reach>p.reach&&(p.reach=Z.reach)}}}}}}function h(){var n={value:null,prev:null,next:null},t={value:null,prev:n,next:null};n.next=t,this.head=n,this.tail=t,this.length=0}function b(n,t,o){var l=t.next,u={value:o,prev:t,next:l};return t.next=u,l.prev=u,n.length++,u}function $(n,t,o){for(var l=t.next,u=0;u<o&&l!==n.tail;u++)l=l.next;t.next=l,l.prev=t,n.length-=u}function L(n){for(var t=[],o=n.head.next;o!==n.tail;)t.push(o.value),o=o.next;return t}if(!x.document)return x.addEventListener&&(e.disableWorkerMessageHandler||x.addEventListener("message",function(n){var t=JSON.parse(n.data),o=t.language,l=t.code,u=t.immediateClose;x.postMessage(e.highlight(l,e.languages[o],o)),u&&x.close()},!1)),e;var w=e.util.currentScript();w&&(e.filename=w.src,w.hasAttribute("data-manual")&&(e.manual=!0));function m(){e.manual||e.highlightAll()}if(!e.manual){var S=document.readyState;S==="loading"||S==="interactive"&&w&&w.defer?document.addEventListener("DOMContentLoaded",m):window.requestAnimationFrame?window.requestAnimationFrame(m):window.setTimeout(m,16)}return e}(_);j.exports&&(j.exports=s),typeof Y<"u"&&(Y.Prism=s),s.languages.markup={comment:{pattern:/<!--(?:(?!<!--)[\s\S])*?-->/,greedy:!0},prolog:{pattern:/<\?[\s\S]+?\?>/,greedy:!0},doctype:{pattern:/<!DOCTYPE(?:[^>"'[\]]|"[^"]*"|'[^']*')+(?:\[(?:[^<"'\]]|"[^"]*"|'[^']*'|<(?!!--)|<!--(?:[^-]|-(?!->))*-->)*\]\s*)?>/i,greedy:!0,inside:{"internal-subset":{pattern:/(^[^\[]*\[)[\s\S]+(?=\]>$)/,lookbehind:!0,greedy:!0,inside:null},string:{pattern:/"[^"]*"|'[^']*'/,greedy:!0},punctuation:/^<!|>$|[[\]]/,"doctype-tag":/^DOCTYPE/i,name:/[^\s<>'"]+/}},cdata:{pattern:/<!\[CDATA\[[\s\S]*?\]\]>/i,greedy:!0},tag:{pattern:/<\/?(?!\d)[^\s>\/=$<%]+(?:\s(?:\s*[^\s>\/=]+(?:\s*=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+(?=[\s>]))|(?=[\s/>])))+)?\s*\/?>/,greedy:!0,inside:{tag:{pattern:/^<\/?[^\s>\/]+/,inside:{punctuation:/^<\/?/,namespace:/^[^\s>\/:]+:/}},"special-attr":[],"attr-value":{pattern:/=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+)/,inside:{punctuation:[{pattern:/^=/,alias:"attr-equals"},{pattern:/^(\s*)["']|["']$/,lookbehind:!0}]}},punctuation:/\/?>/,"attr-name":{pattern:/[^\s>\/]+/,inside:{namespace:/^[^\s>\/:]+:/}}}},entity:[{pattern:/&[\da-z]{1,8};/i,alias:"named-entity"},/&#x?[\da-f]{1,8};/i]},s.languages.markup.tag.inside["attr-value"].inside.entity=s.languages.markup.entity,s.languages.markup.doctype.inside["internal-subset"].inside=s.languages.markup,s.hooks.add("wrap",function(x){x.type==="entity"&&(x.attributes.title=x.content.replace(/&amp;/,"&"))}),Object.defineProperty(s.languages.markup.tag,"addInlined",{value:function(k,r){var a={};a["language-"+r]={pattern:/(^<!\[CDATA\[)[\s\S]+?(?=\]\]>$)/i,lookbehind:!0,inside:s.languages[r]},a.cdata=/^<!\[CDATA\[|\]\]>$/i;var e={"included-cdata":{pattern:/<!\[CDATA\[[\s\S]*?\]\]>/i,inside:a}};e["language-"+r]={pattern:/[\s\S]+/,inside:s.languages[r]};var c={};c[k]={pattern:RegExp(/(<__[^>]*>)(?:<!\[CDATA\[(?:[^\]]|\](?!\]>))*\]\]>|(?!<!\[CDATA\[)[\s\S])*?(?=<\/__>)/.source.replace(/__/g,function(){return k}),"i"),lookbehind:!0,greedy:!0,inside:e},s.languages.insertBefore("markup","cdata",c)}}),Object.defineProperty(s.languages.markup.tag,"addAttribute",{value:function(x,k){s.languages.markup.tag.inside["special-attr"].push({pattern:RegExp(/(^|["'\s])/.source+"(?:"+x+")"+/\s*=\s*(?:"[^"]*"|'[^']*'|[^\s'">=]+(?=[\s>]))/.source,"i"),lookbehind:!0,inside:{"attr-name":/^[^\s=]+/,"attr-value":{pattern:/=[\s\S]+/,inside:{value:{pattern:/(^=\s*(["']|(?!["'])))\S[\s\S]*(?=\2$)/,lookbehind:!0,alias:[k,"language-"+k],inside:s.languages[k]},punctuation:[{pattern:/^=/,alias:"attr-equals"},/"|'/]}}}})}}),s.languages.html=s.languages.markup,s.languages.mathml=s.languages.markup,s.languages.svg=s.languages.markup,s.languages.xml=s.languages.extend("markup",{}),s.languages.ssml=s.languages.xml,s.languages.atom=s.languages.xml,s.languages.rss=s.languages.xml,function(x){var k=/(?:"(?:\\(?:\r\n|[\s\S])|[^"\\\r\n])*"|'(?:\\(?:\r\n|[\s\S])|[^'\\\r\n])*')/;x.languages.css={comment:/\/\*[\s\S]*?\*\//,atrule:{pattern:RegExp("@[\\w-](?:"+/[^;{\s"']|\s+(?!\s)/.source+"|"+k.source+")*?"+/(?:;|(?=\s*\{))/.source),inside:{rule:/^@[\w-]+/,"selector-function-argument":{pattern:/(\bselector\s*\(\s*(?![\s)]))(?:[^()\s]|\s+(?![\s)])|\((?:[^()]|\([^()]*\))*\))+(?=\s*\))/,lookbehind:!0,alias:"selector"},keyword:{pattern:/(^|[^\w-])(?:and|not|only|or)(?![\w-])/,lookbehind:!0}}},url:{pattern:RegExp("\\burl\\((?:"+k.source+"|"+/(?:[^\\\r\n()"']|\\[\s\S])*/.source+")\\)","i"),greedy:!0,inside:{function:/^url/i,punctuation:/^\(|\)$/,string:{pattern:RegExp("^"+k.source+"$"),alias:"url"}}},selector:{pattern:RegExp(`(^|[{}\\s])[^{}\\s](?:[^{};"'\\s]|\\s+(?![\\s{])|`+k.source+")*(?=\\s*\\{)"),lookbehind:!0},string:{pattern:k,greedy:!0},property:{pattern:/(^|[^-\w\xA0-\uFFFF])(?!\s)[-_a-z\xA0-\uFFFF](?:(?!\s)[-\w\xA0-\uFFFF])*(?=\s*:)/i,lookbehind:!0},important:/!important\b/i,function:{pattern:/(^|[^-a-z0-9])[-a-z0-9]+(?=\()/i,lookbehind:!0},punctuation:/[(){};:,]/},x.languages.css.atrule.inside.rest=x.languages.css;var r=x.languages.markup;r&&(r.tag.addInlined("style","css"),r.tag.addAttribute("style","css"))}(s),s.languages.clike={comment:[{pattern:/(^|[^\\])\/\*[\s\S]*?(?:\*\/|$)/,lookbehind:!0,greedy:!0},{pattern:/(^|[^\\:])\/\/.*/,lookbehind:!0,greedy:!0}],string:{pattern:/(["'])(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/,greedy:!0},"class-name":{pattern:/(\b(?:class|extends|implements|instanceof|interface|new|trait)\s+|\bcatch\s+\()[\w.\\]+/i,lookbehind:!0,inside:{punctuation:/[.\\]/}},keyword:/\b(?:break|catch|continue|do|else|finally|for|function|if|in|instanceof|new|null|return|throw|try|while)\b/,boolean:/\b(?:false|true)\b/,function:/\b\w+(?=\()/,number:/\b0x[\da-f]+\b|(?:\b\d+(?:\.\d*)?|\B\.\d+)(?:e[+-]?\d+)?/i,operator:/[<>]=?|[!=]=?=?|--?|\+\+?|&&?|\|\|?|[?*/~^%]/,punctuation:/[{}[\];(),.:]/},s.languages.javascript=s.languages.extend("clike",{"class-name":[s.languages.clike["class-name"],{pattern:/(^|[^$\w\xA0-\uFFFF])(?!\s)[_$A-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\.(?:constructor|prototype))/,lookbehind:!0}],keyword:[{pattern:/((?:^|\})\s*)catch\b/,lookbehind:!0},{pattern:/(^|[^.]|\.\.\.\s*)\b(?:as|assert(?=\s*\{)|async(?=\s*(?:function\b|\(|[$\w\xA0-\uFFFF]|$))|await|break|case|class|const|continue|debugger|default|delete|do|else|enum|export|extends|finally(?=\s*(?:\{|$))|for|from(?=\s*(?:['"]|$))|function|(?:get|set)(?=\s*(?:[#\[$\w\xA0-\uFFFF]|$))|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|static|super|switch|this|throw|try|typeof|undefined|var|void|while|with|yield)\b/,lookbehind:!0}],function:/#?(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*(?:\.\s*(?:apply|bind|call)\s*)?\()/,number:{pattern:RegExp(/(^|[^\w$])/.source+"(?:"+(/NaN|Infinity/.source+"|"+/0[bB][01]+(?:_[01]+)*n?/.source+"|"+/0[oO][0-7]+(?:_[0-7]+)*n?/.source+"|"+/0[xX][\dA-Fa-f]+(?:_[\dA-Fa-f]+)*n?/.source+"|"+/\d+(?:_\d+)*n/.source+"|"+/(?:\d+(?:_\d+)*(?:\.(?:\d+(?:_\d+)*)?)?|\.\d+(?:_\d+)*)(?:[Ee][+-]?\d+(?:_\d+)*)?/.source)+")"+/(?![\w$])/.source),lookbehind:!0},operator:/--|\+\+|\*\*=?|=>|&&=?|\|\|=?|[!=]==|<<=?|>>>?=?|[-+*/%&|^!=<>]=?|\.{3}|\?\?=?|\?\.?|[~:]/}),s.languages.javascript["class-name"][0].pattern=/(\b(?:class|extends|implements|instanceof|interface|new)\s+)[\w.\\]+/,s.languages.insertBefore("javascript","keyword",{regex:{pattern:RegExp(/((?:^|[^$\w\xA0-\uFFFF."'\])\s]|\b(?:return|yield))\s*)/.source+/\//.source+"(?:"+/(?:\[(?:[^\]\\\r\n]|\\.)*\]|\\.|[^/\\\[\r\n])+\/[dgimyus]{0,7}/.source+"|"+/(?:\[(?:[^[\]\\\r\n]|\\.|\[(?:[^[\]\\\r\n]|\\.|\[(?:[^[\]\\\r\n]|\\.)*\])*\])*\]|\\.|[^/\\\[\r\n])+\/[dgimyus]{0,7}v[dgimyus]{0,7}/.source+")"+/(?=(?:\s|\/\*(?:[^*]|\*(?!\/))*\*\/)*(?:$|[\r\n,.;:})\]]|\/\/))/.source),lookbehind:!0,greedy:!0,inside:{"regex-source":{pattern:/^(\/)[\s\S]+(?=\/[a-z]*$)/,lookbehind:!0,alias:"language-regex",inside:s.languages.regex},"regex-delimiter":/^\/|\/$/,"regex-flags":/^[a-z]+$/}},"function-variable":{pattern:/#?(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*[=:]\s*(?:async\s*)?(?:\bfunction\b|(?:\((?:[^()]|\([^()]*\))*\)|(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*)\s*=>))/,alias:"function"},parameter:[{pattern:/(function(?:\s+(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*)?\s*\(\s*)(?!\s)(?:[^()\s]|\s+(?![\s)])|\([^()]*\))+(?=\s*\))/,lookbehind:!0,inside:s.languages.javascript},{pattern:/(^|[^$\w\xA0-\uFFFF])(?!\s)[_$a-z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*=>)/i,lookbehind:!0,inside:s.languages.javascript},{pattern:/(\(\s*)(?!\s)(?:[^()\s]|\s+(?![\s)])|\([^()]*\))+(?=\s*\)\s*=>)/,lookbehind:!0,inside:s.languages.javascript},{pattern:/((?:\b|\s|^)(?!(?:as|async|await|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|finally|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|undefined|var|void|while|with|yield)(?![$\w\xA0-\uFFFF]))(?:(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*\s*)\(\s*|\]\s*\(\s*)(?!\s)(?:[^()\s]|\s+(?![\s)])|\([^()]*\))+(?=\s*\)\s*\{)/,lookbehind:!0,inside:s.languages.javascript}],constant:/\b[A-Z](?:[A-Z_]|\dx?)*\b/}),s.languages.insertBefore("javascript","string",{hashbang:{pattern:/^#!.*/,greedy:!0,alias:"comment"},"template-string":{pattern:/`(?:\\[\s\S]|\$\{(?:[^{}]|\{(?:[^{}]|\{[^}]*\})*\})+\}|(?!\$\{)[^\\`])*`/,greedy:!0,inside:{"template-punctuation":{pattern:/^`|`$/,alias:"string"},interpolation:{pattern:/((?:^|[^\\])(?:\\{2})*)\$\{(?:[^{}]|\{(?:[^{}]|\{[^}]*\})*\})+\}/,lookbehind:!0,inside:{"interpolation-punctuation":{pattern:/^\$\{|\}$/,alias:"punctuation"},rest:s.languages.javascript}},string:/[\s\S]+/}},"string-property":{pattern:/((?:^|[,{])[ \t]*)(["'])(?:\\(?:\r\n|[\s\S])|(?!\2)[^\\\r\n])*\2(?=\s*:)/m,lookbehind:!0,greedy:!0,alias:"property"}}),s.languages.insertBefore("javascript","operator",{"literal-property":{pattern:/((?:^|[,{])[ \t]*)(?!\s)[_$a-zA-Z\xA0-\uFFFF](?:(?!\s)[$\w\xA0-\uFFFF])*(?=\s*:)/m,lookbehind:!0,alias:"property"}}),s.languages.markup&&(s.languages.markup.tag.addInlined("script","javascript"),s.languages.markup.tag.addAttribute(/on(?:abort|blur|change|click|composition(?:end|start|update)|dblclick|error|focus(?:in|out)?|key(?:down|up)|load|mouse(?:down|enter|leave|move|out|over|up)|reset|resize|scroll|select|slotchange|submit|unload|wheel)/.source,"javascript")),s.languages.js=s.languages.javascript,function(){if(typeof s>"u"||typeof document>"u")return;Element.prototype.matches||(Element.prototype.matches=Element.prototype.msMatchesSelector||Element.prototype.webkitMatchesSelector);var x="Loading…",k=function(w,m){return"✖ Error "+w+" while fetching file: "+m},r="✖ Error: File does not exist or is empty",a={js:"javascript",py:"python",rb:"ruby",ps1:"powershell",psm1:"powershell",sh:"bash",bat:"batch",h:"c",tex:"latex"},e="data-src-status",c="loading",A="loaded",d="failed",h="pre[data-src]:not(["+e+'="'+A+'"]):not(['+e+'="'+c+'"])';function b(w,m,S){var n=new XMLHttpRequest;n.open("GET",w,!0),n.onreadystatechange=function(){n.readyState==4&&(n.status<400&&n.responseText?m(n.responseText):n.status>=400?S(k(n.status,n.statusText)):S(r))},n.send(null)}function $(w){var m=/^\s*(\d+)\s*(?:(,)\s*(?:(\d+)\s*)?)?$/.exec(w||"");if(m){var S=Number(m[1]),n=m[2],t=m[3];return n?t?[S,Number(t)]:[S,void 0]:[S,S]}}s.hooks.add("before-highlightall",function(w){w.selector+=", "+h}),s.hooks.add("before-sanity-check",function(w){var m=w.element;if(m.matches(h)){w.code="",m.setAttribute(e,c);var S=m.appendChild(document.createElement("CODE"));S.textContent=x;var n=m.getAttribute("data-src"),t=w.language;if(t==="none"){var o=(/\.(\w+)$/.exec(n)||[,"none"])[1];t=a[o]||o}s.util.setLanguage(S,t),s.util.setLanguage(m,t);var l=s.plugins.autoloader;l&&l.loadLanguages(t),b(n,function(u){m.setAttribute(e,A);var p=$(m.getAttribute("data-range"));if(p){var F=u.split(/\r\n?|\n/g),i=p[0],g=p[1]==null?F.length:p[1];i<0&&(i+=F.length),i=Math.max(0,Math.min(i-1,F.length)),g<0&&(g+=F.length),g=Math.max(0,Math.min(g,F.length)),u=F.slice(i,g).join(`
`),m.hasAttribute("data-start")||m.setAttribute("data-start",String(i+1))}S.textContent=u,s.highlightElement(S)},function(u){m.setAttribute(e,d),S.textContent=u})}}),s.plugins.fileHighlight={highlight:function(m){for(var S=(m||document).querySelectorAll(h),n=0,t;t=S[n++];)s.highlightElement(t)}};var L=!1;s.fileHighlight=function(){L||(console.warn("Prism.fileHighlight is deprecated. Use `Prism.plugins.fileHighlight.highlight` instead."),L=!0),s.plugins.fileHighlight.highlight.apply(this,arguments)}}()})(te);var ne={exports:{}};(function(j){(function(){if(typeof Prism<"u"){var _=Object.assign||function(r,a){for(var e in a)a.hasOwnProperty(e)&&(r[e]=a[e]);return r},s={"remove-trailing":"boolean","remove-indent":"boolean","left-trim":"boolean","right-trim":"boolean","break-lines":"number",indent:"number","remove-initial-line-feed":"boolean","tabs-to-spaces":"number","spaces-to-tabs":"number"};x.prototype={setDefaults:function(r){this.defaults=_(this.defaults,r)},normalize:function(r,a){for(var e in a=_(this.defaults,a)){var c=e.replace(/-(\w)/g,function(A,d){return d.toUpperCase()});e!=="normalize"&&c!=="setDefaults"&&a[e]&&this[c]&&(r=this[c].call(this,r,a[e]))}return r},leftTrim:function(r){return r.replace(/^\s+/,"")},rightTrim:function(r){return r.replace(/\s+$/,"")},tabsToSpaces:function(r,a){return a=0|a||4,r.replace(/\t/g,new Array(++a).join(" "))},spacesToTabs:function(r,a){return a=0|a||4,r.replace(RegExp(" {"+a+"}","g"),"	")},removeTrailing:function(r){return r.replace(/\s*?$/gm,"")},removeInitialLineFeed:function(r){return r.replace(/^(?:\r?\n|\r)/,"")},removeIndent:function(r){var a=r.match(/^[^\S\n\r]*(?=\S)/gm);return a&&a[0].length?(a.sort(function(e,c){return e.length-c.length}),a[0].length?r.replace(RegExp("^"+a[0],"gm"),""):r):r},indent:function(r,a){return r.replace(/^[^\S\n\r]*(?=\S)/gm,new Array(++a).join("	")+"$&")},breakLines:function(r,a){a=a===!0?80:0|a||80;for(var e=r.split(`
`),c=0;c<e.length;++c)if(!(k(e[c])<=a)){for(var A=e[c].split(/(\s+)/g),d=0,h=0;h<A.length;++h){var b=k(A[h]);(d+=b)>a&&(A[h]=`
`+A[h],d=b)}e[c]=A.join("")}return e.join(`
`)}},j.exports&&(j.exports=x),Prism.plugins.NormalizeWhitespace=new x({"remove-trailing":!0,"remove-indent":!0,"left-trim":!0,"right-trim":!0}),Prism.hooks.add("before-sanity-check",function(r){var a=Prism.plugins.NormalizeWhitespace;if((!r.settings||r.settings["whitespace-normalization"]!==!1)&&Prism.util.isActive(r.element,"whitespace-normalization",!0))if(r.element&&r.element.parentNode||!r.code){var e=r.element.parentNode;if(r.code&&e&&e.nodeName.toLowerCase()==="pre"){for(var c in r.settings==null&&(r.settings={}),s)if(Object.hasOwnProperty.call(s,c)){var A=s[c];if(e.hasAttribute("data-"+c))try{var d=JSON.parse(e.getAttribute("data-"+c)||"true");typeof d===A&&(r.settings[c]=d)}catch{}}for(var h=e.childNodes,b="",$="",L=!1,w=0;w<h.length;++w){var m=h[w];m==r.element?L=!0:m.nodeName==="#text"&&(L?$+=m.nodeValue:b+=m.nodeValue,e.removeChild(m),--w)}if(r.element.children.length&&Prism.plugins.KeepMarkup){var S=b+r.element.innerHTML+$;r.element.innerHTML=a.normalize(S,r.settings),r.code=r.element.textContent}else r.code=b+r.code+$,r.code=a.normalize(r.code,r.settings)}}else r.code=a.normalize(r.code,r.settings)})}function x(r){this.defaults=_({},r)}function k(r){for(var a=0,e=0;e<r.length;++e)r.charCodeAt(e)=="	".charCodeAt(0)&&(a+=3);return r.length+a}})()})(ne);var V={exports:{}};/*!
 * clipboard.js v2.0.11
 * https://clipboardjs.com/
 *
 * Licensed MIT © Zeno Rocha
 */(function(j,_){(function(s,x){j.exports=x()})(Y,function(){return x={686:function(r,d,e){e.d(d,{default:function(){return F}});var d=e(279),c=e.n(d),d=e(370),A=e.n(d),d=e(817),h=e.n(d);function b(i){try{return document.execCommand(i)}catch{return}}var $=function(i){return i=h()(i),b("cut"),i};function L(E,g){var f,v,E=(f=E,v=document.documentElement.getAttribute("dir")==="rtl",(E=document.createElement("textarea")).style.fontSize="12pt",E.style.border="0",E.style.padding="0",E.style.margin="0",E.style.position="absolute",E.style[v?"right":"left"]="-9999px",v=window.pageYOffset||document.documentElement.scrollTop,E.style.top="".concat(v,"px"),E.setAttribute("readonly",""),E.value=f,E);return g.container.appendChild(E),g=h()(E),b("copy"),E.remove(),g}var w=function(i){var g=1<arguments.length&&arguments[1]!==void 0?arguments[1]:{container:document.body},f="";return typeof i=="string"?f=L(i,g):i instanceof HTMLInputElement&&!["text","search","url","tel","password"].includes(i==null?void 0:i.type)?f=L(i.value,g):(f=h()(i),b("copy")),f};function m(i){return(m=typeof Symbol=="function"&&typeof Symbol.iterator=="symbol"?function(g){return typeof g}:function(g){return g&&typeof Symbol=="function"&&g.constructor===Symbol&&g!==Symbol.prototype?"symbol":typeof g})(i)}var S=function(){var v=0<arguments.length&&arguments[0]!==void 0?arguments[0]:{},f=v.action,i=f===void 0?"copy":f,g=v.container,f=v.target,v=v.text;if(i!=="copy"&&i!=="cut")throw new Error('Invalid "action" value, use either "copy" or "cut"');if(f!==void 0){if(!f||m(f)!=="object"||f.nodeType!==1)throw new Error('Invalid "target" value, use a valid Element');if(i==="copy"&&f.hasAttribute("disabled"))throw new Error('Invalid "target" attribute. Please use "readonly" instead of "disabled" attribute');if(i==="cut"&&(f.hasAttribute("readonly")||f.hasAttribute("disabled")))throw new Error(`Invalid "target" attribute. You can't cut text from elements with "readonly" or "disabled" attributes`)}return v?w(v,{container:g}):f?i==="cut"?$(f):w(f,{container:g}):void 0};function n(i){return(n=typeof Symbol=="function"&&typeof Symbol.iterator=="symbol"?function(g){return typeof g}:function(g){return g&&typeof Symbol=="function"&&g.constructor===Symbol&&g!==Symbol.prototype?"symbol":typeof g})(i)}function t(i,g){for(var f=0;f<g.length;f++){var v=g[f];v.enumerable=v.enumerable||!1,v.configurable=!0,"value"in v&&(v.writable=!0),Object.defineProperty(i,v.key,v)}}function o(i,g){return(o=Object.setPrototypeOf||function(f,v){return f.__proto__=v,f})(i,g)}function l(i){var g=function(){if(typeof Reflect>"u"||!Reflect.construct||Reflect.construct.sham)return!1;if(typeof Proxy=="function")return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],function(){})),!0}catch{return!1}}();return function(){var f,v=u(i);return f=g?(f=u(this).constructor,Reflect.construct(v,arguments,f)):v.apply(this,arguments),v=this,!(f=f)||n(f)!=="object"&&typeof f!="function"?function(E){if(E!==void 0)return E;throw new ReferenceError("this hasn't been initialised - super() hasn't been called")}(v):f}}function u(i){return(u=Object.setPrototypeOf?Object.getPrototypeOf:function(g){return g.__proto__||Object.getPrototypeOf(g)})(i)}function p(i,g){if(i="data-clipboard-".concat(i),g.hasAttribute(i))return g.getAttribute(i)}var F=function(){(function(y,T){if(typeof T!="function"&&T!==null)throw new TypeError("Super expression must either be null or a function");y.prototype=Object.create(T&&T.prototype,{constructor:{value:y,writable:!0,configurable:!0}}),T&&o(y,T)})(E,c());var i,g,f,v=l(E);function E(y,T){var O;return function(M){if(!(M instanceof E))throw new TypeError("Cannot call a class as a function")}(this),(O=v.call(this)).resolveOptions(T),O.listenClick(y),O}return i=E,f=[{key:"copy",value:function(y){var T=1<arguments.length&&arguments[1]!==void 0?arguments[1]:{container:document.body};return w(y,T)}},{key:"cut",value:function(y){return $(y)}},{key:"isSupported",value:function(){var y=0<arguments.length&&arguments[0]!==void 0?arguments[0]:["copy","cut"],y=typeof y=="string"?[y]:y,T=!!document.queryCommandSupported;return y.forEach(function(O){T=T&&!!document.queryCommandSupported(O)}),T}}],(g=[{key:"resolveOptions",value:function(){var y=0<arguments.length&&arguments[0]!==void 0?arguments[0]:{};this.action=typeof y.action=="function"?y.action:this.defaultAction,this.target=typeof y.target=="function"?y.target:this.defaultTarget,this.text=typeof y.text=="function"?y.text:this.defaultText,this.container=n(y.container)==="object"?y.container:document.body}},{key:"listenClick",value:function(y){var T=this;this.listener=A()(y,"click",function(O){return T.onClick(O)})}},{key:"onClick",value:function(M){var T=M.delegateTarget||M.currentTarget,O=this.action(T)||"copy",M=S({action:O,container:this.container,target:this.target(T),text:this.text(T)});this.emit(M?"success":"error",{action:O,text:M,trigger:T,clearSelection:function(){T&&T.focus(),window.getSelection().removeAllRanges()}})}},{key:"defaultAction",value:function(y){return p("action",y)}},{key:"defaultTarget",value:function(y){if(y=p("target",y),y)return document.querySelector(y)}},{key:"defaultText",value:function(y){return p("text",y)}},{key:"destroy",value:function(){this.listener.destroy()}}])&&t(i.prototype,g),f&&t(i,f),E}()},828:function(r){var a;typeof Element>"u"||Element.prototype.matches||((a=Element.prototype).matches=a.matchesSelector||a.mozMatchesSelector||a.msMatchesSelector||a.oMatchesSelector||a.webkitMatchesSelector),r.exports=function(e,c){for(;e&&e.nodeType!==9;){if(typeof e.matches=="function"&&e.matches(c))return e;e=e.parentNode}}},438:function(r,a,e){var c=e(828);function A(d,h,b,$,L){var w=function(m,S,n,t){return function(o){o.delegateTarget=c(o.target,S),o.delegateTarget&&t.call(m,o)}}.apply(this,arguments);return d.addEventListener(b,w,L),{destroy:function(){d.removeEventListener(b,w,L)}}}r.exports=function(d,h,b,$,L){return typeof d.addEventListener=="function"?A.apply(null,arguments):typeof b=="function"?A.bind(null,document).apply(null,arguments):(typeof d=="string"&&(d=document.querySelectorAll(d)),Array.prototype.map.call(d,function(w){return A(w,h,b,$,L)}))}},879:function(r,a){a.node=function(e){return e!==void 0&&e instanceof HTMLElement&&e.nodeType===1},a.nodeList=function(e){var c=Object.prototype.toString.call(e);return e!==void 0&&(c==="[object NodeList]"||c==="[object HTMLCollection]")&&"length"in e&&(e.length===0||a.node(e[0]))},a.string=function(e){return typeof e=="string"||e instanceof String},a.fn=function(e){return Object.prototype.toString.call(e)==="[object Function]"}},370:function(r,a,e){var c=e(879),A=e(438);r.exports=function(d,h,b){if(!d&&!h&&!b)throw new Error("Missing required arguments");if(!c.string(h))throw new TypeError("Second argument must be a String");if(!c.fn(b))throw new TypeError("Third argument must be a Function");if(c.node(d))return S=h,n=b,(m=d).addEventListener(S,n),{destroy:function(){m.removeEventListener(S,n)}};if(c.nodeList(d))return $=d,L=h,w=b,Array.prototype.forEach.call($,function(t){t.addEventListener(L,w)}),{destroy:function(){Array.prototype.forEach.call($,function(t){t.removeEventListener(L,w)})}};if(c.string(d))return d=d,h=h,b=b,A(document.body,d,h,b);throw new TypeError("First argument must be a String, HTMLElement, HTMLCollection, or NodeList");var $,L,w,m,S,n}},817:function(r){r.exports=function(a){var e,c=a.nodeName==="SELECT"?(a.focus(),a.value):a.nodeName==="INPUT"||a.nodeName==="TEXTAREA"?((e=a.hasAttribute("readonly"))||a.setAttribute("readonly",""),a.select(),a.setSelectionRange(0,a.value.length),e||a.removeAttribute("readonly"),a.value):(a.hasAttribute("contenteditable")&&a.focus(),c=window.getSelection(),(e=document.createRange()).selectNodeContents(a),c.removeAllRanges(),c.addRange(e),c.toString());return c}},279:function(r){function a(){}a.prototype={on:function(e,c,A){var d=this.e||(this.e={});return(d[e]||(d[e]=[])).push({fn:c,ctx:A}),this},once:function(e,c,A){var d=this;function h(){d.off(e,h),c.apply(A,arguments)}return h._=c,this.on(e,h,A)},emit:function(e){for(var c=[].slice.call(arguments,1),A=((this.e||(this.e={}))[e]||[]).slice(),d=0,h=A.length;d<h;d++)A[d].fn.apply(A[d].ctx,c);return this},off:function(e,c){var A=this.e||(this.e={}),d=A[e],h=[];if(d&&c)for(var b=0,$=d.length;b<$;b++)d[b].fn!==c&&d[b].fn._!==c&&h.push(d[b]);return h.length?A[e]=h:delete A[e],this}},r.exports=a,r.exports.TinyEmitter=a}},k={},s.n=function(r){var a=r&&r.__esModule?function(){return r.default}:function(){return r};return s.d(a,{a}),a},s.d=function(r,a){for(var e in a)s.o(a,e)&&!s.o(r,e)&&Object.defineProperty(r,e,{enumerable:!0,get:a[e]})},s.o=function(r,a){return Object.prototype.hasOwnProperty.call(r,a)},s(686).default;function s(r){if(k[r])return k[r].exports;var a=k[r]={exports:{}};return x[r](a,a.exports,s),a.exports}var x,k})})(V);var re=V.exports;const ae=ee(re);let X=document.querySelectorAll('[data-clipboard-action="copy"]');for(var B=0;B<X.length;B++){let j=null;var ie=new ae(X[B],{target:function(_){return j=_.parentElement.parentElement.parentElement.nextElementSibling.querySelector(".hidden"),j&&j.classList.remove("hidden"),_.parentElement.parentElement.parentElement.nextElementSibling.querySelector(".language-html")}});ie.on("success",function(_){var s=_.trigger.innerHTML;j&&j.classList.add("hidden");let x=_.trigger.querySelector("span");x.innerHTML="Copied",_.clearSelection(),setTimeout(function(){_.trigger.innerHTML=s},2e3)})}Prism.plugins.NormalizeWhitespace.setDefaults({"remove-trailing":!0,"remove-indent":!0,"left-trim":!0,"right-trim":!0});
