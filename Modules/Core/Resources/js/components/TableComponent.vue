<script type="text/javascript">
	let call
  	var moment = require('moment')
  	import Swal from 'sweetalert2'

	export default {
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
	            default: "No data found."
	        },
	        noResultsText: {
	            type: String,
	            default: "No data found."
	        },
	        searchText: {
	            type: String,
	            default: "Search"
	        },
	        searchIcon: {
	            type: String,
	            default: "mdi-magnify"
	        },
	        refreshText: {
	            type: String,
	            default: "Reload"
	        },
	        refreshIcon: {
	            type: String,
	            default: "mdi-sync"
	        },
	        addNewText: {
	            type: String,
	            default: "Add New"
	        },
	        addNewIcon: {
	            type: String,
	            default: "mdi-plus"
	        },
	        addNewUri: {
	            type: String,
	            default: ""
	        },
	        addNewColor: {
	            type: String,
	            default: "info"
	        },
	        itemsPerPageAllText: {
	            type: String,
	            default: "All"
	        },
	        itemsPerPageText: {
	            type: String,
	            default: "Rows per page:"
	        },
	        pageTextLocale: {
	            type: String,
	            default: "en"
	        },
	        detailUri: {
	            type: String,
	            default: ""
	        },
	        detailUriParameter: {
	            type: [String, Array],
	            default: () => ""
	        },
	        detailText: {
	            type: String,
	            default: "Detail"
	        },
	        detailIcon: {
	            type: String,
	            default: "mdi-eye"
	        },
	        detailColor: {
	            type: String,
	            default: "#000000"
	        },
	        viewUri: {
	            type: String,
	            default: ""
	        },
	        viewUriParameter: {
	            type: [String, Array],
	            default: () => ""
	        },
	        viewText: {
	            type: String,
	            default: "Detail"
	        },
	        viewIcon: {
	            type: String,
	            default: "mdi-eye"
	        },
	        viewColor: {
	            type: String,
	            default: "#000000"
	        },
	        editUri: {
	            type: String,
	            default: ""
	        },
	        editUriParameter: {
	            type: [String, Array],
	            default: () => ""
	        },
	        editText: {
	            type: String,
	            default: "Edit"
	        },
	        editIcon: {
	            type: String,
	            default: "mdi-square-edit-outline"
	        },
	        editColor: {
	            type: String,
	            default: "#000000"
	        },
	        printUri: {
	            type: String,
	            default: ""
	        },
	        printUriParameter: {
	            type: [String, Array],
	            default: () => ""
	        },
	        printText: {
	            type: String,
	            default: "Edit"
	        },
	        printIcon: {
	            type: String,
	            default: "mdi-square-edit-outline"
	        },
	        printColor: {
	            type: String,
	            default: "#000000"
	        },
	        approveDetailUri: {
	            type: String,
	            default: ""
	        },
	        approveDetailUriParameter: {
	            type: [String, Array],
	            default: () => ""
	        },
	        approveDetailText: {
	            type: String,
	            default: "Edit"
	        },
	        approveDetailIcon: {
	            type: String,
	            default: "mdi-square-edit-outline"
	        },
	        approveDetailColor: {
	            type: String,
	            default: "#000000"
	        },
	        deleteUri: {
	            type: String,
	            default: ""
	        },
	        deleteUriParameter: {
	            type: [String, Array],
	            default: () => ""
	        },
	        deleteText: {
	            type: String,
	            default: "Delete"
	        },
	        deleteIcon: {
	            type: String,
	            default: "mdi-trash-can-outline"
	        },
	        deleteColor: {
	            type: String,
	            default: "#677b80"
	        },
	        deleteConfirmationText: {
	            type: String,
	            default: "Are you sure want to delete this data ?"
	        },
	        deleteCancelText: {
	            type: String,
	            default: "Cancel"
	        },
	        approveUri: {
	            type: String,
	            default: ""
	        },
	        approveUriParameter: {
	            type: String,
	            default: ""
	        },
	        approveText: {
	            type: String,
	            default: "Delete"
	        },
	        approveIcon: {
	            type: String,
	            default: "mdi-check"
	        },
	        approveColor: {
	            type: String,
	            default: "#000000"
	        },
	        approveConfirmationText: {
	            type: String,
	            default: "Are you sure want to approve this data ?"
	        },
	        approveCancelText: {
	            type: String,
	            default: "Cancel"
	        },
	        approveCondition: {
	        	type: Function,
	        	default: (row) => true
	        },
	        tableNumber: {
	        	type: Boolean,
	        	default: function() {
	        		return false
	        	}
	        },
	        withSelect: {
	        	type: Boolean,
	        	default: function() {
	        		return false
	        	}
	        },
	        bulkUpdateText: {
	            type: String,
	            default: "Bulk Update"
	        },
	        bulkUpdateIcon: {
	            type: String,
	            default: ""
	        },
	        bulkUpdateUri: {
	            type: String,
	            default: ""
	        },
	        bulkConfirmationText: {
	            type: String,
	            default: "Are you sure want to approve this data?"
	        },
	        bulkCancelText: {
	            type: String,
	            default: "Cancel"
	        },
	        bulkUpdateColor: {
	            type: String,
	            default: "green"
	        },
	        bulkUpdateTextSecond: {
	            type: String,
	            default: "Bulk Update Second"
	        },
	        bulkUpdateIconSecond: {
	            type: String,
	            default: ""
	        },
	        bulkUpdateUriSecond: {
	            type: String,
	            default: ""
	        },
	        bulkUpdateColorSecond: {
	            type: String,
	            default: "green"
	        },
	        bulkUpdateDisabled: {
	        	type: Boolean,
	        	default: function(data) {
	        		return false
	        	}
	        },
	        selectedDataFunction: {
	        	type: Function,
	        	default: (row, formData) => {
        			formData.append('data[]', JSON.stringify(row))
	        	}
	        },
	        selectedKeyName: {
	        	type: String,
	        	default: null
	        },
	        withActions: {
	        	type: Boolean,
	        	default: function() {
	        		return false
	        	}
	        }
	    },
	    data () {
	        return {
	            field_state: false,
	            field_state_second: false,
	            prompt_delete: false,
	            prompt_approve: false,
	            prompt_bulk_update: false,
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
	            table_alert_state: 'info',
	        }
	    },
	    watch: {
	        options: {
	            handler () {
	                this.dataHandler()
	            },
	            deep: true,
	        },
	    },
	    mounted () {
	        this.dataHandler()
	    },
	    computed:{
	        query() {
	            return '?page=' + this.options.page + '&search=' + this.search + '&paginate=' + this.options.itemsPerPage
	        },
	    },
	    methods: {
	        editParamsUri(item) {
	        	if (_.isArray(this.editUriParameter)) {
	        		let newParams = _.reduce(this.editUriParameter, (obj, param) => ({ ...obj, [param]: item[param] }), {})
	        		// console.log(newParams)
	        		return this.ziggy(this.editUri, newParams).url()
	        	}
	        	return this.ziggy(this.editUri, [item[this.editUriParameter]]).url() 
	        },
	        printParamsUri(item) {
	        	if (_.isArray(this.printUriParameter)) {
	        		let newParams = _.reduce(this.printUriParameter, (obj, param) => ({ ...obj, [param]: item[param] }), {})
	        		// console.log(newParams)
	        		return this.ziggy(this.printUri, newParams).url()
	        	}
	        	return this.ziggy(this.printUri, [item[this.printUriParameter]]).url() 
	        },
	        approveDetailParamsUri(item) {
	        	if (_.isArray(this.approveDetailUriParameter)) {
	        		let newParams = _.reduce(this.approveDetailUriParameter, (obj, param) => ({ ...obj, [param]: item[param] }), {})
	        		// console.log(newParams)
	        		return this.ziggy(this.approveDetailUri, newParams).url()
	        	}
	        	return this.ziggy(this.approveDetailUri, [item[this.approveDetailUriParameter]]).url() 
	        },
	        detailParamsUri(item) {
	        	if (_.isArray(this.detailUriParameter)) {
	        		let newParams = _.reduce(this.detailUriParameter, (obj, param) => ({ ...obj, [param]: item[param] }), {})
	        		// console.log(newParams)
	        		return this.ziggy(this.detailUri, newParams).url()
	        	}
	        	return this.ziggy(this.detailUri, [item[this.detailUriParameter]]).url() 
	        },
	        viewParamsUri(item) {
	        	if (_.isArray(this.viewUriParameter)) {
	        		let newParams = _.reduce(this.viewUriParameter, (obj, param) => ({ ...obj, [param]: item[param] }), {})
	        		// console.log(newParams)
	        		return this.ziggy(this.viewUri, newParams).url()
	        	}
	        	return this.ziggy(this.viewUri, [item[this.viewUriParameter]]).url() 
	        },
	        deleteParamsUri(item) {
	        	if (_.isArray(this.deleteUriParameter)) {
	        		let newParams = _.reduce(this.deleteUriParameter, (obj, param) => ({ ...obj, [param]: item[param] }), {})
	        		// console.log(newParams)
	        		return this.ziggy(this.deleteUri, newParams).url()
	        	}
	        	return this.ziggy(this.deleteUri, [item[this.deleteUriParameter]]).url() 
	        },
	        searchDatatable() {
	        	this.options.page = 1;
	        	setTimeout(this.dataHandler(), 2000);
	        },
	        dataHandler() {
	        	if (this.tableNumber) {
	        		let table_index = [{
    		            "text": 'No',
    		            "align": 'center',
    		            "sortable": false,
    		            "value": 'table_index',
	        		}]
		        	this.table_headers = _.concat(table_index, this.headers)
	        	} else {
	        		this.table_headers = this.headers
	        	}
	        	if (this.withActions) {
	        		let table_actions = [{
    		            "text": 'Aksi',
    		            "align": 'center',
    		            "sortable": false,
    		            "value": 'actions',
	        		}]
		        	this.table_headers = _.concat(this.table_headers, table_actions)
	        	}
	            setTimeout(this.getData(), 2000);
	        },
	        getData() {
	            this.loading = true
	            if (call) {
	                call.cancel();
	            }
	            call = axios.CancelToken.source()
	            axios
	                .get(this.uri + this.query,  {
	                    cancelToken: call.token
	                })
	                .then(response => {
	                    this.setData(response.data.data)
	                    this.total_data = response.data.data.total
	                    this.from_data = response.data.data.from
	                    this.to_data = response.data.data.to
	                    this.loading = false;
	                })
	                .catch(error => {
	                    this.loading = false;
	                });
	        },
	        setData(data) {
	            var items = []
	            var number = data.from
	            _.forEach(data.data, (value, key) => {
	                value.table_index = number++
	                items.push(value)
	            });
	            this.table_items = items

	            if (this.selectedKeyName) {
		            // this.data_table = []
		            _.forEach(this.table_items, (item) => {
		            	if (item[this.selectedKeyName]) {
		            		this.data_table.push(item)
		            	}
		            })
	            }
	        },
	        promptBulkItem() {
	            this.prompt_bulk_update = true
	        },
	        promptDeleteItem(item) {
	            this.prompt_delete = true
	            this.selected = item
	        },
	        deleteItem() {
	            this.delete_loader = true
	            axios.delete(this.deleteParamsUri(this.selected))
	                .then((response) => {
	                    if (response.data.success) {
	                        this.table_alert = true
	                        this.table_alert_state = 'success'
	                        this.table_alert_text = response.data.message

	                        this.dataHandler()
				            setTimeout(location.reload(), 2000);
	                    } else {
	                        this.table_alert = true
	                        this.table_alert_state = 'error'
	                        this.table_alert_text = response.data.message
	                    }
	                    this.delete_loader = false
	                    this.prompt_delete = false
	                })
	                .catch((error) => {
	                    this.table_alert = true
	                    this.table_alert_state = 'error'
	                    this.table_alert_text = 'Oops, something went wrong. Please try again later.'

	                    this.delete_loader = false
	                    this.prompt_delete = false
	                });
	        },
	        promptApproveItem(item) {
	            this.prompt_approve = true
	            this.selected = item
	        },
	        approveItem() {
	            this.approve_loader = true
	            axios.get(this.ziggy(this.approveUri, [this.selected[this.approveUriParameter]]).url())
	                .then((response) => {
	                    if (response.data.success) {
	                        this.table_alert = true
	                        this.table_alert_state = 'success'
	                        this.table_alert_text = response.data.message

	                        this.dataHandler()
				            setTimeout(location.reload(), 2000);
	                        
	                    } else {
	                        this.table_alert = true
	                        this.table_alert_state = 'error'
	                        this.table_alert_text = response.data.message
	                    }
	                    this.approve_loader = false
	                    this.prompt_approve = false
	                })
	                .catch((error) => {
	                    this.table_alert = true
	                    this.table_alert_state = 'error'
	                    this.table_alert_text = 'Oops, something went wrong. Please try again later.'

	                    this.approve_loader = false
	                    this.prompt_approve = false
	                });
	        },
	        submitBulkUpdate() {
			    const formData = new FormData();
			    _.forEach(this.data_table, (row) => {
			    	this.selectedDataFunction(row, formData)
			    })

	        	this.field_state = true

			    axios.post(this.bulkUpdateUri, formData)
	    		    .then((response) => {
	    		        if (response.data.success) {
		    		        this.field_state = false
	    		            this.table_alert = true
	                        this.table_alert_state = 'success'
	                        this.table_alert_text = response.data.message

	    		            this.dataHandler()
	    		            
				            setTimeout(location.reload(), 2000);

	    		        } else {
		    		        this.field_state = false
	    		            this.table_alert = true
	                        this.table_alert_state = 'error'
	                        this.table_alert_text = response.data.message
	    		        }
	    		    })
	    		    .catch((error) => {
	    		        this.field_state = false
	    		        this.table_alert = true
	    		        this.table_alert_state = 'error'
	                    this.table_alert_text = 'Oops, something went wrong. Please try again later.'
	    		    });
			},
			async submitBulkUpdateTimesheetsDetail() {
				const formData = new FormData();
				for (const row of this.data_table) {
					var nama_lengkap = row.nama_lengkap

			    	for (const value_normal of row.data_source_Normal) {
			    		await this.checkJamIstirahat(value_normal,nama_lengkap)
			    	}
			    	this.selectedDataFunction(row, formData)
				}
	        	this.field_state = true
			    axios.post(this.bulkUpdateUri, formData)
	    		    .then((response) => {
	    		        if (response.data.success) {
		    		        this.field_state = false
	    		            this.table_alert = true
	                        this.table_alert_state = 'success'
	                        this.table_alert_text = response.data.message

	    		            this.dataHandler()
	    		            
				            setTimeout(location.reload(), 2000);

	    		        } else {
		    		        this.field_state = false
	    		            this.table_alert = true
	                        this.table_alert_state = 'error'
	                        this.table_alert_text = response.data.message
	    		        }
	    		    })
	    		    .catch((error) => {
	    		        this.field_state = false
	    		        this.table_alert = true
	    		        this.table_alert_state = 'error'
	                    this.table_alert_text = 'Oops, something went wrong. Please try again later.'
	    		    });
			},
			async checkJamIstirahat(value,nama_lengkap) {
				if (moment(value.start_kerja, "HH:mm").isSameOrBefore(moment("12:00", "HH:mm")) && moment(value.end_kerja, "HH:mm").isSameOrAfter(moment("13:00", "HH:mm")) && value.aktivitas != "Standby") {
			    			await Swal.fire({
			    			 	allowOutsideClick: false,
			    			  	title: 'Jam kerja melewati jam Istirahat?',
				    			text: "Apakah jam kerja "+ nama_lengkap + " tanggal " +value.group_date + " " + value.start_kerja + ' - ' + value.end_kerja + " termasuk Istirahat?",
				    			icon: 'warning',
				    			showCancelButton: false,
				    			showDenyButton: true,
				    			confirmButtonColor: '#3085d6',
				    			denyButtonColor: '#d33',
				    			confirmButtonText: 'Dengan Istirahat',
				    			denyButtonText: 'Tanpa Istirahat'
			    			})
			    			.then((result) => {
			    				if (result.isConfirmed) {
			    					value.is_istirahat = 1
			    			  	} else if (result.isDenied) {
			    					value.istirahat = 0
			    			  	}
			    			})
			    		} else {
			    			console.log("tidak terdeteksi ada is_istirahat")
			    		}
			},
			submitBulkUpdateSecond() {
			    const formData = new FormData();
			    _.forEach(this.data_table, (row) => {
			    	this.selectedDataFunction(row, formData)
			    })

	        	this.field_state_second = true
	        	
			    axios.post(this.bulkUpdateUriSecond, formData)
	    		    .then((response) => {
	    		        if (response.data.success) {
		    		        this.field_state_second = false
	    		            this.table_alert = true
	                        this.table_alert_state = 'success'
	                        this.table_alert_text = response.data.message

	    		            this.dataHandler()
	    		            
				            setTimeout(location.reload(), 2000);

	    		        } else {
		    		        this.field_state_second = false
	    		            this.table_alert = true
	                        this.table_alert_state = 'error'
	                        this.table_alert_text = response.data.message
	    		        }
	    		    })
	    		    .catch((error) => {
	    		        this.field_state_second = false
	    		        this.table_alert = true
	    		        this.table_alert_state = 'error'
	                    this.table_alert_text = 'Oops, something went wrong. Please try again later.'
	    		    });
			},
	    },
	}
</script>