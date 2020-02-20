<template>
    <div class="card">
        <div class="card-header">
            Hero banner: type 2
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'heroBannerSecond',
        data: function () {
            return {
                defaults: {
                    background: '/img/ball-background-image.jpg',
                    title: 'Not the typical agency model',
                    content: '<p>Our agency is built on an array of creatives, strategists & developers that allows us ' +
                    'to scale for any given project. We’re an adaptable and multi-disciplined team, which gives us the ' +
                    'freedom to think outside of the box when it comes to working with our clients. Bigger isn’t always ' +
                    'better.</p>'
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
