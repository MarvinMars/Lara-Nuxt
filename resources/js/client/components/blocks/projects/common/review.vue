<template>
    <div class="project__review" :style="{ backgroundImage: background_image }" :class="project_review_class">
        <div class="container">
            <div class="inner">
                <blockquote v-if="quote" v-html="quote"></blockquote>
                <div class="author" v-if="author_name || author_position">
                    <span v-if="author_name" v-text="author_name"></span>
                    <p v-if="author_position" v-text="author_position"></p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, isObject} from "lodash";

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
            project_review_class: function () {
                return objGet(this.data, 'fields.project_class');
            },
            background_image: function () {
                return 'url("' + objGet(this.data, 'fields.background') + '")';
            },
            quote: function () {
                return objGet(this.data, 'fields.quote');
            },
            author_name: function () {
                return objGet(this.data, 'fields.author_name');
            },
            author_position: function () {
                return objGet(this.data, 'fields.author_position');
            }
        }
    }
</script>
