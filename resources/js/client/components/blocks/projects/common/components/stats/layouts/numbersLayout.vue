<template>
    <div class="graphics">
        <div class="numbers">
            <h3 v-html="title">Google Campaign Total Revenue</h3>
            <div class="list" v-for="items in list">
                <div class="counter-item" v-for="item in items">
                    <span>{{ item.value }}</span>
                    <p :style="labelsStyles">{{ item.label }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {chunk, get as objGet, has as objHas} from 'lodash';

    export default {
        name: 'numbersLayout',
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
            list: function () {
                if (!objHas(this.data, 'list')) {
                    return {};
                }

                return chunk(this.data.list, 3);
            }
        },
    }
</script>
