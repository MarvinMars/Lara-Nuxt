<template>
    <div class="card">
        <div class="card-header">
            Left image block
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'servicesLeftImageBlock',
        data: function () {
            return {
                defaults: {
                    title: 'Strategy',
                    small_title: 'brainstorm',
                    description: '<p>Our team will help lay out the problem you want to solve. We will brainstorm ideas ' +
                    'that encourage analytical, logical and imaginative thinking to create a product that provides a viable solution.</p>',
                    number: '02',
                    image: '/img/service-image2.jpg',
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
                            label: 'Small title',
                            model: 'small_title',
                        },
                        {
                            type: 'wysiwyg',
                            label: 'Description',
                            model: 'description'
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Number',
                            model: 'number',
                        },
                        {
                            type: 'mediaUpload',

                            onChanged: this._uploadMedia,
                            label: 'Image',
                            model: 'image',
                        },
                    ]
                }
            };
        },
    }
</script>
