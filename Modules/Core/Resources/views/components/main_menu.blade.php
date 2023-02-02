<main-menu-component
    class="scroll-bar"
    elevation="3"
    inline-template
    :menu='@json(prepare_main_menu())'
    :profile_menu='@json(config('core.user_menu', []))'>
    <v-list 
        nav 
        dense 
        class="h-100 d-flex flex-column">
        <div class="d-block d-sm-flex mb-2">
            <v-row class="py-4 px-3">
                <v-img
                  lazy-src="/img/logo44.png"
                  max-height="40"
                  max-width="40"
                  src="/img/logo44.png"
                  class="my-auto"
                ></v-img>
                <small class="my-auto ml-4">Admin Panel</small>
            </v-row>
        </div>
        <template v-for="item in menu">
            <div v-if="item.children">
                <v-list-group       
                    v-if="item.show"
                    class="my-2"
                    :key="item.text"
                    v-model="item.model"
                    :prepend-icon="item.icon"
                    no-action
                    active-class="main-menu--active"
                >
                    <template v-slot:activator>
                        <v-list-item-content>
                            <v-list-item-title v-text="item.text"></v-list-item-title>
                        </v-list-item-content>
                    </template>

                    <v-list-item
                        v-for="(child, i) in item.children"
                        v-if="child.show"
                        :key="i"
                        v-model="child.model"
                        link
                        :href="ziggy(child.uri).url()"
                        color="primary"
                        class="pl-7 my-2"
                    >
                        <v-list-item-action v-if="child.icon" class="mr-5">
                            <v-icon small>mdi-adjust</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>
                                @{{ child.text }}
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-group>
            </div>
            <div v-else>
                <v-list-item
                    class="my-2"
                    v-if="item.show"
                    :key="item.text"
                    v-model="item.model"
                    link
                    :href="ziggy(item.uri).url()"
                    color="primary"
                >
                    <v-list-item-action>
                        <v-icon>@{{ item.icon }}</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>
                            @{{ item.text }}
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </div>
        </template>

        <div class="style-bottom-nav">
            <v-menu
                bottom
                min-width="200px"
                rounded
                offset-y
            >
                <template v-slot:activator="{ on }">
                    <v-row class="mx-2">
                        <v-btn
                            class="mt-3"
                            icon
                            x-large
                            v-on="on"
                        >
                            <v-avatar color="white" size="36">
                                <v-icon color="#2D3748">
                                    mdi-account-circle
                                </v-icon>
                            </v-avatar>
                        </v-btn>
                        <v-col>
                            <small>{{ Auth::user()->nama_lengkap }}</small><br>
                            <small class="style-text-job">{{ Auth::user()->jabatan->nama_jabatan }}<small>
                        </v-col>
                        <v-btn icon small class="mt-5 mr-1" href="{{ route('logout') }}">
                            <v-icon color="#ffffff" small>
                                mdi-logout
                            </v-icon>
                        </v-btn>
                    </v-row>
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
                                {{ Auth::user()->nama_lengkap ?? '' }}
                            </h4>
                            <v-list-item-subtitle>{{ Auth::user()->email ?? '' }}</v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
                <hr>
                <v-list dense>
                    <v-list-item-group
                        color="primary"
                    >
                        <v-list-item
                            v-for="(item, i) in profile_menu"
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
        </div>
    </v-list>
</main-menu-component>
