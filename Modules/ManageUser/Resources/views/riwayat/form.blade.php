<validation-observer v-slot="{ validate, reset }" ref="observer">
    <form method="post" enctype="multipart/form-data" ref="post-form">
        <!-- <v-row>
            <v-col cols="6">
                <small class="ml-1">Nama</small>
                <validation-provider rules="" name="Nama" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.nama"
                        name="nama"
                        clear-icon="mdi-eraser-variant"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        readonly
                    ></v-text-field>
                </validation-provider>
            </v-col>

            <v-col cols="6">
                <small class="ml-1">Aktivitas</small>
                <validation-provider rules="" name="Aktivitas" v-slot="{ errors }">
                    <v-text-field
                    	class="mt-1"
                        v-model="form_data.aktivitas"
            			name="aktivitas"
            			clear-icon="mdi-eraser-variant"
        	    		:error-messages="errors"
        	    		:disabled="field_state"
                        outlined
                        readonly
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="6">
                <small class="ml-1">Tanggal</small>
                <validation-provider rules="" name="Tanggal" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.tanggal"
                        name="tanggal"
                        clear-icon="mdi-eraser-variant"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        readonly
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row> -->

        <v-row>
            <v-col cols="12">
                <v-simple-table class="elevation-2 py-2 mb-5">
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th class="text-left">
                                    Nama
                                </th>
                                <th class="text-left">
                                    Jabatan
                                </th>
                                <th class="text-left">
                                    Aktivitas
                                </th>
                                <th class="text-left">
                                    Tanggal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>@{{ form_data.nama }}</td>
                                <td>@{{ form_data.jabatan }}</td>
                                <td>@{{ form_data.aktivitas }}</td>
                                <td>@{{ form_data.tanggal }}</td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
        </v-row>

        <v-card class="my-5">
            <v-card-title>
                <h5>Detail Data</h5>
            </v-card-title>
            <v-card-text class="px-0">
                <div class="v-data-table elevation-0 style-table mx-2 theme--light">
                    <div class="v-data-table__wrapper">
                        <table v-for="(element, index) in form_data.properties">
                            <tbody>
                                <tr
                                    v-for="(data, idx) in element.attributes"
                                >
                                    <td v-if="showNotId(idx)">@{{ idx }}</td>
                                    <td v-if="showNotId(idx)">:</td>
                                    <td v-if="showNotId(idx)">@{{ data }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </v-card-text>
        </v-card>

        <v-card class="my-5">
            <v-card-title>
                <h5>Perubahan Data</h5>
            </v-card-title>
            <v-card-text class="px-0">
                <div class="v-data-table elevation-0 style-table mx-2 theme--light">
                    <div class="v-data-table__wrapper">
                        <table v-for="(element, index) in form_data.properties">
                            <tbody>
                                <tr
                                    v-for="(data, idx) in element.changes"
                                >
                                    <td v-if="showNotId(idx)">@{{ idx }}</td>
                                    <td v-if="showNotId(idx)">:</td>
                                    <td v-if="showNotId(idx)">@{{ data }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </v-card-text>
        </v-card>

        <div class="d-flex">
            <v-btn
                class="my-4 ml-auto"
    	        type="button"
    	        :disabled="field_state"
                large
                :href="redirectUri"
    	    >
                Kembali
            </v-btn>
        </div>
    </form>

    <v-snackbar
        v-model="form_alert_state"
        top
        multi-line
        :color="form_alert_color"
        elevation="5"
        timeout="6000"
    >
    	@{{ form_alert_text }}
    </v-snackbar>
</validation-observer>