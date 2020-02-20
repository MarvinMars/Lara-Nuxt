<template>
    <div class="card">
        <div class="card-header">
            Goal Block
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'heroBanner',
        data: function () {
            return {
                defaults: {
                    background: '/img/ohio-review-image2.jpg',
                    title: 'Our values define us',
                    content: '<p>At the heart of everything, we believe in creating a product that’s clean, clear and ' +
                    'user friendly. We hold our products to the highest standard and believe in providing the latest and ' +
                    'greatest technologies that will create a compelling user experience.</p>' +
                    '<p>Our goal is to find that healthy medium between the linear intricacies of graphic design and ' +
                    'the front-end technical development and user journey.</p>'
                },
                schema: {
                    fields: [
                        {
                            type: 'mediaUpload',

                            onChanged: this._uploadMedia,
                            label: 'Background',
                            model: 'background',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Title',
                            model: 'title',
                        },
                        {
                            type: 'wysiwyg',
                            label: 'Content',
                            model: 'content'
                        }
                    ]
                }
            };
        },
    }
</script>
