!function(r){r.md5=function(r){function n(r,n){return r<<n|r>>>32-n}function t(r,n){var t,o,e,u,f;return e=2147483648&r,u=2147483648&n,t=1073741824&r,o=1073741824&n,f=(1073741823&r)+(1073741823&n),t&o?2147483648^f^e^u:t|o?1073741824&f?3221225472^f^e^u:1073741824^f^e^u:f^e^u}function o(r,n,t){return r&n|~r&t}function e(r,n,t){return r&t|n&~t}function u(r,n,t){return r^n^t}function f(r,n,t){return n^(r|~t)}function i(r,e,u,f,i,a,c){return r=t(r,t(t(o(e,u,f),i),c)),t(n(r,a),e)}function a(r,o,u,f,i,a,c){return r=t(r,t(t(e(o,u,f),i),c)),t(n(r,a),o)}function c(r,o,e,f,i,a,c){return r=t(r,t(t(u(o,e,f),i),c)),t(n(r,a),o)}function C(r,o,e,u,i,a,c){return r=t(r,t(t(f(o,e,u),i),c)),t(n(r,a),o)}function g(r){for(var n,t=r.length,o=t+8,e=(o-o%64)/64,u=16*(e+1),f=Array(u-1),i=0,a=0;t>a;)n=(a-a%4)/4,i=a%4*8,f[n]=f[n]|r.charCodeAt(a)<<i,a++;return n=(a-a%4)/4,i=a%4*8,f[n]=f[n]|128<<i,f[u-2]=t<<3,f[u-1]=t>>>29,f}function h(r){var n,t,o="",e="";for(t=0;3>=t;t++)n=r>>>8*t&255,e="0"+n.toString(16),o+=e.substr(e.length-2,2);return o}function d(r){r=r.replace(/\r\n/g,"\n");for(var n="",t=0;t<r.length;t++){var o=r.charCodeAt(t);128>o?n+=String.fromCharCode(o):o>127&&2048>o?(n+=String.fromCharCode(o>>6|192),n+=String.fromCharCode(63&o|128)):(n+=String.fromCharCode(o>>12|224),n+=String.fromCharCode(o>>6&63|128),n+=String.fromCharCode(63&o|128))}return n}var m,v,S,l,A,s,y,b,j,p=Array(),w=7,L=12,Q=17,k=22,q=5,x=9,z=14,B=20,D=4,E=11,F=16,G=23,H=6,I=10,J=15,K=21;for(r=d(r),p=g(r),s=1732584193,y=4023233417,b=2562383102,j=271733878,m=0;m<p.length;m+=16)v=s,S=y,l=b,A=j,s=i(s,y,b,j,p[m+0],w,3614090360),j=i(j,s,y,b,p[m+1],L,3905402710),b=i(b,j,s,y,p[m+2],Q,606105819),y=i(y,b,j,s,p[m+3],k,3250441966),s=i(s,y,b,j,p[m+4],w,4118548399),j=i(j,s,y,b,p[m+5],L,1200080426),b=i(b,j,s,y,p[m+6],Q,2821735955),y=i(y,b,j,s,p[m+7],k,4249261313),s=i(s,y,b,j,p[m+8],w,1770035416),j=i(j,s,y,b,p[m+9],L,2336552879),b=i(b,j,s,y,p[m+10],Q,4294925233),y=i(y,b,j,s,p[m+11],k,2304563134),s=i(s,y,b,j,p[m+12],w,1804603682),j=i(j,s,y,b,p[m+13],L,4254626195),b=i(b,j,s,y,p[m+14],Q,2792965006),y=i(y,b,j,s,p[m+15],k,1236535329),s=a(s,y,b,j,p[m+1],q,4129170786),j=a(j,s,y,b,p[m+6],x,3225465664),b=a(b,j,s,y,p[m+11],z,643717713),y=a(y,b,j,s,p[m+0],B,3921069994),s=a(s,y,b,j,p[m+5],q,3593408605),j=a(j,s,y,b,p[m+10],x,38016083),b=a(b,j,s,y,p[m+15],z,3634488961),y=a(y,b,j,s,p[m+4],B,3889429448),s=a(s,y,b,j,p[m+9],q,568446438),j=a(j,s,y,b,p[m+14],x,3275163606),b=a(b,j,s,y,p[m+3],z,4107603335),y=a(y,b,j,s,p[m+8],B,1163531501),s=a(s,y,b,j,p[m+13],q,2850285829),j=a(j,s,y,b,p[m+2],x,4243563512),b=a(b,j,s,y,p[m+7],z,1735328473),y=a(y,b,j,s,p[m+12],B,2368359562),s=c(s,y,b,j,p[m+5],D,4294588738),j=c(j,s,y,b,p[m+8],E,2272392833),b=c(b,j,s,y,p[m+11],F,1839030562),y=c(y,b,j,s,p[m+14],G,4259657740),s=c(s,y,b,j,p[m+1],D,2763975236),j=c(j,s,y,b,p[m+4],E,1272893353),b=c(b,j,s,y,p[m+7],F,4139469664),y=c(y,b,j,s,p[m+10],G,3200236656),s=c(s,y,b,j,p[m+13],D,681279174),j=c(j,s,y,b,p[m+0],E,3936430074),b=c(b,j,s,y,p[m+3],F,3572445317),y=c(y,b,j,s,p[m+6],G,76029189),s=c(s,y,b,j,p[m+9],D,3654602809),j=c(j,s,y,b,p[m+12],E,3873151461),b=c(b,j,s,y,p[m+15],F,530742520),y=c(y,b,j,s,p[m+2],G,3299628645),s=C(s,y,b,j,p[m+0],H,4096336452),j=C(j,s,y,b,p[m+7],I,1126891415),b=C(b,j,s,y,p[m+14],J,2878612391),y=C(y,b,j,s,p[m+5],K,4237533241),s=C(s,y,b,j,p[m+12],H,1700485571),j=C(j,s,y,b,p[m+3],I,2399980690),b=C(b,j,s,y,p[m+10],J,4293915773),y=C(y,b,j,s,p[m+1],K,2240044497),s=C(s,y,b,j,p[m+8],H,1873313359),j=C(j,s,y,b,p[m+15],I,4264355552),b=C(b,j,s,y,p[m+6],J,2734768916),y=C(y,b,j,s,p[m+13],K,1309151649),s=C(s,y,b,j,p[m+4],H,4149444226),j=C(j,s,y,b,p[m+11],I,3174756917),b=C(b,j,s,y,p[m+2],J,718787259),y=C(y,b,j,s,p[m+9],K,3951481745),s=t(s,v),y=t(y,S),b=t(b,l),j=t(j,A);var M=h(s)+h(y)+h(b)+h(j);return M.toLowerCase()}}(jQuery);