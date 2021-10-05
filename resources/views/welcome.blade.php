@extends('core::layouts.master')

@section('content')
    <br>
    <h1>Dashboard</h1>
    <h4 style="color: #183940" class="mt-5 pt-3">Ringkasan Statistik</h4>
    <v-row class="mt-2">
        <v-col :cols="$vuetify.breakpoint.mobile ? '12' : '3'">
            <v-card outlined>
                <v-card-subtitle>Total Perusahaan</v-card-subtitle>
                <v-card-text class="mb-3">
                    <h1 style="color:black"><i class="mdi mdi-office-building mr-2" style="color: #BD342D"></i>{{ $total_perusahaan }}</h1>
                </v-card-text>
            </v-card>
        </v-col>

        <v-col :cols="$vuetify.breakpoint.mobile ? '12' : '3'">
            <v-card outlined>
                <v-card-subtitle>Total Unit</v-card-subtitle>
                <v-card-text class="mb-3">
                    <h1 style="color:black"><i class="mdi mdi-truck mr-2" style="color: #0082D2"></i>{{ $total_unit }}</h1>
                </v-card-text>
            </v-card>
        </v-col>

        <v-col :cols="$vuetify.breakpoint.mobile ? '12' : '3'">
            <v-card outlined>
                <v-card-subtitle>Total Pegawai / Mitra</v-card-subtitle>
                <v-card-text class="mb-3">
                    <h1 style="color:black"><i class="mdi mdi-account mr-2" style="color: #BD342D"></i>{{ $total_pegawai }}</h1>
                </v-card-text>
            </v-card>
        </v-col>

        <v-col :cols="$vuetify.breakpoint.mobile ? '12' : '3'">
            <v-card outlined>
                <v-card-subtitle>Total Proyek</v-card-subtitle>
                <v-card-text class="mb-3">
                    <h1 style="color:black"><i class="mdi mdi-road-variant mr-2" style="color: #0082D2"></i>{{ $total_proyek }}</h1>
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>

    <h4 style="color: #183940" class="mt-5 pt-3">Tambah Data</h4>
    <v-row class="mt-2">
        <v-col :cols="$vuetify.breakpoint.mobile ? '12' : '3'">
            <v-card outlined>
                <v-card-text class="my-3">
                    <v-row class="mx-1">
                        <h1>
                            <i class="mdi mdi-office-building mr-2" style="color: #C0C0C0"></i>
                        </h1>
                        <h3 style="color:black">+ Tambah Perusahaan</h3>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-col>

        <v-col :cols="$vuetify.breakpoint.mobile ? '12' : '3'">
            <v-card outlined>
                <v-card-text class="my-3">
                    <v-row class="mx-1">
                        <h1>
                            <i class="mdi mdi-truck mr-2" style="color: #C0C0C0"></i>
                        </h1>
                        <h3 style="color:black">+ Tambah Unit</h3>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-col>

        <v-col :cols="$vuetify.breakpoint.mobile ? '12' : '3'">
            <v-card outlined>
                <v-card-text class="my-3">
                    <v-row class="mx-1">
                        <h1>
                            <i class="mdi mdi-account mr-2" style="color: #C0C0C0"></i>
                        </h1>
                        <h3 style="color:black">+ Tambah Pegawai</h3>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-col>

        <v-col :cols="$vuetify.breakpoint.mobile ? '12' : '3'">
            <v-card outlined>
                <v-card-text class="my-3">
                    <v-row class="mx-1">
                        <h1>
                            <i class="mdi mdi-road-variant mr-2" style="color: #C0C0C0"></i>
                        </h1>
                        <h3 style="color:black">+ Tambah Proyek</h3>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-col>
    </v-row>
@endsection
