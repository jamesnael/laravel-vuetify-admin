(window.webpackJsonp=window.webpackJsonp||[]).push([[18],{Vd25:function(t,a,e){"use strict";e.r(a);var n,r=e("wd/R"),i={name:"InsentifTable",props:{dataUri:String,proyek:Object},data:function(){return{display_picker:!1,filterDates:r().format("YYYY-MM"),search:"",page:1,items:[],loading:!1,headers:[{text:"Operator",value:"nama_lengkap"},{text:"Jabatan",value:"nama_jabatan"},{text:"Unit",value:"no_lambung"}],showDates:[],dialog:!1,dialog_generate:!1,fieldState:!1,form_alert_state:!1,form_alert_color:"error",form_alert_text:"",hideTableDate:!1}},computed:{dateRangeText:function(){return r("21-"+r(this.filterDates,"YYYY-MM").subtract(1,"months").format("MM-YYYY"),"DD-MM-YYYY").format("DD MMMM YYYY")+" - "+r("20-"+r(this.filterDates,"YYYY-MM").format("MM-YYYY"),"DD-MM-YYYY").format("DD MMMM YYYY")},queryParams:function(){var t=["search="+this.search,"page="+this.page,"paginate=1000","start_date="+r("21-"+r(this.filterDates,"YYYY-MM").subtract(1,"months").format("MM-YYYY"),"DD-MM-YYYY").format("YYYY-MM-DD"),"end_date="+r("20-"+r(this.filterDates,"YYYY-MM").format("MM-YYYY"),"DD-MM-YYYY").format("YYYY-MM-DD")];return _.join(t,"&")},tableHeaders:function(){var t=[{text:"Operator",value:"nama_lengkap"},{text:"Jabatan",value:"nama_jabatan"},{text:"Unit",value:"nama_tipe_unit"}];return this.hideTableDate||_.forEach(this.showDates,(function(a){t.push({text:a,value:a,align:"end"})})),t.push({text:"Total Jam",value:"total_insentif_jam",align:"end"}),t.push({text:"Jumlah Hari Lembur",value:"jumlah_hari_lembur",align:"end"}),t.push({text:"Total Jam Lembur",value:"total_durasi_lembur",align:"end"}),t.push({text:"Total Upah Lembur",value:"total_upah_lembur",align:"end"}),t.push({text:"Insentif Jam Kerja",value:"nominal_insentif_jam",align:"end"}),t.push({text:"Komisi Tetap",value:"komisi_bulanan",align:"end"}),t.push({text:"Subtotal",value:"subtotal",align:"end"}),t.push({text:"Extract",value:"extract",align:"center"}),t}},mounted:function(){this.getData()},methods:{showDuration:function(t,a,e){var n=_.find(t.details,(function(t){return t.date==a}));return n?n["durasi_"+e]:0},total_durasi_perhari:function(t,a){var e=_.find(t.details,(function(t){return t.date==a}));return e?e.total_insentif_jam:0},headerSlotName:function(t){return"header."+t},itemSlotName:function(t){return"item."+t},getData:function(){var t=this;this.loading=!0,n&&n.cancel(),n=axios.CancelToken.source(),axios.get(this.dataUri+"?"+this.queryParams,{cancelToken:n.token}).then((function(a){a.data.success&&t.setData(a.data.data),t.loading=!1})).catch((function(a){t.loading=!1}))},setData:function(t){this.items=t.table.data,this.showDates=t.date},extractData:function(){var t=this;this.fieldState=!0;var a=new FormData;a.append("start_date",r("21-"+r(this.filterDates,"YYYY-MM").subtract(1,"months").format("MM-YYYY"),"DD-MM-YYYY").format("YYYY-MM-DD")),a.append("end_date",r("20-"+r(this.filterDates,"YYYY-MM").format("MM-YYYY"),"DD-MM-YYYY").format("YYYY-MM-DD")),axios.post(this.ziggy("jamkerja.insentif.detail.extract",[this.proyek.slug]).url(),a).then((function(a){a.data.success?(window.open(a.data.data,"_blank"),t.getData()):(t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=a.data.message),t.dialog=!1,t.fieldState=!1})).catch((function(a){t.fieldState=!1,t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=a.response.data.message}))},generateData:function(){var t=this;this.fieldState=!0;var a=new FormData;a.append("start_date",r("21-"+r(this.filterDates,"YYYY-MM").subtract(1,"months").format("MM-YYYY"),"DD-MM-YYYY").format("YYYY-MM-DD")),a.append("end_date",r("20-"+r(this.filterDates,"YYYY-MM").format("MM-YYYY"),"DD-MM-YYYY").format("YYYY-MM-DD")),axios.post(this.ziggy("jamkerja.insentif.detail.generate",[this.proyek.slug]).url(),a).then((function(a){a.data.success?(t.form_alert_state=!0,t.form_alert_color="success",t.form_alert_text=a.data.message,t.getData()):(t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=a.data.message),t.dialog_generate=!1,t.fieldState=!1})).catch((function(a){t.fieldState=!1,t.form_alert_state=!0,t.form_alert_color="error",t.form_alert_text=a.response.data.message}))}}},s=e("KHd+"),o=Object(s.a)(i,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("v-card",{attrs:{flat:""}},[e("v-row",{staticClass:"ml-0"},[e("v-col",{attrs:{md:"4",sm:"6"}},[e("v-menu",{ref:"display_picker",attrs:{"close-on-content-click":!1,transition:"scale-transition","offset-y":"","min-width":"auto"},scopedSlots:t._u([{key:"activator",fn:function(a){var n=a.on,r=a.attrs;return[e("v-text-field",t._g(t._b({attrs:{"prepend-icon":"mdi-calendar",readonly:"",disabled:t.fieldState||t.loading},model:{value:t.dateRangeText,callback:function(a){t.dateRangeText=a},expression:"dateRangeText"}},"v-text-field",r,!1),n))]}}]),model:{value:t.display_picker,callback:function(a){t.display_picker=a},expression:"display_picker"}},[t._v(" "),e("v-date-picker",{attrs:{type:"month","no-title":""},on:{input:function(a){t.display_picker=!1,t.getData()}},model:{value:t.filterDates,callback:function(a){t.filterDates=a},expression:"filterDates"}})],1)],1),t._v(" "),e("v-col",{staticClass:"text-right",attrs:{md:"8",sm:"6"}},[e("v-btn",{staticClass:"mt-2",attrs:{elevation:"5",color:"primary",loading:t.loading,disabled:t.fieldState},on:{click:function(a){return t.getData()}}},[e("v-icon",[t._v("mdi-sync")])],1),t._v(" "),e("v-dialog",{attrs:{width:"500"},scopedSlots:t._u([{key:"activator",fn:function(a){var n=a.on,r=a.attrs;return[e("v-btn",t._g(t._b({staticClass:"mt-1 ml-4 px-6 py-5 white--text",attrs:{elevation:"5",color:"success"}},"v-btn",r,!1),n),[t._v("\n            GENERATE\n          ")])]}}]),model:{value:t.dialog_generate,callback:function(a){t.dialog_generate=a},expression:"dialog_generate"}},[t._v(" "),e("v-card",[e("v-card-title",{staticClass:"text-center"},[e("v-icon",{staticClass:"text-h1 mx-auto",attrs:{color:"yellow darken-1","x-large":""}},[t._v("mdi-alert")])],1),t._v(" "),e("v-card-text",{staticClass:"font-weight-bold"},[t._v("Apakah Anda yakin ingin generate data insentif mitra?")]),t._v(" "),e("v-card-actions",[e("v-spacer"),t._v(" "),e("v-btn",{staticClass:"mt-1 ml-4 px-6 py-5",attrs:{color:"red darken-4",text:"",disabled:t.fieldState||t.loading},on:{click:function(a){t.dialog_generate=!1}}},[t._v("\n              Batal\n            ")]),t._v(" "),e("v-btn",{staticClass:"mt-1 ml-4 px-6 py-5 white--text",attrs:{color:"success",loading:t.fieldState||t.loading,disabled:t.fieldState||t.loading},on:{click:function(a){return t.generateData()}}},[t._v("\n              Submit\n            ")])],1)],1)],1),t._v(" "),e("v-dialog",{attrs:{width:"500"},scopedSlots:t._u([{key:"activator",fn:function(a){var n=a.on,r=a.attrs;return[e("v-btn",t._g(t._b({staticClass:"mt-1 ml-4 px-6 py-5 white--text",attrs:{elevation:"5",color:"success"}},"v-btn",r,!1),n),[t._v("\n            DOWNLOAD .xlsx\n          ")])]}}]),model:{value:t.dialog,callback:function(a){t.dialog=a},expression:"dialog"}},[t._v(" "),e("v-card",[e("v-card-title",{staticClass:"text-center"},[e("v-icon",{staticClass:"text-h1 mx-auto",attrs:{color:"yellow darken-1","x-large":""}},[t._v("mdi-alert")])],1),t._v(" "),e("v-card-text",{staticClass:"font-weight-bold"},[t._v("Apakah Anda yakin ingin extract data insentif mitra?")]),t._v(" "),e("v-card-actions",[e("v-spacer"),t._v(" "),e("v-btn",{staticClass:"mt-1 ml-4 px-6 py-5",attrs:{color:"red darken-4",text:"",disabled:t.fieldState||t.loading},on:{click:function(a){t.dialog=!1}}},[t._v("\n              Batal\n            ")]),t._v(" "),e("v-btn",{staticClass:"mt-1 ml-4 px-6 py-5 white--text",attrs:{color:"success",loading:t.fieldState||t.loading,disabled:t.fieldState||t.loading},on:{click:function(a){return t.extractData()}}},[t._v("\n              Submit\n            ")])],1)],1)],1)],1),t._v(" "),e("v-col",{attrs:{md:"12",sm:"12"}},[e("v-switch",{attrs:{inset:"",label:"Sembunyikan Tanggal"},model:{value:t.hideTableDate,callback:function(a){t.hideTableDate=a},expression:"hideTableDate"}})],1)],1),t._v(" "),e("v-data-table",{attrs:{headers:t.tableHeaders,items:t.items,"hide-default-footer":"","fixed-header":"","disable-sort":"","no-data-text":"Tidak data untuk ditampilkan.",loading:t.loading,"loading-text":"Mohon menunggu ...","item-key":"uniqid"},scopedSlots:t._u([t._l(t.showDates,(function(a){return{key:t.headerSlotName(a),fn:function(a){var e=a.header;return[t._v("\n      "+t._s(t.reformatDateTime(e.text,"YYYY-MM-DD","DD MMMM"))+"\n    ")]}}})),t._l(t.showDates,(function(a){return{key:t.itemSlotName(a),fn:function(n){var r=n.item;return[e("v-tooltip",{attrs:{top:"",color:"transparent"},scopedSlots:t._u([{key:"activator",fn:function(n){var i=n.on,s=n.attrs;return[e("span",t._g(t._b({},"span",s,!1),i),[t._v("\n            "+t._s(t.total_durasi_perhari(r,a))+"\n          ")])]}}],null,!0)},[t._v(" "),e("v-card",{attrs:{dark:"",flat:"",outlined:""}},[e("v-simple-table",{attrs:{dense:""},scopedSlots:t._u([{key:"default",fn:function(){return[e("tbody",[e("tr",[e("th",{attrs:{scope:"row"}},[t._v("Kerja:")]),t._v(" "),e("td",[t._v(t._s(t.showDuration(r,a,"normal")))])]),t._v(" "),e("tr",[e("th",{attrs:{scope:"row"}},[t._v("Standby:")]),t._v(" "),e("td",[t._v(t._s(t.showDuration(r,a,"standby")))])]),t._v(" "),e("tr",[e("th",{attrs:{scope:"row"}},[t._v("Lembur:")]),t._v(" "),e("td",[t._v(t._s(t.showDuration(r,a,"lembur")))])])])]},proxy:!0}],null,!0)})],1)],1)]}}})),{key:"item.total_upah_lembur",fn:function(a){var n=a.item;return[e("v-tooltip",{attrs:{top:"",color:"transparent"},scopedSlots:t._u([{key:"activator",fn:function(a){var r=a.on,i=a.attrs;return[e("span",t._g(t._b({},"span",i,!1),r),[t._v("\n            "+t._s(t.number_format(parseInt(n.total_upah_lembur)+parseInt(n.total_insentif_lembur)))+"\n          ")])]}}],null,!0)},[t._v(" "),e("v-card",{attrs:{dark:"",flat:"",outlined:""}},[e("v-simple-table",{attrs:{dense:""},scopedSlots:t._u([{key:"default",fn:function(){return[e("tbody",[e("tr",[e("th",{attrs:{scope:"row"}},[t._v("Upah:")]),t._v(" "),e("td",{attrs:{align:"right"}},[t._v(t._s(t.number_format(parseInt(n.total_upah_lembur))))])]),t._v(" "),e("tr",[e("th",{attrs:{scope:"row"}},[t._v("Insentif:")]),t._v(" "),e("td",{attrs:{align:"right"}},[t._v(t._s(t.number_format(parseInt(n.total_insentif_lembur))))])])])]},proxy:!0}],null,!0)})],1)],1)]}},{key:"item.nominal_insentif_jam",fn:function(a){var n=a.item;return[e("span",[t._v("\n        "+t._s(t.number_format(parseInt(n.nominal_insentif_jam)))+"\n      ")])]}},{key:"item.komisi_bulanan",fn:function(a){var n=a.item;return[e("span",[t._v("\n        "+t._s(t.number_format(parseInt(n.komisi_bulanan)))+"\n      ")])]}},{key:"item.subtotal",fn:function(a){var n=a.item;return[e("span",[t._v("\n        "+t._s(t.number_format(parseInt(n.total_upah_lembur)+parseInt(n.total_insentif_lembur)+parseInt(n.komisi_bulanan)+parseInt(n.nominal_insentif_jam)))+"\n      ")])]}}],null,!0)}),t._v(" "),e("v-snackbar",{attrs:{timeout:3e3,color:t.form_alert_color},model:{value:t.form_alert_state,callback:function(a){t.form_alert_state=a},expression:"form_alert_state"}},[t._v("\n    "+t._s(t.form_alert_text)+"\n  ")])],1)}),[],!1,null,null,null);a.default=o.exports}}]);