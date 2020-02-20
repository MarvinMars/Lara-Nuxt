<template>
    <div class="card">
        <div class="card-header">
            Arkansas: Project Overview
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                defaults: {
                    background: '',
                    title: '',
                    description: '',
                    numbers: [
                        {
                            image: '',
                            title: '',
                            description: '',
                        }
                    ],
                    screenshot_image: '',
                    screenshot_title: '',
                    screenshot_description: '',
                    bottom_block_title: 'SEO Takeaways & Results',
                    bottom_block_content: '',
                    bottom_block_table: {
                        heading: [
                            {
                                title: 'Campaign',
                            },
                            {
                                title: 'clicks',
                            },
                            {
                                title: 'impressions ctr'
                            }
                        ],
                        rows: [
                            {
                                row: [
                                    {
                                        type: 'name',
                                        value: ''
                                    },
                                    {
                                        type: null,
                                        value: ''
                                    },
                                    {
                                        type: null,
                                        value: ''
                                    }
                                ]
                            },
                        ],
                        caption_title: '97.68x',
                        caption_subtitle: 'return on investment',
                    }
                },
                schema: {
                    fields: [
                        {
                            type: 'mediaUpload',
                            label: 'Backgound Image',
                            onChanged: this._uploadMedia,
                            model: 'background',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Title',
                            model: 'title',
                        },
                        {
                            type: 'wysiwyg',
                            label: 'Description',
                            model: 'description',
                        },
                        {
                            type: 'dynamic',
                            label: 'Numbers',
                            model: 'numbers',
                            schema: {
                                fields: [
                                    {
                                        type: 'mediaUpload',
                                        label: 'Image',
                                        onChanged: this._uploadMedia,
                                        model: 'image',
                                    },
                                    {
                                        type: 'input',
                                        inputType: 'text',
                                        label: 'Title',
                                        model: 'title',
                                    },
                                    {
                                        type: 'input',
                                        inputType: 'text',
                                        label: 'Description',
                                        model: 'description',
                                    },
                                ]
                            }
                        },
                        {
                            type: 'mediaUpload',
                            label: 'Screenshot Image',
                            onChanged: this._uploadMedia,
                            model: 'screenshot_image',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Screenshot Block Title',
                            model: 'screenshot_title',
                        },
                        {
                            type: 'wysiwyg',
                            label: 'Screenshot Block Description',
                            model: 'screenshot_description',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Bottom Block Title',
                            model: 'bottom_block_title',
                        },
                        {
                            type: 'wysiwyg',
                            label: 'Bottom Block Content',
                            model: 'bottom_block_content',
                        },
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
                },
            };
        },
    }
</script>
