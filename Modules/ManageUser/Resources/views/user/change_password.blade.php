@extends('core::layouts.master')

@section('content')
    <v-row
	    class="px-md-4 px-sm-2">
    	<v-col cols="12">
			<user-form
				inline-template
				action-form="{{ route('change-password.update', [ Auth::user()->slug ]) }}"
				data-change-uri="{{ route('user.data', [ Auth::user()->slug ]) }}"
				redirect-uri="{{ route('dashboard.index') }}">
    			@include('manageuser::user.form_change')
    		</user-form>
    	</v-col>
    </v-row>
@endsection
