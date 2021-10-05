(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[18],{

/***/ "./Modules/ManageUser/Resources/js/components/Riwayat/Form.vue":
/*!*********************************************************************!*\
  !*** ./Modules/ManageUser/Resources/js/components/Riwayat/Form.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Form.vue?vue&type=script&lang=js& */ "./Modules/ManageUser/Resources/js/components/Riwayat/Form.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns




/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  _Form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"],
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "Modules/ManageUser/Resources/js/components/Riwayat/Form.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./Modules/ManageUser/Resources/js/components/Riwayat/Form.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./Modules/ManageUser/Resources/js/components/Riwayat/Form.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Form.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./Modules/ManageUser/Resources/js/components/Riwayat/Form.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./Modules/ManageUser/Resources/js/components/Riwayat/Form.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./Modules/ManageUser/Resources/js/components/Riwayat/Form.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vee_validate__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vee-validate */ "./node_modules/vee-validate/dist/vee-validate.esm.js");
/* harmony import */ var vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vee-validate/dist/rules */ "./node_modules/vee-validate/dist/rules.js");
/* harmony import */ var vee_validate_dist_locale_id_json__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vee-validate/dist/locale/id.json */ "./node_modules/vee-validate/dist/locale/id.json");
var vee_validate_dist_locale_id_json__WEBPACK_IMPORTED_MODULE_2___namespace = /*#__PURE__*/__webpack_require__.t(/*! vee-validate/dist/locale/id.json */ "./node_modules/vee-validate/dist/locale/id.json", 1);



Object(vee_validate__WEBPACK_IMPORTED_MODULE_0__["extend"])('required', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__["required"]);
Object(vee_validate__WEBPACK_IMPORTED_MODULE_0__["extend"])('max', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__["max"]);
Object(vee_validate__WEBPACK_IMPORTED_MODULE_0__["extend"])('min', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__["min"]);
Object(vee_validate__WEBPACK_IMPORTED_MODULE_0__["extend"])('email', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__["email"]);
Object(vee_validate__WEBPACK_IMPORTED_MODULE_0__["extend"])('confirmed', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__["confirmed"]);
Object(vee_validate__WEBPACK_IMPORTED_MODULE_0__["extend"])('regex', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__["regex"]);
Object(vee_validate__WEBPACK_IMPORTED_MODULE_0__["extend"])('numeric', vee_validate_dist_rules__WEBPACK_IMPORTED_MODULE_1__["numeric"]);
Object(vee_validate__WEBPACK_IMPORTED_MODULE_0__["localize"])('id', vee_validate_dist_locale_id_json__WEBPACK_IMPORTED_MODULE_2__);
/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    ValidationObserver: vee_validate__WEBPACK_IMPORTED_MODULE_0__["ValidationObserver"],
    ValidationProvider: vee_validate__WEBPACK_IMPORTED_MODULE_0__["ValidationProvider"]
  },
  props: {
    actionForm: {
      type: String,
      required: true
    },
    redirectUri: {
      type: String,
      required: true
    },
    dataUri: {
      type: String,
      "default": ''
    },
    filterMenu: {
      type: Object,
      required: true
    },
    hakAkses: {
      type: Array
    }
  },
  data: function data() {
    return {
      form_data: {
        nama_jabatan: '',
        keterangan: '',
        hak_akses: ''
      },
      refreshCK: true,
      show_password: false,
      field_state: false,
      form_alert_state: false,
      form_alert_color: '',
      form_alert_text: ''
    };
  },
  mounted: function mounted() {
    this.getFormData();
  },
  methods: {
    selectAll: function selectAll() {
      var _this = this;

      this.refreshCK = false;
      this.form_data.hak_akses = [];

      _.forEach(this.filterMenu, function (key) {
        _.forEach(key, function (route) {
          _this.form_data.hak_akses.push(route.name);
        });
      });

      this.refreshCK = true;
    },
    getFormData: function getFormData() {
      var _this2 = this;

      this.refreshCK = false;

      if (this.dataUri) {
        this.field_state = true;
        axios.get(this.dataUri).then(function (response) {
          if (response.data.success) {
            var data = response.data.data;
            _this2.form_data = {
              nama_jabatan: data.nama_jabatan,
              keterangan: data.keterangan,
              hak_akses: data.hak_akses
            };
            _this2.field_state = false;
          } else {
            _this2.form_alert_state = true;
            _this2.form_alert_color = 'error';
            _this2.form_alert_text = response.data.message;
            _this2.field_state = false;
          }
        })["catch"](function (error) {
          _this2.form_alert_state = true;
          _this2.form_alert_color = 'error';
          _this2.form_alert_text = response.data.message;
          _this2.field_state = false;
        });
      }

      this.refreshCK = true;
    },
    clearForm: function clearForm() {
      this.form_data = {
        nama_jabatan: '',
        keterangan: '',
        hak_akses: ''
      };
      this.$refs.observer.reset();
    },
    submitForm: function submitForm() {
      var _this3 = this;

      this.$refs.observer.validate().then(function (success) {
        if (!success) {
          return;
        }

        _this3.field_state = true;

        _this3.postFormData();
      });
    },
    postFormData: function postFormData() {
      var _this4 = this;

      var form_data = new FormData(this.$refs['post-form']);

      if (this.dataUri) {
        form_data.append("_method", "put");
      }

      axios.post(this.actionForm, form_data).then(function (response) {
        if (response.data.success) {
          _this4.form_alert_state = true;
          _this4.form_alert_color = 'success';
          _this4.form_alert_text = response.data.message;
          setTimeout(function () {
            _this4["goto"](_this4.redirectUri);
          }, 6000);
        } else {
          _this4.field_state = false;
          _this4.form_alert_state = true;
          _this4.form_alert_color = 'error';
          _this4.form_alert_text = response.data.message;
        }
      })["catch"](function (error) {
        _this4.field_state = false;
        _this4.form_alert_state = true;
        _this4.form_alert_color = 'error';
        _this4.form_alert_text = 'Oops, something went wrong. Please try again later.';
      });
    }
  }
});

/***/ })

}]);