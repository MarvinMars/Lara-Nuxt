<template>
    <section class="partners">
        <div class="container">
            <h2>{{ title }}</h2>
            <span v-html="description"></span>
            <div class="partners__list" v-if="partners">
                <div class="item" v-for="partner in partners">
                    <template v-if="partner.link">
                        <a :href="partner.link" target="_blank" rel="noopener">
                            <img :src="partner.image" :alt="partner.title">
                            <span>{{ partner.title }}</span>
                        </a>
                    </template>
                    <template v-else>
                        <img :src="partner.image" :alt="partner.title">
                        <span>{{ partner.title }}</span>
                    </template>
                </div>
            </div>
            <div class="link" v-if="bottomLinkLabel && bottomLinkUrl">
                <nuxt-link :to="bottomLinkUrl">
                    <span><small :data-hover="bottomLinkLabel">{{ bottomLinkLabel }}</small></span>
                </nuxt-link>
            </div>
        </div>
    </section>
</template>

<script>
    import {get as objGet, isArray, isObject} from "lodash";

    export default {
        name: "partners",
        props: {
            data: {
                type: Object,
                default: () => {
                    return {};
                }
            }
        },
        computed: {
            title: function () {
                return objGet(this.data, 'fields.title');
            },
            description: function () {
                return objGet(this.data, 'fields.description');
            },
            partners: function () {
                const partners = objGet(this.data, 'fields.partners') || [];

                if (isArray(partners)) {
                    return partners.filter(partner => {
                        return (typeof partner.image !== 'undefined' && typeof partner.title !== 'undefined');
                    })
                }

                return [];
            },
            bottomLinkLabel: function () {
                return objGet(this.data, 'fields.bottom_link_label');
            },
            bottomLinkUrl: function () {
                return objGet(this.data, 'fields.bottom_link_url');
            }
        }
    }
</script>
