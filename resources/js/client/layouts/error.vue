<template>
    <section class="error-container">
        <span>4</span>
        <span><span class="screen-reader-text">0</span></span>
        <span>4</span>

        <p>
            It looks like nothing was found at this location
        </p>
        <div class="link-container">
            <nuxt-link :to="'/'" class="more-link">Go home</nuxt-link>
        </div>
    </section>
</template>

<script>
    export default {
        layout: "home",
        props: ['error'],
        async asyncData({app, params, error, store}) {
            let menus = await app.$axios.$get('api/menus');
            store.commit('addMenus', menus.menus);

            return {};
        },
        head() {
            return {
                titleTemplate: 'Error',
                meta: {},
                bodyAttrs: {
                    class: 'wrapper inner_page error_page'
                }
            }
        },
        async mounted() {
            let menus = await this.$axios.$get('api/menus');
            this.$store.commit('addMenus', menus.menus);
        }
    }
</script>
