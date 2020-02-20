<template>
    <div class="card">
        <div class="card-header">
            Columns and circle layout
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
        name: 'columnsAndCircleLayout',
        mixins: [
            layoutMixin
        ],
        data: function () {
            return {
                defaults: {
                    title: 'Facebook Demographics',
                    columns: {
                        yAxis: 'age',
                        max: 32,
                        yLabels: [
                            {
                                label: '0.00%',
                            },
                            {
                                label: '8.00%'
                            },
                            {
                                label: '16.00%'
                            },
                            {
                                label: '24.00%'
                            },
                            {
                                label: '32.00%'
                            },
                        ],
                        xAxis: [
                            {
                                value: 8,
                                top_color: '#daa822',
                                bottom_color: '#e9dbbc',
                                label: '18-24'
                            },
                            {
                                value: 99,
                                top_color: '#daa822',
                                bottom_color: '#e9dbbc',
                                label: '18-24'
                            },
                            {
                                value: 14,
                                top_color: '#daa822',
                                bottom_color: '#e9dbbc',
                                label: '18-24'
                            },
                            {
                                value: 59,
                                top_color: '#daa822',
                                bottom_color: '#e9dbbc',
                                label: '18-24'
                            },
                            {
                                value: 10,
                                top_color: '#daa822',
                                bottom_color: '#e9dbbc',
                                label: '18-24'
                            },
                        ]
                    },
                    pie: {
                        label: 'gender',
                        data: [
                            {
                                label: 'Male (71%)',
                                color: '#daa822',
                                value: 71
                            },
                            {
                                label: 'Female (29%)',
                                color: '#e9dbbc',
                                value: 29,
                            },
                        ],
                    }
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
                            ]
                        },
                        {
                            legend: 'Columns',
                            fields: [
                                {
                                    type: 'input',
                                    inputType: 'text',
                                    model: 'columns.yAxis',
                                    label: 'Y Axis Label'
                                },
                                {
                                    type: 'input',
                                    inputType: 'number',
                                    label: 'Max value for the tables',
                                    model: 'columns.max',
                                    hint: 'Maximum value by Y axis. Using to calculate real column\'s height'
                                },
                                {
                                    type: 'array',
                                    label: 'Y Axis Labels',
                                    model: 'columns.yLabels',
                                    showRemoveButton: true,
                                    showModeElementUpButton: true,
                                    showModeElementDownButton: true,
                                    itemFieldClasses: "form-control",
                                    itemContainerClasses: "card card-body card-block pb-2",
                                    newElementButtonLabelClasses: "btn btn-success btn-block",
                                    removeElementButtonClasses: "btn btn-danger",
                                    moveElementUpButtonClasses: "btn btn-outline-dark",
                                    moveElementDownButtonClasses: "btn btn-outline-dark",
                                    items: {
                                        type: 'object',
                                        default: {
                                            label: null
                                        },
                                        schema: {
                                            fields: [
                                                {
                                                    type: 'input',
                                                    inputType: 'text',
                                                    model: 'label',
                                                    label: 'Label'
                                                },
                                            ]
                                        }
                                    },

                                },
                                {
                                    type: 'array',
                                    label: 'X Axis',
                                    model: 'columns.xAxis',
                                    showRemoveButton: true,
                                    showModeElementUpButton: true,
                                    showModeElementDownButton: true,
                                    itemFieldClasses: "form-control",
                                    itemContainerClasses: "card card-body card-block pb-2",
                                    newElementButtonLabelClasses: "btn btn-success btn-block",
                                    removeElementButtonClasses: "btn btn-danger",
                                    moveElementUpButtonClasses: "btn btn-outline-dark",
                                    moveElementDownButtonClasses: "btn btn-outline-dark",
                                    items: {
                                        type: 'object',
                                        default: {
                                            label: null,
                                            value: 0,
                                            top_color: '#daa822',
                                            bottom_color: '#e9dbbc',
                                        },
                                        schema: {
                                            fields: [
                                                {
                                                    type: 'input',
                                                    inputType: 'text',
                                                    model: 'label',
                                                    label: 'Label'
                                                },
                                                {
                                                    type: 'input',
                                                    inputType: 'number',
                                                    max: 100,
                                                    min: 0,
                                                    step: 1,
                                                    model: 'value',
                                                    label: 'Value'
                                                },
                                                {
                                                    type: 'color',
                                                    label: 'Column top color',
                                                    model: 'top_color',
                                                },
                                                {
                                                    type: 'color',
                                                    label: 'Column bottom color',
                                                    model: 'bottom_color',
                                                },
                                            ]
                                        }
                                    }
                                },
                            ]
                        },
                        {
                            legend: 'Pie',
                            fields: [
                                {
                                    type: 'dynamic',
                                    label: 'Pie Data',
                                    add_block_label: 'Add Pie Data',
                                    remove_block_label: 'Remove Pie Data',
                                    model: 'pie.data',
                                    schema: {
                                        fields: [
                                            {
                                                type: 'input',
                                                inputType: 'text',
                                                model: 'label',
                                                label: 'Label'
                                            },
                                            {
                                                type: 'color',
                                                label: 'Color',
                                                model: 'color',
                                            },
                                            {
                                                type: 'input',
                                                inputType: 'number',
                                                max: 100,
                                                min: 0,
                                                step: 1,
                                                model: 'value',
                                                label: 'Value'
                                            },
                                        ]
                                    }
                                },
                            ]
                        }
                    ],
                }
            }
        }
    }
</script>
