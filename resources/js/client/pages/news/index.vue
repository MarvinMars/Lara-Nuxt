<template>
    <section class="news">
        <news__hero v-if="hero" :data="hero">
        </news__hero>
        <template v-if="data">
            <news__top :data="data">
            </news__top>
            <news__recently :data="data">
            </news__recently>
        </template>
    </section>
</template>

<script>
    import {has as objHas, isArray, isObject} from "lodash";
    import news__hero from '~/components/blocks/news/news__hero.vue';
    import news__recently from '~/components/blocks/news/news__recently.vue';
    import news__top from '~/components/blocks/news/news__top.vue';

    export default {
        components: {
            news__hero,
            news__recently,
            news__top,
        },
        data: function () {
            return {
                data: [],
                hero: [],
                intersectionOptions: {
                    root: null,
                    rootMargin: '0px 0px 0px 0px',
                    thresholds: [0]
                },
                activeWaypoint: true
            }
        },
        async asyncData({app, params, error, store}) {
            let menus = await app.$axios.$get('api/menus');
            let data = await app.$axios.$get(`api/posts`);

            store.commit('addPage', {
                header_subtitle: 'news'
            });
            store.commit('addMenus', menus.menus);
            return {
                data: objHas(data, 'data') ? data.data : [],
                hero: data.hero,
            }
        },
        head: function () {
            return {
                titleTemplate: ' | News | Full Service Agency | Development and Digital Marketing',
            }
        },
    }
</script>
