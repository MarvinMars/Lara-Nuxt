<template>
    <div class="card">
        <div class="card-header">
            Hero banner
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
                    background: '/img/about-hero-image.jpg',
                    pretitle: 'about',
                    title: 'A full-service creative agency',
                    content: 'We have everything you need to open new doors for your business.'
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
                            label: 'Pretitle',
                            model: 'pretitle',
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
