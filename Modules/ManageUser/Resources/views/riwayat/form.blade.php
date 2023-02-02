<validation-observer v-slot="{ validate, reset }" ref="observer">
    <form method="post" enctype="multipart/form-data" ref="post-form">
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

        <div v-for="(element, index) in form_data.properties">
            <v-card class="my-5" v-if="(element.attributes.length > 0 || Object.keys(element.attributes).length > 0) && !element.hasOwnProperty('old')">
                <v-card-title>
                    <h5>Detail Data</h5>
                </v-card-title>
                <v-card-text class="px-0">
                    <div class="v-data-table elevation-0 style-table mx-2 theme--light">
                        <div class="v-data-table__wrapper">
                            <table>
                                <tbody>
                                    <tr
                                        v-for="(data, idx) in element.attributes"
                                    >
                                        <td v-if="showNotId(idx)" style="text-transform: capitalize;">@{{ changeFormatKey(idx) }}</td>
                                        <td v-if="showNotId(idx)">:</td>
                                        <td v-if="showNotId(idx)">@{{ data }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </v-card-text>
            </v-card>

            <v-card class="my-5" v-if="(element.hasOwnProperty('old')) && (element.hasOwnProperty('changes'))">
                <v-card-title>
                    <h5>Perubahan Data</h5>
                </v-card-title>
                <v-card-text class="px-0">
                    <div class="v-data-table elevation-0 style-table mx-2 theme--light">
                        <div class="v-data-table__wrapper">
                            <table>
                                <tbody>
                                    <tr>
                                        <th colspan="2">NAME</th>
                                        <th>OLD DATA</th>
                                        <th>NEW DATA</th>
                                    </tr>
                                    <tr
                                        v-for="(data, idx) in element.changes"
                                    >
                                        <td v-if="showNotId(idx)" style="text-transform: capitalize;">@{{ changeFormatKey(idx) }}</td>
                                        <td v-if="showNotId(idx)">:</td>
                                        <td v-if="showNotId(idx)">@{{ element.old[idx] }}</td>
                                        <td v-if="showNotId(idx)">@{{ data }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </v-card-text>
            </v-card>

            <div v-if="(element.hasOwnProperty('changes')) && (!element.hasOwnProperty('old'))">
                <v-card class="my-5" v-if="element.changes.length > 0 || Object.keys(element.changes).length > 0">
                    <v-card-title>
                        <h5>Perubahan Data</h5>
                    </v-card-title>
                    <v-card-text class="px-0">
                        <div class="v-data-table elevation-0 style-table mx-2 theme--light">
                            <div class="v-data-table__wrapper">
                                <table>
                                    <tbody>
                                        <tr
                                            v-for="(data, idx) in element.changes"
                                        >
                                            <td v-if="showNotId(idx)" style="text-transform: capitalize;">@{{ changeFormatKey(idx) }}</td>
                                            <td v-if="showNotId(idx)">:</td>
                                            <td v-if="showNotId(idx)">@{{ data }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </v-card-text>
                </v-card>
            </div>
        </div>


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