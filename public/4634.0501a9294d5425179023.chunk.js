"use strict";(self.webpackChunkdandelion_pro=self.webpackChunkdandelion_pro||[]).push([[4634],{284634:(e,t,o)=>{o.r(t),o.d(t,{default:()=>b});var a,i=o(989526),n=(o(602652),o(551582)),s=o(798463),l=o(797361),r=o(540754),d=o(226875),c=o(33339),p=o(341171),u=o(510294),f=o(38942),m=o(42207),v=o(852868),y=o.n(v),h=o(664685),g=o(596532),w=o.n(g),k=o(325499),S=o(403850),N=o(104673);function C(e,t,o,i){a||(a="function"==typeof Symbol&&Symbol.for&&Symbol.for("react.element")||60103);var n=e&&e.defaultProps,s=arguments.length-3;if(t||0===s||(t={children:void 0}),1===s)t.children=i;else if(s>1){for(var l=new Array(s),r=0;r<s;r++)l[r]=arguments[r+3];t.children=l}if(t&&n)for(var d in n)void 0===t[d]&&(t[d]=n[d]);else t||(t=n||{});return{$$typeof:a,type:e,key:void 0===o?null:""+o,ref:null,props:t,_owner:null}}const b=(0,n.withStyles)(m.Z)((function(e){const{log:t,error:o}=console,[a,n]=(0,i.useState)([]),[m,v]=(0,i.useState)(""),g=(0,h.useSelector)((e=>e.login.usersLogin)),b="My CVs",_="List, edit, delete, and create your CVs.",{classes:A}=e,L={method:"get",url:"https://profilewallet.com/api/cv-page",headers:{token:"$2y$10$IZpWbOiWUN.0AsOtVBs6kOSOuLSkD9UOxxdtEgtRhPniHFAaAUNw.",key:g.key,"user-id":g.user_id,"Content-Type":"application/json"},data:{}};(0,i.useEffect)((async()=>{const e=await y()(L);(0,N.uF)(e),200==e.status&&"1"==e.data.status&&n(e.data.data),200==e.status&&"1"==e.data.status&&v(e.data.file_path),console.log(e)}),[]);const O=(0,k.k6)();return C("div",{},void 0,C(s.ql,{},void 0,C("title",{},void 0,b),C("meta",{name:"description",content:_}),C("meta",{property:"og:title",content:b}),C("meta",{property:"og:description",content:_}),C("meta",{property:"twitter:title",content:b}),C("meta",{property:"twitter:description",content:_})),C(S.Container,{spacing:3},void 0,C(l.default,{},void 0,C(r.gk,{title:b,whiteBg:!0,icon:"ion-ios-browsers-outline",desc:_},void 0,C("div",{},void 0,a.map(((e,t)=>C("div",{},t.toString(),C(c.default,{className:A.newsList},void 0,C(u.default,{className:A.newsListContent},void 0,C(d.default,{noWrap:!0,gutterBottom:!0,variant:"h5",className:A.title,component:"h2"},void 0,e.name),C(d.default,{component:"p",className:A.desc},void 0,e.description),C("div",{className:A.actionArea},void 0,C(f.default,{onClick:()=>O.push("/panel"+w().cv_detail+e.id+" "+e.name),size:"small",color:"primary"},void 0,"Details"))),C(p.default,{className:A.mediaNews,image:"https://profilewallet.com"+m+e.file,title:e.name}))))))))))}))}}]);