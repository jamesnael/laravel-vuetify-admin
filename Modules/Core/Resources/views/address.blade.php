<v-row class="address-form" cols="12">
	<v-col cols="6">
        <small class="text-red">*</small><small class="ml-1">Provinsi</small>
		<validation-provider v-slot="{ errors }" name="Nama Provinsi" :rules="provinceRules">
			<v-autocomplete
				:items="items"
				item-text="name"
				clearable
				:class="provinceClass"
				v-model="province"
				:name="provinceInputName"
				:label="provinceLabel"
				:error-messages="errors"
				@change="refreshCity"
				:disabled="disabled"
				outlined
				placeholder="Pilih Provinsi">
			</v-autocomplete>
		</validation-provider>
	</v-col>
	<v-col cols="6">
        <small class="text-red">*</small><small class="ml-1">Kabupaten / Kota</small>
		<validation-provider v-slot="{ errors }" name="Nama Kota" :rules="cityRules">
			<v-autocomplete
				:items="cityOptions"
				item-text="city"
				clearable
				:class="cityClass"
				v-model="city"
				:name="cityInputName"
				:label="cityLabel"
				:error-messages="errors"
				@change="refreshDistrict"
				:disabled="disabled"
				outlined
				placeholder="Pilih Kabupaten / Kota">
			</v-autocomplete>
		</validation-provider>
	</v-col>
</v-row>