<template>
    <div class="card">
        <div class="card-header">
            Numbers
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
        name: 'numbersLayout',
        mixins: [
            layoutMixin
        ],
        data: function () {
            return {
                defaults: {
                    title: 'Google Campaign Total Revenue',
                    list: [
                        {
                            value: '$6,761.50',
                            label: 'AUG-SEP 2015',
                        },
                        {
                            value: '$333,683.57',
                            label: 'AUG-SEP 2016',
                        },
                        {
                            value: '2,008.22%',
                            label: 'INCREASE',
                        },
                    ]
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
                                {
                                    type: 'dynamic',
                                    label: 'List of numbers',
                                    model: 'list',
                                    schema: {
                                        fields: [
                                            {
                                                type: 'input',
                                                inputType: 'text',
                                                label: 'Value',
                                                model: 'value'
                                            },
                                            {
                                                type: 'input',
                                                inputType: 'text',
                                                label: 'Label',
                                                model: 'label'
                                            },
                                        ]
                                    }
                                }
                            ]
                        }
                    ],
                }
            }
        }
    }
</script>
