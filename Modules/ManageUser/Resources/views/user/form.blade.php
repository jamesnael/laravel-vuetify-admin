<validation-observer v-slot="{ validate, reset }" ref="observer">
    <form method="post" enctype="multipart/form-data" ref="post-form">
        <v-row>
            <v-col cols="6" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Nama Lengkap</small>
                <validation-provider rules="required" name="Nama Lengkap" v-slot="{ errors }">
                    <v-text-field
                    	class="mt-1"
                        v-model="form_data.nama_lengkap"
            			name="nama_lengkap"
            			clearable
            			clear-icon="mdi-eraser-variant"
        	    		:error-messages="errors"
        	    		:disabled="field_state"
                        outlined
                        placeholder="cth: Budi Alamsyah"
                    ></v-text-field>
                </validation-provider>
            </v-col>

            <v-col cols="6" class="py-0" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Jabatan</small>
                <validation-provider rules="required" name="Jabatan" v-slot="{ errors }">
                    <v-autocomplete
                        class="mt-1"
                        v-model="form_data.group_users_id"
                        name="group_users_id"
                        clearable
                        clear-icon="mdi-eraser-variant"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="Pilih Jabatan"
                        :items="filterJabatan"
                    ></v-autocomplete>
                </validation-provider>
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="6" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Username</small>
                <validation-provider :rules="{ required:true, min:6, regex: /^[A-z0-9]+(?:[_-][a-z0-9]+)*$/ }" name="Username" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.username"
                        name="username"
                        clearable
                        clear-icon="mdi-eraser-variant"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="cth: budialam23"
                    ></v-text-field>
                </validation-provider>
            </v-col>
            <v-col cols="6" class="py-0">
                <small class="mt-1 d-flex"><span class="text-red">*&nbsp;</span>Password <small v-if="dataUri" class="ml-auto"><strong>*Keep empty if you don't want change the password</strong></small></small>
                <validation-provider :rules="{ min: 8, required: dataUri == '' }" vid="password_confirmation" name="Password" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.password"
                        :append-icon="show_password ? 'mdi-eye' : 'mdi-eye-off'"
                        :type="show_password ? 'text' : 'password'"
                        @click:append="show_password = !show_password"
                        :persistent-hint="true"
                        :error-messages="errors"
                        :disabled="field_state"
                        placeholder="***********"
                        outlined
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row>
        
        <v-row>
            <v-col cols="6" class="py-0">
                <small class="text-red">*</small><small class="ml-1">No HP Karyawan / Mitra</small>
                <validation-provider :rules="{ required: true, max: 15, min: 12, regex: /^\+\d*$/ }" name="No HP Karyawan" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.no_hp"
                        name="no_hp"
                        clearable
                        clear-icon="mdi-eraser-variant"
                        v-mask="'+62############'"
                        placeholder="+6281234567890"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        @keyup="validatePhoneNumber(form_data.no_hp)"
                    ></v-text-field>
                </validation-provider>
            </v-col>

            <v-col cols="6" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Alamat Email</small>
                <validation-provider rules="required|email" name="Alamat Email" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.email"
                        name="email"
                        clearable
                        clear-icon="mdi-eraser-variant"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="cth: alamat@email.com"
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="12" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Alamat Lengkap</small>
                <validation-provider rules="required" name="Alamat Lengkap" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.alamat_lengkap"
                        name="alamat_lengkap"
                        clearable
                        clear-icon="mdi-eraser-variant"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="cth: Jl. Kenangan No. 234 Kota Jakarta Timur"
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="6" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Status</small>
                <validation-provider rules="required" name="Status" v-slot="{ errors }">
                    <v-autocomplete
                        class="mt-1"
                        v-model="form_data.status"
                        name="status"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="Pilih Status"
                        :items="['Aktif', 'Tidak Aktif']"
                    ></v-autocomplete>
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