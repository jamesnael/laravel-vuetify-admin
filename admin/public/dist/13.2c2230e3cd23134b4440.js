(window.webpackJsonp=window.webpackJsonp||[]).push([[13],{"2Q0G":function(t,e,r){"use strict";r.r(e);var a=r("e7F3"),o=r("TJPC"),i=r("enAU");Object(a.c)("required",o.g),Object(a.d)("id",i);var s={components:{ValidationObserver:a.a,ValidationProvider:a.b},props:{actionForm:{type:String,required:!0},redirectUri:{type:String,required:!0},dataUri:{type:String,default:""}},data:function(){return{search_kategori:null,form_data:{title:"",type:"",link_embed_youtube:"",link_url_zoom:""},field_state:!1,form_alert_state:!1,form_alert_color:"",form_alert_text:""}},mounted:function(){this.getFormData()},methods:{getFormData:function(){var t=this;console.log(this),this.dataUri&&(this.field_state=!0,axios.get(this.dataUri).then((function(e){if(e.data.success){var r=e.data.data;t.form_data={title:r.title,type:r.type,link_embed_youtube:r.link_embed_youtube,link_url_zoom:r.link_url_zoom},t.field_state=!1}else t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=e.data.message,t.field_state=!1})).catch((function(e){t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=response.data.message,t.field_state=!1})))},clearForm:function(){this.form_data={title:"",type:"",link_embed_youtube:"",link_url_zoom:""},this.$refs.observer.reset()},submitForm:function(){var t=this;this.$refs.observer.validate().then((function(e){e&&(t.field_state=!0,t.postFormData())}))},postFormData:function(){var t=this,e=new FormData(this.$refs["post-form"]);this.dataUri&&e.append("_method","put"),axios.post(this.actionForm,e).then((function(e){e.data.success?(t.form_alert_state=!0,t.form_alert_color="success",t.form_alert_text=e.data.message,setTimeout((function(){t.goto(t.redirectUri)}),6e3)):(t.field_state=!1,t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=e.data.message)})).catch((function(e){t.field_state=!1,t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text="Oops, something went wrong. Please try again later."}))}}},l=r("KHd+"),n=Object(l.a)(s,void 0,void 0,!1,null,null,null);e.default=n.exports}}]);