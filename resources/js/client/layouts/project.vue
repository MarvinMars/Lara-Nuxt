<template>
    <section class="wrapper">
        <Header></Header>
        <div class="slide inner_page active animation_repeat">
            <nuxt :nuxtChildKey="routerViewKey">
            </nuxt>
        </div>
    </section>
</template>

<script>
    export default {
        name: "project",
        components: {
            Header: () => import('~/components/app/Header.vue'),
        },
        computed: {
            classes() {
                return this.$store.state.layout_class
            },
            routerViewKey() {
                // If current route has children
                if (this.$route.matched.length > 1) {
                    return compile(this.$route.matched[0].path)(this.$route.params)
                }
                return this.$route.fullPath.split('?')[0].split('#')[0]
            }
        },
    }
</script>
