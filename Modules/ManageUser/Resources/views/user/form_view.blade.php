<validation-observer v-slot="{ validate, reset }" ref="observer">
    <form method="post" enctype="multipart/form-data" ref="post-form">
        <v-row>
            <v-col cols="6" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Nama Lengkap</small>
                <validation-provider name="Nama Lengkap" v-slot="{ errors }">
                    <v-text-field
                    	class="mt-1"
                        v-model="form_data.nama_lengkap"
            			name="nama_lengkap"
        	    		:error-messages="errors"
        	    		:disabled="field_state"
                        outlined
                        placeholder="cth: Budi Alamsyah"
                        readonly
                    ></v-text-field>
                </validation-provider>
            </v-col>

            <v-col cols="6" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Jabatan</small>
                <validation-provider name="Jabatan" v-slot="{ errors }">
                    <v-autocomplete
                        class="mt-1"
                        v-model="form_data.group_users_id"
                        name="group_users_id"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="Pilih Jabatan"
                        :items="filterJabatan"
                        readonly
                    ></v-autocomplete>
                </validation-provider>
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="6" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Username</small>
                <validation-provider :rules="{ min:6, regex: /^[A-z0-9]+(?:[_-][a-z0-9]+)*$/ }" name="Username" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.username"
                        name="username"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="cth: budialam23"
                        readonly
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
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="cth: alamat@email.com"
                        readonly
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row>
        
        <v-row>
            <v-col cols="6" class="py-0">
                <small class="text-red">*</small><small class="ml-1">No HP Karyawan / Mitra</small>
                <validation-provider :rules="{ max: 15, min: 12, regex: /^\+\d*$/ }" name="No HP Karyawan" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.no_hp"
                        name="no_hp"
                        v-mask="'+62############'"
                        placeholder="+6281234567890"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        @keyup="validatePhoneNumber(form_data.no_hp)"
                        readonly
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="12" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Alamat Lengkap</small>
                <validation-provider name="Alamat Lengkap" v-slot="{ errors }">
                    <v-text-field
                        class="mt-1"
                        v-model="form_data.alamat_lengkap"
                        name="alamat_lengkap"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="cth: Jl. Kenangan No. 234 Kota Jakarta Timur"
                        readonly
                    ></v-text-field>
                </validation-provider>
            </v-col>
        </v-row>

        <v-row>
            <v-col cols="6" class="py-0">
                <small class="text-red">*</small><small class="ml-1">Status</small>
                <validation-provider name="Status" v-slot="{ errors }">
                    <v-autocomplete
                        class="mt-1"
                        v-model="form_data.status"
                        name="status"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="Pilih Status"
                        :items="['Aktif', 'Tidak Aktif']"
                        readonly
                    ></v-autocomplete>
                </validation-provider>
            </v-col>
        </v-row>

        <div class="d-flex">
            <v-btn
                class="my-4 ml-auto"
                type="button"
                href="{{ route('user.index') }}"
                :disabled="field_state"
                large
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