@extends('core::layouts.auth')

@section('title')
    Masuk Admin Panel
@endsection

@section('content')
    <login-form
        inline-template
        action-form="{{ route('post-login') }}"
    >
        <validation-observer v-slot="{ validate, reset }" ref="observer">
            <form method="post" enctype="multipart/form-data" ref="post-form">
                <i class="mdi mdi-account-outline"></i><small class="ml-1">Username</small>
                <validation-provider rules="required" name="Username" v-slot="{ errors }">
                    <v-text-field
                        class="my-2"
                        v-model="form_data.username"
                        name="username"
                        clearable
                        clear-icon="mdi-eraser-variant"
                        :persistent-hint="true"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="cth: jamesnael23"
                    ></v-text-field>
                </validation-provider>

                <i class="mdi mdi-lock-outline"></i><small class="ml-1">Kata Sandi</small>
                <validation-provider rules="required" name="Kata Sandi" v-slot="{ errors }">
                    <v-text-field
                        class="my-2"
                        v-model="form_data.password"
                        name="password"
                        :append-icon="show_password ? 'mdi-eye-off' : 'mdi-eye'"
                        :type="show_password ? 'text' : 'password'"
                        @click:append="show_password = !show_password"
                        clearable
                        clear-icon="mdi-eraser-variant"
                        :persistent-hint="true"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="**********"
                    ></v-text-field>
                </validation-provider>

                <div class="d-block d-sm-flex align-center mb-4 mb-sm-0 mx-2">
                    <v-row>
                        <v-checkbox
                            v-model="form_data.selected"
                            label="Ingat Saya?"
                            name="remember"
                            :disabled="field_state"
                        ></v-checkbox>
                        <div class="ml-auto my-auto">
                            <a href="{{ route('password.request') }}" class="link">Lupa Sandi?</a>
                        </div>
                        
                    </v-row>
                </div>

                <v-btn
                    class="mr-4 white--text"
                    color="#BD342D"
                    block
                    type="submit"
                    @click.prevent="submitForm"
                    :loading="field_state"
                    :disabled="field_state"
                >
                    Masuk
                    <template v-slot:loader>
                        <span class="custom-loader">
                            <v-icon light>mdi-cached</v-icon>
                        </span>
                    </template>
                </v-btn>

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
            </form>
        </validation-observer>
    </login-form>
@endsection
