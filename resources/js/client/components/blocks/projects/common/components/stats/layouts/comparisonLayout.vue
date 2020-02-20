<template>
    <div class="graphics">
        <div class="comparison">
            <h3 v-html="title"></h3>
            <div class="maps">
                <div class="row" v-if="isHasImages">
                    <div class="item col-lg-6 col-sm-12">
                        <div class="counter-item">
                            <span>{{ leftImage.value }}</span>
                            <p :style="labelsStyles">{{ leftImage.label }}</p>
                        </div>
                        <div class="image-border">
                            <img :src="leftImage.image" :alt="leftImage.label">
                        </div>
                    </div>
                    <div class="item col-lg-6 col-sm-12">
                        <div class="counter-item">
                            <span>{{ rightImage.value }}</span>
                            <p :style="labelsStyles">{{ rightImage.label }}</p>
                        </div>
                        <div class="image-border">
                            <img :src="rightImage.image" alt="rightImage.label">
                        </div>
                    </div>
                </div>
            </div>
            <div class="percents" v-if="isHasPercentage">
                <img :src="percentage.image" :alt="percentage.label" class="arrow">
                <div class="counter-item">
                    <span>{{ percentage.value }}</span>
                    <p :style="labelsStyles">{{ percentage.label }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {has as objHas, get as objGet} from 'lodash';

    export default {
        name: 'comparisonLayout',
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
            isHasPercentage: function () {
                return objHas(this.data, 'percentage.value');
            },
            isHasImages: function () {
                return objHas(this.data, 'left_map.image') && objHas(this.data, 'right_map.image');
            },
            leftImage: function () {
                console.log(this.data);
                return objGet(this.data, 'left_map');
            },
            rightImage: function () {
                return objGet(this.data, 'right_map');
            },
            percentage: function () {
                return objGet(this.data, 'percentage');
            }
        }

    }
</script>
