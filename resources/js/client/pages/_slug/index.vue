<template>
    <section class="home"
             v-if="page && page.hasOwnProperty('hero') && typeof(page.hero) !== 'undefined' && page.hero.slides.length ">
        <template v-if="page.hero.template === 'homepage' ">
            <Hero>
            </Hero>
            <Footer>
            </Footer>
        </template>
        <template v-if="page.hero.template === 'work' ">
            <Work>
            </Work>
        </template>
    </section>
    <section class="about news" v-else-if="page.blocks !== undefined && page.blocks.length">
        <section v-for="(component,key) in page.blocks"
                 :key='key'>
            <component :is="component.name" v-if="isComponentExists(component.name)"
                       :data="component">
            </component>
        </section>
    </section>
</template>

<script>
    import Error from "../../layouts/error";
    import Footer from '~/components/app/footer_hero.vue';
    import contactUs from '~/components/blocks/contact-us.vue';
    import Hero from '~/components/partials/Hero.vue';
    import Work from '~/components/partials/Work.vue';
    import {isComponentExists} from "../../mixins/isComponentExistsMixin";

    export default {
        layout: 'header_footer',
        mixins: [
            isComponentExists
        ],
        async asyncData({app, params, error, store}) {
            let menus = await app.$axios.$get('api/menus');
            let data = await app.$axios.$get(`api/page/${params.slug}`);
            let settings = await app.$axios.$get('api/settings');
            store.commit('addSettings', settings.settings);
            store.commit('addMenus', menus.menus);
            store.commit('addPage', data.data);
            store.commit('changeLayoutClass', 'wrapper inner_page');
        },
        head() {
            return {
                titleTemplate: this.page.title || null,
                meta: this.page.meta || []
            }
        },
        components: {
            Error,
            Footer,
            contactUs,
            Hero,
            Work
        },
        validate({params, query, store}) {
            return true
        },
        computed: {
            page: function () {
                return this.$store.state.page || {}
            },
            notFound: function () {
                return null === this.$store.state.page;
            }
        },
        data() {
            return {}
        },
        methods: {}
    }
</script>
