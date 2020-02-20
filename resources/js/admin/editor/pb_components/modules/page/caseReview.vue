<template>
    <div class="card">
        <div class="card-header">
            Care Review
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'caseReview',
        data: function () {
            return {
                defaults: {
                    quote: '',
                    author_name: '',
                    author_position: '',
                    background_image: '/img/ohio-review-image.jpg',
                    logo_image: '/img/ohio-logo-colored.svg',
                    logo_alt: '',
                    link_label: 'See Case Study',
                    link_url: ''
                },
                schema: {
                    fields: [
                        {
                            type: 'textArea',
                            rows: 4,
                            label: 'Quote',
                            model: 'quote'
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
                        {
                            type: 'mediaUpload',

                            onChanged: this._uploadMedia,
                            label: 'Background Image',
                            model: 'background_image',
                        },
                        {
                            type: 'mediaUpload',

                            onChanged: this._uploadMedia,
                            label: 'Logo Image',
                            model: 'logo_image',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Logo Alt',
                            model: 'logo_alt',
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
                    ]
                }
            };
        },
    }
</script>
