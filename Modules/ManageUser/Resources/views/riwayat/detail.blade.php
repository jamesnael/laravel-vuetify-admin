@extends('core::layouts.master')

@section('content')
    <v-row
	    class="px-md-4 px-sm-2">
    	<v-col cols="12">
			<riwayat-form
				inline-template
				action-form=""
				redirect-uri="{{ route('riwayat.index') }}"
                data-uri="{{ route('riwayat.data', [ $data->id ]) }}">
    			@include('manageuser::riwayat.form')
    		</riwayat-form>
    	</v-col>
    </v-row>
@endsection
