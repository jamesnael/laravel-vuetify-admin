<div class="map-form">
    <div class="form-group row">
        <div class="col-md-12">
            <div id="view-map"></div>
        </div>
    </div>

    <v-row v-if="!onlyMaps">
        <v-col cols="6">
            <h4>Klik lokasi pada map untuk mendapatkan latitude dan longitude</h4>
        </v-col>
        <v-col cols="6" class="d-flex">
            <v-btn class="ml-auto mr-4" color="secondary" @click="backAngleCoords()">Back</v-btn>
            <v-btn color="info" class="mr-2" @click="clearAngleCoords()">Clear</v-btn>
        </v-col> 
    </v-row>

    <v-row v-if="!onlyMaps">
        <v-text-field
            class="d-none"
            v-model="geofenceData"
            name="geofence"
            :disabled="disabled"
            :readonly="!field_state"
        ></v-text-field>
        <v-col class="mt-5">
            <small class="ml-1">Latitude</small>
            <v-text-field
                class="mb-4 mt-1"
                v-model="latitude"
                :name="latitudeInputName"
                outlined
                :readonly="onlyMaps"
            ></v-text-field>
        </v-col>
        <v-col class="mt-5">
            <small class="ml-1">Longitude</small>
            <v-text-field
                class="mb-4 mt-1"
                v-model="longitude"
                :name="longitudeInputName"
                outlined
                :readonly="onlyMaps"
            ></v-text-field>
        </v-col>
        <v-col cols="12" md="1" class="d-flex">
            <v-btn color="primary" class="my-auto" @click="GMapsInit()">Cari</v-btn>
        </v-col>
    </v-row>
    <div v-for="(el, key) in angleCoords" v-if="!onlyMaps">
        <br><small>Titik @{{ key+1 }}</small><br>
        <small>Langitude : @{{ el.lat }}, &nbsp;Longitude : @{{ el.lng }}</small>
    </div>
</div>
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzFIRusIj_cXCZ6_VCaxXulg6PhXtoeUI" async defer></script>
@endsection