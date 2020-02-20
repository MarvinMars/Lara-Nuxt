<template>
    <div class="card">
        <div class="card-header">
            Project Campaign Totals
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated" :options="formOptions">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                formOptions: {
                    validateAsync: true
                },
                defaults: {
                    title: '',
                    bottom_block_table: {
                        heading: [
                            {
                                title: 'Source'
                            },
                            {
                                title: 'Impressions',
                            },
                            {
                                title: 'Total Clicks',
                            },
                            {
                                title: 'CTR'
                            }
                        ],
                        rows: [
                            {
                                row_type: 'standard',
                                row: [
                                    {
                                        type: 'name',
                                        value: 'Facebook'
                                    },
                                    {
                                        type: null,
                                        value: '999,999'
                                    },
                                    {
                                        type: null,
                                        value: '6,410'
                                    },
                                    {
                                        type: null,
                                        value: '0,87'
                                    }
                                ]
                            },
                            {
                                row_type: 'total',
                                row: [
                                    {
                                        type: 'name',
                                        value: 'Total'
                                    },
                                    {
                                        type: null,
                                        value: '6,261,892'
                                    },
                                    {
                                        type: null,
                                        value: '32,872'
                                    },
                                ]
                            },
                        ],
                        caption_title: '12.17x',
                        caption_subtitle: 'return on investment',
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
                                    model: 'title',
                                },
                            ]
                        },
                        {
                            legend: 'Table',
                            fields: [
                                {
                                    type: 'array',
                                    label: 'Bottom Block Table Heading',
                                    model: 'bottom_block_table.heading',
                                    showRemoveButton: true,
                                    showModeElementUpButton: true,
                                    showModeElementDownButton: true,
                                    itemFieldClasses: "form-control",
                                    itemContainerClasses: "card card-body card-block pb-2",
                                    newElementButtonLabelClasses: "btn btn-success btn-block",
                                    removeElementButtonClasses: "btn btn-danger",
                                    moveElementUpButtonClasses: "btn btn-outline-dark",
                                    moveElementDownButtonClasses: "btn btn-outline-dark",
                                    newElementButtonLabel: 'Add Heading Column',
                                    items: {
                                        type: 'object',
                                        default: {
                                            title: null
                                        },
                                        schema: {
                                            fields: [
                                                {
                                                    type: 'input',
                                                    inputType: 'text',
                                                    label: 'Title',
                                                    model: 'title',
                                                },
                                            ]
                                        }
                                    },
                                },
                                {
                                    type: 'array',
                                    label: 'Bottom Block Table Rows',
                                    model: 'bottom_block_table.rows',
                                    showRemoveButton: true,
                                    showModeElementUpButton: true,
                                    showModeElementDownButton: true,
                                    itemFieldClasses: "form-control",
                                    itemContainerClasses: "card card-body card-block pb-2",
                                    newElementButtonLabelClasses: "btn btn-success btn-block",
                                    removeElementButtonClasses: "btn btn-danger",
                                    moveElementUpButtonClasses: "btn btn-outline-dark",
                                    moveElementDownButtonClasses: "btn btn-outline-dark",
                                    removeElementButtonLabel: 'Remove Table Row',
                                    newElementButtonLabel: 'Add Table Row',
                                    items: {
                                        type: 'object',
                                        default: {
                                            row_type: 'standard',
                                            row: [],
                                        },
                                        schema: {
                                            fields: [
                                                {
                                                    type: 'select',
                                                    label: 'Row Type',
                                                    model: 'row_type',
                                                    values: [
                                                        {id: 'standard', name: "Standard"},
                                                        {id: 'total', name: "Totals"},
                                                    ],
                                                    default: 'standard',
                                                },
                                                {
                                                    type: "array",
                                                    label: "Table Row",
                                                    model: "row",
                                                    inputName: "row",
                                                    validator: "array",
                                                    showRemoveButton: true,
                                                    showModeElementUpButton: true,
                                                    showModeElementDownButton: true,
                                                    itemFieldClasses: "form-control",
                                                    itemContainerClasses: "card card-body card-block pb-2",
                                                    newElementButtonLabelClasses: "btn btn-success btn-block",
                                                    removeElementButtonClasses: "btn btn-danger",
                                                    moveElementUpButtonClasses: "btn btn-outline-dark",
                                                    moveElementDownButtonClasses: "btn btn-outline-dark",
                                                    newElementButtonLabel: 'Add Row Value',
                                                    removeElementButtonLabel: 'Remove Row Value',
                                                    items: {
                                                        type: 'object',
                                                        default: {
                                                            type: 'standard',
                                                            value: null,
                                                        },
                                                        schema: {
                                                            fields: [
                                                                {
                                                                    type: 'select',
                                                                    label: 'Type',
                                                                    model: 'type',
                                                                    values: [
                                                                        {id: 'standard', name: "Standard"},
                                                                        {id: 'name', name: "Name"},
                                                                    ],
                                                                    default: 'standard',
                                                                },
                                                                {
                                                                    type: 'input',
                                                                    inputType: 'text',
                                                                    label: 'Value',
                                                                    model: 'value',
                                                                },
                                                            ]
                                                        }
                                                    }
                                                },
                                            ]
                                        }
                                    }
                                },
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Caption Title',
                                    model: 'bottom_block_table.caption_title',
                                },
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    label: 'Caption Subtitle',
                                    model: 'bottom_block_table.caption_subtitle',
                                }
                            ]
                        }
                    ],
                }
            };
        },
    }
</script>
