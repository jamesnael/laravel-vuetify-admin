<script type="text/javascript">
	import { ValidationObserver, ValidationProvider, extend, localize } from 'vee-validate';
	import { required, email } from 'vee-validate/dist/rules'
	import id from 'vee-validate/dist/locale/id.json'

	extend('required', required)
	extend('email', email)
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
			}
		},
		data: () => ({
			form_data: {
				username: '',
				password: '',
				selected: false,
			},
			show_password: false,
			field_state: false,
			form_alert_state: false,
			form_alert_color: '',
			form_alert_text: ''
		}),
		mounted() {
			if ('username' in window.localStorage) {
				this.form_data.username = window.localStorage.getItem('username')
				this.form_data.selected = true
			}
			if ('password' in window.localStorage) {
				this.form_data.password = window.localStorage.getItem('password')
			}
		},
		methods: {
			clearForm() {
				this.form_data = {
					username: '',
					password: '',
					selected: false,
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
	    		
	    		axios.post(this.actionForm, form_data)
	    		    .then((response) => {
	    		        if (response.data.success) {
	    		            this.form_alert_state = true
	    		            this.form_alert_color = 'success'
	    		            this.form_alert_text = response.data.message

	    		            if (this.form_data.selected) {
	    		            	window.localStorage.setItem('username', this.form_data.username)
	    		            	window.localStorage.setItem('password', this.form_data.password)
	    		            } else {
	    		            	window.localStorage.removeItem('username')
	    		            	window.localStorage.removeItem('password')
	    		            }

	    		            setTimeout(() => {
			                    this.goto(response.data.data);
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