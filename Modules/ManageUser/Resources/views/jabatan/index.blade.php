@extends('core::layouts.master')

@section('content')
    <v-row
	    class="px-md-4 px-sm-2">
    	<v-col cols="12">
			<table-component inline-template
				table-number
				with-actions
				uri="{{ route('jabatan.table') }}"
				:headers='@json($table_headers)'
				no-data-text="Tidak ada data ditemukan."
				no-results-text="Tidak ada data ditemukan."
				search-text="Cari nama jabatan"
				refresh-text="Muat Ulang"
				items-per-page-all-text="Semua"
				items-per-page-text="Tampilkan"
				page-text-locale="id"
				add-new-uri="{{ route('jabatan.create') }}"
				add-new-text="Tambah Jabatan"
				add-new-color="#BD342D"
				edit-uri="jabatan.edit"
				edit-uri-parameter="slug"
				edit-text="Ubah"
				delete-uri="jabatan.destroy"
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
