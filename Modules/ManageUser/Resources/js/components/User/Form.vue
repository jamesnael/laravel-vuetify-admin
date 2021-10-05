<script type="text/javascript">
	import { ValidationObserver, ValidationProvider, extend, localize } from 'vee-validate';
	import { required, min, max, email, confirmed, regex, numeric, image } from 'vee-validate/dist/rules'
	import id from 'vee-validate/dist/locale/id.json'

	extend('required', required)
	extend('max', max)
	extend('min', min)
	extend('email', email)
	extend('confirmed', confirmed)
	extend('regex', regex)
	extend('numeric', numeric)
	extend('image', image)

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
			dataChangeUri: {
				type: String,
				default: ''
			},
			filterCity: {
				type: Array,
			},
			filterJabatan: {
				type: Array,
			},
		},
		data: () => ({
			form_data: {
				group_users_id: '',
				email: '',
				nama_lengkap: '',
		        no_hp: '',
		        tgl_lahir: '',
		        alamat_lengkap: '',
				username: '',
				password: '',
				password_confirmation: '',
		        status: 'Aktif',
			},
			show_password: false,
			show_confirm_password: false,
			field_state: false,
			form_alert_state: false,
			form_alert_color: '',
			form_alert_text: ''
		}),
		mounted() {
            this.getFormData();
        },
        computed: {
        	selectedJabatan() {
				if (this.form_data.group_users_id) {
					let jabatan = _.find(this.filterJabatan, (jabatan) => { return jabatan.value == this.form_data.group_users_id })
					return jabatan.text
				}
				return ''
			}
        },
		methods: {
    		getFormData() {
    			if (this.dataUri) {
    				this.field_state = true

    		        axios
    		            .get(this.dataUri)
    		            .then(response => {
    		            	if (response.data.success) {
    		            		let data = response.data.data
    		            		this.form_data = {
									group_users_id: data.group_users_id,
									email: data.email,
									nama_lengkap: data.nama_lengkap,
							        no_hp: data.no_hp,
							        alamat_lengkap: data.alamat_lengkap,
									username: data.username,
									password: '',
							        status: data.status,
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
    			} else if (this.dataChangeUri) {
    				this.field_state = true

    		        axios
    		            .get(this.dataChangeUri)
    		            .then(response => {
    		            	if (response.data.success) {
    		            		let data = response.data.data
    		            		this.form_data = {
    		            			nama_lengkap: data.nama_lengkap,
									email: data.email,
									username: data.username,
									no_hp: data.no_hp,
									group_users_id: data.group_users_id,
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
    		},
			clearForm() {
				this.form_data = {
					group_users_id: '',
					email: '',
					nama_lengkap: '',
			        no_hp: '',
			        alamat_lengkap: '',
					username: '',
					password: '',
					password_confirmation: '',
			        status: '',
				}
				this.$refs.observer.reset()
			},
			clearFormChange() {
				this.form_data = {
					username: this.form_data.username,
					password: '',
					password_confirmation: '',
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
	    		    form_data.append("password", this.form_data.password);
	    		} else if (this.dataChangeUri){
	    		    form_data.append("_method", "put");
	    		    form_data.append("password", this.form_data.password);
	    		    form_data.append("password_confirmation", this.form_data.password_confirmation);
	    		} else {
	    		    form_data.append("password", this.form_data.password);
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
		    },
		    validatePhoneNumber(val, name){
		    	if(val == "+620"){
		    		this.form_data.no_hp = "+62"
		    	}
		    }
		}
	}
</script>