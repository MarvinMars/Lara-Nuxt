<template>
    <div class="card">
        <div class="card-header">
            Project: Overview Block
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
                    description: ''

                },
                schema: {
                    fields: [
                        {
                            type: 'mediaUpload',
                            label: 'Background Image',
                            onChanged: this._uploadMedia,
                            model: 'background',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            hint: 'Keep it blank to show only image',
                            label: 'Title',
                            model: 'title',
                        },
                        {
                            type: 'wysiwyg',
                            hint: 'Keep it blank to show only image',
                            label: 'Description',
                            model: 'description',
                        },
                    ]
                }
            };
        },
    }
</script>
