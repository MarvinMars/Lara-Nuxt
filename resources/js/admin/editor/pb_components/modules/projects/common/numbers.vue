<template>
    <div class="card">
        <div class="card-header">
            Project: Numbers
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
                    background_image: null,
                    title: null,
                    subtitle: null,
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
                            type: 'mediaUpload',
                            label: 'Background Image',
                            onChanged: this._uploadMedia,
                            model: 'background_image',
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
                            label: 'Subtitle',
                            model: 'subtitle',
                        },
                        {
                            type: 'dynamic',
                            label: 'Blocks',
                            model: 'blocks',
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
                        }
                    ]
                }
            };
        },
    }
</script>

