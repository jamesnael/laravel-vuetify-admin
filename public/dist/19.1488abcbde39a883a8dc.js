(window.webpackJsonp=window.webpackJsonp||[]).push([[19],{wDfY:function(a,t,e){"use strict";e.r(t);var r={name:"PembayaranDetail",props:{proyek:Object,roundKerja:[String,Number],roundLembur:[String,Number]},data:function(){return{count_extract:0,count_bayar:0}},methods:{paidResponse:function(a){console.log(a)}}},n=e("KHd+"),o=Object(n.a)(r,(function(){var a=this,t=a.$createElement,e=a._self._c||t;return e("v-tabs",[e("v-tab",{staticClass:"ml-3"},[a._v("Diextract  ("+a._s(a.count_extract)+")")]),a._v(" "),e("v-tab-item",{staticClass:"mt-5"},[e("jamkerja-upah-table",{attrs:{"data-uri":a.ziggy("jamkerja.pembayaran-upah.detail.table",[a.proyek.slug]).url(),query:[],"round-kerja":a.roundKerja,"round-lembur":a.roundLembur,jumlah:a.count_extract,"show-select":!0,"extra-button-uri":a.ziggy("jamkerja.pembayaran-upah.detail.paid",[a.proyek.slug]).url(),"extra-button-function":a.paidResponse,"disable-download-button":""},on:{"update:jumlah":function(t){a.count_extract=t}},scopedSlots:a._u([{key:"extraButton",fn:function(){return[a._v("\n            LUNAS\n          ")]},proxy:!0},{key:"extraPromptContainer",fn:function(){return[e("v-card-title",{staticClass:"text-center"},[e("v-icon",{staticClass:"text-h1 mx-auto",attrs:{color:"yellow darken-1","x-large":""}},[a._v("mdi-alert")])],1),a._v(" "),e("v-card-text",{staticClass:"font-weight-bold"},[a._v("Apakah Anda yakin ingin membayarkan jam kerja & upah mitra terpilih?")])]},proxy:!0}])})],1),a._v(" "),e("v-tab",{staticClass:"ml-3"},[a._v("Dibayar  ("+a._s(a.count_bayar)+")")]),a._v(" "),e("v-tab-item",{staticClass:"mt-5"},[e("jamkerja-upah-table",{attrs:{"data-uri":a.ziggy("jamkerja.pembayaran-upah.detail.table",[a.proyek.slug]).url(),query:["paid=1"],"round-kerja":a.roundKerja,"round-lembur":a.roundLembur,jumlah:a.count_bayar,"show-select":!1,"disable-extra-button":"","download-button-uri":a.ziggy("jamkerja.pembayaran-upah.detail.download",[a.proyek.slug]).url()},on:{"update:jumlah":function(t){a.count_bayar=t}},scopedSlots:a._u([{key:"downloadButton",fn:function(){return[a._v("\n            DOWNLOAD .pdf\n          ")]},proxy:!0},{key:"downloadPromptContainer",fn:function(){return[e("v-card-title",{staticClass:"text-center"},[e("v-icon",{staticClass:"text-h1 mx-auto",attrs:{color:"yellow darken-1","x-large":""}},[a._v("mdi-alert")])],1),a._v(" "),e("v-card-text",{staticClass:"font-weight-bold"},[a._v("Apakah Anda yakin ingin mendownload rekapitulasi pembayaran upah jam kerja & upah mitra?")])]},proxy:!0}])})],1),a._v(".\n")],1)}),[],!1,null,null,null);t.default=o.exports}}]);