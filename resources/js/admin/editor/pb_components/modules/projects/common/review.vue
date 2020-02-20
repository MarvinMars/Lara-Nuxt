<template>
    <div class="card">
        <div class="card-header">
            Project: Review
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
                    project_class: '',
                    background: null,
                    quote: null,
                    author_name: null,
                    author_position: null,
                },
                schema: {
                    fields: [
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Block Class',
                            hint: 'Uses for specified projects',
                            model: 'project_class',
                        },
                        {
                            type: 'mediaUpload',
                            label: 'Image',
                            onChanged: this._uploadMedia,
                            model: 'background',
                        },
                        {
                            type: 'wysiwyg',
                            label: 'Quote',
                            model: 'quote',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Author Name',
                            model: 'author_name',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Author Position',
                            model: 'author_position',
                        },
                    ]
                }
            };
        },
    }
</script>
