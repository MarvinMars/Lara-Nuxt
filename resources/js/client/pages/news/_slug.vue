<template>
    <div>
        <div v-if="typeof(page.blocks) !== 'undefined' && page.blocks.length">
            <template v-for="component in page.blocks">
                <component v-if="isComponentExists(component.name)"
                           :published_at="page.published_at_format"
                           :is="component.name"
                           :data="component">
                </component>
            </template>
            <div class="next-project next-project--news">
                <div class="container">
                    <nuxt-link to="/news">
                        Back To News
                    </nuxt-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Error from "../../layouts/error";
    import {isComponentExists} from "../../mixins/isComponentExistsMixin";
    import {isArray, isObject} from "lodash";

    export default {
        mixins: [
            isComponentExists
        ],
        async asyncData({app, params, error, store}) {
            let menus = await app.$axios.$get('api/menus');
            let data = await app.$axios.$get(`api/post/${params.slug}`);
            store.commit('addMenus', menus.menus);
            store.commit('addPage', data.data);
        },
        head() {
            return {
                titleTemplate: this.page.title || null,
                meta: this.page.meta
            }
        },
        components: {
            Error,
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
    }
</script>

