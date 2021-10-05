<main-menu-component
    inline-template
    :menu='@json(config('core.user_menu', []))'>
    <v-menu
        bottom
        min-width="200px"
        rounded
        offset-y
    >
        <template v-slot:activator="{ on }">
            <v-btn
                icon
                x-large
                v-on="on"
                class="mr-1"
            >
                <v-avatar color="white" size="36">
                    <v-icon color="#2D3748">
                        mdi-account-circle
                    </v-icon>
                </v-avatar>
            </v-btn>
        </template>
        <v-list>
            <v-list-item class="my-3">
                <v-avatar color="#2D3748" size="60">
                    <v-icon size="50" dark>
                        mdi-account-circle
                    </v-icon>
                </v-avatar>
                <v-list-item-content class="ml-4">
                    <h4>
                        {{ Auth::user()->name ?? '' }}
                    </h4>
                    <v-list-item-subtitle>{{ Auth::user()->email ?? '' }}</v-list-item-subtitle>
                </v-list-item-content>
            </v-list-item>
        </v-list>
        <v-divider></v-divider>
        <v-list dense>
            <v-list-item-group
                color="primary"
            >
                <v-list-item
                    v-for="(item, i) in menu"
                    :key="i"
                    :href="ziggy(item.uri).url()"
                    class="my-1"
                >
                    <v-list-item-icon>
                        <v-icon v-text="item.icon"></v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title v-text="item.text"></v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list-item-group>
        </v-list>
    </v-menu>
</main-menu-component>
