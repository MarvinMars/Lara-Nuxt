<template>
    <div class="graphics">
        <div class="title">
            <h2 v-html="title"></h2>
            <div v-html="description"></div>
        </div>
        <template v-for="values in list">
            <div class="list">
                <div class="counter-item" v-for="item in values">
                    <span>{{ item.value }}</span>
                    <p :style="labelsStyles">{{ item.description }}</p>
                </div>
            </div>
        </template>

    </div>
</template>

<script>
    import {chunk, get as objGet, has as objHas} from 'lodash';

    export default {
        name: 'totalsLayout',
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
            description: function () {
                return objGet(this.data, 'description');
            },
            list: function () {
                if (!objHas(this.data, 'list')) {
                    return [];
                }

                return chunk(this.data.list.filter(item => {
                    return {
                        value: objGet(item, 'value'),
                        description: objGet(item, 'description'),
                    }
                }), 4);
            }
        }
    }
</script>
