(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[12],{

/***/ "./Modules/Core/Resources/js/components/TableComponent.vue":
/*!*****************************************************************!*\
  !*** ./Modules/Core/Resources/js/components/TableComponent.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _TableComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./TableComponent.vue?vue&type=script&lang=js& */ "./Modules/Core/Resources/js/components/TableComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns




/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  _TableComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"],
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "Modules/Core/Resources/js/components/TableComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./Modules/Core/Resources/js/components/TableComponent.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./Modules/Core/Resources/js/components/TableComponent.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TableComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./TableComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./Modules/Core/Resources/js/components/TableComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_TableComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./Modules/Core/Resources/js/components/TableComponent.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./Modules/Core/Resources/js/components/TableComponent.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var call;
/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    uri: {
      type: String,
      required: true
    },
    headers: {
      type: Array,
      required: true
    },
    noDataText: {
      type: String,
      "default": "No data found."
    },
    noResultsText: {
      type: String,
      "default": "No data found."
    },
    searchText: {
      type: String,
      "default": "Search"
    },
    searchIcon: {
      type: String,
      "default": "mdi-magnify"
    },
    refreshText: {
      type: String,
      "default": "Reload"
    },
    refreshIcon: {
      type: String,
      "default": "mdi-sync"
    },
    addNewText: {
      type: String,
      "default": "Add New"
    },
    addNewIcon: {
      type: String,
      "default": "mdi-plus"
    },
    addNewUri: {
      type: String,
      "default": ""
    },
    addNewColor: {
      type: String,
      "default": "info"
    },
    itemsPerPageAllText: {
      type: String,
      "default": "All"
    },
    itemsPerPageText: {
      type: String,
      "default": "Rows per page:"
    },
    pageTextLocale: {
      type: String,
      "default": "en"
    },
    detailUri: {
      type: String,
      "default": ""
    },
    detailUriParameter: {
      type: String,
      "default": ""
    },
    detailText: {
      type: String,
      "default": "Detail"
    },
    detailIcon: {
      type: String,
      "default": "mdi-eye"
    },
    detailColor: {
      type: String,
      "default": "#000000"
    },
    editUri: {
      type: String,
      "default": ""
    },
    editUriParameter: {
      type: [String, Array],
      "default": function _default() {
        return "";
      }
    },
    editText: {
      type: String,
      "default": "Edit"
    },
    editIcon: {
      type: String,
      "default": "mdi-square-edit-outline"
    },
    editColor: {
      type: String,
      "default": "#000000"
    },
    deleteUri: {
      type: String,
      "default": ""
    },
    deleteUriParameter: {
      type: [String, Array],
      "default": function _default() {
        return "";
      }
    },
    deleteText: {
      type: String,
      "default": "Delete"
    },
    deleteIcon: {
      type: String,
      "default": "mdi-trash-can-outline"
    },
    deleteColor: {
      type: String,
      "default": "#677b80"
    },
    deleteConfirmationText: {
      type: String,
      "default": "Are you sure want to delete this data ?"
    },
    deleteCancelText: {
      type: String,
      "default": "Cancel"
    },
    approveUri: {
      type: String,
      "default": ""
    },
    approveUriParameter: {
      type: String,
      "default": ""
    },
    approveText: {
      type: String,
      "default": "Delete"
    },
    approveIcon: {
      type: String,
      "default": "mdi-check"
    },
    approveColor: {
      type: String,
      "default": "#000000"
    },
    approveConfirmationText: {
      type: String,
      "default": "Are you sure want to approve this data ?"
    },
    approveCancelText: {
      type: String,
      "default": "Cancel"
    },
    tableNumber: {
      type: Boolean,
      "default": function _default() {
        return false;
      }
    },
    withSelect: {
      type: Boolean,
      "default": function _default() {
        return false;
      }
    },
    bulkUpdateText: {
      type: String,
      "default": "Bulk Update"
    },
    bulkUpdateIcon: {
      type: String,
      "default": "mdi-plus"
    },
    bulkUpdateUri: {
      type: String,
      "default": ""
    },
    bulkUpdateColor: {
      type: String,
      "default": "green"
    },
    selectedDataFunction: {
      type: Function,
      "default": function _default(row, formData) {
        formData.append('data[]', JSON.stringify(row));
      }
    },
    selectedKeyName: {
      type: String,
      "default": null
    },
    withActions: {
      type: Boolean,
      "default": function _default() {
        return false;
      }
    }
  },
  data: function data() {
    return {
      field_state: false,
      prompt_delete: false,
      prompt_approve: false,
      search: '',
      page: 1,
      pageCount: 0,
      total_data: 0,
      from_data: 0,
      to_data: 0,
      table_headers: [],
      table_items: [],
      loading: true,
      options: {},
      data_table: [],
      selected: null,
      delete_loader: false,
      approve_loader: false,
      table_alert: false,
      table_alert_text: '',
      table_alert_state: 'info'
    };
  },
  watch: {
    options: {
      handler: function handler() {
        this.dataHandler();
      },
      deep: true
    }
  },
  mounted: function mounted() {
    this.dataHandler();
  },
  computed: {
    query: function query() {
      return '?page=' + this.options.page + '&search=' + this.search + '&paginate=' + this.options.itemsPerPage;
    }
  },
  methods: {
    editParamsUri: function editParamsUri(item) {
      if (_.isArray(this.editUriParameter)) {
        var newParams = _.reduce(this.editUriParameter, function (obj, param) {
          return _objectSpread(_objectSpread({}, obj), {}, _defineProperty({}, param, item[param]));
        }, {}); // console.log(newParams)


        return this.ziggy(this.editUri, newParams).url();
      }

      return this.ziggy(this.editUri, [item[this.editUriParameter]]).url();
    },
    deleteParamsUri: function deleteParamsUri(item) {
      if (_.isArray(this.deleteUriParameter)) {
        var newParams = _.reduce(this.deleteUriParameter, function (obj, param) {
          return _objectSpread(_objectSpread({}, obj), {}, _defineProperty({}, param, item[param]));
        }, {}); // console.log(newParams)


        return this.ziggy(this.deleteUri, newParams).url();
      }

      return this.ziggy(this.deleteUri, [item[this.deleteUriParameter]]).url();
    },
    dataHandler: function dataHandler() {
      if (this.tableNumber) {
        var table_index = [{
          "text": 'No',
          "align": 'center',
          "sortable": false,
          "value": 'table_index'
        }];
        this.table_headers = _.concat(table_index, this.headers);
      } else {
        this.table_headers = this.headers;
      }

      if (this.withActions) {
        var table_actions = [{
          "text": 'Aksi',
          "align": 'center',
          "sortable": false,
          "value": 'actions'
        }];
        this.table_headers = _.concat(this.table_headers, table_actions);
      }

      setTimeout(this.getData(), 2000);
    },
    getData: function getData() {
      var _this = this;

      this.loading = true;

      if (call) {
        call.cancel();
      }

      call = axios.CancelToken.source();
      axios.get(this.uri + this.query, {
        cancelToken: call.token
      }).then(function (response) {
        _this.setData(response.data.data);

        _this.total_data = response.data.data.total;
        _this.from_data = response.data.data.from;
        _this.to_data = response.data.data.to;
        _this.loading = false;
      })["catch"](function (error) {
        _this.loading = false;
      });
    },
    setData: function setData(data) {
      var _this2 = this;

      var items = [];
      var number = data.from;

      _.forEach(data.data, function (value, key) {
        value.table_index = number++;
        items.push(value);
      });

      this.table_items = items;

      if (this.selectedKeyName) {
        this.data_table = [];

        _.forEach(this.table_items, function (item) {
          if (item[_this2.selectedKeyName]) {
            _this2.data_table.push(item);
          }
        });
      }
    },
    promptDeleteItem: function promptDeleteItem(item) {
      this.prompt_delete = true;
      this.selected = item;
    },
    deleteItem: function deleteItem() {
      var _this3 = this;

      this.delete_loader = true;
      axios["delete"](this.deleteParamsUri(this.selected)).then(function (response) {
        if (response.data.success) {
          _this3.table_alert = true;
          _this3.table_alert_state = 'success';
          _this3.table_alert_text = response.data.message;

          _this3.dataHandler();
        } else {
          _this3.table_alert = true;
          _this3.table_alert_state = 'error';
          _this3.table_alert_text = response.data.message;
        }

        _this3.delete_loader = false;
        _this3.prompt_delete = false;
      })["catch"](function (error) {
        _this3.table_alert = true;
        _this3.table_alert_state = 'error';
        _this3.table_alert_text = 'Oops, something went wrong. Please try again later.';
        _this3.delete_loader = false;
        _this3.prompt_delete = false;
      });
    },
    promptApproveItem: function promptApproveItem(item) {
      this.prompt_approve = true;
      this.selected = item;
    },
    approveItem: function approveItem() {
      var _this4 = this;

      this.approve_loader = true;
      axios.get(this.ziggy(this.approveUri, [this.selected[this.approveUriParameter]]).url()).then(function (response) {
        if (response.data.success) {
          _this4.table_alert = true;
          _this4.table_alert_state = 'success';
          _this4.table_alert_text = response.data.message;

          _this4.dataHandler();

          setTimeout(location.reload(), 2000);
        } else {
          _this4.table_alert = true;
          _this4.table_alert_state = 'error';
          _this4.table_alert_text = response.data.message;
        }

        _this4.approve_loader = false;
        _this4.prompt_approve = false;
      })["catch"](function (error) {
        _this4.table_alert = true;
        _this4.table_alert_state = 'error';
        _this4.table_alert_text = 'Oops, something went wrong. Please try again later.';
        _this4.approve_loader = false;
        _this4.prompt_approve = false;
      });
    },
    submitBulkUpdate: function submitBulkUpdate() {
      var _this5 = this;

      var formData = new FormData();

      _.forEach(this.data_table, function (row) {
        _this5.selectedDataFunction(row, formData);
      });

      this.field_state = true;
      axios.post(this.bulkUpdateUri, formData).then(function (response) {
        if (response.data.success) {
          _this5.field_state = false;
          _this5.table_alert = true;
          _this5.table_alert_state = 'success';
          _this5.table_alert_text = response.data.message;

          _this5.dataHandler();

          setTimeout(location.reload(), 2000);
        } else {
          _this5.field_state = false;
          _this5.table_alert = true;
          _this5.table_alert_state = 'error';
          _this5.table_alert_text = response.data.message;
        }
      })["catch"](function (error) {
        _this5.field_state = false;
        _this5.table_alert = true;
        _this5.table_alert_state = 'error';
        _this5.table_alert_text = 'Oops, something went wrong. Please try again later.';
      });
    }
  }
});

/***/ })

}]);