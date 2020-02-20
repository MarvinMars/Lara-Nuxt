<template>
    <div class="card">
        <div class="card-header">
            Comparison
            <button @click.prevent="_removeLayout" class="btn btn-warning btn-sm">
                {{ schema.remove_block_label || 'Remove Layout' }}
            </button>
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    import layoutMixin from "@core/mixins/layoutMixin";

    export default {
        name: 'comparisonLayout',
        mixins: [
            layoutMixin,
        ],
        data: function () {
            return {
                defaults: {
                    title: 'YoY Website Traffic Comparison <br> (State of Georgia)',
                    left_map: {
                        image: '/img/gt-traffic-image1.png',
                        value: '112,088',
                        label: 'AUG-SEP 2015',
                    },
                    right_map: {
                        image: '/img/gt-traffic-image2.jpg',
                        value: '406,752',
                        label: 'AUG-SEP 2016',
                    },
                    percentage: {
                        image: '/img/arrow-yellow.svg',
                        value: '262.89%',
                        label: 'INCREASE IN SESSIONS',
                    }
                },
                schema: {
                    groups: [
                        {
                            fields: [
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Title',
                                    model: 'title'
                                },
                            ]
                        },
                        {
                            legend: 'Left Map',
                            fields: [
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Value',
                                    model: 'left_map.value'
                                },
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Label',
                                    model: 'left_map.label'
                                },
                                {
                                    type: 'mediaUpload',
                                    label: 'Image',
                                    onChanged: this._uploadMedia,
                                    model: 'left_map.image',
                                },
                            ]
                        },
                        {
                            legend: 'Right Map',
                            fields: [
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Value',
                                    model: 'right_map.value'
                                },
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Label',
                                    model: 'right_map.label'
                                },
                                {
                                    type: 'mediaUpload',
                                    label: 'Image',
                                    onChanged: this._uploadMedia,
                                    model: 'right_map.image',
                                },
                            ]
                        },
                        {
                            legend: 'Percentage',
                            fields: [
                                {
                                    type: 'mediaUpload',
                                    label: 'Arrow Image',
                                    onChanged: this._uploadMedia,
                                    model: 'percentage.image',
                                },
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Value',
                                    model: 'percentage.value'
                                },
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Label',
                                    model: 'percentage.label'
                                },
                            ]
                        }
                    ],
                }
            }
        }
    }
</script>
