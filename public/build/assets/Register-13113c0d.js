import{T as c,o as f,e as w,w as n,a as o,u as s,Z as _,b as l,h as d,i as g,n as V,j as b}from"./app-64ba6da4.js";import{_ as v}from"./GuestLayout-472cca2a.js";import{_ as t,a as m,b as i}from"./TextInput-a2bda275.js";import{P as y}from"./PrimaryButton-4c796c7c.js";import"./ApplicationLogo-b4c55337.js";import"./_plugin-vue_export-helper-c27b6911.js";const x=["onSubmit"],k={class:"mt-4"},h={class:"mt-4"},q={class:"mt-4"},B={class:"flex items-center justify-end mt-4"},S={__name:"Register",setup(N){const e=c({name:"",email:"",password:"",password_confirmation:""}),u=()=>{e.post(route("register"),{onFinish:()=>e.reset("password","password_confirmation")})};return(p,a)=>(f(),w(v,null,{default:n(()=>[o(s(_),{title:"Register"}),l("form",{onSubmit:b(u,["prevent"])},[l("div",null,[o(t,{for:"name",value:"Name"}),o(m,{id:"name",type:"text",class:"mt-1 block w-full",modelValue:s(e).name,"onUpdate:modelValue":a[0]||(a[0]=r=>s(e).name=r),required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),o(i,{class:"mt-2",message:s(e).errors.name},null,8,["message"])]),l("div",k,[o(t,{for:"email",value:"Email"}),o(m,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:s(e).email,"onUpdate:modelValue":a[1]||(a[1]=r=>s(e).email=r),required:"",autocomplete:"username"},null,8,["modelValue"]),o(i,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),l("div",h,[o(t,{for:"password",value:"Password"}),o(m,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:s(e).password,"onUpdate:modelValue":a[2]||(a[2]=r=>s(e).password=r),required:"",autocomplete:"new-password"},null,8,["modelValue"]),o(i,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),l("div",q,[o(t,{for:"password_confirmation",value:"Confirm Password"}),o(m,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:s(e).password_confirmation,"onUpdate:modelValue":a[3]||(a[3]=r=>s(e).password_confirmation=r),required:"",autocomplete:"new-password"},null,8,["modelValue"]),o(i,{class:"mt-2",message:s(e).errors.password_confirmation},null,8,["message"])]),l("div",B,[o(s(g),{href:p.route("login"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:n(()=>[d(" Already registered? ")]),_:1},8,["href"]),o(y,{class:V(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:n(()=>[d(" Register ")]),_:1},8,["class","disabled"])])],40,x)]),_:1}))}};export{S as default};
