@extends('core::layouts.master')

@section('content')
    <v-row
	    class="px-md-4 px-sm-2">
    	<v-col cols="12">
			<table-component inline-template
				table-number
				with-actions
				uri="{{ route('riwayat.table') }}"
				:headers='@json($table_headers)'
				no-data-text="Tidak ada data ditemukan."
				no-results-text="Tidak ada data ditemukan."
				search-text="Pencarian"
				refresh-text="Muat Ulang"
				items-per-page-all-text="Semua"
				items-per-page-text="Tampilkan"
				page-text-locale="id"
				detail-uri="riwayat.detail"
				detail-uri-parameter="id"
				detail-text="Detail"
				delete-confirmation-text="Apakah Anda yakin untuk menghapus data berikut ini ?"
				delete-cancel-text="Batal"
				>
				
				@include('core::components.table')
			</table-component>
    	</v-col>
    </v-row>
@endsection
