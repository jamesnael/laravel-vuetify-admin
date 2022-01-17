<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="/favicon.ico" />

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap" rel="stylesheet">
        <link href="{{ mix('public/css/app.css') }}{{stripos(mix('public/css/app.css'), '?') === false ? '?' : '&'}}v={{config('core.app_version')}}" rel="stylesheet">
        @yield('styles')
    </head>
    <body>
        
        <div id="page-content">
            <base-layout inline-template>
                <v-app id="content" v-cloak>
                    <v-main class="login">
                        <v-container
                            class="fill-height justify-center"
                        >
                            <v-row
                                align="center"
                                justify="center"
                            >
                                <v-col
                                    xl="6"
                                    lg="6"
                                    sm="8"
                                >
                                    <v-row
                                        align="center"
                                        justify="center"
                                        class="mt-5"
                                    >
                                        <v-col lg="4">
                                            <v-img
                                              lazy-src="/img/logo44.png"
                                              max-height="80"
                                              max-width="80"
                                              src="/img/logo44.png"
                                              class="mb-3"
                                            ></v-img>
                                        </v-col>
                                        <v-col lg="8" align="right" justify="right">
                                            <h3 class="mb-5 mt-5">@yield('title')</h3>
                                        </v-col>
                                    </v-row>
                                    <v-card class="elevation-4" light>
                                        <v-row>
                                            <v-col
                                                lg="12"
                                            >
                                                <div class="pa-7 pa-sm-12">
                                                    @yield('content')
                                                </div>
                                            </v-col>
                                        </v-row>
                                    </v-card>
                                    <v-row
                                        align="center"
                                        justify="center"
                                        class="mt-5 mx-5"
                                    >
                                        <small class="mt-5">2021 &copy; James Nathanael. All Rights Reserved.</small>
                                    </v-row>

                                </v-col>
                            </v-row>

                        </v-container>
                    </v-main>

                </v-app>
            </base-layout>
        </div>
        
        <script src="{{ mix('public/js/app.js') }}{{stripos(mix('public/js/app.js'), '?') === false ? '?' : '&'}}v={{config('core.app_version')}}"></script>
        @yield('scripts')
    </body>
</html>