<template>
    <div class="next-project">
        <div class="container">
            <nuxt-link :to="button_url">
                <h2 v-if="title" v-html="title"></h2>
                {{button_label}}
            </nuxt-link>
        </div>
    </div>
</template>

<script>
    import {get as objGet, isArray, isEmpty} from "lodash";

    export default {
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
                return objGet(this.data, 'fields.title') || '';
            },
            button_label: function () {
                return objGet(this.data, 'fields.button_label') || '';
            },
            button_url: function () {
                return objGet(this.data, 'fields.button_url') || '';
            },
        }
    }
</script>

