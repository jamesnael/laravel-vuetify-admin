<v-card
	flat>
	<v-row class="ml-0">
		<v-col
	    	:cols="$vuetify.breakpoint.mobile ? '6' : '6'"
	    	>
	    	<v-text-field
		    	v-model="search"
	            :label="searchText"
	            :prepend-inner-icon="searchIcon"
	            @keyup="searchDatatable()"
	        ></v-text-field>
		</v-col>
		<v-col
	    	:cols="$vuetify.breakpoint.mobile ? '6' : '6'"
	    	align="right">
			<v-btn
				class="ma-2"
			    elevation="5"
			    color="primary"
			    :loading="loading"
			    @click="dataHandler()"
			    >
			    <v-icon>@{{ refreshIcon }}</v-icon>
			    <!-- <span class="hidden-xs-only ml-2">@{{ refreshText }}</span> -->
			    <template v-slot:loader>
		            <span class="custom-loader">
		              	<v-icon color="white">@{{ refreshIcon }}</v-icon>
		            </span>
		        </template>
		    </v-btn>
		    @if (in_array(str_replace('index', 'create', Route::currentRouteName()), Auth::user()->jabatan ? Auth::user()->jabatan->hak_akses : []))
		    	<v-btn
					v-if="addNewUri"
					:href="addNewUri"
					class="ma-2 white--text"
				    elevation="5"
				    :color="addNewColor"
				    >
				    <v-icon>@{{ addNewIcon }}</v-icon>
				    <span class="hidden-xs-only ml-2">@{{ addNewText }}</span>
			    </v-btn>
		    @endif

		    <v-btn
				v-if="bulkUpdateUri"
				:loading="field_state"
				class="ma-2 white--text"
			    elevation="5"
			    :color="bulkUpdateColor"
			    :disabled="bulkUpdateDisabled"
			    
			    @click.stop="promptBulkItem()"
			    >
			    <span class="hidden-xs-only">@{{ bulkUpdateText }}</span>
		    </v-btn>

		    <v-btn
				v-if="bulkUpdateUriSecond"
				:loading="field_state_second"
			    @click="submitBulkUpdateSecond()"
				class="ma-2 white--text"
			    elevation="5"
			    :color="bulkUpdateColorSecond"
			    >
			    <span class="hidden-xs-only">@{{ bulkUpdateTextSecond }}</span>
		    </v-btn>

		    <slot name="btnslot"></slot>
		</v-col>
	</v-row>

	<v-data-table
		v-model="data_table"
		class="elevation-0 style-table mx-2"
		hide-default-footer
		@page-count="pageCount = $event"
		:show-select="withSelect"
		:page.sync="page"
		:headers="table_headers"
		:items="table_items"
		:options.sync="options"
		:server-items-length="total_data"
		:loading="loading"
	    :footer-props="{
			showFirstLastPage: true,
			firstIcon: 'mdi-chevron-double-left',
			lastIcon: 'mdi-chevron-double-right',
			prevIcon: 'mdi-chevron-left',
			nextIcon: 'mdi-chevron-right',
			itemsPerPageAllText: itemsPerPageAllText,
			itemsPerPageText: itemsPerPageText,
			pageText: pageTextLocale == 'en' ? 'Showing ' + from_data + ' - ' + to_data + ' from ' + total_data + ' data' : 'Menampilkan ' + from_data + ' - ' + to_data + ' dari total ' + total_data + ' data'
	    }"
    >
		@foreach ($table_headers as $element)
			<template v-slot:header.{{$element['value']}}="{ header }">
			    <strong>@{{ header.text.toUpperCase() }}</strong>
			</template>
		@endforeach
		<template v-slot:header.table_index="{ header }">
		    <strong>@{{ header.text.toUpperCase() }}</strong>
		</template>
		<template v-slot:header.actions="{ header }">
		    <strong>@{{ header.text.toUpperCase() }}</strong>
		</template>
		<template v-slot:no-data>
		    @{{ noDataText }}
		</template>
		<template v-slot:no-results>
		    @{{ noResultsText }}
		</template>
		<template v-slot:item.actions="{ item }">
		    @if (in_array(str_replace('index', 'detail', Route::currentRouteName()), Auth::user()->jabatan ? Auth::user()->jabatan->hak_akses : []))
			<v-tooltip top :color="detailColor">
			    <template v-slot:activator="{ on, attrs }">
		    		<v-btn 
			    		v-if="detailUri" 
			    		icon 
			    		:color="detailColor" 
			    		v-bind="attrs" 
			    		v-on="on" 
			    		:href="detailParamsUri(item)"
		    		>
						<v-icon small>@{{ detailIcon }}</v-icon>
		            </v-btn>
			    </template>
			    <span>@{{ detailText }}</span>
			</v-tooltip>
			@endif

			<v-tooltip top :color="viewColor">
			    <template v-slot:activator="{ on, attrs }">
		    		<v-btn 
			    		v-if="viewUri" 
			    		icon 
			    		:color="viewColor" 
			    		v-bind="attrs" 
			    		v-on="on" 
			    		:href="ziggy(viewUri, [item[viewUriParameter]]).url()"
		    		>
						<v-icon small>@{{ viewIcon }}</v-icon>
		            </v-btn>
			    </template>
			    <span>@{{ viewText }}</span>
			</v-tooltip>

		    @if (in_array(str_replace('index', 'approve', Route::currentRouteName()), Auth::user()->jabatan ? Auth::user()->jabatan->hak_akses : []))
			<v-tooltip top :color="approveColor">
			    <template v-slot:activator="{ on, attrs }">
		    		<v-btn v-if="approveUri && approveCondition(item)" icon :color="approveColor" v-bind="attrs" v-on="on" @click.stop="promptApproveItem(item)">
						<v-icon small>@{{ approveIcon }}</v-icon>
		            </v-btn>
			    </template>
			    <span>@{{ approveText }}</span>
			</v-tooltip>
			@endif

		    @if (in_array(str_replace('index', 'edit', Route::currentRouteName()), Auth::user()->jabatan ? Auth::user()->jabatan->hak_akses : []))
				<v-tooltip top :color="editColor">
				    <template v-slot:activator="{ on, attrs }">
			    		<v-btn 
				    		v-if="editUri" 
				    		icon 
				    		:color="editColor" 
				    		v-bind="attrs" 
				    		v-on="on" 
				    		:href="editParamsUri(item)"
			    		>
							<v-icon small>@{{ editIcon }}</v-icon>
			            </v-btn>
				    </template>
				    <span>@{{ editText }}</span>
				</v-tooltip>
			@endif

			<v-tooltip top :color="printColor">
			    <template v-slot:activator="{ on, attrs }">
		    		<v-btn 
			    		v-if="printUri" 
			    		icon 
			    		:color="printColor" 
			    		v-bind="attrs" 
			    		v-on="on" 
			    		:href="printParamsUri(item)"
			    		target="_blank"
		    		>
						<v-icon small>@{{ printIcon }}</v-icon>
		            </v-btn>
			    </template>
			    <span>@{{ printText }}</span>
			</v-tooltip>

			<v-tooltip top :color="approveDetailColor">
	    		<template v-slot:activator="{ on, attrs }">
	    			<v-btn 
			    		v-if="approveDetailUri" 
			    		icon 
			    		:color="approveDetailColor" 
			    		v-bind="attrs" 
			    		v-on="on" 
			    		:href="approveDetailParamsUri(item)"
	    		    >
	    				<v-icon small>@{{ approveDetailIcon }}</v-icon>
	    		    </v-btn>
	    		</template>
	    		<span>@{{ approveDetailText }}</span>
	    	</v-tooltip>

		    @if (in_array(str_replace('index', 'destroy', Route::currentRouteName()), Auth::user()->jabatan ? Auth::user()->jabatan->hak_akses : []))
				<v-tooltip top :color="deleteColor">
				    <template v-slot:activator="{ on, attrs }">
			    		<v-btn v-if="deleteUri" icon :color="deleteColor" v-bind="attrs" v-on="on" @click.stop="promptDeleteItem(item)">
							<v-icon small>@{{ deleteIcon }}</v-icon>
			            </v-btn>
				    </template>
				    <span>@{{ deleteText }}</span>
				</v-tooltip>
			@endif
			
		</template>
		<template v-slot:item.table_index="{ item }">
			<strong>@{{ item.table_index }}</strong>
		</template>
		@stack('table_slot')
	</v-data-table>

  	<v-pagination
  		class="style-pagination py-4"
    	v-model="page"
    	:length="pageCount"
    	:total-visible="10"
      	color="#BD342D"
  	></v-pagination>

	<v-dialog
		v-model="prompt_delete"
		persistent
		max-width="450px"
	>
		<v-card>
			<v-card-title>
					<span class="headline"></span>
			</v-card-title>
			<v-card-text>
			    <v-row
					align="center"
					justify="center"
					class="py-3"
		        >
					<v-icon size="90" color="orange lighten-2">mdi-alert-circle-outline</v-icon>
			    </v-row>
			    <div
			    	class="container"
					align="center"
					justify="center"
		        >
					<h3>
						@{{ deleteConfirmationText }}
					</h3>
			    </div>

			</v-card-text>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn text :disabled="delete_loader" @click="prompt_delete = false">@{{ deleteCancelText }}</v-btn>
	    		<v-btn
	    			class="white--text"
	    		    elevation="5"
	    		    color="red"
	    		    :disabled="delete_loader"
	    		    :loading="delete_loader"
	    		    @click="deleteItem()"
	    		    >
	    		    <v-icon>@{{ deleteIcon }}</v-icon>
	    		    <span class="hidden-xs-only ml-2">@{{ deleteText }}</span>
	    		    <template v-slot:loader>
			            <span class="custom-loader">
			              	<v-icon color="white">@{{ deleteIcon }}</v-icon>
			            </span>
			        </template>
			    </v-btn>
	        </v-card-actions>
		</v-card>
	</v-dialog>

	<v-dialog
		v-model="prompt_approve"
		persistent
		max-width="450px"
	>
		<v-card>
			<v-card-title>
				<span class="headline"></span>
			</v-card-title>
			<v-card-text>
				<v-row
					align="center"
					justify="center"
					class="py-3"
		        >
					<v-icon size="90" color="orange lighten-2">mdi-alert-circle-outline</v-icon>
			    </v-row>
			    <div
			    	class="container"
					align="center"
					justify="center"
		        >
					<h3>
						@{{ approveConfirmationText }}
					</h3>
			    </div>
			</v-card-text>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn text :disabled="approve_loader" @click="prompt_approve = false">@{{ approveCancelText }}</v-btn>
	    		<v-btn
	    			class="white--text"
	    		    elevation="5"
	    		    color="#bd342d"
	    		    :disabled="approve_loader"
	    		    :loading="approve_loader"
	    		    @click="approveItem()"
	    		    >
	    		    <v-icon>@{{ approveIcon }}</v-icon>
	    		    <span class="hidden-xs-only ml-2">@{{ approveText }}</span>
	    		    <template v-slot:loader>
			            <span class="custom-loader">
			              	<v-icon color="white">@{{ approveIcon }}</v-icon>
			            </span>
			        </template>
			    </v-btn>
	        </v-card-actions>
		</v-card>
	</v-dialog>

	<v-dialog
		v-model="prompt_bulk_update"
		persistent
		max-width="450px"
	>
		<v-card>
			<v-card-title>
				<span class="headline"></span>
			</v-card-title>
			<v-card-text>
				<v-row
					align="center"
					justify="center"
					class="py-3"
		        >
					<v-icon size="90" color="orange lighten-2">mdi-alert-circle-outline</v-icon>
			    </v-row>
			    <div
			    	class="container"
					align="center"
					justify="center"
		        >
					<h3>
						@{{ bulkConfirmationText }}
					</h3>
			    </div>
			</v-card-text>
			<v-card-actions>
				<v-spacer></v-spacer>
				<v-btn text :disabled="field_state" @click="prompt_bulk_update = false">@{{ bulkCancelText }}</v-btn>
	    		<v-btn
	    			class="white--text"
	    		    elevation="5"
	    		    color="#bd342d"
	    		    :disabled="field_state"
	    		    :loading="field_state"
	    		    @click="submitBulkUpdate()"
	    		    >
	    		    <!-- <v-icon>@{{ bulkUpdateIcon }}</v-icon> -->
	    		    <span class="hidden-xs-only ml-2">@{{ bulkUpdateText }}</span>
	    		    <template v-slot:loader>
			            <span class="custom-loader">
			              	<v-icon color="white">@{{ bulkUpdateIcon }}</v-icon>
			            </span>
			        </template>
			    </v-btn>
	        </v-card-actions>
		</v-card>
	</v-dialog>

	<v-snackbar
	    v-model="table_alert"
	    top
	    multi-line
	    :color="table_alert_state"
	    elevation="5"
	    timeout="6000"
	>
		@{{ table_alert_text }}

	    <template v-slot:action="{ attrs }">
	        <v-btn
	          	icon
	          	v-bind="attrs"
	          	@click="table_alert = false"
	        >
	          	<v-icon>mdi-close</v-icon>
	        </v-btn>
	    </template>
	</v-snackbar>
</v-card>