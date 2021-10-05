<v-container>
    <v-card-title>
        <h3>{{ $breadcrumb_title }}</h3>
    </v-card-title>

    <v-card-subtitle>
        <v-breadcrumbs
            class="px-0 py-2" 
            :items='@json($breadcrumbs)'>
            <template v-slot:item="{ item }">
                <v-breadcrumbs-item
                    :href="item.href"
                    :disabled="item.disabled"
                >
                    <v-icon v-if="item.text == 'mdi-home'" v-text="item.text"></v-icon>
                    <span style="color: #74888C" v-else>@{{ item.text }}</span>
                </v-breadcrumbs-item>
            </template>
        </v-breadcrumbs>
    </v-card-subtitle>
</v-container>