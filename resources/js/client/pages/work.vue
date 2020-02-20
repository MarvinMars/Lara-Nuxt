<template>
    <div v-if="isHasData">
        <work>
        </work>
    </div>
</template>

<script>
    import {has as objHas, isObject} from 'lodash';
    import work from '~/components/partials/Work.vue';

    export default {
        layout: 'home',
        components: {
            work
        },
        computed: {
            page() {
                return this.$store.state.page || {}
            },
            isHasData: function () {
                return isObject(this.page) && objHas(this.page, 'hero.slides') && this.page.hero.slides.length > 0;
            }
        },
        head: function () {
            return {
                titleTemplate: this.page.title || null,
                meta: this.page.meta,
                bodyAttrs: {
                    class: 'layout__switcher',
                }
            }
        },
        async asyncData({app, store}) {
            let menus = await app.$axios.$get('api/menus');
            let data = await app.$axios.$get('api/hero/work');
            store.commit('addMenus', menus.menus);
            store.commit('addPage', data.data);
            store.commit('changeLayoutClass', 'wrapper inner_page');
        }
    }
</script>
