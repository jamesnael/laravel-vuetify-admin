(window.webpackJsonp=window.webpackJsonp||[]).push([[23],{h2XC:function(e,t,a){"use strict";a.r(t);var o=a("e7F3"),r=a("TJPC"),s=a("enAU");Object(o.c)("required",r.h),Object(o.c)("email",r.b),Object(o.d)("id",s);var n={components:{ValidationObserver:o.a,ValidationProvider:o.b},props:{actionForm:{type:String,required:!0}},data:function(){return{form_data:{username:"",password:"",selected:!1},show_password:!1,field_state:!1,form_alert_state:!1,form_alert_color:"",form_alert_text:""}},mounted:function(){"username"in window.localStorage&&(this.form_data.username=window.localStorage.getItem("username"),this.form_data.selected=!0),"password"in window.localStorage&&(this.form_data.password=window.localStorage.getItem("password"))},methods:{clearForm:function(){this.form_data={username:"",password:"",selected:!1},this.$refs.observer.reset()},submitForm:function(){var e=this;this.$refs.observer.validate().then((function(t){t&&(e.field_state=!0,e.postFormData())}))},postFormData:function(){var e=this,t=new FormData(this.$refs["post-form"]);axios.post(this.actionForm,t).then((function(t){t.data.success?(e.form_alert_state=!0,e.form_alert_color="success",e.form_alert_text=t.data.message,e.form_data.selected?(window.localStorage.setItem("username",e.form_data.username),window.localStorage.setItem("password",e.form_data.password)):(window.localStorage.removeItem("username"),window.localStorage.removeItem("password")),setTimeout((function(){e.goto(t.data.data)}),2500)):(e.field_state=!1,e.form_alert_state=!0,e.form_alert_color="error",e.form_alert_text=t.data.message)})).catch((function(t){e.field_state=!1,e.form_alert_state=!0,e.form_alert_color="error",e.form_alert_text="Oops, something went wrong. Please try again later."}))}}},i=a("KHd+"),d=Object(i.a)(n,void 0,void 0,!1,null,null,null);t.default=d.exports}}]);