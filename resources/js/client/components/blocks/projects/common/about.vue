<template>
    <div class="project__about">
        <div class="container">
            <div class="title">
                <h2 v-if="title" v-html="title"></h2>
                <h3 v-if="subtitle" v-text="subtitle"></h3>
            </div>
            <div class="text">
                <p v-html="description"></p>
                <a v-if="link_url" :href="link_url" target="_blank" rel="noopener">
                    <span><small v-if="link_label" :data-hover="link_label" v-text="link_label"></small></span>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, isObject} from 'lodash';

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
                return objGet(this.data, 'fields.title');
            },
            subtitle: function () {
                return objGet(this.data, 'fields.content');
            },
            link_label: function () {
                return objGet(this.data, 'fields.link_label');
            },
            link_url: function () {
                return objGet(this.data, 'fields.link_url');
            },
            description: function () {
                return objGet(this.data, 'fields.description');
            },
        }
    }
</script>
