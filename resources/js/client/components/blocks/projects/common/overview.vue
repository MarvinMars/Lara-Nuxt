<template>
    <div class="project__about_overview"
         :style="{ backgroundImage: backgroundImageUrl }">
        <div class="container" v-if="isHasContent">
            <div class="text">
                <h2 v-if="title" v-html="title"></h2>
                <div v-if="description" v-html="description"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, isEmpty} from "lodash";

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
            backgroundImageUrl: function () {
                return 'url("' + objGet(this.data, 'fields.background') + '")';
            },
            title: function () {
                return objGet(this.data, 'fields.title');
            },
            description: function () {
                return objGet(this.data, 'fields.description');
            },
            isHasContent: function () {
                return !isEmpty(this.description) && !isEmpty(this.title);
            }
        }
    }
</script>
