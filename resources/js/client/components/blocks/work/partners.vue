<template>
    <section class="partners">
        <div class="container">
            <h2>{{ title }}</h2>
            <span v-html="description"></span>
            <div class="partners__list">
                <div class="item" v-for="partner in partners">
                    <template v-if="partner.link">
                        <a :href="partner.link" target="_blank" rel="noopener">
                            <img :src="partner.image">
                        </a>
                    </template>
                    <template v-else>
                        <img :src="partner.image" :alt="partner.title">
                    </template>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import {get as objGet, has as objHas, isArray, isObject} from "lodash";

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
                        return objHas(partner, 'image');
                    })
                }

                return [];
            },
        }
    }
</script>
