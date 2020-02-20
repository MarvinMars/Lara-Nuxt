<template>
    <div class="project__totals">
        <div class="container">
            <h2 v-if="title">{{ title }}</h2>
            <div class="inner" v-if="tableData">
                <div class="table">
                    <div class="table__head" v-if="tableData.heading">
                        <span v-for="item in tableData.heading">{{ item.title }}</span>
                    </div>
                    <div class="table__body" v-if="tableData.rows">
                        <div class="item" v-for="row in tableData.rows" :class="row.row_type">
                            <div class="item_title">
                                <span v-for="item in tableData.heading">{{ item.title }}</span>
                            </div>
                            <div class="item_data">
                                <span v-for="column in row.row" :class="column.type">{{ column.value }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="caption">
                    <span v-if="tableData.caption_title">{{ tableData.caption_title }}</span>
                    <small v-if="tableData.caption_subtitle">{{ tableData.caption_subtitle }}</small>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {get as objGet, has as objHas} from "lodash"

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
            image: function () {
                return objGet(this.data, 'fields.bottom_image');
            },
            tableData: function () {
                if (!objHas(this.data, 'fields.bottom_block_table.heading') || !objHas(this.data, 'fields.bottom_block_table.rows')) {
                    return {};
                }

                try {
                    let data = this.data.fields.bottom_block_table;

                    return {
                        heading: objGet(data, 'heading'),
                        rows: objGet(data, 'rows'),
                        caption_title: objGet(data, 'caption_title'),
                        caption_subtitle: objGet(data, 'caption_subtitle'),
                    };
                } catch (ex) {
                    console.error('Can not get table data');
                }

                return {};
            }
        }
    }
</script>
