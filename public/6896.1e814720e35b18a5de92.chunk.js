"use strict";(self.webpackChunkdandelion_pro=self.webpackChunkdandelion_pro||[]).push([[6896],{566896:(e,t,a)=>{a.r(t),a.d(t,{default:()=>W});var i,n=a(989526),o=(a(602652),a(18076)),d=a(797361),l=a(879983),u=a(483170),r=a(756699),s=a(694881),p=a(591364),c=a(659466),f=a(483838),v=a(226875),m=a(38942),y=a(551582),g=a(587536),k=a(623230),h=a(693826),S=a(680061),w=a(664685),N=a(852868),b=a.n(N),I=a(32088),M=a(104673);function O(e,t,a,n){i||(i="function"==typeof Symbol&&Symbol.for&&Symbol.for("react.element")||60103);var o=e&&e.defaultProps,d=arguments.length-3;if(t||0===d||(t={children:void 0}),1===d)t.children=n;else if(d>1){for(var l=new Array(d),u=0;u<d;u++)l[u]=arguments[u+3];t.children=l}if(t&&o)for(var r in o)void 0===t[r]&&(t[r]=o[r]);else t||(t=o||{});return{$$typeof:i,type:e,key:void 0===a?null:""+a,ref:null,props:t,_owner:null}}function F(){return F=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var i in a)Object.prototype.hasOwnProperty.call(a,i)&&(e[i]=a[i])}return e},F.apply(this,arguments)}const A=n.forwardRef((function(e,t){return n.createElement(g.default,F({direction:"up",ref:t},e))}));var U=O(r.default,{primary:O(n.Fragment,{},void 0,O(I.s1S,{})," Facebook")}),$=O(r.default,{primary:O(n.Fragment,{},void 0,O(I.mre,{})," Instagram")}),x=O(r.default,{primary:O(n.Fragment,{},void 0,O(I.yhk,{})," LinkedIn")}),C=O(r.default,{primary:O(n.Fragment,{},void 0,O(I.tLe,{})," Twitter")}),V=O(r.default,{primary:O(n.Fragment,{},void 0,O(I.tLe,{})," Medium")}),_=O(f.default,{}),L=O(r.default,{primary:""}),j=O(m.default,{type:"submit",variant:"contained",color:"primary"},void 0,"Update");function B(e){const{classes:t,open:a,handleClose:i,title:n,data:r,setter:f,id:y,setMessageBox:g,messageBox:k}=e,S=(0,w.useSelector)((e=>e.login.usersLogin)),N=(e,t)=>{g([...k,{open:!0,message:t,variant:e}])};return O(l.default,{fullScreen:!0,open:a,onClose:i,TransitionComponent:A},void 0,O(o.default,{className:t.appBar},void 0,O(u.default,{},void 0,O(v.default,{variant:"h6",color:"inherit",className:t.flex},void 0,n),O(m.default,{color:"inherit",onClick:i},void 0,"done"))),O(h.Z,{onSubmit:e=>(async e=>{e.preventDefault();const t=new FormData(e.target);t.append("cv_id",y);const a={method:"post",url:"https://profilewallet.com/api/update-details/social-media-informations",headers:{token:"$2y$10$IZpWbOiWUN.0AsOtVBs6kOSOuLSkD9UOxxdtEgtRhPniHFAaAUNw.",key:S.key,"user-id":S.user_id},data:t},n=await b()(a);(0,M.uF)(n);const o=200==n.status&&"1"==n.data.status;if(o){const e={method:"get",url:`https://profilewallet.com/api/cv-page/cv-${y}`,headers:{token:"$2y$10$IZpWbOiWUN.0AsOtVBs6kOSOuLSkD9UOxxdtEgtRhPniHFAaAUNw.",key:S.key,"user-id":S.user_id,"Content-Type":"application/json"},data:{}},t=await b()(e);(0,M.uF)(t),200==t.status&&"1"==t.data.status&&(f(t.data.data.social_media),N("success","Social Media Accounts Updated")),i()}o||N("warning","Social Media Accounts Not Updated")})(e)},void 0,O("div",{className:t.detailWrap},void 0,O(d.default,{container:!0,justifyContent:"center"},void 0,O(d.default,{item:!0,md:8,xs:12},void 0,O(p.default,{},void 0,O(s.default,{},void 0,U,O(c.default,{className:t.inputSide},void 0,O("input",{className:"MuiInput-root MuiInput-input",name:"facebook",defaultValue:null==(null===r||void 0===r?void 0:r.facebook)?"":null===r||void 0===r?void 0:r.facebook}))),O(s.default,{},void 0,$,O(c.default,{className:t.inputSide},void 0,O("input",{className:"MuiInput-root MuiInput-input",name:"instagram",defaultValue:null==(null===r||void 0===r?void 0:r.instagram)?"":null===r||void 0===r?void 0:r.instagram}))),O(s.default,{},void 0,x,O(c.default,{className:t.inputSide},void 0,O("input",{className:"MuiInput-root MuiInput-input",name:"linkedin",defaultValue:null==(null===r||void 0===r?void 0:r.linkedin)?"":null===r||void 0===r?void 0:r.linkedin}))),O(s.default,{},void 0,C,O(c.default,{className:t.inputSide},void 0,O("input",{className:"MuiInput-root MuiInput-input",name:"twitter",defaultValue:null==(null===r||void 0===r?void 0:r.twitter)?"":null===r||void 0===r?void 0:r.twitter}))),O(s.default,{},void 0,V,O(c.default,{className:t.inputSide},void 0,O("input",{className:"MuiInput-root MuiInput-input",name:"medium",defaultValue:null==(null===r||void 0===r?void 0:r.medium)?"":null===r||void 0===r?void 0:r.medium}))),_,O(s.default,{style:{marginTop:5}},void 0,L,O(c.default,{className:t.inputSide},void 0,j))))))))}B=(0,S.Z)({form:"detailSettings"})(B);const W=(0,y.withStyles)(k.Z)(B)}}]);