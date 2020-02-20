<template>
    <div class="card">
        <div class="card-header">
            Project's Hero banner
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
                    background: '/img/heroes/arkansas.jpg',
                    title: 'Arkansas <br>Razorbacks',
                    button_label: 'Back to works',
                    button_url: '/work',
                    information_blocks: [
                        {
                            title: 'Year',
                            content: '<span>2018</span>',
                        },
                        {
                            title: 'What we did',
                            content: '<span>Design, Developed & Marketing</span>',
                        },
                        {
                            title: 'Website',
                            content: '<a href="#">websitename</a>',
                        },
                    ]
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
                            type: 'input',
                            inputType: 'text',
                            label: 'Button Label',
                            model: 'button_label',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'Button URL',
                            model: 'button_url',
                            help: 'Relative link only'
                        },
                        {
                            type: 'dynamic',
                            label: 'Information Blocks',
                            model: 'information_blocks',
                            schema: {
                                fields: [
                                    {
                                        type: 'input',
                                        inputType: 'text',
                                        label: 'Title',
                                        model: 'title',
                                    },
                                    {
                                        type: 'textArea',
                                        rows: 2,
                                        label: 'Content',
                                        model: 'content'
                                    },
                                ]
                            }
                        }

                    ]
                },
            };
        },
    }
</script>

