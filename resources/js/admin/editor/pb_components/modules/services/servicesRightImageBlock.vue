<template>
    <div class="card">
        <div class="card-header">
            Right image block
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'servicesRightImageBlock',
        data: function () {
            return {
                defaults: {
                    title: 'Discovery',
                    small_title: 'Let’s get acquainted',
                    description: '<p>We want to bring your ideas to life. We will devise a plan for your product; brand & business ' +
                    'objectives and combine them with the right technology.</p>',
                    number: '01',
                    image: '/img/service-image1.jpg',
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
