<template>
    <div class="card">
        <div class="card-header">
            Services Bottom Block
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'servicesBottom',
        data: function () {
            return {
                defaults: {
                    background: '/img/lets-talk-background.jpg',
                    title: 'Let’s talk!',
                    content: '<p>We would love for you to tell us more about your product; what it’s about and what you believe ' +
                    'needs improvement.</p>',
                    bottom_link_label: 'Talk to us',
                    bottom_link_url: '/contact-us',

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
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Bottom Link Label',
                            model: 'bottom_link_label',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Bottom Link URL',
                            model: 'bottom_link_url',
                        },
                    ]
                }
            };
        },
    }
</script>
