<script type="text/javascript">
	import { ValidationObserver, ValidationProvider, extend, localize } from 'vee-validate';
	import { required, min, max, email, confirmed, regex, numeric } from 'vee-validate/dist/rules'
	import id from 'vee-validate/dist/locale/id.json'

	extend('required', required)
	extend('max', max)
	extend('min', min)
	extend('email', email)
	extend('confirmed', confirmed)
	extend('regex', regex)
	extend('numeric', numeric)

    localize('id', id);

	export default {
		components: {
		    ValidationObserver,
		    ValidationProvider
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
				default: ''
			},
			filterMenu: {
			    type: Object,
			    required: true
			},
			hakAkses: {
			    type: Array,
			},
		},
		data: () => ({
			form_data: {
				nama_jabatan: '',
				keterangan: '',
				hak_akses: [],
			},
            refreshCK: true,
			show_password: false,
			field_state: false,
			form_alert_state: false,
			form_alert_color: '',
			form_alert_text: ''
		}),
		mounted() {
            this.getFormData();
        },
		methods: {
			selectAll() {
    	        this.refreshCK = false
    	        this.form_data.hak_akses = []
    	        _.forEach(this.filterMenu, (key) => {
	                _.forEach(key, (route) => {
                	    this.form_data.hak_akses.push(route.name)
	                });
    	        });
    	        this.refreshCK = true
        	},
        	clearSelect() {
        		this.form_data.hak_akses = []
        	},
    		getFormData() {
    			this.refreshCK = false

    			if (this.dataUri) {
    				this.field_state = true

    		        axios
    		            .get(this.dataUri)
    		            .then(response => {
    		            	if (response.data.success) {
    		            		let data = response.data.data
    		            		this.form_data = {
    		            			nama_jabatan: data.nama_jabatan,
									keterangan: data.keterangan,
									hak_akses: data.hak_akses ? data.hak_akses : [],
    		            		}

    			                this.field_state = false
    		            	} else {
    		            		this.form_alert_state = true
		    		            this.form_alert_color = 'error'
		    		            this.form_alert_text = response.data.message
			    		        this.field_state = false
    		            	}
    		            })
    		            .catch(error => {
		            		this.form_alert_state = true
	    		            this.form_alert_color = 'error'
	    		            this.form_alert_text = response.data.message
		    		        this.field_state = false
    		            });
    			}
    			this.refreshCK = true

    		},
			clearForm() {
				this.form_data = {
					nama_jabatan: '',
					keterangan: '',
					hak_akses: [],
				}
				this.$refs.observer.reset()
			},
	    	submitForm() {
				this.$refs.observer.validate().then((success) => {
					if (!success) {
			          	return;
			        }

			        this.field_state = true

			        this.postFormData()
				});
	    	},
		    postFormData() {
	    		const form_data = new FormData(this.$refs['post-form']);
	    		
	    		if (this.dataUri) {
	    		    form_data.append("_method", "put");
	    		}

	    		axios.post(this.actionForm, form_data)
	    		    .then((response) => {
	    		        if (response.data.success) {
	    		            this.form_alert_state = true
	    		            this.form_alert_color = 'success'
	    		            this.form_alert_text = response.data.message

	    		            setTimeout(() => {
			                    this.goto(this.redirectUri);
			                }, 2500);
	    		        } else {
		    		        this.field_state = false

	    		            this.form_alert_state = true
	    		            this.form_alert_color = 'error'
	    		            this.form_alert_text = response.data.message
	    		        }
	    		    })
	    		    .catch((error) => {
	    		        this.field_state = false
	    		        this.form_alert_state = true
	    		        this.form_alert_color = 'error'
	                    this.form_alert_text = 'Oops, something went wrong. Please try again later.'
	    		    });
		    }
		}
	}
</script>