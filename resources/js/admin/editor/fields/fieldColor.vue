<template>
    <div class="wrapper">
        <div class="input-group mb-3">
            <input type="text" disabled="disabled" class="form-control" :value="this.value">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" @click.prevent="showPopup" type="button"><span class="fa fa-pencil"></span></button>
            </div>
        </div>
        <template v-if="popupVisible">
            <button class="btn btn-outline-dark btn-sm" @click.prevent="popupVisible = false">
                <span class="fa fa-times"></span>
            </button>
            <chrome-picker :value="colors" @input="updateColor" :disableAlpha="true" v-if="popupVisible">
            </chrome-picker>

        </template>
    </div>
</template>
<script>
    import {abstractField} from "vue-form-generator";

    import {Chrome} from 'vue-color';

    export default {
        mixins: [abstractField],
        components: {
            'chrome-picker': Chrome
        },
        computed: {
            colors: function () {
                return {
                    hex: this.oldValue,
                }
            },
        },
        data: function () {
            return {
                oldValue: null,
                popupVisible: false,
            }
        },
        mounted: function () {
            this.oldValue = this.value || '#FFFFFF';
        },
        methods: {
            updateColor: function (value) {
                if (value.hex) {
                    this.value = value.hex;
                }
            },
            showPopup: function () {
                this.popupVisible = true;
            }
        }
    };
</script>
