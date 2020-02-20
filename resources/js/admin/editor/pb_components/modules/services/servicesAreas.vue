<template>
    <div class="card">
        <div class="card-header">
            Services Areas
        </div>
        <div class="card-body">
            <vue-form-generator :schema="schema" :model="model" @model-updated="_modelUpdated">
            </vue-form-generator>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'servicesLeftImageBlock',
        data: function () {
            return {
                defaults: {
                    title: 'What we do',
                    after_animation_title: 'How we work',
                    after_animation_description: 'We love walking the thin line between stunning <br>and usable products.',
                    slides: [
                        {
                            image: '/img/area-icon1.svg',
                            title: 'Development',
                            content: '<p>App Design & Development</p>' +
                            '<p>Software Design & Engineering</p>' +
                            '<p>Data Science & Development</p>'
                        },
                        {
                            image: '/img/area-icon2.svg',
                            title: 'Marketing',
                            content: '<p>Search Experience Search</p>' +
                            '<p>Engine Optimization Web design & development</p>' +
                            '<p>Retargeting & Remarketing</p>' +
                            '<p>Online Campaigns Including:</p>' +
                            '<p>Google / Adroll / Twitter / Facebook / LinkedIn</p>'
                        },
                        {
                            image: '/img/area-icon3.svg',
                            title: 'Design & Innovation',
                            content: '<div class="columns">' +
                            '   <div class="col">' +
                            '       <p>Iconography & Illustration</p>' +
                            '       <p>Data Visualization</p>' +
                            '       <p>Data Science</p>' +
                            '       <p>Brand Creation</p>' +
                            '       <p>Logo Design</p>' +
                            '   </div>' +
                            '   <div class="col">' +
                            '       <p>Marketing Campaigns</p>' +
                            '       <p>Social Apps</p>' +
                            '       <p>Emerging Media</p>' +
                            '       <p>Algorithm Development</p>' +
                            '   </div>' +
                            '</div>'
                        },
                        {
                            image: '/img/area-icon4.svg',
                            title: 'Vision & Strategy',
                            content: '<p>UX & UI Strategy</p>' +
                            '<p>Tech Consultancy</p>' +
                            '<p>Product Ideation</p>'
                        },
                    ]
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
                            label: 'After Animation title',
                            model: 'after_animation_title',
                        },
                        {
                            type: 'input',
                            inputType: 'text',
                            label: 'After Animation Description',
                            model: 'after_animation_description'
                        },
                        {
                            type: 'dynamic',
                            label: 'Slides',
                            model: 'slides',
                            schema: {
                                fields: [
                                    {
                                        type: 'mediaUpload',
                                        onChanged: this._uploadMedia,
                                        label: 'Image',
                                        model: 'image',
                                    },
                                    {
                                        type: 'input',
                                        inputType: 'text',
                                        label: 'Title',
                                        model: 'title',
                                    },
                                    {
                                        type: 'textArea',
                                        rows: 4,
                                        label: 'Content',
                                        model: 'content',
                                    },
                                ]
                            }
                        }
                    ],
                },
            };
        },
    }
</script>
