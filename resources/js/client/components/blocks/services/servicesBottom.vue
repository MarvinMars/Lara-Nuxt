<template>
    <section>
        <section class="services-banner" :style="{ backgroundImage: backgroundImageUrl }">
            <div class="container">
                <div class="text">
                    <h2>{{ title }}</h2>
                    <span v-html="content"></span>
                </div>
                <div class="link">
                    <nuxt-link :to="bottomLinkUrl">
                        <span><small :data-hover="bottomLinkLabel">{{ bottomLinkLabel }}</small></span>
                    </nuxt-link>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
    export default {
        name: "servicesBottom",
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
        computed: {
            backgroundImageUrl: function () {
                return 'url("' + (this.data.fields.background || '') + '")';
            },
            content: function () {
                return this.data.fields.content || '';
            },
            title: function () {
                return this.data.fields.title || '';
            },
            bottomLinkUrl: function () {
                return this.data.fields.bottom_link_url || '/contact-us';
            },
            bottomLinkLabel: function () {
                return this.data.fields.bottom_link_label || '';
            }
        }
    }
</script>
