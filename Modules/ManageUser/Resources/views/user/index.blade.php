@extends('core::layouts.master')

@push('table_slot')
<template v-slot:item.email="{ item }">
    <a :href="'mailto:' + item.email">@{{ item.email }}</a>
</template>

<template v-slot:item.status="{ item }">
    <v-chip
        :color="item.status == 'Aktif' ? 'green' : 'red'"
        text-color="white"
    >
        @{{ item.status.toUpperCase() }}
    </v-chip>
</template>
@endpush

@section('content')
    <v-row
	    class="px-md-4 px-sm-2">
    	<v-col cols="12">
			<table-component inline-template
				table-number
				with-actions
				uri="{{ route('user.table') }}"
				:headers='@json($table_headers)'
				no-data-text="Tidak ada data ditemukan."
				no-results-text="Tidak ada data ditemukan."
				search-text="Cari data karyawan"
				refresh-text="Muat Ulang"
				items-per-page-all-text="Semua"
				items-per-page-text="Tampilkan"
				page-text-locale="id"
				add-new-uri="{{ route('user.create') }}"
				add-new-text="Tambah Karyawan"
				add-new-color="#BD342D"
				edit-uri="user.edit"
				edit-uri-parameter="slug"
				edit-text="Ubah"
				view-uri="user.view"
				view-uri-parameter="slug"
				view-text="View"
				delete-uri="user.destroy"
				delete-uri-parameter="slug"
				delete-text="Hapus"
				delete-confirmation-text="Apakah Anda yakin untuk menghapus data berikut ini ?"
				delete-cancel-text="Batal"
				>
				
				@include('core::components.table')
			</table-component>
    	</v-col>
    </v-row>
@endsection
