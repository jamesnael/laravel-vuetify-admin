(window.webpackJsonp=window.webpackJsonp||[]).push([[28],{ZIu0:function(t,e,r){"use strict";r.r(e);var a=r("e7F3"),i=r("TJPC"),o=r("enAU");Object(a.c)("required",i.h),Object(a.c)("email",i.b),Object(a.c)("numeric",i.f),Object(a.c)("min",i.e),Object(a.c)("max",i.d),Object(a.c)("regex",i.g),Object(a.c)("confirmed",i.a),Object(a.d)("id",o);var s={components:{ValidationObserver:a.a,ValidationProvider:a.b},props:{actionForm:{type:String,required:!0},redirectUri:{type:String,required:!0},dataUri:{type:String,default:""},filterTipeUnit:{type:Array,default:function(){return[]}},filterOperator:{type:Array,default:function(){return[]}},filterDriver:{type:Array,default:function(){return[]}},filterPengawasWirtgen:{type:Array,default:function(){return[]}}},data:function(){return{show_maps:!0,form_data:{tipe_unit_id:"",no_lambung_unit:"",no_polisi_unit:"",operator_user_id:"",pengawas_alat_user_id:"",asisten_operator_user_id:"",helper_1_user_id:"",helper_2_user_id:"",status:""},statusOptions:[{text:"Aktif",value:"1"},{text:"Non Aktif",value:"0"}],field_state:!1,form_alert_state:!1,form_alert_color:"",form_alert_text:""}},computed:{checkWirtgen:function(){var t=this;return this.form_data.tipe_unit_id?_.find(this.filterTipeUnit,(function(e){return e.value==t.form_data.tipe_unit_id})).is_wirtgen:""},selectedTipeUnit:function(){var t=this;return this.form_data.tipe_unit_id?_.find(this.filterTipeUnit,(function(e){return e.value==t.form_data.tipe_unit_id})).text:""}},mounted:function(){this.getFormData()},methods:{getFormData:function(){var t=this;this.dataUri&&(this.show_maps=!1,this.field_state=!0,axios.get(this.dataUri).then((function(e){if(e.data.success){var r=e.data.data;t.form_data={tipe_unit_id:r.tipe_unit_id,no_lambung_unit:r.no_lambung_unit,no_polisi_unit:r.no_polisi_unit,operator_user_id:r.operator_user_id,pengawas_alat_user_id:r.pengawas_alat_user_id,asisten_operator_user_id:r.asisten_operator_user_id,helper_1_user_id:r.helper_1_user_id,helper_2_user_id:r.helper_2_user_id,status:r.status},t.field_state=!1}else t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=e.data.message,t.field_state=!1;t.show_maps=!0})).catch((function(e){t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=response.data.message,t.field_state=!1,t.show_maps=!0})))},clearForm:function(){this.form_data={tipe_unit_id:"",no_lambung_unit:"",no_polisi_unit:"",operator_user_id:"",pengawas_alat_user_id:"",asisten_operator_user_id:"",helper_1_user_id:"",helper_2_user_id:"",status:""},this.$refs.observer.reset()},submitForm:function(){var t=this;this.$refs.observer.validate().then((function(e){e&&(t.field_state=!0,t.postFormData())}))},postFormData:function(){var t=this,e=new FormData(this.$refs["post-form"]);this.dataUri&&e.append("_method","put"),axios.post(this.actionForm,e).then((function(e){e.data.success?(t.form_alert_state=!0,t.form_alert_color="success",t.form_alert_text=e.data.message,setTimeout((function(){t.goto(t.redirectUri)}),2500)):(t.field_state=!1,t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=e.data.message)})).catch((function(e){t.field_state=!1,t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text="Oops, something went wrong. Please try again later."}))}}},n=r("KHd+"),u=Object(n.a)(s,void 0,void 0,!1,null,null,null);e.default=u.exports}}]);