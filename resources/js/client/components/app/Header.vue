<template>
    <header class="header">
        <div class="header__logo">
            <nuxt-link to="/" @click.native="hideMenu" class="logo">
                <span class="sr-only">Go Home</span>
            </nuxt-link>
            <template v-if="pageTitleUrl">
                <nuxt-link :to="pageTitleUrl">
                    <span>{{ pageTitle }}</span>
                </nuxt-link>
            </template>
            <template v-else>
                <span>{{ pageTitle }}</span>
            </template>

        </div>
        <div class="header__nav" :class="headerNavClasses">
            <a href="#" :class="viewSwitchClasses" @click.prevent="changeLayout">
                <span></span>
                <span></span>
                <small class="sr-only">View</small>
            </a>
            <button class="hamb"
                    :class="{ open: isOpened }"
                    @click="navSlide">
                <span></span>
                <span></span>
                <span></span>
                <small class="sr-only">Open Menu</small>
            </button>
            <div class="menu"
                 :class="{ opened: isOpened }">
                <div class="inner">
                    <ul v-if="menus">
                        <template v-for="(item,index) in menus">
                            <li :key="index">
                                <nuxt-link :to="item.url" @click.native="hideMenu">
                                    {{ item.label }}
                                </nuxt-link>
                            </li>
                        </template>
                    </ul>
                    <div class="email">
                        <a href="mailto:''">''</a>
                    </div>
                    <div class="social">
                        <template v-for="(item,index) in social">
                            <a :key="index"
                               :href="item.url"
                               target="_blank"
                               rel="noopener">
                                {{ item.label }}
                            </a>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script type="text/javascript">
    import {get as objGet, isObject} from 'lodash';

    export default {
        name: 'Header',
        data() {
            return {
                defaultActiveItem: null,
                isOpened: false,
            }
        },
        computed: {
            menus() {
                return this.$store.state.menus.header
            },
            social() {
                return this.$store.state.menus.social
            },
            view() {
                return this.$store.state.view
            },
            isVerticalLayout: function () {
                return this.$store.state.verticalLayout;
            },
            page: function () {
                return this.$store.state.page || {};
            },
            viewSwitchClasses: function () {
                let classes = [
                    'view',
                ];

                if (this.isVerticalLayout) {
                    classes.push('view--vertical');
                } else {
                    classes.push('view--horizontal');
                }

                return classes.join(' ');
            },
            headerNavClasses: function () {
                let classes = [];

                if (!this.isVerticalLayout) {
                    classes.push(' ');
                }

                return classes.join('');
            },
            pageTitle: function () {
                return objGet(this.page, 'header_subtitle') || null;
            },
            pageTitleUrl: function () {
                return objGet(this.page, 'header_subtitle_url') || false;
            }
        },
        created: function () {
            if (this.$router && this.$router.history.current) {
                this.defaultActiveItem = this.$router.history.current.path;
            }
        },
        methods: {
            navSlide: function () {
                this.isOpened = !this.isOpened;
                this.$store.commit('menuState', this.isOpened);
            },
            hideMenu: function () {
                this.$store.commit('menuState', false);
                this.isOpened = false;
            },
            changeLayout: function () {
                this.hideMenu();
                this.$store.commit('toggleVerticalLayoutState');
            }
        }
    }
</script>
