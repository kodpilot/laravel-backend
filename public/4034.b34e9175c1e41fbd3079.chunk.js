"use strict";(self.webpackChunkdandelion_pro=self.webpackChunkdandelion_pro||[]).push([[4034],{434034:(e,t,i)=>{i.r(t),i.d(t,{default:()=>j});var a,l=i(989526),o=(i(602652),i(18076)),n=i(797361),d=i(879983),r=i(483170),s=i(756699),u=i(694881),p=i(591364),m=i(659466),c=i(483838),v=i(226875),f=i(38942),b=i(551582),h=i(587536),x=i(623230),y=i(403850),k=i(693826),g=i(680061),I=i(664685),L=i(852868),M=i.n(L),S=i(32088),w=i(540754),N=i(104673);function O(e,t,i,l){a||(a="function"==typeof Symbol&&Symbol.for&&Symbol.for("react.element")||60103);var o=e&&e.defaultProps,n=arguments.length-3;if(t||0===n||(t={children:void 0}),1===n)t.children=l;else if(n>1){for(var d=new Array(n),r=0;r<n;r++)d[r]=arguments[r+3];t.children=d}if(t&&o)for(var s in o)void 0===t[s]&&(t[s]=o[s]);else t||(t=o||{});return{$$typeof:a,type:e,key:void 0===i?null:""+i,ref:null,props:t,_owner:null}}function C(){return C=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var i=arguments[t];for(var a in i)Object.prototype.hasOwnProperty.call(i,a)&&(e[a]=i[a])}return e},C.apply(this,arguments)}const A=l.forwardRef((function(e,t){return l.createElement(h.default,C({direction:"up",ref:t},e))}));var F=O(S.x8P,{}),$=O(S.I8b,{}),U=O("label",{className:"MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink"},void 0,"Skill Name"),W=O("label",{className:"MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink"},void 0,"Skill Description"),D=O("label",{className:"MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink"},void 0,"Experience"),E=O(f.default,{type:"submit",variant:"contained",color:"primary"},void 0,"Update"),V=O(c.default,{}),_=O("label",{className:"MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink"},void 0,"Skill Name"),B=O("label",{className:"MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink"},void 0,"Skill Description"),P=O("label",{className:"MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink"},void 0,"Experience"),Z=O(f.default,{type:"submit",variant:"contained",color:"primary"},void 0,"Add");function R(e){const{classes:t,open:i,handleClose:a,title:c,data:b,setter:h,id:x,setMessageBox:g,messageBox:L}=e,S=(0,I.useSelector)((e=>e.login.usersLogin)),[C,R]=(0,l.useState)({name:"",value:0,experience:"",description:"",file:""}),[j,H]=(0,l.useState)([]);(0,l.useEffect)((()=>{var e;let t=null===(e=b.data)||void 0===e?void 0:e.map((e=>({...e,open:!1})));H(t)}),[b]);const G=(e,t)=>{g([...L,{open:!0,message:t,variant:e}])};(0,l.useEffect)((()=>{console.log(j)}),[j]);return O(d.default,{fullScreen:!0,open:i,onClose:a,TransitionComponent:A},void 0,O(o.default,{className:t.appBar},void 0,O(r.default,{},void 0,O(v.default,{variant:"h6",color:"inherit",className:t.flex},void 0,c),O(f.default,{color:"inherit",onClick:a},void 0,"done"))),O("div",{className:t.detailWrap},void 0,O(n.default,{container:!0,justifyContent:"center"},void 0,O(n.default,{item:!0,md:8,xs:12},void 0,O(p.default,{},void 0,null===j||void 0===j?void 0:j.map(((e,t)=>O("div",{},t,O(u.default,{},void 0,O(s.default,{primary:null===e||void 0===e?void 0:e.name}),O(m.default,{style:{display:"flex"}},void 0,O(w.iG,{value:void 0==(null===e||void 0===e?void 0:e.score)?0:1*(null===e||void 0===e?void 0:e.score),readOnly:!0,max:5}),O(f.default,{onClick:()=>{H(null===j||void 0===j?void 0:j.map((t=>(t.id==(null===e||void 0===e?void 0:e.id)&&(t.open=!t.open),t))))}},void 0,null!==e&&void 0!==e&&e.open?F:$))),O(y.Collapse,{in:null===e||void 0===e?void 0:e.open},void 0,O(k.Z,{"data-id":null===e||void 0===e?void 0:e.id,onSubmit:e=>(async e=>{var t;e.preventDefault();const i=new FormData(e.target);i.append("cv_id",x),i.append("skill_id",e.target.dataset.id);let a=null===(t=j.filter((t=>t.id==e.target.dataset.id))[0])||void 0===t?void 0:t.score;for(var l of(console.log(a),i.append("score",a),i.entries()))console.log(l[0]+", "+l[1]);const o={method:"post",url:"https://profilewallet.com/api/update-details/skills-informations",headers:{token:"$2y$10$IZpWbOiWUN.0AsOtVBs6kOSOuLSkD9UOxxdtEgtRhPniHFAaAUNw.",key:S.key,"user-id":S.user_id,"Content-Type":"multipart/form-data",Accept:"application/json"},data:i},n=await M()(o);(0,N.uF)(n);const d=200==n.status&&"1"==n.data.status;if(console.log(n.data),d){const e={method:"get",url:`https://profilewallet.com/api/cv-page/cv-${x}`,headers:{token:"$2y$10$IZpWbOiWUN.0AsOtVBs6kOSOuLSkD9UOxxdtEgtRhPniHFAaAUNw.",key:S.key,"user-id":S.user_id,"Content-Type":"multipart/form-data"},data:{}},t=await M()(e);(0,N.uF)(t),200==t.status&&"1"==t.data.status&&(h(t.data.data.skills),G("success","Skills Informations Updated"))}d||G("warning","Skills Informations Not Updated")})(e)},void 0,O(n.default,{container:!0},void 0,O(n.default,{style:{padding:"0px 10px"},item:!0,md:6,xs:12},void 0,U,O(y.Input,{id:"standard-full-width",label:"Skill Name",style:{margin:8},placeholder:"Skill Name",defaultValue:null===e||void 0===e?void 0:e.name,name:"name",fullWidth:!0,inputlabelprops:{shrink:!0}})),O(n.default,{style:{padding:"0px 10px"},item:!0,md:6,xs:12},void 0,W,O(y.Input,{id:"standard-full-width",label:"Description",style:{margin:8},placeholder:"Skill Description",defaultValue:null===e||void 0===e?void 0:e.description,name:"description",fullWidth:!0,inputlabelprops:{shrink:!0},inputProps:{style:{padding:"12px 10px !important"}}})),O(n.default,{style:{padding:"0px 10px"},item:!0,md:6,xs:12},void 0,D,O(y.Input,{id:"standard-full-width",label:"Experience",style:{margin:8},placeholder:"Experience",defaultValue:null===e||void 0===e?void 0:e.experience,name:"experience",fullWidth:!0,inputlabelprops:{shrink:!0}})),O(n.default,{style:{padding:"0px 10px"},item:!0,md:6,xs:12},void 0,O("div",{style:{margin:8}},void 0,O("label",{style:{position:"relative"},className:"MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink"},void 0,"Rating"),O(w.iG,{value:void 0==(null===e||void 0===e?void 0:e.score)?0:1*(null===e||void 0===e?void 0:e.score),onChange:t=>{H(null===j||void 0===j?void 0:j.map((i=>(i.id==(null===e||void 0===e?void 0:e.id)&&(i.score=t,console.log(i)),i))))},max:5}))),O(n.default,{item:!0,md:12,xs:12,style:{textAlign:"end",marginBottom:10}},void 0,E)))),V)))),O(n.default,{},void 0,O(k.Z,{onSubmit:e=>(async e=>{e.preventDefault();const t=new FormData(e.target);t.append("cv_id",x),t.append("score",C.value);const i={method:"post",url:"https://profilewallet.com/api/add-details/skills-informations",headers:{token:"$2y$10$IZpWbOiWUN.0AsOtVBs6kOSOuLSkD9UOxxdtEgtRhPniHFAaAUNw.",key:S.key,"user-id":S.user_id,"content-type":"multipart/form-data"},data:t},a=await M()(i),l=200==a.status&&"1"==a.data.status;if(l){const e={method:"get",url:`https://profilewallet.com/api/cv-page/cv-${x}`,headers:{token:"$2y$10$IZpWbOiWUN.0AsOtVBs6kOSOuLSkD9UOxxdtEgtRhPniHFAaAUNw.",key:S.key,"user-id":S.user_id},data:{}},t=await M()(e);200==t.status&&"1"==t.data.status&&(h(t.data.data.skills),G("success","Contact Informations Added")),R({name:"",value:0,experience:"",description:""})}l||G("warning","Contact Informations Not Added")})(e)},void 0,O(n.default,{container:!0},void 0,O(n.default,{style:{padding:"0px 10px"},item:!0,md:6,xs:12},void 0,_,O(y.Input,{id:"standard-full-width",label:"Skill Name",style:{margin:8},placeholder:"Skill Name",defaultValue:null===C||void 0===C?void 0:C.name,name:"name",fullWidth:!0,inputlabelprops:{shrink:!0}})),O(n.default,{style:{padding:"0px 10px"},item:!0,md:6,xs:12},void 0,B,O(y.Input,{id:"standard-full-width",label:"Description",style:{margin:8},placeholder:"Skill Description",defaultValue:null===C||void 0===C?void 0:C.description,name:"description",fullWidth:!0,inputlabelprops:{shrink:!0},inputProps:{style:{padding:"12px 10px !important"}}})),O(n.default,{style:{padding:"0px 10px"},item:!0,md:6,xs:12},void 0,P,O(y.Input,{id:"standard-full-width",label:"Experience",style:{margin:8},placeholder:"Experience",defaultValue:null===C||void 0===C?void 0:C.experience,name:"experience",fullWidth:!0,inputlabelprops:{shrink:!0}})),O(n.default,{style:{padding:"0px 10px"},item:!0,md:6,xs:12},void 0,O("div",{style:{margin:8}},void 0,O("label",{style:{position:"relative"},className:"MuiFormLabel-root MuiInputLabel-root MuiInputLabel-formControl MuiInputLabel-animated MuiInputLabel-shrink"},void 0,"Rating"),O(w.iG,{name:"score",value:C.value,onChange:e=>R({...C,value:e}),max:5}))),O(n.default,{item:!0,md:12,xs:12,style:{textAlign:"end",marginBottom:10}},void 0,Z))))))))}R=(0,g.Z)({form:"skills"})(R);const j=(0,b.withStyles)(x.Z)(R)}}]);