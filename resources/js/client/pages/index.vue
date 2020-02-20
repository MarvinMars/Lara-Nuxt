<template>
    <section class="home" v-if="isHasData">
        <home_hero>
        </home_hero>
        <home_footer>
        </home_footer>
    </section>
</template>
<script>
    import {has as objHas, isObject} from 'lodash';
    import home_footer from '~/components/app/footer_hero.vue';
    import home_hero from '~/components/partials/Hero.vue';

    export default {
        layout: 'home',
        components: {
            home_hero,
            home_footer
        },
        async asyncData({app, params, store}) {
            const data = await app.$axios.$get('api/hero/home');
            const menus = await app.$axios.$get('api/menus');
            store.commit('addPage', data.data);
            store.commit('addMenus', menus.menus);
            store.commit('changeLayoutClass', 'wrapper');
        },
        computed: {
            page() {
                return this.$store.state.page || {}
            },
            isHasData: function () {
                return isObject(this.page) && objHas(this.page, 'hero.slides')
            }
        },
        head() {
            return {
                titleTemplate: this.page.title || null,
                meta: this.page.meta,
                bodyAttrs: {
                    class: 'disable-scroll',
                },
                htmlAttrs: {
                    class: 'disable-scroll'
                }
            }
        },
        data: function () {
            return {
                bodyClasses: []
            }
        },
    }
</script>

