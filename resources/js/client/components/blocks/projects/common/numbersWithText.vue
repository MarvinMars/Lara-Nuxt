<template>
    <div class="project__numbers_text">
        <div class="container">
            <h2 v-if="title">{{ title }}</h2>
            <div class="row">
                <div class="numbers__text col-lg-6 col-sm-12" v-html="description"></div>
                <div class="numbers__list col-lg-6 col-sm-12">
                    <div class="inner">
                        <div class="item" v-for="block in blocks" v-if="blocks">
                            <div class="heading">
                                <img v-if="block.icon" :src="block.icon" :alt="block.icon_alt">
                                <span v-if="block.value" v-text="block.value"></span>
                            </div>
                            <p v-if="block.description" v-html="block.description"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, has as objHas, isArray} from "lodash";

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
            description: function () {
                return objGet(this.data, 'fields.description');
            },
            blocks: function () {
                let blocks = [];
                if (objHas(this.data, 'fields.blocks') && isArray(objGet(this.data, 'fields.blocks'))) {
                    blocks = this.data.fields.blocks.map(block => {
                        return {
                            icon: objGet(block, 'icon'),
                            icon_alt: objGet(block, 'icon_alt'),
                            value: objGet(block, 'value'),
                            description: objGet(block, 'description'),
                        }
                    })
                }
                return blocks;
            }
        }
    }
</script>
