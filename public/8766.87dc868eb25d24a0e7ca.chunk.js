"use strict";(self.webpackChunkdandelion_pro=self.webpackChunkdandelion_pro||[]).push([[8766],{588766:(e,t,a)=>{a.r(t),a.d(t,{default:()=>F});var i,n=a(989526),o=(a(602652),a(18076)),d=a(797361),l=a(879983),u=a(483170),s=a(756699),r=a(694881),p=a(591364),f=a(659466),c=a(483838),v=a(226875),m=a(38942),y=a(551582),h=a(587536),g=a(623230),k=a(693826),S=a(680061),w=a(664685),N=a(852868),O=a.n(N),b=a(104673);function C(e,t,a,n){i||(i="function"==typeof Symbol&&Symbol.for&&Symbol.for("react.element")||60103);var o=e&&e.defaultProps,d=arguments.length-3;if(t||0===d||(t={children:void 0}),1===d)t.children=n;else if(d>1){for(var l=new Array(d),u=0;u<d;u++)l[u]=arguments[u+3];t.children=l}if(t&&o)for(var s in o)void 0===t[s]&&(t[s]=o[s]);else t||(t=o||{});return{$$typeof:i,type:e,key:void 0===a?null:""+a,ref:null,props:t,_owner:null}}function I(){return I=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var i in a)Object.prototype.hasOwnProperty.call(a,i)&&(e[i]=a[i])}return e},I.apply(this,arguments)}const U=n.forwardRef((function(e,t){return n.createElement(h.default,I({direction:"up",ref:t},e))}));var $=C(s.default,{primary:"Address"}),x=C(s.default,{primary:"Phone"}),A=C(s.default,{primary:"Email"}),M=C(c.default,{}),_=C(s.default,{primary:""}),j=C(m.default,{type:"submit",variant:"contained",color:"primary"},void 0,"Update");function B(e){const{classes:t,open:a,handleClose:i,title:n,data:s,setter:c,id:y,setMessageBox:h,messageBox:g}=e,S=(0,w.useSelector)((e=>e.login.usersLogin)),N=(e,t)=>{h([...g,{open:!0,message:t,variant:e}])};return C(l.default,{fullScreen:!0,open:a,onClose:i,TransitionComponent:U},void 0,C(o.default,{className:t.appBar},void 0,C(u.default,{},void 0,C(v.default,{variant:"h6",color:"inherit",className:t.flex},void 0,n),C(m.default,{color:"inherit",onClick:i},void 0,"done"))),C(k.Z,{onSubmit:e=>(async e=>{e.preventDefault();const t=new FormData(e.target);t.append("cv_id",y);const a={method:"post",url:"https://profilewallet.com/api/update-details/contact-informations",headers:{token:"$2y$10$IZpWbOiWUN.0AsOtVBs6kOSOuLSkD9UOxxdtEgtRhPniHFAaAUNw.",key:S.key,"user-id":S.user_id},data:t},n=await O()(a);(0,b.uF)(n);const o=200==n.status&&"1"==n.data.status;if(o){const e={method:"get",url:`https://profilewallet.com/api/cv-page/cv-${y}`,headers:{token:"$2y$10$IZpWbOiWUN.0AsOtVBs6kOSOuLSkD9UOxxdtEgtRhPniHFAaAUNw.",key:S.key,"user-id":S.user_id,"Content-Type":"application/json"},data:{}},t=await O()(e);(0,b.uF)(t),200==t.status&&"1"==t.data.status&&(c(t.data.data.contact),N("success","Contact Informations Updated")),i()}o||N("warning","Contact Informations Not Updated")})(e)},void 0,C("div",{className:t.detailWrap},void 0,C(d.default,{container:!0,justifyContent:"center"},void 0,C(d.default,{item:!0,md:8,xs:12},void 0,C(p.default,{},void 0,C(r.default,{},void 0,$,C(f.default,{className:t.inputSide},void 0,C("input",{className:"MuiInput-root MuiInput-input",name:"address",defaultValue:null==(null===s||void 0===s?void 0:s.address)?"":null===s||void 0===s?void 0:s.address}))),C(r.default,{},void 0,x,C(f.default,{className:t.inputSide},void 0,C("input",{className:"MuiInput-root MuiInput-input",name:"phone",defaultValue:null==(null===s||void 0===s?void 0:s.phone)?"":null===s||void 0===s?void 0:s.phone}))),C(r.default,{},void 0,A,C(f.default,{className:t.inputSide},void 0,C("input",{className:"MuiInput-root MuiInput-input",name:"email",defaultValue:null==(null===s||void 0===s?void 0:s.email)?"":null===s||void 0===s?void 0:s.email}))),M,C(r.default,{style:{marginTop:5}},void 0,_,C(f.default,{className:t.inputSide},void 0,j))))))))}B=(0,S.Z)({form:"detailSettings"})(B);const F=(0,y.withStyles)(g.Z)(B)}}]);