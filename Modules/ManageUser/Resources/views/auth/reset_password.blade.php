@extends('core::layouts.auth')

@section('title')
    Atur Ulang Kata Sandi
@endsection

@section('content')
    <reset-password-form
        inline-template
        token="{{ $token }}"
        action-form="{{ route('password.update') }}"
    >
        <validation-observer v-slot="{ validate, reset }" ref="observer">
            <form method="post" enctype="multipart/form-data" ref="post-form">
                <i class="mdi mdi-email-outline"></i><small class="ml-1">Alamat Email</small>
                <validation-provider rules="required|email" name="Alamat Email" v-slot="{ errors }">
                    <v-text-field
                        class="mt-2 mb-3"
                        value="{{ $email }}"
                        name="email"
                        :persistent-hint="true"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        readonly
                    ></v-text-field>
                </validation-provider>

                <i class="mdi mdi-account-outline"></i><small class="ml-1">Username</small>
                <validation-provider rules="required" name="Username" v-slot="{ errors }">
                    <v-text-field
                        class="mt-2 mb-3"
                        value="{{ $username }}"
                        name="username"
                        :persistent-hint="true"
                        :error-messages="errors"
                        :disabled="field_state"
                        outlined
                        readonly
                    ></v-text-field>
                </validation-provider>

                <i class="mdi mdi-lock-outline"></i><small class="ml-1">Kata Sandi</small>
                <validation-provider rules="required|min:8" vid="password_confirmation" name="Password" v-slot="{ errors }">
                    <v-text-field
                        class="mt-2 mb-3"
                        v-model="form_data.password"
                        name="password"
                        :append-icon="show_password ? 'mdi-eye' : 'mdi-eye-off'"
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

                <i class="mdi mdi-lock-outline"></i><small class="ml-1">Konfirmasi Kata Sandi</small>
                <validation-provider rules="required|confirmed:password_confirmation" name="Konfirmasi Password" v-slot="{ errors }">
                    <v-text-field
                        class="mt-2 mb-3"
                        v-model="form_data.password_confirmation"
                        name="password_confirmation"
                        :append-icon="show_password ? 'mdi-eye' : 'mdi-eye-off'"
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

                <v-btn
                    class="mr-4"
                    dark
                    color="#BD342D"
                    block
                    type="submit"
                    @click.prevent="submitForm"
                    :loading="field_state"
                    :disabled="field_state"
                >
                    Atur Ulang Password
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
    </reset-password-form>
@endsection
