(window.webpackJsonp=window.webpackJsonp||[]).push([[10],{"4y91":function(t,a,e){"use strict";e.r(a);var r=e("e7F3"),i=e("TJPC"),o=e("enAU");Object(r.c)("required",i.h),Object(r.c)("email",i.b),Object(r.c)("numeric",i.f),Object(r.c)("min",i.e),Object(r.c)("max",i.d),Object(r.c)("regex",i.g),Object(r.c)("confirmed",i.a),Object(r.d)("id",o);var s={components:{ValidationObserver:r.a,ValidationProvider:r.b},props:{actionForm:{type:String,required:!0},redirectUri:{type:String,required:!0},dataUri:{type:String,default:""},filterTipeUnit:{type:Array,default:function(){return[]}}},data:function(){return{show_maps:!0,form_data:{status:"",tipe_unit_id:"",aktivitas:[]},field_state:!1,form_alert_state:!1,form_alert_color:"",form_alert_text:""}},mounted:function(){this.getFormData(),this.addAktivitas()},methods:{getFormData:function(){var t=this;this.dataUri&&(this.show_maps=!1,this.field_state=!0,axios.get(this.dataUri).then((function(a){if(a.data.success){var e=a.data.data;t.form_data={status:e.status,tipe_unit_id:e.tipe_unit_id,aktivitas:e.aktivitas},t.field_state=!1}else t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=a.data.message,t.field_state=!1;t.show_maps=!0})).catch((function(a){t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=response.data.message,t.field_state=!1,t.show_maps=!0})))},clearForm:function(){this.form_data={status:"",tipe_unit_id:"",aktivitas:[]},this.$refs.observer.reset()},submitForm:function(){var t=this;this.$refs.observer.validate().then((function(a){a&&(t.field_state=!0,t.postFormData())}))},postFormData:function(){var t=this,a=new FormData(this.$refs["post-form"]);this.dataUri&&a.append("_method","put"),axios.post(this.actionForm,a).then((function(a){a.data.success?(t.form_alert_state=!0,t.form_alert_color="success",t.form_alert_text=a.data.message,setTimeout((function(){t.goto(t.redirectUri)}),2500)):(t.field_state=!1,t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=a.data.message)})).catch((function(a){t.field_state=!1,t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text="Oops, something went wrong. Please try again later."}))},addAktivitas:function(){this.form_data.aktivitas.push(this.aktivitas)},removeAktivitas:function(t){this.form_data.aktivitas=_.filter(this.form_data.aktivitas,(function(a,e){return e!=t}))}}},n=(e("VtUy"),e("KHd+")),f=Object(n.a)(s,void 0,void 0,!1,null,null,null);a.default=f.exports},VtUy:function(t,a,e){"use strict";var r=e("uNw3");e.n(r).a},uNw3:function(t,a,e){var r=e("vAfI");"string"==typeof r&&(r=[[t.i,r,""]]);var i={hmr:!0,transform:void 0,insertInto:void 0};e("aET+")(r,i);r.locals&&(t.exports=r.locals)},vAfI:function(t,a,e){(t.exports=e("I1BE")(!1)).push([t.i,"#view-map{min-height:400px;height:100%}",""])}}]);