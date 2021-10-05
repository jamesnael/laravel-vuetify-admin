(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[19],{

/***/ "./Modules/ManageUser/Resources/js/components/User/Form.vue":
/*!******************************************************************!*\
  !*** ./Modules/ManageUser/Resources/js/components/User/Form.vue ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Form.vue?vue&type=script&lang=js& */ "./Modules/ManageUser/Resources/js/components/User/Form.vue?vue&type=script&lang=js&");
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
component.options.__file = "Modules/ManageUser/Resources/js/components/User/Form.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./Modules/ManageUser/Resources/js/components/User/Form.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************!*\
  !*** ./Modules/ManageUser/Resources/js/components/User/Form.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../../node_modules/vue-loader/lib??vue-loader-options!./Form.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./Modules/ManageUser/Resources/js/components/User/Form.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Form_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./Modules/ManageUser/Resources/js/components/User/Form.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./Modules/ManageUser/Resources/js/components/User/Form.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************/
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
    dataChangeUri: {
      type: String,
      "default": ''
    },
    filterCity: {
      type: Array
    },
    filterJabatan: {
      type: Array
    }
  },
  data: function data() {
    return {
      tgl_lahir: false,
      form_data: {
        group_users_id: '',
        email: '',
        nama_lengkap: '',
        no_hp: '',
        tgl_lahir: '',
        alamat_lengkap: '',
        no_rekening: '',
        nama_pemilik_rekening: '',
        nama_bank: '',
        cabang: '',
        ktp: null,
        sim: null,
        sio: null,
        nama_referensi: '',
        no_hp_referensi: '',
        ktp_referensi: null,
        username: '',
        password: '',
        password_confirmation: '',
        url_ktp: '',
        url_sim: '',
        url_sio: '',
        url_ktp_referensi: ''
      },
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
  computed: {
    selectedJabatan: function selectedJabatan() {
      var _this = this;

      if (this.form_data.group_users_id) {
        var jabatan = _.find(this.filterJabatan, function (jabatan) {
          return jabatan.value == _this.form_data.group_users_id;
        });

        return jabatan.text;
      }

      return '';
    }
  },
  methods: {
    getFormData: function getFormData() {
      var _this2 = this;

      if (this.dataUri) {
        this.field_state = true;
        axios.get(this.dataUri).then(function (response) {
          if (response.data.success) {
            var data = response.data.data;
            _this2.form_data = {
              group_users_id: data.group_users_id,
              email: data.email,
              nama_lengkap: data.nama_lengkap,
              no_hp: data.no_hp,
              tgl_lahir: data.tgl_lahir,
              alamat_lengkap: data.alamat_lengkap,
              no_rekening: data.no_rekening,
              nama_pemilik_rekening: data.nama_pemilik_rekening,
              nama_bank: data.nama_bank,
              cabang: data.cabang,
              nama_referensi: data.nama_referensi,
              no_hp_referensi: data.no_hp_referensi,
              username: data.username,
              password: '',
              url_ktp: data.url_ktp,
              url_sim: data.url_sim,
              url_sio: data.url_sio,
              url_ktp_referensi: data.url_ktp_referensi
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
      } else if (this.dataChangeUri) {
        this.field_state = true;
        axios.get(this.dataChangeUri).then(function (response) {
          if (response.data.success) {
            var data = response.data.data;
            _this2.form_data = {
              nama_lengkap: data.nama_lengkap,
              email: data.email,
              username: data.username,
              no_hp: data.no_hp,
              group_users_id: data.group_users_id
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
    },
    clearForm: function clearForm() {
      this.form_data = {
        group_users_id: '',
        email: '',
        nama_lengkap: '',
        no_hp: '',
        tgl_lahir: '',
        alamat_lengkap: '',
        no_rekening: '',
        nama_pemilik_rekening: '',
        nama_bank: '',
        cabang: '',
        ktp: null,
        sim: null,
        sio: null,
        nama_referensi: '',
        no_hp_referensi: '',
        ktp_referensi: null,
        username: '',
        password: '',
        password_confirmation: '',
        url_ktp: '',
        url_sim: '',
        url_sio: '',
        url_ktp_referensi: ''
      };
      this.$refs.observer.reset();
    },
    clearFormChange: function clearFormChange() {
      this.form_data = {
        username: this.form_data.username,
        password: '',
        password_confirmation: ''
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
        form_data.append("password", this.form_data.password);
        form_data.append("tgl_lahir", this.form_data.tgl_lahir);
      } else if (this.dataChangeUri) {
        form_data.append("_method", "put");
        form_data.append("password", this.form_data.password);
        form_data.append("password_confirmation", this.form_data.password_confirmation);
      } else {
        form_data.append("password", this.form_data.password);
        form_data.append("tgl_lahir", this.form_data.tgl_lahir);
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
    },
    validatePhoneNumber: function validatePhoneNumber(val, name) {
      if (val == "+620") {
        this.form_data.no_hp = "+62";
      }
    },
    validatePhoneNumberReferensi: function validatePhoneNumberReferensi(val, name) {
      if (val == "+620") {
        this.form_data.no_hp_referensi = "+62";
      }
    }
  }
});

/***/ })

}]);