"use strict";(self.webpackChunkdandelion_pro=self.webpackChunkdandelion_pro||[]).push([[3484],{153484:(e,t,i)=>{i.r(t),i.d(t,{default:()=>f});var r=i(989526),a=i(798463),n=i(457273),s=i.n(n),o=i(664685),c=i(540754),u=i(31013),d=i(149926);const m={type:d.iK},l={type:u.V};var p=i(871952);const v=[{id:"1",name:"Cras convallis lacus orc",thumbnail:p.Z[21],desc:"Curabitur egestas consequat lorem, vel fermentum augue porta id.",ratting:4,price:30,prevPrice:0,discount:"",soldout:!1},{id:"2",name:"Vivamus sit amet interdum elit",thumbnail:p.Z[22],desc:"Maecenas nisl libero, tincidunt id odio id, feugiat vulputate quam.",ratting:0,price:15,prevPrice:150,discount:"90%",soldout:!1},{id:"3",name:"Fusce placerat enim et odio molestie sagittis",thumbnail:p.Z[23],desc:"Duis tristique metus magna, lobortis aliquam risus euismod sit amet",ratting:5,price:30,prevPrice:0,discount:"",soldout:!0},{id:"4",name:"Pellentesque ac bibendum tortor",thumbnail:p.Z[24],desc:"Nam posuere accumsan porta",ratting:2,price:80,prevPrice:100,discount:"20%",soldout:!1},{id:"5",name:"Curabitur egestas consequat lorem",thumbnail:p.Z[25],desc:"Aenean sit amet magna vel magna fringilla fermentum",ratting:5,price:50,prevPrice:0,discount:"",soldout:!1},{id:"6",name:"Aenean facilisis vitae purus facilisis semper",thumbnail:p.Z[26],desc:"Vestibulum bibendum nisi eget magna malesuada",ratting:4,price:75,prevPrice:100,discount:"25%",soldout:!1},{id:"7",name:"Aenean sit amet magna vel magna fringilla fermentum",thumbnail:p.Z[27],desc:"Nam posuere accumsan porta. Integer id orci sed ante tincidunt tincidunt sit amet sed libero.",ratting:5,price:20,prevPrice:16,discount:"20%",soldout:!1},{id:"8",name:"Ut sed eros finibus",thumbnail:p.Z[28],desc:"Curabitur egestas consequat lorem, vel fermentum augue porta id.",ratting:1,price:30,prevPrice:0,discount:"",soldout:!1},{id:"9",name:"Nulla lobortis nunc vitae nisi",thumbnail:p.Z[29],desc:"Sed mi neque, convallis at ipsum at, blandit pretium enim",ratting:4,price:50,prevPrice:100,discount:"50%",soldout:!1},{id:"10",name:"Nam posuere accumsan",thumbnail:p.Z[30],desc:"Integer id orci sed ante tincidunt tincidunt sit amet sed libero.",ratting:5,price:30,prevPrice:0,discount:"",soldout:!0},{id:"11",name:"Cras convallis lacus orc",thumbnail:p.Z[37],desc:"Curabitur egestas consequat lorem, vel fermentum augue porta id.",ratting:4,price:66,prevPrice:200,discount:"67%",soldout:!1}];var g;function b(e,t,i,r){g||(g="function"==typeof Symbol&&Symbol.for&&Symbol.for("react.element")||60103);var a=e&&e.defaultProps,n=arguments.length-3;if(t||0===n||(t={children:void 0}),1===n)t.children=r;else if(n>1){for(var s=new Array(n),o=0;o<n;o++)s[o]=arguments[o+3];t.children=s}if(t&&a)for(var c in a)void 0===t[c]&&(t[c]=a[c]);else t||(t=a||{});return{$$typeof:g,type:e,key:void 0===i?null:""+i,ref:null,props:t,_owner:null}}const f=function(){const e=(0,o.useSelector)((e=>e.ecommerce.keywordValue)),t=(0,o.useSelector)((e=>e.ecommerce.productList)),i=(0,o.useSelector)((e=>e.ecommerce.cart)),n=(0,o.useSelector)((e=>e.ecommerce.productIndex)),u=(0,o.useSelector)((e=>e.ecommerce.totalItems)),p=(0,o.useSelector)((e=>e.ecommerce.totalPrice)),g=(0,o.useSelector)((e=>e.ecommerce.notifMsg)),f=(0,o.useDispatch)(),h=(0,o.useDispatch)(),y=(0,o.useDispatch)(),P=(0,o.useDispatch)(),w=(0,o.useDispatch)(),S=(0,o.useDispatch)(),Z=(0,o.useDispatch)(),[k,q]=(0,r.useState)("grid");(0,r.useEffect)((()=>{var e;f((e=v,{type:d.VO,items:e}))}),[]);const C=s().name+" - Ecommerce",D=s().desc;return b("div",{},void 0,b(a.ql,{},void 0,b("title",{},void 0,C),b("meta",{name:"description",content:D}),b("meta",{property:"og:title",content:C}),b("meta",{property:"og:description",content:D}),b("meta",{property:"twitter:title",content:C}),b("meta",{property:"twitter:description",content:D})),b(c.P_,{close:()=>Z(l),message:g}),b(c.y1,{dataCart:i,dataProduct:t,removeItem:e=>{return P((t=e,{type:d.Y_,item:t}));var t},checkout:()=>S(m),totalItems:u,totalPrice:p,search:e=>h((e=>({type:d.F,keyword:e}))(e)),keyword:e,listView:k,handleSwitchView:(e,t)=>{q(t)}}),b(c.Li,{listView:k,dataProduct:t,showDetail:e=>{return w((t=e,{type:d.md,item:t}));var t},handleAddToCart:e=>{return y((t=e,{type:d.G2,item:t}));var t},productIndex:n,keyword:e}))}}}]);