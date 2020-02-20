<template>
    <div class="card">
        <div class="card-header">
            Project About
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
                    title: 'About <br>Website',
                    subtitle: 'Website Title',
                    link_label: 'Visit Site',
                    link_url: 'http://',
                    description: ''

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
                            type: 'input',
                            inputType: 'text',
                            label: 'Link Label',
                            model: 'link_label',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Link URL',
                            model: 'link_url',
                        },
                        {
                            type: 'wysiwyg',
                            label: 'Description',
                            model: 'description',
                        },
                    ]
                }
            };
        },
    }
</script>
