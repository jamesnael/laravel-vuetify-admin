@extends('core::layouts.auth')

@section('title')
    Reset Kata Sandi
@endsection

@section('content')
    <forgot-password-form
        inline-template
        action-form="{{ route('password.email') }}"
    >
        <validation-observer v-slot="{ validate, reset }" ref="observer">
            <form method="post" enctype="multipart/form-data" ref="post-form">
                <i class="mdi mdi-account-outline"></i><small class="ml-1">Username</small>
                <validation-provider rules="required" name="Username" v-slot="{ errors }">
                    <v-text-field
                        class="mt-2"
                        v-model="form_data.username"
                        name="username"
                        clearable
                        clear-icon="mdi-eraser-variant"
                        :persistent-hint="true"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        placeholder="Masukkan username yang terdaftar"
                    ></v-text-field>
                </validation-provider>

                <div class="d-block align-center mb-4 text-right">
                    <a href="{{ route('login') }}" class="link">Ingat Sandi?</a>
                </div>
                <v-btn
                    class="mt-2 white--text"
                    color="#BD342D"
                    block
                    type="submit"
                    @click.prevent="submitForm"
                    :loading="field_state"
                    :disabled="field_state"
                >
                    Reset Kata Sandi
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
    </forgot-password-form>
@endsection
