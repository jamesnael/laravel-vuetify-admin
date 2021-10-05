@extends('core::layouts.master')

@section('content')
    <v-row
	    class="px-md-4 px-sm-2">
    	<v-col cols="12">
			<jabatan-form
				inline-template
				action-form="{{ route('jabatan.store') }}"
				redirect-uri="{{ route('jabatan.index') }}"
                :filter-menu='@json($menu)'>
    			@include('manageuser::jabatan.form')
    		</jabatan-form>
    	</v-col>
    </v-row>
@endsection
