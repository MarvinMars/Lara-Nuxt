<template>
    <section :class="classes">
        <Header></Header>
            <nuxt/>
        <footer_main></footer_main>
    </section>
</template>

<script>
    export default {
        name: "header_footer",
        components: {
            Header: () => import('~/components/app/Header.vue'),
            footer_main: () => import('~/components/app/footer_main.vue'),
        },
        computed: {
            classes () { return this.$store.state.layout_class },
        },
    }
</script>
