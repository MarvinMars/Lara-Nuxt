<template>
    <div class="card">
        <div class="card-header">
            Project: Partnership
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
                    mask: 'iphone-mask',
                    image: null,
                    title: null,
                    content: null,
                    percentage: {
                        color: '#ce0f3d',
                        value: '99%',
                        icon: '/img/arrow-red.svg',
                    }
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
                            type: 'select',
                            label: 'Mask',
                            model: 'mask',
                            values: [
                                {
                                    id: 'iphone-mask',
                                    name: 'iPhone'
                                }
                            ],
                            default: 'iphone-mask',
                        },
                        {
                            type: 'mediaUpload',
                            label: 'Right image',
                            onChanged: this._uploadMedia,
                            model: 'image',
                            help: 'For iPhone mask <code>320x690</code> recommended.'
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Title',
                            model: 'title',
                        },
                        {
                            type: 'wysiwyg',
                            inputType: 'text',
                            label: 'Content',
                            model: 'content',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Percentage color',
                            model: 'percentage.color',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Percentage value',
                            model: 'percentage.value',
                        },
                        {
                            type: 'mediaUpload',
                            label: 'Percentage Icon',
                            onChanged: this._uploadMedia,
                            model: 'percentage.icon',
                        },
                    ]
                }
            };
        },
    }
</script>

