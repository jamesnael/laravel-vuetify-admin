(window.webpackJsonp=window.webpackJsonp||[]).push([[10],{BAay:function(a,e,_){(a.exports=_("I1BE")(!1)).push([a.i,"#view-map{min-height:400px;height:100%}",""])},Hq3X:function(a,e,_){"use strict";var r=_("rg+q");_.n(r).a},"rg+q":function(a,e,_){var r=_("BAay");"string"==typeof r&&(r=[[a.i,r,""]]);var t={hmr:!0,transform:void 0,insertInto:void 0};_("aET+")(r,t);r.locals&&(a.exports=r.locals)},wgbt:function(a,e,_){"use strict";_.r(e);var r=_("e7F3"),t=_("TJPC"),i=_("enAU");Object(r.c)("required",t.h),Object(r.c)("email",t.b),Object(r.c)("numeric",t.f),Object(r.c)("min",t.e),Object(r.c)("max",t.d),Object(r.c)("regex",t.g),Object(r.c)("confirmed",t.a),Object(r.d)("id",i);var s={components:{ValidationObserver:r.a,ValidationProvider:r.b},props:{actionForm:{type:String,required:!0},redirectUri:{type:String,required:!0},dataUri:{type:String,default:""}},data:function(){return{show_maps:!0,form_data:{nama_tipe_unit:"",keterangan_tipe:"",uang_kerja:[],uang_lembur:[],upah_standby:"",insentif:"",insentif_operator:"",insentif_helper:"",insentif_asisten_operator:"",satuan_pemakaian:"",jumlah_pemakaian:"",is_wirtgen:"",komisi:"",komisi_operator:"",komisi_helper:"",komisi_asisten_operator:"",komisi_pengawas_alat:"",status:"1"},statusOptions:[{text:"Aktif",value:"1"},{text:"Non Aktif",value:"0"}],field_state:!1,form_alert_state:!1,form_alert_color:"",form_alert_text:""}},mounted:function(){this.getFormData()},methods:{getFormData:function(){var a=this;this.dataUri&&(this.show_maps=!1,this.field_state=!0,axios.get(this.dataUri).then((function(e){if(e.data.success){var _=e.data.data;_.komisi_helper?a.form_data={nama_tipe_unit:_.nama_tipe_unit,keterangan_tipe:_.keterangan_tipe,uang_kerja_1:_.jam_kerja_upah[0].besar_upah_per_jam,uang_kerja_2:_.jam_kerja_upah[1].besar_upah_per_jam,uang_kerja_3:_.jam_kerja_upah[2].besar_upah_per_jam,uang_kerja_4:_.jam_kerja_upah[3].besar_upah_per_jam,uang_kerja_5:_.jam_kerja_upah[4].besar_upah_per_jam,uang_kerja_6:_.jam_kerja_upah[5].besar_upah_per_jam,uang_kerja_7:_.jam_kerja_upah[6].besar_upah_per_jam,uang_kerja_8:_.jam_kerja_upah[7].besar_upah_per_jam,uang_lembur_1:_.jam_kerja_upah[8].besar_upah_per_jam,upah_standby:_.upah_standby,insentif:_.insentif,insentif_operator:_.insentif_operator,insentif_helper:_.insentif_helper,insentif_asisten_operator:_.insentif_asisten_operator,komisi:_.komisi,komisi_operator:_.komisi_operator,komisi_helper:_.komisi_helper,komisi_asisten_operator:_.komisi_asisten_operator,komisi_pengawas_alat:_.komisi_pengawas_alat,satuan_pemakaian:_.satuan_pemakaian,jumlah_pemakaian:_.jumlah_pemakaian,is_wirtgen:"1",status:_.status}:a.form_data={nama_tipe_unit:_.nama_tipe_unit,keterangan_tipe:_.keterangan_tipe,uang_kerja_1:_.jam_kerja_upah[0].besar_upah_per_jam,uang_kerja_2:_.jam_kerja_upah[1].besar_upah_per_jam,uang_kerja_3:_.jam_kerja_upah[2].besar_upah_per_jam,uang_kerja_4:_.jam_kerja_upah[3].besar_upah_per_jam,uang_kerja_5:_.jam_kerja_upah[4].besar_upah_per_jam,uang_kerja_6:_.jam_kerja_upah[5].besar_upah_per_jam,uang_kerja_7:_.jam_kerja_upah[6].besar_upah_per_jam,uang_kerja_8:_.jam_kerja_upah[7].besar_upah_per_jam,uang_lembur_1:_.jam_kerja_upah[8].besar_upah_per_jam,uang_lembur_2:_.jam_kerja_upah[9].besar_upah_per_jam,uang_lembur_3:_.jam_kerja_upah[10].besar_upah_per_jam,uang_lembur_4:_.jam_kerja_upah[11].besar_upah_per_jam,uang_lembur_5:_.jam_kerja_upah[12].besar_upah_per_jam,uang_lembur_6:_.jam_kerja_upah[13].besar_upah_per_jam,uang_lembur_7:_.jam_kerja_upah[14].besar_upah_per_jam,uang_lembur_8:_.jam_kerja_upah[15].besar_upah_per_jam,upah_standby:_.upah_standby,insentif:_.insentif,insentif_operator:_.insentif_operator,insentif_helper:_.insentif_helper,insentif_asisten_operator:_.insentif_asisten_operator,komisi:_.komisi,komisi_operator:_.komisi_operator,komisi_helper:_.komisi_helper,komisi_asisten_operator:_.komisi_asisten_operator,komisi_pengawas_alat:_.komisi_pengawas_alat,satuan_pemakaian:_.satuan_pemakaian,jumlah_pemakaian:_.jumlah_pemakaian,is_wirtgen:"0",status:_.status},a.field_state=!1}else a.form_alert_state=!0,a.form_alert_color="error",a.form_alert_text=e.data.message,a.field_state=!1;a.show_maps=!0})).catch((function(e){a.form_alert_state=!0,a.form_alert_color="error",a.form_alert_text=response.data.message,a.field_state=!1,a.show_maps=!0})))},clearForm:function(){this.form_data={nama_tipe_unit:"",keterangan_tipe:"",uang_kerja:"",uang_lembur:"",upah_standby:"",insentif:"",insentif_operator:"",insentif_helper:"",insentif_asisten_operator:"",satuan_pemakaian:"",jumlah_pemakaian:"",is_wirtgen:"",komisi:"",komisi_operator:"",komisi_helper:"",komisi_asisten_operator:"",komisi_pengawas_alat:"",status:""},this.$refs.observer.reset()},submitForm:function(){var a=this;this.$refs.observer.validate().then((function(e){e&&(a.field_state=!0,a.postFormData())}))},postFormData:function(){var a=this,e=new FormData(this.$refs["post-form"]);this.dataUri&&e.append("_method","put"),axios.post(this.actionForm,e).then((function(e){e.data.success?(a.form_alert_state=!0,a.form_alert_color="success",a.form_alert_text=e.data.message,setTimeout((function(){a.goto(a.redirectUri)}),2500)):(a.field_state=!1,a.form_alert_state=!0,a.form_alert_color="error",a.form_alert_text=e.data.message)})).catch((function(e){a.field_state=!1,a.form_alert_state=!0,a.form_alert_color="error",a.form_alert_text="Oops, something went wrong. Please try again later."}))},isNumber:function(a){var e=(a=a||window.event).which?a.which:a.keyCode;if(!(e>31&&(e<48||e>57)&&46!==e))return!0;a.preventDefault()}}},n=(_("Hq3X"),_("KHd+")),o=Object(n.a)(s,void 0,void 0,!1,null,null,null);e.default=o.exports}}]);