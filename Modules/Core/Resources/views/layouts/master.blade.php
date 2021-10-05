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
        <link href="{{ asset('public/css/app.css') }}{{stripos(asset('public/css/app.css'), '?') === false ? '?' : '&'}}v={{config('core.app_version')}}" rel="stylesheet">
        @yield('styles')
    </head>
    <body>
        
        <div id="page-content">
            <base-layout inline-template>
                <v-app id="content" v-cloak>
                    <v-main>
                        <!-- <v-app-bar
                            app
                            :clipped-left="$vuetify.breakpoint.lgAndUp"
                            color="#2D3748"
                            elevation="5"
                        >
                            <v-app-bar-nav-icon
                                color="white"
                                @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                            
                            <v-toolbar-title class="d-flex align-content-center flex-wrap white--text">
                                <a href="{{ route('dashboard.index') }}" class="white--text text-decoration-none">{{ config('app.name', 'Laravel') }}</a>
                            </v-toolbar-title>

                            <v-spacer></v-spacer>

                            <v-btn icon color="white">
                                <v-icon>mdi-bell-ring</v-icon>
                            </v-btn>

                            @include('core::components.user_menu')
                        </v-app-bar> -->
                        
                        <v-navigation-drawer 
                            app
                            v-model="drawer"
                            :clipped="$vuetify.breakpoint.lgAndUp"
                            color="#2F2F2F"
                            dark
                            class="style-navigation"
                        >
                            @include('core::components.main_menu')
                        </v-navigation-drawer>

                        <v-app-bar-nav-icon
                            color="black"
                            @click.stop="drawer = !drawer">
                        </v-app-bar-nav-icon>

                        @if (isset($page_title) && isset($breadcrumbs))
                            @include('core::components.breadcrumbs', [
                                'breadcrumb_title' => $page_title,
                                'breadcrumbs' => $breadcrumbs
                            ])
                        @endif

                        <v-container>
                            @yield('content')
                        </v-container>

                        <v-footer
                            app
                            color="white"
                            inset
                            class="font-weight-medium"
                        >
                            <v-col
                                cols="12"
                                class="d-flex align-content-center flex-wrap"
                            >
                                <small>
                                    <v-icon
                                        small
                                        color="black"
                                        class="mr-1"
                                    >
                                        mdi-copyright
                                    </v-icon> @{{ new Date().getFullYear() }} — {{ config('app.name', 'Laravel') }}. All Rights Reserved.
                                </small>
                            </v-col>
                        </v-footer>
                    </v-main>

                </v-app>
            </base-layout>
        </div>
        
        <script src="{{ asset('public/js/app.js') }}{{stripos(asset('public/js/app.js'), '?') === false ? '?' : '&'}}v={{config('core.app_version')}}"></script>
        @yield('scripts')
    </body>
</html>