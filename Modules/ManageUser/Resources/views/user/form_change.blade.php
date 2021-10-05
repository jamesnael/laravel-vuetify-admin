<validation-observer v-slot="{ validate, reset }" ref="observer">
    <form method="post" enctype="multipart/form-data" ref="post-form">
        <small class="ml-1">Username</small>
        <validation-provider rules="required" name="Username" v-slot="{ errors }">
            <v-text-field
                class="mb-2 mt-1"
            	v-model="form_data.username"
                name="username"
                :persistent-hint="true"
                :error-messages="errors"
                :readonly="true"
                outlined
            ></v-text-field>
        </validation-provider>

        <small class="ml-1">Password Baru</small>
        <validation-provider rules="required|min:8" vid="password_confirmation" name="Password" v-slot="{ errors }">
            <v-text-field
                class="mb-2 mt-1"
                v-model="form_data.password"
                :append-icon="show_password ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show_password ? 'text' : 'password'"
                @click:append="show_password = !show_password"
                :persistent-hint="true"
                :error-messages="errors"
                :disabled="field_state"
                placeholder="**********"
                outlined
            ></v-text-field>
        </validation-provider>

        <small class="ml-1">Konfirmasi Password Baru</small>
        <validation-provider rules="required|confirmed:password_confirmation" name="Konfirmasi Password" v-slot="{ errors }">
            <v-text-field
                class="mb-2 mt-1"
                v-model="form_data.password_confirmation"
                :append-icon="show_confirm_password ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show_confirm_password ? 'text' : 'password'"
                @click:append="show_confirm_password = !show_confirm_password"
                :persistent-hint="true"
                :error-messages="errors"
                :disabled="field_state"
                placeholder="**********"
                outlined
            ></v-text-field>
        </validation-provider>

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