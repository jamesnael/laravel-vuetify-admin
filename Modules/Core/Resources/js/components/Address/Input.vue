<script>
	import { ValidationProvider, extend, localize } from 'vee-validate';
	import { required } from 'vee-validate/dist/rules'
	import id from 'vee-validate/dist/locale/id.json'

	extend('required', required)
    localize('id', id);

	export default {
		components: {
		    ValidationProvider
		},
		props: {
			provinceValue: {
				type: String,
				default: ''
			},			
			provinceRules: {
				type: String,
				default: ''
			},
			provinceClass: {
				type: String,
				default: ''
			},
			provinceInputName: {
				type: String,
				default: ''
			},
			provinceLabel: {
				type: String,
				default: ''
			},
			cityValue: {
				type: String,
				default: ''
			},
			cityRules: {
				type: String,
				default: ''
			},
			cityClass: {
				type: String,
				default: ''
			},
			cityInputName: {
				type: String,
				default: ''
			},
			cityLabel: {
				type: String,
				default: ''
			},
			districtValue: {
				type: String,
				default: ''
			},
			districtRules: {
				type: String,
				default: ''
			},
			districtClass: {
				type: String,
				default: ''
			},
			districtInputName: {
				type: String,
				default: ''
			},
			districtLabel: {
				type: String,
				default: ''
			},
			disabled: {
				type: Boolean,
				default: function() {
					return false
				}
			}
		},
		data: function () {
            return {
        		province: '',
        		city: '',
        		district: '',
        		items: [],
        	}
        },
        computed: {
            cityOptions: function () {
            	if (this.province) {
            		return _.filter(this.items, (o) => { return o.name == this.province })
            	}
            	return []
            },
            districtOptions: function () {
            	if (this.city) {
            		return _.filter(this.items, (o) => { return o.city  == this.city })
            	}
            	return []
            }
        },
        mounted() {
            this.getItems();
        },
        methods: {
    		getItems() {
		        axios
		            .get(this.ziggy('provinces.index').url())
		            .then(response => {
		            	if (response.data.success) {
		            		this.items = response.data.data
	            			this.province = this.provinceValue

		            		if (this.cityValue) {
		            			this.$nextTick(() => {
			            			this.city = this.cityValue
		            			})
		            		}

		            		if (this.districtValue) {
		            			this.$nextTick(() => {
			            			this.district = this.districtValue
		            			})
		            		}
		            	}
		            })
		            .catch(error => {
	            		console.log(error.response)
		            });
    		},
    		refreshCity() {
    			this.city = ''
    		},
    		refreshDistrict() {
    			this.district = ''
    		}
        }
	}
</script>