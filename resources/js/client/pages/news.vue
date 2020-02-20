<template>
    <section class="wrapper inner_page">
        <Header></Header>
        <nuxt-child>
        </nuxt-child>
        <footer_main>
        </footer_main>
</section>
</template>

<script>
    import footer_main from '~/components/app/footer_main';
    export default {
        async asyncData({ app, store }) {
            let menus = await app.$axios.$get('api/menus');
            let settings = await app.$axios.$get('api/settings');
            store.commit('addSettings', settings.settings);
            store.commit('addMenus',  menus.menus);
        },
        components: {
            Header: () => import('~/components/app/Header.vue'),
            footer_main
        },
        data () {
            return {
                menu:[],
                social:[],
            }
        },
    }
</script>
