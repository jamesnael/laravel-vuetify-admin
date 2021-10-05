@extends('core::layouts.master')

@section('content')
    <v-row
	    class="px-md-4 px-sm-2">
    	<v-col cols="12">
			<jabatan-form
				inline-template
				action-form="{{ route('jabatan.update', [ $data->slug ]) }}"
				redirect-uri="{{ route('jabatan.index') }}"
				data-uri="{{ route('jabatan.data', [ $data->slug ]) }}"
				:hak-akses='@json($data->hak_akses)'
				:filter-menu='@json($menu)'>
    			@include('manageuser::jabatan.form')
    		</jabatan-form>
    	</v-col>
    </v-row>
@endsection
