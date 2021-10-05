<script type="text/javascript">
	import { ValidationObserver, ValidationProvider, extend, localize } from 'vee-validate';
	import { required, min, max, email, confirmed, regex, numeric } from 'vee-validate/dist/rules'
	import id from 'vee-validate/dist/locale/id.json'

	extend('required', required)
	extend('email', email)
	extend('numeric', numeric)
	extend('min', min)
	extend('max', max)
	extend('regex', regex)
	extend('confirmed', confirmed)

    localize('id', id);
    
	export default {
		components: {
		   
		},
		props: {
			latitudeValue: {
				type: Number,
				default: -6.1767287
			},
			longitudeValue: {
				type: Number,
				default: 106.829541
			},
			geofenceValue: {
				type: [String, Array],
	            default: () => ""
			},
			latitudeInputName: {
				type: String,
				default: 'latitude'
			},
			longitudeInputName: {
				type: String,
				default: 'longitude'
			},
			onlyMaps: {
	        	type: Boolean,
	        	default: function() {
	        		return false
	        	}
	        },
			disabled: {
				type: Boolean,
				default: function() {
					return false
				}
			},
			elementId: {
				type: String,
				default: ''
			}
		},
		data: () => ({
	    	longitude: '',
	    	latitude: '',
	    	angleCoords: [],
	    	geofenceData: '',
			field_state: false,
		}),
		mounted() {
			if (!_.isArray(this.geofenceValue)) {
				if(this.geofenceValue != null) {
	        		var geofence_split = this.geofenceValue.split(" ");
	        		this.angleCoords = JSON.parse(geofence_split);
				}
    		}
            this.checkGoogleInit();
    		this.latitude = this.latitudeValue;
    		this.longitude = this.longitudeValue;
        },
		methods: {
		    checkGoogleInit() {
				var self = this;
				setTimeout(function() {
		            if(typeof google === 'undefined') {
		                self.checkGoogleInit();
		            } else {
		                self.GMapsInit();
		            }
		        }, 500);
        	},
        	backAngleCoords() {
				this.angleCoords.pop();
	            this.GMapsInit();
        	},
        	clearAngleCoords() {
				this.angleCoords.splice(0,this.angleCoords.length)
	            this.GMapsInit();
        	},
        	GMapsInit() {
        		if (this.latitude != '' || this.longitude != '') {
					var map = new google.maps.Map(document.getElementById(this.elementId ? this.elementId : 'view-map'), {
			          	center: {lat: parseFloat(this.latitude), lng: parseFloat(this.longitude)},
			          	zoom: 15,
			          	mapTypeId: "terrain",
			        });

			        var marker = new google.maps.Marker({
    	                position: {lat: parseFloat(this.latitude), lng: parseFloat(this.longitude)},
    	                map: map
    	            });
        		} else {
	                var map = new google.maps.Map(document.getElementById(this.elementId ? this.elementId : 'view-map'), {
			          	center: {lat: -6.1767287, lng: 106.829541},
			          	zoom: 15,
			          	mapTypeId: "terrain",
			        });
			        var marker;
        		}
        		
		        var angle = new google.maps.Polygon({
				    paths: this.angleCoords,
				    strokeColor: "#FF0000",
				    strokeOpacity: 0.8,
				    strokeWeight: 2,
				    fillColor: "#FF0000",
				    fillOpacity: 0.35,
				});

        		angle.setMap(map);
        		this.geofenceData = JSON.stringify(this.angleCoords);

        		if (!this.onlyMaps) {
			        map.addListener('click', (mapsMouseEvent) => {
			            // this.latitude = mapsMouseEvent.latLng.lat()
			            // this.longitude = mapsMouseEvent.latLng.lng()
			            this.angleCoords.push({ lat: mapsMouseEvent.latLng.lat(), lng: mapsMouseEvent.latLng.lng() })
			            var angle = new google.maps.Polygon({
						    paths: this.angleCoords,
						    strokeColor: "#FF0000",
						    strokeOpacity: 0.8,
						    strokeWeight: 2,
						    fillColor: "#FF0000",
						    fillOpacity: 0.35,
						});

			    		angle.setMap(map);

			            if (marker) {
				            marker.setMap(null)
			            }
			            marker = new google.maps.Marker({
			                position: mapsMouseEvent.latLng,
			                map: map
			            });
			            map.panTo(mapsMouseEvent.latLng);

				        this.geofenceData = JSON.stringify(this.angleCoords);
			        });
			    }
        	},
		}
	}
</script>
<style>
#view-map {
	min-height: 400px;
	height: 100%;
}
</style>