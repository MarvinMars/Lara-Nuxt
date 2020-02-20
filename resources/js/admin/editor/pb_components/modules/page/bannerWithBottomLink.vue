<template>
    <div class="card">
        <div class="card-header">
            Banner with bottom Link
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    var DEFAULT_CONTENT = `
        <section class="section services-banner" style="background-image: url()" >
            <div class="container">
                <h2></h2>

                <div class="link">
                    <a href="#"><span><small data-hover="Explore our services"></small></span></a>
                </div>
            </div>
        </section>
    `;
    export default {
        name: 'bannerWithBottomLink',
        data: function () {
            return {
                defaults: {
                    background: '/img/services-background.jpg',
                    title: 'What we do',
                    content: '<p>We help brands connect with consumers at every interaction.</p>',
                    button_link_label: 'Explore our services',
                    button_link_url: '/services'
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
                            label: 'Button Label',
                            model: 'button_link_label',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Button URL',
                            model: 'button_link_url',
                        },
                    ]
                }
            };
        },
    }
</script>
