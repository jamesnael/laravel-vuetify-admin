@extends('core::layouts.master')

@section('content')
    <v-row
	    class="px-md-4 px-sm-2">
    	<v-col cols="12">
			<user-form
				inline-template
				action-form="{{ route('user.update', [ $data->slug ]) }}"
				redirect-uri="{{ route('user.index') }}"
				data-uri="{{ route('user.data', [ $data->slug ]) }}"
				:filter-jabatan='@json($jabatan)'
				:filter-city='@json($city)'>
    			@include('manageuser::user.form_view')
    		</user-form>
    	</v-col>
    </v-row>
@endsection
