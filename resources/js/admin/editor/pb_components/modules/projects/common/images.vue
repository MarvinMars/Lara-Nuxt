<template>
    <div class="card">
        <div class="card-header">
            Project: Images Block
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
                    left_images: [
                        {
                            background_color: null,
                            type: 'default',
                            image: null
                        }
                    ],
                    right_images: [
                        {
                            background_color: null,
                            type: 'default',
                            image: null
                        }
                    ],
                },
                schema: {
                    fields: [
                        {
                            type: 'dynamic',
                            label: 'Left Images',
                            model: 'left_images',
                            schema: {
                                fields: [
                                    {
                                        type: 'color',
                                        label: 'Background Color',
                                        help: 'Will be used for transparent images such a logo',
                                        model: 'background_color',
                                    },
                                    {
                                        type: 'select',
                                        label: 'Image Type',
                                        model: 'type',
                                        required: true,
                                        values: [
                                            {
                                                id: 'default',
                                                name: 'Default',
                                            },
                                            {
                                                id: 'logo',
                                                name: 'Logo',
                                            },
                                            {
                                                id: 'tall',
                                                name: 'Tall',
                                            },
                                        ],
                                        default: 'default'
                                    },
                                    {
                                        type: 'mediaUpload',
                                        label: 'Image',
                                        onChanged: this._uploadMedia,
                                        model: 'image',
                                    },
                                ]
                            }
                        },
                        {
                            type: 'dynamic',
                            label: 'Right Images',
                            model: 'right_images',
                            schema: {
                                fields: [
                                    {
                                        type: 'color',
                                        label: 'Background Color',
                                        help: 'Will be used for transparent images such a logo',
                                        model: 'background_color',
                                    },
                                    {
                                        type: 'select',
                                        label: 'Image Type',
                                        model: 'type',
                                        required: true,
                                        values: [
                                            {
                                                id: 'default',
                                                name: 'Default',
                                            },
                                            {
                                                id: 'big',
                                                name: 'Big',
                                            }
                                        ],
                                        default: 'default'
                                    },
                                    {
                                        type: 'mediaUpload',
                                        label: 'Image',
                                        onChanged: this._uploadMedia,
                                        model: 'image',
                                    },
                                ]
                            }
                        },
                    ]
                }
            };
        },
    }
</script>
