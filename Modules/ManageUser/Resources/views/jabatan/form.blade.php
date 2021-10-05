<validation-observer v-slot="{ validate, reset }" ref="observer">
    <form method="post" enctype="multipart/form-data" ref="post-form">
        <v-row>
            <v-col cols="6">
                <small class="text-red">*</small><small class="ml-1">Nama Jabatan</small>
                <validation-provider rules="required" name="Nama Jabatan" v-slot="{ errors }">
                    <v-text-field
                    	class="mt-1"
                        v-model="form_data.nama_jabatan"
            			name="nama_jabatan"
            			clearable
            			clear-icon="mdi-eraser-variant"
        	    		:error-messages="errors"
        	    		:disabled="field_state"
                        outlined
                        placeholder="cth: Admin"
                    ></v-text-field>
                </validation-provider>
            </v-col>

            <v-col cols="6">
                <small class="text-red">*</small><small class="ml-1">Keterangan</small>
                <validation-provider rules="required" name="Keterangan" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.keterangan"
                        name="keterangan"
                        clearable
                        clear-icon="mdi-eraser-variant"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="cth: Keterangan"
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row>

        <v-row v-if="form_data.nama_jabatan != 'Operator' && form_data.nama_jabatan != 'Driver'">
            <v-col cols="12">
                <small class="ml-1">Hak Akses</small>
                <validation-provider rules="" name="Alamat Email" v-slot="{ errors }">
                    <div class="my-2 mb-4">
                        <v-btn depressed small dark color="#BD342D" @click.prevent="selectAll">Pilih Semua</v-btn>
                        <v-btn depressed small class="mx-3" @click.prevent="clearSelect">Hapus</v-btn>
                    </div>
                    <v-divider class="my-4"></v-divider>
                    <div v-if="refreshCK">
                        <v-row>
                        <v-col
                            cols="4"
                            v-for="(element, index) in filterMenu"
                            :key="index"
                            class="pl-3 mt-6"
                        >
                            <small class="mb-0"><strong>@{{ index }}</strong></small>
                            
                            <v-checkbox
                                v-for="akses in element"
                                v-model="form_data.hak_akses"
                                name="hak_akses[]"
                                :label="akses.deskripsi"
                                :value="akses.name"
                                hide-details
                                class="mt-2"
                                :disabled="field_state"
                            ></v-checkbox>
                        </v-col>
                    </v-row>
                    </div>
                </validation-provider>
            </v-col>
        </v-row>

        <div class="d-flex">
            <v-btn
            	class="my-4 mr-4 ml-auto"
              	:loading="field_state"
              	:disabled="field_state"
                color="#BD342D"
                dark
                large
                @click="submitForm"
            >
                Simpan
                <template v-slot:loader>
                    <span class="custom-loader">
                      	<v-icon light>mdi-cached</v-icon>
                    </span>
                </template>
            </v-btn>
            <v-btn
                class="my-4"
    	        type="button"
    	        @click="clearForm"
    	        :disabled="field_state"
                large
    	    >
                Hapus
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