<template>
    <section class="wrapper2">
        <Header>
        </Header>
        <contact_us>
        </contact_us>
    </section>
</template>

<script>
    import Header from '~/components/app/Header.vue';
    import contact_us from '~/components/blocks/contact-us.vue';

    export default {
        components: {
            Header,
            contact_us
        },
        async asyncData({app, store}) {
            let menus = await app.$axios.$get('api/menus');
            store.commit('addPage', {
                header_subtitle: null
            });
            store.commit('addMenus', menus.menus);
        },
        head: function () {
            return {
                titleTemplate: '',
                meta: [
                    {
                        hid: 'description',
                        name: 'description',
                        content: 'Have a project you’re interested in discussing with ? We work with small and large businesses. Drop us a line, we’d love to connect',
                    },
                    {
                        hid: 'keywords',
                        name: 'keywords',
                        content: ''
                    }
                ],
            }
        },
    }
</script>
