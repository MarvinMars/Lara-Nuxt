<template>
    <div class="card">
        <div class="card-header">
            Services: Hero Banner
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'servicesHero',
        data: function () {
            return {
                defaults: {
                    background: '/img/services-hero-image.jpg',
                    pretitle: 'services',
                    title: 'Quality <br>over quantity',
                    content: '<p>We help brands connect with consumers at every interaction.</p>'
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
