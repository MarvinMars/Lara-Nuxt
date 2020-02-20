<template>
    <div class="card">
        <div class="card-header">
            Clemson: Stories
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
                    stories: [
                        {
                            image: '',
                        }
                    ],
                    title: 'Introducing  Stories',
                    subtitle: 'An immersive digital experience <br>geared for sport fans.',
                    mobile_preview_image: '',
                    content: '<p> brings the first ‘stories’ platform to a sports website. The new stories platform ' +
                    'allows publishers to create short form story telling and create a cohesive content strategy blending ' +
                    'social media and the official athletics website.</p>' +
                    '<p> Stories are built within the same CMS and can create video, audio, images and call to action ' +
                    'buttons to cater to the sports fan’s user journey on the website.</p>'
                },
                schema: {
                    fields: [
                        {
                            type: 'dynamic',
                            label: 'Stories',
                            model: 'stories',
                            schema: {
                                fields: [
                                    {
                                        type: 'mediaUpload',
                                        label: 'Image',
                                        onChanged: this._uploadMedia,
                                        model: 'image',
                                    },
                                ]
                            }
                        },
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
                            type: 'mediaUpload',
                            label: 'Mobile Preview Image',
                            onChanged: this._uploadMedia,
                            model: 'mobile_preview_image',
                        },

                        {
                            type: 'wysiwyg',
                            label: 'Content',
                            model: 'content',
                        },
                    ]
                },
            };
        },
    }
</script>
