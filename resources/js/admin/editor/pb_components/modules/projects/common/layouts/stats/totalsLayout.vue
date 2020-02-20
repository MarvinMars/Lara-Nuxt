<template>
    <div class="card">
        <div class="card-header">
            Totals
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
        name: 'totalsLayout',
        mixins: [
            layoutMixin
        ],
        data: function () {
            return {
                defaults: {
                    title: 'Facebook Season <br />Tickets Campaign',
                    description: '<p> developed and optimized Georgia Tech’s football and basketball Facebook campaigns. Our team' +
                    'created data driven campaigns to maximize reach and revenue for the University. Here are some of the' +
                    'results:</p>',
                    list: [
                        {
                            value: '1,370,374',
                            description: 'Impressions'
                        }
                    ]
                },
                schema: {
                    groups: [
                        {
                            fields: [
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    model: 'title',
                                    label: 'Title'
                                },
                                {
                                    type: 'wysiwyg',
                                    inputType: 'text',
                                    label: 'Description',
                                    model: 'description',
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
                                                model: 'value',
                                                label: 'Value'
                                            },
                                            {
                                                type: 'input',
                                                inputType: 'text',
                                                model: 'description',
                                                label: 'Description'
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
