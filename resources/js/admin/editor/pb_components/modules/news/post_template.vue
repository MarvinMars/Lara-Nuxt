<template>
    <div class="card">
        <div class="card-header">
            News : Template
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated"></vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                defaults: {
                    image: '',
                    title: '',
                    preview_title: '',
                    description: '',
                    preview_description: ''
                },
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
                            hint: 'Small title for list categories',
                            label: 'Preview Title',
                            model: 'preview_title',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            hint: 'Title for post page',
                            label: 'Title',
                            model: 'title',
                        },
                        {
                            type: 'wysiwyg',
                            hint: 'Description for post page',
                            label: 'Description',
                            model: 'description',
                        },
                        {
                            type: 'wysiwyg',
                            hint: 'Small description for list categories',
                            label: 'Small preview description',
                            model: 'preview_description',
                        },
                    ]
                }
            };
        },
    }
</script>