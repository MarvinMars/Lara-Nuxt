<template>
    <div class="card">
        <div class="card-header">
            Project screenshot
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
                    title: '',
                    subtitle: '',
                    description: '',
                    image: '',
                    image_alt: ''
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
                            type: 'input',
                            inputType: 'text',
                            label: 'Subtitle',
                            model: 'subtitle',
                        },
                        {
                            type: 'wysiwyg',
                            label: 'Description',
                            model: 'description',
                        },
                        {
                            type: 'mediaUpload',
                            label: 'Image',
                            onChanged: this._uploadMedia,
                            model: 'image',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Image Alt Text',
                            model: 'image_alt',
                        },
                    ]
                }
            };
        },
    }
</script>
