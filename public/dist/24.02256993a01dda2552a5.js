(window.webpackJsonp=window.webpackJsonp||[]).push([[24],{BdRF:function(t,e,r){"use strict";r.r(e);var o=r("e7F3"),a=r("TJPC"),s=r("enAU");Object(o.c)("required",a.h),Object(o.c)("email",a.b),Object(o.c)("min",a.e),Object(o.c)("confirmed",a.a),Object(o.d)("id",s);var i={components:{ValidationObserver:o.a,ValidationProvider:o.b},props:{actionForm:{type:String,required:!0},token:{type:String,required:!0}},data:function(){return{form_data:{email:"",password:"",password_confirmation:""},show_password:!1,field_state:!1,form_alert_state:!1,form_alert_color:"",form_alert_text:""}},methods:{clearForm:function(){this.form_data={email:"",password:"",password_confirmation:""},this.$refs.observer.reset()},submitForm:function(){var t=this;this.$refs.observer.validate().then((function(e){e&&(t.field_state=!0,t.postFormData())}))},postFormData:function(){var t=this,e=new FormData(this.$refs["post-form"]);e.append("token",this.token),axios.post(this.actionForm,e).then((function(e){e.data.success?(t.form_alert_state=!0,t.form_alert_color="success",t.form_alert_text=e.data.message,setTimeout((function(){t.goto(e.data.data)}),2500)):(t.field_state=!1,t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=e.data.message)})).catch((function(e){t.field_state=!1,t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text="Oops, something went wrong. Please try again later."}))}}},n=r("KHd+"),c=Object(n.a)(i,void 0,void 0,!1,null,null,null);e.default=c.exports}}]);