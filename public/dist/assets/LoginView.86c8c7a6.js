import{r as y,a as w,u as V,o as u,c as _,b as t,w as x,d as i,v as d,e as o,p as f,f as v,t as $,g as I,h as k,F as U,i as h}from"./index.8b45bf7a.js";import{a as S}from"./index.36a7d396.js";import{m as F}from"./mainStorage.ec5336a9.js";import{_ as g}from"./_plugin-vue_export-helper.cdc0426e.js";let L="http://localhost:8190/api/login";class E{static loginAPI(e){return S.post(L,e)}}const R=a=>(f("data-v-38e8da8a"),a=a(),v(),a),A={class:"tab-pane fade show active",id:"pills-home",role:"tabpanel","aria-labelledby":"pills-home-tab"},M={class:"form px-4 pt-5"},C=["onSubmit"],N=R(()=>t("button",{type:"submit",class:"btn btn-dark btn-block"}," Login ",-1)),P={__name:"FormLogin",setup(a){let e=y({email:"",password:""}),r=w(null),n=F(),p=V();async function l(){r.value=null,!e.email&&!e.password&&alert("Escolha o tipo de usu\xE1rio!"),e.password||alert("A senha e a confirma\xE7\xE3o de senha devem ser iguais!");try{let s=await E.loginAPI(e);s.data.success?(n.token=s.data.data.token,n.user_name=s.data.data.name,n.user_type=s.data.data.type,n.user_id=s.data.data.user,p.push("/app")):r.value="Usu\xE1rio ou senha est\xE3o incorretos!"}catch(s){r.value=s}}return(s,c)=>(u(),_("div",A,[t("div",M,[t("form",{onSubmit:x(l,["prevent"])},[i(t("input",{type:"text",class:"form-control",placeholder:"Email","onUpdate:modelValue":c[0]||(c[0]=b=>o(e).email=b)},null,512),[[d,o(e).email]]),i(t("input",{type:"password",class:"form-control",placeholder:"Senha","onUpdate:modelValue":c[1]||(c[1]=b=>o(e).password=b)},null,512),[[d,o(e).password]]),N],40,C)])]))}},B=g(P,[["__scopeId","data-v-38e8da8a"]]);let D="http://localhost:8190/api/registrar";class T{static registerAPI(e){return S.post(D,e)}}const m=a=>(f("data-v-804e545e"),a=a(),v(),a),j={key:0},O={class:"text-danger"},q={class:"tab-pane fade",id:"pills-profile",role:"tabpanel","aria-labelledby":"pills-profile-tab"},z={class:"form px-4"},G=["onSubmit"],H=m(()=>t("option",{selected:"",disabled:"",value:"0"},"Escolha o Tipo",-1)),J=m(()=>t("option",{value:"1"},"Comprador",-1)),K=m(()=>t("option",{value:"2"},"Fornecedor",-1)),Q=[H,J,K],W=m(()=>t("button",{type:"submit",class:"btn btn-dark btn-block"}," Registrar ",-1)),X={__name:"FormRegistro",setup(a){let e=y({name:"",email:"",type:0,password:"",c_password:""}),r=w(null);async function n(){r.value=null,e.type||alert("Escolha o tipo de usu\xE1rio!"),e.password!==e.c_password&&alert("A senha e a confirma\xE7\xE3o de senha devem ser iguais!");try{(await T.registerAPI(e)).data.success?alert("Usu\xE1rio registrado com sucesso! Efetua o login!"):alert("Ocorreu um erro no registro, tente novamente!")}catch(p){r.value=p}}return(p,l)=>(u(),_(U,null,[o(r)?(u(),_("div",j,[t("p",O,$(o(r)),1)])):I("",!0),t("div",q,[t("div",z,[t("form",{onSubmit:x(n,["prevent"])},[i(t("input",{type:"text",class:"form-control",placeholder:"Nome","onUpdate:modelValue":l[0]||(l[0]=s=>o(e).name=s)},null,512),[[d,o(e).name]]),i(t("input",{type:"text",class:"form-control",placeholder:"Email","onUpdate:modelValue":l[1]||(l[1]=s=>o(e).email=s)},null,512),[[d,o(e).email]]),i(t("select",{class:"form-select","onUpdate:modelValue":l[2]||(l[2]=s=>o(e).type=s)},Q,512),[[k,o(e).type]]),i(t("input",{type:"password",class:"form-control",placeholder:"Senha","onUpdate:modelValue":l[3]||(l[3]=s=>o(e).password=s)},null,512),[[d,o(e).password]]),i(t("input",{type:"password",class:"form-control",placeholder:"Confirmar Senha","onUpdate:modelValue":l[4]||(l[4]=s=>o(e).c_password=s)},null,512),[[d,o(e).c_password]]),W],40,G)])])],64))}},Y=g(X,[["__scopeId","data-v-804e545e"]]);const Z=a=>(f("data-v-33eaf91e"),a=a(),v(),a),ee={class:"d-flex justify-content-center align-items-center mt-5"},te={class:"card"},se=Z(()=>t("ul",{class:"nav nav-pills mb-3",id:"pills-tab",role:"tablist"},[t("li",{class:"nav-item text-center"},[t("a",{class:"nav-link active btl",id:"pills-home-tab","data-bs-toggle":"tab","data-bs-target":"#pills-home",type:"button",role:"tab","aria-controls":"pills-home","aria-selected":"true"},"Login")]),t("li",{class:"nav-item text-center"},[t("a",{class:"nav-link btr",id:"pills-profile-tab","data-bs-toggle":"tab","data-bs-target":"#pills-profile",type:"button",role:"tab","aria-controls":"pills-profile","aria-selected":"true"},"Registrar")])],-1)),ae={class:"tab-content",id:"pills-tabContent"},oe={__name:"LoginView",setup(a){return(e,r)=>(u(),_("main",null,[t("div",ee,[t("div",te,[se,t("div",ae,[h(B),h(Y)])])])]))}},de=g(oe,[["__scopeId","data-v-33eaf91e"]]);export{de as default};
