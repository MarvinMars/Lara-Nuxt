<template>
    <div class="card">
        <div class="card-header">
            Project: Numbers with image
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
                    title: null,
                    subtitle: null,
                    background_image: '',
                    right_image: '',
                    blocks: [
                        {
                            icon: null,
                            icon_alt: null,
                            value: null,
                            description: null,
                        }
                    ]
                },
                schema: {
                    fields: [
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Title',
                            model: 'title',
                        },
                        {
                            type: 'wysiwyg',
                            label: 'Description',
                            model: 'description'
                        },
                        {
                            type: 'mediaUpload',
                            label: 'Right image',
                            onChanged: this._uploadMedia,
                            model: 'right_image'
                        },
                        {
                            type: 'mediaUpload',
                            label: 'Background image',
                            onChanged: this._uploadMedia,
                            model: 'background_image'
                        },
                        {
                            type: 'array',
                            label: 'Blocks',
                            model: 'blocks',
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
                                    icon: null,
                                    icon_alt: null,
                                    value: null,
                                    description: null,
                                },
                                schema: {
                                    fields: [
                                        {
                                            type: 'mediaUpload',
                                            label: 'Icon',
                                            onChanged: this._uploadMedia,
                                            model: 'icon',
                                        },
                                        {
                                            type: 'input',
                                            inputType: 'text',
                                            label: 'Icon Alt',
                                            model: 'icon_alt',
                                        },
                                        {
                                            type: 'input',
                                            inputType: 'text',
                                            label: 'Value',
                                            model: 'value',
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

                        },
                    ]
                }
            };
        },
    }
</script>

