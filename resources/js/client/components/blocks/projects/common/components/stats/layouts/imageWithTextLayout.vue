<template>
    <div class="graphics">
        <div class="image-with-text">
            <div class="row">
                <div class="text col-lg-5 col-sm-12">
                    <h3 v-html="title"></h3>
                    <div v-html="content"></div>
                </div>
                <div class="image col-lg-7 col-sm-12">
                    <img v-if="image" :src="image"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet} from 'lodash';

    export default {
        name: 'imageWithTextLayout',
        props: {
            data: {
                type: Object,
                required: true,
            },
            labelsStyles: {
                type: Array,
                required: false,
                default: function () {
                    return [];
                }
            }
        },
        computed: {
            title: function () {
                return objGet(this.data, 'title');
            },
            content: function () {
                return objGet(this.data, 'content');
            },
            image: function () {
                return objGet(this.data, 'image');
            }
        }
    }
</script>

