(window.webpackJsonp=window.webpackJsonp||[]).push([[17],{mi1y:function(a,e,r){"use strict";r.r(e);var t=r("e7F3"),s=r("TJPC"),i=r("enAU");Object(t.c)("required",s.g),Object(t.c)("max",s.c),Object(t.c)("min",s.d),Object(t.c)("email",s.b),Object(t.c)("confirmed",s.a),Object(t.c)("regex",s.f),Object(t.c)("numeric",s.e),Object(t.d)("id",i);var o={components:{ValidationObserver:t.a,ValidationProvider:t.b},props:{actionForm:{type:String,required:!0},redirectUri:{type:String,required:!0},dataUri:{type:String,default:""},dataChangeUri:{type:String,default:""},filterCity:{type:Array},filterJabatan:{type:Array}},data:function(){return{tgl_lahir:!1,form_data:{group_users_id:"",email:"",nama_lengkap:"",no_hp:"",tgl_lahir:"",gaji_pokok:"",alamat_lengkap:"",no_rekening:"",nama_pemilik_rekening:"",nama_bank:"",cabang:"",ktp:"",sim:"",sio:"",nama_referensi:"",no_hp_referensi:"",ktp_referensi:"",username:"",password:"",password_confirmation:"",url_ktp:"",url_sim:"",url_sio:"",url_ktp_referensi:""},show_password:!1,field_state:!1,form_alert_state:!1,form_alert_color:"",form_alert_text:""}},mounted:function(){this.getFormData()},methods:{getFormData:function(){var a=this;this.dataUri?(this.field_state=!0,axios.get(this.dataUri).then((function(e){if(e.data.success){var r=e.data.data;a.form_data={group_users_id:r.group_users_id,email:r.email,nama_lengkap:r.nama_lengkap,no_hp:r.no_hp,tgl_lahir:r.tgl_lahir,gaji_pokok:r.gaji_pokok,alamat_lengkap:r.alamat_lengkap,no_rekening:r.no_rekening,nama_pemilik_rekening:r.nama_pemilik_rekening,nama_bank:r.nama_bank,cabang:r.cabang,ktp:r.ktp,sim:r.sim,sio:r.sio,nama_referensi:r.nama_referensi,no_hp_referensi:r.no_hp_referensi,ktp_referensi:r.ktp_referensi,username:r.username,password:"",url_ktp:r.url_ktp,url_sim:r.url_sim,url_sio:r.url_sio,url_ktp_referensi:r.url_ktp_referensi},a.field_state=!1}else a.form_alert_state=!0,a.form_alert_color="error",a.form_alert_text=e.data.message,a.field_state=!1})).catch((function(e){a.form_alert_state=!0,a.form_alert_color="error",a.form_alert_text=response.data.message,a.field_state=!1}))):this.dataChangeUri&&(this.field_state=!0,axios.get(this.dataChangeUri).then((function(e){if(e.data.success){var r=e.data.data;a.form_data={nama_lengkap:r.nama_lengkap,email:r.email,username:r.username,no_hp:r.no_hp,group_users_id:r.group_users_id},a.field_state=!1}else a.form_alert_state=!0,a.form_alert_color="error",a.form_alert_text=e.data.message,a.field_state=!1})).catch((function(e){a.form_alert_state=!0,a.form_alert_color="error",a.form_alert_text=response.data.message,a.field_state=!1})))},clearForm:function(){this.form_data={group_users_id:"",email:"",nama_lengkap:"",no_hp:"",tgl_lahir:"",gaji_pokok:"",alamat_lengkap:"",no_rekening:"",nama_pemilik_rekening:"",nama_bank:"",cabang:"",ktp:"",sim:"",sio:"",nama_referensi:"",no_hp_referensi:"",ktp_referensi:"",username:"",password:"",password_confirmation:"",url_ktp:"",url_sim:"",url_sio:"",url_ktp_referensi:""},this.$refs.observer.reset()},clearFormChange:function(){this.form_data={username:this.form_data.username,password:"",password_confirmation:""},this.$refs.observer.reset()},submitForm:function(){var a=this;this.$refs.observer.validate().then((function(e){e&&(a.field_state=!0,a.postFormData())}))},postFormData:function(){var a=this,e=new FormData(this.$refs["post-form"]);this.dataUri?(e.append("_method","put"),e.append("password",this.form_data.password),e.append("tgl_lahir",this.form_data.tgl_lahir)):this.dataChangeUri?(e.append("_method","put"),e.append("password",this.form_data.password),e.append("password_confirmation",this.form_data.password_confirmation)):(e.append("password",this.form_data.password),e.append("tgl_lahir",this.form_data.tgl_lahir)),axios.post(this.actionForm,e).then((function(e){e.data.success?(a.form_alert_state=!0,a.form_alert_color="success",a.form_alert_text=e.data.message,setTimeout((function(){a.goto(a.redirectUri)}),6e3)):(a.field_state=!1,a.form_alert_state=!0,a.form_alert_color="error",a.form_alert_text=e.data.message)})).catch((function(e){a.field_state=!1,a.form_alert_state=!0,a.form_alert_color="error",a.form_alert_text="Oops, something went wrong. Please try again later."}))}}},n=r("KHd+"),_=Object(n.a)(o,void 0,void 0,!1,null,null,null);e.default=_.exports}}]);