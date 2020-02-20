<template>
    <section :class="classes">
        <Header></Header>
        <nuxt>
        </nuxt>
    </section>
</template>

<script>
    export default {
        name: "home",
        components: {
            Header: () => import('~/components/app/Header.vue'),
        },
        computed: {
            classes() {
                return this.$store.state.layout_class
            },
        },
    }
</script>
